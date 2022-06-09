<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PembicaraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Pembicara';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Tambah Pembicara', ['create'], ['class' => 'btn btn-success']) ?>
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

                            // 'id_pembicara',
                            [
                                'attribute'=>'id_seminar',
                                'value' => 'sem.nama_seminar'
                            ],
                            'nama_pembicara',
                            'latar_belakang',
                            // 'foto',

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