<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblPerecedero */

$this->title = Yii::t('app', 'Create Tbl Perecedero');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Perecederos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-perecedero-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
