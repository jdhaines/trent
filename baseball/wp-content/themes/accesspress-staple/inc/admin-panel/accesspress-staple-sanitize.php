<?php
/**
 * SANITIZATION
 * @since 2.0.0
 */       

    /* Sanitization for Image Type */
    function accesspress_staple_sanitize_weblayout($accesspress_staple_input){
        $accesspress_staple_output = array(
           'fullwidth'   => esc_html__( 'Full Width', 'accesspress-staple' ),
            'boxed'       => esc_html__( 'Boxed', 'accesspress-staple' ),
        );
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }

    /* Sanitization for Textarea */     
    function accesspress_staple_sanitize_textarea($accesspress_staple_input){
        return wp_kses_post( force_balance_tags( $accesspress_staple_input ) );
    }

    function accesspress_staple_sanitize_headlayout($accesspress_staple_input){
        $accesspress_staple_output = array(
           'transparent'   => esc_html__( 'Transparent', 'accesspress-staple' ),
            'classic'     => esc_html__( 'Classic', 'accesspress-staple' ),
        );
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }

    function accesspress_staple_sanitize_hdback($accesspress_staple_input){
        $accesspress_staple_output = array(
           'white'   => esc_html__( 'White', 'accesspress-staple' ),
            'black'       => esc_html__( 'Black', 'accesspress-staple' ),
        );
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }

        /* Sanitization for Check Box */
    function accesspress_staple_sanitize_checkbox($accesspress_staple_input){
        if($accesspress_staple_input){
            return 1;
        }else{
            return 0;
        }
    }

    function accesspress_staple_sanitize_log_alg($accesspress_staple_input){
        $accesspress_staple_output = array(
            'left'   => esc_html__( 'Left', 'accesspress-staple' ),
            'right' => esc_html__( 'Right', 'accesspress-staple' ),
            'center' => esc_html__( 'Center', 'accesspress-staple' ),
        );
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }

    function accesspress_staple_sanitize_post_lists($accesspress_staple_input) {
        $accesspress_staple_output = accesspress_staple_post_list();
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }

    function accesspress_staple_sanitize_cat_lists($accesspress_staple_input) {
        $accesspress_staple_output = accesspress_staple_category_lists();
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }

    function accesspress_staple_sanitize_page_lists($accesspress_staple_input) {
        $accesspress_staple_output = accesspress_staple_page_list();
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }

    function accesspress_staple_sanitize_yes_no($accesspress_staple_input){
        $accesspress_staple_output = array(
            'yes'   => esc_html__( 'Yes', 'accesspress-staple' ),
            'no'      => esc_html__( 'No', 'accesspress-staple' ),
        );
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }

    function accesspress_staple_sanitize_show_hide($accesspress_staple_input){
        $accesspress_staple_output = array(
           'show'   => esc_html__( 'Show', 'accesspress-staple' ),
            'hide'    => esc_html__( 'Hide', 'accesspress-staple' ),
        );
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }

    function accesspress_staple_sanitize_grid_list($accesspress_staple_input){
        $accesspress_staple_output = array(
           'grid'   => esc_html__( 'Grid', 'accesspress-staple' ),
           'list'    => esc_html__( 'List', 'accesspress-staple' ),
        );
        if(array_key_exists($accesspress_staple_input,$accesspress_staple_output)){
            return $accesspress_staple_input;
        }else{
            return '';
        }
    }
      