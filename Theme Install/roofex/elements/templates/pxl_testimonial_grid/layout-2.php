<?php
$gradient_color = roofex()->get_opt( 'gradient_color' );
$html_id = pxl_get_element_id($settings);

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
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
<div class="pxl-grid pxl-testimonial-grid pxl-testimonial-grid2 ">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <?php foreach ($settings['testimonial'] as $key => $value):
            $title = isset($value['title']) ? $value['title'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $image_quote = isset($value['image_quote']) ? $value['image_quote'] : '';
            $logo = isset($value['logo']) ? $value['logo'] : '';
            $star = isset($value['star']) ? $value['star'] : '';
            ?>
            <div class="<?php echo esc_attr($item_class); ?>">
                 <?php if(!empty($image_quote['id'])) { 
                        $img2 = pxl_get_image_by_size( array(
                            'attach_id'  => $image_quote['id'],
                            'thumb_size' => '282x324',
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail2 = $img2['thumbnail'];
                        ?>
                        <div class="quote">
                            <?php echo wp_kses_post($thumbnail2); ?>
                        </div>
                    <?php } ?>
                <div class="wrap-inner-content">
                    <div class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></div>
                    <div class="wrap-content-bottom">
                        <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">

                            <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => '300x300',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];
                                ?>
                                <div class="pxl-item--image">
                                    <div class="pxl-item--image-inner">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="pxl-item--holder">

                                <div class="pxl-item--title">
                                    <?php echo pxl_print_html($title); ?>
                                </div>
                                <div class="pxl-item--position">
                                    <?php echo pxl_print_html($position); ?>
                                </div>
                            </div>
                        </div>
                        <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div> 
    </div>
</div>
<?php endif; ?>
