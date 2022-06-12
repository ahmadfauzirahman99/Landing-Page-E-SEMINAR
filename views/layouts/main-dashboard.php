<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\Breadcrumbs;
use app\assets\FrontendAsset;
use app\assets\LandingAsset;
use yii\helpers\Url;

LandingAsset::register($this);
// \hail812\adminlte3\assets\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="developer" content="Ahmad Fauzi Rahman, S.T., MTA" />
    <link rel="shortcut icon" href="<?= Url::to('@web/img/logo_occ/logo1png.png') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Fresca&family=Inter:wght@100;300;500;700&family=Lora:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Roboto:ital,wght@0,300;0,400;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script>
        // const baseUrl = '<?= Yii::$app->homeUrl ?>';
    </script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <style>
        * {
            font-family: 'Roboto', sans-serif !important;
            font-weight: 300 I !important;
        }

        .img-border {
            /* width: 400px;
            height: 200px;
            background: url(img/tiger.png) no-repeat; */
            border: 2px solid #fff;
            border-radius: 10px;
            box-shadow: 10px 10px 5px #ccc;
            -moz-box-shadow: 10px 10px 5px #ccc;
            -webkit-box-shadow: 10px 10px 5px #ccc;
            -khtml-box-shadow: 10px 10px 5px #ccc;
        }
    </style>
    <script>
        const baseUrl = '<?= Yii::$app->homeUrl ?>';
    </script>
    <?php $this->head() ?>
</head>

<body class="shop-page">
    <?php $this->beginBody() ?>
    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
        <div class="container-fluid">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="<?= Url::to(['/main/index']) ?>">
                <img src="<?= Url::to('@web/img/psychology.png') ?>" alt="" class="logo-light" height="35" /> <b>Ruang Hati</b>
                <img src="<?= Url::to('@web/img/psychology.png') ?>" alt="" class="logo-dark" height="35" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                    <li class="nav-item active">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#services" class="nav-link">Fitur</a>
                    </li>

                    <li class="nav-item">
                        <a href="#klien" class="nav-link">Klien</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <section>
        <?= Alert::widget() ?>
    </section>
    <?= $content ?>

    <!-- footer start -->
    <footer class="footer bg-dark">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <div class="footer-logo mb-3">
                            <img src="<?= Url::to('@web/img/logo_occ/OK5-1-putih.png') ?>" alt="" height="40">
                        </div>
                        <!-- <ul class="list-inline footer-list text-center mt-5">
                            <li class="list-inline-item"><a href="#">Home</a></li>
                            <li class="list-inline-item"><a href="#">About</a></li>
                            <li class="list-inline-item"><a href="#">Services</a></li>
                            <li class="list-inline-item"><a href="#">Clients</a></li>
                            <li class="list-inline-item"><a href="#">Pricing</a></li>
                            <li class="list-inline-item"><a href="#">Contact</a></li>
                        </ul> -->
                        <ul class="list-inline social-links mb-4 mt-5">
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-google-plus"></i></a></li>
                        </ul>
                        <p class="text-white-50 mb-4"><?= date('Y') ?> © Ruanghati</p>

                    </div>
                </div>

            </div>

        </div>
    </footer>
    <!-- footer end -->


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>