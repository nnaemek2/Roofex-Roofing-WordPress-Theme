<?php $html_id = pxl_get_element_id($settings); 
if(isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])): 
    $tab_bd_ids = [];
?>
<div class="pxl-tabs pxl-tabs5 <?php echo esc_attr($settings['tab_effect'].' '.$settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <div class="wrap-title">
            <div class="pxl-tabs--title">
                <?php foreach ($settings['tabs'] as $key1 => $value) : 
                    $icon_key = $widget->get_repeater_setting_key( 'pxl_icon_tab', 'icons', $key1 );
                    $widget->add_render_attribute( $icon_key, [
                        'class' => $value['pxl_icon_tab'],
                        'aria-hidden' => 'true',
                    ] );
                    ?>
                    <div class="pxl-item--title <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$value['_id']); ?>">
                        <div class="wrap-icon-tab">
                            <div class="icon-tab">
                               <?php if(!empty($value['pxl_icon_tab'])){
                                \Elementor\Icons_Manager::render_icon( $value['pxl_icon_tab'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
                            } ?> 
                            </div>
                            <div class="title-tab">
                                <?php echo pxl_print_html($value['title']); ?>
                            </div> 
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="pxl-tabs--content">
            <?php foreach ($settings['tabs'] as $key => $content) : ?>
                <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?> <?php if($content['content_type'] == 'template') { echo 'pxl-tabs--elementor'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                    <?php if($content['content_type'] && !empty($content['desc'])) {
                        echo pxl_print_html($content['desc']); 
                    } elseif(!empty($content['content_template'])) {
                        $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template']);
                        $tab_bd_ids[] = (int)$content['content_template'];
                        pxl_print_html($tab_content);
                    } ?>        
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>