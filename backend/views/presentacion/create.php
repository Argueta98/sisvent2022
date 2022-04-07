<?php

use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentacion'), 'url' => ['index']];

?>
<div class="tbl-presentacion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
