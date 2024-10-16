<?php if($settings['style'] != 'form') : ?>
	<div class="pxl-cart-popup-button <?php echo esc_attr($settings['style']); ?>">
		<?php if(!empty($settings['pxl_icon']['value'])) {
			\Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
		} else { ?>
			<i class="far fa-cart"></i>
		<?php } ?>
	</div>
<?php endif; ?>
<?php  add_action( 'pxl_anchor_target', 'roofex_hook_anchor_cart'); ?>