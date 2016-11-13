<?php
use mdm\admin\components\Helper;

$menuItems = [
	
    ['label' => 'Input Data', 'icon' => 'fa fa-pencil-square-o', 'url' => ['/unit/index']],
	['label' => 'Verifikasi Data', 'icon' => 'fa fa-check-square-o', 'url' => ['/unit/verifikasi']],
	['label' => 'Pantau WKP', 'icon' => 'fa fa-eye', 'url' => ['/unit/pantau']],
	['label' => 'Pengaturan','icon' => 'fa fa-user', 'items' => [
		['label' => 'Tambahakan Pengembang', 'icon' => 'fa fa-user', 'url' => ['/pengembang/create']],
        ['label' => 'User Management', 'icon' => 'fa fa-user', 'url' => ['/user/index']],
        ['label' => 'Assignment', 'icon' => 'fa fa-list','url' => ['/assignment/index']],
        ['label' => 'Role', 'icon' => 'fa fa-group','url' => ['/role/index']],
        ['label' => 'Permission', 'icon' => 'fa fa-check','url' => ['/permission/index']],
		['label' => 'Route', 'icon' => 'fa fa-random','url' => ['/route/index']],
		['label' => 'Rule', 'icon' => 'fa fa-code','url' => ['/rule/index']]
		
    ]]
];

$menuItems = Helper::filter($menuItems);



?>


<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username ?></p>

                
            </div>
        </div>

        <!-- search form 
      <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> 
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
