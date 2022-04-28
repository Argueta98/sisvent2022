<?php

use app\models\TblDepartamentos;
use app\models\TblMunicipios;
use kartik\widgets\DepDrop;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <?php $form = ActiveForm::begin(['id' => 'modal_datos','type' => ActiveForm::TYPE_HORIZONTAL]); ?>
            <div class="card-body">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'monto_apertura', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'monto_apertura', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'monto_cierre', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'monto_cierre', ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                        </div>
                       
                   
                        <div class="col-md-6">
                            <?= Html::activeLabel($model, 'estado', ['class' => 'control-label']) ?>
                            <?= $form->field($model, 'estado', ['showLabels' => false])->label('visible')->widget(SwitchInput::class, [
                                'value' => $model->activo, //checked status can change by db value
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
                    <div class="card-footer">
                        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Guardar' : '<i class="fa fa-save"></i> Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?= Html::button('<i class="fa fa-ban"></i> Cancelar', ['class' => 'btn btn-danger', 'data-dismiss' => 'modal']) ?>
                    </div>
                </form>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php
$js = <<<SCRIPT
    $('form#modal_datos').on('beforeSubmit', function(e)
    {
        var \$form = $(this);
        $.post(
            \$form.attr("action"),
            \$form.serialize()
        )
            .done(function(result) {
                if(result == 1)
                {
                    $.pjax.reload({container:'#datosGrid'});
                    $('#modal_datos').trigger('reset');
                } else
                {
                    $('#message').html(result);
                }
            }).fail(function()
            {
                console.log("Server Error");
            });
            return false;
        });
    SCRIPT;
$this->registerJs($js);
?>