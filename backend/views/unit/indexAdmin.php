<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use lo\modules\noty\Wrapper;

$this->title = 'Input Data';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<style>
    .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
        padding-top : 40px;
    }
</style>
<script src="scripts/jquery.js"></script>
<div class="unit-index">

    <div class="row">
        <div class="col-sm-12">
            <?= Html::a('Create Unit', null, ['class' => 'btn btn-mini btn-info pull-right', 'id' => 'createbutton']) ?>
            <?php
            echo Wrapper::widget([
                'layerClass' => 'lo\modules\noty\layers\Noty',
                'options' => [
                    'dismissQueue' => true,
                    'layout' => 'topRight',
                    'timeout' => 2000,
                    'theme' => 'relax',
                ]
            ]);
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">

            <?php 
    $gridColumn = [ 
         
        ['attribute' => 'id_unit',
          'visible'=>false],
        [ 
                'attribute' => 'id_pltp', 
                'label' => 'PLTP', 
                'value' => function($model){ 
                    return $model->pltp->nama_pltp; 
                }, 
                'filterType' => GridView::FILTER_SELECT2, 
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Pltp::find()->asArray()->all(), 'id', 'nama_pltp'), 
                'filterWidgetOptions' => [ 
                    'pluginOptions' => ['allowClear' => true], 
                ], 
                'filterInputOptions' => ['placeholder' => 'Pltp', 'id' => 'grid-unit-search-id_pltp'] 
            ],
        'no_unit',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-unit']], 
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

        </div>
    </div>
  <div class="well">
     <?= $this->render('_formAdminCreate', [
        'model' => $model,
    ]) ?>
</div>
</div>
