<?php

namespace Randyduran\Traits;

trait WithPage
{
    public $pages = [];
    public $subpages = [];

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

        if (count($this->subpages)) {
            add_action('admin_menu', [$this, 'register_menu_subpages']);
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
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function register_menu_subpages()
    {
    }
}