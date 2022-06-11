<?php

use app\assets\DatatableAsset;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TiketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

DatatableAsset::register($this);
$this->title = 'List Tiket';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <a href="#" onclick="tambah()" class="btn bg-gradient-purple">Tambah Tiket <span class="fas fa-plus"></span></a>
                            <a href="#" onclick="updateDataTable()" class="btn btn-default">Refresh <span class="fas fa-spinner"></span></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="responsive-datatable" width="100%" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="20%">Aksi</th>
                                <th style="text-align: center;" width="25%">Nama Seminar</th>
                                <th style="text-align: center;" width="25%">Harga </th>
                                <th style="text-align: center;" width="25%">Slot</th>
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
<?php $this->registerJs($this->render('index-tiket.js'), View::POS_END) ?>
<?php $this->registerJs($this->render('index-tiket-func.js'), View::POS_END) ?>