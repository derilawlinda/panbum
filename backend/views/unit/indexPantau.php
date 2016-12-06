<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use lo\modules\noty\Wrapper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Pantau WKP";
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .content {
        padding-top: 40px;}
    </style>
<script src="scripts/jquery.js"></script>
    <div class="inputdata-index">

    <?php
    $form = ActiveForm::begin([
                'id' => 'form-pilih-unit',
                'fieldConfig' => [
                    'template' => "{label} {input}"],
                'action' => ['getpantau']]);
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
                        ->label("WKP");
                ?>
            </div>


            <div class="col-sm-3" style="padding-left:15px;">
                <?=
                        $form->field($modelUnit, 'id_pltp')
                        ->dropDownList(
                                [], ['prompt' => 'Pilih PLTP..',
                            'id' => 'pltpdropdown',
                            'disabled' => 'disabled',
                            'onchange' => '
                            if(this.value != ""){
                                $("#unitdropdown").prop("disabled", false);
                                $.get(
                                                "' . Url::toRoute('get-unit-by-pltp') . '", 
                                                {id_pltp: $(this).val()}, 
                                                function(res){

                                                        $("#unitdropdown").html(res);
                                                        
                                                }
                                        );
                        }else{
                                $("#unitdropdown").prop("disabled", true);
                                $("#unitdropdown").val("").change();
                        }
                        '
                        ])
                        ->label("PLTP");
                ?>
            </div>


            <div class="col-sm-3" style="padding-left:15px;">
                <?=
                        $form->field($modelUnit, 'id_unit')
                        ->dropDownList(
                                [], ['prompt' => 'Pilih Unit..',
                            'id' => 'unitdropdown',
                            'disabled' => 'disabled',
                            'onchange' => '
                            console.log($("#tanggal").val());
                            if($(this).val() != "" && $("#tanggal").val() != "") {
                                    $("#submitButton").prop("disabled", false);

                            }else{
                                    $("#submitButton").prop("disabled", true);
                            };'
                        ])
                        ->label("Unit");
                ?>

            </div>
            <div class="col-sm-3">
                <?=
                $form->field($modelUnit, 'created_at')->widget(\kartik\datecontrol\DateControl::classname(), [
                    'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                    'saveFormat' => 'php:Y-m-d',
                    'ajaxConversion' => true,
                    'pluginEvents' => [
                        'change.dp' => 'function(e) {  
                            console.log($(this).val());
                             console.log($("#unitdropdown").val());
                            if($(this).val() != "" && $("#unitdropdown").val() != undefined) {
                                $("#submitButton").prop("disabled", false);

                            }else{
                                 $("#submitButton").prop("disabled", true);
                            }; } ',
                    ],
                    'options' => [
                        'id' => 'tanggal',
                        'pluginOptions' => [
                            'placeholder' => 'Bulan dan Tahun',
                            'autoclose' => true,
                            'minViewMode' => 1
                        ]
                    ],
                ])->label("Bulan dan Tahun");
                ?>
            </div>



        </div>

        <div class="form-group" style="padding-left:15px;height:20px">
            <div class="pull-right" >
<?= Html::submitButton('Pantau', ['class' => 'btn btn-primary', 'id' => 'submitButton', "disabled" => "disabled"]) ?>
            </div>
        </div>
<?php ActiveForm::end(); ?>

    </div>
    <div class="well">
        <div id="pantauCont">
            Pilih Unit dan Tanggal yang akan dipantau.
        </div>
    </div>




</div>

<script type="text/javascript">
    $(document).ready(function () {
        

        $('form#form-pilih-unit').on('beforeSubmit', function (e)
        {

            var form = $(this);
            var formData = new FormData();
            $("#pantauCont").html("Loading..");

            $.each($('form#form-pilih-unit :input:not(:file)'), function (i, elm) {
                formData.append(elm.name, elm.value)
            });

            // return false if form still have some validation errors

            if ($('.error-sumary').attr('style') == 'display:none') {

                return false;
            }
            // submit form

            $.ajax({
                processData: false,
                contentType: false,
                url: form.attr('action'),
                type: 'post',
                data: formData,
                success: function (response)
                {
                    $("#pantauCont").html(response);
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

