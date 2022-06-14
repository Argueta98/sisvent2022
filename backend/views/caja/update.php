<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCaja */

$this->title = Yii::t('app', 'Cierre de Caja', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Caj'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-caja-update">


    <?= $this->render('_form1', [
        'model' => $model,
    ]) ?>

</div>
