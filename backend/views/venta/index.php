<?php
Yii::$app->language = 'es_ES';

use app\models\TblProveedor;
use app\models\TblVenta;
use app\models\TblCliente;
use app\models\TblEmpleado;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ventas Realizadas';
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
                    'attribute' => 'num_venta',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'width' => '300px',
                    'format' => 'html',
                    'value' => 'num_venta',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblVenta::find()->orderBy('num_venta')->all(), 'id', 'num_venta'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'idCliente',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'width' => '300px',
                    'format' => 'html',
                    'value' => function($model){
                        $cliente = TblCliente::findOne($model->idCliente);
                        return $cliente->nombre.''.$cliente->apellido;
                    } ,
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCliente::find()->orderBy('nombre')->all(), 'id', 'nombre'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'idEmpleado',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'width' => '300px',
                    'format' => 'html',
                    'value' => function($model){
                        $empleado = TblEmpleado::findOne($model->idEmpleado);
                        return $empleado->nombres.''.$empleado->apellidos;
                    } ,
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblEmpleado::find()->orderBy('nombres')->all(), 'id', 'nombres'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'fecha',
                    'headerOptions' => ['class' => 'kv-sticky-column'],
                    'contentOptions' => ['class' => 'kv-sticky-column'],
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'width' => '250px',
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => ([
                        'model' => $dataProvider,
                        'attribute' => 'fecha',
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
                    'class' => 'kartik\grid\BooleanColumn',
                    'trueLabel' => 'Finalizada',
                    'falseLabel' => 'Proceso',
                    'attribute' => 'estado',
                    'width' => '120px',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                    'vAlign' => 'middle',
                ],
               
              
                
                
               
               
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, \app\models\TblVenta $model, $key, $index, $column) {
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
                    'type' => GridView::TYPE_SUCCESS,
                    'heading' => 'Lista de Venta',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>