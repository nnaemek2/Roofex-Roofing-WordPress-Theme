<?php
/**
 * Template Name: Blog Classic
 * @package Case-Themes
 */
$archive_readmore_text = roofex()->get_theme_opt('archive_readmore_text', esc_html('Read More', 'roofex'));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-item--post pxl-item--archive'); ?>>
    
    <?php if (has_post_thumbnail()) { 
        echo '<div class="pxl-item--image">'; ?>
        <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('roofex-medium'); ?></a>
        <?php echo '</div>';
    } ?>
    <div class="pxl-item--holder">
        <div class="pxl-item--meta">
            
            <div class="categorie">
                <?php roofex()->blog->get_archive_meta(); ?>
                <?php the_terms( $post->ID, 'category', '', ' ' ); ?>
            </div>
        </div>
        <h2 class="pxl-item--title">
            <i class="caseicon-check" style="display: none;"></i>
            <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">

                <?php the_title(); ?>
            </a>
        </h2>
        <div class="pxl-item--excerpt">
            <?php
            roofex()->blog->get_excerpt();
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
            ?> 
        </div>
        <div class="pxl-item--readmore ">
            <a class="btn-readmore " href="<?php echo esc_url( get_permalink()); ?>">
                <?php echo roofex_html($archive_readmore_text); ?>
                <i class="flaticon flaticon-right-up"></i>
            </a>
        </div>
    </div>
</article> 