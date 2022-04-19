<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPerecedero */

$this->title = Yii::t('app', 'Perecedero');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perecederos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-perecedero-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
