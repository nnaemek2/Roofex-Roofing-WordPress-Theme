<?php

if (!class_exists('Roofex_Page')) {

    class Roofex_Page
    {
        public function get_site_loader(){

            $site_loader = roofex()->get_theme_opt( 'site_loader', false );
            $loader_style = roofex()->get_theme_opt( 'loader_style', 'style-digital' );

            if($site_loader) { ?>
                <div id="pxl-loadding" class="pxl-loader <?php echo esc_attr($loader_style); ?>" >
                    <div class="pxl-loader-effect">
                        <?php switch ($loader_style) {
                            case 'loader-1': ?>
                            <div class="lds-roller">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                            <?php break;

                            case 'loader-2': ?>
                            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                            <?php break;

                            case 'loader-3': ?>
                            <div class="ct-folding-cube">
                                <div class="ct-cube1 ct-cube"></div>
                                <div class="ct-cube2 ct-cube"></div>
                                <div class="ct-cube4 ct-cube"></div>
                                <div class="ct-cube3 ct-cube"></div>
                            </div>
                            <?php break;

                            case 'loader-4': ?>
                            <div class="loaderr">
                                <ul class="hexagon-container">
                                    <li class="hexagon hex_1"></li>
                                    <li class="hexagon hex_2"></li>
                                    <li class="hexagon hex_3"></li>
                                    <li class="hexagon hex_4"></li>
                                    <li class="hexagon hex_5"></li>
                                    <li class="hexagon hex_6"></li>
                                    <li class="hexagon hex_7"></li>
                                </ul>
                            </div>
                            <?php break;

                            case 'none': ?>
                            <div id="pxl-loadding-3" class="pxl-loader-none">

                            </div>
                            <?php break;

                            default: ?>
                            <div class = "pxl-circle-1"></div>
                            <div class = "pxl-circle-2"></div>
                            <?php break;
                        } ?>
                    </div>
                </div>
            <?php }
        }
        public function get_link_pages() {
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) ); 
        }

        public function get_page_title(){
            $pt_mode = roofex()->get_opt('pt_mode');
            if( $pt_mode == 'none' ) return;
            $ptitle_layout = (int)roofex()->get_opt('ptitle_layout');
            $titles = $this->get_title();
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' )) {
                ?>
                <div id="pxl-page-title-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout);?>
                </div>
                <?php 
            } else {
                $ptitle_breadcrumb_on = roofex()->get_opt( 'ptitle_breadcrumb_on', '1' ); 
                wp_enqueue_script('stellar-parallax'); ?>
                <div id="pxl-page-title-default" class="pxl--parallax" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="pxl-page-title"><?php pxl_print_html($titles['title']) ?></h1>
                                <?php if($ptitle_breadcrumb_on == '1') : ?>
                                    <?php $this->get_breadcrumb(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } 
        } 

        public function get_title() {
            $title = '';
            // Default titles
            if ( ! is_archive() ) {
                // Posts page view
                if ( is_home() ) {
                    // Only available if posts page is set.
                    if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                        $title = get_post_meta( $page_for_posts, 'custom_title', true );
                        if ( empty( $title ) ) {
                            $title = get_the_title( $page_for_posts );
                        }
                    }
                    if ( is_front_page() ) {
                        $title = esc_html__( 'Blog', 'roofex' );
                    }
                } // Single page view
                elseif ( is_page() ) {  
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                } elseif ( is_404() ) {
                    $title = esc_html__( '404', 'roofex' );
                } elseif ( is_search() ) {
                    $title = esc_html__( 'Search results', 'roofex' );
                } elseif ( is_singular('lp_course') ) {
                    $title = esc_html__( 'Course', 'roofex' );
                } else {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
                    $title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
                    if(!$title) {
                        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb(){

            if ( ! class_exists( 'CASE_Breadcrumb' ) )
            {
                return;
            }

            $breadcrumb = new CASE_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if ( empty( $entries ) )
            {
                return;
            }

            ob_start();

            foreach ( $entries as $entry )
            {
                $entry = wp_parse_args( $entry, array(
                    'label' => '',
                    'url'   => ''
                ) );

                if ( empty( $entry['label'] ) )
                {
                    continue;
                }

                echo '<li>';

                if ( ! empty( $entry['url'] ) )
                {
                    printf(
                        '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                        esc_url( $entry['url'] ),
                        esc_attr( $entry['label'] )
                    );
                }
                else
                {
                    printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
                }

                echo '</li>';
            }

            $output = ob_get_clean();

            if ( $output )
            {
                printf( '<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post($output));
            }
        }

        public function get_pagination( $query = null, $ajax = false ){

            if($ajax){
                add_filter('paginate_links', 'roofex_ajax_paginate_links');
            }

            $classes = array();

            if ( empty( $query ) )
            {
                $query = $GLOBALS['wp_query'];
            }

            if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
            {
                return;
            }

            $paged = $query->get( 'paged', '' );

            if ( ! $paged && is_front_page() && ! is_home() )
            {
                $paged = $query->get( 'page', '' );
            }

            $paged = $paged ? intval( $paged ) : 1;

            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) )
            {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
                'prev_text' => '<i class="flaticon flaticon-back"></i>',
                'next_text' => '<i class="flaticon flaticon-next-1"></i>',
            );
            if($ajax){
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links( $paginate_links_args );
            if ( $links ):
                ?>
                <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax?'ajax':''); ?>">
                    <div class="pxl-pagination-links">
                        <?php
                        printf($links);
                        ?>
                    </div>
                </nav>
                <?php
            endif;
        }
    }
}
