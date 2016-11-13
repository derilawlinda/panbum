<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailTanah */

$this->title = $model->id_tanah;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Tanah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-detail-tanah-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Unit Detail Tanah'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_tanah], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_tanah], [
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
        'id_tanah',
        [
            'attribute' => 'unit.id_unit',
            'label' => 'Id Unit',
        ],
        'luas_lahan',
        'status_luas',
        'status_tanah',
        'status_tahun',
        'status_status',
        'legalitas',
        'status_legalitas',
        'input_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
