<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use lo\modules\noty\Wrapper;
?>
<script src="//code.jquery.com/jquery-2.2.4.js"></script>
<style>

    .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
        margin-top: 20px;
    }

</style>
<?php
echo Wrapper::widget([
    'layerClass' => 'lo\modules\noty\layers\Noty',
    'options' => [
        'dismissQueue' => true,
        'layout' => 'topRight',
        'timeout' => 1000,
        'theme' => 'relax',
    ]
]);
?>
<?php
$this->registerJs(
        '$("document").ready(function(){ 
        $("#search_unit").on("pjax:end", function() {
            $.pjax.reload({container:"#pantauwkp"});  //Reload GridView
        });
    });'
);
?>
<div class="inputdata-index">

<?php yii\widgets\Pjax::begin(['id' => 'search_unit']) ?>

    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'id' => 'form-pilih-unit',
                'method' => 'post',
                'fieldConfig' => [
                    'template' => "{input}"],
                'options' => ['data-pjax' => true]]);
    ?>
    <div class="well">
        <div class="row">
            <div class="col-sm-3 ">
                <?=
                        $form->field($modelWkp, 'id_wkp')
                        ->dropDownList(
                                $wkpList, [
                        'onchange' => '
                            if(this.value != ""){
                                    $("#pltpdropdown").prop("disabled", false);
                                    $.get(
                                            "' . Url::toRoute('getpltpbywkp') . '", 
                                            {id_wkp: $(this).val()}, 
                                            function(res){
                                                    $("#pltpdropdown").html(res);
                                            }
                                    );
                            }else{
                                    $("#unit").val("").change();
                                    $("#pltpdropdown").val("").change();
                                    $("#unit").prop("disabled", true);
                                    $("#pltpdropdown").prop("disabled", true);

                            };

                        ',
                            'prompt' => 'Pilih WKP..',
                            'id' => 'wkpdropdown',
                            'options' => ['class' => 'form-group invisible']
                        ])
                        ->label(false);
                ?>
            </div>


            <div class="col-sm-3" style="padding-left:50px;">
                <?=
                        $form->field($modelUnit, 'id_pltp')
                        ->dropDownList(
                                [], ['prompt' => 'Pilih PLTP..',
                            'id' => 'pltpdropdown',
                            'onchange' => '
                            if(this.value != ""){
                                    $("#unitdropdown").prop("disabled", false);
                                    $.get(
                                                    "' . Url::toRoute('get-unit-by-pltp') . '", 
                                                    {id_pltp: $(this).val()}, 
                                                    function(res){

                                                            $("#unitdropdown").html(res);
                                                            $("#unitdropdown").append("<option value=\"9999\">Unit baru</option>");
                                                    }
                                            );
                            }else{
                                    $("#unitdropdown").prop("disabled", true);
                                    $("#unitdropdown").val("").change();
                            }



                        '
                        ])
                        ->label(false);
                ?>
            </div>


            <div class="col-sm-3 " style="padding-left:50px;">
                <?=
                        $form->field($modelUnit, 'no_unit')
                        ->dropDownList(
                                [], ['prompt' => 'Pilih Unit..',
                            'id' => 'unitdropdown',
                            'disabled' => 'disabled',
                            'onchange' => '

                            console.log($(this).val());
                            if($(this).val() != ""){
                                    if($(this).val() == 9999){
                                            $("#submitButton").prop("disabled", true);
                                            $("#inputText").show();

                                    }else{
                                            $("#submitButton").prop("disabled", false);
                                            $("#inputText").val("").change();
                                            $("#inputText").hide();
                                    }


                            }else{
                                            $("#inputText").hide();
                                            $("#inputText").val("").change();
                                            $("#submitButton").prop("disabled", true);

                            };'
                        ])
                        ->label(false);
                ?>

            </div>
            <div>
                <?=
                $form->field($modelUnit, 'created_at')->widget(\kartik\datecontrol\DateControl::classname(), [
                    'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                    'saveFormat' => 'php:Y-m-d',
                    
                    'ajaxConversion' => true,
                    'options' => [
                        'format' => 'mm/yyyy',
                        'pluginOptions' => [
                            'placeholder' => 'Bulan dan Tahun',
                            'autoclose' => true,
                            
                        ]
                    ],
                ]);
                ?>
            </div>



        </div>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Input', ['class' => 'btn btn-primary', 'id' => 'submitButton', "disabled" => "disabled"]) ?>
            </div>
        </div>
<?php $form = ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>
    </div>





</div>

