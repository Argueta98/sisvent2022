<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Detalle Proveedor';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->nombre ?> /  <?= $model->nit?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Codigo:</b></td>
                        <td width="34%"><?= $model->codigo ?></td>
                        <td width="16%"><b>NIT:</b></td>
                        <td width="34%"> <?= $model->nit?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Nombre:</b></td>
                        <td width="34%"><?= $model->nombre ?></td>
                        <td width="16%"><b>Dirección:</b></td>
                        <td width="34%"> <?= $model->direccion?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Razón Social:</b></td>
                        <td width="34%"> <?= $model->razonsocial?></td>
                        <td><b>Telefono:</b></td>
                        <td width="34%"> <?= $model->telefono?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Correo:</b></td>
                        <td width="34%"> <?= $model->correo?></td>
                        
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