<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailTanah */

$this->title = 'Update Unit Detail Tanah: ' . ' ' . $model->id_tanah;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Tanah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tanah, 'url' => ['view', 'id' => $model->id_tanah]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-detail-tanah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
