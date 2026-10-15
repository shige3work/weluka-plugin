<?php
/*
 * Plugin Name: WELUKA
 * Plugin URI: https://github.com/shige3work/weluka-plugin
 * Description: WELUKA is bootstrap base content builder, theme setting for Wordpress (Private Fork Edition).
 * Author: SHIGE3.WORK
 * Version: 1.4.1
 * Author URI: https://www.shige3.work
 * License: GPL2+
 * Text Domain: weluka
 * Domain Path: /languages/
 * Requires at least: 6.0
 * Tested up to: 7.1
 * Requires PHP: 7.4
 * Update URI: https://github.com/shige3work/weluka-plugin
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

define( 'WELUKA_VERSION', '1.4.1' );

// Plugin Update Checker (GitHub automatic updates)
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

if ( file_exists( dirname( __FILE__ ) . '/vendor/plugin-update-checker/plugin-update-checker.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/plugin-update-checker/plugin-update-checker.php';
	$welukaUpdateChecker = PucFactory::buildUpdateChecker(
		'https://github.com/shige3work/weluka-plugin/',
		__FILE__,
		'weluka'
	);
	$welukaUpdateChecker->setBranch('main');
}

/**
 * Main Weluka Plugin class
 * @since 1.0
 * 
 */
#[\AllowDynamicProperties]
class Weluka {
	
	/**
	 * Holds the singleton instance of this class
	 * @var Weluka
	 * @since 1.0
	 */
	private static $instance = false;

	/**
	 * plugin setting array
	 * @since 1.0
	 */
	public static $settings = array();
	
	/**
	 * since 1.0
	 */
	protected $last_create_node_id = null;
	
	private function __construct(){
 	}

	/**
	 * singloton instance
	 * @since 1.0
	 */	
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new Weluka;
/*			if ( did_action( 'plugins_loaded' ) )
				self::plugin_initialize();
			else
				add_action( 'plugins_loaded', array( __CLASS__, 'plugin_initialize' ), 999 ); */
		}
		return self::$instance;
	}
	
	/**
	 * Initialize
	 * @since 1.0
	 */
	public function init() {
		if ( did_action( 'plugins_loaded' ) )
			$this->plugin_initialize();
		else
			add_action( 'plugins_loaded', array( &$this, 'plugin_initialize' ), 9999 );

	}

	/**
	 * register_activation_hook()
	 * @since 1.0
	 */
	public static function plugin_activation( $network_wide ) {
    	global $wpdb;
    	
		if ( is_multisite() && $network_wide ) {
        	$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
        	foreach ($blogids as $blog_id) {
            	switch_to_blog($blog_id);
            	self::activateDefault();
        	}
    	}else {
            self::activateDefault();
    	}
	}

	/**
	 * activation default
	 * @since 1.0
	 */
	 public static function activateDefault() {
		global $wp_version;
		if ( version_compare( $wp_version, self::$settings['minimum_wp_version'], '<' ) ) {
			self::fail_on_activation( sprintf( __( '%s requires WordPress version %s or later.', self::$settings['plugin_name'] ), self::$settings['plugin_name'], self::$settings['minimum_wp_version'] ) );
		}
	 }
	 
	/**
	 * plugin not activate
	 * @since 1.0
	 */	
	public static function fail_on_activation( $message ) {
		deactivate_plugins( plugin_basename( self::$settings['plugin_file'] ), false, is_network_admin() );
		die( $message );
	}

	/**
	 * register_deactivation_hook()
	 * @since 1.0
	 */
	public static function plugin_deactivation() {
    	global $wpdb;

		//network active
		if( is_plugin_active_for_network( 'weluka/weluka.php' ) ) {
			if( !is_network_admin() ) return; // Only fire if in network admin

        	$blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
        	foreach ($blogids as $blog_id) {
            	switch_to_blog($blog_id);
            	self::deactive();
        	}
		} else {
			self::deactive();
		}
	}

	/**
	 * plugin deactive uninstall
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.4
	 * ver1.0.5.2 revision対応
	 */
	public static function deactive() {
		$builder = WelukaBuilder::get_instance();
		$weluka = self::get_instance();

		//v1.0.4 add		
		$_restore	= WelukaAdminSettings::get_site_options( Weluka::$settings['setting_option_name'], WelukaAdminSettings::PLUGIN_STOP_DATA_RESTORE, true );
		if( empty( $_restore ) ) { return; }
		//v1.0.4 addend
		
		//post types
		$targetPostTypes = array();
        $postTypes = get_post_types(array('public' => true));
    	$excludePostTypes = array('attachment' => 'attachment');
    	$postTypes = array_diff_assoc($postTypes, $excludePostTypes); //keyと値両方を比較し差分を取得
		foreach ($postTypes as $key => $val) {
        	if (post_type_supports($key, 'editor')) { //posttypeがeditorサポートしている物が対象なので
				$targetPostTypes[] = $val;
        	}
    	}
		$targetPostTypes[] = self::$settings['cpt_hd'];
		$targetPostTypes[] = self::$settings['cpt_ft'];
		$targetPostTypes[] = self::$settings['cpt_sd'];

		$param = array(
    		'posts_per_page' => -1,
			'numberposts' => -1,
       		'post_type' => $targetPostTypes, 
        	'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private'),
			'meta_query' => array(
				array('key' 	=> WelukaBuilder::CONTENT_POSTMETA_KEY_DRAFT,
					  'value' 	=> null,
					  'compare' => '!='
				)
			)
		);
		$posts = get_posts( $param );

		remove_action( 'save_post', array(&$builder, 'render_save_post'), 10, 2); //ver1.0.1 add
		remove_action( 'save_post', array(&$builder, 'render_save_post_revision'), 11, 2); //v1.0.5.2

		foreach ($posts as $_post) :
			$_ct = str_replace(array("\r\n","\n","\r"), '', trim(strip_tags($_post->post_content)));
			//if(strcasecmp($_ct, "[weluka-builder-content]") == 0) {
			if(strncasecmp($_ct, "[weluka-builder-content", 23) == 0) { //v1.0.5.2
				list($result, $content) = $builder->publish_builder_data($_post->ID, true);
			} else {
				$content = $_post->post_content;
			}
			$_post->post_content = $content;
			$weluka->save_post($_post);

			//$builder->delete_builder_data($_post->ID); //builder data not remove
		endforeach;
	}
	
	/**
	 * plugins_loaded action hook
	 * plugin initialize
	 * @since 1.0
	 */
	public function plugin_initialize() {
		$this->settings();
		//Load language files
		load_plugin_textdomain( self::$settings['plugin_name'], false, dirname( plugin_basename( self::$settings['plugin_file'] ) ) . '/languages/' );
		$this->includes();
		$this->hooks();
	}

	/**
	 * set plugin setting array
	 * @since 1.0
	 * @update
	 * ver 1.0.1
	 * ver 1.0.7
	 * ver 1.0.7.1
	 * ver 1.1
	 * ver 1.1.3
	 * ver 1.2
	 * ver 1.2.1
	 */
	public function settings() {
		self::$settings['debug']				= false;  //true = debug mode
		self::$settings['plugin_version']		= WELUKA_VERSION;
		self::$settings['minimum_wp_version']	= '6.0';
		self::$settings['plugin_dir']			= plugin_dir_path(__FILE__);
		self::$settings['plugin_url']			= set_url_scheme( plugins_url('/', __FILE__) );
		self::$settings['plugin_file']			= __FILE__;
		self::$settings['plugin_name']			= 'weluka';
		self::$settings['brand_url']			= 'http://www.weluka.me/';
		self::$settings['setting_option_name']	= self::$settings['plugin_name'] . '_options';
		self::$settings['license_option_name']	= self::$settings['plugin_name'] . '_license';
		self::$settings['seo_option_name']		= self::$settings['plugin_name'] . '_seo';
		self::$settings['admin_url']			= set_url_scheme( get_admin_url() );
		self::$settings['licence_type']			= 'standard';
		self::$settings['ajax_url']				= admin_url('admin-ajax.php');
		self::$settings['webfont_css_dir']		= self::$settings['plugin_dir'] . 'assets/css';
		self::$settings['webfont_css_name']		= 'webfont{%blogid}.css';
		self::$settings['webfont_css_url']		= self::$settings['plugin_url'] . 'assets/css';
		self::$settings['upgrade_url']			= "http://www.weluka.me/";
		self::$settings['contact_url']			= "http://www.weluka.me/";
		self::$settings['cpt_hd']				= "welukahd";
		self::$settings['cpt_ft']				= "welukaft";
		self::$settings['cpt_sd']				= "welukasd";
		self::$settings['noimage']				= self::$settings['plugin_url'] . 'assets/img/noimage.gif';
		self::$settings['ogpsitetype']          = "weluka-ogp-site-type";
		self::$settings['ogpimgkey']            = "weluka-ogp-img";
		self::$settings['cardvideokey']			= "weluka-ogp-video";
		self::$settings['videoWidthkey']		= "weluka-ogp-video-width";
		self::$settings['videoHeightkey']		= "weluka-ogp-video-height";
		
		$welukaAdminCss		= self::$settings['debug'] === true ? 'weluka-admin.css' : 'weluka-admin.min.css';
		$welukaCss			= self::$settings['debug'] === true ? 'bootstrap-weluka.css' : 'bootstrap-weluka.min.css';
		$welukaSnippetCss	= self::$settings['debug'] === true ? 'weluka-snippets.css' : 'weluka-snippets.min.css';
		$welukaAnimateCss	= self::$settings['debug'] === true ? 'weluka-animate.css' : 'weluka-animate.min.css'; //v1.2
		
		$_purl = $this->set_url( self::$settings['plugin_url'] );
		self::$settings['load_css_common'] = array(
			array(
				'target'	=> array('admin'),
				'handle'	=> 'weluka-admin',
				'src'		=> $_purl . 'assets/css/' . $welukaAdminCss,
				'deps'		=> array(),
				'version'	=> self::$settings['plugin_version'],
				'media'		=> 'all'
			),
			array(
				'target'	=> array('admin_common'),
				'handle'	=> 'bootstrap-weluka',
				'src'		=> $_purl . 'assets/css/' . $welukaCss,
				'deps'		=> array(),
				'version'	=> self::$settings['plugin_version'],
				'media'		=> 'all'
			),
			array(
				'target'	=> array('admin_common'),
				'handle'	=> 'weluka-bootstrap-color-picker',
				'src'		=> $_purl . 'assets/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
				'deps'		=> array(),
				'version'	=> '2.3.0',
				'media'		=> 'all'
			),
		);
		
		self::$settings['load_css'] = array(
			array(
				'target'	=> array('site'),
				'handle'	=> 'fancybox',
				'src'		=> $_purl . 'assets/js/fancybox/jquery.fancybox.css',
				'deps'		=> array(),
				'version'	=> '2.1.5',
				'media'		=> 'all'
			),

			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'tipTip',
				'src'		=> $_purl . 'assets/js/tipTip/tipTip.css',
				'deps'		=> array(),
				'version'	=> '1.3.0',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('builder', 'site'),
				'handle'	=> 'wp-mediaelement',
				'src'		=> '',
				'deps'		=> array(),
				'version'	=> '',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('builder', 'site'),
				'handle'	=> 'weluka-flex-slider',
				'src'		=> $_purl . 'assets/js/flexslider/flexslider.css',
				'deps'		=> array(),
				'version'	=> '2.6.3',	//'2.5.0',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('all'),
				'handle'	=> 'bootstrap-weluka',
				'src'		=> $_purl . 'assets/css/' . $welukaCss,
				'deps'		=> array(),
				'version'	=> self::$settings['plugin_version'],
				'media'		=> 'all'
			),
			//v1.1.3 add
			array(
				'target'	=> array('all'),
				'handle'	=> 'bootstrap-dropdowns-enhancement',
				'src'		=> $_purl . 'assets/css/dropdowns-enhancement.min.css',
				'deps'		=> array(),
				'version'	=> '3.3.1',
				'media'		=> 'all'
			),
			//v1.1.3 addend
			array(
				'target'	=> array('all'),
				'handle'	=> 'font-awesome',
				'src'		=> $_purl . 'assets/css/font-awesome.min.css',
				'deps'		=> array(),
				'version'	=> '4.7.0', //ver1.1.4 4.6.3 to 4.7.0
				'media'		=> 'all'
			),
			array(
				'target'	=> array('builder'),
				'handle'	=> 'weluka-bootstrap-color-picker',
				'src'		=> $_purl . 'assets/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
				'deps'		=> array(),
				'version'	=> '2.3.0',
				'media'		=> 'all'
			),
			array(
				'target'	=> array('builder'),
				'handle'	=> 'weluka-snippets',
				'src'		=> $_purl . 'assets/css/' . $welukaSnippetCss,
				'deps'		=> array(),
				'version'	=> self::$settings['plugin_version'],
				'media'		=> 'all'
			),
			//v1.2 add
			array(
				'target'	=> array('site'),
				'handle'	=> 'weluka-animate',
				'src'		=> $_purl . 'assets/css/' . $welukaAnimateCss,
				'deps'		=> array(),
				'version'	=> self::$settings['plugin_version'],
				'media'		=> 'all'
			)
		);

		$welukaAdminJs		= self::$settings['debug'] === true ? 'weluka-admin.js' : 'weluka-admin.min.js';
		$welukaBuilderJs	= self::$settings['debug'] === true ? 'weluka-builder.js' : 'weluka-builder.min.js';
		$welukaMapJs		= self::$settings['debug'] === true ? 'weluka-gmap.js' : 'weluka-gmap.min.js';
		$welukaJs			= self::$settings['debug'] === true ? 'weluka.js' : 'weluka.min.js';

		self::$settings['load_js_common'] = array(
			array(
				'target'	=> array('admin_common'),
				'handle'	=> 'bootstrap',
				'src'		=> $_purl . 'assets/js/bootstrap.min.js',
				'deps'		=> array(),
				'version'	=> '3.3.6', //'3.3.4',
				'in_footer'	=> true
			),
			array(
				'target'	=> array('admin_common'),
				'handle'	=> 'weluka-bootstrap-colorpicker',
				'src'		=> $_purl . 'assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
				'deps'		=> array('jquery'),
				'version'	=> '2.3.0',
				'in_footer'	=> true
			)
		);

		self::$settings['load_js'] = array(
			array(
				'target'	=> array('all'),
				'handle'	=> 'jquery',
				'src'		=> $_purl . 'assets/js/jquery-1.11.2.min.js',
				'deps'		=> array(),
				'version'	=> '1.11.2',
				'in_footer'	=> false		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-core',
				'src'		=> '',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-widget',
				'src'		=> '',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-mouse',
				'src'		=> '',
				'deps'		=> array('jquery-ui-core', 'jquery-ui-widget'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-resizable',
				'src'		=> '',
				'deps'		=> array('jquery-ui-mouse'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-sortable',
				'src'		=> '',
				'deps'		=> array('jquery-ui-mouse'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//ver1.0.1 add
			//use wordpress bundle
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'jquery-ui-draggable',
				'src'		=> '',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			//ver1.0.1 addend
			array(
				'target'	=> array('site', 'builder'),
				'handle'	=> 'wp-mediaelement',
				'src'		=> '',
				'deps'		=> array(),
				'version'	=> '',
				'in_footer'	=> true		
			),
			array(
				'target'	=> array('admin', 'builder'),
				'handle'	=> 'tipTip',
				'src'		=> $_purl . 'assets/js/tipTip/jquery.tipTip.minified.js',
				'deps'		=> array(),
				'version'	=> '1.3.0',
				'in_footer'	=> true		
			),
			array(
				'target'	=> array('all'),
				'handle'	=> 'bootstrap',
				'src'		=> $_purl . 'assets/js/bootstrap.min.js',
				'deps'		=> array(),
				'version'	=> '3.3.6', //'3.3.4',
				'in_footer'	=> true
			),
			//v1.1.3 add
			array(
				'target'	=> array('site'),
				'handle'	=> 'bootstrap-dropdowns-enhancement',
				'src'		=> $_purl . 'assets/js/dropdowns-enhancement.min.js',
				'deps'		=> array(),
				'version'	=> '3.3.1', //'3.3.4',
				'in_footer'	=> true
			),
			//v1.1.3 addend
			array(
				'target'	=> array('site'),
				'handle'	=> 'fancybox',
				'src'		=> $_purl . 'assets/js/fancybox/jquery.fancybox.pack.js',
				'deps'		=> array('jquery'),
				'version'	=> '2.1.5',
				'in_footer'	=> true
			),
			array(
				'target'	=> array('builder'),
				'handle'	=> 'weluka-bootstrap-colorpicker',
				'src'		=> $_purl . 'assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
				'deps'		=> array('jquery'),
				'version'	=> '2.3.0',
				'in_footer'	=> true
			),
			array(
				'target'	=> array('builder', 'site'),
				'handle'	=> 'weluka-flex-slider',
				'src'		=> $_purl . 'assets/js/flexslider/jquery.flexslider-min.js',
				'deps'		=> array('jquery'),
				'version'	=> '2.6.3', //'2.5.0',
				'in_footer'	=> true
			),
			// v1.1 add
			array(
				'target'	=> array('site'),
				'handle'	=> 'jscroll',
				'src'		=> $_purl . 'assets/js/jquery.jscroll.min.js',
				'deps'		=> array('jquery'),
				'version'	=> '2.3.5',
				'in_footer'	=> true
			),
			//v1.1 addend
			array(
				'target'	=> array('builder'),
				'handle'	=> 'jquery-dnd_page_scroll',
				'src'		=> $_purl . 'assets/js/jquery.dnd_page_scroll.js',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			array(
				'target'	=> array('admin'),
				'handle'	=> 'weluka-admin',
				'src'		=> $_purl . 'assets/js/' . $welukaAdminJs,
				'deps'		=> array(),
				'version'	=> self::$settings['plugin_version'],
				'in_footer'	=> true
			),
			array(
			'target'	=> array('builder', 'site'),
			'handle'	=> 'google-maps-api',
			//'src'		=> '//maps.google.com/maps/api/js?sensor=false', v1.0.7.1 modify
			'src'		=> '//maps.google.com/maps/api/js{%APIKEY%}',
			//'src'		=> '//maps.googleapis.com/maps/api/js{%APIKEY%}',
			'deps'		=> array(),
			'version'	=> false,
			'in_footer'	=> true
		),			
			array(
				'target'	=> array('builder', 'site'),
				'handle'	=> 'google-maps-api',
				//'src'		=> '//maps.google.com/maps/api/js?sensor=false', v1.0.7.1 modify
				'src'		=> '//maps.google.com/maps/api/js{%APIKEY%}',
				//'src'		=> '//maps.googleapis.com/maps/api/js{%APIKEY%}',
				'deps'		=> array(),
				'version'	=> false,
				'in_footer'	=> true
			),			
			array(
				'target'	=> array('builder', 'site'),
				'handle'	=> 'weluka-gmaps',
				'src'		=> $_purl . 'assets/js/gmaps.min.js',
				'deps'		=> array(),
				'version'	=> '0.4.24', //v1.1.4 modify  '0.4.18',
				'in_footer'	=> true
			),
			//ver1.0.1
			array(
				'target'	=> array('site'),
				'handle'	=> 'headroom',
				'src'		=> $_purl . 'assets/js/headroom.min.js',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true		
			),
			array(
				'target'	=> array('site'),
				'handle'	=> 'jquery-headroom',
				'src'		=> $_purl . 'assets/js/jQuery.headroom.min.js',
				'deps'		=> array('jquery'),
				'version'	=> '',
				'in_footer'	=> true
			),
			//ver1.0.1 addend
			//v1.2 add
			array(
				'target'	=> array('site'),
				'handle'	=> 'jquery-waypoints',
				'src'		=> $_purl . 'assets/js/jquery.waypoints.min.js',
				'deps'		=> array('jquery'),
				'version'	=> '4.0.1',
				'in_footer'	=> true
			),
			//v1.2 addend
			//v1.2.7 add
			array(
				'target'	=> array('site'),
				'handle'	=> 'lazysizes',
				'src'		=> $_purl . 'assets/js/lazysizes-gh-pages/lazysizes.min.js',
				'deps'		=> array(),
				'version'	=> '4.0.2',
				'in_footer'	=> false
			),
			//v1.2.7 addend
			array(
				'target'	=> array('builder'),
				'handle'	=> 'weluka-builder',
				'src'		=> $_purl . 'assets/js/' . $welukaBuilderJs,
				'deps'		=> array('jquery'),
				'version'	=> self::$settings['plugin_version'],
				'in_footer'	=> true
			),
			array(
				'target'	=> array('builder', 'site'),
				'handle'	=> 'weluka-google-map',
				'src'		=> $_purl . 'assets/js/' . $welukaMapJs,
				'deps'		=> array(),
				'version'	=> self::$settings['plugin_version'],
				'in_footer'	=> true
			),
			array(
				'target'	=> array('builder', 'site'),
				'handle'	=> 'weluka',
				'src'		=> $_purl . 'assets/js/' . $welukaJs,
				'deps'		=> array('jquery'),
				'version'	=> self::$settings['plugin_version'],
				'in_footer'	=> true
			),
		);
	}
	
	/**
	 * jquery version check
	 * @since 1.0
	 */
	public function check_jquery_ver() {
		global $wp_scripts;
		
		if ( ! empty( $wp_scripts->registered['jquery']->ver ) && ! empty( $wp_scripts->registered['jquery']->src ) && $wp_scripts->registered['jquery']->ver < '1.9.1' ) {
			return false;
		}
		return true;
	}

	/**
	 * module load
	 * @since 1.0
	 */
	public function includes() {

		//admin settings
		if ( ! class_exists( 'WelukaAdminSettings', false ) )
			require( self::$settings['plugin_dir'] . 'class-weluka-admin-settings.php' );

		//page builder
		if ( ! class_exists( 'WelukaBuilder', false ) )
			require( self::$settings['plugin_dir'] . 'class-weluka-builder.php' );

		//widgets
		if ( ! class_exists( 'WelukaWidget', false ) )
			require( self::$settings['plugin_dir'] . 'class-weluka-widget.php' );

		//seo
		if ( ! class_exists( 'WelukaSeo', false ) )
			require( self::$settings['plugin_dir'] . 'class-weluka-seo.php' );

		if( $this->check_weluka_theme() && ! class_exists( 'WelukaTheme', false ) )
			require( self::$settings['plugin_dir'] . 'class-weluka-theme.php' );
	}

	/**
	 * hook registory
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.2
	 * ver1.0.3
	 * ver1.0.4
	 * ver1.0.5.2
	 * ver1.0.6
	 * ver1.1
	 * ver1.1.1
	 */
	public function hooks() {
		$builder	= WelukaBuilder::get_instance();
		$seo		= WelukaSeo::get_instance();

		//add_action( 'admin_enqueue_scripts', array( &$this, 'admin_styles_scripts_common' ) );
		WelukaAdminSettings::init(); //管理画面 設定ページ
		
		// theme form call
		//if( class_exists( 'WelukaTheme', false ) ) {
		//	WelukaTheme::get_instance()->init();
		//}

		//add_action('init', array( &$this, 'weluka_session_start')); //v1.0.6 comment out
		add_action('admin_init', array( &$this, 'weluka_admin_init'));

		
		//WelukaAdminSettings::init(); //管理画面 設定ページ
		WelukaAdminSettings::create_webfont_css(); //case after update

		add_action( 'wp_enqueue_scripts', array( &$this, 'output_scripts'), 7 ); //site js load
		
		//v1.0.3
		//add_action( 'template_redirect', array( &$seo, 'template_redirect' ), 0 );
		add_action( 'get_header', array( &$seo, 'get_header' ), 0 );
		add_action( 'wp_footer', array( &$seo, 'wp_footer' ), 99999999 );

		//v1.0.2
		//$wpMetaData	= WelukaAdminSettings::get_site_options( Weluka::$settings['seo_option_name'], WelukaAdminSettings::META_ARRAY_FIELD );
		$wpMetaData	= WelukaAdminSettings::get_site_options( Weluka::$settings['seo_option_name'], WelukaAdminSettings::META_ARRAY_FIELD, true );
		//v1.0.2
		if( isset( $wpMetaData[WelukaAdminSettings::META_WP_GENERATOR] ) && $wpMetaData[WelukaAdminSettings::META_WP_GENERATOR] === 'off' ) {
			remove_action('wp_head', 'wp_generator');
		}
		if( isset( $wpMetaData[WelukaAdminSettings::META_RSD_LINK] ) && $wpMetaData[WelukaAdminSettings::META_RSD_LINK] === 'off' ) {
			remove_action('wp_head', 'rsd_link');
		}
		if( isset( $wpMetaData[WelukaAdminSettings::META_WLWMANIFEST_LINK] ) && $wpMetaData[WelukaAdminSettings::META_WLWMANIFEST_LINK] === 'off' ) {
			remove_action('wp_head', 'wlwmanifest_link');
		}
		if( isset( $wpMetaData[WelukaAdminSettings::META_RSS_FEED] ) && $wpMetaData[WelukaAdminSettings::META_RSS_FEED] === 'off' ) {
			remove_action( 'wp_head', 'feed_links', 2);
			remove_action( 'wp_head', 'feed_links_extra', 3);

			// RDF/RSS 1.0
			remove_action('do_feed_rdf', 'do_feed_rdf', 10, 1);
			// RSS 0.92
			remove_action('do_feed_rss', 'do_feed_rss', 10, 1);
			// RSS 2.0
			remove_action('do_feed_rss2', 'do_feed_rss2', 10, 1);
			// ATOM
			remove_action('do_feed_atom', 'do_feed_atom', 10, 1);
			//automatic_feed_links(false);
		}
		
		add_action( 'wp_head', array( &$this, 'add_head2'), 0);	//site wp_head v1.0.4 add
		add_action( 'wp_head', array( &$seo, 'add_head'), 1);	//site wp_head
		add_action( 'wp_head', array( &$this, 'add_head'), 9999); //site wp_head v1.2.3 999 => 9999 modify
		add_action( 'wp_footer', array( &$this, 'add_footer'), 999); //site wp_footer
		
		add_action( 'current_screen', array( &$this, 'admin_post_init'), 999); //admin page
		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_styles_scripts_common' ) );

		//add_filter('page_row_actions', 'FLBuilderAdminPosts::render_row_actions_link'); //固定ページ一覧のタイトルマウスオーバー時表示の下部リンク追加
		//add_filter('post_row_actions', 'FLBuilderAdminPosts::render_row_actions_link'); //固定ページ一覧のタイトルマウスオーバー時表示の下部リンク追加

		//tinymce
		//if (!class_exists('Tinymce_Advanced')) {
			//add_filter( 'mce_buttons', array( &$this, 'mce_buttons_1' ), 999, 2 );
			add_filter( 'mce_buttons_2', array( &$this, 'mce_buttons_2' ), 9999 );
			//add_filter( 'mce_buttons_3', array( &$this, 'mce_buttons_3' ), 999 );
			//add_filter( 'mce_buttons_4', array( &$this, 'mce_buttons_4' ), 999 );
			//add_filter( 'tiny_mce_plugins', array( &$this, 'tiny_mce_plugins' ), 9999 );
			add_filter( 'tiny_mce_before_init', array( &$this, 'tinymce_setting'), 10000 );  //tinyMCE Advanced after exec
		//}
		
		//ajax hook
		add_action('wp_ajax_weluka_get_site_content', array(&$builder, 'weluka_get_site_content')); //Weluka builder button click
		add_action('wp_ajax_weluka_save_content', array(&$builder, 'weluka_save_content')); //Weluka builder button click
		add_action('wp_ajax_weluka_add_widgetdata', array(&$builder, 'weluka_add_widgetdata')); //Weluka builder widget add
		add_action('wp_ajax_weluka_move_data', array(&$builder, 'weluka_move_data')); //Weluka builder section or row or col or widget move
		add_action('wp_ajax_weluka_get_html', array(&$builder, 'weluka_get_html')); //Weluka builder model to html
		add_action('wp_ajax_weluka_partial', array(&$builder, 'weluka_partial')); //Weluka builder partial data registory
		add_action('wp_ajax_weluka_layout_select', array(&$builder, 'weluka_layout_select')); //v1.0.3 add layout select

		//site hook
		//remove_filter ('the_content', 'wpautop');

		add_filter( 'posts_results', array(&$builder, 'render_posts_results'), 10, 2);
		add_action( 'save_post', array(&$builder, 'render_save_post'), 10, 2);
		add_action( 'save_post', array(&$builder, 'render_save_post_revision'), 11, 2); //v1.0.5.2
		add_action( 'wp_restore_post_revision', array(&$builder, 'render_restore_post_revision'), 10, 2);	//v1.0.5.2

		add_filter('excerpt_more', array($this, 'excerpt_more') ); //抜粋の[...]表示を変更

		//remove_filter('the_excerpt', 'wpautop');
        add_filter('the_excerpt', array(&$builder, 'excerpt'));
		add_filter('get_the_excerpt', array(&$builder, 'excerpt'));
		add_filter('widget_text', 'do_shortcode');

		// add v1.2.8 for posts order random
		add_filter('posts_orderby', array(&$builder, 'fix_rand_orderby'), 10, 2);

		//shortcode
		add_shortcode( 'weluka-builder-content', array(&$builder, 'sh_weluka_builder_content') );
		add_shortcode( 'weluka-default-content', array(&$builder, 'sh_weluka_default_content') );
		add_shortcode( 'weluka-builder-content2', array(&$builder, 'sh_weluka_builder_content2') );

		add_shortcode( $builder->gmap_shortcode_tag, array(&$builder, 'sh_weluka_gmap') );
		add_shortcode( $builder->wpposts_shortcode_tag, array(&$builder, 'sh_weluka_wpposts') );
		add_shortcode( $builder->wpmenu_shortcode_tag, array(&$builder, 'sh_weluka_wpmenu') );
		add_shortcode( $builder->wpmenu_shortcode_tag2, array(&$builder, 'sh_weluka_wpmenu2') );
		add_shortcode( $builder->wparchives_shortcode_tag, array(&$builder, 'sh_weluka_wparchives') );
		add_shortcode( $builder->wpcalendar_shortcode_tag, array(&$builder, 'sh_weluka_wpcalendar') );
		add_shortcode( $builder->wpcategories_shortcode_tag, array(&$builder, 'sh_weluka_wpcategories') );
		add_shortcode( $builder->wpmeta_shortcode_tag, array(&$builder, 'sh_weluka_wpmeta') );
		add_shortcode( $builder->wppages_shortcode_tag, array(&$builder, 'sh_weluka_wppages') );
		add_shortcode( $builder->wpcomments_shortcode_tag, array(&$builder, 'sh_weluka_wpcomments') );
		add_shortcode( $builder->wprss_shortcode_tag, array(&$builder, 'sh_weluka_wprss') );
		add_shortcode( $builder->wpsearch_shortcode_tag, array(&$builder, 'sh_weluka_wpsearch') );
		add_shortcode( $builder->wptagcloud_shortcode_tag, array(&$builder, 'sh_weluka_wptagcloud') );
		
		//add v1.2.6
		add_shortcode( $builder->sh_auto_url_facebook, array(&$builder, 'sh_weluka_auto_url_facebook') );
		add_shortcode( $builder->sh_auto_url_twitter, array(&$builder, 'sh_weluka_auto_url_twitter') );
		add_shortcode( $builder->sh_auto_url_gplus, array(&$builder, 'sh_weluka_auto_url_google') );
		add_shortcode( $builder->sh_auto_url_hatebu, array(&$builder, 'sh_weluka_auto_url_hatebu') );
		add_shortcode( $builder->sh_auto_url_line, array(&$builder, 'sh_weluka_auto_url_line') );
		add_shortcode( $builder->sh_auto_url_pocket, array(&$builder, 'sh_weluka_auto_url_pocket') );
		
		//add v1.2.4.5
		add_shortcode( $builder->sh_facebook, array(&$builder, 'sh_weluka_facebook') );
		add_shortcode( $builder->sh_twitter, array(&$builder, 'sh_weluka_twitter') );
		add_shortcode( $builder->sh_gplus, array(&$builder, 'sh_weluka_google') );
		add_shortcode( $builder->sh_hatebu, array(&$builder, 'sh_weluka_hatebu') );

		add_shortcode( 'weluka-phone', array(&$this, 'sh_weluka_phone') );
		add_shortcode( 'weluka-mail', array(&$this, 'sh_weluka_mail') );
		add_shortcode( 'weluka-custom-list', array(&$this, 'sh_weluka_custom_list') );
		add_shortcode( 'weluka-cf', array(&$this, 'sh_weluka_custom_field') );	//v1.0.3 add
		
		//add v1.2.7.1
		add_shortcode( $builder->bgvideo_shortcode_tag, array(&$builder, 'sh_weluka_bgvideo') );
		add_shortcode( $builder->bgvideocss_shortcode_tag, array(&$builder, 'sh_weluka_bgvideocss') );
		

		//google map url to shortcode tranclate
		wp_embed_register_handler(
			'embed-google-map',
			'#( https://( www|maps ).google.[a-z]{2,3}\.?[a-z]{0,3}/maps( /ms )?\?.+ )#i',
			array( &$builder, 'gmap_embed_handler' )
		);
		
		//v1.1 add svg対応
		add_filter( 'ext2type', array(&$this, 'fi_weluka_ext2type') );
		add_filter( 'upload_mimes', array(&$this, 'fi_weluka_upload_mimes') );
		add_filter('getimagesize_mimes_to_exts', array(&$this, 'fi_weluka_mimes_to_exts') );
		//v1.1 add end
		
		//v1.1.1 add
		add_action( 'parse_query', array(&$this, 'ac_parse_query') );
	}
	
	/**
	 * init hook session start
	 * @since 1.0
	 */
/* v1.0.6 comment out
	public function weluka_session_start() {
		if( !session_id() ) {
			session_start();
		}
	}
*/

	/**
	 * admin_init hook
	 * updater
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 */
	public function weluka_admin_init() {
	}

	/**
	 * tinymce button_2 hook
	 * @since 1.0
	 */
	public function mce_buttons_2( $original ) {
		$buttons_2 = array('formatselect', 'fontselect', 'fontsizeselect', 'styleselect', 'forecolor', 'backcolor', 'table', 'hr', 'anchor');
		if ( is_array( $original ) && ! empty( $original ) ) {
			$original = array_diff( $original, $buttons_2 );
			$buttons_2 = array_merge( $buttons_2, $original );
		}
		return $buttons_2;
	}

	/** tiny_plugin_plugins hook
	 * @since 1.0
	 */
	/*
	public function tiny_mce_plugins( $plugins ) {
		if ( !in_array( 'table', $plugins ) ) {
			$plugins[] = 'table';
		}
		error_log(print_r($plugins, true));
		return $plugins;
	}*/

	/**
	 * tiny_mce_before_init hook
	 * @since 1.0
	 * @update
	 * ver1.2.4.4
	 */
	public function tinymce_setting($initArray) {
		$initArray['wordpress_adv_hidden']	= false;
		// set font size
		$initArray['fontsize_formats'] = "6px 7px 8px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 36px 38px 40px 41px 42px 43px 44px 45px 46px 47px 48px 49px 50px 51px 52px 53px 54px 55px 56px 57px 58px 59px 60px 61px 62px 63px 64px 65px 66px 67px 68px 69px 70px 71px 72px"; //"9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";

		//wordpress default
    	$styleFormats = array(
			array(
            	'title' => 'Headings',
                	'items' => array(
                		array( 'title' => 'Heading 1', 'format' => 'h1' ),
                		array( 'title' => 'Heading 2', 'format' => 'h2' ),
                		array( 'title' => 'Heading 3', 'format' => 'h3' ),
                		array( 'title' => 'Heading 4', 'format' => 'h4' ),
                		array( 'title' => 'Heading 5', 'format' => 'h5' ),
                		array( 'title' => 'Heading 6', 'format' => 'h6' )
            		)
        	),
			array(
				'title' => 'Inline',
				'items' => array(
        			array( 'title' => 'Bold', 'icon' => 'bold', 'format' => 'bold' ),
        			array( 'title' => 'Italic', 'icon' => 'italic', 'format' => 'italic' ),
        			array( 'title' => 'Underline', 'icon' => 'underline', 'format' => 'underline' ),
        			array( 'title' => 'Strikethrough', 'icon' => 'strikethrough', 'format' => 'strikethrough' ),
        			array( 'title' => 'Superscript', 'icon' => 'superscript', 'format' => 'superscript' ),
        			array( 'title' => 'Subscript', 'icon' => 'subscript', 'format' => 'subscript' ),
        			array( 'title' => 'Code', 'icon' => 'code', 'format' => 'code' )
				)
			),
			array(
				'title' => 'Blocks',
				'items' => array(
        			array( 'title' => 'Paragraph', 'format' => 'p' ),
        			array( 'title' => 'Blockquote', 'format' => 'blockquote' ),
        			array( 'title' => 'Div', 'format' => 'div' ),
        			array( 'title' =>'Pre', 'format' => 'pre' )
				)
			),
			array(
				'title' => 'Alignment',
				'items' => array(
        			array( 'title' => 'Left', 'icon' => 'alignleft', 'format' => 'alignleft' ),
        			array( 'title' => 'Center', 'icon' => 'aligncenter', 'format' => 'aligncenter' ),
        			array( 'title' => 'Right', 'icon' => 'alignright', 'format' => 'alignright' ),
        			array( 'title' => 'Justify', 'icon' => 'alignjustify', 'format' => 'alignjustify' )
				)
			),
    	);

		//$cssUrl = WelukaAdminSettings::check_webfont_enable() ? self::$settings['webfont_css_url'] : "";
		$cssUrl = WelukaAdminSettings::check_webfont_enable() ? $this->get_webfont_fname('url') : "";
		
		if($cssUrl !== "") {
			if(empty($initArray['content_css'])) {
        		$initArray['content_css'] = $cssUrl;
    		} else {
        		$initArray['content_css'] = $initArray['content_css'] . ',' . $cssUrl;
    		}
		}

		$orgFonts = isset($initArray['font_formats']) ? $initArray['font_formats'] : 'Gothic=Lucida Grande,Lucida Sans Unicode,Hiragino Kaku Gothic Pro,Meiryo,MS PGothic,Helvetica,Arial,Verdana,sans-serif;Mincho=HiraMinProN-W6,MS PMincho,serif;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
		$addFonts = "";
		$addStyles = array();
		$cnt = 0;
		$fonts = WelukaAdminSettings::get_webfonts();
		if( ! empty( $fonts) ) {
			foreach($fonts as $key => $val) :
				$family = WelukaAdminSettings::replace_webfonts_family($key);
				//v1.2.4.4 add and modify
				if( $family != "Mplus 1p" && $family != "Rounded Mplus 1c") {
					$_wkfamily = $family;
				} else {
					$_wkfamily = "'" . $family . "'";
				}
				//$addFonts .= $family . '='. $family . ',' . $val['category'] . ';';
				$addFonts .= $family . '='. $_wkfamily . ',' . $val['category'] . ';';
				//end v1.2.4.4 add and modify

				//style_formats
				if(isset($val['styles']) && strlen($val['styles']) > 0) {
					$styles = explode(",", $val['styles']);
					foreach($styles as $s) :
						$t = $family;
						$weight = mb_ereg_replace('[^0-9]', '', $s);
						$style = mb_ereg_replace('[^a-zA-Z]', '', $s);
						if(strlen($weight) > 0 || strlen($style) > 0) {
							if(strlen($weight) > 0){
								$addStyles[$cnt]['styles']['fontWeight'] = $weight;
								$t .= ' ' . $weight;
							}
							if(strlen($style) > 0){
								$addStyles[$cnt]['styles']['fontStyle'] = mb_strtolower($style);
								$t .= ' ' . $style;
							}
							$addStyles[$cnt]['inline'] = 'span';
							$addStyles[$cnt]['title'] = $t;
						}
						$cnt++;
					endforeach;
				}
			endforeach;
		}
		$addFonts .= $orgFonts;
    	$initArray['font_formats'] = $addFonts;

		if(is_array($addStyles) && count($addStyles) > 0) {
			$addArr = array(
				'title' => 'webfonts',
				'items' => $addStyles
			);
			$styleFormats[] = $addArr;
		}

/*		
		$other = array(
			'title'	=> 'other',
			'items' => array(
				array( 'title' => 'Float Clear', 'selector' => 'p,div,ol,ul,h1,h2,h3,h4,h5', 'classes' => 'clear')
			)
		);
		$styleFormats[] = $other;
*/	
		$initArray['style_formats'] = json_encode( $styleFormats );

		// block no set style add
		$initArray['body_class'] = apply_filters('weluka_tinymce_body_class_args', ''); //tinyMCE iframe body class use theme apply_filters
		return $initArray;
	}

	/**
	 * @since 1.0
	 */
	public function excerpt_more( $more ) {
    	return ' ...';
	}

/*------------------------------------------------------------------------------
 [ css js settings ] 
------------------------------------------------------------------------------*/
	
	/**
	 * wp_enqueue_scripts hook
	 * js queue setting
	 * @since 1.0
	 */
	public function output_scripts() {
		$this->enque_styles('site');
		$this->enque_scripts('site');
		if( $this->is_edit_builder() && $this->is_active_builder() ) {
			wp_enqueue_media(); //media manager

			//wp_enqueue_script('wp-link'); //link manager
			$this->enque_styles('builder');
			$this->enque_scripts('builder');
		}
	}

	/**
	 * style css enque
	 * @param
	 *	string ... site=site load、admin=admin load
	 * @since 1.0
	 * @update
	 * ver1.1.4
	 * ver1.2
	 */
	public function enque_styles($target, $styles = null) {
		$_styles = !empty( $styles ) ? $styles : self::$settings['load_css'];
		foreach( $_styles as $_style) :
			$flg = false;
			if(in_array("site", $_style['target'])){
				if($target === 'site') { $flg = true; }	
			}
			if(in_array("admin", $_style['target']) || in_array("admin_common", $_style['target'])){
				if($target === 'admin'){ $flg = true; }
			}
			if(in_array("builder", $_style['target'])) {
				if($target === 'builder'){ $flg = true; }
			}
			if(in_array("all", $_style['target'])) {
				$flg = true;
			}
			
			if( ! $flg ) { continue; }
			
			if( !wp_style_is($_style['handle']) ) {
				$_v = $_style['version'];
				if(self::$settings['debug'])
					$_v .= mt_rand();

				if( ( $_style['handle'] === 'bootstrap-weluka' || $_style['handle'] === 'weluka-bootstrap-color-picker' ) && in_array("admin_common", $_style['target']) ) {
					//load admin commom mode
					$_curpage = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : '';
					//v1.1.4 weluka_options add
					if ( !is_admin() || ( $_curpage !== 'WelukaTheme-color' && $_curpage !== 'weluka_options' ) ) { continue; }
					//v1.2 WelukaTheme addcancel
					//if ( !is_admin() || ( $_curpage !== 'WelukaTheme-color' && $_curpage !== 'weluka_options' && $_curpage !== 'WelukaTheme' ) ) { continue; }
				}

				if(isset($_style['src']) && $_style['src'] !== "") {
					$_media = isset($_style['media']) && $_style['media'] !== "" ? $_style['media'] : 'all';
					wp_enqueue_style($_style['handle'], $_style['src'], $_style['deps'], $_v, $_media );
				} else {
					//wordpress bundle
					wp_enqueue_style($_style['handle']);
				}
			}
		endforeach;
		
		//web fonts
		if(WelukaAdminSettings::check_webfont_enable()) {
			//wp_enqueue_style("weluka-webfont", self::$settings['webfont_css_url'], array(), self::$settings['plugin_version'], "all" );
			wp_enqueue_style("weluka-webfont", $this->get_webfont_fname('url'), array(), self::$settings['plugin_version'], "all" );
		}
	}

	/**
	 * scripts  enque
	 * @param
	 *	string ... site=site load、admin=admin load
	 * @since 1.0
	 * @update
	 * ver1.0.1 msg add
	 * ver1.0.7.1
	 * ver1.1.4
	 * ver1.2
	 */
	public function enque_scripts($target, $scripts = null) {
		$_scripts = !empty( $scripts ) ? $scripts : self::$settings['load_js'];

		//jquery
		if($this->check_jquery_ver()){
		}else{
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery',  self::$settings['plugin_url'] . 'assets/js/jquery-1.11.2.min.js', array(), '1.11.2' );
		}

		foreach( $_scripts as $_script) :
			$flg = false;
			if(in_array("site", $_script['target'])){
				if($target === 'site') { $flg = true; }	
			}
			if(in_array("admin", $_script['target']) || in_array("admin_common", $_script['target'])){
				if($target === 'admin'){ $flg = true; }
			}
			if(in_array("builder", $_script['target'])) {
				if($target === 'builder'){ $flg = true; }
			}
			if(in_array("all", $_script['target'])) {
				$flg = true;
			}

			if( !$flg ) { continue; }
			
			if( !wp_script_is($_script['handle']) ) {
				$_v = $_script['version'];
				if(self::$settings['debug'] || $_v === false)
					$_v .= mt_rand();

				if( ( $_script['handle'] === 'bootstrap' || $_script['handle'] === 'weluka-bootstrap-colorpicker' ) && in_array("admin_common", $_script['target']) ) {
					//load admin commom mode
					$_curpage = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : '';
					//v1.1.4 weluka_options add
					if ( !is_admin() || ( $_curpage !== 'WelukaTheme-color' && $_curpage !== 'weluka_options' ) ) { continue; }
					//v1.2 WelukaTheme addcancel
					//if ( !is_admin() || ( $_curpage !== 'WelukaTheme-color' && $_curpage !== 'weluka_options' && $_curpage !== 'WelukaTheme' ) ) { continue; }
				}
				//v1.0.7.1 add
				if( $_script['handle'] === 'google-maps-api' ) {
					$_apikey	= WelukaAdminSettings::get_options(WelukaAdminSettings::GMAP_JS_APIKEY_OPTION_NAME);
					if( $_apikey ) { $_apikey = "?key=" . $_apikey;  }
					$newsrc = str_replace('{%APIKEY%}', $_apikey, $_script['src']);
					$_script['src'] = $newsrc;
				}
				//v1.0.7.1 addend
				
				if(isset($_script['src']) && $_script['src'] !== "") {
					wp_enqueue_script($_script['handle'], $_script['src'], $_script['deps'], $_v, $_script['in_footer']);
				} else {
					//wordpress bundle
					wp_enqueue_script($_script['handle']);
				}
			}
		endforeach;
		
		//in javascript file use variable
		wp_localize_script('weluka-admin', 'welukaWp',
            array(
                'ajax_url'	=> self::$settings['ajax_url'],
				'admin_url'	=> self::$settings['admin_url'],
                'nonces'	=> array(
                    'weluka_get_site_content'	=> wp_create_nonce('wp_ajax_weluka_get_site_content'),
                    'weluka_save_content'		=> wp_create_nonce('wp_ajax_weluka_save_content'),
                ),
				'msgs'		=> array(
					'close_confirm_msg'	=> __('Did you save?. Are you sure you want to leave this page?', self::$settings['plugin_name']),
					'content_null_save_confirm_msg'	=> __('But do contents preserve a blank (null)?', self::$settings['plugin_name']),	//ver1.0.1 add
				)
            )
        );
	}
	
	/**
	 * site wp_head hook
	 * @since 1.0
	 * @update
	 * ver1.1.1
	 * ver1.1.2
	 * ver1.1.4
	 * ver1.2.3
	 * ver1.2.4.3
	 */
	public function add_head() {
		global $post;
		$postType = get_post_type();
		if( $postType === self::$settings['cpt_hd'] || $postType === self::$settings['cpt_ft'] || $postType === self::$settings['cpt_sd'] ) {
			echo '<meta name="robots" content="noindex,nofollow" />';
		}
		
		//bootstrap old ie
		echo '<!--[if lt IE 9]>';
      	echo '<script src="' . self::$settings['plugin_url'] . 'assets/js/html5shiv.min.js"></script>';
      	echo '<script src="' . self::$settings['plugin_url'] . 'assets/js/respond.min.js"></script>';
    	echo '<![endif]-->';
		
		//v1.1.1 add
		if( $this->check_weluka_theme() && class_exists( 'WelukaTheme', false ) ) {
			$_ovxHidden = WelukaAdminSettings::get_site_options( WelukaTheme::get_instance()->get_option_name(), WelukaTheme::SP_OVERFLOW_HIDDEN, true );
			//スマホのみ対象
			if( $this->is_smartphone()) {
				//スマホのbackgroun-attachement:fixed と background-size:cover のエラー回避
				echo '<style type="text/css">';
				echo '.weluka-section { background-attachment: scroll !important; }';
				if( $_ovxHidden ) {
					//v1.1.2 modify echo '#weluka-main-header,#main,#weluka-main-footer{ width:100%;overflow-x:hidden; }';
					echo '.ovx-hidden{ width:100%;overflow-x:hidden; }';
				}
				echo '</style>';

				//v1.1.2 modify
				if( $_ovxHidden ) {
					echo '<script type="text/javascript">';
					echo 'jQuery(document).ready(function($) {';
					echo '$("body").wrapInner(' . "'" . '<div class="ovx-hidden"></div>' . "')"; 
					echo '});';
					echo '</script>';
				}
			}
		}
		//v1.1.1 addend

		//v1.2.3 addF
		$_psData = $this->get_page_setting();
		//css
		if( !empty( $_psData['csscode'] ) ) {
			echo '<style type="text/css">';
			echo str_replace( array("\r", "\n", "{%BS%}"), array("", "", "\\"), wp_unslash( $_psData['csscode'] ) );
			echo '</style>';
		}
		//v1.2.3 addend
		
		//v1.1.4 add
		if( !is_admin() && !$this->is_active_builder()) {
			$_ptopData	= WelukaAdminSettings::get_options( WelukaAdminSettings::PAGETOP_LINK_OPTION_NAME );
			if( !empty( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_DISP] ) ) {
				$_class 	= '';
				if( !empty( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_POS] ) ) { $_class = $_ptopData[WelukaAdminSettings::PAGETOP_LINK_POS]; }
				if( !empty( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_POS_SP] ) ) { $_class .= ' ' . $_ptopData[WelukaAdminSettings::PAGETOP_LINK_POS_SP]; }
				if( !empty( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_NODISP_SP] ) ) { $_class .= ' hidden-xs'; } //スマホ 非表示
				$_style = '';
				
				if( isset( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_BGCOLOR] ) && strlen( trim( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_BGCOLOR] ) ) ) {
					$_style = 'background-color:' . trim( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_BGCOLOR] ) . ';';
				}
				if( isset( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_COLOR] ) && strlen( trim( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_COLOR] ) ) ) {
					$_style .= 'color:' . trim( $_ptopData[WelukaAdminSettings::PAGETOP_LINK_COLOR] ) . ';';
				}

				if( $_style ) {
					echo '<style type="text/css">';
					echo '#weluka-pagetop-link {' . $_style . '}';
					echo '</style>';
				}
				
				echo '<script type="text/javascript">';
				echo 'jQuery(document).ready(function($) {';
				echo '$("body").append(\'<a id="weluka-pagetop-link" href="#" class="' . $_class . '" title="page top"><i class="fa fa-angle-up"></i></a>\');'; 
				echo '});';
				echo '</script>';
				
			}
			
			//1.2.4.5 add
			$_ogpData	= WelukaAdminSettings::get_options( WelukaAdminSettings::OGP_OPTION_NAME );

			//facebook twitter 共通
			if( !empty( $_ogpData[WelukaAdminSettings::F_APP_ID]) || !empty($_ogpData[WelukaAdminSettings::CARD_TYPES])){
				
				$postId		= $this->get_post_id();
				$siteType   =  get_post_meta($postId,self::$settings['ogpsitetype'],true);
				$metaCenter = '';
				
				
				if(!empty($siteType)){
					$metaOGPTag = '<meta property="og:type" content="'.$siteType.'">';
				}else if ( is_home() || is_front_page() ){
					$metaOGPTag = '<meta property="og:type" content="website">';
				}else{
					$metaOGPTag = '<meta property="og:type" content="article">';
				}	
				

				if (is_singular(array( 'post','page' ))){
					//if(have_posts()): while(have_posts()): the_post();
					//_aioseop_description is All in one SEO's option.
					
					
					$builder	= WelukaBuilder::get_instance();
					$pageOpt	= $builder->get_builder_data($postId, WelukaBuilder::CONTENT_POSTMETA_KEY_PUBLISH, 'pagesetting');

					if( !empty( $pageOpt['seo_description'] ) ){ $ogpDescription = $pageOpt['seo_description']; }
					else{ $ogpDescription = get_the_excerpt(); }


					$metaCenter.= '<meta property="og:description" content="'.$ogpDescription.'">';
					$metaCenter.= "\n";
					
					$metaCenter.= '<meta property="og:title" content="';
					$metaCenter.= get_the_title();  
					$metaCenter.= '">'; 
					$metaCenter.=  "\n";
					$metaCenter.= '<meta property="og:url" content="'.get_permalink();  
					$metaCenter.= '">';
					$metaCenter.= "\n";
					$ogpImgUrl = esc_url(get_post_meta($postId,self::$settings['ogpimgkey'],true));
				} else {
					$metaCenter.= '<meta property="og:description" content="'; 
					$metaCenter.= get_bloginfo('description'); $metaCenter.= '">'; $metaCenter.= "\n";
					$metaCenter.= '<meta property="og:title" content="'; 
					$metaCenter.= get_bloginfo('name');  
					$metaCenter.= '">'; 
					$metaCenter.= "\n";
					$metaCenter.= '<meta property="og:url" content="'; 
					$metaCenter.= get_bloginfo('url'); 
					$metaCenter.= '">';
					$metaCenter.= "\n";
					$ogpImgUrl = "";
				}
				
				$metaThumbnail = '';
				

				if (is_singular(array( 'post','page' ))){
					if (!empty($ogpImgUrl)){
						$metaThumbnail.= '<meta property="og:image" content="'.$ogpImgUrl.'">';
						$metaThumbnail.= "\n";
					} else if (has_post_thumbnail()) {
						$image_id = get_post_thumbnail_id();
						$image = wp_get_attachment_image_src( $image_id, 'full');
						$metaThumbnail.= '<meta property="og:image" content="'.$image[0].'">';
						$metaThumbnail.= "\n";
					} else {//投稿にサムネイルも画像も無い場合の処理
						$_noImg = WelukaAdminSettings::get_site_options( WelukaTheme::get_instance()->get_option_name(), WelukaTheme::NO_IMAGE_FILE, true );
						$_noImg = !empty($_noImg) ? $_noImg : self::$settings['noimage'];
						
						$metaThumbnail.= '<meta property="og:image" content="'.$_noImg.'">';
						$metaThumbnail.= "\n";
					}
				} else {
					
					$_noImg = WelukaAdminSettings::get_site_options( WelukaTheme::get_instance()->get_option_name(), WelukaTheme::NO_IMAGE_FILE, true );
					$_noImg = !empty($_noImg) ? $_noImg : self::$settings['noimage'];
								
					$metaThumbnail.= '<meta property="og:image" content="'.$_noImg.'">';
					$metaThumbnail.= "\n";
				}

				$metaOGPEndTag = '<meta property="og:site_name" content="'.get_bloginfo('name').'">';
				
				$metaOGPEndTag .= !empty( $_ogpData[WelukaAdminSettings::F_APP_ID]) ? '<meta property="fb:app_id" content="'.$_ogpData[WelukaAdminSettings::F_APP_ID].'">' : '';
				
			
				$cardHtml = '';
				if($_ogpData[WelukaAdminSettings::CARD_TYPES]){
					$cardHtml = '<meta name="twitter:card" content="'.$_ogpData[WelukaAdminSettings::CARD_TYPES].'" />';
					$cardHtml .= !empty($_ogpData[WelukaAdminSettings::TWITTER_ID])? '<meta name="twitter:site" content="@'.$_ogpData[WelukaAdminSettings::TWITTER_ID].'" />' :'';
					if($_ogpData[WelukaAdminSettings::CARD_TYPES] === 'player'){
						if (is_singular(array( 'post','page' ))){
							$videoUrl =  get_post_meta($postId,self::$settings['cardvideokey'],true);
							$videoWidth =  get_post_meta($postId,self::$settings['videoWidthkey'],true);
							$videoHeight =  get_post_meta($postId,self::$settings['videoHeightkey'],true);
						}else{
							$videoUrl    = '';
							$videoWidth  = '';
							$videoHeight = '';
						}
						
						$videoUrl = !empty($videoUrl) ? esc_url($videoUrl) : esc_url($_ogpData[WelukaAdminSettings::COMMON_CARD_VIDEO]) ;
						if(!empty($videoUrl)){
							
							//youtubeページリンクを埋め込みリンクに置換
							$videoUrl = str_replace("youtube.com/watch?v=", "youtube.com/embed/", $videoUrl,$matchYoutube);
							//他パラメータがある場合twitterで再生できないため&以降は削除
							$videoUrl = $matchYoutube > 0 ? substr($videoUrl, 0, strcspn($videoUrl,'&')) : $videoUrl ;
						
							if(empty($videoWidth)){
								$videoWidth = !empty($_ogpData[WelukaAdminSettings::CARD_VIDEO_WIDTH]) ? $_ogpData[WelukaAdminSettings::CARD_VIDEO_WIDTH] : '640' ;
							}
							if(empty($videoHeight)){
								$videoHeight = !empty($_ogpData[WelukaAdminSettings::CARD_VIDEO_HEIGHT]) ? $_ogpData[WelukaAdminSettings::CARD_VIDEO_HEIGHT] : '360' ;
							}
							$cardHtml .= '<meta name="twitter:player" content="'.$videoUrl.'" />';
							$cardHtml .= '<meta name="twitter:player:width" content="'.$videoWidth.'" />';
							$cardHtml .= '<meta name="twitter:player:height" content="'.$videoHeight.'" />';
						}
					}

				}
				$ogp_html = $metaOGPTag.$metaCenter.$metaThumbnail.$metaOGPEndTag.$cardHtml;
				echo $ogp_html;
			}
			//v1.2.4.5 addend

			
			
			//v1.2.4.3 add
			$embedCode	= WelukaAdminSettings::get_options(WelukaAdminSettings::COMMON_HEAD_EMBED_CODE);
			if( isset( $embedCode ) ) { echo wp_unslash( $embedCode ); }
			//v1.2.4.3 addend
			
			//v1.2.3 page add head js code
			//v1.2.4.2 modify 
			if( !empty( $_psData['jscodehd'] ) ) { echo str_replace( array("\r", "\n", "{%BS%}"), array("", "", "\\"), wp_unslash( $_psData['jscodehd'] ) ); }
		}
		//v1.1.4 addend
	}

	/**
	 * get page setting
	 * @since 1.2.3
	 */
	public function get_page_setting() {
		global $post;
		$builder = WelukaBuilder::get_instance();
		$ret = null;

		if ( is_front_page() || is_page() || is_single() ) {
			$mode = WelukaBuilder::CONTENT_POSTMETA_KEY_PUBLISH;

			if( $this->is_active_builder() || is_preview() ) {
				$mode = WelukaBuilder::CONTENT_POSTMETA_KEY_DRAFT;
			}
			$ret = $builder->get_builder_data($post->ID, $mode, 'pagesetting' );
		}
		return $ret;
	}
	
	/**
	 * site wp_head hook
	 * @since 1.0.4
	 */
	public function add_head2() {
		$opt = WelukaAdminSettings::get_options();
		if ( !empty( $opt[ WelukaAdminSettings::IE_COMPATIBILITY ] ) ) {
   			echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />' . PHP_EOL;
		}
		echo '<meta name="format-detection" content="telephone=no" />' . PHP_EOL;
	}

	/**
	 * site wp_footer hook
	 * @since 1.0
	 * @update
	 * ver1.2
	 * ver1.2.3
	 */
	public function add_footer() {
		if( !$this->is_active_builder() ) {
			$embedCode	= WelukaAdminSettings::get_options(WelukaAdminSettings::COMMON_EMBED_CODE);
			if( isset( $embedCode ) ) { echo wp_unslash( $embedCode ); }
//v1.2 add start
?>			
			<script type="text/javascript">
				//v1.2.9 jQuery(window).load( _welukaLoadAnimation );
				//function _welukaLoadAnimation() { weluka.initAnimate(); }
				jQuery(window).on('load', function() {
					if(typeof(welukaContentModel) == "undefined") {
						jQuery('.weluka-animate').each(function(){
							var _obj = jQuery( this ),
								_objTop = _obj.offset().top,
								_winHeight = jQuery( window ).height(),
								_bodyHeight = jQuery( 'body' ).height(),
								_offset = '90%';

							_obj.waypoint({
								offset: _offset,
								handler: function() {
									var _obj = 'undefined' == typeof this.element ? jQuery(this) : jQuery(this.element),
										_delay  = parseFloat(_obj.data('animate-delay'));

									if(!isNaN(_delay) && _delay > 0) {
										setTimeout(function(){
											_obj.addClass('weluka-animated');
										}, _delay * 1000);
									} else {
										_obj.addClass('weluka-animated');
									}
								}
							});
						});
					}
				});
			</script>
<?php
//v1.2 addend
			//v1.2.3 add
			$_psData = $this->get_page_setting();
			//page add footer js code
			//if( !empty( $_psData['jscodeft'] ) ) { echo wp_unslash( str_replace( array("\r", "\n", "{%BS%}"), array("", "", "\\"), $_psData['jscodeft'] ) ); }
			if( !empty( $_psData['jscodeft'] ) ) { echo str_replace( array("\r", "\n", "{%BS%}"), array("", "", "\\"), wp_unslash( $_psData['jscodeft'] ) ); }
		}
	}
	
/*------------------------------------------------------------------------------
 [ admin ] 
------------------------------------------------------------------------------*/

	/**
	 * current screen hook 
	 * admin post or post-new page display
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 */
    public function admin_post_init() {
		if( $this->is_admin_builder() ) {
			add_filter( 'admin_body_class', array( &$this, 'body_class' ) );
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_styles_scripts' ) );
			add_action( 'admin_head', array( &$this, 'add_head' ) );
			add_action( 'edit_form_after_title', array( WelukaBuilder::get_instance(), 'add_builder_button' ) );
			add_action( 'admin_footer', array( WelukaBuilder::get_instance(), 'add_builder_content' ) );
		}		
	}
	
	/**
	 * admin_body_class hook
	 * admin post.php post-new.php body class add
	 * @since 1.0
	 */
	public function body_class( $classes = '' ) {
		$classes .= ' weluka-builder-enabled ';
		return $classes;
	}

	/**
	 * admin_enqueue_scripts hook
	 * admin common head => load style and script
	 * @since 1.0
	 */
	public function admin_styles_scripts_common() {
		wp_enqueue_media(); //media manager

		self::enque_styles( 'admin', self::$settings['load_css_common'] );
		self::enque_scripts( 'admin', self::$settings['load_js_common'] );
	}
	
	/**
	 * admin_enqueue_scripts hook
	 * admin post.php post-new.php head => load style and script
	 * @since 1.0
	 */
	public function admin_styles_scripts() {
		wp_enqueue_script('wp-link'); //link manager
		self::enque_styles('admin');
		self::enque_scripts('admin');
	}

/*------------------------------------------------------------------------------
 [ Utility shortcode ]
------------------------------------------------------------------------------*/

	/**
	 * [weluka-phone] shortcode function
	 * @since 1.0
	 */
	public function sh_weluka_phone( $atts ) {
		extract(shortcode_atts(
			array(
				'h'		=> 'Tel.', //prefix
				'no'		=> '',	//phone number
				'disp'	=> '',	//display phone number
				'i'		=> false,	//true=phone icon output
				'style'	=> '',	//style font-size:2em; color:#ffffff etc...
				'tag'		=> 'div'	//html tag name
			),
			$atts)
		);

		$ret = "";
		$phone = $disp;
		$style	= isset( $style ) && trim( $style ) !== '' ? ' style="' . trim( $style ) . '"' : '';
		
		if( $this->is_smartphone() ){
			$rep = preg_replace("/[^0-9]+/", "", $no);
			$str = isset($disp) ? $disp : $no;
			$phone =  '<a href="tel:' . $rep . '"' . $style . '>' . $str . '</a>';
		}

		if( ! empty( $phone ) && ! empty( $h ) && empty( $i ) ){
			$phone = esc_attr( $h ) . "&nbsp;" . $phone;
		}

		if( ! empty( $phone ) && ! empty( $i ) ){
			$phone = '<i class="fa fa-phone"></i>' . $phone;
		}
		
		$tag = trim( $tag );
		$ret = '<' . $tag . ' class="weluka-phone"' . $style . '>' . $phone . '</' . $tag . '>';
		return $ret;
	}

	/**
	 * [weluka-mail] shortcode function
	 * @since 1.0
	 */
	public function sh_weluka_mail( $atts ) {
		extract(shortcode_atts(
			array(
				'h'		=> 'Email.', //prefix
				'addr'	=> '',	//email addrss
				'subject'	=> '',	//email subject
				'disp'	=> '',	//display string
				'i'		=> false,	//true=phone icon output
				'style'	=> '',	//style font-size:2em; color:#ffffff etc...
				'tag'	=> 'div'	//html tag name
			),
			$atts)
		);

		$ret = "";
		$mail = $disp;
		$style	= isset( $style ) && trim( $style ) !== '' ? ' style="' . trim( $style ) . '"' : '';
		
		if( !empty( $addr ) ){
			$sb = isset( $subject ) && trim( $subject ) ? '?subject=' . urlencode( trim( $subject ) ) : '';
			if( strchr($addr, "@") === false ) {
				$mail =  '<a href="' . $addr . '"' . $style . '>' . $disp . '</a>';
			} else {
				$mail =  '<a href="mailto:' . $addr . $sb . '"' . $style . '>' . $disp . '</a>';
			}
		}

		if( ! empty( $mail ) && ! empty( $h ) && empty( $i ) ){
			$mail = esc_attr( $h ) . "&nbsp;" . $mail;
		}

		if( ! empty( $mail ) && ! empty( $i ) ){
			$mail = '<i class="fa fa-envelope-o"></i>' . $mail;
		}
		
		$tag = trim( $tag );
		$ret = '<' . $tag . ' class="weluka-mail"' . $style . '>' . $mail . '</' . $tag . '>';
		return $ret;
	}

	/**
	 * [weluka-custom-list] shortcode function
	 * @since 1.0.1
	 */
	public function sh_weluka_custom_list( $atts, $content = '' ) {
		extract(shortcode_atts(
			array(
				'icon'		=> 'check', //font-awesome class
				'iconcolor'	=> '',	//icon color	
				'style'	=> ''	//style font-size:2em; color:#ffffff etc...
			),
			$atts)
		);

		$ret = "";
		$iconclass = isset( $icon ) && trim( $icon ) !== '' ? 'weluka-custom-list-' . $icon : '';
		if( !empty( $iconcolor ) ) {
			$iconcolor = str_replace(array('#',';'), array('',''), $iconcolor );
			$ret .= '<div class="weluka-hide"><style> .' . $iconclass . ' li:before { color:#' . $iconcolor . '; }</style></div>';
		}
		$style	= isset( $style ) && trim( $style ) !== '' ? ' style="' . trim( $style ) . '"' : '';
		$ret .= '<div class="weluka-custom-list ' . $iconclass. '"' . $style . '>' . do_shortcode($content) . '</div>';
		return $ret;
	}

	/**
	 * [weluka-cf] shortcode function
	 * custom fileds
	 * @since 1.0.3
	 */
	public function sh_weluka_custom_field( $atts ) {
		global $post;
		extract(shortcode_atts(
			array(
				'id'		=> '', //post_id
				'name'		=> '',	//custom filed name
				'single'	=> true,	//post_idに設定されている同名のカスタムフィールド値の取得方法 true=1つのみ、false=全部
				'delim'		=> '',	//複数ある場合の区切り文字
				'htmltag'	=> ''	//値をタグで囲む場合のhtmlタグ <>はなし
			),
			$atts)
		);

		$ret = "";

		if( empty( $id ) ){
			//TODO ビルダーモード時 post_idが取れない
			//$id = $this->get_post_id();
			$ret = 'Please specify a post id.';
		} else {
			$val = "";
			if( empty( $name ) ) {
				$ret = 'Please specify a custom field name.';
			} else {
				$val = $this->get_postmeta($id, $name, $single);
			}
			if( !empty( $val ) ) {
				if(is_array( $val ) ) {
					$cnt = count( $val );
					for( $i = 0; $i < $cnt; $i++ ) {
						if( $htmltag ) { $ret .= '<' . $htmltag . '>'; }
						$ret .= do_shortcode( $val[$i] );
						if( $htmltag ) { $ret .= '</' . $htmltag . '>'; }
						
						if( $i + 1 < $cnt ) { $ret .= $delim; }
					}
				} else {
					if( $htmltag ) { $ret .= '<' . $htmltag . '>'; }
					$ret .= do_shortcode( $val );
					if( $htmltag ) { $ret .= '</' . $htmltag . '>'; }
					$ret .= $delim;
				}
			}
		}
		return $ret;
	}

/*------------------------------------------------------------------------------
 [ add filter ] 
------------------------------------------------------------------------------*/
/**
 * @since 1.1
 */ 
function fi_weluka_ext2type( $ext2types ) {
    array_push( $ext2types, array( 'image' => array('svg', 'svgz') ) );
    return $ext2types;
}

/**
 * @since 1.1
 */
function fi_weluka_upload_mimes( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

/**
 * @since 1.1
 */
function fi_weluka_mimes_to_exts( $mime_to_ext ) {
    $mime_to_ext['image/svg+xml'] = 'svg';
    return $mime_to_ext;
}

/**
 * 固定ページをTOP指定の際のpaging対応
 * @since 1.1.1
 */
function ac_parse_query( $query ) {
	if ( ! isset( $query->query_vars['paged'] ) && isset( $query->query_vars['page'] ) ) {
		$query->query_vars['paged'] = $query->query_vars['page'];
	}
}

/*------------------------------------------------------------------------------
 [ Utility ] 
------------------------------------------------------------------------------*/
	
	/**
	 * @since 1.0
	 * @return
	 *	true=smartphone, false not smartphone
	 */
	function is_smartphone () {
		$ret = false;
		//add isset v1.2.6
		$ua = isset($_SERVER['HTTP_USER_AGENT']) ?  mb_strtolower($_SERVER['HTTP_USER_AGENT']) : '' ;

		if(strpos($ua, 'iphone') !== false) { $ret = true; }
		elseif((strpos($ua, 'android') !== false) && (strpos($ua, 'mobile') !== false)) { $ret = true; }
		elseif((strpos($ua, 'windows') !== false) && (strpos($ua, 'phone') !== false)) { $ret = true; }
		elseif((strpos($ua, 'firefox') !== false) && (strpos($ua, 'mobile') !== false)) { $ret = true; }
		elseif(strpos($ua, 'blackberry') !== false) { $ret = true; }
		elseif(strpos($ua, 'dream') !== false) { $ret = true; /* Pre 1.5 Android */ }
		elseif(strpos($ua, 'cupcake') !== false) { $ret = true; /* 1.5+ Android */ }
		elseif(strpos($ua, 'incognito') !== false) { $ret = true; /* Other iPhone browser */ }
		elseif(strpos($ua, 'webmate') !== false) { $ret = true; /* Other iPhone browser */ }

		return $ret;
	}
	
	/**
	 * ajax nonce check
	 * @since 1.0
	 * @return
	 *	boolean true=OK, false=NG
	 */
	 public function check_nonce() {
		if (!isset($_REQUEST['nonce']) or empty($_REQUEST['nonce']) or !wp_verify_nonce($_REQUEST['nonce'], 'wp_ajax_'.$_REQUEST['action'])) {
    		return false;
		}
		return true;
	 }

	/**
	 * get post url (http or https)
	 * @since 1.0
	 * @update
	 * ver1.2.3
	 */
	public function get_edit_url($post_id = "") {
		global $post;

		if ( $post_id === "" && isset($post->ID)) {
			$post_id = $post->ID;
		}

		//v1.2.3
		//$url = add_query_arg( self::$settings['plugin_name'] . '_builder', '', get_permalink( $post_id ) );
		$url = add_query_arg( array('weluka_btpid' => $post_id, self::$settings['plugin_name'] . '_builder' => '' ), get_permalink( $post_id ) );

		//WP Minify plugin active case
		if ( class_exists( 'WPMinify' ) ) {
			$url = add_query_arg( 'wp-minify-off', '1', $url );
		}

		return set_url_scheme( $url ); //http or https
	}

	/**
	 * get post url (http or https)
	 * @since 1.0
	 */
	public function get_post_url($post_id = "") {
		global $post;

		if ( $post_id === "" && isset($post->ID)) {
			$post_id = $post->ID;
		}

		$url = get_permalink( $post_id );

		//WP Minify plugin active case
		if ( class_exists( 'WPMinify' ) ) {
			$url = add_query_arg( 'wp-minify-off', '1', $url );
		}

		return esc_url(set_url_scheme( $url )); //http or https
	}

	/**
	 * get post title
	 * @since 1.0
	 */
	public function get_post_title($post_id = "") {
		global $post;

		if ( $post_id === "" && isset($post->ID)) {
			$post_id = $post->ID;
		}

		$title = get_the_title( $post_id );
		return esc_html( $title ); //http or https
	}
	
	/**
	 * get now url without(w/o) pagination
	 * @since 1.2.6
	 */
	public function get_now_url_wo_pgnation($post_id = "") {
		global $wp;
		global $post;

		if(is_front_page()){
			$url =  home_url();
		}elseif(is_archive() || is_home()){
			$url =  home_url( $wp->request ); 
			$pos = strpos($url , '/page');
			$url = $pos !==false ? substr($url,0,$pos) : $url;
		}else{
			if ( $post_id === "" && isset($post->ID)) {
				$post_id = $post->ID;
			}
			
			$url = $this ->get_post_url($post_id);
		}

		return  $url;//http or https
	}
	

	/**
	 * current post post_type builder target check
	 * @since 1.0
	 */	
	public function check_builder_post_type($postType = "") {
		$_postType = $postType;
		if($postType === "") {
			$_post = get_post(get_the_ID());
			$_postType = isset($_post->post_type) ? $_post->post_type : "";
		}
		$postTypes = WelukaAdminSettings::array_enable_post_types();
		
		if( $_postType === self::$settings['cpt_hd'] || $_postType === self::$settings['cpt_ft'] || $_postType === self::$settings['cpt_sd'] ) {
			return true;
		}
		return in_array( $_postType, $postTypes );
	}
	
	/**
	 * current user builder roles check
	 * @since 1.0
	 */
	public function check_builder_role_check() {
		global $current_user;
		$ret = false;

		$disableRoles = WelukaAdminSettings::array_disable_roles();
		foreach($disableRoles as $role) {
			if( in_array($role, $current_user->roles) ){
				$ret = true;
				break;
			}
		}
		return $ret;
	}
	
	/**
	 * get post
	 * @since 1.0
	 * @return object 
	 */
	public function get_post($postId = "") {
		$_id = $postId;
		if($postId === "") {
			$_id = get_the_ID();
		}
		return isset($_id) ? get_post($_id) : (object) array();
	}
	
	/**
	 * get post_id
	 * @since 1.0
	 */
	public function get_post_id($postId = "") {
		return $postId === "" ? get_the_ID() : $postId;
	}
	
	/**
	 * check edit role
	 * @since 1.0
	 */
	public function check_edit_user($p = "") {
		$_post = $p === "" ? $this->get_post() : $p;
		$ret = false;
		if(!isset($_post) && !isset($_post->ID)) { return false; }
		if($_post->post_type === 'page') {
			if( current_user_can('edit_pages', $_post->ID ) ) { $ret = true; }
		}else{
			//post or custom post
			if( current_user_can('edit_post', $_post->ID ) ) { $ret = true; }
		}
		return $ret;
	}
	
	/**
	 * user builder use check
	 * @since 1.0
	 * @return true=active, false=deactive
	 */
	public function is_admin_builder() {
		global $pagenow, $current_user, $user_level;
		$ret = false;
		//admin page and edit
		if ( is_admin() && in_array( $pagenow, array( 'post.php', 'post-new.php') ) ) {
			$currentScreen = get_current_screen();
			//builder taget post types
			if ( $this->check_builder_post_type( $currentScreen->post_type ) ) {
				//admin all ok
				//get_currentuserinfo();
				if($user_level == 10) {  return true; }

				//roll check
				if( ! $this->check_builder_role_check() ) {
					if($pagenow === 'post-new.php') {
						if($currentScreen->post_type === 'page') {
							//if( current_user_can('edit_pages', get_the_ID() ) ) { $ret = true; }
							if( current_user_can('edit_pages' ) ) { $ret = true; }
						}else{
							//post or custom post
							//if( current_user_can('edit_post', get_the_ID() ) ) { $ret = true; }
							if( current_user_can('edit_post') || current_user_can('publish_posts') ) { $ret = true; }
						}
					}else{
						$_post_id = !empty( $_REQUEST['post'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
						//post.php
						if($currentScreen->post_type === 'page') {
							if( current_user_can('edit_pages', $_post_id ) ) { $ret = true; }
						}else{
							//post or custom post
							if( current_user_can('edit_post', $_post_id ) ) { $ret = true; }
						}						
					}
				}
			}
		}
		return $ret;
	}
	
	/**
	 * user builder use check
	 * @param
	 *	postData
	 * @since 1.0
	 * @return true=enable, false=disable
	 * @update
	 * ver.1.0.1
	 * null check update
	 */
	public function is_edit_builder($p = "") {
		$ret = false;
		$_postType = empty( $p ) ? "" : $p->post_type;
		if ( is_user_logged_in() &&
			 $this->check_builder_post_type($_postType) &&
			 ! $this->check_builder_role_check() &&
			 $this->check_edit_user($p) ) { $ret = true; }
		return $ret;
	}

	/**
	 * display content check builder mode
	 * @since 1.0
	 */
	public function is_active_builder() {
		if ( is_user_logged_in() && isset( $_REQUEST['weluka_builder'] ) ) {
			return true;
		}
		return false;
	}
	
	/**
	 * dummy post or page record insert
	 * TODO post_date_gmt 0000-00-00 00:00:00 対応
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 */
	public function dummy_insert_post($post_id) {
		$builder	= WelukaBuilder::get_instance();
		//revision not create
		remove_action("pre_post_update","wp_save_post_revision");
		remove_action( 'save_post', array(&$builder, 'render_save_post'), 10, 2);

		$_postData = $this->get_post($post_id);
		//no title dummy
		$_title = isset($_postData->post_title) && $_postData->post_title != "" ? $_postData->post_title : sprintf(__('Draft Post #%d', self::$settings['plugin_name']), $post_id);
		//get auto draft data
		$newPost = array(
			'ID'			=> $post_id,
			'post_title'	=> $_title,
			'post_content'	=> '',
			'post_status'	=> 'draft',
		);

		$this->save_post($newPost);

		add_action( 'save_post', array(&$builder, 'render_save_post'), 10, 2);
		add_action("pre_post_update","wp_save_post_revision");
	}
	
	/**
	 * wp insert and update post
	 * @since 1.0
	 */
	public function save_post($newPost) {
		$ret = array(true);
		if(self::$settings['debug']) {
			$p = wp_update_post($newPost, true);
			if ( is_wp_error( $p ) ) {
				$errors = $p->get_error_messages();
				foreach ( $errors as $error ) {
					$ret[] = $error;
				}
			}
		}else{
			wp_update_post($newPost);
		}
		return $ret;
	}
	
	/**
	 * postmeta insert and update
	 * @since 1.0
	 */
	public function save_postmeta($postId, $keyName, $value) {
		return update_post_meta($postId, $keyName, $value);
	}


	/**
	 * get postmeta
	 * @since 1.0
	 */
	public function get_postmeta($postId, $keyName, $mode = true) {
		return get_post_meta($postId, $keyName, $mode);
	}

	/**
	 * delete postmeta
	 * @since 1.0
	 */
	public function delete_postmeta($postId, $keyName = false, $val = false) {
		if($keyName !== false && $val !== false) {
			return delete_post_meta($postId, $keyName, $val);
		}elseif($keyName !== false && $val === false) {
			return delete_post_meta($postId, $keyName);
		}else{
			return delete_post_meta($postId);
		}
	}
	
	/**
	 * wordpress update_option
	 * @since 1.0
	 */
	public function update_option( $optName, $data ) {
		global $wp_version;
		
		if ( version_compare( $wp_version, '4.2', '<' ) ) {
			update_option( $optName, $data );
		} else {
			update_option( $optName, $data, false );
		}
	}
	
	/**
	 * unique id create
	 * @since 1.0
	 * @update
	 * ver1.0.5
	 */
	public function create_node_id() {
		//return uniqid(mt_rand(), true);
		//$nodeId = uniqid( mt_rand() );
		$nodeId = 'wl' . uniqid( mt_rand() );
		if($nodeId == $this->last_create_node_id) {
			return $this->create_node_id();
		}

		$this->last_create_node_id = $nodeId;
		return $nodeId;
	}
	
	/**
	 * webfont css fname create
	 * @since 1.0
	 */
	public function get_webfont_fname( $mode = 'dir' ) {
		$_blogId = get_current_blog_id();
		$fname = $mode === 'url' ? Weluka::$settings['webfont_css_url'] : Weluka::$settings['webfont_css_dir'];
		return $fname . '/' . str_replace("{%blogid}", $_blogId, Weluka::$settings['webfont_css_name']);
	}

	public function check_license( $key = '', $reg = 0 ) {
		$ret = array( true, '' );
		return $ret;
	}

	/**
	 * @since 1.0
	 */
	public function check_weluka_theme() {
		$curThemeName = $this->get_theme_name();
		if( ! stristr( $curThemeName, self::$settings['plugin_name'] ) ) { return false; }
		
		return true;
	}
	
	/**
	 * since 1.0
	 */
	public function get_theme_name( $short = false ) {
		$ret = wp_get_theme();
		if( $short ) { return str_replace(array("-", " "), "", $ret->name ); } else { return $ret->name; }
	}

	/**
	 * @since 1.0
	 */
	public function set_url( $url, $full = false ) {
		//if( ! $full ) {
			// siteurl to blank
			//$_siteurl = get_bloginfo( 'url' );
			//$ret = str_replace( $_siteurl, '', $url);
		//} else {
			$ret = str_replace(array("http:", "https:"), '', $url);
		//}
		return $ret;
	}
	
	/**
	 * @since 1.0
	 */
	public function unslash( $target ) {
		return wp_unslash( $target );
	}
	
	/**
	 * @since 1.0.3
	 */
	public function get_base_url() {
		global $blog_id;
		
		if( is_multisite() ) {
			$home_url = trailingslashit( get_home_url( $blog_id, '/' ) );
		} else {
			$home_url = trailingslashit( get_home_url( null, '/' ) );
		}
        return preg_replace( '/^(http(s)?:\/\/.+?)\/(.*)$/', '$1', $home_url );
	}
	
	/**
 	 * @since 1.0.4
	 * @update
	 * v1.1.2 日時の英語表記対応
	 *
     */
	public function get_the_postdate( $modifyDate = 0, $format = '', $echo = false ) {
		if( $modifyDate ) {
			//$ret = get_the_modified_date( $format );
			$ret = get_post_modified_time( $format );
		} else {
			//$ret = get_the_date( $format );
			$ret = get_post_time( $format );
		}
		if( $echo ) { echo $ret; } else { return $ret; }
	}

	/**
 	 * pagination
 	 * @since 1.1
     */
	public function pagination_link( $query = null, $pagenum = null, $pos = 'bottom', $echo = true ) {
		global $wp_query;

		$ct = '';
		$big = 999999999; // need an unlikely integer
		
		$maxpage = isset( $query ) ? $query->max_num_pages : $wp_query->max_num_pages;
		//ページング数
		if( is_numeric($pagenum) && $pagenum > 0 ) {
			if( $maxpage > $pagenum ) { $maxpage = $pagenum; }
		}
		
		$paging =  paginate_links( array(
			'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'  => '?paged=%#%',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total'   => $maxpage
		) );
	
		if( !empty( $paging ) ) {
			$mg = $pos === 'bottom' ? ' weluka-mgtop-xl weluka-mgbottom-xl' : ' weluka-mgbottom-l';
			$ct = '<div class="weluka-pagination sp-pad' . $mg . '">' . $paging . '</div>';
		}
	
		if( $echo ) { echo $ct; } else { return $ct; }
	}

	/**
 	 * @since 1.1
     */
	public function get_current_url() {
		//global $wp;
		//error_log(print_r($wp, true));
		//return home_url(add_query_arg(array(), $wp->request));
		return '//' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	}

	/**
	 * builder mode get current builder url to get postid
	 * @since 1.2.3
	 */
	public function get_current_builder_postid() {
		$ret = '';
		if( isset( $_REQUEST['weluka_btpid'] ) ) { $ret = $_REQUEST['weluka_btpid']; }
		return $ret;
		//return url_to_postid( $_SERVER['REQUEST_URI'] );
	}
/*
	function get_wp_widgets() {
		//$wp_widget_factory = 定義されているwidget
		//$wp_registered_widgets = 外観のウィジェットに追加されているウィジェット
		//global $wp_widget_factory, $wp_registered_widgets;
		global $wp_widget_factory;

error_log(print_r($wp_widget_factory, true));

		$widgets = array();

		foreach($wp_widget_factory->widgets as $class => $widget) {
			$widget->class = $class;
			$widgets[$widget->name] = $widget;
		}

		//ksort($widgets);
	}
*/
} //end class
register_activation_hook( __FILE__, array( 'Weluka', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Weluka', 'plugin_deactivation' ) );

/* v1.2.3 comment out
//v1.0.6 add
if (!isset($_SESSION)) {
    session_start();
}
//v1.0.6 addend
*/

$weluka = Weluka::get_instance();
$weluka->init();
