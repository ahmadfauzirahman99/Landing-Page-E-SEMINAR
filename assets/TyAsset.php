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
class TyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/js';
    public $jsOptions = ['position' => \yii\web\View::POS_END];

    public $css = [];
    public $js = [
        'plugins/tinymce/jquery.tinymce.min.js',
        'plugins/tinymce/tinymce.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',

        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
