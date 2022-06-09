<?php

use yii\helpers\Url;

$this->title = 'DASHBOARD';
?>

<style>
    @media (max-width: 991px) {

        .container.homeku {
            padding: 0px 0px 0px 0px !important;
        }

        .container.homeku,
        .col-sm-8 {
            padding: 0px 10px 0px 10px !important;
        }

        .h1-homeku {
            font-size: 20px;
            font-weight: 500;
            line-height: 35px;
            margin-bottom: 24px;
            text-align: center;
            font-family: 'Josefin Sans', sans-serif !important
        }

        .p-homeku {
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            text-align: center;
        }
    }

    .container.homeku {
        padding: 50px 70px 50px 20px;
    }

    .h1-homeku {
        font-size: 33px;
        font-weight: 500;
        line-height: 35px;
        margin-bottom: 24px;
    }

    .p-homeku {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

    .land-service {
        text-align: center;
        padding: 15px 15px 40px 15px;
        margin: 0px 0px 40px 0px;
        border: 1px solid #c1c1c1;
        border-radius: 2%;
    }

    h3.land-title {
        display: block;
        color: #1d21297f;
        font-size: 13px;
        font-weight: 600;
    }

    h2.land-subtitle {
        display: block;
        color: #000000;
        font-size: 18px;
        font-weight: 500;
    }

    p {
        color: #000000;

    }

    .btn-fitur-lainnya {
        padding: 20px;
    }

    .img-klien img {
        background-color: white;
        filter: drop-shadow(5px 5px 5px #c1c5c9);
        padding: 25px;
        border-radius: 3%;
        border: 1px solid #dadddf;
        transition: transform .2s;
    }

    .img-klien img:hover {
        cursor: zoom-in;
        transform: scale(1.2);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>
<!-- home start -->
<section class="section bg-light" style="padding-bottom: 0px;" id="home">
    <div class="container homeku">
        <div class="row">
            <div class="col-sm-6" style="vertical-align: middle; padding: 15% 5% 5% 0%;">
                <h5 class="h1-homeku" style="text-align: left;font-family: 'Josefin Sans', sans-serif !important">
                    <?= strtoupper('<b>Ruang hati</b> adalah pusat pelayanan psikologi yang bergerak dibawah naungan Fakultas Psikologi UIN Sultan Syarif Kasim Riau') ?>.
                </h5>
                <p class="p-homeku" style="font-family: 'Josefin Sans', sans-serif !important">
                    "<b>Ruang hati</b> menyediakan berbagai layanan psikologi baik bagi individu, kelompok ataupun masyarakat. Dengan tujuan dapat membantu masyarakat dalam mencapai kesejahteraan, kebahagiaan dan kebermaknaan dalam kehidupannnya" </p>
            </div>
            <div class="col-sm-6" style="vertical-align: middle; padding: 10% 10% 15% 10%;">
                <img style="width: 100%;" src="<?= Url::to('@web/img/psychology-sider.png') ?>" alt="">
            </div>
        </div>
    </div>
</section>
<!-- home end -->

<!-- services start -->
<section class="section bg-light" id="services">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="title text-center mb-4">
                    <h6 class="text-primary small-title">Fitur</h6>
                    <h4>Apa yang kami bisa?</h4>
                    <!-- <p class="text-muted">At solmen va esser far uniform grammatica.</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="col-sm-12 land-service" style="overflow: hidden; height: 500px; background-color: #fbf9ef;">
                    <h3 class="land-title">
                        Konseling
                    </h3>
                    <h2 class="land-subtitle" style="font-size: 15px;">
                        “Konseling diberikan oleh para psikolog dan ilmuan psikologi yang professional”
                    </h2>
                    <p>
                        Masalah kadang membuat kita merasa terpuruk, tidak semangat, terasing atau merasa sendiri, hilang kendali, dan masalah mu sangat menganggu aktivitasmu, atau mungkin membahayakan,
                        Ayo kawan, anda tidak sendiri, Ruang Hati hadir disini untuk memberikan layanan konsultasi psikologis.
                    </p>
                    <br>
                    <br>
                    <img style="width: 35%;" src="<?= Url::to('@web/img/consulting.png') ?>" alt="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-12 land-service" style="overflow: hidden; height: 500px; background-color: #fbf9ef;">
                    <h3 class="land-title">
                        Psikotes/Asesmen Psikologi
                    </h3>
                    <h2 class="land-subtitle" style="font-size: 15px;">
                        Serangkaian tes psikologi yang diberikan kepada klien dengan berbagai tujuan. Semua tes yang kami berikan tersandar dengan valid dan reliabel. Hasil tes disajikan dengan psikogram dan Deskripsi/paparan dinamika psikologis yang disertai kesimpulan/rekomendasi psikolog Serangkaian tes psikologi yang diberikan kepada klien dengan berbagai tujuan. Semua tes yang kami berikan tersandar dengan valid dan reliabel. Hasil tes disajikan dengan psikogram dan Deskripsi/paparan dinamika psikologis yang disertai kesimpulan/rekomendasi psikolog
                    </h2>
                    <p>

                    </p>
                    </p>
                    <br>
                    <br>
                    <img style="width: 35%;" src="<?= Url::to('@web/img/clipboard.png') ?>" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="col-sm-12 land-service" style="overflow: hidden; height: 500px; background-color: #fbf9ef;">
                    <h3 class="land-title">
                        Training
                    </h3>
                    <h2 class="land-subtitle" style="font-size: 15px;">
                        Ruang hati memberikan layanan untuk training bagi sumber daya manusia pada bidang organisasi/industri, sekolah dan masyarakat. Training bertujuan dalam meningkatkan dan mengembangkan hardskill dan softskill dan sikap pada SDM. Training dapat dilakukan di indoor atau secara outbond sesuai kebutuhan klien </h2>
                    <p>
                    </p>
                    <br>
                    <br>
                    <img style="width: 35%;" src="<?= Url::to('@web/img/education.png') ?>" alt="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-12 land-service" style="overflow: hidden; height: 500px; background-color: #fbf9ef;">
                    <h3 class="land-title">
                        Layanan psychology care for community empowerment
                    </h3>
                    <h2 class="land-subtitle" style="font-size: 15px;">
                        Layanan ini merupakan pengabdian masyarakat yang menggunakan pendekatan psikoedukasi dan intervensi bagi masyarakat. Layanan ini bertujuan untuk membantu pemberdayaan masyarakat dengan layanan psikologi berbasis komunitas. </h2>
                    <p>
                    </p>
                    <br>
                    <br>
                    <img style="width: 35%;" src="<?= Url::to('@web/img/support.png') ?>" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="<?= Url::to(['/site/fitur']) ?>" class="btn btn-custom btn-xl btn-fitur-lainnya">Lihat Fitur Lainnya</a>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</section>
<!-- services end -->
<section class="section bg-light" id="services">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title text-center mb-4">
                    <h6 class="text-primary small-title">Jadwal</h6>
                    <h4>Jadwal Layanan dan Nomor Admin</h4>
                    <!-- <p class="text-muted">At solmen va esser far uniform grammatica.</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12 land-service" style="overflow: hidden; height: 500px; background-color: #b3ffc7;">
                    <h3 class="land-title">
                        Jadwal Layanan:
                    </h3>
                    <h2 class="land-subtitle" style="font-size: 15px;">
                        1. Waktu: Layanan diberikan setiap hari kerja, Senin-Jumat Pukul 08.30 sampai 16.00 (dan sesuai kesepakatan). <br>
                        2. Tempat: Bagi klien yang melakukan konseling bisa langsung datang ke Fakultas Psikologi, dan VIA phone nomor admin terlampir. Dan klien psikotes dapat dilakukan ditempat instansi yang disepakati.
                    </h2>
                    <p>
                       
                    </p>
                    <br>
                    <br>
                    <img style="width: 25%;" src="<?= Url::to('@web/img/consulting.png') ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- counter start -->
<section class="section bg-gradient" id="klien">
    <div class="container-fluid">
        <div class="row" id="counter">
            <div class="col-lg-4">
                <div class="text-center p-3">
                    <div class="counter-icon text-white-50 mb-4">
                        <i class="pe-7s-add-user display-4"></i>
                    </div>
                    <div class="counter-content text-white">
                        <h2 class="counter-value mb-3" data-count="100">100</h2>
                        <h5 class="counter-name">Klien</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="text-center p-3">
                    <div class="counter-icon text-white-50 mb-4">
                        <i class="pe-7s-cart display-4"></i>
                    </div>
                    <div class="counter-content text-white">
                        <h2 class="mb-3"><span class="counter-value" data-count="100">0</h2>
                        <h5 class="counter-name">Pasien</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="text-center p-3">
                    <div class="counter-icon text-white-50 mb-4">
                        <i class="pe-7s-smile display-4"></i>
                    </div>
                    <div class="counter-content text-white">
                        <h2 class="counter-value mb-3" data-count="1000">0</h2>
                        <h5 class="counter-name">Total Pelayanan</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- counter end -->