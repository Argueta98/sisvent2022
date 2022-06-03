<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblVenta */

$this->title = Yii::t('app', 'Nueva Venta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-venta-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
