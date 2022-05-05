<?php

use app\models\TblProveedor;
use app\models\TblComprobante;
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
                <h3 class="card-title">Compras/ Crear registro</h3>
            </div>
        </div>
        <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
            <div class="card-body">
                 <form role="form">    
                    <div class="row">
                    <div class="col-md-6">
                            <?= Html::activeLabel($model, 'idProveedor', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'idProveedor', ['showLabels' => false])->widget(Select2::className(), [
                                'data' => ArrayHelper::map(TblProveedor::find()->all(), 'id', 'nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Proveedor -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'idComprobante', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'idComprobante', ['showLabels' => false])->widget(Select2::className(), [
                                'data' => ArrayHelper::map(TblComprobante::find()->all(), 'id', 'nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Comprobante -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'serie', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'serie', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'numero_compra', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'numero_compra', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                                    <?= Html::activeLabel($model, 'fecha_compra', ['class' => 'control-label']) ?>
                                    <br>
                                    <?=  DatePicker::widget([
                                            'name' => 'fecha_compra',
                                            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                            'value' => '01-Ene-2022',
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-M-yyyy'
                                            ]
                                        ]);?>  
                        </div>
                        <div class="col-md-6">
                                    <?= Html::activeLabel($model, 'fecha_creacion', ['class' => 'control-label']) ?>
                                    <br>
                                    <?=  DatePicker::widget([
                                            'name' => 'fecha_creacion',
                                            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                            'value' => '01-Ene-2022',
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-M-yyyy'
                                            ]
                                        ]);?>  
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
