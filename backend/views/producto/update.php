<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProducto */

$this->title = Yii::t('app', 'Producto: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-producto-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
