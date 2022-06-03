<?php
Yii::$app->language = 'es_ES';

use app\models\TblProveedor;
use app\models\TblCompra;
use app\models\TblProducto;
use app\models\TblCompradetalle;
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
                    'attribute' => 'idProducto',
                    //'vAlign' => 'middle',
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
                    'attribute' => 'cantidad',
                    //'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => ['decimal',2],
                    
                 /*   'value' => function ($model) {
                        return Html::tag('span', $model->cantidad);
                    },*/
                    'filter' => false,
                ],
                
                [ //col-3
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'precio_unitario',
                    //'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => ['decimal',2],   
                  /*  'value' => function ($model) {
                        return Html::tag('span', $model->precio_unitario);
                    },*/
                    'filter' => false,
                    'pageSummary' => 'Total',
                   // 'pageSummary' => true,
                 //  'pageSummaryFunc' => GridView::F_SUM, 
                ],
                 [ //col-4
                    'class' => 'kartik\grid\FormulaColumn',
                    'header' => 'Exento',
                   // 'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'value' => function ($model, $key, $index, $widget){
                        $p = compact('model','key','index');
                        return $widget->col(2, $p) * $widget->col(3, $p);
                    },
                    'width' => '10%',
                    'format' => ['decimal',2],                
                    'pageSummary' => true,
                   'pageSummaryFunc' => GridView::F_SUM, 
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'header' => 'Eliminar',
                    'template' => '{delete}',
                   /* 'buttons'=>[
                        'delete' => function ($url, $model) {	
                          return Html::a('<span class="glyphicon glyphicon-remove"></span>',$url, ['title' => Yii::t('yii', 'Delete'),
                        ]);
                                      
                        }
                    ],*/
                  /*  'urlCreator' => function ($action, $model, $key, $index) {

                        if ($action === 'delete') {
                
                            $url = Yii::$app->controller->createUrl('compradetalle/'); // your own url generation logic
                
                            return $url;
                
                        }
                
                    }*/
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
                       
                       
                        Html::a('<i class="fas fa-plus"></i> Agregar', ['compra-detalle/create', 'id' => $model->id], [
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
                    'type' => GridView::TYPE_SUCCESS,
                    'heading' => 'Items',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>