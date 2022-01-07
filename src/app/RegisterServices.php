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

            self::registerTraits($service);
        }
    }

    /**
     * Initialize the class
     * @param class class from the services array
     * @return class new instance of the class
     * 
     */
    private static function instantiate($class): object
    {
        $service = new $class();
        return $service;
    }

    /**
     * Undocumented function
     *
     * @param [type] $service
     * @return void
     */
    private static function registerTraits($service): void
    {
        if (method_exists($service, 'registerPages')) {
            $service->registerPages();
        }
    }
}