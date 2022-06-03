<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Empleado';
$this->params['breadcrumbs'][] = ['label' => 'Listado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $model->codigo .'--'.$model->nombres.' '. $model->apellidos?></h3>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-hover table-bordered">
                    <tr>
                        <td width="16%"><b>Codigo:</b></td>
                        <td width="36%"><?= $model->codigo ?></td>
                    </tr>
                   
                    <tr><td width="16%"><b>Nombres:</b></td>
                        <td width="34%"> <?= $model->nombres?></td>
                        <td width="16%"><b>Apellidos:</b></td>
                        <td width="34%"><?= $model->codigo ?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>correo:</b></td>
                        <td width="34%"> <?= $model->correo?></td>
                        <td width="16%"><b>Direccion:</b></td>
                        <td width="34%"><?= $model->direccion ?></td>
                    </tr>
                    <tr>
                        <td width="16%"><b>Usuario:</b></td>
                        <td width="34%"> <?= $model->user->username?></td>
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