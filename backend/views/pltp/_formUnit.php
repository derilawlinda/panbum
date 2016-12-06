<div class="form-group" id="add-unit">
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
    'formName' => 'Unit',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'id_unit' => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'tahap' => ['type' => TabularForm::INPUT_TEXT],
        'investasi' => ['type' => TabularForm::INPUT_TEXT],
        'prov' => ['type' => TabularForm::INPUT_TEXT],
        'kabkot' => ['type' => TabularForm::INPUT_TEXT],
        'no_unit' => ['type' => TabularForm::INPUT_TEXT],
        'potensi' => ['type' => TabularForm::INPUT_TEXT],
        'rencana' => ['type' => TabularForm::INPUT_TEXT],
        'status' => ['type' => TabularForm::INPUT_TEXT],
        'remark' => ['type' => TabularForm::INPUT_TEXT],
        'attr_status' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'kap_terpasang' => ['type' => TabularForm::INPUT_TEXT],
        'saham' => ['type' => TabularForm::INPUT_TEXT],
        'harga' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowUnit(' . $key . '); return false;', 'id' => 'unit-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Unit', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowUnit()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

