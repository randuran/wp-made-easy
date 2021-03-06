<?php

namespace WPME\App;

class PluginPath
{
    public $plugin_path;
    public $plugin_url;

    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 5));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 5));
    }
}