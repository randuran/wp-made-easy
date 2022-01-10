<?php

namespace WPME\Traits;

trait WithACFBlock
{
    /**
     * @var array
     */
    protected $acf_blocks = [];

    public function bootWithACFBlock()
    {
        add_action('acf/init', [$this, 'acf_blocks_init']);
    }

    public function acf_blocks_init()
    {
        foreach ($this->acf_blocks as $block) {
            acf_register_block([
                'name'             =>   $block['name'],
                'title'            =>   __($block['title']),
                'description'      =>   __($block['description']),
                'render_callback'  =>   $block['callback'],
                'category'         =>   $block['category'],
                'icon'             =>   $block['icon'],
                'keywords'         =>  $block['keywords'],
            ]);
        }
    }
}