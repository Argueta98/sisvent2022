<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCompradetalle */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Compradetalles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tbl-compradetalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
