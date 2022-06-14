<?php
Yii::$app->language = 'es_ES';

use app\models\TblCategoria;
use app\models\TblPresentacion;
use app\models\TblCliente;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Clientes';
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
                    'width' => '200px',
                    'format' => 'raw',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'attribute' => 'nombre',
                    'value' => 'nombre',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCliente::find()->orderBy('nombre')->all(), 'nombre', 'nombre'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'apellido',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => 'apellido',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCliente::find()->orderBy('apellido')->all(), 'id', 'apellido'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'direccion',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => 'direccion',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCliente::find()->orderBy('direccion')->all(), 'id', 'direccion'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'telefono',
                    'vAlign' => 'middle',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => 'telefono',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCliente::find()->orderBy('telefono')->all(), 'id', 'telefono'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'correo',
                    'vAlign' => 'middle',
                    'format' => 'html',
                    'value' => 'correo',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => ArrayHelper::map(TblCliente::find()->orderBy('correo')->all(), 'id', 'correo'),
                    'filterWidgetOptions' => [
                        'options' => ['placeholder' => 'Todos...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                ],
   
     
               
               
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, \app\models\TblCliente $model, $key, $index, $column) {
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
                    'heading' => 'Presentacion',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>