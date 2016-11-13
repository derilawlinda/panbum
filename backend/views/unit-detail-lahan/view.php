<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailLahan */

$this->title = $model->id_lahan;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Lahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-detail-lahan-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Unit Detail Lahan'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_lahan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_lahan], [
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
        'id_lahan',
        [
            'attribute' => 'unit.id_unit',
            'label' => 'Id Unit',
        ],
        'hutan_kons',
        'status_kons',
        'hutan_lin',
        'status_lin',
        'hutan_prod',
        'status_prod',
        'area',
        'status_area',
        'input_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
