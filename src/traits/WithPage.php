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
        add_action('admin_menu', [$this, 'register_menu_pages']);
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
                $page['title'], // page <title>Title</title>
                $page['menu_title'], // menu link text
                $page['capability'], // capability to access the page
                $page['slug'], // page URL slug
                $page['callback'], // callback function /w content
                $page['icon'], // menu icon
                $page['position'] // priority
            );
        }
    }
}