<div class="pxl-history">
  <?php
  if(isset($settings['history']) && !empty($settings['history']) && count($settings['history'])): ?>
    <div class="tetx-start">
        <?php echo pxl_print_html($settings['text_start']); ?>
    </div>
    <ul class=" pxl-history-l1 <?php echo esc_attr($settings['style_list']) ?> <?php echo esc_attr($settings['pxl_animate'].' '.$settings['hover_style'].' '.$settings['history_custom_font_family']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php
        foreach ($settings['history'] as $key => $history): ?>
            <li class="<?php echo implode(' ', $item_cls) ?>">
                <div class="wrap-content">
                    <div class="title"><?php echo pxl_print_html($history['text']); ?></div>
                    <div class="desc"><?php echo pxl_print_html($history['decs']); ?></div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="img-h">
        <?php 
        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '';
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image']['id'],
            'thumb_size' => $image_size,
        ) );
        $thumbnail    = $img['thumbnail'];
        echo pxl_print_html($thumbnail); ?>
    </div>
<?php endif; ?>

</div>
