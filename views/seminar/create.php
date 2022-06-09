<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seminar */

$this->title = 'Form Seminar';
$this->params['breadcrumbs'][] = ['label' => 'Seminar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <?= $this->render('_form', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>