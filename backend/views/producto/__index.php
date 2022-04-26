<?php

use app\models\TblProducto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Productos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-producto-index">



    <p>
        <?= Html::a('<i class="fa fa-plus-circle"></i> Agregar', ['create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-file-pdf-o"></i> Imprimir Reporte', ['#'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'codigo',
            'nombre',
            //'descripcion',
            'idCategoria',
            'existencias',
            'idPresentacion',
           // 'fecha_creacion',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, TblProducto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
