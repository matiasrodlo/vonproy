<?php

if(!function_exists('dessau_select_loading_spinners')) {
    function dessau_select_loading_spinners() {
    	$id = dessau_select_get_page_id();
	    $spinner_type = dessau_select_get_meta_field_intersect('smooth_pt_spinner_type',$id);

        $spinner_html = '';
        if(!empty($spinner_type)){
            switch ($spinner_type) {
                case 'dessau_spinner':
                    $spinner_html = dessau_select_loading_spinner_dessau_spinner();
                break; 
                case 'rotate_circles':
                    $spinner_html = dessau_select_loading_spinner_rotate_circles();
                break;
                case 'pulse':
                    $spinner_html = dessau_select_loading_spinner_pulse();
                    break;
                case 'double_pulse':
                    $spinner_html =  dessau_select_loading_spinner_double_pulse();
                    break;
                case 'cube':
                    $spinner_html =  dessau_select_loading_spinner_cube();
                    break;
                case 'rotating_cubes':
                    $spinner_html =  dessau_select_loading_spinner_rotating_cubes();
                    break;
                case 'stripes':
                    $spinner_html =  dessau_select_loading_spinner_stripes();
                    break;
                case 'wave':
                    $spinner_html =  dessau_select_loading_spinner_wave();
                    break;
                case 'two_rotating_circles':
                    $spinner_html =  dessau_select_loading_spinner_two_rotating_circles();
                    break;
                case 'five_rotating_circles':
                    $spinner_html =  dessau_select_loading_spinner_five_rotating_circles();
                    break;
				case 'atom':
                    $spinner_html = dessau_select_loading_spinner_atom();
                    break;
				case 'clock':
                    $spinner_html = dessau_select_loading_spinner_clock();
                    break;
				case 'mitosis':
                    $spinner_html = dessau_select_loading_spinner_mitosis();
                    break;
				case 'lines':
                    $spinner_html = dessau_select_loading_spinner_lines();
                    break;
				case 'fussion':
                    $spinner_html = dessau_select_loading_spinner_fussion();
                    break;
				case 'wave_circles':
                    $spinner_html = dessau_select_loading_spinner_wave_circles();
                    break;
				case 'pulse_circles':
                    $spinner_html = dessau_select_loading_spinner_pulse_circles();
                    break;
	            default:
		            $spinner_html = dessau_select_loading_spinner_pulse();
            }
        }

        echo wp_kses($spinner_html, array(
            'div' => array(
                'class' => true,
                'style' => true,
                'id' => true
            ),
            'svg' => array(
                'version'               => true,
                'xmlns'                 => true,
                'x'                     => true,
                'y'                     => true,
                'width'                 => true,
                'height'                => true,
                'viewBox'               => true,
                'enable-background'     => true
            ),
            'rect' => array(
                'x'                     => true,
                'y'                     => true,
                'width'                 => true,
                'height'                => true,
                'fill'                  => true,
                'stroke'                => true,
                'stroke-width'          => true,
                'stroke-miterlimit'     => true
            )
        ));
    }
}

if(!function_exists('dessau_select_loading_spinner_dessau_spinner')) {
    function dessau_select_loading_spinner_dessau_spinner() {
        $html = '';
        $html .= '<div class="qodef-dessau-loader">';
        $html .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
              width="106.237px" height="104.477px" viewBox="0 0 106.237 104.477" enable-background="new 0 0 106.237 104.477">
              <rect x="0.125" y="1.057" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="1.317" height="103.295"/>
              <rect x="0.125" y="102.988" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="105.987" height="1.363"/>
              <rect x="104.795" y="0.182" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="1.317" height="104.17"/>
              <rect x="0.125" y="0.125" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="105.987" height="1.363"/>
                <rect x="0.125" y="0.125" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="105.987" height="1.363"/>
              <rect x="65.867" y="30.111" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="39.587" height="1.363"/>
                <rect x="65.867" y="30.111" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="39.587" height="1.363"/>
                <rect x="65.867" y="30.111" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="39.587" height="1.363"/>
            <rect x="65.072" y="1.307" fill="#393939" stroke="#393939" stroke-width="0.25" stroke-miterlimit="10" width="1.317" height="103.045"/>
            </svg>';
        $html .= '</div>';
        
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_rotate_circles')) {
    function dessau_select_loading_spinner_rotate_circles() {
        $html = '';
        $html .= '<div class="qodef-rotate-circles">';
        $html .= '<div></div>';
        $html .= '<div></div>';
        $html .= '<div></div>';
        $html .= '</div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_pulse')) {
    function dessau_select_loading_spinner_pulse() {
        $html = '<div class="pulse"></div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_double_pulse')) {
    function dessau_select_loading_spinner_double_pulse() {
        $html = '';
        $html .= '<div class="double_pulse">';
        $html .= '<div class="double-bounce1"></div>';
        $html .= '<div class="double-bounce2"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_cube')) {
    function dessau_select_loading_spinner_cube() {
        $html = '<div class="cube"></div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_rotating_cubes')) {
    function dessau_select_loading_spinner_rotating_cubes() {
        $html = '';
        $html .= '<div class="rotating_cubes">';
        $html .= '<div class="cube1"></div>';
        $html .= '<div class="cube2"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_stripes')) {
    function dessau_select_loading_spinner_stripes() {
        $html = '';
        $html .= '<div class="stripes">';
        $html .= '<div class="rect1"></div>';
        $html .= '<div class="rect2"></div>';
        $html .= '<div class="rect3"></div>';
        $html .= '<div class="rect4"></div>';
        $html .= '<div class="rect5"></div>';
        $html .= '</div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_wave')) {
    function dessau_select_loading_spinner_wave() {
        $html = '';
        $html .= '<div class="wave">';
        $html .= '<div class="bounce1"></div>';
        $html .= '<div class="bounce2"></div>';
        $html .= '<div class="bounce3"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_two_rotating_circles')) {
    function dessau_select_loading_spinner_two_rotating_circles() {
        $html = '';
        $html .= '<div class="two_rotating_circles">';
        $html .= '<div class="dot1"></div>';
        $html .= '<div class="dot2"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_five_rotating_circles')) {
    function dessau_select_loading_spinner_five_rotating_circles() {
        $html = '';
        $html .= '<div class="five_rotating_circles">';
        $html .= '<div class="spinner-container container1">';
        $html .= '<div class="circle1"></div>';
        $html .= '<div class="circle2"></div>';
        $html .= '<div class="circle3"></div>';
        $html .= '<div class="circle4"></div>';
        $html .= '</div>';
        $html .= '<div class="spinner-container container2">';
        $html .= '<div class="circle1"></div>';
        $html .= '<div class="circle2"></div>';
        $html .= '<div class="circle3"></div>';
        $html .= '<div class="circle4"></div>';
        $html .= '</div>';
        $html .= '<div class="spinner-container container3">';
        $html .= '<div class="circle1"></div>';
        $html .= '<div class="circle2"></div>';
        $html .= '<div class="circle3"></div>';
        $html .= '<div class="circle4"></div>';
        $html .= '</div>';
        $html .= '</div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_atom')) {
    function dessau_select_loading_spinner_atom(){
        $html = '';
        $html .= '<div class="atom">';
        $html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
        $html .= '</div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_clock')) {
    function dessau_select_loading_spinner_clock(){
        $html = '';
        $html .= '<div class="clock">';
        $html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
        $html .= '</div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_mitosis')) {
    function dessau_select_loading_spinner_mitosis(){
        $html = '';
        $html .= '<div class="mitosis">';
        $html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
        $html .= '</div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_lines')) {
    function dessau_select_loading_spinner_lines(){
        $html = '';
        $html .= '<div class="lines">';
        $html .= '<div class="line1"></div>';
		$html .= '<div class="line2"></div>';
		$html .= '<div class="line3"></div>';
		$html .= '<div class="line4"></div>';
        $html .= '</div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_fussion')) {
    function dessau_select_loading_spinner_fussion(){
        $html = '';
        $html .= '<div class="fussion">';
        $html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
        $html .= '</div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_wave_circles')) {
    function dessau_select_loading_spinner_wave_circles(){
        $html = '';
        $html .= '<div class="wave_circles">';
        $html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
        $html .= '</div>';
	    
        return $html;
    }
}

if(!function_exists('dessau_select_loading_spinner_pulse_circles')) {
    function dessau_select_loading_spinner_pulse_circles(){
        $html = '';
        $html .= '<div class="pulse_circles">';
        $html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
        $html .= '</div>';
	    
        return $html;
    }
}
