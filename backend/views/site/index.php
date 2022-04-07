<?php
$this->title = 'Administración';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
<div class="row">
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'USD EN CAJA',
                'number' => '1,410',
                'theme' => 'gradient-info',
                'icon' => 'fa fa-money',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'COMPRAS DEL MES',
                'number' => '410',
                'theme' => 'gradient-danger',
                'icon' => 'fa fa-shopping-bag ',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'VENTAS DEL DIA',
                'number' => '13,648',
                'theme' => 'success',
                'icon' => 'fa fa-usd',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'INVERTIDO EN STOCK',
                'number' => '13,648',
                'theme' => 'purple',
                'icon' => 'fa fa-usd',
            ]) ?>
        </div>
    </div>

    <!---Fila dos-->
    <div class="row">
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'PROVEEDORES',
                'number' => '1,410',
                'theme' => 'navy',
                'icon' => 'fa fa-truck',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'MARCAS',
                'number' => '410',
                'theme' => 'olive',
                'icon' => 'fa fa fa-cc ',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'PRESENTACIONES',
                'number' => '13,648',
                'theme' => 'orange',
                'icon' => 'fa fa fa-star',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'PRODUCTOS ',
                'number' => '13,648',
                'theme' => 'gray',
                'icon' => 'fa fa-archive',
            ]) ?>
        </div>
    </div>

     <!---Fila 3-->
     <div class="row">
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'PERCEDEROS',
                'number' => '1,410',
                'theme' => 'lime',
                'icon' => 'fa fa-calendar',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'VENCERAN EN 30 DIAS',
                'number' => '410',
                'theme' => 'indigo',
                'icon' => 'fa fa-clock-o ',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'CLIENTES',
                'number' => '13,648',
                'theme' => 'gray-dark',
                'icon' => 'fa fa-users',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'VENTAS DEL DIA',
                'number' => '13,648',
                'theme' => 'info',
                'icon' => 'fa fa-line-chart',
            ]) ?>
        </div>
    </div>
  
  

   
    
</div>