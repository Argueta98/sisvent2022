<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'eslogan') ?>

    <?= $form->field($model, 'telefono') ?>

    <?= $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'razonsocial') ?>

    <?php // echo $form->field($model, 'nrc') ?>

    <?php // echo $form->field($model, 'nit') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
