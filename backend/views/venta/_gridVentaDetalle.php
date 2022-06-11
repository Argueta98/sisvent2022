<?php
Yii::$app->language = 'es_ES';


use app\models\TblVenta;
use app\models\TblProducto;
use app\models\TblVentadetalle;
use app\models\TblVentadetalleSearch;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="tbl-cat-index">
            <?php
            $gridColumns = [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'contentOptions' => ['class' => 'kartik-sheet-style'],
                    'width' => '36px',
                    'header' => '#',
                    'headerOptions' => ['class' => 'kartik-sheet-style'], 
                ],
                [//col-1
                    'class' => 'kartik\grid\DataColumn',
                    'header' => 'CODIGO',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function($model){
                        $producto= TblProducto::findOne($model->idProducto);
                        return $producto->codigo;
                    },
                    'filter' => false, 
                ],
                [//col-1
                    'class' => 'kartik\grid\DataColumn',
                   // 'attribute' => 'idProducto',
                    'header' => 'DESCRIPCION',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function($model){
                        $producto= TblProducto::findOne($model->idProducto);
                        return $producto->nombre;
                    },
                    'filter' => false, 
                ],
                [ //col-2
                    'class' => 'kartik\grid\DataColumn',
                    //'attribute' => 'cantidad',
                    'header' => 'CANTIDAD',
                    'hAlign' => 'center',
                    'value'=>'cantidad',
                    'format' => ['decimal',2],
                    'filter' => false,
                ],
                
                [ //col-3
                    'class' => 'kartik\grid\DataColumn',
                    //'attribute' => 'precioventa',
                    'header' => 'PRECIO',
                    'value'=>'producto.precio_venta',
                    'hAlign' => 'center',
                    'format' => ['decimal',2],  
                    'filter' => false,
                   //'pageSummary' => 'Total',
                   // 'pageSummary' => true,
                 //  'pageSummaryFunc' => GridView::F_SUM, 
                ],
                 [ //col-4
                    'class' => 'kartik\grid\FormulaColumn',
                    'header' => 'EXENTO',
                    'hAlign' => 'center',
                    'value' => function ($model, $key, $index, $widget){
                        $p = compact('model','key','index');
                        return $widget->col(3, $p) * $widget->col(4, $p);
                    },
                    'width' => '10%',
                    'format' => ['decimal',2],                
                    'pageSummary' => true,
                   'pageSummaryFunc' => GridView::F_SUM, 
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'header' => 'ELIMINAR',
                    'template' => '{delete}',
                ],
            ];

            $exportmenu = ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_CSV => false,
                ],
            ]);

            echo GridView::widget([
               'id' => 'kv-ventadetalle',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                //'showFooter' => true,
                'showPageSummary' => true,
                'columns' => $gridColumns,

                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
               'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' =>  [
                    [
                        'content' =>
                       
                       
                        Html::a('<i class="fas fa-plus"></i> Agregar Producto', ['venta-detalle/create', 'id' => $model->id], [
                            'class' => 'btn btn-success',
                            'data-pjax' => 0,
                        ]), 
                        'options' => ['class' => 'btn-group mr-2']
                    ],
                    '{toggleData}',
                    $exportmenu,

                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                // set export properties
                // parameters from the demo form
                'bordered' => true,
                'striped' => true,
               'condensed' => true,
                'responsive' => true,
               // 'hover' => true,
                //'showPageSummary'=>$pageSummary,
                'panel' => [
                    'type' => GridView::TYPE_SUCCESS,
                    'heading' => 'Items',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
        
    </div>
</div>

<div class="row ">
    <div class="col-md-6 ">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title ">  RESUMEN# </h3>
            </div>
            <div class="card-body">
                <!--  where idVenta=' ".$model->ventadetalle->id." ' " -->
                <table class="table table-sm  table-hover ">
                    <tr>
                        <td colspan="4"><b>SUMAS</b></td>
                        <?php $command = Yii::$app->db->createCommand("SELECT sum(cantidad*precioventa) FROM ventadetalle WHERE idVenta = ".$model->id);  
                              $sum = $command->queryScalar();
                        ?>
                        <td colspan="4"><b> $ <?php echo number_format( $sum,2); ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>VENTAS EXENTAS</b></td>
                        <td colspan="4"><b>$ 0.00</b></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>SUB-TOTAL</b></td>
                        <td colspan="4"><b> $ <?php echo number_format( $sum,2);?></b></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>(-) 1% IVA RETENIDO</b></td>
                        <td colspan="4"><b>$ 0.00</b></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>VENTA TOTAL</b></td>
                        <td colspan="4"><b> $ <?php echo number_format( $sum,2);?></b></td>
                    </tr>
                       
                    
                </table>
            </div>
            <div class="card-footer text-right">
                <?= Html::a(Yii::t('app', 'Vender'), ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                <?php echo Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'title' => 'Cancelar']) ?>
                
            </div>
        </div>
    </div>
</div>