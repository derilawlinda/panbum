<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekKonssipil */

$this->title = 'Update Pek Konssipil: ' . ' ' . $model->id_konssipil;
$this->params['breadcrumbs'][] = ['label' => 'Pek Konssipil', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_konssipil, 'url' => ['view', 'id' => $model->id_konssipil]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-konssipil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
