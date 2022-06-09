<?php
use yii\helpers\Url;

return [
    
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '50px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '50px',
    ],
    //     [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_kategori',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nama_kategori',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'craeted_at',
        'value'=> function($model){
            return Yii::$app->formatter->asDatetime($model->craeted_at);
        }
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'craeted_by',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   