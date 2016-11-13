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
                ['class' => 'yii\grid\SerialColumn'],
                'id_unit',
                [
                    'attribute' => 'namawkp',
                    'label' => 'WKP',
                    'value' => function($model) {
                        return $model->pltp->wkp->nama;
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Wkp::find()->asArray()->all(), 'nama', 'nama'),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Wkp', 'id' => 'grid--id_wkp']
                ],
                [
                    'attribute' => 'pltpname',
                    'label' => 'PLTP',
                    'value' => function($model) {
                        return $model->pltp->nama_pltp;
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => \yii\helpers\ArrayHelper::map(\backend\models\Pltp::find()->asArray()->all(), 'id', 'id'),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Pltp', 'id' => 'grid--id_pltp']
                ],
                'no_unit',
                'tahap',
                [
                    'attribute' => 'status',
                    'label' => 'Status',
                    'format' => 'raw',
                    'value'=>function ($data) {
                            if($data->status == "S") {
                                return "<span class='label label-warning'>Verifikasi</span>";
                             }elseif($data->status == "A"){
                                return "<span class='label label-success'>Terverfikasi</span>";
                             }else{
                                return "<span class='label label-danger'>Revisi</span>";
                                 
                             }
                                
                         }
                ],
                [
                    'attribute' => 'updated_at',
                    'label' => 'Update Terakhir',
                ],
                [
                    'attribute' => 'created_at',
                    'label' => 'Created',
                    'value' => function($data) {
                        return date('Y F', strtotime($data->created_at));
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'buttons' => [
                        'update' => function ($url, $modelUnit) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::toRoute('unit/update') . '&id_unit=' . $modelUnit->id_unit, [
                                        'title' => Yii::t('app', 'Update Unit'),
                            ]);
                        }
                            ],
                        ],
                    ];
                    ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
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
                            ]),
                        ],
                    ]);
                    ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#createbutton').on('click', function (e)
        {


            $.ajax({
                processData: false,
                contentType: false,
                url: "index.php?r=unit/create",
                type: 'get',
                success: function (response)
                {
                    if (response == 'redirect') {
                        window.location.replace("index.php?r=unit/create-unit");
                    }

                },
                error: function ()
                {
                    console.log('internal server error');
                }
            });
            return false;
        });
    });
</script>
