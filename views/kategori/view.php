<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kategori */
?>
<div class="kategori-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kategori',
            'nama_kategori',
            'craeted_at',
            'craeted_by',
        ],
    ]) ?>

</div>
