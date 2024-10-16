<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows','false');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');
$show_excerpt = $widget->get_setting('show_excerpt');
$show_category = $widget->get_setting('show_category');
$show_button = $widget->get_setting('show_button');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_percolumnfill'           => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,  
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-service-carousel8 <?php echo esc_attr($settings['style']); ?> pxl-swiper-nogap <?php if($arrows == true) { echo 'pxl-arrows-active'; } ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    foreach ($posts as $post):
                        $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                    $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                    $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                        $image_size = !empty($img_size) ? $img_size : '596x738';
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size
                        ) );
                        $thumbnail    = $img['thumbnail']; 
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="pxl-swiper-slide">
                             <?php if(!empty($service_icon_font)) : ?>
                                <div class="item--roof"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/mn.png'); ?>" alt="roof"></div>
                                <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                            <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon_font); ?>"></i></div>
                                        <?php endif; ?>
                                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                            $icon_img = pxl_get_image_by_size( array(
                                                'attach_id'  => $service_icon_img['id'],
                                                'thumb_size' => 'full',
                                            ));
                                            $icon_thumbnail = $icon_img['thumbnail'];
                                            ?>
                                            <div class="item--icon icon-psb">
                                                <?php echo wp_kses_post($icon_thumbnail); ?>
                                            </div>
                                        <?php endif; ?>
                            <?php endif; ?>
                            <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                                <div class="pxl-item--image">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                </div>
                                <div class="pxl-item--holder">
                                    <div class="pxl-item--category">
                                        <?php the_terms( $post->ID, 'service-category', '', ' ' ); ?>
                                    </div>
                                    <h3 class="pxl-item--title">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                           <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                                       </a>
                                   </h3>
                                   <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                                    <div class="pxl-item--content">
                                        <div class="content-excerpt">
                                            <?php echo pxl_print_html($service_excerpt) ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_button == 'true' && !empty($show_button)): ?>
                                    <div class="pxl-readmore">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><span>Read More</span> <i class="fas fa-play"></i></a>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div> 
    </div>
    <?php if($arrows !== 'false'): ?>
        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="fas fa-chevron-right"></i></div>
        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="fas fa-chevron-left"></i></div>
    <?php endif; ?>
    <?php if($pagination !== 'false'): ?>
        <div class="pxl-swiper-dots"></div>
    <?php endif; ?>
</div>
</div>
<?php endif; ?>