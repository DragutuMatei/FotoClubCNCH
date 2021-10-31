<style>
    .scroll-header {
        background: <?php echo $settings->secondcolor; ?> !important;
    }

    @media screen and (max-width: 767px) {
        .nav__menu {
            background: <?php echo $settings->secondcolor; ?> !important;

        }
    }
</style>
<header class="header" id="header" style=" background:<?php echo $settings->background; ?>">
    <nav class="nav container">
        <a href="index.php" class="nav__logo active-link">
            FotoClubCNCH
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="index.php" class="nav__link">Home</a>
                </li>

                <li class="nav__item">
                    <a href="index.php#about" class="nav__link">About</a>
                </li>

                <li class="nav__item">
                    <a href="sezoane.php" class="nav__link">Sezoane</a>
                </li>



                <?php
                if ($user->isLoggedIn()) {
                    echo
                    '
                    <li class="nav__item">
                        <a href="api/logout.php" class="nav__link">Logout</a>
                    </li>
                    <a href="#" class="button button--ghost">' . $user->data()->username . '</a>';
                } else {
                    echo ' <li class="nav__item">
                    <a href="register.php" class="nav__link">Login</a>
                </li>';
                }
                ?>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class='bx bx-x'></i>
            </div>

            <!-- <img src="assets/img/nav-img.png" alt="" class="nav__img"> -->
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-grid-alt'></i>
        </div>

    </nav>
</header>
<script>
    document.querySelectorAll(".nav__link").forEach(link => {
        link.addEventListener("mouseover", () => {
            link.classList.add("active-link");
        });
        link.addEventListener("mouseout", () => {
            link.classList.remove("active-link");
        });
    })
</script>