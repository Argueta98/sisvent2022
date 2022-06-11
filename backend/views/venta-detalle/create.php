<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblVentadetalle */

$this->title = Yii::t('app', 'Venta-detalle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventadetalle'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-ventadetalle-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
