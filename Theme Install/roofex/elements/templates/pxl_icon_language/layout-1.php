<?php 
$default_settings = [
    'style' => 'style1',
]; 
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if(class_exists('SitePress')) { ?>
    <div class="site-header-item site-header-lang">
        <?php do_action('wpml_add_language_selector'); ?>
    </div>
<?php } else { 
    wp_enqueue_style('wpml-style', get_template_directory_uri() . '/assets/css/style-lang.css', array(), '1.0.0');
    ?>
    <div class="site-header-item site-header-lang custom <?php echo esc_attr($style); ?>">
        <div class="wpml-ls-statics-shortcode_actions wpml-ls wpml-ls-legacy-dropdown js-wpml-ls-legacy-dropdown">
            <ul>
                <li tabindex="0" class="wpml-ls-slot-shortcode_actions wpml-ls-item wpml-ls-item-en wpml-ls-current-language wpml-ls-first-item wpml-ls-item-legacy-dropdown">
                    <a href="#" class="js-wpml-ls-item-toggle wpml-ls-item-toggle"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/usa.png'); ?>" alt="<?php echo esc_attr__('usa', 'roofex'); ?>" /><span class="wpml-ls-native"><?php echo pxl_print_html('EN', 'roofex'); ?> </span></a>
                    <ul class="wpml-ls-sub-menu">
                        <li class="wpml-ls-slot-shortcode_actions wpml-ls-item wpml-ls-item-fr">
                            <a href="#" class="wpml-ls-link"><span class="wpml-ls-native"><?php echo pxl_print_html('French', 'roofex'); ?></span></a>
                        </li>
                        <li class="wpml-ls-slot-shortcode_actions wpml-ls-item wpml-ls-item-de wpml-ls-last-item">
                            <a href="#" class="wpml-ls-link"><span class="wpml-ls-native"><?php echo pxl_print_html('Russian', 'roofex'); ?></span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<?php } ?>
