<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL To'liq Qo'llanma — Boshlang'ichdan Murakkabgacha</title>
    <link rel="stylesheet" href="sql.css">
</head>
<body>

    <header class="main-header">
        <h1>SQL To'liq Qo'llanma</h1>
        <p class="subtitle">Boshlang'ich darajadan murakkabgacha bo'lgan amaliy qo'llanma</p>
    </header>

    <main class="container">
        
        <section class="card">
            <h2>1. SQL nima?</h2>
            <p><strong>SQL (Structured Query Language)</strong> — ma'lumotlar bazasi bilan ishlash tili hisoblanadi. Unda 4 ta asosiy amal mavjud:</p>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Amal</th>
                            <th>Ma'nosi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>SELECT</code></td>
                            <td>Ma'lumot olish</td>
                        </tr>
                        <tr>
                            <td><code>INSERT</code></td>
                            <td>Ma'lumot qo'shish</td>
                        </tr>
                        <tr>
                            <td><code>UPDATE</code></td>
                            <td>Ma'lumot yangilash</td>
                        </tr>
                        <tr>
                            <td><code>DELETE</code></td>
                            <td>Ma'lumot o'chirish</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="card">
            <h2>2. SELECT — Ma'lumot olish</h2>
            
            <h3>2.1 Eng oddiy so'rov</h3>
            <pre><code><span class="comment">-- Barcha ustunlarni ol</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users;

<span class="comment">-- Faqat kerakli ustunlarni ol</span>
<span class="keyword">SELECT</span> id, name, email <span class="keyword">FROM</span> users;</code></pre>

            <h3>2.2 Alias — ustun nomini o'zgartirish</h3>
            <pre><code><span class="keyword">SELECT</span> 
    id          <span class="keyword">AS</span> user_id,
    name        <span class="keyword">AS</span> full_name,
    email       <span class="keyword">AS</span> mail
<span class="keyword">FROM</span> users;</code></pre>

            <h3>2.3 WHERE — shart qo'yish</h3>
            <pre><code><span class="comment">-- Tenglik</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> id = 1;

<span class="comment">-- Katta/kichik</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> age > 18;
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> age >= 18;
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> age < 30;

<span class="comment">-- Oraliq</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> age <span class="keyword">BETWEEN</span> 18 <span class="keyword">AND</span> 30;

<span class="comment">-- Ro'yxatdan biri</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> id <span class="keyword">IN</span> (1, 2, 3);

<span class="comment">-- Matn qidirish</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> name <span class="keyword">LIKE</span> <span class="string">'Ali%'</span>;    <span class="comment">-- Ali bilan boshlanadi</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> name <span class="keyword">LIKE</span> <span class="string">'%Ali%'</span>;   <span class="comment">-- Ali ni o'z ichiga oladi</span>

<span class="comment">-- NULL tekshirish</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> phone <span class="keyword">IS NULL</span>;
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> phone <span class="keyword">IS NOT NULL</span>;</code></pre>

            <h3>2.4 AND / OR — shartlarni birlashtirish</h3>
            <pre><code><span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> age > 18 
  <span class="keyword">AND</span> city = <span class="string">'Toshkent'</span>;

<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> city = <span class="string">'Toshkent'</span> 
   <span class="keyword">OR</span> city = <span class="string">'Samarqand'</span>;</code></pre>

            <h3>2.5 ORDER BY — tartiblash</h3>
            <pre><code><span class="comment">-- O'sish tartibida (default)</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">ORDER BY</span> name <span class="keyword">ASC</span>;

<span class="comment">-- Kamayish tartibida</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">ORDER BY</span> created_at <span class="keyword">DESC</span>;

<span class="comment">-- Bir nechta ustun bo'yicha</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">ORDER BY</span> city <span class="keyword">ASC</span>, name <span class="keyword">DESC</span>;</code></pre>

            <h3>2.6 LIMIT / OFFSET — cheklash</h3>
            <pre><code><span class="comment">-- Faqat 10 ta</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">LIMIT</span> 10;

<span class="comment">-- 10 tasini o'tkazib, keyingi 10 tasini ol (pagination)</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">LIMIT</span> 10 <span class="keyword">OFFSET</span> 10;</code></pre>
        </section>

        <section class="card">
            <h2>3. Agregat funksiyalar</h2>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Funksiya</th>
                            <th>Ma'nosi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>COUNT()</code></td>
                            <td>Sana (Soni)</td>
                        </tr>
                        <tr>
                            <td><code>SUM()</code></td>
                            <td>Yig'indi</td>
                        </tr>
                        <tr>
                            <td><code>AVG()</code></td>
                            <td>O'rtacha qiymat</td>
                        </tr>
                        <tr>
                            <td><code>MAX()</code></td>
                            <td>Eng katta qiymat</td>
                        </tr>
                        <tr>
                            <td><code>MIN()</code></td>
                            <td>Eng kichik qiymat</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <pre><code><span class="comment">-- Jami foydalanuvchilar soni</span>
<span class="keyword">SELECT</span> <span class="function">COUNT</span>(*) <span class="keyword">FROM</span> users;

<span class="comment">-- Noyob shaharlar soni</span>
<span class="keyword">SELECT</span> <span class="function">COUNT</span>(<span class="keyword">DISTINCT</span> city) <span class="keyword">FROM</span> users;

<span class="comment">-- Shartnomalar umumiy summasi</span>
<span class="keyword">SELECT</span> <span class="function">SUM</span>(product_price) <span class="keyword">FROM</span> contracts;

<span class="comment">-- O'rtacha yosh</span>
<span class="keyword">SELECT</span> <span class="function">AVG</span>(age) <span class="keyword">FROM</span> users;

<span class="comment">-- Eng katta va kichik summa</span>
<span class="keyword">SELECT</span> <span class="function">MAX</span>(product_price), <span class="function">MIN</span>(product_price) <span class="keyword">FROM</span> contracts;</code></pre>
        </section>

        <section class="card">
            <h2>4. GROUP BY — Guruhlash</h2>
            <pre><code><span class="comment">-- Har bir shahar uchun foydalanuvchilar soni</span>
<span class="keyword">SELECT</span> city, <span class="function">COUNT</span>(*) <span class="keyword">AS</span> user_count
<span class="keyword">FROM</span> users
<span class="keyword">GROUP BY</span> city;

<span class="comment">-- Har bir mijoz uchun shartnomalar summasi</span>
<span class="keyword">SELECT</span> client_id, <span class="function">SUM</span>(product_price) <span class="keyword">AS</span> total
<span class="keyword">FROM</span> contracts
<span class="keyword">GROUP BY</span> client_id;

<span class="comment">-- Bir nechta ustun bo'yicha guruhlash</span>
<span class="keyword">SELECT</span> city, gender, <span class="function">COUNT</span>(*) <span class="keyword">AS</span> count
<span class="keyword">FROM</span> users
<span class="keyword">GROUP BY</span> city, gender;</code></pre>

            <h3>4.1 HAVING — guruh uchun shart</h3>
            <pre><code><span class="comment">-- Faqat 5 tadan ko'p shartnoma tuzgan mijozlar</span>
<span class="keyword">SELECT</span> client_id, <span class="function">COUNT</span>(*) <span class="keyword">AS</span> contract_count
<span class="keyword">FROM</span> contracts
<span class="keyword">GROUP BY</span> client_id
<span class="keyword">HAVING</span> <span class="function">COUNT</span>(*) > 5;

<span class="comment">-- WHERE va HAVING birga</span>
<span class="keyword">SELECT</span> client_id, <span class="function">SUM</span>(product_price) <span class="keyword">AS</span> total
<span class="keyword">FROM</span> contracts
<span class="keyword">WHERE</span> closed = <span class="keyword">false</span>
<span class="keyword">GROUP BY</span> client_id
<span class="keyword">HAVING</span> <span class="function">SUM</span>(product_price) > 1000000;</code></pre>

            <blockquote class="note">
                <strong>Farqi:</strong> <code>WHERE</code> — qatorlarga shart beradi, <code>HAVING</code> — esa guruhlangan natijalarga shart beradi.
            </blockquote>
        </section>

        <section class="card">
            <h2>5. JOIN — Jadvallarni birlashtirish</h2>
            
            <h3>5.1 INNER JOIN — ikkalasida ham bor ma'lumotlar</h3>
            <pre><code><span class="comment">-- Faqat shartnomasi bor mijozlar</span>
<span class="keyword">SELECT</span> 
    users.name,
    contracts.product_price
<span class="keyword">FROM</span> users
<span class="keyword">INNER JOIN</span> contracts <span class="keyword">ON</span> contracts.client_id = users.id;</code></pre>

            <h3>5.2 LEFT JOIN — chap jadval to'liq, o'ngda yo'q bo'lsa NULL</h3>
            <pre><code><span class="comment">-- Shartnomasi bo'lmagan mijozlar ham chiqadi</span>
<span class="keyword">SELECT</span> 
    users.name,
    contracts.product_price   <span class="comment">-- shartnomasi yo'q bo'lsa NULL chiqadi</span>
<span class="keyword">FROM</span> users
<span class="keyword">LEFT JOIN</span> contracts <span class="keyword">ON</span> contracts.client_id = users.id;</code></pre>

            <h3>5.3 RIGHT JOIN — o'ng jadval to'liq</h3>
            <pre><code><span class="keyword">SELECT</span> 
    users.name,
    contracts.product_price
<span class="keyword">FROM</span> users
<span class="keyword">RIGHT JOIN</span> contracts <span class="keyword">ON</span> contracts.client_id = users.id;</code></pre>

            <h3>5.4 Bir nechta JOIN</h3>
            <pre><code><span class="keyword">SELECT</span> 
    users.name,
    contracts.product_price,
    product_categories.title    <span class="keyword">AS</span> category
<span class="keyword">FROM</span> users
<span class="keyword">INNER JOIN</span> contracts <span class="keyword">ON</span> contracts.client_id = users.id
<span class="keyword">INNER JOIN</span> contract_products <span class="keyword">ON</span> contract_products.contract_id = contracts.id
<span class="keyword">INNER JOIN</span> product_variants <span class="keyword">ON</span> product_variants.id = contract_products.product_variant_id
<span class="keyword">INNER JOIN</span> product_categories <span class="keyword">ON</span> product_categories.id = product_variants.product_category_id;</code></pre>

            <h3>5.5 JOIN da qo'shimcha shartlar</h3>
            <pre><code><span class="keyword">SELECT</span> *
<span class="keyword">FROM</span> initiative_clients ic
<span class="keyword">LEFT JOIN</span> contracts c <span class="keyword">ON</span> c.client_id = ic.involved_client_id
    <span class="keyword">AND</span> c.closed = <span class="keyword">false</span>                          <span class="comment">-- faqat ochiq shartnomalar</span>
    <span class="keyword">AND</span> c.organization_id <span class="keyword">IN</span> (1, 2, 3)            <span class="comment">-- faqat shu tashkilotlar</span>
    <span class="keyword">AND</span> c.date <span class="keyword">BETWEEN</span> <span class="string">'2025-01-01'</span> <span class="keyword">AND</span> <span class="string">'2025-12-31'</span>;</code></pre>

            <blockquote class="note">
                <strong>Muhim:</strong> JOIN dagi shart va WHERE dagi shart farq qiladi!<br>
                - <code>JOIN ON</code> ichida → <code>LEFT JOIN</code> bo'lsa NULL qatorlar saqlanadi.<br>
                - <code>WHERE</code> ichida → NULL qatorlar o'chiriladi va so'rov beixtiyor <code>INNER JOIN</code> ga aylanadi.
            </blockquote>
        </section>

        <section class="card">
            <h2>6. CASE — Shartli ifoda</h2>
            <pre><code><span class="comment">-- Oddiy CASE</span>
<span class="keyword">SELECT</span> 
    name,
    <span class="keyword">CASE</span> 
        <span class="keyword">WHEN</span> age >= 18 <span class="keyword">THEN</span> <span class="string">'Katta'</span>
        <span class="keyword">WHEN</span> age >= 13 <span class="keyword">THEN</span> <span class="string">'O\'smir'</span>
        <span class="keyword">ELSE</span>                <span class="string">'Bola'</span>
    <span class="keyword">END</span> <span class="keyword">AS</span> yosh_toifa
<span class="keyword">FROM</span> users;

<span class="comment">-- Agregat bilan CASE</span>
<span class="keyword">SELECT</span>
    <span class="function">SUM</span>(<span class="keyword">CASE</span> <span class="keyword">WHEN</span> is_collaboration = <span class="keyword">true</span>  <span class="keyword">THEN</span> product_price <span class="keyword">ELSE</span> 0 <span class="keyword">END</span>) <span class="keyword">AS</span> collab_sum,
    <span class="function">SUM</span>(<span class="keyword">CASE</span> <span class="keyword">WHEN</span> is_collaboration = <span class="keyword">false</span> <span class="keyword">THEN</span> product_price <span class="keyword">ELSE</span> 0 <span class="keyword">END</span>) <span class="keyword">AS</span> main_sum
<span class="keyword">FROM</span> contracts;

<span class="comment">-- COUNT bilan CASE</span>
<span class="keyword">SELECT</span>
    <span class="function">COUNT</span>(<span class="keyword">CASE</span> <span class="keyword">WHEN</span> status = <span class="string">'active'</span>   <span class="keyword">THEN</span> 1 <span class="keyword">END</span>) <span class="keyword">AS</span> active_count,
    <span class="function">COUNT</span>(<span class="keyword">CASE</span> <span class="keyword">WHEN</span> status = <span class="string">'inactive'</span> <span class="keyword">THEN</span> 1 <span class="keyword">END</span>) <span class="keyword">AS</span> inactive_count
<span class="keyword">FROM</span> users;</code></pre>
        </section>

        <section class="card">
            <h2>7. Subquery — So'rov ichida so'rov</h2>
            
            <h3>7.1 WHERE ichida subquery</h3>
            <pre><code><span class="comment">-- Eng ko'p shartnoma tuzgan mijoz</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users
<span class="keyword">WHERE</span> id = (
    <span class="keyword">SELECT</span> client_id 
    <span class="keyword">FROM</span> contracts 
    <span class="keyword">GROUP BY</span> client_id 
    <span class="keyword">ORDER BY</span> <span class="function">COUNT</span>(*) <span class="keyword">DESC</span> 
    <span class="keyword">LIMIT</span> 1
);

<span class="comment">-- Shartnomasi bor mijozlar</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users
<span class="keyword">WHERE</span> id <span class="keyword">IN</span> (
    <span class="keyword">SELECT</span> <span class="keyword">DISTINCT</span> client_id <span class="keyword">FROM</span> contracts
);</code></pre>

            <h3>7.2 SELECT ichida subquery (correlated)</h3>
            <pre><code><span class="comment">-- Har bir mijoz uchun shartnomalar soni</span>
<span class="keyword">SELECT</span> 
    users.name,
    (
        <span class="keyword">SELECT</span> <span class="function">COUNT</span>(*) 
        <span class="keyword">FROM</span> contracts 
        <span class="keyword">WHERE</span> contracts.client_id = users.id
    ) <span class="keyword">AS</span> contract_count
<span class="keyword">FROM</span> users;</code></pre>

            <h3>7.3 FROM ichida subquery</h3>
            <pre><code><span class="comment">-- Avval aggregate, keyin filter</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> (
    <span class="keyword">SELECT</span> 
        client_id,
        <span class="function">SUM</span>(product_price) <span class="keyword">AS</span> total
    <span class="keyword">FROM</span> contracts
    <span class="keyword">GROUP BY</span> client_id
) <span class="keyword">AS</span> client_totals
<span class="keyword">WHERE</span> total > 5000000;</code></pre>
        </section>

        <section class="card">
            <h2>8. DISTINCT — Takrorlanmaslik</h2>
            <pre><code><span class="comment">-- Noyob shaharlar</span>
<span class="keyword">SELECT</span> <span class="keyword">DISTINCT</span> city <span class="keyword">FROM</span> users;

<span class="comment">-- COUNT bilan</span>
<span class="keyword">SELECT</span> <span class="function">COUNT</span>(<span class="keyword">DISTINCT</span> city) <span class="keyword">FROM</span> users;

<span class="comment">-- PostgreSQL: DISTINCT ON — ustun bo'yicha birinchi qatorni olish</span>
<span class="keyword">SELECT DISTINCT ON</span> (client_id)
    client_id,
    product_price,
    created_at
<span class="keyword">FROM</span> contracts
<span class="keyword">ORDER BY</span> client_id, created_at <span class="keyword">DESC</span>;  <span class="comment">-- har bir mijoz uchun eng so'nggi shartnoma</span></code></pre>
        </section>

        <section class="card">
            <h2>9. String funksiyalar</h2>
            <pre><code><span class="comment">-- Birlashtirish</span>
<span class="keyword">SELECT</span> name || <span class="string">' '</span> || surname <span class="keyword">AS</span> full_name <span class="keyword">FROM</span> users;
<span class="keyword">SELECT</span> <span class="function">CONCAT</span>(name, <span class="string">' '</span>, surname) <span class="keyword">AS</span> full_name <span class="keyword">FROM</span> users;

<span class="comment">-- Katta/kichik harf</span>
<span class="keyword">SELECT</span> <span class="function">UPPER</span>(name) <span class="keyword">FROM</span> users;
<span class="keyword">SELECT</span> <span class="function">LOWER</span>(email) <span class="keyword">FROM</span> users;

<span class="comment">-- Uzunlik</span>
<span class="keyword">SELECT</span> <span class="function">LENGTH</span>(name) <span class="keyword">FROM</span> users;

<span class="comment">-- Qirqish (bo'shliqlarni olib tashlash)</span>
<span class="keyword">SELECT</span> <span class="function">TRIM</span>(name) <span class="keyword">FROM</span> users;

<span class="comment">-- Bir qismini olish</span>
<span class="keyword">SELECT</span> <span class="function">SUBSTRING</span>(phone, 1, 4) <span class="keyword">FROM</span> users;  <span class="comment">-- birinchi 4 belgi</span>

<span class="comment">-- Almashtirish</span>
<span class="keyword">SELECT</span> <span class="function">REPLACE</span>(phone, <span class="string">'+998'</span>, <span class="string">'998'</span>) <span class="keyword">FROM</span> users;</code></pre>
        </section>

        <section class="card">
            <h2>10. Sana funksiyalari (PostgreSQL)</h2>
            <pre><code><span class="comment">-- Hozirgi sana va vaqt</span>
<span class="keyword">SELECT</span> <span class="function">NOW</span>();
<span class="keyword">SELECT</span> <span class="function">CURRENT_DATE</span>;
<span class="keyword">SELECT</span> <span class="function">CURRENT_TIME</span>;

<span class="comment">-- Sana qismlari</span>
<span class="keyword">SELECT</span> <span class="function">EXTRACT</span>(YEAR  <span class="keyword">FROM</span> created_at) <span class="keyword">FROM</span> contracts;
<span class="keyword">SELECT</span> <span class="function">EXTRACT</span>(MONTH <span class="keyword">FROM</span> created_at) <span class="keyword">FROM</span> contracts;
<span class="keyword">SELECT</span> <span class="function">EXTRACT</span>(DAY   <span class="keyword">FROM</span> created_at) <span class="keyword">FROM</span> contracts;

<span class="comment">-- Sana formatlash</span>
<span class="keyword">SELECT</span> <span class="function">TO_CHAR</span>(created_at, <span class="string">'DD.MM.YYYY'</span>) <span class="keyword">FROM</span> contracts;
<span class="keyword">SELECT</span> <span class="function">TO_CHAR</span>(created_at, <span class="string">'YYYY-MM-DD HH24:MI:SS'</span>) <span class="keyword">FROM</span> contracts;

<span class="comment">-- Sana hisoblash</span>
<span class="keyword">SELECT</span> created_at + <span class="keyword">INTERVAL</span> <span class="string">'1 hour'</span>  <span class="keyword">FROM</span> contracts;
<span class="keyword">SELECT</span> created_at + <span class="keyword">INTERVAL</span> <span class="string">'1 day'</span>   <span class="keyword">FROM</span> contracts;
<span class="keyword">SELECT</span> created_at + <span class="keyword">INTERVAL</span> <span class="string">'1 month'</span> <span class="keyword">FROM</span> contracts;

<span class="comment">-- Ikki sana orasidagi farq</span>
<span class="keyword">SELECT</span> <span class="function">AGE</span>(end_date, start_date) <span class="keyword">FROM</span> contracts;

<span class="comment">-- Sana oralig'i</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> contracts <span class="keyword">WHERE</span> created_at <span class="keyword">BETWEEN</span> <span class="string">'2025-01-01'</span> <span class="keyword">AND</span> <span class="string">'2025-12-31'</span>;

<span class="comment">-- Faqat sana qismi bo'yicha solishtirish</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> contracts <span class="keyword">WHERE</span> created_at::date = <span class="string">'2025-01-01'</span>;</code></pre>
        </section>

        <section class="card">
            <h2>11. NULL bilan ishlash</h2>
            <pre><code><span class="comment">-- NULL tekshirish</span>
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> phone <span class="keyword">IS NULL</span>;
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> phone <span class="keyword">IS NOT NULL</span>;

<span class="comment">-- COALESCE — NULL bo'lsa default qiymat qaytaradi</span>
<span class="keyword">SELECT</span> <span class="function">COALESCE</span>(phone, <span class="string">'Noma\'lum'</span>) <span class="keyword">FROM</span> users;
<span class="keyword">SELECT</span> <span class="function">COALESCE</span>(price, 0) <span class="keyword">FROM</span> contracts;

<span class="comment">-- NULLIF — agar qiymatlar teng bo'lsa NULL qaytaradi</span>
<span class="keyword">SELECT</span> <span class="function">NULLIF</span>(stock, 0) <span class="keyword">FROM</span> products;  <span class="comment">-- 0 bo'lsa NULL beradi</span></code></pre>
        </section>

        <section class="card">
            <h2>12. string_agg va array_agg</h2>
            <pre><code><span class="comment">-- Har mijoz uchun shartnomalarni vergul bilan birlashtirish</span>
<span class="keyword">SELECT</span> 
    client_id,
    <span class="function">string_agg</span>(id::text, <span class="string">','</span>) <span class="keyword">AS</span> contract_ids
<span class="keyword">FROM</span> contracts
<span class="keyword">GROUP BY</span> client_id;

<span class="comment">-- Tartib bilan jamlash</span>
<span class="keyword">SELECT</span> 
    client_id,
    <span class="function">string_agg</span>(id::text, <span class="string">','</span> <span class="keyword">ORDER BY</span> created_at) <span class="keyword">AS</span> contract_ids
<span class="keyword">FROM</span> contracts
<span class="keyword">GROUP BY</span> client_id;

<span class="comment">-- Murakkab format (id|narx|kategoriya)</span>
<span class="keyword">SELECT</span>
    client_id,
    <span class="function">string_agg</span>(
        <span class="keyword">DISTINCT</span> id::text || <span class="string">'|'</span> || product_price::text || <span class="string">'|'</span> || status,
        <span class="string">','</span>
    ) <span class="keyword">AS</span> contract_pairs
<span class="keyword">FROM</span> contracts
<span class="keyword">GROUP BY</span> client_id;

<span class="comment">-- Array (massiv) sifatida yig'ish</span>
<span class="keyword">SELECT</span> 
    client_id,
    <span class="function">array_agg</span>(<span class="keyword">DISTINCT</span> id) <span class="keyword">AS</span> contract_ids
<span class="keyword">FROM</span> contracts
<span class="keyword">GROUP BY</span> client_id;</code></pre>
        </section>

        <section class="card">
            <h2>13. CTE — WITH clause (Umumiy jadval ifodasi)</h2>
            <pre><code><span class="comment">-- Oddiy CTE</span>
<span class="keyword">WITH</span> active_contracts <span class="keyword">AS</span> (
    <span class="keyword">SELECT</span> * <span class="keyword">FROM</span> contracts <span class="keyword">WHERE</span> closed = <span class="keyword">false</span>
)
<span class="keyword">SELECT</span> * <span class="keyword">FROM</span> active_contracts <span class="keyword">WHERE</span> product_price > 1000000;

<span class="comment">-- Bir nechta CTE birgalikda</span>
<span class="keyword">WITH</span> 
active_users <span class="keyword">AS</span> (
    <span class="keyword">SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> status = <span class="string">'active'</span>
),
user_contracts <span class="keyword">AS</span> (
    <span class="keyword">SELECT</span> 
        client_id, 
        <span class="function">COUNT</span>(*) <span class="keyword">AS</span> contract_count
    <span class="keyword">FROM</span> contracts
    <span class="keyword">GROUP BY</span> client_id
)
<span class="keyword">SELECT</span> 
    active_users.name,
    user_contracts.contract_count
<span class="keyword">FROM</span> active_users
<span class="keyword">LEFT JOIN</span> user_contracts <span class="keyword">ON</span> user_contracts.client_id = active_users.id;</code></pre>
        </section>

        <section class="card">
            <h2>14. Window funksiyalari</h2>
            <pre><code><span class="comment">-- ROW_NUMBER — umumiy tartib raqami</span>
<span class="keyword">SELECT</span> 
    name,
    product_price,
    <span class="function">ROW_NUMBER</span>() <span class="keyword">OVER</span> (<span class="keyword">ORDER BY</span> product_price <span class="keyword">DESC</span>) <span class="keyword">AS</span> rank
<span class="keyword">FROM</span> contracts;

<span class="comment">-- Guruh ichida ichki tartib raqami berish</span>
<span class="keyword">SELECT</span> 
    client_id,
    product_price,
    <span class="function">ROW_NUMBER</span>() <span class="keyword">OVER</span> (<span class="keyword">PARTITION BY</span> client_id <span class="keyword">ORDER BY</span> created_at <span class="keyword">DESC</span>) <span class="keyword">AS</span> rn
<span class="keyword">FROM</span> contracts;

<span class="comment">-- Joriy va oldingi/keyingi qiymatlarni taqqoslash</span>
<span class="keyword">SELECT</span> 
    date,
    product_price,
    <span class="function">LAG</span>(product_price)  <span class="keyword">OVER</span> (<span class="keyword">ORDER BY</span> date) <span class="keyword">AS</span> prev_price,
    <span class="function">LEAD</span>(product_price) <span class="keyword">OVER</span> (<span class="keyword">ORDER BY</span> date) <span class="keyword">AS</span> next_price
<span class="keyword">FROM</span> contracts;

<span class="comment">-- O'suvchi yig'indi (running total)</span>
<span class="keyword">SELECT</span> 
    date,
    product_price,
    <span class="function">SUM</span>(product_price) <span class="keyword">OVER</span> (<span class="keyword">ORDER BY</span> date) <span class="keyword">AS</span> running_total
<span class="keyword">FROM</span> contracts;</code></pre>
        </section>

        <section class="card">
            <h2>15. INSERT, UPDATE, DELETE</h2>
            <pre><code><span class="comment">-- Bitta qator qo'shish</span>
<span class="keyword">INSERT INTO</span> users (name, email, age) <span class="keyword">VALUES</span> (<span class="string">'Ali'</span>, <span class="string">'ali@mail.com'</span>, 25);

<span class="comment">-- Bir nechta qatorlarni bir marta qo'shish</span>
<span class="keyword">INSERT INTO</span> users (name, email, age) <span class="keyword">VALUES</span>
    (<span class="string">'Vali'</span>, <span class="string">'vali@mail.com'</span>, 30),
    (<span class="string">'Soli'</span>, <span class="string">'soli@mail.com'</span>, 22);

<span class="comment">-- Ma'lumotni o'zgartirish (UPDATE)</span>
<span class="keyword">UPDATE</span> users <span class="keyword">SET</span> name = <span class="string">'Yangi Ism'</span>, age = 26 <span class="keyword">WHERE</span> id = 1;

<span class="comment">-- Ma'lumotni o'chirish (DELETE)</span>
<span class="keyword">DELETE FROM</span> users <span class="keyword">WHERE</span> id = 1;

<span class="comment">-- Barcha qatorlarni o'chirish (Ehtiyot bo'ling!)</span>
<span class="keyword">DELETE FROM</span> users;

<span class="comment">-- Butunlay jadvalni tozalash va kesish (Tezroq ishlaydi)</span>
<span class="keyword">TRUNCATE TABLE</span> users;</code></pre>
        </section>

        <section class="card">
            <h2>16. Index — So'rovlarni tezlashtirish</h2>
            <pre><code><span class="comment">-- Oddiy indeks yaratish</span>
<span class="keyword">CREATE INDEX</span> idx_users_email <span class="keyword">ON</span> users(email);

<span class="comment">-- Unikal (takrorlanmas) indeks yaratish</span>
<span class="keyword">CREATE UNIQUE INDEX</span> idx_users_email <span class="keyword">ON</span> users(email);

<span class="comment">-- Kompozit (bir nechta ustunli) indeks</span>
<span class="keyword">CREATE INDEX</span> idx_contracts_client_date <span class="keyword">ON</span> contracts(client_id, date);

<span class="comment">-- Indeksni o'chirish</span>
<span class="keyword">DROP INDEX</span> idx_users_email;</code></pre>
        </section>

        <section class="card">
            <h2>17. Amaliy — Murakkab so'rov namunasi</h2>
            <p>Har bir reklama agenti uchun kod berilgan mijozlar, shartnomalar soni, jami summa va hamkorlik turlari bo'yicha hisobot:</p>
            <pre><code><span class="keyword">WITH</span> contract_stats <span class="keyword">AS</span> (
    <span class="keyword">SELECT </span>
        c.client_id,
        <span class="function">COUNT</span>(<span class="keyword">DISTINCT</span> c.id)                                                         <span class="keyword">AS</span> contracts_count,
        <span class="function">SUM</span>(c.product_price)                                                         <span class="keyword">AS</span> total_price,
        <span class="function">COUNT</span>(<span class="keyword">DISTINCT DISTINCT CASE WHEN</span> pc.is_collaboration = <span class="keyword">true</span>  <span class="keyword">THEN</span> c.id <span class="keyword">END</span>)          <span class="keyword">AS</span> collab_count,
        <span class="function">SUM</span>(<span class="keyword">CASE WHEN</span> pc.is_collaboration = <span class="keyword">true</span>  <span class="keyword">THEN</span> c.product_price <span class="keyword">ELSE</span> 0 <span class="keyword">END</span>)   <span class="keyword">AS</span> collab_sum,
        <span class="function">COUNT</span>(<span class="keyword">DISTINCT CASE WHEN</span> pc.is_collaboration = <span class="keyword">false</span> <span class="keyword">THEN</span> c.id <span class="keyword">END</span>)          <span class="keyword">AS</span> main_count,
        <span class="function">SUM</span>(<span class="keyword">CASE WHEN</span> pc.is_collaboration = <span class="keyword">false</span> <span class="keyword">THEN</span> c.product_price <span class="keyword">ELSE</span> 0 <span class="keyword">END</span>)   <span class="keyword">AS</span> main_sum
    <span class="keyword">FROM</span> contracts c
    <span class="keyword">INNER JOIN</span> contract_products  cp <span class="keyword">ON</span> cp.contract_id        = c.id
    <span class="keyword">INNER JOIN</span> product_variants   pv <span class="keyword">ON</span> pv.id                 = cp.product_variant_id
    <span class="keyword">INNER JOIN</span> product_categories pc <span class="keyword">ON</span> pc.id                 = pv.product_category_id
    <span class="keyword">WHERE</span> c.closed = <span class="keyword">false</span>
      <span class="keyword">AND</span> c.organization_id <span class="keyword">IN</span> (1, 2, 3)
      <span class="keyword">AND</span> c.date <span class="keyword">BETWEEN</span> <span class="string">'2025-01-01'</span> <span class="keyword">AND</span> <span class="string">'2025-12-31'</span>
    <span class="keyword">GROUP BY</span> c.client_id
)
<span class="keyword">SELECT</span>
    ic.client_id,
    u.name                                  <span class="keyword">AS</span> agent_name,
    <span class="function">COUNT</span>(<span class="keyword">DISTINCT</span> ic.involved_client_id)   <span class="keyword">AS</span> given_code_count,
    <span class="function">COUNT</span>(<span class="keyword">DISTINCT</span> itc.attacted_client_id)  <span class="keyword">AS</span> came_via_code_count,
    <span class="function">COALESCE</span>(cs.contracts_count, 0)         <span class="keyword">AS</span> contracts_count,
    <span class="function">COALESCE</span>(cs.total_price, 0)             <span class="keyword">AS</span> total_price,
    <span class="function">COALESCE</span>(cs.collab_count, 0)            <span class="keyword">AS</span> collab_count,
    <span class="function">COALESCE</span>(cs.collab_sum, 0)              <span class="keyword">AS</span> collab_sum,
    <span class="function">COALESCE</span>(cs.main_count, 0)              <span class="keyword">AS</span> main_count,
    <span class="function">COALESCE</span>(cs.main_sum, 0)               <span class="keyword">AS</span> main_sum
<span class="keyword">FROM</span> initiative_clients ic
<span class="keyword">INNER JOIN</span> users u <span class="keyword">ON</span> u.id = ic.client_id
<span class="keyword">LEFT JOIN</span> initiative_telegram_codes itc 
    <span class="keyword">ON</span> itc.client_id          = ic.client_id
    <span class="keyword">AND</span> itc.attacted_client_id = ic.involved_client_id
<span class="keyword">LEFT JOIN</span> contract_stats cs <span class="keyword">ON</span> cs.client_id = ic.involved_client_id
<span class="keyword">WHERE</span> ic.organization_id <span class="keyword">IN</span> (1, 2, 3)
  <span class="keyword">AND</span> ic.created_at::date <span class="keyword">BETWEEN</span> <span class="string">'2025-01-01'</span> <span class="keyword">AND</span> <span class="string">'2025-12-31'</span>
  <span class="keyword">AND</span> ic.checked = <span class="keyword">true</span>
<span class="keyword">GROUP BY</span> ic.client_id, u.name, cs.contracts_count, cs.total_price,
         cs.collab_count, cs.collab_sum, cs.main_count, cs.main_sum
<span class="keyword">ORDER BY</span> total_price <span class="keyword">DESC</span>;</code></pre>
        </section>

        <section class="card">
            <h2>18. Xato qilmaslik uchun asosiy qoidalar</h2>
            
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>✅ To'g'ri yondashuv</th>
                            <th>❌ Keng tarqalgan xato</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>LEFT JOIN</code> + <code>ON</code> ichida qo'shimcha shart yozish</td>
                            <td><code>LEFT JOIN</code> + <code>WHERE</code> ichida shart berish (INNER ga aylanadi)</td>
                        </tr>
                        <tr>
                            <td><code>COUNT(DISTINCT id)</code> takrorlanishlarni cheklash uchun</td>
                            <td><code>COUNT(*)</code> ishlatish (agar dublikatlar bo'lsa xato hisoblaydi)</td>
                        </tr>
                        <tr>
                            <td><code>COALESCE(sum, 0)</code> qiymat yo'q joyda 0 chiqarish</td>
                            <td>NULL qiymatlar bilan arifmetik hisob-kitob qilish</td>
                        </tr>
                        <tr>
                            <td><code>GROUP BY</code> da barcha aggregate qilinmagan ustunlarni yozish</td>
                            <td><code>GROUP BY</code> ro'yxatidan kerakli ustunlarni tushirib qoldirish</td>
                        </tr>
                        <tr>
                            <td><code>SUM</code> ni subquery ichida guruhlab keyin birlashtirish</td>
                            <td><code>SUM</code> ni sarlavha darajasida to'g'ridan-to'g'ri JOIN bilan yozish (dublikat hosil qiladi)</td>
                        </tr>
                        <tr>
                            <td><code>WHERE date::date = '...'</code> faqat kunni solishtirish uchun</td>
                            <td><code>WHERE date = '...'</code> (vaqt formati tufayli topolmasligi mumkin)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="card">
            <h2>19. Foydali qisqartmalar va buyruqlar (PostgreSQL)</h2>
            <pre><code><span class="comment">-- So'rov qanday bajarilishini ko'rish (Query Plan)</span>
<span class="keyword">EXPLAIN SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> id = 1;
<span class="keyword">EXPLAIN ANALYZE SELECT</span> * <span class="keyword">FROM</span> users <span class="keyword">WHERE</span> id = 1;

<span class="comment">-- Jadval tuzilishini ko'rish (Terminalda)</span>
\d users

<span class="comment">-- Bazadagi barcha jadvallar ro'yxati</span>
\dt

<span class="comment">-- So'rov ketgan vaqtni hisoblash rejimini yoqish</span>
\timing on</code></pre>
        </section>

    </main>

    <footer class="main-footer">
        <p>&copy; 2026 SQL Qo'llanma | Ma'lumotlar bazasi texnologiyalari darsligi</p>
    </footer>

</body>
</html>