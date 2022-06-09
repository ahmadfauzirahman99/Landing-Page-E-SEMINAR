<?php

use app\assets\TyAsset;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

TyAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\SectionPertama */
/* @var $form yii\bootstrap4\ActiveForm */
?>
<style>
    form .col-form-label-sm {
        font-size: smaller;
    }

    form .form-group {
        margin-bottom: 0.1rem;
    }
</style>
<div class="section-pertama-form">

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
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['placeholder' => 'Judul Besar']) ?>

    <?= $form->field($model, 'sub_title')->textInput(['maxlength' => true, 'placeholder' => 'Judul Kecil',]) ?>

    <?=
    $form->field($model, 'gambar')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
        ],
        'pluginOptions' => [
            'showCaption' => true,
            'showRemove' => false,
            'showUpload' => false,
            'showCancel' => false,
            'initialPreview' => [
                $model->gambar ? Url::to('@web/img/dokter/' . $model->gambar) : null
            ],
            'initialPreviewAsData' => true,
            'initialCaption' => $model->gambar,
            'initialPreviewConfig' => [
                [
                    'caption' => $model->gambar,
                    'showRemove' => true,
                    'url' => Url::to(['site/hapus-foto-diri-ktp']), // server delete action 
                    'key' => $model->id_section_pertama,
                    'extra' => [
                        'jenis_foto' => 'foto',
                        'nama_file' => $model->gambar
                    ]
                ],
            ],
            'overwriteInitial' => true,
            'maxFileSize' => 2800,
            'deleteUrl' => Url::to(['/site/file-upload']),
        ]
    ])
    ?>
    <?php $form->field($model, 'created_at')->textInput() ?>
    <?php $form->field($model, 'created_by')->textInput() ?>
    <?php $form->field($model, 'updated_at')->textInput() ?>
    <?php $form->field($model, 'updated_by')->textInput() ?>

    <hr>

    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success btn-block']) ?>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJs($this->render('_form.js'), View::POS_END) ?>