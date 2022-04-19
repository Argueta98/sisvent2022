<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPerecedero */

$this->title = Yii::t('app', 'Perecedero: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', ' Perecederos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-perecedero-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
