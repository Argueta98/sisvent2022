<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblProducto */

$this->title = Yii::t('app', 'Producto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-producto-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
