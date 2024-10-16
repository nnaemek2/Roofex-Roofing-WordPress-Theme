<?php
/**
 * @package Case-Themes
 */
get_header();
$roofex_sidebar = roofex()->get_sidebar_args(['type' => 'post', 'content_col'=> '8']);
$post_author_meta = roofex()->get_theme_opt( 'post_author_meta', true );
?>
<div class="container">
    <div class="row <?php echo esc_attr($roofex_sidebar['wrap_class']) ?>">
        <?php 
            echo '<div class="pxl-item--meta col-12">'; ?>
            <?php roofex()->blog->get_post_metas(); ?>
            <?php echo '</div>';
        ?>
        <?php if (has_post_thumbnail()) {
            echo '<div class="pxl-item--image-single col-12">'; ?>
            <?php the_post_thumbnail('roofex-large'); ?>
            <?php echo '</div>';
        } ?>
        <div id="pxl-content-area" class="<?php echo esc_attr($roofex_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content-single', get_post_format() );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
        </div>
        <?php if ($roofex_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($roofex_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
