<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblComprobante */

$this->title = Yii::t('app', ' Comprobantes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comprobantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-comprobante-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
