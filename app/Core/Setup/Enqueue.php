<?php
/**
 * Setup and register CSS and JS file here
 */

declare(strict_types=1);

namespace App\Core\Setup;

/**
 * Class Enqueue
 * @package App\Core\Setup
 * add your js and css file to application
 */
class Enqueue implements \App\Core\ServiceInterface
{
    /**
     * @var string
     * path to css file
     */
    protected $css_path;
    /**
     * @var string
     * path to javascript file
     */
    protected $js_path;

    /**
     * Enqueue constructor.
     */
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

    /**
     * enqueue script file
     */
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
