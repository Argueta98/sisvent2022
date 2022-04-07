<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TblPerecedero */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-perecedero-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_vencimiento')->textInput() ?>

    <?= $form->field($model, 'cantidad_percedero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idproducto')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
