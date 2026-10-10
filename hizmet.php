<?php
declare(strict_types=1);

require __DIR__ . '/includes/helpers.php';
$catalog = require __DIR__ . '/includes/services.php';
$groups = $catalog['groups'];
$services = $catalog['services'];

$slug = isset($_GET['s']) ? (string) $_GET['s'] : '';
$groupKey = isset($_GET['k']) ? (string) $_GET['k'] : '';
$service = $services[$slug] ?? null;
$group = $service ? $groups[$service['group']] : ($groups[$groupKey] ?? null);

if ($group === null) {
    http_response_code(404);
}

$pageTitle = $service['title'] ?? ($group['title'] ?? 'Hizmet bulunamadı');
$pageTitle .= ' | NETA';
$pageDescription = $service['lead'] ?? ($group['lead'] ?? 'NETA muayene ve test hizmetleri.');

require __DIR__ . '/includes/header.php';
?>
        <section class="detail-hero">
            <div class="container">
                <p class="detail-crumb">
                    <a href="<?= e(site_url()) ?>">Ana sayfa</a>
                    <span>/</span>
                    <a href="<?= e(site_url('#services')) ?>">Hizmetler</a>
                    <?php if ($service && $group): ?>
                        <span>/</span>
                        <a href="hizmet.php?k=<?= e($service['group']) ?>"><?= e($group['title']) ?></a>
                    <?php endif; ?>
                </p>
                <h1><?= e($service['title'] ?? ($group['title'] ?? 'Sayfa bulunamadı')) ?></h1>
                <?php if ($group): ?>
                    <p><?= e($service['lead'] ?? $group['lead']) ?></p>
                <?php else: ?>
                    <p>Aradığınız hizmet kaydı yok. Hizmet listesine dönüp yeniden seçebilirsiniz.</p>
                <?php endif; ?>
            </div>
        </section>

        <?php if ($group): ?>
        <section class="section detail-section">
            <div class="container detail-layout">
                <article class="detail-copy">
                    <?php foreach (($service['body'] ?? $group['body']) as $paragraph): ?>
                        <p><?= e($paragraph) ?></p>
                    <?php endforeach; ?>

                    <?php if (!$service): ?>
                        <div class="method-grid">
                            <?php foreach ($group['services'] as $child): ?>
                                <?php $item = $services[$child]; ?>
                                <a class="method-card" href="hizmet.php?s=<?= e($child) ?>">
                                    <strong><?= e($item['title']) ?></strong>
                                    <span><?= e($item['lead']) ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($service['points'])): ?>
                        <h2>Kapsam</h2>
                        <ul class="point-list">
                            <?php foreach ($service['points'] as $point): ?>
                                <li><?= e($point) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (!empty($service['standards'])): ?>
                        <h2>İlgili standartlar</h2>
                        <ul class="standard-list">
                            <?php foreach ($service['standards'] as $standard): ?>
                                <li><?= e($standard) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </article>
                <aside class="detail-side">
                    <div class="side-card">
                        <p>Bu gruptaki hizmetler</p>
                        <?php foreach ($group['services'] as $child): ?>
                            <a class="<?= $child === $slug ? 'is-current' : '' ?>" href="hizmet.php?s=<?= e($child) ?>"><?= e($services[$child]['title']) ?></a>
                        <?php endforeach; ?>
                    </div>
                    <div class="side-card side-card--navy">
                        <p>Muayene planlayın</p>
                        <strong>Kapsamı birlikte netleştirelim.</strong>
                        <a class="button button--small" href="<?= e(site_url('#contact')) ?>">Teklif isteyin <span>↗</span></a>
                    </div>
                </aside>
            </div>
        </section>
        <?php else: ?>
        <section class="section">
            <div class="container">
                <a class="button" href="<?= e(site_url('#services')) ?>">Hizmetlere dön <span>↗</span></a>
            </div>
        </section>
        <?php endif; ?>
<?php
require __DIR__ . '/includes/footer.php';
