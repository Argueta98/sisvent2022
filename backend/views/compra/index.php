<?php
Yii::$app->language = 'es_ES';

use app\models\TblProveedor;
use app\models\TblCompra;
use app\models\TblProducto;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Compras';
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
                    'attribute' => 'idProveedor',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => 'idCategoria.nombre',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblProveedor::find()->orderBy('nombre')->all(), 'id', 'nombre'),
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
                    'attribute' => 'serie',
                    'value' => function ($model) {
                        return Html::tag('span', $model->serie, ['class' => 'badge bg-info ']);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCompra::find()->orderBy('serie')->all(), 'serie', 'serie'),
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
                    'attribute' => 'numero_compra',
                    'value' => function ($model) {
                        return Html::tag('span', $model->numero_compra, ['class' => 'badge bg-info ']);
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCompra::find()->orderBy('numero_compra')->all(), 'numero_compra', 'numero_compra'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
              
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'fecha_compra',
                    'headerOptions' => ['class' => 'kv-sticky-column'],
                    'contentOptions' => ['class' => 'kv-sticky-column'],
                    'vAlign' => 'middle',
                    'hAlign' => 'right',
                    'width' => '250px',
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => ([
                        'model' => $dataProvider,
                        'attribute' => 'fecha_compra',
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'yyyy-M-dd',
                            'autoWidget' => true,
                            'autoclose' => true,
                            'todayHighlight' => true,
                        ],
                    ]),
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'fecha_creacion',
                    'headerOptions' => ['class' => 'kv-sticky-column'],
                    'contentOptions' => ['class' => 'kv-sticky-column'],
                    'vAlign' => 'middle',
                    'hAlign' => 'right',
                    'width' => '250px',
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => ([
                        'model' => $dataProvider,
                        'attribute' => 'fecha_creacion',
                        'convertFormat' => true,
                        'pluginOptions' => [
                            'format' => 'yyyy-M-dd',
                            'autoWidget' => true,
                            'autoclose' => true,
                            'todayHighlight' => true,
                        ],
                    ]),
                ],
               
               
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, \app\models\TblCompra $model, $key, $index, $column) {
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
                    'heading' => 'Compra',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>