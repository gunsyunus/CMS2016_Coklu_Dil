jQuery(document).ready(function(){
        var width = jQuery('.product-view .product-img-box').width() * 0.99;
        var src_img_width = 60;
        var src_img_height = 85;
        var ratio_width = 400;
        var ratio_height = 480;
        
        src_img_width = 100 * ratio_width / ratio_height;
        var height = width * ratio_height / ratio_width;

        jQuery('#galleryproduct').cloud_zoom({
            thumb_image_width: width,
            thumb_image_height: height,
            source_image_width: src_img_width,
            source_image_height: src_img_height,
            zoom_area_width: width,
            zoom_area_height: height,
            zoom_enable: false,
            smallthumb_hide_single: false,
            smallthumbs_position: 'bottom',
            show_icon: false,
            autoplay: false
        });
        jQuery(".product-img-box .cloud_zoom li.zoom_img").zoom();
        jQuery('.product-view .product-img-box .zoom-control a').css('right',((jQuery('.zoom_small_thumbs img').first().width())/2-3)+"px");
        if(jQuery('.zoom_small_thumbs').width() == 0)
            jQuery('.product-view .product-img-box .zoom-control a').css('right',((jQuery('.zoom_small_thumbs img').first().width())/2-3)+"px");
        jQuery(window).resize(function(e){
            var width = jQuery('.product-view .product-img-box').width() * 0.99;
            var height = width * ratio_height / ratio_width;
            zoom_enabled = false;
            if(jQuery(window).width()<500)
                zoom_enabled = false;
            jQuery('#galleryproduct').cloud_zoom({
                thumb_image_width: width,
                thumb_image_height: height,
                source_image_width: src_img_width,
                source_image_height: src_img_height,
                zoom_area_width: width,
                zoom_area_height: height,
                zoom_enable: zoom_enabled,
                smallthumb_hide_single: false,
                smallthumbs_position: 'bottom',
                show_icon: true,
                autoplay: false
            });
            jQuery('.product-view .product-img-box .zoom-control a').css('right',((jQuery('.zoom_small_thumbs').width())/2)+"px");
        });
        jQuery('.zoom-prev').on('click', function(){
            galleryproduct_previous();
        });

        jQuery('.zoom-next').on('click', function(){
            galleryproduct_next();
        });
});