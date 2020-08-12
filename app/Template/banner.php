<?php
$category = get_field_object('Banner_Category');
if ($category) {
    $args = [
        'post_type' => ['banner_image'],
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy' => $category['value']->taxonomy,
                'terms' => [$category['value']->slug],
                'field' => 'slug'
            ]
        ],
    ];
} else {
    $args = [
        'post_type' => ['banner_image']
    ];
}
$banner_img_query = new WP_Query($args);
$active_class = 'carousel-item active';
?>
<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        while ($banner_img_query->have_posts()) {
            $banner_img_query->the_post();
            ?>
            <div class= "<?php echo $active_class ?>" data-interval="5000">
                <?php
                $active_class = 'carousel-item';
                if (has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail('post-thumbnail', array('class' => "banner_img")); ?>
                <?php } ?>
                <div class="carousel-caption d-none d-md-block">
                    <h4><?php esc_html(the_title())?></h4>
                    <?php esc_html(the_content())?>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
