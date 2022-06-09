<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use hoaaah\ajaxcrud\CrudAsset;
use hoaaah\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PertanyaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pertanyaans';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="pertanyaan-index">
                <div id="ajaxCrudDatatable">
                    <?= GridView::widget([
                        'id' => 'crud-datatable',
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'pjax' => true,
                        'columns' => require(__DIR__ . '/_columns.php'),
                        'toolbar' => [
                            [
                                'content' =>
                                Html::a(
                                    '<i class="fas fa-plus"></i>',
                                    ['create'],
                                    ['role' => 'modal-remote', 'title' => 'Tambah Layanan', 'class' => 'btn btn-danger']
                                ) .
                                    Html::a(
                                        '<i class="fas fa-sync-alt"></i>',
                                        [''],
                                        ['data-pjax' => 1, 'class' => 'btn btn-success', 'title' => 'Reset Grid']
                                    )
                                // '{toggleData}' 
                                // '{export}'
                            ],
                        ],
                        'striped' => true,
                        'condensed' => true,
                        'responsive' => true,
                        'panel' => [
                            'type' => 'primary',
                            'heading' => '<i class="glyphicon glyphicon-list"></i> Pertanyaan Listing',
                            // 'before' => '<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                            'after' => BulkButtonWidget::widget([
                                'buttons' => Html::a(
                                    '<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                    ["bulkdelete"],
                                    [
                                        "class" => "btn btn-danger btn-xs",
                                        'role' => 'modal-remote-bulk',
                                        'data-confirm' => false, 'data-method' => false, // for overide yii data api
                                        'data-request-method' => 'post',
                                        'data-confirm-title' => 'Are you sure?',
                                        'data-confirm-message' => 'Are you sure want to delete this item'
                                    ]
                                ),
                            ]) .
                                '<div class="clearfix"></div>',
                        ]
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>