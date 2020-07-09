<?php
/**
 * Add notice for toolkit.
 * Include the TGM_Plugin_Activation class.
 * Register the required plugins for this theme.
 *
 * @package juanjimeneztj Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Add Notice for toolkit if not installed
 */
function juanjimeneztj_juanjimeneztj_toolkit_notice() {
	if ( defined( 'VIRTUE_TOOLKIT_PATH' ) || get_transient( 'juanjimeneztj_theme_toolkit_plugin_notice' ) || ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$installed_plugins = get_plugins();
	if ( ! isset( $installed_plugins['virtue-toolkit/virtue_toolkit.php'] ) ) {
		$button_label = esc_html__( 'Install juanjimeneztj Toolkit', 'juanjimeneztj' );
		$data_action  = 'install';
	} elseif ( ! juanjimeneztj_Plugin_Check::active_check( 'virtue-toolkit/virtue_toolkit.php' ) ) {
		$button_label = esc_html__( 'Activate juanjimeneztj Toolkit', 'juanjimeneztj' );
		$data_action  = 'activate';
	} else {
		return;
	}
	$install_link    = wp_nonce_url(
		add_query_arg(
			array(
				'action' => 'install-plugin',
				'plugin' => 'virtue-toolkit',
			),
			network_admin_url( 'update.php' )
		),
		'install-plugin_virtue-toolkit'
	);
	$activate_nonce  = wp_create_nonce( 'activate-plugin_virtue-toolkit/virtue_toolkit.php' );
	$activation_link = self_admin_url( 'plugins.php?_wpnonce=' . $activate_nonce . '&action=activate&plugin=virtue-toolkit%2Fvirtue_toolkit.php' );
	?>
	<div id="message" class="updated kt-plugin-install-notice-wrapper" style="position: relative; border:10px solid #fff; padding:10px 30px; background:#ebfbff;">
		<h3 class="kt-notice-title"><?php echo esc_html__( 'Thanks for choosing the juanjimeneztj Theme', 'juanjimeneztj' ); ?></h3>
		<p class="kt-notice-description"><?php /* translators: %s: <strong> */ printf( esc_html__( 'To take full advantage of the juanjimeneztj Theme please install the %1$sjuanjimeneztj Toolkit%2$s, this adds extra settings and features.', 'juanjimeneztj' ), '<strong>', '</strong>' ); ?></p>
		<p class="submit">
			<a class="button button-primary kt-install-toolkit-btn" data-redirect-url="<?php echo esc_url( admin_url( 'themes.php?page=juanjimeneztj_welcome_page' ) ); ?>" data-activating-label="<?php echo esc_attr__( 'Activating...', 'juanjimeneztj' ); ?>" data-activated-label="<?php echo esc_attr__( 'Activated', 'juanjimeneztj' ); ?>" data-installing-label="<?php echo esc_attr__( 'Installing...', 'juanjimeneztj' ); ?>" data-installed-label="<?php echo esc_attr__( 'Installed', 'juanjimeneztj' ); ?>" data-action="<?php echo esc_attr( $data_action ); ?>" data-install-url="<?php echo esc_attr( $install_link ); ?>" data-activate-url="<?php echo esc_attr( $activation_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
			<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'juanjimeneztj-juanjimeneztj-toolkit-plugin-notice', 'install' ), 'juanjimeneztj_toolkit_hide_notices_nonce', '_notice_nonce' ) ); ?>" class="notice-dismiss kt-close-notice"><span class="screen-reader-text"><?php esc_html_e( 'Skip', 'juanjimeneztj' ); ?></span></a>
		</p>
	</div>
	<?php
	wp_enqueue_script( 'juanjimeneztj-toolkit-install' );
}
add_action( 'admin_notices', 'juanjimeneztj_juanjimeneztj_toolkit_notice' );

/**
 * Hide Notice
 */
function juanjimeneztj_hide_toolkit_plugin_notice() {
	if ( isset( $_GET['juanjimeneztj-juanjimeneztj-toolkit-plugin-notice'] ) && isset( $_GET['_notice_nonce'] ) ) {
		if ( ! wp_verify_nonce( wp_unslash( sanitize_key( $_GET['_notice_nonce'] ) ), 'juanjimeneztj_toolkit_hide_notices_nonce' ) ) {
			wp_die( esc_html__( 'Authorization failed. Please refresh the page and try again.', 'juanjimeneztj' ) );
		}
		set_transient( 'juanjimeneztj_theme_toolkit_plugin_notice', 1, 4 * YEAR_IN_SECONDS );
	}
}
add_action( 'wp_loaded', 'juanjimeneztj_hide_toolkit_plugin_notice' );

/**
 * Add Notice for blocks if not installed
 */
function juanjimeneztj_juanjimeneztj_blocks_notice() {
	if ( ! class_exists( 'juanjimeneztj_toolkit_welcome' ) || get_transient( 'juanjimeneztj_theme_blocks_plugin_notice' ) || ! current_user_can( 'manage_options' ) || ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$installed_plugins = get_plugins();
	if ( ! isset( $installed_plugins['juanjimeneztj-blocks/juanjimeneztj-blocks.php'] ) ) {
		$button_label = esc_html__( 'Install juanjimeneztj Blocks', 'juanjimeneztj' );
		$data_action  = 'install';
	} elseif ( ! juanjimeneztj_Plugin_Check::active_check( 'juanjimeneztj-blocks/juanjimeneztj-blocks.php' ) ) {
		$button_label = esc_html__( 'Activate juanjimeneztj Blocks', 'juanjimeneztj' );
		$data_action  = 'activate';
	} else {
		return;
	}
	$install_link    = wp_nonce_url(
		add_query_arg(
			array(
				'action' => 'install-plugin',
				'plugin' => 'juanjimeneztj-blocks',
			),
			network_admin_url( 'update.php' )
		),
		'install-plugin_juanjimeneztj-blocks'
	);
	$activate_nonce  = wp_create_nonce( 'activate-plugin_juanjimeneztj-blocks/juanjimeneztj-blocks.php' );
	$activation_link = self_admin_url( 'plugins.php?_wpnonce=' . $activate_nonce . '&action=activate&plugin=juanjimeneztj-blocks%2Fjuanjimeneztj-blocks.php' );
	?>
	<div id="message" class="updated kt-plugin-install-notice-wrapper">
		<h3 class="kt-notice-title"><?php echo esc_html__( 'Thanks for choosing the juanjimeneztj Theme', 'juanjimeneztj' ); ?></h3>
		<p class="kt-notice-description"><?php /* translators: %s: <strong> <a> */ printf( esc_html__( 'We have a %1$snew plugin%2$s to extend and enhance the Block editor for your site. To take full advantage of the juanjimeneztj Theme please install the %3$sjuanjimeneztj Blocks%4$s, this adds extra editor blocks settings and features.', 'juanjimeneztj' ), '<a href="https://wordpress.org/plugins/juanjimeneztj-blocks/" target="_blank">', '</a>', '<strong>', '</strong>' ); ?></p>
		<p class="submit">
			<a class="button button-primary kt-install-guten-btn kt-install-toolkit-btn" data-redirect-url="<?php echo esc_url( admin_url( 'options-general.php?page=juanjimeneztj_blocks' ) ); ?>" data-activating-label="<?php echo esc_attr__( 'Activating...', 'juanjimeneztj' ); ?>" data-activated-label="<?php echo esc_attr__( 'Activated', 'juanjimeneztj' ); ?>" data-installing-label="<?php echo esc_attr__( 'Installing...', 'juanjimeneztj' ); ?>" data-installed-label="<?php echo esc_attr__( 'Installed', 'juanjimeneztj' ); ?>" data-action="<?php echo esc_attr( $data_action ); ?>" data-install-url="<?php echo esc_attr( $install_link ); ?>" data-activate-url="<?php echo esc_attr( $activation_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
			<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'juanjimeneztj-juanjimeneztj-blocks-plugin-notice', 'install' ), 'juanjimeneztj_blocks_hide_notices_nonce', '_notice_nonce' ) ); ?>" class="notice-dismiss kt-close-guten-notice"><span class="screen-reader-text"><?php esc_html_e( 'Skip', 'juanjimeneztj' ); ?></span></a>
		</p>
	</div>
	<?php
	wp_enqueue_script( 'juanjimeneztj-toolkit-install' );
}
add_action( 'admin_notices', 'juanjimeneztj_juanjimeneztj_blocks_notice' );

/**
 * Hide Notice
 */
function juanjimeneztj_hide_blocks_plugin_notice() {
	if ( isset( $_GET['juanjimeneztj-juanjimeneztj-blocks-plugin-notice'] ) && isset( $_GET['_notice_nonce'] ) ) {
		if ( ! wp_verify_nonce( wp_unslash( sanitize_key( $_GET['_notice_nonce'] ) ), 'juanjimeneztj_blocks_hide_notices_nonce' ) ) {
			wp_die( esc_html__( 'Authorization failed. Please refresh the page and try again.', 'juanjimeneztj' ) );
		}
		set_transient( 'juanjimeneztj_theme_blocks_plugin_notice', 1, 4 * YEAR_IN_SECONDS );
	}
}
add_action( 'wp_loaded', 'juanjimeneztj_hide_blocks_plugin_notice' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/classes/class-plugin-activation.php';

	add_action( 'tgmpa_register', 'juanjimeneztj_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 */
function juanjimeneztj_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$suggestions = array();
	$suggested = array();

	$suggested[] = array(
			'name'     				=> 'juanjimeneztj Toolkit', // The plugin name
			'slug'     				=> 'virtue-toolkit', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.8',
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
	);

	if ( is_array( $suggested ) ) {

		foreach ( $suggested as $ext => $data ) {

			$suggestions[ $ext ] = array(
				'name'               => $data['name'],
				'slug'               => $data['slug'],
				'required'           => false,
				'force_activation'   => false,
				'force_deactivation' => false,
			);

		}
	}
	$plugins = $suggestions;

	$theme_text_domain = 'juanjimeneztj';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'juanjimeneztj',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_slug'  		=> 'themes.php',            // Parent menu slug.
		'menu'         		=> 'install-recommended-plugins', 	// Menu slug
		'has_notices'      	=> false,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Suggested Plugins', 'juanjimeneztj' ),
			'menu_title'                       			=> __( 'Theme Plugins', 'juanjimeneztj' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'juanjimeneztj' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'juanjimeneztj' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'juanjimeneztj' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugins, they add extra features to the theme options and content controls: %1$s.', 'This theme recommends the following plugin, it adds extra features to the theme options and content controls: %1$s.', 'juanjimeneztj' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'juanjimeneztj' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'juanjimeneztj' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'juanjimeneztj' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'juanjimeneztj' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'juanjimeneztj' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'juanjimeneztj' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'juanjimeneztj' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'juanjimeneztj' ),
			'return'                           			=> __( 'Return to recommended Plugins Installer', 'juanjimeneztj' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'juanjimeneztj' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'juanjimeneztj' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	
	tgmpa( $plugins, $config );

	if( !current_user_can('manage_options') || apply_filters( 'juanjimeneztj_hide_plugin_notice', false ) ) {
		TGM_Plugin_Activation::$instance->has_notices = false;
	}


}