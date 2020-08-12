<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 *
 * @package hroc
 */

declare(strict_types=1);

namespace App\Core;

use App\Core\ServiceInterface;

class Init
{
    protected array $service;
    public function __construct()
    {
        $this->service = [];
    }

    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public function getServices() :array
    {
        return $this->service;
    }

    /**
     * Loop through the classes, initialize them, and call the register() method if it exists
     *
     */
    public function registerServices()
    {
        foreach ($this->getServices() as $class) {
            $service = $this->instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * @param ServiceInterface $class
     * @return ServiceInterface
     */
    private function instantiate(ServiceInterface $class)
    {
        return $class;
    }
}
