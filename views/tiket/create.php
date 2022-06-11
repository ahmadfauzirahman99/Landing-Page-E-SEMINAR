<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tiket */

$this->title = 'Create Tiket';
$this->params['breadcrumbs'][] = ['label' => 'Tikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
    <!--.card-->
</div>