<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Compra Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->compra->numero_compra ?> </h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>N° Compra:</b></td>
                        <td width="34%"> <?= $model->compra->numero_compra ?></td>
                        <td width="16%"><b>Producto: </b></td>
                        <td width="34%"> <?= $model->producto->nombre ?></td>
                    </tr>
                    <tr>
                        <td><b>Cantidad: </b></td>
                        <td><?= $model->cantidad ?></td>
                        <td><b>Precio Unitario: </b></td>
                        <td><?= $model->precio_unitario ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <?php echo Html::a('<i class="fa fa-edit"></i> Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Edit record']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
            </div>
        </div>
    </div>
</div>

