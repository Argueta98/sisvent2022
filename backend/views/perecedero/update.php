<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPerecedero */

$this->title = Yii::t('app', 'Update Tbl Perecedero: {name}', [
    'name' => $model->idproducto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Perecederos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproducto, 'url' => ['view', 'idproducto' => $model->idproducto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tbl-perecedero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
