<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProveedor */

$this->title = Yii::t('app', ' Proveedor: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', ' Proveedors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-proveedor-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
