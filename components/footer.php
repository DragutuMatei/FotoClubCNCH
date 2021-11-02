<footer class="footer section">
    <div class="footer__container container grid">
        <div class="footer__content">
            <a href="#" class="footer__logo">
                <img src="assets/img/logo.png" alt="" class="footer__logo-img">
                FotoClubCNCH
            </a>

            <p class="footer__description">“In photography there is a reality so subtle that it becomes more real than reality.” <br> by Alfred Stieglitz</p>

            <div class="footer__social">
                <a style="background: <?php echo $settings->secondcolor; ?>" href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                    <i class='bx bxl-facebook'></i>
                </a>
                <a style="background: <?php echo $settings->secondcolor; ?>" href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                    <i class='bx bxl-instagram-alt'></i>
                </a>
                <a style="background: <?php echo $settings->secondcolor; ?>" href="https://twitter.com/" target="_blank" class="footer__social-link">
                    <i class='bx bxl-twitter'></i>
                </a>
            </div>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Links</h3>

            <ul class="footer__links">
                <li>
                    <a href="index.php#about" class="footer__link">About</a>
                </li>
                <li>
                    <a href="sezoane.php" class="footer__link">Sezoane</a>
                </li>
            </ul>
        </div>

        <!-- <div class="footer__content">
                <h3 class="footer__title">Our Company</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Blog</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">About us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Our mision</a>
                    </li>
                </ul>
            </div> -->
    </div>

    <span class="footer__copy">&#169; FotoClubCNCH. All rigths reserved</span>

    <img src="<?php echo $settings->imgfooter1 ?>" alt="" class="footer__img-one">
    <img src="<?php echo $settings->imgfooter2 ?>" alt="" class="footer__img-two">
</footer>