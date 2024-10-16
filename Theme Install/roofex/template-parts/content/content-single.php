<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Case-Themes
 */
$post_tag = roofex()->get_theme_opt( 'post_tag', true );
$post_navigation = roofex()->get_theme_opt( 'post_navigation', false );
$post_social_share = roofex()->get_theme_opt( 'post_social_share', false );
$post_author_box_info = roofex()->get_theme_opt( 'post_author_box_info', false );
$post_author_pos = roofex()->get_theme_opt( 'post_author_pos', '' );
$link_fb = roofex()->get_theme_opt( 'link_fb', '' );
$link_tw = roofex()->get_theme_opt( 'link_tw', '' );
$link_dribble = roofex()->get_theme_opt( 'link_dribble', '' );
$link_be = roofex()->get_theme_opt( 'link_be', '' );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl-item--post'); ?>>
   
    <div class="pxl-item--holder">
        
        <div class="pxl-item--excerpt clearfix">
            <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
            ?>
        </div>

    </div>

    <?php if($post_tag || $post_social_share ) :  ?>
        <div class="pxl--post-footer">
            <?php if($post_tag) { roofex()->blog->get_tagged_in(); } ?>
            <?php if($post_social_share) { roofex()->blog->get_socials_share(); } ?>
        </div>
    <?php endif; ?>
    <?php if($post_author_box_info) : ?>
        <div class="entry-author-info">
            <div class="entry-author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
            </div>
            <div class="entry-author-meta">
                <h3 class="author-name">
                    <?php the_author_posts_link(); ?>
                </h3>
                <div class="position-author">
                    <?php echo pxl_print_html($post_author_pos) ?>
                </div>
                <div class="author-description">
                    <?php the_author_meta( 'description' ); ?>
                </div>
                <div class="social-author">
                    <?php 
                    if(!empty($link_fb)){?>
                        <a href="<?php echo esc_attr($link_fb) ?>" target="blank"> <i class="fab fa-facebook-f"></i></a>
                    <?php } ?>
                    <?php 
                    if(!empty($link_fb)){?>
                        <a href="<?php echo esc_attr($link_fb) ?>" target="blank"> <i class="fab fa-twitter"></i></a>
                    <?php } ?>
                    <?php 
                    if(!empty($link_fb)){?>
                        <a href="<?php echo esc_attr($link_fb) ?>" target="blank"> <i class="fab fa-dribbble"></i></a>
                    <?php } ?>
                    <?php 
                    if(!empty($link_fb)){?>
                        <a href="<?php echo esc_attr($link_fb) ?>" target="blank"> <i class="fab fab fa-behance"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($post_navigation) { roofex()->blog->get_post_nav(); } ?>
</article><!-- #post -->