<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Seminar */

$this->title = $model->nama_seminar;
$this->params['breadcrumbs'][] = ['label' => 'Seminar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id_seminar], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id_seminar], [
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
                            // 'id_seminar',
                            'nama_seminar',
                            'tgl_pelaksana',
                            [
                                'attribute' => 'lampiran',
                                'contentOptions' => ['style' => 'text-align:center;'],
                                'headerOptions' => ['style' => 'text-align:center;'],
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $a = '<button type="button" class="btn btn-default"
                                data-toggle="modal"
                                data-target="#photo-' . $model->id_seminar . '"><img src="' . Url::to('@web/lampiran-seminar/' . $model->lampiran) . '" width="120px" height="120px"/></button>
                    
                    <div class="modal fade " id="photo-' . $model->id_seminar . '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                         
                          <div class="modal-body text-center">
                                <img width="100%" src="' . Url::to('@web/lampiran-seminar/')  . $model->lampiran . '"/>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    ';
                                    return $a;
                                },
                            ],
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