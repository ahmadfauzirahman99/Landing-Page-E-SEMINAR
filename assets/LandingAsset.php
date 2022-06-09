<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2021-06-11 06:40:56 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2021-06-11 06:59:45
 */


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
class LandingAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/themes-land';
    public $css = [
        'css/bootstrap.min.css',
        'css/materialdesignicons.min.css',
        // 'css/pe-icon-7-stroke.min.css',
        'css/magnific-popup.css',
        'css/style.css',
        'style-custom.css',
        // 'css/site.css',
    ];
    public $js = [
        // "vendor/jquery/jquery-3.2.1.min.js",
        // 'js/jquery.min.js',
        'js/bootstrap.bundle.min.js',
        'js/jquery.easing.min.js',
        'js/scrollspy.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/counter.int.js',
        'js/app.js',
        '../js/site.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'rmrevin\yii\fontawesome\CdnProAssetBundle',
    ];
}
