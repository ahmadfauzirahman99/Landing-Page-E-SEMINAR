<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pembicara */

$this->title = 'Create Pembicara';
$this->params['breadcrumbs'][] = ['label' => 'Pembicaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
    <!--.card-->
</div>