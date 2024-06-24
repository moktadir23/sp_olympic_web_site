<?php
    function sportsmag_remove_parent_actions() {
        remove_action( 'wp_enqueue_scripts', 'accesspress_mag_dynamic_color' );
    }
    add_action( 'init', 'sportsmag_remove_parent_actions' );

    function sportsmag_dynamic_color() {
    	$custom_css = '';
    
    	$tpl_color = of_get_option( 'template_color', '#00964C' );
    
        if( $tpl_color ) {
            
            $color_arr = sportsmag_hex2rgb( $tpl_color );
            
            /** Background Color **/
            $custom_css .= "
                .top-menu-wrapper .apmag-container,
                .top-menu-wrapper,
                .ticker-title,
                .bread-you,
                .entry-meta .post-categories li a,
                .navigation .nav-links a, .bttn, button,
                input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"],
                .ak-search .search-form .search-submit{
                    background: {$tpl_color}; 
                }";
                
            /** 0.61 Background Color **/
            $custom_css .= "
                .grid-small-post:hover .big-meta a.post-category,
                .grid-big-post:hover .big-meta a.post-category,
                .big-image-overlay i{
                    background: rgba({$color_arr[0]}, {$color_arr[1]}, {$color_arr[2]}, 0.61);
                }";
                
            /** 0.53 Background Color **/
            $custom_css .= "
                #back-top,
                .ak-search .search-form{
                    background: rgba({$color_arr[0]}, {$color_arr[1]}, {$color_arr[2]}, 0.53);
                }";
                
            /** Color **/
            $custom_css .= "
                .search-icon > i:hover,
                .block-post-wrapper .post-title a:hover,
                .random-posts-wrapper .post-title a:hover,
                .sidebar-posts-wrapper .post-title a:hover,
                .review-posts-wrapper .single-review .post-title a:hover,
                .latest-single-post a:hover, .post-extra-wrapper .single-post-on a,
                .author-metabox .author-title, .widget ul li:hover a, .widget ul li:hover:before,
                .logged-in-as a,
                a:hover, a.active, a.focus, .bottom-footer .ak-info a:hover,
                .widget_categories ul li:hover{
                    color: {$tpl_color}; 
                }";
                
            /** Border Color **/
            $custom_css .= "
                .navigation .nav-links a, .bttn, button,
                input[type=\"button\"], input[type=\"reset\"],
                input[type=\"submit\"]{
                    border-color: {$tpl_color} 
                }";
                
            /** Border Left Color **/
            $custom_css .= "
                .ticker-title:before{
                    border-left-color: {$tpl_color};    
                }";
                
        }
        
        wp_add_inline_style( 'accesspress-mag-style', $custom_css );
    }
    
    add_action( 'wp_enqueue_scripts', 'sportsmag_dynamic_color', 100 );
    
    function sportsmag_hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }