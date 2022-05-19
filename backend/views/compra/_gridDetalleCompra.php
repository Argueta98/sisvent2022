<?php
Yii::$app->language = 'es_ES';

use app\models\TblProveedor;
use app\models\TblCompra;
use app\models\TblProducto;
use app\models\TblDetalleCompra;
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
              /*  [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'idCompra',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function($model){
                        $compra= TblCompra::findOne($model->idCompra);
                        return $compra->numero_compra;
                    },
                    'filter' => false,
                ],*/
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'idProducto',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function($model){
                        $producto= TblProducto::findOne($model->idProducto);
                        return $producto->nombre;
                    },
                    'filter' => false,
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'cantidad',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::tag('span', $model->cantidad, ['class' => 'badge bg-purple']);
                    },
                    'filter' => false,
                ],
                
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'precio_unitario',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::tag('span', $model->precio_unitario, ['class' => 'badge bg-purple']);
                    },
                    'filter' => false,
                ],
                

                 [// total,
                    'attribute' => 'Total',
                    'header'=> 'SUMA',
                    'value' => function($data) {
                        // show the amount in money format => 50,000.00
                        return number_format($data['cantidad'], 2);
                    },
                    'filter' => false, //disable the filter for this field
                    // I create the summary function in my Invoice model
                   'footer' => TblCompra::getTotal($dataProvider->models, 'cantidad', 'precio_unitario'),
                ],

                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, \app\models\TblCompradetalle $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
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
                'id' => 'kv-compra',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'showFooter' => true,
                'columns' => $gridColumns,
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' =>  [
                    [
                        'content' =>
                       
                        Html::a('<i class="fas fa-plus"></i> Agregar', ['compra-detalle/create'], [
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
                'hover' => true,
                //'showPageSummary'=>$pageSummary,
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => 'Items',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>