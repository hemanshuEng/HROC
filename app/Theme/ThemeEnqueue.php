<?php


namespace App\Theme;

use App\Core\Setup\Enqueue;

class ThemeEnqueue extends Enqueue
{
    /**
     * ThemeEnqueue constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->css_path = '/public/css/app.css';
    }
}
