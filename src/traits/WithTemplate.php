<?php

namespace WPME\Traits;

use WPME\App\PluginPath;

trait WithTemplate
{
    public $page_templates = [];
    public $file_templates = [];

    private $plugin;

    public function bootWithTemplate()
    {
        $this->plugin = new PluginPath;

        add_filter('theme_templates', [$this, 'mergeCustomTemplates']);
        add_filter('template_include', [$this, 'registerArchiveTemplates']);
    }

    /**
     * Register archive templates
     * 
     * @return mixed
     */
    public function registerArchiveTemplates($templates)
    {

        foreach ($this->file_templates as $template) {

            if (isset($template['posttype'])) {
                if (is_post_type_archive($template['posttype'])) {
                    $templates = $this->plugin->plugin_path . $template['file'];
                }
            }
        }

        return $templates;
    }

    /**
     * Merge page templates list
     */
    public function mergeCustomTemplates($templates)
    {
        if (!count($this->page_templates)) return;
        return array_merge($templates, $this->page_templates);
    }
}