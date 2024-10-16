<div class="pxl-icon-box pxl-icon-box7 <?php echo esc_attr($settings['style_l2'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
            <div class="pxl-item--icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            </div>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
            <div class="pxl-item--icon">
                <?php $img_icon  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['icon_image']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_icon    = $img_icon['thumbnail'];
                echo pxl_print_html($thumbnail_icon); ?>
            </div>
        <?php endif; ?>
        <div class="pxl-item--holder">
            <?php 
            $widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );

            if ( $settings['item_link']['is_external'] ) {
                $widget->add_render_attribute( 'item_link', 'target', '_blank' );
            }

            if ( $settings['item_link']['nofollow'] ) {
                $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
            } ?>
            
            
            <div class="pxl-item--title el-empty">
                <?php echo pxl_print_html($settings['desc']); ?>
            </div>
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--description el-empty"><a <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>>
                <?php echo pxl_print_html($settings['title']); ?>
            </a> </<?php echo esc_attr($settings['title_tag']); ?>>
        </div>
    </div>
</div>