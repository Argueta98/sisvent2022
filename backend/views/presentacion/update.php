<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPresentacion */

$this->title = Yii::t('app', 'Presentacion: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-presentacion-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
