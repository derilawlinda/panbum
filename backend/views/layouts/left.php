<?php
use mdm\admin\components\Helper;

$menuItems = [
	
    ['label' => 'Input Data', 'icon' => 'fa fa-pencil-square-o', 'url' => ['/unit/index']],
	['label' => 'Verifikasi Data', 'icon' => 'fa fa-check-square-o', 'url' => ['/unit/verifikasi']],
	['label' => 'Pantau WKP', 'icon' => 'fa fa-eye', 'url' => ['/unit/pantau']],
        ['label' => 'Pengaturan Data','icon' => 'fa fa-plus', 'url' => ['#'],'items' => [
            ['label' => 'Pengembang', 'icon' => 'fa fa-plus', 'url' => ['/pengembang/index']],
            ['label' => 'Penugasan PLTP', 'icon' => 'fa fa-list', 'url' => ['/user/assign']],
            ['label' => 'WKP', 'icon' => 'fa fa-plus', 'url' => ['/wkp/index']],
            ['label' => 'PLTP', 'icon' => 'fa fa-plus', 'url' => ['/pltp/index']],
            ['label' => 'Unit', 'icon' => 'fa fa-plus', 'url' => ['/unit/admin-create-unit']]
            
        ]],
	['label' => 'Pengaturan Pengguna','icon' => 'fa fa-cog', 'url' => ['#'],'items' => [
                ['label' => 'User Management', 'icon' => 'fa fa-user', 'url' => ['/user/admin']],
                ['label' => 'Assignment', 'icon' => 'fa fa-list','url' => ['/assignment/index']],
                ['label' => 'Role', 'icon' => 'fa fa-group','url' => ['/role/index']],
                ['label' => 'Permission', 'icon' => 'fa fa-check','url' => ['/permission/index']],
		['label' => 'Route', 'icon' => 'fa fa-random','url' => ['/route/index']],
		['label' => 'Rule', 'icon' => 'fa fa-code','url' => ['/rule/index']]
		
    ]]
];

$menuItemsFiltered = Helper::filter($menuItems);



?>


<aside class="main-sidebar">

    <section class="sidebar">

       
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
                'items' => $menuItemsFiltered,
            ]
        ) ?>

    </section>

</aside>
