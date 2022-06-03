<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Facturación de Compra';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">  Inventario # <?= $model->numero_compra ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Proveedor:</b></td>
                        <td width="34%"><?= $model->proveedor->nombre ?></td>
                        <td width="16%"><b>Serie:</b></td>
                        <td width="34%"> <?= $model->serie?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Comprobante:</b></td>
                        <td width="25%"><?= $model->comprobante->nombre ?></td>
                        <td width="34%"><b>Numero Comprobante:</b></td>
                        <td width="34%"><?= $model->numero_compra ?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Fecha de Compra:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_compra)) ?></td>
                        <td><b>Fecha creacion:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_creacion)) ?></td>
                    </tr>
                        
                       
                    
                </table>
            </div>
            <div class="card-footer">
                <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
                <?php echo Html::a('<i class="fa fa-edit"></i> Agregar al Inventario', ['inventario', 'idCompra' => $model->id], ['class' => 'btn btn-warning', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
            </div>
        </div>
    </div>
</div>

<?= $this->render('_gridDetalleCompra', [
    'model' => $model,
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
]) ?>