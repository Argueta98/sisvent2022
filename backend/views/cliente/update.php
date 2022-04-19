<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCliente */

$this->title = Yii::t('app', 'Update Tbl Cliente: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-cliente-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
