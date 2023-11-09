<?php

if ( ! function_exists( 'dessau_select_like' ) ) {
	/**
	 * Returns DessauSelectLike instance
	 *
	 * @return DessauSelectLike
	 */
	function dessau_select_like() {
		return DessauSelectLike::get_instance();
	}
}

function dessau_select_get_like() {
	
	echo wp_kses( dessau_select_like()->add_like(), array(
        'span'  => array(
            'class'       => true,
            'aria-hidden' => true,
            'style'       => true,
            'id'          => true
        ),
        'i'     => array(
            'class' => true,
            'style' => true,
            'id'    => true
        ),
        'a'     => array(
            'href'         => true,
            'class'        => true,
            'id'           => true,
            'title'        => true,
            'style'        => true,
            'data-post-id' => true
        ),
        'input' => array(
            'type'  => true,
            'name'  => true,
            'id'    => true,
            'value' => true
        )
	) );
}