<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
?>
<div class="cliente-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'apellido',
            'dni',
            'domicilio',
            'telefono',
        ],
    ]) ?>

</div>
