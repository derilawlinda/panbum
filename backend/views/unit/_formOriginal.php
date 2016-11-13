<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Foto', 
        'relID' => 'foto', 
        'value' => \yii\helpers\Json::encode($model->fotos),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PekAccroad', 
        'relID' => 'pek-accroad', 
        'value' => \yii\helpers\Json::encode($model->pekAccroads),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PekCod', 
        'relID' => 'pek-cod', 
        'value' => \yii\helpers\Json::encode($model->pekCods),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PekEpc', 
        'relID' => 'pek-epc', 
        'value' => \yii\helpers\Json::encode($model->pekEpcs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PekGeosains', 
        'relID' => 'pek-geosains', 
        'value' => \yii\helpers\Json::encode($model->pekGeosains),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PekKelayakan', 
        'relID' => 'pek-kelayakan', 
        'value' => \yii\helpers\Json::encode($model->pekKelayakans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PekKonssipil', 
        'relID' => 'pek-konssipil', 
        'value' => \yii\helpers\Json::encode($model->pekKonssipils),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PekPengsumur', 
        'relID' => 'pek-pengsumur', 
        'value' => \yii\helpers\Json::encode($model->pekPengsumurs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PekTransmisi', 
        'relID' => 'pek-transmisi', 
        'value' => \yii\helpers\Json::encode($model->pekTransmisis),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UnitDetailDed', 
        'relID' => 'unit-detail-ded', 
        'value' => \yii\helpers\Json::encode($model->unitDetailDeds),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UnitDetailIzin', 
        'relID' => 'unit-detail-izin', 
        'value' => \yii\helpers\Json::encode($model->unitDetailIzins),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UnitDetailLahan', 
        'relID' => 'unit-detail-lahan', 
        'value' => \yii\helpers\Json::encode($model->unitDetailLahans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UnitDetailSosial', 
        'relID' => 'unit-detail-sosial', 
        'value' => \yii\helpers\Json::encode($model->unitDetailSosials),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'UnitDetailTanah', 
        'relID' => 'unit-detail-tanah', 
        'value' => \yii\helpers\Json::encode($model->unitDetailTanahs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Waktu', 
        'relID' => 'waktu', 
        'value' => \yii\helpers\Json::encode($model->waktus),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_unit')->textInput(['maxlength' => true, 'placeholder' => 'Id Unit']) ?>

    <?= $form->field($model, 'id_wkp')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Wkp::find()->orderBy('id_wkp')->asArray()->all(), 'id_wkp', 'id_wkp'),
        'options' => ['placeholder' => 'Choose Wkp'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_pengembang')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Pengembang::find()->orderBy('id_pengembang')->asArray()->all(), 'id_pengembang', 'id_pengembang'),
        'options' => ['placeholder' => 'Choose Pengembang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'investasi')->textInput(['placeholder' => 'Investasi']) ?>

    <?= $form->field($model, 'prov')->textInput(['maxlength' => true, 'placeholder' => 'Prov']) ?>

    <?= $form->field($model, 'kabkot')->textInput(['maxlength' => true, 'placeholder' => 'Kabkot']) ?>

    <?= $form->field($model, 'no_unit')->textInput(['placeholder' => 'No Unit']) ?>

    <?= $form->field($model, 'potensi')->textInput(['placeholder' => 'Potensi']) ?>

    <?= $form->field($model, 'rencana')->textInput(['placeholder' => 'Rencana']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Foto'),
            'content' => $this->render('_formFoto', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->fotos),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PekAccroad'),
            'content' => $this->render('_formPekAccroad', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->pekAccroads),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PekCod'),
            'content' => $this->render('_formPekCod', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->pekCods),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PekEpc'),
            'content' => $this->render('_formPekEpc', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->pekEpcs),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PekGeosains'),
            'content' => $this->render('_formPekGeosains', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->pekGeosains),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PekKelayakan'),
            'content' => $this->render('_formPekKelayakan', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->pekKelayakans),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PekKonssipil'),
            'content' => $this->render('_formPekKonssipil', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->pekKonssipils),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PekPengsumur'),
            'content' => $this->render('_formPekPengsumur', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->pekPengsumurs),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PekTransmisi'),
            'content' => $this->render('_formPekTransmisi', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->pekTransmisis),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('UnitDetailDed'),
            'content' => $this->render('_formUnitDetailDed', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->unitDetailDeds),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('UnitDetailIzin'),
            'content' => $this->render('_formUnitDetailIzin', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->unitDetailIzins),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('UnitDetailLahan'),
            'content' => $this->render('_formUnitDetailLahan', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->unitDetailLahans),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('UnitDetailSosial'),
            'content' => $this->render('_formUnitDetailSosial', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->unitDetailSosials),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('UnitDetailTanah'),
            'content' => $this->render('_formUnitDetailTanah', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->unitDetailTanahs),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Waktu'),
            'content' => $this->render('_formWaktu', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->waktus),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
