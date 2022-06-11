<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kategori */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="kategori-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_kategori')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'craeted_at')->textInput() ?>

    <?= $form->field($model, 'craeted_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
