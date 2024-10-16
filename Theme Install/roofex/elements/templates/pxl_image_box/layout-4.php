<?php if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
    }
    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
    }
} ?>
<div class="pxl-image-box pxl-image-box4 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if ( !empty($settings['image']['id']) ) : ?>
            <div class="pxl-item-image">
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
        <div class="pxl-item--holder">
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
            <div class="pxl-item--subtitle el-empty"><?php echo pxl_print_html($settings['sub_title']); ?></div>
            
            <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
            <?php if(!empty($settings['btn_text'])) : ?>
                <div class="pxl-item--button">
                    <a class="btn-text-slide" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>>
                        <span><?php echo esc_attr($settings['btn_text']); ?></span>
                    </a></div>
            <?php endif; ?>
        </div>
    </div>
</div>