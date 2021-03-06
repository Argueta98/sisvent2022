<?php

use yii\helpers\Html;

Yii::$app->formatter->locale = 'en-US';
$this->title = 'Ver Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
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
                        <td width="10%"><b>Nombres:</b></td>
                        <td width="30%"><?= $model->nombre ?></td>
                        <td width="16%"><b>Apellidos:</b></td>
                        <td width="30%"> <?= $model->apellido ?></td>
                    </tr>
                    <tr>
                        <td width="10%"><b>Direccion:</b></td>
                        <td width="30%"><?= $model->direccion ?></td>
                        <td width="16%"><b>Telefono:</b></td>
                        <td width="34%"> <?= $model->telefono?></td>
                    </tr>
                        <td width="10%"><b>Correo:</b></td>
                        <td width="30%"> <?= $model->correo?></td>
                    <tr>
                        
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