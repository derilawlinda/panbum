<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailLahan */

$this->title = 'Update Unit Detail Lahan: ' . ' ' . $model->id_lahan;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Lahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_lahan, 'url' => ['view', 'id' => $model->id_lahan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-detail-lahan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
