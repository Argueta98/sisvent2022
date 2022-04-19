<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCompra */

$this->title = Yii::t('app', 'Compra: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Compras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-compra-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
