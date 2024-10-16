( function( $ ) {

    function roofex_section_start_render(){
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter( 'pxl_section_start_render', function( html, settings, el ) {
            if(typeof settings.pxl_parallax_bg_img != 'undefined' && settings.pxl_parallax_bg_img.url != ''){
                html += '<div class="pxl-section-bg-parallax"></div>';
            }
            return html;
        } );
    } 

    $( window ).on( 'elementor/frontend/init', function() {
        roofex_section_start_render();
    } );

} )( jQuery );

(function ($) {
    $(window).on('load', function() {
        var styleElem1 = document.head.appendChild(document.createElement("style"));
        var styleElem2 = document.head.appendChild(document.createElement("style"));
        var styleElem3 = document.head.appendChild(document.createElement("style"));
        var styleElem4 = document.head.appendChild(document.createElement("style"));
        styleElem1.innerHTML = ".pxl-load:before {width:0; }";
        styleElem2.innerHTML = ".pxl-load:after {width:0;}";
    });
})(jQuery);