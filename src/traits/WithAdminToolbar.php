<?php

namespace WPME\Traits;

trait WithAdminToolbar
{
    /**
     * @var array
     */
    protected $toolbar = [];

    public function bootWithAdminToolbar()
    {
        add_action('wp_before_admin_bar_render', [$this, 'addCustomAdminToolBar']);
    }

    /**
     * Generate toolbar menu items
     *
     * @return void
     */
    function addCustomAdminToolBar()
    {
        global $wp_admin_bar;


        /**
         * Generate the parent element
         */
        foreach ($this->toolbar as $toolbar) {
            $args = [
                'id' => $toolbar['id'],
                'title' => $toolbar['title'],
                'href' => $toolbar['link'],
                'meta' => [
                    'class' => isset($toolbar['class']) ? $toolbar['class'] : '',
                    'onclick' => isset($toolbar['onclick']) ? $toolbar['onclick'] : '',
                    'html' => isset($toolbar['html']) ? $toolbar['html'] : '',
                    'target' => isset($toolbar['target']) ? $toolbar['target'] : '',
                    'link_title' => isset($toolbar['link_title']) ? $toolbar['link_title'] : '',
                ],
            ];
            $wp_admin_bar->add_menu($args);

            /**
             * Generate the children
             */
            if (isset($toolbar['children'])) {
                foreach ($toolbar['children'] as $key =>  $children) {
                    ${'args_submenu_' . $key} = [
                        'id' => $children['id'],
                        'title' => $children['title'],
                        'parent' => $toolbar['id'],
                        'href' => $children['link'],
                        'meta' => [
                            'class' => isset($children['class']) ? $children['class'] : '',
                            'onclick' => isset($children['onclick']) ? $children['onclick'] : '',
                            'html' => isset($children['html']) ? $children['html'] : '',
                            'target' => isset($children['target']) ? $children['target'] : '',
                            'link_title' => isset($children['link_title']) ? $children['link_title'] : '',
                        ],
                    ];
                    $wp_admin_bar->add_menu(${'args_submenu_' . $key});
                }
            }
        }
    }
}