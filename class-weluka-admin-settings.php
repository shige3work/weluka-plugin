<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Weluka Pulugin Admin Setting class
 * @since 1.0
 */
#[\AllowDynamicProperties]
class WelukaAdminSettings {

	/**
	 * option setting page wp nonce filed name
	 * @since 1.0
	 */
	const OPTION_SETTING_REG_NONCE	= "weluka_option_setting_reg_nonce";
	const LICENSE_REG_NONCE			= "weluka_license_reg_nonce";
	const SEO_SETTING_REG_NONCE		= "weluka_seo_setting_reg_nonce";

	/**
	 * option setting field and db key name
	 * Lisence key
	 * @since 1.0
	 */
	const BUILDER_LICKEY_FIELD_NAME = 'builder_lickey';
	/**
	 * option setting field and db key name
	 * ビルダー対象post_type
	 * @since 1.0
	 */
	const BUILDER_ON_FIELD_NAME = 'weluka_editor_on';
	/**
	 * option setting field and db key name
	 * ビルダー無効ユーザーグループ
	 * @since 1.0
	 */
	const BUILDER_OFF_ROLES_FIELD_NAME = 'weluka_editor_off_roles';
	public static $roleNameStrings;

	/**
	 * option setting field and db key name
	 * 使用google web fonts
	 * @since 1.0
	 */
	const USE_WEB_FONTS = 'weluka_use_web_fonts';

	/**
	 * option setting field and common container wrapper type name
	 * @since 1.0
	 */
	const CONTAINER_TYPE = 'container_type';

	/**
	 * option setting field favicon key name
	 * @since 1.0
	 */
	const FAVICON_URL 	= 'weluka_favicon';

	/**
	 * option setting field touch icon key name
	 * @since 1.0
	 */
	const TOUCHICON_URL 	= 'weluka_touchicon';

	/**
	 * option setting field and embed code type name
	 * @since 1.0
	 */
	const COMMON_EMBED_CODE = 'weluka_embed_code';

	/**
	 * option setting field and head embed code type name
	 * @since 1.2.4.3
	 */
	const COMMON_HEAD_EMBED_CODE = 'weluka_hdembed_code';

	/**
	 * not use meta tag setting field array key name
	 * @since 1.0
	 */
	const META_ARRAY_FIELD	= 'disable_metas';

	/**
	 * not use meta tag setting wp generetor key name
	 * @since 1.0
	 */
	const META_WP_GENERATOR	= 'wp_generator';

	/**
	 * not use meta tag setting EditURI key name
	 * @since 1.0
	 */
	const META_RSD_LINK	= 'rsd_link';

	/**
	 * not use meta tag setting wlwmanifest key name
	 * @since 1.0
	 */
	const META_WLWMANIFEST_LINK	= 'wlwmanifest_link';

	/**
	 * not use meta tag setting rss feed key name
	 * @since 1.0
	 */
	const META_RSS_FEED	= 'feed_links';

	/**
	 * seo setting field seo use name
	 * @since 1.0
	 */
	const SEO_ARRAY_FIELD	= 'seos';

	/**
	 * seo setting field seo use name
	 * @since 1.0
	 */
	const SEO_USE			= 'seo_use';

	/**
	 * seo setting field home title name
	 * @since 1.0
	 */
	const SEO_HOME_TITLE	= 'home_title';

	/**
	 * seo setting field home keywords name
	 * @since 1.0
	 */
	const SEO_HOME_KEYWORDS	= 'home_keywords';

	/**
	 * seo setting field relative path on name
	 * @since 1.0
	 */
	const SEO_RELATIVE_PATH	= 'relative_path';

	/**
	 * seo setting field home description name
	 * @since 1.0
	 */
	const SEO_HOME_DESCRIPTION	= 'home_description';
	
	
	/**
	 * Speed up the site setting field array key name
	 * @since 1.2.7
	 */
	const SPEEDUP_ARRAY_FIELD	= 'speed';
	
	/**
	 * seo setting gzip name
	 * @since 1.2.7
	 */
	const SPEEDUP_GZIP	= 'gzip';
	
	/**
	 * seo setting brower cache name
	 * @since 1.2.7
	 */
	
	const SPEEDUP_CACHE = 'cache';
	
	/**
	 * seo setting limit of brower cache name
	 * @since 1.2.7
	 */

	const SPEEDUP_CACHE_LIMIT = 'cachelimit';

	/**
	 * seo setting limit of brower cache init value
	 * @since 1.2.7
	 */

	const SPEEDUP_CACHE_INIT = '7';


	/**
	 * applist custom design save db option name
	 * @since 1.0
	 */
	const APPLIST_CUSTOM_DESIGN_OPTION_NAME	= 'weluka_list_custom_designs';

	/**
	 * applist listdata save db option name
	 * @since 1.0
	 */
	const APPLIST_REGLIST_OPTION_NAME	= 'weluka_list_reglists';

	/**
	 * wpmenu custom design save db option name
	 * @since 1.0
	 */
	const WPMENU_CUSTOM_DESIGN_OPTION_NAME	= 'weluka_wpmenu_custom_designs';

	/**
	 * wpposts custom design save db option name
	 * @since 1.0
	 */
	const WPPOSTS_CUSTOM_DESIGN_OPTION_NAME	= 'weluka_wpposts_custom_designs';

	/**
	 * full container width left and right padding db option name
	 * @since 1.0.4
	 */
	const FULLWIDTH_PADDING_LR	= 'weluka_fullwidth_padding_lr';

	/**
	 * IE Compatibility View db option name
	 * @since 1.0.4
	 */
	const IE_COMPATIBILITY	= 'weluka_ie_compatibility';

	/**
	 * plugin stop builder data restoration flg db option name
	 * @since 1.0.4
	 */
	const PLUGIN_STOP_DATA_RESTORE	= 'weluka_data_restore';

	/**
	 * copy template save db option name
	 * @since 1.0.7
	 */
	const COPYTPL_OPTION_NAME	= 'weluka_copy_tpls';

	/**
	 * Google Map JavaScript APIKEY db option name
	 * @since 1.0.7.1
	 */
	const GMAP_JS_APIKEY_OPTION_NAME	= 'weluka_gmap_js_apikey';

	/**
	 * Page TOp Link db option name
	 * @since 1.0.7.1
	 */
	const PAGETOP_LINK_OPTION_NAME	= 'weluka_pagetop_link';	//array
	const PAGETOP_LINK_DISP			= 'weluka_pagetop_display';	//表示フラグ
	const PAGETOP_LINK_NODISP_SP	= 'weluka_pagetop_nodisplay_sp';	//スマホ時 非表示
	const PAGETOP_LINK_POS			= 'weluka_pagetop_pos';	//表示位置
	const PAGETOP_LINK_POS_SP		= 'weluka_pagetop_pos_sp';	//表示位置
	const PAGETOP_LINK_BGCOLOR		= 'weluka_pagetop_bgcolor';	//背景色
	const PAGETOP_LINK_COLOR		= 'weluka_pagetop_color';	//アイコン（テキスト）色
	
	/**
	 * SNS OGP Setting
	 * @since 1.2.4.5
	 */
	const OGP_OPTION_NAME	= 'weluka_ogp';	
	const F_APP_ID			= 'f_app_id';
	const F_TOKEN		    = 'f_token';
	const TWITTER_ID		= 'twitter_id';
	const CARD_TYPES		= 'card_types';
	const COMMON_CARD_VIDEO = 'common_card_video';
	const CARD_VIDEO_WIDTH  = 'card_video_width';
	const CARD_VIDEO_HEIGHT = 'card_video_height';
	public static $cardSelecter;

	/**
	 * class init
	 * @since 1.0
	 */	
	public static function init() {
		//roles name array
		self::$roleNameStrings = array(
			'Super Admin'	=> __('Super Admin', Weluka::$settings['plugin_name']),
			'Administrator'	=> __('Administrator', Weluka::$settings['plugin_name']),
			'Editor'		=> __('Editor', Weluka::$settings['plugin_name']),
			'Author'		=> __('Author', Weluka::$settings['plugin_name']),
			'Contributor'	=> __('Contributor', Weluka::$settings['plugin_name']),
			'Subscriber'	=> __('Subscriber', Weluka::$settings['plugin_name']),
		);
		
		//管理画面の場合かつ設定管理権限有の場合はメニューを表示
		if ( is_admin() && current_user_can( 'manage_options' ) ) {
			add_action( 'admin_menu', array( __CLASS__, 'add_admin_menu' ) );
		}
	}

	/**
	 * admin_menu hook 
	 * @since 1.0
	 */
	public static function add_admin_menu() {
		//管理画面メニュー末尾に追加
		//TODO icon setting param6
		add_menu_page( Weluka::$settings['plugin_name'], ucfirst(Weluka::$settings['plugin_name']), 'manage_options', Weluka::$settings['setting_option_name'], array( __CLASS__, 'settings_page' ) );
		
        add_submenu_page(
			Weluka::$settings['setting_option_name'],
			__('Seo Setting', Weluka::$settings['plugin_name']),
			__('Seo Setting', Weluka::$settings['plugin_name']),
			'manage_options',
			Weluka::$settings['seo_option_name'],
			array( __CLASS__, 'seo_settings_page' )
		);
	}

	/**
	 * add_options_page hook
	 * display admin setting page
	 * @since 1.0
	 * @update
	 * 1.0.4
	 * 1.2.4.3
	 * 1.2.4.4
	 * 1.2.4.5
	 */
	public static function settings_page() {
        global $wp_roles;
		self::$cardSelecter = array('summary'=>__("Summary (Common card with Image)",Weluka::$settings['plugin_name']),
									'summary_large_image'=>__("Summary with Large Image (Card with large image)",Weluka::$settings['plugin_name']),
									'player'=>__("Player (Card with video)",Weluka::$settings['plugin_name'])
								   );
		
		//登録アクションで呼ばれた場合
		if (isset($_REQUEST["weluka_option_setting_submit"])) {
	    	check_admin_referer(self::OPTION_SETTING_REG_NONCE); //セキュリティチェック このページから呼ばれた場合のみ次処理へ
	    	//登録処理
			$errmsg = self::update_option_setting($_REQUEST);

			//v1.2.4.4 class="updated fade" fade remove
			if($errmsg === ""){ ?>
				<div class="updated"><p><strong><?php _e('option update success!!', Weluka::$settings['plugin_name']); ?></strong></p></div>
			<?php }else{ ?>
				<div class="error"><p><strong><?php echo $errmsg; ?></strong></p></div>
			<?php  }
		}
	
		//設定内容取得
		$options = self::get_options();
?>
    	<div class="wrap">
    	<?php //screen_icon('options-general'); ?>
    	<h2><?php _e("Weluka Option Setting", Weluka::$settings['plugin_name'] ); ?></h2>
		<form id="weluka_option_setting_reg" name="weluka_option_setting_reg" method="post" action="">
    		<?php wp_nonce_field(self::OPTION_SETTING_REG_NONCE); // nonceはセキュリティの処理 ?>
			<table class="form-table">
    		<tbody>
            	<?php //ビルダー有効投稿タイプ ?>
        		<tr>
            		<th><?php _e('Builder enable post types : ', Weluka::$settings['plugin_name']); ?></th>
            		<td>
    				<?php
                        $postTypes = get_post_types( array( 'public' => true ) );
    					$excludePostTypes = array( 'attachment' => 'attachment', Weluka::$settings['cpt_hd'] => Weluka::$settings['cpt_hd'], Weluka::$settings['cpt_ft'] => Weluka::$settings['cpt_ft'], Weluka::$settings['cpt_sd'] => Weluka::$settings['cpt_sd'] );
    					$postTypes = array_diff_assoc($postTypes, $excludePostTypes); //keyと値両方を比較し差分を取得
						$checkedPostTypes = self::array_enable_post_types(isset($options[self::BUILDER_ON_FIELD_NAME]) ? $options[self::BUILDER_ON_FIELD_NAME] : "");
						foreach ($postTypes as $key => $val) {
        					if (post_type_supports($key, 'editor')) { //posttypeがeditorサポートしているか
            					$checked = '';
            					if (in_array($key, $checkedPostTypes)) {
                					$checked = 'checked="checked"';
            					}
            					echo '<label><input type="checkbox" name="' . self::BUILDER_ON_FIELD_NAME . '[]" value="'. $key . '" ' . $checked. ' /> ' . __( ucfirst($val) ) . '</label><br />';
        					}
    					}
    					echo '<br/>';
    					echo '<p class="description">' . __("Please check the post type you want to use the page builder.", Weluka::$settings['plugin_name'] ) . '</p>';
					?>
            		</td>
        		</tr>
                <?php //ページビルダーを無効にしたいユーザー権限 ?>
                <tr>
                	<th><?php _e('Disable page builder for user groups : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    <?php
    					if( !isset($wp_roles) ) {
        					$wp_roles = new WP_Roles();
    					}
    					$disabledRoles = self::array_disable_roles(isset($options[self::BUILDER_OFF_ROLES_FIELD_NAME]) ? $options[self::BUILDER_OFF_ROLES_FIELD_NAME] : "");
    					$roles = $wp_roles->get_names();
    					unset($roles['administrator']); //管理者は除外

    					foreach ($roles as $role => $roleName ){
        					$checked = '';
        					if (in_array($role, $disabledRoles)){
            					$checked = 'checked="checked"';
        					}
							//TODO role name 日本語化
            				echo '<label><input type="checkbox" name="' . self::BUILDER_OFF_ROLES_FIELD_NAME . '[]" value="'. $role . '" ' . $checked. ' /> ' . self::get_role_name($roleName) . '</label><br />';
    					}
    					echo '<br/>';
						echo '<p class="description">' . __("Please check the user group that you want to disable the page builder.", Weluka::$settings['plugin_name'] ) . '</p>';
					?>
                    </td>
                </tr>
                <?php //web fonts ?>
                <tr>
                	<th><?php _e('Web Fonts : ', Weluka::$settings['plugin_name']); ?></th>
                	<td>
                    	<?php //list
                       		//$jsonData = file_get_contents(Weluka::$settings['plugin_url'] . 'includes/webfonts.json' );
                       		$jsonData = file_get_contents( Weluka::$settings['plugin_dir'] . 'includes/webfonts.json' );
        					if($jsonData) {
            					$fontArr = json_decode($jsonData, true);
            					if(isset($fontArr['category']) && is_array($fontArr['category']) && count($fontArr['category']) > 0) {
									echo '<div id="weluka-option-font-category">';
                					foreach($fontArr['category'] as $fontCat) :
										$_key = "welukaOptionWebFontsCategory_" . $fontCat['keyName'];
										echo '<input type="checkbox" id="' . $_key . '" name="' . $_key . '" class="welukaOptionWebFontsCategory" data-key="' . $fontCat['keyName'] . '" value="1" checked="checked" />';
										echo '<label for="' . $_key . '">' . $fontCat['displayName'] . '</label>&nbsp;&nbsp;&nbsp;&nbsp;';
                					endforeach;
									echo '</div>';
									
									echo '<div style="margin-top:10px;">';
									echo '<label for="welukaOptionWebFontSelect">' . __("Font Family : ", Weluka::$settings['plugin_name']) . '</label><select id="welukaOptionWebFontSelect" name="welukaOptionWebFontSelect"><option class="none" value=""> ---- </option>';
                					foreach($fontArr['category'] as $fontCat) :
										$_key = $fontCat['keyName'];
										if(isset($fontArr[$_key]) && is_array($fontArr[$_key]) && count($fontArr[$_key]) > 0) {
											foreach($fontArr[$_key] as $font) :
												$styles		= isset($font['styles']) && is_array($font['styles']) ? implode(",", $font['styles']) : '';
												$charsets	= isset($font['charsets']) && is_array($font['charsets']) ? implode(",", $font['charsets']) : '';
												$sampleUrl	= isset($font['sampleUrl']) ? trim($font['sampleUrl']) : ''; 
												$sourceType	= isset($font['sourceType']) ? trim($font['sourceType']) : '';
												$_url	= isset($font['url']) ? trim($font['url']) : '';
												echo '<option class="' . $_key . '" value="' . $font['family'] . '" data-styles="' . $styles . '" data-charsets="' . $charsets . '" data-sample="' . $sampleUrl . '" data-type="' . $sourceType . '" data-url="' . $_url . '" data-cat="' . $font['category'] . '">' . $font['family'] . '(' . $font['category'] . ')</option>';
											endforeach;
										}
									endforeach;
									echo '</select>';
									echo '</div>';
									echo '<div id="welukaOptionWebFontSettings"></div>';
?>
									<div style="margin-top:10px;">
                                    	<button id="welukaOptionWebFontAddBtn" type="button" class="wp-core-ui button-primary"><?php _e("Add", Weluka::$settings['plugin_name']); ?></button>&nbsp;&nbsp;&nbsp;
                                    	<?php _e("Select and use font you want, please click on the [Add] button." , Weluka::$settings['plugin_name']); ?>
                                    </div>
                                    <div id="welukaOptionWebFontAddContainer" style="margin-top:20px;padding:8px; background:#fff; border:1px solid #ddd;">
                                    <?php
                                        if(isset($options[self::USE_WEB_FONTS])) {
											foreach($options[self::USE_WEB_FONTS] as $_key => $_val) :
												$family		= str_replace("_", " ", $_key);
												$styles		= isset($_val['styles']) ? $_val['styles'] : '';
												$charsets	= isset($_val['charsets']) ? $_val['charsets'] : '';
												$cat		= isset($_val['category']) ? $_val['category'] : '';
												$sourceType	= isset($_val['sourceType']) ? $_val['sourceType'] : '';
												$_url		= isset($_val['url']) ? $_val['url'] : '';
												
												echo '<span id="welukaOptionsWebFontFamily-' . $_key . '" style="background:#f1f1f1; margin-right:6px; padding:6px 20px 6px 6px;border:1px solid #ccc; display:inline-block;position:relative;">' . $family . '<i data-key="' . $_key . '" style="position:absolute; top:0;right:0;background:#fff;color:red;padding:0 4px;font-weight:bold;font-size:15px;cursor:pointer;" class="welukaOptionWebFontRemove">X</i>';
												echo '<input type="hidden" id="welukaOptionUseFont-' . $_key . '" name="welukaOptionUseFont[]" value="' . $_key . '" />';
												echo '<input type="hidden" id="welukaOptionUseFontStyles-' . $_key . '" name="welukaOptionUseFontStyles-' . $_key . '" value="' . $styles . '" />';
												echo '<input type="hidden" id="welukaOptionUseFontCharsets-' . $_key . '" name="welukaOptionUseFontCharsets-' . $_key . '" value="' . $charsets . '" />';
												echo '<input type="hidden" id="welukaOptionUseFontCat-' . $_key . '" name="welukaOptionUseFontCat-' . $_key . '" value="' . $cat . '" />';
												echo '<input type="hidden" id="welukaOptionUseFontSourceType-' . $_key . '" name="welukaOptionUseFontSourceType-' . $_key . '" value="' . $sourceType . '" />';
												echo '<input type="hidden" id="welukaOptionUseFontUrl-' . $_key . '" name="welukaOptionUseFontUrl-' . $_key . '" value="' . $_url . '" />';
												echo '</span>';
											endforeach;
										}else{
											_e("<div>Font has not been set.</div>", Weluka::$settings['plugin_name']);
										}
									?>
                                    </div>
<?php
            					}
        					}
                        ?>
                    </td>
                </tr>
                <?php //favicon ?>
                <tr>
                	<th><?php _e('Favicon : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::FAVICON_URL]) ? $options[self::FAVICON_URL] : ''; ?>
                        <input type="text" id="<?php echo self::FAVICON_URL; ?>" name="<?php echo self::FAVICON_URL; ?>" value="<?php echo esc_url($val); ?>" class="widefat" />
                        <div style="margin-top:10px;">
                        	<input class="welukaAdminUploadIconBtn" type="button" value="<?php _e('Set Favicon', Weluka::$settings['plugin_name']); ?>" data-target="#<?php echo self::FAVICON_URL; ?>" />
                        	<input class="welukaAdminClearBtn" type="button" value="<?php _e('Clear', Weluka::$settings['plugin_name']); ?>" data-target="#<?php echo self::FAVICON_URL; ?>" />
                        </div>
                    </td>
                </tr>
                <?php //touchicon ?>
                <tr>
                	<th><?php _e('Touch Icon : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::TOUCHICON_URL]) ? $options[self::TOUCHICON_URL] : ''; ?>
                        <input type="text" id="<?php echo self::TOUCHICON_URL; ?>" name="<?php echo self::TOUCHICON_URL; ?>" value="<?php echo esc_url($val); ?>" class="widefat" />
                        <div style="margin-top:10px;">
                        	<input class="welukaAdminUploadIconBtn" type="button" value="<?php _e('Set Touch Icon', Weluka::$settings['plugin_name']); ?>" data-target="#<?php echo self::TOUCHICON_URL; ?>" />
                        	<input class="welukaAdminClearBtn" type="button" value="<?php _e('Clear', Weluka::$settings['plugin_name']); ?>" data-target="#<?php echo self::TOUCHICON_URL; ?>" />
                        </div>
                    </td>
                </tr>
                <?php //common container type ?>
                <tr>
                	<th><?php _e('Container Type : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::CONTAINER_TYPE]) ? $options[self::CONTAINER_TYPE] : 'weluka-container'; ?>
                        <select id="<?php echo self::CONTAINER_TYPE; ?>" name="<?php echo self::CONTAINER_TYPE; ?>">
                        	<option value="weluka-container" <?php if($val === 'weluka-container') { echo 'selected="selected"'; } ?>><?php _e('Fixed width container', Weluka::$settings['plugin_name']); ?></option>
                        	<option value="weluka-container-fluid" <?php if($val === 'weluka-container-fluid') { echo 'selected="selected"'; } ?>><?php _e('Full width container', Weluka::$settings['plugin_name']); ?></option>
                        </select>
                        <?php /* //v1.0.4 add ?>
                    	<?php $val = !empty($options[self::FULLWIDTH_PADDING_LR]) ? $options[self::FULLWIDTH_PADDING_LR] : ''; ?>
                        <span style="margin-left:1em;"><label><?php _e('Full width container Left and right padding : ', Weluka::$settings['plugin_name']); ?></label></span>
                        <input type="text" id="<?php echo self::FULLWIDTH_PADDING_LR; ?>" name="<?php echo self::FULLWIDTH_PADDING_LR; ?>" value="<?php echo $val; ?>" size="6" />
                        <?php //v1.0.4 add end */ ?>
                        <div style="margin-top:10px;">
                        	<?php _e('Please select whether to set full width to the content container width to a fixed length. The default is a fixed length.', Weluka::$settings['plugin_name']); ?><br />
							<?php _e('If the content container width is set in the theme, it will according to the theme.', Weluka::$settings['plugin_name']); ?><br />
							<?php //_e('In the case of a full-width container, you can set the left and right margins of the time the screen size (more than 992px). Please enter until the unit. Example) 2% or 20px or 3em', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
				</tr>
                <?php //v1.0.4 add ?>
            	<tr>
                	<th><?php _e('IE Compatibility View : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::IE_COMPATIBILITY]) ? $options[self::IE_COMPATIBILITY] : 0; ?>
                 		<input type="checkbox" value="1" name="<?php echo self::IE_COMPATIBILITY; ?>" id="<?php echo self::IE_COMPATIBILITY; ?>" <?php if( $val ){ echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Disable the previous IE Compatibility View feature Edge', Weluka::$settings['plugin_name']); ?>
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('For builder data at the time of stop plug-in : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::PLUGIN_STOP_DATA_RESTORE]) ? $options[self::PLUGIN_STOP_DATA_RESTORE] : 0; ?>
                 		<input type="checkbox" value="1" name="<?php echo self::PLUGIN_STOP_DATA_RESTORE; ?>" id="<?php echo self::PLUGIN_STOP_DATA_RESTORE; ?>" <?php if( $val ){ echo 'checked="checked"'; } ?> />&nbsp;<?php _e('To set the builder data to WordPress content.', Weluka::$settings['plugin_name']); ?>
        				<div style="margin:10px 0;">
    	        			<?php _e('Please check if you want to set the builder data at the time of stop plug-in WordPress usually content. Standard behavior does not set to WordPress normal content at the time of stop plug-in.', Weluka::$settings['plugin_name']); ?>
            			</div>
                    </td>
            	</tr>
                <?php //v1.0.4 addend ?>
                
                <?php //v1.0.7.1 add ?>
                <tr>
            		<th><?php _e('Google Map JavaScript API Key : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::GMAP_JS_APIKEY_OPTION_NAME]) ? $options[self::GMAP_JS_APIKEY_OPTION_NAME] : ''; ?>
            			<input type="text" id="<?php echo self::GMAP_JS_APIKEY_OPTION_NAME; ?>" name="<?php echo self::GMAP_JS_APIKEY_OPTION_NAME; ?>" value="<?php echo esc_attr( $val ); ?>" class="weluka-normal-text widefat" />
        				<div style="margin:10px 0;">
    	        			<?php _e('When Google Map Widget and get the Google Map JavaScript APIKey, please set.', Weluka::$settings['plugin_name']); ?>
            			</div>
                    </td>
                </tr>
                <?php //v1.0.7.1 addend ?>                

                <?php //v1.1.4 add ?>
                <tr>
					<th><?php _e('Page Top Link: ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
						<?php
							$_ptopData = !empty($options[self::PAGETOP_LINK_OPTION_NAME]) ? $options[self::PAGETOP_LINK_OPTION_NAME] : '';
							$val = !empty($_ptopData[self::PAGETOP_LINK_DISP]) ? $_ptopData[self::PAGETOP_LINK_DISP] : '';
						?>
            			<label class="selectit">
                			<input type="checkbox" value="1" name="<?php echo self::PAGETOP_LINK_DISP; ?>" id="<?php echo self::PAGETOP_LINK_DISP; ?>" <?php if( $val ){ echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Display', Weluka::$settings['plugin_name']); ?>
                        </label>
                    	<?php $val = !empty($_ptopData[self::PAGETOP_LINK_NODISP_SP]) ? $_ptopData[self::PAGETOP_LINK_NODISP_SP] : ''; ?>
            			<label class="selectit" style="margin-left:10px;">
                			<input type="checkbox" value="1" name="<?php echo self::PAGETOP_LINK_NODISP_SP; ?>" id="<?php echo self::PAGETOP_LINK_NODISP_SP; ?>" <?php if( $val ){ echo 'checked="checked"'; } ?> />&nbsp;<?php _e('Hide(mobile)', Weluka::$settings['plugin_name']); ?>
                        </label>

                        <div style="margin-top:10px;">
	                        <?php $val = !empty($_ptopData[self::PAGETOP_LINK_POS]) ? $_ptopData[self::PAGETOP_LINK_POS] : 'weluka-pagtop-link-rb'; ?>
    	        			<label style="margin-right:10px;"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
        	                <select id="<?php echo self::PAGETOP_LINK_POS; ?>" name="<?php echo self::PAGETOP_LINK_POS; ?>">
            	            	<option value="weluka-pagtop-link-lb" <?php if($val === 'weluka-pagtop-link-lb') { echo 'selected="selected"'; } ?>><?php _e('Left bottom', Weluka::$settings['plugin_name']); ?></option>
                	        	<option value="weluka-pagtop-link-rb" <?php if($val === 'weluka-pagtop-link-rb') { echo 'selected="selected"'; } ?>><?php _e('Right bottom', Weluka::$settings['plugin_name']); ?></option>
                    	    </select>
	                        <?php $val = !empty($_ptopData[self::PAGETOP_LINK_POS_SP]) ? $_ptopData[self::PAGETOP_LINK_POS_SP] : ''; ?>
    	        			<label style="margin:0 10px 0 20px;"><?php _e('Alignment(mobile)', Weluka::$settings['plugin_name']); ?></label>
        	                <select id="<?php echo self::PAGETOP_LINK_POS_SP; ?>" name="<?php echo self::PAGETOP_LINK_POS_SP; ?>">
            	            	<option value="" <?php if( ! $val ) { echo 'selected="selected"'; } ?>></option>
            	            	<option value="weluka-pagtop-link-sp-lb" <?php if($val === 'weluka-pagtop-link-sp-lb') { echo 'selected="selected"'; } ?>><?php _e('Left bottom', Weluka::$settings['plugin_name']); ?></option>
                	        	<option value="weluka-pagtop-link-sp-rb" <?php if($val === 'weluka-pagtop-link-sp-rb') { echo 'selected="selected"'; } ?>><?php _e('Right bottom', Weluka::$settings['plugin_name']); ?></option>
                    	    </select>
                        </div>
                        
                        <div style="margin-top:10px;">
                        	<?php $val = !empty($_ptopData[self::PAGETOP_LINK_BGCOLOR]) ? $_ptopData[self::PAGETOP_LINK_BGCOLOR] : ''; ?>
                            <label style="margin-right:10px;"><?php _e('Bg Color', Weluka::$settings['plugin_name']); ?></label>
                        	<input type="text" id="<?php echo self::PAGETOP_LINK_BGCOLOR; ?>" name="<?php echo self::PAGETOP_LINK_BGCOLOR; ?>" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
                        	<?php $val = !empty($_ptopData[self::PAGETOP_LINK_COLOR]) ? $_ptopData[self::PAGETOP_LINK_COLOR] : ''; ?>
                            <label style="margin:0 10px 0 20px;"><?php _e('Text Color', Weluka::$settings['plugin_name']); ?></label>
                        	<input type="text" id="<?php echo self::PAGETOP_LINK_COLOR; ?>" name="<?php echo self::PAGETOP_LINK_COLOR; ?>" class="colorpicker" value="<?php echo esc_attr( $val ); ?>" />
						</div>                       
        				<div style="margin:10px 0;">
    	        			<?php _e('Check out see if you want to view the Page Top Link on the site as a whole.', Weluka::$settings['plugin_name']); ?>
            			</div>
                    </td>
                </tr>
                <?php //v1.1.4 addend ?> 
				<?php //v1.2.4.5 add ?>
				<tr>
					<th><?php _e('SNS OGP: ', Weluka::$settings['plugin_name']); ?></th>
					<td>
						<div>
							<?php 
		
							$_ogpData = !empty($options[self::OGP_OPTION_NAME]) ? $options[self::OGP_OPTION_NAME] : '';
							$val = !empty($_ogpData[self::F_APP_ID]) ? $_ogpData[self::F_APP_ID] : ''; ?>
							<label style="margin-right:10px;"><?php _e('Facebook App ID', Weluka::$settings['plugin_name']); ?></label>
							<input type="text"  size="20" id="<?php echo self::F_APP_ID; ?>" name="<?php echo self::F_APP_ID; ?>" value="<?php echo esc_attr( $val ); ?>" />
							<?php $val = !empty($_ogpData[self::F_TOKEN]) ? $_ogpData[self::F_TOKEN] : ''; ?>
							<div>
								<label style="margin-right:10px;"><?php _e('Facebook Access Token', Weluka::$settings['plugin_name']); ?></label>
								<input type="text" style="margin-top:10px;" size="50" id="<?php echo self::F_TOKEN; ?>" name="<?php echo self::F_TOKEN; ?>" value="<?php echo esc_attr( $val ); ?>" />
								<input id="get-accesstoken" type="button" value="<?php _e('Get Access Token', Weluka::$settings['plugin_name']); ?>">
								<div style="margin-top: 5px;"><?php _e('Input above if you cannot get facebook counter.(ssl only)', Weluka::$settings['plugin_name']);?></div>
							</div>
						</div>
						<div style="margin-top:17px;">
							<div>
								<?php $val = !empty($_ogpData[self::TWITTER_ID]) ? $_ogpData[self::TWITTER_ID] : ''; ?>
								<div style="float:left; width: 19em;">
									<label style="margin-right:10px;"><?php _e('Twitter ID', Weluka::$settings['plugin_name']); ?></label>
									<input type="text" id="<?php echo self::TWITTER_ID; ?>" name="<?php echo self::TWITTER_ID; ?>" value="<?php echo esc_attr( $val ); ?>" />
									<div class="weluka-mgtop-xs help-block"><?php _e('Please do not enter the beginning of the @ mark.', Weluka::$settings['plugin_name']); ?></div>
								</div>
								<?php $val = !empty($_ogpData[self::CARD_TYPES]) ? $_ogpData[self::CARD_TYPES] : ''; ?>
								<div>
									<label style="margin:0 10px 0 0;"><?php _e('Twitter Card Type', Weluka::$settings['plugin_name']); ?></label>
									
										<select id="<?php echo self::CARD_TYPES; ?>" name="<?php echo self::CARD_TYPES; ?>">
											<option value=""><?php _e('Twitter card is not set.', Weluka::$settings['plugin_name']); ?></option>
											<?php foreach (self::$cardSelecter as $k => $v){
													if($val===$k){
														echo ' <option value="'.$k.'" selected="selected">'.$v.'</option>';
													}else{
														echo ' <option value="'.$k.'">'.$v.'</option>';
													}
												}
											?>
										</select>
										<div class="weluka-mgtop-xs help-block"><?php _e('When you choose this one, Line OGP is also set.', Weluka::$settings['plugin_name']); ?></div>
								</div>
							</div>

							<?php $val = !empty($_ogpData[self::COMMON_CARD_VIDEO]) ? $_ogpData[self::COMMON_CARD_VIDEO] : ''; ?>
							<div id="video-card" style="margin-top:10px; display:none; clear:both;">
								<div style="width:100%;">
									<div>
										<label style="margin-right:10px;"><?php _e('Common video url for player card ', Weluka::$settings['plugin_name']); ?></label>
									</div>
									<div>
										<input type="text" class="weluka-normal-text widefat"  id="<?php echo self::COMMON_CARD_VIDEO; ?>" name="<?php echo self::COMMON_CARD_VIDEO; ?>" value="<?php echo esc_url( $val ); ?>" />
									</div>
									<div style="margin: 5px 0 10px 0;">
										<?php _e('If you set \'http(s) omitted\' in SEO setting,please replace http(s):// → http(s):%BS%/%BS%/', Weluka::$settings['plugin_name']); ?>
									</div>
								</div>
								<?php $val = !empty($_ogpData[self::CARD_VIDEO_WIDTH]) ? $_ogpData[self::CARD_VIDEO_WIDTH] : ''; ?>
								<div style="margin-top:10px;">
								<label style="margin-right:10px;"><?php _e('Video width', Weluka::$settings['plugin_name']); ?></label>
								<input type="text" id="<?php echo self::CARD_VIDEO_WIDTH; ?>" name="<?php echo self::CARD_VIDEO_WIDTH; ?>" value="<?php echo esc_attr( $val ); ?>" />
								<?php $val = !empty($_ogpData[self::CARD_VIDEO_HEIGHT]) ? $_ogpData[self::CARD_VIDEO_HEIGHT] : ''; ?>
								<label style="margin:0 10px 0 20px;"><?php _e('Video height', Weluka::$settings['plugin_name']); ?></label>
								<input type="text" id="<?php echo self::CARD_VIDEO_HEIGHT; ?>" name="<?php echo self::CARD_VIDEO_HEIGHT; ?>" value="<?php echo esc_attr( $val ); ?>" />
								</div>
							</div>
							<script type="text/javascript">
								jQuery(document).ready(function ($) {
									var cardselect = $('#card_types'),
										videoElm   = $('#video-card'),
									    val = cardselect.val();
									
									if(val === 'player'){
										videoElm.css('display', '');
									}else{
										videoElm.css('display', 'none');
									}
									
									cardselect.change(function() {
										val = cardselect.val();
										if(val === 'player'){
											videoElm.css('display', '');
										}else{
											videoElm.css('display', 'none');
										}
									});
								});
							</script>
						</div>
					</td>
				</tr>
				<?php //v1.2.4.5 addend ?>                
			</tbody>
            </table>

	        <h3><?php _e('Embed Code', Weluka::$settings['plugin_name']); ?></h3>

	        <?php //v1.2.4.3 add ?>
            <p><?php _e('head tag code', Weluka::$settings['plugin_name']); ?></p>
            <?php $val = !empty($options[self::COMMON_HEAD_EMBED_CODE]) ? wp_unslash($options[self::COMMON_HEAD_EMBED_CODE]) : ''; ?>
            <textarea id="<?php echo self::COMMON_HEAD_EMBED_CODE; ?>" name="<?php echo self::COMMON_HEAD_EMBED_CODE; ?>" class="widefat" rows="10"><?php echo esc_attr($val); ?></textarea>

	        <p class="weluka-mgtop-s"><?php _e('close body tag before adding code', Weluka::$settings['plugin_name']); ?></p>
	        <?php //v1.2.4.3 addend ?>

            <?php $val = !empty($options[self::COMMON_EMBED_CODE]) ? wp_unslash($options[self::COMMON_EMBED_CODE]) : ''; ?>
            <textarea id="<?php echo self::COMMON_EMBED_CODE; ?>" name="<?php echo self::COMMON_EMBED_CODE; ?>" class="widefat" rows="10"><?php echo esc_attr($val); ?></textarea>
        	<div style="margin:10px 0;">
    	        <?php _e('Please set in when embedding such as Google Analytics analysis code.', Weluka::$settings['plugin_name']); ?>
            </div>

            <p class="submit"><input type="submit" id="weluka_option_setting_submit" name="weluka_option_setting_submit" value="<?php _e('Save', Weluka::$settings['plugin_name']) ;?>" class="button-primary" /></p>
    	</form>
        	<div style="display:none;">
            	<script type="text/javascript">
					jQuery(document).ready(function($) {
						//v1.1.4 add
						$('.colorpicker').colorpicker();

						$('.welukaOptionWebFontsCategory').on('change', function() {
							$('#welukaOptionWebFontSelect > option ').attr('disabled', 'disabled').hide();
							$('#welukaOptionWebFontSelect .none').removeAttr('disabled').show();
							$('#welukaOptionWebFontSelect').val('');
							$('.welukaOptionWebFontsCategory').each(function() {
								var catElm = $(this);
								if(catElm.prop('checked')) {
									var key = catElm.data('key');
									$('#welukaOptionWebFontSelect .' + key).removeAttr('disabled').show();
								}
							});

							/* ie not option display none
							$('#welukaOptionWebFontSelect > option ').css('display', 'none');
							$('#welukaOptionWebFontSelect .none').css('display', 'block');
							$('#welukaOptionWebFontSelect').val('');
							$('.welukaOptionWebFontsCategory').each(function() {
								var catElm = $(this);
								if(catElm.prop('checked')) {
									var key = catElm.data('key');
									$('#welukaOptionWebFontSelect .' + key).css('display', 'block'); 
								}
							});*/
						});
						
						$('#welukaOptionWebFontSelect').on('change', function() {
							if(!$(this).val()) { return false; }
							var selOption	= $('#welukaOptionWebFontSelect option:selected'),
								key			= selOption.attr('class'),
								styles		= selOption.data('styles'),
								charsets	= selOption.data('charsets'),
								sampleUrl	= selOption.data('sample'),
								sourceType	= selOption.data('type'),
								_url		= selOption.data('url'),
								cat			= selOption.data('cat'),
								val			= $(this).val(),
								appendElm	= $('#welukaOptionWebFontSettings'),
								ct			= '',
								wk			= '',
								i			= null,
								arr			= null;
							
							appendElm.html('');
							//styles
							arr = !styles ? '' : styles.split(',');
							if((arr instanceof Array)) {
								ct = '<div style="margin-top:10px;"><label><?php _e("Font Styles : ", Weluka::$settings['plugin_name']); ?></label>';
								for(i = 0 ; i < arr.length ; i++) {
									wk = 'welukaOptionWebFontStyles_' + arr[i];
									ct = ct + '<input type="checkbox" id="' + wk + '" name="' + wk + '" class="welukaOptionWebFontStyles" value="' + arr[i] + '" />';
									ct = ct + '<label for="' + wk + '">' + arr[i] + '</label>&nbsp;&nbsp;&nbsp;';
								}
								ct = ct + '</div>';
							}
							//charsets
							arr = !charsets ? '' : charsets.split(',');
							if((arr instanceof Array)) {
								ct = ct + '<div style="margin-top:10px;"><label><?php _e("Character Sets : ", Weluka::$settings["plugin_name"]); ?></label>';
								for(i = 0 ; i < arr.length ; i++) {
									wk = 'welukaOptionWebFontCharsets_' + arr[i];
									ct = ct + '<input type="checkbox" id="' + wk + '" name="' + wk + '" class="welukaOptionWebFontCharsets" value="' + arr[i] + '" />';
									ct = ct + '<label for="' + wk + '">' + arr[i] + '</label>&nbsp;&nbsp;&nbsp;';
								}
								ct = ct + '</div>';
							}
							//sample link
							if(sampleUrl) {
								ct = ct + '<div style="margin-top:10px;"><label><?php _e("Font Preview : ", Weluka::$settings["plugin_name"]); ?></label><a href="' + sampleUrl + '" target="_blank"><?php _e("Confirmation of font image from here.", Weluka::$settings["plugin_name"]); ?></a></div>';
							}
							//category
							ct = ct + '<input type="hidden" id="welukaOptionWebFontCat" name="welukaOptionWebFontCat" value="' + cat + '" />';
							//sourceType
							ct = ct + '<input type="hidden" id="welukaOptionWebFontSourceType" name="welukaOptionWebFontSourceType" value="' + sourceType + '" />';
							//url
							ct = ct + '<input type="hidden" id="welukaOptionWebFontUrl" name="welukaOptionWebFontUrl" value="' + _url + '" />';
							appendElm.append(ct);
						});
						
						$('#welukaOptionWebFontAddBtn').on('click', function(){
							var fontFamily = $('#welukaOptionWebFontSelect').val(),
								styles		= '',
								charsets	= '',
								ct			= '',
								cat			= $('#welukaOptionWebFontCat')[0] ? $('#welukaOptionWebFontCat').val() : '',
								sourceType	= $('#welukaOptionWebFontSourceType')[0] ? $('#welukaOptionWebFontSourceType').val() : '',
								_url		= $('#welukaOptionWebFontUrl')[0] ? $('#welukaOptionWebFontUrl').val() : '',
								errMsg		= '',
								appendElm	= $('#welukaOptionWebFontAddContainer');
						
							if(!fontFamily) {
								errMsg = '<?php _e("Please enter font family.", Weluka::$settings["plugin_name"]); ?>\n';
							}
						
							if($('.welukaOptionWebFontStyles')[0]) {
								$('.welukaOptionWebFontStyles:checked').map(function() {
  									if(styles == ''){ styles = $(this).val(); }else{ styles = styles + ',' + $(this).val(); }
								});
								if(!styles) {
									errMsg = errMsg + '<?php _e("Please enter font styles.", Weluka::$settings["plugin_name"]); ?>\n';
								}
							}
							if($('.welukaOptionWebFontCharsets')[0]) {
								$('.welukaOptionWebFontCharsets:checked').map(function() {
  									if(charsets == ''){ charsets = $(this).val(); }else{ charsets = charsets + ',' + $(this).val(); }
								});
								if(!charsets) {
									errMsg = errMsg + '<?php _e("Please enter font charsets.", Weluka::$settings["plugin_name"]); ?>\n';
								}
							}
						
							if(errMsg) {
								alert(errMsg);
								return false;
							}
							
							appendElm.find('div').remove();
							var _key = fontFamily.replace(/ /g, "_");
							ct = '<span id="welukaOptionsWebFontFamily-' + _key + '" style="background:#f1f1f1; margin-right:6px; padding:6px 20px 6px 6px;border:1px solid #ccc; display:inline-block;position:relative;">' + fontFamily + '<i data-key="' + _key + '" style="position:absolute; top:0;right:0;background:#fff;color:red;padding:0 4px;font-weight:bold;font-size:15px;cursor:pointer;" class="welukaOptionWebFontRemove">X</i>';
							ct = ct + '<input type="hidden" id="welukaOptionUseFont-' + _key + '" name="welukaOptionUseFont[]" value="' + _key + '" />';
							ct = ct + '<input type="hidden" id="welukaOptionUseFontStyles-' + _key + '" name="welukaOptionUseFontStyles-' + _key + '" value="' + styles + '" />';
							ct = ct + '<input type="hidden" id="welukaOptionUseFontCharsets-' + _key + '" name="welukaOptionUseFontCharsets-' + _key + '" value="' + charsets + '" />';
							ct = ct + '<input type="hidden" id="welukaOptionUseFontCat-' + _key + '" name="welukaOptionUseFontCat-' + _key + '" value="' + cat + '" />';
							ct = ct + '<input type="hidden" id="welukaOptionUseFontSourceType-' + _key + '" name="welukaOptionUseFontSourceType-' + _key + '" value="' + sourceType + '" />';
							ct = ct + '<input type="hidden" id="welukaOptionUseFontUrl-' + _key + '" name="welukaOptionUseFontUrl-' + _key + '" value="' + _url + '" />';
							ct = ct + '</span>';
							appendElm.append(ct);
						});
						
						$('#welukaOptionWebFontAddContainer').on('click', '.welukaOptionWebFontRemove', function(evt){
							if(confirm('<?php _e("Are you really sure you want to delete?", Weluka::$settings["plugin_name"]); ?>')) {
								var elm		= $(evt.target),
									_key	= elm.data('key');
					
								$('#welukaOptionsWebFontFamily-' + _key).remove();
								
								if(!$('#welukaOptionWebFontAddContainer > span')[0]) {
									$('#welukaOptionWebFontAddContainer').append('<?php _e("<div>Font has not been set.</div>", Weluka::$settings['plugin_name']); ?>');
								}
							}
							event.stopPropagation();
						});
						
						// favicon touchicon
						var _welukaAdminIconFrame;
						$('.welukaAdminUploadIconBtn').on('click', function(evt){
							if( !_welukaAdminIconFrame ) {
								_welukaAdminIconFrame = wp.media({
									button: { text: "<?php _e('Select Icon', Weluka::$settings['plugin_name']); ?>" },
									library : { type : "image" },
									multiple: false
								});
							}
							var obj = $(evt.target);
							_welukaAdminIconFrame.once('select', $.proxy(_welukaAdminIconSelected, obj));
							_welukaAdminIconFrame.open();
						});
						
						function _welukaAdminIconSelected() {
							var iconInfo = _welukaAdminIconFrame.state().get('selection').first().toJSON(),
								target = $(this).data('target') ? $(this).data('target') : '';
							if( target && iconInfo.url ) {
								$(target).val(iconInfo.url);
							}
						}

						$('.welukaAdminClearBtn').on('click', function(evt){
							var target = $(this).data('target') ? $(this).data('target') : '';
							if( target ) {
								$(target).val('');
							}
						});
						
						$('#get-accesstoken').on('click', function(evt){
							var appID = $('#f_app_id').val();
							
							if(appID === ""){
								alert("<?php _e('Input app ID before get access token.', Weluka::$settings['plugin_name']); ?>");
							}else{
								var appSecret = prompt("<?php _e('Input App secret', Weluka::$settings['plugin_name']); ?>");
								if(appSecret !== null && appSecret !== "" ){
									$.getJSON('https://graph.facebook.com/oauth/access_token',
											  { client_id: appID,
											   client_secret: appSecret,
											   grant_type :'client_credentials'
											  }).done(function(tokenArg) {
												$('#f_token').val(tokenArg['access_token']);
										alert("<?php _e('Success get access token.\nToken is ', Weluka::$settings['plugin_name']); ?>" +tokenArg['access_token']);
											  }).fail(function() {
												alert("<?php _e('failed get access token.', Weluka::$settings['plugin_name']); ?>");
											  });
								}else if(appSecret === "" ){
									alert("<?php _e('Input field is empty.Input Account secret.', Weluka::$settings['plugin_name']);?>");
								}
							}
						});	
						
					});
				</script>
            </div>
    	</div>
<?php
	}

	/**
 	 * options db registory
	 * @return void
	 * @update
	 * 1.0.4
	 * 1.0.7.1
	 * 1.1.4
	 * 1.2.4.3
	 */
	public static function update_option_setting($data){
		global $wp_version;
		$errmsg = "";
		try {
			//page builder enable posttype
			$_postTypes = isset($data[self::BUILDER_ON_FIELD_NAME]) ? $data[self::BUILDER_ON_FIELD_NAME] : "";
			if(isset($_postTypes) && is_array($_postTypes)) {
				$_postTypes = sanitize_text_field(implode(",", $_postTypes));
			}
			//page builder disable user roles
			$_disableRoles = isset($data[self::BUILDER_OFF_ROLES_FIELD_NAME]) ? $data[self::BUILDER_OFF_ROLES_FIELD_NAME] : "";
			if(isset($_disableRoles) && is_array($_disableRoles)) {
				$_disableRoles = sanitize_text_field(implode(",", $_disableRoles));
			}
			//web fonts
			$_fontArr = array();
			$_fonts = isset($data["welukaOptionUseFont"]) ? $data["welukaOptionUseFont"] : "";
			if($_fonts !== "" && is_array($_fonts)) {
				foreach($_fonts as $_font) {
					$_key = 'welukaOptionUseFontStyles-' . $_font;
					$_styles = isset($data[$_key]) ? $data[$_key] : "";
					$_fontArr[$_font]['styles'] = $_styles;
					$_key = 'welukaOptionUseFontCharsets-' . $_font;
					$_charsets = isset($data[$_key]) ? $data[$_key] : "";
					$_fontArr[$_font]['charsets'] = $_charsets;
					$_key = 'welukaOptionUseFontCat-' . $_font;
					$_cat = isset($data[$_key]) ? $data[$_key] : "";
					$_fontArr[$_font]['category'] = $_cat;
					$_key = 'welukaOptionUseFontSourceType-' . $_font;
					$_sourceType = isset($data[$_key]) ? $data[$_key] : "";
					$_fontArr[$_font]['sourceType'] = $_sourceType;
					$_key = 'welukaOptionUseFontUrl-' . $_font;
					$_url = isset($data[$_key]) ? $data[$_key] : "";
					$_fontArr[$_font]['url'] = $_url;
				}
			}
			//create font css @v1.2.9.1 add second arg 
			$errmsg = self::create_webfont_css($_fontArr, false);

			//favicon
			$_favicon = !empty($data[self::FAVICON_URL]) ? $data[self::FAVICON_URL] : "";

			//touch icon
			$_touchicon = !empty($data[self::TOUCHICON_URL]) ? $data[self::TOUCHICON_URL] : "";

			//contentiner type
			$_containerType = !empty($data[self::CONTAINER_TYPE]) ? $data[self::CONTAINER_TYPE] : "";

			$_embedCode		= isset( $data[self::COMMON_EMBED_CODE] ) && strlen( trim( $data[self::COMMON_EMBED_CODE] ) ) > 0 ? trim( $data[self::COMMON_EMBED_CODE] ) : '';

			//v1.2.4.3 add
			$_hdEmbedCode		= isset( $data[self::COMMON_HEAD_EMBED_CODE] ) && strlen( trim( $data[self::COMMON_HEAD_EMBED_CODE] ) ) > 0 ? trim( $data[self::COMMON_HEAD_EMBED_CODE] ) : '';
			//v1.2.4.3 addend

			//v1.0.4
			//$_fullwidthPdLr = !empty($data[self::FULLWIDTH_PADDING_LR]) ? $data[self::FULLWIDTH_PADDING_LR] : '';
			$_ieCompatibility = !empty($data[self::IE_COMPATIBILITY]) ? $data[self::IE_COMPATIBILITY] : 0;
			$_pluginStopDataRestore = !empty($data[self::PLUGIN_STOP_DATA_RESTORE]) ? $data[self::PLUGIN_STOP_DATA_RESTORE] : 0;

			//v1.0.7.1 add
			$_gmapApikey = !empty($data[self::GMAP_JS_APIKEY_OPTION_NAME]) ? $data[self::GMAP_JS_APIKEY_OPTION_NAME] : "";

			//v1.1.4 add
			$_pagetopDisp		= !empty($data[self::PAGETOP_LINK_DISP]) ? $data[self::PAGETOP_LINK_DISP] : 0;
			$_pagetopNoDispSp 	= !empty($data[self::PAGETOP_LINK_NODISP_SP]) ? $data[self::PAGETOP_LINK_NODISP_SP] : 0;
			$_pagetopPos 		= !empty($data[self::PAGETOP_LINK_POS]) ? $data[self::PAGETOP_LINK_POS] : 'weluka-pagtop-link-rb';
			$_pagetopPosSp 		= !empty($data[self::PAGETOP_LINK_POS_SP]) ? $data[self::PAGETOP_LINK_POS_SP] : '';
			$_pagetopBgColor 	= !empty($data[self::PAGETOP_LINK_BGCOLOR]) ? $data[self::PAGETOP_LINK_BGCOLOR] : '';
			$_pagetopTextColor 	= !empty($data[self::PAGETOP_LINK_COLOR]) ? $data[self::PAGETOP_LINK_COLOR] : '';
			$_pagetopLink		= array(
				self::PAGETOP_LINK_DISP			=> $_pagetopDisp,
				self::PAGETOP_LINK_NODISP_SP	=> $_pagetopNoDispSp,
				self::PAGETOP_LINK_POS			=> $_pagetopPos,
				self::PAGETOP_LINK_POS_SP		=> $_pagetopPosSp,
				self::PAGETOP_LINK_BGCOLOR		=> $_pagetopBgColor,
				self::PAGETOP_LINK_COLOR		=> $_pagetopTextColor
			);
			//v1.1.4 addend
			
			//v1.2.4.5 add
			
			$_fAppID     	    = !empty($data[self::F_APP_ID])   ? $data[self::F_APP_ID] : '';
			$_fToken    	    = !empty($data[self::F_TOKEN])    ? $data[self::F_TOKEN] : '';
			$_twitterID         = !empty($data[self::TWITTER_ID]) ? $data[self::TWITTER_ID] : '';
			$_cardTypes 	    = !empty($data[self::CARD_TYPES]) ? $data[self::CARD_TYPES] : '';
			$_commonCardVideo 	= !empty($data[self::COMMON_CARD_VIDEO]) ? $data[self::COMMON_CARD_VIDEO] : '';
			$_CardVideoWidth 	= !empty($data[self::CARD_VIDEO_WIDTH]) ? $data[self::CARD_VIDEO_WIDTH] : '';
			$_CardVideoHeight 	= !empty($data[self::CARD_VIDEO_HEIGHT]) ? $data[self::CARD_VIDEO_HEIGHT] : '';

			
			
			$_ogp		= array(
				self::F_APP_ID	        => $_fAppID,
				self::F_TOKEN	        => $_fToken,
				self::TWITTER_ID		=> $_twitterID,
				self::CARD_TYPES		=> $_cardTypes,
				self::COMMON_CARD_VIDEO => $_commonCardVideo,
				self::CARD_VIDEO_WIDTH  => $_CardVideoWidth,
				self::CARD_VIDEO_HEIGHT => $_CardVideoHeight,
			);
			
			//v1.2.4.5 addend
			

			$opt = array(
				self::BUILDER_ON_FIELD_NAME			=> $_postTypes,
				self::BUILDER_OFF_ROLES_FIELD_NAME	=> $_disableRoles,
				self::USE_WEB_FONTS					=> $_fontArr,
				self::FAVICON_URL					=> $_favicon,
				self::TOUCHICON_URL					=> $_touchicon,
				self::CONTAINER_TYPE				=> $_containerType,
				self::COMMON_EMBED_CODE				=> $_embedCode,
				//self::FULLWIDTH_PADDING_LR			=> $_fullwidthPdLr,
				self::IE_COMPATIBILITY				=> $_ieCompatibility,
				self::PLUGIN_STOP_DATA_RESTORE		=> $_pluginStopDataRestore,
				self::GMAP_JS_APIKEY_OPTION_NAME	=> $_gmapApikey,
				self::PAGETOP_LINK_OPTION_NAME 		=> $_pagetopLink,
				self::OGP_OPTION_NAME		        => $_ogp,
				self::COMMON_HEAD_EMBED_CODE		=> $_hdEmbedCode		//v1.2.4.3 add
			);
			//wp option table add or update
			Weluka::get_instance()->update_option( Weluka::$settings['setting_option_name'], $opt );

		} catch (Exception $e) {
			$errmsg = sprintf( __("option registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
	 * create webfont css
	 * @since 1.0
	 * @update 1.2.9.1
	 * add $skipDeleteFlg
	 */
	public static function create_webfont_css($fonts = null, $skipDeleteCSSflg = true) {
		$errMsg = $css = "";
		//$fname = Weluka::$settings['webfont_css_dir'] . '/' . Weluka::$settings['webfont_css_name'];
		$fname = Weluka::get_instance()->get_webfont_fname();
		
		//after plugin update の際、cssが削除される為、plugin_loaded hookで本メソッドを起動した場合
		if( empty( $fonts ) && $skipDeleteCSSflg) {
			$fonts = self::get_webfonts();
			if( ( is_array( $fonts ) && file_exists( $fname ) ) || ! is_array( $fonts ) ) {
				return "";
			}
		}

		//permission check
		if(is_writable(Weluka::$settings['webfont_css_dir'])) {
			//ファイルが存在すれば一旦削除
			if(file_exists($fname)) {
				if(!unlink($fname)) {
					$errMsg = __('It failed to remove Webfont css file.', Weluka::$settings['plugin_name']);
					return $errMsg;
				}
			}
			//create
			if(is_array($fonts)) {
				foreach($fonts as $key => $val) :
					//font family 
					$family = self::replace_webfonts_family($key, "import");
					$importUrl = "";
					if(isset($val['url']) && strlen($val['url']) > 0) {
						$import = $val['url'];
					}else{
						//styles
						$styles = isset($val['styles']) && strlen(trim($val['styles'])) > 0 ? ':' . trim($val['styles']) : "";
						//charsets
						$charsets = isset($val['charsets']) && strlen(trim($val['charsets'])) > 0 ? '&subset=' . trim($val['charsets']) : "";
						$import = "//fonts.googleapis.com/css?family=" . $family . $styles . $charsets;
					}
					$css .= '@import url(' . $import . ');' . PHP_EOL;
				endforeach;
				$css = mb_convert_encoding($css, "UTF-8", "auto");
				if (file_put_contents($fname, $css) === false) {
					$errMsg .= __('It failed to create Webfont css file.', Weluka::$settings['plugin_name']);
                }
			}
		}else{
			$errMsg .= sprintf(__("You do not have write permissions to the directory (%s).", Weluka::$settings['plugin_name']), Weluka::$settings['webfont_css_dir']);
		}
		return $errMsg;
	}

	/**
	 * add_submenu_page hook
	 * display admin seo setting page
	 * @since 1.0
	 * @update
	 * ver1.0.2
	 * ver1.0.3
	 */
	public static function seo_settings_page() {
		//登録アクションで呼ばれた場合
		if (isset($_REQUEST["weluka_seo_setting_submit"])) {
	    	check_admin_referer(self::SEO_SETTING_REG_NONCE); //セキュリティチェック このページから呼ばれた場合のみ次処理へ
	    	//登録処理
			$errmsg = self::update_seo_setting($_REQUEST);

			if($errmsg === ""){ ?>
				<div class="updated fade"><p><strong><?php _e('seo setting update success!!', Weluka::$settings['plugin_name']); ?></strong></p></div>
			<?php }else{ ?>
				<div class="error fade"><p><strong><?php echo $errmsg; ?></strong></p></div>
			<?php  }
		}
	
		//設定内容取得
		//$options = self::get_site_options( Weluka::$settings['seo_option_name'] );
		$options = get_option( Weluka::$settings['seo_option_name'] );
		//v1.0.2 end
?>
    	<div class="wrap">
    	<?php //screen_icon('options-general'); ?>
    	<h2><?php echo "Weluka " . __("Seo Setting", Weluka::$settings['plugin_name'] ); ?></h2>
		<form id="weluka_seo_setting_reg" name="weluka_seo_setting_reg" method="post" action="">
    		<?php wp_nonce_field(self::SEO_SETTING_REG_NONCE); // nonceはセキュリティの処理 ?>
			<div style="margin-top:20px;padding:0 10px;border: 1px solid #e5e5e5;-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);box-shadow: 0 1px 1px rgba(0,0,0,.04);background: #fff;">
				<table class="form-table">
    			<tbody>
            	<tr>
                	<th><?php _e('Use? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::SEO_ARRAY_FIELD][self::SEO_USE]) ? (int)$options[self::SEO_ARRAY_FIELD][self::SEO_USE] : 0; ?>
                        <label><input type="radio" id="<?php echo self::SEO_USE; ?>" name="<?php echo self::SEO_USE; ?>" value="1" <?php if($val === 1) { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::SEO_USE; ?>" name="<?php echo self::SEO_USE; ?>" value="0" <?php if($val === 0) { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('Please then to [Enabled] If you want to replace the such as the title tag by using the Weluka this function.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
<?php //v1.0.3 add start ?>
            	<tr>
                	<th><?php _e('Relative Path? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::SEO_ARRAY_FIELD][self::SEO_RELATIVE_PATH]) ? (int)$options[self::SEO_ARRAY_FIELD][self::SEO_RELATIVE_PATH] : 0; ?>
                        <label><input type="radio" id="<?php echo self::SEO_RELATIVE_PATH; ?>" name="<?php echo self::SEO_RELATIVE_PATH; ?>" value="1" <?php if($val === 1) { echo 'checked="checked"'; } ?> /><?php _e('Site domain only', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::SEO_RELATIVE_PATH; ?>" name="<?php echo self::SEO_RELATIVE_PATH; ?>" value="3" <?php if($val === 3) { echo 'checked="checked"'; } ?> /><?php _e('Site domain only(http(s) only omitted)', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::SEO_RELATIVE_PATH; ?>" name="<?php echo self::SEO_RELATIVE_PATH; ?>" value="2" <?php if($val === 2) { echo 'checked="checked"'; } ?> /><?php _e('http(s) only omitted', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::SEO_RELATIVE_PATH; ?>" name="<?php echo self::SEO_RELATIVE_PATH; ?>" value="0" <?php if($val === 0) { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<p><?php _e('Please set to [Enable] if Weluka using this function to replace the path, such as css to a relative path.<br />Please select the [http(s) omitted only] if you replace only http  to omit system.', Weluka::$settings['plugin_name']); ?></p>
                        	<p><?php _e('This function might be linked URL or the like to be dynamically added and specifications of the combination plug-ins can not be converted. In addition, there is a possibility that no longer work due to http (s) optional external API tag.', Weluka::$settings['plugin_name']); ?></p>                            
                        </div>
                    </td>
            	</tr>
<?php //v1.0.3 add end ?>
				</tbody>
            	</table>
            	<h3 style="border-bottom:1px solid #ddd; padding-bottom:6px;"><?php _e('Home Page Setting', Weluka::$settings['plugin_name']); ?></h3>
				<table class="form-table">
    			<tbody>
            	<tr>
                	<th><?php _e('Home Title : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::SEO_ARRAY_FIELD][self::SEO_HOME_TITLE]) ? $options[self::SEO_ARRAY_FIELD][self::SEO_HOME_TITLE] : ''; ?>
            			<input type="text" id="<?php echo self::SEO_HOME_TITLE; ?>" name="<?php echo self::SEO_HOME_TITLE; ?>" value="<?php echo esc_attr( $val ); ?>" class="widefat" />
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('Home Keywords : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::SEO_ARRAY_FIELD][self::SEO_HOME_KEYWORDS]) ? $options[self::SEO_ARRAY_FIELD][self::SEO_HOME_KEYWORDS] : ''; ?>
                        <input type="text" id="<?php echo self::SEO_HOME_KEYWORDS; ?>" name="<?php echo self::SEO_HOME_KEYWORDS; ?>" value="<?php echo esc_attr( $val ); ?>" class="widefat" placeholder="<?php _e('Keyword1,keyword2, ...', Weluka::$settings['plugin_name']); ?>" />
                        <div style="margin-top:10px";><?php _e('Please enter a keyword in a comma-delimited.', Weluka::$settings['plugin_name']); ?></div>
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('Home Description : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::SEO_ARRAY_FIELD][self::SEO_HOME_DESCRIPTION]) ? $options[self::SEO_ARRAY_FIELD][self::SEO_HOME_DESCRIPTION] : ''; ?>
	                    <textarea id="<?php echo self::SEO_HOME_DESCRIPTION; ?>" name="<?php echo self::SEO_HOME_DESCRIPTION; ?>" class="widefat" rows="3"><?php echo esc_textarea( $val ); ?></textarea>
                    </td>
            	</tr>
				</tbody>
            	</table>
            </div>

			<div style="margin-top:20px;padding:0 10px;border: 1px solid #e5e5e5;-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);box-shadow: 0 1px 1px rgba(0,0,0,.04);background: #fff;">
            	<h3 style="border-bottom:1px solid #ddd; padding-bottom:6px;"><?php _e('Meta Tag Setting', Weluka::$settings['plugin_name']); ?></h3>
				<table class="form-table">
    			<tbody>
            	<tr>
                	<th><?php _e('WP Generator? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::META_ARRAY_FIELD][self::META_WP_GENERATOR]) ? $options[self::META_ARRAY_FIELD][self::META_WP_GENERATOR] : 'off'; ?>
                        <label><input type="radio" id="<?php echo self::META_WP_GENERATOR; ?>" name="<?php echo self::META_WP_GENERATOR; ?>" value="on" <?php if($val === 'on') { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::META_WP_GENERATOR; ?>" name="<?php echo self::META_WP_GENERATOR; ?>" value="off" <?php if($val === 'off') { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('Please select the [enabled] If you want to add a WordPress Version meta tags.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('EditURI? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::META_ARRAY_FIELD][self::META_RSD_LINK]) ? $options[self::META_ARRAY_FIELD][self::META_RSD_LINK] : 'on'; ?>
                        <label><input type="radio" id="<?php echo self::META_RSD_LINK; ?>" name="<?php echo self::META_RSD_LINK; ?>" value="on" <?php if($val === 'on') { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::META_RSD_LINK; ?>" name="<?php echo self::META_RSD_LINK; ?>" value="off" <?php if($val === 'off') { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('Please select the [enabled] If you want to add a WordPress EditURI meta tags. There is no problem in the [disabled] If you want to post and edit only from WordPress administrator page.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('Wlwmanifest? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::META_ARRAY_FIELD][self::META_WLWMANIFEST_LINK]) ? $options[self::META_ARRAY_FIELD][self::META_WLWMANIFEST_LINK] : 'on'; ?>
                        <label><input type="radio" id="<?php echo self::META_WLWMANIFEST_LINK; ?>" name="<?php echo self::META_WLWMANIFEST_LINK; ?>" value="on" <?php if($val === 'on') { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::META_WLWMANIFEST_LINK; ?>" name="<?php echo self::META_WLWMANIFEST_LINK; ?>" value="off" <?php if($val === 'off') { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('If you want to add a Wlwmanifest meta tags, please choose [enabled]. There is no problem in the [disabled] If you do not want to post-edit from MSN Windows Live Writer.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
            	<tr>
                	<th><?php _e('Rss Feed? : ', Weluka::$settings['plugin_name']); ?></th>
                    <td>
                    	<?php $val = !empty($options[self::META_ARRAY_FIELD][self::META_RSS_FEED]) ? $options[self::META_ARRAY_FIELD][self::META_RSS_FEED] : 'on'; ?>
                        <label><input type="radio" id="<?php echo self::META_RSS_FEED; ?>" name="<?php echo self::META_RSS_FEED; ?>" value="on" <?php if($val === 'on') { echo 'checked="checked"'; } ?> /><?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" id="<?php echo self::META_RSS_FEED; ?>" name="<?php echo self::META_RSS_FEED; ?>" value="off" <?php if($val === 'off') { echo 'checked="checked"'; } ?> /><?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        <div style="margin-top:10px;">
                        	<?php _e('Please select the [enabled] If you want to add the Rss Feed meta tags.', Weluka::$settings['plugin_name']); ?>
                        </div>
                    </td>
            	</tr>
                </tbody>
                </table>
            </div>
			
			<?php //add v1.2.7
			$useApache = strpos(strtolower($_SERVER['SERVER_SOFTWARE']), 'apache') !== false;
			$loadMod   = $useApache && function_exists('apache_get_modules') ? array_flip(apache_get_modules()) : array();
			?>
			<div style="margin-top:20px;padding:0 10px;border: 1px solid #e5e5e5;-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);box-shadow: 0 1px 1px rgba(0,0,0,.04);background: #fff;">
				<h3 style="border-bottom:1px solid #ddd; padding-bottom:6px;"><?php _e('Speed up the site', Weluka::$settings['plugin_name']); ?></h3>
				<table class="form-table">
					<tbody>
						<tr>
							<th><?php _e('Gzip? : ', Weluka::$settings['plugin_name']); ?></th>
							<td id="gzip-td">
							  <div>
								<?php $val = !empty($options[self::SPEEDUP_ARRAY_FIELD][self::SPEEDUP_GZIP]) ? $options[self::SPEEDUP_ARRAY_FIELD][self::SPEEDUP_GZIP] : 0;
								$welukaCssUrl = Weluka::$settings['debug'] === true ? 'bootstrap-weluka.css' : 'bootstrap-weluka.min.css';
								$welukaCssUrl = Weluka::$settings['plugin_url'] . 'assets/css/' . $welukaCssUrl;
								$exhtaccessOpt     = array(
									'onoffGzip'    => $val,
									'url'          =>  $welukaCssUrl,
									'enableAtt'    => '<span style="color:#28a745;">' . __('%s is enabled.', Weluka::$settings['plugin_name']) . '</span>',
									'alreadyEnableAtt'  => __('%s is aleady enabled.Nothing to do.', Weluka::$settings['plugin_name']),
									'disableAtt'   => '<span style="color:#ffc107;">' . __('%s is disabled.', Weluka::$settings['plugin_name']) . '</span>',
									'onDisableAtt' => '<span style="color:#dc3545;">' . __('%s is disabled.please check server panel or apache setting etc.', Weluka::$settings['plugin_name']) . '</span>',
									'cannotCheck'  =>'<span style="color:#ffc107;">' . __('Cannot check to enable %s or not.', Weluka::$settings['plugin_name']) . '</span>'
								);
								
								if(!$useApache && $val == 0) :
								?>
								
									<?php _e('You can not use this setting. because you don\'t use apache.', Weluka::$settings['plugin_name']); ?>
								
								<?php else :?>
									<label><input type="checkbox" id="<?php echo self::SPEEDUP_GZIP; ?>" name="<?php echo self::SPEEDUP_GZIP; ?>" value="1" <?php if($val) { echo 'checked="checked"'; } ?> /><?php _e('Set', Weluka::$settings['plugin_name']); ?></label>
								</div>
								<div style="margin-top:10px;">
									<?php  
		
									if(!empty($loadMod) && !isset($loadMod['mod_deflate'])){
											_e('Mod_deflate module was not loaded.', Weluka::$settings['plugin_name']); 
											_e('If you want to use this function,please check to enable mod_deflate module on server panel etc.', Weluka::$settings['plugin_name']); 
											echo '<br>';
										}elseif(empty($loadMod) && $val === 'off'){
											_e('If you want to use this setting,please check to enable mod_deflate module on server panel etc.', Weluka::$settings['plugin_name']);
											echo '<br>';
									}
									_e('If you change this setting, this setting effort other your site in the same server when home url is different from site url', Weluka::$settings['plugin_name']); 
									
								?>
							</div>
							 <?php endif ;//apache or not end ?>
						</td>
						</tr>
						<tr>
							<th><?php _e('Browser Cache', Weluka::$settings['plugin_name']); ?>? : </th>
							<td id="cache-td">
							  <div>
								<?php $val = !empty($options[self::SPEEDUP_ARRAY_FIELD][self::SPEEDUP_CACHE]) ? $options[self::SPEEDUP_ARRAY_FIELD][self::SPEEDUP_CACHE] : 0;

								$exhtaccessOpt['onoffCache'] = $val;
								$exhtaccessOpt['cacheTranslate'] =  __('Browser Cache', Weluka::$settings['plugin_name']);
		
								$chahceNum = !empty($options[self::SPEEDUP_ARRAY_FIELD][self::SPEEDUP_CACHE_LIMIT]) ? $options[self::SPEEDUP_ARRAY_FIELD][self::SPEEDUP_CACHE_LIMIT] : self::SPEEDUP_CACHE_INIT;
								if(!$useApache && $val == 0) : ?>
									<?php _e('You can not use this setting. because you don\'t use apache.', Weluka::$settings['plugin_name']); ?>
								<?php else :  ?>
								<label><input type="checkbox" id="<?php echo self::SPEEDUP_CACHE; ?>" name="<?php echo self::SPEEDUP_CACHE; ?>" value="1" <?php if($val) { echo 'checked="checked"'; } ?> /><?php _e('Set', Weluka::$settings['plugin_name']); ?></label>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<?php _e('Limit of cache : ', Weluka::$settings['plugin_name']); ?><input type="number" name="<?php echo self::SPEEDUP_CACHE_LIMIT ?>" value="<?php echo $chahceNum; ?>" min="1" style="width:4.5em; margin-left:0.5em;"><?php _e('days', Weluka::$settings['plugin_name']); ?>
							   &nbsp;&nbsp;&nbsp;&nbsp;
							  </div>
								<div style="margin-top:10px;">
									<?php  
									if(!empty($loadMod) && !isset($loadMod['mod_expires'])){
													_e('Mod_expires module was not loaded.', Weluka::$settings['plugin_name']); 
													_e('If you want to use this setting,please check to enable mod_expires module on server panel etc.', Weluka::$settings['plugin_name']); 
													echo '<br>';
											}elseif(empty($loadMod) && $val === 'off'){
												_e('If you want to use this setting,please check to enable mod_deflate module on server panel etc.', Weluka::$settings['plugin_name']);
												echo '<br>';
											}
										_e('If you change this setting, this setting effort other your site in the same server when home url is different from site url', Weluka::$settings['plugin_name']); 
									?>
								</div>

								<?php endif ;//apache or not end ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
            <p class="submit"><input type="submit" id="weluka_seo_setting_submit" name="weluka_seo_setting_submit" value="<?php _e('Save', Weluka::$settings['plugin_name']) ;?>" class="button-primary" /></p>
    	</form>
        </div>
        <?php //add script v1.2.7 ?>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			var exJs = <?php echo json_encode( $exhtaccessOpt, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT );
				?>;
			var gzipID  = '#gzip-td';
			var cacheID = '#cache-td';
			$.ajax({
				//NOT to get cached css
				"url": exJs.url + '?ver=' + Math.floor(Math.random() * 1000000000001),
				"type": "GET",
				"cache": false, //This parameter prevent to output error in edge.
			}).then(
				//success
				function(xml, textStatus, xhr) {
					//Edge and IE cannot get content-encoding on css header.
					var gzipUA       = navigator.userAgent.toLowerCase();

					var getEncode    = gzipUA.indexOf('edge') !== -1 || gzipUA.indexOf('trident') !== -1 ? 
									   xhr.getResponseHeader('Etag') : xhr.getResponseHeader('Content-Encoding');
					var getCasheInfo = xhr.getResponseHeader('Cache-Control');
					getEncode    = getEncode    !== null ? getEncode.indexOf('gzip')        !== -1  : false ;
					getCasheInfo = getCasheInfo !== null ? getCasheInfo.indexOf('no-cache') === -1  : false ;

					var attention = '&nbsp;&nbsp;&nbsp;&nbsp';
					if(getEncode){
						if(exJs.onoffGzip == 0){
							attention += exJs.alreadyEnableAtt.replace('%s','Gzip');
							$(gzipID).html(attention);
						}else{
							attention += exJs.enableAtt.replace('%s','Gzip');
							$(gzipID + ">div:first").append(attention);
						}

					}else{
						attention += exJs.onoffGzip == 0 ? exJs.disableAtt.replace('%s','Gzip') : exJs.onDisableAtt.replace('%s','Gzip');
						$(gzipID  + ">div:first" ).append(attention);
					}

					attention = '&nbsp;&nbsp;&nbsp;&nbsp';
					if(getCasheInfo){
						if(exJs.onoffCache == 0){
							attention += exJs.alreadyEnableAtt.replace('%s',exJs.cacheTranslate);
							$(cacheID).html(attention);
						}else{
							attention = exJs.enableAtt.replace('%s',exJs.cacheTranslate);
							$(cacheID + ">div:first").append(attention);
						}
					}else{
						attention +=  exJs.onoffCache == 0 ? exJs.disableAtt.replace('%s',exJs.cacheTranslate) : 
						exJs.onDisableAtt.replace('%s',exJs.cacheTranslate);


						$(cacheID + ">div:first" ).append(attention);
					}

				},
				//fail
				function() {
					$(gzipID).append(exJs.cannotCheck.replace('%s','Gzip'));
					$(cacheID).append(exJs.cannotCheck.replace('%s',exJs.cacheTranslate));
				}
			)
		});
		</script>

<?php
	}

	/**
 	 * seo option db registory
	 * @return void
	 * @update
	 * v1.0.3
	 */
	public static function update_seo_setting($data){
		global $wp_version;
		$errmsg = "";
		try {
			
			$_seoUse			= isset($data[self::SEO_USE]) ? $data[self::SEO_USE] : 0;
			$_homeTitle 		= !empty($data[self::SEO_HOME_TITLE]) ? strip_tags( trim( $data[self::SEO_HOME_TITLE] ) ) : "";
			$_homeKeywords		= !empty($data[self::SEO_HOME_KEYWORDS]) ? strip_tags( trim( $data[self::SEO_HOME_KEYWORDS] ) ) : "";
			$_homeDescription	= !empty($data[self::SEO_HOME_DESCRIPTION]) ? strip_tags( trim( $data[self::SEO_HOME_DESCRIPTION] ) ) : "";
			//v1.0.3 add
			$_relativePath		= !empty($data[self::SEO_RELATIVE_PATH]) ? strip_tags( trim( $data[self::SEO_RELATIVE_PATH] ) ) : "";
			
			$_wpGenerator		= !empty($data[self::META_WP_GENERATOR]) ? $data[self::META_WP_GENERATOR] : 'off';
			$_rsdLink			= !empty($data[self::META_RSD_LINK]) ? $data[self::META_RSD_LINK] : 'on';
			$_wlwManifest		= !empty($data[self::META_WLWMANIFEST_LINK]) ? $data[self::META_WLWMANIFEST_LINK] : 'on';
			$_rssFeed			= !empty($data[self::META_RSS_FEED]) ? $data[self::META_RSS_FEED] : 'on';
			
			//v1.2.7 add
			$_gzip			= isset($data[self::SPEEDUP_GZIP])   ? $data[self::SPEEDUP_GZIP]   : 0;
			$_cache		= isset($data[self::SPEEDUP_CACHE]) ? $data[self::SPEEDUP_CACHE] : 0;
			$_cacheLimit	= !empty($data[self::SPEEDUP_CACHE_LIMIT]) ? $data[self::SPEEDUP_CACHE_LIMIT] : self::SPEEDUP_CACHE_INIT ;
			$writeGzip      = self::insert_htaccess($_gzip,self::SPEEDUP_GZIP);
			$writeCache    = self::insert_htaccess($_cache,self::SPEEDUP_CACHE,$_cacheLimit);
			
			$opt = array(
				self::SEO_ARRAY_FIELD	 => array(
					self::SEO_USE				=> $_seoUse,
					self::SEO_HOME_TITLE		=> $_homeTitle,
					self::SEO_HOME_KEYWORDS		=> $_homeKeywords,
					self::SEO_HOME_DESCRIPTION	=> $_homeDescription,
					self::SEO_RELATIVE_PATH		=> $_relativePath	//v1.0.3 add					
				),
				self::META_ARRAY_FIELD	 => array(
					self::META_WP_GENERATOR			=> $_wpGenerator,
					self::META_RSD_LINK				=> $_rsdLink,
					self::META_WLWMANIFEST_LINK		=> $_wlwManifest,
					self::META_RSS_FEED				=> $_rssFeed
				),
				self::SPEEDUP_ARRAY_FIELD => array(
					self::SPEEDUP_GZIP				=> $_gzip,
					self::SPEEDUP_CACHE			    => $_cache,
					self::SPEEDUP_CACHE_LIMIT	    => $_cacheLimit,
				)
			);
			
			//wp option table add or update
			Weluka::get_instance()->update_option( Weluka::$settings['seo_option_name'], $opt );
			//v1.2.7 add throw htaccess write error.
			if (!empty($writeGzip) || !empty($writeCache)) {
				$writeErrorArray = array(
					'add'    => __('Cannot add %s setting to .htaccess because of permission etc . Please copy and paste the below setting to %s.(If .htaccess does not exist,create the file.)', Weluka::$settings['plugin_name']).'<br>%s',
					'remove' => __('Cannot remove %s setting from .htaccess because of permission etc . Please remove the below setting from %s.', Weluka::$settings['plugin_name']).'<br>%s'
				);
				
				$htaccessPath =  get_home_path().'.htaccess';
				
				$htaccessWriteError = empty($writeGzip) ? '' : sprintf($writeErrorArray[$writeGzip],'Gzip', $htaccessPath,self::htaccess_content(self::SPEEDUP_GZIP,true));
				
				
				if(!empty($writeCache)){
					$settingContent = str_replace('%s',$_cacheLimit,self::htaccess_content(self::SPEEDUP_CACHE,true));
					$htaccessWriteError.=  sprintf($writeErrorArray[$writeCache],__('Browser Cache', Weluka::$settings['plugin_name']), $htaccessPath,$settingContent);
				}
				
				throw new Exception($htaccessWriteError);
			}

		} catch (Exception $e) {
			$errmsg = sprintf( __("option registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
 	 * option setting 値 配列取得
	 * @since 1.0 
 	 * @param	itemName option_name内の取得したいアイテム名（省略可）
 	 * @return  array or string
 	 */
	public static function get_options($item_name = "") {
		$ret = get_option(Weluka::$settings['setting_option_name']);
		if($item_name != "")
			$ret = isset($ret[$item_name]) ? $ret[$item_name] : "";
	
		return $ret;
	}

	/**
 	 * site option 値配列取得
	 * @since 1.0 
 	 * @return  array or string
	 * @update
	 * ver1.0.2 $mode add
 	 */
	public static function get_site_options($opt_name = "", $item_name = "", $mode = false) {
		$_opt_name = $opt_name === "" ? Weluka::$settings['license_option_name'] : $opt_name;

		if( $mode ) {
			$ret = get_option($_opt_name);
		}else{
			$ret = get_site_option($_opt_name, false, false);
		}
		if($item_name != "")
			$ret = isset($ret[$item_name]) ? $ret[$item_name] : "";
	
		return $ret;
	}

	/**
	 * option内 post typesを取得し配列で返す
	 * @since 1.0
	 */
	public static function array_enable_post_types($postTypes = "") {
		$ret = array();
		$_postTypes = $postTypes;
		if($_postTypes === "") {
			$_postTypes = self::get_options(self::BUILDER_ON_FIELD_NAME);
		}
		
		if(isset($_postTypes)){
			$ret = explode(",", $_postTypes); //カンマ区切りを分解
		}
		return $ret;
	}

	/**
	 * option内 disable rolesを取得し配列で返す
	 * @since 1.0
	 */
	public static function array_disable_roles($disableRoles = "") {
		$ret = array();
		$_disableRoles = $disableRoles;
		if($_disableRoles === "") {
			$_disableRoles = self::get_options(self::BUILDER_OFF_ROLES_FIELD_NAME);
		}
		if(isset($_disableRoles)){
			$ret = explode(",", $_disableRoles); //カンマ区切りを分解
		}
		return $ret;
	}
	
	/**
	 * 権限名を取得 （多言語対策）
	 * @since 1.0
	 */
	public static function get_role_name($name) {
		return isset(self::$roleNameStrings[$name]) ? self::$roleNameStrings[$name] : $name;
	}

	/**
	 * option内 web fontsを取得し配列で返す
	 * @since 1.0
	 */
	public static function get_webfonts($type = 'all') {
		$ret = array();
		$fonts = self::get_options(self::USE_WEB_FONTS);
		if($type === 'family') {
			foreach($fonts as $key => $val) {
				$ret[] = self::replace_webfonts_family($key);
			}
		}else{
			$ret = $fonts;
		}
		return $ret;
	}

	/**
	 * web font family string replace
	 * @since 1.0
	 * @param
	 *	string $family ... font family
	 *  string $mode ... name=on display, import= oncss import
	 * @return string
	 */
	public static function replace_webfonts_family($family, $mode = "name") {
		$target	= "_";
		$after	= " ";
		if($mode === "import"){ $after = '+'; }
		return str_replace($target, $after, $family);
	}
	
	/**
	 * webfont enable check
	 * @since 1.0
	 */
	public static function check_webfont_enable() {
		$ret = false;
		//$fname = Weluka::$settings['webfont_css_dir'] . '/' . Weluka::$settings['webfont_css_name'];
		$fname = Weluka::get_instance()->get_webfont_fname();
		$fonts = self::get_options(self::USE_WEB_FONTS);
		if(file_exists($fname) && is_array($fonts)) {
			$ret = true;
		}
		return $ret;
	}
	
	/**
	 * save applist reglist
	 * @since 1.0
	 */
	public static function save_applist_reglist($keyName, $data) {
		global $wp_version;
		$errmsg = "";
		try {
			if($keyName === '') {
				$errmsg = __('Please enter list name.', Weluka::$settings['plugin_name']);
				return $errmsg;
			}			
			$newData = self::get_applist_reglist();
			if(!empty($newData[$keyName])) {
				//update
				$newData[$keyName] = $data;
			} else {
				// add
				$newData += array($keyName => $data);
			}
			//wp option table add or update
			if ( version_compare( $wp_version, '4.2', '<' ) ) {
				update_option(self::APPLIST_REGLIST_OPTION_NAME, $newData);
			} else {
				update_option(self::APPLIST_REGLIST_OPTION_NAME, $newData, false);
			}
		} catch (Exception $e) {
			$errmsg = sprintf( __("list data registory error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
	 * remove applist reglist
	 * @since 1.0
	 */
	public static function remove_applist_reglist($keyName = '') {
		global $wp_version;
		$errmsg = "";
		try {

			if($keyName === '') {
				//all remove
				delete_option(self::APPLIST_REGLIST_OPTION_NAME);
			} else {
				// kyeName data remove
				$newData = self::get_applist_reglist();
				if(!empty($newData[$keyName])) {
					unset($newData[$keyName]); //keyName remove
					if ( version_compare( $wp_version, '4.2', '<' ) ) {
						update_option(self::APPLIST_REGLIST_OPTION_NAME, $newData);
					} else {
						update_option(self::APPLIST_REGLIST_OPTION_NAME, $newData, false);
					}
				}
			}
		} catch (Exception $e) {
			$errmsg = sprintf( __("list data remove error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
		}
		return $errmsg;
	}

	/**
	 * get applist reglist
	 * @since 1.0
	 */
	public static function get_applist_reglist($keyName = '') {
		$ret = get_option(self::APPLIST_REGLIST_OPTION_NAME);
		if($keyName !== '') {
			$ret = !empty($ret[$keyName]) ? $ret[$keyName] : '';
		}
		return is_array($ret) ? $ret : array();
	}

	/**
	 * save custom design
	 * @since 1.0
	 * @update
	 * ver1.0.7
	 */
	public static function save_custom_design($optionName, $keyName, $data) {
		global $wp_version;
		$errmsg = "";
		
		//v1.0.7 add
		$msgName = "custom design";
		if( $optionName === self::COPYTPL_OPTION_NAME ) { $msgName = "copy template"; }
		//v1.0.7 addend

		try {
			if($keyName === '') {
				//$errmsg = __('Please enter custom design name.', Weluka::$settings['plugin_name']);
				$errmsg = sprintf( __("Please enter %s name.", Weluka::$settings['plugin_name'] ), $msgName );
				return $errmsg;
			}

			$newData = self::get_custom_design($optionName);
			if(!empty($newData[$keyName])) {
				//update
				$newData[$keyName] = $data;
			} else {
				// add
				$newData += array($keyName => $data);
			}
			//wp option table add or update
			if ( version_compare( $wp_version, '4.2', '<' ) ) {
				update_option($optionName, $newData);
			} else {
				update_option($optionName, $newData, false);
			}
		} catch (Exception $e) {
			$errmsg = sprintf( __("%s registory error! (%s)", Weluka::$settings['plugin_name'] ), $msgName, $e->getMessage() ); //v1.0.7 modify
		}
		return $errmsg;
	}

	/**
	 * remove custom design
	 * @since 1.0
	 * @update
	 * ver1.0.7
	 */
	public static function remove_custom_design($optionName, $keyName = '') {
		global $wp_version;
		$errmsg = "";

		//v1.0.7 add
		$msgName = "custom design";
		if( $optionName === self::COPYTPL_OPTION_NAME ) { $msgName = "copy template"; }
		//v1.0.7 addend

		try {

			if($keyName === '') {
				//all remove
				delete_option($optionName);
			} else {
				// kyeName data remove
				$newData = self::get_custom_design($optionName);
				if(!empty($newData[$keyName])) {
					unset($newData[$keyName]); //keyName remove
					if ( version_compare( $wp_version, '4.2', '<' ) ) {
						update_option($optionName, $newData);
					} else {
						update_option($optionName, $newData, false);
					}
				}
			}
		} catch (Exception $e) {
			//$errmsg = sprintf( __("custom design remove error! (%s)", Weluka::$settings['plugin_name'] ), $e->getMessage() );
			$errmsg = sprintf( __("%s remove error! (%s)", Weluka::$settings['plugin_name'] ), $msgName, $e->getMessage() ); //v1.0.7 modify
		}
		return $errmsg;
	}

	/**
	 * get wpmenu custom design
	 * @since 1.0
	 */
	public static function get_custom_design($optionName, $keyName = '') {
		$ret = get_option($optionName);
		if($keyName !== '') {
			$ret = !empty($ret[$keyName]) ? $ret[$keyName] : '';
		}
		return is_array($ret) ? $ret : array();
	}
	
	
	/**
	 * htaccess content array
	 * @since 1.2.7
	 */
	private static function htaccess_content($item,$htmlOutput = false) {
		$contentArray = array(
self::SPEEDUP_GZIP => 
"AddType image/x-icon .ico;
<IfModule mod_deflate.c>;
	SetOutputFilter DEFLATE;
	BrowserMatch ^Mozilla/4 gzip-only-text/html;
	BrowserMatch ^Mozilla/4\.0[678] no-gzip;
	BrowserMatch \bMSI[E] !no-gzip !gzip-only-text/html;
	SetEnvIfNoCase Request_URI \.(?:gif|jpe?g|png|ico)$ no-gzip dont-vary;
	SetEnvIfNoCase Request_URI _\.utxt$ no-gzips;
	AddOutputFilterByType DEFLATE text/plain;
	AddOutputFilterByType DEFLATE text/html;
	AddOutputFilterByType DEFLATE text/xml;
	AddOutputFilterByType DEFLATE text/css;
	AddOutputFilterByType DEFLATE application/xhtml+xml;
	AddOutputFilterByType DEFLATE application/xml;
	AddOutputFilterByType DEFLATE application/rss+xml;
	AddOutputFilterByType DEFLATE application/atom_xml;
	AddOutputFilterByType DEFLATE application/x-javascript;
	AddOutputFilterByType DEFLATE application/x-httpd-php;
</IfModule>;
",
self::SPEEDUP_CACHE =>
"<IfModule mod_expires.c>;
  ExpiresActive On;
  ExpiresDefault \"access plus 1 seconds\";
  ExpiresByType text/css \"access plus %s days\";
  ExpiresByType text/js \"access plus %s days\";
  ExpiresByType text/javascript \"access plus %s days\";
  ExpiresByType image/gif \"access plus %s days\";
  ExpiresByType image/jpg \"access plus %s days\";
  ExpiresByType image/jpeg \"access plus %s days\";
  ExpiresByType image/png \"access plus %s days\";
  ExpiresByType image/svg+xml \"access plus %s days\";
  ExpiresByType application/pdf \"access plus %s days\";
  ExpiresByType application/javascript \"access plus %s days\";
  ExpiresByType application/x-javascript \"access plus %s days\";
  ExpiresByType application/x-shockwave-flash \"access plus %s days\";
  ExpiresByType application/x-font-ttf \"access plus %s days\";
  ExpiresByType application/x-font-woff \"access plus %s days\";
  ExpiresByType application/x-font-opentype \"access plus %s days\";
  ExpiresByType application/vnd.ms-fontobject \"access plus %s days\";
  ExpiresByType video/mp4 \"access plus  %s days\";
  ExpiresByType video/ogg \"access plus  %s days\";
  ExpiresByType video/webm \"access plus %s days\";
  ExpiresByType audio/ogg  \"access plus %s days\";
</IfModule>;
	");

		return $htmlOutput ?  nl2br(htmlspecialchars(str_replace(';','',$contentArray[$item]))).'<br>' : $contentArray[$item];
		
		
	}
	

	/**
	 * insert setting to htaccess
	 * @since 1.2.7
	 */
	private static function insert_htaccess(&$opt,$itemKey,$limitDay = '') {
		$ret           = ''; //return error
		$marker        = "weluka_".$itemKey;
		$seoOpt	       = self::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SPEEDUP_ARRAY_FIELD, true);
		$htaccessPath  =  get_home_path().".htaccess";
		
		//add setting to htaccess when off -> on
		if( ( !isset($seoOpt[$itemKey]) || !$seoOpt[$itemKey]) && $opt){
			if(!file_exists($htaccessPath)){
				$ret = touch($htaccessPath) ? '' : 'add';
			}
			
			if(empty($ret)){
				$setting = $limitDay !== '' ? str_replace('%s',$limitDay,self::htaccess_content($itemKey)) : self::htaccess_content($itemKey);
				$setting = str_replace(array("\r\n", "\r", "\n"), '', $setting);

				//write .htaccess!
				$ret = insert_with_markers($htaccessPath,
										   $marker,
										   explode(";",$setting)
										  ) ? '' : 'add';
			}

		}elseif(isset($seoOpt[$itemKey]) && $seoOpt[$itemKey] && file_exists($htaccessPath)){
			//remove setting from htaccess when on -> off
			if(!$opt){
				$ret = insert_with_markers($htaccessPath, $marker,'') ? '' : 'remove';
			}elseif(!empty($limitDay) &&
					$itemKey == self::SPEEDUP_CACHE &&
					isset($seoOpt[self::SPEEDUP_CACHE_LIMIT]) &&
					$limitDay != $seoOpt[self::SPEEDUP_CACHE_LIMIT]){
				
					//on -> on and change days
					//$setting = str_replace('%s',$limitDay,self::htaccess_content($itemKey));
					$setting = str_replace(array("%s","\r\n", "\r", "\n"), array($limitDay,''), self::htaccess_content($itemKey));
					$ret = insert_with_markers($htaccessPath,
											   $marker,
											   explode(";",$setting)
											  ) ? '' : 'add';
			}
				
		}
				
		
		if(!empty($ret)){
			//参照渡しで返す
			$opt = isset($seoOpt[$itemKey]) ? $seoOpt[$itemKey] : 0; 
		}
		
		return $ret;

	}
	

} //end class