<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes/frontend';
    public $css = [
        "css/bootstrap.min.css",
        "css/magnific-popup.css",
        "css/materialdesignicons.min.css",
        "https://unicons.iconscout.com/release/v2.1.9/css/unicons.css",
        "css/owl.carousel.min.css",
        "css/owl.theme.default.min.css",
        "css/style.css",
        "css/colors/default.css",
    ];
    public $js = [
        "js/jquery-3.5.1.min.js",
        "js/bootstrap.bundle.min.js",
        "js/jquery.easing.min.js",
        "js/scrollspy.min.js",
        "js/jquery.magnific-popup.min.js",
        "js/magnific.init.js",
        "js/counter.init.js ",
        "js/owl.carousel.min.js ",
        "js/owl.init.js ",
        "js/feather.min.js",
        "https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js",
        "js/app.js",
        // "../../"
    ];
    public $depends = [
        'yii\web\JqueryAsset',

        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
