<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pertanyaan */
?>
<div class="pertanyaan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pertanyaan',
            'pertanyaan:ntext',
            'jawaban:ntext',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
