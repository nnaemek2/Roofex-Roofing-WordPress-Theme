<?php if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
    }
    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
    }
} ?>
<div class="pxl-image-box pxl-image-box5  <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <a class="link" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>></a>
    <div class="pxl-item--inner">
        <div class="wrap-content">
            <?php if ( !empty($settings['image']['id']) ) : ?>
                <div class="pxl-item--image">
                    <a <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>>
                        <?php 
                        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '';
                        $img  = pxl_get_image_by_size( array(
                            'attach_id'  => $settings['image']['id'],
                            'thumb_size' => $image_size,
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        echo pxl_print_html($thumbnail); ?>
                    </a>
                </div>
            <?php endif; ?>
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><a <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>><?php echo pxl_print_html($settings['title']); ?></a></<?php echo esc_attr($settings['title_tag']); ?>>
            <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
            
        </div>
        <?php if(!empty($settings['btn_link'])) : ?>
            <div class="pxl-item--button"><a class="btn-more" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>><i class="flaticon-right-arrow-1"></i></a></div>
        <?php endif; ?>
    </div>
</div>