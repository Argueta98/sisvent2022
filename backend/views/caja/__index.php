<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CajaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Abrir Caja');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-caja-index">


    <p>
        <?= Html::a('<i class="fa fa-plus-circle"></i> Abrir Caja', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'fecha_apertura',
            'monto_apertura',
            'monto_cierre',
            'fecha_cierre',
            'estado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblCaja $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
