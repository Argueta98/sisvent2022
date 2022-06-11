<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VentaDetalleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-ventadetalle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idProducto') ?>

    <?= $form->field($model, 'idVenta') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'precioventa') ?>

    <?php // echo $form->field($model, 'iva') ?>

    <?php // echo $form->field($model, 'exento') ?>

    <?php // echo $form->field($model, 'descuento') ?>

    <?php // echo $form->field($model, 'retenido') ?>

    <?php // echo $form->field($model, 'sumas') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'cambio') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
