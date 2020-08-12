<?php

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) :
    require_once dirname(__FILE__) . '/vendor/autoload.php';
endif;

if (class_exists('App\\Theme\\Services')) :
    App\Theme\Services::instance()->registerServices();
endif;
