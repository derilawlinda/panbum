<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailIzin */

$this->title = 'Update Unit Detail Izin: ' . ' ' . $model->izin_id;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Izin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->izin_id, 'url' => ['view', 'id' => $model->izin_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-detail-izin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
