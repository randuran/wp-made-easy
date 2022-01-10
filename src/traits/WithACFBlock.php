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
    }
}