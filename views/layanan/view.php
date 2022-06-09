<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Layanan */
?>
<div class="layanan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_layanan',
            'nama_layanan',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'is_deleted',
        ],
    ]) ?>

</div>
