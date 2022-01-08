<?php

namespace Randyduran\Traits;

trait WithAdminWidget
{
    public $widgets = [];

    public function bootWithAdminWidget()
    {
        add_action('wp_dashboard_setup', [$this, 'registerCustomDashboardWidgets']);
    }

    /**
     * loops through  the array and registers the widgets
     * 
     * widget_id, widget_name, callback,
     *
     * @return void
     */
    function registerCustomDashboardWidgets()
    {
        global $wp_meta_boxes;

        foreach ($this->widgets as $widget) {
            wp_add_dashboard_widget($widget['slug'], $widget['name'], $widget['callback']);
        }
    }
}