<?php

use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Seminar */
/* @var $form yii\bootstrap4\ActiveForm */
?>
<style>
    form .col-form-label-sm,
    form .form-group {
        margin-bottom: 0.15rem;
    }
</style>

<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><?= $model->isNewRecord ? 'Form Tambah Seminar' : $model->nama_seminar ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php $form = ActiveForm::begin([

            'layout' => 'horizontal',
            'id' => 'form-seminar',
            // 'action' => ['/pos/penunjang'],
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-3 col-form-label-sm',
                    'wrapper' => 'col-sm-9',
                    'error' => '',
                    'hint' => '',
                ],
            ],
            'options' => ['enctype' => 'multipart/form-data', 'autocomplete' => 'off'],

        ]); ?>
        <div class="modal-body">

            <div class="seminar-form">



                <?= $form->field($model, 'nama_seminar')->textInput(['maxlength' => true, 'placeholder' => 'Nama Seminar']) ?>

                <?= $form->field($model, 'tgl_pelaksana')->widget(DatePicker::classname(), [
                    'options' => [
                        'placeholder' => 'Tanggal Pelaksana',
                        'class' => 'form-control form-control-sm',
                    ],
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,                            // 'type' => 1,
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ],
                    'class' => 'form-control form-control-sm'
                ]); ?>

                <?=
                $form->field($model, 'lampiran')->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'image/*',
                    ],
                    'pluginOptions' => [
                        'showCaption' => true,
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCancel' => false,
                        'initialPreview' => [
                            $model->lampiran ? Url::to('@web/lampiran-seminar/' . $model->lampiran) : null
                        ],
                        'initialPreviewAsData' => true,
                        'initialCaption' => $model->lampiran,
                        'initialPreviewConfig' => [
                            [
                                'caption' => $model->lampiran,
                                'showRemove' => true,
                                'url' => Url::to(['site/hapus-foto-diri-ktp']), // server delete action 
                                'key' => $model->id_seminar,
                                'extra' => [
                                    'jenis_foto' => 'lampiran',
                                    'nama_file' => $model->lampiran
                                ]
                            ],
                        ],
                        'overwriteInitial' => true,
                        'maxFileSize' => 2800,
                    ]
                ]);
                ?>

            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary btn-submit float-left btn-sm" type="submit">Simpan Data Seminar</button>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php $this->registerJs($this->render('_form.js'), View::POS_END) ?>