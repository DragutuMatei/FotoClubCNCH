<?php
require_once './core/init.php';

$db = DB::getInstance();

$settings = $db->get("settings", array("id", ">=", "1"));
$settings = $settings->first();
$user = new User();
$txt2Modif = explode(" ", $settings->textdoi);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/scss/styles.css">
    <title>FotoClubCNCH</title>
</head>

<body style="background: <?php echo $settings->background ?>">

    <?php require_once './components/navbar.php'; ?>

    <main class="main">
        <section class="home container" id="home">
            <div class="swiper home-swiper">
                <div class="swiper-wrapper">
                    <!-- HOME SLIDER 1 -->
                    <section class="swiper-slide">
                        <div class="home__content grid">
                            <div class="home__group">
                                <img src="<?php echo $settings->imgfirst ?>" alt="" class="home__img">

                                <div class="home__details-img">
                                </div>
                            </div>

                            <div class="home__data">
                                <h3 class="home__subtitle"><?php echo $settings->upfirst;  ?></h3>
                                <h1 class="home__title"><?php echo $settings->middlefirst; ?></h1>
                                <p class="home__description"><?php echo $settings->downfirst; ?>
                                </p>

                                <div class="home__buttons">
                                    <a href="#" class="button"><?php echo $settings->buttonfirst; ?></a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- HOME SLIDER 2 -->
                    <section class="swiper-slide">
                        <div class="home__content grid">
                            <div class="home__group">
                                <img src="<?php echo $settings->imgsecond ?>" alt="" class="home__img">

                                <div class="home__details-img">
                                </div>
                            </div>

                            <div class="home__data">
                                <h3 class="home__subtitle"><?php echo $settings->upsecond;  ?></h3>
                                <h1 class="home__title"><?php echo $settings->middlesecond; ?></h1>
                                <p class="home__description"><?php echo $settings->downsecond; ?>
                                </p>

                                <div class="home__buttons">
                                    <a href="#" class="button"><?php echo $settings->buttonfirst; ?></a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- HOME SLIDER 3 -->
                    <section class="swiper-slide">
                        <div class="home__content grid">
                            <div class="home__group">
                                <img src="<?php echo $settings->imgthird ?>" alt="" class="home__img">

                                <div class="home__details-img">
                                </div>
                            </div>

                            <div class="home__data">
                                <h3 class="home__subtitle"><?php echo $settings->upthird;  ?></h3>
                                <h1 class="home__title"><?php echo $settings->middlethird; ?></h1>
                                <p class="home__description"><?php echo $settings->downthird; ?>
                                </p>

                                <div class="home__buttons">
                                    <a href="#" class="button"><?php echo $settings->buttonfirst; ?></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <!--==================== CATEGORY ====================-->
        <!-- <section class="section category">
            <h2 class="section__title">Favorite Scare <br> Category</h2>

            <div class="category__container container grid">
                <div class="category__data">
                    <img src="assets/img/category1-img.png" alt="" class="category__img">
                    <h3 class="category__title">Ghosts</h3>
                    <p class="category__description">Choose the ghosts, the scariest there are.</p>
                </div>

                <div class="category__data">
                    <img src="assets/img/category2-img.png" alt="" class="category__img">
                    <h3 class="category__title">Pumpkins</h3>
                    <p class="category__description">You look at the scariest pumpkins there is.</p>
                </div>

                <div class="category__data">
                    <img src="assets/img/category3-img.png" alt="" class="category__img">
                    <h3 class="category__title">Witch Hat</h3>
                    <p class="category__description">Pick the most stylish witch hats out there.</p>
                </div>
            </div>
        </section> -->

        <section class="section discount" id="about">
            <div class="discount__container container grid" style="background:<?php echo $settings->secondcolor; ?>">
                <div class="discount__data">
                    <h2 class="discount__title"><?php
                                                for ($i = 0; $i < count($txt2Modif); $i++) {
                                                    echo $txt2Modif[$i] . " ";
                                                    if ($i == count($txt2Modif) / 2) {
                                                        echo "<br/>";
                                                    }
                                                }
                                                ?></h2>
                    <a href="#" class="button"><?php echo $settings->buttondoi; ?></a>
                </div>

                <img src="<?php echo $settings->imgdoi ?>" alt="" class="discount__img">
            </div>
        </section>
        <!--==================== ABOUT ====================-->
        <section class="section about">
            <div class="about__container container grid">
                <div class="about__data">
                    <h2 class="section__title about__title"><?php echo $settings->titabout; ?></h2>
                    <p class="about__description">
                        <?php echo $settings->textabout; ?>
                    </p>
                    <a href="#" class="button"><?php echo $settings->buttonabout;  ?></a>
                </div>

                <img src="<?php echo $settings->imgabout ?>" alt="" class="about__img">
            </div>
        </section>

        <!--==================== TRICK OR TREAT ====================-->
        <!-- <section class="section trick" id="trick">
            <h2 class="section__title">Trick Or Treat</h2>

            <div class="trick__container container grid">
                <div class="trick__content">
                    <img src="assets/img/trick-treat1-img.png" alt="" class="trick__img">
                    <h3 class="trick__title">Toffee</h3>
                    <span class="trick__subtitle">Candy</span>
                    <span class="trick__price">$11.99</span>
                    <button class="button trick__button">
                        <i class='bx bx-cart-alt trick__icon'></i>
                    </button>
                </div>

                <div class="trick__content">
                    <img src="assets/img/trick-treat2-img.png" alt="" class="trick__img">
                    <h3 class="trick__title">Bone</h3>
                    <span class="trick__subtitle">Accessory</span>
                    <span class="trick__price">$8.99</span>
                    <button class="button trick__button">
                        <i class='bx bx-cart-alt trick__icon'></i>
                    </button>
                </div>

                <div class="trick__content">
                    <img src="assets/img/trick-treat3-img.png" alt="" class="trick__img">
                    <h3 class="trick__title">Scarecrow</h3>
                    <span class="trick__subtitle">Accessory</span>
                    <span class="trick__price">$15.99</span>
                    <button class="button trick__button">
                        <i class='bx bx-cart-alt trick__icon'></i>
                    </button>
                </div>

                <div class="trick__content">
                    <img src="assets/img/trick-treat4-img.png" alt="" class="trick__img">
                    <h3 class="trick__title">Candy Cane</h3>
                    <span class="trick__subtitle">Candy</span>
                    <span class="trick__price">$7.99</span>
                    <button class="button trick__button">
                        <i class='bx bx-cart-alt trick__icon'></i>
                    </button>
                </div>

                <div class="trick__content">
                    <img src="assets/img/trick-treat5-img.png" alt="" class="trick__img">
                    <h3 class="trick__title">Pumpkin</h3>
                    <span class="trick__subtitle">Candy</span>
                    <span class="trick__price">$19.99</span>
                    <button class="button trick__button">
                        <i class='bx bx-cart-alt trick__icon'></i>
                    </button>
                </div>

                <div class="trick__content">
                    <img src="assets/img/trick-treat6-img.png" alt="" class="trick__img">
                    <h3 class="trick__title">Ghost</h3>
                    <span class="trick__subtitle">Accessory</span>
                    <span class="trick__price">$17.99</span>
                    <button class="button trick__button">
                        <i class='bx bx-cart-alt trick__icon'></i>
                    </button>
                </div>
            </div>
        </section> -->

        <!--==================== DISCOUNT ====================-->


        <!--==================== NEW ARRIVALS ====================-->
        <!-- <section class="section new" id="new">
            <h2 class="section__title">New Arrivals</h2>

            <div class="new__container container">
                <div class="swiper new-swiper">
                    <div class="swiper-wrapper">
                        <div class="new__content swiper-slide">
                            <div class="new__tag">New</div>
                            <img src="assets/img/new1-img.png" alt="" class="new__img">
                            <h3 class="new__title">Haunted House</h3>
                            <span class="new__subtitle">Accessory</span>

                            <div class="new__prices">
                                <span class="new__price">$14.99</span>
                                <span class="new__discount">$29.99</span>
                            </div>

                            <button class="button new__button">
                                <i class='bx bx-cart-alt new__icon'></i>
                            </button>
                        </div>

                        <div class="new__content swiper-slide">
                            <div class="new__tag">New</div>
                            <img src="assets/img/new2-img.png" alt="" class="new__img">
                            <h3 class="new__title">Halloween Candle</h3>
                            <span class="new__subtitle">Accessory</span>

                            <div class="new__prices">
                                <span class="new__price">$11.99</span>
                                <span class="new__discount">$21.99</span>
                            </div>

                            <button class="button new__button">
                                <i class='bx bx-cart-alt new__icon'></i>
                            </button>
                        </div>

                        <div class="new__content swiper-slide">
                            <div class="new__tag">New</div>
                            <img src="assets/img/new3-img.png" alt="" class="new__img">
                            <h3 class="new__title">Witch Hat</h3>
                            <span class="new__subtitle">Accessory</span>

                            <div class="new__prices">
                                <span class="new__price">$4.99</span>
                                <span class="new__discount">$9.99</span>
                            </div>

                            <button class="button new__button">
                                <i class='bx bx-cart-alt new__icon'></i>
                            </button>
                        </div>

                        <div class="new__content swiper-slide">
                            <div class="new__tag">New</div>
                            <img src="assets/img/new4-img.png" alt="" class="new__img">
                            <h3 class="new__title">Rip</h3>
                            <span class="new__subtitle">Accessory</span>

                            <div class="new__prices">
                                <span class="new__price">$24.99</span>
                                <span class="new__discount">$44.99</span>
                            </div>

                            <button class="button new__button">
                                <i class='bx bx-cart-alt new__icon'></i>
                            </button>
                        </div>

                        <div class="new__content swiper-slide">
                            <div class="new__tag">New</div>
                            <img src="assets/img/new5-img.png" alt="" class="new__img">
                            <h3 class="new__title">Terrifying Crystal Ball</h3>
                            <span class="new__subtitle">Accessory</span>

                            <div class="new__prices">
                                <span class="new__price">$5.99</span>
                                <span class="new__discount">$12.99</span>
                            </div>

                            <button class="button new__button">
                                <i class='bx bx-cart-alt new__icon'></i>
                            </button>
                        </div>

                        <div class="new__content swiper-slide">
                            <div class="new__tag">New</div>
                            <img src="assets/img/new6-img.png" alt="" class="new__img">
                            <h3 class="new__title">Witch Broom</h3>
                            <span class="new__subtitle">Accessory</span>

                            <div class="new__prices">
                                <span class="new__price">$7.99</span>
                                <span class="new__discount">$14.99</span>
                            </div>

                            <button class="button new__button">
                                <i class='bx bx-cart-alt new__icon'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!--==================== OUR NEWSLETTER ====================-->
        <section class="section newsletter">
            <div class="newsletter__container container">
                <h2 class="section__title">Our Newsletter</h2>
                <p class="newsletter__description">
                    Promotion new products and sales. Directly to your inbox
                </p>

                <form action="" class="newsletter__form" style="background: <?php echo $settings->secondcolor; ?>">
                    <input type="text" placeholder="Enter your email" class="newsletter__input">
                    <button class="button">
                        Subscribe
                    </button>
                </form>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">
                    <img src="assets/img/logo.png" alt="" class="footer__logo-img">
                    Halloween
                </a>

                <p class="footer__description">Enjoy the scariest night <br> of your life.</p>

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
                <h3 class="footer__title">About</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Features</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">News</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Services</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Discounts</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Shipping mode</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
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
            </div>
        </div>

        <span class="footer__copy">&#169; Bedimcode. All rigths reserved</span>

        <img src="<?php echo $settings->imgfooter1 ?>" alt="" class="footer__img-one">
        <img src="<?php echo $settings->imgfooter2 ?>" alt="" class="footer__img-two">
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up" style="background: <?php echo $settings->secondcolor; ?>">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>