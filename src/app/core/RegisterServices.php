<?php

namespace Randyduran\App\Core;

class RegisterServices
{

    /**
     * Loop through the classes, initialize them
     * and call the boot() method if it exist
     * 
     * @return void
     */
    public static function register_services()
    {
        foreach ($this->services as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'boot')) {
                $service->boot();
            }
        }
    }

    /**
     * Initialize the class
     * @param class class from the services array
     * @return class new instance of the class
     * 
     */
    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}