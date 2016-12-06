<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Url;

$this->title = 'Penugasan PLTP';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn',
          'header'=>"No."],
        ['attribute' => 'id', 'visible' => false],
        'username',
        'email:email',
	['attribute' => 'nama_pltp',
         'label'=>"PLTP",
         'format' => 'raw',
         'value' => function($model){
                    if(count($model->pltps) > 0){
                        
                            $pltps = $model->pltps;
                            $result = "<ul>";
                           foreach($pltps as $pltp){
                              $result .= "<li>".$pltp->nama_pltp."</li>";
                            };
                            $result .= "</ul>";
                            return $result;
                        
                    }else{
                        return "<span class='label label-danger'>Tidak ada PLTP</span>";
                    }
                }],
       
        [
            'class' => 'yii\grid\ActionColumn',
			'template'    => '{update}',
			'buttons' => [
				'update' => function ($url, $model) {
						return Html::a('<span class="fa fa-pencil"></span>',  Url::toRoute('assign-pltp').'&id='.$model->id, [
									'title' => Yii::t('app', 'Update'),
						]);
				}
			],
  ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user']],
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
