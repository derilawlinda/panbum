<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Penugasan PLTP', 'url' => ['']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'User'.' '. Html::encode($this->title) ?></h2>
        </div>
       
    </div>

    <div class="row">
        <div class="col-sm-11">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'email:email'
        
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    </div>
    
    <div class="row">
        <div class="col-sm-11">
<?php
if($providerPltp->totalCount){
    $gridColumnPltp = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'wkp.id_wkp',
                'label' => 'Id Wkp'
            ],
            'nama_pltp',
            'remark',
            [
                'attribute' => 'pengembang.id_pengembang',
                'label' => 'Id Pengembang'
            ],
                ];
    echo Gridview::widget([
        'dataProvider' => $providerPltp,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pltp']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pltp'),
        ],
        'export' => false,
        'columns' => $gridColumnPltp
    ]);
}
?>
    
        </div>
    </div>
    
   
</div>
