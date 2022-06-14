
<?php
Yii::$app->language = 'es_ES';

use app\models\TblCaja;
use app\models\TblProducto;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use yii\bootstrap4\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administración de Caja';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
//FIXME CREAR MODAL

Modal::begin([
    'options' => [
        'tabindex' => false
    ],
    'title' => 'Crear registro',
    'id' => 'create-modal',
    'size' => 'modal-lg'
]);
echo "<div id='createModalContent'></div>";
Modal::end();
?>

<?php Pjax::begin(['id' => 'datosGrid']); ?>

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
                    'attribute' => 'monto_apertura',
                    'value' => function ($model) {
                        return Html::tag('span', $model->monto_apertura, ['class' => 'badge bg-info ']);
                    },
                    'filter' => false,
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'monto_cierre',
                    'vAlign' => 'middle',
                    'width' => '100px',
                    'hAlign' => 'center',
                    'format' => 'html',
                    'value' => function ($model) {
                        return Html::tag('span', $model->monto_cierre, ['class' => 'badge bg-red ']);
                    },
                    'filter' => false,
                    
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute' => 'fecha_cierre',
                    'headerOptions' => ['class' => 'kv-sticky-column'],
                    'contentOptions' => ['class' => 'kv-sticky-column'],
                    'vAlign' => 'middle',
                    'hAlign' => 'right',
                    'hAlign' => 'center',
                    'width' => '100px',
                    'filter' => false,
                ],

                [
                    'class' => 'kartik\grid\BooleanColumn',
                    'trueLabel' => 'Si',
                    'falseLabel' => 'No',
                    'attribute' => 'estado',
                    'width' => '10px',
                    'filter' => false,
                    
                ],
               
              
               
               
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'urlCreator' => function ($action, \app\models\TblCaja $model, $key, $index, $column) {
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
                        
                        Html::a('<i class="fas fa-box-open"></i> Abrir Caja', ['create'], [
                            'class' => 'btn btn-warning',
                            'data-pjax' => 0,
                        ]) . ' ' .
                            Html::a('<i class="fas fa-redo"></i>', ['index'], [
                                'class' => 'btn btn-outline-warning',
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
                    'heading' => 'Lista ',
                ],
                'persistResize' => false,
            ]);
            ?>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>