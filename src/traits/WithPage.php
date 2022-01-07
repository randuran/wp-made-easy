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
    final public function bootWithPage()
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
    final public function register_menu_pages()
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
                foreach ($page['children'] as $position => $child) {
                    add_submenu_page(
                        $page['slug'],
                        $child['title'],
                        $child['menu_title'],
                        $child['capability'],
                        $child['slug'],
                        $child['callback'],
                        $position + 1
                    );
                }
            }
        }
    }
}