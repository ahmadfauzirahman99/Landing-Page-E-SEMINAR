<?php

use yii\helpers\Url;
?>
<aside class="main-sidebar sidebar-light-purple elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::to(['/site/index']) ?>" class="brand-link" style="font-family: 'Lora', cursive;font-weight: 100 !important;">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light "><b><strong style="margin-top: 11px;">&nbsp; RUANG HATI</strong></b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Dashbord', 'url' => '', 'header' => true],

                    [
                        'label' => 'Dashboard',
                        'icon' => 'tachometer-alt',
                        'items' => [
                            ['label' => 'Home', 'url' => ['site/index'], 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Menu User', 'url' => '', 'header' => true],

                    ['label' => 'Data User', 'icon' => 'users', 'url' => ['/users/index'],],

                    ['label' => 'Data Master Seminar', 'url' => '', 'header' => true],

                    ['label' => 'Data Seminar', 'icon' => 'star', 'url' => ['/seminar/index'],],
                    ['label' => 'Pembicara', 'icon' => 'users', 'url' => ['/pembicara/index'],],
                    ['label' => 'Tiket', 'icon' => 'ticket-alt', 'url' => ['/tiket/index'],],
                    ['label' => 'Sponsor', 'icon' => 'user-friends', 'url' => ['/sponsor/index'],],

                ]
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>