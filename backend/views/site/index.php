<?php
$this->title = 'Administración';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
<div class="row">
        <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM compra");  
                $compra = $command->queryScalar();
          ?>
          <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM venta WHERE fecha=NOW()");  
                $venta = $command->queryScalar();
          ?>
           <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM producto");  
                $producto = $command->queryScalar();
          ?>
           <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM proveedor");  
                $proveedor = $command->queryScalar();
          ?>
          <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM perecedero");  
                $prc = $command->queryScalar();
          ?>
          <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM presentacion");  
                $prese = $command->queryScalar();
          ?>
          <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM cliente");  
                $cliente = $command->queryScalar();
          ?>

          <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM perecedero where fecha_vencimiento between curdate() and date_add(curdate(),interval 30 day)");  
                $perece = $command->queryScalar();
        ?>
        <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM inventario ");  
                $inventario = $command->queryScalar();
        ?>
        <?php $command = Yii::$app->db->createCommand("SELECT count(*) FROM categoria ");  
                $categoria = $command->queryScalar();
        ?>
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
                'number' =>  $compra,
                'theme' => 'gradient-danger',
                'icon' => 'fa fa-shopping-bag ',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'VENTAS DEL DIA',
                'number' => $venta,
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
                'number' => $proveedor,
                'theme' => 'navy',
                'icon' => 'fa fa-truck',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'CATEGORIAS',
                'number' => $categoria,
                'theme' => 'olive',
                'icon' => 'fa fa fa-cc ',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'PRESENTACIONES',
                'number' => $prese,
                'theme' => 'orange',
                'icon' => 'fa fa fa-star',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'PRODUCTOS ',
                'number' => $producto,
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
                'number' => $prc,
                'theme' => 'lime',
                'icon' => 'fa fa-calendar',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'VENCERAN EN 30 DIAS',
                'number' => $perece ,
                'theme' => 'indigo',
                'icon' => 'fa fa-clock-o ',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-2 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'CLIENTES',
                'number' =>  $cliente,
                'theme' => 'gray-dark',
                'icon' => 'fa fa-users',
            ]) ?>
        </div>
        <div class="col-md-3 col-sm-4 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'INVENTARIO',
                'number' =>  $inventario,
                'theme' => 'info',
                'icon' => 'fa fa-line-chart',
            ]) ?>
        </div>
    </div>
  
  

   
    
</div>