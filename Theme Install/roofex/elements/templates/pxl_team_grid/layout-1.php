<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
<div class="pxl-grid pxl-team-grid pxl-team-grid1">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <?php foreach ($settings['team'] as $key => $value):
            $title = isset($value['title']) ? $value['title'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $img_size = isset($value['img_size']) ? $value['img_size'] : '';
            $image_size = !empty($img_size) ? $img_size : '320x316';
            $social = isset($value['social']) ? $value['social'] : '';  
            $link = isset($value['link']) ? $value['link'] : '';
            $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
            $item_cls = [ 'elementor-repeater-item-'.$value['_id'] ]; 
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
            <div class="<?php echo implode(' ', $item_cls) ?> <?php echo esc_attr($item_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                    <?php if(!empty($image['id'])) { 
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => $image_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <div class="wrap-item-image">
                            <div class="pxl-item--image">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                            <div class="pxl-item--social">
                                <?php if(!empty($social)):
                                    $team_social = json_decode($social, true); ?>
                                    <?php foreach ($team_social as $value): ?>
                                        <a href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                    <?php endforeach;
                                    ?>
                                    <span class="item--social-btn"><i class="fas fa-share-alt"></i></span>
                                    <?php
                                endif; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="pxl-item--meta">
                        <h3 class="pxl-item--title">    
                            <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                            <?php echo pxl_print_html($title); ?>
                            <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                        </h3>
                        <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
    </div>
</div>
<?php endif; ?>
