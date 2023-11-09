<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * dessau_select_header_meta hook
	 *
	 * @see dessau_select_header_meta() - hooked with 10
	 * @see dessau_select_user_scalable_meta - hooked with 10
	 * @see dessau_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'dessau_select_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * dessau_select_after_body_tag hook
	 *
	 * @see dessau_select_get_side_area() - hooked with 10
	 * @see dessau_select_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'dessau_select_after_body_tag' ); ?>

    <div class="qodef-wrapper">
        <div class="qodef-wrapper-inner">
            <?php
            /**
             * dessau_select_after_wrapper_inner hook
             *
             * @see dessau_select_get_header() - hooked with 10
             * @see dessau_select_get_mobile_header() - hooked with 20
             * @see dessau_select_back_to_top_button() - hooked with 30
             * @see dessau_select_get_header_minimal_full_screen_menu() - hooked with 40
             * @see dessau_select_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'dessau_select_after_wrapper_inner' ); ?>
	        
            <div class="qodef-content" <?php dessau_select_content_elem_style_attr(); ?>>
                <div class="qodef-content-inner">