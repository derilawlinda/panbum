<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<style>
 .loading {
  position: fixed;
  z-index: 999;
  height: 100%;
  width: 100%;
  overflow: show;
  margin: auto;
  background: rgba(255, 255, 255, 0.7);
  border-radius: 3px;
  background-image:url('image/ajax-loader.gif');
  background-repeat:no-repeat;
  background-position:center;
  z-index:10000000;
}


</style>
<div class="content-wrapper" style="overflow-y: auto;height:388px;overflow-x: hidden">
    <div class="loading" style="display:none"> 
       
    </div>
    <section class="content-header">
        

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>
    
    <section class="content">
        <?= Alert::widget() ?>
        
        <?= $content ?>
    </section>
</div>




<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>