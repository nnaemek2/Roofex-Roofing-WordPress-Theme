<?php

$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('post', [
	'source' => $source,
	'orderby' => $orderby,
	'order' => $order,
	'limit' => $limit,
	'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
	$col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

$img_size = $widget->get_setting('img_size');
$show_author = $widget->get_setting('show_author');
$show_comment = $widget->get_setting('show_comment');
$show_date = $widget->get_setting('show_date');
$show_category = $widget->get_setting('show_category');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');

$opts = [
	'slide_direction'               => 'horizontal',
	'slide_percolumn'               => '1', 
	'slide_percolumnfill'           => '1', 
	'slide_mode'                    => 'slide', 
	'slides_to_show'                => $col_xl,
	'slides_to_show_xxl'             => $col_xxl,  
	'slides_to_show_lg'             => $col_lg, 
	'slides_to_show_md'             => $col_md, 
	'slides_to_show_sm'             => $col_sm, 
	'slides_to_show_xs'             => $col_xs, 
	'slides_to_scroll'              => $slides_to_scroll,  
	'slides_gutter'                 => 30, 
	'arrow'                         => $arrows,
	'pagination'                    => $pagination,
	'pagination_type'               => $pagination_type,
	'autoplay'                      => $autoplay,
	'pause_on_hover'                => $pause_on_hover,
	'pause_on_interaction'          => 'true',
	'delay'                         => $autoplay_speed,
	'loop'                          => $infinite,
	'speed'                         => $speed
];

$widget->add_render_attribute( 'carousel', [
	'class'         => 'pxl-swiper-container',
	'dir'           => is_rtl() ? 'rtl' : 'ltr',
	'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
	<div class="pxl-swiper-sliders pxl-post-carousel pxl-post-carousel6 pxl-swiper-boxshadow">
		<div class="pxl-carousel-inner">
			<div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
				<div class="pxl-swiper-wrapper">
					<?php
					$image_size = !empty($img_size) ? $img_size : '740x500';
					foreach ($posts as $post):
						$img_id       = get_post_thumbnail_id( $post->ID );
						$author = get_user_by('id', $post->post_author); 
						if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
							$img          = pxl_get_image_by_size( array(
								'attach_id'  => $img_id,
								'thumb_size' => $image_size
							) );
						$thumbnail    = $img['thumbnail'];
						?>
						<div class="pxl-swiper-slide">
							<div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
								<?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
								<div class="pxl-item--image hover-imge-effect2">
									<a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
								</div>
							<?php endif; ?>
							<div class="entry-body">
								<div class="post-meta-top">
									<?php if($show_category == 'true'): ?>
										<div class="pxl-item--category">
											<img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/tag.png'); ?>" alt="<?php echo esc_attr__('tag', 'roofex'); ?>" />
											<?php the_terms( $post->ID, 'category', '', ' ' ); ?>
										</div>
									<?php endif; ?>
									<?php if($show_comment == 'true'): ?>
										<div class="pxl-item--comment">	
											<img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/cm.png'); ?>" alt="<?php echo esc_attr__('comment', 'roofex'); ?>" />
											<a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo comments_number(esc_html__('No Comments', 'roofex'),esc_html__(' 1 Comment', 'roofex'),esc_html__('% Comments', 'roofex'),$post->ID); ?></a>
										</div>
									<?php endif; ?>
								</div>
								<h3 class="pxl-item--title">
									<a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
								</h3>
								
								<?php if($show_excerpt == 'true'): ?>
									<div class="item--content">
										<?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
									</div>
								<?php endif; ?>
								<div class="post-meta-bottom">
									<div class="content-left">
										<i class="flaticon-roof-2"></i>
									</div>
									<div class="content-right">
										<?php if($show_author == 'true'): ?>
											<div class="pxl-item--author">
												<a class="pxl-inline-flex" href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>">
													<span class="by">by</span> <span><?php echo esc_html($author->display_name); ?></span>
												</a>
											</div>
										<?php endif; ?>
										<?php if($show_date == 'true' ) : ?>
											<div class="pxl-item--date ">
												<?php $date_formart = get_option('date_format'); echo get_the_date('jS F,Y', $post->ID); ?>                                          
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div> 
	</div>
	<?php if($arrows !== 'false'): 
		$mouse_move_animation = roofex()->get_theme_opt('mouse_move_animation', false); 
		?>
		<div class="pxl-swiper-arrow pxl-swiper-arrow-prev <?php if($mouse_move_animation) { echo 'pxl-mouse-effect'; } ?>" data-cursor-label="<?php echo esc_html('Prev', 'roofex'); ?>"><i class="caseicon-angle-arrow-left"></i></div>
		<div class="pxl-swiper-arrow pxl-swiper-arrow-next <?php if($mouse_move_animation) { echo 'pxl-mouse-effect'; } ?>" data-cursor-label="<?php echo esc_html('Next', 'roofex'); ?>"><i class="caseicon-angle-arrow-right"></i></div>
	<?php endif; ?>
	<?php if($pagination !== 'false'): ?>
		<div class="pxl-swiper-dots"></div>
	<?php endif; ?>
</div>
</div>
<?php endif; ?>