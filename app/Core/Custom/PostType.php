<?php

namespace App\Core\Custom;

class PostType implements \App\Core\ServiceInterface
{
    protected array $custom_post;

    public function __construct()
    {
        $this->custom_post = [
                'slug'                  => "custom_post",
                'plural'                => "Custom Posts",
                'singular'              => "Custom Post",
                'description'           => "Test Custom Post",
                'supports'              =>  ['title','editor','thumbnail'],
                'taxonomies'            =>  ['category'],
                'hierarchical'          => false,
                'public'                => true,
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

    /**
     * @inheritDoc
     */
    public function register()
    {
        add_action('init', [ $this, 'customPostType'], 10, 1);
        add_theme_support('post-thumbnails');
    }

    // Register Custom Post Type
    public function customPostType()
    {

        $labels = [
            'name'                  => _x($this->custom_post['plural'], 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x($this->custom_post['singular'], 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __($this->custom_post['plural'], 'text_domain'),
            'name_admin_bar'        => __($this->custom_post['singular'], 'text_domain'),
            'archives'              => __('Item Archives', 'text_domain'),
            'attributes'            => __('Item Attributes', 'text_domain'),
            'parent_item_colon'     => __('Parent Item:', 'text_domain'),
            'all_items'             => __('All ' . $this->custom_post['plural'], 'text_domain'),
            'add_new_item'          => __('Add ' . $this->custom_post['singular'], 'text_domain'),
            'add_new'               => __('Add ' . $this->custom_post['singular'], 'text_domain'),
            'new_item'              => __('New ' . $this->custom_post['singular'], 'text_domain'),
            'edit_item'             => __('Edit ' . $this->custom_post['singular'], 'text_domain'),
            'update_item'           => __('Update ' . $this->custom_post['singular'], 'text_domain'),
            'view_item'             => __('View ' . $this->custom_post['singular'], 'text_domain'),
            'view_items'            => __('View ' . $this->custom_post['plural'], 'text_domain'),
            'search_items'          => __('Search ' . $this->custom_post['plural'], 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured ' . $this->custom_post['singular'], 'text_domain'),
            'set_featured_image'    => __('Set featured ' . $this->custom_post['singular'], 'text_domain'),
            'remove_featured_image' => __('Remove featured ' . $this->custom_post['singular'], 'text_domain'),
            'use_featured_image'    => __('Use as featured ' . $this->custom_post['singular'], 'text_domain'),
            'insert_into_item'      => __('Insert into ' . $this->custom_post['singular'], 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this ' . $this->custom_post['singular'], 'text_domain'),
            'items_list'            => __($this->custom_post['plural'] .' list', 'text_domain'),
            'items_list_navigation' => __($this->custom_post['plural'] . 'list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter ' . $this->custom_post['plural'] . ' list', 'text_domain'),
        ];
        $args = [
            'label'                 => __($this->custom_post['singular'], 'text_domain'),
            'description'           => __($this->custom_post['description'], 'text_domain'),
            'labels'                => $labels,
            'supports'              =>  $this->custom_post['supports'],//['title','editor','thumbnail'],
            'taxonomies'            =>  $this->custom_post['taxonomies'],//array( 'category' ),
            'hierarchical'          => $this->custom_post['hierarchical'],//false,
            'public'                => $this->custom_post['public'],//false,
            'show_ui'               => $this->custom_post['show_ui'],//true,
            'show_in_menu'          => $this->custom_post['show_in_menu'],//true,
            'menu_position'         => $this->custom_post['menu_position'],//5,
            'show_in_admin_bar'     => $this->custom_post['show_in_admin_bar'],//true,
            'show_in_nav_menus'     => $this->custom_post['show_in_nav_menus'],//true,
            'can_export'            => $this->custom_post['can_export'],//true,
            'has_archive'           => $this->custom_post['has_archive'],//true,
            'exclude_from_search'   => $this->custom_post['exclude_from_search'],//false,
            'publicly_queryable'    => $this->custom_post['publicly_queryable'],//true,
            'capability_type'       => $this->custom_post['capability_type'],//'page',
        ];
        register_post_type($this->custom_post['slug'], $args);
    }

}
