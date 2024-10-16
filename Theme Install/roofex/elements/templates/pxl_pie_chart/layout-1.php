<?php
$primary_color = roofex()->get_opt( 'primary_color' );
$default_settings = [
    'title' => '',
    'description' => '',
    'description' => '',
    'percentage_value' => '',
    'bar_color' => '',
    'track_color' => '',
    'chart_size' => '',
    'chart_border_width' => '',
    'image' => '',
    'pxl_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); ?>
<div class="pxl-piechart-layout1">
  <div class="pxl-piechart <?php echo esc_attr($pxl_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="item--value percentage" style="min-height: <?php echo esc_attr($chart_size['size']); ?>px;" data-size="<?php echo esc_attr($chart_size['size']); ?>" data-bar-color="<?php if(!empty($bar_color)) { echo esc_attr($bar_color); } else { echo esc_attr($primary_color); } ?>" data-track-color="<?php if(!empty($track_color)) { echo esc_attr($track_color); } else { echo '#edf2ff'; } ?>" data-line-width="<?php echo esc_attr($chart_border_width['size']); ?>" data-percent="-<?php echo esc_attr($percentage_value); ?>">
    </div>
    <div class="wrap-content">
        <div class="number"><?php echo esc_attr($percentage_value); ?><?php echo esc_attr($sufix); ?></div>
        <div class="item--title"> <?php echo pxl_print_html($title); ?></div>
    </div>
</div>  
</div>



