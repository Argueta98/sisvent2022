<?php

use app\models\TblCategoria;
use app\models\TblProducto;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
//use yii\jui\DatePicker;

?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Perecedero / Crear registro</h3>
            </div>
        </div>
        <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
            <div class="card-body">
                 <form role="form">    
                    <div class="row">
                    <div class="col-md-6">
                            <?= Html::activeLabel($model, 'idProducto', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'idproducto', ['showLabels' => false])->widget(Select2::className(), [
                                'data' => ArrayHelper::map(TblProducto::find()->all(), 'id', 'nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Producto -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'fecha_vencimiento', ['class' => 'control-label']) ?>
                                    <br>
                            <?= $form->field($model, 'fecha_vencimiento', ['showLabels' => false])->widget(DatePicker::class, [
                            'options' => ['placeholder' => 'Seleccionar fecha Vencimiento'],
                            'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-m-dd', 'todayHighlight' => true],
                        ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'cantidad_percedero', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'cantidad_percedero', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        
                       
                        <div class="col-md-3">
                        <?= Html::activeLabel($model, 'estado', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'estado', ['showLabels' => false])->label('Estado')->widget(SwitchInput::class, [
                                'value' => $model->estado, //checked status can change by db value
                                'options' => ['uncheck' => 0, 'value' => 1], //value if not set ,default is 1
                                'pluginOptions' => [
                                    'handleWidth' => 60,
                                    'onColor' => 'success',
                                    'offColor' => 'danger',
                                    'onText' => 'Activo',
                                    'offText' => 'Inactivo'
                                ]
                            ]); ?>
                        </div>
                    </div>


                    <div class="card-footer text-right">
                        <div class="row">
                            <div class="col-md-12">
                                <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
                                <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Guardar' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>     
            <?php ActiveForm::end(); ?>
    </div>
</div>
