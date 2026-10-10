<?php
declare(strict_types=1);
/** @var string $pageTitle */
/** @var string $pageDescription */
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <title><?= e($pageTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css?v=<?= (int) filemtime(__DIR__ . '/../assets/style.css') ?>">
    <script src="assets/app.js?v=<?= (int) filemtime(__DIR__ . '/../assets/app.js') ?>" defer></script>
</head>
<body>
    <a class="skip-link" href="#main">İçeriğe geç</a>
    <div class="topbar">
        <div class="container topbar__inner">
            <p>TÜRKAK akrediteli · TS EN ISO/IEC 17020 A tipi muayene kuruluşu</p>
            <div class="topbar__links">
                <a href="<?= e(site_url('#about')) ?>">Kurumsal</a>
                <a href="<?= e(site_url('#services')) ?>">Hizmetler</a>
                <a href="<?= e(site_url('#contact')) ?>">İletişim</a>
                <span>TR</span>
            </div>
        </div>
    </div>
    <header class="site-header" id="header">
        <div class="container nav">
            <a class="logo" href="<?= e(site_url()) ?>" aria-label="NETA ana sayfa">
                <img src="assets/img/logo.png" alt="NETA">
            </a>
            <nav class="nav__links" aria-label="Ana menü">
                <a href="<?= e(site_url('#services')) ?>">Hizmetler</a>
                <a href="<?= e(site_url('#industries')) ?>">Sektörler</a>
                <a href="<?= e(site_url('#about')) ?>">Hakkımızda</a>
                <a href="<?= e(site_url('#contact')) ?>">İletişim</a>
            </nav>
            <div class="nav__actions">
                <a class="button button--small" href="<?= e(site_url('#contact')) ?>">Bize ulaşın <span>↗</span></a>
                <button class="menu-button" type="button" aria-label="Menüyü aç" aria-expanded="false">
                    <span></span><span></span>
                </button>
            </div>
        </div>
    </header>
    <div class="mobile-nav">
        <a href="<?= e(site_url('#services')) ?>">Hizmetler</a>
        <a href="<?= e(site_url('#industries')) ?>">Sektörler</a>
        <a href="<?= e(site_url('#about')) ?>">Hakkımızda</a>
        <a href="<?= e(site_url('#contact')) ?>">İletişim</a>
    </div>
    <main id="main">
