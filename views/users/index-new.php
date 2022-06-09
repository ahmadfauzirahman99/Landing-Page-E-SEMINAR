<?php

use app\assets\DatatableAsset;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

DatatableAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <a href="<?= Url::to(['users/create']) ?>" data-toggle='modal' data-title='Tambah Data Pengguna' data-target='#myModal' class="btn bg-gradient-purple">Tambah Pengguna <span class="fas fa-plus"></span></a>
                            <a href="#" onclick="updateDataTable()" class="btn btn-default">Refresh <span class="fas fa-spinner"></span></a>
                        </div>
                    </div>
                    <hr>
                    <table id="responsive-datatable" width="100%" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="16.6%">Aksi</th>
                                <th style="text-align: center;" width="16.6%">Username</th>
                                <th style="text-align: center;" width="16.6%">Nama Lengkap</th>
                                <th style="text-align: center;" width="16.6%">Email</th>
                                <th style="text-align: center;" width="16.6%">Tanggal Pendaftaran</th>
                                <th style="text-align: center;" width="16.6%">Verifikasi</th>
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


<?php $this->registerJs($this->render('index.js'), View::POS_END) ?>
<?php $this->registerJs($this->render('index-func.js'), View::POS_END) ?>