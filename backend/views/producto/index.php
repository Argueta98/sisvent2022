<?php
Yii::$app->language = 'es_ES';

use app\models\TblCategoria;
use app\models\TblPresentacion;
use app\models\TblProducto;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="tbl-cat-index">

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>
            <?php
            $gridColumns = [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'contentOptions' => ['class' => 'kartik-sheet-style'],
                    'width' => '36px',
                    'header' => '#',
                    'headerOptions' => ['class' => 'kartik-sheet-style']
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '100px',
                    'format' => 'raw',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'attribute' => 'codigo',
                    'value' => function ($model) {
                        return Html::tag('span', $model->codigo);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblProducto::find()->orderBy('codigo')->all(), 'codigo', 'codigo'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'nombre',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => 'nombre',
                   /* 'value' => function ($model, $key, $index, $widget) {
                        return Html::a($model->nombre,  ['view', 'nombre' => $model->id]);
                    },*/
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblProducto::find()->orderBy('nombre')->all(), 'id', 'nombre'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'idCategoria',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html', 
                    'value' => 'categoria.nombre',                
                  /*  'value' => function($model){
                        $categoria = TblCategoria::findOne($model->idCategoria);
                        return $categoria->nombre;
                    } ,*/
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCategoria::find()->orderBy('nombre')->all(), 'id', 'nombre'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'idPresentacion',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => 'presentacion.nombre',
                   /* 'value' => function($model){
                        $presentacion = TblPresentacion::findOne($model->idPresentacion);
                        return $presentacion->nombre;
                    },*/
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblPresentacion::find()->orderBy('nombre')->all(), 'id', 'nombre'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '100px',
                    'format' => 'raw',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'attribute' => 'stock_min',
                    'value' => function ($model) {
                        return Html::tag('span', $model->stock_min, ['class' => 'badge bg-warning ']);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblProducto::find()->orderBy('stock_min')->all(), 'stock_min', 'stock_min'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
               
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '100px',
                    'format' => 'raw',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'attribute' => 'precio_compra',
                    'value' => function ($model) {
                        return Html::tag('span', $model->precio_compra);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblProducto::find()->orderBy('precio_compra')->all(), 'precio_compra', 'precio_compra'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'width' => '100px',
                    'format' => 'raw',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'attribute' => 'precio_venta',
                    'value' => function ($model) {
                        return Html::tag('span', $model->precio_venta);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblProducto::find()->orderBy('precio_venta')->all(), 'precio_venta', 'precio_venta'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
            
                
               
               
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, \app\models\TblProducto $model, $key, $index, $column) {
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
                'id' => 'kv-categoria',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' =>  [
                    [
                        'content' =>
                        Html::a('<i class="fas fa-plus"></i> Agregar', ['create'], [
                            'class' => 'btn btn-success',
                            'data-pjax' => 0,
                        ]) . ' ' .
                            Html::a('<i class="fas fa-redo"></i>', ['index'], [
                                'class' => 'btn btn-outline-success',
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
                    'heading' => 'Producto',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>