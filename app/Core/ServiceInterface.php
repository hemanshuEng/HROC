<?php
/**
 * Interface for initialise service in function
 */

namespace App\Core;

interface ServiceInterface
{
    /**
     * register default action,hook and filter
     */
    public function register();
}
