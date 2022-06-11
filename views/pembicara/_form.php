<?php

use app\models\Seminar;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Pembicara */
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
            <h5 class="modal-title"><?= $model->isNewRecord ? 'Form Tambah Seminar' : $model->nama_pembicara ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="pembicara-form">

            <?php $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'id' => 'form',
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
                <?= $form->field($model, 'nama_pembicara')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pembicara']) ?>

                <?= $form->field($model, 'latar_belakang')->textInput(['maxlength' => true, 'placeholder' => 'Latar Belakang']) ?>

                <?= $form->field($model, 'id_seminar')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Seminar::find()->all(), 'id_seminar', 'nama_seminar'),
                    'options' => ['placeholder' => 'Pilih Seminar',],
                    'theme' => Select2::THEME_BOOTSTRAP,
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]); ?>
                <?=
                $form->field($model, 'foto')->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'image/*',
                    ],
                    'pluginOptions' => [
                        'showCaption' => true,
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCancel' => false,
                        'initialPreview' => [
                            $model->foto ? Url::to('@web/foto-seminar/' . $model->foto) : null
                        ],
                        'initialPreviewAsData' => true,
                        'initialCaption' => $model->foto,
                        'initialPreviewConfig' => [
                            [
                                'caption' => $model->foto,
                                'showRemove' => true,
                                'url' => Url::to(['site/hapus-foto-pembicara']), // server delete action 
                                'key' => $model->id_pembicara,
                                'extra' => [
                                    'jenis_foto' => 'foto',
                                    'nama_file' => $model->foto
                                ]
                            ],
                        ],
                        'overwriteInitial' => true,
                        'maxFileSize' => 2800,
                        // 'deleteUrl' => Url::to(['/site/file-upload']),
                    ]
                ]);
                ?>
            </div>
            <div class="modal-footer">

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->registerJs($this->render('_form.js'),View::POS_END) ?>