<?php
/**
 * @package Case-Themes
 */
get_header();?>
<div class="container">
    <div class="row content-row">
        <div id="pxl-content-area" class="pxl-content-area col-12">
            <main id="pxl-content-main">
                <div class="wrap-content-404">
                    <div class="pxl-error-inner" style="background-image:url(<?php echo esc_url(get_template_directory_uri().'/assets/img/bg-404.png'); ?>);">
                        <div class="error-404-image"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/image-404.png'); ?>" alt="<?php echo esc_attr__('404 Error', 'roofex'); ?>" /></div>
                        <h3 class="pxl-error-title">
                            <?php echo esc_html__('Page Not Found', 'roofex'); ?>
                        </h3>
                        <div class="error-404-desc">
                            <?php echo esc_html__("We are sorry to say that our page is not found!", "roofex"); ?>
                        </div>
                        <a class="pxl-error-button" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php echo esc_html__('Go Home', 'roofex'); ?>
                        </a>
                    </div>
                </div>
                
            </main>
        </div>
    </div>
</div>
<?php
get_footer();

