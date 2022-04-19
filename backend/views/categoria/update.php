<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCategoria */

$this->title = Yii::t('app', ' Categoria: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tbl-categoria-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
