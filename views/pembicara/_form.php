<?php

use app\models\Seminar;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

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
<div class="pembicara-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',

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

    <?= $form->field($model, 'nama_pembicara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latar_belakang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_seminar')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Seminar::find()->all(), 'id_seminar', 'nama_seminar'),
        'options' => ['placeholder' => 'Pilih Seminar',],
        'theme' => Select2::THEME_DEFAULT,
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
    <hr>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>