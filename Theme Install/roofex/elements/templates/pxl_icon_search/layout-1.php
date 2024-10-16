<?php if($settings['style'] != 'form') : ?>
	<div class="pxl-search-popup-button <?php echo esc_attr($settings['style']); ?>">
		<?php if(!empty($settings['pxl_icon']['value'])) {
			\Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
		} else { ?>
			<i class="far fa-search"></i>
		<?php } ?>
	</div>
<?php endif; ?>
<?php if($settings['style'] == 'form') : ?>
	<div class="pxl-header-search-form pxl-search-form2">
		<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
			<input type="text" placeholder="<?php esc_attr_e('Search keywords...', 'roofex'); ?>" name="s" class="search-field" />
			<button type="submit" class="search-submit"><i class="far fa-search"></i></button>
		</form>
	</div>
<?php endif; ?>

<?php  add_action( 'pxl_anchor_target', 'roofex_hook_anchor_search'); ?>