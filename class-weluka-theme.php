<?php
/**
 * ver1.0.1
 * single post tagclud show hide add
 * ver1.1.2
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Weluka Plugin Theme class
 * @since 1.0
 * @update
 * ver1.0.4
 * ver1.0.6
 * ver1.1.1
 * ver1.1.2
 * ver1.2
 */
#[\AllowDynamicProperties]
class WelukaTheme {
	
	/**
	 * Holds the singleton instance of this class
	 * @var WelukaUpdater
	 */

	/**
	 * @since 1.0
	 */
	private static $instance = false;

	public static $theme_settings = array();

	/**
	 * option setting field home layout name
	 * @since 1.0
	 */
	const HOME_LAYOUT	= 'home_layout';

	/**
	 * option setting field common layout name
	 * @since 1.0
	 */
	const COMMON_LAYOUT	= 'common_layout';

	/**
	 * option setting field archive layout name
	 * @since 1.0.6
	 */
	const ARCHIVE_LAYOUT	= 'archive_layout';

	/**
	 * option setting field page layout name
	 * @since 1.0.6
	 */
	const PAGE_LAYOUT		= 'page_layout';

	/**
	 * option setting field page layout name
	 * @since 1.0.6
	 */
	const POST_LAYOUT		= 'post_layout';

	/**
	 * option setting field postlist meta info array name
	 * @since 1.0
	 */
	const POST_LIST_META_ARRAY	= 'post_list_matas';

	/**
	 * option setting field post single meta info array name
	 * @since 1.0
	 */
	const POST_SINGLE_META_ARRAY	= 'post_single_matas';

	const POST_META_AUTHOR		= 'flg_auther';
	const POST_META_DATE		= 'flg_date';
	const POST_META_CATEGORY	= 'flg_category';
	const POST_META_COMMENT		= 'flg_comment';

	//v1.1.1 add
	const POST_TITLE_HIDE	= 'flg_title';
	const POST_THUMB_HIDE	= 'flg_thumbnail';
	const POST_EXCERPT_HIDE	= 'flg_excerpt';
	const POST_READMORE_HIDE	= 'flg_readmore_hide';

	/**
	 * option setting field meta hide category name
	 * @since 1.0
	 */
	const HIDE_META_CATEGORY	= 'hide_meta_category';

	/**
	 * option setting field comment block name
	 * @since 1.0 not use
	 */
	//const COMMENT_BLOCK			= 'comment_block';

	/**
	 * option setting field date format name
	 * @since 1.0
	 */
	const POST_DATE_FORMAT			= 'post_date_format';
	const DEFAULT_POST_DATE_FORMAT	= 'F j, Y g:i a';

	/**
	 * option setting field excerpt string num name
	 * @since 1.0
	 */
	const EXCERPT_STRING_NUM		= 'excerpt_string_num';

	/**
	 * option setting field archive list format name
	 * @since 1.0
	 */
	const ARCHIVE_LIST_FORMAT		= 'archive_list_format';
	const ARCHIVE_LIST_COLS			= 'archive_list_cols';
	//v1.0.6 add
	//const ARCHIVE_LIST_FORMAT_MD	= 'archive_list_format_md';
	//const ARCHIVE_LIST_COLS_MD		= 'archive_list_cols_md';
	const ARCHIVE_LIST_FORMAT_SM	= 'archive_list_format_sm';
	const ARCHIVE_LIST_COLS_SM		= 'archive_list_cols_sm';
	const ARCHIVE_LIST_FORMAT_XS	= 'archive_list_format_xs';
	const ARCHIVE_LIST_COLS_XS		= 'archive_list_cols_xs';
	//v1.0.6 addend

	/**
	 * option setting field home blog excluded category name
	 * @since 1.0
	 */
	const HOME_EXCLUDE_CATEGORY		= 'home_exclude_catid';

	/**
	 * option setting field home blog post perpage name
	 * @since 1.0
	 */
	const HOME_POST_NUM				= 'home_post_num';

	/**
	 * option setting field archive post perpage name
	 * @since 1.0
	 */
	const ARCHIVE_POST_NUM			= 'archive_post_num';

	/**
	 * option setting field archive post more button text name
	 * @since 1.0
	 */
	const MORE_BUTTON_TEXT			= 'more_button_text';

	/**
	 * option setting field default no image name
	 * @since 1.0
	 */
	const NO_IMAGE_FILE				= 'noimage_file';
	
	/**
	 * option setting field lazy load image
	 * @since 1.2.7
	 */
	const LAZY_LOAD			    	= 'lazy_load';


	/**
	 * option setting field custom css name
	 * @since 1.0
	 */
	const CUSTOM_CSS				= 'custom_css';

	/**
	 * option setting field common default page header name
	 * @since 1.0
	 */
	const COMMON_PAGE_HEADER		= 'common_page_header';

	/**
	 * option setting field common default page footer name
	 * @since 1.0
	 */
	const COMMON_PAGE_FOOTER		= 'common_page_footer';

	/**
	 * option setting field common default sidebar main name
	 * @since 1.0
	 */
	const COMMON_SIDEBAR_MAIN		= 'common_sidebar_main';

	/**
	 * option setting field common default sidebar sub name ( case three colum right sidebar )
	 * @since 1.0
	 */
	const COMMON_SIDEBAR_SUB		= 'common_sidebar_sub';
	
	
	/**
	 * @since 1.2.5 separate custompars by page types
	 */
	
	const PLACE_PAGE_HEADER  = 'page_header'; 
	const PLACE_PAGE_FOOTER  = 'page_footer';
	const PLACE_SIDEBAR_MAIN = 'sidebar_main';
	const PLACE_SIDEBAR_SUB  = 'sidebar_sub';
	
	const DISP_KEY		     = 'cstdisp_';
	/**
	 * option setting field logo name
	 * @since 1.0
	 */
	const LOGO_IMAGE				= 'logo';

	/**
	 * option setting field copyright name
	 * @since 1.0
	 */
	const FOOTER_COPYRIGHT			= 'footer_copyright';

	/**
 	 * layout pattern
     * @since 1.0
     */
	public $theme_layouts;
	public $default_home_layout;
	public $default_common_layout;

	/**
	 * option setting field color type name
	 * @since 1.0
	 */
	const COLOR_TYPE	= 'color_type';
	const COLOR_ARRAY	= 'colors';
	public $theme_colors;
	public $default_color_type;

	/**
	 * wp nonce filed name
	 * @since 1.0
	 */
	const THEME_SETTING_REG_NONCE		= "weluka_theme_setting_reg_nonce";
	const THEME_COLOR_REG_NONCE			= "weluka_theme_color_reg_nonce";

	/**
	 * @since 1.0.1
	 */
	const HIDE_POST_TAGCLOUD		= 'hide_post_tagcloud';
	const HIDE_POSTLIST_TAGCLOUD	= 'hide_postlist_tagcloud';
	const POST_TAGCLOUD_POSITION	= 'post_tagcloud_position';
	const POSTLIST_TAGCLOUD_POSITION	= 'postlist_tagcloud_position';
	const HIDE_POST_PAGING			= 'hide_post_paging';
	const HEAD_FIXED				= 'header_fixed'; //0=しない、1=ヘッダー全体、2=指定したクラス
	const HEAD_FIXED_CLASS			= 'header_fixed_class';
	const HEAD_FIXED_AUTO_HEIGHT_PADDING = 'header_fixed_auto_height_padding'; //0=しない、1=する
	const HEAD_FIXED_BUILDER_ENABLE = 'header_fixed_builder_enable'; //0=無効、1=有効
	/**
	 * @since 1.1.2
	 */
	const HEAD_FIXED_NO_SCROLL_DISPLAY	= 'header_fixed_noscr_disp'; //0=スクロールによる自動表示、1=スクロールでの自動表示禁止（ずっと固定表示）

	/**
	 * @since 1.0.3
	 */
	const POST_EYECATCH				= 'post_eyecatch'; //投稿ページにアイキャッチ表示有無 0=表示しない、1=表示する
	const PAGE_EYECATCH				= 'page_eyecatch'; //固定ページにアイキャッチ表示有無 0=表示しない、1=表示する
	const POST_EYECATCH_SHAPE		= 'post_eyecatch_shape'; //投稿ページにアイキャッチ表示時シェイプ
	const PAGE_EYECATCH_SHAPE		= 'page_eyecatch_shape'; //固定ページにアイキャッチ表示時シェイプ
	const POST_EYECATCH_ALIGN		= 'post_eyecatch_align'; //投稿ページにアイキャッチ表示時位置
	const PAGE_EYECATCH_ALIGN		= 'page_eyecatch_align'; //固定ページにアイキャッチ表示時位置
	const POST_EYECATCH_FITWIDTH	= 'post_eyecatch_fitwidth'; //投稿ページにアイキャッチ表示時フル幅
	const PAGE_EYECATCH_FITWIDTH	= 'page_eyecatch_fitwidth'; //固定ページにアイキャッチ表示時フル幅


	/**
	 * option setting field date regdate or update name
	 * @since 1.0.4
	 */
	const POST_DATE_DISPLAY_MODIFY	= 'post_date_display_modify';

	/**
	 * option setting field title string num name
	 * @since 1.1
	 */
	const TITLE_STRING_NUM			= 'title_string_num';

	/**
	 * option setting field archive paging type name
	 * @since 1.1
	 */
	const ARCHIVE_PAGING_TYPE		= 'archive_paging_type';

	/**
	 * option setting field smartphone responsive overflow-x setting type name
	 * @since 1.1.1
	 */
	const SP_OVERFLOW_HIDDEN	= 'sp_overflow_hidden';

	/**
	 * option setting field archive list thumbnail equal height 
	 * @since 1.2
	 */
	const ARCHIVE_LIST_THUMB_HEIGHT		= 'archive_list_thumb_height';
	const ARCHIVE_LIST_THUMB_HEIGHT_SM	= 'archive_list_thumb_height_sm';
	const ARCHIVE_LIST_THUMB_HEIGHT_XS	= 'archive_list_thumb_height_xs';

	/**
	 * option setting field archive list post block/row  equal height (md sm xs common)
	 * @since 1.2
	 */
	const ARCHIVE_LIST_EQH		= 'archive_list_eqh';

	/**
	 * option setting field archive list post block box style
	 * @since 1.2
	 */
	const ARCHIVE_LIST_BOX_STYLE			= 'archive_list_box_style';
	const ARCHIVE_LIST_BOX_STYLE_SHAPE		= 'archive_list_box_style_shape';
	const ARCHIVE_LIST_BOX_STYLE_SHADOW		= 'archive_list_box_style_shadow';
	
	
	/**
	 * option setting field archive list post block box style
	 * @since 1.2.7
	 */
	const COMMON_TITLE_ALIGN	= 'common_title_align';
	const POST_TITLE_ALIGN		= 'post_title_align';
	const POST_TAG_ALIGN		= 'post_tag_align';
	const PAGE_TITLE_ALIGN		= 'page_title_align';
	const ARCHIVE_TITLE_ALIGN	= 'archive_title_align';

	/**
	 * singloton instance
	 * @since 1.0
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new WelukaTheme;
		}
		return self::$instance;
	}

	/**
	 * @since 1.0
	 */
	public function init() {
		self::$theme_settings['option_name']		= $this->get_option_name(); //mb_strtolower( Weluka::get_instance()->get_theme_name( true ) );
		self::$theme_settings['color_option_name']	= self::$theme_settings['option_name'] . '_color';
		self::$theme_settings['color_tpl_name']		= self::$theme_settings['option_name'] . '_color_tpl';
		if ( is_admin() && current_user_can( 'manage_options' ) ) {
			add_action( 'admin_menu', array( &$this, 'theme_option_setting' ) );
		}
		
		add_action( 'init', array( &$this, 'custom_posttype_register' ) );
	}
	/**
	 * @since 1.0
	 */
	public function get_option_name() {
		return mb_strtolower( Weluka::get_instance()->get_theme_name( true ) );
	}

	/**
	 * @since 1.0
	 */	
	public function theme_option_setting() {
	/*
    	$hookName = add_theme_page(
					ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __( 'Theme Setting', Weluka::$settings['plugin_name'] ),
					ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __( 'Theme Setting', Weluka::$settings['plugin_name'] ),
					'switch_themes',
					__CLASS__,
					array( __CLASS__, 'theme_setting_page' )
		);
	*/
        add_submenu_page(
			Weluka::$settings['setting_option_name'],
			ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __( 'Theme Setting', Weluka::$settings['plugin_name'] ),
			ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __( 'Theme Setting', Weluka::$settings['plugin_name'] ),
			'manage_options',
			__CLASS__,
			array( &$this, 'theme_setting_page' )
		);

        add_submenu_page(
			Weluka::$settings['setting_option_name'],
			ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __( 'Theme Color', Weluka::$settings['plugin_name'] ),
			ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __( 'Theme Color', Weluka::$settings['plugin_name'] ),
			'manage_options',
			__CLASS__ . '-color',
			array( &$this, 'theme_color_page' )
		);
	}

	/**
 	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.2
	 * ver1.0.3
	 * ver1.0.4
	 * ver1.0.6
	 * ver1.1
	 * ver1.1.2
	 * ver1.2
	 */
	public function theme_setting_page() {
		if (isset($_REQUEST["weluka_theme_setting_submit"])) {

		    check_admin_referer( self::THEME_SETTING_REG_NONCE );
			$errmsg = $this->update_setting($_REQUEST);

			if($errmsg === ""){ ?>
				<div class="updated fade"><p><strong><?php _e( 'Theme setting update success!!', Weluka::$settings['plugin_name'] ); ?></strong></p></div>
			<?php }else{ ?>
				<div class="error fade"><p><strong><?php echo $errmsg; ?></strong></p></div>
			<?php  }
		}
//v1.0.2
		//$options = WelukaAdminSettings::get_site_options( self::$theme_settings['option_name'] );
		$options = get_option(self::$theme_settings['option_name']);
//v1.0.2
?>
    	<div class="wrap">
    		<h2><?php _e("Weluka Theme Setting", Weluka::$settings['plugin_name'] ); ?></h2>
			<form id="weluka_theme_setting_form" name="weluka_theme_setting_form" method="post" action="">
    			<?php wp_nonce_field( self::THEME_SETTING_REG_NONCE ); ?>
				<div class="weluka-option-wrap">
	            	<h3><?php _e('Layout Setting', Weluka::$settings['plugin_name']); ?></h3>
           			<table class="form-table">
    				<tbody>
            		<tr>
                		<th><?php _e( 'Home Layout : ', Weluka::$settings['plugin_name'] ); ?></th>
                    	<td>
                        	<div id="weluka-theme-layout-home">
                        <?php
	                    	$val = !empty($options[self::HOME_LAYOUT]) ? $options[self::HOME_LAYOUT] : $this->default_home_layout;
							if( !empty( $this->theme_layouts ) ) {
								foreach( $this->theme_layouts as $key => $vals ) {
									$active = '';
									if( $val === $key ) { $active = ' weluka-theme-layout-active'; }
									echo '<img data-parent="weluka-theme-layout-home" data-key="' . $key . '" data-target="' . self::HOME_LAYOUT . '" src="' . $vals['img'] . '" class="weluka-theme-layout' . $active . '" style="margin-right:10px;" />'; 
								}
							}
						?>
                        		<input type="hidden" id="<?php echo self::HOME_LAYOUT; ?>" name="<?php echo self::HOME_LAYOUT; ?>" value="<?php echo $val; ?>" />
                            </div>
                    	</td>
	            	</tr>
                    <?php //v1.0.6 add ?>
                    <?php $commonLayout = !empty($options[self::COMMON_LAYOUT]) ? $options[self::COMMON_LAYOUT] : $this->default_common_layout; //old version support default set common layout ?>
            		<tr>
                		<th><?php _e( 'Archive Layout : ', Weluka::$settings['plugin_name'] ); ?></th>
                    	<td>
                        	<div id="weluka-theme-layout-archive">
                        <?php
	                    	$val = !empty($options[self::ARCHIVE_LAYOUT]) ? $options[self::ARCHIVE_LAYOUT] : $commonLayout;
							if( !empty( $this->theme_layouts ) ) {
								foreach( $this->theme_layouts as $key => $vals ) {
									$active = '';
									if( $val === $key ) { $active = ' weluka-theme-layout-active'; }
									echo '<img data-parent="weluka-theme-layout-archive" data-key="' . $key . '" data-target="' . self::ARCHIVE_LAYOUT . '" src="' . $vals['img'] . '" class="weluka-theme-layout' . $active . '" style="margin-right:10px;" />'; 
								}
							}
						?>
                        		<input type="hidden" id="<?php echo self::ARCHIVE_LAYOUT; ?>" name="<?php echo self::ARCHIVE_LAYOUT; ?>" value="<?php echo $val; ?>" />
                            </div>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e( 'Page Layout : ', Weluka::$settings['plugin_name'] ); ?></th>
                    	<td>
                        	<div id="weluka-theme-layout-page">
                        <?php
	                    	$val = !empty($options[self::PAGE_LAYOUT]) ? $options[self::PAGE_LAYOUT] : $commonLayout;
							if( !empty( $this->theme_layouts ) ) {
								foreach( $this->theme_layouts as $key => $vals ) {
									$active = '';
									if( $val === $key ) { $active = ' weluka-theme-layout-active'; }
									echo '<img data-parent="weluka-theme-layout-page" data-key="' . $key . '" data-target="' . self::PAGE_LAYOUT . '" src="' . $vals['img'] . '" class="weluka-theme-layout' . $active . '" style="margin-right:10px;" />'; 
								}
							}
						?>
                        		<input type="hidden" id="<?php echo self::PAGE_LAYOUT; ?>" name="<?php echo self::PAGE_LAYOUT; ?>" value="<?php echo $val; ?>" />
                            </div>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e( 'Post Layout : ', Weluka::$settings['plugin_name'] ); ?></th>
                    	<td>
                        	<div id="weluka-theme-layout-post">
                        <?php
	                    	$val = !empty($options[self::POST_LAYOUT]) ? $options[self::POST_LAYOUT] : $commonLayout;
							if( !empty( $this->theme_layouts ) ) {
								foreach( $this->theme_layouts as $key => $vals ) {
									$active = '';
									if( $val === $key ) { $active = ' weluka-theme-layout-active'; }
									echo '<img data-parent="weluka-theme-layout-post" data-key="' . $key . '" data-target="' . self::POST_LAYOUT . '" src="' . $vals['img'] . '" class="weluka-theme-layout' . $active . '" style="margin-right:10px;" />'; 
								}
							}
						?>
                        		<input type="hidden" id="<?php echo self::POST_LAYOUT; ?>" name="<?php echo self::POST_LAYOUT; ?>" value="<?php echo $val; ?>" />
                            </div>
                    	</td>
	            	</tr>
					<?php //v1.0.6 addend ?>
            		<tr>
                		<th><?php _e( 'Common Layout : ', Weluka::$settings['plugin_name'] ); ?></th>
                    	<td>
                        	<div id="weluka-theme-layout-common">
                        <?php
	                    	$val = !empty($options[self::COMMON_LAYOUT]) ? $options[self::COMMON_LAYOUT] : $this->default_common_layout;
							if( !empty( $this->theme_layouts ) ) {
								foreach( $this->theme_layouts as $key => $vals ) {
									$active = '';
									if( $val === $key ) { $active = ' weluka-theme-layout-active'; }
									echo '<img data-parent="weluka-theme-layout-common" data-key="' . $key . '" data-target="' . self::COMMON_LAYOUT . '" src="' . $vals['img'] . '" class="weluka-theme-layout' . $active . '" style="margin-right:10px;" />'; 
								}
							}
						?>
                        		<input type="hidden" id="<?php echo self::COMMON_LAYOUT; ?>" name="<?php echo self::COMMON_LAYOUT; ?>" value="<?php echo $val; ?>" />
                            </div>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e( 'Default Page Header : ', Weluka::$settings['plugin_name'] ); ?></th>
                    	<td>
                       		<?php
                            	$val = !empty($options[self::COMMON_PAGE_HEADER]) ? $options[self::COMMON_PAGE_HEADER] : '';
								$cpts = $this->get_custom_posts( Weluka::$settings['cpt_hd'] );
							?>
                            <select id="<?php echo self::COMMON_PAGE_HEADER; ?>" name="<?php echo self::COMMON_PAGE_HEADER; ?>">
                            	<option value=""></option>
                            <?php
								if( !empty ( $cpts ) ) :
									foreach( $cpts as $cpt ) {
										$selected = $val == $cpt->ID ? ' selected="selected"' : '';
										echo '<option value="' . $cpt->ID .'"' . $selected . '>' . esc_html( strip_tags( $cpt->post_title ) ) . '</option>';
									}
								endif;
							?>
                            </select>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e( 'Default Page Footer : ', Weluka::$settings['plugin_name'] ); ?></th>
                    	<td>
                       		<?php
                            	$val = !empty($options[self::COMMON_PAGE_FOOTER]) ? $options[self::COMMON_PAGE_FOOTER] : '';
								$cpts = $this->get_custom_posts( Weluka::$settings['cpt_ft'] );
							?>
                            <select id="<?php echo self::COMMON_PAGE_FOOTER; ?>" name="<?php echo self::COMMON_PAGE_FOOTER; ?>">
                            	<option value=""></option>
                            <?php
								if( !empty ( $cpts ) ) :
									foreach( $cpts as $cpt ) {
										$selected = $val == $cpt->ID ? ' selected="selected"' : '';
										echo '<option value="' . $cpt->ID .'"' . $selected . '>' . esc_html( strip_tags( $cpt->post_title ) ) . '</option>';
									}
								endif;
							?>
                            </select>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e( 'Default Sidebar Main : ', Weluka::$settings['plugin_name'] ); ?></th>
                    	<td>
                       		<?php
                            	$val = !empty($options[self::COMMON_SIDEBAR_MAIN]) ? $options[self::COMMON_SIDEBAR_MAIN] : '';
								$cpts = $this->get_custom_posts( Weluka::$settings['cpt_sd'] );
							?>
                            <select id="<?php echo self::COMMON_SIDEBAR_MAIN; ?>" name="<?php echo self::COMMON_SIDEBAR_MAIN; ?>">
                            	<option value=""></option>
                            <?php
								if( !empty ( $cpts ) ) :
									foreach( $cpts as $cpt ) {
										$selected = $val == $cpt->ID ? ' selected="selected"' : '';
										echo '<option value="' . $cpt->ID .'"' . $selected . '>' . esc_html( strip_tags( $cpt->post_title ) ) . '</option>';
									}
								endif;
							?>
                            </select>
                            <div style="margin-top:10px;"><?php _e('If the layout is 2 column, or please select the 3 columns on the left side bar.', Weluka::$settings['plugin_name']); ?></div>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e( 'Default Sidebar Sub : ', Weluka::$settings['plugin_name'] ); ?></th>
                    	<td>
                       		<?php
                            	$val = !empty($options[self::COMMON_SIDEBAR_SUB]) ? $options[self::COMMON_SIDEBAR_SUB] : '';
								$cpts = $this->get_custom_posts( Weluka::$settings['cpt_sd'] );
							?>
                            <select id="<?php echo self::COMMON_SIDEBAR_SUB; ?>" name="<?php echo self::COMMON_SIDEBAR_SUB; ?>">
                            	<option value=""></option>
                            <?php
								if( !empty ( $cpts ) ) :
									foreach( $cpts as $cpt ) {
										$selected = $val == $cpt->ID ? ' selected="selected"' : '';
										echo '<option value="' . $cpt->ID .'"' . $selected . '>' . esc_html( strip_tags( $cpt->post_title ) ) . '</option>';
									}
								endif;
							?>
                            </select>
                            <div style="margin-top:10px;"><?php _e('Please select the right sidebar of the case layout is 3 column.', Weluka::$settings['plugin_name']); ?></div>
                    	</td>
	            	</tr>
                	<tr>
                		<th><?php _e('Logo image : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
                    		<?php $val = !empty($options[self::LOGO_IMAGE]) ? $options[self::LOGO_IMAGE] : ''; ?>
                        	<input type="text" id="<?php echo self::LOGO_IMAGE; ?>" name="<?php echo self::LOGO_IMAGE; ?>" value="<?php echo esc_url($val); ?>" class="widefat" />
                        	<div style="margin-top:10px;">
                        		<input class="welukaThemeUploadNoImageBtn" type="button" value="<?php _e('Select', Weluka::$settings['plugin_name']); ?>" data-target="#<?php echo self::LOGO_IMAGE; ?>" />
                        		<input class="welukaThemeNoImageClearBtn" type="button" value="<?php _e('Clear', Weluka::$settings['plugin_name']); ?>" data-target="#<?php echo self::LOGO_IMAGE; ?>" />
 	                       </div>
                    	</td>
                	</tr>
                	<tr>
                		<th><?php _e('Footer Copyright : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
                    		<?php $val = !empty($options[self::FOOTER_COPYRIGHT]) ? stripslashes( $options[self::FOOTER_COPYRIGHT] ) : ''; ?>
                        	<input type="text" id="<?php echo self::FOOTER_COPYRIGHT; ?>" name="<?php echo self::FOOTER_COPYRIGHT; ?>" value="<?php echo esc_attr( $val ); ?>" class="widefat" />
                            <div style="margin-top:10px;"><?php _e('Html tag can be entered.', Weluka::$settings['plugin_name']); ?></div>
                    	</td>
                	</tr>
                    <?php //ver1.0.1 ?>
                	<tr>
                		<th><?php _e('Header fixing : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
                    		<?php
                            	$val = !empty($options[self::HEAD_FIXED]) ? stripslashes( $options[self::HEAD_FIXED] ) : 0;
								$selected = $val == 0 ? 'checked="checked"' : '';
							?>
                            <label class="selectit"><input type="radio" id="<?php echo self::HEAD_FIXED; ?>_0" name="<?php echo self::HEAD_FIXED; ?>" value="0" <?php echo $selected; ?> />&nbsp;<?php _e('no', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                            <?php $selected = $val == 1 ? 'checked="checked"' : ''; ?>
                            <label class="selectit"><input type="radio" id="<?php echo self::HEAD_FIXED; ?>_1" name="<?php echo self::HEAD_FIXED; ?>" value="1" <?php echo $selected; ?> />&nbsp;<?php _e('all header fixed', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                            <?php $selected = $val == 2 ? 'checked="checked"' : ''; ?>
                            <label class="selectit"><input type="radio" id="<?php echo self::HEAD_FIXED; ?>_2" name="<?php echo self::HEAD_FIXED; ?>" value="2" <?php echo $selected; ?> />&nbsp;<?php _e('A designated [class name] header fixing', Weluka::$settings['plugin_name']); ?></label>
                            <div style="margin-top:10px;">
                    			<?php $val = !empty($options[self::HEAD_FIXED_CLASS]) ? stripslashes( $options[self::HEAD_FIXED_CLASS] ) : ''; ?>
                            	<label><?php _e('A designated class name : ',Weluka::$settings['plugin_name']); ?></label>&nbsp;
                        		<input type="text" id="<?php echo self::HEAD_FIXED_CLASS; ?>" name="<?php echo self::HEAD_FIXED_CLASS; ?>" value="<?php echo esc_attr( $val ); ?>" />
                            </div>
                            <div style="margin-top:10px;"><?php _e('Fixed header has to be a page finial certainly. When designating a class, please be sure to set it as contents of a page finial.', Weluka::$settings['plugin_name']); ?></div>
                            <div style="margin-top:10px;">
                            	<?php $val = !empty($options[self::HEAD_FIXED_AUTO_HEIGHT_PADDING]) ? stripslashes( $options[self::HEAD_FIXED_AUTO_HEIGHT_PADDING] ) : 0; ?>
            					<label class="selectit">
                					<input type="checkbox" value="1" name="<?php echo self::HEAD_FIXED_AUTO_HEIGHT_PADDING; ?>" id="<?php echo self::HEAD_FIXED_AUTO_HEIGHT_PADDING; ?>" <?php if( $val ){ echo 'checked="checked"'; } ?> />&nbsp;<?php _e('A margin for the height of the fixed header, automatic setting', Weluka::$settings['plugin_name']); ?>
                                </label>
                            </div>
                            <div style="margin-top:10px;"><?php _e('When not self-adjusting one for the fixed header height, please adjust a margin by contents under the fixed header.', Weluka::$settings['plugin_name']); ?></div>
                            <div style="margin-top:10px;">
                            	<?php $val = !empty($options[self::HEAD_FIXED_BUILDER_ENABLE]) ? stripslashes( $options[self::HEAD_FIXED_BUILDER_ENABLE] ) : 0; ?>
            					<label class="selectit">
                					<input type="checkbox" value="1" name="<?php echo self::HEAD_FIXED_BUILDER_ENABLE; ?>" id="<?php echo self::HEAD_FIXED_BUILDER_ENABLE; ?>" <?php if( $val ){ echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Builder mode the header fixed also I want to enable', Weluka::$settings['plugin_name']); ?>
                                </label>
                            </div>
                            <?php //v1.1.2 add ?>
                            <div style="margin-top:10px;">
                            	<?php $val = !empty($options[self::HEAD_FIXED_NO_SCROLL_DISPLAY]) ? stripslashes( $options[self::HEAD_FIXED_NO_SCROLL_DISPLAY] ) : 0; ?>
            					<label class="selectit">
                					<input type="checkbox" value="1" name="<?php echo self::HEAD_FIXED_NO_SCROLL_DISPLAY; ?>" id="<?php echo self::HEAD_FIXED_NO_SCROLL_DISPLAY; ?>" <?php if( $val ){ echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Hide scrolling block.', Weluka::$settings['plugin_name']); ?>
                                </label>
                            </div>
                            <?php //v1.1.2 addend ?>
                    	</td>
                	</tr>
                    <?php //ver1.0.1 addend ?>
                    <?php //v1.0.3 add ?>
                    <tr>
                		<th><?php _e('Post eye-catching image : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
                    		<?php
                            	$val = !empty($options[self::POST_EYECATCH]) ? $options[self::POST_EYECATCH] : 0;
								$selected = $val == 1 ? 'checked="checked"' : '';
							?>
                            <label class="selectit"><input type="radio" id="<?php echo self::POST_EYECATCH; ?>_1" name="<?php echo self::POST_EYECATCH; ?>" value="1" <?php echo $selected; ?> />&nbsp;<?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
                            <?php $selected = $val == 0 ? 'checked="checked"' : ''; ?>
                            <label class="selectit"><input type="radio" id="<?php echo self::POST_EYECATCH; ?>_0" name="<?php echo self::POST_EYECATCH; ?>" value="0" <?php echo $selected; ?> />&nbsp;<?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                            
                            <?php $val = !empty($options[self::POST_EYECATCH_ALIGN]) ? $options[self::POST_EYECATCH_ALIGN] : ''; ?>
                            <span style="margin-left:2em;font-weight:bold;"><label for="selectit"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label></span>
                            <span style="margin-left:1em;"><?php WelukaBuilder::get_instance()->weluka_display_align_settings(self::POST_EYECATCH_ALIGN, '', false, true, $val); ?></span>

                            <?php $val = !empty($options[self::POST_EYECATCH_SHAPE]) ? $options[self::POST_EYECATCH_SHAPE] : ''; ?>
                            <span style="margin-left:2em;font-weight:bold;"><label for="selectit"><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label></span>
                            <span style="margin-left:1em;"><?php WelukaBuilder::get_instance()->weluka_display_imgshape_settings(self::POST_EYECATCH_SHAPE, '', false, true, $val); ?></span>

                            <?php $val = !empty($options[self::POST_EYECATCH_FITWIDTH]) ? $options[self::POST_EYECATCH_FITWIDTH] : ''; ?>
							<span style="margin-left:2em;"><input id="<?php echo self::POST_EYECATCH_FITWIDTH; ?>" name="<?php echo self::POST_EYECATCH_FITWIDTH; ?>" type="checkbox" value="on" <?php if( $val == 'on' ) { echo 'checked="checked"'; } ?> /><label for="<?php echo self::POST_EYECATCH_FITWIDTH; ?>"><?php _e('I will full width display in the block.', Weluka::$settings['plugin_name']); ?></label></span>
                        </td>
                    </tr>
                    <tr>
                		<th><?php _e('Page eye-catching image : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
                    		<?php
                            	$val = !empty($options[self::PAGE_EYECATCH]) ? $options[self::PAGE_EYECATCH] : 0;
								$selected = $val == 1 ? 'checked="checked"' : '';
							?>
                            <label class="selectit"><input type="radio" id="<?php echo self::PAGE_EYECATCH; ?>_1" name="<?php echo self::PAGE_EYECATCH; ?>" value="1" <?php echo $selected; ?> />&nbsp;<?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
                            <?php $selected = $val == 0 ? 'checked="checked"' : ''; ?>
                            <label class="selectit"><input type="radio" id="<?php echo self::PAGE_EYECATCH; ?>_0" name="<?php echo self::PAGE_EYECATCH; ?>" value="0" <?php echo $selected; ?> />&nbsp;<?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>

                            <?php $val = !empty($options[self::PAGE_EYECATCH_ALIGN]) ? $options[self::PAGE_EYECATCH_ALIGN] : ''; ?>
                            <span style="margin-left:2em;font-weight:bold;"><label for="selectit"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label></span>
                            <span style="margin-left:1em;"><?php WelukaBuilder::get_instance()->weluka_display_align_settings(self::PAGE_EYECATCH_ALIGN, '', false, true, $val); ?></span>

                            <?php $val = !empty($options[self::PAGE_EYECATCH_SHAPE]) ? $options[self::PAGE_EYECATCH_SHAPE] : ''; ?>
                            <span style="margin-left:2em;font-weight:bold;"><label for="selectit"><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label></span>
                            <span style="margin-left:1em;"><?php WelukaBuilder::get_instance()->weluka_display_imgshape_settings(self::PAGE_EYECATCH_SHAPE, '', false, true, $val); ?></span>

                            <?php $val = !empty($options[self::PAGE_EYECATCH_FITWIDTH]) ? $options[self::PAGE_EYECATCH_FITWIDTH] : ''; ?>
							<span style="margin-left:2em;"><input id="<?php echo self::PAGE_EYECATCH_FITWIDTH; ?>" name="<?php echo self::PAGE_EYECATCH_FITWIDTH; ?>" type="checkbox" value="on" <?php if( $val == 'on' ) { echo 'checked="checked"'; } ?> /><label for="<?php echo self::PAGE_EYECATCH_FITWIDTH; ?>"><?php _e('I will full width display in the block.', Weluka::$settings['plugin_name']); ?></label></span>
                        </td>
                    </tr>
                    <?php //v1.0.3 add end ?>
                    <?php //v1.1.1 add ?>
                    <tr style="border-bottom:1px solid #ddd;">
                		<th><?php _e( 'Smartphone<br>(overflow-x:hidden) : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                            <?php $val = isset( $options[self::SP_OVERFLOW_HIDDEN] ) ? (int)$options[self::SP_OVERFLOW_HIDDEN] : 0; ?>
							<input id="<?php echo self::SP_OVERFLOW_HIDDEN; ?>" name="<?php echo self::SP_OVERFLOW_HIDDEN; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::SP_OVERFLOW_HIDDEN; ?>"><?php _e('Hidden', Weluka::$settings['plugin_name']); ?></label>
							<div style="margin-top:10px;"><?php _e('On Smartphone when the width is one you want to check out.', Weluka::$settings['plugin_name']); ?></div>
                        </td>
                    </tr>
                    <?php //v1.1.1 addend ?>
    	        	</tbody>
        	    	</table>
            	</div>
                
				<div class="weluka-option-wrap">
	            	<h3><?php _e('Post Setting', Weluka::$settings['plugin_name']); ?></h3>
           			<table class="form-table">
    				<tbody>
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'Home blog style excludes category : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
							<?php
								$_allcats = get_categories( 'get=all' );
                            	$selectCat = !empty( $options[self::HOME_EXCLUDE_CATEGORY] ) ? explode( ",", $options[self::HOME_EXCLUDE_CATEGORY] ) : array();
            					foreach($_allcats as $cat) : ?>
            						<label class="selectit">
                						<input type="checkbox" value="<?php echo $cat->cat_ID; ?>" name="<?php echo self::HOME_EXCLUDE_CATEGORY; ?>[]" id="<?php echo self::HOME_EXCLUDE_CATEGORY; ?>" <?php if( in_array( $cat->cat_ID, $selectCat)){ echo 'checked="checked"'; } ?> />&nbsp;<?php echo sanitize_text_field( $cat->cat_name ); ?></label>&nbsp;&nbsp;
          						<?php endforeach; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'Number of posts(Home blog style) : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::HOME_POST_NUM]) ? $options[self::HOME_POST_NUM] : 12; ?>
                        	<input type="text" id="<?php echo self::HOME_POST_NUM; ?>" name="<?php echo self::HOME_POST_NUM; ?>" value="<?php echo esc_attr( $val ); ?>" />
                            <div style="margin-top:10px;"><?php _e('When Home is a blog style, please enter the maximum number to be displayed on one page.', Weluka::$settings['plugin_name']); ?></div>
                        </td>
                    </tr>
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'Number of posts(Archive) : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::ARCHIVE_POST_NUM]) ? $options[self::ARCHIVE_POST_NUM] : 12; ?>
                        	<input type="text" id="<?php echo self::ARCHIVE_POST_NUM; ?>" name="<?php echo self::ARCHIVE_POST_NUM; ?>" value="<?php echo esc_attr( $val ); ?>" />
                            <div style="margin-top:10px;"><?php _e('When the archive, please enter the maximum number to be displayed on one page.', Weluka::$settings['plugin_name']); ?></div>
                        </td>
                    </tr>
					<?php //v1.1 add v1.2.8 id add ?>
                    <tr id="archive_paging_type_row" style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'Paging type : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::ARCHIVE_PAGING_TYPE]) ? $options[self::ARCHIVE_PAGING_TYPE] : 1; ?>
                            <?php WelukaBuilder::get_instance()->weluka_display_paging_type_settings( self::ARCHIVE_PAGING_TYPE, '', false, true, $val); ?>
							<div id="both-excerpt-scl"><?php _e('It is unavailable to set both infinite scroll and "-1" value at excerpt string number.', Weluka::$settings['plugin_name']);  //v1.2.8 add ?></div>
                        </td>
                    </tr>
                    <?php //v1.1 addend ?>
                    <?php //v1.1.1 tile, thumbnail, excerpt, readmore add ?>
                    <tr style="border-bottom:1px solid #ddd;">
                		<th><?php _e( 'Hide meta to post list : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
	                    	<?php $meta = !empty($options[self::POST_LIST_META_ARRAY]) ? $options[self::POST_LIST_META_ARRAY] : null; ?>
                            <?php $val = isset( $meta[self::POST_TITLE_HIDE] ) ? (int)$meta[self::POST_TITLE_HIDE] : 0; ?>
							<input id="<?php echo self::POST_TITLE_HIDE; ?>_list" name="<?php echo self::POST_TITLE_HIDE; ?>_list" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_TITLE_HIDE; ?>_list"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_META_DATE] ) ? (int)$meta[self::POST_META_DATE] : 0; ?>
							<input id="<?php echo self::POST_META_DATE; ?>_list" name="<?php echo self::POST_META_DATE; ?>_list" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_META_DATE; ?>_list"><?php _e('Date', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_META_AUTHOR] ) ? (int)$meta[self::POST_META_AUTHOR] : 0; ?>
							<input id="<?php echo self::POST_META_AUTHOR; ?>_list" name="<?php echo self::POST_META_AUTHOR; ?>_list" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_META_AUTHOR; ?>_list"><?php _e('Author', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_META_CATEGORY] ) ? (int)$meta[self::POST_META_CATEGORY] : 0; ?>
							<input id="<?php echo self::POST_META_CATEGORY; ?>_list" name="<?php echo self::POST_META_CATEGORY; ?>_list" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_META_CATEGORY; ?>_list"><?php _e('Category', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_META_COMMENT] ) ? (int)$meta[self::POST_META_COMMENT] : 0; ?>
							<input id="<?php echo self::POST_META_COMMENT; ?>_list" name="<?php echo self::POST_META_COMMENT; ?>_list" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_META_COMMENT; ?>_list"><?php _e('Comment Count', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_THUMB_HIDE] ) ? (int)$meta[self::POST_THUMB_HIDE] : 0; ?>
							<input id="<?php echo self::POST_THUMB_HIDE; ?>_list" name="<?php echo self::POST_THUMB_HIDE; ?>_list" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_THUMB_HIDE; ?>_list"><?php _e('Thumbnail', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_EXCERPT_HIDE] ) ? (int)$meta[self::POST_EXCERPT_HIDE] : 0; ?>
							<input id="<?php echo self::POST_EXCERPT_HIDE; ?>_list" name="<?php echo self::POST_EXCERPT_HIDE; ?>_list" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_EXCERPT_HIDE; ?>_list"><?php _e('Excerpt', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_READMORE_HIDE] ) ? (int)$meta[self::POST_READMORE_HIDE] : 0; ?>
							<input id="<?php echo self::POST_READMORE_HIDE; ?>_list" name="<?php echo self::POST_READMORE_HIDE; ?>_list" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_READMORE_HIDE; ?>_list"><?php _e('Readmore button', Weluka::$settings['plugin_name']); ?></label>
                        </td>
                    </tr>
                    <tr style="border-bottom:1px solid #ddd;">
                		<th><?php _e( 'Hide meta to post single : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
	                    	<?php $meta = !empty($options[self::POST_SINGLE_META_ARRAY]) ? $options[self::POST_SINGLE_META_ARRAY] : null; ?>
                            <?php $val = isset( $meta[self::POST_META_DATE] ) ? (int)$meta[self::POST_META_DATE] : 0; ?>
							<input id="<?php echo self::POST_META_DATE; ?>" name="<?php echo self::POST_META_DATE; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_META_DATE; ?>"><?php _e('Date', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_META_AUTHOR] ) ? (int)$meta[self::POST_META_AUTHOR] : 0; ?>
							<input id="<?php echo self::POST_META_AUTHOR; ?>" name="<?php echo self::POST_META_AUTHOR; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_META_AUTHOR; ?>"><?php _e('Author', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_META_CATEGORY] ) ? (int)$meta[self::POST_META_CATEGORY] : 0; ?>
							<input id="<?php echo self::POST_META_CATEGORY; ?>" name="<?php echo self::POST_META_CATEGORY; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_META_CATEGORY; ?>"><?php _e('Category', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;

                            <?php $val = isset( $meta[self::POST_META_COMMENT] ) ? (int)$meta[self::POST_META_COMMENT] : 0; ?>
							<input id="<?php echo self::POST_META_COMMENT; ?>" name="<?php echo self::POST_META_COMMENT; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::POST_META_COMMENT; ?>"><?php _e('Comment Count', Weluka::$settings['plugin_name']); ?></label>
                        </td>
                    </tr>
<?php /* TODO
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'Hide meta to post category : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
							<?php
								$_allcats = get_categories( 'get=all' );
                            	$selectCat = !empty( $options[self::HIDE_META_CATEGORY] ) ? explode( ",", $options[self::HIDE_META_CATEGORY] ) : array();
            					foreach($_allcats as $cat) : ?>
            						<label class="selectit">
                						<input type="checkbox" value="<?php echo $cat->cat_ID; ?>" name="<?php echo self::HIDE_META_CATEGORY; ?>[]" id="<?php echo self::HIDE_META_CATEGORY; ?>" <?php if( in_array( $cat->cat_ID, $selectCat)){ echo 'checked="checked"'; } ?> />&nbsp;<?php echo sanitize_text_field( $cat->cat_name ); ?></label>&nbsp;&nbsp;
          						<?php endforeach; ?>
                        </td>
                    </tr>
*/ ?>
<?php /*
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'Hide comment block : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::COMMENT_BLOCK]) ? (int)$options[self::COMMENT_BLOCK] : 0; ?>
                        		<label><input type="radio" id="<?php echo self::COMMENT_BLOCK; ?>_0" name="<?php echo self::COMMENT_BLOCK; ?>" value="0" <?php if($val === 0) { echo 'checked="checked"'; } ?> /><?php _e('Show', Weluka::$settings['plugin_name']); ?></label>
                     			&nbsp;&nbsp;&nbsp;&nbsp;
                        		<label><input type="radio" id="<?php echo self::COMMENT_BLOCK; ?>_1" name="<?php echo self::COMMENT_BLOCK; ?>" value="1" <?php if($val === 1) { echo 'checked="checked"'; } ?> /><?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                        </td>
                    </tr>
*/ ?>
<?php //ver1.0.1 add ?>
                    <tr style="border-bottom:1px solid #ddd;">
                		<th><?php _e( 'Hide tagcloud to post list : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                            <?php $val = isset( $options[self::HIDE_POSTLIST_TAGCLOUD] ) ? (int)$options[self::HIDE_POSTLIST_TAGCLOUD] : 0; ?>
							<input id="<?php echo self::HIDE_POSTLIST_TAGCLOUD; ?>" name="<?php echo self::HIDE_POSTLIST_TAGCLOUD; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::HIDE_POSTLIST_TAGCLOUD; ?>"><?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                        </td>
                    </tr>
                    <tr style="border-bottom:1px solid #ddd;">
                		<th><?php _e( 'Tagcloud position to post list : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                            <?php $val = isset( $options[self::POSTLIST_TAGCLOUD_POSITION] ) ? $options[self::POSTLIST_TAGCLOUD_POSITION] : 'metabottom'; ?>
							<?php WelukaBuilder::get_instance()->weluka_display_tagcloud_pos_settings(self::POSTLIST_TAGCLOUD_POSITION, '', false, true, $val); ?>
                        </td>
                    </tr>
                    <tr style="border-bottom:1px solid #ddd;">
                		<th><?php _e( 'Hide tagcloud to post single : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                            <?php $val = isset( $options[self::HIDE_POST_TAGCLOUD] ) ? (int)$options[self::HIDE_POST_TAGCLOUD] : 0; ?>
							<input id="<?php echo self::HIDE_POST_TAGCLOUD; ?>" name="<?php echo self::HIDE_POST_TAGCLOUD; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::HIDE_POST_TAGCLOUD; ?>"><?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                        </td>
                    </tr>
                    <tr style="border-bottom:1px solid #ddd;">
                		<th><?php _e( 'Tagcloud position to post single : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                            <?php $val = isset( $options[self::POST_TAGCLOUD_POSITION] ) ? $options[self::POST_TAGCLOUD_POSITION] : 'metabottom'; ?>
							<span><label for="selectit"><?php _e('Vertical', Weluka::$settings['plugin_name']); ?></label></span>
							<span style="margin-left:1em;">
							<?php WelukaBuilder::get_instance()->weluka_display_tagcloud_pos_settings(self::POST_TAGCLOUD_POSITION, '', false, true, $val); ?>
							</span>
							<?php $val = !empty($options[self::POST_TAG_ALIGN]) ? $options[self::POST_TAG_ALIGN] : ''; ?>
							<span style="margin-left:2em;"><label for="selectit"><?php _e('Horizontal', Weluka::$settings['plugin_name']); ?></label></span>
							<span style="margin-left:1em;"><?php WelukaBuilder::get_instance()->weluka_display_align_settings(self::POST_TAG_ALIGN, '', false, true, $val, true); ?></span>
							
                        </td>
                    </tr>
					<?php //ver1.2.7 add ?>
					<tr style="border-bottom:1px solid #ddd;">
						<th><?php _e( 'Title and meta align(vertical)', Weluka::$settings['plugin_name'] ); ?> : </th>
						<td>
							<div>
								<?php $val = !empty($options[self::COMMON_TITLE_ALIGN]) ? $options[self::COMMON_TITLE_ALIGN] : ''; ?>
								<span style="font-weight:bold;"><label for="selectit"><?php _e('Common in the site', Weluka::$settings['plugin_name']); ?></label></span>
								<span style="margin-left:1em;margin-bottom:0.5em;"><?php WelukaBuilder::get_instance()->weluka_display_align_settings(self::COMMON_TITLE_ALIGN, '', false, true, $val); ?></span><br>
							</div>
							<div style="margin : 16px 0;">
								<?php $val = !empty($options[self::POST_TITLE_ALIGN]) ? $options[self::POST_TITLE_ALIGN] : ''; ?>
								<div style="width: 25em; margin-bottom: 7px;"><?php _e('Below settings take priority over above common in  the site.', Weluka::$settings['plugin_name']); ?></div>
								<div style="width: 13em;display: inline-block;float: left; ">
									<span><label for="selectit"><?php _e('Post pages', Weluka::$settings['plugin_name']); ?></label></span>
									<span style="float:right;"><?php WelukaBuilder::get_instance()->weluka_display_align_settings(self::POST_TITLE_ALIGN, '', false, true, $val, true); ?></span>
								</div>
							</div>
							<div style="clear: both;width: 13em;padding: 7px 0;">
								<?php $val = !empty($options[self::PAGE_TITLE_ALIGN]) ? $options[self::PAGE_TITLE_ALIGN] : ''; ?>
								<span><label for="selectit"><?php _e('Fixed pages', Weluka::$settings['plugin_name']); ?></label></span>
								<span style="float: right;"><?php WelukaBuilder::get_instance()->weluka_display_align_settings(self::PAGE_TITLE_ALIGN, '', false, true, $val, true); ?></span>
							</div>
							<div style="margin-top: 10px;width: 13em;">
								<?php $val = !empty($options[self::ARCHIVE_TITLE_ALIGN]) ? $options[self::ARCHIVE_TITLE_ALIGN] : ''; ?>
								<span><label for="selectit"><?php _e('Archive pages', Weluka::$settings['plugin_name']); ?></label></span>
								<span style="float: right;"><?php WelukaBuilder::get_instance()->weluka_display_align_settings(self::ARCHIVE_TITLE_ALIGN, '', false, true, $val, true); ?></span>
							</div>
						</td>
					</tr>
					<?php //ver1.2.7 addend ?>
                    <tr style="border-bottom:1px solid #ddd;">
                		<th><?php _e( 'Hide paging link to post single : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                            <?php $val = isset( $options[self::HIDE_POST_PAGING] ) ? (int)$options[self::HIDE_POST_PAGING] : 0; ?>
							<input id="<?php echo self::HIDE_POST_PAGING; ?>" name="<?php echo self::HIDE_POST_PAGING; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::HIDE_POST_PAGING; ?>"><?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                        </td>
                    </tr>
<?php //ver1.0.1 add end ?>
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'Post Date Format : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::POST_DATE_FORMAT]) ? $options[self::POST_DATE_FORMAT] : self::DEFAULT_POST_DATE_FORMAT; ?>
                        	<input type="text" id="<?php echo self::POST_DATE_FORMAT; ?>" name="<?php echo self::POST_DATE_FORMAT; ?>" value="<?php echo esc_attr( $val ); ?>" />
                            <div style="margin-top:10px;margin-bottom:16px;"><?php _e('List, Please specify the format of the post date to be displayed on the page within the like. Example) If you want to display as of October 1, 2015, please specify the Y year m month d date.(can be specified format, <a href="//wpdocs.osdn.jp/Formatting_Date_and_Time" target="_blank">please refer to here.</a>)', Weluka::$settings['plugin_name']); ?></div>
                            
                            <?php //v1.0.4 add 1.2.8 modify ?>
							<?php  _e('View order ', Weluka::$settings['plugin_name'])?>&nbsp;&nbsp;
							<select id="<?php echo self::POST_DATE_DISPLAY_MODIFY; ?>" name="<?php echo self::POST_DATE_DISPLAY_MODIFY; ?>" class="form-control">
							<?php $val = isset( $options[self::POST_DATE_DISPLAY_MODIFY] ) ? (int)$options[self::POST_DATE_DISPLAY_MODIFY] : 0;
								  $orderWay = array(
									  __('Registered', Weluka::$settings['plugin_name']) => 0,
									  __('Updated', Weluka::$settings['plugin_name']) => 1,
									  __('Random', Weluka::$settings['plugin_name']) => 2
									);
								  foreach ($orderWay as $k => $v) {
									$selected = $val === $v ? 'selected="selected"' : '';
									echo '<option value="' . $v . '" ' . $selected . '>' . $k  . '</option>';
								  }
							?></select>
							<div style="margin-top:10px;"><?php _e('Please select the order of archives.If you set the random, registered times will be shown in the list and the list order will be changed every hour at random.', Weluka::$settings['plugin_name']); ?></div>
                            <?php //v1.0.4 addend  1.2.8 modify ?>
                        </td>
                    </tr>
                    <?php //v1.1 add  ?>
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'Title String Number : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::TITLE_STRING_NUM]) ? $options[self::TITLE_STRING_NUM] : ''; ?>
                        	<input type="text" id="<?php echo self::TITLE_STRING_NUM; ?>" name="<?php echo self::TITLE_STRING_NUM; ?>" value="<?php echo esc_attr( $val ); ?>" />
                            <div style="margin-top:10px;"><?php _e('In digits must specify the number of characters of the post title that is displayed in the list, etc. If the specified will be visible.', Weluka::$settings['plugin_name']); ?></div>
                        </td>
                    </tr>                    
                    <?php //v1.1 addend  ?>
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'Excerpt String Number : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::EXCERPT_STRING_NUM]) ? $options[self::EXCERPT_STRING_NUM] : ''; ?>
                        	<input type="text" id="<?php echo self::EXCERPT_STRING_NUM; ?>" name="<?php echo self::EXCERPT_STRING_NUM; ?>" value="<?php echo esc_attr( $val ); ?>" />
                            <div style="margin-top:10px;"><?php _e('In digits must specify the length of post excerpt that appears in the list, etc. WordPress standard characters if none specified.', Weluka::$settings['plugin_name']); ?></div>
							<div><?php _e('All images and characters decorated by HTML will be shown if you set -1.', Weluka::$settings['plugin_name']);  //v1.2.8 add ?></div>
                        </td>
                    </tr>                  
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'List Format : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::ARCHIVE_LIST_FORMAT]) ? $options[self::ARCHIVE_LIST_FORMAT] : "mediatop"; ?>
                            <?php WelukaBuilder::get_instance()->weluka_display_listlayout_settings( self::ARCHIVE_LIST_FORMAT, '', false, true, $val); ?>
                            <div style="margin-top:10px;"><?php _e('Home blog style, please select the Innovation list format at the time of the archive.', Weluka::$settings['plugin_name']); ?></div>
							<?php //v1.0.6 add ?>
							<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                            	<p style="font-weight:bold;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
    	                		<?php $val = isset($options[self::ARCHIVE_LIST_FORMAT_SM]) ? $options[self::ARCHIVE_LIST_FORMAT_SM] : ""; ?>
								<label><span style="margin-right:8px;"><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></span></label>
        	                    <?php WelukaBuilder::get_instance()->weluka_display_listlayout_settings( self::ARCHIVE_LIST_FORMAT_SM, '', false, true, $val); ?>

    	                		<?php $val = isset($options[self::ARCHIVE_LIST_FORMAT_XS]) ? $options[self::ARCHIVE_LIST_FORMAT_XS] : ""; ?>
								<label><span style="margin-left:20px;margin-right:8px;"><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></span></label>
        	                    <?php WelukaBuilder::get_instance()->weluka_display_listlayout_settings( self::ARCHIVE_LIST_FORMAT_XS, '', false, true, $val); ?>
                            	<div style="margin-top:10px;"><?php _e('Home blog style, please select the Innovation list format at the time of the archive.(Responsive)', Weluka::$settings['plugin_name']); ?></div>
							</div>
							<?php //v1.0.6 addend ?>
                        </td>
                    </tr>
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'List Row Column : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::ARCHIVE_LIST_COLS]) ? $options[self::ARCHIVE_LIST_COLS] : 3; ?>
                            <?php WelukaBuilder::get_instance()->weluka_display_listlayout_rowcolumn_settings( self::ARCHIVE_LIST_COLS, '', false, true, $val); ?>
							<?php //v1.0.6 add ?>
							<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                            	<p style="font-weight:bold;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
    	                		<?php $val = isset($options[self::ARCHIVE_LIST_COLS_SM]) ? $options[self::ARCHIVE_LIST_COLS_SM] : ""; ?>
								<label><span style="margin-right:8px;"><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></span></label>
                            	<?php WelukaBuilder::get_instance()->weluka_display_listlayout_rowcolumn_settings( self::ARCHIVE_LIST_COLS_SM, '', false, true, $val, false, true); ?>

    	                		<?php $val = isset($options[self::ARCHIVE_LIST_COLS_XS]) ? $options[self::ARCHIVE_LIST_COLS_XS] : ""; ?>
								<label><span style="margin-left:20px;margin-right:8px;"><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></span></label>
                            	<?php WelukaBuilder::get_instance()->weluka_display_listlayout_rowcolumn_settings( self::ARCHIVE_LIST_COLS_XS, '', false, true, $val, false, true); ?>
	                            <div style="margin-top:10px;"><?php _e('Please select the number of columns the case of a vertical list format.(Responsive)', Weluka::$settings['plugin_name']); ?></div>
							</div>
							<?php //v1.0.6 addend ?>
                        </td>
                    </tr>
                    <?php //v1.2 add ?>
                    <tr style="border-bottom:1px solid #ddd;">
                    	<th><?php _e( 'List thumbnail height : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::ARCHIVE_LIST_THUMB_HEIGHT]) ? $options[self::ARCHIVE_LIST_THUMB_HEIGHT] : ''; ?>
       						<input id="<?php echo self::ARCHIVE_LIST_THUMB_HEIGHT; ?>" name="<?php echo self::ARCHIVE_LIST_THUMB_HEIGHT; ?>" type="text" class="form-control weluka-normal-text" size="5" value="<?php echo $val; ?>" />&nbsp;&nbsp;px
							<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                            	<p style="font-weight:bold;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
    	                		<?php $val = isset($options[self::ARCHIVE_LIST_THUMB_HEIGHT_SM]) ? $options[self::ARCHIVE_LIST_THUMB_HEIGHT_SM] : ''; ?>
								<label><span style="margin-right:8px;"><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></span></label>
       							<input id="<?php echo self::ARCHIVE_LIST_THUMB_HEIGHT_SM; ?>" name="<?php echo self::ARCHIVE_LIST_THUMB_HEIGHT_SM; ?>" type="text" class="form-control weluka-normal-text" size="5" value="<?php echo $val; ?>" />&nbsp;&nbsp;px
    	                		<?php $val = isset($options[self::ARCHIVE_LIST_THUMB_HEIGHT_XS]) ? $options[self::ARCHIVE_LIST_THUMB_HEIGHT_XS] : ''; ?>
								<label><span style="margin-left:20px;margin-right:8px;"><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></span></label>
       							<input id="<?php echo self::ARCHIVE_LIST_THUMB_HEIGHT_XS; ?>" name="<?php echo self::ARCHIVE_LIST_THUMB_HEIGHT_XS; ?>" type="text" class="form-control weluka-normal-text" size="5" value="<?php echo $val; ?>" />&nbsp;&nbsp;px
							</div>
                            <div class="help-block" style="margin-top:10px;"><?php _e('Please enter a height (px) If you want to align the height of the thumbnail. Set the height of responsive (or clear the height) If you want to set List Format is responsive.', Weluka::$settings['plugin_name']); ?></div>

                        </td>
                    </tr>
                    <tr style="border-bottom:1px solid #ddd;">
                		<th><?php _e( 'List post block : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                            <?php $val = isset( $options[self::ARCHIVE_LIST_EQH] ) ? (int)$options[self::ARCHIVE_LIST_EQH] : 0; ?>
							<input id="<?php echo self::ARCHIVE_LIST_EQH; ?>" name="<?php echo self::ARCHIVE_LIST_EQH; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
	                        <label for="<?php echo self::ARCHIVE_LIST_EQH; ?>"><?php _e('Align the same line block height', Weluka::$settings['plugin_name']); ?></label>
                            <div class="help-block" style="margin-top:10px;"><?php _e('If you align the height of the list articles block, set the List Format of responsive, customized List Row.', Weluka::$settings['plugin_name']); ?></div>
                            <table class="subform-table">
                                <tbody>
                                	<tr>
                                    	<th><?php _e( 'Box Style', Weluka::$settings['plugin_name'] ); ?></th>
                                        <td>
    	                					<?php $val = isset($options[self::ARCHIVE_LIST_BOX_STYLE]) ? $options[self::ARCHIVE_LIST_BOX_STYLE] : ''; ?>
        	                    			<?php WelukaBuilder::get_instance()->weluka_display_blockstyle_settings( self::ARCHIVE_LIST_BOX_STYLE, '', false, true, $val); ?>
                                        </td>
                                    	<th><?php _e( 'Shape', Weluka::$settings['plugin_name'] ); ?></th>
                                        <td>
    	                					<?php $val = isset($options[self::ARCHIVE_LIST_BOX_STYLE_SHAPE]) ? $options[self::ARCHIVE_LIST_BOX_STYLE_SHAPE] : ''; ?>
	        								<select id="<?php echo self::ARCHIVE_LIST_BOX_STYLE_SHAPE; ?>" name="<?php echo self::ARCHIVE_LIST_BOX_STYLE_SHAPE; ?>">
        										<option value=""<?php if( !$val ){ echo ' selected="selected"'; } ?>><?php _e('Square', Weluka::$settings['plugin_name']); ?></option>
        										<option value="img-rounded"<?php if( $val == 'img-rounded' ){ echo ' selected="selected"'; } ?>><?php _e('Round', Weluka::$settings['plugin_name']); ?></option>
           									</select>
                                        </td>
                                        <td>
    	                					<?php $val = isset($options[self::ARCHIVE_LIST_BOX_STYLE_SHADOW]) ? $options[self::ARCHIVE_LIST_BOX_STYLE_SHADOW] : ''; ?>
                                            <input id="<?php echo self::ARCHIVE_LIST_BOX_STYLE_SHADOW; ?>" name="<?php echo self::ARCHIVE_LIST_BOX_STYLE_SHADOW; ?>" type="checkbox" value="1" <?php if( $val ) { echo ' checked="checked"'; } ?> />
                                            <label for="<?php echo self::ARCHIVE_LIST_BOX_STYLE_SHADOW; ?>"><?php _e('Box Shadow?', Weluka::$settings['plugin_name']); ?></label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="help-block"><?php _e('"Weluka theme color" set background colors, and more.', Weluka::$settings['plugin_name']); ?></div>
                        </td>
                    </tr>
                    <?php //v1.2 addend ?>
                    <tr>
                    	<th><?php _e( 'List Button Text : ', Weluka::$settings['plugin_name'] ); ?></th>
                        <td>
                    		<?php $val = isset($options[self::MORE_BUTTON_TEXT]) ? $options[self::MORE_BUTTON_TEXT] : __('Read more', Weluka::$settings['plugin_name']); ?>
                        	<input type="text" id="<?php echo self::MORE_BUTTON_TEXT; ?>" name="<?php echo self::MORE_BUTTON_TEXT; ?>" value="<?php echo esc_attr( $val ); ?>" />
                            <div style="margin-top:10px;"><?php _e('Please input a link button text of an archive list.', Weluka::$settings['plugin_name']); ?></div>
                        </td>
                    </tr>
                	<?php //no image ?>
                	<tr>
                		<th><?php _e('No image : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
                    	<?php $val = !empty($options[self::NO_IMAGE_FILE]) ? $options[self::NO_IMAGE_FILE] : ''; ?>
                        	<input type="text" id="<?php echo self::NO_IMAGE_FILE; ?>" name="<?php echo self::NO_IMAGE_FILE; ?>" value="<?php echo esc_url($val); ?>" class="widefat" />
                        	<div style="margin-top:10px;">
                        		<input class="welukaThemeUploadNoImageBtn" type="button" value="<?php _e('Select', Weluka::$settings['plugin_name']); ?>" data-target="#<?php echo self::NO_IMAGE_FILE; ?>" />
                        		<input class="welukaThemeNoImageClearBtn" type="button" value="<?php _e('Clear', Weluka::$settings['plugin_name']); ?>" data-target="#<?php echo self::NO_IMAGE_FILE; ?>" />
 	                       </div>
        	                <div style="margin-top:10px;">
    	                    	<?php _e('Please establish the no image picture used for an archive list. When not establishing it, a noimage picture of a theme accessory is applied.', Weluka::$settings['plugin_name']); ?>
            	            </div>
                    	</td>
                	</tr>
						<?php //lazy load ver1.2.7 add ?>
					<tr style="border-bottom:1px solid #ddd;">
							<th><?php _e( 'Lazy load thumbnail : ', Weluka::$settings['plugin_name'] ); ?></th>
							<td>
								<?php $val = isset( $options[self::LAZY_LOAD] ) ? (int)$options[self::LAZY_LOAD] : 0;
								?>
								<input id="<?php echo self::LAZY_LOAD; ?>" name="<?php echo self::LAZY_LOAD; ?>" type="checkbox" value="1" <?php if( $val === 1 ) { echo 'checked="checked"'; } ?> />
								<label for="<?php echo self::LAZY_LOAD; ?>"><?php _e('I will lazy load the thumbnail to speed up the site.', Weluka::$settings['plugin_name']); ?></label>
							</td>
					</tr>
                    </tbody>
                    </table>
                </div>
				<div class="weluka-option-wrap">
	            	<h3><?php _e('Custom Css', Weluka::$settings['plugin_name']); ?></h3>
                    <?php $val = !empty($options[self::CUSTOM_CSS]) ? wp_unslash($options[self::CUSTOM_CSS]) : ''; ?>
                    <textarea id="<?php echo self::CUSTOM_CSS; ?>" name="<?php echo self::CUSTOM_CSS; ?>" class="widefat" rows="15"><?php echo esc_attr($val); ?></textarea>
        	        <div style="margin:10px 0;">
    	            	<?php _e('Custom style is not set to style.css, please set here.', Weluka::$settings['plugin_name']); ?>
            	    </div>
                </div>
            	<p class="submit"><input type="submit" id="weluka_theme_setting_submit" name="weluka_theme_setting_submit" value="<?php _e( 'Save', Weluka::$settings['plugin_name'] ) ;?>" class="button-primary" /></p>
	        </form>
        	<div style="display:none;"> 
            	<script type="text/javascript">
					jQuery(document).ready(function($) {
						//v1.2 addcancel
						//$('.colorpicker').colorpicker();

						$('.weluka-theme-layout').on('click', function() {
							var elm		= $(this),
								val		= elm.data('key'),
								target	= '#' + elm.data('target'),
								pId		= '#' + elm.data('parent');
							
							$(pId + ' .weluka-theme-layout').removeClass('weluka-theme-layout-active');
							elm.addClass('weluka-theme-layout-active');
							$(target).val(val);
						});

						// noimage media
						var _welukaThemeMediaFrame;
						$('.welukaThemeUploadNoImageBtn').on('click', function(evt){
							if( !_welukaThemeMediaFrame ) {
								_welukaThemeMediaFrame = wp.media({
									button: { text: "<?php _e('Select Image', Weluka::$settings['plugin_name']); ?>" },
									library : { type : "image" },
									multiple: false
								});
							}
							var obj = $(evt.target);
							_welukaThemeMediaFrame.once('select', $.proxy(_welukaThemeMediaSelected, obj));
							_welukaThemeMediaFrame.open();
						});
						
						function _welukaThemeMediaSelected() {
							var mediaInfo = _welukaThemeMediaFrame.state().get('selection').first().toJSON(),
								target = $(this).data('target') ? $(this).data('target') : '';
							if( target && mediaInfo.url ) {
								$(target).val(mediaInfo.url);
							}
						}

						$('.welukaThemeNoImageClearBtn').on('click', function(evt){
							var target = $(this).data('target') ? $(this).data('target') : '';
							if( target ) {
								$(target).val('');
							}
						});
						
						//add v1.2.8
						$('#excerpt_string_num').keyup(function() {
							if($(this).val() == -1 && $('#archive_paging_type').val() == 2){
								$('html, body').animate({
								scrollTop: $('#archive_paging_type_row').offset().top - $('#wpadminbar').height()
								}, 400);
								setTimeout(function(){$('#archive_paging_type').val(1);},1000);
								$('#both-excerpt-scl').css('color','#ffc107');
							}
						});
						$('#archive_paging_type').change(function() {
							if($('#excerpt_string_num').val() == -1 && $(this).val() == 2){
								$('#archive_paging_type').val(1);
								$('#both-excerpt-scl').css('color','#ffc107');
							}
						});

					});
				</script>
			</div>
		</div>
<?php
	}

	/**
 	 * theme option db registory
	 * @return void
	 * @update
	 * ver1.0.1
	 * ver1.0.3
	 * ver1.0.4
	 * ver1.0.6
	 * ver1.1
	 * ver1.1.1
	 * ver1.1.2
	 * ver1.2
	 * ver1.2.5
	 */
	public function update_setting( $data ){
		global $wp_version;
		$errmsg = "";
		try {
			
			$_homeLayout 		= !empty( $data[self::HOME_LAYOUT] ) ? $data[self::HOME_LAYOUT] : $this->default_home_layout;
			$_commonLayout 		= !empty( $data[self::COMMON_LAYOUT] ) ? $data[self::COMMON_LAYOUT] : $this->default_common_layout;

			$_postMetaDateList		= isset( $data[self::POST_META_DATE . '_list'] ) ? $data[self::POST_META_DATE . '_list'] : 0;
			$_postMetaAuthorList	= isset( $data[self::POST_META_AUTHOR . '_list'] ) ? $data[self::POST_META_AUTHOR . '_list'] : 0;
			$_postMetaCategoryList	= isset( $data[self::POST_META_CATEGORY . '_list'] ) ? $data[self::POST_META_CATEGORY . '_list'] : 0;
			$_postMetaCommentList	= isset( $data[self::POST_META_COMMENT . '_list'] ) ? $data[self::POST_META_COMMENT . '_list'] : 0;
			//v1.1 add
			$_postTitleHideList		= isset( $data[self::POST_TITLE_HIDE . '_list'] ) ? $data[self::POST_TITLE_HIDE . '_list'] : 0;
			$_postThumbHideList		= isset( $data[self::POST_THUMB_HIDE . '_list'] ) ? $data[self::POST_THUMB_HIDE . '_list'] : 0;
			$_postExcerptHideList		= isset( $data[self::POST_EXCERPT_HIDE . '_list'] ) ? $data[self::POST_EXCERPT_HIDE . '_list'] : 0;
			$_postReadmoreHideList		= isset( $data[self::POST_READMORE_HIDE . '_list'] ) ? $data[self::POST_READMORE_HIDE . '_list'] : 0;
			//v1.1 addend
						
			$_postMetaDate		= isset( $data[self::POST_META_DATE] ) ? $data[self::POST_META_DATE] : 0;
			$_postMetaAuthor	= isset( $data[self::POST_META_AUTHOR] ) ? $data[self::POST_META_AUTHOR] : 0;
			$_postMetaCategory	= isset( $data[self::POST_META_CATEGORY] ) ? $data[self::POST_META_CATEGORY] : 0;
			$_postMetaComment	= isset( $data[self::POST_META_COMMENT] ) ? $data[self::POST_META_COMMENT] : 0;

/* TODO
			$_hideCats = '';
			if ( !empty($data[self::HIDE_META_CATEGORY]) && is_array($data[self::HIDE_META_CATEGORY]) ) {
				$_hideCats = implode( ',', $data[self::HIDE_META_CATEGORY] );
			}
*/
			//$_commentBlock		= isset($data[self::COMMENT_BLOCK]) ? $data[self::COMMENT_BLOCK] : 0;
			$_postDateFormat	= isset( $data[self::POST_DATE_FORMAT] ) ? $data[self::POST_DATE_FORMAT] : '';
			$_excerptNum		= isset( $data[self::EXCERPT_STRING_NUM] ) ? $data[self::EXCERPT_STRING_NUM] : '';

			$_excludeHomeCats = '';
			if ( !empty($data[self::HOME_EXCLUDE_CATEGORY]) && is_array($data[self::HOME_EXCLUDE_CATEGORY]) ) {
				$_excludeHomeCats = implode( ',', $data[self::HOME_EXCLUDE_CATEGORY] );
			}

			$_homePostNum		= isset( $data[self::HOME_POST_NUM] ) ? $data[self::HOME_POST_NUM] : 12;
			$_archivePostNum	= isset( $data[self::ARCHIVE_POST_NUM] ) ? $data[self::ARCHIVE_POST_NUM] : 12;
			$_archiveFormat		= isset( $data[self::ARCHIVE_LIST_FORMAT] ) ? $data[self::ARCHIVE_LIST_FORMAT] : 'mediatop';
			$_archiveCols		= isset( $data[self::ARCHIVE_LIST_COLS] ) ? $data[self::ARCHIVE_LIST_COLS] : 3;
			$_moreText			= isset( $data[self::MORE_BUTTON_TEXT] ) && strlen( trim( $data[self::MORE_BUTTON_TEXT] ) ) > 0 ? trim( $data[self::MORE_BUTTON_TEXT] ) : '';

			//modify v1.2.4.4
			$_noimage			= isset( $data[self::NO_IMAGE_FILE] ) && strlen( trim( $data[self::NO_IMAGE_FILE] ) ) > 0 ? trim( $data[self::NO_IMAGE_FILE] )  : '';
			
			

			$_pageHd 		= !empty( $data[self::COMMON_PAGE_HEADER] ) ? $data[self::COMMON_PAGE_HEADER] : '';
			$_pageFt 		= !empty( $data[self::COMMON_PAGE_FOOTER] ) ? $data[self::COMMON_PAGE_FOOTER] : '';
			$_mainSide 		= !empty( $data[self::COMMON_SIDEBAR_MAIN] ) ? $data[self::COMMON_SIDEBAR_MAIN] : '';
			$_subSide 		= !empty( $data[self::COMMON_SIDEBAR_SUB] ) ? $data[self::COMMON_SIDEBAR_SUB] : '';
			
			//add v1.2.5
			$_options       = get_option(self::$theme_settings['option_name']);
			
			$_typeHdKey = self::DISP_KEY.self::PLACE_PAGE_HEADER;
			$_typeFtKey = self::DISP_KEY.self::PLACE_PAGE_FOOTER;
			$_typemainSideKey = self::DISP_KEY.self::PLACE_SIDEBAR_MAIN;
			$_typesubSideKey  = self::DISP_KEY.self::PLACE_SIDEBAR_SUB;
			
			
			$_pageTypeHd    = isset($_options[$_typeHdKey] ) ? $_options[$_typeHdKey] : array();
			$_pageTypeFt 	= isset( $_options[$_typeFtKey] ) ? $_options[$_typeFtKey] : array();
			$_pageTypemainSide 	= isset( $_options[$_typemainSideKey] ) ? $_options[$_typemainSideKey] : array();
			$_pageTypesubSide 	= isset( $_options[$_typesubSideKey] ) ? $_options[$_typesubSideKey] : array();
			

			$_logo			= isset( $data[self::LOGO_IMAGE] ) && strlen( trim( $data[self::LOGO_IMAGE] ) ) > 0 ? Weluka::get_instance()->set_url( trim( $data[self::LOGO_IMAGE] ) ) : '';
			$_copyright		= isset( $data[self::FOOTER_COPYRIGHT] ) && strlen( trim( $data[self::FOOTER_COPYRIGHT] ) ) > 0 ? trim( $data[self::FOOTER_COPYRIGHT] ) : '';

			$_customCss		= isset( $data[self::CUSTOM_CSS] ) && strlen( trim( $data[self::CUSTOM_CSS] ) ) > 0 ? trim( $data[self::CUSTOM_CSS] ) : '';

			// ver1.0.1 add
			$_hideListTagcloud		= isset( $data[self::HIDE_POSTLIST_TAGCLOUD] ) ? $data[self::HIDE_POSTLIST_TAGCLOUD] : 0;
			$_hidePostTagcloud		= isset( $data[self::HIDE_POST_TAGCLOUD] ) ? $data[self::HIDE_POST_TAGCLOUD] : 0;
			$_tagcloudPosition		= isset( $data[self::POST_TAGCLOUD_POSITION] ) ? $data[self::POST_TAGCLOUD_POSITION] : 'metabottom';
			$_listTagcloudPosition	= isset( $data[self::POSTLIST_TAGCLOUD_POSITION] ) ? $data[self::POSTLIST_TAGCLOUD_POSITION] : 'metabottom';
			$_hidePostPaging		= isset( $data[self::HIDE_POST_PAGING] ) ? $data[self::HIDE_POST_PAGING] : 0;

			$_hdFixed				= isset( $data[self::HEAD_FIXED] ) ? $data[self::HEAD_FIXED] : 0;
			$_hdFixedClass			= isset( $data[self::HEAD_FIXED_CLASS] ) ? $data[self::HEAD_FIXED_CLASS] : '';
			$_hdFixedAutoPd			= isset( $data[self::HEAD_FIXED_AUTO_HEIGHT_PADDING] ) ? $data[self::HEAD_FIXED_AUTO_HEIGHT_PADDING] : 0;
			$_hdFixedBuilderEnable	= isset( $data[self::HEAD_FIXED_BUILDER_ENABLE] ) ? $data[self::HEAD_FIXED_BUILDER_ENABLE] : 0;
			//ver1.0.1 add end
			// ver1.1.2 add
			$_hdFixedNoScrollDisplay	= isset( $data[self::HEAD_FIXED_NO_SCROLL_DISPLAY] ) ? $data[self::HEAD_FIXED_NO_SCROLL_DISPLAY] : 0;
			// ver1.1.2 addend
			
			//v1.0.3 add
			$_postEyecatch				= isset( $data[self::POST_EYECATCH] ) ? $data[self::POST_EYECATCH] : 0;
			$_postEyecatchAlign			= isset( $data[self::POST_EYECATCH_ALIGN] ) ? $data[self::POST_EYECATCH_ALIGN] : '';
			$_postEyecatchShape			= isset( $data[self::POST_EYECATCH_SHAPE] ) ? $data[self::POST_EYECATCH_SHAPE] : '';
			$_postEyecatchFit			= isset( $data[self::POST_EYECATCH_FITWIDTH] ) ? $data[self::POST_EYECATCH_FITWIDTH] : '';
			$_pageEyecatch				= isset( $data[self::PAGE_EYECATCH] ) ? $data[self::PAGE_EYECATCH] : 0;
			$_pageEyecatchAlign			= isset( $data[self::PAGE_EYECATCH_ALIGN] ) ? $data[self::PAGE_EYECATCH_ALIGN] : '';
			$_pageEyecatchShape			= isset( $data[self::PAGE_EYECATCH_SHAPE] ) ? $data[self::PAGE_EYECATCH_SHAPE] : '';
			$_pageEyecatchFit			= isset( $data[self::PAGE_EYECATCH_FITWIDTH] ) ? $data[self::PAGE_EYECATCH_FITWIDTH] : '';
			//v1.0.3 add end

			//v1.0.4 add
			$_postDatedispModify		= isset( $data[self::POST_DATE_DISPLAY_MODIFY] ) ? $data[self::POST_DATE_DISPLAY_MODIFY] : 0;

			//v1.0.6 add
			$_archiveFormatSm	= isset( $data[self::ARCHIVE_LIST_FORMAT_SM] ) ? $data[self::ARCHIVE_LIST_FORMAT_SM] : '';
			$_archiveColsSm		= isset( $data[self::ARCHIVE_LIST_COLS_SM] ) ? $data[self::ARCHIVE_LIST_COLS_SM] : '';
			$_archiveFormatXs	= isset( $data[self::ARCHIVE_LIST_FORMAT_XS] ) ? $data[self::ARCHIVE_LIST_FORMAT_XS] : '';
			$_archiveColsXs		= isset( $data[self::ARCHIVE_LIST_COLS_XS] ) ? $data[self::ARCHIVE_LIST_COLS_XS] : '';

			$_archiveLayout 	= !empty( $data[self::ARCHIVE_LAYOUT] ) ? $data[self::ARCHIVE_LAYOUT] : $_commonLayout;
			$_pageLayout 		= !empty( $data[self::PAGE_LAYOUT] ) ? $data[self::PAGE_LAYOUT] : $_commonLayout;
			$_postLayout 		= !empty( $data[self::POST_LAYOUT] ) ? $data[self::POST_LAYOUT] : $_commonLayout;
			//v1.0.6 addend
			
			//v1.1 add
			$_titleNum			= isset( $data[self::TITLE_STRING_NUM] ) ? $data[self::TITLE_STRING_NUM] : '';
			$_archivePagingType	= isset( $data[self::ARCHIVE_PAGING_TYPE] ) ? $data[self::ARCHIVE_PAGING_TYPE] : 0;
			//v1.1 addend
			
			//v1.1.1 add
			$_spOverflowxHidden		= isset( $data[self::SP_OVERFLOW_HIDDEN] ) ? $data[self::SP_OVERFLOW_HIDDEN] : 0;

			//v1.2 add
			$_archivethumbH		= isset( $data[self::ARCHIVE_LIST_THUMB_HEIGHT] ) ? trim( $data[self::ARCHIVE_LIST_THUMB_HEIGHT] ) : '';
			$_archivethumbH_sm	= isset( $data[self::ARCHIVE_LIST_THUMB_HEIGHT_SM] ) ? trim( $data[self::ARCHIVE_LIST_THUMB_HEIGHT_SM] ) : '';
			$_archivethumbH_xs	= isset( $data[self::ARCHIVE_LIST_THUMB_HEIGHT_XS] ) ? trim( $data[self::ARCHIVE_LIST_THUMB_HEIGHT_XS] ) : '';
			$_archiveEqh		= isset( $data[self::ARCHIVE_LIST_EQH] ) ? trim( $data[self::ARCHIVE_LIST_EQH] ) : 0;
			$_archiveBoxStyle		= isset( $data[self::ARCHIVE_LIST_BOX_STYLE] ) ? $data[self::ARCHIVE_LIST_BOX_STYLE] : '';
			$_archiveBoxStyleShape	= isset( $data[self::ARCHIVE_LIST_BOX_STYLE_SHAPE] ) ? $data[self::ARCHIVE_LIST_BOX_STYLE_SHAPE] : '';
			$_archiveBoxStyleShadow	= isset( $data[self::ARCHIVE_LIST_BOX_STYLE_SHADOW] ) ? $data[self::ARCHIVE_LIST_BOX_STYLE_SHADOW] : 0;
			
			//add v1.2.7
			$_commonTitleAlign			= isset( $data[self::COMMON_TITLE_ALIGN] ) ? $data[self::COMMON_TITLE_ALIGN] : '';
			$_postTitleAlign			= isset( $data[self::POST_TITLE_ALIGN] ) ? $data[self::POST_TITLE_ALIGN] : '';
			$_postTaglign			= isset( $data[self::POST_TAG_ALIGN] ) ? $data[self::POST_TAG_ALIGN] : '';
			$_pageTitleAlign			= isset( $data[self::PAGE_TITLE_ALIGN] ) ? $data[self::PAGE_TITLE_ALIGN] : '';
			$_archiveTitleAlign			= isset( $data[self::ARCHIVE_TITLE_ALIGN] ) ? $data[self::ARCHIVE_TITLE_ALIGN] : '';
			
			$_lazyLoad		= isset( $data[self::LAZY_LOAD] ) ? $data[self::LAZY_LOAD] : 0;
			//v1.2.7 addend

			$opt = array(
				self::HOME_LAYOUT			=> $_homeLayout,
				self::COMMON_LAYOUT			=> $_commonLayout,
				self::COMMON_PAGE_HEADER	=> $_pageHd,
				self::COMMON_PAGE_FOOTER	=> $_pageFt,
				self::COMMON_SIDEBAR_MAIN	=> $_mainSide,
				self::COMMON_SIDEBAR_SUB	=> $_subSide,
				$_typeHdKey                 => $_pageTypeHd, 
				$_typeFtKey                 => $_pageTypeFt,
				$_typemainSideKey           => $_pageTypemainSide,
				$_typesubSideKey            => $_pageTypesubSide,
				self::POST_LIST_META_ARRAY	=> array(
					self::POST_META_DATE		=> $_postMetaDateList,
					self::POST_META_AUTHOR		=> $_postMetaAuthorList,
					self::POST_META_CATEGORY	=> $_postMetaCategoryList,
					self::POST_META_COMMENT		=> $_postMetaCommentList,
					self::POST_TITLE_HIDE		=> $_postTitleHideList,
					self::POST_THUMB_HIDE		=> $_postThumbHideList,
					self::POST_EXCERPT_HIDE		=> $_postExcerptHideList,
					self::POST_READMORE_HIDE	=> $_postReadmoreHideList
				),
				self::POST_SINGLE_META_ARRAY	=> array(
					self::POST_META_DATE		=> $_postMetaDate,
					self::POST_META_AUTHOR		=> $_postMetaAuthor,
					self::POST_META_CATEGORY	=> $_postMetaCategory,
					self::POST_META_COMMENT		=> $_postMetaComment
				),
				//TODO self::HIDE_META_CATEGORY	=> $_hideCats,
				//self::COMMENT_BLOCK			=> $_commentBlock,
				self::POST_DATE_FORMAT		=> $_postDateFormat,
				self::EXCERPT_STRING_NUM	=> $_excerptNum,
				self::HOME_EXCLUDE_CATEGORY	=> $_excludeHomeCats,
				self::HOME_POST_NUM			=> $_homePostNum,
				self::ARCHIVE_POST_NUM		=> $_archivePostNum,
				self::ARCHIVE_LIST_FORMAT	=> $_archiveFormat,
				self::ARCHIVE_LIST_COLS		=> $_archiveCols,
				self::MORE_BUTTON_TEXT		=> $_moreText,
				self::NO_IMAGE_FILE			=> $_noimage,
				self::LAZY_LOAD			    => $_lazyLoad, //add v1.2.7
				self::LOGO_IMAGE			=> $_logo,
				self::FOOTER_COPYRIGHT		=> $_copyright,
				self::CUSTOM_CSS			=> $_customCss,
				self::HIDE_POSTLIST_TAGCLOUD	=> $_hideListTagcloud,
				self::HIDE_POST_TAGCLOUD	=> $_hidePostTagcloud,
				self::POST_TAGCLOUD_POSITION	=> $_tagcloudPosition,
				self::POSTLIST_TAGCLOUD_POSITION	=> $_listTagcloudPosition,
				self::HIDE_POST_PAGING		=> $_hidePostPaging,
				self::HEAD_FIXED			=> $_hdFixed,
				self::HEAD_FIXED_CLASS		=> $_hdFixedClass,
				self::HEAD_FIXED_AUTO_HEIGHT_PADDING	=> $_hdFixedAutoPd,
				self::HEAD_FIXED_BUILDER_ENABLE	=> $_hdFixedBuilderEnable,
				self::POST_EYECATCH			=> $_postEyecatch,
				self::POST_EYECATCH_ALIGN	=> $_postEyecatchAlign,
				self::POST_EYECATCH_SHAPE	=> $_postEyecatchShape,
				self::POST_EYECATCH_FITWIDTH	=> $_postEyecatchFit,
				self::PAGE_EYECATCH			=> $_pageEyecatch,
				self::PAGE_EYECATCH_ALIGN	=> $_pageEyecatchAlign,
				self::PAGE_EYECATCH_SHAPE	=> $_pageEyecatchShape,
				self::PAGE_EYECATCH_FITWIDTH	=> $_pageEyecatchFit,
				self::POST_DATE_DISPLAY_MODIFY	=> $_postDatedispModify,
				self::ARCHIVE_LIST_FORMAT_SM	=> $_archiveFormatSm,
				self::ARCHIVE_LIST_COLS_SM		=> $_archiveColsSm,
				self::ARCHIVE_LIST_FORMAT_XS	=> $_archiveFormatXs,
				self::ARCHIVE_LIST_COLS_XS		=> $_archiveColsXs,
				self::ARCHIVE_LAYOUT			=> $_archiveLayout,
				self::PAGE_LAYOUT				=> $_pageLayout,
				self::POST_LAYOUT				=> $_postLayout,
				self::TITLE_STRING_NUM		=> $_titleNum,
				self::ARCHIVE_PAGING_TYPE	=> $_archivePagingType,
				self::SP_OVERFLOW_HIDDEN	=> $_spOverflowxHidden,
				self::HEAD_FIXED_NO_SCROLL_DISPLAY	=> $_hdFixedNoScrollDisplay,
				self::ARCHIVE_LIST_THUMB_HEIGHT	=> $_archivethumbH,
				self::ARCHIVE_LIST_THUMB_HEIGHT_SM	=> $_archivethumbH_sm,
				self::ARCHIVE_LIST_THUMB_HEIGHT_XS	=> $_archivethumbH_xs,
				self::ARCHIVE_LIST_EQH		=> $_archiveEqh,
				self::ARCHIVE_LIST_BOX_STYLE		=> $_archiveBoxStyle,
				self::ARCHIVE_LIST_BOX_STYLE_SHAPE	=> $_archiveBoxStyleShape,
				self::ARCHIVE_LIST_BOX_STYLE_SHADOW	=> $_archiveBoxStyleShadow,
				self::COMMON_TITLE_ALIGN	=> $_commonTitleAlign,
				self::POST_TITLE_ALIGN		=> $_postTitleAlign,
				self::POST_TAG_ALIGN		=> $_postTaglign,
				self::PAGE_TITLE_ALIGN	    => $_pageTitleAlign,
				self::ARCHIVE_TITLE_ALIGN	=> $_archiveTitleAlign
			);

			Weluka::get_instance()->update_option( self::$theme_settings['option_name'], $opt );
		} catch (Exception $e) {
			$errmsg = sprintf( __("option registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
 	 * @since 1.0
	 * @update
	 * ver1.0.1
	 * ver1.0.2
	 * ver1.3
	 */
	public function theme_color_page() {
		if (isset($_REQUEST["weluka_theme_color_submit"]) && isset($_REQUEST["weluka_theme_color_submit_mode"]) && $_REQUEST["weluka_theme_color_submit_mode"] === "submit" ) {
		    check_admin_referer( self::THEME_COLOR_REG_NONCE );
			$errmsg = $this->update_theme_color($_REQUEST);

			if($errmsg === ""){ ?>
				<div class="updated"><p><strong><?php _e( 'Theme color update success!!', Weluka::$settings['plugin_name'] ); ?></strong></p></div>
			<?php }else{ ?>
				<div class="error"><p><strong><?php echo $errmsg; ?></strong></p></div>
			<?php  }

		} elseif( isset($_REQUEST["weluka_theme_color_save"]) && isset($_REQUEST["weluka_theme_color_submit_mode"]) && $_REQUEST["weluka_theme_color_submit_mode"] === "color_save" ) {
		    check_admin_referer( self::THEME_COLOR_REG_NONCE );
			$errmsg = $this->update_theme_color_tpl($_REQUEST);

			if($errmsg === ""){ ?>
				<div class="updated"><p><strong><?php _e( 'Color save success!!', Weluka::$settings['plugin_name'] ); ?></strong></p></div>
			<?php }else{ ?>
				<div class="error"><p><strong><?php echo $errmsg; ?></strong></p></div>
			<?php  }

		} elseif( isset($_REQUEST["weluka_theme_color_del"]) && isset($_REQUEST["weluka_theme_color_submit_mode"]) && $_REQUEST["weluka_theme_color_submit_mode"] === "color_del" ) {
		    check_admin_referer( self::THEME_COLOR_REG_NONCE );
			$errmsg = $this->delete_theme_color_tpl($_REQUEST);

			if($errmsg === ""){ ?>
				<div class="updated"><p><strong><?php _e( 'Color delete success!!', Weluka::$settings['plugin_name'] ); ?></strong></p></div>
			<?php }else{ ?>
				<div class="error"><p><strong><?php echo $errmsg; ?></strong></p></div>
			<?php  }
		}
//v1.0.2
		//$options = WelukaAdminSettings::get_site_options( self::$theme_settings['color_option_name'] );
		$options = get_option( self::$theme_settings['color_option_name'] );
//v1.0.2 end
?>
    	<div class="wrap">
    		<h2><?php _e("Weluka Color Setting", Weluka::$settings['plugin_name'] ); ?></h2>
			<form id="weluka_theme_color_form" name="weluka_theme_color_form" method="post" action="">
    			<?php wp_nonce_field( self::THEME_COLOR_REG_NONCE ); ?>
				<div class="weluka-option-wrap">
	            	<h3><?php _e('Color Type Select', Weluka::$settings['plugin_name']); ?></h3>
           			<table class="form-table">
    				<tbody>
            		<tr>
                    	<td>
                        	<div id="weluka-theme-color-type">
                        <?php
	                    	$val = !empty($options[self::COLOR_TYPE]) ? $options[self::COLOR_TYPE] : $this->default_color_type;
							if( !empty( $this->theme_colors ) ) {
								foreach( $this->theme_colors as $key => $vals ) {
									$active = '';
									if( $val === $key ) { $active = ' weluka-theme-layout-active'; }
									echo '<div class="weluka-theme-color-type-img">';
									echo '<img data-parent="weluka-theme-color-type" data-key="' . $key . '" data-target="' . self::COLOR_TYPE . '" src="' . $vals['img'] . '" class="weluka-theme-color' . $active . '" style="margin-right:10px;" />';
									echo '<label>' . $vals['lbl'] . '</label>';
									echo '</div>';
								}
							}
						?>
                        		<input type="hidden" id="<?php echo self::COLOR_TYPE; ?>" name="<?php echo self::COLOR_TYPE; ?>" value="<?php echo $val; ?>" />
                            </div>
                            <div style="margin-top:10px;"><input type="submit" id="weluka_theme_color_preview" name="weluka_theme_color_preview" value="<?php _e( 'Preview', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" /></div>
                    	</td>
	            	</tr>
                    </tbody>
                    </table>
                </div>

				<?php
				$colorTplName = "";
				if(isset($_REQUEST["weluka_theme_color_submit_mode"]) && $_REQUEST["weluka_theme_color_submit_mode"] === "color_change") {
					$colorTplName = $_REQUEST['color_name'];
					$colorData = $this->get_theme_color_tpl($colorTplName);
				}else{
					//v1.3 modify
					//$colorData = $options[self::COLOR_ARRAY];
					$colorData = !empty( $options[self::COLOR_ARRAY] ) ? $options[self::COLOR_ARRAY] : '';
				}
				?>
				<div class="weluka-option-wrap">
	            	<h3><?php _e('Color Setting', Weluka::$settings['plugin_name']); ?></h3>
           			<table class="form-table">
    				<tbody>
            		<tr>
                		<th><?php _e('Site name : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['sitename_color']) ? $colorData['sitename_color'] : ''; ?>
                        	<input type="text" id="sitename_color" name="sitename_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Body Background : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['body_bg_color']) ? $colorData['body_bg_color'] : ''; ?>
                        	<input type="text" id="body_bg_color" name="body_bg_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Body Text : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['body_text_color']) ? $colorData['body_text_color'] : ''; ?>
                        	<input type="text" id="body_text_color" name="body_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Heading Text &amp; Accent : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['heading_text_color']) ? $colorData['heading_text_color'] : ''; ?>
                        	<input type="text" id="heading_text_color" name="heading_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('A Link : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['link_color']) ? $colorData['link_color'] : ''; ?>
                        	<input type="text" id="link_color" name="link_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Hover : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['link_hover_color']) ? $colorData['link_hover_color'] : ''; ?>
                        	<input type="text" id="link_hover_color" name="link_hover_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Block Panel : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['block_bg_color']) ? $colorData['block_bg_color'] : ''; ?>
                            <label><?php _e('Background : ', Weluka::$settings['plugin_name']); ?></label>
                        	<input type="text" id="block_bg_color" name="block_bg_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Border : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['block_border_color']) ? $colorData['block_border_color'] : ''; ?>
                        	<input type="text" id="block_border_color" name="block_border_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            <div class="help-block" style="margin-top:10px;"><?php _e('Sidebar widget, background, such as page title color, it becomes the border color.', Weluka::$settings['plugin_name']); ?></div>
                    	</td>
	            	</tr>
					<tr>
                    	<td colspan="2">
                    		<div class="submit">
								<input type="submit" id="weluka_theme_color_preview3" name="weluka_theme_color_preview3" value="<?php _e( 'Preview', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    			<input type="button" id="weluka_theme_color_reset_common" name="weluka_theme_color_reset_common" value="<?php _e( 'Clear', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    		</div>
                        </td>
                    </tr>
            		<tr style="border-top:1px solid #ccc;">
                		<th><?php _e('Header Background : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['hd_bg_color']) ? $colorData['hd_bg_color'] : ''; ?>
                        	<input type="text" id="hd_bg_color" name="hd_bg_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Header Text : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['hd_text_color']) ? $colorData['hd_text_color'] : ''; ?>
                        	<input type="text" id="hd_text_color" name="hd_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Header Heading Text : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['hd_heading_text_color']) ? $colorData['hd_heading_text_color'] : ''; ?>
                        	<input type="text" id="hd_heading_text_color" name="hd_heading_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Header A Link : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['hd_link_color']) ? $colorData['hd_link_color'] : ''; ?>
                        	<input type="text" id="hd_link_color" name="hd_link_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Hover : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['hd_link_hover_color']) ? $colorData['hd_link_hover_color'] : ''; ?>
                        	<input type="text" id="hd_link_hover_color" name="hd_link_hover_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Header Bottom Border : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['hd_border_color']) ? $colorData['hd_border_color'] : ''; ?>
                        	<input type="text" id="hd_border_color" name="hd_border_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Main menu : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['mainnav_color']) ? $colorData['mainnav_color'] : ''; ?>
        	                <label><?php _e('Base : ', Weluka::$settings['plugin_name']); ?></label>
    	                    <input type="text" id="mainnav_color" name="mainnav_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
        	                &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Border : ', Weluka::$settings['plugin_name']); ?></label>
	        	            <?php $val = !empty($colorData['mainnav_border_color']) ? $colorData['mainnav_border_color'] : ''; ?>
                	        <input type="text" id="mainnav_border_color" name="mainnav_border_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />

                     	    &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Text : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['mainnav_text_color']) ? $colorData['mainnav_text_color'] : ''; ?>
                        	<input type="text" id="mainnav_text_color" name="mainnav_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
					<?php //ver1.0.1 add ?>
            		<tr>
                		<th><?php _e('Tagcloud : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['tagcloud_color']) ? $colorData['tagcloud_color'] : ''; ?>
        	                <label><?php _e('Base : ', Weluka::$settings['plugin_name']); ?></label>
    	                    <input type="text" id="tagcloud_color" name="tagcloud_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
        	                &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Hover Background : ', Weluka::$settings['plugin_name']); ?></label>
	        	            <?php $val = !empty($colorData['tagcloud_hoverbg_color']) ? $colorData['tagcloud_hoverbg_color'] : ''; ?>
                	        <input type="text" id="tagcloud_hoverbg_color" name="tagcloud_hoverbg_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />

                     	    &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Text : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['tagcloud_text_color']) ? $colorData['tagcloud_text_color'] : ''; ?>
                        	<input type="text" id="tagcloud_text_color" name="tagcloud_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
					<?php //ver1.0.1 addend ?>
					<tr>
                    	<td colspan="2">
                    		<div class="submit">
								<input type="submit" id="weluka_theme_color_preview4" name="weluka_theme_color_preview4" value="<?php _e( 'Preview', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    			<input type="button" id="weluka_theme_color_reset_hd" name="weluka_theme_color_reset_hd" value="<?php _e( 'Clear', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    		</div>
                        </td>
                    </tr>

            		<tr style="border-top:1px solid #ccc;">
                		<th><?php _e('Footer Background : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['ft_bg_color']) ? $colorData['ft_bg_color'] : ''; ?>
                        	<input type="text" id="ft_bg_color" name="ft_bg_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Footer Text : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['ft_text_color']) ? $colorData['ft_text_color'] : ''; ?>
                        	<input type="text" id="ft_text_color" name="ft_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Footer Heading Text : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['ft_heading_text_color']) ? $colorData['ft_heading_text_color'] : ''; ?>
                        	<input type="text" id="ft_heading_text_color" name="ft_heading_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Footer A Link : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['ft_link_color']) ? $colorData['ft_link_color'] : ''; ?>
                        	<input type="text" id="ft_link_color" name="ft_link_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Hover : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['ft_link_hover_color']) ? $colorData['ft_link_hover_color'] : ''; ?>
                        	<input type="text" id="ft_link_hover_color" name="ft_link_hover_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Footer Top Border : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
	                    	<?php $val = !empty($colorData['ft_border_color']) ? $colorData['ft_border_color'] : ''; ?>
                        	<input type="text" id="ft_border_color" name="ft_border_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                    	</td>
	            	</tr>
					<tr>
                    	<td colspan="2">
                    		<div class="submit">
								<input type="submit" id="weluka_theme_color_preview5" name="weluka_theme_color_preview5" value="<?php _e( 'Preview', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    			<input type="button" id="weluka_theme_color_reset_ft" name="weluka_theme_color_reset_ft" value="<?php _e( 'Clear', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    		</div>
                        </td>
                    </tr>

            		<tr style="border-top:1px solid #ccc;">
                		<th><?php _e('Primary : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['primary_color']) ? $colorData['primary_color'] : ''; ?>
        	                <label><?php _e('Base : ', Weluka::$settings['plugin_name']); ?></label>
    	                    <input type="text" id="primary_color" name="primary_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
        	                &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Border : ', Weluka::$settings['plugin_name']); ?></label>
	        	            <?php $val = !empty($colorData['primary_border_color']) ? $colorData['primary_border_color'] : ''; ?>
                	        <input type="text" id="primary_border_color" name="primary_border_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />

                     	    &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Text : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['primary_text_color']) ? $colorData['primary_text_color'] : ''; ?>
                        	<input type="text" id="primary_text_color" name="primary_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            <div class="help-block" style="margin-top:10px;margin-bottom:2px;"><?php _e('Primary button, the background color of the panel or the like, border color, text color.', Weluka::$settings['plugin_name']); ?></div>
                            <div class="help-block"><?php _e('Please enter the text color and text color button panel.', Weluka::$settings['plugin_name']); ?></div>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Success : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['success_color']) ? $colorData['success_color'] : ''; ?>
        	                <label><?php _e('Base : ', Weluka::$settings['plugin_name']); ?></label>
    	                    <input type="text" id="success_color" name="success_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
        	                &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Border : ', Weluka::$settings['plugin_name']); ?></label>
	        	            <?php $val = !empty($colorData['success_border_color']) ? $colorData['success_border_color'] : ''; ?>
                	        <input type="text" id="success_border_color" name="success_border_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />

                     	    &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Text : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['success_text_color']) ? $colorData['success_text_color'] : ''; ?>
                        	<input type="text" id="success_text_color" name="success_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            <div class="help-block" style="margin-top:10px;margin-bottom:2px;"><?php _e('Success button, the background color of the panel or the like, border color, text color.', Weluka::$settings['plugin_name']); ?></div>
                            <div class="help-block"><?php _e('Please enter the text color and text color button panel.', Weluka::$settings['plugin_name']); ?></div>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Info : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['info_color']) ? $colorData['info_color'] : ''; ?>
        	                <label><?php _e('Base : ', Weluka::$settings['plugin_name']); ?></label>
    	                    <input type="text" id="info_color" name="info_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
        	                &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Border : ', Weluka::$settings['plugin_name']); ?></label>
	        	            <?php $val = !empty($colorData['info_border_color']) ? $colorData['info_border_color'] : ''; ?>
                	        <input type="text" id="info_border_color" name="info_border_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />

                     	    &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Text : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['info_text_color']) ? $colorData['info_text_color'] : ''; ?>
                        	<input type="text" id="info_text_color" name="info_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            <div class="help-block" style="margin-top:10px;margin-bottom:2px;"><?php _e('Info button, the background color of the panel or the like, border color, text color.', Weluka::$settings['plugin_name']); ?></div>
                            <div class="help-block"><?php _e('Please enter the text color and text color button panel.', Weluka::$settings['plugin_name']); ?></div>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Warning : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['warning_color']) ? $colorData['warning_color'] : ''; ?>
        	                <label><?php _e('Base : ', Weluka::$settings['plugin_name']); ?></label>
    	                    <input type="text" id="warning_color" name="warning_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
        	                &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Border : ', Weluka::$settings['plugin_name']); ?></label>
	        	            <?php $val = !empty($colorData['warning_border_color']) ? $colorData['warning_border_color'] : ''; ?>
                	        <input type="text" id="warning_border_color" name="warning_border_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />

                     	    &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Text : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['warning_text_color']) ? $colorData['warning_text_color'] : ''; ?>
                        	<input type="text" id="warning_text_color" name="warning_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            <div class="help-block" style="margin-top:10px;margin-bottom:2px;"><?php _e('Warning button, the background color of the panel or the like, border color, text color.', Weluka::$settings['plugin_name']); ?></div>
                            <div class="help-block"><?php _e('Please enter the text color and text color button panel.', Weluka::$settings['plugin_name']); ?></div>
                    	</td>
	            	</tr>
            		<tr>
                		<th><?php _e('Danger : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['danger_color']) ? $colorData['danger_color'] : ''; ?>
        	                <label><?php _e('Base : ', Weluka::$settings['plugin_name']); ?></label>
    	                    <input type="text" id="danger_color" name="danger_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            
        	                &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Border : ', Weluka::$settings['plugin_name']); ?></label>
	        	            <?php $val = !empty($colorData['danger_border_color']) ? $colorData['danger_border_color'] : ''; ?>
                	        <input type="text" id="danger_border_color" name="danger_border_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />

                     	    &nbsp;&nbsp;&nbsp;&nbsp;<label><?php _e('Text : ', Weluka::$settings['plugin_name']); ?></label>
	                    	<?php $val = !empty($colorData['danger_text_color']) ? $colorData['danger_text_color'] : ''; ?>
                        	<input type="text" id="danger_text_color" name="danger_text_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                            <div class="help-block" style="margin-top:10px;margin-bottom:2px;"><?php _e('Danger button, the background color of the panel or the like, border color, text color.', Weluka::$settings['plugin_name']); ?></div>
                            <div class="help-block"><?php _e('Please enter the text color and text color button panel.', Weluka::$settings['plugin_name']); ?></div>
                    	</td>
	            	</tr>
					<tr>
                    	<td colspan="2">
                    		<div class="submit">
								<input type="submit" id="weluka_theme_color_preview6" name="weluka_theme_color_preview6" value="<?php _e( 'Preview', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    			<input type="button" id="weluka_theme_color_reset_pl" name="weluka_theme_color_reset_pl" value="<?php _e( 'Clear', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    		</div>
                        </td>
                    </tr>
                    
                    <?php //v1.2 ?>
            		<tr style="border-top:1px solid #ccc;">
                		<th><?php _e('Archive List Block', Weluka::$settings['plugin_name']); ?></th>
                    </tr>
                    <tr>
                		<th><?php _e('Block Bg Color : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['list_block_bgcolor']) ? $colorData['list_block_bgcolor'] : ''; ?>
    	                    <input type="text" id="list_block_bgcolor" name="list_block_bgcolor" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />                            
                    	</td>
	            	</tr>
                    <tr>
                		<th><?php _e('Title Color : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['list_title_color']) ? $colorData['list_title_color'] : ''; ?>
    	                    <input type="text" id="list_title_color" name="list_title_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />                            
                    	</td>
	            	</tr>
                    <tr>
                		<th><?php _e('Date Color : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['list_date_color']) ? $colorData['list_date_color'] : ''; ?>
    	                    <input type="text" id="list_date_color" name="list_date_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />                            
                    	</td>
	            	</tr>
                    <tr>
                		<th><?php _e('Category Color : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['list_cat_color']) ? $colorData['list_cat_color'] : ''; ?>
    	                    <input type="text" id="list_cat_color" name="list_cat_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />                            
                    	</td>
	            	</tr>
                    <tr>
                		<th><?php _e('Author Color : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['list_author_color']) ? $colorData['list_author_color'] : ''; ?>
    	                    <input type="text" id="list_author_color" name="list_author_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />                            
                    	</td>
	            	</tr>
                    <tr>
                		<th><?php _e('Excerpt Color : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['list_excerpt_color']) ? $colorData['list_excerpt_color'] : ''; ?>
    	                    <input type="text" id="list_excerpt_color" name="list_excerpt_color" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />                            
                    	</td>
	            	</tr>
                    <tr>
                		<th><?php _e('More Button Color : ', Weluka::$settings['plugin_name']); ?></th>
                    	<td>
		                    <?php $val = !empty($colorData['list_morebtn_color']) ? $colorData['list_morebtn_color'] : ''; ?>
                    		<?php WelukaBuilder::get_instance()->weluka_display_buttoncolor_settings('list_morebtn_color', '', false, true, true, $val); ?>
                    	</td>
	            	</tr>
					<tr>
                    	<td colspan="2">
                    		<div class="submit">
								<input type="submit" id="weluka_theme_color_preview7" name="weluka_theme_color_preview7" value="<?php _e( 'Preview', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    			<input type="button" id="weluka_theme_color_reset_lb" name="weluka_theme_color_reset_lb" value="<?php _e( 'Clear', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    		</div>
                        </td>
                    </tr>
                    <?php //v1.2 addend  ?>
                    </tbody>
                    </table>
                    <div class="submit">
						<?php /*<input type="submit" id="weluka_theme_color_preview2" name="weluka_theme_color_preview2" value="<?php _e( 'Preview', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" /> */ ?>
                    	<input type="button" id="weluka_theme_color_reset" name="weluka_theme_color_reset" value="<?php _e( 'All Clear', Weluka::$settings['plugin_name'] ) ;?>" class="button-secondary" />
                    </div>
                    <div class="submit" style="border-top:1px solid #ccc;">
                    	<div style="margin-bottom:0.8em;">
	        	            <label><?php _e('Select Color : ', Weluka::$settings['plugin_name']); ?></label><br />
                            <select id="color_name" name="color_name">
                            	<option value=""></option>
                                <?php
									//v1.0.2
                                	//$colorTpls = WelukaAdminSettings::get_site_options( self::$theme_settings['color_tpl_name'] );
                                	$colorTpls = get_option( self::$theme_settings['color_tpl_name'] );
									//v1.0.2 end
									if( !empty( $colorTpls ) ) {
										foreach( $colorTpls as $key => $val ) :
											$selected = $key == $colorTplName ? ' selected="selected"' : '';
											echo '<option value="' . esc_attr($key) . '"' . $selected . '>' . esc_attr($key) . '</option>';
										endforeach;
									}
								?>
                            </select>
                        </div>
                    	<div style="margin-bottom:0.8em;">
	        	            <label><?php _e('New Color Name : ', Weluka::$settings['plugin_name']); ?></label><br />
    		                <input type="text" id="new_color_name" name="new_color_name" value="" />
                        </div>
                    	<input type="submit" id="weluka_theme_color_save" name="weluka_theme_color_save" value="<?php _e( 'Save Color', Weluka::$settings['plugin_name'] ) ;?>" class="" />
                    	<input type="submit" id="weluka_theme_color_del" name="weluka_theme_color_del" value="<?php _e( 'Delete Color', Weluka::$settings['plugin_name'] ) ;?>" class="" />
                        <div class="help-block"><?php _e('If you want to save the set color information in a new, and enter a new color name, if you want to update selects a color name, please click the color Save button.', Weluka::$settings['plugin_name']); ?></div>
                    </div>
                    
                </div>

            	<p class="submit"><input type="submit" id="weluka_theme_color_submit" name="weluka_theme_color_submit" value="<?php _e( 'Save', Weluka::$settings['plugin_name'] ) ;?>" class="button-primary" /></p>
                <input type="hidden" id="weluka_theme_color_submit_mode" name="weluka_theme_color_submit_mode" value="" />
	        </form>
        	<div style="display:none;">
            	<script type="text/javascript">
					jQuery(document).ready(function($) {
						
						$('.colorpicker').colorpicker();
						
						/**
						 * @since 1.0
						 */
						$('.weluka-theme-color').on('click', function() {
							var elm		= $(this),
								val		= elm.data('key'),
								target	= '#' + elm.data('target'),
								pId		= '#' + elm.data('parent');
							
							$(pId + ' .weluka-theme-color').removeClass('weluka-theme-layout-active');
							elm.addClass('weluka-theme-layout-active');
							$(target).val(val);
						});

						/**
						 * @since 1.0
						 */
						$('#weluka_theme_color_preview, #weluka_theme_color_preview2, #weluka_theme_color_preview3, #weluka_theme_color_preview4, #weluka_theme_color_preview5, #weluka_theme_color_preview6, #weluka_theme_color_preview7').on('click', function() {
							$('#weluka_theme_color_submit_mode').val('preview');
							$('#weluka_theme_color_form').attr('action', "<?php echo get_bloginfo('url') . '/welukacolorpreview?mode=cp'; ?>");
							$('#weluka_theme_color_form').attr('target', "_blank");
						});

						/**
						 * @since 1.0
						 */
						$('#weluka_theme_color_submit').on('click', function() {
							$('#weluka_theme_color_submit_mode').val('submit');
							$('#weluka_theme_color_form').attr('action', "");
							$('#weluka_theme_color_form').attr('target', "");
						});

						/**
						 * @since 1.0
						 */
						$('#weluka_theme_color_save').on('click', function() {
							var _name = !$('#new_color_name').val() ? $('#color_name').val() : $('#new_color_name').val();
							if($.trim(_name) == ''){
								alert("<?php _e('Please enter a color name.', Weluka::$settings['plugin_name']); ?>");
								return false;
							}
							$('#weluka_theme_color_submit_mode').val('color_save');
							$('#weluka_theme_color_form').attr('action', "");
							$('#weluka_theme_color_form').attr('target', "");
						});

						/**
						 * @since 1.0
						 */
						$('#weluka_theme_color_del').on('click', function() {
							var _name = $('#color_name').val();
							if($.trim(_name) == ''){
								alert("<?php _e('Please select a color name.', Weluka::$settings['plugin_name']); ?>");
								return false;
							}
							if(confirm("<?php _e('Are you sure you want to delete the color?', Weluka::$settings['plugin_name']); ?>")) {
								$('#weluka_theme_color_submit_mode').val('color_del');
								$('#weluka_theme_color_form').attr('action', "");
								$('#weluka_theme_color_form').attr('target', "");
							} else {
								return false;
							}
						});
						
						/**
						 * @since 1.0
						 */
						$('#color_name').on('change', function() {
							var _name = $('#color_name').val();
							if($.trim(_name) == ''){
								return false;
							}
							$('#weluka_theme_color_submit_mode').val('color_change');
							$('#weluka_theme_color_form').attr('action', "");
							$('#weluka_theme_color_form').attr('target', "");
							$('#weluka_theme_color_form').submit();
						});
						
						/**
						 * @since 1.0
						 * @update
						 * ver1.0.1
						 * ver1.2
						 */
						$('#weluka_theme_color_reset').on('click', function() {
							$('#sitename_color').val('');
							$('#body_bg_color').val('');
							$('#body_text_color').val('');
							$('#heading_text_color').val('');
							$('#link_color').val('');
							$('#link_hover_color').val('');
							$('#block_bg_color').val('');
							$('#block_border_color').val('');
							$('#hd_bg_color').val('');
							$('#hd_text_color').val('');
							$('#hd_heading_text_color').val('');
							$('#hd_link_color').val('');
							$('#hd_link_hover_color').val('');
							$('#hd_border_color').val('');
							$('#mainnav_color').val('');
							$('#mainnav_border_color').val('');
							$('#mainnav_text_color').val('');
							$('#ft_bg_color').val('');
							$('#ft_text_color').val('');
							$('#ft_border_color').val('');
							$('#ft_heading_text_color').val('');
							$('#ft_link_color').val('');
							$('#ft_link_hover_color').val('');
							$('#primary_color').val('');
							$('#primary_border_color').val('');
							$('#primary_text_color').val('');
							$('#success_color').val('');
							$('#success_border_color').val('');
							$('#success_text_color').val('');
							$('#info_color').val('');
							$('#info_border_color').val('');
							$('#info_text_color').val('');
							$('#warning_color').val('');
							$('#warning_border_color').val('');
							$('#warning_text_color').val('');
							$('#danger_color').val('');
							$('#danger_border_color').val('');
							$('#danger_text_color').val('');
							//ver1.0.1 add
							$('#tagcloud_color').val('');
							$('#tagcloud_hoverbg_color').val('');
							$('#tagcloud_text_color').val('');
							//ver1.0.1 addend
							//v1.2 add
							$('#list_block_bgcolor').val('');
							$('#list_title_color').val('');
							$('#list_date_color').val('');
							$('#list_cat_color').val('');
							$('#list_author_color').val('');
							$('#list_excerpt_color').val('');
							$('#list_morebtn_color').val('');
							//v1.2 addend
						});
						
						/**
						 * @since 1.0
						 */
						$('#weluka_theme_color_reset_common').on('click', function() {
							$('#sitename_color').val('');
							$('#body_bg_color').val('');
							$('#body_text_color').val('');
							$('#heading_text_color').val('');
							$('#link_color').val('');
							$('#link_hover_color').val('');
							$('#block_bg_color').val('');
							$('#block_border_color').val('');
						});

						/**
						 * @since 1.0
						 * @update
						 * ver1.0.1
						 */
						$('#weluka_theme_color_reset_hd').on('click', function() {
							$('#hd_bg_color').val('');
							$('#hd_text_color').val('');
							$('#hd_heading_text_color').val('');
							$('#hd_link_color').val('');
							$('#hd_link_hover_color').val('');
							$('#hd_border_color').val('');
							$('#mainnav_color').val('');
							$('#mainnav_border_color').val('');
							$('#mainnav_text_color').val('');
							$('#tagcloud_color').val('');
							$('#tagcloud_hoverbg_color').val('');
							$('#tagcloud_text_color').val('');
						});

						/**
						 * @since 1.0
						 */
						$('#weluka_theme_color_reset_ft').on('click', function() {
							$('#ft_bg_color').val('');
							$('#ft_text_color').val('');
							$('#ft_border_color').val('');
							$('#ft_heading_text_color').val('');
							$('#ft_link_color').val('');
							$('#ft_link_hover_color').val('');
						});

						/**
						 * @since 1.0
						 */
						$('#weluka_theme_color_reset_pl').on('click', function() {
							$('#primary_color').val('');
							$('#primary_border_color').val('');
							$('#primary_text_color').val('');
							$('#success_color').val('');
							$('#success_border_color').val('');
							$('#success_text_color').val('');
							$('#info_color').val('');
							$('#info_border_color').val('');
							$('#info_text_color').val('');
							$('#warning_color').val('');
							$('#warning_border_color').val('');
							$('#warning_text_color').val('');
							$('#danger_color').val('');
							$('#danger_border_color').val('');
							$('#danger_text_color').val('');
						});

						/**
						 * @since 1.2
						 */
						$('#weluka_theme_color_reset_lb').on('click', function() {
							$('#list_block_bgcolor').val('');
							$('#list_title_color').val('');
							$('#list_date_color').val('');
							$('#list_cat_color').val('');
							$('#list_author_color').val('');
							$('#list_excerpt_color').val('');
							$('#list_morebtn_color').val('');
						});
						
					});
				</script>
			</div>
		</div>
<?php
	}

	/**
 	 * theme color option db registory
	 * @since 1.0
	 */
	public function update_theme_color( $data ){
		global $wp_version;
		$errmsg = "";
		try {
			
			$_colorType	= !empty( $data[self::COLOR_TYPE] ) ? $data[self::COLOR_TYPE] : "";

			$_colorArr	= $this->set_color_array( $data );

			$opt = array(
				self::COLOR_TYPE		=> $_colorType,
				self::COLOR_ARRAY		=> $_colorArr
			);

			Weluka::get_instance()->update_option( self::$theme_settings['color_option_name'], $opt );

		} catch (Exception $e) {
			$errmsg = sprintf( __("option registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
 	 * theme color tpl option db registory
	 * @since 1.0
	 * @update
	 * ver1.0.2
	 */
	public function update_theme_color_tpl( $data ){
		$errmsg = "";
		try {
			
			$_newName	= !empty( $data['new_color_name'] ) ? trim($data['new_color_name']) : "";
			$_upName	= !empty( $data['color_name'] ) ? trim($data['color_name']) : "";
			$_colorName	= !empty($_newName) ? $_newName : $_upName;
			
			if( $_colorName === "" ) {
				$errmsg = __('Please enter a color name.', Weluka::$settings['plugin_name']);
				return $errmsg;
			}

			$_colorArr	= $this->set_color_array( $data );
			//v1.0.2
			//$newData = WelukaAdminSettings::get_site_options( self::$theme_settings['color_tpl_name'] );
			$newData = get_option( self::$theme_settings['color_tpl_name'] );
			//v1.0.2
			if( empty( $newData ) ) { $newData = array(); }
			
			if(!empty($newData[$_colorName])) {
				//update
				$newData[$_colorName] = $_colorArr;
			} else {
				// add
				$newData += array($_colorName => $_colorArr);
			}

			Weluka::get_instance()->update_option( self::$theme_settings['color_tpl_name'], $newData );

		} catch (Exception $e) {
			$errmsg = sprintf( __("option registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
 	 * theme color tpl option delete
	 * @since 1.0
	 * @update
	 * ver1.0.2
	 */
	public function delete_theme_color_tpl($data) {
		$errmsg = "";
		try {
			$_colorName	= !empty( $data['color_name'] ) ? trim($data['color_name']) : "";

			if($_colorName !== '') {
				//v1.0.2
				//$newData = WelukaAdminSettings::get_site_options( self::$theme_settings['color_tpl_name'] );
				$newData = get_option( self::$theme_settings['color_tpl_name'] );
				//v1.0.2 end
				if(!empty($newData[$_colorName])) {
					unset($newData[$_colorName]); //colorName remove
					Weluka::get_instance()->update_option( self::$theme_settings['color_tpl_name'], $newData );
				}
			}
		} catch (Exception $e) {
			$errmsg = sprintf( __("color remove error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
	 * wp_ajax_weluka_theme_color_tpl_change hook
	 * @since 1.0
	 * @update
	 * ver1.0.2
	 */
	public function get_theme_color_tpl($keyName) {
		$ret = array();
		//v1.0.2
		//$data = WelukaAdminSettings::get_site_options( self::$theme_settings['color_tpl_name'] );
		$data = get_option( self::$theme_settings['color_tpl_name'] );
		//v1.0.2
		if(!empty($data[$keyName])) $ret = $data[$keyName];

		return $ret;
	}

	/**
	 * create color array
	 * @since 1.0 
	 * @update
	 * ver1.0.1
	 * ver1.2
	 */
	public function set_color_array( $data ) {
		$_sitenameColor		= !empty( $data['sitename_color'] ) ? trim( $data['sitename_color'] ) : "";
		$_bodyBgColor		= !empty( $data['body_bg_color'] ) ? trim( $data['body_bg_color'] ) : "";
		$_bodyTextColor		= !empty( $data['body_text_color'] ) ? trim( $data['body_text_color'] ) : "";
		$_hdTextColor		= !empty( $data['heading_text_color'] ) ? trim( $data['heading_text_color'] ) : "";
		$_linkColor			= !empty( $data['link_color'] ) ? trim( $data['link_color'] ) : "";
		$_linkHvColor		= !empty( $data['link_hover_color'] ) ? trim( $data['link_hover_color'] ) : "";
		$_blockBgColor		= !empty( $data['block_bg_color'] ) ? trim( $data['block_bg_color'] ) : "";
		$_blockBorderColor	= !empty( $data['block_border_color'] ) ? trim( $data['block_border_color'] ) : "";

		$_hdBgColor			= !empty( $data['hd_bg_color'] ) ? trim( $data['hd_bg_color'] ) : "";
		$_headerTextColor	= !empty( $data['hd_text_color'] ) ? trim( $data['hd_text_color'] ) : "";
		$_hd_hdTextColor	= !empty( $data['hd_heading_text_color'] ) ? trim( $data['hd_heading_text_color'] ) : "";
		$_hdlinkColor		= !empty( $data['hd_link_color'] ) ? trim( $data['hd_link_color'] ) : "";
		$_hdlinkHvColor		= !empty( $data['hd_link_hover_color'] ) ? trim( $data['hd_link_hover_color'] ) : "";
		$_hdBorderColor		= !empty( $data['hd_border_color'] ) ? trim( $data['hd_border_color'] ) : "";
		$_mainnavColor			= !empty( $data['mainnav_color'] ) ? trim( $data['mainnav_color'] ) : "";
		$_mainnavBorderColor	= !empty( $data['mainnav_border_color'] ) ? trim( $data['mainnav_border_color'] ) : "";
		$_mainnavTextColor		= !empty( $data['mainnav_text_color'] ) ? trim( $data['mainnav_text_color'] ) : "";
		//ver 1.0.1 add
		$_tagcloudColor		= !empty( $data['tagcloud_color'] ) ? trim( $data['tagcloud_color'] ) : "";
		$_tagcloudBgColor	= !empty( $data['tagcloud_hoverbg_color'] ) ? trim( $data['tagcloud_hoverbg_color'] ) : "";
		$_tagcloudTextColor	= !empty( $data['tagcloud_text_color'] ) ? trim( $data['tagcloud_text_color'] ) : "";
		//ver1.0.1 addend
		
		$_ftBgColor			= !empty( $data['ft_bg_color'] ) ? trim( $data['ft_bg_color'] ) : "";
		$_footerTextColor	= !empty( $data['ft_text_color'] ) ? trim( $data['ft_text_color'] ) : "";
		$_ft_hdTextColor	= !empty( $data['ft_heading_text_color'] ) ? trim( $data['ft_heading_text_color'] ) : "";
		$_ftlinkColor		= !empty( $data['ft_link_color'] ) ? trim( $data['ft_link_color'] ) : "";
		$_ftlinkHvColor		= !empty( $data['ft_link_hover_color'] ) ? trim( $data['ft_link_hover_color'] ) : "";
		$_ftBorderColor		= !empty( $data['ft_border_color'] ) ? trim( $data['ft_border_color'] ) : "";

		$_primaryColor			= !empty( $data['primary_color'] ) ? trim( $data['primary_color'] ) : "";
		$_primaryBorderColor	= !empty( $data['primary_border_color'] ) ? trim( $data['primary_border_color'] ) : "";
		$_primaryTextColor		= !empty( $data['primary_text_color'] ) ? trim( $data['primary_text_color'] ) : "";

		$_successColor			= !empty( $data['success_color'] ) ? trim( $data['success_color'] ) : "";
		$_successBorderColor	= !empty( $data['success_border_color'] ) ? trim( $data['success_border_color'] ) : "";
		$_successTextColor		= !empty( $data['success_text_color'] ) ? trim( $data['success_text_color'] ) : "";

		$_infoColor			= !empty( $data['info_color'] ) ? trim( $data['info_color'] ) : "";
		$_infoBorderColor	= !empty( $data['info_border_color'] ) ? trim( $data['info_border_color'] ) : "";
		$_infoTextColor		= !empty( $data['info_text_color'] ) ? trim( $data['info_text_color'] ) : "";

		$_warColor			= !empty( $data['warning_color'] ) ? trim( $data['warning_color'] ) : "";
		$_warBorderColor	= !empty( $data['warning_border_color'] ) ? trim( $data['warning_border_color'] ) : "";
		$_warTextColor		= !empty( $data['warning_text_color'] ) ? trim( $data['warning_text_color'] ) : "";

		$_dangerColor		= !empty( $data['danger_color'] ) ? trim( $data['danger_color'] ) : "";
		$_dangerBorderColor	= !empty( $data['danger_border_color'] ) ? trim( $data['danger_border_color'] ) : "";
		$_dangerTextColor	= !empty( $data['danger_text_color'] ) ? trim( $data['danger_text_color'] ) : "";

		//v1.2
		$_listBlockBgColor	= !empty( $data['list_block_bgcolor'] ) ? trim( $data['list_block_bgcolor'] ) : "";
		$_listTitleColor	= !empty( $data['list_title_color'] ) ? trim( $data['list_title_color'] ) : "";
		$_listDateColor		= !empty( $data['list_date_color'] ) ? trim( $data['list_date_color'] ) : "";
		$_listCatColor		= !empty( $data['list_cat_color'] ) ? trim( $data['list_cat_color'] ) : "";
		$_listAuthorColor	= !empty( $data['list_author_color'] ) ? trim( $data['list_author_color'] ) : "";
		$_listExcerptColor	= !empty( $data['list_excerpt_color'] ) ? trim( $data['list_excerpt_color'] ) : "";
		$_listMorebtnColor	= !empty( $data['list_morebtn_color'] ) ? trim( $data['list_morebtn_color'] ) : "";
		//v1.2 addend

		$ret = array (
					'sitename_color'		=> $_sitenameColor,
					'body_bg_color'			=> $_bodyBgColor,
					'body_text_color'		=> $_bodyTextColor,
					'heading_text_color'	=> $_hdTextColor,
					'link_color'			=> $_linkColor,
					'link_hover_color'		=> $_linkHvColor,
					'block_bg_color'		=> $_blockBgColor,
					'block_border_color'	=> $_blockBorderColor,
					'hd_bg_color'			=> $_hdBgColor,
					'hd_text_color'			=> $_headerTextColor,
					'hd_heading_text_color'	=> $_hd_hdTextColor,
					'hd_link_color'			=> $_hdlinkColor,
					'hd_link_hover_color'	=> $_hdlinkHvColor,
					'hd_border_color'		=> $_hdBorderColor,
					'mainnav_color'			=> $_mainnavColor,
					'mainnav_border_color'	=> $_mainnavBorderColor,
					'mainnav_text_color'	=> $_mainnavTextColor,
					'ft_bg_color'			=> $_ftBgColor,
					'ft_text_color'			=> $_footerTextColor,
					'ft_heading_text_color'	=> $_ft_hdTextColor,
					'ft_link_color'			=> $_ftlinkColor,
					'ft_link_hover_color'	=> $_ftlinkHvColor,
					'ft_border_color'		=> $_ftBorderColor,
					'primary_color'			=> $_primaryColor,
					'primary_border_color'	=> $_primaryBorderColor,
					'primary_text_color'	=> $_primaryTextColor,
					'success_color'			=> $_successColor,
					'success_border_color'	=> $_successBorderColor,
					'success_text_color'	=> $_successTextColor,
					'info_color'			=> $_infoColor,
					'info_border_color'		=> $_infoBorderColor,
					'info_text_color'		=> $_infoTextColor,
					'warning_color'			=> $_warColor,
					'warning_border_color'	=> $_warBorderColor,
					'warning_text_color'	=> $_warTextColor,
					'danger_color'			=> $_dangerColor,
					'danger_border_color'	=> $_dangerBorderColor,
					'danger_text_color'		=> $_dangerTextColor,
					'tagcloud_color'		=> $_tagcloudColor,
					'tagcloud_hoverbg_color'	=> $_tagcloudBgColor,
					'tagcloud_text_color'	=> $_tagcloudTextColor,
					'list_block_bgcolor'	=> $_listBlockBgColor,
					'list_title_color'		=> $_listTitleColor,
					'list_date_color'		=> $_listDateColor,
					'list_cat_color'		=> $_listCatColor,
					'list_author_color'		=> $_listAuthorColor,
					'list_excerpt_color'	=> $_listExcerptColor,
					'list_morebtn_color'	=> $_listMorebtnColor
		);
		return $ret;
	}

	/**
	 * custom post type setting
	 * @since 1.0
	 */
	public function custom_posttype_register() {
	
  		//custom header
		$labels = array(
			'name' 				=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Headers', Weluka::$settings['plugin_name'] ),
			'singular_name' 	=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Header', Weluka::$settings['plugin_name']),
			//'add_new' 			=> __('Add', Weluka::$settings['plugin_name']),
			'add_new_item' 		=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Header Add', Weluka::$settings['plugin_name']),
			'edit_item' 		=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Header Edit', Weluka::$settings['plugin_name']),
			//'new_item' 			=> __('Edit', Weluka::$settings['plugin_name']),
			'all_items' 		=> __('Header List', Weluka::$settings['plugin_name']),
			//'view_item' 		=> __('Preview', Weluka::$settings['plugin_name']),
			//'search_items' 		=> __('Search', Weluka::$settings['plugin_name']),
			//'not_found' 		=>  __('Not found', Weluka::$settings['plugin_name']),
			//'parent_item_colon' => ''
		);
 
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'exclude_from_search'	=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'show_in_nav_menus'		=> false,
			//'menu_position'			=> 5,	//comment menu after
			'capability_type'		=> 'post',
			'hierarchical'			=> false,
			'supports'				=> array( 'title', 'editor', 'author', 'revisions', 'custom-fields' ),
			'has_archive'			=> false,
			'rewrite'				=> array( 'slug' => Weluka::$settings['cpt_hd'], 'with_front' => false, 'feeds' => false ),
			'query_var'				=> true,
		); 
		register_post_type( Weluka::$settings['cpt_hd'] , $args );

  		//custom footer
		$labels = array(
			'name' 				=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Footers', Weluka::$settings['plugin_name'] ),
			'singular_name' 	=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Footer', Weluka::$settings['plugin_name']),
			'add_new_item' 		=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Footer Add', Weluka::$settings['plugin_name']),
			'edit_item' 		=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Footer Edit', Weluka::$settings['plugin_name']),
			'all_items' 		=> __('Footer List', Weluka::$settings['plugin_name']),
		);
 
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'exclude_from_search'	=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'show_in_nav_menus'		=> false,
			'capability_type'		=> 'post',
			'hierarchical'			=> false,
			'supports'				=> array( 'title', 'editor', 'author', 'revisions', 'custom-fields' ),
			'has_archive'			=> false,
			'rewrite'				=> array( 'slug' => Weluka::$settings['cpt_ft'], 'with_front' => false, 'feeds' => false ),
			'query_var'				=> true,
		); 
		register_post_type( Weluka::$settings['cpt_ft'] , $args );

  		//custom sidebar
		$labels = array(
			'name' 				=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Sidebars', Weluka::$settings['plugin_name'] ),
			'singular_name' 	=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Sidebar', Weluka::$settings['plugin_name']),
			'add_new_item' 		=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Sidebar Add', Weluka::$settings['plugin_name']),
			'edit_item' 		=> ucfirst( Weluka::$settings['plugin_name'] ) . ' ' . __('Custom Sidebar Edit', Weluka::$settings['plugin_name']),
			'all_items' 		=> __('Sidebar List', Weluka::$settings['plugin_name']),
		);
 
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'exclude_from_search'	=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'show_in_nav_menus'		=> false,
			'capability_type'		=> 'post',
			'hierarchical'			=> false,
			'supports'				=> array( 'title', 'editor', 'author', 'revisions', 'custom-fields' ),
			'has_archive'			=> false,
			'rewrite'				=> array( 'slug' => Weluka::$settings['cpt_sd'], 'with_front' => false, 'feeds' => false ),
			'query_var'				=> true,
		); 
		register_post_type( Weluka::$settings['cpt_sd'] , $args );
	}
	
	/**
	 * @since 1.0
	 */
	public function get_custom_posts( $cptName, $postIds = '' ) {
		$incs = $postIds !== '' ? '&include=' . $postIds : '';
		return get_posts('post_type=' . $cptName . $incs . '&numberposts=-1&post_status=publish' );
	}
}
