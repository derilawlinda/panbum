<div class="form-group" id="add-unit-detail-tanah">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'UnitDetailTanah',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'id_tanah' => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'luas_lahan' => ['type' => TabularForm::INPUT_TEXT],
        'status_luas' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'status_tanah' => ['type' => TabularForm::INPUT_TEXT],
        'status_tahun' => ['type' => TabularForm::INPUT_TEXT],
        'status_status' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'legalitas' => ['type' => TabularForm::INPUT_TEXT],
        'status_legalitas' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'input_date' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowUnitDetailTanah(' . $key . '); return false;', 'id' => 'unit-detail-tanah-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Unit Detail Tanah', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowUnitDetailTanah()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

