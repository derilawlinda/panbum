<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PekGeosains */

$this->title = $model->id_geosains;
$this->params['breadcrumbs'][] = ['label' => 'Pek Geosains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pek-geosains-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Pek Geosains'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_geosains], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_geosains], [
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
        'id_geosains',
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
