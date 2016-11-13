<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailSosial */

$this->title = $model->id_sosial;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Sosial', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-detail-sosial-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Unit Detail Sosial'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_sosial], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sosial], [
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
        'id_sosial',
        [
            'attribute' => 'unit.id_unit',
            'label' => 'Id Unit',
        ],
        'sosial_text',
        'sosial_status',
        'input_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
