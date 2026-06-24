# ishonchvision.uz — Server Sozlash Dokumentatsiyasi

> **Server:** Ubuntu 25.10 | **Domain:** ishonchvision.uz | **Cloudflare Tunnel:** myserver

---

## Mundarija

1. [Umumiy arxitektura](#1-umumiy-arxitektura)
2. [Cloudflare Tunnel sozlash](#2-cloudflare-tunnel-sozlash)
3. [DNS Recordlar](#3-dns-recordlar)
4. [SSH orqali ulanish](#4-ssh-orqali-ulanish)
5. [PHP Server](#5-php-server)
6. [Webhook CI/CD](#6-webhook-cicd)
7. [Fayllar va yo'llar](#7-fayllar-va-yollar)
8. [Foydali buyruqlar](#8-foydali-buyruqlar)

---

## 1. Umumiy Arxitektura

```
GitHub (push)
     │
     ▼
GitHub Webhook
     │
     ▼
webhook.ishonchvision.uz (Cloudflare Tunnel)
     │
     ▼
localhost:9000 (webhook service)
     │
     ▼
deploy.sh (git pull + php restart)
     │
     ▼
localhost:8000 (PHP Server)
     │
     ▼
www.ishonchvision.uz (Cloudflare Tunnel)
```

**SSH ulanish:**
```
Boshqa kompyuter → ssh.ishonchvision.uz → Cloudflare Tunnel → localhost:22
```

---

## 2. Cloudflare Tunnel Sozlash

### Cloudflared o'rnatish

```bash
curl -L https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64.deb -o cloudflared.deb
sudo dpkg -i cloudflared.deb
```

### Cloudflare ga login

```bash
cloudflared tunnel login
```

### Tunnel yaratish

```bash
# Tunnel yaratilgan (dashboard orqali)
# Tunnel nomi: myserver
# Tunnel ID: 5f8aec98-eb7c-422f-9913-f54e31f73b90
```

### Config fayl

**Joyi:** `/etc/cloudflared/config.yml`

```yaml
tunnel: 5f8aec98-eb7c-422f-9913-f54e31f73b90
credentials-file: /etc/cloudflared/5f8aec98-eb7c-422f-9913-f54e31f73b90.json

ingress:
  - hostname: ssh.ishonchvision.uz
    service: ssh://localhost:22

  - hostname: www.ishonchvision.uz
    service: http://localhost:8000

  - hostname: ishonchvision.uz
    service: http://localhost:8000

  - hostname: webhook.ishonchvision.uz
    service: http://localhost:9000

  - service: http_status:404
```

### Servis sifatida o'rnatish

```bash
sudo cloudflared service install
sudo systemctl enable cloudflared
sudo systemctl start cloudflared
```

### Tunnel holati tekshirish

```bash
sudo systemctl status cloudflared
cloudflared tunnel list
cloudflared tunnel info myserver
```

---

## 3. DNS Recordlar

Cloudflare Dashboard → **DNS → Records**

| Type  | Name    | Content                                                        | Proxy  |
|-------|---------|----------------------------------------------------------------|--------|
| CNAME | `@`     | `5f8aec98-eb7c-422f-9913-f54e31f73b90.cfargotunnel.com`       | ✅ ON  |
| CNAME | `www`   | `5f8aec98-eb7c-422f-9913-f54e31f73b90.cfargotunnel.com`       | ✅ ON  |
| CNAME | `ssh`   | Cloudflare Tunnel (myserver)                                   | ✅ ON  |
| CNAME | `webhook` | `5f8aec98-eb7c-422f-9913-f54e31f73b90.cfargotunnel.com`     | ✅ ON  |
| MX    | `@`     | `mail.ishonchvision.uz`                                        | —      |
| TXT   | `_dmarc`| `v=DMARC1; p=none;`                                           | —      |
| TXT   | `@`     | `v=spf1 +a +mx +ipv4:45.138.159.4 ~all`                      | —      |

---

## 4. SSH orqali Ulanish

### Server tarafda (bir marta sozlash)

```bash
# SSH server o'rnatish
sudo apt install openssh-server
sudo systemctl enable ssh
sudo systemctl start ssh
```

### Boshqa kompyuterdan ulanish

**1. cloudflared o'rnatish:**

```bash
# Ubuntu/Debian
curl -L https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64.deb -o cloudflared.deb
sudo dpkg -i cloudflared.deb

# Mac
brew install cloudflared
```

**2. SSH config sozlash:**

```bash
nano ~/.ssh/config
```

```
Host ssh.ishonchvision.uz
    ProxyCommand cloudflared access ssh --hostname %h
    User ozodbek
    StrictHostKeyChecking no
```

**3. Ulanish:**

```bash
ssh ssh.ishonchvision.uz
# Parol: ozodbek kompyuterining Ubuntu paroli
```

**4. Chiqish:**

```bash
exit
# yoki Ctrl+D
```

### SSH Key bilan parolsiz ulanish (ixtiyoriy)

```bash
# Boshqa kompyuterda key yaratish
ssh-keygen -t rsa -b 4096

# Keyni serverga yuborish
ssh-copy-id -o ProxyCommand="cloudflared access ssh --hostname %h" ozodbek@ssh.ishonchvision.uz
```

---

## 5. PHP Server

### Ishga tushirish

```bash
# Proyekt papkasi
cd ~/Documents/Ozodbek/ishonchvision

# Oddiy ishga tushirish (terminal yopilsa o'chadi)
php -S localhost:8000

# Background da ishga tushirish (terminal yopilsa ham ishlaydi)
nohup php -S localhost:8000 > ~/server.log 2>&1 &
```

### Systemd servis sifatida (tavsiya etiladi)

```bash
sudo nano /etc/systemd/system/phpserver.service
```

```ini
[Unit]
Description=PHP Dev Server
After=network.target

[Service]
User=ozodbek
WorkingDirectory=/home/ozodbek/Documents/Ozodbek/ishonchvision
ExecStart=/usr/bin/php -S localhost:8000
Restart=always

[Install]
WantedBy=multi-user.target
```

```bash
sudo systemctl enable phpserver
sudo systemctl start phpserver
sudo systemctl status phpserver
```

### Log ko'rish

```bash
tail -f ~/server.log
```

---

## 6. Webhook CI/CD

**Maqsad:** GitHub ga push qilinganda avtomatik serverga deploy bo'lsin.

### webhook o'rnatish

```bash
sudo apt install webhook
```

### hooks.json

**Joyi:** `/home/ozodbek/hooks.json`

```json
[
  {
    "id": "deploy",
    "execute-command": "/home/ozodbek/deploy.sh",
    "command-working-directory": "/home/ozodbek/Documents/Ozodbek/ishonchvision",
    "trigger-rule": {
      "match": {
        "type": "payload-hmac-sha1",
        "secret": "mysecretkey123",
        "parameter": {
          "source": "header",
          "name": "X-Hub-Signature"
        }
      }
    }
  }
]
```

> ⚠️ `mysecretkey123` o'rniga o'zingizning maxfiy kalitingizni yozing va GitHub Webhook settings da ham xuddi shunday bo'lishi kerak.

### deploy.sh

**Joyi:** `/home/ozodbek/deploy.sh`

```bash
#!/bin/bash
cd ~/Documents/Ozodbek/ishonchvision
git pull origin main
pkill -f "php -S localhost:8000" || true
nohup php -S localhost:8000 > ~/server.log 2>&1 &
```

```bash
chmod +x ~/deploy.sh
```

### Webhook Systemd Servis

**Joyi:** `/etc/systemd/system/webhook.service`

```ini
[Unit]
Description=Webhook
After=network.target

[Service]
User=ozodbek
ExecStart=/usr/bin/webhook -hooks /home/ozodbek/hooks.json -port 9000 -verbose
Restart=always

[Install]
WantedBy=multi-user.target
```

```bash
sudo systemctl enable webhook
sudo systemctl start webhook
sudo systemctl status webhook
```

### GitHub da Webhook sozlash

GitHub Repo → **Settings** → **Webhooks** → **Add webhook**

| Maydon | Qiymat |
|--------|--------|
| Payload URL | `https://webhook.ishonchvision.uz/hooks/deploy` |
| Content type | `application/json` |
| Secret | `mysecretkey123` |
| SSL verification | Enable ✅ |
| Events | Just the push event ✅ |

### Deploy jarayonini kuzatish

```bash
# Real-time log
sudo journalctl -u webhook -f

# Muvaffaqiyatli deploy logi:
# deploy got matched
# deploy hook triggered successfully
# executing /home/ozodbek/deploy.sh
# finished handling deploy
```

---

## 7. Fayllar va Yo'llar

| Fayl | Joyi |
|------|------|
| Cloudflare config | `/etc/cloudflared/config.yml` |
| Tunnel credentials | `/etc/cloudflared/5f8aec98-eb7c-422f-9913-f54e31f73b90.json` |
| Webhook hooks | `/home/ozodbek/hooks.json` |
| Deploy script | `/home/ozodbek/deploy.sh` |
| Webhook service | `/etc/systemd/system/webhook.service` |
| PHP service | `/etc/systemd/system/phpserver.service` |
| Proyekt papkasi | `/home/ozodbek/Documents/Ozodbek/ishonchvision` |
| PHP server log | `/home/ozodbek/server.log` |
| SSH config (client) | `~/.ssh/config` |

---

## 8. Foydali Buyruqlar

### Servislar holati

```bash
sudo systemctl status cloudflared
sudo systemctl status webhook
sudo systemctl status phpserver
sudo systemctl status ssh
```

### Servislarni restart qilish

```bash
sudo systemctl restart cloudflared
sudo systemctl restart webhook
sudo systemctl restart phpserver
```

### Loglar

```bash
# Cloudflare tunnel log
sudo journalctl -u cloudflared -f

# Webhook log
sudo journalctl -u webhook -f

# PHP server log
tail -f ~/server.log
```

### Tunnel tekshirish

```bash
cloudflared tunnel list
cloudflared tunnel info myserver
```

### Git

```bash
# Qo'lda deploy
cd ~/Documents/Ozodbek/ishonchvision
git pull origin main
```

---

## Muammolar va Yechimlari

| Muammo | Sabab | Yechim |
|--------|-------|--------|
| `Cannot determine default configuration path` | Config `/etc/cloudflared/` da yo'q | Config faylni `/etc/cloudflared/` ga ko'chirish |
| `invalid payload signatures` | `payload-hash-sha1` eski | `payload-hmac-sha1` ga o'zgartirish |
| `fatal: not a git repository` | Proyekt papkasida git yo'q | `git init && git remote add origin ...` |
| SSH ulanish uzilishi | cloudflared restart bo'lganda | Qayta `ssh ssh.ishonchvision.uz` |
| Sayt aylanib turadi | DNS CNAME record yo'q | Cloudflare da CNAME qo'shish |

---

*Dokumentatsiya yaratildi: Iyun 2026*