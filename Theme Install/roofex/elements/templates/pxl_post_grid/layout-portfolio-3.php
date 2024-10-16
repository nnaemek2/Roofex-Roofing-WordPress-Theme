<?php
$html_id = pxl_get_element_id($settings);
$tax = array();
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
extract(pxl_get_posts_of_grid(
    'portfolio', 
    ['source' => $source, 'orderby' => $orderby, 'order' => $order, 'limit' => $limit, 'post_ids' => $post_ids],
    ['portfolio-category']
));
$filter_default_title = $widget->get_setting('filter_default_title', 'All');
if($settings['col_xl'] == '5') {
    $col_xl = 'pxl5';
} else {
    $col_xl = 12 / intval($widget->get_setting('col_xl', 4));
}

$col_lg = 12 / intval($widget->get_setting('col_lg', 4));
$col_md = 12 / intval($widget->get_setting('col_md', 3));
$col_sm = 12 / intval($widget->get_setting('col_sm', 2));
$col_xs = 12 / intval($widget->get_setting('col_xs', 1));
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

$grid_class = '';
$grid_class = 'pxl-grid-inner pxl-grid-masonry row';

$filter = $widget->get_setting('filter', 'false');
$filter_alignment = $widget->get_setting('filter_alignment', 'center');
$pagination_type = $widget->get_setting('pagination_type', 'pagination');

$post_type = $widget->get_setting('post_type', 'portfolio');
$layout = $widget->get_setting('layout_'.$post_type, 'portfolio-1');


$show_category = $widget->get_setting('show_category');
$img_size = $widget->get_setting('img_size');
$grid_masonry = $widget->get_setting('grid_masonry');
$pxl_animate = $widget->get_setting('pxl_animate');

$show_cat_count = '1';

$load_more = array(  
    'post_type'       => $post_type,   
    'layout'          => $layout,
    'startPage'       => $paged,
    'maxPages'        => $max,
    'total'           => $total,
    'perpage'         => $limit,
    'nextLink'        => $next_link,
    'source'          => $source,
    'orderby'         => $orderby,
    'order'           => $order,
    'limit'           => $limit,
    'post_ids'        => $post_ids,
    'col_xl'          => $col_xl,
    'col_lg'          => $col_lg,
    'col_md'          => $col_md,
    'col_sm'          => $col_sm,
    'col_xs'          => $col_xs,
    'pagination_type' => $pagination_type,
    'show_category'     => $show_category,
    'img_size'        => $img_size,
    'grid_masonry'    => $grid_masonry,
    'pxl_animate'    => $pxl_animate,
    'filter'    => $filter,
    'filter_default_title'    => $filter_default_title,
    'show_cat_count'    => $show_cat_count,
    'tax'       => ['portfolio-category'], 
);
?>

<div id="<?php echo esc_attr($html_id) ?>" class="pxl-grid pxl-portfolio-grid pxl-portfolio-grid-layout3" data-layout="masonry" data-start-page="<?php echo esc_attr($paged); ?>" data-max-pages="<?php echo esc_attr($max); ?>" data-total="<?php echo esc_attr($total); ?>" data-perpage="<?php echo esc_attr($limit); ?>" data-next-link="<?php echo esc_attr($next_link); ?>">
    <?php if ($select_post_by == 'term_selected' && $filter == "true"): ?>
        <div class="pxl-grid-filter pxl-grid-filter4">
            <div class="pxl--filter-inner">
                <span class="filter-item active" data-filter="*">
                    <?php echo esc_html($filter_default_title); ?>
                    <?php if($show_cat_count == '1'): ?>
                        <span class="filter-item-count">
                            <?php
                            if ((count($posts)>0) && (count($posts)<10) ) {
                                echo '0'.count($posts); 
                            } else{
                                echo count($posts); 
                            }
                            ?>
                        </span> 
                    <?php endif; ?>
                </span>
                <?php foreach ($categories as $category):
                    $category_arr = explode('|', $category);
                    $term = get_term_by('slug',$category_arr[0], $category_arr[1]);
                    $tax_count = 0;
                    foreach ($posts as $key => $post){
                        $this_terms = get_the_terms( $post->ID, 'portfolio-category' );
                        $term_list = [];
                        foreach ($this_terms as $t) {
                            $term_list[] = $t->slug;
                        } 
                        if(in_array($term->slug,$term_list))
                            $tax_count++;
                    } 
                    if($tax_count > 0): ?>
                        <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                            <?php echo esc_html($term->name); ?>
                            <?php if($show_cat_count == '1'): ?>
                                <span class="filter-item-count">
                                    <?php
                                    if (($tax_count>0) && ($tax_count<10) ) {
                                        echo '0'.esc_html($tax_count); 
                                    } else {
                                        echo esc_html($tax_count); 
                                    }
                                    ?>
                                </span> 
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="<?php echo esc_attr($grid_class); ?>" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php roofex_get_post_grid($posts, $load_more); ?>
    </div>
    <?php   

    if ($pagination_type == 'pagination') { ?>
        <div class="pxl-grid-pagination" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-query="<?php echo esc_attr(json_encode($args)); ?>">
            <?php roofex()->page->get_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $pagination_type == 'loadmore') { ?>
        <div class="pxl-load-more" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>">
            <span class="btn pxl-btn-effect1">
                <?php echo esc_html__('Explore More', 'roofex') ?>
                <i class="flaticon-right-arrow-1"></i>
            </span>
        </div>
    <?php } ?>
</div>