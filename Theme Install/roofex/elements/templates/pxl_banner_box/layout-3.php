<div class="pxl-banner pxl-banner3 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-banner-inner">
		<?php if(!empty($settings['banner_image']['id'])) : 
			$img = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image']['id'],
				'thumb_size' => '427x639',
			));
			$thumbnail = $img['thumbnail'];
			?>
			<div class="pxl-item--image">
				<?php echo pxl_print_html($thumbnail); ?>
			</div>
		<?php endif; ?>
		<?php if(!empty($settings['banner_image2']['id'])) : 
			$img2 = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image2']['id'],
				'thumb_size' => '200x351',
			));
			$thumbnail2 = $img2['thumbnail'];
			?>
			<div class="pxl-item--image2">
				<?php echo pxl_print_html($thumbnail2); ?>
			</div>
		<?php endif; ?>
		<div class="pxl-item--meta">
			<?php if(!empty($settings['banner_title'])) : ?>
				<div class="pxl-item--title">
					<?php if(!empty($settings['banner_number'])) : ?>
						<span class="pxl--counter-number">
							<span class="pxl--counter-value" data-duration="2000" data-to-value="<?php echo esc_attr($settings['banner_number']); ?>" data-delimiter="">1</span>
							<span class="pxl--counter-suffix el-empty"><?php echo esc_attr($settings['banner_number_suffix']); ?></span>
						</span><br/>
					<?php endif; ?>
					<?php echo esc_attr($settings['banner_title']); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>