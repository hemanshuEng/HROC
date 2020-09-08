<?php
declare(strict_types=1);

namespace App\Theme;

use App\Core\Setup\Enqueue;

/**
 * Class ThemeEnqueue
 * @package App\Theme
 * Theme CSS and JS path
 */
class ThemeEnqueue extends Enqueue
{
    /**
     * ThemeEnqueue constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->css_path = '/public/css/app.css';
        $this->js_path  = "/public/js/app.js";
    }
}
