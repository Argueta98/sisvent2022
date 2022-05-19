<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Detalle Producto';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->nombre ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Codigo:</b></td>
                        <td width="34%"><?= $model->codigo ?></td>
                        <td width="16%"><b>Nombre:</b></td>
                        <td width="34%"> <?= $model->nombre?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Categoria:</b></td>
                        <td width="34%"> <?= $model->categoria->nombre?></td>
                        <td width="16%"><b>Presentacion:</b></td>
                        <td width="34%"> <?= $model->presentacion->nombre?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>S.Min:</b></td>
                        <td width="34%"> <?= $model->stock_min?></td>
                        <td width="16%"><b>P.Compra:</b></td>
                        <td width="34%"> <?= $model->precio_compra?></td>
                        
                    </tr>
                    <tr>
                        <td width="16%"><b>P.Venta:</b></td>
                        <td width="34%"> <?= $model->precio_venta?></td>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_creacion)) ?></td>
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