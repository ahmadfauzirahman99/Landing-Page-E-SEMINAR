<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seminar */

$this->title = 'Form Seminar';
$this->params['breadcrumbs'][] = ['label' => 'Seminar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
    <!--.card-->
</div>