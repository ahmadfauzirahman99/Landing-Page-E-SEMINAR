<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SeminarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Seminar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Tambah Seminar', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php Pjax::begin(); ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); 
                    ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => [
                            'class' => 'table table-sm table-bordered table-hover table-list-item'
                        ],
                        'columns' => [
                            [
                                'contentOptions' => ['style' => 'width:30px;text-align:center'],
                                'headerOptions' => ['style' => 'width:30px;text-align:center'],
                                'class' => 'yii\grid\SerialColumn'
                            ],
                            // 'id_seminar',
                            'nama_seminar',
                            [
                                'contentOptions' => ['style' => 'text-align:center'],
                                'headerOptions' => ['style' => 'text-align:center'],
                                'attribute' => 'tgl_pelaksana',
                                'value' =>  function ($model) {
                                    return Yii::$app->formatter->asDate($model->tgl_pelaksana);
                                }
                            ],
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

                            [
                                'contentOptions' => ['style' => 'width:150px;text-align:center'],
                                'headerOptions' => ['style' => 'text-align:center'],
                                'class' => 'hail812\adminlte3\yii\grid\ActionColumn'
                            ],
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>

                    <?php Pjax::end(); ?>

                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>