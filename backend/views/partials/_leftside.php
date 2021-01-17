<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->


        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Dashboard', 'icon' => 'fa fa-dashboard',
                        'url' => ['/dashboard'], 'active' => $this->context->route == 'dashboard/index'
                    ],
                    [
                        'label' => 'Customers',
                        'icon' => 'fa fa-users',
                        'url' => ['/customer'],
                        'active' =>
                        $this->context->route == 'customer/index' ||
                            $this->context->route == 'customer/create' ||
                            $this->context->route == 'customer/update' ||
                            $this->context->route == 'customer/view'
                    ],
                    [
                        'label' => 'Meals',
                        'icon' => 'fa fa-cutlery',
                        'url' => ['/meal'],
                        'active' =>
                        $this->context->route == 'meal/index' ||
                            $this->context->route == 'meal/create' ||
                            $this->context->route == 'meal/update' ||
                            $this->context->route == 'meal/view'
                    ],

                    [
                        'label' => 'Orders',
                        'icon' => 'fa fa-outdent',
                        'url' => ['/order'],
                        'active' =>
                        $this->context->route == 'order/index' ||
                            $this->context->route == 'order/create' ||
                            $this->context->route == 'order/update' ||
                            $this->context->route == 'order/view'
                    ],
                    [
                        'label' => 'Master',
                        'icon' => 'fa fa-database',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Breads',

                                'url' => ['/bread'],
                                'active' =>
                                $this->context->route == 'bread/index' ||
                                    $this->context->route == 'bread/create' ||
                                    $this->context->route == 'bread/update' ||
                                    $this->context->route == 'bread/view'
                            ],
                            [
                                'label' => 'Vegetables',

                                'url' => ['/vegetable'],
                                'active' =>
                                $this->context->route == 'vegetable/index' ||
                                    $this->context->route == 'vegetable/create' ||
                                    $this->context->route == 'vegetable/update' ||
                                    $this->context->route == 'vegetable/view'
                            ],
                            [
                                'label' => 'Sandwich Taste',

                                'url' => ['/taste'],
                                'active' =>
                                $this->context->route == 'taste/index' ||
                                    $this->context->route == 'taste/create' ||
                                    $this->context->route == 'taste/update' ||
                                    $this->context->route == 'taste/view'
                            ],
                            [
                                'label' => 'Sauces',

                                'url' => ['/sauce'],
                                'active' =>
                                $this->context->route == 'sauce/index' ||
                                    $this->context->route == 'sauce/create' ||
                                    $this->context->route == 'sauce/update' ||
                                    $this->context->route == 'sauce/view'
                            ],
                            [
                                'label' => 'Meal Opening day',

                                'url' => ['/meal-opening-day'],
                                'active' =>
                                $this->context->route == 'meal-opening-day/index' ||
                                    $this->context->route == 'meal-opening-day/create' ||
                                    $this->context->route == 'meal-opening-day/update' ||
                                    $this->context->route == 'meal-opening-day/view'
                            ]
                        ]
                    ]
                    

                ],
            ]
        )
        ?>

    </section>
    <!-- /.sidebar -->
</aside>