<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Layanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="layanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_layanan')->textInput(['maxlength' => true, 'placeholder' => 'Nama Layanan']) ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>

    <?php $form->field($model, 'is_deleted')->textInput() ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>