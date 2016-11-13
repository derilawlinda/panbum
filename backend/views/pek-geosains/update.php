<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekGeosains */

$this->title = 'Update Pek Geosains: ' . ' ' . $model->id_geosains;
$this->params['breadcrumbs'][] = ['label' => 'Pek Geosains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_geosains, 'url' => ['view', 'id' => $model->id_geosains]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-geosains-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
