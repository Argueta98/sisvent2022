<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerecederoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perecederos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-perecedero-index">


    <p>
    <?= Html::a('<i class="fa fa-plus-circle"></i> Agregar', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fecha_vencimiento',
            'cantidad_percedero',
            'idproducto',
            'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblPerecedero $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idproducto' => $model->idproducto]);
                 }
            ],
        ],
    ]); ?>


</div>
