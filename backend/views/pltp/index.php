<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PltpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Pltp';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="pltp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pltp', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'id_wkp',
                'label' => 'WKP',
                'value' => function($model){
                    return $model->wkp->nama;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Wkp::find()->asArray()->all(), 'id_wkp', 'nama'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Wkp', 'id' => 'grid-pltp-search-id_wkp']
            ],
        [
                'attribute' => 'id_pengembang',
                'label' => 'Pengembang',
                'value' => function($model){
                    return $model->pengembang ? $model->pengembang->nama : "Belum ada pengembang";
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Pengembang::find()->asArray()->all(), 'id_pengembang', 'nama'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true, 'placeholder'=>'WKP'],
                    
                ],
                'filterInputOptions' => ['placeholder' => 'Pengembang', 'id' => 'grid-pltp-search-id_pengembang']
            ],
        ['attribute'=>'nama_pltp','label'=>'PLTP' ],
        ['attribute'=>'remark',
          'label'=>'Catatan'  ],
        
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pltp']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>
<div class="well">
     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
