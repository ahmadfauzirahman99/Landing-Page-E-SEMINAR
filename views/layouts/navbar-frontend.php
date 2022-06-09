<?php

use app\models\Layanan;
use yii\helpers\Url;
?>
<ul class="navigation-menu">
    <li><a href="<?= Url::to(['main/index']) ?>">Home</a></li>
    <li class="has-submenu">
        <a href="javascript:void(0)">Layanan</a><span class="menu-arrow"></span>
        <ul class="submenu">
            <?php foreach (Layanan::find()->all() as $itemLayanan) { ?>
                <li><a href="<?= Url::to(['main/layanan-kami', 'slug' => $itemLayanan->id_layanan]) ?>"><?= $itemLayanan->nama_layanan ?></a></li>
            <?php } ?>
        </ul>
    </li>
    <li><a href="<?= Url::to(['blog/index']) ?>">Blog</a></li>
    <li><a href="<?= Url::to(['tentang-kami/index']) ?>">Tentang Kami</a></li>
    <li class="has-submenu">
        <a href="javascript:void(0)">Landing</a><span class="menu-arrow"></span>
        <ul class="submenu megamenu">
            <li>
                <ul>
                    <li><a href="index-saas.html">Saas</a></li>
                    <li><a href="index-classic-saas.html">Classic Saas</a></li>
                    <li><a href="index-agency.html">Agency</a></li>
                    <li><a href="index-apps.html">Application</a></li>
                    <li><a href="index-classic-app.html">Classic Application</a></li>
                    <li><a href="index-studio.html">Studio</a></li>
                    <li><a href="index-business.html">Business</a></li>
                    <li><a href="index-modern-business.html">Modern Business</a></li>
                    <li><a href="index-hotel.html">Hotel</a></li>
                    <li><a href="index-marketing.html">Marketing</a></li>
                    <li><a href="index-enterprise.html">Enterprise</a></li>
                    <li><a href="index-insurance.html">Insurance</a></li>
                    <li><a href="index-shop.html">Shop</a></li>
                    <li><a href="index-coworking.html">Coworking</a></li>
                </ul>
            </li>

            <li>
                <ul>
                    <li><a href="index-it-solution.html">IT Solution <span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="index-corporate.html">Corporate Business<span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="index-task-management.html">Task Management <span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="index-email-inbox.html">Email Inbox <span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="index-landing-one.html">Landing One <span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="index-landing-two.html">Landing Two <span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="index-landing-three.html">Landing Three <span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="index-travel.html">Travel <span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="index-blog.html">Blog <span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="forums.html">Forums <span class="badge badge-danger rounded">v2.5</span></a></li>
                    <li><a href="index-personal.html">Personal</a></li>
                    <li><a href="index-services.html">Service</a></li>
                    <li><a href="index-payments.html">Payments</a></li>
                    <li><a href="index-crypto.html">Cryptocurrency</a></li>
                </ul>
            </li>
            <li>
                <ul>
                    <li><a href="index-course.html">Course</a></li>
                    <li><a href="index-online-learning.html">Online Learning</a></li>
                    <li><a href="index-hosting.html">Hosting & Domain</a></li>
                    <li><a href="index-event.html">Event</a></li>
                    <li><a href="index-single-product.html">Product</a></li>
                    <li><a href="index-portfolio.html">Portfolio</a></li>
                    <li><a href="index-job.html">Job</a></li>
                    <li><a href="index-social-marketing.html">Social Media</a></li>
                    <li><a href="index-digital-agency.html">Digital Agency</a></li>
                    <li><a href="index-car-riding.html">Car Ride</a></li>
                    <li><a href="index-customer.html">Customer</a></li>
                    <li><a href="index-software.html">Software</a></li>
                    <li><a href="index-ebook.html">E-Book</a></li>
                    <li><a href="index-onepage.html">Saas <span class="badge badge-pill badge-warning ml-2">Onepage</span></a></li>
                </ul>
            </li>
        </ul>
    </li>
</ul>