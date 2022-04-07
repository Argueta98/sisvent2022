<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TblCategoria */

$this->title = Yii::t('app', 'Create Tbl Categoria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-categoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
