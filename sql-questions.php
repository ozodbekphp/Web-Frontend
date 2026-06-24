<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Intervyu Savollari</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
            color: #333;
            line-height: 1.7;
        }

        header {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 36px 20px;
            text-align: center;
        }

        header h1 { font-size: 2em; margin-bottom: 8px; }
        header p  { opacity: .85; font-size: 1em; }

        .container {
            max-width: 860px;
            margin: 36px auto;
            padding: 0 16px 60px;
        }

        /* category title */
        .category {
            font-size: 1.1em;
            font-weight: 700;
            color: #1e3a8a;
            margin: 36px 0 14px;
            padding: 8px 16px;
            background: #dbeafe;
            border-left: 4px solid #3b82f6;
            border-radius: 4px;
        }

        /* question card */
        .card {
            background: white;
            border-radius: 10px;
            margin-bottom: 12px;
            box-shadow: 0 1px 6px rgba(0,0,0,.07);
            overflow: hidden;
        }

        .question {
            padding: 16px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            font-size: .97em;
        }

        .question:hover { background: #f8faff; }

        .question .num {
            color: #3b82f6;
            font-weight: 700;
            min-width: 28px;
        }

        .question .text { flex: 1; }

        .question .arrow {
            color: #94a3b8;
            font-size: .85em;
            transition: transform .25s;
        }

        .answer {
            display: none;
            padding: 0 20px 18px 48px;
            font-size: .93em;
            color: #444;
            border-top: 1px solid #f1f5f9;
        }

        .answer.open { display: block; }

        .answer pre {
            background: #1e293b;
            color: #e2e8f0;
            padding: 14px 16px;
            border-radius: 7px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            font-size: .9em;
            margin: 10px 0;
            border-left: 3px solid #3b82f6;
        }

        .answer .kw  { color: #93c5fd; font-weight: bold; }
        .answer .str { color: #86efac; }
        .answer .cmt { color: #64748b; font-style: italic; }

        .answer p  { margin: 8px 0; }
        .answer ul { margin: 8px 0 8px 18px; }
        .answer li { margin: 3px 0; }

        .tag {
            display: inline-block;
            font-size: .75em;
            padding: 2px 8px;
            border-radius: 20px;
            font-weight: 600;
            margin-left: 8px;
        }
        .tag.easy   { background:#dcfce7; color:#166534; }
        .tag.medium { background:#fef9c3; color:#854d0e; }
        .tag.hard   { background:#fee2e2; color:#991b1b; }

        .open-arrow { transform: rotate(180deg); }

        footer {
            text-align: center;
            padding: 20px;
            background: #1e293b;
            color: #94a3b8;
            font-size: .88em;
        }
    </style>
</head>
<body>

<header>
    <h1>🗄️ SQL Intervyu Savollari</h1>
    <p>Eng ko'p beriladigan SQL savollari va to'liq javoblari</p>
</header>

<div class="container">

    <!-- ══════════════ ASOSLAR ══════════════ -->
    <div class="category">📌 1. SQL Asoslari</div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">1.</span>
            <span class="text">SQL nima? <span class="tag easy">Oson</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p><strong>SQL</strong> (Structured Query Language) — munosabatli ma'lumotlar bazalarini boshqarish uchun standart til. U ma'lumotlarni yaratish, o'qish, yangilash va o'chirish (CRUD) uchun ishlatiladi.</p>
            <ul>
                <li>MySQL, PostgreSQL, SQLite, MS SQL Server — barchasi SQL ishlatadi</li>
                <li>1970-yillarda IBM tomonidan ishlab chiqilgan</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">2.</span>
            <span class="text">DDL, DML, DCL, TCL nima? <span class="tag easy">Oson</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <ul>
                <li><strong>DDL</strong> (Data Definition Language) — <code>CREATE</code>, <code>ALTER</code>, <code>DROP</code>, <code>TRUNCATE</code></li>
                <li><strong>DML</strong> (Data Manipulation Language) — <code>SELECT</code>, <code>INSERT</code>, <code>UPDATE</code>, <code>DELETE</code></li>
                <li><strong>DCL</strong> (Data Control Language) — <code>GRANT</code>, <code>REVOKE</code></li>
                <li><strong>TCL</strong> (Transaction Control Language) — <code>COMMIT</code>, <code>ROLLBACK</code>, <code>SAVEPOINT</code></li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">3.</span>
            <span class="text">PRIMARY KEY va UNIQUE farqi nima? <span class="tag easy">Oson</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <ul>
                <li><strong>PRIMARY KEY</strong> — NULL bo'lmaydi, har bir jadvalda faqat 1 ta bo'lishi mumkin, qatorni uniquely identifiy qiladi</li>
                <li><strong>UNIQUE</strong> — NULL bo'lishi mumkin, bir jadvalda bir nechta bo'lishi mumkin, faqat qiymat takrorlanmasligini ta'minlaydi</li>
            </ul>
            <pre><code><span class="kw">CREATE TABLE</span> Users (
    id    <span class="kw">INT PRIMARY KEY</span>,
    email <span class="kw">VARCHAR</span>(100) <span class="kw">UNIQUE</span>
);</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">4.</span>
            <span class="text">FOREIGN KEY nima? <span class="tag easy">Oson</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Bir jadvalni boshqa jadvalning PRIMARY KEY si bilan bog'laydigan kalit. Referential integrity (ma'lumotlar yaxlitligi) ni ta'minlaydi.</p>
            <pre><code><span class="kw">CREATE TABLE</span> Orders (
    id          <span class="kw">INT PRIMARY KEY</span>,
    customer_id <span class="kw">INT</span>,
    <span class="kw">FOREIGN KEY</span> (customer_id) <span class="kw">REFERENCES</span> Customers(id)
);</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">5.</span>
            <span class="text">NULL nima va u qanday tekshiriladi? <span class="tag easy">Oson</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>NULL — ma'lumot yo'qligini anglatadi. U 0 yoki bo'sh string emas.</p>
            <pre><code><span class="cmt">-- To'g'ri:</span>
<span class="kw">SELECT</span> * <span class="kw">FROM</span> Users <span class="kw">WHERE</span> phone <span class="kw">IS NULL</span>;
<span class="kw">SELECT</span> * <span class="kw">FROM</span> Users <span class="kw">WHERE</span> phone <span class="kw">IS NOT NULL</span>;

<span class="cmt">-- Noto'g'ri (ishlamaydi):</span>
<span class="kw">SELECT</span> * <span class="kw">FROM</span> Users <span class="kw">WHERE</span> phone = <span class="kw">NULL</span>;</code></pre>
        </div>
    </div>

    <!-- ══════════════ SELECT ══════════════ -->
    <div class="category">🔍 2. SELECT va Filtrlash</div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">6.</span>
            <span class="text">WHERE va HAVING farqi nima? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <ul>
                <li><strong>WHERE</strong> — qatorlarni filtrlaydi, GROUP BY dan <em>oldin</em> ishlaydi, agregat funksiyalar bilan ishlamaydi</li>
                <li><strong>HAVING</strong> — guruhlarni filtrlaydi, GROUP BY dan <em>keyin</em> ishlaydi, agregat funksiyalar bilan ishlaydi</li>
            </ul>
            <pre><code><span class="kw">SELECT</span> Country, <span class="kw">COUNT</span>(*) <span class="kw">AS</span> soni
<span class="kw">FROM</span> Customers
<span class="kw">WHERE</span> Country <span class="kw">IS NOT NULL</span>
<span class="kw">GROUP BY</span> Country
<span class="kw">HAVING COUNT</span>(*) > 5;</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">7.</span>
            <span class="text">DISTINCT nima? <span class="tag easy">Oson</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Takrorlanuvchi qiymatlarni olib tashlaydi, faqat noyob qiymatlarni qaytaradi.</p>
            <pre><code><span class="kw">SELECT DISTINCT</span> Country <span class="kw">FROM</span> Customers;</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">8.</span>
            <span class="text">LIKE operatori qanday ishlaydi? <span class="tag easy">Oson</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Matnni namunaga mosligini tekshiradi. Ikkita wildcard ishlatiladi:</p>
            <ul>
                <li><code>%</code> — 0 yoki undan ko'p istalgan belgi</li>
                <li><code>_</code> — aynan 1 ta istalgan belgi</li>
            </ul>
            <pre><code><span class="kw">SELECT</span> * <span class="kw">FROM</span> Users <span class="kw">WHERE</span> name <span class="kw">LIKE</span> <span class="str">'A%'</span>;     <span class="cmt">-- A bilan boshlanadi</span>
<span class="kw">SELECT</span> * <span class="kw">FROM</span> Users <span class="kw">WHERE</span> name <span class="kw">LIKE</span> <span class="str">'%oz%'</span>;   <span class="cmt">-- ichida 'oz' bor</span>
<span class="kw">SELECT</span> * <span class="kw">FROM</span> Users <span class="kw">WHERE</span> name <span class="kw">LIKE</span> <span class="str">'_z%'</span>;    <span class="cmt">-- ikkinchi harfi z</span></code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">9.</span>
            <span class="text">BETWEEN operatori qanday ishlaydi? <span class="tag easy">Oson</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Oraliq qiymatlarni tanlaydi. Chegaralar <strong>kiritiladi</strong> (inclusive).</p>
            <pre><code><span class="kw">SELECT</span> * <span class="kw">FROM</span> Products
<span class="kw">WHERE</span> Price <span class="kw">BETWEEN</span> 10 <span class="kw">AND</span> 50;

<span class="kw">SELECT</span> * <span class="kw">FROM</span> Orders
<span class="kw">WHERE</span> OrderDate <span class="kw">BETWEEN</span> <span class="str">'2024-01-01'</span> <span class="kw">AND</span> <span class="str">'2024-12-31'</span>;</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">10.</span>
            <span class="text">SELECT ning to'liq bajarilish tartibi qanday? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>SQL bu tartibda bajariladi (yozilish tartibi emas!):</p>
            <pre><code><span class="cmt">-- Bajarilish tartibi:</span>
1. <span class="kw">FROM</span>      <span class="cmt">-- qaysi jadvaldan</span>
2. <span class="kw">JOIN</span>      <span class="cmt">-- jadvallarni birlashtirish</span>
3. <span class="kw">WHERE</span>     <span class="cmt">-- qatorlarni filtrlash</span>
4. <span class="kw">GROUP BY</span>  <span class="cmt">-- guruhlash</span>
5. <span class="kw">HAVING</span>   <span class="cmt">-- guruhlarni filtrlash</span>
6. <span class="kw">SELECT</span>   <span class="cmt">-- ustunlarni tanlash</span>
7. <span class="kw">DISTINCT</span> <span class="cmt">-- takrorlanmaslarni olish</span>
8. <span class="kw">ORDER BY</span> <span class="cmt">-- tartiblash</span>
9. <span class="kw">LIMIT</span>    <span class="cmt">-- sonini cheklash</span></code></pre>
        </div>
    </div>

    <!-- ══════════════ JOIN ══════════════ -->
    <div class="category">🔗 3. JOIN lar</div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">11.</span>
            <span class="text">INNER JOIN, LEFT JOIN, RIGHT JOIN farqlari? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <ul>
                <li><strong>INNER JOIN</strong> — faqat ikkala jadvalda mos kelgan qatorlar</li>
                <li><strong>LEFT JOIN</strong> — chap jadvaldagi barcha qatorlar + o'ngdan mos kelganlari (mos kelmasa NULL)</li>
                <li><strong>RIGHT JOIN</strong> — o'ng jadvaldagi barcha qatorlar + chapdan mos kelganlari (mos kelmasa NULL)</li>
                <li><strong>FULL OUTER JOIN</strong> — ikkala jadvaldagi barcha qatorlar</li>
            </ul>
            <pre><code><span class="kw">SELECT</span> c.name, o.order_id
<span class="kw">FROM</span> Customers c
<span class="kw">LEFT JOIN</span> Orders o <span class="kw">ON</span> c.id = o.customer_id;
<span class="cmt">-- Buyurtma qilmagan mijozlar ham ko'rinadi (NULL bilan)</span></code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">12.</span>
            <span class="text">SELF JOIN nima? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Jadvalni o'zi bilan birlashtirish. Masalan, xodimlar va ularning menejerlari bir jadvalda bo'lsa.</p>
            <pre><code><span class="kw">SELECT</span> e.name <span class="kw">AS</span> Xodim, m.name <span class="kw">AS</span> Menejer
<span class="kw">FROM</span> Employees e
<span class="kw">LEFT JOIN</span> Employees m <span class="kw">ON</span> e.manager_id = m.id;</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">13.</span>
            <span class="text">CROSS JOIN nima? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Ikkala jadvaldagi har bir qatorni birlashtirib, barcha kombinatsiyalarni qaytaradi (Kartezian ko'paytma).</p>
            <pre><code><span class="kw">SELECT</span> * <span class="kw">FROM</span> Colors <span class="kw">CROSS JOIN</span> Sizes;
<span class="cmt">-- 3 rang × 4 o'lcham = 12 qator</span></code></pre>
        </div>
    </div>

    <!-- ══════════════ AGREGAT ══════════════ -->
    <div class="category">📊 4. Agregat Funksiyalar</div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">14.</span>
            <span class="text">COUNT(*) va COUNT(ustun) farqi? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <ul>
                <li><code>COUNT(*)</code> — NULL larni ham hisoblab, barcha qatorlar sonini qaytaradi</li>
                <li><code>COUNT(ustun)</code> — faqat NULL bo'lmagan qiymatlarni hisoblaydi</li>
            </ul>
            <pre><code><span class="kw">SELECT</span>
    <span class="kw">COUNT</span>(*) <span class="kw">AS</span> jami,
    <span class="kw">COUNT</span>(phone) <span class="kw">AS</span> telefon_borlar
<span class="kw">FROM</span> Users;</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">15.</span>
            <span class="text">GROUP BY bilan aggregat funksiyalar qanday ishlatiladi? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <pre><code><span class="cmt">-- Har bir kategoriyadan eng qimmat mahsulot narxi</span>
<span class="kw">SELECT</span>
    category,
    <span class="kw">COUNT</span>(*) <span class="kw">AS</span> soni,
    <span class="kw">AVG</span>(price) <span class="kw">AS</span> ortacha,
    <span class="kw">MAX</span>(price) <span class="kw">AS</span> eng_qimmat,
    <span class="kw">MIN</span>(price) <span class="kw">AS</span> eng_arzon,
    <span class="kw">SUM</span>(price) <span class="kw">AS</span> jami
<span class="kw">FROM</span> Products
<span class="kw">GROUP BY</span> category;</code></pre>
        </div>
    </div>

    <!-- ══════════════ SUBQUERY ══════════════ -->
    <div class="category">🔬 5. Subquery va CTE</div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">16.</span>
            <span class="text">Subquery (ichki so'rov) nima? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>SQL so'rovning ichida boshqa SQL so'rov. Uch xil joyda ishlatiladi:</p>
            <pre><code><span class="cmt">-- WHERE ichida</span>
<span class="kw">SELECT</span> * <span class="kw">FROM</span> Products
<span class="kw">WHERE</span> price > (<span class="kw">SELECT AVG</span>(price) <span class="kw">FROM</span> Products);

<span class="cmt">-- FROM ichida</span>
<span class="kw">SELECT</span> * <span class="kw">FROM</span>
    (<span class="kw">SELECT</span> name, price <span class="kw">FROM</span> Products <span class="kw">WHERE</span> price > 100) <span class="kw">AS</span> qimmat;

<span class="cmt">-- SELECT ichida</span>
<span class="kw">SELECT</span> name,
    (<span class="kw">SELECT COUNT</span>(*) <span class="kw">FROM</span> Orders <span class="kw">WHERE</span> customer_id = c.id) <span class="kw">AS</span> buyurtmalar
<span class="kw">FROM</span> Customers c;</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">17.</span>
            <span class="text">CTE (Common Table Expression) nima? <span class="tag hard">Qiyin</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p><code>WITH</code> kalit so'zi bilan yaratilgan vaqtinchalik nomlangan so'rov. Kodni o'qilishini osonlashtiradi.</p>
            <pre><code><span class="kw">WITH</span> QimmatMahsulotlar <span class="kw">AS</span> (
    <span class="kw">SELECT</span> * <span class="kw">FROM</span> Products <span class="kw">WHERE</span> price > 100
)
<span class="kw">SELECT</span> * <span class="kw">FROM</span> QimmatMahsulotlar
<span class="kw">WHERE</span> category = <span class="str">'Electronics'</span>;</code></pre>
            <p>Subquerydan afzalligi — bir nechta marta ishlatish mumkin va kodi tushunarli.</p>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">18.</span>
            <span class="text">EXISTS va IN farqi nima? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <ul>
                <li><strong>IN</strong> — qiymat ro'yxatda bormi tekshiradi (kichik ro'yxatlar uchun tez)</li>
                <li><strong>EXISTS</strong> — subquery hech bo'lmasa bitta qator qaytaradimi tekshiradi (katta ma'lumotlar uchun tezroq)</li>
            </ul>
            <pre><code><span class="cmt">-- IN</span>
<span class="kw">SELECT</span> * <span class="kw">FROM</span> Customers
<span class="kw">WHERE</span> id <span class="kw">IN</span> (<span class="kw">SELECT</span> customer_id <span class="kw">FROM</span> Orders);

<span class="cmt">-- EXISTS (tezroq)</span>
<span class="kw">SELECT</span> * <span class="kw">FROM</span> Customers c
<span class="kw">WHERE EXISTS</span> (
    <span class="kw">SELECT</span> 1 <span class="kw">FROM</span> Orders o
    <span class="kw">WHERE</span> o.customer_id = c.id
);</code></pre>
        </div>
    </div>

    <!-- ══════════════ INDEKS ══════════════ -->
    <div class="category">⚡ 6. Index va Performance</div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">19.</span>
            <span class="text">Index nima va nima uchun ishlatiladi? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Index — kitobdagi mundarija kabi, qidirishni tezlashtiradi. Lekin INSERT/UPDATE ni sekinlashtiradi va qo'shimcha joy egallaydi.</p>
            <pre><code><span class="cmt">-- Index yaratish</span>
<span class="kw">CREATE INDEX</span> idx_email <span class="kw">ON</span> Users(email);

<span class="cmt">-- Unique index</span>
<span class="kw">CREATE UNIQUE INDEX</span> idx_phone <span class="kw">ON</span> Users(phone);

<span class="cmt">-- Indexni o'chirish</span>
<span class="kw">DROP INDEX</span> idx_email <span class="kw">ON</span> Users;</code></pre>
            <p><strong>Qachon ishlatish kerak:</strong> WHERE, JOIN, ORDER BY da tez-tez ishlatiladigan ustunlarga.</p>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">20.</span>
            <span class="text">DELETE, TRUNCATE, DROP farqlari? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <ul>
                <li><strong>DELETE</strong> — shartli ravishda qatorlar o'chiradi, ROLLBACK mumkin, trigger ishlaydi, sekin</li>
                <li><strong>TRUNCATE</strong> — barcha qatorlarni o'chiradi, ROLLBACK imkoni cheklangan, trigger ishlamaydi, tez</li>
                <li><strong>DROP</strong> — jadvalning o'zini butunlay o'chiradi (tuzilma ham, ma'lumot ham)</li>
            </ul>
            <pre><code><span class="kw">DELETE FROM</span> Users <span class="kw">WHERE</span> id = 5;  <span class="cmt">-- 1 qator o'chirish</span>
<span class="kw">TRUNCATE TABLE</span> Users;              <span class="cmt">-- barcha qator, jadval qoladi</span>
<span class="kw">DROP TABLE</span> Users;                  <span class="cmt">-- jadval butunlay yo'qoladi</span></code></pre>
        </div>
    </div>

    <!-- ══════════════ NORMALIZATSIYA ══════════════ -->
    <div class="category">📐 7. Normalizatsiya va Dizayn</div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">21.</span>
            <span class="text">Normalizatsiya nima? 1NF, 2NF, 3NF? <span class="tag hard">Qiyin</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Ma'lumotlar bazasini takrorlanish va anomaliyalardan xoli qilish jarayoni.</p>
            <ul>
                <li><strong>1NF</strong> — har bir ustunda atomik (bo'linmas) qiymat bo'lishi kerak, takrorlanuvchi guruhlar bo'lmasligi kerak</li>
                <li><strong>2NF</strong> — 1NF + har bir non-key ustun to'liq primary keygacha bog'liq bo'lishi kerak</li>
                <li><strong>3NF</strong> — 2NF + non-key ustunlar o'zaro bog'liq bo'lmasligi kerak (tranzitiv bog'liqlik yo'q)</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">22.</span>
            <span class="text">VIEW nima? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Virtual jadval — aslida ma'lumot saqlamaydi, har safar so'ralganda query qayta bajariladi.</p>
            <pre><code><span class="kw">CREATE VIEW</span> ActiveUsers <span class="kw">AS</span>
<span class="kw">SELECT</span> id, name, email
<span class="kw">FROM</span> Users
<span class="kw">WHERE</span> is_active = 1;

<span class="cmt">-- Oddiy jadval kabi ishlatiladi</span>
<span class="kw">SELECT</span> * <span class="kw">FROM</span> ActiveUsers;</code></pre>
            <p><strong>Afzalliklari:</strong> murakkab querylarni soddalashtiradi, xavfsizlik (faqat kerakli ustunlarni ko'rsatish), qayta ishlatish.</p>
        </div>
    </div>

    <!-- ══════════════ TRANSACTION ══════════════ -->
    <div class="category">🔐 8. Transaction</div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">23.</span>
            <span class="text">Transaction nima? ACID nima? <span class="tag hard">Qiyin</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>Transaction — bir butun sifatida bajarilishi kerak bo'lgan SQL operatsiyalar guruhi.</p>
            <ul>
                <li><strong>A</strong>tomicity — hammasi bajariladi yoki hech biri</li>
                <li><strong>C</strong>onsistency — ma'lumotlar har doim yaroqli holatda</li>
                <li><strong>I</strong>solation — parallel transactionlar bir-biriga ta'sir qilmaydi</li>
                <li><strong>D</strong>urability — commit qilingan ma'lumotlar saqlanib qoladi</li>
            </ul>
            <pre><code><span class="kw">BEGIN TRANSACTION</span>;

<span class="kw">UPDATE</span> Accounts <span class="kw">SET</span> balance = balance - 1000 <span class="kw">WHERE</span> id = 1;
<span class="kw">UPDATE</span> Accounts <span class="kw">SET</span> balance = balance + 1000 <span class="kw">WHERE</span> id = 2;

<span class="kw">COMMIT</span>;    <span class="cmt">-- muvaffaqiyatli bo'lsa saqlash</span>
<span class="cmt">-- ROLLBACK; -- xato bo'lsa bekor qilish</span></code></pre>
        </div>
    </div>

    <!-- ══════════════ AMALIY ══════════════ -->
    <div class="category">💡 9. Amaliy Savollar</div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">24.</span>
            <span class="text">Ikkinchi eng yuqori maoshni qanday topasiz? <span class="tag hard">Qiyin</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <pre><code><span class="cmt">-- Usul 1: LIMIT/OFFSET</span>
<span class="kw">SELECT DISTINCT</span> salary <span class="kw">FROM</span> Employees
<span class="kw">ORDER BY</span> salary <span class="kw">DESC</span>
<span class="kw">LIMIT</span> 1 <span class="kw">OFFSET</span> 1;

<span class="cmt">-- Usul 2: Subquery</span>
<span class="kw">SELECT MAX</span>(salary) <span class="kw">FROM</span> Employees
<span class="kw">WHERE</span> salary < (<span class="kw">SELECT MAX</span>(salary) <span class="kw">FROM</span> Employees);</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">25.</span>
            <span class="text">Takrorlanuvchi qatorlarni qanday topasiz? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <pre><code><span class="kw">SELECT</span> email, <span class="kw">COUNT</span>(*) <span class="kw">AS</span> soni
<span class="kw">FROM</span> Users
<span class="kw">GROUP BY</span> email
<span class="kw">HAVING COUNT</span>(*) > 1;</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">26.</span>
            <span class="text">Har bir departamentdagi eng yuqori maoshli xodimni toping <span class="tag hard">Qiyin</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <pre><code><span class="kw">SELECT</span> e.name, e.department, e.salary
<span class="kw">FROM</span> Employees e
<span class="kw">WHERE</span> e.salary = (
    <span class="kw">SELECT MAX</span>(salary)
    <span class="kw">FROM</span> Employees
    <span class="kw">WHERE</span> department = e.department
);</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">27.</span>
            <span class="text">Buyurtma bermagan mijozlarni toping <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <pre><code><span class="cmt">-- LEFT JOIN usuli</span>
<span class="kw">SELECT</span> c.name
<span class="kw">FROM</span> Customers c
<span class="kw">LEFT JOIN</span> Orders o <span class="kw">ON</span> c.id = o.customer_id
<span class="kw">WHERE</span> o.id <span class="kw">IS NULL</span>;

<span class="cmt">-- NOT EXISTS usuli</span>
<span class="kw">SELECT</span> name <span class="kw">FROM</span> Customers c
<span class="kw">WHERE NOT EXISTS</span> (
    <span class="kw">SELECT</span> 1 <span class="kw">FROM</span> Orders
    <span class="kw">WHERE</span> customer_id = c.id
);</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">28.</span>
            <span class="text">UNION va UNION ALL farqi? <span class="tag easy">Oson</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <ul>
                <li><strong>UNION</strong> — ikki so'rov natijasini birlashtiradi, takrorlanuvchilarni olib tashlaydi (sekinroq)</li>
                <li><strong>UNION ALL</strong> — takrorlanuvchilarni ham qoldiradi (tezroq)</li>
            </ul>
            <pre><code><span class="kw">SELECT</span> name <span class="kw">FROM</span> Customers
<span class="kw">UNION</span>
<span class="kw">SELECT</span> name <span class="kw">FROM</span> Suppliers;

<span class="cmt">-- Ustunlar soni va tipi mos bo'lishi kerak</span></code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">29.</span>
            <span class="text">COALESCE nima? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>NULL bo'lmagan birinchi qiymatni qaytaradi. NULL qiymatlar o'rniga default qiymat ko'rsatish uchun ishlatiladi.</p>
            <pre><code><span class="kw">SELECT</span> name, <span class="kw">COALESCE</span>(phone, email, <span class="str">'Aloqa yo'q'</span>) <span class="kw">AS</span> aloqa
<span class="kw">FROM</span> Users;</code></pre>
        </div>
    </div>

    <div class="card">
        <div class="question" onclick="toggle(this)">
            <span class="num">30.</span>
            <span class="text">CASE WHEN qanday ishlatiladi? <span class="tag medium">O'rta</span></span>
            <span class="arrow">▼</span>
        </div>
        <div class="answer">
            <p>SQL dagi if-else. Shartga qarab turli qiymat qaytaradi.</p>
            <pre><code><span class="kw">SELECT</span> name, salary,
    <span class="kw">CASE</span>
        <span class="kw">WHEN</span> salary > 5000000 <span class="kw">THEN</span> <span class="str">'Yuqori'</span>
        <span class="kw">WHEN</span> salary > 2000000 <span class="kw">THEN</span> <span class="str">'O'rta'</span>
        <span class="kw">ELSE</span> <span class="str">'Quyi'</span>
    <span class="kw">END AS</span> daraja
<span class="kw">FROM</span> Employees;</code></pre>
        </div>
    </div>

</div><!-- /container -->

<footer>
    🗄️ SQL Intervyu Savollari — ishonchvision.uz &copy; 2026
</footer>

<script>
    function toggle(el) {
        const answer = el.nextElementSibling;
        const arrow  = el.querySelector('.arrow');
        const isOpen = answer.classList.contains('open');

        // close all
        document.querySelectorAll('.answer').forEach(a => a.classList.remove('open'));
        document.querySelectorAll('.arrow').forEach(a => a.classList.remove('open-arrow'));

        if (!isOpen) {
            answer.classList.add('open');
            arrow.classList.add('open-arrow');
        }
    }
</script>
</body>
</html>