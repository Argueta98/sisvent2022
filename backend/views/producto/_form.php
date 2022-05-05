<?php

use app\models\TblCategoria;
use app\models\TblPresentacion;
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
                <h3 class="card-title">Producto / Crear registro</h3>
            </div>
        </div>
            <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
            <div class="card-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'codigo', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'codigo', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'nombre', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'nombre', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'descripcion', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'descripcion', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>


                   
                            <!--MODIFICAR YA QUE NO MUESTRA LA VISTA BIEN-->
                        <div class="col-md-6">
                        <?= Html::activeLabel($model, 'idCategoria', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'idCategoria', ['showLabels' => false])->widget(Select2::className(), [
                                'data' => ArrayHelper::map(TblCategoria::find()->all(), 'id', 'nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Categoria -'],
                                'pluginOptions' => ['allowClear' => true],
                            ]); ?>
                        </div>



                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'existencias', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'existencias', ['showLabels' => false])->textInput(['autofocus' => true]) ?>
                        </div>

                        <!--MODIFICAR YA QUE NO MUESTRA LA VISTA BIEN-->
                        <div class="col-md-6">
                        <?= Html::activeLabel($model, 'idPresentacion', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'idPresentacion', ['showLabels' => false])->widget(Select2::className(), [
                                'data' => ArrayHelper::map(TblPresentacion::find()->all(), 'id', 'nombre'),
                                'language' => 'es',
                                'options' => ['placeholder' => '- Seleccionar Presentacion -'],
                                'pluginOptions' => ['allowClear' => true],
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
                </form>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>