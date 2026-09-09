<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Weluka Plugin Seo class
 * @since 1.0
 * 　
 */
#[\AllowDynamicProperties]
class WelukaSeo {
	
	/**
	 * Holds the singleton instance of this class
	 * @var WelukaUpdater
	 */

	/**
	 * @since 1.0
	 */
	private static $instance = false;

	/**
	 * constructor
	 * @since 1.0
	 */
	private function __construct() {
 	}

	/**
	 * singloton instance
	 * @since 1.0
	 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new WelukaSeo;
		}
		return self::$instance;
	}

	/**
	 * wp_head hhok
	 * @since 1.0
	 */
	public function add_head() {
		$this->add_seotag();
		$this->add_icon();
		//$this->add_ogptag(); //Obsolete
	}

	/**
	 * @since 1.0.1
	 * @update
	 * v1.0.2
	 * v1.0.3 delete
	 */
	/*
	public function template_redirect() {
		//v1.0.2
		//$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD);
		$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD, true);
		//v1.0.2 end
		if( empty( $seoOpt[WelukaAdminSettings::SEO_USE] ) ){ return false; }
		ob_start( array( $this, 'output_callback_for_title' ) );
	}

	public function output_callback_for_title( $content ) {
		$ct = preg_replace( '/<title([^>]*?)\s*>([^<]*?)<\/title\s*>/is', '', $content, 1 );
		///<meta[^>]+(http\-equiv|name)=\"([^\"]*)\"[^>]" . "+content=\"([^\"]*)\"[^>]*>/i
		//$ct = preg_replace( "/<title>(.*?)<\/title>/s", '', $content, 1 );
		error_log($ct);
		return $ct;
	}
	*/

	/**
	 * @since 1.0.3
	 */
	public function get_header() {
		//v1.0.2
		//$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD);
		$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD, true);
		//v1.0.2 end
		//v1.0.3 if( empty( $seoOpt[WelukaAdminSettings::SEO_USE] ) ){ return false; }
		if( empty( $seoOpt[WelukaAdminSettings::SEO_USE] ) && empty( $seoOpt[WelukaAdminSettings::SEO_RELATIVE_PATH] )){ return false; }
		ob_start( array( $this, 'output_callback_for_replace_html' ) );
	}

	public function output_callback_for_replace_html( $content ) {
		$ret = $content;
		$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD, true);
		if( !empty( $seoOpt[WelukaAdminSettings::SEO_USE] ) ){
			$ret = preg_replace( '/<title([^>]*?)\s*>([^<]*?)<\/title\s*>/is', '', $content, 1 );
			///<meta[^>]+(http\-equiv|name)=\"([^\"]*)\"[^>]" . "+content=\"([^\"]*)\"[^>]*>/i
			//$ct = preg_replace( "/<title>(.*?)<\/title>/s", '', $content, 1 );
		}
		
		if( !empty( $seoOpt[WelukaAdminSettings::SEO_RELATIVE_PATH] ) ) {
			//url replace
			//$ret = str_replace( array( 'http:', 'https:' ), array( '', '' ), $ret );
			$_base_url = Weluka::get_instance()->get_base_url();
			if( (int)$seoOpt[WelukaAdminSettings::SEO_RELATIVE_PATH] === 2 ) { //http(s) omitted
				$ret = $this->http_omitted_cancel( $ret );
				$_p = array('http://', 'https://' );
				$_after = array( '//', '//' );
				$ret = str_replace( $_p, $_after, $ret );
				$ret = $this->http_omitted_cancel( $ret, 1 );
			} else {
				$ret = $this->http_omitted_cancel( $ret );
				$_noprotocol = str_replace( '//', '', Weluka::get_instance()->set_url($_base_url) ); //http: or https:なし
				//$_p = array('http://' . $_noprotocol, 'https://' . $_noprotocol, 'http:\/\/' . $_noprotocol, 'https:\/\/' . $_noprotocol );
				//$_after = array( '//' . $_noprotocol, '//' . $_noprotocol ,  '\/\/' . $_noprotocol, '\/\/' . $_noprotocol );
				//json内は変換しない
				$_p = array('http://' . $_noprotocol, 'https://' . $_noprotocol );
				$_after = array( '//' . $_noprotocol, '//' . $_noprotocol );
				$ret = str_replace( $_p, $_after, $ret );

				if( (int)$seoOpt[WelukaAdminSettings::SEO_RELATIVE_PATH] === 1 ) { //relative enabled
					$_before = array( '//' . $_noprotocol, '//' . $_noprotocol ); //json内は変換しない
					$ret = str_replace( $_before, '', $ret );
					//$home_url = trailingslashit(get_home_url('/'));
        			//$ret = str_replace( $home_url, './', $ret );
				}
				$ret = $this->http_omitted_cancel( $ret, 1 );
			}
		}
		return $ret;
	}
	
	/**
	 * @since 1.0.3
	 */
	public function http_omitted_cancel( $ct, $mode = 0 ) {
		$ret = $ct;
		$_base_url = Weluka::get_instance()->get_base_url();
		$_noprotocol = Weluka::get_instance()->set_url($_base_url); //http: or https:なし

		//share url対応
		$_fbshareurl1			= 'facebook.com/sharer.php?u=http:' . $_noprotocol;
		$_fbshareurl2			= 'facebook.com/sharer.php?u=https:' . $_noprotocol;
		$_fbshareurl3			= 'facebook.com/sharer.php?u=' . $_base_url;
		$_fbshareurl_after		= 'facebook.com/sharer.php?u=//dummy';

		$_twsahreurl1			= 'twitter.com/share?url=http:' . $_noprotocol;
		$_twsahreurl2			= 'twitter.com/share?url=https:' . $_noprotocol;
		$_twsahreurl3			= 'twitter.com/share?url=' . $_base_url;
		$_twsahreurl_after		= 'twitter.com/share?url=//dummy';

		$_gplusshareurl1		= 'plus.google.com/share?url=http:' . $_noprotocol;
		$_gplusshareurl2		= 'plus.google.com/share?url=https:' . $_noprotocol;
		$_gplusshareurl3		= 'plus.google.com/share?url=' . $_base_url;
		$_gplusshareurl_after	= 'plus.google.com/share?url=//dummy';
		
		$_hatebuhareurl1		= 'b.hatena.ne.jp/entry/http:' . $_noprotocol;
		$_hatebuhareurl2		= 'b.hatena.ne.jp/entry/https:' . $_noprotocol;
		$_hatebuhareurl3		= 'b.hatena.ne.jp/entry/' . $_base_url;
		$_hatebuhareurl_after	= 'b.hatena.ne.jp/entry///dummy';

		
		$_noprotocol_qoute = preg_quote($_noprotocol,"/");
		$_linesahreurl1			= 'line.me/R/msg/text/?http:' . $_noprotocol;
		$_linesahreurl2			= 'line.me/R/msg/text/?https:' . $_noprotocol;
		$_linesahreurl3			= 'line.me/R/msg/text/?' . $_base_url;
		//modify regex v1.2.6
		$_linesahreurl4			= "/(line\.me\/R\/msg\/text\/\?.+?%0D%0A)http:".$_noprotocol_qoute."/";
		$_linesahreurl5			= "/(line\.me\/R\/msg\/text\/\?.+?%0D%0A)https:".$_noprotocol_qoute."/";
		$_linesahreurl6			= "$1". $_base_url;
		$_linesahreurl_after	= 'line.me/R/msg/text/?//dummy';
		$_linesahreurl_after2	= "$1//dummy";
		$_linesahreurl_after_ptrn = "/(line\.me\/R\/msg\/text\/\?.+?%0D%0A)\/\/dummy/";

		$_pockethareurl1		= 'getpocket.com/edit?url=http:' . $_noprotocol;
		$_pockethareurl2		= 'getpocket.com/edit?url=https:' . $_noprotocol;
		$_pockethareurl3		= 'getpocket.com/edit?url=' . $_base_url;
		$_pockethareurl_after	= 'getpocket.com/edit?url=///dummy';
		
		//facebook likebox
		$_fblikeurl1			= 'https://www.facebook.com';
		$_fblikeurl_after1		= 'dummy://www.facebook.com';
		$_fblikeurl2			= 'http://www.facebook.com';
		$_fblikeurl_after2		= 'dummy2://www.facebook.com';
		$_fblikeurl3			= 'https://facebook.com';
		$_fblikeurl_after3		= 'dummy3://facebook.com';
		$_fblikeurl4			= 'http://www.facebook.com';
		$_fblikeurl_after4		= 'dummy4://www.facebook.com';
		
		//ogp
		$_ogpurl1		= 'og:url" content="http:' . $_noprotocol;
		$_ogpurl2		= 'og:url" content="https:' . $_noprotocol;
		$_ogpurl3		= 'og:url" content="' . $_base_url;
		$_ogpurl_after	= 'og:url" content="//dummy';
		
		$_ogpimgurl1		= 'og:image" content="http:' . $_noprotocol;
		$_ogpimgpurl2		= 'og:image" content="https:' . $_noprotocol;
		$_ogpimgurl3		= 'og:image" content="' . $_base_url;
		$_ogpimgurl4	    = 'og:image" content="http:%BS%/%BS%/';
		$_ogpimgurl5	    = 'og:image" content="https:%BS%/%BS%/';
		$_ogpimgurl_after	= 'og:image" content="//dummy';
		$_ogpimgurl_after4	= 'og:image" content="http://';
		$_ogpimgurl_after5	= 'og:image" content="https://';

		
		
		$_ogplayer1		    = 'twitter:player" content="http:' . $_noprotocol;
		$_ogplayer2		    = 'twitter:player" content="https:' . $_noprotocol;
		$_ogplayer3		    = 'twitter:player" content="' . $_base_url;
		$_ogplayer4	        = 'twitter:player" content="http:%BS%/%BS%/';
		$_ogplayer5	        = 'twitter:player" content="https:%BS%/%BS%/';
		$_ogplayer_after	= 'twitter:player" content="//dummy';
		$_ogplayer_after4	= 'twitter:player" content="http://';
		$_ogplayer_after5	= 'twitter:player" content="https://';

		//youtube
		$_youtubeurl        = 'https://www.youtube.com';
		$_youtubeurl_after  = 'dummy://www.youtube.com';
		$_youtubeurl2		= 'https://youtube.com';
		$_youtubeurl_after2 = 'dummy2://youtube.com';

		//vimeo
		$_vimeourl          = 'https://player.vimeo.com/video/';
		$_vimeourl_after    = 'dummy://player.vimeo.com/video/';
		

		if( $mode == 0) {
			$ret = preg_replace(array($_linesahreurl4,$_linesahreurl5),array($_linesahreurl_after2,$_linesahreurl_after2),$ret,-1,$pregCount);

			$ret = str_replace(
				array($_fbshareurl1, $_fbshareurl2, $_twsahreurl1, $_twsahreurl2, $_gplusshareurl1, $_gplusshareurl2,$_hatebuhareurl1, $_hatebuhareurl2,$_linesahreurl1,$_linesahreurl2,$_pockethareurl1,$_pockethareurl2, $_fblikeurl1, $_fblikeurl2, $_fblikeurl3, $_fblikeurl4,$_ogpurl1,$_ogpurl2,$_ogpimgurl1,$_ogpimgpurl2,$_ogplayer1,$_ogplayer2,$_youtubeurl,$_youtubeurl2,$_vimeourl),
				array($_fbshareurl_after, $_fbshareurl_after, $_twsahreurl_after, $_twsahreurl_after, $_gplusshareurl_after, $_gplusshareurl_after,$_hatebuhareurl_after,$_hatebuhareurl_after,$_linesahreurl_after,$_linesahreurl_after,$_pockethareurl_after,$_pockethareurl_after,$_fblikeurl_after1, $_fblikeurl_after2, $_fblikeurl_after3, $_fblikeurl_after4,$_ogpurl_after,$_ogpurl_after,$_ogpimgurl_after,$_ogpimgurl_after,$_ogplayer_after,$_ogplayer_after,$_youtubeurl_after,$_youtubeurl_after2,$_vimeourl_after),
				$ret
			);
			
			
		
		} else {
			$ret = preg_replace($_linesahreurl_after_ptrn,$_linesahreurl6,$ret,-1,$pregCount);
			
			$ret = str_replace(
				array($_fbshareurl_after, $_twsahreurl_after, $_gplusshareurl_after,$_hatebuhareurl_after,$_linesahreurl_after,$_pockethareurl_after,$_fblikeurl_after1, $_fblikeurl_after2, $_fblikeurl_after3, $_fblikeurl_after4,$_ogpurl_after,$_ogpimgurl_after,$_ogplayer_after,$_ogpimgurl4,$_ogpimgurl5,$_ogplayer4,$_ogplayer5,$_youtubeurl_after,$_youtubeurl_after2,$_vimeourl_after),
				array($_fbshareurl3, $_twsahreurl3, $_gplusshareurl3,$_hatebuhareurl3, $_linesahreurl3,$_pockethareurl3,$_fblikeurl1, $_fblikeurl2, $_fblikeurl3, $_fblikeurl4,$_ogpurl3,$_ogpimgurl3,$_ogplayer3,$_ogpimgurl_after4,$_ogpimgurl_after5,$_ogplayer_after4,$_ogplayer_after5,$_youtubeurl,$_youtubeurl2,$_vimeourl),
				$ret
			);
			
			
		}
		
		return $ret;
	}
	
	/**
	 * add <head></head> seo metatag and favicon apple-touch-icon
	 * target publish data only 
	 * @since 1.0
	 * @update
	 * ver 1.0.2
	 * ver 1.0.3
	 */
	public function add_seotag() {
		global $s;
		//v1.0.2
		//$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD);
		$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD, true);
		//v1.0.2 end
		if( empty( $seoOpt[WelukaAdminSettings::SEO_USE] ) ){ return false; }
		
		$delim			= ' | ';
		$weluka			= Weluka::get_instance();
		$builder		= WelukaBuilder::get_instance();

		$sitename = $title = get_bloginfo('name');
		$keywords		= '';
		$description	= get_bloginfo('description');
		if( is_home() ) {

			if( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE] ) )
				$title = $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE];

			if( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_KEYWORDS] ) )
				$keywords = $seoOpt[WelukaAdminSettings::SEO_HOME_KEYWORDS];

			if( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_DESCRIPTION] ) )
				$description = $seoOpt[WelukaAdminSettings::SEO_HOME_DESCRIPTION];

		} elseif ( is_front_page() ) {
			
			$postId		= $weluka->get_post_id();
			$pageOpt	= $builder->get_builder_data($postId, WelukaBuilder::CONTENT_POSTMETA_KEY_PUBLISH, 'pagesetting');

			if( !empty( $pageOpt['seo_title'] ) ){ $title = $pageOpt['seo_title']; }
			elseif( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE] ) ) { $title = $seoOpt[WelukaAdminSettings::SEO_HOME_TITLE]; }

			if( !empty( $pageOpt['seo_keywords'] ) ){ $keywords = $pageOpt['seo_keywords']; }
			elseif( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_KEYWORDS] ) ) { $keywords = $seoOpt[WelukaAdminSettings::SEO_HOME_KEYWORDS]; }

			if( !empty( $pageOpt['seo_description'] ) ){ $description = $pageOpt['seo_description']; }
			elseif( !empty( $seoOpt[WelukaAdminSettings::SEO_HOME_DESCRIPTION] ) ) { $description = $seoOpt[WelukaAdminSettings::SEO_HOME_DESCRIPTION]; }
			elseif( empty( $description ) ){ $description = get_the_excerpt(); }

		} elseif ( is_search() ) {

			$flg 			= isset( $s ) && strlen( $s ) > 0 ? true : false;
			$title			= !empty( $flg ) ? $s . $delim . $sitename : __('Search Result' , Weluka::$settings['plugin_name']) . $delim . $sitename; 
			$keywords		= !empty( $flg ) ? $s : '';
			$description	= !empty( $flg ) ? sprintf(__("It is %s search results.", Weluka::$settings['plugin_name']), $s) : '';

		} elseif ( is_tag() ) {

			$tag = single_tag_title( '', false );
			$tagDescription = tag_description();
			$title			= !empty( $tag ) ? $tag . $delim . $sitename : __('Tagcloud list' , Weluka::$settings['plugin_name']) . $delim . $sitename; 
			$keywords		= !empty( $tag ) ? $tag : '';
			$description = '';
			if( !empty( $tagDescription ) ) {
				$description = $tagDescription;
			} elseif( !empty( $tag ) ) {
				$description = sprintf(__("It is %s tagcloud list.", Weluka::$settings['plugin_name']), $tag);
			}

		} elseif ( is_tax() || is_category() ) {
			
			$termName			= single_term_title( '', false );
			if ( is_category() ) { $tax = 'category'; } else { $tax = get_query_var( 'taxonomy' ); }
			$termDescription	= term_description( 0, $tax );
			$title			= !empty( $termName ) ? $termName . $delim . $sitename : __('Category list' , Weluka::$settings['plugin_name']) . $delim . $sitename; 
			$keywords		= !empty( $termName ) ? $termName : '';
			$description = '';
			if( !empty( $termDescription ) ) {
				$description = $termDescription;
			} elseif( !empty( $termName ) ) {
				$description = sprintf(__("It is %s list.", Weluka::$settings['plugin_name']), $termName);
			}

		} elseif ( is_page() ) {

			$postId		= $weluka->get_post_id();
			$pageOpt	= $builder->get_builder_data($postId, WelukaBuilder::CONTENT_POSTMETA_KEY_PUBLISH, 'pagesetting');

			if( !empty( $pageOpt['seo_title'] ) ){ $title = $pageOpt['seo_title']; }
			else { $title = get_the_title( $postId ); }
			$title .= $delim . $sitename;
			
			if( !empty( $pageOpt['seo_keywords'] ) ){ $keywords = $pageOpt['seo_keywords']; }

			if( !empty( $pageOpt['seo_description'] ) ){ $description = $pageOpt['seo_description']; }
			else{ $description = get_the_excerpt(); }

		} elseif ( is_single() ) {

			$postId		= $weluka->get_post_id();
			$pageOpt	= $builder->get_builder_data($postId, WelukaBuilder::CONTENT_POSTMETA_KEY_PUBLISH, 'pagesetting');

			if( !empty( $pageOpt['seo_title'] ) ){ $title = $pageOpt['seo_title']; }
			else { $title = get_the_title( $postId ); }
			$title .= $delim . $sitename;

			$postType = get_query_var('post_type');
			$taxs = "";
			if( !empty($postType) ){
				//custom post TODO custom taxonomy
			} else {
				$cats = get_the_category( $postId );
				if ( !empty( $cats ) ) {
					foreach ( $cats as $cat ) {
						$keys[] = $cat->cat_name;
					}
					$taxs = implode(',', $keys);
				}
			}
			if( !empty( $pageOpt['seo_keywords'] ) ){ $keywords = $pageOpt['seo_keywords']; }
			elseif( !empty( $taxs ) ){ $keywords = $taxs; }

			if( !empty( $pageOpt['seo_description'] ) ){ $description = $pageOpt['seo_description']; }
			else{ $description = get_the_excerpt(); }

		} elseif( is_archive() || is_post_type_archive() ) {
			$keywords = '';
			$description = '';
			if( is_author() ) {
				$author = get_userdata( get_query_var( 'author' ) );
				if ( $author === false ) {
					global $wp_query;
					$author = $wp_query->get_queried_object();
				}
				$title			= $author !== false ? $author->display_name . $delim . $sitename : $sitename;
			} elseif( is_day() ) {
				$title = get_the_date() . $delim . $sitename;
			} elseif( is_month() ) {
				$title = get_the_date( 'F, Y' ) . $delim . $sitename;
			} elseif( is_year() ) {
				$title = get_the_date( 'Y' ) . $delim . $sitename;
			} elseif( is_post_type_archive() ){
				$title = post_type_archive_title( '', false) . $delim . $sitename;
			}
		} else {
			$keywords = '';
			$description = '';
		}

		$this->output_title( $title );
		$this->output_keywords( $keywords );
		$this->output_description( $description );

		//ob_end_flush(); //v1.0.3 comment out
	}

	/**
	 * wp_footer hook
	 * @since 1.0.3
	 */
	function wp_footer() {
		$seoOpt	= WelukaAdminSettings::get_site_options(Weluka::$settings['seo_option_name'], WelukaAdminSettings::SEO_ARRAY_FIELD, true);
		if( empty( $seoOpt[WelukaAdminSettings::SEO_USE] ) && empty( $seoOpt[WelukaAdminSettings::SEO_RELATIVE_PATH] )){ return false; }
    	ob_end_flush();
  	}

	/**
	 * title tag output
	 * @since 1.0
	 */
	public function output_title( $title, $echo = true ) {
		if( empty( $title ) ) { return ""; }
		$_title = '<title>'. strip_tags( str_replace( array( "\r\n", "\n", "\r" ), ' ', stripslashes( trim( $title ) ) ) ) . '</title>';
		if( $echo ) { echo $_title; } else { return $_title; }
	}

	/**
	 * meta keywords tag output
	 * @since 1.0
	 */
	public function output_keywords( $keywords, $echo = true ) {
		if( empty( $keywords ) ) { return ""; }
		$_meta = '<meta name="keywords" itemprop="keywords" content="'. strip_tags( str_replace( array( "\r\n", "\n", "\r" ), '', stripslashes( trim( $keywords ) ) ) ) . '">';
		if( $echo ) { echo $_meta; } else { return $_meta; }
	}

	/**
	 * meta description tag output
	 * @since 1.0
	 */
	public function output_description( $description, $echo = true ) {
		if( empty( $description ) ) { return ""; }
		$_meta = '<meta name="description" itemprop="description" content="'. strip_tags( str_replace( array( "\r\n", "\n", "\r" ), ' ', stripslashes( trim( $description ) ) ) ) . '">';
		if( $echo ) { echo $_meta; } else { return $_meta; }
	}
	
	/*Obsolete
	 public function add_ogptag() {
	}*/

	/**
	 * add favicon and touch icon
	 * @since 1.0
	 */
	public function add_icon() {
		$options	= WelukaAdminSettings::get_options();
		$favicon	= !empty($options[WelukaAdminSettings::FAVICON_URL]) ? trim( $options[WelukaAdminSettings::FAVICON_URL] ) : '';
		$touchicon	= !empty($options[WelukaAdminSettings::TOUCHICON_URL]) ? trim( $options[WelukaAdminSettings::TOUCHICON_URL] ) : '';
		
		if( $favicon ) {
			echo '<link rel="shortcut icon" href="' . esc_url( $favicon ) . '" />';
		}

		if( $touchicon ) {
			echo '<link rel="apple-touch-icon-precomposed apple-touch-icon" href="' . esc_url( $touchicon ) . '" />';
		}

	}

}
