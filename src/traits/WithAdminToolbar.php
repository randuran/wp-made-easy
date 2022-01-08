<?php

namespace Randyduran\Traits;

trait WithAdminToolbar
{
    /**
     * @var array
     */
    public $toolbar = [];

    public function bootWithAdminToolbar()
    {
        add_action('wp_before_admin_bar_render', [$this, 'addCustomAdminToolBar']);
    }

    function addCustomAdminToolBar()
    {
        global $wp_admin_bar;

        foreach ($this->toolbar as $toolbar) {
            $args = [
                'id' => $toolbar['id'],
                'title' => $toolbar['title'],
                'href' => $toolbar['link'],
                'meta' => [
                    'class' => $toolbar['class'],
                ],
            ];
            $wp_admin_bar->add_menu($args);

            if (isset($toolbar['children'])) {
                foreach ($toolbar['children'] as $key =>  $children) {
                    ${'args_submenu_' . $key} = [
                        'id' => $children['id'],
                        'title' => $children['title'],
                        'parent' => $toolbar['id'], // add parent id in which you want to add sub menu
                        'href' => $children['link'],
                        'meta' => [
                            'class' => $children['class'],
                        ],
                    ];
                    $wp_admin_bar->add_menu(${'args_submenu_' . $key});
                }
            }
        }
    }
}