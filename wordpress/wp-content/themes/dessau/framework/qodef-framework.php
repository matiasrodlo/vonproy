<?php

require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.welcome.page.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.kses.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.layout1.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.layout2.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.layout3.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.layout.tax.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.layout.user.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.layout.dashboard.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.optionsapi.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.framework.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/qodef.functions.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/lib/icons-pack/icons-pack.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/admin/options/qodef-options-setup.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/admin/meta-boxes/qodef-meta-boxes-setup.php";
require_once SELECT_FRAMEWORK_ROOT_DIR . "/modules/qodef-modules-loader.php";

if ( ! function_exists( 'dessau_select_admin_scripts_init' ) ) {
	/**
	 * Function that registers all scripts that are necessary for our back-end
	 */
	function dessau_select_admin_scripts_init() {
		
		//This part is required for field type address
		$enable_google_map_in_admin = apply_filters('dessau_select_google_maps_in_backend', false);
		if($enable_google_map_in_admin) {
			//include google map api script
			$google_maps_api_key          = dessau_select_options()->getOptionValue( 'google_maps_api_key' );
			$google_maps_extensions       = '';
			$google_maps_extensions_array = apply_filters( 'dessau_select_google_maps_extensions_array', array() );
			if ( ! empty( $google_maps_extensions_array ) ) {
				$google_maps_extensions .= '&libraries=';
				$google_maps_extensions .= implode( ',', $google_maps_extensions_array );
			}
			if ( ! empty( $google_maps_api_key ) ) {
                wp_enqueue_script( 'qodef-admin-maps', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_maps_api_key ) . $google_maps_extensions, array(), false, true );
                wp_enqueue_script( 'jquery.geocomplete', get_template_directory_uri() . '/framework/admin/assets/js/jquery.geocomplete.min.js', array('qodef-admin-maps'), false, true );
			}
		}

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/framework/admin/assets/js/bootstrap.min.js', array(), false, true );
		wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/framework/admin/assets/js/bootstrap-select.min.js', array(), false, true );
		wp_enqueue_script( 'select2', get_template_directory_uri() . '/framework/admin/assets/js/select2.min.js', array(), false, true );
		wp_enqueue_script( 'qodef-ui-admin', get_template_directory_uri() . '/framework/admin/assets/js/qodef-ui/qodef-ui.js', array(), false, true );


		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/framework/admin/assets/css/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style( 'select2', get_template_directory_uri() . '/framework/admin/assets/css/select2.min.css' );

		/**
		 * @see DessauSelectSkinAbstract::registerScripts - hooked with 10
		 * @see DessauSelectSkinAbstract::registerStyles - hooked with 10
		 */
		do_action( 'dessau_select_admin_scripts_init' );
	}

	add_action( 'admin_init', 'dessau_select_admin_scripts_init' );
}

if ( ! function_exists( 'dessau_select_enqueue_admin_styles' ) ) {
	/**
	 * Function that enqueues styles for options page
	 */
	function dessau_select_enqueue_admin_styles() {
		wp_enqueue_style( 'wp-color-picker' );

		/**
		 * @see DessauSelectSkinAbstract::enqueueStyles - hooked with 10
		 */
		do_action( 'dessau_select_enqueue_admin_styles' );
	}
}

if ( ! function_exists( 'dessau_select_enqueue_admin_scripts' ) ) {
	/**
	 * Function that enqueues styles for options page
	 */
	function dessau_select_enqueue_admin_scripts() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_media();
		wp_enqueue_script( 'qodef-dependence', get_template_directory_uri() . '/framework/admin/assets/js/qodef-ui/qodef-dependence.js', array(), false, true );
		wp_enqueue_script( 'qodef-twitter-connect', get_template_directory_uri() . '/framework/admin/assets/js/qodef-ui/qodef-twitter-connect.js', array(), false, true );

		/**
		 * @see DessauSelectSkinAbstract::enqueueScripts - hooked with 10
		 */
		do_action( 'dessau_select_enqueue_admin_scripts' );
	}
}

if ( ! function_exists( 'dessau_select_enqueue_meta_box_styles' ) ) {
	/**
	 * Function that enqueues styles for meta boxes
	 */
	function dessau_select_enqueue_meta_box_styles() {
		wp_enqueue_style( 'wp-color-picker' );

		/**
		 * @see DessauSelectSkinAbstract::enqueueStyles - hooked with 10
		 */
		do_action( 'dessau_select_enqueue_meta_box_styles' );
	}
}

if ( ! function_exists( 'dessau_select_enqueue_meta_box_scripts' ) ) {
	/**
	 * Function that enqueues scripts for meta boxes
	 */
	function dessau_select_enqueue_meta_box_scripts() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_media();
        wp_enqueue_script( 'qodef-dependence', get_template_directory_uri() . '/framework/admin/assets/js/qodef-ui/qodef-dependence.js', array(), false, true );
        wp_enqueue_script( 'qodef-repeater', get_template_directory_uri() . '/framework/admin/assets/js/qodef-ui/qodef-ui-repeater.js', array(), false, true );

		/**
		 * @see DessauSelectSkinAbstract::enqueueScripts - hooked with 10
		 */
		do_action( 'dessau_select_enqueue_meta_box_scripts' );
	}
}

if ( ! function_exists( 'dessau_select_enqueue_nav_menu_script' ) ) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 *
	 * @param $hook string current page hook to check
	 */
	function dessau_select_enqueue_nav_menu_script( $hook ) {
		if ( $hook == 'nav-menus.php' ) {
			wp_enqueue_script( 'qodef-nav-menu', get_template_directory_uri() . '/framework/admin/assets/js/qodef-ui/qodef-nav-menu.js' );
			wp_enqueue_style( 'qodef-nav-menu', get_template_directory_uri() . '/framework/admin/assets/css/qodef-nav-menu.css' );
		}
	}

	add_action( 'admin_enqueue_scripts', 'dessau_select_enqueue_nav_menu_script' );
}

if ( ! function_exists( 'dessau_select_enqueue_widgets_admin_script' ) ) {
	/**
	 * Function that enqueues styles and scripts for admin widgets page.
	 *
	 * @param $hook string current page hook to check
	 */
	function dessau_select_enqueue_widgets_admin_script( $hook ) {
		if ( $hook == 'widgets.php' ) {
			wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_script( 'qodef-dependence', get_template_directory_uri() . '/framework/admin/assets/js/qodef-ui/qodef-dependence.js', array(), false, true );
			wp_enqueue_script( 'qodef-widgets-dependence', get_template_directory_uri() . '/framework/admin/assets/js/qodef-ui/qodef-widget-dependence.js', array(), false, true );
		}
	}

	add_action( 'admin_enqueue_scripts', 'dessau_select_enqueue_widgets_admin_script' );
}

if ( ! function_exists( 'dessau_select_enqueue_taxonomy_script' ) ) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 *
	 * @param $hook string current page hook to check
	 */
	function dessau_select_enqueue_taxonomy_script( $hook ) {
		if ( $hook == 'edit-tags.php' || $hook == 'term.php' ) {
			wp_enqueue_script( 'select2' );
			wp_enqueue_style( 'select2', get_template_directory_uri() . '/framework/admin/assets/css/select2.min.css' );
		}
	}

	add_action( 'admin_enqueue_scripts', 'dessau_select_enqueue_taxonomy_script' );
}


if ( ! function_exists( 'dessau_select_dashboard_page' ) ) {
	/**
	 * Function that checks whether Dashboard assets needs to be loaded.
	 *
	 */
	function dessau_select_dashboard_page() {
		return is_page_template('user-dashboard.php');
	}
}

if ( ! function_exists( 'dessau_select_init_theme_options_array' ) ) {
	/**
	 * Function that merges $dessau_select_options and default options array into one array.
	 *
	 * @see array_merge()
	 */
	function dessau_select_init_theme_options_array() {
		global $dessau_select_options, $dessau_select_Framework;

		$db_options = get_option( 'qodef_options_dessau' );

		//does qodef_options_dessau exists in db?
		if ( is_array( $db_options ) ) {
			//merge with default options
			$dessau_select_options = array_merge( $dessau_select_Framework->qodeOptions->options, get_option( 'qodef_options_dessau' ) );
		} else {
			//options don't exists in db, take default ones
			$dessau_select_options = $dessau_select_Framework->qodeOptions->options;
		}
	}

	add_action( 'dessau_select_after_options_map', 'dessau_select_init_theme_options_array', 0 );
}

if ( ! function_exists( 'dessau_select_init_theme_options' ) ) {
	/**
	 * Function that sets $dessau_select_options variable if it does'nt exists
	 */
	function dessau_select_init_theme_options() {
		global $dessau_select_options;
		global $dessau_select_Framework;
		if ( isset( $dessau_select_options['reset_to_defaults'] ) ) {
			if ( $dessau_select_options['reset_to_defaults'] == 'yes' ) {
				delete_option( "qodef_options_dessau" );
			}
		}

		if ( ! get_option( "qodef_options_dessau" ) ) {
			add_option( "qodef_options_dessau", $dessau_select_Framework->qodeOptions->options );

			$dessau_select_options = $dessau_select_Framework->qodeOptions->options;
		}
	}
}

if ( ! function_exists( 'dessau_select_register_theme_settings' ) ) {
	/**
	 * Function that registers setting that will be used to store theme options
	 */
	function dessau_select_register_theme_settings() {
		register_setting( SELECT_OPTIONS_SLUG, 'qodef_options' );
	}

	add_action( 'admin_init', 'dessau_select_register_theme_settings' );
}

if ( ! function_exists( 'dessau_select_get_admin_tab' ) ) {
	/**
	 * Helper function that returns current tab from url.
	 * @return null
	 */
	function dessau_select_get_admin_tab() {
		return isset( $_GET['page'] ) ? dessau_select_strafter( $_GET['page'], 'tab' ) : null;
	}
}

if ( ! function_exists( 'dessau_select_strafter' ) ) {
	/**
	 * Function that returns string that comes after found string
	 *
	 * @param $string string where to search
	 * @param $substring string what to search for
	 *
	 * @return null|string string that comes after found string
	 */
	function dessau_select_strafter( $string, $substring ) {
		$pos = strpos( $string, $substring );
		if ( $pos === false ) {
			return null;
		}

		return ( substr( $string, $pos + strlen( $substring ) ) );
	}
}

if ( ! function_exists( 'dessau_select_save_options' ) ) {
	/**
	 * Function that saves theme options to db.
	 * It hooks to ajax wp_ajax_qodef_save_options action.
	 */
	function dessau_select_save_options() {
		global $dessau_select_options;

		if ( current_user_can( 'administrator' ) ) {
			$_REQUEST = stripslashes_deep( $_REQUEST );

			unset( $_REQUEST['action'] );

			check_ajax_referer( 'qodef_ajax_save_nonce', 'qodef_ajax_save_nonce' );

			$dessau_select_options = array_merge( $dessau_select_options, $_REQUEST );

			update_option( 'qodef_options_dessau', $dessau_select_options );

			do_action( 'dessau_select_after_theme_option_save' );
			echo esc_html__( 'Saved', 'dessau' );

			die();
		}
	}

	add_action( 'wp_ajax_dessau_select_save_options', 'dessau_select_save_options' );
}

if ( ! function_exists( 'dessau_select_meta_box_add' ) ) {
	/**
	 * Function that adds all defined meta boxes.
	 * It loops through array of created meta boxes and adds them
	 */
	function dessau_select_meta_box_add() {
		global $dessau_select_Framework;

		foreach ( $dessau_select_Framework->qodeMetaBoxes->metaBoxes as $key => $box ) {
			$hidden = false;
			if ( ! empty( $box->hidden_property ) ) {
				foreach ( $box->hidden_values as $value ) {
					if ( dessau_select_option_get_value( $box->hidden_property ) == $value ) {
						$hidden = true;
					}
				}
			}

			if ( is_string( $box->scope ) ) {
				$box->scope = array( $box->scope );
			}

			if ( is_array( $box->scope ) && count( $box->scope ) ) {
				foreach ( $box->scope as $screen ) {
					dessau_select_create_meta_box_handler( $box, $key, $screen );

					if ( $hidden ) {
						add_filter( 'postbox_classes_' . $screen . '_qodef-meta-box-' . $key, 'dessau_select_meta_box_add_hidden_class' );
					}
				}
			}
		}

		if ( dessau_select_is_wp_gutenberg_installed() || dessau_select_is_gutenberg_installed() ) {
			dessau_select_enqueue_meta_box_styles();
			dessau_select_enqueue_meta_box_scripts();
		} else {
			add_action( 'admin_enqueue_scripts', 'dessau_select_enqueue_meta_box_styles' );
			add_action( 'admin_enqueue_scripts', 'dessau_select_enqueue_meta_box_scripts' );
		}
	}
}

if ( ! function_exists( 'dessau_select_meta_box_save' ) ) {
	/**
	 * Function that saves meta box to postmeta table
	 *
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function dessau_select_meta_box_save( $post_id, $post ) {
		global $dessau_select_Framework;

		$nonces_array = array();
		$meta_boxes   = dessau_select_framework()->qodeMetaBoxes->getMetaBoxesByScope( $post->post_type );

		if ( is_array( $meta_boxes ) && count( $meta_boxes ) ) {
			foreach ( $meta_boxes as $meta_box ) {
				$nonces_array[] = 'dessau_select_meta_box_' . $meta_box->name . '_save';
			}
		}

		if ( is_array( $nonces_array ) && count( $nonces_array ) ) {
			foreach ( $nonces_array as $nonce ) {
				if ( ! isset( $_POST[ $nonce ] ) || ! wp_verify_nonce( $_POST[ $nonce ], $nonce ) ) {
					return;
				}
			}
		}

		$postTypes = apply_filters( 'dessau_select_meta_box_post_types_save', array( 'post', 'page' ) );

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! isset( $_POST['_wpnonce'] ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( ! in_array( $post->post_type, $postTypes ) ) {
			return;
		}

		foreach ( $dessau_select_Framework->qodeMetaBoxes->options as $key => $box ) {

			if ( isset( $_POST[ $key ] ) && trim( $_POST[ $key ] !== '' ) ) {

				$value = $_POST[ $key ];

				update_post_meta( $post_id, $key, $value );
			} else {
				delete_post_meta( $post_id, $key );
			}
		}
	}

	add_action( 'save_post', 'dessau_select_meta_box_save', 1, 2 );
}

if ( ! function_exists( 'dessau_select_render_meta_box' ) ) {
	/**
	 * Function that renders meta box
	 *
	 * @param $post WP_Post post object
	 * @param $metabox array array of current meta box parameters
	 */
	function dessau_select_render_meta_box( $post, $metabox ) { ?>
		<div class="qodef-meta-box qodef-page">
			<div class="qodef-meta-box-holder">
				<?php $metabox['args']['box']->render(); ?>
				<?php wp_nonce_field( 'dessau_select_meta_box_' . $metabox['args']['box']->name . '_save', 'dessau_select_meta_box_' . $metabox['args']['box']->name . '_save' ); ?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'dessau_select_meta_box_add_hidden_class' ) ) {
	/**
	 * Function that adds class that will initially hide meta box
	 *
	 * @param array $classes array of classes
	 *
	 * @return array modified array of classes
	 */
	function dessau_select_meta_box_add_hidden_class( $classes = array() ) {
		if ( ! in_array( 'qodef-meta-box-hidden', $classes ) ) {
			$classes[] = 'qodef-meta-box-hidden';
		}

		return $classes;
	}
}

if ( ! function_exists( 'dessau_select_remove_default_custom_fields' ) ) {
	/**
	 * Function that removes default WordPress custom fields interface
	 */
	function dessau_select_remove_default_custom_fields() {
		foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
			foreach ( apply_filters( 'dessau_select_meta_box_post_types_remove', array( 'post', 'page' ) ) as $postType ) {
				remove_meta_box( 'postcustom', $postType, $context );
			}
		}
	}

	add_action( 'do_meta_boxes', 'dessau_select_remove_default_custom_fields' );
}

if ( ! function_exists( 'dessau_select_generate_icon_pack_options' ) ) {
	/**
	 * Generates options HTML for each icon in given icon pack
	 * Hooked to wp_ajax_update_admin_nav_icon_options action
	 */
	function dessau_select_generate_icon_pack_options() {
		$html               = '';
		$icon_pack          = isset( $_POST['icon_pack'] ) ? $_POST['icon_pack'] : '';
		$collections_object = dessau_select_icon_collections()->getIconCollection( $icon_pack );
        check_ajax_referer('update-nav_menu', 'update_nav_menu_nonce');
		if ( $collections_object ) {
			$icons = $collections_object->getIconsArray();
			if ( is_array( $icons ) && count( $icons ) ) {
				foreach ( $icons as $key => $value ) {
					$html .= '<option value="' . esc_attr( $value ) . '">' . esc_html( $key ) . '</option>';
				}
			}
		}

		echo wp_kses( $html, array( 'option' => array( 'value' => true ) ) );
	}

	add_action( 'wp_ajax_update_admin_nav_icon_options', 'dessau_select_generate_icon_pack_options' );
}

if ( ! function_exists( 'dessau_select_save_dismisable_notice' ) ) {
	/**
	 * Updates user meta with dismisable notice. Hooks to admin_init action
	 * in order to check this on every page request in admin
	 */
	function dessau_select_save_dismisable_notice() {
		if ( is_admin() && ! empty( $_GET['qodef_dismis_notice'] ) ) {
			$notice_id       = sanitize_key( $_GET['qodef_dismis_notice'] );
			$current_user_id = get_current_user_id();

			update_user_meta( $current_user_id, 'dismis_' . $notice_id, 1 );
		}
	}

	add_action( 'admin_init', 'dessau_select_save_dismisable_notice' );
}

if ( ! function_exists( 'dessau_select_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 */
	function dessau_select_ajax_status( $status, $message, $data = null ) {
		$response = array(
			'status'  => $status,
			'message' => $message,
			'data'    => $data
		);

		$output = json_encode( $response );

		exit( $output );
	}
}

if ( ! function_exists( 'dessau_select_hook_twitter_request_ajax' ) ) {
	/**
	 * Wrapper function for obtaining twitter request token.
	 * Hooks to wp_ajax_qodef_twitter_obtain_request_token ajax action
	 *
	 * @see DessauTwitterApi::obtainRequestToken()
	 */
	function dessau_select_hook_twitter_request_ajax() {
        check_ajax_referer( 'qodef_twitter_connect_nonce', 'twitter_connect_nonce' );

		DessauTwitterApi::getInstance()->obtainRequestToken();
	}
	
	add_action( 'wp_ajax_qodef_twitter_obtain_request_token', 'dessau_select_hook_twitter_request_ajax' );
}

if ( ! function_exists( 'dessau_select_set_admin_google_api_class' ) ) {
	function dessau_select_set_admin_google_api_class( $classes ) {
		$google_map_api = dessau_select_options()->getOptionValue( 'google_maps_api_key' );

		if ( empty( $google_map_api ) ) {
			$classes .= ' qodef-empty-google-api';
		}
		
		return $classes;
	}
	
	add_filter( 'admin_body_class', 'dessau_select_set_admin_google_api_class' );
}

if ( ! function_exists( 'dessau_select_comment' ) ) {
	/**
	 * Function which modify default WordPress comments
	 *
	 * @return comments html
	 */
	function dessau_select_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		
		global $post;
		
		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment   = $post->post_author == $comment->user_id;
		
		$comment_class = 'qodef-comment clearfix';
		
		if ( $is_author_comment ) {
			$comment_class .= ' qodef-post-author-comment';
		}
		
		if ( $is_pingback_comment ) {
			$comment_class .= ' qodef-pingback-comment';
		}
		?>
		
		<li>
		<div class="<?php echo esc_attr( $comment_class ); ?>">
			<?php if ( ! $is_pingback_comment ) { ?>
				<div class="qodef-comment-image"> <?php echo dessau_select_kses_img( get_avatar( $comment, 'thumbnail' ) ); ?> </div>
			<?php } ?>
			<div class="qodef-comment-text">
				<div class="qodef-comment-info">
					<h6 class="qodef-comment-name vcard">
						<?php if ( $is_pingback_comment ) {
							esc_html_e( 'Pingback:', 'dessau' );
						} ?>
						<?php echo wp_kses_post( get_comment_author_link() ); ?>
					</h6>
				</div>
                <div class="qodef-comment-date"><?php comment_time( get_option( 'date_format' ) ); ?></div>
				<?php if ( ! $is_pingback_comment ) { ?>
					<div class="qodef-text-holder" id="comment-<?php echo comment_ID(); ?>">
						<?php comment_text(); ?>
					</div>
				<?php } ?>
				<?php
				comment_reply_link( array_merge( $args, array(
					'reply_text' => esc_html__( 'Reply', 'dessau' ),
					'depth'      => $depth,
					'max_depth'  => $args['max_depth']
				) ) );
				edit_comment_link( esc_html__( 'Edit', 'dessau' ) );
				?>
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>
		<?php
	}
}

/* Taxonomy custom fields functions - START */

if ( ! function_exists( 'dessau_select_init_custom_taxonomy_fields' ) ) {
	function dessau_select_init_custom_taxonomy_fields() {
		do_action( 'dessau_select_custom_taxonomy_fields' );
	}
	
	add_action( 'after_setup_theme', 'dessau_select_init_custom_taxonomy_fields' );
}

if ( ! function_exists( 'dessau_select_taxonomy_fields_add' ) ) {
	function dessau_select_taxonomy_fields_add() {
		global $dessau_select_Framework;
		
		foreach ( $dessau_select_Framework->qodeTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			add_action( $fields->scope . '_add_form_fields', 'dessau_select_taxonomy_fields_display_add', 10, 2 );
		}
	}
	
	add_action( 'after_setup_theme', 'dessau_select_taxonomy_fields_add', 11 );
}

if ( ! function_exists( 'dessau_select_taxonomy_fields_edit' ) ) {
	function dessau_select_taxonomy_fields_edit() {
		global $dessau_select_Framework;
		
		foreach ( $dessau_select_Framework->qodeTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			add_action( $fields->scope . '_edit_form_fields', 'dessau_select_taxonomy_fields_display_edit', 10, 2 );
		}
	}
	
	add_action( 'after_setup_theme', 'dessau_select_taxonomy_fields_edit', 11 );
}

if ( ! function_exists( 'dessau_select_taxonomy_fields_display_add' ) ) {
	function dessau_select_taxonomy_fields_display_add( $taxonomy ) {
		global $dessau_select_Framework;
		
		foreach ( $dessau_select_Framework->qodeTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			if ( $taxonomy == $fields->scope ) {
				$fields->render();
			}
		}
	}
}

if ( ! function_exists( 'dessau_select_taxonomy_fields_display_edit' ) ) {
	function dessau_select_taxonomy_fields_display_edit( $term, $taxonomy ) {
		global $dessau_select_Framework;
		
		foreach ( $dessau_select_Framework->qodeTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			if ( $taxonomy == $fields->scope ) {
				$fields->render();
			}
		}
	}
}

if ( ! function_exists( 'dessau_select_save_taxonomy_custom_fields' ) ) {
	function dessau_select_save_taxonomy_custom_fields( $term_id ) {
		$fields = apply_filters( 'dessau_select_taxonomy_fields', array() );
		
		foreach ( $fields as $value ) {
			if ( isset( $_POST[ $value ] ) && '' !== $_POST[ $value ] ) {
				add_term_meta( $term_id, $value, $_POST[ $value ] );
			}
		}
	}
	
	add_action( 'created_term', 'dessau_select_save_taxonomy_custom_fields', 10, 2 );
}

if ( ! function_exists( 'dessau_select_update_taxonomy_custom_fields' ) ) {
	function dessau_select_update_taxonomy_custom_fields( $term_id ) {
		$fields = apply_filters( 'dessau_select_taxonomy_fields', array() );
		
		foreach ( $fields as $value ) {
			if ( isset( $_POST[ $value ] ) && '' !== $_POST[ $value ] ) {
				update_term_meta( $term_id, $value, $_POST[ $value ] );
			} else {
				update_term_meta( $term_id, $value, '' );
			}
		}
	}
	
	add_action( 'edited_term', 'dessau_select_update_taxonomy_custom_fields', 10, 2 );
}

if ( ! function_exists( 'dessau_select_tax_add_script' ) ) {
	function dessau_select_tax_add_script() {
		wp_enqueue_media();
		wp_enqueue_script( 'qodef-tax-js', SELECT_FRAMEWORK_ROOT . '/admin/assets/js/qodef-ui/qodef-tax-custom-fields.js' );
	}
	
	add_action( 'admin_enqueue_scripts', 'dessau_select_tax_add_script' );
}

/** Taxonomy Delete Image **/
if ( ! function_exists( 'dessau_select_tax_del_image' ) ) {
	function dessau_select_tax_del_image() {
        check_ajax_referer( 'qodef_tax_del_image_nonce', 'tax_del_image_nonce' );
		/** If we don't have a term_id, bail out **/
		if ( ! isset( $_GET['term_id'] ) ) {
			esc_html_e( 'Not Set or Empty', 'dessau' );
			exit;
		}
		
		$field_name = $_GET['field_name'];
		$term_id    = $_GET['term_id'];
		$imageID    = get_term_meta( $term_id, $field_name, true );  // Get our attachment ID
		
		if ( is_numeric( $imageID ) ) {                              // Verify that the attachment ID is indeed a number
			wp_delete_attachment( $imageID );                       // Delete our image
			delete_term_meta( $term_id, $field_name );// Delete our image meta
			exit;
		}
		
		esc_html_e( 'Contact Administrator', 'dessau' ); // If we've reached this point, something went wrong - enable debugging
		exit;
	}
	
	add_action( 'wp_ajax_dessau_select_tax_del_image', 'dessau_select_tax_del_image' );
}

/* Taxonomy custom fields functions - END */

/* User custom fields functions - START */

if ( ! function_exists( 'dessau_select_user_add_script' ) ) {
	function dessau_select_user_add_script() {
		wp_enqueue_script( 'qodef-user-js', SELECT_FRAMEWORK_ROOT . '/admin/assets/js/qodef-ui/qodef-user-custom-fields.js' );
	}

	add_action( 'admin_enqueue_scripts', 'dessau_select_user_add_script' );
}


if ( ! function_exists( 'dessau_select_init_custom_user_fields' ) ) {
	function dessau_select_init_custom_user_fields() {
		do_action( 'dessau_select_custom_user_fields' );
	}
	
	add_action( 'after_setup_theme', 'dessau_select_init_custom_user_fields' );
}

if ( ! function_exists( 'dessau_select_user_fields_edit' ) ) {
	function dessau_select_user_fields_edit($user) {
		global $dessau_select_Framework;

		foreach ( $dessau_select_Framework->qodeUserOptions->userOptions as $key => $fields ) {

			$display_fields = false;
			foreach ($user->roles as $role) {
				if (in_array($role, $fields->scope)){
					$display_fields = true;
					break;
				}
			}
			if ( $display_fields ) {
				$fields->render();
			}
		}
	}
	
	add_action('show_user_profile', 'dessau_select_user_fields_edit');
	add_action('edit_user_profile', 'dessau_select_user_fields_edit');
}

if ( ! function_exists( 'dessau_select_save_user_fields' ) ) {
	function dessau_select_save_user_fields($user_id) {

		$fields = apply_filters( 'dessau_select_user_fields', array() );

		foreach ( $fields as $value ) {
			if ( isset( $_POST[ $value ] ) && '' !== $_POST[ $value ] ) {
				update_user_meta( $user_id, $value, $_POST[ $value ] );
			}
		}
	}
		
	add_action( 'personal_options_update', 'dessau_select_save_user_fields');
	add_action( 'edit_user_profile_update', 'dessau_select_save_user_fields');
}
/* User custom fields functions - END */

/** User Delete Image **/
if ( ! function_exists( 'dessau_select_user_del_image' ) ) {
	function dessau_select_user_del_image() {
        check_ajax_referer( 'qodef_user_del_image_nonce', 'user_del_image_nonce' );
		/** If we don't have a term_id, bail out **/
		if ( ! isset( $_GET['user_id'] ) ) {
			esc_html_e( 'Not Set or Empty', 'dessau' );
			exit;
		}

		$field_name = $_GET['field_name'];
		$user_id    = $_GET['user_id'];
		$imageID    = get_user_meta( $user_id, $field_name, true );;  // Get our attachment ID

		if ( is_numeric( $imageID ) ) {               // Verify that the attachment ID is indeed a number
			delete_user_meta( $user_id, $field_name );// Delete our image meta
			exit;
		}

		esc_html_e( 'Contact Administrator', 'dessau' ); // If we've reached this point, something went wrong - enable debugging
		exit;
	}

	add_action( 'wp_ajax_dessau_select_user_del_image', 'dessau_select_user_del_image' );
}
?>