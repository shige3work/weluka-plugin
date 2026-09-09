<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

/*--------------------------------------------- [SNS BUTTON WIDGET] ----*/ 

//sns button widgets hook
//modify v1.2.9.1
add_action('widgets_init', function () {
	register_widget("WelukaSnsButtonWidget");
	register_widget("WelukaSnsShareWidget");
});

/**
 * Weluka Plugin SNS BUTTON Widget class
 * @since 1.0
 * 
 */
#[\AllowDynamicProperties]
class WelukaSnsButtonWidget extends WP_Widget {

	// v1.3 add
	protected $defaults;

	/**
	 * constructor
	 * @since 1.0
	 * @update
	 * ver1.3
	 */
	function __construct(){
		global $wp_version, $pagenow;
		//v1.3 modify
		//$widget_ops = array('classname' => 'WelukaSnsButtonWidget', 'description' => __('SNS button display settings.', Weluka::$settings['plugin_name']));
		$widget_ops = array('classname' => 'WelukaSnsButtonWidget', 'description' => __('SNS button display settings.', Weluka::$settings['plugin_name']), 'customize_selective_refresh' => true);

/* v1.3 modify
		if ( version_compare( $wp_version, '4.3', '<' ) ) {
			parent::WP_Widget(false, $name = __('Weluka Social Button', Weluka::$settings['plugin_name']), $widget_ops);
		} else {
			parent::__construct(false, $name = __('Weluka Social Button', Weluka::$settings['plugin_name']), $widget_ops);
		}
*/

		$_builder = WelukaBuilder::get_instance();
		$this->defaults = array(
				"title"					=> "",	//widget title
				"direction"				=> "h",	//h=horizontal, v=vertical
				"class"					=> "weluka-text-center",	//align
				"url_facebook"			=> "",
				"icon_type_facebook"	=> "round",
				"text_facebook"			=> $_builder->sns_buttons['facebook']['button_text'],
				"url_twitter"			=> "",
				"icon_type_twitter"		=> "round",
				"text_twitter"			=> $_builder->sns_buttons['twitter']['button_text'],
				//v1.0.5
				"url_instagram"			=> "",
				"icon_type_instagram"	=> "round",
				"text_instagram"		=> $_builder->sns_buttons['instagram']['button_text'],
				"url_linkedin"			=> "",
				"icon_type_linkedin"	=> "round",
				"text_linkedin"			=> $_builder->sns_buttons['linkedin']['button_text'],
				//v1.0.5 addend
				"url_youtube"			=> "",
				"icon_type_youtube"		=> "round",
				"text_youtube"			=> $_builder->sns_buttons['youtube']['button_text'],
				//v1.0.5
				"url_vimeo"				=> "",
				"icon_type_vimeo"		=> "round",
				"text_vimeo"			=> $_builder->sns_buttons['vimeo']['button_text'],
				//v1.0.5 addend
				"url_google"			=> "",
				"icon_type_google"		=> "round",
				"text_google"			=> $_builder->sns_buttons['google']['button_text'],
			);

		$widget_slug = 'weluka-sns-button-widget';
		$widget_name = __('Weluka Social Button', Weluka::$settings['plugin_name']);
		if ( version_compare( $wp_version, '4.3', '<' ) ) {
			parent::WP_Widget(false, $widget_name, $widget_ops);
		} else {
			parent::__construct($widget_slug, $widget_name, $widget_ops);
		}
		
 	}

	/**
	 * widget display site WP_Widget override
	 *
	 * @param array $args, array $instance = setting array
	 * @since 1.0
	 * @update
	 * ver1.3
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$widget_title = apply_filters('widget_weluka_sns_button_title', empty( $instance['title'] ) ? '' : $instance['title']);
		$direction = apply_filters('widget_weluka_sns_button_direction', empty( $instance['direction'] ) ? '' : $instance['direction']);
		$class = apply_filters('widget_weluka_sns_button_align', empty( $instance['class'] ) ? '' : $instance['class']);
		$buttons = apply_filters('widget_weluka_sns_button_buttons', empty( $instance['buttons'] ) ? '' : $instance['buttons']);

		$_builder = WelukaBuilder::get_instance();

		//v1.3 add mdify
		if( empty( $buttons ) ) {
			$buttons = array();
			foreach($_builder->sns_buttons as $key => $sns) :
				$key_url = "url_" . $key;
				if(isset($instance[$key_url]) && strlen(trim($instance[$key_url])) > 0) {
					$key_icon_type	= 'icon_type_' . $key;
					$key_icon_size	= 'icon_size_' . $key;
					$key_text		= 'text_' . $key;

					$arr = array(
						"name"		=> $key,
						"url"		=> trim($instance[$key_url]),
						"icon_type"	=> isset($instance[$key_icon_type]) && strlen($instance[$key_icon_type]) > 0 ? $instance[$key_icon_type] : "round",
						"size"		=> isset($instance[$key_icon_size]) && strlen($instance[$key_icon_size]) > 0 ? $instance[$key_icon_size] : "",
						"text"		=> isset($instance[$key_text]) && strlen($instance[$key_text]) > 0 ? $instance[$key_text] : "",
					);
					$buttons[] = $arr;
				}
			endforeach;
		}
		//v1.3 add modify end

		echo $before_widget; //register_sidebar指定値出力

		if ( $widget_title ) {
			echo $before_title . $widget_title . $after_title; //$before_title, $after_title register_sidebar
		}

		$item = array(
			"class"		=> $class,
			"direction"	=> $direction,
			"buttons"	=> $buttons
		);

		if(has_filter('widget_weluka_sns_button_content') == false) :
			$content = $_builder->widget_snsbutton_html($item, false);
		else :
			$content = apply_filters('widget_weluka_sns_button_content', $item);
		endif;

		echo $content;
		echo $after_widget;
	}

	/**
	 * display widget form
	 *
	 * @param array $instance = old setting array
	 * @since 1.0
	 * @update
	 * ver1.0.5
	 * ver1.3
	 */
	function form( $instance ) {
		$_builder = WelukaBuilder::get_instance();
		//Default value
		//v1.3 modify
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$title = esc_attr( $instance['title'] );
		$direction = esc_attr( $instance['direction'] );
		$class = esc_attr( $instance['class'] );
?>	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value="<?php echo $title; ?>" />
            <br /><small><?php _e('Please set the widget display at the title.', Weluka::$settings['plugin_name']); ?></small>
		</p>

		<?php foreach($_builder->sns_buttons as $key => $sns) : ?>
        <?php $buttonInfo = $this->get_sns_info($key, $instance); ?>
		<div style="margin:1em 0;">
       		<div style="border-bottom:2px dashed #ccc; padding-bottom:4px;"><label><?php echo $sns['label']; ?></label></div>
           	<div style="margin-top:10px;">
           		<?php $key_name = 'url_' . $key; ?>
           		<label for="<?php echo $this->get_field_id($key_name); ?>"><?php _e('URL', Weluka::$settings['plugin_name']); ?></label>
	       		<input id="<?php echo $this->get_field_id($key_name); ?>" name="<?php echo $this->get_field_name($key_name); ?>" type="text" class="widefat" value="<?php echo esc_attr($buttonInfo[$key_name]); ?>" />
        		<br /><small><?php _e('It will be outside the display object in the SNS URL not entered.', Weluka::$settings['plugin_name']); ?></small>
				<small>
				<?php if($key === 'google'){
					_e('Google+ is obsoleted.', Weluka::$settings['plugin_name']);
				} ?>
				</small>
            </div>
           	<div style="margin-top:10px;">
           		<?php $key_name = 'text_' . $key; ?>
           		<label for="<?php echo $this->get_field_id($key_name); ?>"><?php _e('Button Text', Weluka::$settings['plugin_name']); ?></label>
	       		<input id="<?php echo $this->get_field_id($key_name); ?>" name="<?php echo $this->get_field_name($key_name); ?>" type="text" class="widefat" value="<?php echo esc_attr($buttonInfo[$key_name]); ?>" />
            </div>
		</div>
        
       	<?php endforeach; ?>
		<p>
			<label for="<?php echo $this->get_field_id('class'); ?>"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
	        <select id="<?php echo $this->get_field_id('class'); ?>" name="<?php echo $this->get_field_name('class'); ?>" class="widefat">
    	    	<option value="weluka-text-left" <?php if($class === 'weluka-text-left'){ echo 'selected="selected"'; } ?>><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
        	    <option value="weluka-text-center" <?php if($class === 'weluka-text-center'){ echo 'selected="selected"'; } ?>><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
        	    <option value="weluka-text-right" <?php if($class === 'weluka-text-right'){ echo 'selected="selected"'; } ?>><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
           	</select>
		</p>
<?php
	}

	/**
	 * widget form save WP_Widget override
	 * @since 1.0
	 * @param array $new_instance = new setting（to request form）, array $old_instance = old setting
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$_builder = WelukaBuilder::get_instance();
		$instance["title"]	= isset($new_instance["title"]) && $new_instance["title"] ? strip_tags(trim($new_instance["title"])) : "";
		$instance["class"] = isset($new_instance["class"]) && $new_instance["class"] ? $new_instance["class"] : "";

		foreach($_builder->sns_buttons as $key => $sns) :
			$key_name = 'url_' . $key;
			$instance[$key_name]		= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? trim($new_instance[$key_name]) : "";
			
			$key_name = 'icon_type_' . $key;
			$instance[$key_name]	= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? $new_instance[$key_name] : "round";

			$key_name = 'icon_size_' . $key;
			$instance[$key_name]	= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? $new_instance[$key_name] : "";

			$key_name = 'text_' . $key;
			$instance[$key_name]	= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? strip_tags(trim($new_instance[$key_name])) : "";

		endforeach;
		return $instance;
	}
	
	/**
	 * get registory snsn button info
	 * @since 1.0
	 * @update
	 * ver1.3
	 */
	function get_sns_info($key, $instance) {

		$key_url		= "url_" . $key;
		$key_icon_type	= "icon_type_" . $key;
		$key_icon_size	= "icon_size_" . $key;
		$key_text		= "text_" . $key;
		
		$ret = array(
			$key_url		=> isset($instance[$key_url]) ? $instance[$key_url] : "",
			$key_icon_type	=> isset($instance[$key_icon_type]) ? $instance[$key_icon_type] : "round",
			$key_icon_size	=> isset($instance[$key_icon_size]) ? $instance[$key_icon_size] : "",
			$key_text		=> isset($instance[$key_text]) ? $instance[$key_text] : "",
		);

		return $ret;
	}
} //WelukaSnsButtonWidget end class

/*--------------------------------------------- [SNS BUTTON WIDGET] ----*/ 

/**
 * Weluka Plugin SNS SHARE BUTTON Widget class
 * @since 1.0
 * @update
 * ver1.3
 */
#[\AllowDynamicProperties]
class WelukaSnsShareWidget extends WP_Widget {

	// v1.3 add
	protected $defaults;

	/**
	 * constructor
	 * @since 1.0
	 * @update
	 * ver1.3
	 */
	function __construct(){
		global $wp_version;
		//v1.3 modify
		//$widget_ops = array('classname' => 'WelukaSnsShareWidget', 'description' => __('SNS Share button display settings.', Weluka::$settings['plugin_name']));
		$widget_ops = array('classname' => 'WelukaSnsButtonWidget', 'description' => __('SNS button display settings.', Weluka::$settings['plugin_name']), 'customize_selective_refresh' => true);

/* v1.3 modify
		if ( version_compare( $wp_version, '4.3', '<' ) ) {
			parent::WP_Widget(false, $name = __('Weluka Social Share Button', Weluka::$settings['plugin_name']), $widget_ops);
		} else {
			parent::__construct(false, $name = __('Weluka Social Share Button', Weluka::$settings['plugin_name']), $widget_ops);
		}
*/

		$this->defaults = array(
				"title"					=> "",	//widget title
				"direction"				=> "h",	//h=horizontal, v=vertical
				"class"					=> "weluka-text-center",	//align
				"url_facebook"			=> WelukaBuilder::SNS_AUTO_SETTING, //add v1.2.6
				"icon_type_facebook"	=> "round",
				"text_facebook"			=> "",
				"label_text_facebook"	=> "",
				"counter_facebook"		=> "",	//v1.0.5
				"account_facebook"		=> "",
				"url_twitter"			=> WelukaBuilder::SNS_AUTO_SETTING, //add v1.2.6
				"icon_type_twitter"		=> "round",
				"text_twitter"			=> WelukaBuilder::SNS_AUTO_SETTING, //add v1.2.6
				"label_text_twitter"	=> "",
				"counter_twitter"		=> "",	//v1.0.5
				"account_twitter"		=> "",
				"url_hatebu"			=> WelukaBuilder::SNS_AUTO_SETTING, //add v1.2.6
				"icon_type_hatebu"		=> "round",
				"text_hatebu"			=> "",
				"label_text_hatebu"		=> "",
				"counter_hatebu"		=> "",	//v1.0.5
				"account_hatebu"		=> "",
				"url_line"				=> WelukaBuilder::SNS_AUTO_SETTING, //add v1.2.6
				"icon_type_line"		=> "round",
				"text_line"				=> WelukaBuilder::SNS_AUTO_SETTING, //add v1.2.6
				"label_text_line"		=> "",
				"counter_line"			=> "",	//v1.0.5
				"account_line"			=> "",
				"url_pocket"			=> WelukaBuilder::SNS_AUTO_SETTING, //add v1.2.6
				"icon_type_pocket"		=> "round",
				"text_pocket"			=> "",
				"label_text_pocket"		=> "",
				"counter_pocket"		=> "",	//v1.0.5
				"account_pocket"		=> "",
				"url_google"			=> "", 
				"icon_type_google"		=> "round",
				"text_google"			=> "",
				"label_text_google"		=> "",
				"counter_google"		=> "",
				"account_google"		=> "",
		);


		$widget_slug = 'weluka-snsshare-widget';
		$widget_name = __('Weluka Social Share Button', Weluka::$settings['plugin_name']);
		if ( version_compare( $wp_version, '4.3', '<' ) ) {
			parent::WP_Widget(false, $widget_name, $widget_ops);
		} else {
			parent::__construct($widget_slug, $widget_name, $widget_ops);
		}

 	}

	/**
	 * widget display site WP_Widget override
	 *
	 * @param array $args, array $instance = setting array
	 * @since 1.0
	 * @update
	 * ver1.3
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$widget_title = apply_filters('widget_weluka_sns_share_button_title', empty( $instance['title'] ) ? '' : $instance['title']);
		$direction = apply_filters('widget_weluka_sns_share_button_direction', empty( $instance['direction'] ) ? '' : $instance['direction']);
		$class = apply_filters('widget_weluka_sns_share_button_align', empty( $instance['class'] ) ? '' : $instance['class']);
		$buttons = apply_filters('widget_weluka_sns_share_button_buttons', empty( $instance['buttons'] ) ? '' : $instance['buttons']);

		$_builder = WelukaBuilder::get_instance();

		//v1.3 add mdify
		if( empty( $buttons ) ) {
			$buttons = array();
			foreach($_builder->sns_share_buttons as $key => $sns) :
				$key_url = "url_" . $key;
				if(isset($instance[$key_url]) && strlen(trim($instance[$key_url])) > 0) {
					$key_icon_type	= 'icon_type_' . $key;
					$key_icon_size	= 'icon_size_' . $key;
					$key_text		= 'text_' . $key;
					$key_label_text	= 'label_text_' . $key;
					$key_account	= 'account_' . $key;
					$key_counter	= 'counter_' . $key;

					$arr = array(
						"name"			=> $key,
						"url"			=> trim($instance[$key_url]),
						"icon_type"		=> isset($instance[$key_icon_type]) && strlen($instance[$key_icon_type]) > 0 ? $instance[$key_icon_type] : "round",
						"size"			=> isset($instance[$key_icon_size]) && strlen($instance[$key_icon_size]) > 0 ? $instance[$key_icon_size] : "",
						"text"			=> isset($instance[$key_text]) && strlen($instance[$key_text]) > 0 ? $instance[$key_text] : "",
						"label_text"	=> isset($instance[$key_label_text]) && strlen($instance[$key_label_text]) > 0 ? $instance[$key_label_text] : "",
						"counter"		=> isset($instance[$key_counter]) && strlen($instance[$key_counter]) > 0 ? $instance[$key_counter] : "",
						"account"		=> isset($instance[$key_account]) && strlen($instance[$key_account]) > 0 ? $instance[$key_account] : "",
					);
					$buttons[] = $arr;
				}
			endforeach;
		}
		//v1.3 add modify end

		echo $before_widget; //register_sidebar指定値出力

		if ( $widget_title ) {
			echo $before_title . $widget_title . $after_title; //$before_title, $after_title register_sidebar
		}

		$item = array(
			"class"		=> $class,
			"direction"	=> $direction,
			"buttons"	=> $buttons
		);

		if(has_filter('widget_weluka_sns_share_button_content') == false) :
			$content = do_shortcode($_builder->widget_snsshare_html($item, false));
		else :
			$content = apply_filters('widget_weluka_sns_share_button_content', $item);
		endif;

		echo $content;
		echo $after_widget;
	}

	/**
	 * display widget form 
	 *
	 * @param array $instance = old setting array
	 * @since 1.0
	 * @update
	 * ver1.0.5
	 * ver1.3
	 */
	function form( $instance ) {
		$_builder = WelukaBuilder::get_instance();
		//Default value
/* v1.3 modify
		$instance = wp_parse_args( (array) $instance, array(
				"title"					=> "",	//widget title
				"direction"				=> "h",	//h=horizontal, v=vertical
				"class"					=> "weluka-text-center",	//align
				"buttons"				=> array(
					array(
						"name"		=> "facebook",						
						"url"		=> WelukaBuilder::SNS_AUTO_SETTING,//add v1.2.6
						"icon_type"	=> "round",
						"text"		=> "",
						"label_text"	=> "",
						//"flg_counter"	=> "on",
						"counter"	=> "",	//v1.0.5
						"account"	=> ""
					),
					array(
						"name"		=> "twitter",						
						"url"		=> WelukaBuilder::SNS_AUTO_SETTING,//add v1.2.6
						"icon_type"	=> "round",
						"text"		=> WelukaBuilder::SNS_AUTO_SETTING,//add v1.2.6
						"label_text"	=> "",
						//"flg_counter"	=> "on",
						"counter"	=> "",	//v1.0.5
						"account"	=> ""
					),
					array(
						"name"		=> "google",
						"url"		=> "",//add v1.2.6 //modify v1.2.8
						"icon_type"	=> "round",
						"text"		=> "",
						"label_text"	=> "",
						//"flg_counter"	=> "on",
						"counter"	=> "",	//v1.0.5
						"account"	=> ""
					),
					array(
						"name"		=> "hatebu",						
						"url"		=> WelukaBuilder::SNS_AUTO_SETTING,//add v1.2.6
						"icon_type"	=> "round",
						"text"		=> "",
						"label_text"	=> "",
						//"flg_counter"	=> "on",
						"counter"	=> "",	//v1.0.5
						"account"	=> ""
					),
					array(
						"name"		=> "line",
						"url"		=> WelukaBuilder::SNS_AUTO_SETTING,//add v1.2.6
						"icon_type"	=> "round",
						"text"		=> WelukaBuilder::SNS_AUTO_SETTING,//add v1.2.6
						"label_text"	=> "",
						//"flg_counter"	=> "on",
						"counter"	=> "",	//v1.0.5
						"account"	=> ""
					),
					array(
						"name"		=> "pocket",
						"url"		=> WelukaBuilder::SNS_AUTO_SETTING,//add v1.2.6			
						"icon_type"	=> "round",
						"text"		=> "",
						"label_text"	=> "",
						//"flg_counter"	=> "on",
						"counter"	=> "",	//v1.0.5
						"account"	=> ""
					),
				),
			)
		);
*/
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$title       = esc_attr( $instance['title'] );
		$direction   = esc_attr( $instance['direction'] );
		$class       = esc_attr( $instance['class'] );
		//v1.3 comment out
		//$buttons     = $instance['buttons'];
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value="<?php echo $title; ?>" />
            <br /><small><?php _e('Please set the widget display at the title.', Weluka::$settings['plugin_name']); ?></small>
		</p>
		<?php foreach($_builder->sns_share_buttons as $key => $sns) : ?>
        <?php $buttonInfo = $this->get_sns_info($key, $instance); ?>
		<div style="margin:1em 0;">
			
			<div style="border-bottom:2px dashed #ccc; padding-bottom:4px;"><label><?php echo $sns['label']; ?></label></div>
           	<div style="margin-top:10px;">
           		<?php $key_name = 'url_' . $key; ?>
           		<label for="<?php echo $this->get_field_id($key_name); ?>"><?php _e('URL', Weluka::$settings['plugin_name']); ?></label>
				<?php if(esc_attr($buttonInfo[$key_name]) ==  WelukaBuilder::SNS_AUTO_SETTING){
						  $urlVal = ''; $urlChk = 'checked="checked"';
					}elseif(esc_attr($buttonInfo[$key_name])){
						  $urlVal = esc_attr($buttonInfo[$key_name]); $urlChk = '';
					}else{$urlVal = ''; $urlChk = '';} ?>
				<input id="<?php echo $this->get_field_id($key_name); ?>" name="<?php echo $this->get_field_name($key_name); ?>" type="text" class="widefat" value="<?php echo $urlVal; ?>" />

				<?php //v1.2.6 add ?>
				<div style="margin:3px 0;"><label>
					<input id="<?php echo $this->get_field_id('url_' . $key) . 'chk'; ?>" type="checkbox" name="<?php echo $this->get_field_name($key_name); ?>" value="<?php echo  WelukaBuilder::SNS_AUTO_SETTING; ?>" <?php echo $urlChk; ?> ><?php _e("Auto setting by url of display pages", Weluka::$settings['plugin_name']); ?></label></div>
				<?php //v1.2.6 addend ?>

        		<small><?php _e('It will be outside the display object in the SNS URL or checkbox not entered.', Weluka::$settings['plugin_name']); ?></small>
				<small>
				<?php if($key === 'google'){
					_e('Google+ is obsoleted.', Weluka::$settings['plugin_name']);
				} ?>
				</small>
            </div>
			<?php //v1.2.4.5 add ?>
			<?php if($key === 'twitter' || $key === 'line') : 
           		$key_name = 'text_' . $key;
				if(esc_attr($buttonInfo[$key_name]) ==  WelukaBuilder::SNS_AUTO_SETTING){
					 $txtVal = ''; $txtChk = 'checked="checked"';
				}elseif(esc_attr($buttonInfo[$key_name])){
					 $txtVal = esc_attr($buttonInfo[$key_name]); $txtChk = '';
				}else{ $txtVal = ''; $txtChk = '';}
			?>
           		<div style="margin-top:10px;">
                	<label for="<?php echo $this->get_field_id($key_name); ?>"><?php _e('Text', Weluka::$settings['plugin_name']); ?></label>
					<input id="<?php echo $this->get_field_id($key_name); ?>" name="<?php echo $this->get_field_name($key_name); ?>" type="text" class="widefat" value="<?php echo $txtVal; ?>" />
					<?php //v1.2.6 add ?>
					<div style="margin-top:3px;"><label>
						<input id="<?php echo $this->get_field_id('text_' . $key).'chk'; ?>" type="checkbox" name="<?php echo $this->get_field_name($key_name); ?>" value="<?php echo  WelukaBuilder::SNS_AUTO_SETTING; ?>" <?php echo $txtChk; ?> ><?php _e("Auto setting by title of display pages", Weluka::$settings['plugin_name']); ?></label></div>
					<?php //v1.2.6 addend ?>
                </div>
			<?php endif; ?>
			<?php if($key === 'twitter') : ?>
           		<?php $key_name = 'account_' . $key; ?>
           		<div style="margin-top:10px;">
                	<label for="<?php echo $this->get_field_id($key_name); ?>"><?php _e('Account', Weluka::$settings['plugin_name']); ?></label>
	       			<input id="<?php echo $this->get_field_id($key_name); ?>" name="<?php echo $this->get_field_name($key_name); ?>" type="text" class="widefat" value="<?php echo esc_attr($buttonInfo[$key_name]); ?>" />
                    <br /><small><?php _e('Please do not enter the beginning of the @ mark.', Weluka::$settings['plugin_name']); ?></small>
                </div>
			<?php endif; ?>
            <?php //v1.0.5 add ?>
           	<div style="margin-top:10px;">
				<?php if($key === 'twitter' || $key === 'facebook' || $key === 'hatebu' ) : ?>
           		<?php $key_name = 'counter_' . $key; ?>
            	<?php $chk = ''; if( isset( $buttonInfo[$key_name] ) && $buttonInfo[$key_name] == 'hide' ) { $chk = 'checked="checked"'; } ?>
	       		<input id="<?php echo $this->get_field_id($key_name); ?>" name="<?php echo $this->get_field_name($key_name); ?>" type="checkbox" value="hide" <?php echo $chk; ?> />
           		<label for="<?php echo $this->get_field_id($key_name); ?>"><?php _e('Hide the number of shares.', Weluka::$settings['plugin_name']); ?></label>
				<?php endif; ?>
				<?php if($key === 'twitter') : ?>
	        		<br /><small><?php _e('Please register your site with Twitter shares acquisition service (<a href="//jsoon.digitiminimi.com/" target="_blank" class="weluka-a">count.jsoon</a>) If you want to display.', Weluka::$settings['plugin_name']); ?></small>
				<?php endif; ?>
            </div>            
            <?php //v1.0.5 addednd ?>
		</div>
        
       	<?php endforeach; ?>
		<p>
			<label for="<?php echo $this->get_field_id('class'); ?>"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
	        <select id="<?php echo $this->get_field_id('class'); ?>" name="<?php echo $this->get_field_name('class'); ?>" class="widefat">
    	    	<option value="weluka-text-left" <?php if($class === 'weluka-text-left'){ echo 'selected="selected"'; } ?>><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
        	    <option value="weluka-text-center" <?php if($class === 'weluka-text-center'){ echo 'selected="selected"'; } ?>><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
        	    <option value="weluka-text-right" <?php if($class === 'weluka-text-right'){ echo 'selected="selected"'; } ?>><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
           	</select>
		</p>
<?php
	}

	/**
	 * widget form save WP_Widget override
	 * @since 1.0
	 * @param array $new_instance = new setting（to request form）, array $old_instance = old setting
	 * @update
	 * ver1.0.5
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$_builder = WelukaBuilder::get_instance();

		$instance["title"]	= isset($new_instance["title"]) && $new_instance["title"] ? strip_tags(trim($new_instance["title"])) : "";
		$instance["class"] = isset($new_instance["class"]) && $new_instance["class"] ? $new_instance["class"] : "";

/* v1.3 modify
		$buttons = array();
		foreach($_builder->sns_share_buttons as $key => $sns) :
			$keyName = 'url_' . $key;
			if(isset($new_instance[$keyName]) && strlen(trim($new_instance[$keyName])) > 0) {
				$button["name"]		= $key;
				$button["url"]		= trim($new_instance[$keyName]);
				$keyName = 'type_' . $key;
				$button["icon_type"]	= isset($new_instance[$keyName]) && strlen($new_instance[$keyName]) > 0 ? $new_instance[$keyName] : "round";
				$keyName = 'size_' . $key;
				$button["icon_size"]	= isset($new_instance[$keyName]) && strlen($new_instance[$keyName]) > 0 ? $new_instance[$keyName] : "";
				$keyName = 'text_' . $key;
				$button["text"]	= isset($new_instance[$keyName]) && strlen(trim($new_instance[$keyName])) > 0 ? strip_tags(trim($new_instance[$keyName])) : "";
				$keyName = 'lbltext_' . $key;
				$button["label_text"]	= isset($new_instance[$keyName]) && strlen(trim($new_instance[$keyName])) > 0 ? strip_tags(trim($new_instance[$keyName])) : "";
				$keyName = 'account_' . $key;
				$button["account"]	= isset($new_instance[$keyName]) && strlen(trim($new_instance[$keyName])) > 0 ? strip_tags(trim($new_instance[$keyName])) : "";
				//v1.0.5 add
				$keyName = 'counter_' . $key;
				$button["counter"]	= isset($new_instance[$keyName]) && strlen(trim($new_instance[$keyName])) > 0 ? $new_instance[$keyName] : "";
				//v1.0.5 addend
				$buttons[] = $button;
			}
		endforeach;
		$instance["buttons"] = $buttons;
*/

		foreach($_builder->sns_share_buttons as $key => $sns) :
			$key_name = 'url_' . $key;
			$instance[$key_name]		= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? trim($new_instance[$key_name]) : "";
			
			$key_name = 'icon_type_' . $key;
			$instance[$key_name]	= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? $new_instance[$key_name] : "round";

			$key_name = 'icon_size_' . $key;
			$instance[$key_name]	= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? $new_instance[$key_name] : "";

			$key_name = 'text_' . $key;
			$instance[$key_name]	= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? strip_tags(trim($new_instance[$key_name])) : "";

			$key_name = 'label_text_' . $key;
			$instance[$key_name]	= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? strip_tags(trim($new_instance[$key_name])) : "";

			$key_name = 'account_' . $key;
			$instance[$key_name]	= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? strip_tags(trim($new_instance[$key_name])) : "";

			$key_name = 'counter_' . $key;
			$instance[$key_name]	= isset($new_instance[$key_name]) && strlen($new_instance[$key_name]) > 0 ? $new_instance[$key_name] : "";
		endforeach;
		return $instance;
	}

	/**
	 * get registory sns share button info
	 * @since 1.0
	 * @update
	 * ver1.3
	 */
	function get_sns_info($key, $instance) {
/* v1.3 modify
		$ret = array(
			"url"		=> "",
			"icon_type"	=> "round",
			"text"		=> "",
			"icon_size"	=> "",
			"label_text"	=> "",
			"flg_counter"	=> "on",
			"account"	=> ""
		);
		if(isset($buttons) && is_array($buttons)) {
			foreach($buttons as $button) {
				if(strcasecmp($key, $button['name']) === 0) {
					$ret["url"]			= isset($button["url"]) ? $button["url"] : "";
					$ret["icon_type"]	= isset($button["icon_type"]) ? $button["icon_type"] : "round";
					$ret["icon_size"]	= isset($button["icon_size"]) ? $button["icon_size"] : "";
					$ret["text"]		= isset($button["text"]) ? $button["text"] : "";
					$ret["label_text"]	= isset($button["label_text"]) ? $button["label_text"] : "";
					$ret["flg_counter"]	= isset($button["flg_counter"]) ? $button["flg_counter"] : "on";
					$ret["account"]		= isset($button["account"]) ? $button["account"] : "";
					break;
				}
			}
		}
*/		
		$key_url		= "url_" . $key;
		$key_icon_type	= "icon_type_" . $key;
		$key_icon_size	= "icon_size_" . $key;
		$key_text		= "text_" . $key;
		$key_label_text	= "label_text_" . $key;
		$key_counter	= "counter_" . $key;
		$key_account	= "account_" . $key;
		
		$ret = array(
			$key_url		=> isset($instance[$key_url]) ? $instance[$key_url] : "",
			$key_icon_type	=> isset($instance[$key_icon_type]) ? $instance[$key_icon_type] : "round",
			$key_icon_size	=> isset($instance[$key_icon_size]) ? $instance[$key_icon_size] : "",
			$key_text		=> isset($instance[$key_text]) ? $instance[$key_text] : "",
			$key_label_text	=> isset($instance[$key_label_text]) ? $instance[$key_label_text] : "",
			$key_counter	=> isset($instance[$key_counter]) ? $instance[$key_counter] : "",
			$key_account	=> isset($instance[$key_account]) ? $instance[$key_account] : "",
		);

		return $ret;
	}

} //WelukaSnsShareWidget end class