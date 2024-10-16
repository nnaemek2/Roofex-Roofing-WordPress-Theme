<div class="pxl-bn-box pxl-bn-box2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="ct-banner-inner">
        <div class="ct-banner-meta">
            <?php if(!empty($settings['feature'])) : ?>
                <div class="ct-banner-title ct-circle-type">
                    <svg id="tutorial" data-name="tutorial" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.48 144.48">
                        <path id="ct-banner-curve" d="M242.93,123A71.74,71.74,0,1,1,171.2,51.22,71.73,71.73,0,0,1,242.93,123Z" transform="translate(-98.96 -50.72)"/>
                        <text fill="url(#ct-circle-text)">
                            <textPath href="#ct-banner-curve">
                                <?php echo wp_kses_post($settings['feature']); ?>
                            </textPath>
                        </text>
                    </svg>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
