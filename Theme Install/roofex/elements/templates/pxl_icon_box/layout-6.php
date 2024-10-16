<div class="pxl-icon-box pxl-icon-box6 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
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
            <div class="bg-image"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/bg-iconbox.png'); ?>" alt="<?php echo esc_attr__('bg-icon', 'roofex'); ?>" /></div>
            <div class="pxl-item--meta">
                <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
                <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
            </div>
            <?php if ( ! empty( $settings['btn_text'] ) ) {
                $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

                if ( $settings['btn_link']['is_external'] ) {
                    $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
                }

                if ( $settings['btn_link']['nofollow'] ) {
                    $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
                } ?>
                <div class="pxl-item--link"><a <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>><i class="caseicon-double-chevron-right"></i></a></div>
            <?php } ?>
        </div>
    </div>
</div>