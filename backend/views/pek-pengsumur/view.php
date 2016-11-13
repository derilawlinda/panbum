<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PekPengsumur */

$this->title = $model->id_pengsumur;
$this->params['breadcrumbs'][] = ['label' => 'Pek Pengsumur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pek-pengsumur-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Pek Pengsumur'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_pengsumur], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_pengsumur], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id_pengsumur',
        [
            'attribute' => 'unit.id_unit',
            'label' => 'Id Unit',
        ],
        'target',
        'capaian',
        'remark',
        'status',
        'submitted_date',
        'confirmed_date',
        'confirmed',
        'file',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
