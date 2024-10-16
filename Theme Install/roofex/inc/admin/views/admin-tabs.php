<?php 
	$dashboard_page_url = admin_url( 'admin.php?page=pxlart' );
	if( isset( $_GET['page'] ) && 'pxlart' === sanitize_text_field($_GET['page']) ) {
		$dashboard_page_url = '';
	}
	$plugin_page_url = admin_url( 'admin.php?page=pxlart-plugins' );
	$import_demos_page_url = admin_url( 'admin.php?page=pxlart-import-demos' );

	$pxl_server_info = apply_filters( 'pxl_server_info', 
		[
			'video_url' => 'https://doc.casethemes.net/video-guide/',
			'demo_url' => 'https://demo.casethemes.net/',
			'docs_url' => 'https://doc.casethemes.net/', 
			'support_url' => 'https://casethemes.freshdesk.net/support/home'] 
		) ; 
?>
<nav class="pxl-dsb-menubar">
	<?php 
	$favicon = roofex()->get_theme_opt( 'favicon' );
	$logo_url = !empty($favicon['url']) ? $favicon['url'] : get_template_directory_uri() . '/inc/admin/assets/img/logo.png'; ?>
	<div class="pxl-dsb-logo">
		<div class="pxl-dsb-logo-inner">
			<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr( roofex()->get_name() ); ?>">
		</div>
		<div class="pxl-dsb-logo-title">
			<h2><?php esc_html_e( 'Welcome to', 'roofex' ); ?> <?php echo esc_attr( roofex()->get_name() ).'!'; ?></h2>
			<span class="pxl-v"><?php esc_html_e( 'Version', 'roofex' ); ?> <?php echo esc_html(roofex()->get_version()) ?></span>
		</div>
	</div>
	<div class="pxl-dsb-menu">
		<ul class="pxl-dsb-menu-left">
			<li class="<?php echo ( isset( $_GET['page'] ) && 'pxlart' === sanitize_text_field($_GET['page']) ) ? 'is-active' : ''; ?>">
				<a href="<?php echo esc_attr($dashboard_page_url); ?>">
					<span><?php echo sprintf( esc_html__( '%s Dashboard', 'roofex' ), roofex()->get_name()); ?></span>
				</a>
			</li>
			<li class="<?php echo ( isset( $_GET['page'] ) && 'pxlart-plugins' === sanitize_text_field($_GET['page']) ) ? 'is-active' : ''; ?>">
				<a href="<?php echo esc_url($plugin_page_url); ?>">
					<span><?php esc_html_e( 'Install Plugins', 'roofex' ); ?></span>
				</a>
			</li>
			<li class="<?php echo ( isset( $_GET['page'] ) && 'pxlart-import-demos' === sanitize_text_field($_GET['page']) ) ? 'is-active' : ''; ?>">
				<a href="<?php echo esc_url($import_demos_page_url); ?>">
					<span><?php esc_html_e( 'Import Demo', 'roofex' ); ?></span>
				</a>
			</li>
		</ul>
		<ul class="pxl-dsb-menu-right">
			<li>
				<a href="#link" target="_blank">
					<span><?php esc_html_e( 'Videos tutorial', 'roofex' ); ?></span>
				</a>
			</li>
			<li>
				<a href="https://casethemes.ticksy.com/" target="_blank">
					<span><?php esc_html_e( 'Support system', 'roofex' ); ?></span>
				</a>
			</li>
			<li>
				<a href="https://demo.casethemes.net/roofex/" target="_blank">
					<span><?php esc_html_e( 'Live Demo', 'roofex' ); ?></span>
				</a>
			</li>
			 
			<li>
				<a href="https://doc.casethemes.net/roofex/" target="_blank">
					<i class="pxl-icn-ess icon-md-help-circle"></i>
					<span><?php esc_html_e( 'Documentations', 'roofex' ); ?></span>
				</a>
			</li>
		</ul>
	</div>
</nav> 
