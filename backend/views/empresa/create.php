<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblEmpresa */

$this->title = Yii::t('app', ' Empresas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empresas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-empresa-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
