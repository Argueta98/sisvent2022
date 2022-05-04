<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCompradetalle */

$this->title = Yii::t('app', 'Detalle de Compras');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalle Compras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-compradetalle-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
