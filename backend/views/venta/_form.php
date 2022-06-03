<?php

use app\models\TblProveedor;
use app\models\TblCliente;
use app\models\TblVenta;
use app\models\TblEmpleado;
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
                <h3 class="card-title">Venta/ Crear registro</h3>
            </div>
        </div>
        <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
            <div class="card-body">
                 <form role="form">    
                    <div class="row">
                        
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'idCliente', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'idCliente', ['showLabels' => false])->widget(Select2::className(), [
                                'data' => ArrayHelper::map(TblCliente::find()->all(), 'id', 'nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Cliente -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'idEmpleado', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'idEmpleado', ['showLabels' => false])->widget(Select2::className(), [
                                'data' => ArrayHelper::map(TblEmpleado::find()->all(), 'id', 'nombres'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Empleado -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        
                        <div class="col-md-3">
                        <?= Html::activeLabel($model, 'estado', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'estado', ['showLabels' => false])->label('Estado')->widget(SwitchInput::class, [
                                'value' => $model->estado, //checked status can change by db value
                                'options' => ['uncheck' => 0, 'value' => 1], //value if not set ,default is 1
                                'pluginOptions' => [
                                    'handleWidth' => 65,
                                    'onColor' => 'success',
                                    'offColor' => 'danger',
                                    'onText' => 'Finalizada',
                                    'offText' => 'Progreso'
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
