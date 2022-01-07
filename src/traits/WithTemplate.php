<?php

namespace Randyduran\Traits;

use Randyduran\App\PluginPath;

trait WithTemplate
{

    public $templates;
    public $categories;

    public function bootWithTemplates()
    {
        dd("hola");
    }
}