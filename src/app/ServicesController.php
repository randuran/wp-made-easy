<?php

namespace WPME\App;

class ServicesController
{

    /**
     * Loop through the classes, initialize them
     * and call the boot() method if it exist
     * 
     * @return void
     */
    public static function register_services(): void
    {
        foreach (self::services as $class) {
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
    final private static function bootTraits($service): void
    {
        //TODO: Needs refactor

        if (method_exists($service, 'bootAdminPage')) {
            $service->bootAdminPage();
        }

        if (method_exists($service, 'bootPostType')) {
            $service->bootPostType();
        }

        if (method_exists($service, 'bootTaxonomy')) {
            $service->bootTaxonomy();
        }

        if (method_exists($service, 'bootShortcode')) {
            $service->bootShortcode();
        }

        if (method_exists($service, 'bootACFBlock')) {
            $service->bootACFBlock();
        }

        if (method_exists($service, 'bootAdminWidget')) {
            $service->bootAdminWidget();
        }

        if (method_exists($service, 'bootAdminToolbar')) {
            $service->bootAdminToolbar();
        }

        if (method_exists($service, 'bootTemplate')) {
            $service->bootTemplate();
        }
    }
}