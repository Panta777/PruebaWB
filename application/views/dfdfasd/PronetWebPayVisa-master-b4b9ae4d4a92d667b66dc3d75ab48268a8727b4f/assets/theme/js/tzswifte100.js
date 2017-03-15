jQuery(document).ready(function(){
    "use strict";

    // loading
    jQuery('body').jpreLoader({
        splashID: "#jSplash",
        loaderVPos: '0',
        autoClose: true,
        closeBtnText: "",
        showPercentage:false,
        showSplash: false
    });

    jQuery('.tz_icon_search').on('click',function(){
        jQuery('.tz-header-search-form').addClass('tz-header-search-form-show');
        jQuery('.tz_icon_search').css('display','none');
        jQuery('.tz_icon_close').css('display','block');
    });
    jQuery('.icon_close').on('click',function(){
        jQuery('.tz-header-search-form').removeClass('tz-header-search-form-show');
        jQuery('.tz_icon_search').css('display','block');
        jQuery('.tz_icon_close').css('display','none');
    });
}) ;

/**
 * method for menu
 */
jQuery(window).scroll(function(){
    "use strict";

    var $_scrollTop = jQuery(window).scrollTop();

    var $_height = jQuery('.tz-headerTop').height();

    if ($_scrollTop > 0) {
        jQuery('.tz-header-type-3 .tz-headerBottom').addClass('tz-homeEff');
		jQuery('.tz-header-type-1 .tz-headerTop').addClass('tz-homeEff-1');
    } else {
        jQuery('.tz-header-type-3 .tz-headerBottom').removeClass('tz-homeEff');
		jQuery('.tz-header-type-1 .tz-headerTop').removeClass('tz-homeEff-1');
    }

    if($_scrollTop > $_height){
        jQuery('.tz-header-type-1 .tz-headerBottom').addClass('tz-homeEff-1');
        jQuery('.tz-header-type-2 .tz-headerBottom').addClass('tz-homeEff-1');

    }else{
        jQuery('.tz-header-type-1 .tz-headerBottom').removeClass('tz-homeEff-1');
        jQuery('.tz-header-type-2 .tz-headerBottom').removeClass('tz-homeEff-1');
    }

    var $_height_slide = jQuery('.tz-header-slide').height();

    if($_scrollTop > $_height_slide){
        jQuery('.tz-header-type-4 .tz-headerBottom').addClass('tz-homeEff-1');
    }else{
        jQuery('.tz-header-type-4 .tz-headerBottom').removeClass('tz-homeEff-1');
    }

});