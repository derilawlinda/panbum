<div class="form-group" id="add-pltp">
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
    'formName' => 'Pltp',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'id_wkp' => [
            'label' => 'Wkp',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Wkp::find()->orderBy('id_wkp')->asArray()->all(), 'id_wkp', 'id_wkp'),
                'options' => ['placeholder' => 'Choose Wkp'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'nama_pltp' => ['type' => TabularForm::INPUT_TEXT],
        'remark' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowPltp(' . $key . '); return false;', 'id' => 'pltp-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Pltp', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPltp()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

