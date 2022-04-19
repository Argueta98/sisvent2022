<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCompra */

$this->title = Yii::t('app', ' Compra');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Compras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-compra-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
