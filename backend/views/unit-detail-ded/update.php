<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailDed */

$this->title = 'Update Unit Detail Ded: ' . ' ' . $model->id_ded;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Ded', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ded, 'url' => ['view', 'id' => $model->id_ded]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-detail-ded-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
