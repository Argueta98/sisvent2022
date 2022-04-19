<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCliente */

$this->title = Yii::t('app', ' Cliente');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', ' Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cliente-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
