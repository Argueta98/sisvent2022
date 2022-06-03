<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblEmpleado */

$this->title = Yii::t('app', 'Actualizar Empleado: {name}', [
    'name' => $model->nombres,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-empleado-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
