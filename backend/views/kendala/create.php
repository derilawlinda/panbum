<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kendala */

$this->title = 'Create Kendala';
$this->params['breadcrumbs'][] = ['label' => 'Kendala', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kendala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
