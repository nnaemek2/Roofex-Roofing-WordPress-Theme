( function( $ ) {

    var pxl_widget_tabs_handler = function( $scope, $ ) {
        $('.pxl-tabs6 .pxl-item--title ').each(function(){
            $(this).removeClass('active');
        });
        $('.pxl-tabs6 .pxl-item--title:nth-child(1)').addClass('active');
        $scope.find(".pxl-tabs.tab-effect-slide .pxl-item--title").on("click", function(e){
            e.preventDefault();
            var target = $(this).data("target");
            var parent = $(this).parents(".pxl-tabs");
            parent.find(".pxl-tabs--content .pxl-item--content").slideUp(300);
            parent.find(".pxl-tabs--title .pxl-item--title").removeClass('active');
            $(this).addClass("active");
            $(target).slideDown(300);
            parent.find(".pxl-tabs--content .pxl-item--content").css({ opacity: "1" });
        });

        $scope.find(".pxl-tabs.tab-effect-fade .pxl-item--title").on("click", function(e){
            e.preventDefault();
            var target = $(this).data("target");
            var parent = $(this).parents(".pxl-tabs");
            parent.find(".pxl-tabs--content .pxl-item--content").removeClass("active");
            parent.find(".pxl-tabs--title .pxl-item--title").removeClass('active');
            $(this).addClass("active");
            $(target).addClass("active");
        });
    };
    
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_tabs.default', pxl_widget_tabs_handler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_tab_services.default', pxl_widget_tabs_handler );
    } );

} )( jQuery );
