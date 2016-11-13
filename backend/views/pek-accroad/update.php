<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekAccroad */

$this->title = 'Update Pek Accroad: ' . ' ' . $model->id_accroad;
$this->params['breadcrumbs'][] = ['label' => 'Pek Accroad', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_accroad, 'url' => ['view', 'id' => $model->id_accroad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-accroad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
