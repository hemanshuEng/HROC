<?php
/**
 * Setup and register CSS and JS file here
 */

declare(strict_types=1);

namespace App\Core\Setup;

class Enqueue implements \App\Core\ServiceInterface
{
    protected $css_path;
    protected $js_path;
    public function __construct()
    {
        $this->css_path = "";
        $this->js_path  = "";
    }

    /**
     * @inheritDoc
     */
    public function register()
    {
        add_action('wp_enqueue_scripts', [$this,'enqueueScripts']);
    }

    public function enqueueScripts()
    {
        //CSS
        wp_enqueue_style(
            'main',
            get_template_directory_uri() . $this->css_path,
            [],
            uniqid(),
            'all'
        );
        // JS
        wp_enqueue_script(
            'main',
            get_template_directory_uri() . $this->js_path,
            [],
            uniqid(),
            true
        );
    }
}
