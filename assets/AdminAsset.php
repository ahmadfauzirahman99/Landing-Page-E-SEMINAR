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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes';
    public $css = [
        "assets/vendors/core/core.css",
        "assets/fonts/feather-font/css/iconfont.css",
        "assets/vendors/flag-icon-css/css/flag-icon.min.css",
        "assets/css/demo_1/style.css",
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    ];
    public $js = [
        // "",
        "assets/vendors/feather-icons/feather.min.js",
        "assets/js/template.js",
    ];
    public $depends = [
        'yii\web\JqueryAsset',

        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
