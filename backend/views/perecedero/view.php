<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Detalle Perecedero';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Fecha de Vencimiento: <?= $model->fecha_vencimiento ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Fecha de Vencimiento:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_vencimiento)) ?></td>
                        <td width="16%"><b>cantidad:</b></td>
                        <td width="34%"> <?= $model->cantidad_percedero?></td>
                    </tr>
                   
                    <tr>
                        <td width="16%"><b>Visible: </b></td>
                        <td width="34%"><span class="badge bg-<?= $model->estado == 1 ? "green" : "red"; ?>"><?= $model->estado == 1 ? "Activo" : "Inactivo"; ?></span></td>
                        <td width="16%"><b>Producto:</b></td>
                        <td width="34%"> <?= $model->producto->nombre?></td>
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