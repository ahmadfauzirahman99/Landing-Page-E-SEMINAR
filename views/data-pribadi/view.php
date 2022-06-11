<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataPribadi */

$this->title = $model->id_data_pribadi;
$this->params['breadcrumbs'][] = ['label' => 'Data Pribadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id_data_pribadi], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id_data_pribadi], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id_data_pribadi',
                            'u_id',
                            'nama_lengkap',
                            'nik',
                            'tempat_lahir',
                            'tanggal_lahir',
                            'jenis_kelamin',
                            'kewenegaraan',
                            'agama',
                            'alamat:ntext',
                            'id_kel',
                            'rt',
                            'rw',
                            'kode_pos',
                            'status',
                            'no_telp',
                            'foto:ntext',
                            'id_kec',
                            'id_kab',
                            'id_prov',
                            'lat',
                            'lng',
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>