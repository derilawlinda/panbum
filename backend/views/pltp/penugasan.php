<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\YiiAsset;
use nex\chosen\Chosen;
YiiAsset::register($this);
?>

<?php $form = ActiveForm::begin([
                'id' => 'active-form',
                'options' => [
				'class' => 'form-horizontal',
				'enctype' => 'multipart/form-data'
				],
])
?> 
<div class="penugasan-pltp-form">
    <div class="row">
    <div class="col-sm-3" style="left:1%;">
        <?= $form->field($modelUser, 'id')->widget(
    Chosen::className(), [
        'items' => $userList,
        'disableSearch' => 0, // Search input will be disabled while there are fewer than 5 items
        'clientOptions' => [
            'search_contains' => true,
            'single_backstroke_delete' => false,
        ],
    ])->label("User");?>
    </div>
    
</div>
</div>

 



<?php ActiveForm::end(); ?>

