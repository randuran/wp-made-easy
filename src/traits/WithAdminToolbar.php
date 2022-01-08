<?php

namespace Randyduran\Traits;

trait WithAdminToolbar
{

    public function bootWithAdminToolbar()
    {
        add_action('wp_before_admin_bar_render', [$this, 'addCustomAdminToolBar']);
    }

    function addCustomAdminToolBar()
    {
        global $wp_admin_bar;

        $args = [
            'id' => 'custom_admin_bar_menu_id', // id must be unique
            'title' => 'Custom Menu', // title for display in admin bar
            'href' => 'http://add-your-link-here.com', // link for the achor tag

            // meta for link e.g: class, target, and custom data attributes etc
            'meta' => [
                'class' => 'custom_class', // your custom class
            ],
        ];
        $wp_admin_bar->add_menu($args);

        $args_submenu_1 = [
            'id' => 'cusotm-sub-menu-1',
            'title' => 'Sub menu-1',
            'parent' => 'custom_admin_bar_menu_id', // add parent id in which you want to add sub menu
            'href' => 'http://add-your-link-here.com',
            'meta' => [
                'class' => 'custom_sub_menu_class',
            ],
        ];
        $wp_admin_bar->add_menu($args_submenu_1);

        $args_submenu_2 = [
            'id' => 'cusotm-sub-menu-2',
            'title' => 'Sub menu-2',
            'parent' => 'custom_admin_bar_menu_id', // add parent id in which you want to add sub menu
            'href' => 'http://add-your-link-here.com',
            'meta' => [
                'class' => 'custom_sub_menu_class',
            ],
        ];
        $wp_admin_bar->add_menu($args_submenu_2);
    }
}