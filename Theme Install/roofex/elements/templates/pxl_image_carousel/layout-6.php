<?php
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
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$speed = $widget->get_setting('speed', '500');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_center'               => 'false',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'creative', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl, 
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,
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
]);
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
<div class="pxl-swiper-sliders pxl-image pxl-image-carousel6">
    <div class="pxl-swiper-thumbs " data-vertial='true'>
        <div class="swiper-wrapper">
            <?php foreach ($settings['team'] as $key => $value_top):
                $image = isset($value_top['image']) ? $value_top['image'] : '';
                ?>
                <div class="swiper-slide">
                    <?php if(!empty($image['id'])) {
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => '99x114',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];?>
                        <?php echo wp_kses_post($thumbnail); ?>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pxl-carousel-inner mySwiper6">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper ">
                <?php foreach ($settings['team'] as $key => $value):
                    $title = isset($value['title']) ? $value['title'] : '';
                    $btn_t = isset($value['btn_t']) ? $value['btn_t'] : '';
                    $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                    $desc = isset($value['desc']) ? $value['desc'] : '';
                    $image = isset($value['image']) ? $value['image'] : '';
                    $img_size = isset($value['img_size']) ? $value['img_size'] : '';
                    $image_size = !empty($img_size) ? $img_size : 'full';
                    
                    $link = isset($value['link']) ? $value['link'] : '';
                    $link_key = $widget->get_repeater_setting_key( 'title2', 'value2', $key );
                    if ( ! empty( $link['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                        if ( $link['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $link['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                        
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
                    ?>
                    <div class="pxl-swiper-slide ">
                        <div class="pxl-item--inner  <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                            <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => 'full',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];
                                ?>
                                <div class="pxl-content " style="background-image:url(<?php echo esc_attr($image['url']);?>);">
                                    <div class="container">
                                        <div class="row">
                                            <div class="wrap-content ">    
                                                <div class="sub-pxl-title">    
                                                    <?php echo pxl_print_html($sub_title); ?>
                                                </div>
                                                <div class="pxl-title">    
                                                    <?php echo pxl_print_html($title); ?>
                                                </div>
                                                <div class="pxl-desc">    
                                                    <?php echo pxl_print_html($desc); ?>
                                                </div>
                                                <div class="wrap-button">
                                                    <div class="btn-link">
                                                        <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                                        <?php if (!empty($btn_t)) {
                                                            echo pxl_print_html($btn_t);
                                                        } else {
                                                            echo pxl_print_html('See All Service','roofex');
                                                        }
                                                    ?>   <i class="flaticon-right-arrow-1"></i>
                                                    <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if($arrows !== 'false'): ?>
        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="fal fa-long-arrow-right rtl-icon"></i></div>
        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="fal fa-long-arrow-left rtl-icon"></i></div>
    <?php endif; ?>
    <?php if($pagination !== 'false'): ?>
        <div class="pxl-swiper-dots"></div>
    <?php endif; ?>
</div>
</div>
<?php endif; ?>
<!-- Swiper JS -->