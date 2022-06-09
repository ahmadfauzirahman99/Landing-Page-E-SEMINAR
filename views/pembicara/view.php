<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pembicara */

$this->title = $model->nama_pembicara;
$this->params['breadcrumbs'][] = ['label' => 'Pembicara', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id_pembicara], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id_pembicara], [
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
                            // 'id_pembicara',
                            'nama_pembicara',
                            'latar_belakang',
                            [
                                'attribute' => 'id_seminar',
                                'value' => function ($model) {
                                    return $model->sem->nama_seminar;
                                }
                            ],                            [
                                'attribute' => 'foto',
                                'contentOptions' => ['style' => 'text-align:center;'],
                                'headerOptions' => ['style' => 'text-align:center;'],
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $a = '<button type="button" class="btn btn-default"
                                data-toggle="modal"
                                data-target="#photo-' . $model->id_pembicara . '"><img src="' . Url::to('@web/foto-seminar/' . $model->foto) . '" width="120px" height="120px"/></button>
                    
                    <div class="modal fade " id="photo-' . $model->id_pembicara . '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                         
                          <div class="modal-body text-center">
                                <img width="100%" src="' . Url::to('@web/foto-seminar/')  . $model->foto . '"/>
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