<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblVenta */

$this->title = Yii::t('app', 'Actualizar Información Venta: {name}', [
    'name' => $model->num_venta,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-venta-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
