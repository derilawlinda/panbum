<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pltp */

$this->title = 'Update Pltp: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pltp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pltp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
