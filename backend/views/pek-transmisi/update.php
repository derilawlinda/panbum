<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekTransmisi */

$this->title = 'Update Pek Transmisi: ' . ' ' . $model->id_transmisi;
$this->params['breadcrumbs'][] = ['label' => 'Pek Transmisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_transmisi, 'url' => ['view', 'id' => $model->id_transmisi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-transmisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
