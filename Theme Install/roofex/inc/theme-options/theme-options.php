<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = roofex()->get_option_name();
$version = roofex()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'roofex'),
    'page_title'           => esc_html__('Theme Options', 'roofex'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', //class_exists('roofex_Admin_Page') ? 'case' : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'roofex'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'roofex'),
            'default'  => '',
            'url'      => false
        ),
        array(
            'id'       => 'mouse_move_animation',
            'type'     => 'switch',
            'title'    => esc_html__('Mouse Move Animation', 'roofex'),
            'default'  => false
        ),
        array(
            'id'       => 'site_loader',
            'type'     => 'switch',
            'title'    => esc_html__('Loader', 'roofex'),
            'default'  => false
        ),
        array(
            'id'    => 'loader_style',
            'type'  => 'select',
            'title' => esc_html__('Loader Style', 'roofex'),
            'options' => [
                'loader-1'           => esc_html__('Style 1', 'roofex'),
                'loader-2'           => esc_html__('Style 2', 'roofex'),
                'loader-3'           => esc_html__('Style 3', 'roofex'),
                'loader-4'           => esc_html__('Style 4', 'roofex'),
                'default'           => esc_html__('Default', 'roofex'),
            ],
            'default' => 'loader-1',
            'indent' => true,
            'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
        ),
    )
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'roofex'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'roofex'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'roofex'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'regular_color',
            'type'        => 'color',
            'title'       => esc_html__('Regular Color', 'roofex'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color', 'roofex'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'roofex'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        roofex_header_opts(),
        array(
            array(
                'id'       => 'sticky_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Sticky Scroll', 'roofex'),
                'options'  => array(
                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'roofex'),
                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'roofex'),
                ),
                'default'  => 'pxl-sticky-stb',
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'roofex'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_m',
            'type'     => 'media',
            'title'    => esc_html__('Select Logo', 'roofex'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/img/logo.png'
            ),
            'url'      => false
        ),
        array(
            'id'       => 'logo_height',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Height', 'roofex'),
            'width'    => false,
            'unit'     => 'px',
            'output'    => array('#pxl-header-default .pxl-header-branding img, .pxl-logo-mobile img'),
        ),
        array(
            'id'       => 'search_mobile',
            'type'     => 'switch',
            'title'    => esc_html__('Search Form', 'roofex'),
            'default'  => true
        )
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'roofex'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array_merge(
        roofex_page_title_opts() 
    )
));


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'roofex'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        roofex_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'roofex'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_fixed',
                'type'     => 'switch',
                'title'    => esc_html__('Footer Fixed', 'roofex'),
                'default'  => false,
            )
        ) 
    )
    
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'roofex'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array_merge(
        roofex_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_categorie',
                'title'    => esc_html__('Category', 'roofex'),
                'subtitle' => esc_html__('Display the Category for each blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'roofex'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_author',
                'title'    => esc_html__('Author', 'roofex'),
                'subtitle' => esc_html__('Display the Category for each blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true,
            ),
            
            array(
                'id'      => 'archive_excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Length', 'roofex'),
                'default' => '',
                'subtitle' => esc_html__('Default: 50', 'roofex'),
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'roofex'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'roofex'),
            )
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'roofex'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array_merge(
        roofex_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            array(
                'id'       => 'post_date',
                'title'    => esc_html__('Date', 'roofex'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_comments',
                'title'    => esc_html__('comments', 'roofex'),
                'subtitle' => esc_html__('Display the comments for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author_meta',
                'title'    => esc_html__('Author Meta', 'roofex'),
                'subtitle' => esc_html__('Display the Author Meta for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'post_author',
                'title'    => esc_html__('Author', 'roofex'),
                'subtitle' => esc_html__('Display the Author for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_comments',
                'title'    => esc_html__('Comment Meta', 'roofex'),
                'subtitle' => esc_html__('Display the Comment in Meta for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_category',
                'title'    => esc_html__('Categories', 'roofex'),
                'subtitle' => esc_html__('Display the Category for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_tag',
                'title'    => esc_html__('Tags', 'roofex'),
                'subtitle' => esc_html__('Display the Tag for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_navigation',
                'title'    => esc_html__('Navigation', 'roofex'),
                'subtitle' => esc_html__('Display the Navigation for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'post_related',
                'title'    => esc_html__('Related Post', 'roofex'),
                'subtitle' => esc_html__('Display the Navigation for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'post_author_box_info',
                'title'    => esc_html__('Author', 'roofex'),
                'subtitle' => esc_html__('Display the Author for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'      => 'post_author_pos',
                'type'    => 'text',
                'title'   => esc_html__('Position Author', 'roofex'),
                'default' => '',
            ),
            array(
                'id'      => 'link_fb',
                'type'    => 'text',
                'title'   => esc_html__('Link Facebook Author', 'roofex'),
                'default' => '',
            ),
            array(
                'id'      => 'link_tw',
                'type'    => 'text',
                'title'   => esc_html__('Link Twitter Author', 'roofex'),
                'default' => '',
            ),
            array(
                'id'      => 'link_dribble',
                'type'    => 'text',
                'title'   => esc_html__('Link Dribbble Author', 'roofex'),
                'default' => '',
            ),
            array(
                'id'      => 'link_be',
                'type'    => 'text',
                'title'   => esc_html__('Link Behance Author', 'roofex'),
                'default' => '',
            ),
            array(
                'id'      => 'link_grid',
                'type'    => 'text',
                'title'   => esc_html__('Blog Grid Link', 'roofex'),
                'default' => '',
            ),
            array(
                'title' => esc_html__('Social', 'roofex'),
                'type'  => 'section',
                'id' => 'social_section',
                'indent' => true,
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Social', 'roofex'),
                'subtitle' => esc_html__('Display the Social Share for blog post.', 'roofex'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'social_facebook',
                'title'    => esc_html__('Facebook', 'roofex'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_twitter',
                'title'    => esc_html__('Twitter', 'roofex'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_pinterest',
                'title'    => esc_html__('Pinterest', 'roofex'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_linkedin',
                'title'    => esc_html__('LinkedIn', 'roofex'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
        )
)
));

/*--------------------------------------------------------------
# Woocommerce
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    // Redux::setSection($opt_name, array(
    //     'title' => esc_html__('Woocommerce', 'roofex'),
    //     'icon'  => 'el el-shopping-cart',
    //     'fields'     => array_merge(
    //         roofex_sidebar_pos_opts([ 'prefix' => 'shop_']),
    //         array(
    //             array(
    //                 'id'       => 'shop_display_type',
    //                 'type'     => 'button_set',
    //                 'title'    => esc_html__('Display Type', 'roofex'),
    //                 'options'  => array(
    //                     'grid' => esc_html__('Grid', 'roofex'),
    //                     'list' => esc_html__('List', 'roofex'),
    //                 ),
    //                 'default'  => 'grid'
    //             ),
    //             array(
    //                 'title'         => esc_html__('Products displayed per row', 'roofex'),
    //                 'id'            => 'products_columns',
    //                 'type'          => 'slider',
    //                 'subtitle'      => esc_html__('Number product to show per row', 'roofex'),
    //                 'default'       => 3,
    //                 'min'           => 2,
    //                 'step'          => 1,
    //                 'max'           => 6,
    //                 'display_value' => 'text'
    //             ),
    //             array(
    //                 'title'         => esc_html__('Products displayed per page', 'roofex'),
    //                 'id'            => 'product_per_page',
    //                 'type'          => 'slider',
    //                 'subtitle'      => esc_html__('Number product to show', 'roofex'),
    //                 'default'       => 9,
    //                 'min'           => 3,
    //                 'step'          => 1,
    //                 'max'           => 50,
    //                 'display_value' => 'text'
    //             ),
    //         )
    //     )
    // ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Product', 'roofex'),
        'icon'       => 'el el-shopping-cart',
        'subsection' => true,
        'fields'     => array_merge(
            roofex_sidebar_pos_opts([ 'prefix' => 'product_']),
            array(
                array(
                    'id'       => 'product_related',
                    'title'    => esc_html__('Product Related', 'roofex'),
                    'subtitle' => esc_html__('Show/Hide related product', 'roofex'),
                    'type'     => 'switch',
                    'default'  => '1',
                ),    
            )
        )
    ));
}
/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'roofex'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body', 'roofex'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
           // 'output'      => array('body'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 1', 'roofex'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            //'output'      => array('h1'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 2', 'roofex'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            //'output'      => array('h2'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 3', 'roofex'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            //'output'      => array('h3'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 4', 'roofex'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            //'output'      => array('h4'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 5', 'roofex'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
           // 'output'      => array('h5'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 6', 'roofex'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
           // 'output'      => array('h6'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'theme_default',
            'type'        => 'typography',
            'title'       => esc_html__('Theme Default', 'roofex'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'color'  => false,
            'font-style'  => false,
            'font-weight'  => false,
            'text-align'  => false,
            'units'       => 'px',
        ),
    )
));