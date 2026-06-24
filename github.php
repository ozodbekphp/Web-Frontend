<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git & GitHub To'liq Qo'llanma (2026)</title>
    <link rel="stylesheet" href="github.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; line-height: 1.6; }
        .card { margin-bottom: 2rem; padding: 1.5rem; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        pre { background: #f4f4f4; padding: 1rem; border-radius: 6px; overflow-x: auto; }
        code { font-family: 'Consolas', monospace; }
        .symbol { font-weight: bold; font-size: 1.2em; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f8f8f8; }
        .visual-box {
            background: linear-gradient(135deg, #f0f8ff, #e6f0fa);
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            margin: 1.5rem 0;
            border: 2px dashed #3b82f6;
        }
        .highlight { background: #fff3cd; padding: 0.2rem 0.5rem; border-radius: 4px; }
    </style>
</head>
<body>

    <header class="main-header">
        <h1>Git & GitHub To'liq Amaliy Qo'llanma (2026)</h1>
        <p class="subtitle">Boshlang'ichdan professional darajagacha — barcha kerakli buyruqlar, strategiyalar, xatolar va real loyihada ishlash</p>
        <p><strong>Yangilangan:</strong> 2026 yil — GitHub Copilot, GitHub Actions va zamonaviy amaliyotlar bilan</p>
    </header>

    <main class="container">

        <section class="card">
            <h2>1. Git va GitHub nima?</h2>
            <p><strong>Git</strong> — lokal versiya nazorati tizimi (VCS). U sizning kodlaringizning barcha o'zgarishlarini saqlaydi, qaytadan tiklash imkonini beradi va jamoaviy ishlashni osonlashtiradi.</p>
            <p><strong>GitHub</strong> — Git repozitoriyalarini internetda saqlaydigan bulut xizmati. U Pull Request, Issue, Actions, Copilot va boshqa kuchli hamkorlik vositalarini taklif qiladi.</p>
            
            <div class="visual-box">
                <strong>Gitning 3 asosiy hududi:</strong><br>
                <strong>Working Directory</strong> → <strong>Staging Area (Index)</strong> → <strong>Local Repository</strong> → <strong>Remote Repository (GitHub)</strong>
                <p class="caption">Bu sxema har bir o'zgarishning qanday saqlanishini ko'rsatadi.</p>
            </div>
        </section>

        <section class="card">
            <h2>2. Git terminlarida muhim belgilar</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Belgi</th>
                            <th>Ma'nosi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code class="symbol">+</code> (Yashil)</td>
                            <td>Yangi qator qo'shilgan (Addition)</td>
                        </tr>
                        <tr>
                            <td><code class="symbol">-</code> (Qizil)</td>
                            <td>Qator o'chirilgan (Deletion)</td>
                        </tr>
                        <tr>
                            <td><code class="symbol">/</code></td>
                            <td>Branch nomlarida iyerarxiya: <code>feature/auth</code>, <code>bugfix/payment</code></td>
                        </tr>
                        <tr>
                            <td><code class="symbol">===</code></td>
                            <td>Konflikt chegarasi (merge conflict)</td>
                        </tr>
                        <tr>
                            <td><code class="symbol">~</code> yoki <code class="symbol">^</code></td>
                            <td>HEAD~2 — 2 ta oldingi commit</td>
                        </tr>
                        <tr>
                            <td><code class="symbol">..</code></td>
                            <td>Commit oralig'i: <code>main..feature/login</code></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="card">
            <h2>3. Eng muhim Git komandalari</h2>

            <h3>3.1 Loyihani boshlash</h3>
            <pre><code><span class="comment"># Yangi repo yaratish</span>
git init

<span class="comment"># GitHub bilan bog'lash</span>
git remote add origin https://github.com/username/repo.git

<span class="comment"># Mavjud loyihani klonlash</span>
git clone https://github.com/username/repo.git

<span class="comment"># .gitignore yaratish (keraksiz fayllarni e'tiborsiz qoldirish)</span>
echo "node_modules/" >> .gitignore
echo "*.log" >> .gitignore</code></pre>

            <h3>3.2 Kunlik ish oqimi</h3>
            <pre><code>git status
git add .                    <span class="comment"># yoki git add fayl.js</span>
git commit -m "feat: yangi login sahifasi qo'shildi"
git log --oneline --graph    <span class="comment"># tarixni chiroyli ko'rish</span>
git diff                     <span class="comment"># o'zgarishlarni ko'rish</span></code></pre>

            <h3>3.3 Branch (Tarmoq) bilan ishlash</h3>
            <pre><code>git branch                  <span class="comment"># barcha branchlarni ko'rish</span>
git checkout -b feature/payment-integration
git checkout main
git merge feature/payment-integration
git branch -d feature/old-feature   <span class="comment"># o'chirish</span></code></pre>

            <h3>3.4 GitHub bilan sinxronlash</h3>
            <pre><code>git push origin main
git pull origin main
git fetch origin                <span class="comment"># faqat ma'lumot oladi, merge qilmaydi</span></code></pre>

            <h3>3.5 Foydali qo'shimcha komandalar</h3>
            <pre><code>git stash                    <span class="comment"># vaqtincha saqlash</span>
git stash pop

git rebase main              <span class="comment"># toza tarix uchun</span>
git reset --soft HEAD~1      <span class="comment"># oxirgi commitni bekor qilish (o'zgarishlar saqlanadi)</span>
git reset --hard HEAD~1      <span class="comment"># qattiq qaytarish (ehtiyot bo'ling!)</span>

git log --grep="login"       <span class="comment"># matn bo'yicha qidirish</span>
git blame index.html         <span class="comment"># kim qachon o'zgartirganini ko'rish</span></code></pre>
        </section>

        <section class="card">
            <h2>4. Git Flow — Professional Branch Strategiyasi</h2>
            <p>Real loyihalarda quyidagi branch tuzilishi tavsiya etiladi:</p>
            <ul>
                <li><strong>main</strong> — productionga tayyor kod</li>
                <li><strong>develop</strong> — integratsiya branchi</li>
                <li><strong>feature/xxx</strong> — yangi funksiya</li>
                <li><strong>bugfix/xxx</strong> — xatolik tuzatish</li>
                <li><strong>release/v1.2.3</strong> — versiya chiqarish</li>
                <li><strong>hotfix/xxx</strong> — shoshilinch production xatolari</li>
            </ul>
        </section>

        <section class="card">
            <h2>5. Real holatlar va yechimlar</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Vaziyat</th>
                            <th>Yechim</th>
                            <th>Eslatma</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Oxirgi commit xabarini tuzatish</td>
                            <td><code>git commit --amend -m "Yangi xabar"</code></td>
                            <td>Push qilinmagan bo'lsa ishlaydi</td>
                        </tr>
                        <tr>
                            <td>Commitni butunlay bekor qilish</td>
                            <td><code>git revert HEAD</code></td>
                            <td>Yangi commit yaratadi</td>
                        </tr>
                        <tr>
                            <td>Merge konflikti</td>
                            <td>Faylda <code>&lt;&lt;&lt;&lt;&lt;&lt;&lt;</code> va <code>=======</code> ni tozalang</td>
                            <td>Keyin <code>git add . && git commit</code></td>
                        </tr>
                        <tr>
                            <td>GitHub'da Pull Request yaratish</td>
                            <td>Branchni push qiling → GitHub'da "New Pull Request"</td>
                            <td>Code review uchun juda muhim</td>
                        </tr>
                        <tr>
                            <td>SSH kalit orqali ulanish (xavfsizroq)</td>
                            <td>ssh-keygen va GitHub Settings → SSH keys</td>
                            <td>https o'rniga ssh dan foydalaning</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="card">
            <h2>6. GitHubning kuchli vositalari</h2>
            <ul>
                <li><strong>Issues</strong> — vazifalar va xatolar</li>
                <li><strong>Pull Requests</strong> — kodni ko'rib chiqish</li>
                <li><strong>GitHub Actions</strong> — CI/CD (avtomatik test va deploy)</li>
                <li><strong>Projects</strong> — Kanban taxtasi</li>
                <li><strong>Copilot</strong> — AI yordamchisi</li>
                <li><strong>Fork</strong> — boshqa loyihaga hissa qo'shish uchun nusxa olish</li>
            </ul>
        </section>

        <section class="card">
            <h2>7. Eng yaxshi amaliyotlar (Best Practices)</h2>
            <ul>
                <li>Har bir commit bitta maqsadga xizmat qilsin (Atomic commits)</li>
                <li>Commit xabarlari aniq va ingliz tilida bo'lsin: <code>feat:</code>, <code>fix:</code>, <code>docs:</code></li>
                <li>Tez-tez <code>git pull</code> qiling</li>
                <li>Branch nomlarini mantiqiy qo'ying</li>
                <li>.gitignore ni to'g'ri sozlang</li>
                <li>Production kodini <code>main</code> ga to'g'ridan-to'g'ri o'zgartirmang</li>
                <li>Har kuni <code>git status</code> ni tekshiring</li>
            </ul>
        </section>

        <section class="card">
            <h2>8. Tez eslatma (Cheat Sheet)</h2>
            <pre><code># Tez boshlash
git clone &lt;url&gt;
cd repo
git checkout -b feature/yangi-ish
# kod yozing...
git add .
git commit -m "feat: yangi funksiya"
git push origin feature/yangi-ish

# Keyin GitHub'da Pull Request yarating</code></pre>
        </section>

    </main>

    <footer class="main-footer">
        <p>&copy; 2026 Git & GitHub To'liq Qo'llanma | O'zbekistonlik dasturchilar uchun</p>
        <p><strong>Tavsiya:</strong> Har kuni mashq qiling va real loyihalarda qo'llang!</p>
    </footer>

</body>
</html>