<?php

//namespace yii\bootstrap4;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Button;
use yii\bootstrap\Modal;


use lo\widgets\modal\ModalAjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categoria');
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="panel panel-flat">


 <h1><?php  Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-plus-circle"></i> Agregar', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'nombre',
            'descripcion',
            'fecha_creacion',
            'fecha_actualizar',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
