<?php

namespace App\Theme;

use App\Core\Init;
use App\Theme\CustomPostType\BannerImage;

class Services extends Init
{
    public function __construct()
    {
        parent::__construct();
        $this->service = [
          new ThemeEnqueue(),
          new BannerImage(),
        ];
    }
    public static function instance()
    {
        return new self;
    }
}
