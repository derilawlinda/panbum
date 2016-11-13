<div class="form-group" id="add-waktu">
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
    'formName' => 'Waktu',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'id_waktu' => ['type' => TabularForm::INPUT_TEXT],
        'pelelangan_tahun' => ['type' => TabularForm::INPUT_TEXT],
        'pelelangan_mulai' => ['type' => TabularForm::INPUT_TEXT],
        'pelelngan_akhir' => ['type' => TabularForm::INPUT_TEXT],
        'penerbitan_tahun' => ['type' => TabularForm::INPUT_TEXT],
        'penerbitan_mulai' => ['type' => TabularForm::INPUT_TEXT],
        'penerbitan_akhir' => ['type' => TabularForm::INPUT_TEXT],
        'eksplorasi_tahun' => ['type' => TabularForm::INPUT_TEXT],
        'eskplorasi_awal' => ['type' => TabularForm::INPUT_TEXT],
        'eksplorasi_akhir' => ['type' => TabularForm::INPUT_TEXT],
        'cod_tahun' => ['type' => TabularForm::INPUT_TEXT],
        'cod_mulai' => ['type' => TabularForm::INPUT_TEXT],
        'cod_akhir' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowWaktu(' . $key . '); return false;', 'id' => 'waktu-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Waktu', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowWaktu()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

