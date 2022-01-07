<?php

namespace Randyduran\App;

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
         * Boot WithOptionPage if trait is found in the class.
         */
        if (method_exists($service, 'bootWithOptionPage')) {
            $service->bootWithOptionPage();
        }

        /**
         * Boot WithPostType if trait is found in the class.
         */
        if (method_exists($service, 'bootWithPostType')) {
            $service->bootWithPostType();
        }

        /**
         * Boot WithTaxonomy if trait is found in the class.
         */
        if (method_exists($service, 'bootWithTaxonomy')) {
            $service->bootWithTaxonomy();
        }

        /**
         * Boot WithShortcode if trait is found in the class.
         */
        if (method_exists($service, 'bootWithShortcode')) {
            $service->bootWithShortcode();
        }

        /**
         * Boot WithBlock if trait is found in the class.
         */
        if (method_exists($service, 'bootWithBlock')) {
            $service->bootWithBlock();
        }

        /**
         * Boot WithTemplates if trait is found in the class.
         */
        if (method_exists($service, 'bootWithTemplates')) {
            $service->bootWithTemplates();
        }
    }
}