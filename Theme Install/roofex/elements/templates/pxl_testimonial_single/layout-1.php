<div class="pxl-testimonial-single pxl-testimonial-single1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
        <div class="pxl-item--holder">
            <?php if ( !empty($settings['image']['id']) ) : ?>
                <div class="pxl-item--image">
                    <a <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>>
                        <?php 
                            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '200x200';
                            $img  = pxl_get_image_by_size( array(
                                'attach_id'  => $settings['image']['id'],
                                'thumb_size' => $image_size,
                            ) );
                            $thumbnail    = $img['thumbnail'];
                        echo pxl_print_html($thumbnail); ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="pxl-item-meta">
                <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></h4>
                <div class="pxl-item--position el-empty"><?php echo pxl_print_html($settings['position']); ?></div>
            </div>
        </div>
    </div>
</div>