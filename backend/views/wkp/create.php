<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Wkp */

$this->title = 'Create Wkp';
$this->params['breadcrumbs'][] = ['label' => 'Wkp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wkp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
