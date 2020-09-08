<?php
declare(strict_types=1);

namespace App\Theme;

use App\Core\Init;
use App\Theme\CustomPostType\BannerImage;
use App\Theme\Plugin\Acf;

/**
 * Class Services
 * @package App\Theme
 * register all service need to be included
 */
class Services extends Init
{
    public function __construct()
    {
        parent::__construct();
        $this->service = [
          new ThemeEnqueue(),
          new BannerImage(),
          new PluginRequire(),
          new Acf(),
        ];
    }
    public static function instance()
    {
        return new self;
    }
}
