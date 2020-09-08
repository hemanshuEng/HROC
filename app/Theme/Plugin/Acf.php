<?php
/**
 * ACF PRO
 *
 * @link https://github.com/elliotcondon/acf
 *
 *
 */

namespace App\Theme\Plugin;

use App\Core\ServiceInterface;

class Acf implements ServiceInterface
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_filter('acf/settings/save_json', array( &$this, 'acfJsonSavePoint' ));
        add_filter('acf/settings/load_json', array( &$this, 'acfJsonLoadPoint' ));
    }

    public function acfJsonSavePoint($path)
    {
        // update path
        $path = get_stylesheet_directory() . '/acf-json';

        // return
        return $path;
    }

    public function acfJsonLoadPoint($paths)
    {
        // remove original path (optional)
        unset($paths[0]);

        // append path
        $paths[] = get_stylesheet_directory() . '/acf-json';

        // return
        return $paths;
    }
}
