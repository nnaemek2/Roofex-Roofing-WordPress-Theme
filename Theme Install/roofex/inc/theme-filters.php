<?php
/**
 * Filters hook for the theme
 *
 * @package Case-Themes
 */

/* Custom Classs - Body */
function roofex_body_classes( $classes ) {   

    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';
    }

    $footer_fixed = roofex()->get_theme_opt('footer_fixed');
    if(isset($footer_fixed) && $footer_fixed) {
        $classes[] = ' pxl-footer-fixed';
    }

    $theme_default = roofex()->get_theme_opt('theme_default');
    if(isset($theme_default['font-family']) && $theme_default['font-family'] == false) {
        $classes[] = ' pxl-font-default';
    }

    return $classes;
}
add_filter( 'body_class', 'roofex_body_classes' );

/* Post Type Support Elementor*/
add_filter( 'pxl_add_cpt_support', 'roofex_add_cpt_support' );
function roofex_add_cpt_support($cpt_support) { 
	$cpt_support[] = 'service';
    return $cpt_support;
}

add_filter( 'pxl_support_default_cpt', 'roofex_support_default_cpt' );
function roofex_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'roofex_add_posttype' );
function roofex_add_posttype( $postypes ) {
	$postypes['service'] = array(
		'status' => true,
		'item_name'  => 'Service',
		'items_name' => 'Service',
		'args'       => array(
			'menu_icon'          => 'dashicons-feedback',
			'rewrite'             => array(
                'slug'       => 'service',
 		 	),
		),
	);
	$postypes['pxl_event'] = array(
		'status' => true,
		'item_name'  => 'Events',
		'items_name' => 'Events',
		'args'       => array(
			'menu_icon'          => 'dashicons-admin-media',
			'rewrite'             => array(
                'slug'       => 'pxl_event',
 		 	),
		),
	);
	$postypes['portfolio'] = array(
		'status' => true,
		'item_name'  => 'Portfolio',
		'items_name' => 'Portfolio',
		'args'       => array(
			'menu_icon'          => 'dashicons-welcome-learn-more',
			'rewrite'             => array(
                'slug'       => 'portfolio',
 		 	),
		),
	);
	return $postypes;
}

add_filter( 'pxl_extra_taxonomies', 'roofex_add_tax' );
function roofex_add_tax( $taxonomies ) {

	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Categories',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-category'
 		 	),
		),
		'labels'     => array()
	);
	$taxonomies['pxl_event-category'] = array(
		'status'     => true,
		'post_type'  => array( 'pxl_event' ),
		'taxonomy'   => 'Pxl Event Categories',
		'taxonomies' => 'Pxl Event Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'pxl_event-category'
 		 	),
		),
		'labels'     => array()
	);
	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => 'Portfolio Categories',
		'taxonomies' => 'Portfolio Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'portfolio-category'
 		 	),
		),
		'labels'     => array()
	);
	
	return $taxonomies;
}

add_filter( 'pxl_theme_builder_post_types', 'roofex_theme_builder_post_type' );
function roofex_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'roofex_theme_builder_layout_id' );
function roofex_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)roofex()->get_opt('header_layout');
	$header_sticky_layout = (int)roofex()->get_opt('header_sticky_layout');
	$footer_layout        = (int)roofex()->get_opt('footer_layout');
	$ptitle_layout        = (int)roofex()->get_opt('ptitle_layout');
	if( $header_layout > 0) 
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0) 
		$layout_ids[] = $header_sticky_layout;
	if( $footer_layout > 0) 
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0) 
		$layout_ids[] = $ptitle_layout;
	
	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'roofex_wg_get_source_builder' );
function roofex_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  return $wg_datas;
}

/* Update primary color in Editor Builder */
add_action( 'elementor/preview/enqueue_styles', 'roofex_add_editor_preview_style' );
function roofex_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', roofex_editor_preview_inline_styles() );
}
function roofex_editor_preview_inline_styles(){
    $theme_colors = roofex_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}
 
add_filter( 'get_the_archive_title', 'roofex_archive_title_remove_label' );
function roofex_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'roofex_comment_reply_text' );
function roofex_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'roofex').'', $link );
	return $link;
}

add_filter( 'pxl_enable_megamenu', 'roofex_enable_megamenu' );
function roofex_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'roofex_enable_onepage' );
function roofex_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'roofex_support_awesome_pro' );
function roofex_support_awesome_pro() {
	return true;
}
 
add_filter( 'redux_pxl_iconpicker_field/get_icons', 'roofex_add_icons_to_pxl_iconpicker_field' );
function roofex_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "roofex_add_icons_to_megamenu");
function roofex_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}
 

/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'roofex_comment_field_to_bottom' );
function roofex_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );


//Hook Count Widget Archive
add_filter('get_archives_link', 'abcde',10,7);
function abcde($link_html, $url, $text, $format, $before, $after, $selected){
	$text         = wptexturize( $text );
	$url          = esc_url( $url );
	$aria_current = $selected ? ' aria-current="page"' : '';

	if ( 'link' === $format ) {
		$link_html = "\t<link rel='archives' title='" . esc_attr( $text ) . "' href='$url' />\n";
	} elseif ( 'option' === $format ) {
		$selected_attr = $selected ? " selected='selected'" : '';
		$link_html     = "\t<option value='$url'$selected_attr>$before $text $after</option>\n";
	} elseif ( 'html' === $format ) {
		$after = str_replace('&nbsp;(', '<span class="count">', $after);
		$after = str_replace(')', '</span>', $after);
		$link_html = "\t<li>$before<a href='$url'$aria_current>$text</a>$after</li>\n";
	} else { // Custom.
		$link_html = "\t$before<a href='$url'$aria_current>$text</a>$after\n";
	}
	return $link_html;
}