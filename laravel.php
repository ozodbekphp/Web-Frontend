<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel ORM (Eloquent & Query Builder) — To'liq Qo'llanma</title>
    <link rel="stylesheet" href="laravel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Chap panel: Navigatsiya -->
    <nav class="sidebar">
        <a href="#" class="brand">
            <svg width="24" height="28" viewBox="0 0 62 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M57.56 16.27L33.78 2.54a5.3 5.3 0 00-5.3 0L4.7 16.27a5.3 5.3 0 00-2.65 4.6v27.46a5.3 5.3 0 002.65 4.6l23.78 13.73a5.3 5.3 0 005.3 0l23.78-13.73a5.3 5.3 0 002.65-4.6V20.87a5.3 5.3 0 00-2.65-4.6z" fill="#FF2D20"/></svg>
            Laravel<span>ORM</span>
        </a>

        <h3>1. Farqlar</h3>
        <ul>
            <li><a href="#section-1">Query Builder vs Eloquent</a></li>
        </ul>

        <h3>2. Query Builder Asoslari</h3>
        <ul>
            <li><a href="#section-2-1">2.1 SELECT</a></li>
            <li><a href="#section-2-2">2.2 WHERE</a></li>
            <li><a href="#section-2-3">2.3 ORDER BY</a></li>
            <li><a href="#section-2-4">2.4 LIMIT / OFFSET</a></li>
        </ul>

        <h3>3-11. Kengaytirilgan SQL</h3>
        <ul>
            <li><a href="#section-3">3. Agregat funksiyalar</a></li>
            <li><a href="#section-4">4. GROUP BY / HAVING</a></li>
            <li><a href="#section-5">5. JOIN Turlari</a></li>
            <li><a href="#section-6">6. CASE WHEN</a></li>
            <li><a href="#section-7">7. Subquery</a></li>
            <li><a href="#section-8">8. DB::raw yozish</a></li>
            <li><a href="#section-9">9. DISTINCT</a></li>
            <li><a href="#section-10">10. String funksiyalar</a></li>
            <li><a href="#section-11">11. Sana bilan ishlash</a></li>
        </ul>

        <h3>12-14. CUD Amallari</h3>
        <ul>
            <li><a href="#section-12">12. INSERT</a></li>
            <li><a href="#section-13">13. UPDATE</a></li>
            <li><a href="#section-14">14. DELETE</a></li>
        </ul>

        <h3>15-18. Eloquent ORM</h3>
        <ul>
            <li><a href="#section-15">15. Model & SELECT</a></li>
            <li><a href="#section-16">16. Relationships</a></li>
            <li><a href="#section-17">17. Eager Loading</a></li>
            <li><a href="#section-18">18. Lazy vs Eager</a></li>
        </ul>

        <h3>19-24. Ekspert darajasi</h3>
        <ul>
            <li><a href="#section-19">19. Scope Shartlari</a></li>
            <li><a href="#section-20">20. Chunk & Lazy</a></li>
            <li><a href="#section-21">21. Transactions</a></li>
            <li><a href="#section-22">22. Amaliy Hisobot</a></li>
            <li><a href="#section-23">23. Foydali metodlar</a></li>
            <li><a href="#section-24">24. Oltin qoidalar</a></li>
        </ul>
    </nav>

    <!-- O'ng panel: Asosiy tarkib -->
    <main class="main-content">
        <header class="header-doc">
            <h1>Laravel ORM (Eloquent & Query Builder)</h1>
            <p>Ma'lumotlar bazasi so'rovlarini boshqarish, optimallashtirish va professional loyihalar uchun yozilgan to'liq va mukammal o'zbekcha qo'llanma.</p>
        </header>

        <!-- 1-Bo'lim -->
        <section id="section-1">
            <h2>1. Query Builder vs Eloquent</h2>
            <table>
                <thead>
                    <tr>
                        <th>Xususiyat</th>
                        <th>Query Builder</th>
                        <th>Eloquent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Ishlatish</strong></td>
                        <td><code>DB::table('users')</code></td>
                        <td><code>User::query()</code></td>
                    </tr>
                    <tr>
                        <td><strong>Model kerakmi</strong></td>
                        <td>Yo'q</td>
                        <td>Ha</td>
                    </tr>
                    <tr>
                        <td><strong>Tezlik</strong></td>
                        <td>Tezroq</td>
                        <td>Biroz sekinroq</td>
                    </tr>
                    <tr>
                        <td><strong>Relation</strong></td>
                        <td>Yo'q</td>
                        <td>Bor (<code>hasMany</code>, <code>belongsTo</code>)</td>
                    </tr>
                    <tr>
                        <td><strong>Qachon ishlatish</strong></td>
                        <td>Murakkab SQL, yirik hisobotlar</td>
                        <td>Oddiy va tezkor CRUD amallari</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- 2.1-Bo'lim -->
        <section id="section-2-1">
            <h2>2. Query Builder — Asoslar</h2>
            <h3>2.1 SELECT Amallari</h3>
<pre><code>// Barcha qatorlar
DB::table('users')->get();

// Bitta qator
DB::table('users')->first();
DB::table('users')->find(1);          // id = 1

// Bitta ustun qiymati
DB::table('users')->value('name');    // birinchi qatorning name si

// Faqat kerakli ustunlar
DB::table('users')->select('id', 'name', 'email')->get();

// Alias (Taxallus) berish
DB::table('users')
    ->select('id as user_id', 'name as full_name')
    ->get();

// DB::raw bilan ishlash
DB::table('users')
    ->select(DB::raw('COUNT(*) as user_count, city'))
    ->get();

// addSelect — keyinchalik dinamik ustun qo'shish
DB::table('users')
    ->select('name')
    ->addSelect('email')
    ->get();</code></pre>
        </section>

        <!-- 2.2-Bo'lim -->
        <section id="section-2-2">
            <h3>2.2 WHERE Shartlari</h3>
<pre><code>// Oddiy tenglik
DB::table('users')->where('id', 1)->get();
DB::table('users')->where('name', '=', 'Ali')->get();

// Operatorlar
DB::table('users')->where('age', '>', 18)->get();
DB::table('users')->where('age', '>=', 18)->get();
DB::table('users')->where('age', '<', 30)->get();
DB::table('users')->where('age', '!=', 25)->get();
DB::table('users')->where('name', 'like', 'Ali%')->get();

// AND — where zanjiri
DB::table('users')
    ->where('age', '>', 18)
    ->where('city', 'Toshkent')
    ->get();

// OR sharti
DB::table('users')
    ->where('city', 'Toshkent')
    ->orWhere('city', 'Samarqand')
    ->get();

// orWhere guruhlash (Qavs mantiqi)
DB::table('users')
    ->where('status', 'active')
    ->where(function ($query) {
        $query->where('city', 'Toshkent')
              ->orWhere('city', 'Samarqand');
    })
    ->get();

// BETWEEN (Oraliq)
DB::table('users')->whereBetween('age', [18, 30])->get();
DB::table('users')->whereNotBetween('age', [18, 30])->get();

// IN (Massiv ichidan qidirish)
DB::table('users')->whereIn('id', [1, 2, 3])->get();
DB::table('users')->whereNotIn('id', [1, 2, 3])->get();

// NULL qiymatlarni tekshirish
DB::table('users')->whereNull('phone')->get();
DB::table('users')->whereNotNull('phone')->get();

// Sana bilan filtrlash
DB::table('contracts')->whereDate('created_at', '2025-01-01')->get();
DB::table('contracts')->whereMonth('created_at', 1)->get();
DB::table('contracts')->whereYear('created_at', 2025)->get();
DB::table('contracts')->whereDay('created_at', 15)->get();

// Ustunlarni o'zaro solishtirish
DB::table('contracts')
    ->whereColumn('created_at', '<', 'updated_at')
    ->get();

// RAW where (Murakkab SQL shartlar)
DB::table('contracts')
    ->whereRaw("created_at >= ? + INTERVAL '1 hour'", ['2025-01-01'])
    ->get();</code></pre>
        </section>

        <!-- 2.3-Bo'lim -->
        <section id="section-2-3">
            <h3>2.3 ORDER BY (Saralash)</h3>
<pre><code>DB::table('users')->orderBy('name')->get();              // ASC (default)
DB::table('users')->orderBy('name', 'asc')->get();
DB::table('users')->orderBy('created_at', 'desc')->get();

// Bir nechta ustun bo'yicha saralash
DB::table('users')
    ->orderBy('city')
    ->orderBy('name', 'desc')
    ->get();

// RAW tartiblash
DB::table('users')
    ->orderByRaw('COALESCE(name, surname) ASC')
    ->get();

// Latest / Oldest (created_at bo'yicha tayyor metodlar)
DB::table('users')->latest()->get();       // created_at DESC
DB::table('users')->oldest()->get();       // created_at ASC

// Boshqa ustun bo'yicha eng so'nggisini olish
DB::table('users')->latest('updated_at')->get();</code></pre>
        </section>

        <!-- 2.4-Bo'lim -->
        <section id="section-2-4">
            <h3>2.4 LIMIT / OFFSET (Ma'lumot hajmini cheklash)</h3>
<pre><code>DB::table('users')->limit(10)->get();
DB::table('users')->take(10)->get();        // limit() bilan bir xil

// Sahifalash uchun siljitish
DB::table('users')->offset(20)->limit(10)->get();
DB::table('users')->skip(20)->take(10)->get();  // yuqoridagi bilan bir xil

// Avtomatik Pagination (Sahifalarga bo'lish)
DB::table('users')->paginate(15);           // To'liq sahifalash linklari bilan
DB::table('users')->simplePaginate(15);     // Faqat "Oldingi/Keyingi" tugmalari uchun</code></pre>
        </section>

        <!-- 3-Bo'lim -->
        <section id="section-3">
            <h2>3. Agregat funksiyalar</h2>
<pre><code>DB::table('users')->count();
DB::table('users')->count('email');              // Faqat NULL bo'lmaganlar soni
DB::table('contracts')->sum('product_price');
DB::table('users')->avg('age');
DB::table('contracts')->max('product_price');
DB::table('contracts')->min('product_price');

// WHERE sharti bilan birga hisoblash
DB::table('contracts')
    ->where('closed', false)
    ->sum('product_price');

// exists / doesntExist (Ma'lumot bor yoki yo'qligini tezkor tekshirish)
DB::table('users')->where('email', 'ali@mail.com')->exists();
DB::table('users')->where('email', 'ali@mail.com')->doesntExist();</code></pre>
        </section>

        <!-- 4-Bo'lim -->
        <section id="section-4">
            <h2>4. GROUP BY / HAVING (Guruhlash va guruh ichida filtrlash)</h2>
<pre><code>// Oddiy GROUP BY
DB::table('contracts')
    ->select('client_id', DB::raw('COUNT(*) as count'))
    ->groupBy('client_id')
    ->get();

// HAVING sharti
DB::table('contracts')
    ->select('client_id', DB::raw('COUNT(*) as count'))
    ->groupBy('client_id')
    ->having('count', '>', 5)
    ->get();

// havingRaw yozish
DB::table('contracts')
    ->select('client_id', DB::raw('SUM(product_price) as total'))
    ->groupBy('client_id')
    ->havingRaw('SUM(product_price) > ?', [1000000])
    ->get();

// Bir nechta ustun bo'yicha GROUP BY
DB::table('contracts')
    ->select('organization_id', 'client_id', DB::raw('COUNT(*) as count'))
    ->groupBy('organization_id', 'client_id')
    ->get();</code></pre>
        </section>

        <!-- 5-Bo'lim -->
        <section id="section-5">
            <h2>5. JOIN (Jadvallarni birlashtirish)</h2>
            <h3>5.1 INNER JOIN</h3>
<pre><code>DB::table('users')
    ->join('contracts', 'contracts.client_id', '=', 'users.id')
    ->select('users.name', 'contracts.product_price')
    ->get();</code></pre>

            <h3>5.2 LEFT JOIN</h3>
<pre><code>DB::table('users')
    ->leftJoin('contracts', 'contracts.client_id', '=', 'users.id')
    ->select('users.name', 'contracts.product_price')
    ->get();</code></pre>

            <h3>5.3 RIGHT JOIN</h3>
<pre><code>DB::table('users')
    ->rightJoin('contracts', 'contracts.client_id', '=', 'users.id')
    ->get();</code></pre>

            <h3>5.4 JOIN ichida qo'shimcha murakkab shartlar</h3>
<pre><code>DB::table('initiative_clients')
    ->leftJoin('contracts', function ($join) use ($date, $organizationIds) {
        $join->on('contracts.client_id', '=', 'initiative_clients.involved_client_id')
             ->where('contracts.closed', false)
             ->whereIn('contracts.organization_id', $organizationIds)
             ->whereBetween('contracts.date', $date)
             ->whereRaw("contracts.created_at >= initiative_clients.created_at + INTERVAL '1 hour'");
    })
    ->get();</code></pre>

            <h3>5.5 JOIN da Alias ishlatish</h3>
<pre><code>DB::table('users as u')
    ->join('contracts as c', 'c.client_id', '=', 'u.id')
    ->select('u.name', 'c.product_price')
    ->get();</code></pre>

            <h3>5.6 Subquery (Ichki so'rov) JOIN qilish</h3>
<pre><code>$contractStats = DB::table('contracts')
    ->select('client_id', DB::raw('SUM(product_price) as total'))
    ->where('closed', false)
    ->groupBy('client_id');

DB::table('users')
    ->leftJoin(
        DB::raw('(' . $contractStats->toSql() . ') as cs'),
        function ($join) use ($contractStats) {
            $join->on('cs.client_id', '=', 'users.id')
                 ->addBinding($contractStats->getBindings(), 'join');
        }
    )
    ->select('users.name', 'cs.total')
    ->get();</code></pre>

            <h3>5.7 CROSS JOIN</h3>
<pre><code>DB::table('colors')->crossJoin('sizes')->get();</code></pre>
        </section>

        <!-- 6-Bo'lim -->
        <section id="section-6">
            <h2>6. CASE WHEN — DB::raw bilan virtual ustunlar ochish</h2>
<pre><code>// SELECT ichida qiymatga qarab toifa berish
DB::table('users')
    ->select([
        'name',
        DB::raw("
            CASE 
                WHEN age >= 18 THEN 'Katta'
                WHEN age >= 13 THEN 'O''smir'
                ELSE 'Bola'
            END AS yosh_toifa
        ")
    ])
    ->get();

// SUM + CASE (Shartli hisob-kitoblar)
DB::table('contracts')
    ->select([
        DB::raw('SUM(CASE WHEN is_collaboration = true  THEN product_price ELSE 0 END) AS collab_sum'),
        DB::raw('SUM(CASE WHEN is_collaboration = false THEN product_price ELSE 0 END) AS main_sum'),
    ])
    ->get();

// COUNT + CASE
DB::table('contracts')
    ->select([
        DB::raw("COUNT(CASE WHEN status = 'active'   THEN 1 END) AS active_count"),
        DB::raw("COUNT(CASE WHEN status = 'inactive' THEN 1 END) AS inactive_count"),
    ])
    ->get();

// COUNT DISTINCT + CASE
DB::table('contracts')
    ->select([
        DB::raw('COUNT(DISTINCT CASE WHEN closed = false THEN client_id END) AS open_clients'),
    ])
    ->get();</code></pre>
        </section>

        <!-- 7-Bo'lim -->
        <section id="section-7">
            <h2>7. Subquery (Ichki so'rovlar)</h2>
            <h3>7.1 WHERE ichida subquery</h3>
<pre><code>// whereIn + subquery
DB::table('users')
    ->whereIn('id', function ($query) {
        $query->select('client_id')->from('contracts');
    })
    ->get();

// where + subquery
DB::table('users')
    ->where('id', function ($query) {
        $query->select('client_id')
              ->from('contracts')
              ->orderByDesc('product_price')
              ->limit(1);
    })
    ->get();</code></pre>

            <h3>7.2 SELECT ichida subquery (Correlated subquery)</h3>
<pre><code>DB::table('users')
    ->select([
        'users.id',
        'users.name',
        DB::raw('(
            SELECT COUNT(*) 
            FROM contracts 
            WHERE contracts.client_id = users.id 
              AND contracts.closed = false
        ) AS contract_count'),
        
        DB::raw('(
            SELECT COALESCE(SUM(product_price), 0)
            FROM contracts
            WHERE contracts.client_id = users.id
        ) AS total_price'),
    ])
    ->get();</code></pre>

            <h3>7.3 FROM ichida subquery</h3>
<pre><code>$sub = DB::table('contracts')
    ->select('client_id', DB::raw('SUM(product_price) as total'))
    ->groupBy('client_id');

DB::table(DB::raw('(' . $sub->toSql() . ') as sub'))
    ->mergeBindings($sub)
    ->where('total', '>', 5000000)
    ->get();</code></pre>
        </section>

        <!-- 8-Bo'lim -->
        <section id="section-8">
            <h2>8. DB::raw — To'g'ridan-to'g'ri SQL kod yozish metodlari</h2>
<pre><code>// Umumiy namunalar
DB::raw('COUNT(*) as count')
DB::raw('SUM(product_price) as total')
DB::raw('COALESCE(SUM(product_price), 0) as total')
DB::raw('COUNT(DISTINCT client_id) as unique_clients')

// selectRaw
DB::table('contracts')
    ->selectRaw('COUNT(*) as count, SUM(product_price) as total')
    ->get();

// whereRaw — SQL injection xavfisiz, binding yordamida yozish
DB::table('contracts')
    ->whereRaw('product_price > ? AND closed = ?', [1000000, false])
    ->get();

// orderByRaw
DB::table('users')
    ->orderByRaw('COALESCE(name, surname) ASC')
    ->get();

// groupByRaw
DB::table('contracts')
    ->selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count')
    ->groupByRaw('EXTRACT(MONTH FROM created_at)')
    ->get();

// havingRaw
DB::table('contracts')
    ->selectRaw('client_id, SUM(product_price) as total')
    ->groupBy('client_id')
    ->havingRaw('SUM(product_price) > ?', [1000000])
    ->get();</code></pre>
        </section>

        <!-- 9-Bo'lim -->
        <section id="section-9">
            <h2>9. DISTINCT (Takrorlanishlarni oldini olish)</h2>
<pre><code>DB::table('users')->distinct()->select('city')->get();

// COUNT DISTINCT
DB::table('users')
    ->select(DB::raw('COUNT(DISTINCT city) as city_count'))
    ->get();

// selectRaw yordamida yozilishi
DB::table('contracts')
    ->selectRaw('COUNT(DISTINCT client_id) as unique_clients')
    ->get();</code></pre>
        </section>

        <!-- 10-Bo'lim -->
        <section id="section-10">
            <h2>10. String funksiyalar (Matnlar bilan ishlash)</h2>
<pre><code>// Standart CONCAT
DB::table('users')
    ->select(DB::raw("CONCAT(name, ' ', surname) AS full_name"))
    ->get();

// || Operator orqali birlashtirish (PostgreSQL uchun)
DB::table('users')
    ->select(DB::raw("name || ' ' || surname AS full_name"))
    ->get();

// string_agg yordamida qatorlarni bitta matnga birlashtirish (PostgreSQL)
DB::table('contracts')
    ->select([
        'client_id',
        DB::raw("string_agg(id::text, ',') AS contract_ids"),
    ])
    ->groupBy('client_id')
    ->get();

// Murakkab string_agg strukturasi
DB::table('contracts')
    ->select([
        'client_id',
        DB::raw("string_agg(DISTINCT id::text || '|' || COALESCE(status, 'unknown') || '|' || product_price::text, ',') AS contract_pairs"),
    ])
    ->groupBy('client_id')
    ->get();

// UPPER / LOWER (Katta-kichik harflarga o'tkazish)
DB::table('users')
    ->select(DB::raw('UPPER(name) as name'))
    ->get();

// COALESCE — Agar ustun NULL bo'lsa standart matn chiqarish
DB::table('users')
    ->select(DB::raw("COALESCE(phone, 'Noma''lum') as phone"))
    ->get();</code></pre>
        </section>

        <!-- 11-Bo'lim -->
        <section id="section-11">
            <h2>11. Sana bilan ishlash (Date Functions)</h2>
<pre><code>// Sanani taqqoslash
DB::table('contracts')->whereDate('created_at', '2025-01-01')->get();
DB::table('contracts')->whereDate('created_at', '>=', '2025-01-01')->get();

// Sanalar oralig'ini qidirish
DB::table('contracts')
    ->whereBetween('date', ['2025-01-01', '2025-12-31'])
    ->get();

// Alohida oy, yil va kun filtrlari
DB::table('contracts')->whereMonth('created_at', 1)->get();
DB::table('contracts')->whereYear('created_at', 2025)->get();
DB::table('contracts')->whereDay('created_at', 15)->get();

// PostgreSQL INTERVAL yordamida vaqt ayirish
DB::table('contracts')
    ->whereRaw("created_at >= NOW() - INTERVAL '1 month'")
    ->get();

DB::table('initiative_clients')
    ->whereRaw("contracts.created_at >= initiative_clients.created_at + INTERVAL '1 hour'")
    ->get();

// Sanani formatlash (PostgreSQL TO_CHAR)
DB::table('contracts')
    ->select(DB::raw("TO_CHAR(created_at, 'DD.MM.YYYY') AS formatted_date"))
    ->get();

// EXTRACT orqali qism ajratib olish va guruhlash
DB::table('contracts')
    ->select(DB::raw('EXTRACT(YEAR FROM created_at) AS year'))
    ->groupBy(DB::raw('EXTRACT(YEAR FROM created_at)'))
    ->get();</code></pre>
        </section>

        <!-- 12-Bo'lim -->
        <section id="section-12">
            <h2>12. INSERT (Ma'lumot qo'shish)</h2>
<pre><code>// Bitta qator qo'shish
DB::table('users')->insert([
    'name'  => 'Ali',
    'email' => 'ali@mail.com',
    'age'   => 25,
]);

// Ko'p qatorli ommaviy qo'shish
DB::table('users')->insert([
    ['name' => 'Ali',  'email' => 'ali@mail.com'],
    ['name' => 'Vali', 'email' => 'vali@mail.com'],
]);

// insertGetId — Qo'shilgan yangi qator ID-sini qaytarish
$id = DB::table('users')->insertGetId([
    'name'  => 'Ali',
    'email' => 'ali@mail.com',
]);

// insertOrIgnore — Dublikat xatolik bo'lsa e'tiborsiz qoldirish
DB::table('users')->insertOrIgnore([
    'email' => 'ali@mail.com',
    'name'  => 'Ali',
]);

// upsert — Agar kalit bo'yicha ma'lumot bo'lsa yangilash, yo'q bo'lsa yangi qo'shish
DB::table('users')->upsert(
    [['email' => 'ali@mail.com', 'name' => 'Ali Yangi']],
    ['email'],          // Unikal ustun kaliti
    ['name']            // Faqat shu ustunlar yangilanadi
);</code></pre>
        </section>

        <!-- 13-Bo'lim -->
        <section id="section-13">
            <h2>13. UPDATE (Ma'lumotlarni yangilash)</h2>
<pre><code>// Oddiy update
DB::table('users')
    ->where('id', 1)
    ->update(['name' => 'Yangi Ism', 'age' => 26]);

// Qiymatni oshirish yoki kamaytirish (Increment / Decrement)
DB::table('users')->where('id', 1)->increment('age');        // +1 oshadi
DB::table('users')->where('id', 1)->increment('age', 5);     // +5 oshadi
DB::table('users')->where('id', 1)->decrement('balance', 100);// 100 ga kamayadi

// Increment vaqtida qo'shimcha boshqa ustunlarni ham yangilash
DB::table('users')
    ->where('id', 1)
    ->increment('login_count', 1, ['last_login' => now()]);

// updateOrInsert — Shart bo'yicha qidirib topilsa yangilaydi, aks holda qo'shadi
DB::table('users')->updateOrInsert(
    ['email' => 'ali@mail.com'],        // Qidiruv filtri
    ['name' => 'Ali', 'age' => 25]      // Yangilanadigan/Qo'shiladigan ma'lumotlar
);</code></pre>
        </section>

        <!-- 14-Bo'lim -->
        <section id="section-14">
            <h2>14. DELETE (Ma'lumotlarni o'chirish)</h2>
<pre><code>// Shart asosida o'chirish
DB::table('users')->where('id', 1)->delete();

// Barcha qatorlarni o'chirish
DB::table('users')->delete();

// truncate — Jadvalni to'liq tozalash va ID hisoblagichni (Auto-increment) nolga qaytarish
DB::table('users')->truncate();</code></pre>
        </section>

        <!-- 15-Bo'lim -->
        <section id="section-15">
            <h2>15. Eloquent ORM — Model bilan ishlash asoslari</h2>
            <h3>15.1 Model Yaratish va Sozlash</h3>
<pre><code>// app/Models/User.php
class User extends Model
{
    protected $table      = 'users';           // Birlashadigan jadval nomi
    protected $primaryKey = 'id';              // Asosiy kalit ustuni
    protected $fillable   = ['name', 'email']; // Ruxsat berilgan ustunlar (Mass assignment)
    protected $hidden     = ['password'];      // JSON arrayga o'girilganda yashiriladi
    protected $casts      = [
        'is_active' => 'boolean',
        'settings'  => 'array',
        'created_at'=> 'datetime',
    ];
    public $timestamps = true;                 // created_at va updated_at ustunlarini yoqish
}</code></pre>

            <h3>15.2 Eloquent SELECT (Ma'lumot qidirish)</h3>
<pre><code>// Barcha ma'lumotlarni olish
User::all();
User::all(['id', 'name']);      // Faqat kerakli ustunlarni yuklash

// Query builder zanjiri uslubida e'lon qilish
User::query()->get();
User::select('id', 'name')->get();

// Bitta model obyektini qidirib topish
User::find(1);
User::findOrFail(1);            // Agar topilmasa 404 HTTP Exception qaytaradi
User::first();
User::firstOrFail();

// Shartli qidiruvlar
User::where('email', 'ali@mail.com')->first();
User::where('email', 'ali@mail.com')->firstOrFail();

// firstOrCreate — Topilmasa bazaga yozib obyekti qaytaradi
User::firstOrCreate(
    ['email' => 'ali@mail.com'],
    ['name' => 'Ali', 'age' => 25]
);

// firstOrNew — Topilmasa yangi namuna yaratadi lekin bazaga SAQLAMAYDI (save() qilish kerak)
User::firstOrNew(['email' => 'ali@mail.com']);</code></pre>

            <h3>15.3 Eloquent INSERT</h3>
<pre><code>// Ommaviy yaratish (Mass assignment)
User::create(['name' => 'Ali', 'email' => 'ali@mail.com']);

// Yangi obyekt orqali yaratish
$user = new User();
$user->name  = 'Ali';
$user->email = 'ali@mail.com';
$user->save();

// updateOrCreate
User::updateOrCreate(
    ['email' => 'ali@mail.com'],
    ['name' => 'Ali', 'age' => 25]
);</code></pre>

            <h3>15.4 Eloquent UPDATE</h3>
<pre><code>// Topib yangilash
User::find(1)->update(['name' => 'Yangi']);

// Shart asosida ommaviy yangilash
User::where('city', 'Toshkent')->update(['status' => 'active']);

// Obyekt xususiyatlarini o'zgartirib saqlash
$user = User::find(1);
$user->name = 'Yangi Ism';
$user->save();</code></pre>

            <h3>15.5 Eloquent DELETE</h3>
<pre><code>User::find(1)->delete();
User::where('status', 'inactive')->delete();

// Faqat ID ko'rsatib o'chirish (Obyekt yuklamasdan o'chiradi)
User::destroy(1);
User::destroy([1, 2, 3]);</code></pre>
        </section>

        <!-- 16-Bo'lim -->
        <section id="section-16">
            <h2>16. Eloquent Relationships (Modellararo bog'liqliklar)</h2>
            
            <h3>16.1 hasOne (Birga-bir aloqa)</h3>
<pre><code>// User model ichida
public function profile(): HasOne
{
    return $this->hasOne(Profile::class);
}

// Ishlatilishi:
$user = User::find(1);
echo $user->profile->bio;</code></pre>

            <h3>16.2 hasMany (Birga-ko'p aloqa)</h3>
<pre><code>// User model ichida
public function contracts(): HasMany
{
    return $this->hasMany(Contract::class, 'client_id');
}

// Ishlatilishi:
$user->contracts;
$user->contracts()->where('closed', false)->get();
$user->contracts()->count();</code></pre>

            <h3>16.3 belongsTo (Teskari teskarisiga bog'liqlik)</h3>
<pre><code>// Contract model ichida
public function client(): BelongsTo
{
    return $this->belongsTo(User::class, 'client_id');
}

// Ishlatilishi:
$contract->client->name;</code></pre>

            <h3>16.4 belongsToMany (Ko'pga-ko'p aloqa)</h3>
<pre><code>// User model ichida
public function roles(): BelongsToMany
{
    return $this->belongsToMany(Role::class);
}

// Pivot jadval bilan ishlash metodlari:
$user->roles;
$user->roles()->attach($roleId);  // Yangi bog'liqlik qo'shish
$user->roles()->detach($roleId);  // O'chirib tashlash
$user->roles()->sync([1, 2, 3]);  // Faqat ko'rsatilganlarni saqlab qolish (Tavsiya etiladi)</code></pre>

            <h3>16.5 hasManyThrough (Uchinchi model orqali bog'lanish)</h3>
<pre><code>// Organization → Contracts (User modeli orqali bog'lanish)
class Organization extends Model
{
    public function contracts(): HasManyThrough
    {
        return $this->hasManyThrough(
            Contract::class,
            User::class,
            'organization_id',  // users jadvalidagi foreign key
            'client_id',        // contracts jadvalidagi foreign key
        );
    }
}</code></pre>
        </section>

        <!-- 17-Bo'lim -->
        <section id="section-17">
            <h2>17. Eager Loading — N+1 Muammosini Hal Qilish</h2>
            <div class="alert alert-danger">
                <div class="alert-title">Diqqat! Loop (sikl) ichida bazaga qayta so'rov yuborishdan qoching!</div>
                Relation yuklamasdan sikl ichida unga murojaat qilish har bir foydalanuvchi uchun alohida so'rov yuborib xotirani to'ldiradi.
            </div>
<pre><code>// ❌ XATO VA YOMON AMALIYOT (N+1 muammo)
$users = User::all();
foreach ($users as $user) {
    echo $user->contracts->count();  // Har bir foydalanuvchi uchun yangi SQL so'rov bajariladi!
}

//  TO'G'RI VA OPTIMALLASHGAN YONDASHUV (Eager Loading)
$users = User::with('contracts')->get(); // Jami atigi 2 ta so'rov bajariladi
foreach ($users as $user) {
    echo $user->contracts->count();  // Qo'shimcha SQL so'rov ketmaydi, xotiradan o'qiladi
}

// Bir nechta bog'liqliklarni birdaniga yuklash
User::with(['contracts', 'profile', 'roles'])->get();

// Ichma-ich ketgan bog'liqliklarni (Nested relation) yuklash
User::with('contracts.products')->get();

// Bog'langan jadvalning faqat kerakli ustunlarini ajratib yuklash (Xotirani tejash)
User::with('contracts:id,client_id,product_price')->get();

// Shartli Eager Loading
User::with(['contracts' => function ($query) {
    $query->where('closed', false)->orderBy('created_at', 'desc');
}])->get();

// withCount — Bog'langan qatorlar sonini virtual ustun qilib yuklash
$users = User::withCount('contracts')->get();
echo $users->first()->contracts_count;

// Agregat qiymatlarni Eager Loading orqali bir so'rovda yuklash
User::withSum('contracts', 'product_price')->get();
User::withExists('contracts')->get();</code></pre>
        </section>

        <!-- 18-Bo'lim -->
        <section id="section-18">
            <h2>18. Lazy Loading vs Eager Loading</h2>
<pre><code>// load() — Ma'lumotlar to'plami (Collection) yuklab bo'lingandan keyin bog'liqliklarni qo'shish
$users = User::all();
$users->load('contracts');

// loadCount
$users->loadCount('contracts');

// loadMissing — Agar bog'liqlik oldin yuklanmagan bo'lsa, yuklaydi (takrorlanishni oldini oladi)
$users->loadMissing('profile');</code></pre>
        </section>

        <!-- 19-Bo'lim -->
        <section id="section-19">
            <h2>19. Scope — Qayta ishlatiladigan SQL shartlar bloklari</h2>
<pre><code>// Contract Model ichida
class Contract extends Model
{
    // Mahalliy scope e'lon qilish
    public function scopeActive($query)
    {
        return $query->where('closed', false);
    }

    public function scopeForOrganization($query, array $ids)
    {
        return $query->whereIn('organization_id', $ids);
    }

    public function scopeBetweenDates($query, string $from, string $to)
    {
        return $query->whereBetween('date', [$from, $to]);
    }
}

// Tekshirish / Amalda qo'llash:
Contract::active()->get();
Contract::active()->forOrganization([1, 2])->get();
Contract::active()
        ->forOrganization([1, 2])
        ->betweenDates('2025-01-01', '2025-12-31')
        ->get();</code></pre>
        </section>

        <!-- 20-Bo'lim -->
        <section id="section-20">
            <h2>20. Chunk — Ko'p millionli ma'lumotlarni bo'lib-bo'lib ishlash</h2>
            <div class="alert alert-success">
                <div class="alert-title">Tavsiya: Server RAM xotirasi to'lib qolmasligi uchun foydalaning.</div>
                Millionlab qatorlarni <code>->get()</code> qilish PHP xotirasini tugatadi (Allowed memory size exhausted). Chunk ularni qismlarga ajratadi.
            </div>
<pre><code>// chunk() — Xotirani tejash uchun (1000 tadan qatorni yuklaydi)
DB::table('contracts')->orderBy('id')->chunk(1000, function ($contracts) {
    foreach ($contracts as $contract) {
        // Biznes mantiq
    }
});

// chunkById — ID bo'yicha indeksdan foydalanib tezroq qismlarga ajratadi
DB::table('contracts')->chunkById(1000, function ($contracts) {
    // Biznes mantiq
});

// lazy() — Collection generator sifatida foydalanish (PHP yield mantiqi)
DB::table('contracts')->lazy()->each(function ($contract) {
    // Biznes mantiq
});</code></pre>
        </section>

        <!-- 21-Bo'lim -->
        <section id="section-21">
            <h2>21. Database Transactions (Tranzaksiyalar)</h2>
<pre><code>// Avtomatik Tranzaksiya (Agar xatolik chiqsa barcha SQL amallar bekor bo'ladi)
DB::transaction(function () {
    DB::table('users')->update(['balance' => 100]);
    DB::table('logs')->insert(['action' => 'updated']);
});

// Tranzaksiyani qo'lda boshqarish (try-catch bloki yordamida)
DB::beginTransaction();
try {
    DB::table('users')->update(['balance' => 100]);
    DB::table('logs')->insert(['action' => 'updated']);
    
    DB::commit(); // Hammasi to'g'ri bo'lsa bazaga yoziladi
} catch (\Exception $e) {
    DB::rollBack(); // Xatolik bo'lsa o'zgarishlar ortga qaytariladi
    throw $e;
}

// Deadlock holatlari uchun qayta urinishlar sonini (retry) ko'rsatish
DB::transaction(function () {
    // ...
}, 3);  // 3 marta urinib ko'radi, muvaffaqiyatsiz bo'lsa xato qaytaradi</code></pre>
        </section>

        <!-- 22-Bo'lim -->
        <section id="section-22">
            <h2>22. Amaliy — Haqiqiy va Murakkab Hisobot So'rovi Namunasi</h2>
<pre><code>// Har bir reklama agenti uchun to'liq statistika
// (initiative_clients loyihasidan haqiqiy mukammal misol)
public function buildExcelReport(array $date, array $organizationIds): Collection
{
    $orgIds   = implode(',', array_map('intval', $organizationIds));
    $dateFrom = $date[0];
    $dateTo   = $date[1];

    // 1-qadam: Contract statistikasini alohida subquery da tayyorlash
    $contractStats = DB::table('contracts')
        ->select([
            'contracts.client_id',
            DB::raw('COUNT(DISTINCT contracts.id)                                              AS contracts_count'),
            DB::raw('COALESCE(SUM(contracts.product_price), 0)                                AS total_price'),
            DB::raw('COUNT(DISTINCT CASE WHEN pc.is_collaboration = true  THEN contracts.id END) AS collab_count'),
            DB::raw('COUNT(DISTINCT CASE WHEN pc.is_collaboration = false THEN contracts.id END) AS main_count'),
            DB::raw('COALESCE(SUM(CASE WHEN pc.is_collaboration = true  THEN contracts.product_price ELSE 0 END), 0) AS collab_sum'),
            DB::raw('COALESCE(SUM(CASE WHEN pc.is_collaboration = false THEN contracts.product_price ELSE 0 END), 0) AS main_sum'),
        ])
        ->join('contract_products',        'contract_products.contract_id',          '=', 'contracts.id')
        ->join('product_variants',         'product_variants.id',                    '=', 'contract_products.product_variant_id')
        ->join('product_categories AS pc', 'pc.id',                                  '=', 'product_variants.product_category_id')
        ->where('contracts.closed', false)
        ->whereIn('contracts.organization_id', $organizationIds)
        ->whereBetween('contracts.date', $date)
        ->groupBy('contracts.client_id');

    // 2-qadam: Asosiy so'rov (Main Query)
    return InitiativeClient::query()
        ->select([
            'initiative_clients.client_id',
            'initiative_clients.organization_id',
            'organizations.organization',

            // Kod berilgan mijozlar
            DB::raw('COUNT(DISTINCT initiative_clients.involved_client_id) AS given_code_count'),

            // Kod orqali kelgan mijozlar (telegram code kiritganlar)
            DB::raw('COUNT(DISTINCT itc.attacted_client_id) AS came_via_code_count'),

            // Quyidagilar subquerydan — duplicate yo'q
            DB::raw('COALESCE(MAX(cs.contracts_count), 0) AS contracts_count'),
            DB::raw('COALESCE(MAX(cs.total_price), 0)     AS contract_price'),
            DB::raw('COALESCE(MAX(cs.collab_count), 0)    AS collaboration_contracts_count'),
            DB::raw('COALESCE(MAX(cs.collab_sum), 0)      AS collaboration_contracts_sum'),
            DB::raw('COALESCE(MAX(cs.main_count), 0)      AS main_activity_contracts_count'),
            DB::raw('COALESCE(MAX(cs.main_sum), 0)        AS main_activity_contracts_sum'),
        ])

        // Telegram kod kiritganlar
        ->leftJoin('initiative_telegram_codes AS itc', function ($join) {
            $join->on('itc.client_id',         '=', 'initiative_clients.client_id')
                 ->on('itc.attacted_client_id', '=', 'initiative_clients.involved_client_id');
        })

        // Contract stats subquery — bitta JOIN, N ta subquery emas
        ->leftJoin(
            DB::raw('(' . $contractStats->toSql() . ') AS cs'),
            function ($join) use ($contractStats) {
                $join->on('cs.client_id', '=', 'initiative_clients.involved_client_id')
                     ->addBinding($contractStats->getBindings(), 'join');
            }
        )

        // Filial nomi
        ->leftJoin('organizations', 'organizations.id', '=', 'initiative_clients.organization_id')

        // ad_agent filteri
        ->leftJoin('clients', 'clients.id', '=', 'initiative_clients.client_id')

        // Eager load — N+1 yo'q
        ->with(['client:id,fio,ad_agent,inps'])

        // Filterlar — binding (SQL injection yo'q)
        ->whereIn('initiative_clients.organization_id', $organizationIds)
        ->whereDate('initiative_clients.created_at', '>=', $dateFrom)
        ->whereDate('initiative_clients.created_at', '<=', $dateTo)
        ->where('initiative_clients.checked', true)
        ->where('clients.ad_agent', true)

        ->groupBy(
            'initiative_clients.client_id',
            'initiative_clients.organization_id',
            'organizations.organization',
        )
        ->get();
}</code></pre>
        </section>

        <!-- 23-Bo'lim -->
        <section id="section-23">
            <h2>23. Foydali yordamchi metodlar (Debugging & Helpers)</h2>
<pre><code>// dd() — dump and die (So'rovni to'xtatib brauzerga chiqaradi)
DB::table('users')->where('id', 1)->dd();

// dump() — Dasturni to'xtatmasdan so'rov holatini chiqaradi
DB::table('users')->where('id', 1)->dump();

// toSql() — Generatsiya qilingan toza SQL kodini ko'rish (Baza so'rovisiz)
DB::table('users')->where('id', 1)->toSql();

// getBindings() — SQL so'roviga biriktirilgan haqiqiy qiymatlarni ko'rish
DB::table('users')->where('id', 1)->getBindings();

// tap() — So'rov zanjirini buzmasdan debug qilish
DB::table('users')
    ->where('id', 1)
    ->tap(fn($q) => dump($q->toSql()))
    ->get();

// when() — Shartli query (Frontend'dan kelgan filtrlar uchun juda foydali)
DB::table('users')
    ->when($request->city, function ($query, $city) {
        $query->where('city', $city);
    })
    ->get();

// unless() — Teskari shartli funksiya (Birinchi argument false bo'lsa ishlaydi)
DB::table('users')
    ->unless($showAll, function ($query) {
        $query->where('status', 'active');
    })
    ->get();

// pluck() — Faqat bitta ustun qiymatlarini massiv (Collection) qilib olish
DB::table('users')->pluck('name');           // ['Ali', 'Vali']
DB::table('users')->pluck('name', 'id');     // Kalit-qiymat ko'rinishi: ['1' => 'Ali']

// value() — To'g'ridan-to'g'ri topilgan birinchi qator ustun qiymatini olish
DB::table('users')->where('id', 1)->value('name');  // 'Ali'

// sole() — Bazadan aynan bitta va yagona qator qaytishini majburlaydi (0 yoki 2+ bo'lsa xato beradi)
DB::table('users')->where('email', 'ali@mail.com')->sole();</code></pre>
        </section>

        <!-- 24-Bo'lim -->
        <section id="section-24">
            <h2>24. Xato qilmaslik uchun oltin qoidalar</h2>
            <div class="rules-grid">
                <div class="rule-card correct">
                    <h4><span style="color:#22c55e;">✔</span> To'g'ri yondashuv</h4>
                    <p><code>with(['relation'])</code> yordamida Eager Load qilish.</p>
                    <p><code>whereIn('id', $ids)</code> ko'rinishida xavfsiz massiv filtri.</p>
                    <p><code>whereRaw('? + INTERVAL', [$val])</code> xavfsiz binding.</p>
                    <p>Subquery JOIN funksiyalarda <code>addBinding()</code> ishlatish.</p>
                    <p><code>leftJoin + ON</code> ichida qo'shimcha mantiqiy shart yozish.</p>
                    <p>Dublikat ma'lumotlar ehtimoli bo'lsa <code>COUNT(DISTINCT id)</code> qilish.</p>
                    <p>NULL natijalar uchun <code>COALESCE(SUM(...), 0)</code> ishlatish.</p>
                    <p>Katta hajmdagi ma'lumotlarda <code>chunk(1000)</code> bilan ishlash.</p>
                </div>
                <div class="rule-card wrong">
                    <h4><span style="color:#ef4444;">❌</span> Noto'g'ri yondashuv</h4>
                    <p>Sikl (foreach) ichida relation chaqirish (N+1 xatolik).</p>
                    <p><code>whereRaw("id IN ($ids)")</code> — SQL injection xavfi!</p>
                    <p><code>whereRaw("'$val' + INTERVAL")</code> ochiq qiymat yozish.</p>
                    <p>Bindingsiz subquery ko'rinishlarini ishlatish.</p>
                    <p><code>leftJoin + WHERE</code> yozish (INNER JOIN'ga aylanib ketadi).</p>
                    <p>Dublikat satrlar mavjud bo'lsa ham <code>COUNT(*)</code> hisoblash.</p>
                    <p>Formatlanmagan, bo'sh qaytadigan NULL summalarni qoldirish.</p>
                    <p>Millionlab qatorli jadvalni birdaniga <code>->get()</code> bilan yuklash.</p>
                </div>
            </div>
        </section>
    </main>

</body>
</html>