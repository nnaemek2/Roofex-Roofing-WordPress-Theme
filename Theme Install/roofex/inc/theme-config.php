<?php
// make some configs
if(!function_exists('roofex_configs')){
    function roofex_configs($value){
         
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'roofex').' ('.roofex()->get_opt('primary_color', '#d13f18').')', 
                    'value' => roofex()->get_opt('primary_color', '#d13f18')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'roofex').' ('.roofex()->get_opt('secondary_color', '#000000').')', 
                    'value' => roofex()->get_opt('secondary_color', '#000000')
                ],
                'regular'   => [
                    'title' => esc_html__('Regular', 'roofex').' ('.roofex()->get_opt('regular_color', '#d13f18').')', 
                    'value' => roofex()->get_opt('regular_color', '#d13f18')
                ],
            ],
            'link' => [
                'color' => roofex()->get_opt('link_color', ['regular' => '#000000'])['regular'],
                'color-hover'   => roofex()->get_opt('link_color', ['hover' => '#d13f18'])['hover'],
                'color-active'  => roofex()->get_opt('link_color', ['active' => '#d13f18'])['active'],
            ],
            'gradient' => [
                'color-from' => roofex()->get_opt('gradient_color', ['from' => '#8d4cfa'])['from'],
                'color-to' => roofex()->get_opt('gradient_color', ['to' => '#5f6ffb'])['to'],
            ],
        ];
        return $configs[$value];
    }
}
if(!function_exists('roofex_inline_styles')) {
    function roofex_inline_styles() {  
        $theme_colors      = roofex_configs('theme_colors');
        $link_color        = roofex_configs('link');
        $gradient_color        = roofex_configs('gradient');
         
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  roofex_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            } 
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            } 
        echo '}';

        return ob_get_clean();
         
    }
}
 