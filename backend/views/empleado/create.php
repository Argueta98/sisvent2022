<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblEmpleado */

$this->title = Yii::t('app', 'Empleados');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', ' Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-empleado-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
