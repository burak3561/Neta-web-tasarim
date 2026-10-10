<?php
declare(strict_types=1);

require __DIR__ . '/includes/helpers.php';
$site = require __DIR__ . '/includes/config.php';
$catalog = require __DIR__ . '/includes/services.php';
$groups = $catalog['groups'];
$pinAt = [
    'İzmir' => [8.3, 57.3, 'izmir'],
    'Manisa' => [9.8, 54.6, 'manisa'],
    'Mersin' => [46, 79.3, 'mersin'],
    'Gaziantep' => [59.8, 75.7, 'gaziantep'],
];

$industries = [
    ['title' => 'Enerji', 'text' => 'Üretim tesisleri ve yenilenebilir enerji varlıkları', 'icon' => 'bolt'],
    ['title' => 'Petrol & Gaz', 'text' => 'Rafineri, boru hattı ve depolama sistemleri', 'icon' => 'drop'],
    ['title' => 'Üretim', 'text' => 'Kritik ekipman ve proses güvenilirliği', 'icon' => 'factory'],
    ['title' => 'Altyapı', 'text' => 'Köprüler, yapılar ve ulaşım ağları', 'icon' => 'bridge'],
];

$formSent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
    $formSent = true;
}

function icon(string $name): string
{
    $icons = [
        'bolt' => '<path d="M13 2 4.5 13H11l-1 9 8.5-12H12l1-8Z"/>',
        'drop' => '<path d="M12 2s7 7.2 7 12a7 7 0 0 1-14 0c0-4.8 7-12 7-12Z"/><path d="M9 15.5c.6 1.2 1.6 1.8 3 1.8"/>',
        'factory' => '<path d="M3 21V10l6 3V9l6 3V5h6v16H3Z"/><path d="M7 17h2m3 0h2m3 0h2"/>',
        'bridge' => '<path d="M3 20V10m18 10V10M2 10h20M6 10c0 5 2.7 8 6 8s6-3 6-8M6 20v-3m12 3v-3"/>',
    ];

    return '<svg viewBox="0 0 24 24" aria-hidden="true">' . ($icons[$name] ?? '') . '</svg>';
}
$pageTitle = 'NETA | Muayene, Test ve Gözetim';
$pageDescription = 'NETA Sertifikasyon — tahribatsız muayene, laboratuvar testleri, gözetim ve personel belgelendirme.';
require __DIR__ . '/includes/header.php';
?>
        <section class="hero" id="hero">
            <div class="hero__stage">
                <div class="hero__media" aria-hidden="true">
                    <video class="hero__clip" autoplay muted playsinline preload="metadata" poster="assets/video/hero-poster.jpg">
                        <source src="assets/video/hero.mp4" type="video/mp4">
                    </video>
                    <video class="hero__clip" muted playsinline preload="metadata" poster="assets/video/hero-poster.jpg">
                        <source src="assets/video/shot-kaynak.mp4" type="video/mp4">
                    </video>
                    <video class="hero__clip" muted playsinline preload="metadata" poster="assets/video/hero-poster.jpg">
                        <source src="assets/video/shot-boru.mp4" type="video/mp4">
                    </video>
                    <video class="hero__clip" muted playsinline preload="metadata" poster="assets/video/hero-poster.jpg">
                        <source src="assets/video/shot-makine.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="hero__story">
                    <div class="container">
                        <p class="story story-1" data-story="1">
                            <span class="line"><span>Kritik varlıklarınızı</span></span>
                            <span class="line"><span>içten dışa koruyoruz</span></span>
                        </p>
                        <p class="story story-2" data-story="2">
                            <span class="line"><span>Akredite muayene</span></span>
                            <span class="line"><span>uzmanlığıyla</span></span>
                        </p>
                        <div class="story story-3" data-story="3">
                            <span class="line story-kicker"><span>her muayenede</span></span>
                            <span class="story-words">
                                <span class="story-word" data-word="a">güvenlik</span>
                                <span class="story-word" data-word="b">doğruluk</span>
                                <span class="story-word" data-word="c">süreklilik</span>
                            </span>
                        </div>
                        <h1 class="story story-4 is-on" data-story="4">
                            <span class="line"><span>Riskin bir adım</span></span>
                            <span class="line"><span><em>önünde olun</em></span></span>
                        </h1>
                        <div class="story-meter" aria-hidden="true"><span></span></div>
                    </div>
                </div>
            </div>
            <div class="hero__after">
                <div class="container">
                    <p>Kararın kritik olduğu tesislerde önde olmak, sorunu olduktan sonra görmek değildir. NETA; muayene, test ve gözetimi tek akışta buluşturarak riski erkenden görünür kılar.</p>
                    <a class="button" href="#contact">Uzmanla görüşün <span>↗</span></a>
                </div>
            </div>
        </section>

        <section class="intro section" id="solutions">
            <div class="container">
                <div class="section-heading reveal">
                    <p class="eyebrow"><span></span> NE YAPIYORUZ?</p>
                    <h2>Muayene, test ve gözetimi <em>tek çatı altında sunuyoruz.</em></h2>
                </div>
                <div class="service-grid" id="services">
                    <?php $n = 1; foreach ($groups as $slug => $group): ?>
                        <article class="service-card reveal">
                            <a class="service-card__image" href="hizmet.php?k=<?= e($slug) ?>">
                                <img src="<?= e($group['image']) ?>" alt="" loading="lazy">
                                <span><?= sprintf('%02d', $n) ?></span>
                            </a>
                            <div class="service-card__body">
                                <p class="mini-label"><?= e($group['eyebrow']) ?></p>
                                <h3><?= e($group['title']) ?></h3>
                                <p><?= e($group['text']) ?></p>
                                <a href="hizmet.php?k=<?= e($slug) ?>">Detaylı bilgi <i>→</i></a>
                            </div>
                        </article>
                    <?php $n++; endforeach; ?>
                </div>
            </div>
        </section>

        <section class="statement" id="about">
            <div class="statement__image" aria-hidden="true"></div>
            <div class="container statement__inner">
                <div class="statement__quote reveal">
                    <p class="eyebrow eyebrow--light"><span></span> BİZİ FARKLI KILAN</p>
                    <h2>Yalnızca problemi bulmuyor,<br><em>geleceği güvence altına alıyoruz.</em></h2>
                    <p>İleri teknoloji ile sahadaki insan deneyimini birleştirerek belirsizliği netliğe, veriyi aksiyona dönüştürüyoruz.</p>
                    <a class="text-link text-link--light" href="#contact"><i>→</i> NETA'yı tanıyın</a>
                </div>
                <div class="metrics reveal">
                    <div><strong>350+</strong><span>Tamamlanan proje</span></div>
                    <div><strong>98%</strong><span>Müşteri memnuniyeti</span></div>
                    <div><strong>24/7</strong><span>Kesintisiz destek</span></div>
                </div>
            </div>
        </section>

        <section class="industries section" id="industries">
            <div class="container">
                <div class="industries__heading reveal">
                    <div>
                        <p class="eyebrow"><span></span> UZMANLIK ALANLARIMIZ</p>
                        <h2>Kritik sektörler için<br><em>ölçülebilir güven.</em></h2>
                    </div>
                    <p>Her sektörün kendine özgü risklerini biliyor, ihtiyaca göre şekillenen uçtan uca çözümler geliştiriyoruz.</p>
                </div>
                <div class="industry-grid">
                    <?php foreach ($industries as $index => $industry): ?>
                        <a class="industry-card reveal" href="#contact">
                            <span class="industry-card__icon"><?= icon($industry['icon']) ?></span>
                            <span class="industry-card__number">0<?= $index + 1 ?></span>
                            <h3><?= e($industry['title']) ?></h3>
                            <p><?= e($industry['text']) ?></p>
                            <span class="industry-card__go" aria-hidden="true">↗</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="presence" id="offices">
            <canvas class="presence__net" aria-hidden="true"></canvas>
            <div class="container presence__grid">
                <div class="presence__copy reveal">
                    <p class="eyebrow eyebrow--light"><span></span> NEREDEYİZ</p>
                    <h2>Türkiye'nin dört <em>noktasında sahadayız.</em></h2>
                    <p>Merkez ofis İzmir'de. Manisa, Mersin ve Gaziantep irtibat bürolarıyla muayene ekibi sahaya yakın duruyor.</p>
                    <div class="office-list">
                        <?php foreach ($site['offices'] as $index => $office): ?>
                            <?php $digits = preg_replace('/\D+/', '', $office['phone']) ?? ''; ?>
                            <button
                                class="office-toggle<?= $index === 0 ? ' is-on' : '' ?>"
                                type="button"
                                data-office="<?= e($office['city']) ?>"
                                data-label="<?= e($office['label']) ?>"
                                data-address="<?= e($office['address']) ?>"
                                data-phone="<?= e($office['phone']) ?>"
                                data-tel="tel:+<?= e(str_starts_with($digits, '0') ? '90' . substr($digits, 1) : $digits) ?>"
                                data-email="<?= e($office['email']) ?>"
                                aria-pressed="<?= $index === 0 ? 'true' : 'false' ?>"
                            >
                                <span>
                                    <strong><?= e($office['city']) ?></strong>
                                    <small><?= e($office['label']) ?></small>
                                </span>
                                <i aria-hidden="true"></i>
                            </button>
                        <?php endforeach; ?>
                    </div>
                    <?php $first = $site['offices'][0]; ?>
                    <article class="office-card">
                        <p data-field="label"><?= e($first['label']) ?></p>
                        <p data-field="address"><?= e($first['address']) ?></p>
                        <p>
                            <a data-field="phone" href="tel:+902322905595"><?= e($first['phone']) ?></a>
                            <a data-field="email" href="mailto:<?= e($first['email']) ?>"><?= e($first['email']) ?></a>
                        </p>
                    </article>
                </div>
            </div>
            <div class="presence__map reveal">
                    <div class="tr-stage">
                    <div class="tr-zoom">
                    <svg class="tr-map" xmlns="http://www.w3.org/2000/svg" width="1000" height="371" viewBox="0 0 1000 371" role="img" aria-label="Türkiye haritası">
                        <defs>
                            <linearGradient id="tr-fill" x1="0" y1="0" x2="1" y2="1">
                                <stop offset="0" stop-color="#1d5cad"/>
                                <stop offset="1" stop-color="#102e6c"/>
                            </linearGradient>
                            <filter id="tr-shadow" x="-8%" y="-12%" width="116%" height="130%">
                                <feDropShadow dx="0" dy="10" stdDeviation="12" flood-color="#031028" flood-opacity=".55"/>
                            </filter>
                        </defs>
                        <path fill="url(#tr-fill)" stroke="#d7e4f4" stroke-width="1.35" stroke-linejoin="round" filter="url(#tr-shadow)" d="M902.7 77.6L903.5 79.7L906.7 82.7L910.4 84.6L912.4 86.5L915.7 93.3L917 97.1L916.5 100.7L914.2 104.4L909.3 109L910.5 110.9L911.6 113.5L911.2 115.3L914.7 121.2L916.3 124.9L915 125.7L914.1 126.9L920.4 129.7L928 132.1L931.2 132.5L939.9 131.4L945.5 131.2L951 133.4L959.1 138.9L967.8 146L969.5 148.1L970.3 149.1L972 150.8L970.2 150.8L967.4 149.2L960.4 144.9L956.9 146.7L953.8 150L950.5 162.3L947.8 163.6L943 163.6L937.2 163.1L933.1 163.7L932.1 164.5L932.6 165.9L933.8 167.9L934.7 170.4L934.9 172.5L937 174.4L939.9 176.2L940 178.1L939.6 180.7L938.9 182.7L938.2 183.8L939.5 186.8L942.6 190.4L944.6 191.7L943.8 198.6L945 201.6L945.9 205.7L945.5 212.7L945.9 214.4L947 214.9L949.8 215.2L952.6 215.8L953.5 217L953.5 217.8L950.1 221L949.7 223.2L948.5 226.4L947.5 228.3L944.4 231.8L942.4 235.4L941.5 238.4L942.1 239.8L947.8 240.2L950.9 242.4L959.1 246.6L960.6 248.3L958.3 251L958.4 252.1L959.4 253.4L959.9 255.9L959.7 258.6L959.8 262.2L961.3 262.7L966.9 266.1L970.8 269.4L971 270.5L969 273.1L969.5 276.2L969.4 276.9L967.7 275.7L964.6 275.3L961.4 275.2L959.4 276.1L955.9 278.5L951.1 281.1L947.3 283.5L945.1 285.1L943.3 284.9L941.9 283.4L941.1 281.4L941.4 273.9L940.6 271.5L938.8 269.8L936.7 268.9L934.2 268.3L931.6 268.3L927.9 270.5L922.7 272.8L914.6 272.6L909.2 272.2L906.6 271.8L896.1 268.2L893.9 268.1L890 266.7L885.3 265.6L877.5 267.7L874.1 267.2L869.3 265.3L867.6 265.8L862.3 271.5L853.3 277.6L848.4 278.6L846.1 272.5L843.9 270.1L842.8 269.9L840.6 269.1L838.8 269.5L833.4 273.7L824.7 276.2L817.5 277.7L806 279.6L797.2 280.5L793.4 280.6L785.2 279.7L778 278.6L770.8 278.6L765.3 279.1L752.5 283.6L730.7 292.8L714.1 297.2L704.8 299L697.5 300.1L685 300.1L674.9 299.4L667.8 299.5L663.9 298.4L658.4 294.6L651.6 291L648.6 290.1L644.7 289.4L638.9 289L624.6 294.4L620.1 295.8L615.2 296.9L605.3 300.2L601 302L595.5 301.8L588.4 301.3L582.4 301.5L578.3 299L576.1 296.2L567.8 294.5L561.9 294L560.3 295.2L558.8 299.1L556.2 308.9L555.8 311.3L561 321.1L560.8 322.6L557 323.1L552.7 323.2L549.9 324.1L547.6 325.7L546.2 334.1L541.3 335.7L538.9 337.5L536.5 342.7L535.2 342.8L527.1 338.8L523.4 338.5L526.6 334.4L523.1 326.3L519.2 318.7L522.9 313.9L530.3 308L538.2 301.2L538.2 297L537.8 293.7L535.5 291.5L531.2 288.5L524 291.7L518.8 295.2L515.4 295.9L511.7 297.9L509.9 301.5L505.5 304.3L498.2 305.4L487.3 302.4L475.6 297.8L469 294.1L463.6 293.3L458.4 294.9L443.3 303.9L429.4 317.2L425.9 319.5L412.9 325.2L404.2 327.1L400.1 326.6L382.9 329.1L374.4 329.5L367.6 332.5L354.5 329.3L346.7 325.1L341.9 320.8L334.2 311.7L328.8 307.4L316.5 303.5L295.1 294L289.5 293L274.9 291.7L259.5 290.8L256.4 294.2L255.2 307.9L252.6 311.6L251.4 318.7L249.6 320.7L246.6 322.1L242 319.9L238.8 318.9L231.3 321.8L216.5 325.9L211.5 326.4L194.4 321.3L188.1 318L184.1 314.3L182.7 308.2L180.1 304.7L179.8 302.2L178.8 299.5L175.3 298.4L171.6 300.5L167.6 300.4L162.7 299.1L150.9 293.9L141.9 293.5L136.4 299.8L132.2 301.8L127.6 302.4L127.3 300.6L130.8 296.5L116.7 297.3L109.3 300.4L103.5 299.9L99.1 298.5L99.8 296.8L104.2 296.2L108 294.8L123.3 293.6L126.9 292.5L130.8 288.1L137.9 284.2L138.8 282.6L133.3 282.6L109.9 283.7L93.9 283.1L91.9 285L89.5 285.2L88.9 280.1L91.4 277.7L94.8 277.9L103.2 275.8L102.5 271.5L96.5 268.6L95.2 266.9L90.9 266.5L87.3 264.5L86.6 259.3L83.7 253.7L79.7 251L80.2 249.5L87.6 247.6L89.1 239.7L88 234.8L84.3 234.4L73.5 230.6L70.2 231L66.6 226.8L60.4 223.8L57.3 224.9L55.3 226.3L52.4 225.6L47.6 223L42.8 221.6L40.7 219.8L43.3 215.2L47 215.3L47.6 211.6L44.8 205.5L45 202.4L48.2 201.5L51.9 202.1L55.5 205.8L56.7 209.3L56 212.7L58.3 216.1L59.9 216.9L61 213.4L62.6 212.7L64.7 214.3L69.3 215L81.3 212.9L83.6 211.1L74.8 211.3L71.6 209.6L68.2 205.7L66 202.3L65.6 200.6L64.4 198.1L65.8 196.8L71.7 194.8L77 189.2L74.8 187.6L72.3 186.8L69.6 187.4L67 185.5L66.7 182.8L68.7 180.6L69 177.7L62.2 170.4L60.3 168.8L61.8 166.4L66.9 162.4L71.8 157.5L71.2 155.9L67.6 155.2L50.4 157.3L43.7 159.2L31.7 160L30.9 157.3L31.1 154.9L33.8 150.5L33.6 139.6L35.2 133.7L41.8 132L49.9 123.3L63.1 113.1L76.9 113.3L82.4 110.5L90.6 110.3L92.1 112.4L93 114.3L100.2 117.1L112.9 116.7L116 115.6L119 114L113.1 109L115 107.6L120.3 107.4L126.1 108.6L126.3 109.8L124.8 111.3L123 114.1L124.7 114.6L141.1 113L158.3 114.3L163.7 113.6L177.2 113.6L179.6 111.9L175.5 109.7L171.6 109L168.9 107.9L166.2 106.4L174.7 101.5L179.6 100.6L202.4 97.6L219.3 96.1L219.5 95L217.1 95L195.2 92.5L189.9 90.6L182.6 86.1L181 84.8L179.1 82.6L180.2 77.8L181.6 74L184.3 71.8L193.1 71.5L223.1 75.4L244.5 73.1L267.8 78.7L290.2 77.5L294.8 75L300.4 66.9L332 53.3L343.1 46.3L354.9 42.4L375.3 38.1L392.3 32.5L397.1 31.8L437.9 34.5L465.9 34.9L478.8 29.5L486.3 31.3L485.6 33.2L484.2 34.9L484.6 38.2L489 43L493.4 46.3L506.5 51.1L524.7 47.1L527.7 47.5L531.4 48.6L537.8 61.5L542.7 66.1L549.1 69.2L554.4 69.8L558.3 66.5L561.3 65.2L567.8 64.7L578.6 69.1L582.4 73.7L600.7 77.2L617.5 79L624.8 82.9L648.4 86.8L657.3 86.2L672.1 82.1L701 77.6L720.2 83.8L725.4 84.6L729.8 84.1L736.3 85.8L743.2 84.9L764.4 77.6L771 73.4L778.1 72.3L784.3 69.8L800.9 61.7L805.7 56.9L809.1 58L815.4 59.3L819.3 60.8L821.5 61.2L826.6 58L834.3 58.1L841 58.5L844.5 59.1L848.7 60.1L853.8 60.8L855.9 59.3L858.9 54.8L860.1 54.3L860.9 53.9L864.7 53.5L868.3 53.9L870 54.6L871.7 58.2L876 59.5L883.5 65.2L888.1 67.5L889.3 68.5L887.7 69.6L888.3 71.1L891 72.9L894.7 73.6L898.7 73.4L900.9 74.1L902.4 75.1L902.8 76.6L902.7 77.6ZM42.2 46.9L42 45.5L42.5 44.1L44.2 42.7L51.8 41.4L52.6 40.4L53.7 37.9L55.2 35.3L57 34.5L60.2 34.5L66.3 33.9L70.5 33.1L74.7 31.3L76.9 29.7L86 28.8L88.6 28L91.1 28.7L94.6 31.4L100.2 35.4L103.2 36.7L105.5 36.1L109.5 34.6L113.5 34.6L116.6 34.9L118.1 33.6L120.5 33.4L127.3 34.2L125.9 40L129.1 46.3L136.5 55.1L144 59.5L174.2 70.5L179.7 71.4L178.5 75.9L176.7 79.9L174.7 82.5L165.8 84.3L141.4 79.4L135.2 78.9L130.9 79.9L122.8 83.4L113.9 82.3L101.4 84.3L97.9 91L89.3 98.7L75 104.9L64.9 108.2L49.6 120.1L42.6 127L39.7 128.4L36.2 129.4L37.4 126.1L39.1 123.1L38.7 120.8L38.8 117.4L43.9 113.6L48.5 110.9L62.3 105.9L65.9 101.7L55.1 101.8L44.2 102.7L37.3 102.2L31.3 102.5L29.4 98.9L28 96.7L29.5 96L31.5 95.5L35 91.7L38.2 88.8L42.7 85.2L43.8 83.1L43.8 81.1L42.8 79.7L42.6 78.1L42.4 75.8L42.7 71L53 65.7L56.3 65.2L57.5 62.8L56.7 57.2L55.3 52.7L53.4 52.4L50.9 51.1L49.3 49.6L46.7 48L42.2 46.9Z"/>
                    </svg>
                    <?php foreach ($site['offices'] as $index => $office): ?>
                        <?php [$left, $top, $slug] = $pinAt[$office['city']]; ?>
                        <button
                            class="map-pin map-pin--<?= e($slug) ?><?= $index === 0 ? ' is-on' : '' ?>"
                            type="button"
                            style="left: <?= e((string) $left) ?>%; top: <?= e((string) $top) ?>%"
                            data-office="<?= e($office['city']) ?>"
                            aria-pressed="<?= $index === 0 ? 'true' : 'false' ?>"
                            aria-label="<?= e($office['city'] . ' ' . $office['label']) ?>"
                        >
                            <span class="map-pin__dot"></span>
                            <span class="map-pin__label"><?= e($office['city']) ?></span>
                        </button>
                    <?php endforeach; ?>
                    </div>
                    </div>
            </div>
        </section>

        <section class="cta" id="contact">
            <div class="container cta__inner">
                <div class="cta__copy reveal">
                    <p class="eyebrow"><span></span> BİRLİKTE ÇALIŞALIM</p>
                    <h2>Tesisinizin geleceğini<br><em>bugünden koruyun.</em></h2>
                    <p>İhtiyacınızı anlatın, uzman ekibimiz size özel çözüm haritasını oluştursun.</p>
                    <div class="cta__contact">
                        <span>Doğrudan iletişim</span>
                        <a href="tel:+902322905595">0 (232) 290 55 95</a>
                        <a href="mailto:bilgi@netasertifikasyon.com">bilgi@netasertifikasyon.com</a>
                    </div>
                </div>
                <form class="contact-form reveal" method="post" action="#contact">
                    <input type="hidden" name="contact_form" value="1">
                    <?php if ($formSent): ?>
                        <div class="form-success" role="status">
                            <strong>Teşekkürler!</strong>
                            <span>Talebiniz alındı. Ekibimiz en kısa sürede size ulaşacak.</span>
                        </div>
                    <?php endif; ?>
                    <label>
                        <span>Adınız ve soyadınız</span>
                        <input type="text" name="name" placeholder="Ad Soyad" required>
                    </label>
                    <label>
                        <span>İş e-postanız</span>
                        <input type="email" name="email" placeholder="ornek@sirket.com" required>
                    </label>
                    <label>
                        <span>İlgilendiğiniz hizmet</span>
                        <select name="service" required>
                            <option value="" selected disabled>Bir hizmet seçin</option>
                            <?php foreach ($groups as $group): ?>
                                <option><?= e($group['title']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <button class="button button--coral" type="submit">Görüşme talep edin <span>↗</span></button>
                    <small>Göndererek kişisel verilerinizin iletişim amacıyla işlenmesini kabul edersiniz.</small>
                </form>
            </div>
        </section>
<?php require __DIR__ . '/includes/footer.php';
