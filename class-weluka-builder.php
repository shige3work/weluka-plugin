<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Weluka Plugin Builder class
 * @since 1.0
 * @update 1.0.1
 */


#[\AllowDynamicProperties]
class WelukaBuilder {
	
	/**
	 * Holds the singleton instance of this class
	 * @var WelukaBuilder
	 */
	
	/**
	 * @since 1.0
	 */
	private static $instance = false;
	/**
	 * @since 1.0
	 */
	protected $properties = array();
	
	//postmeta @since 1.0
	const CONTENT_POSTMETA_KEY_PREFIX	= '_weluka-builder-';
	const CONTENT_POSTMETA_KEY_DRAFT	= '_weluka-builder-draft';
	const CONTENT_POSTMETA_KEY_PUBLISH	= '_weluka-builder-publish';
	const CONTENT_MODE_DRAFT			= 'draft';
	const CONTENT_MODE_PUBLISH			= 'publish';

	//class properties key name @since 1.0
	const PROP_KEY_BUILDER_MODE			= 'builderMode';
	const PROP_KEY_BUILDER_JSON			= 'builderJson';
	const WELUKA_BUILDER_TARGET_POST_ID	= 'targetPostId';
	//const PROP_KEY_EXCERPT_MODE			= 'excerptMode';
	
	//widgets @since 1.0
	const WIDGET_TEXT					= 'text';
	const WIDGET_TITLE					= 'title';
	const WIDGET_IMG					= 'img';
	const WIDGET_ICON					= 'icon';
	const WIDGET_SLIDE					= 'slide';
	const WIDGET_GALLERY				= 'gallery';
	const WIDGET_BUTTON					= 'button';
	const WIDGET_SNS_BUTTON				= 'sns_button';
	const WIDGET_SNS_SHARE				= 'sns_share';
	const WIDGET_MOVIE					= 'movie';
	const WIDGET_AUDIO					= 'audio';
	const WIDGET_APP_ALERT				= 'appalert';
	const WIDGET_APP_LIST				= 'applist';
	const WIDGET_APP_EMBED				= 'appembed';
	const WIDGET_APP_ACCORDION			= 'appaccordion';
	const WIDGET_APP_TABS				= 'apptabs';
	const WIDGET_APP_HORLINE			= 'apphorline';
	const WIDGET_GMAP					= 'gmap';
	const WIDGET_BLANK					= 'blank';
	const WIDGET_WP_MENU				= 'wpmenu';
	const WIDGET_WP_ARCHIVES			= 'wparchives';
	const WIDGET_WP_CALENDAR			= 'wpcalendar';
	const WIDGET_WP_CATEGORIES			= 'wpcategories';
	const WIDGET_WP_META				= 'wpmeta';
	const WIDGET_WP_PAGES				= 'wppages';
	const WIDGET_WP_COMMENTS			= 'wpcomments';
	const WIDGET_WP_POSTS				= 'wpposts';
	const WIDGET_WP_RSS					= 'wprss';
	const WIDGET_WP_SEARCH				= 'wpsearch';
	const WIDGET_WP_TAGCLOUD			= 'wptagcloud';
	const WIDGET_PAGE_SETTING			= 'page_setting';
	const WIDGET_COPYTPL_SELECT			= 'copytpl_select';	//v1.0.7 add
	const WIDGET_TITLE_2				= 'title2';	//v1.1.4 add
	const SNS_AUTO_SETTING				= 'atstingurltxt';	//v1.2.6 add
	const SNS_AUTO_URL				    = 'autourl';	
	const SNS_AUTO_TXT				    = 'autotxt';	//v1.2.6 addend

	//widget slide effect type @since 1.0
	public $slide_effects				= array(
		"slideh"	=> 'slideh',
		//"slidev"	=> 'slidev',
		"fade"		=> 'fade'
	);

	/**
	 * widget sns button type
	 * @since 1.0
	 * @update
	 * ver1.0.5
	 */
	public $sns_buttons					= array(
		"facebook"	=> array(
			"label"			=> "facebook",
			"button_text"	=> "FACEBOOK",
			"default"		=> "https://www.facebook.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-facebook-simple fa fa-facebook" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-facebook-square fa fa-facebook" {STYLE}></i>',
			//"icon_round"	=> '<i class="weluka-sns-round weluka-facebook-round fa fa-facebook" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-facebook-round {TEXT_ON}" {STYLE}><i class="fa fa-facebook"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-facebook-circle fa fa-facebook" {STYLE}></i>'
		),
		"twitter"	=> array(
			"label"			=> "X(twitter)", //v1.3 "twitter",
			"button_text"	=> "X(旧Twitter)", //v1.3 modify "TWITTER"
			"default"		=> "https://twitter.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-twitter-simple fa fa-twitter" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-twitter-square fa fa-twitter" {STYLE}></i>',
			//v1.3 modify
			//"icon_round"	=> '<span class="weluka-sns-round weluka-twitter-round {TEXT_ON}" {STYLE}><i class="fa fa-twitter"></i>{TEXT}</span>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-twitter-round {TEXT_ON}" {STYLE}>{IMG}{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-twitter-circle fa fa-twitter" {STYLE}></i>'
		),
		"google"	=> array(
			"label"			=> "google+",
			"button_text"	=> "GOOGLE+",
			"default"		=> "https://plus.google.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-gplus-simple fa fa-google-plus" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-gplus-square fa fa-google-plus" {STYLE}></i>',
			//"icon_round"	=> '<i class="weluka-sns-round weluka-gplus-round fa fa-google-plus" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-gplus-round {TEXT_ON}" {STYLE}><i class="fa fa-google-plus"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-gplus-circle fa fa-google-plus" {STYLE}></i>'
		),
		// v1.0.5 add
		"instagram"	=> array(
			"label"			=> "instagram",
			"button_text"	=> "INSTAGRAM",
			"default"		=> "https://www.instagram.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-instagram-simple fa fa-instagram" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-instagram-square fa fa-instagram" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-instagram-round {TEXT_ON}" {STYLE}><i class="fa fa-instagram"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-instagram-circle fa fa-instagram" {STYLE}></i>'
		),
		"linkedin"	=> array(
			"label"			=> "linkedin",
			"button_text"	=> "LINKEDIN",
			"default"		=> "https://www.linkedin.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-linkedin-simple fa fa-linkedin" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-linkedin-square fa fa-linkedin" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-linkedin-round {TEXT_ON}" {STYLE}><i class="fa fa-linkedin"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-linkedin-circle fa fa-linkedin" {STYLE}></i>'
		),
		//v1.0.5 addend
		"youtube"	=> array(
			"label"			=> "youtube",
			"button_text"	=> "YOUTUBE",
			"default"		=> "https://www.youtube.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-youtube-simple fa fa-youtube" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-youtube-square fa fa-youtube" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-youtube-round {TEXT_ON}" {STYLE}><i class="fa fa-youtube"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-youtube-circle fa fa-youtube" {STYLE}></i>'
		),
		//v1.0.5
		"vimeo"	=> array(
			"label"			=> "vimeo",
			"button_text"	=> "VIMEO",
			"default"		=> "https://vimeo.com/",
			"plan"			=> "free",
			"icon_simple"	=> '<i class="weluka-sns-simple weluka-vimeo-simple fa fa-vimeo" {STYLE}></i>',
			"icon_square"	=> '<i class="weluka-sns-square weluka-vimeo-square fa fa-vimeo" {STYLE}></i>',
			"icon_round"	=> '<span class="weluka-sns-round weluka-vimeo-round {TEXT_ON}" {STYLE}><i class="fa fa-vimeo"></i>{TEXT}</span>',
			"icon_circle"	=> '<i class="weluka-sns-circle weluka-vimeo-circle fa fa-vimeo" {STYLE}></i>'
		)
		//v1.0.5 addend
	);

	//sns share buttons @since 1.0
	//@update
	// ver1.0.1
	// ver1.0.5
	public $sns_share_buttons					= array(
		"facebook"	=> array(
			"label"			=> "facebook",
			"share_url"		=> "//www.facebook.com/sharer.php?u=%s",	//%s=current page URL
			"counter_url"	=> "//graph.facebook.com/?id=%s",	//%s=current page URL
			"plan"			=> "free",
			"icon_simple"	=> '<span class="weluka-snsshare-simple weluka-facebook-simple {NOCOUNT}" {STYLE1}><i class="fa fa-facebook"></i>{COUNTER}</span>',
			"icon_square"	=> '<span class="weluka-snsshare-square weluka-facebook-square {NOCOUNT}" {STYLE1}><i class="fa fa-facebook"></i>{COUNTER}</span>',
			"icon_round"	=> '<span class="weluka-snsshare-round weluka-facebook-round {NOCOUNT}" {STYLE1}><i class="fa fa-facebook"></i>{COUNTER}</span>',
		),
		"twitter"	=> array(
			"label"			=> "X(twitter)", //v1.3 "twitter",
			"share_url"		=> "//twitter.com/share?url=%s%s%s", //"//twitter.com/share?url=%s&amp;text=%s&amp;via=%s",	//%1s=current page URL, %2s=post title, %3s=user twitter account(@useraccount) @=nothing
			//twitter count json 終了に伴い、count.jsoonサービスより取得（利用者は会員登録必須）
			"counter_url"	=> "//jsoon.digitiminimi.com/twitter/count.json?url=%s", //"//urls.api.twitter.com/1/urls/count.json?url=%s",	//%s=current page URL
			"plan"			=> "free",
			"icon_simple"	=> '<span class="weluka-snsshare-simple weluka-twitter-simple {NOCOUNT}" {STYLE1}><i class="fa fa-twitter"></i>{COUNTER}</span>',
			"icon_square"	=> '<span class="weluka-snsshare-square weluka-twitter-round {NOCOUNT}" {STYLE1}><i class="fa fa-twitter"></i>{COUNTER}</span>',
			// v1.3 modify
			//"icon_round"	=> '<span class="weluka-snsshare-round weluka-twitter-round {NOCOUNT}" {STYLE1}><i class="fa fa-twitter"></i>{COUNTER}</span>',
			"icon_round"	=> '<span class="weluka-snsshare-round weluka-twitter-round {NOCOUNT}" {STYLE1}>{IMG}{COUNTER}</span>',
		),
		"google"	=> array(
			"label"			=> "google+",
			"share_url"		=> "//plus.google.com/share?url=%s",	//%s=current page URL
			"counter_url"	=> "https://clients6.google.com/rpc",
			"plan"			=> "free",
			"icon_simple"	=> '<span class="weluka-snsshare-simple weluka-gplus-simple {NOCOUNT}" {STYLE1}><i class="fa fa-google-plus"></i>{COUNTER}</span>',
			"icon_square"	=> '<span class="weluka-snsshare-square weluka-gplus-round {NOCOUNT}" {STYLE1}><i class="fa fa-google-plus"></i>{COUNTER}</span>',
			"icon_round"	=> '<span class="weluka-snsshare-round weluka-gplus-round {NOCOUNT}" {STYLE1}><i class="fa fa-google-plus"></i>{COUNTER}</span>',
		),
		"hatebu"	=> array(
		"label"			=> "hatebu",
		"share_url"		=> "//b.hatena.ne.jp/entry/%s",	//%s=current page URL
		"counter_url"	=> "//api.b.st-hatena.com/entry.count?url=%s",
		"ssl_counter_url"	=> "//b.hatena.ne.jp/entry.count?url=%s",
		"plan"			=> "free",
		"icon_simple"	=> '<span class="weluka-snsshare-simple weluka-hatebu-simple {NOCOUNT}" {STYLE1}><i class="fa fa-hatebu"></i>{COUNTER}</span>',
		"icon_square"	=> '<span class="weluka-snsshare-square weluka-hatebu-round {NOCOUNT}" {STYLE1}><i class="fa fa-hatebu"></i>{COUNTER}</span>',
		"icon_round"	=> '<span class="weluka-snsshare-round weluka-hatebu-round {NOCOUNT}" {STYLE1}><i class="fa fa-hatebu"></i>{COUNTER}</span>',
	),
		"line"	=> array(
		"label"			=> "line",
		"share_url"		=> "//line.me/R/msg/text/?%s%s",	//%s=current page URL
		"plan"			=> "free",
		"icon_simple"	=> '<span class="weluka-snsshare-simple weluka-line-simple {NOCOUNT}" {STYLE1}><i class="fa fa-line"></i>{COUNTER}</span>',
		"icon_square"	=> '<span class="weluka-snsshare-square weluka-line-round {NOCOUNT}" {STYLE1}><i class="fa fa-line"></i>{COUNTER}</span>',
		"icon_round"	=> '<span class="weluka-snsshare-round weluka-line-round {NOCOUNT}" {STYLE1}><i class="fa fa-line"></i>{COUNTER}</span>',
	),
		"pocket"	=> array(
		"label"			=> "pocket",
		"share_url"		=> "http://getpocket.com/edit?url=%s",	//%s=current page URL
		"plan"			=> "free",
		"icon_simple"	=> '<span class="weluka-snsshare-simple weluka-pocket-simple {NOCOUNT}" {STYLE1}><i class="fa fa-get-pocket"></i>{COUNTER}</span>',
		"icon_square"	=> '<span class="weluka-snsshare-square weluka-pocket-round {NOCOUNT}" {STYLE1}><i class="fa fa-get-pocket"></i>{COUNTER}</span>',
		"icon_round"	=> '<span class="weluka-snsshare-round weluka-pocket-round {NOCOUNT}" {STYLE1}><i class="fa fa-get-pocket"></i>{COUNTER}</span>',
	),
	);
	
	//text shadow style @since 1.0
	public $text_shadow_styles	= array(
		'basic'		=> array('offset_v'	=> '1px', 'offset_h' => '1px', 'grad' => '2px', 'default_color' => 'rgba(0,0,0,0.3)' ),
		'hard'		=> array('offset_v'	=> '-2px', 'offset_h' => '4px', 'grad' => '0', 'default_color' => 'rgba(0,0,0,0.3)' ),
		'vintage'	=> array('offset_v'	=> '4px', 'offset_h' => '3px', 'grad' => '0', 'default_color' => '#ffffff' )
	);
	
	//widget app list layout array @since 1.0
	public $app_list_layouts	= array();

	//widget wpmenu layout array @since 1.0
	public $wpmenu_layouts	= array();
	
	// add v1.2.8
	public $returnWPposts = '';

	//link action
	const LINK_ACTION_GOTOLINK			= 'gotolink';
	const LINK_ACTION_ZOOMUP			= 'zoom';
	
	//max colum num
	const MAX_COLUMN					= 12; //bootstrap col
	
	//parts default
	const DEFAULT_MOVIE_URL				= 'https://www.youtube.com/watch?v=wbkkl9nZDw4';

	public $gmap_shortcode_tag			= 'weluka-map';
	public $wpposts_shortcode_tag		= 'weluka-wpposts';
	public $wpmenu_shortcode_tag		= 'weluka-wpmenu';
	public $wpmenu_shortcode_tag2		= 'weluka-wpmenu2';
	public $wparchives_shortcode_tag	= 'weluka-wparchives';
	public $wpcalendar_shortcode_tag	= 'weluka-wpcalendar';
	public $wpcategories_shortcode_tag	= 'weluka-wpcategories';
	public $wpmeta_shortcode_tag		= 'weluka-wpmeta';
	public $wppages_shortcode_tag		= 'weluka-wppages';
	public $wpcomments_shortcode_tag	= 'weluka-wpcomments';
	public $wprss_shortcode_tag			= 'weluka-wprss';
	public $wpsearch_shortcode_tag		= 'weluka-wpsearch';
	public $wptagcloud_shortcode_tag	= 'weluka-wptagcloud';
	
	//v1.2.6 add
	public $sh_auto_url_facebook	    = 'sh_auto_url_facebook';
	public $sh_auto_url_twitter	        = 'sh_auto_url_twitter';
	public $sh_auto_url_gplus	        = 'sh_auto_url_gplus';
	public $sh_auto_url_hatebu	        = 'sh_auto_url_hatebu';
	public $sh_auto_url_line	        = 'sh_auto_url_line';
	public $sh_auto_url_pocket	        = 'sh_auto_url_pocket';
	
	//v1.2.4.5 add
	public $sh_facebook	                = 'sh_facebook';
	public $sh_twitter	                = 'sh_twitter';
	public $sh_gplus	                = 'sh_gplus';
	public $sh_hatebu	                = 'sh_hatebu';

	//v1.2.7.1 add
	public $bgvideo_shortcode_tag			= 'weluka-bgvideo';
	public $bgvideocss_shortcode_tag		= 'weluka-bgvideocss';

	const DEFAULT_GMAP_ADDR				= '東京都千代田区丸の内1-9-1';

	const APPLIST_CUSTOM_DESIGN			= 'applist_custom_design';
	const APPLIST_REG_LIST				= 'applist_reg_list';
	const WPMENU_CUSTOM_DESIGN			= 'wpmenu_custom_design';
	const WPPOSTS_CUSTOM_DESIGN			= 'wpposts_custom_design';
	const COPY_TPL						= 'copy_tpl';	//v1.0.7
	
	
	/**
	 * constructor
	 * @since 1.0
	 */
	private function __construct(){
		$this->app_list_layouts = array(
			array(
				'layout_class'	=> 'medialeft',
				'label'			=> __('Media Left', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'mediaright',
				'label'	=> __('Media Right', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'mediatop',
				'label'	=> __('Media Top', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'mediamiddle',
				'label'	=> __('Media Middle', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'mediabottom',
				'label'	=> __('Media Bottom', Weluka::$settings['plugin_name'])
			),
		);

		$this->wpmenu_layouts = array(
			array(
				'layout_class'	=> 'horizontal',
				'label'			=> __('Horizontal', Weluka::$settings['plugin_name'])
			),
			array(
				'layout_class'	=> 'vertical',
				'label'	=> __('Vertical', Weluka::$settings['plugin_name'])
			),
			/*
			array(
				'layout_class'	=> 'dropdown',
				'label'	=> __('Dropdown', Weluka::$settings['plugin_name'])
			),*/
			array(
				'layout_class'	=> 'hamburger',
				'label'	=> __('Hamburger', Weluka::$settings['plugin_name'])
			)
		);
 	}

	/**
	 * singloton instance
	 * @since 1.0
	 */	
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new WelukaBuilder;
		}
		return self::$instance;
	}

	/**
	 * builder properties setter
	 * @since 1.0
	 */
	public function set_property($key, $val) {
		$this->properties[$key] = $val;
	}

	/**
	 * builder properties getter
	 * @since 1.0
	 */
	public function get_property($key) {
		if(array_key_exists($key, $this->properties)){
            return $this->properties[$key];
        }
		return null;
	}
	
	/**
	 * edit_form_after_title hook
	 * post.php post-new.php title after add builder button
	 * @since 1.0
	 */
	public function add_builder_button() {
		global $post, $pagenow;
		$postType = get_post_type($post->ID);
?>
		<div id="weluka-builder-button-wrapper">
        	<button type="button" id="weluka-builder-button" class="wp-core-ui button-primary" data-new="<?php echo $pagenow === 'post-new.php' ? 'new' : 'up'; ?>" data-post="<?php echo $post->ID; ?>" data-post-type="<?php echo $postType; ?>"><?php esc_attr_e('Weluka Builder', Weluka::$settings['plugin_name']); ?></button>
        </div>
        <div id="weluka-loading"></div>
<?php
	}

	/**
	 * admin footer hook
	 * post.php post-new.php add script code
	 * @since 1.0
	 */
	public function add_builder_content() {
		global $post, $pagenow;
		$settings = Weluka::$settings;
		//$src = post_preview();

?>
<div id="weluka-builder" style="display: none;">
	<?php //nav ?>
	<div id="weluka-builder-navbar" class="navbar weluka-navbar-inverse clearfix" >
		<div id="weluka-builder-navbar-container" class="weluka-container-fluid">
			<div class="navbar-header clearfix">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#weluka-builder-nav"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
				<div class="navbar-brand">
                	<a class="weluka-logo" href="<?php echo $settings['brand_url']; ?>" target="_blank"><?php echo $settings['plugin_name'] ?></a>
        			&nbsp;&nbsp;<span class="weluka-post-title"><?php _e('Title: ', $settings['plugin_name']); echo esc_html($post->post_title); ?></span>
                </div>
			</div>
            <?php //meinmenu ?>
			<div id="weluka-builder-nav" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right"">
            		<li><a href="javascript:void(0);" onclick="return false;" class="<?php if ($post->post_status === 'publish') echo ' weluka-ajax-update'; ?>" id="weluka-builder-publish" style="color:#0073aa !important;"><?php _e('Publish', $settings['plugin_name']); ?></a></li>
            		<li><a href="javascript:void(0);" onclick="return false;" class="<?php if ($pagenow !== 'post-new.php') echo ' weluka-ajax-update'; ?>" id="weluka-builder-save" style="color:#0073aa !important;"><?php _e('Save', $settings['plugin_name']); ?></a></li>
            		<li><a href="javascript:void(0);" onclick="return false;" id="weluka-builder-preview" style="color:#0073aa !important;"><?php _e('Preview', $settings['plugin_name']); ?></a></li>
            		<li><a href="javascript:void(0);" onclick="return false;" id="weluka-builder-close" style="color:#0073aa !important;"><?php _e('Close', $settings['plugin_name']); ?></a></li>
            		<?php /* TODO <li><a href="javascript:void(0);" id="weluka-upgrade" onclick="window.open('','_blank'); return false"><?php _e('Upgrade', $settings['plugin_name']); ?></a></li>
                	<li><a href="javascript:void(0);" onclick="return false;" id="weluka-tutorials">?</a></li> */ ?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div><!-- /.navbar -->

	<div id="weluka-builder-main">
		<div id="weluka-builder-content-wrapper">
    		<iframe id="weluka-builder-content-iframe" class="weluka-builder-content-iframe" name="weluka-builder-content-iframe" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0"></iframe>
    	</div>

		<?php //snippets tinymce ?>
        <?php //tinymce editor modal dialog ?> 
		<div id="weluka-code-editor-modal" class="modal hide fade weluka-modal" role="dialog" aria-labelledby="codeEditorModalLabel" aria-hidden="true" data-keyboard="false">
			<div class="modal-dialog modal-lg">
        		<div class="modal-content">
            		<div class="modal-header">
						<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    					<h4 id="codeEditorModalLabel" class="modal-title"><?php _e('Code Editor', Weluka::$settings['plugin_name']) ?></h4>
            		</div>
            		<div class="modal-body">
            			<div id="weluka-modal-main">
    						<div id="weluka-code-editor-modal-wrapper">
        					<?php
								wp_editor('', 'welukacodeeditorcontent', array(
									'media_buttons' => true,
									'textarea_rows' => 16
								));
							?>
        					</div>
            			</div>
                    </div>
	            	<div class="modal-footer">
    					<button id="weluka-save-editor-content" class="weluka-btn weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        				<button class="weluka-btn weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            		</div>
            	</div>
        	</div>
    	</div>
        
    </div>
</div>
<?php
	}
	
	/**
	 * posts_results hook
	 * kick main query
	 * @since 1.0
	 * @update
	 * ver1.0.5.2 revision対応
	 * ver1.2.3 session 廃止
	 */
	public function render_posts_results($posts, $wp_query) {
		global $shortcode_tags;
		$weluka = Weluka::get_instance();
		$this->set_property("render_post_result", false);

		if( !is_admin() ) { //not admin page
			//v1.2.3
			//$targetPostId = isset($_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID]) ? $_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID] : ''; //builder target post_id
			$targetPostId = $weluka->get_current_builder_postid(); //builder target post_id

			//main query single or page で呼ばれる $_GLOBAL['wp_query'] 設定前 page.php single.php等のテンプレート表示時、カレントのpostIDデータが最初に取得される
			foreach ( $posts as &$_post ) {
				if($_post->ID == $targetPostId) { //builder edit page or builder edit a page preview click
					$_ct = str_replace(array("\r\n","\n","\r"), '', trim(strip_tags($_post->post_content)));
					if( $weluka->is_edit_builder($_post) && $weluka->is_active_builder() ) {
						$this->set_property("render_post_result", true);
						//builder mode
						//<!--more-->はこの時点ではまだ変更されていない。
						//if(strcasecmp($_ct, "[weluka-builder-content]") != 0) {
						if(strncasecmp($_ct, "[weluka-builder-content", 23) != 0) { //v1.0.5.2
							//wpautopが動作する前にショートコードを実行する。
							//$org_shortcode_tags = $shortcode_tags; //登録済みショートコードのバックアップ
							//remove_all_shortcodes(); //一旦登録済みショートコード削除
/* 20150829
							add_shortcode( 'weluka-default-content', array(&$this, 'sh_weluka_default_content') ); //フィルター前に実行するショートコード登録
							$_content = do_shortcode('[weluka-default-content post_id=' . $_post->ID . ']' . $_post->post_content . '[/weluka-default-content]');
							remove_shortcode('weluka-default-content');
*/
							$_content = '[weluka-default-content post_id=' . $_post->ID . ']' . $_post->post_content . '[/weluka-default-content]';
							//$shortcode_tags = $org_shortcode_tags; //バックアップしておいたショートコードを復元
							//$_post->post_content = $_content;

						}else{
							//メインループでthe_contentで呼ばれていない場合（その際にdo_shortcodeで呼ばれていないものを対応 念の為
							//builder modeの際は1件のみが対象となるため、メイン以外は表示されるだけになる挙動がおかしい場合は変更 TODO
/* 20150829
							add_shortcode( 'weluka-builder-content2', array(&$this, 'sh_weluka_builder_content2') );
							$_content = do_shortcode('[weluka-builder-content2 post_id=' . $_post->ID . ']');
							remove_shortcode('weluka-builder-content2');
*/
							$_content = '[weluka-builder-content2 post_id=' . $_post->ID . ']';

						}

						$_post->post_content = $_content;
						$this->set_property("render_post_result", false);

					}else{
						//if(is_preview() && strcasecmp($_ct, "[weluka-builder-content]") != 0){
						if(is_preview() && strncasecmp($_ct, "[weluka-builder-content", 23) != 0){	//v1.0.5.2
							//case not save preview mode
/* 20150829
							add_shortcode( 'weluka-builder-content2', array($this, 'sh_weluka_builder_content2') );
							$_content = do_shortcode('[weluka-builder-content2 post_id=' . $_post->ID . ']');
							remove_shortcode('weluka-builder-content2');
*/
							$_content = '[weluka-builder-content2 post_id=' . $_post->ID . ']';

							$_post->post_content = $_content;
						}
					}
					//v1.2.3 comment out $_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID] = ''; //clear builder target postId render_posts_resultsでメインのpostデータのみを1回のみ対象とするため
				}
			}
		}
		return $posts;
	}
	
	/**
	 * weluka-{shortocode} kick
	 * weluka builder data from html
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.1.3
	 * ver1.2.3
	 */
	public function get_content($type, $content = "", $_post = null) {
		$weluka = Weluka::get_instance();
		$_content = "";
		$builderData = "";
		$newFlg = false;
		$postData = empty($_post) ? $weluka->get_post() : $_post;

		//ver1.0.1 add
		if( empty( $postData ) ){ return $content; }
		
		$this->set_property(self::PROP_KEY_BUILDER_MODE, false);
		
		if( $weluka->is_edit_builder($postData) && $weluka->is_active_builder()) {
			//builder edit mode
			if( $type !== 'default' ) { //case builder mode
				//get postmeta draft data
				$builderData = $this->get_builder_data($postData->ID, self::CONTENT_POSTMETA_KEY_DRAFT);

				//v1.1.3 add
				if( is_serialized( $builderData ) ) {
					//シリアライズ文字列の場合(通常ビルダーデータはget_post_meta時にアンシリアライズ化された配列が取得されるが
					//Bogo等で複製作成された際はsシリアライズ文字列となる場合の対応。
					$builderData = maybe_unserialize( $builderData );
				}
				//v1.1.3 addend

				if(empty($builderData['sections'])){ //ver1.0.1 $builderData => sections check modify
					$newFlg = true;
				}
			}else{
				if($content !== ""){
					//ビルダー適用前のコンテンツ
					$builderData = $this->create_section_array('default', $content);
				}else{
					//新規作成状態
					//$builderData = $this->create_section_array('new');
					$newFlg = true;
				}
			}

			$this->set_property(self::PROP_KEY_BUILDER_MODE, true);
		
			$this->set_property(self::PROP_KEY_BUILDER_JSON, '');
			$json = json_encode($builderData);

			//v1.2.3 comment out $_SESSION[self::PROP_KEY_BUILDER_JSON] = $json;
			add_filter( 'show_admin_bar', '__return_false' ); //ビルダーモード時ログイン中のサイト表示時、管理バー非表示
			$this->set_property( self::PROP_KEY_BUILDER_JSON, $json ); //v1.2.3 add
			add_action('wp_footer', array($this, 'builder_snippets'));

			ob_start();
			$this->display_content($builderData, $newFlg);
			$_content = ob_get_clean();
		}elseif( $weluka->check_builder_post_type($postData->post_type) ){
			//公開時
			if( $type === 'default' ) { //ビルダー保存前の通常コンテンツ　ビルダモードの場合しかないはずだが念の為
				return do_shortcode($content);
			}
			//preview
			if( is_preview() ){
				//draft data rendering
				$builderData = $this->get_builder_data($postData->ID, self::CONTENT_POSTMETA_KEY_DRAFT);
				if(!empty($builderData)){ //data true
					ob_start();
					$this->display_content($builderData);
					$_content = ob_get_clean();
				}else{
					//本ブロックありえない 念の為
					$_content = "";
				}
				//$_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID] = ''; //clear builder target postId render_posts_resultsでメインのpostデータのみを1回のみ対象とするため
				return do_shortcode($_content);
			}
			
			$_content = do_shortcode( $this->get_builder_data($postData->ID, self::CONTENT_POSTMETA_KEY_PUBLISH, 'content') );
			/* 
			$builderData = $this->get_builder_data($postData->ID, self::CONTENT_POSTMETA_KEY_PUBLISH);
			ob_start();
			$this->display_content($builderData);
			$_content = do_shortcode( ob_get_clean() );
			*/
		}else{
			//本ブロック ありえないが念の為
			return $content;
		}
		return $_content;
	}

	/**
	 * create content
	 * @since 1.0 
	 */
	protected function display_content($builderData, $newFlg = false) {
		global $post;

		$weluka = Weluka::get_instance();
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$class	= $builderMode ? " weluka-builder-edit-wrapper clearfix": '';
		echo '<div class="weluka-builder-content' . $class . '">';

		if($newFlg === true) {
			$this->render_new_blank();
		} else {
			$this->render_sections($builderData);
			//if($builderMode) {
			//	echo '<div class="weluka-droppable weluka-horizontal-drop-handle" data-weluka-drop-position="section"></div>';	//section drop area last bottom
			//}
		}
		echo '</div>';
	}

	/**
	 * 新規やbuiilder以前データ、追加セクションのbuilder用配列作成
	 * @since 1.0
	 */
	public function create_section_array($sectionMode, $content = "", $widgetType = "") {
		$weluka = Weluka::get_instance();
		$nodeId = $weluka->create_node_id();
		$retArr = array();
        if($sectionMode === "default"){
        	$items[0] = array(
            	"id"	=> $nodeId,
                "type"	=> "text",
                "class_name"	=> "",
                "text"	=> $content
            );
			$retArr = array(
        		"sections" => array(
            		array(
						"id"	=> $weluka->create_node_id(),
    	    			"class_name"			=> "",
        				"background_image"		=> "",
        				"background_color"		=> "",
        				"margin_top"	=> "",
        				"margin_bottom" => "",
        				"margin_left"	=> "",
        				"margin_right"	=> "",
                		"rows"	=> array(
                    		array(
								"id"	=> $weluka->create_node_id(),
                				"colums"	=> array(
                            		array(
										"id"	=> $weluka->create_node_id(),
                    					"col"	=> 12,
                        				"items"	=> $items
                                	),
	                    		),
    	                    ),
        	        	),
            	    ),
	            ),
    	    );
       	}else{
			//未使用
			//section
			$items[0] = $this->create_item_array($widgetType);
			$retArr = array(
        		"sections" => array(
            		array(
						"id"	=> $weluka->create_node_id(),
    	    			"class_name"			=> "",
        				"background_image"		=> "",
        				"background_color"		=> "",
        				"margin_top"	=> "",
        				"margin_bottom" => "",
        				"margin_left"	=> "",
        				"margin_right"	=> "",
                		"rows"	=> array(
                    		array(
								"id"	=> $weluka->create_node_id(),
                				"colums"	=> array(
                            		array(
										"id"	=> $weluka->create_node_id(),
                    					"col"	=> 12,
                        				"items"	=> $items
                                	),
	                    		),
    	                    ),
        	        	),
            	    ),
	            ),
    	    );
		}

        return $retArr;
	}

	/**
	 * create section array
	 * @since 1.0
	 */
	public function create_section_array2($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();
		$retArr = array(
			"id"	=> $weluka->create_node_id(),
    	    "class_name"			=> "",
        	"background_image"		=> "",
        	"background_color"		=> "",
        	"margin_top"	=> "",
        	"margin_bottom" => "",
        	"margin_left"	=> "",
        	"margin_right"	=> "",
            "rows"	=> null
		);
		$rows = array();
		if($moveModel === "") {
			$rows = $this->create_row_array($widgetType);
			$retArr['rows'][0] = $rows;
		}else{
			if($moveType !== 'section'){
				$rows = $this->create_row_array("", $moveModel, $moveType);
				$retArr['rows'][0] = $rows;
			}else{
				$retArr = $moveModel;
				$retArr["id"] = $weluka->create_node_id();
				
				//nodeid all new
				foreach($retArr["rows"] as &$row) :
					$row["id"] = $weluka->create_node_id();
					foreach($row["colums"] as &$colum) :
						$colum["id"] = $weluka->create_node_id();
						foreach($colum["items"] as &$item) :
							$item["id"] = $weluka->create_node_id();
						endforeach;
					endforeach;
				endforeach;
			}
		}
        return $retArr;
	}

	/**
	 * create row array
	 * @since 1.0
	 */
	public function create_row_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
            "colums"	=> null,
    	);

		if($moveModel === "") {
			$colums = $this->create_colum_array($widgetType);
			$retArr['colums'][0] = $colums;
		}else{
			if($moveType !== 'row') {
				$colums = $this->create_colum_array("", $moveModel, $moveType);
				$retArr['colums'][0] = $colums;
			}else{
				//row
				$retArr = $moveModel;
				$retArr["id"] = $weluka->create_node_id();

				//nodeid all new
				foreach($retArr["colums"] as &$colum) :
					$colum["id"] = $weluka->create_node_id();
					foreach($colum["items"] as &$item) :
						$item["id"] = $weluka->create_node_id();
					endforeach;
				endforeach;
			}
		}
        return $retArr;
	}

	/**
	 * create colum array
	 * @since 1.0
	 */
	public function create_colum_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
            "col"	=> 12,
            "items"	=> null
    	);
		
		if($moveModel === "") {
			//add widget
			$items[0] = $this->create_item_array($widgetType);
			$retArr['items'] = $items;
		}else{
			/*
			if($moveType === "widget") {
				$items[0] = $moveModel;
				$retArr['items'] = $items;
			*/
			if($moveType !== "col") {
				$item = $this->create_widget_array("", $moveModel, $moveType);
				if(!isset($item[0]["id"])) {
					$_arr[0] = $item;
				}else{
					$_arr = $item;
				}
				$retArr['items'] = $_arr;
			}elseif($moveType === "col") {
				$retArr = $moveModel;
				//nodeid all new
				$retArr["id"] =  $weluka->create_node_id();
				foreach($retArr["items"] as &$item) :
					$item["id"] = $weluka->create_node_id();
				endforeach;
			}
		}
        return $retArr;
	}

	/**
	 * create widget array
	 * @since 1.0
	 */
	public function create_widget_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
		);
		
		if($moveModel === "") {
			//add widget
			$item = $this->create_item_array($widgetType);
			$retArr = $item;
		}else{
			if($moveType === "s_row") {
				$subrows = $this->create_subrow_array("", $moveModel, $moveType);
				$retArr['subrows'][0] = $subrows;
			}elseif($moveType === 's_col') {
				$items = $moveModel['subitems'];
				foreach($items as &$item){
					$item['id'] = $weluka->create_node_id();
				}
				$retArr = $items;
			}elseif($moveType === "s_widget") {
				$retArr = $moveModel;
				$retArr["id"] = $weluka->create_node_id();
			}elseif($moveType === "widget") {
				$retArr = $moveModel;
				//nodeid all new
				$retArr["id"] =  $weluka->create_node_id();
				if(isset($retArr["subrows"])) {
					foreach($retArr["subrows"] as &$row) :
						$row["id"] = $weluka->create_node_id();
						foreach($row["subcolums"] as &$colum) :
							$colum["id"] = $weluka->create_node_id();
							foreach($colum["subitems"] as &$item) :
								$item["id"] = $weluka->create_node_id();
							endforeach;
						endforeach;
					endforeach;
				}
			}
		}
        return $retArr;
	}

	/**
	 * create subrows array
	 * @since 1.0
	 */
	public function create_subrow_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
            "subcolums"	=> null
		);
		if($moveModel === "") {
			$colums = $this->create_subcolum_array($widgetType);
			$retArr['subcolums'][0] = $colums;
		}else{
			if($moveType !== 's_row' && $moveType !== 'widget') {
				$colums = $this->create_subcolum_array("", $moveModel, $moveType);
				$retArr['subcolums'][0] = $colums;
			}elseif($moveType == 'widget') {
				if(isset($moveModel['subrows'])){
					$retArr = $moveModel['subrows'];
					$retArr["id"] = $weluka->create_node_id();

					//nodeid all new
					foreach($retArr["subcolums"] as &$colum) :
						$colum["id"] = $weluka->create_node_id();
						foreach($colum["subitems"] as &$item) :
							$item["id"] = $weluka->create_node_id();
						endforeach;
					endforeach;
				}else{
					$colums = $this->create_subcolum_array("", $moveModel, $moveType);
					$retArr['subcolums'][0] = $colums;
				}
			}else{
				//s_row
				$retArr = $moveModel;
				$retArr["id"] = $weluka->create_node_id();

				//nodeid all new
				foreach($retArr["subcolums"] as &$colum) :
					$colum["id"] = $weluka->create_node_id();
					foreach($colum["subitems"] as &$item) :
						$item["id"] = $weluka->create_node_id();
					endforeach;
				endforeach;
			}
		}
        return $retArr;
	}

	/**
	 * create subcolum array
	 * @since 1.0
	 */
	public function create_subcolum_array($widgetType, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();

		$retArr = array(
			"id"	=> $weluka->create_node_id(),
            "col"	=> 12,
            "subitems"	=> null
    	);
		
		if($moveModel === "") {
			//add widget
			$items[0] = $this->create_item_array($widgetType);
			$retArr['subitems'] = $items;
		}else{
			if($moveType !== "s_col") {
				$items[0] = $moveModel;
				$retArr['subitems'] = $items;
			}else {
				$retArr = $moveModel;
				//nodeid all new
				$retArr["id"] =  $weluka->create_node_id();
			}
			foreach($retArr["subitems"] as &$item) :
				$item["id"] = $weluka->create_node_id();
			endforeach;
		}
        return $retArr;
	}

	/**
	 * wdigetデータからsburow形式配列作成
	 */
	public function widget_to_subrow_array($widgetType, $orgItem, $pos, $moveModel = "", $moveType = "") {
		$weluka = Weluka::get_instance();
		
		if($moveModel === "") {
			$item = $this->create_item_array($widgetType);
			$orgItem['id'] = $weluka->create_node_id();
		
			if($pos == 's-col-left-out') {
				$item1[0] = $item;
				$item2[0] = $orgItem;
			}else{
				$item1[0] = $orgItem;
				$item2[0] = $item;
			}
			$retArr = array(
				"id"	=> $weluka->create_node_id(),
				"subrows"	=> array(
						array(
							"id"	=> $weluka->create_node_id(),
                			"subcolums"	=> array(
                        		array(
									"id"	=> $weluka->create_node_id(),
                    				"col"	=> 6,
                        			"subitems"	=> $item1
	                           	),
    	                    	array(
									"id"	=> $weluka->create_node_id(),
            	        			"col"	=> 6,
                	        		"subitems"	=> $item2
                    	       	),
	                    	),
	    	           ),
				),
			);
		}else{
				//widget or s_widget
				$item = $moveModel;
				$item['id'] = $weluka->create_node_id();
				if($pos == 's-col-left-out') {
					$item1[0] = $item;
					$item2[0] = $orgItem;
				}else{
					$item1[0] = $orgItem;
					$item2[0] = $item;
				}

			$retArr = array(
				"id"	=> $weluka->create_node_id(),
				"subrows"	=> array(
						array(
							"id"	=> $weluka->create_node_id(),
                			"subcolums"	=> array(
                        		array(
									"id"	=> $weluka->create_node_id(),
                    				"col"	=> 6,
                        			"subitems"	=> $item1
	                           	),
    	                    	array(
									"id"	=> $weluka->create_node_id(),
            	        			"col"	=> 6,
                	        		"subitems"	=> $item2
                    	       	),
	                    	),
	    	           ),
				),
			);
		}
		return $retArr;
	}
	
	/**
	 * create widget item data array
	 * 本処理はwidget追加の際のみ呼ばれる（widget初期データ用配列作成)
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.5
	 * ver1.1.4
	 */
	public function create_item_array($widgetType) {
		$ret = array();
		$nodeId = Weluka::get_instance()->create_node_id();
		$curPostId = $this->get_property("currentPostId");
		switch($widgetType) {
			case self::WIDGET_IMG :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_IMG,
					"attachment_id"	=> "",	//case wordpress media
					"cssId"	=> "",
					"cssClass" => "",
					"class_name"	=> "weluka-text-center",
					"shape" => "",
					"title"	=> "sample",
			 		"alt"	=> "sample",
					"caption"	=> "",
			 		"description"	=> "",
			 		"width"	=> "",
			 		"height"=> "",
					"margin_top"	=> "",
        			"margin_bottom" => "",
        			"margin_left"	=> "",
        			"margin_right"	=> "",
					"thumbnail" => array(
						"width" 	=> "",
						"height"	=> "",
						"url"		=> ""
					),
					"medium" => array(
						"width" 	=> "",
						"height"	=> "",
						"url"		=> ""
					),
					"large" => array(
						"width" 	=> "",
						"height"	=> "",
						"url"		=> ""
					),
					"full" => array(
						"width" 	=> "",
						"height"	=> "",
						"url"		=> ""
					),
					"source_type"	=> "",	//media or extern "" = default
			 		"url"	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
			 		"external"	=> "",
			 		"link"	=> array(
				  				"action"	=> "",
			      				"href"		=> "",
				  				"target"	=> ""
			 		)
				);
				break;
			case self::WIDGET_ICON :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_ICON,
					"cssId"	=> "",
					"cssClass" => "",
					"icon_class"	=> "fa-camera",
					"class_name"	=> "",	//align
					"icon_size"	=> "32",	//1em = 16px
					"icon_color"	=> "#666666"
				);
				break;
			case self::WIDGET_SLIDE :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_SLIDE,
					"cssId"	=> "",
					"cssClass" => "",
					"slide_effect" => $this->slide_effects['fade'],
					"direction_nav" => "1",
					"paging_nav"  => "1",
					"auto_slide"  => "1",
					"slide_loop"  => "1",
					"slideshow_msec"	=> "7000",
					//"animation_msec"	=> "600",
					"slide_size"	=> "full",
					"slides"	=> array(
						array(
							"attachment_id"	=> "",	//case wordpress media
							"thumbnail" => array(
								"width" 	=> "",
								"height"	=> "",
								"url"		=> ""
							),
							"medium" => array(
								"width" 	=> "",
								"height"	=> "",
								"url"		=> ""
							),
							"large" => array(
								"width" 	=> "",
								"height"	=> "",
								"url"		=> ""
							),
							"full" => array(
								"width" 	=> "",
								"height"	=> "",
								"url"		=> ""
							),
							"flg_description"	=> "",
							"description"	=> "sample description",
							"description_position"	=> "bottom",
			 				"link"	=> array(
				  				"action"	=> "",
			      				"href"		=> "",
				  				"target"	=> ""
			 				)
						)
					)
				);
				break;
			case self::WIDGET_BUTTON :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_BUTTON,
					"cssId"	=> "",
					"cssClass" => "",
					"text"	=> "BUTTON",
					"class_name"	=> "",
					"button_color"	=> "weluka-btn-default",
					"size"	=> "",
					"block" => "",
			 		"link"	=> array(
				  		"action"	=> "",
			      		"href"		=> "",
				  		"target"	=> ""
			 		)
				);
				break;
			case self::WIDGET_SNS_BUTTON :
				$ret = array(
					"id"		=> $nodeId,
					"type"		=> self::WIDGET_SNS_BUTTON,
					"cssId"		=> "",
					"cssClass"	=> "",
					"class_name"		=> "",
					"direction"	=> "h",	//h=horizontal, v=vertical
					"buttons"	=> array(
						array(
							"name"		=> "facebook",
							"url"		=> $this->sns_buttons['facebook']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['facebook']['button_text']
						),
						array(
							"name"		=> "twitter",
							"url"		=> $this->sns_buttons['twitter']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['twitter']['button_text']
						),
						// obsolete v1.2.8
						// array(
						// 	"name"		=> "google",
						// 	"url"		=> $this->sns_buttons['google']['default'],
						// 	"icon_type"	=> "round",
						// 	"text"		=> $this->sns_buttons['google']['button_text']
						// ),
						//v1.0.5 add
						array(
							"name"		=> "instagram",
							"url"		=> $this->sns_buttons['instagram']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['instagram']['button_text']
						),
						array(
							"name"		=> "linkedin",
							"url"		=> $this->sns_buttons['linkedin']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['linkedin']['button_text']
						),
						//v1.0.5 addend
						array(
							"name"		=> "youtube",
							"url"		=> $this->sns_buttons['youtube']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['youtube']['button_text']
						),
						//v1.0.5 add
						array(
							"name"		=> "vimeo",
							"url"		=> $this->sns_buttons['vimeo']['default'],
							"icon_type"	=> "round",
							"text"		=> $this->sns_buttons['vimeo']['button_text']
						)
						//v1.0.5 addend
					)
				);
				break;
			case self::WIDGET_SNS_SHARE :
				//obsolete  v1.2.6 
				//$currentUrl = Weluka::get_instance()->get_post_url($curPostId);
				//$currentTitle = Weluka::get_instance()->get_post_title($curPostId);
				
				//add v1.2.6 
				$currentUrl   = self::SNS_AUTO_SETTING;
				$currentTitle = self::SNS_AUTO_SETTING;
				
				$optVal = WelukaAdminSettings::get_options( WelukaAdminSettings::OGP_OPTION_NAME );
				$twitterID = !empty($optVal[WelukaAdminSettings::TWITTER_ID]) ? $optVal[WelukaAdminSettings::TWITTER_ID] : "";
				$ret = array(
					"id"		=> $nodeId,
					"type"		=> self::WIDGET_SNS_SHARE,
					"cssId"		=> "",
					"cssClass"	=> "",
					"class_name"		=> "",
					"direction"	=> "h",	//h=horizontal, v=vertical
					"buttons"	=> array(
						array(
							"name"			=> "facebook",
							"url"			=> $currentUrl,	//default this post
							"icon_type"		=> "round",
							"text"			=> $currentTitle,
							"label_text"	=> "",
							"flg_counter"	=> "on"
						),
						array(
							"name"		=> "twitter",
							"url"			=> $currentUrl,	//default this post
							"icon_type"	=> "round",
							"text"			=> $currentTitle,
							"label_text"	=> "",
							"account"		=> $twitterID,
							"flg_counter"	=> "on"
						),
						// modify v1.2.8
						// array(
						// 	"name"		=> "google",
						// 	"url"			=> "",	// modify v1.2.8
						// 	"icon_type"	=> "round",
						// 	"text"			=> $currentTitle,
						// 	"label_text"	=> "",
						// 	//"flg_counter"	=> ""
						// ),
						array(
						"name"		=> "hatebu",
						"url"			=> $currentUrl,	//default this post
						"icon_type"	=> "round",
						"text"			=> $currentTitle,
						"label_text"	=> "",
						"flg_counter"	=> "on"
						),
						array(
						"name"		=> "line",
						"url"			=> $currentUrl,	//default this post
						"icon_type"	=> "round",
						"text"			=> $currentTitle,
						"label_text"	=> "",
						),
						array(
						"name"		=> "pocket",
						"url"			=> $currentUrl,	//default this post
						"icon_type"	=> "round",
						"text"			=> $currentTitle,
						"label_text"	=> "",
						)
					)
				);
				break;
			case self::WIDGET_MOVIE :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_MOVIE,
					"attachment_id"	=> "",	//case wordpress media
					"cssId"	=> "",
					"cssClass" => "",
					"class_name"	=> "",
			 		"width"	=> "",
			 		"height"=> "",
			 		"url"	=> "", //self::DEFAULT_MOVIE_URL
				);
				break;
			case self::WIDGET_AUDIO :
				$ret = array(
					"id"	=> $nodeId,
					"type"	=> self::WIDGET_AUDIO,
					"attachment_id"	=> "",	//case wordpress media
					"autoplay"	=> "on",
					"loop"		=> "on",
			 		"url"	=> ""
				);
				break;
			case self::WIDGET_APP_HORLINE :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_APP_HORLINE,
					"cssClass" => "",
					"line_style"	=> "solid",
					"line_width"	=> 2,
					"line_color"	=> ""
				);
				break;
			case self::WIDGET_APP_ALERT :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_APP_ALERT,
					"class_name" => "",
					"alert_class" => "alert-info",
					"close_button" => "on",
					"cssId"	=> "",
					"cssClass" => "",
            	    "text" => __('Please input a alert content.', Weluka::$settings['plugin_name'])
				);
				break;
			case self::WIDGET_GMAP :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_GMAP,
					"class_name" => "",
					"cssId"	=> "",
					"cssClass" => "",
					'addr'	=> self::DEFAULT_GMAP_ADDR,
					'url'	=> '',
					'map_w'	=> '100%',
					'map_h'	=> '300',
					'zoom'	=> 16,
					'lat'	=> '',
					'lng'	=> '',
					'info'	=> '',
					'staticw'	=> ''
				);
				break;
			case self::WIDGET_APP_EMBED :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_APP_EMBED,
            	    "code"	=> ""
				);			
				break;
			case self::WIDGET_APP_ACCORDION :
				$ret = array(
	            	"id"			=> $nodeId,
    	            "type"			=> self::WIDGET_APP_ACCORDION,
					"panels"	=> array(
						array(
							"header_text"	=> "Panel1",
							"body_text"		=> __('Please input a panel content.', Weluka::$settings['plugin_name']),
							"panel_style"	=> "",
							"open"			=> "on"
						)
					),
				);				
				break;
			case self::WIDGET_APP_TABS :
				$ret = array(
	            	"id"			=> $nodeId,
    	            "type"			=> self::WIDGET_APP_TABS,
					"panels"	=> array(
						array(
							"tab_text"		=> "Tab1",
							"body_text"		=> __('Please input a panel content.', Weluka::$settings['plugin_name']),
						),
						array(
							"tab_text"		=> "Tab2",
							"body_text"		=> __('Please input a panel content.', Weluka::$settings['plugin_name']),
						)
					),
				);
				break;
			case  self::WIDGET_WP_MENU :
				$ret = array(
	            	"id"			=> $nodeId,
    	            "type"			=> self::WIDGET_WP_MENU,
					"title"			=> __('Menu', Weluka::$settings['plugin_name']),
					"term_id"		=> ""
				);
				break;
			case self::WIDGET_WP_ARCHIVES :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_ARCHIVES,
					"title"				=> __('Archives', Weluka::$settings['plugin_name']),
					"show_type"			=> "",
					"show_post_count"	=> "",	//投稿数の表示有無
					"show_format"		=> "",	//html or select option
					"show_limit"		=> ""	//リスト表示数 デフォルト全て
				);
				break;
			case self::WIDGET_WP_CALENDAR :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_CALENDAR,
					"title"				=> __('Calendar', Weluka::$settings['plugin_name'])
				);
				break;
			case self::WIDGET_WP_CATEGORIES :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_CATEGORIES,
					"title"				=> __('Categories', Weluka::$settings['plugin_name']),
					"show_post_count"	=> "",	//投稿数の表示有無
					"hierarchical"		=> "",	//親子を別階層表示
					"show_dropdown"		=> ""
				);
				break;
			case self::WIDGET_WP_META :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_META,
					"title"				=> __('Meta', Weluka::$settings['plugin_name'])
				);
				break;
			case self::WIDGET_WP_PAGES :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_PAGES,
					"title"				=> __('Pages', Weluka::$settings['plugin_name']),
					"sortby"			=> "menu_order",
					"excludes"			=> ""	//除外pageId
				);
				break;
			case self::WIDGET_WP_COMMENTS :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_COMMENTS,
					"title"				=> __('Recent Comments', Weluka::$settings['plugin_name']),
					"comment_limit"		=> ""	//表示件数
				);
				break;
			case self::WIDGET_WP_POSTS :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_POSTS,
					"title"				=> __('Recent Posts', Weluka::$settings['plugin_name']),
					"categories"		=> "", //省略=ALL
					"flg_post_title"	=> 1,
					"flg_post_date"		=> 0,
					'flg_post_author'	=> 0,	//投稿者
					'flg_post_category'	=> 0,	//投稿カテゴリ名表示有無
					'flg_post_excerpt'	=> 0,	//投稿本文抜粋表示有無
					'flg_post_thumbnail'=> 0,	//投稿アイキャッチ画像表示有無
					'more_string'		=> "",	//続きを見るリンク文字列
					'all_post_url'		=> "",	//ALL POST LINK URL
					'all_post_link_string'	=> "",	//ALL TOPICS LINK STRING
					"post_limit"		=> 5,	//表示件数
					"list_height"			=> ""	//表示高さ
				);
				break;
			case self::WIDGET_WP_RSS :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_RSS,
					"title"				=> __('Rss Feed', Weluka::$settings['plugin_name']),
					"url"				=> "",
					"rss_limit"			=> 5,	//表示件数
					'show_summary'		=> 0,	//rss 抜粋表示有無
					'show_author'		=> 0,	//rss 著者表示有無
					'show_date'			=> 0,	//rss 日付表示有無
					"list_height"		=> ""	//表示高さ
				);
				break;
			case self::WIDGET_WP_SEARCH :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_SEARCH,
					"title"				=> __('Search', Weluka::$settings['plugin_name'])
				);
				break;
			case self::WIDGET_WP_TAGCLOUD :
				$ret = array(
	            	"id"				=> $nodeId,
    	            "type"				=> self::WIDGET_WP_TAGCLOUD,
					"title"				=> __('Tag Cloud', Weluka::$settings['plugin_name']),
					"taxonomy"			=> "post_tag",	//post_tag or category
				);
				break;
		  	case self::WIDGET_TITLE :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_TITLE,
					"cssId"	=> "",
					"cssClass" => "",
        	        "class_name"	=> "",
            	    "text"	=> __('<h3>Please input a title.</h3>', Weluka::$settings['plugin_name'])
				);
				break;
			//v1.1.4 add
		  	case self::WIDGET_TITLE_2 :
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_TITLE_2,
					"cssId"	=> "",
					"cssClass" => "",
        	        "class_name"	=> "",
            	    "text"	=> __('Please input a title.', Weluka::$settings['plugin_name'])
				);
				break;
			//v1.1.4 addend
			case self::WIDGET_APP_LIST :
				$ret = $this->create_widget_applist_array();
				break;
			default :
				//case WIDGET_TEXT
				$ret = array(
	            	"id"	=> $nodeId,
    	            "type"	=> self::WIDGET_TEXT,
					"cssId"	=> "",
					"cssClass" => "",
        	        "class_name"	=> "",
            	    "text"	=> __('Please input a text.', Weluka::$settings['plugin_name'])
				);
				break;				
		}
		return $ret;
	}

	/**
	 * create widget applist array
	 * widget applist配列作成（最初の追加時のみの配列）
	 * @since 1.0
	 */
	public function create_widget_applist_array($layoutClass = 'medialeft') {
		$ret = array();
		$weluka = Weluka::get_instance();
		$nodeId = $weluka->create_node_id();

		//common link and parts linkを設ける
		//common linkは画像とタイトル、ボタンに設定する。（動画の場合はメディアリンクなし）
		$ret = array(
			"id"			=> $nodeId,
			"type"			=> self::WIDGET_APP_LIST,
			"layout_class"	=> $layoutClass,
			"media_display"	=> 1,	//0=diplay none
			"title_display"	=> 1,	//0=diplay none
			"meta1_display"	=> 1,	//0=diplay none
			"meta2_display"	=> 1,	//0=diplay none
			"content_display"	=> 1,	//0=diplay none
			"button_display"	=> 1,	//0=diplay none
			"datas"	=> array(
					array(
						"media"	=> array(
							"type"			=> 	self::WIDGET_IMG,
							"class_name"			=> "weluka-text-left",
					 		"url"	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
						),
						"title"	=> array(
							"text"	=> __('List Headline 1', Weluka::$settings['plugin_name'])
						),
						"content"	=> array(
							"text"	=> __('List content (News, announcements, guidance) Please enter an excerpt of such. Font size in the visual editor, set the style of color, etc., it is possible to be more attractive Mihae. In addition it is also possible to choose whether or not to display this item.', Weluka::$settings['plugin_name'])
						),
						"meta1"		=> array(
							"text"	=> __('September 15, 2015', Weluka::$settings['plugin_name'])
						),
						"meta2"		=> array(
							"text"	=> __('News, Service, Product', Weluka::$settings['plugin_name'])
						)
					),
					array(
						"media"	=> array(
							"type"			=> 	self::WIDGET_IMG,
							"class_name"			=> "weluka-text-left",
					 		"url"	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
						),
						"title"	=> array(
							"text"	=> __('List Headline 2', Weluka::$settings['plugin_name'])
						),
						"content"	=> array(
							"text"	=> __('List content (News, announcements, guidance) Please enter an excerpt of such. Font size in the visual editor, set the style of color, etc., it is possible to be more attractive Mihae. In addition it is also possible to choose whether or not to display this item.', Weluka::$settings['plugin_name'])
						),
						"meta1"		=> array(
							"text"	=> __('September 15, 2015', Weluka::$settings['plugin_name'])
						),
						"meta2"		=> array(
							"text"	=> __('News, Service, Product', Weluka::$settings['plugin_name'])
						)
					),
					array(
						"media"	=> array(
							"type"			=> 	self::WIDGET_IMG,
							"class_name"			=> "weluka-text-left",
					 		"url"	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
						),
						"title"	=> array(
							"text"	=> __('List Headline 3', Weluka::$settings['plugin_name'])
						),
						"content"	=> array(
							"text"	=> __('List content (News, announcements, guidance) Please enter an excerpt of such. Font size in the visual editor, set the style of color, etc., it is possible to be more attractive Mihae. In addition it is also possible to choose whether or not to display this item.', Weluka::$settings['plugin_name'])
						),
						"meta1"		=> array(
							"text"	=> __('September 15, 2015', Weluka::$settings['plugin_name'])
						),
						"meta2"		=> array(
							"text"	=> __('News, Service, Product', Weluka::$settings['plugin_name'])
						)
					)
			)
		);
		return $ret;
	}
	
	/**
	 * container class get
	 * @since 1.0
	 */
	public function get_container_class( $data = array() ) {
		$ret	= 'weluka-container';

		//option
		$optVal = WelukaAdminSettings::get_options( WelukaAdminSettings::CONTAINER_TYPE );
		//section setting
		$sectionVal = !empty($data['container_type']) ? $data['container_type'] : '';

		if( !empty( $sectionVal ) ) { $ret = $sectionVal; }
		elseif( !empty( $optVal ) ) { $ret = $optVal; }

		return $ret;
	}
 
	/**
	 * builder new blank droppable section dispaly
	 * @since 1.0
	 * @update
	 * ver 1.0.3
	 */
	public function render_new_blank($echo = true) {
		$ct = "";
		$containerClass = $this->get_container_class();

		//v1.0.3 layout 選択ボタン追加 doppable にかぶらないように追加
		$ct = '<div id="weluka-new-blank" class="' . $containerClass . ' clearfix"><div class="weluka-row clearfix"><div class="weluka-col-md-12">' .
			  '<div class="weluka-new-panel">' .
			  __('Please add a widget by drag and drop and make contents.', Weluka::$settings['plugin_name']) .
			  '<div class="weluka-droppable" data-weluka-drop-position="new"></div>' .
			  '</div>' .
			 '<p class="weluka-mgtop-xl"><button id="weluka-layoutselect" type="button" class="aligncenter weluka-btn weluka-btn-info btn-lg no-rounded sp-block-btn" style="font-weight:600;">' .
			  __('Sample Select', Weluka::$settings['plugin_name']) .
			  '</button></p>' .
			  '</div></div></div>';

		if($echo) { echo $ct; }else{ return $ct; }
	}
	/**
	 * builder sections data html create
	 * @since 1.0
	 */	
	public function render_sections($builderData, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";

//		if( !empty( $builderData ) ) {
//			foreach($builderData as $sectionKey => $sectionVals) :
//				foreach($sectionVals as $sectionVal) : //section
//					$content .= $this->render_section($sectionVal, false);
//				endforeach; //setion end foreach
//			endforeach;
		if( !empty( $builderData['sections'] ) ) {
			foreach($builderData['sections'] as $sectionVal) : //section
				$content .= $this->render_section($sectionVal, false);
			endforeach; //setion end foreach

			if($builderMode) {
				$content .= '<div class="weluka-droppable weluka-horizontal-drop-handle" data-weluka-drop-position="section"></div>';	//section drop area last bottom
			}
		}
		if($echo){ echo $content; }else{ return $content; }
	}
	
	/**
	 * builder section data html create
	 * @since 1.0
	 * @update
	 * ver 1.0.4
	 * ver 1.0.5
	 * ver 1.1.2
	 * ver 1.2
	 * ver 1.2.7.1
	 */
	public function render_section($data, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		
		if( empty($data['id']) ) { return ""; }

		$containerClass = $this->get_container_class( $data );

		if($builderMode) {
			$content = '<div class="weluka-droppable weluka-horizontal-drop-handle" data-weluka-drop-position="section"></div>';	//section drop area top
			$content .= '<div id="' . $data['id'] . '" class="weluka-section-block" data-block-title="' . __('Section', Weluka::$settings['plugin_name']) . '">'; 
		}
		
		$class = isset($data['class_name']) && strlen(trim($data['class_name'])) > 0 ? ' ' . $data['class_name'] : "";
		$style = $this->get_style_attribute($data, true, false);
		//v1.0.4 $cssId = isset($data['cssId']) && strlen(trim($data['cssId'])) > 0 ? 'id="' . $data['cssId'] . '"' : "";
		$cssClass = isset($data['cssClass']) && strlen(trim($data['cssClass'])) > 0 ? ' ' . $data['cssClass'] : "";
		//v1.1.2
		//$anchor = !empty ($data['anchor_id']) ? '<a id="' . $data['anchor_id'] . '"></a>' : "";
		$anchor = !empty ($data['anchor_id']) ? '<a id="' . $data['anchor_id'] . '" name="' . $data['anchor_id'] . '"></a>' : "";

		//v1.0.4 add
		$cssId = 'section_' . Weluka::get_instance()->create_node_id();
		$bgType		= isset($data["bg_type"]) && strlen(trim($data["bg_type"])) > 0 ? $data["bg_type"] : '';
		$bgMovie 	= '';
/***** v1.2.7.1 modify shortcode
		$mp4Url		= isset($data["movie"]["mp4"]["url"]) && strlen(trim($data["movie"]["mp4"]["url"])) > 0 ? '<source src="' . trim( $data["movie"]["mp4"]["url"] ) . '" type="video/mp4">' : '';
		$webmUrl	= isset($data["movie"]["webm"]["url"]) && strlen(trim($data["movie"]["webm"]["url"])) > 0 ? '<source src="' . trim( $data["movie"]["webm"]["url"] ) . '" type="video/webm">' : '';
*****/
		$mp4Url		= isset($data["movie"]["mp4"]["url"]) && strlen(trim($data["movie"]["mp4"]["url"])) > 0 ? trim( $data["movie"]["mp4"]["url"] ) : '';
		$webmUrl	= isset($data["movie"]["webm"]["url"]) && strlen(trim($data["movie"]["webm"]["url"])) > 0 ? trim( $data["movie"]["webm"]["url"] ) : '';
		//v1.2.7.1 modify end

		$bgMovieStyle = '';
		if( $bgType === 'movie' && ( $mp4Url || $webmUrl ) ) {
			$cssClass .= ' weluka-bg-movie';
			$poster	= isset($data["movie"]["poster"]["full"]["url"]) && strlen(trim($data["movie"]["poster"]["full"]["url"])) > 0 ? trim( $data["movie"]["poster"]["full"]["url"] ) : '';

/***** v1.2.7.1 modify shortcode
			$bgMovie =
				'<div class="weluka-bg-movie-container"><video autoplay loop muted poster="' . $poster . '">' . 
					$mp4Url . $webmUrl .
					//'<img src="' . $poster . '" width="100%"  alt="">' . 
				'</video></div>';
*****/

			$bgMovie = sprintf('[%s mp4="%s" webm="%s" poster="%s" sphide="%s"]', $this->bgvideo_shortcode_tag, $mp4Url, $webmUrl, $poster, $data["movie"]["bg_movie_sphide"]);
			if($builderMode) { $bgMovie = do_shortcode($bgMovie); }
			//v1.2.7.1 modify end

/***** v1.2.7.1 modify
			//smartphone image
			if( isset($data["movie"]["bg_movie_sphide"]) && $data["movie"]["bg_movie_sphide"] == 'on' ) {
				$bgMovieStyle = '<div class="weluka-hide"><style> ' .
					'@media screen and (max-width: 767px) { ' .
					'#' . $cssId . '.weluka-bg-movie .weluka-bg-movie-container, #' . $cssId . '.weluka-bg-movie video { display: none; } ' .
					'#' . $cssId . ' { background-image:url(' . $poster . ');background-position:50% 0;background-repeat:no-repeat;background-attachment:scroll;background-size:cover;z-index:0; } ' .
				'} </style></div>';
			}
*****/
			$bgMovieStyle = sprintf('[%s id="%s" poster="%s" sphide="%s"]', $this->bgvideocss_shortcode_tag, $cssId, $poster, $data["movie"]["bg_movie_sphide"]);
			if($builderMode) { $bgMovieStyle = do_shortcode($bgMovieStyle); }
			//v1.2.7.1 modify end
		}

		$bgOverlayColor	= isset($data["bg_overlay_color"]) && strlen(trim($data["bg_overlay_color"])) > 0 ? $data["bg_overlay_color"] : '';
		$bgOverlay = '';
		if( $bgOverlayColor ) {
			$cssClass .= ' weluka-bg-overlay';
			//v1.2.3 modify
			//$bgOverlay = '<div class="weluka-bg-overlay" style="width:100%;height:auto;overflow:hidden;background:' . $bgOverlayColor . ';position:absolute;top:0;left:0;bottom:0;right:0;z-index:0;"></div>';
			$bgOverlay = '<div class="weluka-bg-overlay" style="width:100%;height:auto;background:' . $bgOverlayColor . ';position:absolute;top:0;left:0;bottom:0;right:0;"></div>';
		}
		
		$style .= isset($data["container_height"]) && strlen(trim($data["container_height"])) > 0 ? ' height: ' . trim( $data["container_height"] ) . 'vh;' : '';

		$cssClass .= isset($data["container_valign"]) && strlen(trim($data["container_valign"])) > 0 ? ' weluka-flex-height-center' : '';

		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($data); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($data);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend
		
		$content .= $anchor;
		$content .= $bgMovieStyle;

		//v1.1.4 add
		$boxShadowStyle	= !empty($data['box_shadow_style']) ? $data['box_shadow_style'] : '';
		$boxShadowColor	= !empty($data['box_shadow_color']) ? $data['box_shadow_color'] : '';		
		$_headBoxStyle = $this->get_boxshadow_style($cssId, $boxShadowStyle, $boxShadowColor);
		//v1.1.4 add

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $data );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-section' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" style="' . $style . '"' . $responsiveMpData . $_animateDelay . '>';

		$content .= $bgOverlay;
		$content .= $bgMovie;
		$content .= '<div class="' . $containerClass . ' clearfix">';
		$content .= $this->render_rows($data['rows'], false);
		$content .= '</div>'; //container end

		if($builderMode) {
			$content .= $this->overlay_html('section', false);
		}

		//v1.1.4 add
		$content .= $this->add_head_style_js( $_headBoxStyle );
		
		$content .= '</div>'; //section end

		if($builderMode) { $content .= '</div>'; }
		if($echo){ echo $content; }else{ return $content; }
	}
	
	/**
	 * builder rows data html create
	 * @since 1.0
	 */
	public function render_rows($rows, $echo = true, $subrow = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		if(is_array($rows)) :
		foreach($rows as $rowVal) :
			$content .= $this->render_row($rowVal, false, $subrow);
		endforeach;
		endif;
		
		if($builderMode) {
			$pos = $subrow ? 'subrow' : 'row';
			$content .= '<div class="weluka-droppable weluka-horizontal-drop-handle" data-weluka-drop-position="' . $pos . '"></div>';	//row drop area last
		}

		if($echo){ echo $content; }else{ return $content; }
	}
	
	/**
	 * builder row data html create
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 * ver1.2.3
	 */
	public function render_row($data, $echo = true, $subrow = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$blockClass = $subrow ? 'weluka-s-row-block' : 'weluka-row-block';
		
		if($builderMode) {
			$pos = $subrow ? 'subrow' : 'row';
			$content = '<div class="weluka-droppable weluka-horizontal-drop-handle" data-weluka-drop-position="' . $pos . '"></div>';	//row drop area top
			$content .= '<div id="' . $data['id'] . '" class="' . $blockClass . ' clearfix" data-block-title="' . __('Row', Weluka::$settings['plugin_name']) . '">'; 
		}
		$class = isset($data['class_name']) && strlen(trim($data['class_name'])) > 0 ? ' ' . $data['class_name'] : "";
		//v1.2.3 mdify $style = $this->get_style_attribute($data);
		$style = $this->get_style_attribute($data, true, false, true, true);
		
		//$cssId = isset($data['cssId']) && strlen(trim($data['cssId'])) > 0 ? 'id="' . $data['cssId'] . '"' : "";
		$cssClass = isset($data['cssClass']) && strlen(trim($data['cssClass'])) > 0 ? ' ' . $data['cssClass'] : "";
		$blockShape = isset($data['block_shape']) && strlen(trim($data['block_shape'])) > 0 ? ' ' . $data['block_shape'] : "";

		$bgcolor	= !empty($data["background_color"]) ? trim($data["background_color"]) : '';
		$borderSize	= !empty($data['border_size']) ? trim($data['border_size']) . 'px' : '';

		$radiusSize = isset($data['block_radius_size']) && strlen(trim($data['block_radius_size'])) > 0 ? trim( $data['block_radius_size'] ) : "";	//v1.2.3
		
		//v1.0,4 add
		$cssId = 'row_' . Weluka::get_instance()->create_node_id();

		//v1.1.4 add
		$boxShadowStyle	= !empty($data['box_shadow_style']) ? $data['box_shadow_style'] : '';
		$boxShadowColor	= !empty($data['box_shadow_color']) ? $data['box_shadow_color'] : '';		
		$_headBoxStyle = $this->get_boxshadow_style($cssId, $boxShadowStyle, $boxShadowColor);

		$nmgClass = '';
		//v1.2.3 if($borderSize !== '' || $bgcolor !== '') {
		if($borderSize !== '' || $bgcolor !== '' || $blockShape || $boxShadowStyle ) {
			$nmgClass = ' weluka-row-negative-margin-clear';
		}

		//v1.1.4 add
		//v1.2 add
		$eqColh = '';
		if( !empty( $data["eq_colh"] ) ){ $eqColh = ' weluka-eq-colh'; }
		$contentValign = '';
		if( !empty( $data["content_valign"] ) ) {
			if( $data["content_valign"] === 'center' ) {
				if( !empty( $eqColh ) ) { $contentValign = ' weluka-colh-vcenter'; } else { $contentValign = ' weluka-colh-vcenter-nostretch'; }
			} elseif( $data["content_valign"] === 'bottom' ) {
				if( !empty( $eqColh ) ) { $contentValign = ' weluka-colh-vbottom'; } else { $contentValign = ' weluka-colh-vbottom-nostretch'; }
			}
		}
		$cssClass .= $eqColh . $contentValign;
		
		$eqColh = '';
		if( !empty( $data["eq_sm_colh"] ) ){ $eqColh = ' weluka-eq-colh-sm'; }
		$contentValign = '';
		if( !empty( $data["content_sm_valign"] ) ) {
			if( $data["content_sm_valign"] === 'center' ) {
				if( !empty( $eqColh ) ) { $contentValign = ' weluka-colh-vcenter-sm'; } else { $contentValign = ' weluka-colh-vcenter-nostretch-sm'; }
			} elseif( $data["content_sm_valign"] === 'bottom' ) {
				if( !empty( $eqColh ) ) { $contentValign = ' weluka-colh-vbottom-sm'; } else { $contentValign = ' weluka-colh-vbottom-nostretch-sm'; }
			}
		}
		$cssClass .= $eqColh . $contentValign;
		
		$eqColh = '';
		if( !empty( $data["eq_xs_colh"] ) ){ $eqColh = ' weluka-eq-colh-xs'; }
		$contentValign = '';
		if( !empty( $data["content_xs_valign"] ) ) {
			if( $data["content_xs_valign"] === 'center' ) {
				if( !empty( $eqColh ) ) { $contentValign = ' weluka-colh-vcenter-xs'; } else { $contentValign = ' weluka-colh-vcenter-nostretch-xs'; }
			} elseif( $data["content_xs_valign"] === 'bottom' ) {
				if( !empty( $eqColh ) ) { $contentValign = ' weluka-colh-vbottom-xs'; } else { $contentValign = ' weluka-colh-vbottom-nostretch-xs'; }
			}
		}
		$cssClass .= $eqColh . $contentValign;
		//v1.2 addend

		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($data); } //not builder mode
		
		$responsiveMpData = $this->get_responsive_mg_pd($data);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $data );

		//v1.2.3
		if( $blockShape && $radiusSize ) {
			$blockShape = '';
			$style .= 'border-radius:' . $radiusSize . 'px;';
		}
		$style = ' style="' . $style . '"';
		//v1.2.3 addend
		 
		//v1.1.4 boxShadowStyle add
		//v1.2 animate ... add
		$content .= '<div id="' . $cssId . '" class="weluka-row clearfix' . $class . $cssClass . $blockShape . ' ' . $boxShadowStyle . $nmgClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';

		if($subrow === true) {
			$content .= $this->render_colums($data['subcolums'], false, true);
		}else{
			$content .= $this->render_colums($data['colums'], false);
		}
		
		if($builderMode) {
			$mode = $subrow ? 's_row' : 'row';
			$content .= $this->overlay_html($mode, false);
		}

		//v1.1.4 add
		$content .= $this->add_head_style_js( $_headBoxStyle );

		$content .= '</div>';
		if($builderMode) {
			$content .= '</div>';
		}
		if($echo){ echo $content; }else{ return $content; }
	}
	
	/**
	 * builder colums data html create
	 * @since 1.0
	 */
	public function render_colums($colums, $echo = true, $subcolum = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		if(is_array($colums)) :
		foreach($colums as $columVal) :
			$content .= $this->render_colum($columVal, false, $subcolum);
		endforeach;
		endif;
		if($echo){ echo $content; }else{ return $content; }
	}

	/**
	 * builder colum data html create
	 * @since 1.0
	 * @update
	 * ver 1.0.4
	 * ver 1.1.2
	 * ver 1.1.4
	 * ver 1.2
	 */
	public function render_colum($data, $echo = true, $subcolum = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$col = isset($data['col']) ? ' weluka-col-md-' . $data['col'] : ' weluka-col-md-12';
		$class = isset($data['class_name']) && strlen(trim($data['class_name'])) > 0 ? ' ' . $data['class_name'] : "";
		//$style = $this->get_style_attribute($data);
		//$cssId = isset($data['cssId']) && strlen(trim($data['cssId'])) > 0 ? 'id="' . $data['cssId'] . '"' : "";
		$cssClass = isset($data['cssClass']) && strlen(trim($data['cssClass'])) > 0 ? ' ' . $data['cssClass'] : "";
		$blockShape = isset($data['block_shape']) && strlen(trim($data['block_shape'])) > 0 ? ' ' . $data['block_shape'] : "";
		$radiusSize = isset($data['block_radius_size']) && strlen(trim($data['block_radius_size'])) > 0 ? trim( $data['block_radius_size'] ) : "";	//v1.2.3

		$bgcolor	= !empty($data["background_color"]) ? trim($data["background_color"]) : '';
		$borderSize	= !empty($data['border_size']) ? trim($data['border_size']) . 'px' : '';

		//v1.1.2 add
		$blockInWrap	= !empty($data['block_inwrap']) ? true : false;
		$paddingInWrapT	= isset($data["padding_inwrap_top"]) && strlen(trim($data["padding_inwrap_top"])) > 0 ? ' padding-top:' . $data["padding_inwrap_top"] . 'px;' : '';
		$paddinginWrapB	= isset($data["padding_inwrap_bottom"]) && strlen(trim($data["padding_inwrap_bottom"])) > 0 ? ' padding-bottom:' . $data["padding_inwrap_bottom"] . 'px;' : '';
		$paddingInWrapL	= isset($data["padding_inwrap_left"]) && strlen(trim($data["padding_inwrap_left"])) > 0 ? ' padding-left:' . $data["padding_inwrap_left"] . 'px;' : '';
		$paddingInWrapR	= isset($data["padding_inwrap_right"]) && strlen(trim($data["padding_inwrap_right"])) > 0 ? ' padding-right:' . $data["padding_inwrap_right"] . 'px;' : '';
		//v1.1.2 addend
		
		$nmgClass = '';
		
		//v1.1.2 add
		$borderFlg = true;
		$bgColorFlg = true;
		$borderCss = '';
		$bgColorCss = '';
		$flgBlockInWrap = false;
		//v1.1.2 addend
		if( $borderSize !== '' || $bgcolor !== '' ) {
			$nmgClass = $builderMode ? ' weluka-col-negative-margin-clear-builder' : ' weluka-col-negative-margin-clear';
			//v1.1.2 add
			if( $blockInWrap ) {
				$borderFlg = false;
				$bgColorFlg = false;
				if( $bgcolor !== '' ) { $bgColorCss	= ' background-color:' . $data["background_color"] . ';'; }
				$borderStyle= isset($data['border_style']) && strlen(trim($data['border_style'])) > 0 ? $data['border_style'] : '';
				$borderColor= isset($data['border_color']) && strlen(trim($data['border_color'])) > 0 ? $data['border_color'] : '';
				if( $borderSize !== '' ) { $borderCss = ' border:' . $borderSize . ' ' . $borderStyle . ' ' . $borderColor . ';'; }
				
				//v1.2.3 add
				if( $blockShape && $radiusSize ) {
					$blockShape = '';
					$borderCss .= 'border-radius:' . $radiusSize . 'px;';
				}

				$flgBlockInWrap = true;
			}
		}
		
		//v1.1.2 modify
		//v1.2.3 modify $style = $this->get_style_attribute($data, $borderFlg, true, $bgColorFlg);
		$style = $this->get_style_attribute($data, $borderFlg, false, $bgColorFlg);

		//v1.2.3 add
		if( !$flgBlockInWrap && $blockShape && $radiusSize ) {
			$blockShape = '';
			$style .= 'border-radius:' . $radiusSize . 'px;';
		}
		$style = ' style="' . $style . '"';
		//v1.2.3 addend
		
		$blockClass = $subcolum ? 'weluka-s-col-block' : 'weluka-col-block';

		//v1.0.4 add
		$cssId = 'col_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($data); } //not builder mode	
		$responsiveMpData = $this->get_responsive_mg_pd($data);		
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		$cssClass .= !empty($data['sm_col']) && $data['sm_col'] != 'none' ? ' weluka-col-sm-' . $data['sm_col'] : '';
		$cssClass .= !empty($data['xs_col']) && $data['xs_col'] != 'none' ? ' weluka-col-xs-' . $data['xs_col'] : '';
		//v1.0.4 addend

		//v1.1.2 add
		$responsiveMpDataInWrap = '';
		$cssClassInWrap = '';
		$cssIdInWrap = '';
		if( $flgBlockInWrap ) {
			$cssIdInWrap = 'col_inwrap_' . Weluka::get_instance()->create_node_id();

			//inbox md padding
			$t = isset($data["padding_md_inwrap_top"]) && strlen(trim($data["padding_md_inwrap_top"])) > 0 ? trim($data["padding_md_inwrap_top"]) : '';
			$r = isset($data["padding_md_inwrap_right"]) && strlen(trim($data["padding_md_inwrap_right"])) > 0 ? trim($data["padding_md_inwrap_right"]) : '';
			$b = isset($data["padding_md_inwrap_bottom"]) && strlen(trim($data["padding_md_inwrap_bottom"])) > 0 ? trim($data["padding_md_inwrap_bottom"]) : '';
			$l = isset($data["padding_md_inwrap_left"]) && strlen(trim($data["padding_md_inwrap_left"])) > 0 ? trim($data["padding_md_inwrap_left"]) : '';
			$u = isset($data["padding_md_inwrap_unit"]) && strlen(trim($data["padding_md_inwrap_unit"])) > 0 ? trim($data["padding_md_inwrap_unit"]) : 'px';
			if( $t != '' || $r != '' || $b != '' || $l != '' ) {
				$responsiveMpDataInWrap = ' data-mdp-inwrap="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
			}
			//inbox md padding
			$t = isset($data["padding_sm_inwrap_top"]) && strlen(trim($data["padding_sm_inwrap_top"])) > 0 ? trim($data["padding_sm_inwrap_top"]) : '';
			$r = isset($data["padding_sm_inwrap_right"]) && strlen(trim($data["padding_sm_inwrap_right"])) > 0 ? trim($data["padding_sm_inwrap_right"]) : '';
			$b = isset($data["padding_sm_inwrap_bottom"]) && strlen(trim($data["padding_sm_inwrap_bottom"])) > 0 ? trim($data["padding_sm_inwrap_bottom"]) : '';
			$l = isset($data["padding_sm_inwrap_left"]) && strlen(trim($data["padding_sm_inwrap_left"])) > 0 ? trim($data["padding_sm_inwrap_left"]) : '';
			$u = isset($data["padding_sm_inwrap_unit"]) && strlen(trim($data["padding_sm_inwrap_unit"])) > 0 ? trim($data["padding_sm_inwrap_unit"]) : 'px';
			if( $t != '' || $r != '' || $b != '' || $l != '' ) {
				$responsiveMpDataInWrap .= ' data-smp-inwrap="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
			}
			//inbox xs padding
			$t = isset($data["padding_xs_inwrap_top"]) && strlen(trim($data["padding_xs_inwrap_top"])) > 0 ? trim($data["padding_xs_inwrap_top"]) : '';
			$r = isset($data["padding_xs_inwrap_right"]) && strlen(trim($data["padding_xs_inwrap_right"])) > 0 ? trim($data["padding_xs_inwrap_right"]) : '';
			$b = isset($data["padding_xs_inwrap_bottom"]) && strlen(trim($data["padding_xs_inwrap_bottom"])) > 0 ? trim($data["padding_xs_inwrap_bottom"]) : '';
			$l = isset($data["padding_xs_inwrap_left"]) && strlen(trim($data["padding_xs_inwrap_left"])) > 0 ? trim($data["padding_xs_inwrap_left"]) : '';
			$u = isset($data["padding_xs_inwrap_unit"]) && strlen(trim($data["padding_xs_inwrap_unit"])) > 0 ? trim($data["padding_xs_inwrap_unit"]) : 'px';
			if( $t != '' || $r != '' || $b != '' || $l != '' ) {
				$responsiveMpDataInWrap .= ' data-xsp-inwrap="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
			}
		}
		if( $responsiveMpDataInWrap ) { $cssClassInWrap = ' weluka-responsive-mp'; }
		

		//v1.1.4 add
		$boxShadowStyle	= !empty($data['box_shadow_style']) ? $data['box_shadow_style'] : '';
		$boxShadowColor	= !empty($data['box_shadow_color']) ? $data['box_shadow_color'] : '';
		$_wkId = '';
		if($builderMode) {
			if( $flgBlockInWrap ) { $_wkId = $cssIdInWrap; } else { $_wkId = $data['id']; }
		} else {
			if( $flgBlockInWrap ) { $_wkId = $cssIdInWrap; } else { $_wkId = $cssId; }
		}
		$_headBoxStyle = $this->get_boxshadow_style( $_wkId, $boxShadowStyle, $boxShadowColor, str_replace( 'px', '', $borderSize ) );
		//v1.1.4 add

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $data );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate ... add
		if($builderMode) {
			//ver1.0.1
			$pdtop	= isset($data["padding_top"]) && strlen(trim($data["padding_top"])) > 0 ? $data["padding_top"] . 'px' : '';
			//v1.1.2 modify
			//$content .= '<div id="' . $data['id'] . '" class="' . $blockClass . ' weluka-col' . $col . $class . $cssClass . $blockShape . $nmgClass . '" ' . $style . ' data-block-title="' . __('Colum', Weluka::$settings['plugin_name']) . '" data-orgpdt="' . $pdtop . '"' . $responsiveMpData. '>';			

			if( $flgBlockInWrap ) {
				$content .= '<div id="' . $data['id'] . '" class="' . $blockClass . ' weluka-col' . $col . $class . $cssClass . $nmgClass . $_animateClass . '" ' . $style . ' data-block-title="' . __('Colum', Weluka::$settings['plugin_name']) . '" data-orgpdt="' . $pdtop . '"' . $responsiveMpData . $_animateDelay . '>';
				$content .= '<div id="' . $cssIdInWrap . '" class="weluka-col-inner' . $blockShape . $cssClassInWrap . ' ' . $boxShadowStyle . '" style="' . $bgColorCss . $borderCss . $paddingInWrapT . $paddinginWrapB . $paddingInWrapL . $paddingInWrapR . '"' . $responsiveMpDataInWrap . '>';
			} else {
				$content .= '<div id="' . $data['id'] . '" class="' . $blockClass . ' weluka-col' . $col . $class . $cssClass . $blockShape . $nmgClass . ' ' . $boxShadowStyle . $_animateClass . '" ' . $style . ' data-block-title="' . __('Colum', Weluka::$settings['plugin_name']) . '" data-orgpdt="' . $pdtop . '"' . $responsiveMpData . $_animateDelay . '>';			
			}
		}else{
			//v1.1.2 modify
			//$content .= '<div id="' . $cssId . '" class="weluka-col' . $col . $class . $cssClass . $blockShape . $nmgClass. '" ' . $style . $responsiveMpData . '>';
			if( $flgBlockInWrap ) {
				$content .= '<div id="' . $cssId . '" class="weluka-col' . $col . $class . $cssClass . $nmgClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
				$content .= '<div id="' . $cssIdInWrap . '" class="weluka-col-inner' . $blockShape . $cssClassInWrap . ' ' . $boxShadowStyle . '" style="' . $bgColorCss . $borderCss . $paddingInWrapT . $paddinginWrapB . $paddingInWrapL . $paddingInWrapR . '"' . $responsiveMpDataInWrap . '>';
			} else {
				$content .= '<div id="' . $cssId . '" class="weluka-col' . $col . $class . $cssClass . $blockShape . $nmgClass. ' ' . $boxShadowStyle . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
			}
		}
		//$content .= '<div ' . $cssId . ' class="weluka-col' . $col . $class . $cssClass . '" ' . $style . '>';

		if($subcolum == true) {
			$content .= $this->render_items($data['subitems'], false, true);
		}else{
			$content .= $this->render_items($data['items'], false);
		}
		
		if($builderMode) {
			$mode = $subcolum ? 's_col' : 'col';
			$content .= $this->overlay_html($mode, false);
		}

		//v1.1.4 add
		$content .= $this->add_head_style_js( $_headBoxStyle );

		//v1.1.2 add
		if( $flgBlockInWrap ) { $content .= '</div>'; }

		$content .= '</div>';

		//if($builderMode) {
		//	$content .= '</div>';
		//}
		if($echo){ echo $content; }else{ return $content; }
	}

	/**
	 * builder items data display
	 * @since 1.0
	 * @update
	 * ver1.1.3
	 */
	public function render_items($items, $echo = true, $subitem = false) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		if(is_array($items)) :
		foreach($items as $itemVal) :
			//$ret = "";
			if(isset($itemVal['subrows'])) {
				if($builderMode) {
					$content .= '<div id="' . $itemVal['id'] . '" class="weluka-widget" data-widget-type="subwidget">';
				}
				$content .= $this->render_rows($itemVal['subrows'], false, true);
				if($builderMode) {
					$content .= '</div>';
				}
				//break; v1.1.3 continueに変更
				continue;
			}
			$content .= $this->render_item($itemVal, false, $subitem);
		endforeach;
		endif;
		if($echo){ echo $content; }else{ return $content; }
	}

	/**
	 * builder item data display
	 * @since 1.0
	 * @update
	 * ver1.1.4
	 */
	public function render_item($item, $echo = true, $subitem = false) {
		$content = "";
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$blockClass = $subitem ? 'weluka-s-widget' : 'weluka-widget';
		
		if($builderMode) {
			$content .= '<div id="' . $item['id'] . '" class="weluka-widget-block ' . $blockClass . '" data-widget-type="' . $item['type'] . '" data-block-title="' . __('Edit', Weluka::$settings['plugin_name']) . '">';
		}
		
		$ret = "";
		switch($item['type']) {
			case self::WIDGET_IMG :
				$ret = $this->widget_img_html($item, $echo);
				break;
			case self::WIDGET_BUTTON :
				$ret = $this->widget_button_html($item, $echo);
				break;
			case self::WIDGET_MOVIE :
				$ret = $this->widget_movie_html($item, $echo);
				break;
			case self::WIDGET_AUDIO :
				$ret = $this->widget_audio_html($item, $echo);
				break;
			case self::WIDGET_APP_HORLINE :
				$ret = $this->widget_apphorline_html($item, $echo);
				break;
			case self::WIDGET_APP_ALERT :
				$ret = $this->widget_appalert_html($item, $echo);
				break;
			case self::WIDGET_GMAP :
				$ret = $this->widget_gmap_html($item, $echo);
				break;
			case self::WIDGET_ICON :
				$ret = $this->widget_icon_html($item, $echo);
				break;
			case self::WIDGET_SLIDE :
				$ret = $this->widget_slide_html($item, $echo);
				break;
			case self::WIDGET_SNS_BUTTON :
				$ret = $this->widget_snsbutton_html($item, $echo);
				break;
			case self::WIDGET_SNS_SHARE :
				$ret = $this->widget_snsshare_html($item, $echo);
				break;
			case self::WIDGET_APP_EMBED :
				$ret = $this->widget_appembed_html($item, $echo);
				break;
			case self::WIDGET_APP_ACCORDION :
				$ret = $this->widget_accordion_html($item, $echo);
				break;			
			case self::WIDGET_APP_TABS :
				$ret = $this->widget_tabs_html($item, $echo);
				break;
			case self::WIDGET_APP_LIST :
				$ret = $this->widget_list_html($item, $echo);
				break;
			case self::WIDGET_WP_MENU :
				$ret = $this->widget_wpmenu_html($item, $echo);
				break;
			case self::WIDGET_WP_ARCHIVES :
				$ret = $this->widget_wparchives_html($item, $echo);
				break;
			case self::WIDGET_WP_CALENDAR :
				$ret = $this->widget_wpcalendar_html($item, $echo);
				break;
			case self::WIDGET_WP_CATEGORIES :
				$ret = $this->widget_wpcategories_html($item, $echo);
				break;
			case self::WIDGET_WP_META :
				$ret = $this->widget_wpmeta_html($item, $echo);
				break;
			case self::WIDGET_WP_PAGES :
				$ret = $this->widget_wppages_html($item, $echo);
				break;
			case self::WIDGET_WP_COMMENTS :
				$ret = $this->widget_wpcomments_html($item, $echo);
				break;
			case self::WIDGET_WP_POSTS :
				$ret = $this->widget_wpposts_html($item, $echo);
				break;
			case self::WIDGET_WP_RSS :
				$ret = $this->widget_wprss_html($item, $echo);
				break;
			case self::WIDGET_WP_SEARCH :
				$ret = $this->widget_wpsearch_html($item, $echo);
				break;
			case self::WIDGET_WP_TAGCLOUD :
				$ret = $this->widget_wptagcloud_html($item, $echo);
				break;
			case self::WIDGET_TITLE_2 : //v1.1.4 add
				$ret = $this->widget_hdtext_html($item, $echo);
				break;
			default :
				//case WIDGET_TEXT and OLD WIDGET_TITLE
				$ret = $this->widget_text_html($item, $echo);
		}
		$content .= $ret;

		if($builderMode) {
			$mode = $subitem ? 's_widget' : 'widget';
			$content .= $this->overlay_html($mode, false);
			$content .= '</div>';
		}		
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = title2 data html
	 * @since 1.1.4
	 * @update
	 * ver1.2
	 * ver1.2.3
	 */
	public function widget_hdtext_html($item, $echo = true) {
		global $wp_embed;
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		//v1.1.4 $style = $this->get_style_attribute($item, true, false);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";

		$titleTag		= !empty($item['title_html_tag']) ? $item['title_html_tag'] : 'h3';

		$linkUrl		= !empty($item['link']['href']) ? trim($item['link']['href']) : '';
		//v1.2 modify
		//$linkTarget 	= !empty($item['link']['target']) ? '_blank' : '';
		//$_linkTarget	= $linkTarget !== '' ? ' target="_blank"' : '';
		$_linkTarget = '';
		if( !empty( $item['link']['target'] ) ) {
			if( $item['link']['target'] == '_blank' ){ $_linkTarget = ' target="_blank"'; }
			elseif( $item['link']['target'] == 'iframe' ) { $_linkTarget = ' data-fancybox-type="iframe" class="fancybox"'; } 
		}
		//v1.2 modify end
		$text = isset( $item['text'] ) ? trim($item['text']) : "";
		if(strstr($text, "[embed") !== false) {
			$text = $wp_embed->run_shortcode($text); //embed shortcode exec
		}

		$titleAlign		= !empty($item['title_align']) ? ' ' . $item['title_align'] : '';
		$titleFont		= !empty($item['title_font']) ? ' ' . $item['title_font'] : '';
		$titleFontSize	= isset($item['title_font_size']) && strlen(trim($item['title_font_size'])) > 0 ? ' font-size:' . trim($item['title_font_size']) . 'px;' : '';
		$titleColor		= isset($item['title_color']) && strlen(trim($item['title_color'])) > 0 ? ' color:' . trim($item['title_color']) . ';' : '';
		$titleWeight	= !empty($item['title_bold']) ? ' font-weight:bold;' : '';
		$titleUnderline	= !empty($item['title_underline']) ? ' text-decoration:underline;' : '';
		$titleItalic	= !empty($item['title_italic']) ? ' font-style:italic;' : '';
		$shadowStyle	= !empty($item['shadow_style']) ? $item['shadow_style'] : '';
		$shadowColor	= !empty($item['shadow_color']) ? $item['shadow_color'] : '';
		$titleShape		= isset($item['title_shape']) && strlen(trim($item['title_shape'])) > 0 ? ' ' . $item['title_shape'] : "";

		//v1.2.3 add
		$titleRadiusSize = isset($item['title_radius_size']) && strlen(trim($item['title_radius_size'])) > 0 ? $item['title_radius_size'] : "";
		//roundの場合のみradius_size有効
		if( $titleShape && $titleRadiusSize ) {
			$titleShape = '';
			$titleRadiusSize = 'border-radius:' . $titleRadiusSize . 'px;';
		}
		//v1.2.3 addend

		$cssId = 'weluka_hdtext_' . Weluka::get_instance()->create_node_id();

		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		$_headBoxStyle = '';
		$responsiveMpData = '';
		$hideClass = $this->get_responsive_hide( $item );
		if( $boxShadowStyle ) {
			$_wrapClass = '';
			if( !$builderMode) { $_wrapClass = ' ' . $hideClass; } //not builder mode
			$style = $this->get_style_attribute($item, true, false, true, false );
			$_wrapStyle = $this->get_style_attribute2( $item );

			$responsiveMpData = $this->get_responsive_mg_pd( $item, true, false, true );
			$_wrapResponsiveMpData = $this->get_responsive_mg_pd( $item, false, true, false );
			if( $_wrapResponsiveMpData ) { $_wrapClass .= ' weluka-responsive-mp'; }
			
			$wrapId = 'weluka_hdtext_wrap' . Weluka::get_instance()->create_node_id();
			$_headBoxStyle = $this->get_boxshadow_style($wrapId, $boxShadowStyle, $boxShadowColor);
			
			//v1.2 _animate add
			$content .= '<div id="' . $wrapId . '" class=" ' . $boxShadowStyle . $_wrapClass . $_animateClass. '" ' . $_wrapStyle . $_wrapResponsiveMpData . $_animateDelay . '>';		
		} else {
			if( !$builderMode) { $cssClass .= ' ' . $hideClass; } //not builder mode
			$style = $this->get_style_attribute($item, true, false);
			$responsiveMpData = $this->get_responsive_mg_pd($item);
		}
	
		$titleBgColor = '';
		$titleBgColor2 = '';
		$titleBgClass = '';
		if( isset($item['title_bg_color']) && strlen(trim($item['title_bg_color'])) > 0 ) {
			$titleBgColor = ' background-color:' . trim($item['title_bg_color']) . ';';
			$titleBgClass = ' weluka-pd-box';
			$titleBgColor2 = trim($item['title_bg_color']);
		}

		//text shadow
		if( $shadowStyle !== '' ) {
			$shadow = $this->text_shadow_styles[ $shadowStyle ];
			$_shadow = 'text-shadow:' . $shadow['offset_v'] . ' ' . $shadow['offset_h'] . ' ' . $shadow['grad'];
			if( $shadowColor !== '') {
				$_shadow .= ' ' . $shadowColor . ';';
			} else {
				$_shadow .= ' ' . $shadow['default_color'] . ';';
			}
			$style .= $_shadow;
		}

		//select_style
		$styleType		= isset($item['style_type']) && strlen(trim($item['style_type'])) > 0 ? $item['style_type'] : "";
		$styleData		= !empty($item['select_style']) ? $item['select_style'] : '';

		$_headStyle = '';
		$val = '';
		if( $styleType === 'weluka-btm-border' ) {
			if( isset($styleData['border_width']) && strlen(trim($styleData['border_width'])) > 0 ) {
				$val = 'border-bottom-width:' . trim($styleData['border_width']) . 'px;';
			}
			if( isset($styleData['border_style']) && strlen(trim($styleData['border_style'])) > 0 ) {
				$val .= 'border-bottom-style:' . trim($styleData['border_style']) . ';';
			}
			if( isset($styleData['border_color']) && strlen(trim($styleData['border_color'])) > 0 ) {
				$val .= 'border-bottom-color:' . trim($styleData['border_color']) . ';';
			}

			if( $val ) { $_headStyle = '#' . $cssId . '.weluka-btm-border{' . $val . '}'; }

		}elseif( $styleType === 'weluka-topbtm-border' ) {
			$topWidth = isset($styleData['top_border_width']) && strlen(trim($styleData['top_border_width'])) > 0 ? trim($styleData['top_border_width']) : '';
			if( $topWidth ) {
				$val = 'border-top-width:' . $topWidth . 'px;';
			}
			$topStyle = isset($styleData['top_border_style']) && strlen(trim($styleData['top_border_style'])) > 0 ? trim($styleData['top_border_style']) : '';
			if( $topStyle ) {
				$val .= 'border-top-style:' . $topStyle . ';';
			}
			$topColor = isset($styleData['top_border_color']) && strlen(trim($styleData['top_border_color'])) > 0 ? trim($styleData['top_border_color']) : '';
			if ( $topColor ) {
				$val .= 'border-top-color:' . $topColor . ';';
			}
			
			if( isset($styleData['btm_border_width']) && strlen(trim($styleData['btm_border_width'])) > 0 ) {
				$val .= 'border-bottom-width:' . trim($styleData['btm_border_width']) . 'px;';
			}elseif( $topWidth ) {
				$val .= 'border-bottom-width:' . $topWidth . 'px;';
			}
			if( isset($styleData['btm_border_style']) && strlen(trim($styleData['btm_border_style'])) > 0 ) {
				$val .= 'border-bottom-style:' . trim($styleData['btm_border_style']) . ';';
			} elseif( $topStyle ) {
				$val .= 'border-bottom-style:' . $topStyle . ';';
			}
			if( isset($styleData['btm_border_color']) && strlen(trim($styleData['btm_border_color'])) > 0 ) {
				$val .= 'border-bottom-color:' . trim($styleData['btm_border_color']) . ';';
			} elseif( $topColor ) {
				$val .= 'border-bottom-color:' . $topColor . ';';
			}

			if( $val ) { $_headStyle = '#' . $cssId . '.weluka-topbtm-border{' . $val . '}'; }

		}elseif( $styleType === 'weluka-left-border' ) {
			if( isset($styleData['border_width']) && strlen(trim($styleData['border_width'])) > 0 ) {
				$val = 'border-left-width:' . trim($styleData['border_width']) . 'px;';
			}
			if( isset($styleData['border_style']) && strlen(trim($styleData['border_style'])) > 0 ) {
				$val .= 'border-left-style:' . trim($styleData['border_style']) . ';';
			}
			if( isset($styleData['border_color']) && strlen(trim($styleData['border_color'])) > 0 ) {
				$val .= 'border-left-color:' . trim($styleData['border_color']) . ';';
			}

			if( $val ) { $_headStyle = '#' . $cssId . '.weluka-left-border{' . $val . '}'; }

		}elseif( $styleType === 'weluka-leftbtm-border' ) {
			if( isset($styleData['left_border_width']) && strlen(trim($styleData['left_border_width'])) > 0 ) {
				$val = 'border-left-width:' . trim($styleData['left_border_width']) . 'px;';
			}
			if( isset($styleData['left_border_style']) && strlen(trim($styleData['left_border_style'])) > 0 ) {
				$val .= 'border-left-style:' . trim($styleData['left_border_style']) . ';';
			}
			if( isset($styleData['left_border_color']) && strlen(trim($styleData['left_border_color'])) > 0 ) {
				$val .= 'border-left-color:' . trim($styleData['left_border_color']) . ';';
			}

			if( isset($styleData['btm_border_width']) && strlen(trim($styleData['btm_border_width'])) > 0 ) {
				$val .= 'border-bottom-width:' . trim($styleData['btm_border_width']) . 'px;';
			}
			if( isset($styleData['btm_border_style']) && strlen(trim($styleData['btm_border_style'])) > 0 ) {
				$val .= 'border-bottom-style:' . trim($styleData['btm_border_style']) . ';';
			}
			if( isset($styleData['btm_border_color']) && strlen(trim($styleData['btm_border_color'])) > 0 ) {
				$val .= 'border-bottom-color:' . trim($styleData['btm_border_color']) . ';';
			}

			if( $val ) { $_headStyle = '#' . $cssId . '.weluka-leftbtm-border{' . $val . '}'; }

		}elseif( $styleType === 'weluka-square-border' ) {
			$topWidth = isset($styleData['top_border_width']) && strlen(trim($styleData['top_border_width'])) > 0 ? trim($styleData['top_border_width']) : '';
			if( $topWidth ) {
				$val = 'border-top-width:' . $topWidth . 'px;';
			}
			$topStyle = isset($styleData['top_border_style']) && strlen(trim($styleData['top_border_style'])) > 0 ? trim($styleData['top_border_style']) : '';
			if( $topStyle ) {
				$val .= 'border-top-style:' . $topStyle . ';';
			}
			$topColor = isset($styleData['top_border_color']) && strlen(trim($styleData['top_border_color'])) > 0 ? trim($styleData['top_border_color']) : '';
			if ( $topColor ) {
				$val .= 'border-top-color:' . $topColor . ';';
			}
			
			if( isset($styleData['btm_border_width']) && strlen(trim($styleData['btm_border_width'])) > 0 ) {
				$val .= 'border-bottom-width:' . trim($styleData['btm_border_width']) . 'px;';
			}elseif( $topWidth ) {
				$val .= 'border-bottom-width:' . $topWidth . 'px;';
			}
			if( isset($styleData['btm_border_style']) && strlen(trim($styleData['btm_border_style'])) > 0 ) {
				$val .= 'border-bottom-style:' . trim($styleData['btm_border_style']) . ';';
			} elseif( $topStyle ) {
				$val .= 'border-bottom-style:' . $topStyle . ';';
			}
			if( isset($styleData['btm_border_color']) && strlen(trim($styleData['btm_border_color'])) > 0 ) {
				$val .= 'border-bottom-color:' . trim($styleData['btm_border_color']) . ';';
			} elseif( $topColor ) {
				$val .= 'border-bottom-color:' . $topColor . ';';
			}

			if( isset($styleData['left_border_width']) && strlen(trim($styleData['left_border_width'])) > 0 ) {
				$val .= 'border-left-width:' . trim($styleData['left_border_width']) . 'px;';
			}elseif( $topWidth ) {
				$val .= 'border-left-width:' . $topWidth . 'px;';
			}
			if( isset($styleData['left_border_style']) && strlen(trim($styleData['left_border_style'])) > 0 ) {
				$val .= 'border-left-style:' . trim($styleData['left_border_style']) . ';';
			} elseif( $topStyle ) {
				$val .= 'border-left-style:' . $topStyle . ';';
			}
			if( isset($styleData['left_border_color']) && strlen(trim($styleData['left_border_color'])) > 0 ) {
				$val .= 'border-left-color:' . trim($styleData['left_border_color']) . ';';
			} elseif( $topColor ) {
				$val .= 'border-left-color:' . $topColor . ';';
			}

			if( isset($styleData['right_border_width']) && strlen(trim($styleData['right_border_width'])) > 0 ) {
				$val .= 'border-right-width:' . trim($styleData['right_border_width']) . 'px;';
			}elseif( $topWidth ) {
				$val .= 'border-right-width:' . $topWidth . 'px;';
			}
			if( isset($styleData['right_border_style']) && strlen(trim($styleData['right_border_style'])) > 0 ) {
				$val .= 'border-right-style:' . trim($styleData['right_border_style']) . ';';
			} elseif( $topStyle ) {
				$val .= 'border-right-style:' . $topStyle . ';';
			}
			if( isset($styleData['right_border_color']) && strlen(trim($styleData['right_border_color'])) > 0 ) {
				$val .= 'border-right-color:' . trim($styleData['right_border_color']) . ';';
			} elseif( $topColor ) {
				$val .= 'border-right-color:' . $topColor . ';';
			}

			if( $val ) { $_headStyle = '#' . $cssId . '.weluka-square-border{' . $val . '}'; }

		}elseif( $styleType === 'weluka-ribbon' ) {
			if( isset($styleData['ribbon_color']) && strlen(trim($styleData['ribbon_color'])) > 0 ) {
				$_headStyle = '#' . $cssId . '.weluka-ribbon:before{border-right-color:' . trim($styleData['ribbon_color']) . '}';
				$_headStyle .= '#' . $cssId . '.weluka-ribbon:after{border-top-color:' . trim($styleData['ribbon_color']) . '}';
			}

		}elseif( $styleType === 'weluka-balloon' ) {
			if( isset($styleData['border_color']) && strlen(trim($styleData['border_color'])) > 0 ) {
				$_headStyle = '#' . $cssId . '.weluka-balloon{border-color:' . trim($styleData['border_color']) . '}';
				$_headStyle .= '#' . $cssId . '.weluka-balloon:before{border-top-color:' . trim($styleData['border_color']) . '}';
			}
			if( $titleBgColor2 ) {
				$_headStyle .= '#' . $cssId . '.weluka-balloon:after{border-top-color:' . $titleBgColor2 . '}';
			}
		}
		
		$responsiveMpData .= isset($item['title_md_font_size']) && strlen(trim($item['title_md_font_size'])) > 0 ? ' data-mdfontsize="' . trim($item['title_md_font_size']) . 'px"' : "";
		$responsiveMpData .= isset($item['title_sm_font_size']) && strlen(trim($item['title_sm_font_size'])) > 0 ? ' data-smfontsize="' . trim($item['title_sm_font_size']) . 'px"' : "";
		$responsiveMpData .= isset($item['title_xs_font_size']) && strlen(trim($item['title_xs_font_size'])) > 0 ? ' data-xsfontsize="' . trim($item['title_xs_font_size']) . 'px"' : "";

		//icon
		$iconType		= !empty($item['icon_type']) ? $item['icon_type'] : '';
		$iconData		= !empty($item['icon']) ? $item['icon'] : '';
		$iconHtml		= '';
		if( !empty( $iconData ) && $iconType ) {
			if( $iconType == self::WIDGET_ICON ) {
				$iconClass = !empty($iconData['icon_class']) ? ' ' . $iconData['icon_class'] : '';
				
				if( $iconClass ) {
					$iconColor = !empty($iconData['icon_color']) ? 'color:' . $iconData['icon_color'] . ';' : '';
					$iconSize = !empty($iconData['icon_size']) ? 'font-size:' . $iconData['icon_size'] . 'px;' : '';
					$iconHtml = '<i class="weluka-title-icon left fa' . $iconClass . '" style="' . $iconColor . $iconSize . '"></i>';

					$responsiveMpData .= isset($iconData['icon_md_size']) && strlen(trim($iconData['icon_md_size'])) > 0 ? ' data-mdiconsize="' . trim($iconData['icon_md_size']) . 'px"' : "";
					$responsiveMpData .= isset($iconData['icon_sm_size']) && strlen(trim($iconData['icon_sm_size'])) > 0 ? ' data-smiconsize="' . trim($iconData['icon_sm_size']) . 'px"' : "";
					$responsiveMpData .= isset($iconData['icon_xs_size']) && strlen(trim($iconData['icon_xs_size'])) > 0 ? ' data-xsiconsize="' . trim($iconData['icon_xs_size']) . 'px"' : "";
				}

			}elseif( $iconType == self::WIDGET_IMG ) {
				$sourceType = !empty($iconData['source_type']) ? $iconData['source_type'] : '';
				$imgSrc = '';
				if($sourceType === "extern") {
					if(isset($iconData['external'])){
						$imgSrc = $iconData['external'];
					}
				}else{
					if(isset($iconData['url'])) {
						$imgSrc = $iconData['url'];
					}
				}

				if( $imgSrc ) {
					$alt = isset($iconData['alt']) ? ' alt="'. esc_attr($iconData['alt']) . '"' : "";
					$imgWidth = isset($iconData['img_width']) ? ' style="width:' . $iconData['img_width'] . 'px;"' : "";
					$iconHtml = '<picture><img class="img-responsive weluka-title-icon left" src="' . $imgSrc. '"' . $alt . $imgWidth . ' /></picture>';

					$responsiveMpData .= isset($iconData['icon_md_size']) && strlen(trim($iconData['icon_md_size'])) > 0 ? ' data-mdiconimgw="' . trim($iconData['icon_md_size']) . 'px"' : "";
					$responsiveMpData .= isset($iconData['icon_sm_size']) && strlen(trim($iconData['icon_sm_size'])) > 0 ? ' data-smiconimgw="' . trim($iconData['icon_sm_size']) . 'px"' : "";
					$responsiveMpData .= isset($iconData['icon_xs_size']) && strlen(trim($iconData['icon_xs_size'])) > 0 ? ' data-xsiconimgw="' . trim($iconData['icon_xs_size']) . 'px"' : "";
				}
			}
		}

		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }

		$resAlign = '';
		$resAlign .= isset($item['title_md_align']) && strlen(trim($item['title_md_align'])) > 0 ? ' ' . $item['title_md_align'] : '';
		$resAlign .= isset($item['title_sm_align']) && strlen(trim($item['title_sm_align'])) > 0 ? ' ' . $item['title_sm_align'] : '';
		$resAlign .= isset($item['title_xs_align']) && strlen(trim($item['title_xs_align'])) > 0 ? ' ' . $item['title_xs_align'] : '';

		//v1.2 add
		if( !$boxShadowStyle ){
			$cssClass .= $_animateClass;
			$responsiveMpData .= $_animateDelay;
		}
		//v1.2 addend
		
		//v1.2.3 $titleRadiusSize add
		$titleHtml = '<' . $titleTag . ' id="' . $cssId . '" class="weluka-hdtext weluka-content' . $class . $titleAlign . $resAlign . $titleBgClass . $titleShape . ' ' . $styleType . $cssClass . '" style="' . $titleFont . $titleFontSize . $titleColor . $titleBgColor . $titleWeight . $titleUnderline . $titleItalic . $style . $titleRadiusSize . '"' . $responsiveMpData . '>';

		$titleHtml .= $iconHtml . $text;
		$titleHtml .= '</' . $titleTag . '>';
		if( $linkUrl !== '' ) {
			$titleHtml = '<a href="' . esc_url($linkUrl) . '"' . $_linkTarget . ' title="' . esc_attr($text) . '">' . $titleHtml . '</a>';
		}

		$content .= $titleHtml;

		if( $_headStyle || $_headBoxStyle) {
       		$content .= '<div class="weluka-hide"><script type="text/javascript">';
			$content .= 'jQuery(document).ready(function($) {';
			$content .= '$("head").append("<style>' . $_headStyle . $_headBoxStyle . '</style>");';
			$content .= '});</script></div>';
		}

		//v1.1.4 add
		if( $boxShadowStyle ) {
			$content .= '</div>';
		}

		$content = stripslashes($content);

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = text or title data html
	 * @since 1.0
	 * @update
	 * ver 1.0.4
	 * ver 1.1.4
	 * ver 1.2
	 * ver 1.2.3
	 */
	public function widget_text_html($item, $echo = true) {
		global $wp_embed;
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item, true, false);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$blockShape = isset($item['block_shape']) && strlen(trim($item['block_shape'])) > 0 ? ' ' . $item['block_shape'] : "";
		$shadowStyle	= !empty( $item['shadow_style'] ) ? $item['shadow_style'] : '';
		$shadowColor	= !empty( $item['shadow_color'] ) ? $item['shadow_color'] : '';

		$text = isset( $item['text'] ) ? trim($item['text']) : "";
		if(strstr($text, "[embed") !== false) {
			$text = $wp_embed->run_shortcode($text); //embed shortcode exec
		}

		//text shadow
		if( $shadowStyle !== '' ) {
			$shadow = $this->text_shadow_styles[ $shadowStyle ];
			$_shadow = 'text-shadow:' . $shadow['offset_v'] . ' ' . $shadow['offset_h'] . ' ' . $shadow['grad'];
			if( $shadowColor !== '') {
				$_shadow .= ' ' . $shadowColor . ';';
			} else {
				$_shadow .= ' ' . $shadow['default_color'] . ';';
			}
			$style .= $_shadow;
		}

		//v1.0.4 add
		$cssId = 'weluka_text_' . Weluka::get_instance()->create_node_id();

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_borderSize	= isset($item['border_size']) && strlen(trim($item['border_size'])) > 0 ? $item['border_size'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor, $_borderSize );
		//v1.1.4 addend

		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode		
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.2.3 add
		$blockRadiusSize = isset($item['block_radius_size']) && strlen(trim($item['block_radius_size'])) > 0 ? $item['block_radius_size'] : "";
		if( $blockShape && $blockRadiusSize ) {
			$blockShape = '';
			$style .= 'border-radius:' . $blockRadiusSize . 'px;';
		}
		//v1.2.3 addend

		//$content .= '<div ' . $cssId . ' class="weluka-text weluka-content' . $class . $blockShape . $cssClass . '" style="' . $style . '">';
		//v1.1.4 boxShadowStyle Add
		//v1.2 animation... add
		$content .= '<div id="' . $cssId . '" class="weluka-text weluka-content' . $class . $blockShape . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" style="' . $style . '"' . $responsiveMpData . $_animateDelay . '>';
		$content .= $text;
		//v1.1.4 add
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';

		$content = stripslashes($content);

		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = img data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.2
	 * ver1.1.4
	 * ver1.2
	 * ver1.2.3
	 */
	public function widget_img_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$sourceType = isset($item['source_type']) && strlen(trim($item['source_type'])) > 0 ? $item['source_type'] : "media";
		$style = $this->get_style_attribute($item, false);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$fitWidth = isset($item['fitwidth']) && strlen(trim($item['fitwidth'])) > 0 ? ' weluka-img-fullwidth' : "";
		
		//add v1.2.7
		$lazyload      = '';
		$dataAttribute = '';
		if(!empty($item['lazyload'])){
			$lazyload      = ' lazyload';
			$dataAttribute = !$builderMode ? 'data-' : '';
		}
		
		$borderSize	= isset($item['border_size']) && strlen(trim($item['border_size'])) > 0 ? $item['border_size'] . 'px' : '';
		$borderStyle= isset($item['border_style']) && strlen(trim($item['border_style'])) > 0 ? $item['border_style'] : 'solid';
		$borderColor= isset($item['border_color']) && strlen(trim($item['border_color'])) > 0 ? $item['border_color'] : '#dddddd';
		
		$_imgStyle = '';
		$border = '';		
		if($borderSize !== '') {
			//v1.2.3 modify
			//$border = ' style= "border:' . $borderSize . ' ' . $borderStyle . ' ' . $borderColor . ' !important;"';
			$border = 'border:' . $borderSize . ' ' . $borderStyle . ' ' . $borderColor . ' !important;';
		}

		$src = "";
		
		if($sourceType === "extern") {
			//外部画像
			if(isset($item['external'])){
				$src = $item['external'];
			}
		}else{
			if(isset($item['url'])) {
				$src = $item['url'];
			}
		}
		$alt = isset($item['alt']) ? ' alt="'. esc_attr($item['alt']) . '"' : "";
		$width = isset($item['width']) ? ' width="'. $item['width'] . '"' : "";
		$height = isset($item['height']) ? ' height="'. $item['height'] . '"' : "";
		$shape = isset($item['shape']) && strlen(trim($item['shape'])) > 0 ? ' ' . $item['shape'] : "";

		//v1.2.3 add
		$radiusSize = isset($item['radius_size']) && strlen(trim($item['radius_size'])) > 0 ? trim($item['radius_size']) : "";
		if( $shape == ' img-rounded' && $radiusSize ) {
			$shape = '';
			$radiusSize = 'border-radius:' . $radiusSize . 'px;';
		}
		if( $border || $radiusSize ) {
			$_imgStyle = ' style="' . $border . $radiusSize . '"';
		}
		//v1.2.3 addend

		//v1.0.4 add
		$cssId = 'weluka_img_' . Weluka::get_instance()->create_node_id();

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style($cssId . ' > .weluka-boxshadow-wrap', $boxShadowStyle, $boxShadowColor);
		//v1.1.4 addend

		if( !$builderMode ) { $class .= ' ' . $this->get_responsive_hide($item); } //not builder mode		
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $class .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.2 add
		$class .= isset($item['md_align']) && strlen(trim($item['md_align'])) > 0 ? ' ' . $item['md_align'] : '';
		$class .= isset($item['sm_align']) && strlen(trim($item['sm_align'])) > 0 ? ' ' . $item['sm_align'] : '';
		$class .= isset($item['xs_align']) && strlen(trim($item['xs_align'])) > 0 ? ' ' . $item['xs_align'] : '';
		//v1.1.2 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxShadiowStyle add
		//v1.2 animate関連 add
		$content .= '<div id="' . $cssId . '" class="weluka-img weluka-content' . $class . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		if( $boxShadowStyle ) {
			$_inb = '';
			if( ! $fitWidth ) { $_inb = ' weluka-inline-block'; }
			$content .= '<div class="weluka-boxshadow-wrap ' . $boxShadowStyle . $_inb . '">';
		}

		//v1.2.3 modify
		//$img = '<img class="img-responsive' . $shape . $cssClass . $fitWidth . '" src="' . $src. '"' . $width . $height . $alt . $border . ' />';
		$img = '<img class="img-responsive' . $shape . $cssClass . $fitWidth . $lazyload . '" ' .$dataAttribute. 'src="' . $src. '"' . $width . $height . $alt . $_imgStyle . ' />';

		if(!empty($item['link']) && isset($item['link']['href']) && $item['link']['href'] !== "") {
			$item['link']['title'] = isset($item['alt']) ? $item['alt'] : "";
			$item['link']['content'] = $img;
			$content .= $this->link_html($item['link'], false);
		}else{
			$content .= $img;
		}

		//v1.1.4 add
		$content .= $this->add_head_style_js( $_headBoxStyle );
		if( $boxShadowStyle ) { $content .= '</div>'; }

		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = button data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 * ver1.2.3
	 */
	public function widget_button_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$text = isset($item['text']) && strlen(trim($item['text'])) > 0 ? $item['text'] : "BUTTON";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : '';
		$style = $this->get_style_attribute($item);
		//v1.1.4 $color = !empty($item['button_color']) ? ' ' . $item['button_color'] : " weluka-btn-default";
		$color = !empty($item['button_color']) ? ' ' . $item['button_color'] : "";
		$shape = !empty($item['shape']) ? ' ' . $item['shape'] : '';
		$size = !empty($item['size']) ? ' ' . $item['size'] : '';
		$block = !empty($item['block']) ? ' btn-block' : '';
		$link = !empty($item['link']) ? $item['link'] : array( "action"	=> "", "href" => "#", "target" => "");
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";

		$cssId = 'weluka_btn_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $class .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $class .= ' weluka-responsive-mp'; }

		//v1.1.4 add
		$cssId2 = 'weluka_btn_alink_' . Weluka::get_instance()->create_node_id();
		$btnStyle = '';
		$btnStyle	.= !empty($item['font']) ? $item['font'] : '';
		$btnStyle	.= isset($item['font_size']) && strlen(trim($item['font_size'])) > 0 ? 'font-size:' . trim($item['font_size']) . 'px;' : '';
		$btnStyle	.= !empty($item['bold']) ? 'font-weight:bold;' : '';
		$btnStyle	.= !empty($item['underline']) ? 'text-decoration:underline;' : '';
		$btnStyle	.= !empty($item['italic']) ? 'font-style:italic;' : '';
		$btnStyle	.= isset($item['custom_base_color']) && strlen(trim($item['custom_base_color'])) > 0 ? 'background-color:' . trim($item['custom_base_color']) . ' !important;' : '';
		$btnStyle	.= isset($item['custom_text_color']) && strlen(trim($item['custom_text_color'])) > 0 ? 'color:' . trim($item['custom_text_color']) . ' !important;' : '';
		$btnStyle	.= isset($item['custom_border_color']) && strlen(trim($item['custom_border_color'])) > 0 ? 'border-color:' . trim($item['custom_border_color']) . ' !important;' : '';
		$btnStyle	.= isset($item['custom_border_size']) && strlen(trim($item['custom_border_size'])) > 0 ? 'border-width:' . trim($item['custom_border_size']) . 'px;' : '';
		$btnStyle	.= isset($item['padding_inwrap_top']) && strlen(trim($item['padding_inwrap_top'])) > 0 ? 'padding-top:' . trim($item['padding_inwrap_top']) . 'px;' : '';
		$btnStyle	.= isset($item['padding_inwrap_bottom']) && strlen(trim($item['padding_inwrap_bottom'])) > 0 ? 'padding-bottom:' . trim($item['padding_inwrap_bottom']) . 'px;' : '';
		$btnStyle	.= isset($item['padding_inwrap_left']) && strlen(trim($item['padding_inwrap_left'])) > 0 ? 'padding-left:' . trim($item['padding_inwrap_left']) . 'px;' : '';
		$btnStyle	.= isset($item['padding_inwrap_right']) && strlen(trim($item['padding_inwrap_right'])) > 0 ? 'padding-right:' . trim($item['padding_inwrap_right']) . 'px;' : '';

		$shadowStyle	= !empty( $item['shadow_style'] ) ? $item['shadow_style'] : '';
		$shadowColor	= !empty( $item['shadow_color'] ) ? $item['shadow_color'] : '';
		//text shadow
		if( $shadowStyle !== '' ) {
			$shadow = $this->text_shadow_styles[ $shadowStyle ];
			$_shadow = 'text-shadow:' . $shadow['offset_v'] . ' ' . $shadow['offset_h'] . ' ' . $shadow['grad'];
			if( $shadowColor !== '') {
				$_shadow .= ' ' . $shadowColor . ';';
			} else {
				$_shadow .= ' ' . $shadow['default_color'] . ';';
			}
			$btnStyle .= $_shadow;
		}

		$hoverStyle = '';		
		if( isset($item['custom_hvbase_color']) && strlen(trim($item['custom_hvbase_color'])) > 0 ) {
			$hoverStyle .= 'background-color:' . trim($item['custom_hvbase_color']) . ' !important;';
		}
		if( isset($item['custom_hvtext_color']) && strlen(trim($item['custom_hvtext_color'])) > 0 ) {
			$hoverStyle .= 'color:' . trim($item['custom_hvtext_color']) . ' !important;';
		}
		if( isset($item['custom_hvborder_color']) && strlen(trim($item['custom_hvborder_color'])) > 0 ) {
			$hoverStyle .= 'border-color:' . trim($item['custom_hvborder_color']) . ' !important;';
		}
		if( isset($item['custom_hvborder_size']) && strlen(trim($item['custom_hvborder_size'])) > 0 ) {
			$hoverStyle .= 'border-width:' . trim($item['custom_hvborder_size']) . 'px;';
		}
		$btnStyle 	.= !empty($item['hide_border']) ? 'border:none !important;' : "";
		if( $btnStyle ) {
			$btnStyle = 'a#' . $cssId2 . '{' . $btnStyle . '}';
		}
		if( $hoverStyle ) {
			$btnStyle .= 'a#' . $cssId2 . ':hover,';
			$btnStyle .= 'a#' . $cssId2 . ':focus,';
			$btnStyle .= 'a#' . $cssId2 . '.focus,';
			$btnStyle .= 'a#' . $cssId2 . ':active{' . $hoverStyle . '}';
		}
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style('a#' . $cssId2, $boxShadowStyle, $boxShadowColor);
		$btnStyle .= $_headBoxStyle;

		$class .= isset($item['md_align']) && strlen(trim($item['md_align'])) > 0 ? ' ' . $item['md_align'] : '';
		$class .= isset($item['sm_align']) && strlen(trim($item['sm_align'])) > 0 ? ' ' . $item['sm_align'] : '';
		$class .= isset($item['xs_align']) && strlen(trim($item['xs_align'])) > 0 ? ' ' . $item['xs_align'] : '';

		$responsiveMpData2 = '';
		$responsiveMpData2 .= isset($item['font_md_size']) && strlen(trim($item['font_md_size'])) > 0 ? ' data-mdfontsize="' . trim($item['font_md_size']) . 'px"' : "";
		$responsiveMpData2 .= isset($item['font_sm_size']) && strlen(trim($item['font_sm_size'])) > 0 ? ' data-smfontsize="' . trim($item['font_sm_size']) . 'px"' : "";
		$responsiveMpData2 .= isset($item['font_xs_size']) && strlen(trim($item['font_xs_size'])) > 0 ? ' data-xsfontsize="' . trim($item['font_xs_size']) . 'px"' : "";

		$t = isset($item["padding_md_inwrap_top"]) && strlen(trim($item["padding_md_inwrap_top"])) > 0 ? trim($item["padding_md_inwrap_top"]) : '';
		$r = isset($item["padding_md_inwrap_right"]) && strlen(trim($item["padding_md_inwrap_right"])) > 0 ? trim($item["padding_md_inwrap_right"]) : '';
		$b = isset($item["padding_md_inwrap_bottom"]) && strlen(trim($item["padding_md_inwrap_bottom"])) > 0 ? trim($item["padding_md_inwrap_bottom"]) : '';
		$l = isset($item["padding_md_inwrap_left"]) && strlen(trim($item["padding_md_inwrap_left"])) > 0 ? trim($item["padding_md_inwrap_left"]) : '';
		$u = isset($item["padding_md_inwrap_unit"]) && strlen(trim($item["padding_md_inwrap_unit"])) > 0 ? trim($item["padding_md_inwrap_unit"]) : 'px';
		if( $t != '' || $r != '' || $b != '' || $l != '' ) {
			$responsiveMpData2 .= ' data-mdp-inwrap="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
		}
		$t = isset($item["padding_sm_inwrap_top"]) && strlen(trim($item["padding_sm_inwrap_top"])) > 0 ? trim($item["padding_sm_inwrap_top"]) : '';
		$r = isset($item["padding_sm_inwrap_right"]) && strlen(trim($item["padding_sm_inwrap_right"])) > 0 ? trim($item["padding_sm_inwrap_right"]) : '';
		$b = isset($item["padding_sm_inwrap_bottom"]) && strlen(trim($item["padding_sm_inwrap_bottom"])) > 0 ? trim($item["padding_sm_inwrap_bottom"]) : '';
		$l = isset($item["padding_sm_inwrap_left"]) && strlen(trim($item["padding_sm_inwrap_left"])) > 0 ? trim($item["padding_sm_inwrap_left"]) : '';
		$u = isset($item["padding_sm_inwrap_unit"]) && strlen(trim($item["padding_sm_inwrap_unit"])) > 0 ? trim($item["padding_sm_inwrap_unit"]) : 'px';
		if( $t != '' || $r != '' || $b != '' || $l != '' ) {
			$responsiveMpData2 .= ' data-smp-inwrap="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
		}
		$t = isset($item["padding_xs_inwrap_top"]) && strlen(trim($item["padding_xs_inwrap_top"])) > 0 ? trim($item["padding_xs_inwrap_top"]) : '';
		$r = isset($item["padding_xs_inwrap_right"]) && strlen(trim($item["padding_xs_inwrap_right"])) > 0 ? trim($item["padding_xs_inwrap_right"]) : '';
		$b = isset($item["padding_xs_inwrap_bottom"]) && strlen(trim($item["padding_xs_inwrap_bottom"])) > 0 ? trim($item["padding_xs_inwrap_bottom"]) : '';
		$l = isset($item["padding_xs_inwrap_left"]) && strlen(trim($item["padding_xs_inwrap_left"])) > 0 ? trim($item["padding_xs_inwrap_left"]) : '';
		$u = isset($item["padding_xs_inwrap_unit"]) && strlen(trim($item["padding_xs_inwrap_unit"])) > 0 ? trim($item["padding_xs_inwrap_unit"]) : 'px';
		if( $t != '' || $r != '' || $b != '' || $l != '' ) {
			$responsiveMpData2 .= ' data-xsp-inwrap="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
		}
		if( $responsiveMpData2 ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.1.4 add end
		
		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );
		//v1.2 animation... add
		$content .= '<div id="' . $cssId . '" class="weluka-button weluka-content' . $class . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		
		$href = "#";
		$target = "";
		if($link['action'] === self::LINK_ACTION_GOTOLINK){
			$href = $link["href"];
			//v1.2 modify $target = strlen($link['target']) > 0 ? ' target="' . $link['target'] . '"' : "";
			$target = '';
			if( !empty( $link['target'] ) ) {
				if( $link['target'] == '_blank' ){ $target = ' target="_blank"'; }
				elseif( $link['target'] == 'iframe' ) { $target = ' data-fancybox-type="iframe"'; $cssClass .= ' fancybox'; } 
			}
		}
		
		//v1.2.3 add
		$_style = '';
		$radiusSize = !empty($item['radius_size']) ? trim($item['radius_size']) : '';
		if( !$shape && $radiusSize ) {
			$_style = ' style="border-radius:' . $radiusSize . 'px;"';
		}
		//v1.2.3 adend
		
		//v1.1.4 boxShadowStyle add
		//v1.2.3 _style add
		$content .= '<a id="' . $cssId2 . '" href="' . $href . '"' . $target . ' class="weluka-btn' . $color . $size . $block . $shape . ' ' . $boxShadowStyle . $cssClass . '" ' . $responsiveMpData2 . $_style . '>' . $text . '</a>';
		$content .= '</div>';
		
		//v1.1.4 add
		if( $btnStyle ) {
			$content .= '<div class="weluka-hide"><style>' . $btnStyle . '</style></div>';
		}

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = movie data html
	 * @since 1.0
	 * wp media
	 * youtube
	 * vimeo
	 * dailymotion
	 * niconico
	 * vine
	 * anitube
	 * fc2
	 * xvides
	 * redtube
	 * xhamster
	 * pornhub
	 *
	 * @update
	 * ver1.1.1
	 * ver1.1.4
	 * ver1.2
	 * ver1.2.9.1
	 */
	public function widget_movie_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$url = isset($item['url']) && strlen(trim($item['url'])) > 0 ? trim($item['url']) : ""; //self::DEFAULT_MOVIE_URL;
		$sourceType = isset($item['source_type']) ? $item['source_type'] : 'youtube';		
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : '';
		//v1.2.9.1 add
		//v1.2.9.2 modify
		//v1.2.9.3 modify
		$item['width'] = isset($item['width']) && strlen(trim($item['width'])) > 0 ?  $item['width'] : 'dummyflex';


		$style = $this->get_style_attribute($item);
		$style = str_replace('dummyflexpx', '100%', $style);
		//v1.2.9.1 addend

		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		
		$embedOptions = array();
		$embedOptions['noTitle']	= isset($item['display_notitle']) && strlen(trim($item['display_notitle'])) > 0 ? $item['display_notitle'] : "";
		$embedOptions['noCtrl']		= isset($item['display_nocontrol']) && strlen(trim($item['display_nocontrol'])) > 0 ? $item['display_nocontrol'] : "";
		$embedOptions['noAuthor']	= isset($item['display_noauthor']) && strlen(trim($item['display_noauthor'])) > 0 ? $item['display_noauthor'] : "";
		$embedOptions['noLogo']		= isset($item['display_nologo']) && strlen(trim($item['display_nologo'])) > 0 ? $item['display_nologo'] : "";
		$embedOptions['noRelated']	= isset($item['display_norelated']) && strlen(trim($item['display_norelated'])) > 0 ? $item['display_norelated'] : "";
		$embedOptions['autoPlay']	= isset($item['autoplay']) ? $item['autoplay'] : "";
		$embedOptions['loop']		= isset($item['loop']) ? $item['loop'] : "";

		//v1.1.1 add
		$embedOptions['posterUrl']	= isset($item["poster"]["full"]["url"]) && strlen(trim($item["poster"]["full"]["url"])) > 0 ? trim( $item["poster"]["full"]["url"] ) : '';
		$embedOptions['wpAutoPlay']	= isset($item['wpautoplay']) ? $item['wpautoplay'] : "";
		$embedOptions['wpLoop']		= isset($item['wploop']) ? $item['wploop'] : "";
		//v1.1.1 addend
		
		$_id = !empty($item['id']) ? $item['id'] : Weluka::get_instance()->create_node_id();
		$movieId = 'weluka-movie-' . $_id;

		if($url === "") {
			$src = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please setting movie content', Weluka::$settings['plugin_name']) . '</div>';
		}else{
			//script tag
			$url = str_replace(array('{SCRIPT}', '{/SCRIPT}'), array('<script', '</script'), $url);
			$src = $this->get_movie_src($url, $builderMode, $sourceType, $movieId, $embedOptions);
		}

		//v1.0.4 add
		$cssId = 'weluka_movie_' . Weluka::get_instance()->create_node_id();

		//v1.2.9.1 add
		$cssWrapperId = 'weluka_movie_wrapper_' . Weluka::get_instance()->create_node_id();
		
		$resClass = '';
		if( !$builderMode) { $resClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $resClass .= ' weluka-responsive-mp'; }

		$class .= isset($item['md_align']) && strlen(trim($item['md_align'])) > 0 ? ' ' . $item['md_align'] : '';
		$class .= isset($item['sm_align']) && strlen(trim($item['sm_align'])) > 0 ? ' ' . $item['sm_align'] : '';
		$class .= isset($item['xs_align']) && strlen(trim($item['xs_align'])) > 0 ? ' ' . $item['xs_align'] : '';
		$class = str_replace(
			array('weluka-text','weluka-mdtext','weluka-smtext','weluka-xstext'),
			array('weluka-movie-flex', 'weluka-mdmovie-flex', 'weluka-smmovie-flex', 'weluka-xsmovie-flex'),
			$class
		); 
		//v1.2.9.1 addend
		
		//v1.0.4 addend
		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style($cssId, $boxShadowStyle, $boxShadowColor);
		//v1.1.4 addend
		
		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.2.9.1 add
		$content .= '<div id="' . $cssWrapperId . '" class="weluka-movie-parent-wrapper weluka-movie-flexbox' . $class . '">';
		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-movie-wrapper weluka-content' . ' ' . $boxShadowStyle . $resClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		
		$mClass = "weluka-movie";
		if(strpos($url, "<script") !== false && !$builderMode) {
			$mClass = "weluka-movie-2";	
		}
		
		$ptop = "";
		if($sourceType === 'media') {
			//$ptop = ' style="padding-top:0;"';
			$ptop = ' style="padding:0; height:100%;"';
			$src = str_replace(array("\r\n","\n","\r"), '', stripslashes($src)); //改行があるとbrが挿入される
		}
		
		//v1.2.9.1 remove $class
		$content .= '<div id="' . $movieId . '" class="' . $mClass  . $cssClass . '"' . $ptop . '>';

		$content .= $src;
		$content .= '</div>';
		//v1.1.4 add
		$content .= $this->add_head_style_js( $_headBoxStyle );

		$content .= '</div>';
		$content .= '</div>'; // end of weluka-movie-parent-wrapper add v1.2.9.1

		if(strpos($url, "<script") === false) {
			$content = stripslashes($content);
		}

		if($builderMode && $this->get_property("render_post_result") !== true && $sourceType === 'media') {
        	$content .= '<div class="weluka-hide"><script type="text/javascript">';
			$content .= 'jQuery(document).ready(function($) { $("#' . $movieId . '").find(".wp-video-shortcode").mediaelementplayer(); $("#' . $movieId . ' br").remove(); }); </script></div>';
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * create movie embed src html
	 * @since 1.0
	 * @update
	 * ver 1.0.3
	 * ver 1.1.1
	 * ver 1.2.4.3
	 */
	public function get_movie_src( $url, $builderMode, $type = 'youtube', $objId = "", $options = null ) {
		$ret = "";

		if($type === 'youtube'){
			if(strpos($url, "<iframe") !== false) {
				//iframe
				$ret = $url;				
			//}elseif (preg_match('/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"\'>]+)/', $url, $movieId)) { v1.0.3
			}elseif ( preg_match('/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"\'>]+)/', $url, $movieId) ||
			          preg_match('/^(?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"\'>]+)/', $url, $movieId) ) {
				// $_noTitle	= is_array($options) && isset($options['noTitle']) && $options['noTitle'] ? 'showinfo=0' : ''; //obsolete v1.2.9.1
				$_noCtrl	= is_array($options) && isset($options['noCtrl']) && $options['noCtrl'] ? 'controls=0' : '';
				$_noRelated	= is_array($options) && isset($options['noRelated']) && $options['noRelated'] ? 'rel=0' : '';
				$_auto		= is_array($options) && isset($options['autoPlay']) && $options['autoPlay'] ? 'autoplay=1' : '';
//v1.1.1 modify
//				$_loop		= is_array($options) && isset($options['loop']) && $options['loop'] ? 'loop=1' : '';
				$_loop		= is_array($options) && isset($options['loop']) && $options['loop'] ? 'loop=1&playlist=' . $movieId[1] : '';
				
				// add v1.2.8 for iOS
				$param = '';
				//obsolete v1.2.9.1
				// if($_noTitle){ $param = '?' . $_noTitle; } 
				if($_noCtrl){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_noCtrl;
				}
				if($_noRelated){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_noRelated;
				}
				if($_auto && !$builderMode){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_auto;
				}
				if($_loop && !$builderMode){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_loop;
				}
				//add v1.2.8 for iOS
				//add allow attribute v1.2.9.1 
				if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
				$param .= 'playsinline=1';
				$src = 'https://www.youtube.com/embed/' . $movieId[1] . $param;
				$ret =
				'<iframe src="' . $src . 
				'" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen"' . 
				'frameborder="0" scrolling="no"' . 
				'allow="autoplay; gyroscope; picture-in-picture"></iframe>';
			}
		}elseif($type === 'media') {
			$attr = array(
				'src'		=> set_url_scheme($url),
				'preload'	=> 'none'
			);
			//v1.1.1 add
			if( is_array($options) && isset($options['posterUrl']) && $options['posterUrl'] ) { $attr['poster'] =  str_replace(array("http:", "https:"), '', $options['posterUrl'] ); }
			if( !$builderMode && is_array($options) && isset($options['wpAutoPlay']) && $options['wpAutoPlay'] ) { $attr['autoplay'] = 'on'; }
			if( !$builderMode && is_array($options) && isset($options['wpLoop']) && $options['wpLoop'] ) { $attr['loop'] = 'on'; }
			//v1.1.1 addend
			$ret = wp_video_shortcode($attr);
			//add v1.2.8
			$ret = str_replace('<video', '<video webkit-playsinline playsinline', $ret);
		}elseif($type === 'vimeo') {
			if(strpos($url, "<iframe") !== false) {
				//iframe
				$ret = $url;				
			//}elseif (preg_match("/(?:https?:\/\/)?(?:www\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $url, $movieId)) { v1.0.3
			}elseif ( preg_match("/(?:http(?:s)?:\/\/)?(?:www\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $url, $movieId) ||
			          preg_match("/(?:\/\/)?(?:www\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $url, $movieId) ) {
				//url or link url
				$_noTitle	= is_array($options) && isset($options['noTitle']) && $options['noTitle'] ? 'title=0' : '';
				$_noAuthor	= is_array($options) && isset($options['noAuthor']) && $options['noAuthor'] ? 'byline=0' : '';
				$_auto		= is_array($options) && isset($options['autoPlay']) && $options['autoPlay'] ? 'autoplay=1' : '';
				$_loop		= is_array($options) && isset($options['loop']) && $options['loop'] ? 'loop=1' : '';
				$param = '';
				if($_noTitle){ $param = '?' . $_noTitle; }
				if($_noAuthor){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_noAuthor;
				}
				if($_auto && !$builderMode){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_auto;
				}
				if($_loop && !$builderMode){
					if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
					$param .= $_loop;
				}

				$src = 'https://player.vimeo.com/video/' . $movieId[3] . $param;
				$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no" allow="autoplay; fullscreen"></iframe>';
			}
		}elseif($type === 'dailymotion') {
			if(strpos($url, "<iframe") !== false) {
				//iframe
				$ret = $url;
			}else{
				//url or permalink
				$movieId = explode("_", basename($url));
				if(is_array($movieId) && strlen($movieId[0]) > 0) {
					$_noTitle	= is_array($options) && isset($options['noTitle']) && $options['noTitle'] ? 'info=0' : ''; //title and auther
					$_noLogo	= is_array($options) && isset($options['noLogo']) && $options['noLogo'] ? 'logo=0' : '';
					$_noRelated	= is_array($options) && isset($options['noRelated']) && $options['noRelated'] ? 'related=0' : '';
					$_auto		= is_array($options) && isset($options['autoPlay']) && $options['autoPlay'] ? 'autoplay=1' : '';
					$param = '';
					if($_noTitle){ $param = '?' . $_noTitle; }
					if($_noLogo){
						if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
						$param .= $_noLogo;
					}
					if($_noRelated){
						if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
						$param .= $_noRelated;
					}
					if($_auto && !$builderMode){
						if(strpos($param, "?") === false){ $param .= '?'; }else{ $param .= '&'; }
						$param .= $_auto;
					}

					$src = '//www.dailymotion.com/embed/video/' . $movieId[0] . $param;
					$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
				}
			}
		}elseif($type === 'niconico'){
			if(strpos($url, "<script") !== false) {
				if($builderMode) {
        			$ret = '<div class="weluka-hide"><script type="text/javascript">';
					$ret .= 'jQuery(document).ready(function($) {';
					$ret .= 'var iframe = document.createElement("iframe");';
					$ret .= 'document.getElementById("' . $objId . '").appendChild(iframe);';
					$ret .= 'var doc = iframe.contentWindow.document;';
					$ret .= "doc.open();";
					$ret .= "doc.write('<html><head><\/head><body>" . str_replace("</", "<\/", $url) . "<\/body><\/html>');";
					$ret .= "doc.close();";
					$ret .= '});</script></div>';
  					//$ret .= iframe.setAttribute("style", "display:none");
				}else{
					$ret = $url;
				}
			}else{
				//URL チャンネル登録動画 or 共有埋め込みiframeのsrc url
				$movieId = basename($url);
				if($movieId !== ''){
					//$src = Weluka::$settings['plugin_url'] . 'includes/niconico.php?id=' . $movieId;
					$ret =
					'<iframe src="https://embed.nicovideo.jp/watch/' . $movieId .
					'?oldScript=1&referer=&from=0&allowProgrammaticFullScreen=1" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no" allow="autoplay"></iframe>';
				}
			}
		}else{ //other
			//xvideos
			if(strpos($url, "xvideos") !== false) {
				if(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				}else{
					//$urlSplit = explode("/", str_replace(array("http://", "https://"), "", $url)); v1.0.3
					$urlSplit = explode("/", str_replace(array("http://", "https://", "//"), "", $url));
					if(is_array($urlSplit) && strlen($urlSplit[1]) > 0) {
						//get video id
						$movieId = str_replace("video", "", $urlSplit[1]);
						$src = '//flashservice.xvideos.com/embedframe/' . $movieId;
						$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
					}
				}
			}elseif(strpos($url, "pornhub") !== false) {	//pornhub
				if(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				}else{
					$movieId = explode("viewkey=", basename($url));
					if(is_array($movieId) && strlen($movieId[1]) > 0) {
						//get video id
						$src = '//www.pornhub.com/embed/' . $movieId[1];
						$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
					}
				}
			}elseif(strpos($url, "redtube") !== false) {	//pornhub
				if(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				}else{
					$movieId = basename($url);
					if($movieId !== '') {
						//get video id
						$src = '//embed.redtube.com/?id=' . $movieId;
						$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
					}
				}
			}elseif(strpos($url, "xhamster") !== false) {
				if(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				}else{
					//$movieId = explode("/", str_replace(array("http://", "https://"), "", $url)); v1.0.3
					$movieId = explode("/", str_replace(array("http://", "https://", "//"), "", $url));
					if(is_array($movieId) && strlen($movieId[2]) > 0) {
						$src = '//xhamster.com/xembed.php?video=' . $movieId[2];
						$ret = '<iframe src="' . $src . '" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="allowfullscreen" frameborder="0" scrolling="no"></iframe>';
					}
				}
			}else{
				if(strpos($url, "<script") !== false) {
					if($builderMode) {
        				$ret = '<div class="weluka-hide"><script type="text/javascript">';
						$ret .= 'jQuery(document).ready(function($) {';
						$ret .= 'var iframe = document.createElement("iframe");';
						$ret .= 'document.getElementById("' . $objId . '").appendChild(iframe);';
						$ret .= 'var doc = iframe.contentWindow.document;';
						$ret .= "doc.open();";
						$ret .= "doc.write('<html><head><\/head><body>" . str_replace("</", "<\/", $url) . "<\/body><\/html>');";
						$ret .= "doc.close();";
						$ret .= '});</script></div>';
					}else{
						$ret = $url;
					}
				}elseif(strpos($url, "<iframe") !== false) {
					//iframe
					$ret = $url;
				
				//v1.2.4.3 else block add 
				}else{
					//video or other
					$ret = $url;
				}
				// v1.2.4.3 addend
			}
		}
		return $ret;
	}

	/**
	 * builder item type = audio data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_audio_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$sourceType = isset($item['source_type']) && strlen(trim($item['source_type'])) > 0 ? $item['source_type'] : 'media';
		$url = isset($item['url']) && strlen(trim($item['url'])) > 0 ? set_url_scheme($item['url']) : "";
		$title = isset($item['title']) && strlen(trim($item['title'])) > 0 ? $item['title'] : "";
		$autoplay = isset($item['autoplay']) && strlen(trim($item['autoplay'])) > 0 ? $item['autoplay'] : '';
		$loop = isset($item['loop']) && strlen(trim($item['loop'])) > 0 ? $item['loop'] : '';		
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : '';
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$audioId = 'weluka-audio-' . $item['id'];
		
		$audio = "";
		if($url === "") {
			$audio = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please setting audio content', Weluka::$settings['plugin_name']) . '</div>';
		}else{
			//$src = 'src="' . $url . '"';
			$_auto = false;
			$_loop = false;
            if (!$builderMode) { //not builder mode
			/*
                if($autoplay == 'on') { $_auto = ' autoplay="on"'; }
                if($loop == 'on'){ $_loop = ' loop="on"'; }
			*/
                if($autoplay == 'on') { $_auto = true; }
                if($loop == 'on'){ $_loop = true; }
            }
            //$audio = '[audio '. $src . $_auto . $_loop . ']';
			$attr = array(
				'src'      => $url,
				'loop'     => $_loop,
				'autoplay' => $_auto,
				'preload' => 'none'
			);
			$audio = wp_audio_shortcode($attr);
		}
		
		//v1.0.4 add
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style($audioId, $boxShadowStyle, $boxShadowColor);
		//v1.1.4 addend
		
		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxshadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $audioId . '" class="weluka-audio weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $audio;
		//v1.1.4 add
		$content .= $this->add_head_style_js( $_headBoxStyle );
		
		$content .= '</div>';

		$content =  str_replace(array("\r\n","\n","\r"), '', stripslashes($content));

		if($builderMode && $this->get_property("render_post_result") !== true) {
			//$content = do_shortcode($content);
        	$content .= '<div class="weluka-hide"><script type="text/javascript">';
			$content .= 'jQuery(document).ready(function($) { $("#' . $audioId . '").find(".wp-audio-shortcode").mediaelementplayer(); }); </script></div>';
		}
		//$this->set_property("render_post_result", false);
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = appphorline data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.2
	 */
	public function widget_apphorline_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		//TODO $lineClass = isset($item['line_class']) && strlen(trim($item['line_class'])) > 0 ? ' ' . $item['line_class'] : "";
		$style = $this->get_style_attribute($item, false, false);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . trim( $item['cssClass'] ) : "";
		$lineStyle = !empty($item['line_style']) ? ' ' .$item['line_style'] : " solid";
		$lineWidth = isset($item['line_width']) && strlen(trim($item['line_width'])) > 0 ? trim( $item['line_width'] ) . 'px' : "3px";
		$lineColor = isset($item['line_color']) && strlen(trim($item['line_color'])) > 0 ? ' ' . trim( $item['line_color'] ) : " #cccccc";

		$borderBtm	= ' border-bottom:' . $lineWidth . $lineStyle . $lineColor . ';';
		$mg			= $builderMode ? ' margin: 5px 0;' : "";
		$style = ' style="' . $style . $borderBtm . $mg . '"';

		//v1.0.4 add
		$cssId = 'weluka_apphorline_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//$content = '<div class="weluka-horline weluka-content' . $class . $cssClass . '" ' . $style . '></div>';
		//v1.2 animate... add
		$content = '<div id="' . $cssId . '" class="weluka-horline weluka-content' . $class . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '></div>';

		//$content = stripslashes($content);
		
		//if($builderMode) {
		//	$content = do_shortcode($content);
		//}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = apppalert data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_appalert_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$alertClass = isset($item['alert_class']) && strlen(trim($item['alert_class'])) > 0 ? ' ' . $item['alert_class'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$close = isset($item['close_button']) && strlen(trim($item['close_button'])) > 0 ? '<a href="#" class="close weluka-noscroll" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>' : "";
		$shape = isset($item['shape']) && strlen(trim($item['shape'])) > 0 ? ' ' . $item['shape'] : "";

		//v1.0.4 add
		$cssId = 'weluka_appalert_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style($cssId, $boxShadowStyle, $boxShadowColor);
		//v1.1.4 addend
		
		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 add boxShadowStyle
		//v1.2 animate... add fade in remove
		//$content = '<div id="' . $cssId . '" class="weluka-alert weluka-content alert fade in' . $class . ' ' . $boxShadowStyle . $alertClass . $shape . $cssClass . '" ' . $style . $responsiveMpData . '>';
		$content = '<div id="' . $cssId . '" class="weluka-alert weluka-content alert' . $class . ' ' . $boxShadowStyle . $alertClass . $shape . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $close;
		$content .= $item['text'];
		//v1.1.4 add
		$content .= $this->add_head_style_js( $_headBoxStyle );

		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = gmap data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_gmap_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$shape = isset($item['shape']) && strlen(trim($item['shape'])) > 0 ? ' ' . $item['shape'] : "";
		$addr = isset($item['addr']) && strlen(trim($item['addr'])) > 0 ? $item['addr'] : "";
		$url = isset($item['url']) && strlen(trim($item['url'])) > 0 ? $item['url'] : "";
		$mapW = isset($item['map_w']) && strlen(trim($item['map_w'])) > 0 ? $item['map_w'] : "100%";
		$mapH = isset($item['map_h']) && strlen(trim($item['map_h'])) > 0 ? $item['map_h'] : "300";
		$zoom = isset($item['zoom']) && strlen(trim($item['zoom'])) > 0 ? $item['zoom'] : 16;
		$lat = isset($item['lat']) && strlen(trim($item['lat'])) > 0 ? $item['lat'] : "";
		$lng = isset($item['lng']) && strlen(trim($item['lng'])) > 0 ? $item['lng'] : "";
		$info = isset($item['info']) && strlen(trim($item['info'])) > 0 ? $item['info'] : "";
		$staticw = isset($item['staticw']) && strlen(trim($item['staticw'])) > 0 ? $item['staticw'] : "";
		$draggable = !empty($item['draggable']) ? 0 : 1;
		$styleJson = isset($item['style_json']) && strlen(trim($item['style_json'])) > 0 ? str_replace(array("\r\n","\n","\r", " ", "\t"), '', trim(strip_tags($item['style_json']))) : "";

		if($styleJson) {
			$styleJson = str_replace(array("[", "]", '"'), array("$", "~", "%"), $styleJson);
		}
		$sh = sprintf('[%s addr="%s" url="%s" w="%s" h="%s" z="%s" lat="%s" lng="%s" info="%s" staticw="%s" stylejson="%s" draggable="%s"]',
					$this->gmap_shortcode_tag, $addr, $url , $mapW, $mapH, $zoom, $lat, $lng, $info, $staticw, $styleJson, $draggable
			  ); 

		//v1.0.4 add
		$cssId = 'weluka_gmap_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_borderSize	= isset($item['border_size']) && strlen(trim($item['border_size'])) > 0 ? $item['border_size'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor, $_borderSize );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.2 animate... add
		$content = '<div id="' . $cssId . '" class="weluka-gmap weluka-content' . $class . $shape . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= do_shortcode($sh); //do_shortcode(stripslashes($sh));
		//v1.1.4 add
		if( $_headBoxStyle ) {
			$content .= $this->add_head_style_js( $_headBoxStyle );
		}
		//v1.1.4 addend
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = icon data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.2
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_icon_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item, false);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$iconClass = isset($item['icon_class']) && strlen(trim($item['icon_class'])) > 0 ? ' ' . $item['icon_class'] : "fa-camera";
		$iconSize = isset($item['icon_size']) && strlen(trim($item['icon_size'])) > 0 ? ' font-size:' . trim($item['icon_size']) . 'px;' : " font-size:32px;";
		$iconColor = isset($item['icon_color']) && strlen(trim($item['icon_color'])) > 0 ? ' color:' . trim($item['icon_color']) . ';' : " color:#666666;";
		$link = !empty($item['link']) ? $item['link'] : array( "action"	=> "", "href" => "#", "target" => "");

		//v1.1.2 add
		$class .= isset($item['md_align']) && strlen(trim($item['md_align'])) > 0 ? ' ' . $item['md_align'] : '';
		$class .= isset($item['sm_align']) && strlen(trim($item['sm_align'])) > 0 ? ' ' . $item['sm_align'] : '';
		$class .= isset($item['xs_align']) && strlen(trim($item['xs_align'])) > 0 ? ' ' . $item['xs_align'] : '';
		//v1.1.2 addend

		//v1.1.4 add
		$shadowStyle	= !empty($item['shadow_style']) ? $item['shadow_style'] : '';
		$shadowColor	= !empty($item['shadow_color']) ? $item['shadow_color'] : '';
		//text shadow
		$_shadow = '';
		if( $shadowStyle !== '' ) {
			$shadow = $this->text_shadow_styles[ $shadowStyle ];
			$_shadow = 'text-shadow:' . $shadow['offset_v'] . ' ' . $shadow['offset_h'] . ' ' . $shadow['grad'];
			if( $shadowColor !== '') {
				$_shadow .= ' ' . $shadowColor . ';';
			} else {
				$_shadow .= ' ' . $shadow['default_color'] . ';';
			}
		}
		//v1.1.4 addend

		//v1.0.4 add
		$cssId = 'weluka_icon_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		
		$responsiveMpData = '';
		$responsiveMpData = $this->get_responsive_mg_pd($item);

		$responsiveMpData .= isset($item['icon_md_size']) && strlen(trim($item['icon_md_size'])) > 0 ? ' data-mdiconsize="' . trim($item['icon_md_size']) . 'px"' : "";
		$responsiveMpData .= isset($item['icon_sm_size']) && strlen(trim($item['icon_sm_size'])) > 0 ? ' data-smiconsize="' . trim($item['icon_sm_size']) . 'px"' : "";
		$responsiveMpData .= isset($item['icon_xs_size']) && strlen(trim($item['icon_xs_size'])) > 0 ? ' data-xsiconsize="' . trim($item['icon_xs_size']) . 'px"' : "";
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );
		//v1.2 animate... add
		$content = '<div id="' . $cssId . '" class="weluka-icon weluka-content' . $class . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		//v1.1.4 _shadow add
		$icon = '<i class="fa ' . $iconClass . '" style="' . $iconSize . $iconColor . $_shadow. '"></i>';

		if(!empty($item['link']) && isset($item['link']['href']) && $item['link']['href'] !== "") {
			$item['link']['title'] = "";
			$item['link']['content'] = $icon;
			$content .= $this->link_html($item['link'], false);
		}else{
			$content .= $icon;
		}

		$content .= '</div>';

		$content = stripslashes($content);
		
		//if($builderMode) {
		//	$content = do_shortcode($content);
		//}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = slide data html
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.4
	 * ver1.0.7
	 * ver1.1.3
	 * ver1.1.4
	 * ver1.2
	 * ver1.2.3
	 * ver1.2.3.1
	 * ver1.2.4
	 */
	public function widget_slide_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item, false);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$blockShape = isset($item['block_shape']) && strlen(trim($item['block_shape'])) > 0 ? ' ' . $item['block_shape'] : "";

		$borderSize	= isset($item['border_size']) && strlen(trim($item['border_size'])) > 0 ? $item['border_size'] . 'px' : '';
		$borderStyle= isset($item['border_style']) && strlen(trim($item['border_style'])) > 0 ? $item['border_style'] : 'solid';
		$borderColor= isset($item['border_color']) && strlen(trim($item['border_color'])) > 0 ? $item['border_color'] : '#dddddd';
		
		$_imgStyle = '';
		$border = '';
		if($borderSize !== '') {
			//v1.2.3 modify
			//$border = ' style= "border:' . $borderSize . ' ' . $borderStyle . ' ' . $borderColor . ';"';
			$border = 'border:' . $borderSize . ' ' . $borderStyle . ' ' . $borderColor . ';';
		}
		//v1.2.3 add
		$radiusSize = isset($item['block_radius_size']) && strlen(trim($item['block_radius_size'])) > 0 ? trim($item['block_radius_size']) : "";
		if( $blockShape && $radiusSize ) {
			$blockShape = '';
			$radiusSize = 'border-radius:' . $radiusSize . 'px;';
		}
		if( $border || $radiusSize ) {
			$_imgStyle = ' style="' . $border . $radiusSize . '"';
		}
		//v1.2.3 addend

		$slideSize = isset($item['slide_size']) && strlen(trim($item['slide_size'])) > 0 ? $item['slide_size'] : "full";

		$slideOption = "";
						
		$slide = "";
		$cssId = 'weluka_slide_' . Weluka::get_instance()->create_node_id(); //v1.1.3 move
		$_headBoxStyle = ''; //v1.1.4 add
		if(isset($item["slides"][0]) && $item["slides"][0]["attachment_id"] === '') {
			$slide = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please setting slide content', Weluka::$settings['plugin_name']) . '</div>';
		}else{
			$ct = "";
			$protocols = array("http:", "https:");

			$effect			= empty($item['slide_effect']) ? $this->slide_effects['fade'] : $item['slide_effect'];
			$directionNav	= empty($item['direction_nav']) ? 0 : $item['direction_nav'];
			if($builderMode){ $directionNav = 0; }
			$pagingNav		= empty($item['paging_nav']) ? 0 : $item['paging_nav'];
			$autoSlide		= empty($item['auto_slide']) ? 0 : $item['auto_slide'];
			if($builderMode){ $autoSlide = 0; }
			$slideLoop		= empty($item['slide_loop']) ? 0 : $item['slide_loop'];
			$slideshowMsec	= empty($item['slideshow_msec']) ? 7000 : trim($item['slideshow_msec']);
			$animationSpeed	= empty($item['animation_msec']) ? 600 : trim($item['animation_msec']);
			$smoothHeight	= 1;
			$random			= 0;

			//v1.2.4 add
			$slideType				= empty($item['slide_type']) ? 'basic' : $item['slide_type'];
			$slideThumbDispnum		= isset($item['slide_thumb_dispnum']) && strlen(trim($item['slide_thumb_dispnum'])) > 0 ? $item['slide_thumb_dispnum'] : 6;
			$slideThumbDispnumSm	= isset($item['slide_thumb_dispnum_sm']) && strlen(trim($item['slide_thumb_dispnum_sm'])) > 0 ? $item['slide_thumb_dispnum_sm'] : 4;
			$slideThumbDispnumXs	= isset($item['slide_thumb_dispnum_xs']) && strlen(trim($item['slide_thumb_dispnum_xs'])) > 0 ? $item['slide_thumb_dispnum_xs'] : 3;
			$slideThumbMargin		= isset($item['slide_thumb_margin']) && strlen(trim($item['slide_thumb_margin'])) > 0 ? $item['slide_thumb_margin'] : 5;
			$slideThumbMarginTop	= isset($item['slide_thumb_margin_top']) && strlen(trim($item['slide_thumb_margin_top'])) > 0 ? 'margin-top:' . $item['slide_thumb_margin_top'] . 'px;' : 'margin-top:5px;';
			$thumbCt			= '';
			$thumbWidthDefault	= '210';
			//v1.2.4  add end
			
			//ver1.0.1 add
			$directionNavColorStyle	='';
			if( isset($item['direction_nav_color']) && trim($item['direction_nav_color']) !== '' ) {
				//v1.1.3 cssId add
				$directionNavColorStyle = '#' . $cssId . ' .flex-direction-nav a:before { color: ' . trim($item['direction_nav_color']) . '; }';
			}
			$pagingNavColorStyle	='';
			if( isset($item['paging_nav_color']) && trim($item['paging_nav_color']) !== '' ) {
				//v1.1.3 cssId add
				$pagingNavColorStyle = '#' . $cssId . ' .flex-control-paging li a { background: ' . trim($item['paging_nav_color']) . '; filter:alpha(opacity=50); -moz-opacity:0.50; opacity:0.50; }';
				$pagingNavColorStyle .= '#' . $cssId . ' .flex-control-paging li a:hover { background:' . trim($item['paging_nav_color']) . '; filter:alpha(opacity=70); -moz-opacity:0.70; opacity:0.70; }';
				$pagingNavColorStyle .= '#' . $cssId . ' .flex-control-paging li a.flex-active { background:' . trim($item['paging_nav_color']) . '; filter:alpha(opacity=100); -moz-opacity:1; opacity:1; }';
			}
			//ver1.0.1 addend

			//v1.1.4 add
			$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
			$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
			$_headBoxStyle = $this->get_boxshadow_style($cssId . ' > .weluka-slide-obj', $boxShadowStyle, $boxShadowColor);
			//v1.1.4 addend
			
			$direction = 'horizontal';
			if($effect === $this->slide_effects['slideh']) {
				$effect = 'slide';
				//$direction = 'horizontal';
			} /*elseif($effect === $this->slide_effects['slidev']) {
				$effect = 'slide';
				$direction = 'vertical';
			}*/
			
			foreach($item['slides'] as $data){
				$flgDescription	= isset($data['flg_description']) && $data['flg_description'] ? true : false;
				$description	= isset($data['description']) ? trim($data['description']) : '';
				$descriptionPos	= isset($data['description_position']) ? $data['description_position'] : 'bottom';
				$descTextColor	= isset($data['description_text_color']) &&  trim($data['description_text_color']) !== '' ? 'color:' . trim($data['description_text_color']) . ';' : '';
				$descBgColor	= isset($data['description_bg_color']) && trim($data['description_bg_color']) !== '' ? 'background-color:' . trim($data['description_bg_color']) . ';' : '';
				$linkUrl		= isset($data['link']['href']) ? trim($data['link']['href']) : '';
				//v1.2 modify
				//$linkTarget		= isset($data['link']['target']) && $data['link']['target'] ? ' target="_blank"' : '';

				//ver1.0.1 add
				$descPdTop		= isset($data['description_pd_top']) &&  trim($data['description_pd_top']) !== '' ? 'padding-top:' . trim($data['description_pd_top']) . 'px;' : '';
				$descPdBottom	= isset($data['description_pd_bottom']) &&  trim($data['description_pd_bottom']) !== '' ? 'padding-bottom:' . trim($data['description_pd_bottom']) . 'px;' : '';
				$descPdLeft		= isset($data['description_pd_left']) &&  trim($data['description_pd_left']) !== '' ? 'padding-left:' . trim($data['description_pd_left']) . 'px;' : '';
				$descPdRight	= isset($data['description_pd_right']) &&  trim($data['description_pd_right']) !== '' ? 'padding-right:' . trim($data['description_pd_right']) . 'px;' : '';

				$descW			= isset($data['description_width']) &&  trim($data['description_width']) !== '' ? trim($data['description_width']) : '';
				$descWUnit		= isset($data['description_width_unit']) &&  trim($data['description_width_unit']) !== '' ? trim($data['description_width_unit']) : 'par';
				if( $descWUnit === 'par' ) { $descWUnit = '%'; }
				$descWStyle = '';
				if( !empty( $descW ) ) { $descWStyle = 'width:' . $descW . $descWUnit . ';'; }

				$textShadowStyle	= !empty( $data['description_text_shadow_style'] ) ? $data['description_text_shadow_style'] : '';
				$textShadowColor	= !empty( $data['description_text_shadow_color'] ) ? $data['description_text_shadow_color'] : '';
				$shadowStyle = '';
				if( $textShadowStyle !== '' ) {
					$shadow = $this->text_shadow_styles[ $textShadowStyle ];
					$_shadow = 'text-shadow:' . $shadow['offset_v'] . ' ' . $shadow['offset_h'] . ' ' . $shadow['grad'];
					if( $textShadowColor !== '') {
						$_shadow .= ' ' . $textShadowColor . ';';
					} else {
						$_shadow .= ' ' . $shadow['default_color'] . ';';
					}
					$shadowStyle .= $_shadow;
				}
				//ver1.0.1 addend
				
				$src = isset($data['full']['url']) ? $data['full']['url'] : '';
				if($slideSize === 'thumbnail' && isset($data['thumbnail']['url']) && strlen($data['thumbnail']['url']) > 0) {
					$src = $data['thumbnail']['url'];
				}elseif($slideSize === 'medium' && isset($data['medium']['url']) && strlen($data['medium']['url']) > 0) {
					$src = $data['medium']['url'];
				}elseif($slideSize === 'large' && isset($data['large']['url']) && strlen($data['large']['url']) > 0) {
					$src = $data['large']['url'];
				}
				$src = str_replace($protocols, '', $src);
				
				//v1.2
				$linkTarget = '';
				if( !empty( $data['link']['target'] ) ) {
					if( $data['link']['target'] == '_blank' ){ $linkTarget = ' target="_blank"'; }
					elseif( $data['link']['target'] == 'iframe' ) { $linkTarget = ' data-fancybox-type="iframe" class="fancybox"'; } 
					elseif( $data['link']['target'] == 'zoom' ) {
						$linkTarget = ' class="fancybox"';
						$linkUrl = $src;
					} 
				}
				//v1.2 modify end

				//main slide
				$ct .= '<li class="weluka-slide-item">';
				if($linkUrl !== '') {
					$ct .= '<a href="' . esc_url($linkUrl) . '" ' . $linkTarget . '>';
				}
				//v1.2.3 modify
				//$ct .= '<img src="' . $src . '" class="' . $blockShape . '" ' . $border . ' />';
				$ct .= '<img src="' . $src . '" class="' . $blockShape . '" ' . $_imgStyle . ' />';
				if($linkUrl !== '') {
					$ct .= '</a>';
				}
				//description
				if($flgDescription && $description !== '') {
					//ver 1.0.1
					//$ct .= '<div class="weluka-slide-description-' . $descriptionPos . ' hidden-xs" style="' . $descTextColor . $descBgColor . '">';
					$ct .= '<div class="weluka-slide-description weluka-slide-description-' . $descriptionPos . ' hidden-xs" style="' . $descTextColor . $descBgColor . $descPdTop . $descPdBottom . $descPdLeft . $descPdRight . $descWStyle . $shadowStyle . '">';
					$ct .= $description;
					$ct .= '</div>';
				}
				$ct .= '</li>';
				//end main slide

				//v1.2.4 add thumbnail and carousel
				if( $slideType == 'thumb' ) {
					$thumbSrc = $src; //v1.2.4 add	
					if(isset($data['thumbnail']['url']) && strlen($data['thumbnail']['url']) > 0) {
						$thumbSrc = $data['thumbnail']['url'];
					}elseif(isset($data['medium']['url']) && strlen($data['medium']['url']) > 0) {
						$thumbSrc = $data['medium']['url'];
					}elseif(isset($data['large']['url']) && strlen($data['large']['url']) > 0) {
						$thumbSrc = $data['large']['url'];
					}
					$thumbSrc = str_replace($protocols, '', $thumbSrc);

					$thumbCt .= '<li class="weluka-slide-thumb-item">';
					$thumbCt .= '<img src="' . $thumbSrc . '" class="' . $blockShape . '" ' . $_imgStyle . ' />';
					$thumbCt .= '</li>';
				}
				//v1.2.4 addend thumbnail and carousel
				
			}
			
			//v1.2.3 add
			if( is_numeric( $slideshowMsec ) && is_numeric( $animationSpeed ) ) {
				$slideshowMsec = $slideshowMsec + $animationSpeed;
			}
			//v1.2.3 addend

			//v1.2.4 add and modify
			$slideCssId = 'weluka-slide-' . $item['id'];
			if( $slideType === 'thumb') {
				//v1.2.4 add thumbnail slide
				$thumbCssId = 'weluka-slide-' . Weluka::get_instance()->create_node_id();
				$slide = '<div class="weluka-thumb-slide-wrapper">';

				//main slide
				$slide .= '<div id="' . $slideCssId . '" class="weluka-slide-obj flexslider ' . $boxShadowStyle . '">';
				if( $directionNavColorStyle || $pagingNavColorStyle ) {
					$slide .= '<div class="weluka-hide"><style>' . $directionNavColorStyle . ' ' . $pagingNavColorStyle . '</style></div>';
				}
				$slide .= '<ul class="slides clearfix">';
				$slide .= $ct;
				$slide .= '</ul>';
				$slide .= '</div>';
				//end main slide

				//thumbnail
				$slide .= '<div id="' . $thumbCssId . '" class="weluka-slide-thumb-obj flexslider ' . $boxShadowStyle . '" style="' . $slideThumbMarginTop . '">';
				$slide .= '<ul class="slides clearfix">';
				$slide .= $thumbCt;
				$slide .= '</ul>';
				$slide .= '</div>';
				$slide .= '</div>';
				//end thumbnail

				$slide .= '<div class="weluka-hide"><script type="text/javascript">';
				$slide .= 'jQuery(document).ready(function($) { ';

        	    $slide .= 'var welukaSliderObj3 = $(".weluka-slide-thumb-obj#' . $thumbCssId . '");';
            	$slide .= 'if (welukaSliderObj3.data("flexslider")) { welukaSliderObj3.flexslider("destroy"); }';

				$slide .= 'var $window = $(window), flexslider = { vars:{} };';
				$slide .= 'function getWelukaSlideGridSize' . $item['id'] . '() {';
    			$slide .= 'return (window.innerWidth <= 767) ? ' . $slideThumbDispnumXs . ' : ';
           		$slide .= '(window.innerWidth <= 991) ? ' . $slideThumbDispnumSm . ' : ' . $slideThumbDispnum . '; }';

            	$slide .= 'welukaSliderObj3.flexslider({';
            	$slide .= 'animation: "slide",';
            	$slide .= 'slideshow: false,'; // . $autoSlide .  ',';
				$slide .= 'animationLoop: false,'; //. $slideLoop . ',';
            	$slide .= 'controlNav: false,'; //pagin nav not display
            	$slide .= 'directionNav: ' . $directionNav . ',';
            	$slide .= 'smoothHeight: ' . $smoothHeight . ',';
				$slide .= 'touch: true,';
				$slide .= 'pauseOnHover: true,';
            	$slide .= 'keyboard: true,';
            	$slide .= 'useCSS: false,';
            	$slide .= 'itemWidth: ' . $thumbWidthDefault . ',';
            	$slide .= 'itemMargin: ' . $slideThumbMargin . ',';
    			$slide .= 'asNavFor: "#' . $slideCssId . '",';
				$slide .= 'minItems: getWelukaSlideGridSize' .  $item['id'] . '(),';
      			$slide .= 'maxItems: getWelukaSlideGridSize' .  $item['id'] . '()';
        	    $slide .= '});';

				$slide .= '$window.resize(function() {';
    			$slide .= 'var gridSize = getWelukaSlideGridSize' .  $item['id'] . '();';
 				$slide .= 'flexslider.vars.minItems = gridSize;';
    			$slide .= 'flexslider.vars.maxItems = gridSize;';
  				$slide .= '});';
				
        	    $slide .= 'var welukaSliderObj2 = $(".weluka-slide-obj#' . $slideCssId . '");';
            	$slide .= 'if (welukaSliderObj2.data("flexslider")) { welukaSliderObj2.flexslider("destroy"); }';
				$slide .= 'welukaSliderObj2.css("margin-bottom", 0);';
            	$slide .= 'welukaSliderObj2.flexslider({';
            	$slide .= 'animation: "' . $effect . '",';
				$slide .= 'direction: "' . $direction . '",';
            	$slide .= 'slideshow: ' . $autoSlide .  ',';
				$slide .= 'animationLoop: ' . $slideLoop . ',';
            	$slide .= 'controlNav: false,'; //pagin nav not display
            	$slide .= 'directionNav: ' . $directionNav . ',';
            	$slide .= 'slideshowSpeed: ' . $slideshowMsec . ',';
            	$slide .= 'animationSpeed: ' . $animationSpeed . ',';
            	$slide .= 'smoothHeight: ' . $smoothHeight . ',';
				$slide .= 'randomize: ' . $random . ',';
				$slide .= 'touch: true,';
				$slide .= 'pauseOnHover: true' . ',';
            	$slide .= 'keyboard: true,';
            	$slide .= 'useCSS: false,';
            	$slide .= 'sync: "#' . $thumbCssId . '"';
				if( $slideLoop ) {
 					$slide .= ',before: function(slider){';         
            		$slide .= 'if(slider.currentSlide == 0 && slider.direction == "prev"){';
                	$slide .= 'var carousel = $(slider.vars.sync).data("flexslider");';
                	$slide .= 'carousel.flexAnimate(carousel.last);';
					$slide .= 'carousel.find(".weluka-slide-thumb-item.flex-active-slide").removeClass("flex-active-slide");';
					$slide .= 'carousel.find("li.weluka-slide-thumb-item:last-child").addClass("flex-active-slide");';
            		$slide .= '}else if( slider.currentSlide == slider.last && slider.direction == "next"){';
                	$slide .= 'var carousel = $(slider.vars.sync).data("flexslider");';
                	$slide .= 'carousel.flexAnimate(0);';
					$slide .= 'carousel.find(".weluka-slide-thumb-item.flex-active-slide").removeClass("flex-active-slide");';
					$slide .= 'carousel.find("li.weluka-slide-thumb-item:first-child").addClass("flex-active-slide"); }}';
				}

        	    $slide .= '});';
            	$slide .= '});';

			} elseif( $slideType === 'carousel' ) {
				//v1.2.4 add carousel
				$slide = '<div id="' . $slideCssId . '" class="weluka-slide-obj flexslider ' . $boxShadowStyle . '">';
				if( $directionNavColorStyle || $pagingNavColorStyle ) {
					$slide .= '<div class="weluka-hide"><style>' . $directionNavColorStyle . ' ' . $pagingNavColorStyle . '</style></div>';
				}
						
				$slide .= '<ul class="slides clearfix">';
				$slide .= $ct;
				$slide .= '</ul>';
				$slide .= '</div>';

				$slide .= '<div class="weluka-hide"><script type="text/javascript">';
				$slide .= 'jQuery(document).ready(function($) { ';
        	    $slide .= 'var welukaSliderObj = $(".weluka-slide-obj#' . $slideCssId . '");';
            	$slide .= 'if (welukaSliderObj.data("flexslider")) { welukaSliderObj.flexslider("destroy"); }';
				$slide .= 'if (!' . $pagingNav . ') { welukaSliderObj.css("margin-bottom", 0); } ';

				$slide .= 'var $window = $(window), flexslider = { vars:{} };';
				$slide .= 'function getWelukaSlideGridSize' . $item['id'] . '() {';
    			$slide .= 'return (window.innerWidth <= 767) ? ' . $slideThumbDispnumXs . ' : ';
           		$slide .= '(window.innerWidth <= 991) ? ' . $slideThumbDispnumSm . ' : ' . $slideThumbDispnum . '; }';

            	$slide .= 'welukaSliderObj.flexslider({';
            	$slide .= 'animation: "slide",'; //. $effect . '",'; only slide
				//$slide .= 'direction: "' . $direction . '",';
            	$slide .= 'slideshow: ' . $autoSlide .  ',';
				$slide .= 'animationLoop: ' . $slideLoop . ',';
            	$slide .= 'controlNav: ' . $pagingNav . ',';
            	$slide .= 'directionNav: ' . $directionNav . ',';
            	$slide .= 'slideshowSpeed: ' . $slideshowMsec . ',';
            	$slide .= 'animationSpeed: ' . $animationSpeed . ',';
            	$slide .= 'smoothHeight: ' . $smoothHeight . ',';
				$slide .= 'randomize: ' . $random . ',';
				$slide .= 'touch: true,';
				$slide .= 'pauseOnHover: true' . ',';
            	$slide .= 'keyboard: true,';
            	$slide .= 'useCSS: false,';
            	$slide .= 'itemWidth: ' . $thumbWidthDefault . ',';
            	$slide .= 'itemMargin: ' . $slideThumbMargin . ',';
				$slide .= 'minItems: getWelukaSlideGridSize' .  $item['id'] . '(),';
      			$slide .= 'maxItems: getWelukaSlideGridSize' .  $item['id'] . '()';
        	    $slide .= '});';

				$slide .= '$window.resize(function() {';
    			$slide .= 'var gridSize = getWelukaSlideGridSize' .  $item['id'] . '();';
 				$slide .= 'flexslider.vars.minItems = gridSize;';
    			$slide .= 'flexslider.vars.maxItems = gridSize;';
  				$slide .= '});';

            	$slide .= '});';
				
			} else {
				//basic
				//v1.1.4 boxShadowStyle add
				$slide = '<div id="' . $slideCssId . '" class="weluka-slide-obj flexslider ' . $boxShadowStyle . '">';
				//ver1.0.1 add
				if( $directionNavColorStyle || $pagingNavColorStyle ) {
					$slide .= '<div class="weluka-hide"><style>' . $directionNavColorStyle . ' ' . $pagingNavColorStyle . '</style></div>';
				}
				//ver1.0.1 addend
						
				$slide .= '<ul class="slides clearfix">';
				$slide .= $ct;
				$slide .= '</ul>';
				$slide .= '</div>';

				$slide .= '<div class="weluka-hide"><script type="text/javascript">';
				$slide .= 'jQuery(document).ready(function($) { ';
        	    $slide .= 'var welukaSliderObj = $(".weluka-slide-obj#' . $slideCssId . '");';
            	$slide .= 'if (welukaSliderObj.data("flexslider")) { welukaSliderObj.flexslider("destroy"); }';
				$slide .= 'if (!' . $pagingNav . ') { welukaSliderObj.css("margin-bottom", 0); } ';
            	$slide .= 'welukaSliderObj.flexslider({';
            	$slide .= 'animation: "' . $effect . '",';
				$slide .= 'direction: "' . $direction . '",';
            	$slide .= 'slideshow: ' . $autoSlide .  ',';
				$slide .= 'animationLoop: ' . $slideLoop . ',';
            	$slide .= 'controlNav: ' . $pagingNav . ',';
            	$slide .= 'directionNav: ' . $directionNav . ',';
            	$slide .= 'slideshowSpeed: ' . $slideshowMsec . ',';
            	$slide .= 'animationSpeed: ' . $animationSpeed . ',';
            	$slide .= 'smoothHeight: ' . $smoothHeight . ',';
				$slide .= 'randomize: ' . $random . ',';
				//$slide .= 'pauseOnAction: false,';
				$slide .= 'touch: true,';	//v1.1.4
				$slide .= 'pauseOnHover: true' . ',';
            	$slide .= 'keyboard: true,';
            	$slide .= 'useCSS: false';	//v1.0.7 add
/* debug
				$slide .= 'start: function(slider){ clearInterval(slider.animatedSlides); slider.animatedSlides = setInterval(slider.animateSlides, 4000); },';
				$slide .= 'after: function(slider){ clearInterval(slider.animatedSlides); slider.animatedSlides = setInterval(slider.animateSlides, 7000); }';
*/
        	    $slide .= '});';
            	$slide .= '});';
			}

			//v1.2.3.1 smooth heigh init height 0 bugfix
			$slide .= 'jQuery(window).on("load", function() { ';
        	//$slide .= 'var welukaSliderObj = jQuery(".weluka-slide-obj#' . $slideCssId . '");';
			$slide .= 'jQuery(".weluka-slide-obj#' . $slideCssId . '").each( function() { ';
    		$slide .= 'jQuery(window).resize();return false;';
  			$slide .= '});});';
			//v1.2.3.1 addend
			
			$slide .= '</script></div>';
		}
		
		//v1.0.4 add
		//v1.1.3 move $cssId = 'weluka_slide_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );
		//v1.2 animate... add
		$content = '<div id="' . $cssId . '" class="weluka-slide weluka-content' . $class . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $slide;
		//v1.1.4 add
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';


		$content = stripslashes($content);
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = sns_button data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.2
	 * ver1.3
	 */
	public function widget_snsbutton_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		
		//add v1.2.6 because widget item name is different builder item name. 
		$class = $class === "" && isset($item['class']) && strlen(trim($item['class'])) > 0 ? ' ' . $item['class'] : $class;
		$style = $this->get_style_attribute($item, false);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";

		//TODO pro version
		$direction = "h";
		//$commonSize = isset($item['common_size']) && strlen(trim($item['common_size'])) > 0 ? $item['common_size'] : "";

//			"icon_round"	=> '<span class="weluka-sns-round weluka-facebook-round {TEXT_ON}" {STYLE}><i class="fa fa-facebook"></i>{TEXT}</span>',


		$ct = "";
		//v1.2.5 add
		$uniqID =  Weluka::get_instance()->create_node_id();
		if(isset($item["buttons"]) && is_array($item["buttons"])) {
			$wrapClass = $direction === "h" ? 'weluka-sns-button-horizontal' : 'weluka-sns-button-vertical';
			$ct .= '<ul class="weluka-sns-button-wrapper ' . $wrapClass . '">';
			foreach($item['buttons'] as $data) :
				$name = $data['name'];
				$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
				$icon = $this->sns_buttons[$name][$iconType];
				//TODO pro version
				//$iconStyle = "";
				//$text = "";
				//$iconSize = isset($data['size']) && strlen(trim($item['size'])) > 0 ? $data['size'] : "";
				//if($iconSize !== ""){
				//	$iconStyle = 'font-size:' . $iconSize . ';';
				//}
				//$sizeStyle = $commonSize !== "" ? ' style="font-size:' . $commonSize . 'px;"' : "";

				$iconStyle = "";
				$url = isset($data['url']) && strlen(trim($data['url'])) > 0 ? $data['url'] : "#";
				$text = isset($data['text']) && strlen(trim($data['text'])) > 0 ? $data['text'] : "";
				$textOnClass ="";
				if($text !== "") {
					//v1.2.5 modify 
					$btntextID   = $name."_".$uniqID;
					$contetStyle = '<style>#'.$btntextID.':before{content:"'.$text.'"}</style>';
					$text = $contetStyle.'<span id="'.$btntextID.'" class="text"></span>';
					$textOnClass = "weluka-sns-ontext";
				}

				//v1.3 add and modify
				if( $name == "twitter" ) {
					$ximg = '<img src="' . Weluka::$settings['plugin_url'] . 'assets/img/x-white.png" alt="x" width="22" height="22" class="weluka-x-icon" />'; 
					$reps = array("{TEXT_ON}", "{STYLE}", "{IMG}", "{TEXT}");
					$repTarget = array($textOnClass, $iconStyle, $ximg, $text);
					$icon = str_replace($reps, $repTarget, $icon);
					$atitle = "X";
				} else {
					$reps = array("{TEXT_ON}", "{STYLE}", "{TEXT}");
					$repTarget = array($textOnClass, $iconStyle, $text);
					$icon = str_replace($reps, $repTarget, $icon);
					$atitle = $name;
				}
				//$ct .= '<li><a class="weluka-sns-link" href="' . $url . '" title="' . $name . '" target="_blank">' . $icon .'</a></li>';
				$ct .= '<li><a class="weluka-sns-link" href="' . $url . '" title="' . $atitle . '" target="_blank">' . $icon .'</a></li>';
				//v1.3 add and modify end
			endforeach;
			$ct .= '</ul>';
		}
		
		
		//v1.0.4 add,v1.2.5 modify
		$cssId = 'weluka_snsbtn_' .$uniqID;
		
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		$class .= isset($item['md_align']) && strlen(trim($item['md_align'])) > 0 ? ' ' . $item['md_align'] : '';
		$class .= isset($item['sm_align']) && strlen(trim($item['sm_align'])) > 0 ? ' ' . $item['sm_align'] : '';
		$class .= isset($item['xs_align']) && strlen(trim($item['xs_align'])) > 0 ? ' ' . $item['xs_align'] : '';
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//$content = '<div ' . $cssId . ' class="weluka-sns-button weluka-content' . $class . $cssClass . '" ' . $style . '>';
		//v1.2 animate... add
		$content = '<div id="' . $cssId . '" class="weluka-sns-button weluka-content' . $class . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= '</div>';

		$content = stripslashes($content);
		
		//if($builderMode) {
		//	$content = do_shortcode($content);
		//}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = sns_share data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.2
	 * ver1.2.6
	 */
	public function widget_snsshare_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		
		//add v1.2.6 because widget item name is different builder item name. 
		$class = $class === "" && isset($item['class']) && strlen(trim($item['class'])) > 0 ? ' ' . $item['class'] : $class;
		
		$style = $this->get_style_attribute($item, false);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";

		//TODO pro version
		$direction = "h";

		$ct = "";
		if(isset($item["buttons"]) && is_array($item["buttons"])) {
			$wrapClass = $direction === "h" ? 'weluka-sns-button-horizontal' : 'weluka-sns-button-vertical';
			$ct .= '<ul class="weluka-sns-button-wrapper ' . $wrapClass . '">';
			foreach($item['buttons'] as $data) :
				$name = $data['name'];
				$method = "share_" . $name;
				$share = $this->$method($data);
				$ct .= '<li>' . $share . '</li>';
			endforeach;
		}

		//v1.0.4 add
		$cssId = 'weluka_snsshare_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		$class .= isset($item['md_align']) && strlen(trim($item['md_align'])) > 0 ? ' ' . $item['md_align'] : '';
		$class .= isset($item['sm_align']) && strlen(trim($item['sm_align'])) > 0 ? ' ' . $item['sm_align'] : '';
		$class .= isset($item['xs_align']) && strlen(trim($item['xs_align'])) > 0 ? ' ' . $item['xs_align'] : '';
		
		
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//$content = '<div ' . $cssId . ' class="weluka-sns-share weluka-content' . $class . $cssClass . '" ' . $style . '>';
		//v1.2 animate... add
		$content = '<div id="' . $cssId . '" class="weluka-sns-share weluka-content' . $class . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= '</div>';
		
		$content = stripslashes($content);
		if($builderMode){
			$content = do_shortcode($content);
		}
		
		if($echo) { echo $content; }else{ return $content; }
	}
	
	/** 
	 * create for sns auto url setting shortcodes
	 * @since
	 * ver1.2.6
	 */
	public function sh_weluka_auto_url($snsUrl){
		$url = Weluka::get_instance()->get_now_url_wo_pgnation() ;
		$shareUrl = str_replace(self::SNS_AUTO_SETTING,$url,$snsUrl[0]);
		return $shareUrl;
	}
	
	/** 
	 * create for sns auto title setting shortcodes
	 * @since
	 * ver1.2.6
	 */
	public function sh_weluka_auto_title($post_id = ""){
		$text = "";
		$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD, true);
		$siteTitle =  !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE] ) ? $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE] : esc_html(get_bloginfo()) ;
		
		if(is_front_page()){
			$text = $siteTitle;
		}elseif(is_archive()){
			$text = $siteTitle." ".esc_html( strip_tags( get_the_archive_title() ) );
		}else{
			$post_id = is_home() && get_option('page_for_posts') ? get_option('page_for_posts') : $post_id;
			$pageOpt = !empty($post_id) ? $this->get_builder_data($post_id, WelukaBuilder::CONTENT_POSTMETA_KEY_PUBLISH, 'pagesetting') : array();
			$text =  !empty( $pageOpt['seo_title'] ) ? $pageOpt['seo_title'] : Weluka::get_instance() -> get_post_title($post_id);
		}
		
		$text = empty($text) ? $siteTitle : $text ;
		
		return $text;
	}
		
	/** 
	 * create facebook share button html
	 * @update
	 * ver1.2.6
	 */
	
	public function sh_weluka_auto_url_facebook($snsUrl){
		return $this -> sh_weluka_auto_url($snsUrl);
	}

	public function sh_weluka_facebook($counter_url){
		//add v1.2.6
		if(isset($counter_url[1]) && $counter_url[1] === self::SNS_AUTO_URL){
			$counter_url[0] = $this -> sh_weluka_auto_url($counter_url);
		}
		
		$optVal = WelukaAdminSettings::get_options( WelukaAdminSettings::OGP_OPTION_NAME );
		
		if(!empty($optVal[WelukaAdminSettings::F_TOKEN]) && is_ssl()){
			$counter_url[0] .="&access_token=".$optVal[WelukaAdminSettings::F_TOKEN]."&fields=og_object{engagement},engagement";
			$countDetail = wp_remote_get($counter_url[0], array('timeout' => 5));
			if (is_wp_error($countDetail)) { return ""; }
			$arrDetail = json_decode($countDetail['body'], true);
			$count = isset($arrDetail['engagement']['share_count']) && strlen($arrDetail['engagement']['share_count']) > 0 ? $arrDetail['engagement']['share_count'] : 0;
		}else{
			$countDetail = wp_remote_get($counter_url[0], array('timeout' => 5));
			if (is_wp_error($countDetail)) { return ""; }
			$arrDetail = json_decode($countDetail['body'], true);
			$count = isset($arrDetail['share']['share_count']) && strlen($arrDetail['share']['share_count']) > 0 ? $arrDetail['share']['share_count'] : 0;	
		}
		
		$counterID = Weluka::get_instance()->create_node_id();
		$counter = '<style>#'.$counterID.':before{content:"'.number_format($count) .'"}</style><span id="'.$counterID.'" class="weluka-share-count"></span>';
		

		return $counter;
	}

	
	public function share_facebook($data) {
		//$currentTitle = Weluka::get_instance()->get_post_title($curPostId);
		$shareButton = "";
		$shareInfo = $this->sns_share_buttons["facebook"];
		$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
		
		//add v1.2.6
		$counterAutoArg = '';
		if(isset($data['url']) && strlen(trim($data['url'])) > 0 ){
			$url = $data['url'];
			$counterAutoArg = $data['url'] === self::SNS_AUTO_SETTING ? self::SNS_AUTO_URL : '';
		}else{
			$url = "";

		}
		
		$icon = $shareInfo[$iconType];
		$iconStyle = "";
		//TODO pro version
		//$iconStyle = "";
		//$label_text = "";
		//v1.0.5
		//$flgCounter = true;
		$flgCounter = isset($data['counter']) && $data['counter'] == 'hide' ? false : true;
		//v1.0.5 modify end
		$sizeStyle = ""; //TODO

		$counter = "";
		// facebook share link
		$shareUrl = sprintf(set_url_scheme($shareInfo["share_url"]), $url);
		
		//add v1.2.6
		if($counterAutoArg === self::SNS_AUTO_URL ){
			$shareUrl = '['.$this->sh_auto_url_facebook.' '.$shareUrl.']';
		}
		

		$nocount = "";
    	$shareButton = '<a class="weluka-sns-link weluka-sns-share weluka-facebook-share" href="' . $shareUrl . '" target="_blank" rel="nofollow" title="facebook click to share">'; //login need nofollow default
		
		if($flgCounter) {
			//counter
	    	//facebook api => json
			
			$counterUrl = sprintf(set_url_scheme($shareInfo["counter_url"]), $url);
			
			//modify v1.2.6 [func a] -> [func a b]  
			$counter = '['.$this->sh_facebook.' '.$counterUrl.' '.$counterAutoArg.']';
			
			//$counter = '<span class="weluka-share-count">' . number_format($count) . '</span>';
		}else{
			//$nocount = "weluka-share-nocounter";
			$nocount = "weluka-share-nocounter-new";
		}
		$reps = array("{NOCOUNT}", "{STYLE1}", "{COUNTER}");
		$repTarget = array($nocount, $sizeStyle, $counter);
		$icon = str_replace($reps, $repTarget, $icon);
		$shareButton .= $icon;
		$shareButton .= '</a>';

		return $shareButton;
	}


	/** 
	 * create twitter share button html
	 * @since 1.0
	 * @update
	 * ver1.2.6
	 */
	public function sh_weluka_auto_url_twitter($snsUrl){
		$weluka	   = Weluka::get_instance();
		$postId	   = $weluka->get_post_id();
		$url       = is_front_page() ? home_url() : $weluka ->get_now_url_wo_pgnation($postId) ;
		
		$searchUrl  = self::SNS_AUTO_SETTING;
		if($snsUrl[1] === self::SNS_AUTO_URL){
			$replaceUrl = $url;
		}else{
			$text = '&amp;text=' . urlencode(html_entity_decode(
				$this->sh_weluka_auto_title($postId),
				ENT_QUOTES,
				'UTF-8'));
			
			if($snsUrl[1] === self::SNS_AUTO_URL.self::SNS_AUTO_TXT){
				$searchUrl = self::SNS_AUTO_SETTING.self::SNS_AUTO_SETTING;
				$replaceUrl = $url.$text;
			}else{
				$replaceUrl = $text;
			}
		}

		$shareUrl = str_replace($searchUrl,$replaceUrl, $snsUrl[0]);

		return $shareUrl;
	}
	
	public function sh_weluka_twitter($counter_url){
		if(isset($counter_url[1]) && strpos($counter_url[1],self::SNS_AUTO_URL) !== false){
			$url  = is_front_page() ? home_url() : Weluka::get_instance()->get_post_url() ;
			$counter_url[0] = str_replace(self::SNS_AUTO_SETTING,$url,$counter_url[0]);
		}
		
		$countDetail = wp_remote_get($counter_url[0], array('timeout' => 5));
		if (is_wp_error($countDetail)) { return ""; }

		$arrDetail = json_decode($countDetail['body'], true);

		//v1.3 modify
		//$count = isset($arrDetail['count']) && strlen($arrDetail['count']) > 0 ? $arrDetail['count'] : 0;
		$count = isset($arrDetail['count']) && strlen($arrDetail['count']) > 0 && is_numeric($arrDetail['count']) ? $arrDetail['count'] : 0;

		//1.2.4.5 add 
		$counterID = Weluka::get_instance()->create_node_id();
		$counter = '<style>#'.$counterID.':before{content:"'.number_format($count) .'"}</style><span id="'.$counterID.'" class="weluka-share-count"></span>';
		
		return $counter;
	}
	
	public function share_twitter($data) {
		$shareButton = "";
		$shareInfo = $this->sns_share_buttons["twitter"];
		$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";

		//add v1.2.6
		$counterAutoArg = '';
		if(isset($data['url']) && strlen(trim($data['url'])) > 0 ){
			$url = $data['url'];
			$counterAutoArg = $data['url'] == self::SNS_AUTO_SETTING ? self::SNS_AUTO_URL : '' ;
		}else{
			$url = "";
		}
	
		if(isset($data['text']) && strlen(trim($data['text'])) > 0 ){
			$text = $data['text'];
			if($text == self::SNS_AUTO_SETTING ){
				$counterAutoArg .= self::SNS_AUTO_TXT;
			}else{
				$text =  '&amp;text=' . urlencode(html_entity_decode($text, ENT_QUOTES, 'UTF-8'));
			}
		}else{
			$text = "";
		}
		//$text = isset($data['text']) && strlen(trim($data['text'])) > 0 ? '&amp;text=' . urlencode(html_entity_decode($data['text'], ENT_QUOTES, 'UTF-8')) : "";
		
		//modify v1.2.5
		if(isset($data['account']) && strlen(trim($data['account']))){
			$account = $data['account'];
		}else{
			$optVal = WelukaAdminSettings::get_options( WelukaAdminSettings::OGP_OPTION_NAME );
			$twitterID = !empty($optVal[WelukaAdminSettings::TWITTER_ID]) ? $optVal[WelukaAdminSettings::TWITTER_ID] : "";
			if(strlen(trim($twitterID)) > 0){		
				$account = $twitterID;
			}else{
				$account = "";
			}
		}
		//modify to above end
		//$account = isset($data['account']) && strlen(trim($data['account'])) > 0 ? $data['account'] : "";
		if(strncmp($account, "@", 1) == 0){ $account = substr_replace($account, "", 0, 1); }
		$account = urlencode(html_entity_decode($account, ENT_QUOTES, 'UTF-8'));
		if($account !== "") {
			$account = '&amp;via=' . $account;
		}
		$icon = $shareInfo[$iconType];
		$iconStyle = "";
		//TODO pro version
		//$iconStyle = "";
		//$label_text = "";
		//v1.0.5
		//$flgCounter = true;
		$flgCounter = isset($data['counter']) && $data['counter'] == 'hide' ? false : true;
		//v1.0.5 modify end
		
		$sizeStyle = ""; //TODO

		$counter = "";
		$shareUrl = sprintf(set_url_scheme($shareInfo["share_url"]), $url, $text, $account);
    	// twitter share link
		
		//add auto Setting v1.2.6
		if($counterAutoArg !== ''){
			$shareUrl =  '['.$this->sh_auto_url_twitter.' '.$shareUrl.' '.$counterAutoArg.']';
		}
		

		$nocount = "";
    	$shareButton = '<a class="weluka-sns-link weluka-sns-share weluka-twitter-share" href="' . $shareUrl . '" target="_blank" rel="nofollow" title="click to post to X">'; //login need nofollow default
		if($flgCounter) {
			//counter
	    	//twitter api => json
			$counterUrl = sprintf(set_url_scheme($shareInfo["counter_url"]), $url);
			
			//modify v1.2.6
			$counter = '['.$this->sh_twitter.' '.$counterUrl.' '.$counterAutoArg.']';
		}else{
			//$nocount = "weluka-share-nocounter";
			$nocount = "weluka-share-nocounter-new";
		}

		//v1.3 modify
		//$reps = array("{NOCOUNT}", "{STYLE1}", "{COUNTER}");
		//$repTarget = array($nocount, $sizeStyle, $counter);
		$ximg = '<img src="' . Weluka::$settings['plugin_url'] . 'assets/img/x-white.png" alt="x" width="22" height="22" class="weluka-x-icon" />'; 
		$reps = array("{NOCOUNT}", "{STYLE1}", "{IMG}", "{COUNTER}");
		$repTarget = array($nocount, $sizeStyle, $ximg, $counter);
		//v1.3 modify end
		$icon = str_replace($reps, $repTarget, $icon);
		$shareButton .= $icon;
		$shareButton .= '</a>';
		return $shareButton;
	}

	/** 
	 * create google plus share button html
	 * @since 1.0
	 */
	
	public function sh_weluka_auto_url_google($snsUrl){
		return $this -> sh_weluka_auto_url($snsUrl);
	}
	
	public function sh_weluka_google(){
		return "";
	}
	
	
	public function share_google($data) {
		$shareButton = "";
		$shareInfo = $this->sns_share_buttons["google"];
		$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
		
		//add v1.2.6
		$counterAutoArg = '';
		if(isset($data['url']) && strlen(trim($data['url'])) > 0 ){
			$url = $data['url'];
			$counterAutoArg = $data['url'] === self::SNS_AUTO_SETTING ? self::SNS_AUTO_URL : '' ;
		}else{
			$url = "";
		}
		$icon = $shareInfo[$iconType];
		$iconStyle = "";
		//TODO pro version
		//$iconStyle = "";
		//$label_text = "";
		//v1.0.5
		//$flgCounter = true;
		//1.2.4.5 
		$flgCounter = isset($data['counter']) && $data['counter'] == 'hide' ? false : true;
		//v1.0.5 modify end
		$sizeStyle = ""; //TODO

		$counter = "";
    	// google plus share link
		$shareUrl = sprintf(set_url_scheme($shareInfo["share_url"]), $url);
		
		//add v1.2.6
		if($counterAutoArg === self::SNS_AUTO_URL){
			$shareUrl =  '['.$this->sh_auto_url_gplus.' '.$shareUrl.']';
		}


		$nocount = "";
    	$shareButton = '<a class="weluka-sns-link weluka-sns-share weluka-google-share" href="' . $shareUrl . '" target="_blank" rel="nofollow" title="google plus click to share">'; //login need nofollow default
		if($flgCounter) {
			//1.2.4.5 add 
			$counter = '['.$this -> sh_gplus.']';
			$nocount = "weluka-share-nocounter-new";
		}else{
			//$nocount = "weluka-share-nocounter";
		$nocount = "weluka-share-nocounter-new";
		}

		$reps = array("{NOCOUNT}", "{STYLE1}", "{COUNTER}");
		$repTarget = array($nocount, $sizeStyle, $counter);
		$icon = str_replace($reps, $repTarget, $icon);
		$shareButton .= $icon;
		$shareButton .= '</a>';
		return $shareButton;
	}
	
	public function sh_weluka_auto_url_hatebu($snsUrl){
		return $this->sh_weluka_auto_url($snsUrl);
	}
	
	public function sh_weluka_hatebu($counter_url){
		//add v1.2.6
		if(isset($counter_url[1]) && $counter_url[1] === self::SNS_AUTO_URL){
			$counter_url[0] = $this -> sh_weluka_auto_url($counter_url);
		}
		
		$countDetail = wp_remote_get($counter_url[0], array('timeout' => 5));
		if (is_wp_error($countDetail)) { return ""; }

		$arrDetail = ""; //v1.3 add
		$arrDetail = json_decode($countDetail['body'], true);
		
		//v1.3 modify
		//$count = isset( $arrDetail ) || strlen($arrDetail) > 0  ? $arrDetail : 0;
		$count = isset( $arrDetail )  ? $arrDetail : 0;
		$count = strlen($count) > 0 && is_numeric($count) ? $count : 0;

		//1.2.4.5 add
		$counterID = Weluka::get_instance()->create_node_id();
		$counter = '<style>#'.$counterID.':before{content:"'.number_format($count) .'"}</style><span id="'.$counterID.'" class="weluka-share-count"></span>';
		
		return $counter;

	}
	
	
	public function share_hatebu($data) {
		$shareButton = "";
		$shareInfo = $this->sns_share_buttons["hatebu"];
		$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
		
		//add v1.2.6
		$counterAutoArg = '';
		if(isset($data['url']) && strlen(trim($data['url'])) > 0 ){
			$url = $data['url'];
			$counterAutoArg = $data['url'] === self::SNS_AUTO_SETTING ? self::SNS_AUTO_URL : '' ;
		}else{
			$url = "";
		}
		$icon = $shareInfo[$iconType];
		$iconStyle = "";

		
		$flgCounter = isset($data['counter']) && $data['counter'] == 'hide' ? false : true;
		//v1.0.5 modify end
		$sizeStyle = ""; //TODO

		$counter = "";
		$shareUrl = sprintf(set_url_scheme($shareInfo["share_url"]),$url);
		
		
		if($counterAutoArg === self::SNS_AUTO_URL){
			$shareUrl = '['.$this->sh_auto_url_hatebu.' '.$shareUrl.']';
		}
		
		
		$nocount = "";

		$shareButton = '<a class="weluka-sns-link weluka-sns-share" href="' .  $shareUrl . '" target="_blank" rel="nofollow">'; //login need nofollow default
		
		if($flgCounter) {
			//counter
			//twitter api => json
			$counterUrl = is_ssl() ? sprintf(set_url_scheme($shareInfo["ssl_counter_url"]), $url) : sprintf(set_url_scheme($shareInfo["counter_url"]), $url);
			$counter = '['.$this->sh_hatebu.' '.$counterUrl.' '.$counterAutoArg.']';

		}else{
			//$nocount = "weluka-share-nocounter";
			$nocount = "weluka-share-nocounter-new";
		}

		$reps = array("{NOCOUNT}", "{STYLE1}", "{COUNTER}");
		$repTarget = array($nocount, $sizeStyle, $counter);
		$icon = str_replace($reps, $repTarget, $icon);
		$shareButton .= $icon;
		$shareButton .= '</a>';
		return $shareButton;
	}
	
	public function sh_weluka_auto_url_line($snsUrl){
		$weluka	   = Weluka::get_instance();
		$postId	   = $weluka->get_post_id();
		$url       = is_front_page() ? home_url() : $weluka ->get_now_url_wo_pgnation($postId) ;
		
		$searchUrl = self::SNS_AUTO_SETTING;
		
		if($snsUrl[1] === self::SNS_AUTO_URL){
			$replaceUrl = $url;
		}else{
			$text = urlencode(html_entity_decode(
				$this->sh_weluka_auto_title($postId),
				ENT_QUOTES,
				'UTF-8')) . '%0D%0A';
			
			if($snsUrl[1] === self::SNS_AUTO_URL.self::SNS_AUTO_TXT){
				$searchUrl = self::SNS_AUTO_SETTING.self::SNS_AUTO_SETTING;
				$replaceUrl = $text.$url;
			}else{
				$replaceUrl = $text;
			}
			
		}
		
		if($snsUrl[1] === self::SNS_AUTO_URL.self::SNS_AUTO_TXT){
			$searchUrl = self::SNS_AUTO_SETTING.self::SNS_AUTO_SETTING;
			$replaceUrl = $text.$url;
		}else if($snsUrl[1] === self::SNS_AUTO_TXT){
			$replaceUrl = $text;
		}else{
			$replaceUrl = $url;
		}
		$shareUrl = str_replace($searchUrl,$replaceUrl, $snsUrl[0]);

		return $shareUrl;
	}


	
	public function share_line($data) {
		$shareButton = "";
		$shareInfo = $this->sns_share_buttons["line"];
		$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
		
		//add v1.2.6
		$counterAutoArg = '';
		if(isset($data['url']) && strlen(trim($data['url'])) > 0 ){
			$url = $data['url'];
			$counterAutoArg = $data['url'] == self::SNS_AUTO_SETTING ? self::SNS_AUTO_URL : '' ;
		}else{
			$url = "";
		}
		
		if(isset($data['text']) && strlen(trim($data['text'])) > 0 ){
			$text = $data['text'];
			if($data['text'] == self::SNS_AUTO_SETTING ){
				$counterAutoArg .= self::SNS_AUTO_TXT;
			}else{
				$text =  urlencode(html_entity_decode($text, ENT_QUOTES, 'UTF-8')) . '%0D%0A';
			}
		}else{
			$text = "";
		}
		
		
		//$text = isset($data['text']) && strlen(trim($data['text'])) > 0 ? urlencode(html_entity_decode($data['text'], ENT_QUOTES, 'UTF-8')) . '%0D%0A' : "";
		$icon = $shareInfo[$iconType];
		$iconStyle = "";

		//v1.0.5 modify end
		$sizeStyle = ""; //TODO

		$counter = "";
		$shareUrl = sprintf(set_url_scheme($shareInfo["share_url"]),$text, $url);
		
		//add v1.2.6
		if($counterAutoArg !== ''){
			$shareUrl = '['.$this->sh_auto_url_line.' '.$shareUrl.' '.$counterAutoArg.']';
		}
		
		
		$nocount = "weluka-share-nocounter-new";

		$shareButton = '<a class="weluka-sns-link weluka-sns-share" href="' .  $shareUrl . '" target="_blank" rel="nofollow">'; //login need nofollow default
		

		$reps = array("{NOCOUNT}", "{STYLE1}", "{COUNTER}");
		$repTarget = array($nocount, $sizeStyle, $counter);
		$icon = str_replace($reps, $repTarget, $icon);
		$shareButton .= $icon;
		$shareButton .= '</a>';
		return $shareButton;
	}
	
	public function sh_weluka_auto_url_pocket($snsUrl){
		return $this->sh_weluka_auto_url($snsUrl);
	}
	
	public function share_pocket($data) {
		$shareButton = "";
		$shareInfo = $this->sns_share_buttons["pocket"];
		$iconType = isset($data['icon_type']) && strlen(trim($data['icon_type'])) > 0 ? 'icon_' . $data['icon_type'] : "icon_round";
		
		//add v1.2.6
		$counterAutoArg = '';
		if(isset($data['url']) && strlen(trim($data['url'])) > 0 ){
			$url = $data['url'];
			$counterAutoArg = $data['url'] === self::SNS_AUTO_SETTING ? self::SNS_AUTO_URL : '' ;
		}else{
			$url = "";
		}
							   
		$icon = $shareInfo[$iconType];
		$iconStyle = "";

		//v1.0.5 modify end
		$sizeStyle = ""; //TODO

		$counter = "";
		$shareUrl = sprintf(set_url_scheme($shareInfo["share_url"]),$url);
        if($counterAutoArg === self::SNS_AUTO_URL){
			$shareUrl = '['.$this->sh_auto_url_pocket.' '.$shareUrl.']';
		}					   
							
		$nocount = "weluka-share-nocounter-new";

		$shareButton = '<a class="weluka-sns-link weluka-sns-share" href="' .  $shareUrl . '" target="_blank" rel="nofollow">'; //login need nofollow default


		$reps = array("{NOCOUNT}", "{STYLE1}", "{COUNTER}");
		$repTarget = array($nocount, $sizeStyle, $counter);
		$icon = str_replace($reps, $repTarget, $icon);
		$shareButton .= $icon;
		$shareButton .= '</a>';
		return $shareButton;
	}

	/**
	 * builder item type = appembed data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_appembed_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$blockShape = isset($item['block_shape']) && strlen(trim($item['block_shape'])) > 0 ? ' ' . $item['block_shape'] : "";
		$objId = "weluka-embed_" . $item['id'];
		
		$code = "";
		if(isset($item["code"]) && trim($item["code"]) === '') {
			$code = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please paste your code.', Weluka::$settings['plugin_name']) . '</div>';
		}elseif(isset($item["code"]) && trim($item["code"]) !== ''){
			//$code = $item["code"];
/*			if(strpos($item["code"], "<script") !== false && $builderMode) {
        		$code = '<div class="weluka-hide"><script type="text/javascript">';
				$code .= 'jQuery(document).ready(function($) {';
				$code .= 'var iframe = document.createElement("iframe");';
				$code .= 'document.getElementById("' . $objId . '").appendChild(iframe);';
				$code .= 'var doc = iframe.contentWindow.document;';
				$code .= "doc.open();";
				$_code = mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($item['code'])), "UTF-8", "auto");
				$_clist = "「.\+*?[^]($)'」";
				$_code = addcslashes($_code, $_clist);
				$code .= "doc.write('<html><head><\/head><body>" . str_replace(array("</"), array("<\/"), $_code) . "<\/body><\/html>');";
				$code .= "doc.close();";
				$code .= '});</script></div>';
			}else{*/
				$code = stripslashes($item["code"]);
				$code = str_replace(array('{SCRIPT}', '{/SCRIPT}'), array('<script', '</script'), $code);
			//}
		}
		
		//v1.0.4 add
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_borderSize	= isset($item['border_size']) && strlen(trim($item['border_size'])) > 0 ? $item['border_size'] : '';
		$_headBoxStyle = $this->get_boxshadow_style($objId, $boxShadowStyle, $boxShadowColor, $_borderSize);
		//$_inb = '';
		//if( $boxShadowStyle ) { $_inb = ' weluka-inline-block'; }
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $objId . '" class="weluka-embed weluka-content' . $class . $blockShape .' ' . $boxShadowStyle .  $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay. '>';
		$content .= $code;
		$content .= $this->add_head_style_js( $_headBoxStyle ); //v1.1.4 add
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = appaccordion or title data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_accordion_html($item, $echo = true) {
		global $wp_embed;
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$panelAllStyle = isset($item['all_panel_style']) && strlen(trim($item['all_panel_style'])) > 0 ? ' ' . $item['all_panel_style'] : " panel-default";
		$panelAllShape = isset($item['all_panel_shape']) && strlen(trim($item['all_panel_shape'])) > 0 ? ' ' . $item['all_panel_shape'] : "";

		$cssId = 'weluka_appaccordion_' . Weluka::get_instance()->create_node_id();

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style($cssId .' .weluka-panel', $boxShadowStyle, $boxShadowColor);
		//v1.1.4 addend

		$ct = "";
		if(isset($item["panels"]) && is_array($item["panels"])) {
			$accordionId = 'weluka-accordion-' . $item['id'];
			$ct = '<div class="panel-group" id="' . $accordionId . '">';
			$cnt = 1;
			foreach($item['panels'] as $data) :
				$collapseId = 'weluka-collapse-' . $item['id'] . '-' . $cnt;
				$panelStyle = isset($data['panel_style']) && strlen(trim($data['panel_style'])) > 0 ? ' ' . $data['panel_style'] : "";
				if($panelStyle === "") { $panelStyle = $panelAllStyle; }
				
				$body = $data['body_text'];
				if(strstr($body, "[embed") !== false) {
					$body = $wp_embed->run_shortcode($body); //embed shortcode exec
				}
				$in = isset($data['open']) && $data['open'] == 'on' ? ' in' : '';
				
				//$icon = $in != '' ? 'fa-arrow-circle-o-up' : 'fa-arrow-circle-o-down';
				$icon = $in != '' ? 'fa-chevron-up' : 'fa-chevron-down';
				//v1.1.4 boxShadowStyle add
				$ct .= '<div class="weluka-panel panel' . ' ' . $boxShadowStyle . $panelStyle . $panelAllShape . '">';
				$ct .= '<div class="panel-heading weluka-panel-heading"><h4 class="weluka-panel-title panel-title clearfix"><i class="fa ' . $icon . '"></i>';
       			$ct .= '<a class="weluka-noscroll" data-toggle="collapse" data-parent="#' . $accordionId . '" href="#' . $collapseId . '">' . $data['header_text'] . '</a>';
     			$ct .= '</h4></div>';
				$ct .= '<div id="' . $collapseId . '" class="weluka-panel-collapse panel-collapse collapse' . $in . '">';
      			$ct .= '<div class="panel-body">' . $body . '</div>';
    			$ct .= '</div>';
				$ct .= '</div>';
				$cnt++;
			endforeach;
			$ct .= '</div>';
		}

		//v1.0.4 add
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//$content = '<div ' . $cssId . ' class="weluka-accordion weluka-content' . $class . $cssClass . '" ' . $style . '>';
		//v1.2 animate... add
		$content = '<div id="' . $cssId . '" class="weluka-accordion weluka-content' . $class . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= $this->add_head_style_js( $_headBoxStyle ); //v1.1.4 add
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = apptabs or title data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_tabs_html($item, $echo = true) {
		global $wp_embed;
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$tabType = isset($item['tab_type']) && strlen(trim($item['tab_type'])) > 0 ? $item['tab_type'] : 'tab';
		$shape = isset($item['shape']) && strlen(trim($item['shape'])) > 0 ? ' ' . $item['shape'] : "";
		$justified = isset($item['tab_justified']) && strlen(trim($item['tab_justified'])) > 0 ? ' nav-justified' : '';
		$panelBorder = isset($item['panel_border']) && strlen(trim($item['panel_border'])) > 0 ? ' weluka-tabs-panel-border' : '';
		$tabBgColor = isset($item['tab_bgcolor']) && strlen(trim($item['tab_bgcolor'])) > 0 ? ' ' . $item['tab_bgcolor'] : "";
		
		$navs = $tabcts = "";
		if(isset($item["panels"]) && is_array($item["panels"])) {
			$navs = '<ul class="weluka-nav-' . $tabType . 's nav nav-' . $tabType . 's' . $justified . ' clearfix">';
			$tabcts = '<div class="weluka-tab-content tab-content' . $panelBorder . '">';
			$cnt = 1;
			foreach($item['panels'] as $data) :
				$ctId	= 'weluka-tab-content-' . $item['id'] . '-' . $cnt;
				$active	= $cnt == 1 ? 'active' : '';
				$in		= $active === '' ? '' : 'in';
				//nav
				$navs .= '<li class="' . $active . '"><a class="weluka-noscroll'. $tabBgColor . '" data-toggle="' . $tabType . '" href="#' . $ctId . '">' . $data['tab_text'] . '</a></li>';
				//content
				$body = $data['body_text'];
				if(strstr($body, "[embed") !== false) {
					$body = $wp_embed->run_shortcode($body); //embed shortcode exec
				}
				//$disp = ($builderMode && $cnt > 1) ? ' style="display:none;"' : "";
				$tabcts .= '<div id="' . $ctId . '" class="tab-pane fade ' . $in . ' ' . $active . '">' . $body . '</div>';
				$cnt++;
			endforeach;
			$navs .= '</ul>';
			$tabcts .= '</div>';
		}
		
		//v1.0.4 add
		$cssId = 'weluka_apptabs_' . Weluka::get_instance()->create_node_id();
		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style($cssId, $boxShadowStyle, $boxShadowColor);
		//v1.1.4 addend
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content = '<div id="' . $cssId . '" class="weluka-' . $tabType . 's weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $shape . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $navs . $tabcts;
		$content .= $this->add_head_style_js( $_headBoxStyle ); //v1.1.4 add
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = applist or title data html
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.0.6
	 * ver1.1.4
	 * ver1.2
	 * ver1.2.3
	 */
	public function widget_list_html($item, $echo = true) {
		global $wp_embed;
		$builderMode		= $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content			= "";
		$list				= "";
		//$listId				= !empty($item['reg_list_id']) ? "" : $item['reg_list_id'];

		$class				= isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style				= $this->get_style_attribute($item);
		$cssClass			= isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$layoutClass		= isset($item['layout_class']) && $item['layout_class'] !== '' ? $item['layout_class'] : 'medialeft';
		$mediaDisp			= !empty($item['media_display']) ? 1 : 0;
		$titleDisp			= !empty($item['title_display']) ? 1 : 0;
		$contentDisp		= !empty($item['content_display']) ? 1 : 0;
		$buttonDisp			= !empty($item['button_display']) ? 1 : 0;
		$meta1Disp			= !empty($item['meta1_display']) ? 1 : 0;
		$meta2Disp			= !empty($item['meta2_display']) ? 1 : 0;
		$mediaCol			= !empty($item['media_col']) ? $item['media_col'] : 4;
		$contentCol	= $org_contentCol = (int)self::MAX_COLUMN - (int)$mediaCol;
		$rowSpacing			= isset($item['row_spacing']) && trim($item['row_spacing']) !== '' ? 'margin-top:' . trim($item['row_spacing']) . 'px;' : '';
		$rowColumn			= isset($item['row_column']) && strlen(trim($item['row_column'])) > 0 ? trim($item['row_column']) : 1;
		$rowOddColor		= isset($item['row_odd_color']) && strlen(trim($item['row_odd_color'])) > 0 ? ' background-color:' . trim($item['row_odd_color']) . ';' : "";
		$rowEvenColor		= isset($item['row_even_color']) && strlen(trim($item['row_even_color'])) > 0 ? ' background-color:' . trim($item['row_even_color']) . ';' : "";

		$ngmClass			= ($rowOddColor !== '' || $rowEvenColor !== '') ? ' weluka-row-negative-margin-clear' : '';
		$rowBgClass			= ($rowOddColor !== '' || $rowEvenColor !== '') ? ' weluka-list-row-bgcolor' : '';
		if(!empty($item['datas']) && is_array($item['datas'])) :
			//media design
			$mediaAlign			= !empty($item['media_align']) ? $item['media_align'] : 'weluka-text-left';
			$mediaBorderColor	= !empty($item['media_border_color']) ? trim($item['media_border_color']) : '';
			$mediaBorderStyle	= !empty($item['media_border_style']) ? trim($item['media_border_style']) : '';
			$mediaBorderSize	= !empty($item['media_border_size']) ? trim($item['media_border_size']) : '';
			$mediaShape			= !empty($item['media_shape']) ? trim($item['media_shape']) : '';
			$mediaIconSize		= !empty($item['media_icon_size']) ? trim($item['media_icon_size']) : '';
			$mediaIconColor		= !empty($item['media_icon_color']) ? trim($item['media_icon_color']) : '';
			$mediaRadiusSize	= !empty($item['media_radius_size']) ? trim($item['media_radius_size']) : '';	//v1.2.3 add
			$mediaLazyload	    = !empty($item['media_lazyload']) ? 1 : 0;//v1.2.7 add

			//title design
			$titleTag		= !empty($item['title_html_tag']) ? $item['title_html_tag'] : 'h4';
			$titleAlign		= !empty($item['title_align']) ? ' ' . $item['title_align'] : '';
			$titleFont		= !empty($item['title_font']) ? ' ' . $item['title_font'] : '';
			$titleFontSize	= isset($item['title_font_size']) && strlen(trim($item['title_font_size'])) > 0 ? ' font-size:' . trim($item['title_font_size']) . 'px;' : '';
			$titleColor		= isset($item['title_color']) && strlen(trim($item['title_color'])) > 0 ? ' color:' . trim($item['title_color']) . ';' : '';
			$titleWeight	= !empty($item['title_bold']) ? ' font-weight:bold;' : '';
			$titleUnderline	= !empty($item['title_underline']) ? ' text-decoration:underline;' : '';
			$titleItalic	= !empty($item['title_italic']) ? ' font-style:italic;' : '';

			//meta1 design
			$meta1Align		= !empty($item['meta1_align']) ? ' ' . $item['meta1_align'] : '';
			$meta1Font		= !empty($item['meta1_font']) ? ' ' . $item['meta1_font'] : '';
			$meta1FontSize	= isset($item['meta1_font_size']) && strlen(trim($item['meta1_font_size'])) > 0 ? ' font-size:' . trim($item['meta1_font_size']) . 'px;' : '';
			$meta1Color		= isset($item['meta1_color']) && strlen(trim($item['meta1_color'])) > 0 ? ' color:' . trim($item['meta1_color']) . ';' : '';
			$meta1Weight	= !empty($item['meta1_bold']) ? ' font-weight:bold;' : '';
			$meta1Underline	= !empty($item['meta1_underline']) ? ' text-decoration:underline;' : '';
			$meta1Italic	= !empty($item['meta1_italic']) ? ' font-style:italic;' : '';

			//meta2 design
			$meta2Align		= !empty($item['meta2_align']) ? ' ' . $item['meta2_align'] : '';
			$meta2Font		= !empty($item['meta2_font']) ? ' ' . $item['meta2_font'] : '';
			$meta2FontSize	= isset($item['meta2_font_size']) && strlen(trim($item['meta2_font_size'])) > 0 ? ' font-size:' . trim($item['meta2_font_size']) . 'px;' : '';
			$meta2Color		= isset($item['meta2_color']) && strlen(trim($item['meta2_color'])) > 0 ? ' color:' . trim($item['meta2_color']) . ';' : '';
			$meta2Weight	= !empty($item['meta2_bold']) ? ' font-weight:bold;' : '';
			$meta2Underline	= !empty($item['meta2_underline']) ? ' text-decoration:underline;' : '';
			$meta2Italic	= !empty($item['meta2_italic']) ? ' font-style:italic;' : '';

			//content design
			$contentAlign		= !empty($item['content_align']) ? ' ' . $item['content_align'] : '';
			$contentFont		= !empty($item['content_font']) ? ' ' . $item['content_font'] : '';
			$contentFontSize	= isset($item['content_font_size']) && strlen(trim($item['content_font_size'])) > 0 ? ' font-size:' . trim($item['content_font_size']) . 'px;' : '';
			$contentColor		= isset($item['content_color']) && strlen(trim($item['content_color'])) > 0 ? ' color:' . trim($item['content_color']) . ';' : '';

			//button design
			$buttonText		= isset($item['button_text']) && strlen(trim($item['button_text'])) > 0 ? trim($item['button_text']) : 'Read More';
			$buttonAlign	= !empty($item['button_align']) ? $item['button_align'] : 'weluka-text-right';
			$buttonColor	= !empty($item['button_color']) ? $item['button_color'] : 'weluka-btn-info';
			$buttonShape	= !empty($item['button_shape']) ? $item['button_shape'] : '';
			$buttonSize		= !empty($item['button_size']) ? $item['button_size'] : '';
			$buttonBlock	= !empty($item['button_block']) ? $item['button_block'] : '';
			$button					= array();
			$button['text']			= $buttonText;
			$button['class_name']	= $buttonAlign;
			$button['button_color']	= $buttonColor;
			$button['shape']		= $buttonShape;
			$button['size']			= $buttonSize;
			$button['block']		= $buttonBlock;

			$colNum			= (int)self::MAX_COLUMN / (int)$rowColumn; //$rowColumn = (1 or 2 or 3 or 4 or 6)
			$rowCnt = 0;
			$colCnt = 0;

			//v1.0.6 add
			$layoutClassSm	= isset( $item['layout_class_sm'] ) && $item['layout_class_sm'] !== '' ? $item['layout_class_sm'] : '';
			$rowColumnSm	= isset($item['row_column_sm']) && strlen(trim($item['row_column_sm'])) > 0 ? trim($item['row_column_sm']) : 1;
			$colNumSm		= (int)self::MAX_COLUMN / (int)$rowColumnSm;
			$colCntSm		= 0;
			$listSm = "";

			$layoutClassXs	= isset( $item['layout_class_xs'] ) && $item['layout_class_xs'] !== '' ? $item['layout_class_xs'] : '';	
			$rowColumnXs	= isset($item['row_column_xs']) && strlen(trim($item['row_column_xs'])) > 0 ? trim($item['row_column_xs']) : 1;	
			$colNumXs		= (int)self::MAX_COLUMN / (int)$rowColumnXs;
			$colCntXs		= 0;
			$listXs = "";
			//v1.0.6 addend

			//v1.2 add
			$thumbHeight	= isset( $item['thumb_height'] ) ? trim( $item['thumb_height'] ) : '';
			$thumbHeightSm	= isset( $item['thumb_height_sm'] ) ? trim( $item['thumb_height_sm'] ) : '';
			$thumbHeightXs	= isset( $item['thumb_height_xs'] ) ? trim( $item['thumb_height_xs'] ) : '';
			$listEqh		= !empty( $item['list_eqh'] ) ? 'weluka-list-row-eqh' : '';
			$boxStyle		= !empty($item['box_style']) ? $item['box_style'] : '';
			$boxBgColor		= isset($item['box_bgcolor']) && strlen(trim($item['box_bgcolor'])) > 0 ? trim($item['box_bgcolor']) : '';
			$boxShape		= isset($item['box_shape']) && strlen(trim($item['box_shape'])) > 0 ? trim($item['box_shape']) : '';
			$boxStyleShadow	= !empty($item['box_style_shadow']) ? 'weluka-listblock-boxshadow' : '';

			$iconPd = '';
			$iconPd = isset($item['media_icon_pdtop']) && strlen(trim($item['media_icon_pdtop'])) > 0 ? 'padding-top:' . trim($item['media_icon_pdtop']) . 'px;' : '';
			$iconPd	.= isset($item['media_icon_pdbottom']) && strlen(trim($item['media_icon_pdbottom'])) > 0 ? 'padding-bottom:' . trim($item['media_icon_pdbottom']) . 'px;' : '';
			$iconPd	.= isset($item['media_icon_pdleft']) && strlen(trim($item['media_icon_pdleft'])) > 0 ? 'padding-left:' . trim($item['media_icon_pdleft']) . 'px;' : '';
			$iconPd	.= isset($item['media_icon_pdright']) && strlen(trim($item['media_icon_pdright'])) > 0 ? 'padding-right:' . trim($item['media_icon_pdright']) . 'px;' : '';
			if( $iconPd ) { $iconPd = ' style="' . $iconPd . '"'; }
			//v1.2 addend

			$_mediaShape = '';	//v1.2.3 add
			foreach($item['datas'] as $data) :
				//common link
				$linkUrl		= !empty($data['link']['href']) ? trim($data['link']['href']) : '';
				//v1.2 modify
				//$linkTarget 	= !empty($data['link']['target']) ? '_blank' : '';
				//$_linkTarget	= $linkTarget !== '' ? ' target="_blank"' : '';
				$linkTarget = '';
				$_linkTarget = '';
				if( !empty( $data['link']['target'] ) ) {
					$linkTarget = $data['link']['target'];
					if( $data['link']['target'] == '_blank' ){ $_linkTarget = ' target="_blank"'; }
					elseif( $data['link']['target'] == 'iframe' ) { $_linkTarget = ' data-fancybox-type="iframe" class="fancybox"'; } 
				}

				//v1.2 add and modify
				//$mediaHtml = "";
				$mediaHtml = array( 'default' => '', 'md' => '', 'sm' => '', 'xs' => '' );
				if($mediaDisp && !empty($data['media'])) {
					
					//$mediaHtml = '<div class="weluka-list-media">';
					$_mediaHtml = '<div class="weluka-list-media">';
					$media = $data['media'];

					if($media['type'] === self::WIDGET_ICON) {
						if( empty($media['link']['href']) && !empty($linkUrl) ) {
							$media['link']['action']	= self::LINK_ACTION_GOTOLINK;
							$media['link']['href']		= $linkUrl;
							$media['link']['target']	= $linkTarget;
						}
						
						if( $mediaIconColor !== '' ) {
							$media['icon_color'] = $mediaIconColor;
						}
						if( $mediaIconSize !== '' ) {
							$media['icon_size'] = $mediaIconSize;
						}
						//$media['icon_size'] = $mediaIconSize;
						$media['class_name']		= $mediaAlign;
						//$mediaHtml .= $this->widget_icon_html($media, false);
						$_mediaHtml .= '<div class="icon-wrap"' . $iconPd . '>'; //v1.2 add
						$_mediaHtml .= $this->widget_icon_html($media, false);
						$_mediaHtml .= '</div>'; //v1.2 add

					} elseif($media['type'] === self::WIDGET_MOVIE) {

						$media['class_name']		= $mediaAlign;
						//$mediaHtml .= $this->widget_movie_html($media, false);
						$_mediaHtml .= $this->widget_movie_html($media, false);
						
					} elseif($media['type'] === self::WIDGET_IMG) {

						//TODO Image crop
						if( empty($media['link']['href']) && !empty($linkUrl) ) {
							$media['link']['action']	= self::LINK_ACTION_GOTOLINK;
							$media['link']['href']		= $linkUrl;
							$media['link']['target']	= $linkTarget;
						}

						$media['border_color']	= $mediaBorderColor;
						$media['border_size']	= $mediaBorderSize;
						$media['border_style']	= $mediaBorderStyle;
						$media['shape']			= $mediaShape;
						$media['class_name']	= $mediaAlign;
						//v1.2.3 add
						$media['radius_size']	= $mediaRadiusSize;
						//v1.2.7 add
						$media['lazyload']    	= $mediaLazyload;
						
						//$mediaHtml .= $this->widget_img_html($media, false);
						$_mediaHtml .= $this->widget_img_html($media, false);
						
						//v1.2 add thumbnail equal height
						if ( !empty( $media['url'] ) ) {
							$_bdrSize = '';
							if( $mediaBorderSize ) { $_bdrSize	= $mediaBorderSize . 'px'; }
							$_bdrStyle = 'solid';
							if( $mediaBorderStyle ) { $_bdrStyle = $mediaBorderStyle; }
							$_bdrColor = '#dddddd';
							if( $mediaBorderColor ) { $_bdrColor = $mediaBorderColor; }
							
							$_border = '';
							if( $mediaBorderSize ) {
								$_border = 'border:' . $_bdrSize . ' ' . $_bdrStyle . ' ' . $_bdrColor . ';';
							}
							//v1.2.3 add
							if( $mediaShape == 'img-rounded' && $mediaRadiusSize ) {
								$_mediaShape = '';
								$_border .= 'border-radius:' . $mediaRadiusSize . 'px;';
							} else {
								$_mediaShape = $mediaShape;
							}
							//v1.2.3 modify
							//$_bgimg = '<div class="weluka-list-media ' . $mediaAlign . '"><a href="' . $linkUrl . '" target="' . $linkTarget . '"><span class="weluka-list-media-eqh ' . $mediaShape . '" style="background-image:url(' . $media['url'] . ');height:%spx;' . $_border . '"></span></a></div>';
							//v1.2.9.1 modify
							//line 5415 when $linkUrl is not empty, media['link']['href'] is not also empty.
							if(empty($media['link']['href'])){
								$_bgimg =
								'<div class="weluka-list-media ' . $mediaAlign . '"><span class="weluka-list-media-eqh ' . $_mediaShape . '" style="background-image:url(' . $media['url'] . ');height:{%THUMB_HEIGHT%}px;' . $_border . '"></span></div>';
							}else{
								$_bgimgLinkAction = $media['link']['action'] === self::LINK_ACTION_ZOOMUP
								? '" class="fancybox" rel="gallary'
								: '" target="' . $media['link']['target'];
								$_bgimg =
								'<div class="weluka-list-media ' . $mediaAlign . '"><a href="' . $media['link']['href'] . $_bgimgLinkAction . '"><span class="weluka-list-media-eqh ' . $_mediaShape . '" style="background-image:url(' . $media['url'] . ');height:{%THUMB_HEIGHT%}px;' . $_border . '"></span></a></div>';
							}

							if ( $thumbHeight ) {
								//v1.2.3 modify
								//$mediaHtml['md'] = sprintf( $_bgimg, $thumbHeight );
								$mediaHtml['md'] = str_replace("{%THUMB_HEIGHT%}", $thumbHeight,  $_bgimg);
							}
							if ( $thumbHeightSm ) {
								//v1.2.3 modify
								//$mediaHtml['sm'] = sprintf( $_bgimg, $thumbHeightSm );
								$mediaHtml['sm'] = str_replace("{%THUMB_HEIGHT%}", $thumbHeightSm,  $_bgimg);
							}
							if ( $thumbHeightXs ) {
								//v1.2.3 modify
								//$mediaHtml['xs'] = sprintf( $_bgimg, $thumbHeightXs );
								$mediaHtml['xs'] = str_replace("{%THUMB_HEIGHT%}", $thumbHeightXs,  $_bgimg);
							}
						}
					}
					//$mediaHtml .= '</div>';
					$_mediaHtml .= '</div>';
					$mediaHtml['default'] = $_mediaHtml;
				}
				
				$titleHtml = "";
				if($titleDisp && !empty($data['title'])) {
					$title	= !empty($data['title']['text']) ? trim($data['title']['text']) : '';
					if($title !== '') {
						$titleHtml = '<' . $titleTag. ' class="weluka-list-title' . $titleAlign . '" style="' . $titleFont . $titleFontSize . $titleColor . $titleWeight . $titleUnderline . $titleItalic . '">{%TITLE%}</' . $titleTag . '>';
						$s = "";
						if( $linkUrl !== '' ) {
							$s = '<a href="' . esc_url($linkUrl) . '"' . $_linkTarget . ' title="' . esc_attr($title) . '">' . $title . '</a>';
						} else {
							$s = $title;
						}
						
						$titleHtml = str_replace("{%TITLE%}", $s, $titleHtml);
					}
				}
								
				$meta1Html = "";
				if($meta1Disp && !empty($data['meta1'])) {
					$meta1Html	= !empty($data['meta1']['text']) ? trim($data['meta1']['text']) : '';
					if($meta1Html !== '') {
						$meta1Html = '<div class="weluka-list-meta' . $meta1Align .'" style="' . $meta1Font . $meta1FontSize . $meta1Color . $meta1Weight . $meta1Underline . $meta1Italic . '">' . $meta1Html . '</div>';
					}
				}

				$meta2Html = "";
				if($meta2Disp && !empty($data['meta2'])) {
					$meta2Html	= !empty($data['meta2']['text']) ? trim($data['meta2']['text']) : '';
					if($meta2Html !== '') {
						$meta2Html = '<div class="weluka-list-meta' . $meta2Align .'" style="' . $meta2Font . $meta2FontSize . $meta2Color . $meta2Weight . $meta2Underline . $meta2Italic . '">' . $meta2Html . '</div>';
					}
				}

				$textHtml = "";
				if($contentDisp && !empty($data['content'])) {
					$textHtml	= !empty($data['content']['text']) ? trim($data['content']['text']) : '';
					if($textHtml !== '') {
						$textHtml = '<div class="weluka-list-content' . $contentAlign . '" style="' . $contentFont . $contentFontSize . $contentColor . '">' . $textHtml . '</div>';
					}
				}

				$buttonHtml = "";
				if($buttonDisp) {
					if( $linkUrl !== '' ) {
						$button['link']['action']	= self::LINK_ACTION_GOTOLINK;
						$button['link']['href']		= $linkUrl;
						$button['link']['target']	= $linkTarget;
					}
					$buttonHtml		= $this->widget_button_html($button, false);
				}
				
				$_spacing = "";
				if($rowCnt !== 0 && $rowSpacing !== '') { $_spacing = $rowSpacing; }
				$topNoMargin = (int)$rowCnt === 0 ? ' top-nomargin' : '';

				if( ($rowCnt + 1) % 2 == 0 ) {
					$rowBgColor = $rowEvenColor;
				} else {
					$rowBgColor = $rowOddColor;
				}

			$boxStyle		= !empty($item['box_style']) ? $item['box_style'] : '';
			$boxBgColor		= isset($item['box_bgcolor']) && strlen(trim($item['box_bgcolor'])) > 0 ? trim($item['box_bgcolor']) : '';
			$boxShape		= isset($item['box_shape']) && strlen(trim($item['box_shape'])) > 0 ? trim($item['box_shape']) : '';
			$boxStyleShadow	= !empty($item['box_style_shadow']) ? 'weluka-listblock-boxshadow' : '';


				//v1.0.6
				$_arr = array(
					'media'		=> $mediaHtml,
					'title'		=> $titleHtml,
					'meta1'		=> $meta1Html,
					'meta2'		=> $meta2Html,
					'text'		=> $textHtml,
					'button'	=> $buttonHtml,
					'media_col'	=> $mediaCol,
					'content_col' => $org_contentCol,
					'media_disp'  => $mediaDisp,
					//v1.2 add
					'eqh'			=> $listEqh,
					'box_style'		=> $boxStyle,
					'box_bgcolor'	=> $boxBgColor,
					'box_shape'		=> $boxShape,
					'box_shadow'	=> $boxStyleShadow
				);
				$list .= $this->applist_block( $layoutClass, $_arr, $rowColumn, $colNum, $topNoMargin, $ngmClass, $rowBgClass, $rowBgColor, $_spacing, $colCnt, 'md' );
				$listSm .= $this->applist_block( $layoutClassSm, $_arr, $rowColumnSm, $colNumSm, $topNoMargin, $ngmClass, $rowBgClass, $rowBgColor, $_spacing, $colCntSm, 'sm' );
				$listXs .= $this->applist_block( $layoutClassXs, $_arr, $rowColumnXs, $colNumXs, $topNoMargin, $ngmClass, $rowBgClass, $rowBgColor, $_spacing, $colCntXs, 'xs' );
				//v1.0.6 modify end
				$rowCnt++;
			endforeach;

			//v1.0.6
			//v1.2 eqh, colMode, colNum add
			$list .= $this->applist_end( $layoutClass, $rowColumn, $colCnt, $listEqh, 'md', $colNum );
			$listSm .= $this->applist_end( $layoutClassSm, $rowColumnSm, $colCntSm, $listEqh, 'sm', $colNumSm );
			$listXs .= $this->applist_end( $layoutClassXs, $rowColumnXs, $colCntXs, $listEqh, 'xs', $colNumXs );
			$hiddenClass = '';
			if( $layoutClassSm ) { $hiddenClass = 'hidden-sm'; }
			if( $layoutClassXs ) { $hiddenClass .= ' hidden-xs'; }
			$list = '<div class="weluka-applist-md ' . $hiddenClass . '">' . $list . '</div>';

			if( $listSm ) {
				$hiddenClass = '';
				$hiddenClass = 'weluka-applist-sm hidden-lg hidden-md hidden-xs';
				$listSm = '<div class="' . $hiddenClass . '">' . $listSm . '</div>';
				$list .= $listSm;
			}
			if( $listXs ) {
				$hiddenClass = '';
				$hiddenClass = 'weluka-applist-xs hidden-lg hidden-md hidden-sm';
				$listXs = '<div class="' . $hiddenClass . '">' . $listXs . '</div>';
				$list .= $listXs;
			}
			//v1.0.6 end
		endif;	//datas check endif

		if(strstr($list, "[embed") !== false) {
			$list = $wp_embed->run_shortcode($list); //embed shortcode exec
		}

		//v1.0.4 add
		$cssId = 'weluka_applist_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_borderSize	= isset($item['border_size']) && strlen(trim($item['border_size'])) > 0 ? $item['border_size'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor, $_borderSize );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxSshadowStyle add
		//v1.2 animate.. add
		$content = '<div id="'. $cssId . '" class="weluka-list weluka-content weluka-list-' . $layoutClass . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $list;
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * applist block create
	 * @since 1.0.6
	 * @update
	 * ver1.2
	 */
	public function applist_block( $format, $data, $rowColumn, $colNum, $topNoMargin, $ngmClass, $rowBgClass, $rowBgColor, $spacing, &$colCnt, $colMode = 'md' ) {
		$ret = '';

		//v1.2 add
		$_eqh = '';
		if( !empty( $data['eqh'] ) ) { $_eqh = ' ' . $data['eqh']; }
		$_media = !empty( $data['media'][$colMode] ) ? $data['media'][$colMode] : $data['media']['default'];
		$_boxStyle = '';
		if( !empty( $data['box_style'] ) ) { $_boxStyle = ' ' . $data['box_style']; }
		$_wrapStyle = '';
		if( !empty( $data['box_bgcolor'] ) ) { $_wrapStyle = ' style="background-color:' . $data['box_bgcolor'] . '";'; }
		$_boxShape = '';
		if( !empty( $data['box_shape'] ) ) { $_boxShape = ' ' . $data['box_shape']; }
		$_boxShadow = '';
		if( !empty( $data['box_shadow'] ) ) { $_boxShadow = ' ' . $data['box_shadow']; }
		//v1.2 addend

 		if($format === 'mediatop') {
			$colCnt++;
			if((int)$colCnt === 1) {
				//v1.2 $_eqh add
				$ret .= '<div class="weluka-list-row weluka-row clearfix mediatop' . $topNoMargin . $ngmClass . $_eqh . '" style="' . $spacing . '">';
			}
			//v1.2 wrap modify
			//$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap">';
			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '>';
			//$ret .= $data['media'];
			$ret .= $_media; //v1.2
			$ret .= $data['title'];
			$ret .= $data['meta1'];
			$ret .= $data['meta2'];
			$ret .= $data['text'];

			//v1.2 add modify
			//$ret .= $data['button'];
			if( !empty( $_eqh ) && !empty( $data['button'] ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['button'] . '</div>';
			} else {
				$ret .= $data['button'];
			}

			$ret .= '</div></div>';
					
			if((int)$colCnt === (int)$rowColumn) {
				$ret .= '</div>';	//row end div
				$colCnt = 0;
			}

		}elseif($format === 'mediamiddle'){
			$colCnt++;
			if((int)$colCnt === 1) {
				//v1.2 $_eqh add
				$ret .= '<div class="weluka-list-row weluka-row clearfix mediamiddle' . $topNoMargin . $ngmClass . $_eqh . '" style="' . $spacing . '">';
			}
			//v1.2 wrap modify
			//$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap">';
			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '>';
			$ret .= $data['title'];
			$ret .= $data['meta1'];
			$ret .= $data['meta2'];
			//$ret .= $data['media'];
			$ret .= $_media; //v1.2
			$ret .= $data['text'];

			//v1.2 add modify
			//$ret .= $data['button'];
			if( !empty( $_eqh ) && !empty( $data['button'] ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['button'] . '</div>';
			} else {
				$ret .= $data['button'];
			}

			$ret .= '</div></div>';

			if((int)$colCnt === (int)$rowColumn) {
				$ret .= '</div>';	//row end div
				$colCnt = 0;
			}

		}elseif($format === 'mediabottom'){
			$colCnt++;
			if((int)$colCnt === 1) {
				//v1.2 $_eqh add
				$ret .= '<div class="weluka-list-row weluka-row clearfix mediabottom' . $topNoMargin . $ngmClass . $_eqh . '" style="' . $spacing . '">';
			}
			//v1.2 wrap modify
			//$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap">';
			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '>';
			$ret .= $data['title'];
			$ret .= $data['meta1'];
			$ret .= $data['meta2'];
			$ret .= $data['text'];
			//v1.2 add and modify
			//$ret .= $data['button'];
			//$ret .= $data['media'];
			if( !empty( $_eqh ) && ( !empty( $_media ) || !empty( $data['button'] ) ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['button'] . $_media . '</div>';
			} else {
				$ret .= $data['button'] . $_media;
			}

			$ret .= '</div></div>';

			if((int)$colCnt === (int)$rowColumn) {
				$ret .= '</div>';	//row end div
				$colCnt = 0;
			}

		}elseif($format === 'mediaright') {
			$ret .= '<div class="weluka-list-row weluka-row clearfix mediaright' . $topNoMargin . $rowBgClass . $ngmClass . '" style="' . $spacing . $rowBgColor . '">';
			$_left = ' lt';
			//$mediaHtml = $data['media'];
			$mediaHtml = $_media; //v1.15
			if($data['media_disp'] && $mediaHtml) {
				$media = '<div class="weluka-col weluka-col-' . $colMode . '-' . $data['media_col'] . ' rt">' . $mediaHtml . '</div>';
				$contentCol = $data['content_col'];
			}else{
				$contentCol = 12;
				$_left = ' full';
			}

			//v1.2 wrapper add
			$ret .= '<div class="weluka-col weluka-col-xs-12"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '><div class="weluka-row clearfix ' . $_eqh . '">';

			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $contentCol . $_left . '">';
			$ret .= $data['title'];
			$ret .= $data['meta1'];
			$ret .= $data['meta2'];
			$ret .= $data['text'];

			//v1.2 add modify
			//$ret .= $data['button'];
			if( !empty( $_eqh ) && !empty( $data['button'] ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['button'] . '</div>';
			} else {
				$ret .= $data['button'];
			}

			$ret .= '</div>';
			$ret .= $media;

			$ret .= '</div></div></div>'; //v1.2 wrapper
			$ret .= '</div>';

		}elseif($format === 'medialeft'){
			$ret .= '<div class="weluka-list-row weluka-row clearfix medialeft' . $topNoMargin . $rowBgClass . $ngmClass . '" style="' . $spacing . $rowBgColor . '">';
			$_right = ' rt';

			//v1.2 wrapper add
			$ret .= '<div class="weluka-col weluka-col-xs-12"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '><div class="weluka-row clearfix ' . $_eqh . '">';
			//$mediaHtml =  $data['media'];
			$mediaHtml =  $_media;

			if($data['media_disp'] && $mediaHtml) {
				$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $data['media_col'] . ' lt">' . $mediaHtml . '</div>';
				$contentCol = $data['content_col'];
			}else{
				$contentCol = 12;
				$_right = ' full';
			}
			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $contentCol . $_right . '">';
			$ret .= $data['title'];
			$ret .= $data['meta1'];
			$ret .= $data['meta2'];
			$ret .= $data['text'];
			//v1.2 add modify
			//$ret .= $data['button'];
			if( !empty( $_eqh ) && !empty( $data['button'] ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['button'] . '</div>';
			} else {
				$ret .= $data['button'];
			}
			$ret .= '</div>';
			$ret .= '</div></div></div>'; //v1.2 wrapper
			$ret .= '</div>';
		}
		return $ret;				
	}
	
	/**
	 * applist end
	 * @since 1.0.6
	 * @update
	 * ver1.2
	 * eqh, colMode, colNum add
	 */
	public function applist_end( $format, $rowColumn, $colCnt, $eqh = '', $colMode = 'md', $colNum = 12 ) {
		$ret = '';
		if( $format !== 'medialeft' && $format !== 'mediaright' ) {
			if( (int)$colCnt !== 0 && (int)$colCnt !== (int)$rowColumn) {
				//v1.2
				if( !empty( $eqh ) ) {
					//equal heightの際に最後の行でカラム数が足りないとカラムがフル幅になるのでダミーカラムを追加する。
					$addCnt = (int)$rowColumn - (int)$colCnt;
					for( $i = 0 ; $i < $addCnt; $i++ ) {
						$ret .= '<div class="weluka-col-' . $colMode . '-' . $colNum . ' weluka-list-blank-col"></div>';
					}
				}
				//v1.2 addend
				$ret .= '</div>';
			}
		}
		return $ret;
	}
	
	/**
	 * builder item type = wp_nav_menu data html TODO style
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.3
	 * ver1.0.4
	 * ver1.1.2
	 * ver1.2
	 * ver1.2.1
	 * ver1.2.2
	 * ver1.2.9.6
	 * ver1.3
	 */
	public function widget_wpmenu_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		//ver 1.0.1 $menuTitle = !empty($item['title']) ? esc_attr(trim($item['title'])) : "";
		$menuTitle = !empty($item['title']) ? trim($item['title']) : "";
		$menuLayout = !empty($item['menu_layout']) ? $item['menu_layout'] : "";
		//ver1.0.1
		$customBaseColor	= !empty($item['custom_base_color']) ? $item['custom_base_color'] : "";
		$customBorderColor	= !empty($item['custom_border_color']) ? $item['custom_border_color'] : "";
		$customTextColor 	= !empty($item['custom_text_color']) ? $item['custom_text_color'] : ""; //v1.0.3
		$hideBorder 		= !empty($item['hide_border']) ? $item['hide_border'] : 0;
		$hideBorderStyle = '';
		if ( $hideBorder ) { $hideBorderStyle = 'border:none !important;'; }
		$colorTheme = 'weluka-navbar-default';
		//ver1.0.1 addend
		
		$termId = $ct = "";
		if(isset($item["term_id"]) && trim($item["term_id"]) !== ''){
			$termId = $item["term_id"];

			$menuId = Weluka::get_instance()->create_node_id();

			//v1.1.2 add
			$descFont		= !empty($item['desc_font']) ? $item['desc_font'] : '';
			$descFontSize	= isset($item['desc_font_size']) && strlen(trim($item['desc_font_size'])) > 0 ? trim($item['desc_font_size']) : '';
			$descWeight		= !empty($item['desc_bold']) ?  $item['desc_bold'] : '';
			$descUnderline	= !empty($item['desc_underline']) ? $item['desc_underline'] : '';
			$descItalic		= !empty($item['desc_italic']) ? $item['desc_italic'] : '';
			$descTextColor 	= !empty($item['desc_text_color']) ? $item['desc_text_color'] : '';
			$descAlign		= !empty($item['desc_align']) ? $item['desc_align'] : "weluka-navdesc-top";
			$descFlg		= !empty($item['flg_description']) ? $item['flg_description'] : '';
			//v1.1.2 addend

			if($menuLayout === 'horizontal') {

				$colorTheme	= !empty($item['color_theme']) ? $item['color_theme'] : "weluka-navbar-default";
				$menuAlign	= !empty($item['align']) ? ' ' . $item['align'] : "";
				$menuShape	= !empty($item['shape']) ? ' ' . $item['shape'] : "";
				$font		= !empty($item['font']) ? ' ' . $item['font'] : '';
				$fontSize	= isset($item['font_size']) && strlen(trim($item['font_size'])) > 0 ? ' font-size:' . trim($item['font_size']) . 'px !important;' : '';
				$weight		= !empty($item['bold']) ? ' font-weight:bold !important;' : '';
				$underline	= !empty($item['underline']) ? ' text-decoration:underline !important;' : '';
				$italic		= !empty($item['italic']) ? ' font-style:italic !important;' : '';
//v1.2.9.6 modify				$depth		= $builderMode ? 1 : 0;
//v1.3 modify				$depth		= 2;
				$depth		= $builderMode ? 1 : 10;

				//v1.1.2 add
				$_menuClass = 'nav navbar-nav' . $menuAlign;
				if( $descFlg == 'on' ){
					if($descAlign == 'weluka-navdesc-right' ) {
						$_menuClass .= ' nav-desc-right';
					} else {
						$_menuClass .= ' nav-desc';
					}
				}
				//v1.1.2 addend
				
				$widthFixed	= !empty($item['h_content_width_fixed']) ? $item['h_content_width_fixed'] : 0;
				//v1.1.2 modify description関連追加
				$menu = sprintf(
					'[%s menu="%s" container="div" containerid="%s" containerclass="collapse navbar-collapse" menuclass="%s" depth="%s" descflg="%s" descf="%s" descfs="%s" descw="%s" descul="%s" desci="%s" desctc="%s" descal="%s"]',
					$this->wpmenu_shortcode_tag,
					$termId,
					$menuId,
					//v1.1.2 'nav navbar-nav' . $menuAlign,
					$_menuClass,
					$depth,
					$descFlg,
					$descFont,
					$descFontSize,
					$descWeight,
					$descUnderline,
					$descItalic,
					$descTextColor,
					$descAlign
				);

				//v1.2.1 modify
				//$ct = '<div class="weluka-nav weluka-nav-bar-h navbar clearfix ' . $colorTheme . $menuShape . '" style="' . $font . $fontSize . $weight . $underline . $italic . $hideBorderStyle . '">';
				$ct = '<div class="weluka-nav weluka-nav-bar-h navbar clearfix ' . $colorTheme . $menuShape . '" style="' . $font. $hideBorderStyle . '">';

				if( $widthFixed ) { $ct .= '<div class="weluka-container">'; }

				$ct .= '<div class="navbar-header clearfix">';
    			$ct .= '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#'. $menuId . '">';
      			$ct .= '<span class="sr-only">Navigation</span>';
      			$ct .= '<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>';
    			$ct .= '</button>';
				if($menuTitle !== ''){
					$ct .='<div class="navbar-brand">' . $menuTitle . '</div>';
				}
				$ct .= '</div>';
				
//				if( $widthFixed ) { $ct .= '<div class="weluka-container">'; }

				$ct .= $menu;

				if( $widthFixed ) { $ct .= '</div>'; }

				$ct .= '</div>';
			
			} elseif($menuLayout === 'vertical') {
				$colorTheme	= !empty($item['v_color_theme']) ? $item['v_color_theme'] : "weluka-navbar-default";
				$menuAlign	= !empty($item['v_align']) ? ' ' . $item['v_align'] : "";
				$menuShape	= !empty($item['v_shape']) ? ' ' . $item['v_shape'] : "";
				$font		= !empty($item['v_font']) ? ' ' . $item['v_font'] : '';
				$fontSize	= isset($item['v_font_size']) && strlen(trim($item['v_font_size'])) > 0 ? ' font-size:' . trim($item['v_font_size']) . 'px !important;' : '';
				$weight		= !empty($item['v_bold']) ? ' font-weight:bold !important;' : '';
				$underline	= !empty($item['v_underline']) ? ' text-decoration:underline !important;' : '';
				$italic		= !empty($item['v_italic']) ? ' font-style:italic !important;' : '';
/* v1.1.2 modify
				$menu = sprintf(
					'[%s menu="%s" container="" containerid="" containerclass="" menuclass="nav nav-pills nav-stacked"]',
					$this->wpmenu_shortcode_tag,
					$termId
				); 
*/

				$_menuClass = 'nav nav-pills nav-stacked';
				if( $descFlg == 'on' ){
					$_menuClass .= ' nav-desc';
					if( !$menuAlign || trim($menuAlign) == 'weluka-text-left'){ $_menuClass .= ' nav-desc-left'; }
					if($descAlign == 'weluka-navdesc-top' ) {
						$_menuClass .= ' nav-desc-top';
					}

				}
				
				$menu = sprintf(
					'[%s menu="%s" container="" containerid="" containerclass="" menuclass="%s" descflg="%s" descf="%s" descfs="%s" descw="%s" descul="%s" desci="%s" desctc="%s" descal="%s"]',
					$this->wpmenu_shortcode_tag,
					$termId,
					$_menuClass,
					$descFlg,
					$descFont,
					$descFontSize,
					$descWeight,
					$descUnderline,
					$descItalic,
					$descTextColor,
					$descAlign
				); 
				//v1.1.2 modifyend

				//v1.1.2 modify
				$hideBorderClass = "";
				if ( $hideBorder ) { $hideBorderClass = ' weluka-border-none'; }
				//$ct = '<div class="weluka-nav weluka-nav-bar-v ' . $colorTheme. $menuShape . $menuAlign . '" style="' . $font . $fontSize . $weight . $underline . $italic . '">';
				//v1.2.1 modify $ct = '<div class="weluka-nav weluka-nav-bar-v ' . $colorTheme. $menuShape . $menuAlign . $hideBorderClass . '" style="' . $font . $fontSize . $weight . $underline . $italic . '">';
				$ct = '<div class="weluka-nav weluka-nav-bar-v ' . $colorTheme. $menuShape . $menuAlign . $hideBorderClass . '" style="' . $font . '">';

				if($menuTitle !== ''){
					$ct .='<div class="navbar-brand">' . $menuTitle . '</div>';
				}
				$ct .= $menu;
      			$ct .= '</div>';

			} elseif($menuLayout === 'hamburger') {
				$colorTheme	= !empty($item['ham_color_theme']) ? $item['ham_color_theme'] : "weluka-navbar-default";
				$menuAlign	= !empty($item['ham_align']) ? ' ' . $item['ham_align'] : "";
				$menuShape	= !empty($item['ham_shape']) ? ' ' . $item['ham_shape'] : "";
				$menuSize	= !empty($item['ham_size']) ? ' ' . $item['ham_size'] : "";
				$font		= !empty($item['ham_font']) ? ' ' . $item['ham_font'] : '';
				$fontSize	= isset($item['ham_font_size']) && strlen(trim($item['ham_font_size'])) > 0 ? ' font-size:' . trim($item['ham_font_size']) . 'px !important;' : '';
				$weight		= !empty($item['ham_bold']) ? ' font-weight:bold !important;' : '';
				$underline	= !empty($item['ham_underline']) ? ' text-decoration:underline !important;' : '';
				$italic		= !empty($item['ham_italic']) ? ' font-style:italic !important;' : '';

			/* v1.1.2 modify
				$menu = sprintf(
					'[%s menu="%s" container="div" containerid="%s" containerclass="weluka-collapse" menuclass="%s"]',
					$this->wpmenu_shortcode_tag,
					$termId,
					$menuId,
					'nav navbar-nav ' . $colorTheme . $menuShape
				); 
			*/
				$_menuClass = 'nav navbar-nav ' . $colorTheme . $menuShape;
				if( $descFlg == 'on' ){
					if($descAlign == 'weluka-navdesc-right' ) {
						$_menuClass .= ' nav-desc-right';
					} else {
						$_menuClass .= ' nav-desc';
					}
				}

				$menu = sprintf(
					'[%s menu="%s" container="div" containerid="%s" containerclass="weluka-collapse" menuclass="%s" descflg="%s" descf="%s" descfs="%s" descw="%s" descul="%s" desci="%s" desctc="%s" descal="%s"]',
					$this->wpmenu_shortcode_tag,
					$termId,
					$menuId,
					$_menuClass,
					$descFlg,
					$descFont,
					$descFontSize,
					$descWeight,
					$descUnderline,
					$descItalic,
					$descTextColor,
					$descAlign
				); 

				//v1.1.2 modify end

				$hamAlign = '';
				//v1.1.2
				$hamDrower = '';
				$hamDrowerCssData = '';
				$hamBtnId = Weluka::get_instance()->create_node_id();
				if( !empty($item['ham_drower']) && $item['ham_drower'] == 'on' ) {
					$hamDrower = ' weluka-ham-drower';
					if( trim($menuAlign) == "navbar-right" ) { $hamDrower .= " weluka-ham-drower-right"; } else { $hamDrower .= " weluka-ham-drower-left"; }

					$drowerWidth = isset($item['ham_drower_width']) && strlen(trim($item['ham_drower_width'])) > 0 ? ' data-width="' . trim($item['ham_drower_width']) . '"' : '';
					$hamDrowerCssData = $drowerWidth;
				}
				//$ct = '<div class="weluka-nav weluka-nav-bar-ham clearfix ' . $menuAlign . '" style="' . $font . $fontSize . $weight . $underline . $italic . '">';
    			//$ct .= '<button type="button" class="navbar-toggle weluka-toggle ' . $colorTheme . $menuShape . $menuSize . '" data-target="#' . $menuId . '" style="' . $hideBorderStyle . '">';
				//v1.2.1 modify $ct = '<div class="weluka-nav weluka-nav-bar-ham clearfix ' . $menuAlign . $hamDrower . '" style="' . $font . $fontSize . $weight . $underline . $italic . '"' . $hamDrowerCssData . '>';
				$ct = '<div class="weluka-nav weluka-nav-bar-ham clearfix ' . $menuAlign . $hamDrower . '" style="' . $font . '"' . $hamDrowerCssData . '>';

    			$ct .= '<button id="' . $hamBtnId . '" type="button" class="navbar-toggle weluka-toggle ' . $colorTheme . $menuShape . $menuSize . '" data-target="#' . $menuId . '" style="' . $hideBorderStyle . '">';
				//v1.1.2 end
      			$ct .= '<span class="sr-only">Navigation</span>';
      			$ct .= '<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>';
    			$ct .= '</button>';
				$ct .= $menu;
				$ct .= '</div>';
				
			} else {
				$ct = sprintf(
					'[%s title="%s" navmenu="%s"]',
					$this->wpmenu_shortcode_tag2,
					$menuTitle,
					$termId
				); 

			}
		}else{
			$ct = '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please enter wordpress custom menu.', Weluka::$settings['plugin_name']) . '</div>';
		}
		//ver1.0.1
		$idStr = '';
		$_cssid = '';	//v1.2.1 add
		$customStyle = '';
		if( $customBaseColor || $customBorderColor || $customTextColor ) {
			$_id =  'weluka_wpmenu_' . Weluka::get_instance()->create_node_id();
			$_id2 = '#' . $_id;
			$_cssid = $_id;	//v1.2.1 add
			$idStr = 'id="' . $_id . '" ';
			//v1.2.1 comment $customStyle = '<div style="display:none;"><style>';
			if( $customBaseColor ) {
				$customStyle .=
				$_id2 . ' .' . $colorTheme . ' ,' . 
				$_id2 . ' .' . $colorTheme . ' .dropdown-menu,' .
				$_id2 . ' .weluka-nav-bar-h.' . $colorTheme . ' .navbar-toggle' .
				'{ background-color: ' . $customBaseColor . ' !important; }' . PHP_EOL;
			}
			if( $customBorderColor ) {
				$customStyle .=
					$_id2 . ' .' . $colorTheme . ',' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu,' . 
					$_id2 . ' .' . $colorTheme . ' a:hover,' .
					$_id2 . ' .' . $colorTheme . ' a:focus' .
					$_id2 . ' .' . $colorTheme . ' .open > a,' .
					$_id2 . ' .' . $colorTheme . ' .open a:hover,' .
					$_id2 . ' .' . $colorTheme . ' .open a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu a:hover,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .navbar-toggle,' .
					$_id2 . ' .' . $colorTheme . ' .navbar-collapse,' .
					$_id2 . ' .weluka-nav-bar-v.' . $colorTheme . ' .nav,' .
					$_id2 . ' .weluka-nav-bar-v.' . $colorTheme . ' .nav li,' .
					$_id2 . ' .weluka-nav-bar-ham .nav.' . $colorTheme . ',' .
					$_id2 . ' .weluka-nav-bar-ham .weluka-toggle.' . $colorTheme .
					'{ border-color: ' . $customBorderColor . ' !important; }' . PHP_EOL;
				$customStyle .=
					$_id2 . ' .' . $colorTheme . ' a:hover,' .
					$_id2 . ' .' . $colorTheme . ' a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .open > a,' .
					$_id2 . ' .' . $colorTheme . ' .open a:hover,' .
					$_id2 . ' .' . $colorTheme . ' .open a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu a:hover,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu a:focus,' .
					$_id2 . ' .' . $colorTheme . ' .navbar-toggle:hover,' .
					$_id2 . ' .' . $colorTheme . ' .navbar-toggle:focus,' .
					$_id2 . ' .weluka-nav-bar-ham .weluka-toggle.' . $colorTheme . ':hover,' .
					$_id2 . ' .weluka-nav-bar-ham .weluka-toggle.' . $colorTheme . ':focus' .
					'{ background-color: ' . $customBorderColor . ' !important; }' . PHP_EOL;
			}
			if( $customTextColor ) {
				$customStyle .=
					$_id2 . ' .' . $colorTheme . ',' .
					$_id2 . ' .' . $colorTheme . ' .navbar-brand,' .
					$_id2 . ' .' . $colorTheme . ' a,' .
					$_id2 . ' .' . $colorTheme . ' .dropdown-menu,' .
					$_id2 . ' .weluka-nav-bar-ham .nav.' . $colorTheme .
					'{ color: ' . $customTextColor . ' !important; }' . PHP_EOL;
				$customStyle .=
					$_id2 . ' .' . $colorTheme . ' .navbar-toggle .icon-bar,' .
					$_id2 . ' .weluka-nav-bar-ham .weluka-toggle.' . $colorTheme . ' .icon-bar' .
					'{ background-color: ' . $customTextColor . ' !important; }' . PHP_EOL;
			}

			//v1.2.1 comment $customStyle .= '</style></div>';
		}
		//$content .= '<div class="weluka-wp-widget weluka-wpmenu weluka-content clearfix' . $class . $cssClass . '" ' . $style . '>';
		//v1.2.1 comment $content .= $customStyle;

		//v1.0.4 add
		if( !$idStr ) {
			//v1.2.1 modify
			//$idStr = 'id="weluka_wpmenu_' . Weluka::get_instance()->create_node_id() . '"';
			$_cssid =  'weluka_wpmenu_' . Weluka::get_instance()->create_node_id();
			$idStr = 'id="' . $_cssid . '"';
		}
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2.1 add
		//menu item fontSize, fontweight italic underline をcustomCssに追加
		if( !empty($fontSize) || !empty($weight) || !empty($underline) || !empty($italic) ){
			$_id2 = '#' . $_cssid;
			
			if( !empty( $fontSize ) ) {
				$customStyle .=
					$_id2 . ' .nav > li > a > span.linktext { ' . $fontSize . ' }' . PHP_EOL;
			}

			if( !empty( $weight ) ) {
				$customStyle .=
					$_id2 . ' .nav > li > a > span.linktext { ' . $weight . ' }' . PHP_EOL;
			}
			if( !empty( $underline ) ) {
				$customStyle .=
					$_id2 . ' .nav > li > a > span.linktext { ' . $underline . ' }' . PHP_EOL;
			}
			if( !empty( $italic ) ) {
				$customStyle .=
					$_id2 . ' .nav > li > a > span.linktext { ' . $italic . ' }' . PHP_EOL;
			}

		}
		if( $customStyle ) {
			$content .= '<div style="display:none;"><style>' . $customStyle . '</style></div>';
		}
		//v1.2.1 addend
		
		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );
		//v1.2 animate... add
		//v1.2.2 id class space add
		$content .= '<div ' . $idStr . ' class="weluka-wp-widget weluka-wpmenu weluka-content clearfix' . $class . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		//ver1.0.1
		$content .= $ct;
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_archives data html TODO style
	 * @since 1.0
	 * @update
	 * ver 1.0.4
	 * ver 1.2
	 */
	public function widget_wparchives_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";

		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$showType = isset($item['show_type']) && strlen(trim($item['show_type'])) > 0 ? $item['show_type'] : "monthly"; //default ym
		
		$showCount = false;
		if(isset($item['show_post_count']) && $item['show_post_count']){ $showCount = true; }

		$showFormat = isset($item['show_format']) && strlen(trim($item['show_format'])) > 0 ? $item['show_format'] : "html";
		$showLimit = isset($item['show_limit']) && strlen(trim($item['show_limit'])) > 0 ? $item['show_limit'] : "";

		$ct = sprintf(
			'[%s title="%s" showtype="%s" showcount="%s" showformat="%s" showlimit="%s"]',
			$this->wparchives_shortcode_tag,
			$title,
			$showType,
			$showCount,
			$showFormat,
			$showLimit
		); 

		//v1.0.4 add
		$cssId = 'weluka_wparchives_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend
		
		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wparchives weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';
		
		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_calendar data html TODO style
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_wpcalendar_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr($item['title']) : "";

		$ct = sprintf( '[%s title="%s"]', $this->wpcalendar_shortcode_tag, $title ); 

		//v1.0.4 add
		$cssId = 'weluka_wpcalendar_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wpcalendar weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_categories data html TODO style
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_wpcategories_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		
		$showCount = false;
		if(isset($item['show_post_count']) && $item['show_post_count']){ $showCount = true; }

		$showDropdown = false;
		if(isset($item['show_dropdown']) && $item['show_dropdown']){ $showDropdown = true; }

		$hierarchical = false;
		if(isset($item['hierarchical']) && $item['hierarchical']){ $hierarchical = true; }

		$ct = sprintf( '[%s title="%s" count="%s" hierarchical="%s" dropdown="%s"]',
			$this->wpcategories_shortcode_tag, $title, $showCount, $hierarchical, $showDropdown
		);

		//v1.0.4 add
		$cssId = 'weluka_wpcategories_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wpcategories weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_meta data html TODO style
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_wpmeta_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		//$cssId = isset($item['cssId']) && strlen(trim($item['cssId'])) > 0 ? 'id="' . $item['cssId'] . '"' : "";
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr($item['title']) : "";

		//v1.0.4 add
		$cssId = 'weluka_wpmeta_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		$ct = sprintf( '[%s title="%s"]', $this->wpmeta_shortcode_tag, $title );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate ... add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wpmeta weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_pages data html
	 * @since 1.0
	 * @update
	 * ver 1.0.4
	 * ver 1.1.4
	 * ver 1.2
	 */
	public function widget_wppages_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$sortby = isset($item['sortby']) && strlen(trim($item['sortby'])) > 0 ? trim($item['sortby']) : "menu_order";
		$excludes = isset($item['excludes']) && strlen(trim($item['excludes'])) > 0 ? trim($item['excludes']) : "";

		$ct = sprintf( '[%s title="%s" sortby="%s" exclude="%s"]',
			$this->wppages_shortcode_tag, $title, $sortby, $excludes
		); 

		//v1.0.4 add
		$cssId = 'weluka_wppages_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wppages weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_comments data html TODO style
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_wpcomments_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$limit = isset($item['comment_limit']) && strlen(trim($item['comment_limit'])) > 0 ? trim($item['comment_limit']) : 5;

		$ct = sprintf( '[%s title="%s" number="%s"]',
			$this->wpcomments_shortcode_tag, $title, $limit
		); 

		//v1.0.4 add
		$cssId = 'weluka_wpcomments_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wpcomments weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_posts data html
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.2
	 * ver1.0.4
	 * ver1.0.6
	 * ver1.1
	 * ver1.1.4
	 * ver1.2
	 * ver1.2.3
	 * ver1.2.7.1
	 */
	public function widget_wpposts_html($item, $echo = true) {
		global $post, $wp_embed;
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$height = isset($item['list_height']) && strlen(trim($item['list_height'])) > 0 ? trim($item['list_height']) : "";

		$allUrl = isset($item['all_post_url']) ? esc_url(trim($item['all_post_url'])) : "";
		$allLinkStr = isset($item['all_post_link_string']) ? esc_attr(trim($item['all_post_link_string'])) : __("All Posts", Weluka::$settings['plugin_name']);

		$limit = isset($item['post_limit']) ? trim($item['post_limit']) : 5;
		//v1.1 add
		$flg_paging	= !empty( $item['flg_paging'] ) ? $item['flg_paging'] : 0;
		$pagenum 	= isset($item['post_pagenum']) ? trim($item['post_pagenum']) : '';
		//v1.1 addend
		
		//v1.1.4 add category or tagcloud
		$targettype = isset($item['target_type']) ? $item['target_type'] : "category";
		$csttaxonomy = isset($item['csttaxonomy']) ? $item['csttaxonomy'] : "";
		$ptypes = isset($item['post_types']) ? trim($item['post_types']) : "post";
		//v1.1.4 add end
		
		$categories = isset($item['categories']) ? trim($item['categories']) : "";
		$dispItem['flgTitle'] = isset($item['flg_post_title']) ? $item['flg_post_title'] : 1;
		$dispItem['flgDate'] = isset($item['flg_post_date']) ? $item['flg_post_date'] : 0;
		$dispItem['flgAuthor'] = isset($item['flg_post_author']) ? $item['flg_post_author'] : 0;
		$dispItem['flgCategory'] = isset($item['flg_post_category']) ? $item['flg_post_category'] : 0;
		$dispItem['flgExcerpt'] = isset($item['flg_post_excerpt']) ? $item['flg_post_excerpt'] : 0;
		$dispItem['flgThumbnail'] = isset($item['flg_post_thumbnail']) ? $item['flg_post_thumbnail'] : 0;
		$dispItem['flgComment'] = isset($item['flg_post_comment']) ? $item['flg_post_comment'] : 0;
		$dispItem['flgModifyDate'] = isset($item['flg_modify_date']) ? $item['flg_modify_date'] : 0; //v1.0.4
		$dispItem['flgOnExcerpt'] = isset($item['flg_on_excerpt']) ? $item['flg_on_excerpt'] : 0; //v1.2.7.1

		//ver1.0.1
		$dispItem['flgTagcloud'] = isset($item['flg_post_tagcloud']) ? $item['flg_post_tagcloud'] : 0;
		$dispItem['tagcloudPos']= !empty($item['tagcloud_pos']) ? $item['tagcloud_pos'] : 'metabottom';
		//ver1.0.1 addend
		$dispItem['layoutClass']		= isset($item['layout_class']) && $item['layout_class'] !== '' ? $item['layout_class'] : 'mediatop';
		$dispItem['mediaCol']			= !empty($item['media_col']) ? $item['media_col'] : 4;
		$dispItem['contentCol']			= (int)self::MAX_COLUMN - (int)$dispItem['mediaCol'];
		$rowSpacing			= isset($item['row_spacing']) && trim($item['row_spacing']) !== '' ? 'margin-top:' . trim($item['row_spacing']) . 'px;' : '';
		$rowColumn			= isset($item['row_column']) && strlen(trim($item['row_column'])) > 0 ? trim($item['row_column']) : 1;
		$rowOddColor		= isset($item['row_odd_color']) && strlen(trim($item['row_odd_color'])) > 0 ? ' background-color:' . trim($item['row_odd_color']) . ';' : "";
		$rowEvenColor		= isset($item['row_even_color']) && strlen(trim($item['row_even_color'])) > 0 ? ' background-color:' . trim($item['row_even_color']) . ';' : "";

		$dispItem['titleStringNum'] 	= isset($item['title_string_num']) && strlen(trim($item['title_string_num'])) > 0 ? trim($item['title_string_num']) : ''; //v1.1 add

		$dispItem['excerptStringNum'] 	= isset($item['excerpt_string_num']) && strlen(trim($item['excerpt_string_num'])) > 0 ? trim($item['excerpt_string_num']) : 110;
		$ngmClass			= ($rowOddColor !== '' || $rowEvenColor !== '') ? ' weluka-row-negative-margin-clear' : '';
		$rowBgClass			= ($rowOddColor !== '' || $rowEvenColor !== '') ? ' weluka-list-row-bgcolor' : '';

		//v1.0.6 add
		$listFormatSm	= isset( $item['layout_class_sm'] ) && $item['layout_class_sm'] !== '' ? $item['layout_class_sm'] : '';
		$rowColumnSm	= isset( $item['row_column_sm'] ) && strlen(trim($item['row_column_sm'])) > 0 ? trim($item['row_column_sm']) : 1;	
		$dispItem['layoutClassSm'] = $listFormatSm;

		$listFormatXs	= isset( $item['layout_class_xs'] ) && $item['layout_class_xs'] !== '' ? $item['layout_class_xs'] : '';
		$rowColumnXs	= isset( $item['row_column_xs'] ) && strlen(trim($item['row_column_xs'])) > 0 ? trim($item['row_column_xs']) : 1;	
		$dispItem['layoutClassXs'] = $listFormatXs;
		//v1.0.6 addend

		//v1.2 add
		$thumbHeight	= isset( $item['thumb_height'] ) ? trim( $item['thumb_height'] ) : '';
		$thumbHeightSm	= isset( $item['thumb_height_sm'] ) ? trim( $item['thumb_height_sm'] ) : '';
		$thumbHeightXs	= isset( $item['thumb_height_xs'] ) ? trim( $item['thumb_height_xs'] ) : '';
		$listEqh		= isset( $item['list_eqh'] ) ? $item['list_eqh'] : 0;
		//v1.2 addend
				
		//media design
		$dispItem['mediaAlign']			= !empty($item['media_align']) ? $item['media_align'] : 'weluka-text-left';
		$dispItem['mediaBorderColor']	= !empty($item['media_border_color']) ? trim($item['media_border_color']) : '';
		$dispItem['mediaBorderStyle']	= !empty($item['media_border_style']) ? trim($item['media_border_style']) : '';
		$dispItem['mediaBorderSize']	= !empty($item['media_border_size']) ? trim($item['media_border_size']) : '';
		$dispItem['mediaShape']			= !empty($item['media_shape']) ? $item['media_shape'] : '';
		$dispItem['mediaRadiusSize']	= !empty($item['media_radius_size']) ? trim($item['media_radius_size']) : '';	//v1.2.3
		$dispItem['mediaLazyLoad']	    = !empty($item['media_lazyload']) ? $item['media_lazyload'] : '';	//v1.2.7

		//post title design
		$dispItem['titleTag']		= !empty($item['title_html_tag']) ? $item['title_html_tag'] : 'h4';
		$dispItem['titleAlign']		= !empty($item['title_align']) ? ' ' . $item['title_align'] : '';
		$dispItem['titleFont']		= !empty($item['title_font']) ? ' ' . $item['title_font'] : '';
		$dispItem['titleFontSize']	= isset($item['title_font_size']) && strlen(trim($item['title_font_size'])) > 0 ? ' font-size:' . trim($item['title_font_size']) . 'px;' : '';
		$dispItem['titleColor']		= isset($item['title_color']) && strlen(trim($item['title_color'])) > 0 ? ' color:' . trim($item['title_color']) . ';' : '';
		$dispItem['titleWeight']	= !empty($item['title_bold']) ? ' font-weight:bold;' : '';
		$dispItem['titleUnderline']	= !empty($item['title_underline']) ? ' text-decoration:underline;' : '';
		$dispItem['titleItalic']	= !empty($item['title_italic']) ? ' font-style:italic;' : '';

		//meta common design
		$dispItem['metaAlign']		= !empty($item['meta_align']) ? ' ' . $item['meta_align'] : '';
		
		$dispItem['dateFont']		= !empty($item['date_font']) ? ' ' . $item['date_font'] : '';
		$dispItem['dateFontSize']	= isset($item['date_font_size']) && strlen(trim($item['date_font_size'])) > 0 ? ' font-size:' . trim($item['date_font_size']) . 'px;' : '';
		$dispItem['dateColor']		= isset($item['date_color']) && strlen(trim($item['date_color'])) > 0 ? ' color:' . trim($item['date_color']) . ';' : '';
		$dispItem['dateWeight']		= !empty($item['date_bold']) ? ' font-weight:bold;' : '';
		$dispItem['dateUnderline']	= !empty($item['date_underline']) ? ' text-decoration:underline;' : '';
		$dispItem['dateItalic']		= !empty($item['date_italic']) ? ' font-style:italic;' : '';
		//date design
		$dispItem['dateFormat'] 	= isset($item['date_format']) && strlen(trim($item['date_format'])) > 0 ? trim($item['date_format']) : "";
		if( class_exists( 'WelukaTheme', false ) && empty( $dispItem['dateFormat'] ) ) {
			//v1.0.2
			//$_wk = WelukaAdminSettings::get_site_options( WelukaTheme::get_instance()->get_option_name(), WelukaTheme::POST_DATE_FORMAT );
			$_wk = WelukaAdminSettings::get_site_options( WelukaTheme::get_instance()->get_option_name(), WelukaTheme::POST_DATE_FORMAT, true );
			//v1.0.2 end
			$dispItem['dateFormat'] = !empty( $_wk ) ? $_wk : '';
		}

		//author design
		$dispItem['authorFont']			= !empty($item['author_font']) ? ' ' . $item['author_font'] : '';
		$dispItem['authorFontSize']		= isset($item['author_font_size']) && strlen(trim($item['author_font_size'])) > 0 ? ' font-size:' . trim($item['author_font_size']) . 'px;' : '';
		$dispItem['authorColor']		= isset($item['author_color']) && strlen(trim($item['author_color'])) > 0 ? ' color:' . trim($item['author_color']) . ';' : '';
		$dispItem['authorWeight']		= !empty($item['author_bold']) ? ' font-weight:bold;' : '';
		$dispItem['authorUnderline']	= !empty($item['author_underline']) ? ' text-decoration:underline;' : '';
		$dispItem['authorItalic']		= !empty($item['author_italic']) ? ' font-style:italic;' : '';

		//category design
		$dispItem['categoryFont']		= !empty($item['category_font']) ? ' ' . $item['category_font'] : '';
		$dispItem['categoryFontSize']	= isset($item['category_font_size']) && strlen(trim($item['category_font_size'])) > 0 ? ' font-size:' . trim($item['category_font_size']) . 'px;' : '';
		$dispItem['categoryColor']		= isset($item['category_color']) && strlen(trim($item['category_color'])) > 0 ? ' color:' . trim($item['category_color']) . ';' : '';
		$dispItem['categoryWeight']		= !empty($item['category_bold']) ? ' font-weight:bold;' : '';
		$dispItem['categoryUnderline']	= !empty($item['category_underline']) ? ' text-decoration:underline;' : '';
		$dispItem['categoryItalic']		= !empty($item['category_italic']) ? ' font-style:italic;' : '';

		//content(excerpt design
		$dispItem['contentAlign']		= !empty($item['content_align']) ? ' ' . $item['content_align'] : '';
		$dispItem['contentFont']		= !empty($item['content_font']) ? ' ' . $item['content_font'] : '';
		$dispItem['contentFontSize']	= isset($item['content_font_size']) && strlen(trim($item['content_font_size'])) > 0 ? ' font-size:' . trim($item['content_font_size']) . 'px;' : '';
		$dispItem['contentColor']		= isset($item['content_color']) && strlen(trim($item['content_color'])) > 0 ? ' color:' . trim($item['content_color']) . ';' : '';

		//more button design
		$dispItem['moreButton']['text']			= isset($item['more_string']) ? trim($item['more_string']) : '';
		$dispItem['moreButton']['class_name']		= !empty($item['more_button_align']) ? $item['more_button_align'] : '';
		$dispItem['moreButton']['button_color']	= !empty($item['more_button_color']) ? $item['more_button_color'] : 'weluka-btn-info';
		$dispItem['moreButton']['shape']		= !empty($item['more_button_shape']) ? $item['more_button_shape'] : '';
		$dispItem['moreButton']['size']			= !empty($item['more_button_size']) ? $item['more_button_size'] : '';
		$dispItem['moreButton']['block']		= !empty($item['more_button_block']) ? $item['more_button_block'] : '';

		//v1.2 add
		$boxStyle		= !empty($item['box_style']) ? $item['box_style'] : '';
		$boxBgColor		= isset($item['box_bgcolor']) && strlen(trim($item['box_bgcolor'])) > 0 ? trim($item['box_bgcolor']) : '';
		$boxShape		= isset($item['box_shape']) && strlen(trim($item['box_shape'])) > 0 ? trim($item['box_shape']) : '';
		$boxStyleShadow	= !empty($item['box_style_shadow']) ? 'weluka-listblock-boxshadow' : '';
		//v1.2 addend

		//$wrap = '';
		//if( $dispItem['layoutClass'] !== 'default' ) { $wrap = ' weluka-list-custom'; }
		$ct = '<div class="widget widget_recent_entries weluka-list weluka-list-' . $dispItem['layoutClass'] . '">';
		if($title !== "") {
			$ct .= '<h3 class="widgettitle weluka-widgettitle">' . esc_attr($title) . '</h3>';
		}

		//v1.1 titlestringnum="%s" flgpaging="%s" pagenum="%s"
		//v1.1.4 targettype, posttypes, csttaxonomy add
		//v1.2 thumbh, thumbhsm, thumbhxs, eqh, boxstyle, boxbgcolor, boxshape boxstyleshadow add
		//v1.2.3 mediaradiussize add
		//v1.2.7.1 onexcerpt add
		$sh = sprintf(
			'[%s height="%s" categories="%s" limit="%s" flgtitle="%s" flgdate="%s" flgauthor="%s" flgcategory="%s" flgexcerpt="%s" flgthumbnail="%s" flgcomment="%s" layoutclass="%s" mediacol="%s" rowspacing="%s" rowcolumn="%s" rowoddcolor="%s" rowevencolor="%s" excerptstringnum="%s" mediaalign="%s" mediabordercolor="%s" mediaborderstyle="%s" mediabordersize="%s" mediashape="%s" titletag="%s" titlealign="%s" titlefont="%s" titlefontsize="%s" titlecolor="%s" titleweight="%s" titleunderline="%s" titleitalic="%s" metaalign="%s" datefont="%s" datefontsize="%s" datecolor="%s" dateweight="%s" dateunderline="%s" dateitalic="%s" dateformat="%s" authorfont="%s" authorfontsize="%s" authorcolor="%s" authorweight="%s" authorunderline="%s" authoritalic="%s" categoryfont="%s" categoryfontsize="%s" categorycolor="%s" categoryweight="%s" categoryunderline="%s" categoryitalic="%s" contentalign="%s" contentfont="%s" contentfontsize="%s" contentcolor="%s" morebuttontext="%s" morebuttonclassname="%s" morebuttonbuttoncolor="%s" morebuttonshape="%s" morebuttonsize="%s" morebuttonblock="%s" allurl="%s" alllinkstr="%s" allbuttonclassname="%s" allbuttonbuttoncolor="%s" allbuttonshape="%s" allbuttonsize="%s" allbuttonblock="%s" flgtagcloud="%s" tagcloudpos="%s" flgmodifydate="%s" layoutclasssm="%s" rowcolumnsm="%s" layoutclassxs="%s" rowcolumnxs="%s" titlestringnum="%s" flgpaging="%s" pagenum="%s" targettype="%s" posttypes="%s" csttaxonomy="%s" thumbh="%s" thumbhsm="%s" thumbhxs="%s" eqh="%s" boxstyle="%s" boxbgcolor="%s" boxshape="%s" boxstyleshadow="%s" mediaradiussize="%s" medialazyload="%s" onexcerpt="%s"]',
			$this->wpposts_shortcode_tag,
			$height,
			$categories,
			$limit,
			$dispItem['flgTitle'],
			$dispItem['flgDate'],
			$dispItem['flgAuthor'],
			$dispItem['flgCategory'],
			$dispItem['flgExcerpt'],
			$dispItem['flgThumbnail'],
			$dispItem['flgComment'],
			$dispItem['layoutClass'],
			$dispItem['mediaCol'],
			$rowSpacing,
			$rowColumn,
			$rowOddColor,
			$rowEvenColor,
			$dispItem['excerptStringNum'],
			$dispItem['mediaAlign'],
			$dispItem['mediaBorderColor'],
			$dispItem['mediaBorderStyle'],
			$dispItem['mediaBorderSize'],
			$dispItem['mediaShape'],
			$dispItem['titleTag'],
			$dispItem['titleAlign'],
			$dispItem['titleFont'],
			$dispItem['titleFontSize'],
			$dispItem['titleColor'],
			$dispItem['titleWeight'],
			$dispItem['titleUnderline'],
			$dispItem['titleItalic'],
			$dispItem['metaAlign'],
			$dispItem['dateFont'],
			$dispItem['dateFontSize'],
			$dispItem['dateColor'],
			$dispItem['dateWeight'],
			$dispItem['dateUnderline'],
			$dispItem['dateItalic'],
			$dispItem['dateFormat'],
			$dispItem['authorFont'],
			$dispItem['authorFontSize'],
			$dispItem['authorColor'],
			$dispItem['authorWeight'],
			$dispItem['authorUnderline'],
			$dispItem['authorItalic'],
			$dispItem['categoryFont'],
			$dispItem['categoryFontSize'],
			$dispItem['categoryColor'],
			$dispItem['categoryWeight'],
			$dispItem['categoryUnderline'],
			$dispItem['categoryItalic'],
			$dispItem['contentAlign'],
			$dispItem['contentFont'],
			$dispItem['contentFontSize'],
			$dispItem['contentColor'],
			$dispItem['moreButton']['text'],
			$dispItem['moreButton']['class_name'],
			$dispItem['moreButton']['button_color'],
			$dispItem['moreButton']['shape'],
			$dispItem['moreButton']['size'],
			$dispItem['moreButton']['block'],
			$allUrl,
			$allLinkStr,
			!empty($item['all_button_align']) ? $item['all_button_align'] : '',
			!empty($item['all_button_color']) ? $item['all_button_color'] : 'weluka-btn-link',
			!empty($item['all_button_shape']) ? $item['all_button_shape'] : '',
			!empty($item['all_button_size']) ? $item['all_button_size'] : '',
			!empty($item['all_button_block']) ? $item['all_button_block'] : '',
			$dispItem['flgTagcloud'],
			$dispItem['tagcloudPos'],
			$dispItem['flgModifyDate'],
			$dispItem['layoutClassSm'],
			$rowColumnSm,
			$dispItem['layoutClassXs'],
			$rowColumnXs,
			$dispItem['titleStringNum'],
			$flg_paging,
			$pagenum,
			$targettype,
			$ptypes,
			$csttaxonomy,
			$thumbHeight,
			$thumbHeightSm,
			$thumbHeightXs,
			$listEqh,
			$boxStyle,
			$boxBgColor,
			$boxShape,
			$boxStyleShadow,
			$dispItem['mediaRadiusSize'],
			$dispItem['mediaLazyLoad'],
			$dispItem['flgOnExcerpt']
		);

		$ct .= $sh;

		$ct .= '</div>';
		
		if(strstr($ct, "[embed") !== false) {
			$ct = $wp_embed->run_shortcode($ct); //embed shortcode exec
		}

		//v1.0.4 add
		$cssId = 'weluka_wpposts_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxshadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wpposts weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}
	
	/**
	 * builder item type = wp_posts list content html
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.4
	 * ver1.0.6
	 * ver1.1
	 * ver1.1.2
	 * ver1.1.4
	 * ver1.2
	 * ver1.2.3
	 * ver1.2.7.1
	 */
	public function recentpost_content($postData, $dispItem) {
		$ret = array('', '', ''); //v1.0.6 "";
		$_linkTarget = "";
		$_link	= get_permalink($postData->ID);

		$_title = get_the_title($postData->ID);

		$titleHtml = "";
		if( $dispItem['flgTitle'] ) {
			//v1.1 add
			$_titleDisp = $_title;
			if( $dispItem['titleStringNum'] !== '' ) { $_titleDisp = $this->truncate_string( $_title, $dispItem['titleStringNum'], false, true ); } 
			//v1.1 addend

			$titleHtml = '<' . $dispItem['titleTag']. ' class="weluka-list-title' . $dispItem['titleAlign'] . '" style="' . $dispItem['titleFont'] . $dispItem['titleFontSize'] . $dispItem['titleColor'] . $dispItem['titleWeight'] . $dispItem['titleUnderline'] . $dispItem['titleItalic'] . '">{%TITLE%}</' . $dispItem['titleTag'] . '>';
			$s = "";
			if( $_link ) {
				$s = '<a href="' . esc_url($_link) . '"' . $_linkTarget . ' title="' . esc_attr($_title) . '">' . $_titleDisp . '</a>'; //v1.1 $_titleDisp
			} else {
				$s = $_titleDisp; //v1.1 $_titleDisp
			}

			$titleHtml = str_replace("{%TITLE%}", $s, $titleHtml);
		}

		//sticky post
		$stickyHtml = "";
		if ( is_sticky() ) {
			$stickyHtml = sprintf( '<span class="weluka-post-sticky">%s</span>', __( 'Featured', Weluka::$settings['plugin_name'] ) );
		}
		$dateHtml = "";
		if($dispItem['flgDate']) {
			//$_date = get_the_date($dispItem['dateFormat']);
			// add v1.2.8
			$flgModifyDate = (int) $dispItem['flgModifyDate'] === 2 ? 0 : $dispItem['flgModifyDate'];
			$_date = Weluka::get_instance()->get_the_postdate($flgModifyDate, $dispItem['dateFormat'], false ); //v1.0.4
			$dateHtml = '<span class="weluka-post-date" style="' . $dispItem['dateFont'] . $dispItem['dateFontSize'] . $dispItem['dateColor'] . $dispItem['dateWeight'] . $dispItem['dateUnderline'] . $dispItem['dateItalic'] . '">' . $_date . '</span>';
		}

		$catHtml = "";
		if($dispItem['flgCategory']) {
			//$cats = get_the_category();
/* 1.1.4 commentout
			if ( !empty( $cats ) ) {
				$n = 0;
				foreach ( $cats as $index => $cat ) {
					$p = $n === 0 ? '&nbsp;|&nbsp;' : '&nbsp;&nbsp;'; 
					//v1.1.2 modify
					//$catHtml .= $p . '&nbsp;&nbsp;<span class="weluka-post-category-name" style="' . $dispItem['categoryFont'] . $dispItem['categoryFontSize'] . $dispItem['categoryColor'] . $dispItem['categoryWeight'] . $dispItem['categoryUnderline'] . $dispItem['categoryItalic'] . '"><a href="' . get_category_link( $cat ) . '">' . esc_html($cat->name) . '</a></span>';
					$catHtml .= $p . '&nbsp;&nbsp;<span class="weluka-post-category-name" style="' . $dispItem['categoryFont'] . $dispItem['categoryFontSize'] . $dispItem['categoryWeight'] . $dispItem['categoryUnderline'] . $dispItem['categoryItalic'] . '"><a href="' . get_category_link( $cat ) . '" style="' . $dispItem['categoryColor'] . '">' . esc_html($cat->name) . '</a></span>';
					$n++;
				}
			}
*/
			//v1.1.4
			$_tpl = '<span class="weluka-post-category-name" style="' . $dispItem['categoryFont'] . $dispItem['categoryFontSize'] . $dispItem['categoryWeight'] . $dispItem['categoryUnderline'] . $dispItem['categoryItalic'] . '"><a href="%1$s" style="' . $dispItem['categoryColor'] . '">%2$s</a></span>';
//v1.2.9.5 modify
//			$taxs = get_the_taxonomies( $postData->ID, array( 'template' => '% %l', 'term_template' => $_tpl ) );
			$taxs = get_the_taxonomies( $postData->ID, array( 'template' => '%2$l', 'term_template' => $_tpl ) );
			if( !empty( $taxs ) ){
				$n = 0;
				foreach ($taxs as $_key => $_val) {
					if( $_key == 'post_tag' ){ continue; } //tag not display
					$p = $n === 0 ? '&nbsp;|&nbsp;' : ',&nbsp;'; 
					$catHtml .= $p . $_val;
					$n++;
				}
			}
			//v1.1.4 end
		}

		$authorHtml = "";
		if($dispItem['flgAuthor']) {
			$_author = get_the_author();
			//v1.1.2 modify
			//$authorHtml = '&nbsp;|&nbsp;<span class="weluka-post-author" style="' . $dispItem['authorFont'] . $dispItem['authorFontSize'] . $dispItem['authorColor'] . $dispItem['authorWeight'] . $dispItem['authorUnderline'] . $dispItem['authorItalic'] . '"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html($_author) . '</a></span>';
			$authorHtml = '&nbsp;|&nbsp;<span class="weluka-post-author" style="' . $dispItem['authorFont'] . $dispItem['authorFontSize'] . $dispItem['authorWeight'] . $dispItem['authorUnderline'] . $dispItem['authorItalic'] . '"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" style="' . $dispItem['authorColor'] . '">' . esc_html($_author) . '</a></span>';
		}

		$commentHtml = "";
		if( $dispItem['flgComment'] ) {
			$_cnt = get_comments_number();
			$commentHtml = '<span class="weluka-post-commentnum"><i class="fa fa-commenting"></i>' . $_cnt . '</span>';
		}

		//v1.2
		//$mediaHtml = "";
		$mediaHtml = array( 'default' => '', 'md' => '', 'sm' => '', 'xs' => '' );
		if( $dispItem['flgThumbnail'] ) {
			$_thumb_src = '';
			if( has_post_thumbnail()){
				$size = class_exists( 'WelukaTheme', false ) ? "post-medium" : "full"; //"medium"; //"full"
				$thumbnail =  wp_get_attachment_image_src( get_post_thumbnail_id(), $size);
				$_thumb_src = esc_url($thumbnail[0]);

				//Nelio External Featured Image plugin 対応 v1.0.6
				if ( function_exists( 'uses_nelioefi' ) && uses_nelioefi( $postData->ID ) ) {
					$_thumb_src = nelioefi_get_thumbnail_src( $postData->ID );
				}

			} else {
				if( class_exists( 'WelukaTheme', false ) ) {
					$_thumb_src = esc_url( get_weluka_noimage() );
				} else {
					$_thumb_src = Weluka::$settings['noimage'];
				}
			}
			
			if( $_thumb_src !== '') {
			
				//v1.2 add and modify
				//$mediaHtml = '<div class="weluka-list-media">';
				$_imgHtml = '<div class="weluka-list-media">';
				$media = array();
				//TODO Image crop
				if( $_link ) {
					$media['link']['action']	= self::LINK_ACTION_GOTOLINK;
					$media['link']['href']		= $_link;
					$media['link']['target']	= $_linkTarget;
				}
				$media['alt']			= $_title;
				$media['fitwidth']		= 1;
				$media['title']			= $_title;
				$media['url']			= $_thumb_src;
				$media['border_color']	= $dispItem['mediaBorderColor'];
				$media['border_size']	= $dispItem['mediaBorderSize'];
				$media['border_style']	= $dispItem['mediaBorderStyle'];
				$media['shape']			= $dispItem['mediaShape'];
				$media['class_name']	= $dispItem['mediaAlign'];
				$media['radius_size']	= $dispItem['mediaRadiusSize'];	//v1.2.3
				$media['lazyload']	    = $dispItem['mediaLazyLoad'];   //v1.2.7

				//$mediaHtml .= $this->widget_img_html($media, false);
				$_imgHtml .= $this->widget_img_html($media, false);

				if( $stickyHtml ) { $_imgHtml .= $stickyHtml; }
				if( $commentHtml ) { $_imgHtml .= $commentHtml; }

				$_imgHtml .= '</div>';
				$mediaHtml['default'] = $_imgHtml;
				

				$_bdrSize = '';
				if( $dispItem['mediaBorderSize'] ) { $_bdrSize	= $dispItem['mediaBorderSize'] . 'px'; }
				$_bdrStyle = 'solid';
				if( $dispItem['mediaBorderStyle'] ) { $_bdrStyle = $dispItem['mediaBorderStyle']; }
				$_bdrColor = '#dddddd';
				if( $dispItem['mediaBorderColor'] ) { $_bdrColor = $dispItem['mediaBorderColor']; }
							
				$_border = '';
				if( $_bdrSize ) {
					$_border = 'border:' . $_bdrSize . ' ' . $_bdrStyle . ' ' . $_bdrColor . ';';
				}
				//v1.2.3 add
				if( $dispItem['mediaShape'] == 'img-rounded' && $dispItem['mediaRadiusSize'] ) {
					$dispItem['mediaShape'] = '';
					$_border .= 'border-radius:' . $dispItem['mediaRadiusSize'] . 'px;';
				}

//				$_bgimg = '<div class="weluka-list-media ' . $dispItem['mediaAlign'] . '"><a href="' . $_link . '" title="' . $_title . '"><span class="weluka-list-media-eqh ' . $dispItem['mediaShape'] . '" style="background-image:url(' .  $_thumb_src . ');height:%spx;' . $_border . '"></span></a>';
				//v1.2.3
				$_bgimg = '<div class="weluka-list-media ' . $dispItem['mediaAlign'] . '"><a href="' . $_link . '" title="' . $_title . '"><span class="weluka-list-media-eqh ' . $dispItem['mediaShape'] . '" style="background-image:url(' .  $_thumb_src . ');height:{%THUMB_HEIGHT%}px;' . $_border . '"></span></a>';

				if( $stickyHtml ) { $_bgimg .= $stickyHtml; }
				if( $commentHtml ) { $_bgimg .= $commentHtml; }
				$_bgimg .= '</div>';

				if( ! empty( $dispItem['thumbHeight'] ) ) {
					//v1.2.3
					//$mediaHtml['md'] = sprintf( $_bgimg,  $dispItem['thumbHeight'] );
					$mediaHtml['md'] = str_replace("{%THUMB_HEIGHT%}", $dispItem['thumbHeight'],  $_bgimg);
/*
					$mediaHtml['md'] = '<div class="weluka-list-media"><a href="' . $_link . '" title="' . $_title . '"><span class="weluka-list-media-eqh ' . $dispItem['mediaShape'] . '" style="background-image:url(' . $_thumb_src . ');height:' . $dispItem['thumbHeight'] .'px;"></span></a>';
					if( $stickyHtml ) { $mediaHtml['md'] .= $stickyHtml; }
					if( $commentHtml ) { $mediaHtml['md'] .= $commentHtml; }
					$mediaHtml['md'] .= '</div>';
*/
				}

				if( ! empty( $dispItem['thumbHeightSm'] ) ) {
					//v1.2.3
					//$mediaHtml['sm'] = sprintf( $_bgimg,  $dispItem['thumbHeightSm'] );
					$mediaHtml['sm'] = str_replace("{%THUMB_HEIGHT%}", $dispItem['thumbHeightSm'],  $_bgimg);
				}

				if( ! empty( $dispItem['thumbHeightXs'] ) ) {
					//$mediaHtml['xs'] = sprintf( $_bgimg,  $dispItem['thumbHeightXs'] );
					$mediaHtml['xs'] = str_replace("{%THUMB_HEIGHT%}", $dispItem['thumbHeightXs'],  $_bgimg);
				}
				//v1.2 add and modify end
			}
		}

		$metaHtml = '';
		if($dateHtml || $catHtml || $authorHtml){
//v1.1.4 modify			$metaHtml = '<div class="weluka-list-meta' . $dispItem['metaAlign'] .'">' . $dateHtml . $authorHtml . $catHtml . '</div>';
			$metaHtml = '<div class="weluka-list-meta' . $dispItem['metaAlign'] .'">' . $dateHtml . $catHtml . $authorHtml . '</div>';
		}

		//ver1.0.1 add
		$tagcloud_metabottom = '';
		$tagcloud_bottom = '';
		if(  $dispItem['flgTagcloud'] ) {
			$tags = get_the_tags();
			$wktags = '';
			if ($tags) {
				foreach($tags as $tag) :
					$tag_link = get_tag_link($tag->term_id);
					$wktags .= '<a href="' . esc_url( $tag_link ) . '" title="' . esc_attr($tag->name) . '">' . $tag->name . '</a>';
				endforeach;
			}
			if( $dispItem['tagcloudPos'] === 'metabottom' || $dispItem['tagcloudPos'] === 'both' ) {
				if($wktags !== '' ) {
					$tagcloud_metabottom = '<div class="tagcloud weluka-mgtop-s">' . $wktags . '</div>';
    			}
			}
			if( $dispItem['tagcloudPos'] === 'bottom' || $dispItem['tagcloudPos'] === 'both' ) {
				if($wktags !== '' ) {
					$tagcloud_bottom = '<div class="tagcloud weluka-mgtop-l">' . $wktags . '</div>';
    			}
			}
		}
		//ver1.0.1 addend
		$excerptHtml = "";
		$allHTMLclass = '';
		//ver1.2.8 add
		$replaceCnt = 0;
		if( $dispItem['flgExcerpt'] ) {
			//$_excerpt = get_the_excerpt();
			//v1.2.7.1 modify
			//$_excerpt = $this->truncate_content( $postData, /*self::CONTENT_POSTMETA_KEY_PUBLISH*/ $dispItem['excerptStringNum'], false, true );
			//v 1.2.8 add
			if($dispItem['excerptStringNum'] == -1 && !($dispItem['flgOnExcerpt'] == 1 && $postData->post_excerpt)){
				$_excerpt = $this->get_property(self::PROP_KEY_BUILDER_MODE) 
					? $postData->post_content
					: $this ->wppost_replace_id(do_shortcode($postData->post_content), 'md', $replaceCnt);
				$allHTMLclass = ' weluka-list-content-all';
			}else{$_excerpt = $this->truncate_content( $postData, $dispItem['excerptStringNum'], false, true, $dispItem['flgOnExcerpt'] ); }

			$excerptHtml = '<div class="weluka-list-content' . $dispItem['contentAlign'] . $allHTMLclass . '" style="' . $dispItem['contentFont'] . $dispItem['contentFontSize'] . $dispItem['contentColor'] . '">' . $_excerpt . '</div>';
		}
		$moreHtml = "";
		if(!empty($dispItem['moreButton']['text'])) {
			$button = $dispItem['moreButton'];
			if( $_link ) {
				$button['link']['action']	= self::LINK_ACTION_GOTOLINK;
				$button['link']['href']		= $_link;
				$button['link']['target']	= $_linkTarget;
			}
			$moreHtml		= $this->widget_button_html($button, false);
		}

		//v1.0.6
		//v1.2 eqh, boxStyle, $dispItem['boxStyle'], $dispItem['boxBgColor'], $dispItem['boxShape'], $dispItem['boxStyleShadow'] add
		$_arr = array(
			'media'		=> $mediaHtml,
			'title'		=> $titleHtml,
			'meta'		=> $metaHtml,
			'excerpt'	=> $excerptHtml,
			'tag_metabottom'	=> $tagcloud_metabottom,
			'tag_bottom'	=> $tagcloud_bottom,
			'more'			=> $moreHtml,
			'media_col'		=> $dispItem['mediaCol'],
			'content_col'	=> $dispItem['contentCol'],
			'eqh'			=> $dispItem['eqh'],
			'box_style'		=> $dispItem['boxStyle'],
			'box_bgcolor'	=> $dispItem['boxBgColor'],
			'box_shape'		=> $dispItem['boxShape'],
			'box_shadow'	=> $dispItem['boxStyleShadow']
			
		);

		$ret[0] = $this->wppost_block( $dispItem['layoutClass'], $_arr, 'md' );
		$ret[1] = $this->wppost_block( $dispItem['layoutClassSm'], $_arr, 'sm' );
		$ret[2] = $this->wppost_block( $dispItem['layoutClassXs'], $_arr, 'xs' );

		// add v1.2.8
		if($replaceCnt > 0){
			if( $ret[1] ) { $ret[1] = $this ->wppost_replace_id($ret[1], 'sm');}
			if( $ret[2] ) { $ret[2] = $this ->wppost_replace_id($ret[2], 'xs');}
		}

		return $ret;
	}

	/**
	 * wppost list block create
	 * @since 1.0.6
	 * @update
	 * ver1.2
	 */
	public function wppost_block( $format, $data, $colMode = 'md' ) {
		$ret = '';
		//v1.2 add
		$_eqh =  !empty( $data['eqh'] ) ? $data['eqh'] : '';
		$_media = !empty( $data['media'][$colMode] ) ? $data['media'][$colMode] : $data['media']['default'];
		$_boxStyle = '';
		if( !empty( $data['box_style'] ) ) { $_boxStyle = ' ' . $data['box_style']; }
		$_wrapStyle = '';
		if( !empty( $data['box_bgcolor'] ) ) { $_wrapStyle = ' style="background-color:' . $data['box_bgcolor'] . ';"'; }
		$_boxShape = '';
		if( !empty( $data['box_shape'] ) ) { $_boxShape = ' ' . $data['box_shape']; }
		$_boxShadow = '';
		if( !empty( $data['box_shadow'] ) ) { $_boxShadow = ' ' . $data['box_shadow']; }
		//v1.2 addend

 		if($format === 'mediatop') {
			//v1.2
			//$ret = $data['media'];
			$ret = $_media;
			$ret .= $data['title'];
			$ret .= $data['meta'];
			$ret .= $data['tag_metabottom'];
			$ret .= $data['excerpt'];
			$ret .= $data['tag_bottom'];

			//v1.2 add modify
			if( !empty( $_eqh ) && !empty( $data['more'] ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['more'] . '</div>';
			} else {
				$ret .= $data['more'];
			}

		} elseif ($format === 'mediamiddle') {
			$ret = $data['title'];
			$ret .= $data['meta'];
			$ret .= $data['tag_metabottom'];			
			//v1.2
			//$ret .= $data['media'];
			$ret .= $_media;
			$ret .= $data['excerpt'];
			$ret .= $data['tag_bottom'];

			//v1.2 add modify
			if( !empty( $_eqh ) && !empty( $data['more'] ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['more'] . '</div>';
			} else {
				$ret .= $data['more'];
			}

		} elseif ($format === 'mediabottom') {
			$ret = $data['title'];
			$ret .= $data['meta'];
			$ret .= $data['tag_metabottom'];
			$ret .= $data['excerpt'];
			$ret .= $data['tag_bottom'];
			//v1.2 add modify
			//$ret .= $data['more'];
			//$ret .= $data['media'];
			if( !empty( $_eqh ) && ( !empty( $_media ) || !empty( $data['more'] ) ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['more'] . $_media . '</div>';
			} else {
				$ret .= $data['more'] . $_media;
			}

		} elseif ($format === 'mediaright') {
			$_left = ' lt';
			//v1.2
			//$mediaHtml =  $data['media'];
			$mediaHtml =  $_media;
			if($mediaHtml) {
				$mediaHtml = '<div class="weluka-col weluka-col-' . $colMode . '-' . $data['media_col'] . ' rt">' . $mediaHtml . '</div>';
				$contentCol = $data['content_col'];
			}else{
				$contentCol = 12;
				$_left = ' full';
			}

			//v1.2 wrapper add
			$ret = '<div class="weluka-col weluka-col-xs-12"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '><div class="weluka-row clearfix ' . $_eqh . '">';

			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $contentCol . $_left . '">';
			$ret .= $data['title'];
			$ret .= $data['meta'];
			$ret .= $data['tag_metabottom'];
			$ret .= $data['excerpt'];
			$ret .= $data['tag_bottom'];
			//v1.2 add modify
			if( !empty( $_eqh ) && !empty( $data['more'] ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['more'] . '</div>';
			} else {
				$ret .= $data['more'];
			}
			$ret .= '</div>';
			$ret .= $mediaHtml;

			$ret .= '</div></div></div>'; //v1.2 wrapper

		} elseif ($format === 'medialeft') {
			$_right = ' rt';
			//v1.2 wrapper add
			$ret = '<div class="weluka-col weluka-col-xs-12"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '><div class="weluka-row clearfix ' . $_eqh . '">';
			//$mediaHtml =  $data['media'];
			$mediaHtml =  $_media;
			if( $mediaHtml ) {
				$ret .= '<div class="weluka-col weluka-col-' . $colMode .'-' . $data['media_col'] . ' lt">' . $mediaHtml . '</div>';
				$contentCol = $data['content_col'];
			}else{
				$contentCol = 12;
				$_right = ' full';
			}
			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $contentCol . $_right . '">';
			$ret .= $data['title'];
			$ret .= $data['meta'];
			$ret .= $data['tag_metabottom'];
			$ret .= $data['excerpt'];
			$ret .= $data['tag_bottom'];
			//v1.2 add modify
			//$ret .= $data['more'];
			if( !empty( $_eqh ) && !empty( $data['more'] ) ) {
				$ret .= '<div class="weluka-list-row-eqh-btmwrap">' . $data['more'] . '</div>';
			} else {
				$ret .= $data['more'];
			}
			$ret .= '</div>';

			$ret .= '</div></div></div>'; //v1.2 wrapper
		}
		return $ret;
	}
	
	/**
	 * builder item type = wp_rss data html TODO style
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.1.4
	 * ver1.2
	 */
	public function widget_wprss_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr(trim($item['title'])) : "";
		$limit = isset($item['rss_limit']) ? trim($item['rss_limit']) : 5;
		$url = isset($item['url']) ? trim($item['url']) : "";
        $showSummary = isset($item['show_summary']) ? $item['show_summary'] : 0;
        $showAuthor = isset($item['show_author']) ? $item['show_author'] : 0;
        $showDate = isset($item['show_date']) ? $item['show_date'] : 0;
		$height = isset($item['list_height']) && strlen(trim($item['list_height'])) > 0 ? ' style="height:' . trim($item['list_height']) . 'px; overflow-y:auto;overflow-x:hidden;"' : "";

//		$ct = '<div class="widget widget_rss">';
/*		if($title !== "") {
			$ct .= '<h3 class="widgettitle weluka-widgettitle weluka-rss-wdigettitle">'. $title . '</h3>';
		}*/
		$ct = '<div class="weluka-rss-content"' . $height . '>';
		if( $url === "" ) {
			$ct .= '<div class="weluka-text-center" style="border:2px #c9c9c9 dashed; font-size:16px; padding:10px; color:#767676;">' . __('Please enter wordpress RSS Feed.', Weluka::$settings['plugin_name']) . '</div>';
		}else{
			$ct .= sprintf( '[%s title="%s" url="%s" items="%s" showsummary="%s" showauthor="%s" showdate="%s"]',
				$this->wprss_shortcode_tag, $title, $url, $limit, $showSummary, $showAuthor, $showDate
			);
		}
		$ct .= '</div>';
//		$ct .= '</div>';

		//v1.0.4 add
		$cssId = 'weluka_wprss_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.1.4 add
		$boxShadowStyle	= !empty($item['box_shadow_style']) ? $item['box_shadow_style'] : '';
		$boxShadowColor	= !empty($item['box_shadow_color']) ? $item['box_shadow_color'] : '';
		$_headBoxStyle = $this->get_boxshadow_style( $cssId, $boxShadowStyle, $boxShadowColor );
		//v1.1.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//v1.1.4 boxShadowStyle add
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wprss weluka-content' . $class . ' ' . $boxShadowStyle . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct;
		$content .= $this->add_head_style_js( $_headBoxStyle );
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_search data html TODO style
	 * @since 1.0
	 * @update
	 * ver1.0.4
	 * ver1.2
	 */
	public function widget_wpsearch_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr($item['title']) : "";

		$ct = sprintf( '[%s title="%s"]', $this->wpsearch_shortcode_tag, $title );

		//v1.0.4 add
		$cssId = 'weluka_wpsearch_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//$content .= '<div class="weluka-wp-widget weluka-wpsearch weluka-content' . $class . $cssClass . '" ' . $style . '>';
		//v1.2 animate... add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wpsearch weluka-content' . $class . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct; 
		$content .= '</div>';

		//$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * builder item type = wp_tagcloud data html TODO style
	 * @since 1.0
	 * @update
	 * ver 1.0.4
	 * ver 1.2
	 */
	public function widget_wptagcloud_html($item, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$content = "";
		$class = isset($item['class_name']) && strlen(trim($item['class_name'])) > 0 ? ' ' . $item['class_name'] : "";
		$style = $this->get_style_attribute($item);
		$cssClass = isset($item['cssClass']) && strlen(trim($item['cssClass'])) > 0 ? ' ' . $item['cssClass'] : "";
		$title = isset($item['title']) ? esc_attr($item['title']) : "";
		$taxonomy = isset($item['taxonomy']) ? $item['taxonomy'] : "post_tag";

		$ct = sprintf( '[%s title="%s" taxonomy="%s"]', $this->wptagcloud_shortcode_tag, $title, $taxonomy );

		//v1.0.4 add
		$cssId = 'weluka_wptags_' . Weluka::get_instance()->create_node_id();
		if( !$builderMode) { $cssClass .= ' ' . $this->get_responsive_hide($item); } //not builder mode
		$responsiveMpData = $this->get_responsive_mg_pd($item);
		if( $responsiveMpData ) { $cssClass .= ' weluka-responsive-mp'; }
		//v1.0.4 addend

		//v1.2 add
		list( $_animateClass, $_animateDelay ) = $this->get_animation_style( $item );

		//$content .= '<div class="weluka-wp-widget weluka-wptagcloud weluka-content' . $class . $cssClass . '" ' . $style . '>';
		//v1.2 animate ...  add
		$content .= '<div id="' . $cssId . '" class="weluka-wp-widget weluka-wptagcloud weluka-content' . $class . $cssClass . $_animateClass . '" ' . $style . $responsiveMpData . $_animateDelay . '>';
		$content .= $ct; 
		$content .= '</div>';

		$content = stripslashes($content);
		
		if($builderMode) {
			$content = do_shortcode($content);
		}
		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * create link html
	 * @update
	 * ver1.2
	 */
	public function link_html($link, $echo = true) {
		$builderMode = $this->get_property(self::PROP_KEY_BUILDER_MODE);
		$action = "";
		if(isset($link['action'])){
			if($link['action'] === self::LINK_ACTION_ZOOMUP) {
				$action = ' class="fancybox" rel="gallery"';
			}
		}
		//v1.2 modify
		//$target = isset($link['target']) && strlen($link['target']) > 0 ? ' target="' . $link['target'] . '"' : "";
		$target = '';
		if( isset($link['target']) && strlen($link['target']) > 0 ) {
			if( $link['target'] == '_blank' ){ $target = ' target="' . $link['target'] . '"'; }
			elseif( $link['target'] == 'iframe' ) { $action = ' data-fancybox-type="iframe" class="fancybox"'; } 
		}

		$title = isset($link['title']) && strlen($link['title']) > 0 ? ' title="' . esc_attr($link['title']) . '"' : "";
		$content = isset($link['content']) && strlen($link['content']) > 0 ? $link['content']: "";
		$ret = '<a href="' . esc_url( $link['href'] ) . '"' . $title . $action . $target . '>' . $content . '</a>';

		$ret = stripslashes($ret);
		
		if($builderMode) {
			$content = do_shortcode($ret);
		}

		if($echo) { echo $ret; }else{ return $ret; }		
	}
	
	/**
	 * block overlay html create
	 * @since 1.0
	 * @update
	 * ver1.0.5
	 */
	public function overlay_html($type="widget", $echo = true, $action = true) {
		$content = "";
		$title = __('Edit', Weluka::$settings['plugin_name']);
		if($type === 'section') { $title = __('Section', Weluka::$settings['plugin_name']); }
		elseif($type === 'row') { $title = __('Row', Weluka::$settings['plugin_name']); }
		elseif($type === 'col') { $title = __('Colum', Weluka::$settings['plugin_name']); }
		elseif($type === 's_row') { $title = __('Subrow', Weluka::$settings['plugin_name']); }
		elseif($type === 's_col') { $title = __('Subcolum', Weluka::$settings['plugin_name']); }

		$content = '<div class="weluka-helper">';
		if($action) {
			$content .= '<div class="weluka-overlay weluka-' . $type . '-overlay clearfix">';
			$content .= '<div class="weluka-overlay-actions clearfix"><span class="weluka-overlay-title">' . $title . '</span>';
       		$content .= '<i class="fa fa-arrows weluka-draggable weluka-block-move" data-dnd-effect-allowed="move" data-drag-object="' . $type . '" draggable="true"></i>';
        	$content .= '<i class="fa fa-wrench weluka-' . $type . '-setting"></i>';
        	$content .= '<i class="fa fa-copy weluka-' . $type . '-copy"></i>'; //v1.0.5
       		$content .= '<i class="fa fa-trash weluka-' . $type . '-remove"></i></div>';
			$content .= '</div>';
		}
		if($type === 'widget' || $type === 's_widget') {
			$content .= $this->widget_droppable_html($type, false);
		}elseif($type === 'col' || $type === 's_col') {
			$content .= $this->colum_droppable_html($type, false);
		}
		$content .= '</div>';

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * widget block droppable handle html create
	 * @since 1.0
	 */
	public function widget_droppable_html($type = 'widget', $echo = true) {
		$content = "";
		$posPrefix = $type === 's_widget' ? 's-' : '';
		$content = '<div class="weluka-col-droppables">';
		$content .= '<div class="weluka-droppable weluka-horizontal-drop-handle weluka-drop-col-top-in" data-weluka-drop-position="' . $posPrefix . 'col-top-in" data-pos-title="insert"></div>';
		$content .= '<div class="weluka-droppable weluka-horizontal-drop-handle weluka-drop-col-bottom-in" data-weluka-drop-position="' . $posPrefix . 'col-bottom-in" data-pos-title="insert"></div>';
		if($type === 'widget') {
			$content .= '<div class="weluka-droppable weluka-vertical-drop-handle weluka-drop-s-col-left-out" data-weluka-drop-position="s-col-left-out" data-pos-title="subcol"></div>';
			$content .= '<div class="weluka-droppable weluka-vertical-drop-handle weluka-drop-s-col-right-out" data-weluka-drop-position="s-col-right-out" data-pos-title="subcol"></div>';
		}
		$content .= '</div>';

		if($echo) { echo $content; }else{ return $content; }
	}

	/**
	 * colum block droppable handle html create
	 * @since 1.0
	 */
	public function colum_droppable_html($type = 'col', $echo = true) {
		$content = "";
		$posPrefix = $type === 's_col' ? 's-in-' : '';
		$title = $type === 's_col' ? 'subcol' : 'colum';
		$content = '<div class="weluka-col-droppables">';
		$content .= '<div class="weluka-droppable weluka-vertical-drop-handle weluka-drop-' . $posPrefix . 'col-left-out" data-weluka-drop-position="' . $posPrefix . 'col-left-out" data-pos-title="' . $title . '"></div>';
		$content .= '<div class="weluka-droppable weluka-vertical-drop-handle weluka-drop-' . $posPrefix . 'col-right-out" data-weluka-drop-position="' . $posPrefix . 'col-right-out" data-pos-title="' . $title . '"></div>';
		$content .= '</div>';
		if($echo) { echo $content; }else{ return $content; }
	}
	
	/**
	 * builder data array から styleを生成
	 * @since 1.0
	 * @update
	 * ver 1.0.1
	 *  背景画像 background-positionが設定されていた場合に正しい値が設定されていないバグ修正
	 * ver 1.0.4
	 *  背景動画追加
	 * ver 1.1.1
	 * ver 1.1.2 $bgColorFlg add
	 * ver1.1.4 $marginFlg add
	 */
	public function get_style_attribute( $dataArr, $borderFlg = true, $styleFlg = true, $bgColorFlg = true, $marginFlg = true ) {
		$ret = "";
		$bgcolor	= isset($dataArr["background_color"]) && strlen(trim($dataArr["background_color"])) > 0 ? ' background-color:' . $dataArr["background_color"] . ';' : '';
		$color		= isset($dataArr["color"]) && strlen(trim($dataArr["color"])) > 0 ? ' color:' . $dataArr["color"] . ';' : '';

		//v1.1.4 add and modify
		$marginT = '';
		$marginB = '';
		$marginL = '';
		$marginR = '';
		if( $marginFlg ) {
			$marginT	= isset($dataArr["margin_top"]) && strlen(trim($dataArr["margin_top"])) > 0 ? ' margin-top:' . $dataArr["margin_top"] . 'px;' : '';
			$marginB	= isset($dataArr["margin_bottom"]) && strlen(trim($dataArr["margin_bottom"])) > 0 ? ' margin-bottom:' . $dataArr["margin_bottom"] . 'px;' : '';
			$marginL	= isset($dataArr["margin_left"]) && strlen(trim($dataArr["margin_left"])) > 0 ? ' margin-left:' . $dataArr["margin_left"] . 'px;' : '';
			$marginR	= isset($dataArr["margin_right"]) && strlen(trim($dataArr["margin_right"])) > 0 ? ' margin-right:' . $dataArr["margin_right"] . 'px;' : '';
		}
		$paddingT	= isset($dataArr["padding_top"]) && strlen(trim($dataArr["padding_top"])) > 0 ? ' padding-top:' . $dataArr["padding_top"] . 'px;' : '';
		$paddingB	= isset($dataArr["padding_bottom"]) && strlen(trim($dataArr["padding_bottom"])) > 0 ? ' padding-bottom:' . $dataArr["padding_bottom"] . 'px;' : '';
		$paddingL	= isset($dataArr["padding_left"]) && strlen(trim($dataArr["padding_left"])) > 0 ? ' padding-left:' . $dataArr["padding_left"] . 'px;' : '';
		$paddingR	= isset($dataArr["padding_right"]) && strlen(trim($dataArr["padding_right"])) > 0 ? ' padding-right:' . $dataArr["padding_right"] . 'px;' : '';
		$width		= isset($dataArr['width']) && strlen(trim($dataArr['width'])) > 0 ? ' width:' . $dataArr['width'] . 'px;' : '';
		$height		= isset($dataArr['height']) && strlen(trim($dataArr['height'])) > 0 ? ' height:' . $dataArr['height'] . 'px;' : '';
		$borderSize	= isset($dataArr['border_size']) && strlen(trim($dataArr['border_size'])) > 0 ? $dataArr['border_size'] . 'px' : '';
		$borderStyle= isset($dataArr['border_style']) && strlen(trim($dataArr['border_style'])) > 0 ? $dataArr['border_style'] : 'solid';
		$borderColor= isset($dataArr['border_color']) && strlen(trim($dataArr['border_color'])) > 0 ? $dataArr['border_color'] : '#dddddd';
//		$bgimg		= isset($dataArr["background_image"]) && strlen(trim($dataArr["background_image"])) > 0 ? ' background-image:url(' . $dataArr["background_image"] . '); background-position:50% 0; background-attachment: fixed; background-size:cover;' : '';
		$bgimg		= isset($dataArr["background_image"]) && strlen(trim($dataArr["background_image"])) > 0 ? ' background-image:url(' . $dataArr["background_image"] . ');' : '';
		$bgpos		= isset($dataArr["bgpos"]) && strlen(trim($dataArr["bgpos"])) > 0 ? 'background-position:' . trim($dataArr["bgpos"]) . ';' : 'background-position:50% 0;'; //ver 1.0.1 update
		$bgrepeat	= isset($dataArr["bgrepeat"]) && strlen(trim($dataArr["bgrepeat"])) > 0 ? 'background-repeat:' . trim($dataArr["bgrepeat"]) . ';' : 'background-repeat:no-repeat;';
		$bgattach	= isset($dataArr["bgattachment"]) && strlen(trim($dataArr["bgattachment"])) > 0 ? 'background-attachment:' . trim($dataArr["bgattachment"]) . ';' : 'background-attachment:fixed;';
		$bgsizeType	= isset($dataArr["bgsize_type"]) && strlen(trim($dataArr["bgsize_type"])) > 0 ? trim($dataArr["bgsize_type"]) : 'cover';

/* v1.1.1 modify ベンダープレフィックス対応
		if( $bgsizeType === 'num' ) {
			$bgsize = isset($dataArr["bgsize"]) && strlen(trim($dataArr["bgsize"])) > 0 ? 'background-size:' . trim($dataArr["bgsize"]) . ';' : '';
		} else {
			$bgsize = 'background-size:' . $bgsizeType . ';';
		}
*/
		$bgsize = '';
		$bgsizeValue = '';
		if( $bgsizeType === 'num' ) {
			if( isset($dataArr["bgsize"]) && strlen(trim($dataArr["bgsize"]) ) > 0 ) {
				$bgsizeValue = trim($dataArr["bgsize"]) . ';';
			}
		} else {
			$bgsizeValue = $bgsizeType . ';';
		}
		
		if( $bgsizeValue ) {
			$bgsize =
				'-webkit-background-size:' . $bgsizeValue .
				'-moz-background-size:' . $bgsizeValue .
				'-ms-background-size:' . $bgsizeValue .
				'-o-background-size:' . $bgsizeValue .
				'background-size:' . $bgsizeValue; //非ベンダープレフィック設定は最後に書く
				
		}
//v1.1.1 modify end

		$bgType		= isset($dataArr["bg_type"]) && strlen(trim($dataArr["bg_type"])) > 0 ? $dataArr["bg_type"] : 'image'; //v1.0.4
		
		if( $bgType !== 'image' ) { $bgimg = ''; }
		else{
			if( $bgimg ) { $bgimg .= $bgpos . $bgrepeat . $bgattach . $bgsize; }
		}
		
		$border = '';
		if($borderSize !== '') {
			$border = ' border:' . $borderSize . ' ' . $borderStyle . ' ' . $borderColor . ';';
		}
		if(!$borderFlg) { $border = ''; }
		
		//v1.1.2 add
		if( !$bgColorFlg ) { $bgcolor = ''; }
		
		if($bgimg !== '' || $bgcolor !== '' || $color !== '' || $marginT !== '' || $marginB !== '' || $marginL !== '' || $marginR !== '' || $paddingT !== '' || $paddingB !== '' || $paddingL !== '' || $paddingR !== ''
		   || $width !== '' || $height !== '' || $border !== '') {
			if( $styleFlg ) { 
				$ret = ' style="' . $bgimg . $bgcolor . $color . $marginT . $marginB . $marginL . $marginR . $paddingT . $paddingB . $paddingL . $paddingR . $width . $height . $border . '"';
			} else {
				$ret = $bgimg . $bgcolor . $color . $marginT . $marginB . $marginL . $marginR . $paddingT . $paddingB . $paddingL . $paddingR . $width . $height . $border;
			}
		}
		return $ret;
	}

	/**
	 * builder data array responsive hidden class
	 * @since 1.0.4
	 */
	public function get_responsive_hide($dataArr) {
		$ret = "";
		$hideViews	= isset($dataArr["hideviews"]) && strlen(trim($dataArr["hideviews"])) > 0 ? $dataArr["hideviews"] : '';
		
		if( $hideViews ) {
			$arr = explode(",", $hideViews);
			$arr2 = array();
			foreach($arr as $s) :
				$arr2[] = 'hidden-' . $s;
			endforeach;
			$ret = implode( ' ', $arr2 );
		}
		return $ret;
	}

	/**
	 * builder data array responsive margin padding data="" ...
	 * @since 1.0.4
	 * @update
	 * ver1.0.4.1 zero check
	 * ver1.1.4 heightFlg, marginFlg, paddingFlg add
	 */
	public function get_responsive_mg_pd( $dataArr, $heightFlg = true, $marginFlg = true, $paddingFlg = true ) {
		$ret = "";
		
		//v1.1.4 modify
		if( $heightFlg ) {
			//md height
			$h = isset($dataArr["container_md_height"]) && strlen(trim($dataArr["container_md_height"])) > 0 ? trim( $dataArr["container_md_height"] ) : '';
			$u = isset($dataArr["container_md_height_unit"]) && strlen(trim($dataArr["container_md_height_unit"])) > 0 ? trim($dataArr["container_md_height_unit"]) : 'vh';
			if( $h != '' ) {
				$ret .= ' data-mdh="' . $h . ',' . $u . '"';
			}
			//sm height
			$h = isset($dataArr["container_sm_height"]) && strlen(trim($dataArr["container_sm_height"])) > 0 ? trim( $dataArr["container_sm_height"] ) : '';
			$u = isset($dataArr["container_sm_height_unit"]) && strlen(trim($dataArr["container_sm_height_unit"])) > 0 ? trim($dataArr["container_sm_height_unit"]) : 'vh';
			if( $h != '' ) {
				$ret .= ' data-smh="' . $h . ',' . $u . '"';
			}
			//xs height
			$h = isset($dataArr["container_xs_height"]) && strlen(trim($dataArr["container_xs_height"])) > 0 ? trim( $dataArr["container_xs_height"] ) : '';
			$u = isset($dataArr["container_xs_height_unit"]) && strlen(trim($dataArr["container_xs_height_unit"])) > 0 ? trim($dataArr["container_xs_height_unit"]) : 'vh';
			if( $h != '' ) {
				$ret .= ' data-xsh="' . $h . ',' . $u . '"';
			}
		}
		
		//v1.1.4 modify
		if( $marginFlg ) {
			//md margin
			$t = isset($dataArr["margin_md_top"]) && strlen(trim($dataArr["margin_md_top"])) > 0 ? trim($dataArr["margin_md_top"]) : '';
			$r = isset($dataArr["margin_md_right"]) && strlen(trim($dataArr["margin_md_right"])) > 0 ? trim($dataArr["margin_md_right"]) : '';
			$b = isset($dataArr["margin_md_bottom"]) && strlen(trim($dataArr["margin_md_bottom"])) > 0 ? trim($dataArr["margin_md_bottom"]) : '';
			$l = isset($dataArr["margin_md_left"]) && strlen(trim($dataArr["margin_md_left"])) > 0 ? trim($dataArr["margin_md_left"]) : '';
			$u = isset($dataArr["margin_md_unit"]) && strlen(trim($dataArr["margin_md_unit"])) > 0 ? trim($dataArr["margin_md_unit"]) : 'px';
			if( $t != '' || $r != '' || $b != '' || $l != '' ) {
				$ret .= ' data-mdm="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
			}
			//sm margin
			$t = isset($dataArr["margin_sm_top"]) && strlen(trim($dataArr["margin_sm_top"])) > 0 ? trim($dataArr["margin_sm_top"]) : '';
			$r = isset($dataArr["margin_sm_right"]) && strlen(trim($dataArr["margin_sm_right"])) > 0 ? trim($dataArr["margin_sm_right"]) : '';
			$b = isset($dataArr["margin_sm_bottom"]) && strlen(trim($dataArr["margin_sm_bottom"])) > 0 ? trim($dataArr["margin_sm_bottom"]) : '';
			$l = isset($dataArr["margin_sm_left"]) && strlen(trim($dataArr["margin_sm_left"])) > 0 ? trim($dataArr["margin_sm_left"]) : '';
			$u = isset($dataArr["margin_sm_unit"]) && strlen(trim($dataArr["margin_sm_unit"])) > 0 ? trim($dataArr["margin_sm_unit"]) : 'px';
			if( $t != '' || $r != '' || $b != '' || $l != '' ) {
				$ret .= ' data-smm="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u .'"';
			}
			//xs margin
			$t = isset($dataArr["margin_xs_top"]) && strlen(trim($dataArr["margin_xs_top"])) > 0 ? trim($dataArr["margin_xs_top"]) : '';
			$r = isset($dataArr["margin_xs_right"]) && strlen(trim($dataArr["margin_xs_right"])) > 0 ? trim($dataArr["margin_xs_right"]) : '';
			$b = isset($dataArr["margin_xs_bottom"]) && strlen(trim($dataArr["margin_xs_bottom"])) > 0 ? trim($dataArr["margin_xs_bottom"]) : '';
			$l = isset($dataArr["margin_xs_left"]) && strlen(trim($dataArr["margin_xs_left"])) > 0 ? trim($dataArr["margin_xs_left"]) : '';
			$u = isset($dataArr["margin_xs_unit"]) && strlen(trim($dataArr["margin_xs_unit"])) > 0 ? trim($dataArr["margin_xs_unit"]) : 'px';
			if( $t != '' || $r != '' || $b != '' || $l != '' ) {
				$ret .= ' data-xsm="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
			}
		}

		//v1.1.4 modify
		if( $paddingFlg ) {
			//md padding
			$t = isset($dataArr["padding_md_top"]) && strlen(trim($dataArr["padding_md_top"])) > 0 ? trim($dataArr["padding_md_top"]) : '';
			$r = isset($dataArr["padding_md_right"]) && strlen(trim($dataArr["padding_md_right"])) > 0 ? trim($dataArr["padding_md_right"]) : '';
			$b = isset($dataArr["padding_md_bottom"]) && strlen(trim($dataArr["padding_md_bottom"])) > 0 ? trim($dataArr["padding_md_bottom"]) : '';
			$l = isset($dataArr["padding_md_left"]) && strlen(trim($dataArr["padding_md_left"])) > 0 ? trim($dataArr["padding_md_left"]) : '';
			$u = isset($dataArr["padding_md_unit"]) && strlen(trim($dataArr["padding_md_unit"])) > 0 ? trim($dataArr["padding_md_unit"]) : 'px';
			if( $t != '' || $r != '' || $b != '' || $l != '' ) {
				$ret .= ' data-mdp="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
			}
			//sm padding
			$t = isset($dataArr["padding_sm_top"]) && strlen(trim($dataArr["padding_sm_top"])) > 0 ? trim($dataArr["padding_sm_top"]) : '';
			$r = isset($dataArr["padding_sm_right"]) && strlen(trim($dataArr["padding_sm_right"])) > 0 ? trim($dataArr["padding_sm_right"]) : '';
			$b = isset($dataArr["padding_sm_bottom"]) && strlen(trim($dataArr["padding_sm_bottom"])) > 0 ? trim($dataArr["padding_sm_bottom"]) : '';
			$l = isset($dataArr["padding_sm_left"]) && strlen(trim($dataArr["padding_sm_left"])) > 0 ? trim($dataArr["padding_sm_left"]) : '';
			$u = isset($dataArr["padding_sm_unit"]) && strlen(trim($dataArr["padding_sm_unit"])) > 0 ? trim($dataArr["padding_sm_unit"]) : 'px';
			if( $t != '' || $r != '' || $b != '' || $l != '' ) {
				$ret .= ' data-smp="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
			}
			//xs padding
			$t = isset($dataArr["padding_xs_top"]) && strlen(trim($dataArr["padding_xs_top"])) > 0 ? trim($dataArr["padding_xs_top"]) : '';
			$r = isset($dataArr["padding_xs_right"]) && strlen(trim($dataArr["padding_xs_right"])) > 0 ? trim($dataArr["padding_xs_right"]) : '';
			$b = isset($dataArr["padding_xs_bottom"]) && strlen(trim($dataArr["padding_xs_bottom"])) > 0 ? trim($dataArr["padding_xs_bottom"]) : '';
			$l = isset($dataArr["padding_xs_left"]) && strlen(trim($dataArr["padding_xs_left"])) > 0 ? trim($dataArr["padding_xs_left"]) : '';
			$u = isset($dataArr["padding_xs_unit"]) && strlen(trim($dataArr["padding_xs_unit"])) > 0 ? trim($dataArr["padding_xs_unit"]) : 'px';
			if( $t != '' || $r != '' || $b != '' || $l != '' ) {
				$ret .= ' data-xsp="' . $t . ',' . $r . ',' . $b . ',' . $l . ',' . $u . '"';
			}
		}
		
		return $ret;
	}

	/**
	 * builder data array から styleを生成２
	 * @since 1.1.4
	 * 
	 */
	public function get_style_attribute2( $dataArr, $styleFlg = true ) {
		$ret = "";
		$marginT	= isset($dataArr["margin_top"]) && strlen(trim($dataArr["margin_top"])) > 0 ? ' margin-top:' . $dataArr["margin_top"] . 'px;' : '';
		$marginB	= isset($dataArr["margin_bottom"]) && strlen(trim($dataArr["margin_bottom"])) > 0 ? ' margin-bottom:' . $dataArr["margin_bottom"] . 'px;' : '';
		$marginL	= isset($dataArr["margin_left"]) && strlen(trim($dataArr["margin_left"])) > 0 ? ' margin-left:' . $dataArr["margin_left"] . 'px;' : '';
		$marginR	= isset($dataArr["margin_right"]) && strlen(trim($dataArr["margin_right"])) > 0 ? ' margin-right:' . $dataArr["margin_right"] . 'px;' : '';
		
		if( $marginT !== '' || $marginB !== '' || $marginL !== '' || $marginR !== '' ) {
			if( $styleFlg ) { 
				$ret = ' style="' . $marginT . $marginB . $marginL . $marginR . '"';
			} else {
				$ret = $marginT . $marginB . $marginL . $marginR;
			}
		}
		return $ret;
	}

	/**
	 * create style box shadow style strings
	 * @since 1.1.4
	 * @param
	 * $cssId ... string html id or class
	 * $boxShadowStyle ... string boxshadow style class name
	 * $boxShadowColor ... string box shadow color
	 * $calcBorderWidth ... int or ''
	 * @return
	 * string
	 */
	public function get_boxshadow_style($cssId, $boxShadowStyle, $boxShadowColor, $calcBorderWidth = '') {
		$ret = '';
		if( $boxShadowColor ) {
			if ( $boxShadowStyle === 'weluka-boxshadow-leftbtm' ) {
				$ret = '#' . $cssId . '.' . $boxShadowStyle . '{-webkit-box-shadow: 4px 4px 5px 0 ' . $boxShadowColor . ';-moz-box-shadow: 4px 4px 5px 0 ' . $boxShadowColor . ';box-shadow: 4px 4px 5px 0 ' . $boxShadowColor . ';}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-outset' ) {
				$ret = '#' . $cssId . '.' . $boxShadowStyle . '{-webkit-box-shadow: 0 0 15px ' . $boxShadowColor . ';-moz-box-shadow: 0 0 15px ' . $boxShadowColor . ';box-shadow: 0 0 15px ' . $boxShadowColor . ';}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-inset' ) {
				$ret = '#' . $cssId . '.' . $boxShadowStyle . '{-webkit-box-shadow: inset 0 0 15px ' . $boxShadowColor . ';-moz-box-shadow: inset 0 0 15px ' . $boxShadowColor . ';box-shadow: inset 0 0 15px ' . $boxShadowColor . ';}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-btm1' ) {
				$ret = '#' . $cssId . '.' . $boxShadowStyle . '{-webkit-box-shadow: 0 9px 12px -6px ' . $boxShadowColor . ';-moz-box-shadow: 0 9px 12px -6px ' . $boxShadowColor . ';box-shadow: 0 9px 12px -6px ' . $boxShadowColor . ';}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-btm2' ) {
				$ret = '#' . $cssId . '.' . $boxShadowStyle . '::after{-webkit-box-shadow: 0 8px 15px ' . $boxShadowColor . ';-moz-box-shadow: 0 8px 15px ' . $boxShadowColor . ';box-shadow: 0 8px 15px ' . $boxShadowColor . ';}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-btm3' ) {
				$ret = '#' . $cssId . '.' . $boxShadowStyle . '::before, #' . $cssId . '.' . $boxShadowStyle . '::after';
				$ret .= '{-webkit-box-shadow: 0 10px 15px ' . $boxShadowColor . ';-moz-box-shadow: 0 10px 15px ' . $boxShadowColor . ';box-shadow: 0 10px 15px ' . $boxShadowColor . ';}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-topbtm' ) {
				$ret = '#' . $cssId . '.' . $boxShadowStyle . '::after{-webkit-box-shadow: 0 0 20px ' . $boxShadowColor . ';-moz-box-shadow: 0 0 20px ' . $boxShadowColor . ';box-shadow: 0 0 20px ' . $boxShadowColor . ';}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-ltrt' ) {
				$ret = '#' . $cssId . '.' . $boxShadowStyle . '::after{-webkit-box-shadow: 0 0 20px ' . $boxShadowColor . ';-moz-box-shadow: 0 0 20px ' . $boxShadowColor . ';box-shadow: 0 0 20px ' . $boxShadowColor . ';}';

			}
		}

		//afterで指定しているシャドウパターンの場合ボーダーサイズを考慮し計算		
		if( $calcBorderWidth && is_numeric( $calcBorderWidth ) ) {
			if ( $boxShadowStyle === 'weluka-boxshadow-btm2' ) {
				$_wk = 20  - (int)$calcBorderWidth;
				$ret .= '#' . $cssId . '.' . $boxShadowStyle . '::after{bottom:-' . $calcBorderWidth . 'px;left:' . $_wk . 'px;right:' . $_wk . 'px;}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-btm3' ) {
				$_wk = 10 - (int)$calcBorderWidth;
				$ret .= '#' . $cssId . '.' . $boxShadowStyle . '::before, #' . $cssId . '.' . $boxShadowStyle . '::after{bottom:' . $_wk . 'px;}';
				$ret .= '#' . $cssId . '.' . $boxShadowStyle . '::before{left:' . $_wk . 'px;}';
				$ret .= '#' . $cssId . '.' . $boxShadowStyle . '::after{right:' . $_wk . 'px;}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-topbtm' ) {
				$_wk = 10 - (int)$calcBorderWidth;
				$ret .= '#' . $cssId . '.' . $boxShadowStyle . '::after{top:-' . $calcBorderWidth . 'px;bottom:-' . $calcBorderWidth . 'px;left:' . $_wk . 'px;right:' . $_wk . 'px;}';

			} elseif ( $boxShadowStyle === 'weluka-boxshadow-ltrt' ) {
				$_wk = 10 - (int)$calcBorderWidth;
				$ret .= '#' . $cssId . '.' . $boxShadowStyle . '::after{top:' . $_wk . 'px;bottom:' . $_wk . 'px;left:-' . $calcBorderWidth . 'px;right:-' . $calcBorderWidth . 'px;}';
			}
		}
		return $ret;
	}

	/**
	 * add head style js strings
	 * @since 1.1.4
	 * @param
	 * $css ... string style string
	 * @return
	 * string
	 */
	public function add_head_style_js( $css ) {
		$ret = '';
		if( $css ) {
       		$ret = '<div class="weluka-hide"><script type="text/javascript">';
			$ret .= 'jQuery(document).ready(function($) {';
			$ret .= '$("head").append("<style>' . $css . '</style>");';
			$ret .= '});</script></div>';
		}
		return $ret;
	}

	/**
	 * builder data array animation data string
	 * @since 1.2
	 * @return
	 * array ... [0] = style class, [1]=delay data
	 */
	public function get_animation_style( $dataArr ) {
		$ret = array('', '');

		
		if( !empty( $dataArr["animation_type"] ) ) {
			$ret[0] = ' weluka-animate ' . $dataArr["animation_type"];
			
			if( !empty( $dataArr["animation_delay"] ) && strlen(trim($dataArr["animation_delay"])) > 0 ) {
				$ret[1] = ' data-animate-delay="' . trim( $dataArr["animation_delay"] ) . '"';
			}
		}

		return $ret;
	}
	
	/**
	 * create publish builder data
	 * get publish data
	 * @since 1.0
	 */
	public function publish_builder_data($postId = '', $deactive = false) {
		$weluka = Weluka::get_instance();
		$post_id = $weluka->get_post_id($postId);
		
		//case publish => DRAFT DATA GET
		//if( $deactive === false ) {
		//	$mode = self::CONTENT_POSTMETA_KEY_DRAFT;
		//} else {
			//$postStatus = get_post_status($post_id);
			//$mode = self::CONTENT_POSTMETA_KEY_PUBLISH;
			//if( $postStatus != 'publish' ) {
				$mode = self::CONTENT_POSTMETA_KEY_DRAFT;
			//}
		//}

		$this->set_property(self::PROP_KEY_BUILDER_MODE, false);
		$builderData = $this->get_builder_data($post_id, $mode);

		//case publish => DRAFT DATA GET
		//if( $mode === self::CONTENT_POSTMETA_KEY_PUBLISH ) {
		//	$_content = $builderData['content'];

		//} else {
			//get html
			ob_start();
			$this->display_content($builderData);
			$_content = ob_get_clean();
			//return $_content;
		//}
		
		$saveData = array();
		$saveData['content'] = $_content;
		$saveData['pagesetting'] = !empty( $builderData['pagesetting'] ) ? $builderData['pagesetting'] : '';
		//$ret[0] = $weluka->save_postmeta($post_id, self::CONTENT_POSTMETA_KEY_PUBLISH, $_content);
		
		if( $deactive === false ) {
			$ret[0] = $weluka->save_postmeta($post_id, self::CONTENT_POSTMETA_KEY_PUBLISH, $saveData);
		} else {
			$ret[0] = true;
		}
		$ret[1] = $_content;
		
		return $ret;	
	}



/*------------------------------------------------------------------------------
 [ Builder utility ] 
------------------------------------------------------------------------------*/

	/**
	 * @since 1.0
	 * @update
	 * v1.2.7.1 onExcerpt add
	 */
	public function truncate_content( $postData, /*$mode,*/ $num='', $echo = true, $stripTag = true, $onExcerpt = 0 ) {

		$ct = $this->get_builder_to_content( $postData, /*$mode,*/ $stripTag, $onExcerpt); //v1.2.7.1 $onExcerpt add

		// remove caption shortcode from the post content
		$truncate = preg_replace('@\[caption[^\]]*?\].*?\[\/caption]@si', '', $ct);
//1.2.7.1 modify
/*
		if ( $num !== '' && mb_strlen( $truncate, "UTF-8" ) > $num ) {
			$echo_out = Weluka::get_instance()->excerpt_more( '' );
		} else {
			$echo_out = ''; 
		}
*/
		if ( $postData->post_excerpt && $onExcerpt ) {
			$echo_out = ''; 
		} else {
			if ( $num !== '' && mb_strlen( $truncate, "UTF-8" ) > $num ) {
				$echo_out = Weluka::get_instance()->excerpt_more( '' );
			} else {
				$echo_out = '';
			}
		}
		if($echo_out !== '' ){
			$truncate = mb_substr($truncate, 0, $num);
		}
		if ($echo) echo $truncate.$echo_out;
		else return ($truncate . $echo_out);

	}

	/**
	 * @since 1.0
	 * @update
	 * ver1.0.5.2 revision対応
	 * ver1.2.2
	 * ver1.2.7.1 $onExcerpt add
	 */
	public function get_builder_to_content( $postData, /*$mode,*/ $stripTag = true, $onExcerpt = 0 ) {

		if( empty( $postData ) ) { return ''; }

		$ct = "";

		if( ! $postData->post_excerpt ) {
			$_content = str_replace(array("\r\n","\n","\r"), '', trim(strip_tags($postData->post_content)));
			//if( strcasecmp( $_content, "[weluka-builder-content]") == 0 ) {
			if( strncasecmp( $_content, "[weluka-builder-content", 23) == 0 ) {

				$ct = do_shortcode($this->get_builder_data($postData->ID, self::CONTENT_POSTMETA_KEY_PUBLISH, 'content')); //publish data get

			} else {

				$ct = do_shortcode($_content);
			}

			//v1.2.7.1 move modify 
			$ct = $stripTag ? trim( wp_strip_all_tags( $ct ) ) : trim ( $ct );

		} else {
			//excerpt true
			$ct = do_shortcode( $postData->post_excerpt );
			//v1.2.7.1 add
			if( !$onExcerpt ) {
				$ct = $stripTag ? trim( wp_strip_all_tags( $ct ) ) : trim ( $ct );
			}
		}

//v1.2.2 modify
//		$ct = $stripTag ? trim( strip_tags( $ct )) : trim ( $ct );
//v1.2.7.1 comment out
//		$ct = $stripTag ? trim( wp_strip_all_tags( $ct ) ) : trim ( $ct );
		return $ct;
	}

	/**
	 * @since 1.1
	 */
	public function truncate_string( $str, $num='', $echo = true, $stripTag = true ) {
		
		$ct = str_replace(array("\r\n","\n","\r"), '', $str);
		$ct = $stripTag ? trim( strip_tags( $ct )) : trim ( $ct );

		// remove caption shortcode from the post content
		$truncate = preg_replace('@\[caption[^\]]*?\].*?\[\/caption]@si', '', $ct);

		if ( $num !== '' && mb_strlen( $truncate, "UTF-8" ) > $num ) {
			$echo_out = Weluka::get_instance()->excerpt_more( '' );
		} else {
			$echo_out = ''; 
		}

		if($echo_out !== '' ){
			$truncate = mb_substr($truncate, 0, $num);
		}
		if ($echo) echo $truncate.$echo_out;
		else return ($truncate . $echo_out);

	}

/*------------------------------------------------------------------------------
 [ Builder hook 関連 ] 
------------------------------------------------------------------------------*/

	/**
	 * the_excerpt get_the_excerpt hook
	 * @since 1.0
	 * v1.2.8
	 * v1.2.9.6
	 *
	 */
	public function excerpt($excerpt) {
		global $post;	//v1.2.9.6
		$weluka = Weluka::get_instance();
		$_excerpt = $excerpt;
		if($_excerpt === '') {
			remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

			$_post = $weluka->get_post();
			
			remove_shortcode($this->wpposts_shortcode_tag); // add v1.2.8  抜粋内で最新記事ショートコードが動くのを防ぐ。
			$_excerpt = $this->get_builder_to_content( $_post /*, self::CONTENT_POSTMETA_KEY_PUBLISH*/ );

			add_shortcode( $this->wpposts_shortcode_tag, array(&$this, 'sh_weluka_wpposts') ); // add v1.2.8 
			remove_filter('the_excerpt', array($this, 'excerpt')); 
        	remove_filter('get_the_excerpt', array($this, 'excerpt'));

			$_post->post_content = $_excerpt;
//modify v1.2.9.6
			$post = $_post;
//    		setup_postdata( $_post );
    		setup_postdata( $post );

    		$_excerpt = get_the_excerpt();
    		wp_reset_postdata();

			add_filter('the_excerpt', array($this, 'excerpt'));
        	add_filter('get_the_excerpt', array($this, 'excerpt'));

			add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);
		}
		//return apply_filters('excerpt', $_excerpt);
		return $_excerpt;
	}

	/**
	 * orderby 'rand' paramater in wp_query hook
	 * @since 1.2.8
	 *
	 */
	public function fix_rand_orderby($orderby, $query) {
		if ( 'rand' == $query->get( 'orderby' ) ) {
			$seed = strtotime( date( 'Y-m-d H:00:00' ) );
			mt_srand( $seed );
			$orderby = 'RAND(' . mt_rand() . ')';
		}
		return $orderby;
	}
	
	/**
     * wp_footer hook
     * builder modeの際にサイト内にビルダーのwidgetsナビやダイアログなどを埋め込む
	 * @since 1.0
	 * @update
	 * ver1.0.3
	 * ver1.0.7
	 * ver1.1.4
	 * ver1.2.3
     */
	public function builder_snippets() {
		require_once( Weluka::$settings['plugin_dir'] . '/includes/builder-snippets.php' );
	
		$postType = get_post_type();
		//json data
		echo '<script type="text/javascript">';
		//v1.2.3 modify
		//echo 'var welukaContentModel = ' . $_SESSION[self::PROP_KEY_BUILDER_JSON] . ';'; //$this->get_property(self::PROP_KEY_BUILDER_JSON);
		echo 'var welukaContentModel = ' . $this->get_property(self::PROP_KEY_BUILDER_JSON);
		//echo 'var welukaPostType = "' . $postType . '";';
		echo '</script>';
		//v1.2.3 comment out $_SESSION[self::PROP_KEY_BUILDER_JSON] = '';
		$this->set_property(self::PROP_KEY_BUILDER_JSON, '');	//v1.2.3 add

		wp_localize_script('weluka-builder', 'welukaBuilderWp',
            array(
				'post_id'	=> Weluka::get_instance()->get_post_id(),
				'post_type'	=> $postType,
                'ajax_url'	=> Weluka::$settings['ajax_url'],
				'admin_url'	=> Weluka::$settings['admin_url'],
				'plugin_url' => Weluka::$settings['plugin_url'],
				'flg_weluka_theme' => Weluka::get_instance()->check_weluka_theme(),
                'nonces'	=> array(
					'weluka_add_widgetdata'	=> wp_create_nonce('wp_ajax_weluka_add_widgetdata'),
					'weluka_move_data'		=> wp_create_nonce('wp_ajax_weluka_move_data'),
					'weluka_get_html'		=> wp_create_nonce('wp_ajax_weluka_get_html'),
					'weluka_partial'		=> wp_create_nonce('wp_ajax_weluka_partial'),
					'weluka_layout_select'	=> wp_create_nonce('wp_ajax_weluka_layout_select')	//v1.0.3 add
                ),
				'widget_types'	=> array(
					'TEXT'		=> self::WIDGET_TEXT,
					'TITLE'		=> self::WIDGET_TITLE,
					'TITLE2'	=> self::WIDGET_TITLE_2,	//v1.1.4 add
					'IMG'		=> self::WIDGET_IMG,
					'ICON'		=> self::WIDGET_ICON,
					'SLIDE'		=> self::WIDGET_SLIDE,
					'GALLERY'	=> self::WIDGET_GALLERY,
					'BUTTON'	=> self::WIDGET_BUTTON,
					'MOVIE'		=> self::WIDGET_MOVIE,
					'AUDIO'		=> self::WIDGET_AUDIO,
					'BLANK'		=> self::WIDGET_BLANK,
					'APPLIST'	=> self::WIDGET_APP_LIST,
					'APPALERT'	=> self::WIDGET_APP_ALERT,
					'APPEMBED'	=> self::WIDGET_APP_EMBED,
					'GMAP'		=> self::WIDGET_GMAP,
					'SNS_BUTTON'	=> self::WIDGET_SNS_BUTTON,
					'SNS_SHARE'		=> self::WIDGET_SNS_SHARE,
					'APPACCORDION'	=> self::WIDGET_APP_ACCORDION,
					'APPTABS'		=> self::WIDGET_APP_TABS,
					'WPMENU'		=> self::WIDGET_WP_MENU,
					'WPARCHIVES'	=> self::WIDGET_WP_ARCHIVES,
					'WPCALENDAR'	=> self::WIDGET_WP_CALENDAR,
					'WPCATEGORIES'	=> self::WIDGET_WP_CATEGORIES,
					'WPMETA'	=> self::WIDGET_WP_META,
					'WPPAGES'	=> self::WIDGET_WP_PAGES,
					'WPCOMMENTS'	=> self::WIDGET_WP_COMMENTS,
					'WPPOSTS'	=> self::WIDGET_WP_POSTS,
					'WPRSS'		=> self::WIDGET_WP_RSS,
					'WPSEARCH'		=> self::WIDGET_WP_SEARCH,
					'WPTAGCLOUD'	=> self::WIDGET_WP_TAGCLOUD,
					'APPLISTCD'		=> self::APPLIST_CUSTOM_DESIGN,
					'APPLISTRL'		=> self::APPLIST_REG_LIST,
					'WPMENUCD'		=> self::WPMENU_CUSTOM_DESIGN,
					'WPPOSTSCD'		=> self::WPPOSTS_CUSTOM_DESIGN,
					'PAGESETTING'	=> self::WIDGET_PAGE_SETTING,
					'APPHORLINE'	=> self::WIDGET_APP_HORLINE,
					'CPT_HD'		=> Weluka::$settings['cpt_hd'],
					'CPT_FT'		=> Weluka::$settings['cpt_ft'],
					'CPT_SD'		=> Weluka::$settings['cpt_sd'],
					'COPYTPL'		=> self::COPY_TPL,	//v1.0.7 add
					'COPYTPLSELECT'	=> self::WIDGET_COPYTPL_SELECT	//v1.0.7 add
				),
				'default_items'	=> array(
					'SAMPLE_IMG'	=> Weluka::$settings['plugin_url'] . 'assets/img/image_sample.gif',
					'MOVIE'		=> self::DEFAULT_MOVIE_URL,
				),
				'link_action'	=> array(
					'gotolink'	=> self::LINK_ACTION_GOTOLINK,
				),
				'text_shadow_styles'	=> $this->text_shadow_styles,
				'sns_share_autosetting'	=> self::SNS_AUTO_SETTING,//v1.2.6 add
				'msgs'		=> array(
					'move'		=> __('Move', Weluka::$settings['plugin_name']),
					'setting'	=> __('Setting', Weluka::$settings['plugin_name']),
					'duplicate'	=> __('Duplicate', Weluka::$settings['plugin_name']),
					'remove'	=> __('Remove', Weluka::$settings['plugin_name']),
					'title'		=> __('Title', Weluka::$settings['plugin_name']),
					'description'		=> __('Description', Weluka::$settings['plugin_name']),
					'link'		=> __('Link', Weluka::$settings['plugin_name']),
					'url'		=> __('Url', Weluka::$settings['plugin_name']),
					'linknewwindow'		=> __('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']),
					'selectlink'		=> __('Select Link', Weluka::$settings['plugin_name']),
					'none'		=> __('None', Weluka::$settings['plugin_name']),
					'enable_description'	=> __('Enable Description.', Weluka::$settings['plugin_name']),
					'remove_confirm_msg'	=> __('Are you really sure you want to delete?', Weluka::$settings['plugin_name']),
					'img_frame_title'		=> __('Select Media', Weluka::$settings['plugin_name']),
					'img_frame_Button'		=> __('Select', Weluka::$settings['plugin_name']),
					'select_image'			=> __('Select Image', Weluka::$settings['plugin_name']),
					'select_movie'			=> __('Select Movie', Weluka::$settings['plugin_name']),
					'auto_play'				=> __('auto play', Weluka::$settings['plugin_name']),
					'repeat_play'			=> __('Repeat to play', Weluka::$settings['plugin_name']),
					'auto_repeat_play_help'	=> __('Auto play and Repeat play setting is only one file in one page.', Weluka::$settings['plugin_name']),
					'registory_panel_not'	=> __('Registration panel is not.', Weluka::$settings['plugin_name']),
					'registory_list_not'	=> __('Registration list is not.', Weluka::$settings['plugin_name']),
					'invalid_image'			=> __('Please enter image.', Weluka::$settings['plugin_name']),
					'invalid_icon'			=> __('Please enter icon.', Weluka::$settings['plugin_name']),
					'invalid_url'			=> __('Please enter your url.', Weluka::$settings['plugin_name']),
					'invalid_address'		=> __('Please enter your address.', Weluka::$settings['plugin_name']),
					'invalid_slideimage'	=> __('Please enter slide image.', Weluka::$settings['plugin_name']),
					'invalid_sns_button'	=> __('Please select the SNS.', Weluka::$settings['plugin_name']),
					'invalid_sns_share_button'	=> __('Please input any SNS.', Weluka::$settings['plugin_name']),//v1.2.6 add
					'invalid_sns_url'		=> __('Please enter sns url ({{%s}}).', Weluka::$settings['plugin_name']),
					'max_column_over'		=> __('Number of columns exceeds the maximum value.', Weluka::$settings['plugin_name']),
					'invalid_embedcode'		=> __('Please enter embed code.', Weluka::$settings['plugin_name']),
					'invalid_movie'			=> __('Please enter movie file or url.', Weluka::$settings['plugin_name']),
					'invalid_audio'			=> __('Please enter audio file.', Weluka::$settings['plugin_name']),
					'invalid_title'			=> __('Please enter title.', Weluka::$settings['plugin_name']),
					'invalid_content'		=> __('Please enter content.', Weluka::$settings['plugin_name']),
					'invalid_panel'			=> __('Please enter panel.', Weluka::$settings['plugin_name']),
					'invalid_list'			=> __('Please enter list.', Weluka::$settings['plugin_name']),
					'invalid_menu'			=> __('Please enter menu.', Weluka::$settings['plugin_name']),
					'invalid_edit_data'		=> __('Please select the edit data.', Weluka::$settings['plugin_name']),
					'invalid_description'	=> __('Please enter description.', Weluka::$settings['plugin_name']),
					'invalid_list_item'		=> __('Please check the list display item.', Weluka::$settings['plugin_name']),
					'invalid_custom_design_name'		=> __('Please enter custom design name.', Weluka::$settings['plugin_name']),
					'invalid_custom_design_name2'		=> __('Please select custom design.', Weluka::$settings['plugin_name']),
					'invalid_list_name'		=> __('Please enter list name.', Weluka::$settings['plugin_name']),
					'invalid_list_name2'	=> __('Please select list name.', Weluka::$settings['plugin_name']),
					'slideshow_speed_number_error'		=> __('Please enter the number slideshow speed is.', Weluka::$settings['plugin_name']),
					'animation_speed_number_error'		=> __('Please enter the number animation speed is.', Weluka::$settings['plugin_name']),
					'reg_completed'			=> __('Registered completed.', Weluka::$settings['plugin_name']),
					'reg_confirm_msg'		=> __('Are you really sure you want to {{%s}} registory?.', Weluka::$settings['plugin_name']),
					'remove_confirm_msg2'	=> __('Are you really sure you want to {{%s}} delete?', Weluka::$settings['plugin_name']),
					'contentmodel_warning'	=> __('Please add the content.', Weluka::$settings['plugin_name']),
					'invalid_layout_select'	=> __('Please select sample.', Weluka::$settings['plugin_name']),	//v1.0.3 add
					'copy_confirm_msg'		=> __('Are you sure you want to run the copy? (Please subjected to column number setting after the copy in the case of column copy.)', Weluka::$settings['plugin_name']),
					'invalid_copy_target'	=> __('The source has been selected.', Weluka::$settings['plugin_name']),	//v1.0.7 add
					'invalid_copy_tplname'	=> __('Please enter template name.', Weluka::$settings['plugin_name']),	//v1.0.7 add
					'invalid_copy_tplname2'	=> __('Please select template name.', Weluka::$settings['plugin_name'])
				)
            )
        );
   	}
 
 	/**
	 * save_post hook
	 * builder data save after post_content modify
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.3
	 * ver1.0.5.2 revision対応
	 */
 	public function render_save_post($postId, $postData) {
		$weluka = Weluka::get_instance();
		$editon = isset($_REQUEST['weluka-builder-editon']) ? $_REQUEST['weluka-builder-editon'] : false;

		//ver1.0.1 add
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
			// 自動保存の場合は何もしない
			return $postId;
		}
		if( !current_user_can('edit_post', $postId)) {
			// 編集権限がないユーザの場合、何もしない
			return $postId;
		}
		
		if ( ! wp_is_post_revision( $postId ) && !empty($_POST) ) { // リビジョンでなくかつゴミ箱操作関連でなければ
		//ver1.0.1 add end
			remove_action( 'save_post', array($this, 'render_save_post'), 10, 2);
			if( $weluka->is_edit_builder($postData) && $editon ) {
				$_rid = $weluka->create_node_id();//v1.
				$post_content = '[weluka-builder-content r="' . $_rid . '"]'; //welukaビルダー用ショートコードに書き換え v1.0.5.2 r add
				//post 更新
				$newPost = array(
					'ID'			=> $postId,
					'post_content'	=> $post_content
				);
				$weluka->save_post($newPost);
			}
			add_action( 'save_post', array($this, 'render_save_post'), 10, 2);

			//v1.0.3 add			
			$layoutSel = isset($_REQUEST['weluka-builder-layout-select']) ? $_REQUEST['weluka-builder-layout-select'] : false;
			if( $layoutSel ) {
			//custom post typeもあり得るので本処理に入ってくるのはwelukaビルダー利用時のみなのでposttype判定は行わない
			//$type	=	get_post_type();
 			//switch( $type ) {
    		//	case "post":
    		//	case "page":
        			$url = admin_url().'post.php?post=' . $postId . '&action=edit&weluka_redirect=1';
        			wp_redirect( $url );
        			exit;
    		//		break;
    		//}
			}
		}
	}

 	/**
	 * save_post hook
	 * builder data revision postmeta
	 * @since 1.0.5.2
	 */
 	public function render_save_post_revision($postId, $postData) {
		$weluka = Weluka::get_instance();

		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { return $postId; }
		if( !current_user_can('edit_post', $postId)) { return $postId; }
		
		$parent_id = wp_is_post_revision($postId);
		if( $parent_id ) {
			//draft meta
			$draftMeta = $this->get_builder_data( $parent_id, self::CONTENT_POSTMETA_KEY_DRAFT);
			if ( $draftMeta ) {
				add_metadata( 'post', $postId, self::CONTENT_POSTMETA_KEY_DRAFT, $draftMeta );
				//add_post_meta( $postId, self::CONTENT_POSTMETA_KEY_DRAFT, $draftMeta ); //add_post_meta or update_post_meta NG
			}
			//publish meta
			$pubMeta = $this->get_builder_data( $parent_id, self::CONTENT_POSTMETA_KEY_PUBLISH);
			if ( $pubMeta ) {
				add_metadata( 'post', $postId, self::CONTENT_POSTMETA_KEY_PUBLISH, $pubMeta );
			}
		}
	}
	
	/**
	 * wp_restore_post_revision hook
	 * restore builder data revision postmeta
	 * @since 1.0.5.2
	 */
	function render_restore_post_revision( $postId, $revisionId ) {
		//draft meta
		$draftMeta = get_metadata( 'post', $revisionId, self::CONTENT_POSTMETA_KEY_DRAFT, true );
		if ( $draftMeta ) {
			update_post_meta( $postId, self::CONTENT_POSTMETA_KEY_DRAFT, $draftMeta );
		} else {
			delete_post_meta( $postId, self::CONTENT_POSTMETA_KEY_DRAFT );
		}
		//publish meta
		$pubMeta = get_metadata( 'post', $revisionId, self::CONTENT_POSTMETA_KEY_PUBLISH, true );
		if ( $pubMeta ) {
			update_post_meta( $postId, self::CONTENT_POSTMETA_KEY_PUBLISH, $pubMeta );
		} else {
			delete_post_meta( $postId, self::CONTENT_POSTMETA_KEY_PUBLISH );
		}
	}

	/** 
	 * google map url input embed handler
	 * @since 1.0
	 */
	public function gmap_embed_handler( $matches, $attr, $url, $rawattr ) {
		return sprintf( '[%s url="%s"]', $this->gmap_shortcode_tag, esc_url( $matchs[0] ) );
	}

/*------------------------------------------------------------------------------
 [ Builder Shortcode 関連 ] 
------------------------------------------------------------------------------*/
	
	/**
	 * weluka-default-content shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_default_content( $atts, $content = null ) {
		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'post_id' => '',
			),
			$atts)
		);
		if($post_id === '') {
			$post_id = $weluka->get_post_id();
		}
		$postData = $weluka->get_post($post_id);
		//default postが公開済みの場合、この後の操作で「ビルダー上から保存された場合、公開データが存在しなくなる可能性があるので
		//default postでビルダー向け公開データを作成しておく
		$saveData = array('content' => $content, 'pagesetting' => '');
		
		//ビルダー適用前のコンテンツ
/*		$saveData = null;
		if( $content )
			$saveData = $this->create_section_array('default', $content);*/

		$weluka->save_postmeta($post_id, self::CONTENT_POSTMETA_KEY_PUBLISH, $saveData);
		//$weluka->save_postmeta($post_id, self::CONTENT_POSTMETA_KEY_PUBLISH, $content);
		//wpautopで追加される<br /><p></p>を削除
		//$_content = $this->get_content('default', preg_replace('/<p>|<\/p>|<br \/>/', '', $content) );
		$_content = $this->get_content('default', $content, $postData );
		return $_content;
	}

	/**
	 * weluka-builder-content2 shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_builder_content2( $atts ) {
		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'post_id' => '',
			),
			$atts)
		);
		if($post_id === '') {
			$post_id = $weluka->get_post_id();
		}
		$postData = $weluka->get_post($post_id);
		$_content = $this->get_content('builder', "", $postData );
		return $_content;
	}

	/**
	 * weluka-builder-content shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_builder_content($atts) {
		//wpautopで追加される<br /><p></p>を削除
		$_content = $this->get_content('builder');
		return $_content;
	}

	/**
	 * weluka-map shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_gmap( $atts ) {
		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'addr'		=> '',
				'url'		=> '',
				'w'			=> '100%',
				'h'			=> '300',
				'z'			=> 16,
				'lat'		=> '',
				'lng'		=> '',
				'info'		=> '',
				'staticw'	=> '',
				'stylejson'	=> '',
				'draggable' => 1
			), $atts )
		);

		if(isset($w) && $w !== '' && mb_substr($w, -1) !== '%') { $w .= 'px'; }
		if(isset($h) && $h !== '' && mb_substr($h, -1) !== '%') { $h .= 'px'; }
		$gmapStyleScript = "";
		$gmapStyleId = "";
		if(isset($stylejson) && $stylejson !== '') {
			$stylejson = str_replace(array("$", "~", "%"), array("[", "]", '"'), $stylejson);
			$gmapStyleId = 'gmapstyle' . Weluka::get_instance()->create_node_id();
			$gmapStyleScript = '<div class="weluka-hide"><script type="text/javascript">var ' . $gmapStyleId . ' = ' . $stylejson . ';</script></div>';
		}
		
		if( isset($url) && $url !== '' ) {
			return sprintf(
				'<iframe width="%s" height="%s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="%s"></iframe>', $w, $h, esc_url( $p['url'].'&output=embed' )
			);
		//}elseif( isset( $lat ) && preg_match( '/^\-?[0-9\.]+$/', $lat ) && isset( $lng ) && preg_match( '/^\-?[0-9\.]+$/', $lng ) ) {
		//}elseif ( isset( $addr ) && $addr !== '' ) {
		}
		
		$ret = sprintf(
			'<div class="weluka-gmap-content" data-addr="%s" data-lat="%s" data-lng="%s" data-zoom="%s" data-info="%s" data-staticw="%s" data-styleid="%s" data-dg="%s" style="width:%s;height:%s;"></div>%s',
			$addr, $lat, $lng, $z, $info, $staticw, $gmapStyleId, $draggable, $w, $h, $gmapStyleScript
		);
		
		return $ret;
	}

	/**
	 * weluka-wpposts shortcode func
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.3
	 * ver1.0.4
	 * ver1.0.6
	 * ver1.1
	 * ver1.1.4
	 * ver1.2
	 * ver1.2.3
	 * ver1.2.7.1
	 * ver1.2.8
	 */
	public function sh_weluka_wpposts( $atts ) {
		global $post;

		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'height'		=> '',
				'categories'	=> '',
				'limit'			=> 5,
				'flgtitle'		=> 1,
				'flgdate'		=> 0,
				'flgauthor'		=> 0,
				'flgcategory'	=> 0,
				'flgexcerpt'	=> 0,
				'flgthumbnail'	=> 0,
				'flgcomment'	=> 0,
				'layoutclass'	=> 'medialeft',
				'mediacol'		=> 4,
				'rowspacing'	=> '',
				'rowcolumn'		=> 1,
				'rowoddcolor'	=> '',
				'rowevencolor'	=> '',
				'excerptstringnum'	=> 110,
				'mediaalign'	=> '',
				'mediabordercolor'	=> '',
				'mediaborderstyle'	=> '',
				'mediabordersize'	=> '',
				'mediashape'	=> '',
				'titletag'		=> 'h4',
				'titlealign'	=> '',
				'titlefont'		=> '',
				'titlefontsize' => '',
				'titlecolor'	=> '',
				'titleweight'	=> '',
				'titleunderline'	=> '',
				'titleitalic'	=> '',
				'metaalign'		=> '',
				'datefont'		=> '',
				'datefontsize'	=> '',
				'datecolor'		=> '',
				'dateweight'	=> '',
				'dateunderline'	=> '',
				'dateitalic'	=> '',
				'dateformat'	=> '',
				'authorfont'	=> '',
				'authorfontsize'	=> '',
				'authorcolor'	=> '',
				'authorweight'	=> '',
				'authorunderline'	=> '',
				'authoritalic'	=> '',
				'categoryfont'	=> '',
				'categoryfontsize'	=> '',
				'categorycolor'	=> '',
				'categoryweight'	=> '',
				'categoryunderline'	=> '',
				'categoryitalic'	=> '',
				'contentalign'	=> '',
				'contentfont'	=> '',
				'contentfontsize'	=> '',
				'contentcolor'	=> '',
				'morebuttontext'	=> '',
				'morebuttonclassname'	=> '',
				'morebuttonbuttoncolor' => '',
				'morebuttonshape'	=> '',
				'morebuttonsize'	=> '',
				'morebuttonblock'	=> '',
				'allurl'			=> '',
				'alllinkstr'		=> '',
				'allbuttonclassname'	=> '',
				'allbuttonbuttoncolor'	=> '',
				'allbuttonshape'	=> '',
				'allbuttonsize'		=> '',
				'allbuttonblock'	=> '',
				'flgtagcloud'		=> 0,
				'tagcloudpos'		=> '',
				'flgmodifydate'		=> 0,
				'layoutclasssm'		=> '',
				'rowcolumnsm'		=> '',
				'layoutclassxs'		=> '',
				'rowcolumnxs'		=> '',
				'titlestringnum'	=> '',
				'flgpaging'			=> 0,
				'pagenum'			=> '',
				'targettype'		=> 'category',
				'posttypes'			=> 'post',
				'csttaxonomy'		=> '',
				'thumbh'			=> '',
				'thumbhsm'			=> '',
				'thumbhxs'			=> '',
				'eqh'				=> 0,
				'boxstyle'			=> '',
				'boxbgcolor'		=> '',
				'boxshape'			=> '',
				'boxstyleshadow'	=> '',
				'mediaradiussize'	=> '',
				'medialazyload'     => 0,
				'onexcerpt'         => 0
			), $atts )
		);

		$dispItem['flgTitle']	= $flgtitle;
		$dispItem['flgDate']	= $flgdate;
		$dispItem['flgAuthor']	= $flgauthor;
		$dispItem['flgCategory'] = $flgcategory;
		$dispItem['flgExcerpt'] = $flgexcerpt;
		$dispItem['flgThumbnail'] = $flgthumbnail;
		$dispItem['flgComment']	= $flgcomment;
		$dispItem['flgModifyDate']	= $flgmodifydate; //v1.0.4
		$dispItem['flgOnExcerpt']	= $onexcerpt; //v1.2.7.1
		//ver1.0.1 add
		$dispItem['flgTagcloud']	= $flgtagcloud;
		$dispItem['tagcloudPos']	= $tagcloudpos;
		//ver1.0.1 addend
		$dispItem['layoutClass']	= $layoutclass;
		$dispItem['mediaCol']	= $mediacol;
		$dispItem['contentCol']	= (int)self::MAX_COLUMN - (int)$dispItem['mediaCol'];
		$dispItem['titleStringNum'] 	= $titlestringnum; //v1.1 add
		$dispItem['excerptStringNum'] 	= $excerptstringnum;
		$ngmClass			= ($rowoddcolor !== '' || $rowevencolor !== '') ? ' weluka-row-negative-margin-clear' : '';
		$rowBgClass			= ($rowoddcolor !== '' || $rowevencolor !== '') ? ' weluka-list-row-bgcolor' : '';

		//media design
		$dispItem['mediaAlign']			= $mediaalign;
		$dispItem['mediaBorderColor']	= $mediabordercolor;
		$dispItem['mediaBorderStyle']	= $mediaborderstyle;
		$dispItem['mediaBorderSize']	= $mediabordersize;
		$dispItem['mediaShape']			= $mediashape;
		$dispItem['mediaRadiusSize']	= $mediaradiussize;	//v1.2.3
		$dispItem['mediaLazyLoad']		= $medialazyload;	//v1.2.7

		//post title design
		$dispItem['titleTag']		= $titletag;
		$dispItem['titleAlign']		= $titlealign;
		$dispItem['titleFont']		= $titlefont;
		$dispItem['titleFontSize']	= $titlefontsize;
		$dispItem['titleColor']		= $titlecolor;
		$dispItem['titleWeight']	= $titleweight;
		$dispItem['titleUnderline']	= $titleunderline;
		$dispItem['titleItalic']	= $titleitalic;

		//meta common design
		$dispItem['metaAlign']		= $metaalign;
		
		$dispItem['dateFont']		= $datefont;
		$dispItem['dateFontSize']	= $datefontsize;
		$dispItem['dateColor']		= $datecolor;
		$dispItem['dateWeight']		= $dateweight;
		$dispItem['dateUnderline']	= $dateunderline;
		$dispItem['dateItalic']		= $dateitalic;
		$dispItem['dateFormat'] 	= $dateformat;

		//author design
		$dispItem['authorFont']			= $authorfont;
		$dispItem['authorFontSize']		= $authorfontsize;
		$dispItem['authorColor']		= $authorcolor;
		$dispItem['authorWeight']		= $authorweight;
		$dispItem['authorUnderline']	= $authorunderline;
		$dispItem['authorItalic']		= $authoritalic;

		//category design
		$dispItem['categoryFont']		= $categoryfont;
		$dispItem['categoryFontSize']	= $categoryfontsize;
		$dispItem['categoryColor']		= $categorycolor;
		$dispItem['categoryWeight']		= $categoryweight;
		$dispItem['categoryUnderline']	= $categoryunderline;
		$dispItem['categoryItalic']		= $categoryitalic;

		//content(excerpt design
		$dispItem['contentAlign']		= $contentalign;
		$dispItem['contentFont']		= $contentfont;
		$dispItem['contentFontSize']	= $contentfontsize;
		$dispItem['contentColor']		= $contentcolor;

		//more button design
		$dispItem['moreButton']['text']			= $morebuttontext;
		$dispItem['moreButton']['class_name']	= $morebuttonclassname;
		$dispItem['moreButton']['button_color']	= $morebuttonbuttoncolor;
		$dispItem['moreButton']['shape']		= $morebuttonshape;
		$dispItem['moreButton']['size']			= $morebuttonsize;
		$dispItem['moreButton']['block']		= $morebuttonblock;

		//v1.0.6
		$dispItem['layoutClassSm']	= $layoutclasssm;
		$dispItem['layoutClassXs']	= $layoutclassxs;

		//v1.2 add
		$dispItem['thumbHeight']	= $thumbh;
		$dispItem['thumbHeightSm']	= $thumbhsm;
		$dispItem['thumbHeightXs']	= $thumbhxs;
		$dispItem['eqh']			= '';
		if( !empty( $eqh ) ) { $dispItem['eqh'] = 'weluka-list-row-eqh'; }
		$dispItem['boxStyle']	= $boxstyle;
		$dispItem['boxBgColor']	= $boxbgcolor;
		$dispItem['boxShape']	= $boxshape;
		$dispItem['boxStyleShadow']	= $boxstyleshadow;
		//v1.2 addend

		$flg = false;
/* v1.0.6
		$_height = $height !== "" ? ' style="height:' . $height . 'px;overflow-y:auto;overflow-x:hidden;"' : '';
        $ct = '<div' . $_height . '>';
*/
		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

		$tmp_post = $post;
		$cat = '';

		$selfPostId = "";
		//v1.2.3 modify
		//if( !empty($_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID]) ) { $selfPostId = $_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID]; } elseif( !empty( $post ) ) { $selfPostId = $post->ID; }
		if( !empty( $post ) ) { $selfPostId = $post->ID; }
		else {
			$_tbpid = $weluka->get_current_builder_postid();
			if( !empty( $_tbpid ) ) { $selfPostId = $_tbpid; }
		}
		
		/*v1.1 comment
		//$exclude = $selfPostId !== '' ? '&exclude=' . $selfPostId : '';
		
		//if($categories != ''){ $cat = '&category=' . $categories; }
		if($categories != ''){ $cat = '&cat=' . $categories; } //v1.1 modify
		*/
		//v1.0.3 add
		if( empty( $limit ) ) { $limit = 5; }
		/*
		//v1.0.4
		$_orderby = '&orderby=date';
		if( !empty( $dispItem['flgModifyDate'] ) ){ $_orderby = '&orderby=modified'; }

		//v1.1 paging get_posts to WP_Query modify
		if( empty( $flgpaging ) ) {
			//not paging
			$postPerPage = "posts_per_page=$limit";
		} else {
			//paging
			if( empty( $perpage ) ) { $perpage = $limit; }
			$_paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
			$postPerPage = "posts_per_page=$perpage&paged=$_paged";
		}
		$_page_query = new WP_Query( $postPerPage . $cat. $exclude . $_orderby . '&order=DESC&post_status=publish');
		*/
		$args = array();
		if( $selfPostId !== '' ) {
			$wk = array($selfPostId);
			$args += array('post__not_in' => $wk);
			unset($wk);
		}

		//v1.1.4 add
		$_ptypes = get_post_types( array( 'public' => true, '_builtin' => false ) );
		$_exclude = array( Weluka::$settings['cpt_hd'] => Weluka::$settings['cpt_hd'], Weluka::$settings['cpt_ft'] => Weluka::$settings['cpt_ft'], Weluka::$settings['cpt_sd'] => Weluka::$settings['cpt_sd'] );
    	$_ptypes = array_diff_assoc($_ptypes, $_exclude);

		$wks = explode(",", $posttypes);
		$_pt = array('post');
		if( !empty( $wks ) ){
			if( !in_array( 'post', $wks ) ) { $_pt = array(); }
			foreach ( $wks as $_val ) {
				if( array_key_exists( $_val, $_ptypes ) ) {
					$_pt[] = $_val;
				}
			}
		}

		if( !empty( $_pt )) { $args += array('post_type' => $_pt ); }
		unset($wks);
		unset($_pt);
		//v1.1.4 addend
		
		if($categories != ''){
			$wk = explode(",", $categories);
			//v1.1.4 add and modify
			if( $targettype == 'tagcloud' ) {
				$args += array('tag__in' => $wk);

			} elseif( $targettype == 'csttax' ) {
				$args += array('tax_query' => array(
									array(
										'taxonomy' 	 		=> $csttaxonomy,
										'terms'				=> $wk
									)
								)
						);
			} else {
				$args += array('category__in' => $wk);
			}
			unset($wk);
		}

		$args += array('posts_per_page' => $limit);

		if( !empty( $flgpaging ) ) {
			//paging
			$_paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
			$args += array('paged' => $_paged);
		}

		// v1.2.8 modify
		$_orderby = 'date';
		if( !empty( $dispItem['flgModifyDate'] ) ){
			if((int) $dispItem['flgModifyDate'] === 1){
				$_orderby = 'modified';
			}elseif((int) $dispItem['flgModifyDate'] === 2){
				$_orderby = 'rand'; 
			}
		}
		//v1.1.4 default post_type=post $args += array('post_type' => 'post', 'orderby' => $_orderby, 'order' => 'DESC', 'post_status' => 'publish');
		$args += array('orderby' => $_orderby, 'order' => 'DESC', 'post_status' => 'publish');
		$_page_query = new WP_Query( $args );

		//v1.1
		$ct = '';
		$ctSm = '';
		$ctXs = '';
		$_paging = "";
		//v1.1 end
		if ( $_page_query->have_posts() ) :
			$flg = true;
			$_ct = $list = "";
			
			$colNum			= (int)self::MAX_COLUMN / (int)$rowcolumn;
			$rowCnt = 0;
			$colCnt = 0;
			//v1.0.6 add
			$colNumSm = 0;
			if( $layoutclasssm !== '' && $rowcolumnsm != '' ) { $colNumSm		= (int)self::MAX_COLUMN / (int)$rowcolumnsm; }
			$colCntSm = 0;
			$colNumXs = 0;
			if( $layoutclassxs !== '' && $rowcolumnxs != '' ) { $colNumXs		= (int)self::MAX_COLUMN / (int)$rowcolumnxs; }
			$colCntXs = 0;
			
			//v1.1 comment
			//$ct = '';
			//$ctSm = '';
			//$ctXs = '';
			//v1.0.6 addend

			while ( $_page_query->have_posts() ) : $_page_query->the_post();
				if(has_filter('weluka_recentposts_content') == false) :
					$_ct = $this->recentpost_content( $post, $dispItem );
				else :
					$_ct = apply_filters('weluka_recentposts_content', $post, $dispItem);
				endif;
	
				$_spacing = "";
				if($rowCnt !== 0 && $rowspacing !== '') { $_spacing = $rowspacing; }
				$topNoMargin = (int)$rowCnt === 0 ? ' top-nomargin' : '';

				if( ($rowCnt + 1) % 2 == 0 ) {
					$rowBgColor = $rowevencolor;
				} else {
					$rowBgColor = $rowoddcolor;
				}
				
				//v1.2 $dispItem['eqh'], $dispItem['boxStyle'], $dispItem['boxBgColor'], $dispItem['boxShape'], $dispItem['boxStyleShadow'] add
				$wk = '';
				if( is_array( $_ct ) ) { $wk = $_ct[0]; } else { $wk = $_ct; }
				$ct .= $this->wppost_list( $dispItem['layoutClass'], $wk, $rowcolumn, $colNum, $topNoMargin, $ngmClass, $rowBgClass, $rowBgColor, $_spacing, $colCnt, 'md', $dispItem['eqh'], $dispItem['boxStyle'], $dispItem['boxBgColor'], $dispItem['boxShape'], $dispItem['boxStyleShadow'] );
				$wk = '';
				if( is_array( $_ct ) ) { $wk = $_ct[1]; }
				$ctSm .= $this->wppost_list( $dispItem['layoutClassSm'], $wk, $rowcolumnsm, $colNumSm, $topNoMargin, $ngmClass, $rowBgClass, $rowBgColor, $_spacing, $colCntSm, 'sm', $dispItem['eqh'], $dispItem['boxStyle'], $dispItem['boxBgColor'], $dispItem['boxShape'], $dispItem['boxStyleShadow'] );
				$wk = '';
				if( is_array( $_ct ) ) { $wk = $_ct[2]; }
				$ctXs .= $this->wppost_list( $dispItem['layoutClassXs'], $wk, $rowcolumnxs, $colNumXs, $topNoMargin, $ngmClass, $rowBgClass, $rowBgColor, $_spacing, $colCntXs, 'xs', $dispItem['eqh'], $dispItem['boxStyle'], $dispItem['boxBgColor'], $dispItem['boxShape'], $dispItem['boxStyleShadow'] );
 
				$rowCnt++;
			endwhile;
			//v1.0.6
			//v1.2 eqh, colMode, colNum add
			$ct .= $this->wppostlist_end( $dispItem['layoutClass'], $rowcolumn, $colCnt, $dispItem['eqh'], 'md', $colNum );
			$ctSm .= $this->wppostlist_end( $dispItem['layoutClassSm'], $rowcolumnsm, $colCntSm, $dispItem['eqh'], 'sm', $colNumSm );
			$ctXs .= $this->wppostlist_end( $dispItem['layoutClassXs'], $rowcolumnxs, $colCntXs, $dispItem['eqh'], 'xs', $colNumXs );

			//v1.1 add
			if( !empty( $flgpaging ) ) :
				$_paging = $weluka->pagination_link( $_page_query, $pagenum, 'bottom', false );
			endif;
		else :
			$_ct = apply_filters('weluka_recentposts_content_none', __('No posts.', Weluka::$settings['plugin_name']));
			$ct .= '<div class="weluka-list-row weluka-row clearfix"><div class="weluka-col weluka-col-md-12">' . $_ct . '</div></div>';
			//v1.0.6
			if( $dispItem['layoutClassSm'] ) {
				$ctSm = '<div class="weluka-list-row weluka-row clearfix"><div class="weluka-col weluka-col-sm-12">' . $_ct . '</div></div>';
			}
			if( $dispItem['layoutClassXs'] ) {
				$ctXs = '<div class="weluka-list-row weluka-row clearfix"><div class="weluka-col weluka-col-xs-12">' . $_ct . '</div></div>';
			}
		endif; //_page_query hav_post endif
		//v1.1 end

		wp_reset_postdata();
		wp_reset_query();
		$post = $tmp_post; //get_posts loop後に元のpostに戻す
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		//v1.0.6
		$_height = $height !== "" ? ' style="height:' . $height . 'px;overflow-y:auto;overflow-x:hidden;"' : '';

		$hiddenClass = '';
		if( $dispItem['layoutClassSm'] ) { $hiddenClass = 'hidden-sm'; }
		if( $dispItem['layoutClassXs'] ) { $hiddenClass .= ' hidden-xs'; }

		//v1.1 add
		$retct = '';
		if( $flgpaging == 2 ) {
			$_url = Weluka::get_instance()->get_current_url();
			//v1.2 modify and add
			//$retct .= '<div class="weluka-jscroll" data-url="' . $_url . '">';
			$retct .= '<div class="weluka-jscroll"' . $_height . '>';
			$_height = '';
			$retct .= '<div class="weluka-jscroll-selector" data-url="' . $_url . '">';
		}
		//v1.1 addend
		$retct .= '<div class="' . $hiddenClass . '" ' . $_height . '>' . $ct . '</div>'; //v1.1 $ct = to $retct .= modify


		if( $ctSm ) {
			$hiddenClass = '';
			$hiddenClass = 'hidden-lg hidden-md hidden-xs';
			$ctSm = '<div class="' . $hiddenClass . '" ' . $_height . '>' . $ctSm . '</div>';
			$retct .= $ctSm;	//v1.1 $ct to $retct modify
		}
		if( $ctXs ) {
			$hiddenClass = '';
			$hiddenClass = 'hidden-lg hidden-md hidden-sm'; 
			$ctXs = '<div class="' . $hiddenClass . '" ' . $_height . '>' . $ctXs . '</div>';
			$retct .= $ctXs; //v1.1 $ct to $retct modify
		}

		//v1.1 add
		$retct .= $_paging;
		if( $flgpaging == 2 ) {
			//v1.2 modify
			//$retct .= '</div>'; //.weluka-jscroll
			$retct .= '</div></div>'; //.weluka-jscroll-selector .weluka-jscroll
		}
		//v1.1 addend

		if($allurl && $flg == true) {
			$button = array();
			$button['link']['action']	= self::LINK_ACTION_GOTOLINK;
			$button['link']['href']		= $allurl;
			$button['link']['target']	= '';
			$button['text']				= $alllinkstr;
			$button['class_name']		= $allbuttonclassname;
			$button['button_color']		= $allbuttonbuttoncolor;
			$button['shape']			= $allbuttonshape;
			$button['size']				= $allbuttonsize;
			$button['block']			= $allbuttonblock;

			$allButtonHtml		= $this->widget_button_html($button, false);

			$retct .= '<div class="weluka-post-footer">' . $allButtonHtml . '</div>'; //v1.1 $ct to $retct modify
		}

		$this->returnWPposts = $retct;
		return $retct;	//v1.1 $ct to $retct modify
	}
	
	/**
	 * wppost list create
	 * @since 1.0.6
	 * @update
	 * ver1.2
 	 * $eqh add(mediatop mediamiddle media bottom)
	 * $boxStyle, $boxBgColor, $boxShape, $boxShadow add
	 */
	public function wppost_list( $format, $ct, $rowColumn, $colNum, $topNoMargin, $ngmClass, $rowBgClass, $rowBgColor, $spacing, &$colCnt, $colMode = 'md', $eqh = '', $boxStyle = '', $boxBgColor = '', $boxShape = '', $boxShadow = '' ) {
		$ret = '';
		//v1.2 add
		$_eqh = '';
		if( !empty( $eqh ) ) { $_eqh = ' ' . $eqh; }
		
		$_boxStyle = '';
		if( $boxStyle ) { $_boxStyle = ' ' . $boxStyle; }
		
		$_wrapStyle = '';
		if( $boxBgColor ) { $_wrapStyle = ' style="background-color:' . $boxBgColor . ';"'; }

		$_boxShape = '';
		if( $boxShape ) { $_boxShape = ' ' . $boxShape; }

		$_boxShadow = '';
		if( $boxShadow ) { $_boxShadow = ' ' . $boxShadow; }
		//v1.2 addend

		if($format === 'mediatop') {
			$colCnt++;
			if((int)$colCnt === 1) {
				$ret .= '<div class="weluka-list-row weluka-row clearfix mediatop' . $topNoMargin . $ngmClass . $_eqh . '" style="' . $spacing . '">';
			}
			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '>' . $ct . '</div></div>';

			if((int)$colCnt === (int)$rowColumn) {
				$ret .= '</div>';	//row end div
				$colCnt = 0;
			}

		}elseif($format === 'mediamiddle'){
			$colCnt++;
			if((int)$colCnt === 1) {
				$ret .= '<div class="weluka-list-row weluka-row clearfix mediamiddle' . $topNoMargin . $ngmClass . $_eqh . '" style="' . $spacing . '">';
			}
			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '>' . $ct . '</div></div>';
					
			if((int)$colCnt === (int)$rowColumn) {
				$ret .= '</div>';	//row end div
				$colCnt = 0;
			}

		}elseif($format === 'mediabottom'){
			$colCnt++;
			if((int)$colCnt === 1) {
				$ret .= '<div class="weluka-list-row weluka-row clearfix mediabottom' . $topNoMargin . $ngmClass . $_eqh . '" style="' . $spacing . '">';
			}
			$ret .= '<div class="weluka-col weluka-col-' . $colMode . '-' . $colNum . $rowBgClass . '" style="' . $rowBgColor . '"><div class="wrap' . $_boxStyle . $_boxShape . $_boxShadow . '"' . $_wrapStyle . '>' . $ct . '</div></div>';
					
			if((int)$colCnt === (int)$rowColumn) {
				$ret .= '</div>';	//row end div
				$colCnt = 0;
			}

		}elseif($format === 'mediaright') {
			$ret = '<div class="weluka-list-row weluka-row clearfix mediaright' . $topNoMargin . $rowBgClass . $ngmClass . '" style="' . $spacing . $rowBgColor . '">' . $ct . '</div>';
		}elseif($format === 'medialeft') {
			$ret = '<div class="weluka-list-row weluka-row clearfix medialeft' . $topNoMargin . $rowBgClass . $ngmClass . '" style="' . $spacing . $rowBgColor . '">' . $ct . '</div>';
		}
		return $ret;
	}
	
	/**
	 * wppost list end
	 * @since 1.0.6
	 * @update
	 * ver1.2
	 * eqh, colMode, colNum add
	 */
	public function wppostlist_end( $format, $rowColumn, $colCnt, $eqh = '', $colMode = 'md', $colNum = 12 ) {
		$ret = '';
		if( $format !== 'medialeft' && $format !== 'mediaright' ) {
			if((int)$colCnt !== 0 && (int)$colCnt !== (int)$rowColumn) {
				//v1.2
				if( !empty( $eqh ) ) {
					//equal heightの際に最後の行でカラム数が足りないとカラムがフル幅になるのでダミーカラムを追加する。
					$addCnt = (int)$rowColumn - (int)$colCnt;
					for( $i = 0 ; $i < $addCnt; $i++ ) {
						$ret .= '<div class="weluka-col-' . $colMode . '-' . $colNum . ' weluka-list-blank-col"></div>';
					}
				}
				//v1.2 addend
				$ret .= '</div>';
			}
		}
		return $ret;
	}

	/**
	 * wppost list replace id
	 * @since 1.2.8
	 */
	public function wppost_replace_id($ct, $colMode='md', &$count=0){
		$searchArray  = array('weluka-accordion-', 'weluka-collapse-', 'weluka-tab-content-');
		$replaceArray = $searchArray;
		if($colMode === 'md') {$nodeId = Weluka::get_instance()->create_node_id();}
		else{$nodeId = $colMode;}
		foreach($replaceArray as &$ra){ $ra .= $nodeId . '-'; }
		unset($ra);
		$ret = str_replace($searchArray, $replaceArray, $ct, $count);
		return $ret;
	}


	/**
	 * weluka-wpmenu wp_nav_menu shortcode func
	 * @since 1.0
	 * @update
	 * ver1.1.2
	 * ver1.2.1
	 */
	public function sh_weluka_wpmenu( $atts ) {
		extract(shortcode_atts(
			array(
				'themelocation'  => '',
				'menu'            => '',
				'container'       => '',
				'containerclass' => '',
				'containerid'    => '',
				'menuclass'      => '',
				'menuid'         => '',
				'echo'            => false,
				'fallbackcb'     => '',
				'before'          => '',
				'after'           => '',
				'linkbefore'     => '',
				'linkafter'      => '',
				'itemswrap'      => '',
				'depth'           => 0,
				'walker'          => '',
				//v1.1.2 add
				'descflg'		=> '',
				'descf'			=> '',
				'descfs'		=> '',
				'descw'			=> '',
				'descul'		=> '',
				'desci'			=> '',
				'desctc'		=> '',
				'descal'		=> 'weluka-navdesc-bottom'
			), $atts )
		);

		//v1.1.2 remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );
		remove_filter( 'posts_results', array($this, 'render_posts_results'), 10, 2 );

		//v1.1.2 add
		add_filter( 'walker_nav_menu_start_el', array($this, 'wp_nav_description'), 10, 4 );

		$_linkBefore = '';
		$_linkAfter = '';
		if( $descflg == 'on' ) {
			$descFont		= !empty($descf) ? ' ' . $descf : '';
			$descFontSize	= isset($descfs) && strlen($descfs) > 0 ? ' font-size:' . $descfs . 'px !important;' : '';
			$descWeight		= !empty($descw) ? ' font-weight:bold !important;' : '';
			$descUnderline	= !empty($descul) ? ' text-decoration:underline !important;' : '';
			$descItalic		= !empty($desci) ? ' font-style:italic !important;' : '';

			$descTextColor 	= !empty($desctc) ? ' color:' . $desctc . ' !important;' : "";
			//v1.2.1 {%WELUKA_DESCRIPTION_HIDEFLG%} add
			$description = '<span class="' . $descal . '" style="' . $descFont . $descFontSize . $descWeight . $descUnderline . $descItalic . $descTextColor . '">{%WELUKA_DESCRIPTION%}</span>';
			//v1.2.1 modify if( $descal == 'weluka-navdesc-top' ) { $_linkBefore = $description; } else { $_linkAfter = $description; }
			if( $descal == 'weluka-navdesc-top' ) {
				$_linkBefore = $description . '<span class="linktext{%WELUKA_DESCRIPTION_TOP_FLG%}">';
				$_linkAfter = '</span>';
			} else {
				$_linkBefore = '<span class="linktext">';
				$_linkAfter = '</span>' . $description;
			}

		} else {
			//v1.2.1 else block add
			$_linkBefore = '<span class="linktext">';
			$_linkAfter = '</span>';			
		}
		//v1.1.2 addend

		$ct	= wp_nav_menu( array(
			'menu'				=> $menu,
			'container'			=> $container,
			'container_id'		=> $containerid,
			'container_class'	=> $containerclass,
			'fallback_cb'		=> '',
			'menu_class'		=> $menuclass,
			'depth'				=> $depth,
			'echo'				=> $echo,
			//v1.1.2 add
			'link_before'     	=> $_linkBefore,
			'link_after'      	=> $_linkAfter
/*
			'theme_location'  => $themelocation,
			'menu'            => $menu,
			'container'       => $container,
			'container_class' => $containerclass,
			'container_id'    => $containerid,
			'menu_class'      => $menuclass,
			'menu_id'         => $menuid,
			'echo'            => $echo,
			'fallback_cb'     => $fallbackcb,
			'before'          => $before,
			'after'           => $after,
			'link_before'     => $linkbefore,
			'link_after'      => $linkafter,
			'items_wrap'      => $itemswrap,
			'depth'           => $depth,
			'walker'          => $walker
*/
		) );
		
		//v1.1.2 add
		remove_filter('walker_nav_menu_start_el', array($this, 'wp_nav_description'));

		//v1.1.2 add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);
		add_filter( 'posts_results', array($this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpmenu2 WP_Nav_Menu_Widget shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpmenu2( $atts ) {
		extract(shortcode_atts(
			array(
				'title'		=> '',
				'navmenu'	=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );
	    
		$type = 'WP_Nav_Menu_Widget';
		$instance = array(
			'title'		=> $title,
            'nav_menu'	=> $navmenu
		);			
		
		$beforeTitle = $afterTitle = "";
		if($title !== ''){
			$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle">';
			$afterTitle		= '</h3>';
		}
    	$args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * walker_nav_menu_start_el hook
	 * @since 1.1.2
	 * @update
	 * ver1.2.1
	 */
	public function wp_nav_description( $item_output, $item, $depth, $args ) {
		$desc = '';
		if( $item->description ) { $desc = $item->description; }
		$item_output = str_replace( "{%WELUKA_DESCRIPTION%}", $item->description, $item_output );

		//v1.2.1 add
		$noblock = '';
		if( !$desc ) { $noblock = ' noblock'; }
		$item_output = str_replace( "{%WELUKA_DESCRIPTION_TOP_FLG%}", $noblock, $item_output );
		//v1.2.1 addend
		
		return $item_output;
	}

	/**
	 * weluka-wpcalendar shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpcalendar( $atts ) {
		extract(shortcode_atts(
			array(
				'title'		=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );
	    
        $type = 'WP_Widget_Calendar';
		$instance = array( 'title' => $title );
			
		$beforeTitle = $afterTitle = "";
		if($title !== ''){
			$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle">';
			$afterTitle		= '</h3>';
		}
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wparchives shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wparchives( $atts ) {
		extract(shortcode_atts(
			array(
				'title'		=> '',
				'showtype'	=> 'monthly',
				'showcount'	=> false,
				'showformat'	=> 'html',
				'showlimit'	=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

		$ct = '<div class="widget widget_archive">';
		if($title !== ''){
			$ct	.= '<h3 class="widgettitle weluka-widgettitle">' . $title . '</h3>';
		}
		
		$before = $after = "";
		if($showformat === "html") {
			$before = '<ul>';
			$after = '</ul>';

		}elseif($showformat === "option") {
			$before = '<select name="archive-dropdown" onChange="document.location.href=this.options[this.selectedIndex].value;"><option value="">' . esc_attr(__('Select Month')) . '</option>';
			$after	= '</select>';

		}
		$ct .= $before;
		$ct .= wp_get_archives( apply_filters('weluka_get_archive_args', array(
						'type'				=> $showtype,
						'limit'				=> $showlimit,
						'format'			=> $showformat,
						'show_post_count'	=> $showcount,
						'echo'				=> false
			   )));
		$ct .= $after;
		$ct .= '</div>';
		
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpcategories shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpcategories( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'count'			=> false,
				'hierarchical'	=> false,
				'dropdown'		=> false
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Categories';
		$ct = $before = $after = "";
		$instance = array(
			'title'			=> $title,
            'count' 		=> $count,
            'hierarchical'	=> $hierarchical,
            'dropdown'		=> $dropdown
		);
			
		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();
		
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpmeta shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpmeta( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Meta';
		$instance = array( 'title' => $title );
			
		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';

        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();		

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wppages shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wppages( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'sortby'		=> 'menu_order',
				'exclude'		=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );
 
        $type = 'WP_Widget_Pages';
		$ct = $before = $after = "";
		$instance = array(
			'title'			=> $title,
            'sortby' 		=> $sortby,
            'exclude'		=> $exclude
		);
			
		$beforeTitle = $afterTitle = $none = "";
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();

		if( empty( $ct ) ) {
			$ct = __('Page none.', Weluka::$settings['plugin_name'] );
		}
		
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpcomments shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpcomments( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'number'		=> 5
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Recent_Comments';
		$ct = $before = $after = "";
		$instance = array(
			'title'			=> $title,
            'number'		=> $number
		);

		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();
		
		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wprss shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wprss( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'url'			=> '',
				'items'			=> 5,
				'showsummary'	=> 0,
				'showauthor'	=> 0,
				'showdate'		=> 0
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_RSS';
		$ct = "";
		$instance = array(
			'title'			=> $title,
            'url'			=> $url,
			'items'			=> $items,
			'show_summary'	=> $showsummary,
			'show_author'	=> $showauthor,
			'show_date'		=> $showdate
		);

		$beforeTitle = $afterTitle = "";		
		$none = $title === "" ? " weluka-hide" : "";
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';
        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle,
		);

		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();
		if( empty( $ct ) ) {
			$ct = __( '<span class="rssnone">Feed none.</span>', Weluka::$settings['plugin_name'] );
		}

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wpsearch shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wpsearch( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> ''
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Search';
		$instance = array( 'title' => $title );
			
		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';

        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-wptagcloud shortcode func
	 * @since 1.0
	 */
	public function sh_weluka_wptagcloud( $atts ) {
		extract(shortcode_atts(
			array(
				'title'			=> '',
				'taxonomy'		=> 'post_tag'
			), $atts )
		);

		remove_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2 );

        $type = 'WP_Widget_Tag_Cloud';
		$instance = array(
			'title'		=> $title,
			'taxonomy'	=> $taxonomy
		);
			
		$beforeTitle = $afterTitle = $none = "";		
		if($title === ''){
			$none = " weluka-hide";
		}
		$beforeTitle	= '<h3 class="widgettitle weluka-widgettitle' . $none . '">';
		$afterTitle		= '</h3>';

        $args = array(
			"before_title"	=> $beforeTitle,
			"after_title"	=> $afterTitle
		);
		ob_start();
        the_widget($type, $instance, $args);
        $ct = ob_get_clean();
		if( empty( $ct ) ) {
			$ct = __( '<span class="tagnone">Tagcloud none.</span>', Weluka::$settings['plugin_name'] );
		}

		add_filter( 'posts_results', array(&$this, 'render_posts_results'), 10, 2);

		return $ct;
	}

	/**
	 * weluka-bgvideo shortcode func
	 * @since 1.2.7.1
	 */
	public function sh_weluka_bgvideo( $atts ) {
		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'mp4'		=> '',
				'webm'		=> '',
				'poster'	=> '',
				'sphide'	=> ''
			), $atts )
		);

		$mp4Url		= strlen($mp4) > 0 ? '<source src="' . $mp4 . '" type="video/mp4">' : '';
		$webmUrl	= strlen($webm) > 0 ? '<source src="' . $webm . '" type="video/webm">' : '';

		// modify v1.2.8
		$divClass = '<div class="weluka-bg-movie-container';
		$videoAuto = '"><video class="weluka-bg-movie-fill" ';
		$ret = 'loop muted poster="' . $poster . '">' . 
			$mp4Url . $webmUrl .
		'</video></div>';

		// smartphone and tablet 
		if( isset($sphide) && wp_is_mobile() ) {
			if($sphide == 'control'){
				$divClass .= ' weluka-sp-movie-control';
				//inlineはiOS用属性
				$ret = $divClass . $videoAuto . 'playsinline webkit-playsinline ' . $ret . 
				'<div class="weluka-sp-pl-img weluka-sp-movie-button weluka-play-circle"></div>
				<div class="weluka-sp-play weluka-sp-movie-button weluka-play-circle"></div>';
			}elseif($sphide == 'on'){
				$ret = '';
			}else{
				$ret = $divClass . $videoAuto . 'autoplay ' . $ret;
			}
		}else{
			$ret = $divClass . $videoAuto . 'autoplay ' . $ret;
		}
		return $ret;
	}

	/**
	 * weluka-bgvideocss shortcode func
	 * @since 1.2.7.1
	 */
	public function sh_weluka_bgvideocss( $atts ) {
		$weluka = Weluka::get_instance();
		extract(shortcode_atts(
			array(
				'id'		=> '',
				'poster'	=> '',
				'sphide'	=> ''
			), $atts )
		);
		
		$ret = '';

		//add v1.2.8
		if( isset($sphide) && wp_is_mobile() ) {
			if($sphide == 'on'){
				$cssContent = ' { background-image:url(' . $poster . ');background-position:50% 0;background-repeat:no-repeat;background-attachment:scroll;background-size:cover;z-index:0; } ';
			}elseif ($sphide == 'control'){
				$cssContent = ' .weluka-bg-movie-container video{margin:initial;top:50%;left:50%;bottom:initial;right:initial;-webkit-transform:translateY(-50%) translateX(-50%);transform:translateY(-50%) translateX(-50%);object-fit:fill}';
			}else{
				$cssContent = '';
			}
			
			$ret =  $cssContent ? '<div class="weluka-hide"><style> ' .
					'#' . $id . $cssContent . 
			'</style></div>' : '';
		}
		//smartphone and tablet
		// if( isset($sphide) && $sphide == 'on' && wp_is_mobile() ) {
		// 	$ret = '<div class="weluka-hide"><style> ' .
		// 			'#' . $id . ' { background-image:url(' . $poster . ');background-position:50% 0;background-repeat:no-repeat;background-attachment:scroll;background-size:cover;z-index:0; } ' .
		// 	'</style></div>';
		// }
		return $ret;
	}

/*------------------------------------------------------------------------------
 [ Builder Ajax 関連 ] 
------------------------------------------------------------------------------*/

	/**
	 * wp_ajax_weluka_get_site_content hook
	 * #weluka-builder-button click ajax event
	 * @since 1.0
	 * @update
	 * ver1.2.3
	 */
	public function weluka_get_site_content() {
		$weluka = Weluka::get_instance();
		if( !$weluka->check_nonce() ){
			wp_send_json(array('msg' => 'nonce error!'));
			exit;
		}
		$post_id	= isset($_REQUEST['postId']) ? $_REQUEST['postId'] : "";
		$new_flg	= isset($_REQUEST['newFlg']) ? $_REQUEST['newFlg'] : "";
		
		//$post_type	= isset($_REQUEST['postType']) ? $_REQUEST['postType'] : "";

		//post-newの場合、auto-draftレコードがあるがあるがこれだとテンプレート判断ができないので下書きしてからレコード保存。
		//var_dump(get_post($_REQUEST['postId']));
		if($new_flg == 'new'){
			$weluka->dummy_insert_post($post_id);
		}

		//v1.2.3 comment out $_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID]		= $post_id;  //set current builder target postid to global variable

		$ret["editUrl"] = $weluka->get_edit_url($post_id);
    	wp_send_json($ret);
    	exit; //ajaxの場合 exit or dieで終了する
	}

	/**
	 * wp_ajax_weluka_save_content hook
	 * save  click ajax event
	 * @since 1.0
	 * @update
	 * v1.2.3
	 */
	public function weluka_save_content() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$post_id	= isset($_REQUEST['postId']) ? $_REQUEST['postId'] : '';
		$mode		= isset($_REQUEST['mode']) ? $_REQUEST['mode'] : 'save';
		//$save_data	= isset($_REQUEST['saveData']) ? $weluka->unslash( $_REQUEST['saveData'] ) : array(); //saveDataはArray化されている。
		$_json	= isset($_REQUEST['saveData']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['saveData'])), "UTF-8", "auto") : ""; //json string
		
		$save_data = $_json !== "" ? $weluka->unslash( json_decode(stripslashes($_json), true) ) : "";

		if( !empty( $save_data['pagesetting'] ) ){
			$save_data['pagesetting']['seo_title']			= isset($save_data['pagesetting']['seo_title']) ? strip_tags( $save_data['pagesetting']['seo_title'] ) : "";
			$save_data['pagesetting']['seo_keywords']		= isset($save_data['pagesetting']['seo_keywords']) ? strip_tags( $save_data['pagesetting']['seo_keywords'] ) : "";
			$save_data['pagesetting']['seo_description']	= isset($save_data['pagesetting']['seo_description']) ? strip_tags( $save_data['pagesetting']['seo_description'] ) : "";
		}

		//postmeta weluka-builder-draft save
		$result = $weluka->save_postmeta($post_id, self::CONTENT_POSTMETA_KEY_DRAFT, $save_data);

		if($mode === 'preview') {
			//$_SESSION[self::WELUKA_BUILDER_TARGET_POST_ID] = $post_id;  //set current builder target postid to global variable
		}

		if($mode === 'publish') {
			//$result = $weluka->save_postmeta($post_id, self::CONTENT_POSTMETA_KEY_PUBLISH, $save_data);
			list($result, $content) = $this->publish_builder_data($post_id);
		}

    	wp_send_json($ret);
    	exit; //ajaxの場合 exit or dieで終了する
	}

	/**
	 * wp_ajax_weluka_add_widgetdata hook
	 * builder add widget event
	 * @since 1.0
	 */
	public function weluka_add_widgetdata() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$widget_type	= isset($_REQUEST['widgetType']) ? $_REQUEST['widgetType'] : self::WIDGET_TEXT; //default WIDGET_TEXT
		$add_block		= isset($_REQUEST['addBlock']) ? $_REQUEST['addBlock'] : "widget"; //default widget
		$model			= isset($_REQUEST['data']) ? $_REQUEST['data'] : "";
		$pos			= isset($_REQUEST['position']) ? $_REQUEST['position'] : "s-col-left-out";
		$_post_id		= isset($_REQUEST['postId']) ? $_REQUEST['postId'] : "";
		
		$this->set_property(self::PROP_KEY_BUILDER_MODE, true); //builder mode on
		$this->set_property("currentPostId", $_post_id); //current edit post id

		if($add_block === 'section') {
			$arr = $this->create_section_array2($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_section($arr, false);
		}elseif($add_block === 'row') {
			$arr = $this->create_row_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_row($arr, false);
		}elseif($add_block === 'col') {
			//colum
			$arr = $this->create_colum_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_colum($arr, false);
		}elseif($add_block === 'widget_col') {
			//widget => subrow形式に変換
			$arr[0] = $this->widget_to_subrow_array($widget_type, $model, $pos);
			$ret['jsonData'] = $arr[0];
			$ret['html'] = $this->render_items($arr, false);
		}elseif($add_block === 's_col') {
			//colum
			$arr = $this->create_subcolum_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_colum($arr, false, true);
		}elseif($add_block === 's_row') {
			$arr = $this->create_subrow_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_row($arr, false, true);
		}elseif($add_block === 'new'){
			$ret['html'] = $this->render_new_blank(false);
		}elseif($add_block === 's_widget') {
			$arr = $this->create_item_array($widget_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_item($arr, false, true);
		}else{
			//widget
			$arr[0] = $this->create_item_array($widget_type);
			$ret['jsonData'] = $arr[0];
			$ret['html'] = $this->render_items($arr, false);
		}
		$this->set_property(self::PROP_KEY_BUILDER_MODE, false); //builder mode off
		$this->set_property("currentPostId", ""); //current edit post id clear
		wp_send_json($ret);
		exit;
	}

	/**
	 * wp_ajax_weluka_move_data hook
	 * builder move section row col widget event
	 * @since 1.0
	 */
	public function weluka_move_data() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$move_type	= isset($_REQUEST['moveType']) ? $_REQUEST['moveType'] : "widget"; //default widget
		$add_block	= isset($_REQUEST['addBlock']) ? $_REQUEST['addBlock'] : "widget"; //default widget
		//$move_model	= isset($_REQUEST['moveModel']) ? $_REQUEST['moveModel'] : null;
		//$widget_model	= isset($_REQUEST['data']) ? $_REQUEST['data'] : null;
		$pos	= isset($_REQUEST['position']) ? $_REQUEST['position'] : "s-col-left-out";

		$_moveJson	= isset($_REQUEST['moveModel']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['moveModel'])), "UTF-8", "auto") : ""; //json string
		$move_model = $_moveJson !== "" ? $weluka->unslash( json_decode(stripslashes($_moveJson), true) ) : null;

		$_widgetJson	= isset($_REQUEST['data']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['data'])), "UTF-8", "auto") : ""; //json string
		$widget_model	= $_widgetJson !== "" ? $weluka->unslash( json_decode(stripslashes($_widgetJson), true) ) : null;

		$this->set_property(self::PROP_KEY_BUILDER_MODE, true); //builder mode on
		if($add_block === 'section') {
			$arr = $this->create_section_array2("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_section($arr, false);
		}elseif($add_block === 'row') {
			// widget or colum or row TODO subrow
			$arr = $this->create_row_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_row($arr, false);
		}elseif($add_block === 'col') {
			// widget or colum TODO subrow
			$arr = $this->create_colum_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_colum($arr, false);
		}elseif($add_block === 'widget_col') {
			//widget => subrow形式に変換
			$arr[0] = $this->widget_to_subrow_array("", $widget_model, $pos, $move_model, $move_type);
			$ret['jsonData'] = $arr[0];
			$ret['html'] = $this->render_items($arr, false);
		}elseif($add_block === 's_col') {
			//colum
			$arr = $this->create_subcolum_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_colum($arr, false, true);
		}elseif($add_block === 's_row') {
			$arr = $this->create_subrow_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			$ret['html'] = $this->render_row($arr, false, true);
		}elseif($add_block === 's_widget') {
			//widget or s_widget
			//widget=not subrow type
			$move_model['id'] = $weluka->create_node_id();
			$ret['jsonData'] = $move_model;
			$ret['html'] = $this->render_item($move_model, false, true);
		}elseif($add_block === 'widget'){
			/*
			if($move_type === "widget") {
				$move_model['id'] = $weluka->create_node_id();
				$arr[0] = $move_model;
				$ret['jsonData'] = $arr[0];
				$ret['html'] = $this->render_items($arr, false);
			}
			*/
			$arr = $this->create_widget_array("", $move_model, $move_type);
			$ret['jsonData'] = $arr;
			
			if(!isset($arr[0]["id"])) {
				$_arr[0] = $arr;
			}else{
				$_arr = $arr;
			}
			$ret['html'] = $this->render_items($_arr, false);
		}
		$this->set_property(self::PROP_KEY_BUILDER_MODE, false); //builder mode off

		if( isset($ret['jsonData']) ) {  $ret['jsonData'] = $weluka->unslash( $ret['jsonData'] ); } //escape unset

		wp_send_json($ret);
		exit;
	}
	
	/**
	 * wp_ajax_weluka_get_html hook
	 * builder model to html
	 * @since 1.0
	 */
	public function weluka_get_html() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$block	= isset($_REQUEST['block']) ? $_REQUEST['block'] : "widget"; //default widget
		$type	= isset($_REQUEST['type']) ? $_REQUEST['type'] : self::WIDGET_IMG; //default widget img
		//$model	= isset($_REQUEST['model']) ? $_REQUEST['model'] : null;

		$_json	= isset($_REQUEST['model']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['model'])), "UTF-8", "auto") : ""; //json string

		//if($model === null) {
		if($_json === "") {
			$ret['msg'] = __('model none!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;			
		}

		$model = $weluka->unslash( json_decode(stripslashes($_json), true) );
		
		$this->set_property(self::PROP_KEY_BUILDER_MODE, true); //builder mode on
		if($block === 'col') {
			$ret['html'] = $this->render_colum($model, false);
		}
		if($block === 'row') {
			$ret['html'] = $this->render_row($model, false);
		}
		if($block === 'section') {
			$ret['html'] = $this->render_section($model, false);
		}
		elseif($block === 'widget') {
			$arr[0] = $model;
			$ret['html'] = $this->render_items($arr, false);
		}
		elseif($block === 's_widget') {
			$arr[0] = $model;
			$ret['html'] = $this->render_items($arr, false, true);
		}
		if($block === 's_col') {
			$ret['html'] = $this->render_colum($model, false, true);
		}
		if($block === 's_row') {
			$ret['html'] = $this->render_row($model, false, true);
		}
		//$ret['html'] = do_shortcode($ret['html']);
		
		$this->set_property(self::PROP_KEY_BUILDER_MODE, false); //builder mode off
		wp_send_json($ret);
		exit;
	}

	/**
	 * wp_ajax_weluka_partial hook
	 * builder model to html
	 * @since 1.0
	 * @update
	 * ver1.0.7 copy template add
	 */
	public function weluka_partial() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$mode	= isset($_REQUEST['mode']) ? $_REQUEST['mode'] : "get"; //get or save or remove default get
		//$model	= isset($_REQUEST['model']) ? $_REQUEST['model'] : null;
		$type	= isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
		$name	= isset($_REQUEST['name']) ? $_REQUEST['name'] : '';

		$_json	= isset($_REQUEST['model']) ? mb_convert_encoding(str_replace(array("\r\n","\n","\r"), '', trim($_REQUEST['model'])), "UTF-8", "auto") : ""; //json string
		$model 	= $_json !== "" ? $weluka->unslash( json_decode(stripslashes($_json), true) ) : null;

		$cpblocknm = isset($_REQUEST['cpblocknm']) ? $_REQUEST['cpblocknm'] : '';	//v1.0.7 add

		if($model === null) {
			$ret['msg'] = __('model none!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;			
		}
		
		if($type === self::APPLIST_CUSTOM_DESIGN) {
			$optionName = WelukaAdminSettings::APPLIST_CUSTOM_DESIGN_OPTION_NAME;
			if($mode === 'save') {
				$ret['msg'] = WelukaAdminSettings::save_custom_design($optionName, $name, $model);
			} elseif($mode === 'remove') {
				$ret['msg'] = WelukaAdminSettings::remove_custom_design($optionName, $name);
			} else { //get
				$ret['json'] = WelukaAdminSettings::get_custom_design($optionName, $name);
			}
		} elseif ($type === self::APPLIST_REG_LIST) {
			if($mode === 'save') {
				$ret['msg'] = WelukaAdminSettings::save_applist_reglist($name, $model);
			} elseif($mode === 'remove') {
				$ret['msg'] = WelukaAdminSettings::remove_applist_reglist($name);
			} else { //get
				$ret['json'] = WelukaAdminSettings::get_applist_reglist($name);
			}
		} elseif ($type === self::WPMENU_CUSTOM_DESIGN) {
			$optionName = WelukaAdminSettings::WPMENU_CUSTOM_DESIGN_OPTION_NAME;
			if($mode === 'save') {
				$ret['msg'] = WelukaAdminSettings::save_custom_design($optionName, $name, $model);
			} elseif($mode === 'remove') {
				$ret['msg'] = WelukaAdminSettings::remove_custom_design($optionName, $name);
			} else { //get
				$ret['json'] = WelukaAdminSettings::get_custom_design($optionName, $name);
			}
		} elseif ($type === self::WPPOSTS_CUSTOM_DESIGN) {
			$optionName = WelukaAdminSettings::WPPOSTS_CUSTOM_DESIGN_OPTION_NAME;
			if($mode === 'save') {
				$ret['msg'] = WelukaAdminSettings::save_custom_design($optionName, $name, $model);
			} elseif($mode === 'remove') {
				$ret['msg'] = WelukaAdminSettings::remove_custom_design($optionName, $name);
			} else { //get
				$ret['json'] = WelukaAdminSettings::get_custom_design($optionName, $name);
			}
		//v1.0.7 addstart
		} elseif ($type === self::COPY_TPL) {
			$optionName = WelukaAdminSettings::COPYTPL_OPTION_NAME;
			$arr = array('blocknm' => $cpblocknm, 'data' => $model );
			if($mode === 'save') {
				$ret['msg'] = WelukaAdminSettings::save_custom_design($optionName, $name, $arr);
			} elseif($mode === 'remove') {
				$ret['msg'] = WelukaAdminSettings::remove_custom_design($optionName, $name);
			} else { //get
				$ret['json'] = WelukaAdminSettings::get_custom_design($optionName, $name);
			}
		} //v1.0.7 addend
		wp_send_json($ret);
		exit;
	}

	/**
	 * get layout select json data
	 * @since 1.0.3
	 * @update
	 * v1.1.4.1
	 */
	public function get_layout_select_data( $category, $layout, $jsonFile, $idCnt ) {
		$ret = "";
		$samplePath	= Weluka::$settings['plugin_dir'] . 'assets/sample/' . $category . '/';
		$jsonData = '';
		if( file_exists( $samplePath . $jsonFile ) ) {
			$jsonData = file_get_contents( $samplePath . $jsonFile );
		}
		if( $jsonData ) {
			//$jsonData = mb_convert_encoding( $jsonData, 'UTF-8', 'ASCII,JIS,EUC-JP,SJIS-WIN' );
			$jsonData =  str_replace(array("\r\n", "\r", "\n", "\t"), '', $jsonData );
			
			//ID replace v1.1.4.1 modify
			//$reps = "";
			//$repAfter = "";
			$reps = array();
			$repAfter = array();

			for( $i = 1 ; $i <= $idCnt; $i++ ) {
				$reps[$i - 1]		= "{%ID-$i%}";
				$repAfter[$i - 1]	= Weluka::get_instance()->create_node_id();
			}
			$ret =  str_replace( $reps, $repAfter, $jsonData );

			$imgPath = Weluka::$settings['plugin_url'] . 'assets/sample/' . $category . '/' . $layout . '/';
			$ret =  str_replace( "{%IMG_PATH%}", $imgPath, $ret );
			
/*
			//custom css
			$cssData = '';
			if( file_exists( $samplePath . $cssFile ) ) {
				$cssData = file_get_contents( $samplePath . $cssFile );
			}
			if( $cssData ) {
				$weluka_theme = WelukaTheme::get_instance();
				$themeOpt = get_option( $weluka_theme->get_option_name() );
				if( !empty( $themeOpt[WelukaTheme::CUSTOM_CSS] ) ) {
					$themeOpt[WelukaTheme::CUSTOM_CSS] .= $cssData; 
				} else {
				}
				Weluka::get_instance()->update_option( $weluka_theme->get_option_name(), $themeOpt );
			}
*/
		}
		return $ret; 
	}
	
	/**
	 * wp_ajax_weluka_layout_select hook
	 * select layout db save
	 * @since 1.0.3
	 */
	public function weluka_layout_select() {
		$weluka = Weluka::get_instance();
		$ret = array('msg' => '', 'model' => '');
		if( !$weluka->check_nonce() ){
			$ret['msg'] = __('nonce error!', Weluka::$settings['plugin_name']);
			wp_send_json($ret);
			exit;
		}
		$_category	= isset($_REQUEST['category']) ? $_REQUEST['category'] : '';
		$_layout	= isset($_REQUEST['layout']) ? $_REQUEST['layout'] : '';
		$_jfile		= isset($_REQUEST['jsonf']) ? $_REQUEST['jsonf'] : '';
		$_idcnt		= isset($_REQUEST['idcnt']) ? $_REQUEST['idcnt'] : 0;
		$_postId	= isset($_REQUEST['postId']) ? $_REQUEST['postId'] : '';
		//$this->set_property(self::PROP_KEY_BUILDER_MODE, true); //builder mode on

		$ret['model'] =  $this->get_layout_select_data( $_category, $_layout, $_jfile, $_idcnt );
		if( $ret['model'] == '' ) {
			$ret['msg'] = __('Failed to get the selected layout data.', Weluka::$settings['plugin_name']);
		}
		//$this->set_property(self::PROP_KEY_BUILDER_MODE, false); //builder mode off
		wp_send_json($ret);
		exit;
	}
	
/*------------------------------------------------------------------------------
 [ Builder Utility 関連 ] 
------------------------------------------------------------------------------*/
	/**
	 * get layout sample json data
	 * @since 1.0.3
	 */
	public function get_layout_sample_json( $arr=true ) {
		$jsonData = file_get_contents( Weluka::$settings['plugin_dir'] . 'assets/sample/sampledata.json' );
		if($jsonData && $arr ) {
        	$jsonData = json_decode($jsonData, true);
		}
		return $jsonData;
	}
	
	/**
	 * get builder data
	 * @since 1.0
	 */
	public function get_builder_data($postId, $keyName, $itemName = '', $mode = true) {
		//return Weluka::get_instance()->get_postmeta($postId, $keyName, $mode);
		$ret = Weluka::get_instance()->get_postmeta($postId, $keyName, $mode);
		if( $itemName !== '' ) {
			$ret = !empty( $ret[$itemName] ) ? $ret[$itemName] : '';
		}
		return $ret;
	}

	/**
	 * delete builder data
	 * @since 1.0
	 */
	public function delete_builder_data($postId, $keyName = "") {
		$weluka = Weluka::get_instance();
		if($keyName === "" || $keyName === self::CONTENT_POSTMETA_KEY_DRAFT) {
			$weluka->delete_postmeta($postId, self::CONTENT_POSTMETA_KEY_DRAFT);
		}
		
		if($keyName === "" || $keyName === self::CONTENT_POSTMETA_KEY_PUBLISH) {
			$weluka->delete_postmeta($postId, self::CONTENT_POSTMETA_KEY_PUBLISH);
		}
	}

    /**
     * json 不要文字削除
     * @since 1.0
     */
	public function replace_json($json) {
 		//エスケープ文字の削除は行わない
		return str_replace(array("\r\n", "\r", "\n", "\t"), '', $json);
    }

	/**
	 * setting modal common parts margin setting show
	 * @since 1.0
	 * @update
	 * ver1.1.2
	 */
	public function weluka_display_margin_setting($key, $echo=true, $disp = 'all', $lblPrefix = '') {
		$prefix = 'weluka' . $key . 'SettingMargin';
		$prefix2 = 'weluka' . $key . 'SettingPadding';
		$prefix3 = 'weluka' . $key . 'SettingPaddingInWrap'; //v1.1.2
		$ret = "";
		
		if($disp !== 'notmargin') {
			$ret .= '<h5>' . __('Margin (px)', Weluka::$settings['plugin_name']) . $lblPrefix . '</h5>';
			$ret .= '<div class="weluka-row clearfix">';

		    $ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Top', Weluka::$settings['plugin_name']) . '</label>';
       		$ret .= '<input id="' . $prefix . 'Top" name="' . $prefix . 'Top" type="text" class="form-control" />';
        	$ret .= '</div></div>';

		    $ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Bottom', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix . 'Bottom" name="' . $prefix . 'Bottom" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			if($disp !== 'notmglr') {

		    $ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Left', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix . 'Left" name="' . $prefix . 'Left" type="text" class="form-control" />';
    		$ret .= '</div></div>';

		    $ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Right', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix . 'Right" name="' . $prefix . 'Right" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			}
			
        	$ret .= '</div>';
		}
		
		if($disp !== 'notpadding') {
			$ret .= '<h5>' . __('Padding (px)', Weluka::$settings['plugin_name']) . $lblPrefix . '</h5>';
			$ret .= '<div class="weluka-row clearfix">';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Top', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix2 . 'Top" name="' . $prefix2 . 'Top" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Bottom', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix2 . 'Bottom" name="' . $prefix2 . 'Bottom" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Left', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix2 . 'Left" name="' . $prefix2 . 'Left" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Right', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix2 . 'Right" name="' . $prefix2 . 'Right" type="text" class="form-control" />';
        	$ret .= '</div></div>';

  			$ret .= '</div>';
		}
		
		// v1.1.2 add
		if( strncmp( $key, "Col", 3 ) === 0 ) {
			$ret .= '<h5>' . __('Inbox Padding (px) ', Weluka::$settings['plugin_name']) . $lblPrefix . '</h5>';
			$ret .= '<div class="weluka-row clearfix">';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Top', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix3 . 'Top" name="' . $prefix3 . 'Top" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Bottom', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix3 . 'Bottom" name="' . $prefix3 . 'Bottom" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Left', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix3 . 'Left" name="' . $prefix3 . 'Left" type="text" class="form-control" />';
        	$ret .= '</div></div>';

			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Right', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input id="' . $prefix3 . 'Right" name="' . $prefix3 . 'Right" type="text" class="form-control" />';
        	$ret .= '</div></div>';
        	$ret .= '<div class="help-block">' . __('See Add columns in the box format, background color, and border. "In check in case you can specify margins within the.', Weluka::$settings['plugin_name']) . '</div>';

  			$ret .= '</div>';
		}
		//v1.1.2 addend

		if($echo){ echo $ret; } else { return $ret; }
	}

	/**
	 * setting modal common parts css selectore setting show
	 * @since 1.0
	 */
	public function weluka_display_css_setting($key, $echo=true) {
		$prefix = 'weluka' . $key . 'SettingCss';
		$ret = "";
		$ret = '<h5>' . __('Css Selectors', Weluka::$settings['plugin_name']) . '</h5>';
	    //$ret .= '<div class="form-group">';
		//$ret .= '<div class="weluka-row clearfix">';
		//$ret .= '<div class="weluka-col-md-4"><label>' . __('Id', Weluka::$settings['plugin_name']) . '</label></div>';
        //$ret .= '<div class="weluka-col-md-8"><input id="' . $prefix . 'Id" name="' . $prefix . 'Id" type="text" class="form-control" /></div>';
        //$ret .= '</div>';
        //$ret .= '</div>';
        $ret .= '<div class="form-group">';
		$ret .= '<div class="weluka-row clearfix">';
		$ret .= '<div class="weluka-col-md-4"><label>' . __('Class', Weluka::$settings['plugin_name']) . '</label></div>';
        $ret .= '<div class="weluka-col-md-8"><input id="' . $prefix . 'Class" name="' . $prefix . 'Class" type="text" class="form-control" /></div>';
        $ret .= '</div>';
        $ret .= '</div>';
		
		if($echo){ echo $ret; } else { return $ret; }
	}

	/**
	 * setting modal common parts style(bgcolor border animation) setting show
	 * @since 1.0
	 * @update
	 * ver1.1.2
	 * ver1.2.3
	 */
	public function weluka_display_style_setting($key, $disp = array('all'), $echo=true) {
		$ret = '<h5>' . __('Block Style', Weluka::$settings['plugin_name']) . '</h5>';
		$ret .= '<div class="weluka-row clearfix">';

		//if($disp === 'all' || $disp === 'bgcolor') {
		if(in_array("all", $disp) || in_array("bgcolor", $disp)) {
			$name = 'weluka' . $key . 'SettingBlockBgColor';
			$ret .= '<div class="weluka-col-md-3"><div class="form-group">'; //v1.2.3 weluka-col-md-4 => weluka-col-md-3
			$ret .= '<label>' . __('Bg Color', Weluka::$settings['plugin_name']) . '</label>';
			$ret .= '<div id="'. $name . 'Wrap' . '">';
        	//$ret .= '<input type="text" id="' . $name .'" name="' . $name . '" class="weluka-color-picker form-control" value="" />';
			$ret .= '</div>';
       		$ret .= '</div></div>';
		}
		
		//if($disp === 'all' || $disp === 'color') {
		if(in_array("all", $disp) || in_array("color", $disp)) {
			$name = 'weluka' . $key . 'SettingBlockColor';
			$ret .= '<div class="weluka-col-md-3"><div class="form-group">'; //v1.2.3 weluka-col-md-4 => weluka-col-md-3
			$ret .= '<label>' . __('Text Color', Weluka::$settings['plugin_name']) . '</label>';
			$ret .= '<div id="'. $name . 'Wrap' . '">';
        	//$ret .= '<input type="text" id="' . $name .'" name="' . $name . '" class="weluka-color-picker form-control" value="" />';
			$ret .= '</div>';
       		$ret .= '</div></div>';
		}

		//if($disp === 'all' || $disp === 'shape') {
		if(in_array("all", $disp) || in_array("shape", $disp)) {
			$name = 'weluka' . $key . 'SettingBlockShape';
			$ret .= '<div class="weluka-col-md-3"><div class="form-group">'; //v1.2.3 weluka-col-md-4 => weluka-col-md-3
			$ret .= '<label>' . __('Shape', Weluka::$settings['plugin_name']) . '</label>';
	        $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        	$ret .= '<option value="">' . __('Square', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="img-rounded">' . __('Round', Weluka::$settings['plugin_name']) . '</option>';
           	$ret .= '</select>';
       		$ret .= '</div></div>';
			
			//v1.2.3 add
			$name = 'weluka' . $key . 'SettingBlockRadius';
			$ret .= '<div class="weluka-col-md-3"><div class="form-group">';
			$ret .= '<label>' . __('Radius size (px)', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input type="text" id="' . $name . '" name="' . $name . '" class="form-control weluka-normal-text" value="" />';
       		$ret .= '</div></div>';
			//v1.2.3 addend
		}

		//if($disp === 'all' || $disp === 'border') {
		if(in_array("all", $disp) || in_array("border", $disp)) {
			$name = 'weluka' . $key . 'SettingBlockBorderSize';
			$ret .= '<div class="weluka-col-md-4"><div class="form-group">';
			$ret .= '<label>' . __('Border Size (px)', Weluka::$settings['plugin_name']) . '</label>';
        	$ret .= '<input type="text" id="' . $name .'" name="' . $name . '" class="form-control" value="" />';
       		$ret .= '</div></div>';

			$name = 'weluka' . $key . 'SettingBlockBorderStyle';
			$ret .= '<div class="weluka-col-md-4"><div class="form-group">';
			
			$ret .= $this->weluka_display_borderstyle_settings($name, 'Border Style', true, false);
/*
			$ret .= '<label>' . __('Border Style', Weluka::$settings['plugin_name']) . '</label>';
	        $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        	$ret .= '<option value="solid">' . __('solid', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="dotted">' . __('dotted', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="dashed">' . __('dashed', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="double">' . __('double', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="groove">' . __('groove', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="ridge">' . __('ridge', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="inset">' . __('inset', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="outset">' . __('outset', Weluka::$settings['plugin_name']) . '</option>';
           	$ret .= '</select>';
*/
       		$ret .= '</div></div>';

			$name = 'weluka' . $key . 'SettingBlockBorderColor';
			$ret .= '<div class="weluka-col-md-4"><div class="form-group">';
			$ret .= '<label>' . __('Border Color', Weluka::$settings['plugin_name']) . '</label>';
			$ret .= '<div id="'. $name . 'Wrap' . '">';
        	//$ret .= '<input type="text" id="' . $name .'" name="' . $name . '" class="weluka-color-picker form-control" value="" />';
			$ret .= '</div>';
       		$ret .= '</div></div>';
		}

		// v1.1.2 add
		if( ( in_array("all", $disp) || in_array("inwrap", $disp) ) && $key === 'Col' ) {
			$name = 'weluka' . $key . 'SettingInWrap';
			$ret .= '<div class="weluka-col-md-12"><div class="form-group clearfix">';
			$ret .= '<input id="' . $name . '" name="' . $name .'" type="checkbox" value="on" />';
            $ret .= '<label for="' . $name . '">&nbsp;' . __('Adding columns in the box format, background color, and border.', Weluka::$settings['plugin_name']) . '</label>';
       		$ret .= '</div></div>';
		}
		//v1.1.2 addend

		$ret .= '</div>';
		
		if($echo){ echo $ret; } else { return $ret; }
	}

	/**
	 * border style tooltip text
	 * @since 1.2.3
	 */
	public function weluka_tooltips_borderstyle($name, $place="top") {
		$ct =
			"<span style='display:inline-block;padding:4px 8px;margin:4px;border:1px solid #f00;'>solid</span>" .
			"<span style='display:inline-block;padding:4px 8px;margin:4px;border:1px dotted #f00;'>dotted</span>" .
			"<span style='display:inline-block;padding:4px 8px;margin:4px;border:1px dashed #f00;'>dashed</span>" .
			"<span style='display:inline-block;padding:4px 8px;margin:4px;border:4px double #f00;'>double</span>" .
			"<span style='display:inline-block;padding:4px 8px;margin:4px;border:6px groove #f00;'>groove</span>" .
			"<span style='display:inline-block;padding:4px 8px;margin:4px;border:6px ridge #f00;'>ridge</span>".
			"<span style='display:inline-block;padding:4px 8px;margin:4px;border:8px inset #f00;'>inset</span>" .
			"<span style='display:inline-block;padding:4px 8px;margin:4px;border:8px outset #f00;'>outset</span>";

		$dataContainer = '';
		if( $name == 'welukaAppHorlineSettingLineStyle' ) {
			$dataContainer = 'data-container="#weluka-apphorline-setting-panel-general"';

		} elseif( $name == 'welukaImageSettingBlockBorderStyle' ) {
			$dataContainer = 'data-container="#weluka-img-setting-panel-advanced"';

		} elseif( $name == 'welukaWpPostsSettingMediaBorderStyle' ) {
			$dataContainer = 'data-container="#weluka-wpposts-setting-panel-style"';
			
		}
		
		$ret = '<span class="weluka-tip-q fa fa-question-circle" ' . $dataContainer . ' data-toggle="tooltip" data-placement="' . $place . '" title="' . $ct . '"></span>';
		return $ret;
	}
	
	/**
	 * modal setting border style setting show
	 * @since 1.0
	 * @update
	 * ver1.2.3
	 */
	public function weluka_display_borderstyle_settings($name, $label = '', $labelShow = true, $echo = true, $tooltipPlace = 'top') {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Border Style', Weluka::$settings['plugin_name']); }
			//v1.2.3 tooltips add
			$ret = '<label for="' . $name . '">' . $label;
			$ret .= $this->weluka_tooltips_borderstyle( $name, $tooltipPlace );
			$ret .= '</label>';
		}
		
	    $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control border-style-select">';
        $ret .= '<option value=""></option>';
        $ret .= '<option value="solid">' . __('solid', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="dotted">' . __('dotted', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="dashed">' . __('dashed', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="double">' . __('double', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="groove">' . __('groove', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="ridge">' . __('ridge', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="inset">' . __('inset', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="outset">' . __('outset', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';
		if($echo){ echo $ret; }else{ return $ret; }		
	}

	/**
	 * setting modal common parts font family setting show
	 * @since 1.0
	 * @update
	 * ver 1.0.4
	 * ver1.2.2
	 */
	public function weluka_display_font_settings($name, $echo=true) {
		$ret = '<label>' . __('Font', Weluka::$settings['plugin_name']) . '</label>';
	    $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
    	$ret .= '<option value="">' . __('None', Weluka::$settings['plugin_name']) . '</option>';
		$fonts = WelukaAdminSettings::get_webfonts();

		if( !empty( $fonts ) ) : //v1.0.4
		foreach($fonts as $key => $val) :
			$family = WelukaAdminSettings::replace_webfonts_family($key);
			//v1.2.2 modify $fontFamily = 'font-family:' . $family . ',' . $val['category'] . ';';
			$fontFamily = "font-family:'" . $family . "'," . $val['category'] . ';';

			//style_formats
			if(isset($val['styles']) && strlen($val['styles']) > 0) {
				$styles = explode(",", $val['styles']);
				foreach($styles as $s) :
					$t = $family;
					$addFont = $fontFamily;
					$weight = mb_ereg_replace('[^0-9]', '', $s);
					$style = mb_ereg_replace('[^a-zA-Z]', '', $s);
					if(strlen($weight) > 0 || strlen($style) > 0) {
						if(strlen($weight) > 0){
							$addFont .= 'font-weight:' . $weight . ';';
							$t .= ' ' . $weight;
						}
						if(strlen($style) > 0){
							$addFont .= 'font-style:' . mb_strtolower($style) . ';';
							$t .= ' ' . $style;
						}
					}
					$ret .= '<option value="' . $addFont . '">' . $t . '</option>';
				endforeach;
			}else{
				$ret .= '<option value="' . $fontFamily . '">' . $family . '</option>';
			}
		endforeach;
		endif; //v1.0.4
		
		//basic font
		$s = "font-family:'Lucida Grande','Lucida Sans Unicode','Hiragino Kaku Gothic Pro',Meiryo,'MS PGothic',Helvetica,Arial,Verdana,sans-serif;";
		$ret .= '<option value="' . $s . '">' . __('Gothic', Weluka::$settings['plugin_name']) . '</option>';

		$s = "font-family:HiraMinProN-W6,'MS PMincho',serif;";
		$ret .= '<option value="' . $s . '">' . __('Mincho', Weluka::$settings['plugin_name']) . '</option>';

		$s = "font-family:'andale mono',times;";
		$ret .= '<option value="' . $s . '">Andale Mono</option>';

		$s = "font-family:arial,helvetica,sans-serif;";
		$ret .= '<option value="' . $s . '">Arial</option>';

		$s = "font-family:'arial black','avant garde';";
		$ret .= '<option value="' . $s . '">Arial Black</option>';

		$s = "font-family:'book antiqua',palatino;";
		$ret .= '<option value="' . $s . '">Book Antiqua</option>';

		$s = "font-family:'comic sans ms',sans-serif;";
		$ret .= '<option value="' . $s . '">Comic Sans MS</option>';

		$s = "font-family:'courier new',courier;";
		$ret .= '<option value="' . $s . '">Courier New</option>';

		$s = "font-family:georgia,palatino;";
		$ret .= '<option value="' . $s . '">Georgia</option>';

		$s = "font-family:helvetica;";
		$ret .= '<option value="' . $s . '">Helvetica</option>';

		$s = "font-family:impact,chicago;";
		$ret .= '<option value="' . $s . '">Impact</option>';

		$s = "font-family:symbol;";
		$ret .= '<option value="' . $s . '">Symbol</option>';

		$s = "font-family:tahoma,arial,helvetica,sans-serif;";
		$ret .= '<option value="' . $s . '">Tahoma</option>';

		$s = "font-family:terminal,monaco;";
		$ret .= '<option value="' . $s . '">Terminal</option>';

		$s = "font-family:'times new roman',times;";
		$ret .= '<option value="' . $s . '">Times New Roman</option>';

		$s = "font-family:'trebuchet ms',geneva;";
		$ret .= '<option value="' . $s . '">Trebuchet MS</option>';

		$s = "font-family:verdana,geneva;";
		$ret .= '<option value="' . $s . '">Verdana</option>';

		$s = "font-family:webdings;";
		$ret .= '<option value="' . $s . '">Webdings</option>';

		$s = "font-family:wingdings,'zapf dingbats';";
		$ret .= '<option value="' . $s . '">Wingdings</option>';
		
		$ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}
	
	/**
	 * modal setting align setting show
	 * @since 1.0
	 * @update
	 * ver 1.0.3
	 * $selval, $flgNone
	 * ver1.0.4
	 * $resprefix
	 */
	public function weluka_display_align_settings($name, $label = '', $labelShow = true, $echo = true, $selval = '', $flgNone = false, $resprefix = '') {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Alignment', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . $label . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		if( $flgNone ) {
    		$ret .= '<option value=""></option>';
		}
		$sel = '';
		if($selval == 'weluka-text-left'){ $sel = ' selected="selected"'; }
    	$ret .= '<option value="weluka-' . $resprefix . 'text-left"' . $sel . '>' . __('Left', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'weluka-text-center'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-' . $resprefix . 'text-center"' . $sel . '>' . __('Center', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'weluka-text-right'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-' . $resprefix . 'text-right" ' . $sel . '>' . __('Right', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }		
	}

	/**
	 * modal setting img shape setting show
	 * @since 1.0
	 * @update
	 * ver 1.0.3
	 * $selval, $flgNone
	 */
	public function weluka_display_imgshape_settings($name, $label = '', $labelShow = true, $echo = true, $selval = '', $flgNone = false) {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Shape', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . $label . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		if( $flgNone ) {
    		$ret .= '<option value=""></option>';
		}
		$sel = '';
		if($selval == 'no-rounded'){ $sel = ' selected="selected"'; }
    	$ret .= '<option value="no-rounded" ' . $sel . '>' . __('Square', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'img-rounded'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="img-rounded" ' . $sel . '>' . __('Round', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'img-circle'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="img-circle" ' . $sel . '>' . __('Circle', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'img-thumbnail'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="img-thumbnail" ' . $sel . '>' . __('Thumbnail', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting button color setting show
	 * @since 1.0
	 * @update
	 * ver1.1.4 cstFlg add
	 * ver1.2 selVal add
	 */
	public function weluka_display_buttoncolor_settings($name, $label = '', $labelShow = true, $echo = true, $cstFlg = false, $selVal = '') {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Button Color', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . $label . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		if( $cstFlg ) { $ret .= '<option value=""></option>'; }
		
		$sel = '';
		if($selVal == 'weluka-btn-default'){ $sel = ' selected="selected"'; }
  		$ret .= '<option value="weluka-btn-default"' . $sel . '>' . __('White', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if($selVal == 'weluka-btn-grey'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-btn-grey"' . $sel . '>' . __('Grey', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if($selVal == 'weluka-btn-darkgrey'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-btn-darkgrey"' . $sel .'>' . __('Dark Grey', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if($selVal == 'weluka-btn-black'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-btn-black"' . $sel . '>' . __('Black', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if($selVal == 'weluka-btn-primary'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-btn-primary"' . $sel . '>' . __('Primary', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if($selVal == 'weluka-btn-success'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-btn-success"' . $sel . '>' . __('Success', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if($selVal == 'weluka-btn-info'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-btn-info"' . $sel . '>' . __('Info', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if($selVal == 'weluka-btn-warning'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-btn-warning"' . $sel . '>' . __('Warning', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if($selVal == 'weluka-btn-danger'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-btn-danger"' . $sel . '>' . __('Danger', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if($selVal == 'weluka-btn-link'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-btn-link"' . $sel . '>' . __('None', Weluka::$settings['plugin_name']) . '</option>';

        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }		
	}

	/**
	 * modal setting button size setting show
	 * @since 1.0
	 */
	public function weluka_display_buttonsize_settings($name, $label = '', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Button Size', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . $label . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        $ret .= '<option value="btn-xs">' . __('X Small', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="btn-sm">' . __('Small', Weluka::$settings['plugin_name']) . '</option>';
    	$ret .= '<option value="">' . __('Medium', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="btn-lg">' . __('Large', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting button shape setting show
	 * @since 1.0
	 *
	 */
	public function weluka_display_buttonshape_settings($name, $label = '', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Shape', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . $label . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
    	$ret .= '<option value="">' . __('Round', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="no-rounded">' . __('Square', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting wysiwig button setting show
	 * @since 1.0
	 */
	public function weluka_display_wysiwig_button_settings($wrapId, $label = '', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Style', Weluka::$settings['plugin_name']); }
			$ret = '<label>' . $label . '</label>';
		}
        
		$ret .= '<div id="' . $wrapId . '" class="weluka-wysiwyg-wrapper">';
	    $ret .= '<span class="fa fa-bold weluka-wysiwyg-button" data-type="bold"></span>';
    	$ret .= '<span class="fa fa-underline weluka-wysiwyg-button" data-type="underline"></span>';
        $ret .= '<span class="fa fa-italic weluka-wysiwyg-button" data-type="italic"></span>';
        $ret .= '</div>';

		if($echo){ echo $ret; }else{ return $ret; }
	}
	
	/**
	 * modal setting wp menu style color theme select show
	 * @since 1.0
	 */
	public function weluka_display_menucolor_settings($name, $label = '', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Color Theme', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . $label . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
  		$ret .= '<option value="weluka-navbar-none"></option>';		
  		$ret .= '<option value="weluka-navbar-default">' . __('Default', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-white">' . __('White', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-darkgrey">' . __('Dark Grey', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-inverse">' . __('Inverse', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-darkblue">' . __('Primary', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-green">' . __('Success', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-aqua">' . __('Info', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-orange">' . __('Warning', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-magenta">' . __('Magenta', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-navbar-red">' . __('Danger', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting custom design box show
	 * @since 1.0
	 */
	public function weluka_display_csutomdesgin_settings($name, $echo = true) {
        $ret = '<div class="weluka-border-box" style="padding: 15px 15px 0 15px;">';
	    $ret .= '<div class="form-group">';
    	$ret .= '<label>' . __('Custom Designs', Weluka::$settings['plugin_name']) . '</label>';
    	$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        $ret .= '<option value=""></option>';
        $ret .= '</select>';
        $ret .= '</div>';
        $ret .= '<div class="form-group">';
        $ret .= '<label>' . __('Custom Design Name', Weluka::$settings['plugin_name']) . '</label>';
        $ret .= '<input id="' . $name . 'Name" name="' . $name . 'Name" type="text" value="" class="form-control" />';
        $ret .= '<button type="button" class="' . $name . 'RegBtn weluka-btn weluka-btn-org weluka-btn-warning btn-xs">' . __('Reg', Weluka::$settings['plugin_name']) . '</button>';
        $ret .= '&nbsp;<button type="button" class="' . $name . 'RemoveBtn weluka-btn weluka-btn-org weluka-btn-warning btn-xs">' . __('Remove', Weluka::$settings['plugin_name']) . '</button>';
	    $ret .= '</div>';
        $ret .= '</div>';
		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting list layout select show
	 * @since 1.0
	 */
	public function weluka_display_listlayout_settings($name, $label = '', $labelShow = true, $echo = true, $selectVal = null) {
		$ret = '';
		if($labelShow) {
			if( !$label ) { $label = __('List Layout', Weluka::$settings['plugin_name']); }
			$ret = '<h5>' . $label . '</h5>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		$ret .= '<option value=""></option>';
        foreach($this->app_list_layouts as $_layout) :
			$select = $selectVal === $_layout['layout_class'] ? ' selected="selected"' : '';
			$ret .= '<option value="' . $_layout['layout_class'] . '"' . $select . '>' . $_layout['label'] . '</option>';
		endforeach;
		$ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting list layout row column select show
	 * @since 1.0
	 * @update
	 * ver1.0.6
	 */
	public function weluka_display_listlayout_rowcolumn_settings($name, $label = '', $labelShow = true, $echo = true, $selectVal = null, $help = true, $noval = false) {
		$ret = '';
		if($labelShow) {
			if( !$label ) { $label = __('Row Column', Weluka::$settings['plugin_name']); }
			$ret = '<h5>' . $label . '</h5>';
		}
		
        $ret .= '<select id="' .$name . '" name="' . $name . '" class="form-control">';
		if( $noval ) { $ret .= '<option value=""></option>'; }	//v1.0.6 add
		for( $i = 1; $i <= 6; $i++ ) {
			if( $i !== 5 ) {
				$select = $selectVal == $i ? ' selected="selected"' : '';
    	    	$ret .= '<option value="' . $i . '"' . $select . '>' . $i . ' column</option>';
			}
		}
        $ret .= '</select>';
		
		if( $help ) { //v1.0.6 $help if add
	        //$ret .= '<div class="weluka-mgtop-xs help-block">' . __('Please set the row column.', Weluka::$settings['plugin_name']) . '</div>';
	        $ret .= '<div class="weluka-mgtop-xs help-block">' . __('Please select the number of columns the case of a vertical list format.', Weluka::$settings['plugin_name']) . '</div>';
		}
		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting list media style col select show
	 * @since 1.0
	 */
	public function weluka_display_listmedia_column_settings($name, $label = '', $labelShow = true, $echo = true) {
		$ret = '';
		if($labelShow) {
			if( !$label ) { $label = __('Colum Width', Weluka::$settings['plugin_name']); }
			$ret = '<label>' . $label . '</label>';
		}
		
        $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        $ret .= '<option value="1">1 column</option>';
        $ret .= '<option value="2">2 column</option>';
        $ret .= '<option value="3">3 column</option>';
        $ret .= '<option value="4">4 column</option>';
        $ret .= '<option value="5">5 column</option>';
        $ret .= '<option value="6">6 column</option>';
        $ret .= '<option value="7">7 column</option>';
        $ret .= '<option value="8">8 column</option>';
        $ret .= '</select>';
        $ret .= '<div class="weluka-mgtop-xs help-block">' . __('Please set the reference up to 12 column.', Weluka::$settings['plugin_name']) . '</div>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting list title html tag select show
	 * @since 1.0
	 */
	public function weluka_display_listtitle_htmltag_settings($name, $label = '', $labelShow = true, $echo = true) {
		$ret = '';
		if($labelShow) {
			if( !$label ) { $label = __('Title html tag', Weluka::$settings['plugin_name']); }
			$ret = '<label>' . $label . '</label>';
		}
	    
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        $ret .= '<option value="h1">H1</option>';
        $ret .= '<option value="h2">H2</option>';
        $ret .= '<option value="h3">H3</option>';
        $ret .= '<option value="h4">H4</option>';
        $ret .= '<option value="h5">H5</option>';
        $ret .= '<option value="h6">H6</option>';
        $ret .= '<option value="p">P</option>';
        $ret .= '<option value="div">DIV</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting section content type select show
	 * @since 1.0
	 * @update
	 * ver1.0.1
	 */
	public function weluka_display_containertype_settings($name, $label = '', $labelShow = true, $echo = true, $helpShow = true) {
		$ret = '';
		if($labelShow) {
			if( !$label ) { $label = __('Container Type', Weluka::$settings['plugin_name']); }
			$ret = '<label>' . $label . '</label>';
		}
	    
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		$ret .= '<option value=""></option>';
        $ret .= '<option value="weluka-container">' . __('Fixed width container', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-container-fluid">' . __('Full width container', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';
        
		if( $helpShow ) {
			$ret .= '<div class="weluka-mgtop-s help-block">';
    	    $ret .= __('Please select whether to set full width to the content container width to a fixed length. The default is a fixed length.', Weluka::$settings['plugin_name']);
			$ret .= __('If the content container width is set in the theme, it will according to the theme.', Weluka::$settings['plugin_name']);
        	$ret .= '</div>';
		}
		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * @since 1.0
	 */
	public function weluka_display_cpt_settings($name, $cpt, $label = '', $labelShow = true, $echo = true) {
		$ret = '';
		if($labelShow) {
			$ret = '<label>' . $label . '</label>';
		}

		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		$ret .= '<option value=""></option>';

		$cpts = WelukaTheme::get_instance()->get_custom_posts( $cpt );
		if( !empty ( $cpts ) ) :
			foreach( $cpts as $cpt ) {
				$ret .= '<option value="' . $cpt->ID .'">' . esc_html( strip_tags( $cpt->post_title ) ) . '</option>';
			}
		endif;
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting tagcloud position select show
	 * @since 1.0.1
	 */
	public function weluka_display_tagcloud_pos_settings($name, $label = '', $labelShow = true, $echo = true, $selectVal = null) {
		$ret = '';
		if($labelShow) {
			$ret = '<h5>' . $label . '</h5>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		$ret .= '<option value=""></option>';
		$selected = '';
		if( $selectVal === 'metabottom' ){ $selected = ' selected="selected"'; }
		$ret .= '<option value="metabottom"' . $selected . '>' . __('Meta bottom', Weluka::$settings['plugin_name'] ) .'</option>';
		$selected = '';
		if( $selectVal === 'bottom' ){ $selected = ' selected="selected"'; }
		$ret .= '<option value="bottom"' . $selected . '>' . __('Content bottom', Weluka::$settings['plugin_name'] ) .'</option>';
		$selected = '';
		if( $selectVal === 'both' ){ $selected = ' selected="selected"'; }
		$ret .= '<option value="both"' . $selected . '>' . __('Both', Weluka::$settings['plugin_name'] ) .'</option>';
		$ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting responsive display hide checkbox show
	 * @since 1.0.4
	 */
	public function weluka_display_responsive_hide_settings($name, $label = '', $labelShow = true, $echo = true) {
		$ret = '';
		if($labelShow) {
			if( !$label ) { $label = __('Display Hide', Weluka::$settings['plugin_name']); }
			$ret = '<h5>' . $label . '</h5>';
		}

		$ret .= '<div class="weluka-row clearfix"><div class="weluka-col-md-6"><input id="' . $name . '_lg" name="' . $name . '_lg" class="' . $name . '" type="checkbox" value="lg" />';
	    $ret .= '&nbsp;<label for="' . $name . '_lg">' . __('Large View(More than 1200px)', Weluka::$settings['plugin_name'] ) . '</label></div>';

		$ret .= '<div class="weluka-col-md-6"><input id="' . $name . '_md" name="' . $name . '_md" class="' . $name . '" type="checkbox" value="md" />';
	    $ret .= '&nbsp;<label for="' . $name . '_md">' . __('Medium View(992px - 1199px)', Weluka::$settings['plugin_name'] ) . '</label></div></div>';

		$ret .= '<div class="weluka-row clearfix"><div class="weluka-col-md-6"><input id="' . $name . '_sm" name="' . $name . '_sm" class="' . $name . '" type="checkbox" value="sm" />';
	    $ret .= '&nbsp;<label for="' . $name . '_sm">' . __('Small View(768px - 991px)', Weluka::$settings['plugin_name'] ) . '</label></div>';

		$ret .= '<div class="weluka-col-md-6"><input id="' . $name . '_xs" name="' . $name . '_xs" class="' . $name . '" type="checkbox" value="xs" />';
	    $ret .= '&nbsp;<label for="' . $name . '_xs">' . __('XSmall View(Less than 768px)', Weluka::$settings['plugin_name'] ) . '</label></div></div>';

		$ret .= '<div class="help-block">' . __('Please select the screen size you do not want to display the content.', Weluka::$settings['plugin_name'] ) . '</div>';
		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * paging type select show
	 * @since 1.1
	 */
	public function weluka_display_paging_type_settings($name, $label = '', $labelShow = true, $echo = true, $selectVal = null, $help = true, $noval = false) {
		$ret = '';
		if($labelShow) {
			if( !$label ) { $label = __('Paging type', Weluka::$settings['plugin_name']); }
			$ret = '<h5>' . $label . '</h5>';
		}
		
        $ret .= '<select id="' .$name . '" name="' . $name . '" class="form-control">';
		if( $noval ) { $ret .= '<option value=""></option>'; }
		
		$selected = '';
		if( $selectVal == 1 ){ $selected = ' selected="selected"'; }
		$ret .= '<option value="1"' . $selected . '>' . __('Paging links', Weluka::$settings['plugin_name'] ) .'</option>';
		$selected = '';
		if( $selectVal == 2 ){ $selected = ' selected="selected"'; }
		$ret .= '<option value="2"' . $selected . '>' . __('Infinite scroll', Weluka::$settings['plugin_name'] ) .'</option>';
        $ret .= '</select>';
		
		if( $help ) {
	        $ret .= '<div class="weluka-mgtop-xs help-block">' . __('Please select the type of blog archive: paging.', Weluka::$settings['plugin_name']) . '</div>';
		}
		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * box shadow style setting show
	 * @since 1.1.4
	 */
	public function weluka_display_boxshadowstyle_settings( $name, $relativeFlg = true, $insetFlg = true, $label = '', $labelShow = true, $echo = true) {
		$ret = "";
		if($labelShow) {
			if( ! $label ) { $label = __('Box Shadow Style', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . __($label, Weluka::$settings['plugin_name']) . '</label>';
		}
		
	    $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
        $ret .= '<option value=""></option>';
        $ret .= '<option value="weluka-boxshadow-leftbtm">' . __('Left Bottom', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '<option value="weluka-boxshadow-outset">' . __('Outset', Weluka::$settings['plugin_name']) . '</option>';
		if( $insetFlg ) {
	        $ret .= '<option value="weluka-boxshadow-inset">' . __('Inset', Weluka::$settings['plugin_name']) . '</option>';
		}
        $ret .= '<option value="weluka-boxshadow-btm1">' . __('Bottom Pattern1', Weluka::$settings['plugin_name']) . '</option>';
		if( $relativeFlg ) {
	        $ret .= '<option value="weluka-boxshadow-btm2">' . __('Bottom Pattern2', Weluka::$settings['plugin_name']) . '</option>';
    	    $ret .= '<option value="weluka-boxshadow-btm3">' . __('Bottom Pattern3', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="weluka-boxshadow-topbtm">' . __('Top Bottom', Weluka::$settings['plugin_name']) . '</option>';
        	$ret .= '<option value="weluka-boxshadow-ltrt">' . __('Left Right', Weluka::$settings['plugin_name']) . '</option>';
		}
        $ret .= '</select>';
		if($echo){ echo $ret; }else{ return $ret; }		
	}

	/**
	 * modal setting taxonomy type select show
	 * @since 1.1.4
	 */
	public function weluka_display_taxonomytype_settings($name, $label = '', $labelShow = true, $echo = true, $selectVal = null) {
		$ret = '';
		if($labelShow) {
			if( !$label ) { $label = __('Taxonomy Type', Weluka::$settings['plugin_name']); } //v1.2
			$ret = '<h5>' . $label . '</h5>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		$selected = '';
		if( $selectVal === 'category' ){ $selected = ' selected="selected"'; }
		$ret .= '<option value="category"' . $selected . '>' . __('Category', Weluka::$settings['plugin_name'] ) .'</option>';
		$selected = '';
		if( $selectVal === 'tag' ){ $selected = ' selected="selected"'; }
		$ret .= '<option value="tagcloud"' . $selected . '>' . __('Tagcloud', Weluka::$settings['plugin_name'] ) .'</option>';
		$selected = '';
		if( $selectVal === 'csttax' ){ $selected = ' selected="selected"'; }
		$ret .= '<option value="csttax"' . $selected . '>' . __('Custom Taxonomy', Weluka::$settings['plugin_name'] ) .'</option>';
		//$selected = '';
		//if( $selectVal === 'page' ){ $selected = ' selected="selected"'; }
		//$ret .= '<option value="page"' . $selected . '>' . __('Page', Weluka::$settings['plugin_name'] ) .'</option>';
		$ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * modal setting post archive block style setting show
	 * @since 1.2
	 */
	public function weluka_display_blockstyle_settings($name, $label = '', $labelShow = true, $echo = true, $selval = '', $resprefix = '') {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Box Style', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . $label . '</label>';
		}
		
		$ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';
		$sel = '';
		if($selval == ''){ $sel = ' selected="selected"'; }
    	$ret .= '<option value=""' . $sel . '>' . __('Default', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'weluka-listblock-allp'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-listblock-allp' . $resprefix . '"' . $sel . '>' . __('All padding', Weluka::$settings['plugin_name']) . '</option>';
		$sel = '';
		if($selval == 'weluka-listblock-notthumbp'){ $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-listblock-notthumbp' . $resprefix . '"' . $sel . '>' . __('Thumbnail not padding', Weluka::$settings['plugin_name']) . '</option>';
        $ret .= '</select>';

		if($echo){ echo $ret; }else{ return $ret; }
	}

	/**
	 * setting modal common parts animation delay
	 * @since 1.2
	 */
	public function weluka_display_animation_delay( $name, $label = '', $labelShow = true, $echo = true, $val = '' ) {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Delay(Seconds)', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . $label . '</label>';
		}
		
		$ret .= '<input id="' . $name . '" name="' . $name . '" type="text" value="' . $val . '" class="form-control weluka-normal-text" />';
		if($echo){ echo $ret; }else{ return $ret; }
	}
	
	/**
	 * setting modal common parts animation select
	 * @since 1.2
	 */
	public function weluka_display_animation_select( $name, $label = '', $labelShow = true, $echo = true, $disabled = false, $selval = '' ) {
		$ret = "";
		if($labelShow) {
			if( !$label ) { $label = __('Type', Weluka::$settings['plugin_name']); }
			$ret = '<label for="' . $name . '">' . $label . '</label>';
		}

	    $ret .= '<select id="' . $name . '" name="' . $name . '" class="form-control">';

		$sel = '';
		if( $selval == '') { $sel = ' selected="selected"'; }
        $ret .= '<option value=""' . $sel . '></option>';

		if( $disabled ) {
			//responsive時などアニメーションを強制的にさせたくない場合 TODO　未使用
			$sel = '';
			if( $selval == 'off') { $sel = ' selected="selected"'; }
        	$ret .= '<option value="off"' . $sel . '>' . __('Animation Off', Weluka::$settings['plugin_name']) . '</option>';
		}

		$sel = '';
		if( $selval == 'weluka-fadein') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-fadein"' . $sel . '>' . __('Fade In', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-fadein-up') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-fadein-up"' . $sel . '>' . __('Fade In Up', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-fadein-down') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-fadein-down"' . $sel . '>' . __('Fade In Down', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-fadein-left') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-fadein-left"' . $sel . '>' . __('Fade In Left', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-fadein-right') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-fadein-right"' . $sel . '>' . __('Fade In Right', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-slidein-down') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-slidein-down"' . $sel . '>' . __('Slide In Down', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-slidein-up') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-slidein-up"' . $sel . '>' . __('Slide In Up', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-slidein-left') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-slidein-left"' . $sel . '>' . __('Slide In Left', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-slidein-right') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-slidein-right"' . $sel . '>' . __('Slide In Right', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-zoomin') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-zoomin"' . $sel . '>' . __('Zoom In', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-swing') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-swing"' . $sel . '>' . __('Swing', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-bounce') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-bounce"' . $sel . '>' . __('Bounce', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-flip') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-flip"' . $sel . '>' . __('Flip', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-rotatein') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-rotatein"' . $sel . '>' . __('Rotate In', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-rollin') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-rollin"' . $sel . '>' . __('Roll In', Weluka::$settings['plugin_name']) . '</option>';

		$sel = '';
		if( $selval == 'weluka-rubberband') { $sel = ' selected="selected"'; }
        $ret .= '<option value="weluka-rubberband"' . $sel . '>' . __('Rubber Band', Weluka::$settings['plugin_name']) . '</option>';

        $ret .= '</select>';

		if($echo){ echo $ret; } else { return $ret; }
	}
	
	/**
	 * setting modal common parts animation setting show
	 * @since 1.2
	 */
	public function weluka_display_animation_setting( $key, $echo=true, $disabled = false ) {
		$ret = '<h5>' . __('Animation Setting', Weluka::$settings['plugin_name']) . '</h5>';
		$ret .= '<div class="weluka-row form-group clearfix">';

		$name = 'weluka' . $key . 'SettingAnimation';
		$ret .= '<div class="weluka-col-md-3">';		
		$ret .= $this->weluka_display_animation_select( $name, '', true, false, $disabled );
       	$ret .= '</div>';

		$name = 'weluka' . $key . 'SettingAnimationDelay';
		$ret .= '<div class="weluka-col-md-3">';		
		$ret .= $this->weluka_display_animation_delay( $name, '', true, false );
       	$ret .= '</div>';

		$ret .= '</div>'; //end .weluka-row
		
		if($echo){ echo $ret; } else { return $ret; }
	}
} //end class
