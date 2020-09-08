<?php
declare(strict_types=1);

namespace App\Theme;

/**
 * Class PluginRequire
 * @package App\Theme
 * ADD require plugin information and if plugin is not active it will show error message
 */
class PluginRequire implements \App\Core\ServiceInterface
{

    /**
     * @inheritDoc
     */
    public function register()
    {
        add_action('admin_init', [$this,'acfPlugin']);
    }

    /**
     * Check acf plugin activation
     */
    public function acfPlugin()
    {
        if (! class_exists('acf')) {
            add_action('admin_notices', [$this,'errorNotice']);
        }
    }

    /**
     * Notification Error Message
     */
    public function errorNotice()
    {
        $class = 'notice notice-error';
        $message = __(
            'Install and Active Advanced Custom Fields Plugin, Theme require acf to function',
            'sample-text-domain'
        );

        printf('<div class="%1$s"><h2>%2$s</h2></div>', esc_attr($class), esc_html($message));
    }
}
