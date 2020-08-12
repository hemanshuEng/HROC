<?php

namespace App\Theme\CustomPostType;

class BannerImage extends \App\Core\Custom\PostType
{
    public function __construct()
    {
        parent::__construct();
        $this->custom_post = [
            'slug'                  => "banner_image",
            'plural'                => "Banner Images",
            'singular'              => "Banner Image",
            'description'           => "Display Banner images",
            'supports'              =>  ['title','editor','thumbnail'],
            'taxonomies'            =>  ['category'],
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        ];
    }
    public function register()
    {
        parent::register();
        add_filter(
            'manage_banner_image_posts_columns',
            [$this, 'customColumn'],
            2
        );
    }

    public function customColumn($columns)
    {
        $columns['banner_thumbnail'] = __('Feature Image', 'text_domain');
        return $columns;
    }
}