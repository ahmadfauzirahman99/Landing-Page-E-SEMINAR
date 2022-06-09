<?php

use app\assets\DatatableAsset;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SeminarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

DatatableAsset::register($this);
$this->title = 'List Seminar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <hr>
                    <table id="responsive-datatable" width="100%" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="25%">Aksi</th>
                                <th style="text-align: center;" width="25%">Nama Seminar</th>
                                <th style="text-align: center;" width="25%">Tanggal Pelaksanaan</th>
                                <th style="text-align: center;" width="25%">Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
<div class="modal fade bd-example-modal-lg" id="mymodal2" tabindex="false" role="dialog" data-keyboard='false' aria-labelledby="myModalLabel"></div>
<?php $this->registerJs($this->render('index-seminar.js'), View::POS_END) ?>
<?php $this->registerJs($this->render('index-seminar-func.js'), View::POS_END) ?>