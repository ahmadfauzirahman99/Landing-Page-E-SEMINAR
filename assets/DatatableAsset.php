<?php

namespace app\assets;

use yii\web\AssetBundle;

class DatatableAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $css = [
        "plugins/datatables/dataTables.bootstrap4.min.css",
        "plugins/datatables/fixedHeader.dataTables.min.css",
        // "plugins/datatables/jquery.dataTables.min.css",
        // "plugins/datatables/rowGroup.dataTables.min.css"

    ];
    public $js = [
        "plugins/datatables/jquery.dataTables.min.js",
        "plugins/datatables/dataTables.bootstrap4.min.js",
        "plugins/datatables/dataTables.rowGroup.min.js",
        "plugins/datatables/dataTables.fixedHeader.min.js",
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
        'yii\web\JqueryAsset'
    ];
}
