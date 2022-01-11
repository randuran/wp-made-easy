<?php

namespace WPME\Traits;

use WPME\App\PluginPath;

trait Template
{
    public $page_templates = [];
    public $file_templates = [];
    public $single_template = [];

    private $plugin;

    public function bootTemplate()
    {
        $this->plugin = new PluginPath;

        if (count($this->page_templates)) {
            add_filter('theme_templates', [$this, 'mergeCustomTemplates']);
        }
        if (count($this->file_templates)) {
            add_filter('template_include', [$this, 'registerArchiveTemplates']);
        }
        if (count($this->single_template)) {
            add_filter('single_template', [$this, 'override_single_template']);
        }
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
     * Override single templates
     */
    public function override_single_template($single_template)
    {
        foreach ($this->single_template as $template) {
            $file = $this->plugin->plugin_path . $template;
            if (file_exists($file)) $single_template = $file;
        }

        return $single_template;
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