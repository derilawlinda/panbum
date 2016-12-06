<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Wkp';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="wkp-index">

    <h1></h1>

   
<?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute'=>'id_wkp','visible'=>false],
        'nama',
        ['attribute'=>'skwkp',
          'label'=>'SK WKP'  ],
        ['attribute'=>'luas',
          'label'=>'Luas(Ha)'  ],
        ['attribute'=>'pem_izin',
          'label'=>'Pemegang Izin'  ],
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-wkp']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'filterModel' => $wkpSearchModel,
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
