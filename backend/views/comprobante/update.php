<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblComprobante */

$this->title = Yii::t('app', 'Actualizar Comprobante: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', ' Comprobantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-comprobante-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
