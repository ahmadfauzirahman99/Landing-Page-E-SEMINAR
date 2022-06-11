<?php

use app\components\number\KyNumber;
use app\models\Seminar;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Tiket */
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
            <h5 class="modal-title"><?= $model->isNewRecord ? 'Form Tambah Seminar' : 'Form Update Seminar' ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
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
            <div class="tiket-form">




                <?= $form->field($model, 'id_seminar')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Seminar::find()->all(), 'id_seminar', 'nama_seminar'),
                    'options' => ['placeholder' => 'Pilih Seminar'],
                    'theme' => Select2::THEME_KRAJEE_BS4,
                    "size" => Select2::SIZE_MEDIUM,
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]); ?>
                <?= $form->field($model, 'harga_tiket')->widget(KyNumber::className(), ['displayOptions' => [
                    'class' => 'form-control form-control-md det_jumlah',
                    'placeholder' => 'Harga Tiket',
                    'autocomplete' => 'off',
                ]]) ?>

                <?= $form->field($model, 'slot_tiket')->textInput(['placeholder' => 'Slot Tiket']) ?>
                <?=
                $form->field($model, 'lampiran_tiket')->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'image/*',
                    ],
                    'pluginOptions' => [
                        'showCaption' => true,
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCancel' => false,
                        'initialPreview' => [
                            $model->lampiran_tiket ? Url::to('@web/lampiran-tiket-seminar/' . $model->lampiran_tiket) : null
                        ],
                        'initialPreviewAsData' => true,
                        'initialCaption' => $model->lampiran_tiket,
                        'initialPreviewConfig' => [
                            [
                                'caption' => $model->lampiran_tiket,
                                'showRemove' => true,
                                'url' => Url::to(['site/hapus-foto-diri-ktp']), // server delete action 
                                'key' => $model->id_seminar,
                                'extra' => [
                                    'jenis_foto' => 'lampiran_tiket',
                                    'nama_file' => $model->lampiran_tiket
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

            <div class="form-group">
                <?= Html::submitButton('Simpan Tiket', ['class' => 'btn btn-success btn-submit']) ?>
            </div>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php $this->registerJs($this->render('_form.js'), View::POS_END) ?>