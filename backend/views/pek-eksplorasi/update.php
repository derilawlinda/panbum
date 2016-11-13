<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekEksplorasi */

$this->title = 'Update Pek Eksplorasi: ' . ' ' . $model->id_eksplorasi;
$this->params['breadcrumbs'][] = ['label' => 'Pek Eksplorasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_eksplorasi, 'url' => ['view', 'id' => $model->id_eksplorasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-eksplorasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
