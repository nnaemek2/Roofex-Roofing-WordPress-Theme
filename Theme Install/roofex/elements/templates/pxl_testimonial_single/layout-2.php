<div class="pxl-testimonial-single pxl-testimonial-single2 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if(!empty($settings['image']['id'])) { ?>
            <div class="pxl-item--image pxl-img--mask">
                <div class="pxl--mask bg-image" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
                <div class="pxl-item--icon flaticon-quotation-mark"></div>
            </div>
        <?php } ?>
        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
        <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></h4>
        <div class="pxl-item--position"><span><?php echo pxl_print_html($settings['position']); ?></span></div>
    </div>
</div>