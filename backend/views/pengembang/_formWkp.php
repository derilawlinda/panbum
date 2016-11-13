<div class="form-group" id="add-wkp">
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
    'formName' => 'Wkp',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'id_wkp' => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'nama' => ['type' => TabularForm::INPUT_TEXT],
        'skwkp' => ['type' => TabularForm::INPUT_TEXT],
        'lapangan' => ['type' => TabularForm::INPUT_TEXT],
        'peta' => ['type' => TabularForm::INPUT_TEXT],
        'remark' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowWkp(' . $key . '); return false;', 'id' => 'wkp-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Wkp', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowWkp()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

