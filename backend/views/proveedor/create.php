<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProveedor */

$this->title = Yii::t('app', 'Create Tbl Proveedor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Proveedors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-proveedor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
