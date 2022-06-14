<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Detalle de Caja';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Apertura/Cierre</h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Monto Apertura:</b></td>
                        <td width="34%"><?= $model->monto_apertura ?></td>
                        <td width="16%"><b>Fecha de Apertura:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_apertura)) ?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Monto Cierre:</b></td>
                        <td width="34%"><?= $model->monto_cierre?></td>
                        <td width="16%"><b>Fecha de Cierre:</b></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($model->fecha_cierre)) ?></td>
                    </tr>
                   
                    <tr>
                        <td><b>Estado:</b></td>
                        <td width="34%"><span class="badge bg-<?= $model->estado == 1 ? "green" : "red"; ?>"><?= $model->estado == 1 ? "Activo" : "Finalizado"; ?></span></td>
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