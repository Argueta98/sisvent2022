<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCliente */

$this->title = Yii::t('app', 'Create Tbl Cliente');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cliente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
