<?php

namespace Randyduran\Traits;

trait WithPage
{
    public $pages = [];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function registerPages()
    {
        if (count($this->pages)) {
            add_action('admin_menu', [$this, 'register_menu_pages']);
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function register_menu_pages()
    {
        foreach ($this->pages as $page) {
            add_menu_page(
                $page['title'],
                $page['menu_title'],
                $page['capability'],
                $page['slug'],
                $page['callback'],
                $page['icon'],
                $page['position']
            );

            if (isset($page['children'])) {
                add_submenu_page(
                    $page['slug'],
                    $page['children']['title'],
                    $page['children']['menu_title'],
                    $page['children']['capability'],
                    $page['children']['slug'],
                    $page['children']['callback'],
                    $page['children']['position'],
                );
            }
        }
    }
}