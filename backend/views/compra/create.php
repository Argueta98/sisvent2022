<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCompra */

$this->title = Yii::t('app', 'Create Tbl Compra');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Compras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-compra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
