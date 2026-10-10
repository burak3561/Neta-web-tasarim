<?php
declare(strict_types=1);
/** @var array $groups */
?>
    </main>
    <footer class="footer" id="resources">
        <div class="container">
            <div class="footer__top">
                <a class="logo logo--footer" href="<?= e(site_url()) ?>" aria-label="NETA ana sayfa">
                    <img src="assets/img/logo.png" alt="NETA">
                </a>
                <p>Muayene, test ve gözetim için<br>güvenilir çözüm ortağınız.</p>
                <a class="footer__mail" href="mailto:bilgi@netasertifikasyon.com">bilgi@netasertifikasyon.com <i>↗</i></a>
            </div>
            <div class="footer__links">
                <div>
                    <h3>Hizmetler</h3>
                    <?php foreach (array_slice($groups, 0, 5, true) as $slug => $group): ?>
                        <a href="hizmet.php?k=<?= e($slug) ?>"><?= e($group['title']) ?></a>
                    <?php endforeach; ?>
                </div>
                <div>
                    <h3>Diğer</h3>
                    <?php foreach (array_slice($groups, 5, 5, true) as $slug => $group): ?>
                        <a href="hizmet.php?k=<?= e($slug) ?>"><?= e($group['title']) ?></a>
                    <?php endforeach; ?>
                </div>
                <div>
                    <h3>NETA</h3>
                    <a href="<?= e(site_url('#about')) ?>">Hakkımızda</a>
                    <a href="<?= e(site_url('#industries')) ?>">Sektörler</a>
                    <a href="<?= e(site_url('#contact')) ?>">İletişim</a>
                </div>
                <div class="footer__social">
                    <h3>Bizi takip edin</h3>
                    <span>
                        <a href="https://www.linkedin.com/company/neta-sertifikasyon/" aria-label="LinkedIn">in</a>
                        <a href="https://www.instagram.com/neta.sertifikasyon/" aria-label="Instagram">ig</a>
                        <a href="https://www.facebook.com/sertifikasyonneta/" aria-label="Facebook">fb</a>
                    </span>
                </div>
            </div>
            <div class="footer__bottom">
                <p>© <?= date('Y') ?> NETA Sertifikasyon. Tüm hakları saklıdır.</p>
                <div><a href="#">Gizlilik</a><a href="#">KVKK</a><a href="#">Çerezler</a></div>
            </div>
        </div>
    </footer>
    <button class="to-top" type="button" aria-label="Yukarı çık">↑</button>
</body>
</html>
