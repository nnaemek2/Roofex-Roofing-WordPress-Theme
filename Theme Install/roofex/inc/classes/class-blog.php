<?php
if (!class_exists('roofex_Blog')) {

    class roofex_Blog
    {

        public function get_archive_meta() {
            $archive_author = roofex()->get_theme_opt( 'archive_author', true );  
            $archive_date = roofex()->get_theme_opt( 'archive_date', true );
            if( $archive_author || $archive_date) : ?>
                <?php if($archive_date) : ?>
                    <span class="pxl-item--date"><?php echo get_the_date('d M, Y'); ?></span>
                <?php endif; ?>
            <?php endif; 
        }
        public function get_excerpt(){
            $archive_excerpt_length = roofex()->get_theme_opt('archive_excerpt_length', '50');
            $roofex_the_excerpt = get_the_excerpt();
            if(!empty($roofex_the_excerpt)) {
                echo wp_trim_words( $roofex_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }

        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = roofex()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'roofex' ); 
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'roofex_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }
        public function get_post_metas(){
            $post_category= roofex()->get_theme_opt( 'post_category', true );
            $post_author_meta = roofex()->get_theme_opt( 'post_author_meta', true );
            $post_date = roofex()->get_theme_opt( 'post_date', true );
            $post_comments = roofex()->get_theme_opt( 'post_comments', true );
            $post = get_post( get_the_ID());
            $author_id = $post->post_author;
            if($post_author_meta || $post_date || $post_category || $post_comments) : ?>
                <div class="pxl-single-post-meta">
                    <?php if($post_author_meta) : ?>
                        <div class="pxl-item--author">
                            <div class="title-meta">Writen by</div>
                            <div class="content-meta"><?php echo get_the_author_meta( 'display_name', $author_id);  ?> </div>
                        </div>
                    <?php endif; ?>
                    <?php if($post_date) : ?>
                        <div class="pxl-item--date">
                            <div class="title-meta">Date</div>
                            <div class="content-meta"><?php echo get_the_date(); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if($post_category) : ?>
                        <div class="pxl-item--category">
                            <div class="title-meta">Category</div>
                            <div class="content-meta"><?php the_terms( get_the_ID(), 'category' ); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if($post_comments) : ?>
                        <div class="item-comment">
                            <div class="title-meta">Comments</div>
                            <div class="content-meta"><a href="#comments"><?php echo comments_number(esc_html__('No Comments', 'roofex'),esc_html__(' 1 ', 'roofex'),esc_html__('%', 'roofex')); ?></a></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; 
        }

        public function roofex_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }

        public function get_tagged_in(){
            $tags_list = get_the_tag_list( '<label class="label">'.esc_attr('Tag:', 'roofex'). '</label>', ' ' );
            if ( $tags_list )
            {
                echo '<div class="pxl--tags">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        public function get_socials_share() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = roofex()->get_theme_opt( 'social_facebook', true );
            $social_twitter = roofex()->get_theme_opt( 'social_twitter', true );
            $social_pinterest = roofex()->get_theme_opt( 'social_pinterest', true );
            $social_linkedin = roofex()->get_theme_opt( 'social_linkedin', true );
            ?>
            <div class="pxl--social">
                <div class="title-social">Share :</div>
                <?php if($social_facebook) : ?>
                    <a class="fb-social" title="<?php echo esc_attr('Facebook', 'roofex'); ?>" target="_blank" href="http://www.facebook.com/"><i class="caseicon-facebook"></i></a>
                <?php endif; ?>
                <?php if($social_twitter) : ?>
                    <a class="tw-social" title="<?php echo esc_attr('Twitter', 'roofex'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                <?php endif; ?>
                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr('Pinterest', 'roofex'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                <?php endif; ?>
                <?php if($social_linkedin) : ?>
                    <a class="lin-social" title="<?php echo esc_attr('LinkedIn', 'roofex'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
                <?php endif; ?>
            </div>
            <?php
        }
        function roofex_get_user_social() {

            $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
            $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
            $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
            $user_skype = get_user_meta(get_the_author_meta( 'ID' ), 'user_skype', true);
            $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true);
            $user_vimeo = get_user_meta(get_the_author_meta( 'ID' ), 'user_vimeo', true);
            $user_tumblr = get_user_meta(get_the_author_meta( 'ID' ), 'user_tumblr', true);
            $user_pinterest = get_user_meta(get_the_author_meta( 'ID' ), 'user_pinterest', true);
            $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
            $user_yelp = get_user_meta(get_the_author_meta( 'ID' ), 'user_yelp', true);

            ?>
            <ul class="user-social">
                <?php if(!empty($user_facebook)) { ?>
                    <li><a href="<?php echo esc_url($user_facebook); ?>"><i class="Caseicon-facebook"></i></a></li>
                <?php } ?>
                <?php if(!empty($user_twitter)) { ?>
                    <li><a href="<?php echo esc_url($user_twitter); ?>"><i class="Caseicon-twitter"></i></a></li>
                <?php } ?>
                <?php if(!empty($user_linkedin)) { ?>
                    <li><a href="<?php echo esc_url($user_linkedin); ?>"><i class="Caseicon-linkedin"></i></a></li>
                <?php } ?>
                <?php if(!empty($user_instagram)) { ?>
                    <li><a href="<?php echo esc_url($user_instagram); ?>"><i class="Caseicon-instagram"></i></a></li>
                <?php } ?>
                <?php if(!empty($user_skype)) { ?>
                    <li><a href="<?php echo esc_url($user_skype); ?>"><i class="Caseicon-skype"></i></a></li>
                <?php } ?>
                <?php if(!empty($user_pinterest)) { ?>
                    <li><a href="<?php echo esc_url($user_pinterest); ?>"><i class="Caseicon-pinterest"></i></a></li>
                <?php } ?>
                <?php if(!empty($user_vimeo)) { ?>
                    <li><a href="<?php echo esc_url($user_vimeo); ?>"><i class="Caseicon-vimeo"></i></a></li>
                <?php } ?>
                <?php if(!empty($user_youtube)) { ?>
                    <li><a href="<?php echo esc_url($user_youtube); ?>"><i class="Caseicon-youtube"></i></a></li>
                <?php } ?>
                <?php if(!empty($user_yelp)) { ?>
                    <li><a href="<?php echo esc_url($user_yelp); ?>"><i class="Caseicon-yelp"></i></a></li>
                <?php } ?>
                <?php if(!empty($user_tumblr)) { ?>
                    <li><a href="<?php echo esc_url($user_tumblr); ?>"><i class="Caseicon-tumblr"></i></a></li>
                <?php } ?>

                </ul> <?php
            }
            public function get_socials_share_classes() { 
                $img_url = '';
                if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                    $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
                }
                ?>
                <div class="pxl--social">
                    <a class="fb-social" title="<?php echo esc_attr('Facebook', 'roofex'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                    <a class="tw-social" title="<?php echo esc_attr('Twitter', 'roofex'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                    <a class="pin-social" title="<?php echo esc_attr('Pinterest', 'roofex'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                    <a class="lin-social" title="<?php echo esc_attr('LinkedIn', 'roofex'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
                </div>
                <?php
            }

            public function get_post_nav() {
                global $post;
                $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
                $next     = get_adjacent_post( false, '', false );
                $link_grid = roofex()->get_theme_opt('link_grid', '');
                if ( ! $next && ! $previous )
                    return;
                ?>
                <?php
                $next_post = get_next_post();
                $previous_post = get_previous_post();

                if( !empty($next_post) || !empty($previous_post) ) { 
                    ?>
                    <div class="pxl-post--navigation">
                        <div class="pxl--items">
                            <div class="pxl--item pxl--item-prev">
                                <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                    $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                                    $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'roofex-thumb-small');
                                    ?>
                                    <a class="pxl--readmore-nav" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="fas fa-chevron-double-left"></i><?php echo esc_html__('Previous Post', 'roofex'); ?></a>
                                    <div class="pxl--holder">
                                        <?php if(!empty($prev_img_id)) : ?>
                                            <div class="pxl--img">
                                                <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" alt="post-nav" /></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="pxl--meta">
                                            <div class="title-post-nav"><a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            
                            <?php 
                            if(!empty($link_grid)){?>
                                <div class="pxl-grid-post">
                                    <a href="<?php echo esc_attr($link_grid) ?>" class="item-grid-post" target="blank"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/grid.png'); ?>" 
                                        alt="<?php echo esc_attr('grid', 'roofex'); ?>" /></a>
                                    </div>
                                <?php } ?>

                                <div class="pxl--item pxl--item-next">
                                    <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                        $next_img_id = get_post_thumbnail_id($next_post->ID);
                                        $next_img_url = wp_get_attachment_image_src($next_img_id, 'roofex-thumb-small');
                                        ?>
                                        <a class="pxl--readmore-nav" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('Newer Post', 'roofex'); ?><i class="fas fa-chevron-double-right"></i></a>
                                        <div class="pxl--holder">
                                            <div class="pxl--meta">
                                                <div class="title-post-nav">
                                                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                                </div>
                                            </div>
                                            <?php if(!empty($next_img_id)) : ?>
                                                <div class="pxl--img">
                                                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" alt="post-nav" /></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php } ?>
                                </div><!-- .nav-links -->
                            </div>
                        <?php }
                    }

                    public function get_project_nav() {
                        global $post;
                        $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
                        $next     = get_adjacent_post( false, '', false );

                        if ( ! $next && ! $previous )
                            return;
                        ?>
                        <?php
                        $next_post = get_next_post();
                        $previous_post = get_previous_post();

                        if( !empty($next_post) || !empty($previous_post) ) { 
                            ?>
                            <div class="pxl-project--navigation">
                                <div class="pxl--items">
                                    <div class="pxl--item pxl--item-prev">
                                        <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                            ?>
                                            <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="far fa-long-arrow-left"></i>Prev Project</a>
                                        <?php } ?>
                                    </div>
                                    <div class="pxl--item pxl--item-next">
                                        <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                            ?>
                                            <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">Next Project <i class="far fa-long-arrow-right"></i> </a>
                                        <?php } ?>
                                    </div>
                                </div><!-- .nav-links -->
                            </div>
                        <?php }
                    }


                    function roofex_related_post() {
                        $post_related = roofex()->get_theme_opt( 'post_related', false );

                        if($post_related) {
                            global $post; 
                            $current_id = $post->ID;
                            $posttags = get_the_category($post->ID);
                            if (empty($posttags)) return;

                            $tags = array();

                            foreach ($posttags as $tag) {

                                $tags[] = $tag->term_id;
                            }
                            $post_number = '2';
                            $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                            if (count($query_similar->posts) > 1) {
                                ?>
                                <div class="pxl-related-post">
                                    <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'roofex'); ?></h4>
                                    <div class="pxl-related-post-inner row" data-start-page="1" data-max-pages="2" data-total="2" data-perpage="2">
                                        <?php foreach ($query_similar->posts as $post):
                                            $author = get_user_by('id', $post->post_author);
                                            $thumbnail_url = '';
                                            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'roofex-related-post', false);
                                        endif;
                                        if ($post->ID !== $current_id) : ?>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                <div class="grid-item-inner pxl--holder">
                                                    <?php if (has_post_thumbnail()) { ?>
                                                        <div class="item-featured">
                                                            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="post-image" /></a>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="item-holder pxl--meta">
                                                        <ul class="entry-meta pxl-item--meta">
                                                            <li class="pxl-item--date"><i class="caseicon-calendar-alt"></i><?php echo get_the_date(); ?></li>
                                                            <li class="item-comment">
                                                                <i class="caseicon-comment"></i>
                                                                <a href="#comments"><?php echo comments_number(esc_html__('No Comments', 'roofex'),esc_html__('Comment (1) ', 'roofex'),esc_html__('Comments (%)', 'roofex'), $post->ID); ?></a>
                                                            </li>
                                                        </ul>
                                                        <h3 class="item-title">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h3>
                                                        <a class="pxl--readmore-related" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html__('READ MORE', 'roofex'); ?><i class="caseicon-long-arrow-right-two"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;
                                    endforeach; ?>
                                </div>
                            </div>
                        <?php }
                    }

                    wp_reset_postdata();
                }

            }
        }
