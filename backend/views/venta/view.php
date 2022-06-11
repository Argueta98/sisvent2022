<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Facturación de Venta';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title ">  Venta# <?= $model->num_venta ?></h3>
            </div>
            <div class="card-body">
                <table class="table  table-resposive  table-sm  table-hover " >
                    <tr>
                    <td width="2%"><b>No.</b></td>
                    <td colspan="2" class="text-red"><b><?= $model->num_venta ?></b></td>
                    </tr>
                </table><br>
                <table class="table table-sm  table-hover ">
                    <tr>
                        <td width="8%"><b>Cliente:</b></td>
                        <td width="30%"> <?= $model->cliente->nombre.''.$model->cliente->apellido?></td>
                        <td width="8%"><b>Telefono:</b></td>
                        <td width="30%"> <?= $model->cliente->telefono?></td>
                    </tr>
                    <tr>
                        <td width="8%"><b>Vendedor:</b></td>
                        <td width="30%"><?= $model->empleado->nombres.' '. $model->empleado->apellidos?></td>
                        <td width="8%"><b>Fecha:</b></td>
                        <td width="30%"><?= date('d-m-Y', strtotime($model->fecha))?></td>
                    </tr>
                    <tr>
                        <td><b>Estado venta:</b></td>
                        <td colspan="4"><span class="badge bg-<?= $model->estado == 1 ? "green" : "red"; ?>"><?= $model->estado == 1 ? "Finalizada" : "Proceso"; ?></span></td>
                        <td colspan="4"></td>
                    </tr>
                    <tr>
                    <td colspan="8" ></td>
                    </tr>
                       
                    
                </table>
            </div>
            <div class="card-footer">
                <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
                
            </div>
        </div>
    </div>
</div>

<?= $this->render('_gridVentaDetalle', [
    'model' => $model,
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
]) ?>