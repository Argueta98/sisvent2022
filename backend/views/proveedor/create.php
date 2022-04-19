<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProveedor */

$this->title = Yii::t('app', ' Proveedor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-proveedor-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
