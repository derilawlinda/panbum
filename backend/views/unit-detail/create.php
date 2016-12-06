<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetail */

$this->title = 'Create Unit Detail';
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
