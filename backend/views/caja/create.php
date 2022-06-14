<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCaja */

$this->title = Yii::t('app', 'Administrar Caja');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Caja'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-caja-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
