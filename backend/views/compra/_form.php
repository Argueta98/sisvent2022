<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblCompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idProveedor')->textInput() ?>

    <?= $form->field($model, 'serie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_compra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_compra')->textInput() ?>

    <?= $form->field($model, 'fecha_creacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
