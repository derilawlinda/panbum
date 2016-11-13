<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengembang */

$this->title = $model->id_pengembang;
$this->params['breadcrumbs'][] = ['label' => 'Pengembang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengembang-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Pengembang'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_pengembang], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_pengembang], [
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
        'id_pengembang',
        'nama',
        'alamat',
        'dirut',
        'user',
        'tgl',
        'izin',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerUnit->totalCount){
    $gridColumnUnit = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_unit',
            [
                'attribute' => 'wkp.id_wkp',
                'label' => 'Id Wkp'
            ],
                        'investasi',
            'prov',
            'kabkot',
            'no_unit',
            'potensi',
            'rencana',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUnit,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-unit']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Unit'),
        ],
        'export' => false,
        'columns' => $gridColumnUnit
    ]);
}
?>
    </div>
</div>
