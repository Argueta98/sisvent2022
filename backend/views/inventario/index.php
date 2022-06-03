<?php
Yii::$app->language = 'es_ES';

use app\models\TblProveedor;
use app\models\TblCompradetalle;
use app\models\TblComprobante;
use app\models\TblCompra;
use app\models\TblProducto;
use app\models\TblInventario;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventario';
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
                    'attribute' => 'numero_entrada',
                    'width' => '100px',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::tag('span', $model->numero_entrada, ['class' => 'badge bg-info']);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblInventario::find()->orderBy('numero_entrada')->all(), 'id', 'numero_entrada'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'idCompra',
                    'width' => '100px',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function($model){
                        $compra = TblCompra::findOne($model->idCompra);
                        return Html::tag('span', $compra->numero_compra); //$producto->nombre;
                    } ,
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCompra::find()->orderBy('numero_compra')->all(), 'id', 'numero_compra'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'idProducto',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function($model){
                        $producto = TblProducto::findOne($model->idProducto);
                        return Html::tag('span', $producto->nombre); //$producto->nombre;
                    } ,
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblProducto::find()->orderBy('id')->all(), 'id', 'nombre'),
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
                    'attribute' => 'existencias',
                    'value' => function ($model) {
                        return Html::tag('b', $model->existencias);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblInventario::find()->orderBy('id')->all(), 'id', 'existencias'),
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
                    'attribute' => 'cant_original',
                    'value' => function ($model) {
                        return Html::tag('b', $model->cant_original);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblInventario::find()->orderBy('id')->all(), 'id', 'cant_original'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
             
              
               
               
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, \app\models\TblInventario $model, $key, $index, $column) {
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
                       /* Html::a('<i class="far fa-eye"></i> Ver Compras', ['compra/index'], [
                            'class' => 'btn btn-info',
                            'data-pjax' => 0,
                        ]) . ' ' . 
                        Html::a('<i class="fas fa-plus"></i> Agregar Detalle', ['create'], [
                            'class' => 'btn btn-success',
                            'data-pjax' => 0,
                        ]) . ' ' .*/
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
                    'heading' => 'Detalle Inventario',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>