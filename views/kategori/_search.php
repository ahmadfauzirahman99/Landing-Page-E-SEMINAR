<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_kategori') ?>

    <?= $form->field($model, 'nama_kategori') ?>

    <?= $form->field($model, 'craeted_at') ?>

    <?= $form->field($model, 'craeted_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
