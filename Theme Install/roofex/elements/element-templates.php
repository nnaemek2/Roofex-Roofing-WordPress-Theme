<?php 

if(!function_exists('roofex_get_post_grid')){
    function roofex_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
            roofex_get_post_grid_layout1($posts, $settings);
            break;

            case 'post-2':
            roofex_get_post_grid_layout2($posts, $settings);
            break;
            case 'post-3':
            roofex_get_post_grid_layout3($posts, $settings);
            break;
            case 'post-4':
            roofex_get_post_grid_layout4($posts, $settings);
            break;


            case 'service-1':
            roofex_get_service_grid_layout1($posts, $settings);
            break;
            case 'service-2':
            roofex_get_service_grid_layout2($posts, $settings);
            break;
            case 'service-3':
            roofex_get_service_grid_layout3($posts, $settings);
            break;
            case 'service-4':
            roofex_get_service_grid_layout4($posts, $settings);
            break;
            case 'service-5':
            roofex_get_service_grid_layout5($posts, $settings);
            break;
            case 'service-6':
            roofex_get_service_grid_layout6($posts, $settings);
            break;
            case 'service-7':
            roofex_get_service_grid_layout7($posts, $settings);
            break;

            case 'portfolio-1':
            roofex_get_portfolio_grid_layout1($posts, $settings);
            break;
            case 'portfolio-2':
            roofex_get_portfolio_grid_layout2($posts, $settings);
            break;
            case 'portfolio-3':
            roofex_get_portfolio_grid_layout3($posts, $settings);
            break;
            case 'portfolio-4':
            roofex_get_portfolio_grid_layout4($posts, $settings);
            break;
            case 'portfolio-5':
            roofex_get_portfolio_grid_layout5($posts, $settings);
            break;
            case 'portfolio-6':
            roofex_get_portfolio_grid_layout6($posts, $settings);
            break;
            case 'portfolio-7':
            roofex_get_portfolio_grid_layout7($posts, $settings);
            break;
            case 'portfolio-8':
            roofex_get_portfolio_grid_layout8($posts, $settings);
            break;
            default:
            return false;
            break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function roofex_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '370x250';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="pxl-item--image hover-imge-effect3">
                        <div class="wrap-feature">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>

                    </div>
                <?php endif; ?>
                <div class="pxl-item--holder">
                    <div class="wrap-meta ">
                        <?php if($show_date == 'true' ) : ?>
                            <div class="pxl-item--date "><i class="fas fa-calendar-alt"></i><?php $date_formart = get_option('date_format'); echo get_the_date('M d,y', $post->ID); ?></div>
                        <?php endif; ?>
                        <?php if($show_category == 'true' ) : ?>
                            <div class="item--category">
                                <i class="fas fa-tag"></i>
                                <?php the_terms( $post->ID, 'category', '', ' ' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h3 class="pxl-item--title">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h3>
                    <div class="item--content">
                        <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                    </div>
                    <div class="content-bottom ">
                        <div class="pxl-item--author">
                            <?php if($show_author == 'true'): ?>
                                <a class="pxl-inline-flex" href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>">
                                    <i class="flaticon-roof-2"></i><span><?php echo esc_html($author->display_name); ?></span>
                                </a>
                            <?php endif; ?>
                            
                        </div>
                        <?php if($show_button == 'true') : ?>
                            <div class="pxl-item--readmore">
                                <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <span>
                                        <?php if(!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('More Details', 'roofex');
                                        } ?>
                                    </span>
                                    
                                </a>
                                <i class="far fa-long-arrow-right"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}

function roofex_get_post_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '370x250';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="pxl-item--image hover-imge-effect2">
                        <div class="wrap-feature">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            <?php if($show_date == 'true' ) : ?>
                                <div class="pxl-item--date ">
                                    <div class="month-day"><?php $date_formart = get_option('date_format'); echo get_the_date('M d', $post->ID); ?></div>                                             
                                    <div class="year"><?php $date_formart = get_option('date_format'); echo get_the_date('Y', $post->ID); ?></div>                                                
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endif; ?>
                <div class="pxl-item--holder">
                    <div class="pxl-item--category">
                        <?php the_terms( $post->ID, 'category', '', ' ' ); ?>
                    </div>
                </div>
                <div class="entry-body">
                    <h3 class="pxl-item--title">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h3>
                    <div class="pxl-item--holder">
                        <div class="pxl-item--readmore">
                            <a class="btn-readmore " href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span>
                                    <?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Read More', 'roofex');
                                    } ?>
                                </span>
                            </a>
                        </div>
                        <div class="pxl-item--author">
                            <a class="pxl-inline-flex" href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>">
                                <i class="fas fa-user"></i>
                                <?php echo pxl_print_html('by','roofex') ?><span><?php echo esc_html($author->display_name); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
function roofex_get_post_grid_layout3($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '370x250';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author);  
            $author_id = get_the_author_meta('ID');
            $avatar = get_avatar($author_id, 100);
            $author_display_name = get_the_author_meta('display_name');
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="wrap-content-portfolio ">
                    <div class="pxl-item--inner ">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="wrap-entry-body">
                        <div class="item--date"><?php echo get_the_date('j F, Y', $post->ID); ?></div>
                        <h3 class="item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?>
                        </a>
                    </h3>
                    <div class="pxl-item--author">
                        <a class="pxl-inline-flex" href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>">
                            <?php echo ''.$avatar; echo pxl_print_html('by','roofex'); echo ' '.$author_display_name; ?>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
endforeach;
endif;
}
function roofex_get_post_grid_layout4($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '370x250';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="pxl-item--image hover-imge-effect3">
                        <div class="wrap-feature">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>

                    </div>
                <?php endif; ?>
                <div class="pxl-item--holder">
                    <h3 class="pxl-item--title">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                    </h3>
                    <div class="item--content">
                        <?php echo wp_trim_words( $post->post_excerpt, 10, $more = null ); ?>
                    </div>
                    <?php if($show_button == 'true') : ?>
                        <div class="pxl-item--readmore">
                            <a class="btn-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span>
                                    <?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('More Details', 'roofex');
                                    } ?>
                                </span>
                                <i class="flaticon-right-up"></i>
                            </a>
                            
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
// End Post Grid
//--------------------------------------------------

// Start service Grid
//--------------------------------------------------
function roofex_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '600x470';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
           $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
           $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
           $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
           $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
           if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
            $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
            $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
            $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
            $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
            $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
            $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
            $img_size_m = $grid_masonry[$key]['img_size_m'];
            if(!empty($img_size_m)) {
                $images_size = $img_size_m;
            }
        } elseif (!empty($img_size)) {
            $images_size = $img_size;
        }

        if(!empty($tax))
            $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
        else 
            $filter_class = '';

        $img_id = get_post_thumbnail_id($post->ID);
        if($img_id) {
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $img_id,
                'thumb_size' => $images_size,
                'class' => 'no-lazyload',
            ));
            $thumbnail = $img['thumbnail'];
        } else {
            $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
        } ?>
        <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
            <div class="wrap-content-service">
                <div class="item--holder">
                    <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                        <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon_font); ?>"></i></div>
                    <?php endif; ?>
                    <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                        $icon_img = pxl_get_image_by_size( array(
                            'attach_id'  => $service_icon_img['id'],
                            'thumb_size' => 'full',
                        ));
                        $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                        <div class="item--icon icon-psb">
                            <?php echo wp_kses_post($icon_thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    
                    <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}

function roofex_get_service_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '470x470';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="roof">

                       <img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/roof-sv.png'); ?>" alt="<?php echo esc_attr__('bg-roof', 'roofex'); ?>" />

                   </div>
                   <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <div class="pxl-item--holder">
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon_font); ?>"></i></div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="item--icon icon-psb">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                               <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                           </a>
                       </h3>
                       <div class="pxl-item--content">
                        <div class="content-excerpt">
                            <?php echo pxl_print_html($service_excerpt) ?>
                        </div>
                    </div>
                </div>
                <div class="pxl-readmore">
                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">Read More</a>
                    <div class="line-button"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
endforeach;
endif;
}
function roofex_get_service_grid_layout3($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '470x470';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <div class="pxl-item--holder">
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon_font); ?>"></i></div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="item--icon icon-psb">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                             <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                         </a>
                     </h3>
                     <div class="pxl-item--content">
                        <div class="content-excerpt">
                            <?php echo pxl_print_html($service_excerpt) ?>
                        </div>
                    </div>
                    <div class="pxl-readmore">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">Read More</a>
                    </div>
                </div>

            </div>
            <div class="pxl-item--inner inner-hover <?php echo esc_attr($pxl_animate); ?>">
                <div class="pxl-item--holder">
                    <?php if(!empty($service_icon_font)) : ?>
                        <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon_font); ?>"></i></div>
                    <?php endif; ?>
                    <h3 class="pxl-item--title">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                         <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                     </a>
                 </h3>
                 <div class="pxl-item--content">
                    <div class="content-excerpt">
                        <?php echo pxl_print_html($service_excerpt) ?>
                    </div>
                </div>
                <div class="pxl-readmore">
                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">Read More</a>
                </div>
            </div>

        </div>
    </div>
    <?php
endforeach;
endif;
}
function roofex_get_service_grid_layout4($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '470x470';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <div class="pxl-item--holder">
                        <div class="content-top">
                            <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon_font); ?>"></i></div>
                            <?php endif; ?>
                            <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                $icon_img = pxl_get_image_by_size( array(
                                    'attach_id'  => $service_icon_img['id'],
                                    'thumb_size' => 'full',
                                ));
                                $icon_thumbnail = $icon_img['thumbnail'];
                                ?>
                                <div class="item--icon icon-psb">
                                    <?php echo wp_kses_post($icon_thumbnail); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="pxl-item--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                 <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                             </a>
                         </h3>
                         <div class="content-excerpt">
                            <?php echo pxl_print_html($service_excerpt) ?>
                        </div>
                    </div>

                </div>
                <div class=" hover <?php echo esc_attr($pxl_animate); ?>" <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) { $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>style="background-image: url(<?php echo esc_url($thumbnail_url[0]); ?>);"<?php } ?>>
                    <div class="pxl-item--holder">
                        <h3 class="pxl-item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                             <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                         </a>
                     </h3>
                 </div>

             </div>
             <div class="pxl-readmore">
                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><span>Read More</span> <i class="far fa-angle-right"></i></a>
            </div>
            <div class="pxl-readmore bt-hover">
                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><span>Read More</span> <i class="far fa-angle-right"></i></a>
            </div>
        </div>
    </div>
    <?php
endforeach;
endif;
}
function roofex_get_service_grid_layout6($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '470x470';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <div class="pxl-item--image hover-imge-effect4">
                        <div class="wrap-feature">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>

                    </div>
                    <div class="pxl-item--holder">
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon_font); ?>"></i></div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="item--icon icon-psb">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                             <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                         </a>
                     </h3>
                     <div class="content-excerpt">
                        <?php echo pxl_print_html($service_excerpt) ?>
                    </div>

                </div>
                <div class="pxl-readmore">
                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><span>Read More</span> <i class="fal fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
function roofex_get_service_grid_layout7($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '1002x624';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                    <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon_font); ?>"></i></div>
                <?php endif; ?>
                <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                    $icon_img = pxl_get_image_by_size( array(
                        'attach_id'  => $service_icon_img['id'],
                        'thumb_size' => 'full',
                    ));
                    $icon_thumbnail = $icon_img['thumbnail'];
                    ?>
                    <div class="item--icon icon-psb">
                        <?php echo wp_kses_post($icon_thumbnail); ?>
                    </div>
                <?php endif; ?>
                <h3 class="pxl-item--title">
                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                        <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                    </a>
                </h3>
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <div class="pxl-item--image hover-imge-effect4">
                        <div class="wrap-feature">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    </div>
                    <div class="pxl-item--holder">
                        <div class="content-excerpt">
                            <?php echo pxl_print_html($service_excerpt) ?>
                        </div>
                        <div class="pxl-readmore">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><span>Read More</span> <i class="fal fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    endif;
}

function roofex_get_service_grid_layout5($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '470x470';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <div class="pxl-item--holder">
                        <?php if(!empty($service_icon_font)) : ?>

                        <?php endif; ?>
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="wrap-icon">
                                <span class="bf-mask-tab"></span>
                                <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon_font); ?>"></i></div>
                            </div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="wrap-icon">
                                <span class="bf-mask-tab"></span>
                                <div class="item--icon icon-psb">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                            </div>
                            
                        <?php endif; ?>
                        <div class="wrap-content">
                            <h3 class="pxl-item--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                 <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                             </a>
                         </h3>
                         <div class="content-excerpt">
                            <?php echo pxl_print_html($service_excerpt) ?>
                        </div>
                    </div>

                </div>
                <div class="pxl-readmore">
                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><i class="fal fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}

// End service Grid
//--------------------------------------------------



// Start Portfolio Grid
//--------------------------------------------------
function roofex_get_portfolio_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $portfolio_icon_font = get_post_meta($post->ID, 'portfolio_icon_font', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);

            } 
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                <div class="wrap-content-service pxl-grid-direction">

                    <div class="pxl-item--inner  item-direction ">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="wrap-entry-body">
                        <div class="entry-body">                  
                            <div class="item--holder">
                                <div class="item--icon"><i class="<?php echo esc_attr($portfolio_icon_font); ?>"></i></div>
                                <h3 class="item--title">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?>
                                </a>
                            </h3>
                            <?php if($show_category == 'true'): ?>
                                <div class="item--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="pxl-item--readmore">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
endforeach;
endif;
}
function roofex_get_portfolio_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '490x660';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);

            } 
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                <div class="wrap-content-portfolio ">

                    <div class="pxl-item--inner ">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="wrap-entry-body">
                        <div class="entry-body">                  
                            <div class="item--holder">
                                <?php if($show_category == 'true'): ?>
                                    <div class="item--category">
                                        <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                    </div>
                                <?php endif; ?>
                                <h3 class="item--title">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="wrap-content-portfolio hover">

            <div class="pxl-item--inner ">
                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="item--featured">
                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                </div>
            <?php endif; ?>
            <div class="wrap-entry-body">
                <div class="entry-body">                  
                    <div class="item--holder">
                        <?php if($show_category == 'true'): ?>
                            <div class="item--category">
                                <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?>
                        </a>
                    </h3>
                    <div class="content-excerpt">
                        <?php echo pxl_print_html($portfolio_excerpt)  ?>
                    </div>
                    <div class="pxl-item--readmore">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" class="btn hover-style1 btn-default">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php
endforeach;
endif;
}


function roofex_get_portfolio_grid_layout3($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '730x590';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);

            } 
            $author = get_user_by('id', $post->post_author);  
            $author_id = get_the_author_meta('ID');
            $avatar = get_avatar($author_id, 100);
            $author_display_name = get_the_author_meta('display_name');
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                <div class="wrap-content-portfolio ">
                    <div class="pxl-item--inner ">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="wrap-entry-body">
                        <div class="item--date"><?php echo get_the_date('j F, Y', $post->ID); ?></div>
                        <h3 class="item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?>
                        </a>
                    </h3>
                    <div class="pxl-item--author">
                        <a class="pxl-inline-flex" href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>">
                            <?php echo ''.$avatar; echo pxl_print_html('by','roofex'); echo ' '.$author_display_name; ?>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
endforeach;
endif;
}

function roofex_get_portfolio_grid_layout4($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '1000x1000';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);

            } 
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                <div class="wrap-content-portfolio">

                    <div class="pxl-item--inner ">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="wrap-entry-body">
                        <div class="entry-body">                  
                            <div class="item--holder">
                                <h3 class="item--title">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?>
                                </a>
                            </h3>
                            <?php if($show_category == 'true'): ?>
                                <div class="item--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                </div>
                            <?php endif; ?>


                            <div class="content-excerpt">
                                <?php echo pxl_print_html($portfolio_excerpt)  ?>
                            </div>
                            <div class="pxl-item--readmore">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" class=" btn-readmore">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
endforeach;
endif;
}

function roofex_get_portfolio_grid_layout5($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '1000x1000';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
            $portfolio_icon_font = get_post_meta($post->ID, 'portfolio_icon_font', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);

            } 
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-tilt data-tilt-max="5"  data-tilt-transition="true">
                    <div class="pxl-item--image">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                    <div class="pxl-item--holder">
                        <?php if(!empty($portfolio_icon_font)) : ?>
                            <div class="item--icon icon-psb"><i class="<?php echo esc_attr($portfolio_icon_font); ?>"></i></div>
                        <?php endif; ?>
                        <?php if($show_category == 'true'): ?>
                            <div class="pxl-item--category">
                                <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                             <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                         </a>
                     </h3>
                 </div>
             </div>
         </div>
         <?php
     endforeach;
 endif;
}
function roofex_get_portfolio_grid_layout6($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '1000x1000';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
            $portfolio_icon_font = get_post_meta($post->ID, 'portfolio_icon_font', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);

            } 
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <div class="pxl-item--image">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                    <div class="pxl-item--holder">
                        <h3 class="pxl-item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                             <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                         </a>
                     </h3>
                     <?php if($show_category == 'true'): ?>
                        <div class="pxl-item--category">
                            <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
function roofex_get_portfolio_grid_layout7($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '1000x1000';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
            $portfolio_icon_font = get_post_meta($post->ID, 'portfolio_icon_font', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);

            } 
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <div class="pxl-item--image">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                    <div class="pxl-item--holder">

                        <h3 class="pxl-item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                             <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                         </a>
                     </h3>
                     <?php if($show_category == 'true'): ?>
                        <div class="pxl-item--category">
                            <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
endif;
}
function roofex_get_portfolio_grid_layout8($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '1000x1000';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
            $portfolio_icon_font = get_post_meta($post->ID, 'portfolio_icon_font', true);
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);

            } 
            ?>

            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?> <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                    <div class="pxl-item--image">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" class="more">+</a>
                    <div class="pxl-item--holder">
                        <?php if($show_category == 'true'): ?>
                            <div class="pxl-item--category">
                                <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                             <?php echo wp_trim_words( get_the_title($post->ID), 5, '' ); ?>
                         </a>
                     </h3>
                 </div>
             </div>
         </div>
         <?php
     endforeach;
 endif;
}

// End Portfolio Grid
//--------------------------------------------------

add_action( 'wp_ajax_roofex_get_pagination_html', 'roofex_get_pagination_html' );
add_action( 'wp_ajax_nopriv_roofex_get_pagination_html', 'roofex_get_pagination_html' );
function roofex_get_pagination_html(){
    try{
        if(!isset($_POST['query_vars'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'roofex'));
        }
        $query = new WP_Query($_POST['query_vars']);
        ob_start();
        roofex()->page->get_pagination( $query,  true );
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'roofex'),
                'data' => array(
                    'html' => $html,
                    'query_vars' => $_POST['query_vars'],
                    'post' => $query->have_posts()
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_roofex_load_more_post_grid', 'roofex_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_roofex_load_more_post_grid', 'roofex_load_more_post_grid' );
function roofex_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'roofex'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source' => isset($settings['source'])?$settings['source']:'',
            'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
            'order' => isset($settings['order'])?$settings['order']:'desc',
            'limit' => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids' => isset($settings['post_ids'])?$settings['post_ids']:[],
        ]));
        ob_start();

        roofex_get_post_grid($posts, $settings);
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'roofex'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}