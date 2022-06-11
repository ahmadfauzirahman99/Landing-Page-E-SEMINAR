<?php

/* @var $this yii\web\View */
/* @var $model app\models\Sponsor */

$this->title = 'Update Sponsor: ' . $model->id_sponsor;
$this->params['breadcrumbs'][] = ['label' => 'Sponsors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sponsor, 'url' => ['view', 'id' => $model->id_sponsor]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
    <!--.card-->
</div>