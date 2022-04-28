<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblCaja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-caja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_apertura')->textInput() ?>

    <?= $form->field($model, 'monto_apertura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'monto_cierre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_cierre')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
