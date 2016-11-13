<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailSosial */

$this->title = 'Update Unit Detail Sosial: ' . ' ' . $model->id_sosial;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Sosial', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sosial, 'url' => ['view', 'id' => $model->id_sosial]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-detail-sosial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
