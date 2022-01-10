<?php

namespace WPME\App;

class RegisterServices
{
    /**
     * Loop through the classes, initialize them
     * and call the boot() method if it exist
     * 
     * @return void
     */
    public function register_services(): void
    {
        foreach ($this->services as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'boot')) {
                $service->boot();
            }

            self::bootTraits($service);
        }
    }

    /**
     * Initialize the class
     * 
     * @param class class from the services array
     * @return class new instance of the class
     */
    private static function instantiate($class): object
    {
        $service = new $class();
        return $service;
    }

    /**
     * Initializes traits if they are found in class
     *
     * @param object $service
     * @return void
     */
    private static function bootTraits($service): void
    {
        /**
         * Boot OptionPage if it is in class.
         */
        if (method_exists($service, 'bootOptionPage')) {
            $service->bootOptionPage();
        }

        /**
         * Boot PostType if it is in class.
         */
        if (method_exists($service, 'bootPostType')) {
            $service->bootPostType();
        }

        /**
         * Boot Taxonomy if it is in class.
         */
        if (method_exists($service, 'bootTaxonomy')) {
            $service->bootTaxonomy();
        }

        /**
         * Boot Shortcode if it is in class.
         */
        if (method_exists($service, 'bootShortcode')) {
            $service->bootShortcode();
        }

        /**
         * Boot ACFBlock if it is in class.
         */
        if (method_exists($service, 'bootACFBlock')) {
            $service->bootACFBlock();
        }

        /**
         * Boot AdminWidget if it is in class.
         */
        if (method_exists($service, 'bootAdminWidget')) {
            $service->bootAdminWidget();
        }

        /**
         * Boot AdminToolbar if it is in class.
         */
        if (method_exists($service, 'bootAdminToolbar')) {
            $service->bootAdminToolbar();
        }

        /**
         * Boot Template if it is in class.
         */
        if (method_exists($service, 'bootTemplate')) {
            $service->bootTemplate();
        }
    }
}