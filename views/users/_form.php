<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="users-form">
    <style>
        form .col-form-label {
            font-size: small;
        }

        form .form-group {
            margin-bottom: 0.5rem;
        }
    </style>

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'form',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-md-3 col-form-label-md',
                'wrapper' => 'col-md-9',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Username Unique', 'readonly' => $model->isNewRecord ? false : true]) ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true, 'placeholder' => 'Masukkan Nama Lengkap']) ?>

    <?php if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password Minimal 6 Karakter']) ?>
    <?php } ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email Aktif']) ?>

    <?= $form->field($model, 'nomor_telpn')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Telepon Yang Aktif']) ?>
    <?= $form->field($model, 'status')->dropdownList(['ANGGOTA' => 'ANGGOTA', 'ADMIN' => 'ADMIN'], ['prompt' => 'Status Akun']) ?>

    <hr>
    <div class="form-group">
        <?= Html::submitButton('Simpan Pengguna', ['class' => 'btn btn-success btn-submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJs($this->render('_form.js'), View::POS_END) ?>