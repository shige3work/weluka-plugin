<?php
/**
 * builder snipet script
 * @since 1.0
 * @update
 * ver1.1.4
 * ver1.2
 * ver1.2.3
 * ver1.2.4
 * ver1.2.9.6
 */
$_builder = WelukaBuilder::get_instance();
?>
<div id="weluka-builder-snippets">

<div id="weluka-builder-widget-nav-wrapper">
	<div data-target="#weluka-builder-widget-nav" id="weluka-builder-widget-toggle-switch" class="active"></div>
    <div id="weluka-builder-widget-nav">
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="text"><i class="fa fa-pencil"></i></div>
        <div class="weluka-widget-nav-popover hide">
        <?php /* v1.1.4 modify WIDGET_TITLE ⇒ WIDGET_TITLE_2
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_TITLE; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Title', Weluka::$settings['plugin_name']); ?>
            </div>
		*/ ?>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_TITLE_2; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Title', Weluka::$settings['plugin_name']); ?>
            </div>
            <div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_TEXT; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Paragraph', Weluka::$settings['plugin_name']); ?>
            </div>
        </div>
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="images"><i class="fa fa-picture-o"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_IMG; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Image', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_ICON; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Icon', Weluka::$settings['plugin_name']); ?>
            </div>
            <div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_SLIDE; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Slide', Weluka::$settings['plugin_name']); ?>
            </div>
            <?php /*<div class="weluka-draggable weluka-pop-draggable weluka-pop-draggable-todo" draggable="false" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_GALLERY; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Gallery', Weluka::$settings['plugin_name']); ?>
            </div>*/ ?>
        </div>
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="buttons"><i class="fa fa-external-link"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_BUTTON; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Link Button', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_SNS_BUTTON; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Social Button', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_SNS_SHARE; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Social Share Button', Weluka::$settings['plugin_name']); ?>
            </div>
        </div>
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="medias"><i class="fa fa-film"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_MOVIE; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Movie', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_AUDIO; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Audio', Weluka::$settings['plugin_name']); ?>
            </div>
        </div>
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="apps"><i class="fa fa-briefcase"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_APP_HORLINE; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Horizontal Line', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_APP_ALERT; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Alert', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_APP_EMBED; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Embed Code', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_APP_ACCORDION; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Accordion Panel', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_APP_TABS; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Tab Panel', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_GMAP; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Google Map', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable weluka-tip" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_APP_LIST; ?>">
            	<i class="fa fa-arrows"></i><?php _e('List', Weluka::$settings['plugin_name']); ?>
            </div>
        </div>
        <div class="weluka-widget-nav-poptrigger weluka-tip" title="wordpress"><i class="fa fa-wordpress"></i></div>
        <div class="weluka-widget-nav-popover hide">
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_ARCHIVES; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Archive List', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_MENU; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Custom Menu', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_CALENDAR; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Calendar', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_CATEGORIES; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Categories', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_META; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Meta', Weluka::$settings['plugin_name']); ?>
            </div>
            <?php if( ! is_page() ) : ?>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_PAGES; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Pages', Weluka::$settings['plugin_name']); ?>
            </div>
            <?php endif; ?>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_COMMENTS; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Recent Comments', Weluka::$settings['plugin_name']); ?>
            </div>
            <?php if ( 'post' !== get_post_type() ) : ?>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_POSTS; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Recent Posts', Weluka::$settings['plugin_name']); ?>
            </div>
            <?php endif; ?>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_RSS; ?>">
            	<i class="fa fa-arrows"></i><?php _e('RSS', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_SEARCH; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Search', Weluka::$settings['plugin_name']); ?>
            </div>
        	<div class="weluka-draggable weluka-pop-draggable" draggable="true" data-dnd-effect-allowed="copy" data-add-type="<?php echo WelukaBuilder::WIDGET_WP_TAGCLOUD; ?>">
            	<i class="fa fa-arrows"></i><?php _e('Tag Cloud', Weluka::$settings['plugin_name']); ?>
            </div>
        </div>

        <?php //v1.0.7 add ?>
        <div class="weluka-widget-nav-click weluka-tip" data-type="<?php echo WelukaBuilder::WIDGET_COPYTPL_SELECT; ?>" title="copy template select"><i class="fa fa-copy"></i></div>

        <?php
		$postType = get_post_type();
		$welukaTheme = class_exists( 'WelukaTheme', false );
		if( $welukaTheme && $postType === Weluka::$settings['cpt_hd'] ) { }
		elseif ( $welukaTheme && $postType === Weluka::$settings['cpt_ft'] ) { }
		elseif ( $welukaTheme && $postType === Weluka::$settings['cpt_sd'] ){ }
		else { ?>
        <div class="weluka-widget-nav-click weluka-tip" data-type="<?php echo WelukaBuilder::WIDGET_PAGE_SETTING; ?>" title="page settings"><i class="fa fa-cog"></i></div>
        <?php } ?>
    </div>
</div>
<?php //dialog etc ?>

<?php
/**
 * modal dialog Layout Select 
 * @since 1.0.3
 * @update
 * ver 1.1.3
 */
?>
<div id="weluka-layout-select-modal" class="modal hide fade weluka-modal" style="z-index:100001;" data-backdrop="static" role="dialog" aria-labelledby="layoutSelectModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="layioutSelectModalLabel" class="modal-title"><?php _e('Sample Select', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-layout-select-form" name="weluka-layout-select-form" role="form">
                            	<?php $lsArr = $_builder->get_layout_sample_json(); ?>
                                <div class="weluka-row clearfix">
                                	<?php //v1.1.3 layout sample category select area ?>
                                    <div class="weluka-col-md-3">
                                    	<h5><?php _e('Category Select', Weluka::$settings['plugin_name']); ?></h5>
                                    	<?php
                                        if(isset($lsArr['category']) && is_array($lsArr['category']) && count($lsArr['category']) > 0) {
											echo '<div id="welukaLayoutSelectCategories">';
                							foreach($lsArr['category'] as $lsCat) :
												echo '<a class="weluka-layout-select-category" data-cat="' . $lsCat['keyName'] . '">' . $lsCat['displayName'] . '</a>';
                							endforeach;
											echo '</div>';
										}
										?>
                                    </div>
                                    <?php //layout sample category menber area ?>
                                    <?php //v1.1.3 modify ?> 
                                    <div class="weluka-col-md-9">
                                    	<?php
                                        if(isset($lsArr['category']) && is_array($lsArr['category']) && count($lsArr['category']) > 0) {
											$purl = Weluka::$settings['plugin_url'] . 'assets/sample/';
											$cnt = 0;
                							foreach($lsArr['category'] as $lsCat) :
												$_key = $lsCat['keyName'];
												$st = '';
												if($cnt > 0 ) { $st = ' style="display:none;"'; }
												echo '<div id="welukaLayoutSelectCategory_' . $_key . '" class="welukaLayoutSelectLayoutArea"' . $st . '>';
                                    			echo '<h5>' . __('Category : ', Weluka::$settings['plugin_name'] ) . $lsCat['displayName'] . '</h5>';
												if(isset($lsArr[$_key]) && is_array($lsArr[$_key]) && count($lsArr[$_key]) > 0) {
													$idx = 0;
													foreach($lsArr[$_key] as $catitem) :
														//if( $catitem['thumbnail'] ) {
															$idx++;
															if( $idx === 1) { echo '<div class="weluka-row clearfix">'; }
															//v1.1.3 modify
															if( $lsCat['keyName'] == 'header' || $lsCat['keyName'] == 'footer' ) {
																echo '<div class="weluka-col-md-12 bdr-btm-on">';
																$idx = 3;
															} else {
																echo '<div class="weluka-col-md-4">';
															}
															echo '<div class="wrap">';
															echo '<div><img src="' . $purl . $_key . '/' . $catitem['thumbnail'] . '" class="welukaLayoutSelectThumb img-responsive" data-cat="' . $_key . '" data-layout="' . $catitem['layoutName'] . '" data-jsonf="' . $catitem['jsonFile'] . '" data-idcnt="' . $catitem['idCnt'] . '" /></div>';
															echo '<div class="sample-title">'. esc_attr( $catitem['displayName'] ) . '</div>';
															echo '</div></div>';
															if( $idx === 3 ) { echo '</div>'; $idx = 0; }
														//}
													endforeach;
													if( $idx !== 0 ) { echo '</div>'; }
												}
												echo '</div>';
												$cnt++;
                							endforeach;
											echo '<input type="hidden" id="welukaLayoutSelectCategoryKey" name="welukaLayoutSelectCategoryKey" value="" />';
											echo '<input type="hidden" id="welukaLayoutSelectLayoutName" name="welukaLayoutSelectLayoutName" value="" />';
											echo '<input type="hidden" id="welukaLayoutSelectLayoutJsonFile" name="welukaLayoutSelectLayoutJsonFile" value="" />';
											echo '<input type="hidden" id="welukaLayoutSelectLayoutIdcnt" name="welukaLayoutSelectLayoutIdcnt" value="" />';
										}
										?>
									</div>
								</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
            	<div class="weluka-mgbottom-m"><?php _e('Select a sample after clicking the "Select" button, builder sample data is stored is reloaded.', Weluka::$settings['plugin_name']); ?></div>
    			<button id="weluka-save-layout-select" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Select', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Cancel', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-layout-select-modal ?>

<?php
/**
 * modal dialog img setting
 * @update
 * ver 1.0.4
 * ver 1.1.2
 * ver 1.2
 * ver 1.2.3
 */
?>
<div id="weluka-img-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="imgSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="imgSettingModalLabel" class="modal-title"><?php _e('Image Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-img-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-img-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-img-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-image-setting-form" name="weluka-image-setting-form" role="form">
                    			<div id="weluka-img-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingSourceType"><?php _e('Image Source', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
	                                        	<select id="welukaImageSettingSourceType" name="welukaImageSettingSourceType" class="form-control">
    	                                        	<option value="media"><?php _e('Media Libraly', Weluka::$settings['plugin_name']); ?></option>
        	                                    	<option value="extern"><?php _e('External Url', Weluka::$settings['plugin_name']); ?></option>
            	                                </select>
                                            </div>
                                        </div>
  									</div>
                                    <!-- media input area -->
                                    <div class="form-group">
  									<div id="weluka-image-setting-media-input-area" class="form-group weluka-settings-media-input-panel weluka-panel-active">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Media', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                            	<div id="weluka-image-setting-media-input-content"></div>
                                            </div>
                                        </div>
  									</div>
                                    <div id="weluka-image-setting-extern-input-area" class="form-group weluka-settings-media-input-panel">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Url', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                            	<div id="weluka-image-setting-media-extern-content">
                                                	<div class="weluka-row clearfix">
                                                    	<div class="weluka-col-xs-4">
		                                                	<div class="img-thumb-wrap"></div>
                                                        </div>
    	                                                <div class="weluka-col-xs-8">
	                                                        <input id="welukaImageSettingExternUrl" name="welukaImageSettingExternUrl" type="text" class="form-control" />
                                                    	</div>
                                                	</div>
                                                </div>
                                            </div>
                                        </div>
  									</div>
                                    </div><!-- /media input area -->
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingFit"><?php _e('Fit width', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaImageSettingFit" name="welukaImageSettingFit" type="checkbox" value="on" />
                                                <label for="welukaImageSettingFit"><?php _e('I will full width display in the block.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                        </div>
  									</div>
									<?php //v1.2.7 add ?>
									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingLazyLoad"><?php _e('Lazy load', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
												<input id="welukaImageSettingLazyLoad" name="welukaImageSettingLazyLoad" type="checkbox" value="on" />
												<label for="welukaImageSettingLazyLoad"><?php _e('I will lazy load the image to speed up the site.', Weluka::$settings['plugin_name']); ?></label>
											</div>
										</div>
									</div>
									<?php //v1.2.7 addend ?>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <?php $_builder->weluka_display_align_settings('welukaImageSettingAlign', '', false); ?>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingShape"><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
		                                        <?php $_builder->weluka_display_imgshape_settings('welukaImageSettingShape', '', false); ?>
                                            </div>
                                        </div>
  									</div>
                                    <?php //v1.2.3 add ?>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaImageSettingRadiusSize"><?php _e('Radius size (px)', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
        										<input type="text" id="welukaImageSettingRadiusSize" name="welukaImageSettingRadiusSize" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-s help-block"><?php _e('Border-radius values for rounded corners.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
  									</div>
                                    <?php //v1.2.3 addend ?>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><strong><label for="welukaImageSettingLinkAction"><?php _e('Link', Weluka::$settings['plugin_name']); ?></label></strong></div>
                                            <div class="weluka-col-md-8">
		                                        <select id="welukaImageSettingLinkAction" name="welukaImageSettingLinkAction" class="form-control" data-panel-target="#weluka-img-setting-modal">
    		                                    	<option value="" selected="selected"><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
                                                    <option value="<?php echo WelukaBuilder::LINK_ACTION_GOTOLINK; ?>"><?php _e('Url', Weluka::$settings['plugin_name']); ?></option>
    	    	                                    <?php /* <option value="mysite"><?php _e('Mysite Url', Weluka::$settings['plugin_name']); ?></option>
        		   	                                <option value="extern"><?php _e('External Url', Weluka::$settings['plugin_name']); ?></option> */ ?>
        	    	                                <option value="<?php echo WelukaBuilder::LINK_ACTION_ZOOMUP; ?>"><?php _e('Zoom', Weluka::$settings['plugin_name']); ?></option>
            	    	                        </select>
                                                <div class="weluka-mgtop-s help-block"><?php _e('If the image is of an external site, ZOOM can not be used.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
  									</div>
                                    <div class="welukaSettingLinkInputArea">
                                    	<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Link Url', Weluka::$settings['plugin_name']); ?></label></div>
                                            	<div class="weluka-col-md-8">
	                                            	<input id="welukaImageSettingLinkUrl" name="welukaImageSettingLinkUrl" type="text" class="form-control" />
                                                    <?php /* v1.2 modify
                                                    <input id="welukaImageSettingLinkTarget" name="welukaImageSettingLinkTarget" type="checkbox" value="_blank" />
                                                    <label for="welukaImageSettingLinkTarget"><?php _e('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']); ?></label>
													*/ ?>
                                                    <div class="weluka-mgtop-s">
                                    					<button type="button" data-link-target="widgetimgmodal" data-link-textarea="#welukaImageSettingLinkUrl" class="weluka-wplink-button weluka-btn-org weluka-btn weluka-btn-info btn-xs"><?php _e('Select Link', Weluka::$settings['plugin_name']); ?></button>
                                                    </div>

                                                    <div class="weluka-mgtop-s"><label><input type="radio" id="welukaImageSettingLinkTarget_0" name="welukaImageSettingLinkTarget" value="" />&nbsp;<?php _e('Open link in the same window', Weluka::$settings['plugin_name']); ?></label></div>
                                                    <div><label><input type="radio" id="welukaImageSettingLinkTarget_1" name="welukaImageSettingLinkTarget" value="_blank" />&nbsp;<?php _e('Open links in a new window or new tab', Weluka::$settings['plugin_name']); ?></label></div>
                                                    <div><label><input type="radio" id="welukaImageSettingLinkTarget_2" name="welukaImageSettingLinkTarget" value="iframe" />&nbsp;<?php _e('Open the link in a Popup iframe', Weluka::$settings['plugin_name']); ?></label></div>
	                                                <div class="weluka-mgtop-s help-block"><?php _e('Cannot the Popup iframe external site links.', Weluka::$settings['plugin_name']); ?></div>
													<?php //v1.2 modify end ?>
 	                                           	</div>
    	                                    </div>
                                        </div>
									</div><!-- /#welukaImageSettingLinkInputArea -->
                        		</div><!-- /#weluka-img-setting-panel-general -->
                    			<div id="weluka-img-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('Image', array('border')); ?>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaImageSettingBoxShadowStyle', true, false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaImageSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Image'); ?>

									<?php $_builder->weluka_display_margin_setting('Image'); ?>
									<?php $_builder->weluka_display_css_setting('Image'); ?>
									<?php //TODO responsive and animation ?>
                        		</div><!-- /#weluka-img-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-img-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaImageSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('ImageMd'); ?>
                                    </div>
                                    <?php //v1.1.2 add ?>
									<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-3">
                                           	<div class="form-group">
                                                <label for="welukaImageMdSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                                <?php $_builder->weluka_display_align_settings('welukaImageMdSettingAlign', '', false, true, '', true, 'md'); ?>
                                            </div>
                                        </div>
                                    </div>
									<?php //v1.1.2 addend ?>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('ImageSm'); ?>
                                    </div>
                                    <?php //v1.1.2 add ?>
									<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-3">
                                           	<div class="form-group">
                                                <label for="welukaImageSmSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                                <?php $_builder->weluka_display_align_settings('welukaImageSmSettingAlign', '', false, true, '', true, 'sm'); ?>
                                            </div>
                                        </div>
                                    </div>
									<?php //v1.1.2 addend ?>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('ImageXs'); ?>
                                    </div>
                                    <?php //v1.1.2 add ?>
									<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-3">
                                           	<div class="form-group">
                                                <label for="welukaImageXsSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                                <?php $_builder->weluka_display_align_settings('welukaImageXsSettingAlign', '', false, true, '', true, 'xs'); ?>
                                            </div>
                                        </div>
                                    </div>
									<?php //v1.1.2 addend ?>
                        		</div><!-- /#weluka-img-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>

                                <input type="hidden" id="welukaImageSettingInvoker" name="welukaImageSettingInvoker" value="" />
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-img-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end img setting modal ?>

<?php
/**
 * modal dialog Heading setting
 * @since
 * ver1.1.4
 * ver1.2
 * ver1.2.3
 */
?>
<div id="weluka-hdtext-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="hdtextSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="hdtextSettingModalLabel" class="modal-title"><?php _e('Title Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-hdtext-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-hdtext-setting-panel-style" class="weluka-a"><?php _e('Style', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-hdtext-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-hdtext-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-hdtext-setting-form" name="weluka-hdtext-setting-form" role="form">
                    			<div id="weluka-hdtext-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                    <h5><?php _e('Hedding Text', Weluka::$settings['plugin_name']); ?></h5>
                                	<div class="weluka-row clearfix form-group">
                                    	<div class="weluka-col-md-12">
	                                       	<textarea id="welukaHdtextSettingTitle" name="welukaHdtextSettingTitle" class="form-control"></textarea>
                                        </div>
									</div><!-- /weluka-row -->

                                    <div class="weluka-row clearfix form-group">
                                    	<div class="weluka-col-md-4">
                                        	<?php $_builder->weluka_display_listtitle_htmltag_settings('welukaHdtextSettingTitleTag'); ?>
                                        </div>
                                        <div class="weluka-col-md-8">
                                        	<label><?php _e('Link Url', Weluka::$settings['plugin_name']); ?></label>
	                                        <input id="welukaHdtextSettingLinkUrl" name="welukaHdtextSettingLinkUrl" type="text" class="form-control" />
                                            <?php /* v1.2 modify
                                            <input id="welukaHdtextSettingLinkTarget" name="welukaHdtextSettingLinkTarget" type="checkbox" value="_blank" />
                                            <label for="welukaHdtextSettingLinkTarget"><?php _e('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']); ?></label>
											*/ ?>
                                            <div class="weluka-mgtop-s">
                                    			<button type="button" data-link-target="widgethdtextmodal" data-link-textarea="#welukaHdtextSettingLinkUrl" class="weluka-wplink-button weluka-btn-org weluka-btn weluka-btn-info btn-xs"><?php _e('Select Link', Weluka::$settings['plugin_name']); ?></button>
	                                        </div>
                                            
                                            <div class="weluka-mgtop-s"><label><input type="radio" id="welukaHdtextSettingLinkTarget_0" name="welukaHdtextSettingLinkTarget" value="" />&nbsp;<?php _e('Open link in the same window', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div><label><input type="radio" id="welukaHdtextSettingLinkTarget_1" name="welukaHdtextSettingLinkTarget" value="_blank" />&nbsp;<?php _e('Open links in a new window or new tab', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div><label><input type="radio" id="welukaHdtextSettingLinkTarget_2" name="welukaHdtextSettingLinkTarget" value="iframe" />&nbsp;<?php _e('Open the link in a Popup iframe', Weluka::$settings['plugin_name']); ?></label></div>
	                                        <div class="weluka-mgtop-s help-block"><?php _e('Cannot the Popup iframe external site links.', Weluka::$settings['plugin_name']); ?></div>
											<?php //v1.2 modify end ?>
                                        </div>
                                    </div>
                                    
                                    <h5><?php _e('Icon Setting', Weluka::$settings['plugin_name']); ?></h5>                                    
                                    <div class="weluka-row clearfix form-group">
                                    	<div class="weluka-col-md-3">
		        							<select id="welukaHdtextSettingIconType" name="welukaHdtextSettingIconType" class="form-control">
    	                                    	<option value=""></option>
    	                                        <option value="<?php echo WelukaBuilder::WIDGET_IMG; ?>"><?php _e('Image', Weluka::$settings['plugin_name']); ?></option>
        		                                <option value="<?php echo WelukaBuilder::WIDGET_ICON; ?>"><?php _e('Icon', Weluka::$settings['plugin_name']); ?></option>
                   	                        </select>
                    	                </div>
                                        <div class="weluka-col-md-3">
										    <button type="button" id="welukaHdTextSettingIconSelectBtn" class="weluka-btn weluka-btn-org weluka-btn-info" data-type="" data-target="widgethdtextmodal" style="margin:0.5em 0;"><?php _e('Select Icon', Weluka::$settings['plugin_name']); ?></button>
                                        </div>
                                    	<div class="weluka-col-md-6">
                                            <div class="help-block"><?php _e('The selected icon appears beside the text.', Weluka::$settings['plugin_name']); ?></div>
                    	                </div>
                                    </div>
                                    <?php //image preview ?> 
                                    <div id="weluka-hdtext-input-area-<?php echo WelukaBuilder::WIDGET_IMG; ?>" class="weluka-row clearfix form-group weluka-hdtext-icon-input-area weluka-panel-deactive">
                                        <div class="weluka-col-md-3">
                                             <label>[<?php _e('Selected Image', Weluka::$settings['plugin_name']); ?>]</label>
                                            <div class="weluka-hdtext-icon-img-preview weluka-text-center" style="background-size:cover;"></div>
                                        </div>
										<div class="weluka-col-md-6">
                                             <label>[<?php _e('Image Url', Weluka::$settings['plugin_name']); ?>]</label>
                                             <div class="weluka-hdtext-icon-img-info"></div>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Width (px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextSettingIconImg_width" name="welukaHdtextSettingIconImg_width" class="form-control weluka-normal-text" value="" />
                                        </div>
                                        <?php //hidden ?>
                                        <input type="hidden" id="welukaHdtextSettingIconImg_alt" name="welukaHdtextSettingIconImg_alt" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_attachment_id" name="welukaHdtextSettingIconImg_attachment_id" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_external" name="welukaHdtextSettingIconImg_external" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_full_height" name="welukaHdtextSettingIconImg_full_height" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_full_url" name="welukaHdtextSettingIconImg_full_url" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_full_width" name="welukaHdtextSettingIconImg_full_width" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_large_height" name="welukaHdtextSettingIconImg_large_height" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_large_url" name="welukaHdtextSettingIconImg_large_url" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_large_width" name="welukaHdtextSettingIconImg_large_width" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_medium_height" name="welukaHdtextSettingIconImg_medium_height" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_medium_url" name="welukaHdtextSettingIconImg_medium_url" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_medium_width" name="welukaHdtextSettingIconImg_medium_width" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_thumbnail_height" name="welukaHdtextSettingIconImg_thumbnail_height" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_thumbnail_url" name="welukaHdtextSettingIconImg_thumbnail_url" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_thumbnail_width" name="welukaHdtextSettingIconImg_thumbnail_width" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_source_type" name="welukaHdtextSettingIconImg_source_type" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_title" name="welukaHdtextSettingIconImg_title" value="" />
                                        <input type="hidden" id="welukaHdtextSettingIconImg_url" name="welukaHdtextSettingIconImg_url" value="" />
                                    </div>
                                    <?php //icon preview ?> 
                                    <div id="weluka-hdtext-input-area-<?php echo WelukaBuilder::WIDGET_ICON; ?>" class="weluka-row clearfix form-group weluka-hdtext-icon-input-area weluka-panel-deactive">
										<div class="weluka-col-md-4">
                                             <label>[<?php _e('Selected Icon', Weluka::$settings['plugin_name']); ?>]</label>
	                                        <div class="weluka-hdtext-icon-area-preview weluka-text-center"></div>
										</div>
                                        <div class="weluka-col-md-4">
											<label><?php _e('Icon Color', Weluka::$settings['plugin_name']); ?></label>
                                        	<div id="welukaHdtextSettingIconColorWrap"></div>
                                        </div>
                                        <div class="weluka-col-md-4">
											<label><?php _e('Icon Size (px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextSettingIcon_icon_size" name="welukaHdtextSettingIcon_icon_size" class="form-control weluka-normal-text" value="" />
                                        </div>

                                        <input type="hidden" id="welukaHdtextSettingIcon_icon_class" name="welukaHdtextSettingIcon_icon_class" value="" />
                                    </div>
                        		</div><!-- /#weluka-hdtext-setting-panel-general -->

								<!-- #weluka-hdtext-setting-panel-style -->
                    			<div id="weluka-hdtext-setting-panel-style" class="weluka-builder-settings-panel">
                                    <div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-4">
                                        	<?php $_builder->weluka_display_wysiwig_button_settings('welukaHdtextSettingStyle', 'Title Style'); ?>
                                        </div>
                                        <div class="weluka-col-md-4">
                                             <?php $_builder->weluka_display_font_settings('welukaHdtextSettingFont'); ?>
                                        </div>
                                        <div class="weluka-col-md-4">
											<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextSettingFontSize" name="welukaHdtextSettingFontSize" class="form-control weluka-normal-text" value="" />
                                        </div>
                                    </div>
                                    <div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                            <?php $_builder->weluka_display_align_settings('welukaHdtextSettingAlign'); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Title Color', Weluka::$settings['plugin_name']); ?></label>
                                            <div id="welukaHdtextSettingTextColorWrap"></div>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Text Shadow Style', Weluka::$settings['plugin_name']); ?></label>
											<select id="welukaHdtextSettingShadowStyle" name="welukaHdtextSettingShadowStyle" class="form-control">
        										<option value=""></option>
        										<option value="basic"><?php _e('Basic', Weluka::$settings['plugin_name']); ?></option>
        										<option value="hard"><?php _e('Hard', Weluka::$settings['plugin_name']); ?></option>
        										<option value="vintage"><?php _e('Vintage', Weluka::$settings['plugin_name']); ?></option>
           									</select>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaHdtextSettingShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix form-group">
										<div class="weluka-col-md-2"><?php //v1.2.3 weluka-col-md-3 => weluka-col-md-2 ?>
											<label><?php _e('Bg Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaHdtextSettingBgColorWrap"></div>
										</div>
                                        <div class="weluka-col-md-2"><?php //v1.2.3 weluka-col-md-3 => weluka-col-md-2 ?>
											<label><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label>
	        								<select id="welukaHdtextSettingShape" name="welukaHdtextSettingShape" class="form-control">
        										<option value=""><?php _e('Square', Weluka::$settings['plugin_name']); ?></option>
        										<option value="img-rounded"><?php _e('Round', Weluka::$settings['plugin_name']); ?></option>
           									</select>
										</div>
                                        <?php //v1.2.3 add ?>
                                        <div class="weluka-col-md-2">
											<label><?php _e('Radius size (px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextSettingRadiusSize" name="welukaHdtextSettingRadiusSize" class="form-control weluka-normal-text" value="" />
										</div>
                                        <?php //v1.2.3 addend ?>
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaHdtextSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaHdtextSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                    <div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-4">
											<label><?php _e('Select Style', Weluka::$settings['plugin_name']); ?></label>
											<select id="welukaHdtextSettingSelectStyle" name="welukaHdtextSettingSelectStyle" class="form-control">
        										<option value=""></option>
        										<option value="weluka-btm-border"><?php _e('Bottom Border', Weluka::$settings['plugin_name']); ?></option>
        										<option value="weluka-topbtm-border"><?php _e('Top and bottom borders', Weluka::$settings['plugin_name']); ?></option>
        										<option value="weluka-left-border"><?php _e('Left border', Weluka::$settings['plugin_name']); ?></option>
        										<option value="weluka-leftbtm-border"><?php _e('Left and bottom borders', Weluka::$settings['plugin_name']); ?></option>
        										<option value="weluka-square-border"><?php _e('Box border', Weluka::$settings['plugin_name']); ?></option>
        										<option value="weluka-ribbon"><?php _e('Ribbon', Weluka::$settings['plugin_name']); ?></option>
        										<option value="weluka-balloon"><?php _e('Balloon', Weluka::$settings['plugin_name']); ?></option>
           									</select>
                                        </div>
                                        <div class="weluka-col-md-8">
                                             <label>[<?php _e('Preview', Weluka::$settings['plugin_name']); ?>]</label>
	                                        <div id="weluka-hdtext-style-preview" class="weluka-mgtop-xs"></div>
										</div>       
                                    </div>
                                    <!-- btm-border -->
                                    <div id="weluka-hdtext-style-input-weluka-btm-border" class="weluka-hdtext-style-input-area weluka-panel-deactive">
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeBtm_btm-border"><?php _e('Border Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeBtm_btm-border" name="welukaHdtextSettingBorderSizeBtm_btm-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleBtm_btm-border"); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorBtmWrap_btm-border"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- topbtm-border -->
                                    <div id="weluka-hdtext-style-input-weluka-topbtm-border" class="weluka-hdtext-style-input-area weluka-panel-deactive">
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeTop_topbtm-border"><?php _e('Border Top Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeTop_topbtm-border" name="welukaHdtextSettingBorderSizeTop_topbtm-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleTop_topbtm-border", __('Border Top Style', Weluka::$settings['plugin_name']) ); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Top Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorTopWrap_topbtm-border"></div>
                                            </div>
                                        </div>
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeBtm_topbtm-border"><?php _e('Border Bottom Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeBtm_topbtm-border" name="welukaHdtextSettingBorderSizeBtm_topbtm-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleBtm_topbtm-border", __('Border Bottom Style', Weluka::$settings['plugin_name'])); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Bottom Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorBtmWrap_topbtm-border"></div>
                                            </div>
                                        </div>
                                    	<div class="weluka-row clearfix">
											<div class="weluka-col-md-12">
                                        		<div class="help-block"><?php _e('If you want to set the same up and down should be only Border Top.', Weluka::$settings['plugin_name']); ?></div>
											</div>
                                        </div>
                                    </div>
                                    <!-- left-border -->
                                    <div id="weluka-hdtext-style-input-weluka-left-border" class="weluka-hdtext-style-input-area weluka-panel-deactive">
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeLeft_left-border"><?php _e('Border Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeLeft_left-border" name="welukaHdtextSettingBorderSizeLeft_left-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleLeft_left-border"); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorLeftWrap_left-border"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- leftbtm-border -->
                                    <div id="weluka-hdtext-style-input-weluka-leftbtm-border" class="weluka-hdtext-style-input-area weluka-panel-deactive">
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeLeft_leftbtm-border"><?php _e('Border Left Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeLeft_leftbtm-border" name="welukaHdtextSettingBorderSizeLeft_leftbtm-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleLeft_leftbtm-border", __('Border Left Style', Weluka::$settings['plugin_name']) ); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Left Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorLeftWrap_leftbtm-border"></div>
                                            </div>
                                        </div>
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeBtm_leftbtm-border"><?php _e('Border Bottom Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeBtm_leftbtm-border" name="welukaHdtextSettingBorderSizeBtm_leftbtm-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleBtm_leftbtm-border", __('Border Bottom Style', Weluka::$settings['plugin_name'])); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Bottom Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorBtmWrap_leftbtm-border"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- square-border -->
                                    <div id="weluka-hdtext-style-input-weluka-square-border" class="weluka-hdtext-style-input-area weluka-panel-deactive">
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeTop_square-border"><?php _e('Border Top Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeTop_square-border" name="welukaHdtextSettingBorderSizeTop_square-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleTop_square-border", __('Border Top Style', Weluka::$settings['plugin_name']) ); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Top Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorTopWrap_square-border"></div>
                                            </div>
                                        </div>
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeBtm_square-border"><?php _e('Border Bottom Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeBtm_square-border" name="welukaHdtextSettingBorderSizeBtm_square-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleBtm_square-border", __('Border Bottom Style', Weluka::$settings['plugin_name'])); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Bottom Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorBtmWrap_square-border"></div>
                                            </div>
                                        </div>
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeLeft_square-border"><?php _e('Border Left Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeLeft_square-border" name="welukaHdtextSettingBorderSizeLeft_square-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleLeft_square-border", __('Border Left Style', Weluka::$settings['plugin_name'])); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Left Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorLeftWrap_square-border"></div>
                                            </div>
                                        </div>
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
                                            	<label for="welukaHdtextSettingBorderSizeRight_square-border"><?php _e('Border Right Size (px)', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaHdtextSettingBorderSizeRight_square-border" name="welukaHdtextSettingBorderSizeRight_square-border" class="form-control" value="">
                                            </div>
											<div class="weluka-col-md-4">
	                                            <?php $_builder->weluka_display_borderstyle_settings("welukaHdtextSettingBorderStyleRight_square-border", __('Border Right Style', Weluka::$settings['plugin_name'])); ?>
                                            </div>
											<div class="weluka-col-md-4">
												<label><?php _e('Border Right Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorRightWrap_square-border"></div>
                                            </div>
                                        </div>
                                    	<div class="weluka-row clearfix">
											<div class="weluka-col-md-12">
                                        		<div class="help-block"><?php _e('All set Top Border only if you want the same settings.', Weluka::$settings['plugin_name']); ?></div>
											</div>
                                        </div>
                                    </div>
                                    <!-- ribbon -->
                                    <div id="weluka-hdtext-style-input-weluka-ribbon" class="weluka-hdtext-style-input-area weluka-panel-deactive">
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
												<label><?php _e('Ribbon Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingColorWrap_ribbon"></div>
                                            </div>
											<div class="weluka-col-md-8">
                                        		<div class="help-block weluka-mgtop-xl">
													<?php _e('To set the background color is the main part.', Weluka::$settings['plugin_name']); ?><br />
													<?php _e('Rounded corners are not supported.', Weluka::$settings['plugin_name']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- balloon -->
                                    <div id="weluka-hdtext-style-input-weluka-balloon" class="weluka-hdtext-style-input-area weluka-panel-deactive">
                                    	<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-4">
												<label><?php _e('Border Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaHdtextSettingBorderColorWrap_balloon"></div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-hdtext-setting-panel-style -->

                    			<div id="weluka-hdtext-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php //$_builder->weluka_display_style_setting('Hdtext', array('border')); ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Hdtext'); ?>
                                    <?php //v1.2 add ?>                                    
									<?php $_builder->weluka_display_margin_setting('Hdtext'); ?>
									<?php $_builder->weluka_display_css_setting('Hdtext'); ?>
									<?php //TODO responsive and animation ?>
                        		</div>
                   				<div id="weluka-hdtext-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaHdtextSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('HdtextMd'); ?>
                                    </div>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
											<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextMdSettingFontSize" name="welukaHdtextMdSettingFontSize" class="form-control weluka-normal-text" value="" />
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Icon Size or Width(px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextMdSettingIcon_icon_size" name="welukaHdtextMdSettingIcon_icon_size" class="form-control weluka-normal-text" value="" />
                                        </div>
                                        <div class="weluka-col-md-3">
                                        	<label for="welukaHdtextMdSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                            <?php $_builder->weluka_display_align_settings('welukaHdtextMdSettingAlign', '', false, true, '', true, 'md'); ?>
                                        </div>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('HdtextSm'); ?>
                                    </div>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
											<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextSmSettingFontSize" name="welukaHdtextSmSettingFontSize" class="form-control weluka-normal-text" value="" />
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Icon Size or Width(px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextSmSettingIcon_icon_size" name="welukaHdtextSmSettingIcon_icon_size" class="form-control weluka-normal-text" value="" />
                                        </div>
                                        <div class="weluka-col-md-3">
                                        	<label for="welukaHdtextSmSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                            <?php $_builder->weluka_display_align_settings('welukaHdtextSmSettingAlign', '', false, true, '', true, 'sm'); ?>
                                        </div>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('HdtextXs'); ?>
                                    </div>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
											<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextXsSettingFontSize" name="welukaHdtextXsSettingFontSize" class="form-control weluka-normal-text" value="" />
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Icon Size or Width(px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaHdtextXsSettingIcon_icon_size" name="welukaHdtextXsSettingIcon_icon_size" class="form-control weluka-normal-text" value="" />
                                        </div>
                                        <div class="weluka-col-md-3">
                                        	<label for="welukaHdtextXsSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                            <?php $_builder->weluka_display_align_settings('welukaHdtextXsSettingAlign', '', false, true, '', true, 'xs'); ?>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-hdtext-setting-panel-responsive -->
 							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-hdtext-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-hdtext-setting-modal ?>

<?php
/**
 * modal dialog text title setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-text-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="textSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="textSettingModalLabel" class="modal-title"><?php _e('Text Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-text-setting-panel-advanced" class="active weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-text-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-text-setting-form" name="weluka-text-setting-form" role="form">

                    			<div id="weluka-text-setting-panel-advanced" class="weluka-panel-active weluka-builder-settings-panel">
								<?php $_builder->weluka_display_style_setting('Text'); ?>
                         	  		<div class="form-group">
										<div class="weluka-row clearfix">
                                	        <div class="weluka-col-md-4">
                                    	    	<div id="welukaTextSettingShadowPreview"><span>Shadow</span></div>
                                        	</div>
											<div class="weluka-col-md-4">
                                        		<label for="welukaTextSettingShadowStyle"><?php _e('Text Shadow Style', Weluka::$settings['plugin_name']); ?></label>
												<select id="welukaTextSettingShadowStyle" name="welukaTextSettingShadowStyle" class="form-control">
        											<option value=""></option>
        											<option value="basic"><?php _e('Basic', Weluka::$settings['plugin_name']); ?></option>
        											<option value="hard"><?php _e('Hard', Weluka::$settings['plugin_name']); ?></option>
        											<option value="vintage"><?php _e('Vintage', Weluka::$settings['plugin_name']); ?></option>
           										</select>
	                                        </div>
    	                                    <div class="weluka-col-md-4">
												<label><?php _e('Shadow Color', Weluka::$settings['plugin_name']); ?></label>
												<div id="welukaTextSettingShadowColorWrap"></div>
                	                        </div>
                    	                </div>
  									</div>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaTextSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaTextSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                	<?php //v1.1.4 add ?>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                    <?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Text'); ?>

									<?php $_builder->weluka_display_margin_setting('Text'); ?>
									<?php $_builder->weluka_display_css_setting('Text'); ?>
								</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-text-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaTextSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('TextMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('TextSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('TextXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-text-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-text-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-text-setting-modal ?>

<?php
/**
 * modal dialog button setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 * ver1.2.3
 */
?>
<div id="weluka-button-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="buttonSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="buttonSettingModalLabel" class="modal-title"><?php _e('Button Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-button-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-button-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-button-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-button-setting-form" name="weluka-button-setting-form" role="form">
                    			<div id="weluka-button-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                           			<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaButtonSettingText"><?php _e('Button Text', Weluka::$settings['plugin_name']); ?></label></div>
                                        	<div class="weluka-col-md-8">
	                                        	<input id="welukaButtonSettingText" name="welukaButtonSettingText" type="text" class="form-control" />
                                        	</div>
                                    	</div>
  									</div>
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaButtonSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <?php $_builder->weluka_display_align_settings('welukaButtonSettingAlign', '', false); ?>
                                            </div>
                                        </div>
  									</div>
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><strong><label for="welukaButtonSettingLinkAction"><?php _e('Link', Weluka::$settings['plugin_name']); ?></label></strong></div>
                                        	<div class="weluka-col-md-8">
		                                		<select id="welukaButtonSettingLinkAction" name="welukaButtonSettingLinkAction" class="form-control" data-panel-target="#weluka-button-setting-modal">
    		                                		<option value="" selected="selected"><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
                                                	<option value="<?php echo WelukaBuilder::LINK_ACTION_GOTOLINK; ?>"><?php _e('Url', Weluka::$settings['plugin_name']); ?></option>
            	    	                    	</select>
                                        	</div>
                                    	</div>
  									</div>
                                	<div class="welukaSettingLinkInputArea">
                                		<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Link Url', Weluka::$settings['plugin_name']); ?></label></div>
                                            	<div class="weluka-col-md-8">
	                                        		<input id="welukaButtonSettingLinkUrl" name="welukaButtonSettingLinkUrl" type="text" class="form-control" />
                                                    <?php /* v1.2 modify
                                                	<input id="welukaButtonSettingLinkTarget" name="welukaButtonSettingLinkTarget" type="checkbox" value="_blank" />
                                                	<label for="welukaButtonSettingLinkTarget"><?php _e('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']); ?></label>
													*/ ?>
                                                	<div class="weluka-mgtop-s">
                                    					<button type="button" data-link-target="widgetbuttonmodal" data-link-textarea="#welukaButtonSettingLinkUrl" class="weluka-wplink-button weluka-btn weluka-btn-org weluka-btn-info btn-xs"><?php _e('Select Link', Weluka::$settings['plugin_name']); ?></button>
	                                            	</div>
                                                    
                                                    <div class="weluka-mgtop-s"><label><input type="radio" id="welukaButtonSettingLinkTarget_0" name="welukaButtonSettingLinkTarget" value="" />&nbsp;<?php _e('Open link in the same window', Weluka::$settings['plugin_name']); ?></label></div>
                                                    <div><label><input type="radio" id="welukaButtonSettingLinkTarget_1" name="welukaButtonSettingLinkTarget" value="_blank" />&nbsp;<?php _e('Open links in a new window or new tab', Weluka::$settings['plugin_name']); ?></label></div>
                                                    <div><label><input type="radio" id="welukaButtonSettingLinkTarget_2" name="welukaButtonSettingLinkTarget" value="iframe" />&nbsp;<?php _e('Open the link in a Popup iframe', Weluka::$settings['plugin_name']); ?></label></div>
	                                                <div class="weluka-mgtop-s help-block"><?php _e('Cannot the Popup iframe external site links.', Weluka::$settings['plugin_name']); ?></div>
													<?php //v1.2 modify end ?>
 		                                    	</div>
    		                            	</div>
            	                        </div>
									</div><!-- /#welukaButtonSettingLinkInputArea -->
                                    <h5><?php _e('Button Style', Weluka::$settings['plugin_name']); ?></h5>
                                    <div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-6"><div id="welukaButtonSettingPreview"></div></div>
                                        <div class="weluka-col-md-6">
                           					<div class="form-group">
                                                <?php $_builder->weluka_display_buttoncolor_settings('welukaButtonSettingColor', 'Button Color', true, true, true ); ?>
                                    		</div>
                                   			<div class="form-group">
                                                <?php $_builder->weluka_display_buttonshape_settings('welukaButtonSettingShape'); ?>
  											</div>
                                            <?php //v1.2.3 add ?>
                                   			<div class="form-group">
												<label><?php _e('Radius size (px)', Weluka::$settings['plugin_name']); ?></label>
        										<input type="text" id="welukaButtonSettingRadiusSize" name="welukaButtonSettingRadiusSize" class="form-control weluka-normal-text" value="" />
  											</div>
                                            <?php //v1.2.3 adden ?>
                           					<div class="form-group">
                                                <?php $_builder->weluka_display_buttonsize_settings('welukaButtonSettingSize'); ?>
                                                <input id="welukaButtonSettingBlock" name="welukaButtonSettingBlock" type="checkbox" value="1" />
                                                <label for="welukaButtonSettingBlock"><?php _e('A button block size.', Weluka::$settings['plugin_name']); ?></label>
                                        	</div>
                                    	</div>
                                    </div>
                                    <?php //v1.1.4 add start ?>
                                    <h5><?php _e('Custom Setting', Weluka::$settings['plugin_name']); ?></h5>
                                    <div class="weluka-row clearfix form-group">
                                    	<div class="weluka-col-md-4">
                                        	<?php $_builder->weluka_display_wysiwig_button_settings('welukaButtonSettingWysiwig'); ?>
                                        </div>
                                        <div class="weluka-col-md-4">
                                        	<?php $_builder->weluka_display_font_settings('welukaButtonSettingFont'); ?>
                                        </div>
                                        <div class="weluka-col-md-4">
											<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        									<input type="text" id="welukaButtonSettingFontSize" name="welukaButtonSettingFontSize" class="form-control weluka-normal-text" value="" />
                                        </div>
									</div>

                                    <div class="weluka-row clearfix form-group">
                                    	<div class="weluka-col-md-2">
 	                                    	<h6><?php _e('Base Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                    <div id="welukaButtonSettingBaseColorWrap"></div>
										</div>
                                        <div class="weluka-col-md-2">
 	                                    	<h6><?php _e('Border Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                    <div id="welukaButtonSettingBorderColorWrap"></div>
										</div>
                                        <div class="weluka-col-md-2">
 	                                    	<h6><?php _e('Text Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                    <div id="welukaButtonSettingTextColorWrap"></div>
										</div>
                                        <div class="weluka-col-md-2">
											<h6><?php _e('Border Size (px)', Weluka::$settings['plugin_name']); ?></h6>
        									<input type="text" id="welukaButtonSettingBorderSize" name="welukaButtonSettingBorderSize" class="form-control weluka-normal-text" value="" />
										</div>
                                        <div class="weluka-col-md-4">
                                        	<input id="welukaButtonSettingHideBorder" name="welukaButtonSettingHideBorder" type="checkbox" value="1" />
	                                        <label for="welukaButtonSettingHideBorder"><?php _e('Hide Border?', Weluka::$settings['plugin_name']); ?></label>
										</div>
                                    </div>
                                    <div class="weluka-row clearfix form-group">
                                    	<div class="weluka-col-md-3">
 	                                    	<h6><?php _e('Hover Base Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                    <div id="welukaButtonSettingHvBaseColorWrap"></div>
										</div>
                                        <div class="weluka-col-md-3">
 	                                    	<h6><?php _e('Hover Border Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                    <div id="welukaButtonSettingHvBorderColorWrap"></div>
										</div>
                                        <div class="weluka-col-md-3">
 	                                    	<h6><?php _e('Hover Text Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                    <div id="welukaButtonSettingHvTextColorWrap"></div>
										</div>
                                        <div class="weluka-col-md-3">
											<h6><?php _e('Hover Border Size (px)', Weluka::$settings['plugin_name']); ?></h6>
        									<input type="text" id="welukaButtonSettingHvBorderSize" name="welukaButtonSettingHvBorderSize" class="form-control weluka-normal-text" value="" />
										</div>
                                    </div>
                                    <div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-12">
                                        	<div class="help-block"><?php _e("When you'd like to establish the color besides the color theme, please establish it more than [Custom Setting].", Weluka::$settings['plugin_name']); ?></div>
										</div>
                                    </div>
									<h5 class="weluka-mgtop-m"><?php _e('Padding of the button (px) ', Weluka::$settings['plugin_name']); ?></h5>
									<div class="weluka-row clearfix form-group">
										<div class="weluka-col-md-3">
											<label><?php _e('Top', Weluka::$settings['plugin_name']); ?></label>
        									<input id="welukaButtonSettingInPdTop" name="welukaButtonSettingInPdTop" type="text" class="form-control" />
        								</div>
										<div class="weluka-col-md-3">
											<label><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></label>
        									<input id="welukaButtonSettingInPdBottom" name="welukaButtonSettingInPdBottom" type="text" class="form-control" />
        								</div>
										<div class="weluka-col-md-3">
											<label><?php _e('Left', Weluka::$settings['plugin_name']); ?></label>
        									<input id="welukaButtonSettingInPdLeft" name="welukaButtonSettingInPdLeft" type="text" class="form-control" />
        								</div>
										<div class="weluka-col-md-3">
											<label><?php _e('Right', Weluka::$settings['plugin_name']); ?></label>
        									<input id="welukaButtonSettingInPdRight" name="welukaButtonSettingInPdRight" type="text" class="form-control" />
        								</div>
                                    </div>
                                    <?php //v1.1.4 add end ?>
								</div><!-- /#weluka-button-setting-panel-general -->
                    			<div id="weluka-button-setting-panel-advanced" class="weluka-builder-settings-panel">
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
											<label><?php _e('Text Shadow Style', Weluka::$settings['plugin_name']); ?></label>
											<select id="welukaButtonSettingShadowStyle" name="welukaButtonSettingShadowStyle" class="form-control">
        										<option value=""></option>
        										<option value="basic"><?php _e('Basic', Weluka::$settings['plugin_name']); ?></option>
        										<option value="hard"><?php _e('Hard', Weluka::$settings['plugin_name']); ?></option>
        										<option value="vintage"><?php _e('Vintage', Weluka::$settings['plugin_name']); ?></option>
           									</select>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaButtonSettingShadowColorWrap"></div>
                                        </div>
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaButtonSettingBoxShadowStyle', false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaButtonSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Button'); ?>
									<?php $_builder->weluka_display_margin_setting('Button'); ?>
									<?php $_builder->weluka_display_css_setting('Button'); ?>
                        		</div><!-- /#weluka-button-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-button-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaButtonSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('ButtonMd'); ?>
										<div class="weluka-row clearfix form-group">
                                        	<div class="weluka-col-md-3">
												<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        										<input type="text" id="welukaButtonMdSettingFontSize" name="welukaButtonMdSettingFontSize" class="form-control weluka-normal-text" value="" />
                                        	</div>
                                        	<div class="weluka-col-md-3">
                                        		<label for="welukaButtonMdSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                            	<?php $_builder->weluka_display_align_settings('welukaButtonMdSettingAlign', '', false, true, '', true, 'md'); ?>
                                        	</div>
                                    	</div>
										<h5 class="weluka-mgtop-m"><?php _e('Padding of the button (px) ', Weluka::$settings['plugin_name']); ?></h5>
										<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-3">
												<label><?php _e('Top', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonMdSettingPaddingInWrapTop" name="welukaButtonMdSettingPaddingInWrapTop" type="text" class="form-control" />
        									</div>
											<div class="weluka-col-md-3">
												<label><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonMdSettingPaddingInWrapBottom" name="welukaButtonMdSettingPaddingInWrapBottom" type="text" class="form-control" />
	        								</div>
											<div class="weluka-col-md-3">
												<label><?php _e('Left', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonMdSettingPaddingInWrapLeft" name="welukaButtonMdSettingPaddingInWrapLeft" type="text" class="form-control" />
        									</div>
											<div class="weluka-col-md-3">
												<label><?php _e('Right', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonMdSettingPaddingInWrapRight" name="welukaButtonMdSettingPaddingInWrapRight" type="text" class="form-control" />
        									</div>
                                    	</div>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('ButtonSm'); ?>
										<div class="weluka-row clearfix form-group">
                                        	<div class="weluka-col-md-3">
												<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        										<input type="text" id="welukaButtonSmSettingFontSize" name="welukaButtonSmSettingFontSize" class="form-control weluka-normal-text" value="" />
                                        	</div>
                                        	<div class="weluka-col-md-3">
                                        		<label for="welukaButtonSmSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                            	<?php $_builder->weluka_display_align_settings('welukaButtonSmSettingAlign', '', false, true, '', true, 'sm'); ?>
                                        	</div>
                                    	</div>
										<h5 class="weluka-mgtop-m"><?php _e('Padding of the button (px) ', Weluka::$settings['plugin_name']); ?></h5>
										<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-3">
												<label><?php _e('Top', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonSmSettingPaddingInWrapTop" name="welukaButtonSmSettingPaddingInWrapTop" type="text" class="form-control" />
        									</div>
											<div class="weluka-col-md-3">
												<label><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonSmSettingPaddingInWrapBottom" name="welukaButtonSmSettingPaddingInWrapBottom" type="text" class="form-control" />
	        								</div>
											<div class="weluka-col-md-3">
												<label><?php _e('Left', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonSmSettingPaddingInWrapLeft" name="welukaButtonSmSettingPaddingInWrapLeft" type="text" class="form-control" />
        									</div>
											<div class="weluka-col-md-3">
												<label><?php _e('Right', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonSmSettingPaddingInWrapRight" name="welukaButtonSmSettingPaddingInWrapRight" type="text" class="form-control" />
        									</div>
                                    	</div>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('ButtonXs'); ?>
										<div class="weluka-row clearfix form-group">
                                        	<div class="weluka-col-md-3">
												<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        										<input type="text" id="welukaButtonXsSettingFontSize" name="welukaButtonXsSettingFontSize" class="form-control weluka-normal-text" value="" />
                                        	</div>
                                        	<div class="weluka-col-md-3">
                                        		<label for="welukaButtonXsSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                            	<?php $_builder->weluka_display_align_settings('welukaButtonXsSettingAlign', '', false, true, '', true, 'Xs'); ?>
                                        	</div>
                                    	</div>
										<h5 class="weluka-mgtop-m"><?php _e('Padding of the button (px) ', Weluka::$settings['plugin_name']); ?></h5>
										<div class="weluka-row clearfix form-group">
											<div class="weluka-col-md-3">
												<label><?php _e('Top', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonXsSettingPaddingInWrapTop" name="welukaButtonXsSettingPaddingInWrapTop" type="text" class="form-control" />
        									</div>
											<div class="weluka-col-md-3">
												<label><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonXsSettingPaddingInWrapBottom" name="welukaButtonXsSettingPaddingInWrapBottom" type="text" class="form-control" />
	        								</div>
											<div class="weluka-col-md-3">
												<label><?php _e('Left', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonXsSettingPaddingInWrapLeft" name="welukaButtonXsSettingPaddingInWrapLeft" type="text" class="form-control" />
        									</div>
											<div class="weluka-col-md-3">
												<label><?php _e('Right', Weluka::$settings['plugin_name']); ?></label>
        										<input id="welukaButtonXsSettingPaddingInWrapRight" name="welukaButtonXsSettingPaddingInWrapRight" type="text" class="form-control" />
        									</div>
                                    	</div>
                                    </div>
                        		</div><!-- /#weluka-button-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>                             
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-button-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-button-setting-modal ?>

<?php
/**
 * movie dialog setting
 * @update
 * ver1.0.4
 * v1.1.1
 * v1.1.4
 * v1.2
 */
?>
<div id="weluka-movie-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="movieSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="movieSettingModalLabel" class="modal-title"><?php _e('Movie Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-movie-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-movie-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-movie-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-movie-setting-form" name="weluka-movie-setting-form" role="form">
                    			<div id="weluka-movie-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                           			<div class="form-group">
                                    	<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaMovieSettingSourceType"><?php _e('Movie Source', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
				                                <select id="welukaMovieSettingSourceType" name="welukaMovieSettingSourceType" class="form-control">
    		            	    	                <option value="media"><?php _e('WP-Media', Weluka::$settings['plugin_name']); ?></option>
    				                                <option value="youtube"><?php _e('Youtube', Weluka::$settings['plugin_name']); ?></option>
    				                                <option value="vimeo"><?php _e('Vimeo', Weluka::$settings['plugin_name']); ?></option>
    			    	                            <option value="dailymotion"><?php _e('Dailymotion', Weluka::$settings['plugin_name']); ?></option>
    		    	    	                        <option value="niconico"><?php _e('Niconico', Weluka::$settings['plugin_name']); ?></option>
    		        	    	                    <option value="other"><?php _e('other', Weluka::$settings['plugin_name']); ?></option>
            	    	    	    	        </select>
                                            </div>
                                    	</div>
                                    </div>
  									<div id="weluka-movie-setting-media-input-area" class="form-group weluka-settings-media-input-panel">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Media', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                            	<div id="weluka-movie-setting-media-input-content"></div>
                                                <?php //v1.1.1 add ?>
                                               	<h5 class="weluka-mgtop-m"><?php _e('Poster', Weluka::$settings['plugin_name']); ?></h5>
 	                                           	<div id="weluka-movie-setting-poster-input-content"></div>
                                                <div class="weluka-mgtop-s">
	    	                                		<input id="welukaMovieSettingWpAutoPlay" name="welukaMovieSettingWpAutoPlay" type="checkbox" value="on" />
    	    	                                    <label for="welukaMovieSettingWpAutoPlay"><?php _e('auto play', Weluka::$settings['plugin_name']); ?></label>
                	                            </div>
												<div class="weluka-mgtop-s">
	                                    			<input id="welukaMovieSettingWpLoop" name="welukaMovieSettingWpLoop" type="checkbox" value="on" />
    	                                        	<label for="welukaMovieSettingWpLoop"><?php _e('Repeat to play', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                                <?php //v1.1.1 addend ?>
                                            </div>
                                        </div>
  									</div>
  									<div id="weluka-movie-setting-embed-input-area" class="form-group weluka-settings-media-input-panel">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Embed URL or CODE', Weluka::$settings['plugin_name']); ?></label><i class="fa fa-asterisk required"></i></div>
                                            <div class="weluka-col-md-8">
	                                        	<!--input id="welukaMovieSettingEmbedUrl" name="welukaMovieSettingEmbedUrl" type="text" class="form-control weluka-movie-embed-item weluka-youtube-item weluka-vimeo-item weluka-dailymotion-item weluka-niconico-item" /-->
	                                        	<textarea id="welukaMovieSettingEmbedUrl" name="welukaMovieSettingEmbedUrl" class="form-control"></textarea>
												<div class="weluka-movie-embed-item weluka-youtube-item weluka-mgtop-s help-block"><?php _e('Please type or paste the youtube url.', Weluka::$settings['plugin_name']); ?></div>
												<div class="weluka-movie-embed-item weluka-vimeo-item weluka-mgtop-s help-block"><?php _e('Please type or paste the vimeo url.', Weluka::$settings['plugin_name']); ?></div>
												<div class="weluka-movie-embed-item weluka-niconico-item weluka-mgtop-s help-block"><?php _e('Please type or paste the niconico url.', Weluka::$settings['plugin_name']); ?></div>
												
    	                                        <div class="weluka-mgtop-s weluka-movie-embed-item weluka-vimeo-item weluka-dailymotion-item">
	    	                                		<input id="welukaMovieSettingDisplayNoTitle" name="welukaMovieSettingDisplayNoTitle" type="checkbox" value="on" />
    	    	                                    <label for="welukaMovieSettingDisplayNoTitle"><?php _e('Display not movie title.', Weluka::$settings['plugin_name']); ?></label>
                	                            </div>
                    	                        <div class="weluka-mgtop-xs weluka-movie-embed-item weluka-youtube-item">
	                    	                		<input id="welukaMovieSettingDisplayNoControl" name="welukaMovieSettingDisplayNoControl" type="checkbox" value="on" />
    	                    	                    <label for="welukaMovieSettingDisplayNoControl"><?php _e('Display not movie control.', Weluka::$settings['plugin_name']); ?></label>
                                	            </div>
                    	                        <div class="weluka-mgtop-xs weluka-movie-embed-item weluka-vimeo-item">
	                    	                		<input id="welukaMovieSettingDisplayNoAuthor" name="welukaMovieSettingDisplayNoAuthor" type="checkbox" value="on" />
    	                    	                    <label for="welukaMovieSettingDisplayNoAuthor"><?php _e('Display not movie author.', Weluka::$settings['plugin_name']); ?></label>
                                	            </div>
    	                                        <div class="weluka-mgtop-s weluka-movie-embed-item weluka-dailymotion-item">
	    	                                		<input id="welukaMovieSettingDisplayNoLogo" name="welukaMovieSettingDisplayNoLogo" type="checkbox" value="on" />
    	    	                                    <label for="welukaMovieSettingDisplayNoLogo"><?php _e('Display not logo.', Weluka::$settings['plugin_name']); ?></label>
                	                            </div>
    	                                        <div class="weluka-mgtop-s weluka-movie-embed-item weluka-youtube-item weluka-dailymotion-item">
	    	                                		<input id="welukaMovieSettingDisplayNoRelated" name="welukaMovieSettingDisplayNoRelated" type="checkbox" value="on" />
    	    	                                    <label for="welukaMovieSettingDisplayNoRelated">
														<span class="weluka-movie-embed-item weluka-youtube-item"> <?php _e('Display only related movie from the same channel.', Weluka::$settings['plugin_name']); ?></span>
														<span class="weluka-movie-embed-item weluka-dailymotion-item"> <?php _e('Display not related movie.', Weluka::$settings['plugin_name']); ?></span>
													</label>
                	                            </div>
    	                                        <div class="weluka-mgtop-s weluka-movie-embed-item weluka-youtube-item weluka-vimeo-item weluka-dailymotion-item">
	    	                                		<input id="welukaMovieSettingAutoPlay" name="welukaMovieSettingAutoPlay" type="checkbox" value="on" />
    	    	                                    <label for="welukaMovieSettingAutoPlay"><?php _e('auto play', Weluka::$settings['plugin_name']); ?></label>
													<div class="weluka-movie-embed-item weluka-youtube-item weluka-vimeo-item weluka-mgtop-s help-block weluka-movie-help-autoplay"><?php _e('The Movie will not autoplay on the smartphone.<br>The Movie may not play automatically except in Google Chrome or Microsoft Edge.', Weluka::$settings['plugin_name']); ?></div>
													<div class="weluka-movie-embed-item weluka-dailymotion-item weluka-mgtop-s help-block weluka-movie-help-autoplay"><?php _e('The Movie will autoplay on mute.', Weluka::$settings['plugin_name']); ?></div>
                	                            </div>
												<div class="weluka-mgtop-s weluka-movie-embed-item weluka-youtube-item weluka-vimeo-item">
	                                    			<input id="welukaMovieSettingLoop" name="welukaMovieSettingLoop" type="checkbox" value="on" />
    	                                        	<label for="welukaMovieSettingLoop"><?php _e('Repeat to play', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Width(px)', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
	                                        	<input id="welukaMovieSettingWidth" name="welukaMovieSettingWidth" type="text" class="form-control" />
                                                <div class="weluka-mgtop-s help-block"><?php _e('If not specified, it appears fit.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Height(px)', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
	                                        	<input id="welukaMovieSettingHeight" name="welukaMovieSettingHeight" type="text" class="form-control" />
                                                <div class="weluka-mgtop-s help-block"><?php _e('If not specified, it appears fit.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
  									</div>
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaMovieSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <?php $_builder->weluka_display_align_settings('welukaMovieSettingAlign', '', false); ?>
                                            </div>
                                        </div>
  									</div>
                        		</div><!-- /#weluka-movie-setting-panel-general -->
                    			<div id="weluka-movie-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php //$ret = WelukaBuilder::get_instance()->weluka_display_style_setting('Movie', array('border')); echo $ret; ?>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaMovieSettingBoxShadowStyle', true, false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaMovieSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Movie'); ?>
									<?php $_builder->weluka_display_margin_setting('Movie', true, 'notpadding'); ?>
									<?php $_builder->weluka_display_css_setting('Movie'); ?>
									<?php //TODO responsive and animation ?>
                        		</div><!-- /#weluka-movie-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-movie-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaMovieSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
                                    	<?php $_builder->weluka_display_align_settings('welukaMovieMdSettingAlign', 'Alignment', true, true, '', true, 'md'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('MovieMd', true, 'notpadding'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
                                    	<?php $_builder->weluka_display_align_settings('welukaMovieSmSettingAlign', 'Alignment', true, true, '', true, 'sm'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('MovieSm', true, 'notpadding'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
                                    	<?php $_builder->weluka_display_align_settings('welukaMovieXsSettingAlign', 'Alignment', true, true, '', true, 'xs'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('MovieXs', true, 'notpadding'); ?>
                                    </div>
                        		</div><!-- /#weluka-movie-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
                                <input type="hidden" id="welukaMovieSettingInvoker" name="welukaMovieSettingInvoker" value="" />
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-movie-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end movie setting modal ?>

<?php
/**
 * modal dialog audio setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-audio-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="audioSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="audioSettingModalLabel" class="modal-title"><?php _e('Audio Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-audio-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-audio-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-audio-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-audio-setting-form" name="weluka-audio-setting-form" role="form">
                    			<div id="weluka-audio-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="help-block"><?php _e('It might audio player does not appear on the builder, but the data on, no problem.', Weluka::$settings['plugin_name']); ?></div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaAudioSettingSourceType"><?php _e('Audio Source', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
	                                        	<select id="welukaAudioSettingSourceType" name="welukaAudioSettingSourceType" class="form-control">
    	                                        	<option value="media"><?php _e('Media Libraly', Weluka::$settings['plugin_name']); ?></option>
        	                                    	<option value="extern"><?php _e('External Url', Weluka::$settings['plugin_name']); ?></option>
            	                                </select>
                                            </div>
                                        </div>
  									</div>
                                    <!-- media input area -->
                                    <div class="form-group">
  										<div id="weluka-audio-setting-media-input-area" class="form-group weluka-settings-media-input-panel weluka-panel-active">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Media', Weluka::$settings['plugin_name']); ?></label></div>
                                            	<div class="weluka-col-md-8">
                                            		<div id="weluka-audio-setting-media-input-content"></div>
                                            	</div>
                                        	</div>
  										</div>
                                    	<div id="weluka-audio-setting-extern-input-area" class="form-group weluka-settings-media-input-panel">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Url', Weluka::$settings['plugin_name']); ?></label></div>
                                            	<div class="weluka-col-md-8">
	                                            	<input id="welukaAudioSettingExternUrl" name="welukaAudioSettingExternUrl" type="text" class="form-control" />
                                            	</div>
                                        	</div>
                                    	</div><!-- /media input area -->
  									</div>
                                    <div class="form-group">
                                    	<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Play Setting', Weluka::$settings['plugin_name']); ?></label></div>
                                        	<div class="weluka-col-md-6">
                                    			<input id="welukaAudioSettingAutoplay" name="welukaAudioSettingAutoplay" type="checkbox" value="on" />
                                            	<label for="welukaAudioSettingAutoplay"><?php _e('auto play', Weluka::$settings['plugin_name']); ?></label>
                                                <?php /*<span class="weluka-mgbottom-s help-block"><?php _e('It automatically plays when the page display.', Weluka::$settings['plugin_name']); ?></span> */ ?>
												<div class="weluka-mgtop-s">
	                                    			<input id="welukaAudioSettingLoop" name="welukaAudioSettingLoop" type="checkbox" value="on" />
    	                                        	<label for="welukaAudioSettingLoop"><?php _e('Repeat to play', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
												<div class="weluka-mgtop-s help-block">
                                                	<?php _e('Auto play and Repeat play setting is only one file in one page.', Weluka::$settings['plugin_name']); ?>
												</div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-img-setting-panel-general -->
                    			<div id="weluka-audio-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('Audio', array('border')); ?>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaAudioSettingBoxShadowStyle', true, false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaAudioSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Audio'); ?>
									<?php $_builder->weluka_display_margin_setting('Audio'); ?>
									<?php $_builder->weluka_display_css_setting('Audio'); ?>
                        		</div><!-- /#weluka-audio-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-audio-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaAudioSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AudioMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AudioSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AudioXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-audio-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-audio-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end audio setting modal ?>

<?php
/**
 * app horline dialog setting
 * @update
 * ver1.0.4
 * ver1.2
 */
?>
<div id="weluka-apphorline-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="apphorlineSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="apphorlineSettingModalLabel" class="modal-title"><?php _e('Horizontal Line Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-apphorline-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-apphorline-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-apphorline-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-apphorline-setting-form" name="weluka-apphorline-setting-form" role="form">
                    			<div id="weluka-apphorline-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                    <div class="form-group">
										<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-3">
												<label><?php _e('Line Width (px)', Weluka::$settings['plugin_name']); ?></label>
        										<input type="text" id="welukaAppHorlineSettingLineWidth" name="welukaAppHorlineSettingLineWidth" class="form-control weluka-normal-text" value="" />
											</div>
                                            <div class="weluka-col-md-3">
                                            	<?php //v1.2.3 modify ?>
                                            	<?php $_builder->weluka_display_borderstyle_settings( 'welukaAppHorlineSettingLineStyle', __('Line Style', Weluka::$settings['plugin_name']), true, true, 'bottom' ); ?>
                                            </div>
                                            <div class="weluka-col-md-3">
												<label><?php _e('Line Color', Weluka::$settings['plugin_name']); ?></label>
                                                <div id="welukaAppHorlineSettingLineColorWrap"></div>
                                            </div>
                                            <div class="weluka-col-md-12">
                                            	<div class="weluka-mgtop-m help-block">
                                                	<?php _e( 'Builder mode to enter a margin of 5px up and down.', Weluka::$settings['plugin_name'] ); ?>
                                                </div>
                                            </div>
                                       	</div>
                                    </div>
                        		</div><!-- /#weluka-apphorline-setting-panel-general -->
                    			<div id="weluka-apphorline-setting-panel-advanced" class="weluka-builder-settings-panel">
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('AppHorline'); ?>
									<?php $_builder->weluka_display_margin_setting('AppHorline'); ?>
									<?php $_builder->weluka_display_css_setting('AppHorline'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-apphorline-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaAppHorlineSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppHorlineMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppHorlineSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppHorlineXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-apphorline-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-apphorline-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end apphorline setting modal ?>

<?php
/**
 * appalert dialog setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-appalert-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="appalertSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="appalertSettingModalLabel" class="modal-title"><?php _e('Alert Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-appalert-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-appalert-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-appalert-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-appalert-setting-form" name="weluka-appalert-setting-form" role="form">
                    			<div id="weluka-appalert-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaAppAlertSettingType"><?php _e('Alert Type', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
	                                        	<select id="welukaAppAlertSettingType" name="welukaAppAlertSettingType" class="form-control">
    		                                		<option value="alert-info" selected="selected"><?php _e('Info', Weluka::$settings['plugin_name']); ?></option>
                                                	<option value="alert-success"><?php _e('Success', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="alert-warning"><?php _e('Warning', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="alert-danger"><?php _e('Danger', Weluka::$settings['plugin_name']); ?></option>
            	                                </select>
                                            </div>
                                        </div>
  									</div>
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaAppAlertSettingShape"><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <?php $_builder->weluka_display_buttonshape_settings('welukaAppAlertSettingShape', '', false); ?>
                                            </div>
                                        </div>
  									</div>
                                    <div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Close Button', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaAppAlertSettingCloseBtn" name="welukaAppAlertSettingCloseBtn" type="checkbox" value="on" />
                                            	<label for="welukaAppAlertSettingCloseBtn"><?php _e('To enable the close button.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                        </div>
  									</div>
                        		</div><!-- /#weluka-apppalert-setting-panel-general -->
                    			<div id="weluka-appalert-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaAlertSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaAlertSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('AppAlert'); ?>
                                    <?php $_builder->weluka_display_margin_setting('AppAlert'); ?>
									<?php $_builder->weluka_display_css_setting('AppAlert'); ?>
                        		</div><!-- /#weluka-appalert-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-appalert-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaAppAlertSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppAlertMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppAlertSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppAlertXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-appalert-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-appalert-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end apppanel setting modal ?>

<?php
/**
 * gmap dialog setting
 * @update
 * ver 1.0.4
 * ver 1.1.4
 * ver 1.2
 */
?>
<div id="weluka-gmap-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="gmapSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="appalertSettingModalLabel" class="modal-title"><?php _e('Google Map Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-gmap-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-gmap-setting-panel-style" class="weluka-a"><?php _e('Style', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-gmap-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-gmap-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-gmap-setting-form" name="weluka-gmap-setting-form" role="form">
                    			<div id="weluka-gmap-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                               		<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Address', Weluka::$settings['plugin_name']); ?><i class="fa fa-asterisk required"></i></label></div>
                                            <div class="weluka-col-md-8">
	                                        	<input id="welukaGmapSettingAddr" name="welukaGmapSettingAddr" type="text" class="form-control" />
                                            </div>
                                        </div>
  									</div>
                               		<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Information', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
	                                        	<input id="welukaGmapSettingInfo" name="welukaGmapSettingInfo" type="text" class="form-control" />
                                                <div class="weluka-mgtop-s help-block"><?php _e('This is the wording to be displayed in the balloon. "Address" will be displayed if there is no setting.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
  									</div>
                               		<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-6">
                                            	<label><?php _e('Latitude', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaGmapSettingLat" name="welukaGmapSettingLat" type="text" class="form-control weluka-normal-text" />
                                            </div>
                                            <div class="weluka-col-md-6">
                                            	<label><?php _e('Longitude', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaGmapSettingLng" name="welukaGmapSettingLng" type="text" class="form-control weluka-normal-text" />
                                            </div>
                                            <div class="weluka-mgtop-s help-block">&nbsp;&nbsp;<?php _e('It does not take effect if you do not enter both the latitude and longitude.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
  									</div>
                               		<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-6">
                                            	<label><?php _e('Width (px)', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaGmapSettingMapW" name="welukaGmapSettingMapW" type="text" class="form-control weluka-normal-text" />
                                            </div>
                                            <div class="weluka-col-md-6">
                                            	<label><?php _e('Height (px)', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaGmapSettingMapH" name="welukaGmapSettingMapH" type="text" class="form-control weluka-normal-text" />
                                            </div>
                                            <div class="weluka-mgtop-s help-block">&nbsp;&nbsp;<?php _e('Please enter until the "%" if you want to specify a percentage.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
  									</div>
                               		<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-6">
                                            	<label><?php _e('Zoom Level', Weluka::$settings['plugin_name']); ?></label>
	                                        	<select id="welukaGmapSettingZoom" name="welukaGmapSettingZoom" class="form-control">
    	                                        	<option value="1">1</option>
    	                                        	<option value="2">2</option>
    	                                        	<option value="3">3</option>
    	                                        	<option value="4">4</option>
    	                                        	<option value="5">5</option>
    	                                        	<option value="6">6</option>
    	                                        	<option value="7">7</option>
    	                                        	<option value="8">8</option>
    	                                        	<option value="9">9</option>
    	                                        	<option value="10">10</option>
    	                                        	<option value="11">11</option>
    	                                        	<option value="12">12</option>
    	                                        	<option value="13">13</option>
    	                                        	<option value="14">14</option>
    	                                        	<option value="15">15</option>
    	                                        	<option value="16" selected="selected">16</option>
    	                                        	<option value="17">17</option>
    	                                        	<option value="18">18</option>
            	                                </select>
                                            </div>
                                            <div class="weluka-col-md-6">
                                            	<label><?php _e('Static Map Width (px)', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaGmapSettingStaticw" name="welukaGmapSettingStaticw" type="text" class="form-control weluka-normal-text" />
                                            	<div class="weluka-mgtop-s help-block"><?php _e('Please enter a width size to switch to Static Map.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
  									</div>
                               		<div class="form-group">
										<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-12">
                                            	<input id="welukaGmapSettingDraggable" name="welukaGmapSettingDraggable" type="checkbox" value="1" />
                                                <label for="welukaGmapSettingDraggable"><?php _e('To disable the scroll of the mouse.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-gmap-setting-panel-general -->
                    			<div id="weluka-gmap-setting-panel-style" class="weluka-builder-settings-panel">
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-12">
                                            	<label for="welukaGmapSettingStylers"><?php _e('Google Map Styled Maps Json Code', Weluka::$settings['plugin_name']); ?></label>
	                                        	<textarea id="welukaGmapSettingStylers" name="welukaGmapSettingStylers" class="form-control" rows="14"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    			<div id="weluka-gmap-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('Gmap', array('border')); ?>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaGmapSettingBoxShadowStyle', true, false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaGmapSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Gmap'); ?>
									<?php $_builder->weluka_display_margin_setting('Gmap'); ?>
									<?php $_builder->weluka_display_css_setting('Gmap'); ?>
                        		</div><!-- /#weluka-gmap-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-gmap-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaGmapSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('GmapMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('GmapSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('GmapXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-gmap-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-gmap-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end gmap setting modal ?>

<?php
/**
 * icon dialog setting
 * @update
 * ver1.0.1
 * ver1.0.4
 * ver1.0.7
 * ver1.1.2
 * ver1.1.4
 * ver1.2
 * ver1.2.4
 */
?>
<div id="weluka-icon-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="iconSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="iconSettingModalLabel" class="modal-title"><?php _e('Icon Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-icon-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-icon-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-icon-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-icon-setting-form" name="weluka-icon-setting-form" role="form">
                    			<div id="weluka-icon-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-4">
		                               		<div class="form-group">
                                            	<label><?php _e('Icon Tags', Weluka::$settings['plugin_name']); ?></label>
	                                        	<select id="welukaIconSettingTags" name="welukaIconSettingTags" class="form-control">
    	                                        	<option value="iconAll"><?php _e('All', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="iconApp"><?php _e('Application', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="iconGraphic"><?php _e('Graphic', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="iconTransportation"><?php _e('Transportation', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="iconFileType"><?php _e('File Type', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="iconChart"><?php _e('Chart', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="iconCurrency"><?php _e('Currency', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="iconDirectional"><?php _e('Directional', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="iconBrand"><?php _e('Brand', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="iconOther"><?php _e('Other', Weluka::$settings['plugin_name']); ?></option>
            	                                </select>
                                        	</div>
                                            
                                            <div class="form-group">
                                            	<label><?php _e('Selected Icon', Weluka::$settings['plugin_name']); ?></label>
                                                <div class="weluka-text-center"><i id="weluka-icon-setting-preview" class="fa"></i></div>
                                           		<input id="welukaIconSettingSelectIcon" name="welukaIconSettingSelectIcon" type="hidden" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                            	<label><?php _e('Icon Size (px)', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaIconSettingIconSize" name="welukaIconSettingIconSize" type="text" class="form-control weluka-normal-text" />
                                            	<div class="weluka-mgtop-s help-block"><?php _e('Please continue to enter the icon font size.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                            <div class="form-group">
                                            	<label><?php _e('Icon Color', Weluka::$settings['plugin_name']); ?></label>
                                             	<div id="welukaIconSettingIconColorWrap">
                                                <!--input type="text" id="welukaIconSettingIconColor" name="welukaIconSettingIconColor" class="weluka-color-picker form-control" value="" /-->
                                                </div>
                                            </div>
                                            
                                    		<div class="form-group">
                                                <?php $_builder->weluka_display_align_settings('welukaIconSettingAlign'); ?>
  											</div>

                                            <div class="form-group">
												<label for="welukaIconSettingLinkAction"><?php _e('Link', Weluka::$settings['plugin_name']); ?></label>
		                                		<select id="welukaIconSettingLinkAction" name="welukaIconSettingLinkAction" class="form-control" data-panel-target="#weluka-icon-setting-modal">
    		                                		<option value="" selected="selected"><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
                                                	<option value="<?php echo WelukaBuilder::LINK_ACTION_GOTOLINK; ?>"><?php _e('Url', Weluka::$settings['plugin_name']); ?></option>
            	    	                    	</select>
                                    		</div>

                                			<div class="welukaSettingLinkInputArea">
                                				<div class="form-group">
													<label><?php _e('Link Url', Weluka::$settings['plugin_name']); ?></label>
	                                        		<input id="welukaIconSettingLinkUrl" name="welukaIconSettingLinkUrl" type="text" class="form-control" />
                                                    <?php /* v1.2 modify
                                                	<input id="welukaIconSettingLinkTarget" name="welukaIconSettingLinkTarget" type="checkbox" value="_blank" />
                                                	<label for="welukaIconSettingLinkTarget"><?php _e('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']); ?></label>
													*/ ?>
                                                	<div class="weluka-mgtop-s">
                                    					<button type="button" data-link-target="widgeticonmodal" data-link-textarea="#welukaIconSettingLinkUrl" class="weluka-wplink-button weluka-btn weluka-btn-org weluka-btn-info btn-xs"><?php _e('Select Link', Weluka::$settings['plugin_name']); ?></button>
	                                            	</div>

                                                    <div class="weluka-mgtop-s"><label><input type="radio" id="welukaIconSettingLinkTarget_0" name="welukaIconSettingLinkTarget" value="" />&nbsp;<?php _e('Open link in the same window', Weluka::$settings['plugin_name']); ?></label></div>
                                                    <div><label><input type="radio" id="welukaIconSettingLinkTarget_1" name="welukaIconSettingLinkTarget" value="_blank" />&nbsp;<?php _e('Open links in a new window or new tab', Weluka::$settings['plugin_name']); ?></label></div>
                                                    <div><label><input type="radio" id="welukaIconSettingLinkTarget_2" name="welukaIconSettingLinkTarget" value="iframe" />&nbsp;<?php _e('Open the link in a Popup iframe', Weluka::$settings['plugin_name']); ?></label></div>
	                                                <div class="weluka-mgtop-s help-block"><?php _e('Cannot the Popup iframe external site links.', Weluka::$settings['plugin_name']); ?></div>
													<?php //v1.2 modify end ?>
 		                                    	</div>
											</div><!-- /#welukaButtonSettingLinkInputArea -->
                                        </div>
                                        <div id="welukaIconSettingList" class="weluka-col-md-8">
                                            <i class="iconApp fa fa-adjust" data-icon="fa-adjust"></i>
                                            <i class="iconApp fa fa-anchor" data-icon="fa-anchor"></i>
                                            <i class="iconApp fa fa-archive" data-icon="fa-archive"></i>
                                            <i class="iconChart fa fa-area-chart" data-icon="fa-area-chart"></i>
                                            <i class="iconDirectional fa fa-arrows" data-icon="fa-arrows"></i>
                                            <i class="iconDirectional fa fa-arrows-h" data-icon="fa-arrows-h"></i>
                                            <i class="iconDirectional fa fa-arrows-v" data-icon="fa-arrows-v"></i>
                                            <i class="iconApp fa fa-asterisk" data-icon="fa-asterisk"></i>
                                            <i class="iconApp fa fa-at" data-icon="fa-at"></i>
                                            <i class="iconApp fa fa-ban" data-icon="fa-ban"></i>
                                            <i class="iconChart fa fa-bar-chart" data-icon="fa-bar-chart"></i>
                                            <i class="iconApp fa fa-barcode" data-icon="fa-barcode"></i>
                                            <i class="iconApp fa fa-bars" data-icon="fa-bars"></i>
                                            <i class="iconOther fa fa-bed" data-icon="fa-bed"></i>
                                            <i class="iconOther fa fa-beer" data-icon="fa-beer"></i>
                                            <i class="iconOther fa fa-bell" data-icon="fa-bell"></i>
                                            <i class="iconOther fa fa-bell-o" data-icon="fa-bell-o"></i>
                                            <i class="iconOther fa fa-bell-slash" data-icon="fa-bell-slash"></i>
                                            <i class="iconOther fa fa-bell-slash-o" data-icon="fa-bell-slash-o"></i>
                                            <i class="iconOther fa fa-bicycle" data-icon="fa-bicycle"></i>
                                            <i class="iconOther fa fa-binoculars" data-icon="fa-binoculars"></i>
                                            <i class="iconOther fa fa-birthday-cake" data-icon="fa-birthday-cake"></i>
                                            <i class="iconOther fa fa-bolt" data-icon="fa-bolt"></i>
                                            <i class="iconOther fa fa-bomb" data-icon="fa-bomb"></i>
                                            <i class="iconOther fa fa-book" data-icon="fa-book"></i>
                                            <i class="iconApp fa fa-bookmark" data-icon="fa-bookmark"></i>
                                            <i class="iconApp fa fa-bookmark-o" data-icon="fa-bookmark-o"></i>
                                            <i class="iconApp fa fa-briefcase" data-icon="fa-briefcase"></i>
                                            <i class="iconApp fa fa-bug" data-icon="fa-bug"></i>
                                            <i class="iconOther fa fa-building" data-icon="fa-building"></i>
                                            <i class="iconOther fa fa-building-o" data-icon="fa-building-o"></i>
                                            <i class="iconOther fa fa-bullhorn" data-icon="fa-bullhorn"></i>
                                            <i class="iconApp fa fa-bullseye" data-icon="fa-bullseye"></i>
                                            <i class="iconTransportation fa fa-bus" data-icon="fa-bus"></i>
                                            <i class="iconApp fa fa-calculator" data-icon="fa-calculator"></i>
                                            <i class="iconApp fa fa-calendar" data-icon="fa-calendar"></i>
                                            <i class="iconApp fa fa-calendar-o" data-icon="fa-calendar-o"></i>
                                            <i class="iconApp fa fa-camera" data-icon="fa-camera"></i>
                                            <i class="iconApp fa fa-camera-retro" data-icon="fa-camera-retro"></i>
                                            <i class="iconTransportation fa fa-car" data-icon="fa-car"></i>
                                            <i class="iconDirectional fa fa-caret-square-o-down" data-icon="fa-caret-square-o-down"></i>
                                            <i class="iconDirectional fa fa-caret-square-o-left" data-icon="fa-caret-square-o-left"></i>
                                            <i class="iconDirectional fa fa-caret-square-o-right" data-icon="fa-caret-square-o-right"></i>
                                            <i class="iconDirectional fa fa-caret-square-o-up" data-icon="fa-caret-square-o-up"></i>
                                            <i class="iconApp fa fa-cart-arrow-down" data-icon="fa-cart-arrow-down"></i>
                                            <i class="iconApp fa fa-cart-plus" data-icon="fa-cart-plus"></i>
                                            <i class="iconApp fa fa-cc" data-icon="fa-cc"></i>
                                            <i class="iconApp fa fa-certificate" data-icon="fa-certificate"></i>
                                            <i class="iconApp fa fa-check" data-icon="fa-check"></i>
                                            <i class="iconApp fa fa-check-circle" data-icon="fa-check-circle"></i>
                                            <i class="iconApp fa fa-check-circle-o" data-icon="fa-check-circle-o"></i>
                                            <i class="iconApp fa fa-check-square" data-icon="fa-check-square"></i>
                                            <i class="iconApp fa fa-check-square-o" data-icon="fa-check-square-o"></i>
                                            <i class="iconApp fa fa-child" data-icon="fa-child"></i>
                                            <i class="iconGraphic fa fa-circle" data-icon="fa-circle"></i>
                                            <i class="iconGraphic fa fa-circle-o" data-icon="fa-circle-o"></i>
                                            <i class="iconApp fa fa-circle-o-notch" data-icon="fa-circle-o-notch"></i>
                                            <i class="iconApp fa fa-circle-thin" data-icon="fa-circle-thin"></i>
                                            <i class="iconApp fa fa-clock-o" data-icon="fa-clock-o"></i>
                                            <i class="iconApp fa fa-cloud" data-icon="fa-cloud"></i>
                                            <i class="iconApp fa fa-cloud-download" data-icon="fa-cloud-download"></i>
                                            <i class="iconApp fa fa-cloud-upload" data-icon="fa-cloud-upload"></i>
                                            <i class="iconApp fa fa-code" data-icon="fa-code"></i>
                                            <i class="iconApp fa fa-code-fork" data-icon="fa-code-fork"></i>
                                            <i class="iconOther fa fa-coffee" data-icon="fa-coffee"></i>
                                            <i class="iconApp fa fa-cog" data-icon="fa-cog"></i>
                                            <i class="iconApp fa fa-cogs" data-icon="fa-cogs"></i>
                                            <i class="iconApp fa fa-comment" data-icon="fa-comment"></i>
                                            <i class="iconApp fa fa-comment-o" data-icon="fa-comment-o"></i>
                                            <i class="iconApp fa fa-comments" data-icon="fa-comments"></i>
                                            <i class="iconApp fa fa-comments-o" data-icon="fa-comments-o"></i>
                                            <i class="iconApp fa fa-compass" data-icon="fa-compass"></i>
                                            <i class="iconApp fa fa-copyright" data-icon="fa-copyright"></i>
                                            <i class="iconApp fa fa-credit-card" data-icon="fa-credit-card"></i>
                                            <i class="iconApp fa fa-crop" data-icon="fa-crop"></i>
                                            <i class="iconApp fa fa-crosshairs" data-icon="fa-crosshairs"></i>
                                            <i class="iconOther fa fa-cube" data-icon="fa-cube"></i>
                                            <i class="iconOther fa fa-cubes" data-icon="fa-cubes"></i>
                                            <i class="iconOther fa fa-cutlery" data-icon="fa-cutlery"></i>
                                            <i class="iconApp fa fa-database" data-icon="fa-database"></i>
                                            <i class="iconApp fa fa-desktop" data-icon="fa-desktop"></i>
                                            <i class="iconOther fa fa-diamond" data-icon="fa-diamond"></i>
                                            <i class="iconGraphic fa fa-dot-circle-o" data-icon="fa-dot-circle-o"></i>
                                            <i class="iconGraphic fa fa-download" data-icon="fa-download"></i>
                                            <i class="iconApp fa fa-ellipsis-h" data-icon="fa-ellipsis-h"></i>
                                            <i class="iconApp fa fa-ellipsis-v" data-icon="fa-ellipsis-v"></i>
                                            <i class="iconApp fa fa-envelope" data-icon="fa-envelope"></i>
                                            <i class="iconApp fa fa-envelope-o" data-icon="fa-envelope-o"></i>
                                            <i class="iconApp fa fa-envelope-square" data-icon="fa-envelope-square"></i>
                                            <i class="iconOther fa fa-eraser" data-icon="fa-eraser"></i>
                                            <i class="iconApp fa fa-exchange" data-icon="fa-exchange"></i>
                                            <i class="iconApp fa fa-exclamation" data-icon="fa-exclamation"></i>
                                            <i class="iconApp fa fa-exclamation-circle" data-icon="fa-exclamation-circle"></i>
                                            <i class="iconApp fa fa-exclamation-triangle" data-icon="fa-exclamation-triangle"></i>
                                            <i class="iconApp fa fa-external-link" data-icon="fa-external-link"></i>
                                            <i class="iconApp fa fa-external-link-square" data-icon="fa-external-link-square"></i>
                                            <i class="iconOther fa fa-eye" data-icon="fa-eye"></i>
                                            <i class="iconOther fa fa-eye-slash" data-icon="fa-eye-slash"></i>
                                            <i class="iconApp fa fa-eyedropper" data-icon="fa-eyedropper"></i>
                                            <i class="iconApp fa fa-fax" data-icon="fa-fax"></i>
                                            <i class="iconOther fa fa-female" data-icon="fa-female"></i>
                                            <i class="iconTransportation fa fa-fighter-jet" data-icon="fa-fighter-jet"></i>
                                            <i class="iconFileType fa fa-file-archive-o" data-icon="fa-file-archive-o"></i>
                                            <i class="iconFileType fa fa-file-audio-o" data-icon="fa-file-audio-o"></i>
                                            <i class="iconFileType fa fa-file-code-o" data-icon="fa-file-code-o"></i>
                                            <i class="iconFileType fa fa-file-excel-o" data-icon="fa-file-excel-o"></i>
                                            <i class="iconFileType fa fa-file-pdf-o" data-icon="fa-file-pdf-o"></i>
                                            <i class="iconFileType fa fa-file-powerpoint-o" data-icon="fa-file-powerpoint-o"></i>
                                            <i class="iconFileType fa fa-file-video-o" data-icon="fa-file-video-o"></i>
                                            <i class="iconFileType fa fa-file-word-o" data-icon="fa-file-word-o"></i> <?php //v1.2.4 bugfix ?>
                                            <i class="iconApp fa fa-film" data-icon="fa-film"></i>
                                            <i class="iconApp fa fa-filter" data-icon="fa-filter"></i>
                                            <i class="iconOther fa fa-fire" data-icon="fa-fire"></i>
                                            <i class="iconOther fa fa-fire-extinguisher" data-icon="fa-fire-extinguisher"></i>
                                            <i class="iconOther fa fa-flag" data-icon="fa-flag"></i>
                                            <i class="iconOther fa fa-flag-checkered" data-icon="fa-flag-checkered"></i>
                                            <i class="iconOther fa fa-flag-o" data-icon="fa-flag-o"></i>
                                            <i class="iconOther fa fa-flask" data-icon="fa-flask"></i>
                                            <i class="iconApp fa fa-folder" data-icon="fa-folder"></i>
                                            <i class="iconApp fa fa-folder-o" data-icon="fa-folder-o"></i>
                                            <i class="iconApp fa fa-folder-open" data-icon="fa-folder-open"></i>
                                            <i class="iconApp fa fa-folder-open-o" data-icon="fa-folder-open-o"></i>
                                            <i class="iconOther fa fa-frown-o" data-icon="fa-frown-o"></i>
                                            <i class="iconOther fa fa-futbol-o" data-icon="fa-futbol-o"></i>
                                            <i class="iconOther fa fa-gamepad" data-icon="fa-gamepad"></i>
                                            <i class="iconOther fa fa-gavel" data-icon="fa-gavel"></i>
                                            <i class="iconOther fa fa-gift" data-icon="fa-gift"></i>
                                            <i class="iconOther fa fa-glass" data-icon="fa-glass"></i>
                                            <i class="iconOther fa fa-globe" data-icon="fa-globe"></i>
                                            <i class="iconOther fa fa-graduation-cap" data-icon="fa-graduation-cap"></i>
                                            <i class="iconApp fa fa-hdd-o" data-icon="fa-hdd-o"></i>
                                            <i class="iconOther fa fa-headphones" data-icon="fa-headphones"></i>
                                            <i class="iconGraphic fa fa-heart" data-icon="fa-heart"></i>
                                            <i class="iconGraphic fa fa-heart-o" data-icon="fa-heart-o"></i>
                                            <i class="iconOther fa fa-heartbeat" data-icon="fa-heartbeat"></i>
                                            <i class="iconApp fa fa-history" data-icon="fa-history"></i>
                                            <i class="iconApp fa fa-home" data-icon="fa-home"></i>
                                            <i class="iconOther fa fa-inbox" data-icon="fa-inbox"></i>
                                            <i class="iconApp fa fa-info" data-icon="fa-info"></i>
                                            <i class="iconApp fa fa-info-circle" data-icon="fa-info-circle"></i>
                                            <i class="iconOther fa fa-key" data-icon="fa-key"></i>
                                            <i class="iconApp fa fa-keyboard-o" data-icon="fa-keyboard-o"></i>
                                            <i class="iconApp fa fa-language" data-icon="fa-language"></i>
                                            <i class="iconApp fa fa-laptop" data-icon="fa-laptop"></i>
                                            <i class="iconOther fa fa-leaf" data-icon="fa-leaf"></i>
                                            <i class="iconOther fa fa-lemon-o" data-icon="fa-lemon-o"></i>
                                            <i class="iconApp fa fa-level-down" data-icon="fa-level-down"></i>
                                            <i class="iconApp fa fa-level-up" data-icon="fa-level-up"></i>
                                            <i class="iconOther fa fa-life-ring" data-icon="fa-life-ring"></i>
                                            <i class="iconApp fa fa-lightbulb-o" data-icon="fa-lightbulb-o"></i>
                                            <i class="iconChart fa fa-line-chart" data-icon="fa-line-chart"></i>
                                            <i class="iconApp fa fa-location-arrow" data-icon="fa-location-arrow"></i>
                                            <i class="iconApp fa fa-lock" data-icon="fa-lock"></i>
                                            <i class="iconOther fa fa-magic" data-icon="fa-magic"></i>
                                            <i class="iconOther fa fa-magnet" data-icon="fa-magnet"></i>
                                            <i class="iconOther fa fa-male" data-icon="fa-male"></i>
                                            <i class="iconApp fa fa-map-marker" data-icon="fa-map-marker"></i>
                                            <i class="iconOther fa fa-meh-o" data-icon="fa-meh-o"></i>
                                            <i class="iconOther fa fa-microphone" data-icon="fa-microphone"></i>
                                            <i class="iconOther fa fa-microphone-slash" data-icon="fa-microphone-slash"></i>
                                            <i class="iconApp fa fa-minus" data-icon="fa-minus"></i>
                                            <i class="iconApp fa fa-minus-circle" data-icon="fa-minus-circle"></i>
                                            <i class="iconApp fa fa-minus-square" data-icon="fa-minus-square"></i>
                                            <i class="iconApp fa fa-minus-square-o" data-icon="fa-minus-square-o"></i>
                                            <i class="iconApp fa fa-mobile" data-icon="fa-mobile"></i>
                                            <i class="iconApp fa fa-money" data-icon="fa-money"></i>
                                            <i class="iconOther fa fa-moon-o" data-icon="fa-moon-o"></i>
                                            <i class="iconTransportation fa fa-motorcycle" data-icon="fa-motorcycle"></i>
                                            <i class="iconOther fa fa-music" data-icon="fa-music"></i>
                                            <i class="iconOther fa fa-newspaper-o" data-icon="fa-newspaper-o"></i>
                                            <i class="iconApp fa fa-paint-brush" data-icon="fa-paint-brush"></i>
                                            <i class="iconOther fa fa-paper-plane" data-icon="fa-paper-plane"></i>
                                            <i class="iconOther fa fa-paper-plane-o" data-icon="fa-paper-plane-o"></i>
                                            <i class="iconOther fa fa-paw" data-icon="fa-paw"></i>
                                            <i class="iconApp fa fa-pencil" data-icon="fa-pencil"></i>
                                            <i class="iconApp fa fa-pencil-square" data-icon="fa-pencil-square"></i>
                                            <i class="iconApp fa fa-pencil-square-o" data-icon="fa-pencil-square-o"></i>
                                            <i class="iconApp fa fa-phone" data-icon="fa-phone"></i>
                                            <i class="iconApp fa fa-phone-square" data-icon="fa-phone-square"></i>
                                            <i class="iconApp fa fa-picture-o" data-icon="fa-picture-o"></i>
                                            <i class="iconChart fa fa-pie-chart" data-icon="fa-pie-chart"></i>
                                            <i class="iconTransportation fa fa-plane" data-icon="fa-plane"></i>
                                            <i class="iconApp fa fa-plug" data-icon="fa-plug"></i>
                                            <i class="iconApp fa fa-plus" data-icon="fa-plus"></i>
                                            <i class="iconApp fa fa-plus-circle" data-icon="fa-plus-circle"></i>
                                            <i class="iconApp fa fa-plus-square" data-icon="fa-plus-square"></i>
                                            <i class="iconApp fa fa-plus-square-o" data-icon="fa-plus-square-o"></i>
                                            <i class="iconApp fa fa-power-off" data-icon="fa-power-off"></i>
                                            <i class="iconApp fa fa-print" data-icon="fa-print"></i>
                                            <i class="iconOther fa fa-puzzle-piece" data-icon="fa-puzzle-piece"></i>
                                            <i class="iconApp fa fa-qrcode" data-icon="fa-qrcode"></i>
                                            <i class="iconApp fa fa-question" data-icon="fa-question"></i>
                                            <i class="iconApp fa fa-question-circle" data-icon="fa-question-circle"></i>
                                            <i class="iconApp fa fa-quote-left" data-icon="fa-quote-left"></i>
                                            <i class="iconApp fa fa-quote-right" data-icon="fa-quote-right"></i>
                                            <i class="iconApp fa fa-random" data-icon="fa-random"></i>
                                            <i class="iconOther fa fa-recycle" data-icon="fa-recycle"></i>
                                            <i class="iconApp fa fa-refresh" data-icon="fa-refresh"></i>
                                            <i class="iconApp fa fa-reply" data-icon="fa-reply"></i>
                                            <i class="iconApp fa fa-reply-all" data-icon="fa-reply-all"></i>
                                            <i class="iconApp fa fa-retweet" data-icon="fa-retweet"></i>
                                            <i class="iconOther fa fa-road" data-icon="fa-road"></i>
                                            <i class="iconTransportation fa fa-rocket" data-icon="fa-rocket"></i>
                                            <i class="iconApp fa fa-rss" data-icon="fa-rss"></i>
                                            <i class="iconApp fa fa-rss-square" data-icon="fa-rss-square"></i>
                                            <i class="iconApp fa fa-search" data-icon="fa-search"></i>
                                            <i class="iconApp fa fa-search-minus" data-icon="fa-search-minus"></i>
                                            <i class="iconApp fa fa-search-plus" data-icon="fa-search-olus"></i>
                                            <i class="iconApp fa fa-server" data-icon="fa-server"></i>
                                            <i class="iconApp fa fa-share" data-icon="fa-share"></i>
                                            <i class="iconApp fa fa-share-alt" data-icon="fa-share-alt"></i>
                                            <i class="iconApp fa fa-share-alt-square" data-icon="fa-share-alt-square"></i>
                                            <i class="iconApp fa fa-share-square" data-icon="fa-share-square"></i>
                                            <i class="iconApp fa fa-share-square-o" data-icon="fa-share-square-o"></i>
                                            <i class="iconApp fa fa-shield" data-icon="fa-shield"></i>
                                            <i class="iconTransportation fa fa-ship" data-icon="fa-ship"></i>
                                            <i class="iconApp fa fa-shopping-cart" data-icon="fa-shopping-cart"></i>
                                            <i class="iconApp fa fa-sign-in" data-icon="fa-sign-in"></i>
                                            <i class="iconApp fa fa-sign-out" data-icon="fa-sign-out"></i>
                                            <i class="iconOther fa fa-signal" data-icon="fa-signal"></i>
                                            <i class="iconApp fa fa-sitemap" data-icon="fa-sitemap"></i>
                                            <i class="iconApp fa fa-sliders" data-icon="fa-sliders"></i>
                                            <i class="iconOther fa fa-smile-o" data-icon="fa-smile-o"></i>
                                            <i class="iconApp fa fa-sort" data-icon="fa-sort"></i>
                                            <i class="iconApp fa fa-sort-alpha-asc" data-icon="fa-sort-alpha-asc"></i>
                                            <i class="iconApp fa fa-sort-alpha-desc" data-icon="fa-sort-alpha-desc"></i>
                                            <i class="iconApp fa fa-sort-amount-asc" data-icon="fa-sort-amount-asc"></i>
                                            <i class="iconApp fa fa-sort-amount-desc" data-icon="fa-sort-amount-desc"></i>
                                            <i class="iconApp fa fa-sort-asc" data-icon="fa-sort-asc"></i>
                                            <i class="iconApp fa fa-sort-desc" data-icon="fa-sort-desc"></i>
                                            <i class="iconApp fa fa-sort-numeric-asc" data-icon="fa-sort-numeric-asc"></i>
                                            <i class="iconApp fa fa-sort-numeric-desc" data-icon="fa-sort-numeric-desc"></i>
                                            <i class="iconTransportation fa fa-space-shuttle" data-icon="fa-space-shuttle"></i>
                                            <i class="iconApp fa fa-spinner" data-icon="fa-spinner"></i>
                                            <i class="iconOther fa fa-spoon" data-icon="fa-spoon"></i>
                                            <i class="iconGraphic fa fa-square" data-icon="fa-square"></i>
                                            <i class="iconGraphic fa fa-square-o" data-icon="fa-square-o"></i>
                                            <i class="iconGraphic fa fa-star" data-icon="fa-star"></i>
                                            <i class="iconGraphic fa fa-star-half" data-icon="fa-star-half"></i>
                                            <i class="iconGraphic fa fa-star-half-o" data-icon="fa-star-half-o"></i>
                                            <i class="iconGraphic fa fa-star-o" data-icon="fa-star-o"></i>
                                            <i class="iconApp fa fa-street-view" data-icon="fa-street-view"></i>
                                            <i class="iconOther fa fa-suitcase" data-icon="fa-suitcase"></i>
                                            <i class="iconOther fa fa-sun-o" data-icon="fa-sun-o"></i>
                                            <i class="iconApp fa fa-tablet" data-icon="fa-tablet"></i>
                                            <i class="iconOther fa fa-tachometer" data-icon="fa-tachometer"></i>
                                            <i class="iconApp fa fa-tag" data-icon="fa-tag"></i>
                                            <i class="iconApp fa fa-tags" data-icon="fa-tags"></i>
                                            <i class="iconApp fa fa-tasks" data-icon="fa-tasks"></i>
                                            <i class="iconTransportation fa fa-taxi" data-icon="fa-taxi"></i>
                                            <i class="iconApp fa fa-terminal" data-icon="fa-terminal"></i>
                                            <i class="iconApp fa fa-thumb-tack" data-icon="fa-thumb-tack"></i>
                                            <i class="iconApp fa fa-thumbs-down" data-icon="fa-thumbs-down"></i>
                                            <i class="iconApp fa fa-thumbs-o-down" data-icon="fa-thumbs-o-down"></i>
                                            <i class="iconApp fa fa-thumbs-up" data-icon="fa-thumbs-up"></i>
                                            <i class="iconApp fa fa-thumbs-o-up" data-icon="fa-thumbs-o-up"></i>
                                            <i class="iconOther fa fa-ticket" data-icon="fa-ticket"></i>
                                            <i class="iconApp fa fa-times" data-icon="fa-times"></i>
                                            <i class="iconApp fa fa-times-circle" data-icon="fa-times-circle"></i>
                                            <i class="iconApp fa fa-times-circle-o" data-icon="fa-times-circle-o"></i>
                                            <i class="iconOther fa fa-tint" data-icon="fa-tint"></i>
                                            <i class="iconApp fa fa-toggle-off" data-icon="fa-toggle-off"></i>
                                            <i class="iconApp fa fa-toggle-on" data-icon="fa-toggle-on"></i>
                                            <i class="iconApp fa fa-trash" data-icon="fa-trash"></i>
                                            <i class="iconApp fa fa-trash-o" data-icon="fa-trash-o"></i>
                                            <i class="iconOther fa fa-tree" data-icon="fa-tree"></i>
                                            <i class="iconOther fa fa-trophy" data-icon="fa-trophy"></i>
                                            <i class="iconTransportation fa fa-truck" data-icon="fa-truck"></i>
                                            <i class="iconOther fa fa-tty" data-icon="fa-tty"></i>
                                            <i class="iconOther fa fa-umbrella" data-icon="fa-umbrella"></i>
                                            <i class="iconOther fa fa-university" data-icon="fa-university"></i>
                                            <i class="iconApp fa fa-unlock" data-icon="fa-unlock"></i>
                                            <i class="iconApp fa fa-unlock-alt" data-icon="fa-unlock-alt"></i>
                                            <i class="iconApp fa fa-upload" data-icon="fa-upload"></i>
                                            <i class="iconApp fa fa-user" data-icon="fa-user"></i>
                                            <i class="iconApp fa fa-user-plus" data-icon="fa-user-plus"></i>
                                            <i class="iconApp fa fa-user-times" data-icon="fa-user-times"></i>
                                            <i class="iconApp fa fa-users" data-icon="fa-users"></i>
                                            <i class="iconApp fa fa-video-camera" data-icon="fa-video-camera"></i>
                                            <i class="iconApp fa fa-volume-down" data-icon="fa-volume-down"></i>
                                            <i class="iconApp fa fa-volume-off" data-icon="fa-volume-off"></i>
                                            <i class="iconApp fa fa-volume-up" data-icon="fa-volume-up"></i>
                                            <i class="iconOther fa fa-wheelchair" data-icon="fa-wheelchair"></i>
                                            <i class="iconTransportation fa fa-ambulance" data-icon="fa-ambulance"></i>
                                            <i class="iconTransportation fa fa-subway" data-icon="fa-subway"></i>
                                            <i class="iconTransportation fa fa-train" data-icon="fa-train"></i>
                                            <i class="iconFileType fa fa-file" data-icon="fa-file"></i>
                                            <i class="iconFileType fa fa-file-text" data-icon="fa-file-text"></i>
                                            <i class="iconFileType fa fa-file-text-o" data-icon="fa-file-text-o"></i>
                                            <i class="iconCurrency iconBrand fa fa-btc" data-icon="fa-btc"></i>
                                            <i class="iconCurrency fa fa-eur" data-icon="fa-eur"></i>
                                            <i class="iconCurrency fa fa-gbp" data-icon="fa-gbp"></i>
                                            <i class="iconCurrency fa fa-ils" data-icon="fa-ils"></i>
                                            <i class="iconCurrency fa fa-inr" data-icon="fa-inr"></i>
                                            <i class="iconCurrency fa fa-jpy" data-icon="fa-jpy"></i>
                                            <i class="iconCurrency fa fa-krw" data-icon="fa-krw"></i>
                                            <i class="iconCurrency fa fa-rub" data-icon="fa-rub"></i>
                                            <i class="iconCurrency fa fa-try" data-icon="fa-try"></i>
                                            <i class="iconCurrency fa fa-usd" data-icon="fa-usd"></i>
                                            <i class="iconDirectional fa fa-angle-double-down" data-icon="fa-angle-double-down"></i>
                                            <i class="iconDirectional fa fa-angle-double-left" data-icon="fa-angle-double-left"></i>
                                            <i class="iconDirectional fa fa-angle-double-right" data-icon="fa-angle-double-right"></i>
                                            <i class="iconDirectional fa fa-angle-double-up" data-icon="fa-angle-double-up"></i>
                                            <i class="iconDirectional fa fa-angle-down" data-icon="fa-angle-down"></i>
                                            <i class="iconDirectional fa fa-angle-left" data-icon="fa-angle-left"></i>
                                            <i class="iconDirectional fa fa-angle-right" data-icon="fa-angle-right"></i>
                                            <i class="iconDirectional fa fa-angle-up" data-icon="fa-angle-up"></i>
                                            <i class="iconDirectional fa fa-arrow-circle-down" data-icon="fa-arrow-circle-down"></i>
                                            <i class="iconDirectional fa fa-arrow-circle-left" data-icon="fa-arrow-circle-left"></i>
                                            <i class="iconDirectional fa fa-arrow-circle-o-down" data-icon="fa-arrow-circle-o-down"></i>
                                            <i class="iconDirectional fa fa-arrow-circle-o-left" data-icon="fa-arrow-circle-o-left"></i>
                                            <i class="iconDirectional fa fa-arrow-circle-o-right" data-icon="fa-arrow-circle-o-right"></i>
                                            <i class="iconDirectional fa fa-arrow-circle-o-up" data-icon="fa-arrow-circle-o-up"></i>
                                            <i class="iconDirectional fa fa-arrow-circle-right" data-icon="fa-arrow-circle-right"></i>
                                            <i class="iconDirectional fa fa-arrow-circle-up" data-icon="fa-arrow-circle-up"></i>
                                            <i class="iconDirectional fa fa-arrow-down" data-icon="fa-arrow-down"></i>
                                            <i class="iconDirectional fa fa-arrow-left" data-icon="fa-arrow-left"></i>
                                            <i class="iconDirectional fa fa-arrow-right" data-icon="fa-arrow-right"></i>
                                            <i class="iconDirectional fa fa-arrow-up" data-icon="fa-arrow-up"></i>
                                            <i class="iconDirectional fa fa-arrows-alt" data-icon="fa-arrows-alt"></i>
                                            <i class="iconDirectional fa fa-caret-down" data-icon="fa-caret-down"></i>
                                            <i class="iconDirectional fa fa-caret-left" data-icon="fa-caret-left"></i>
                                            <i class="iconDirectional fa fa-caret-right" data-icon="fa-caret-right"></i>
                                            <i class="iconDirectional fa fa-caret-up" data-icon="fa-caret-up"></i>
                                            <i class="iconDirectional fa fa-chevron-down" data-icon="fa-chevron-down"></i>
                                            <i class="iconDirectional fa fa-chevron-left" data-icon="fa-chevron-left"></i>
                                            <i class="iconDirectional fa fa-chevron-right" data-icon="fa-chevron-right"></i>
                                            <i class="iconDirectional fa fa-chevron-up" data-icon="fa-chevron-up"></i>
                                            <i class="iconDirectional fa fa-hand-o-down" data-icon="fa-hand-o-down"></i>
                                            <i class="iconDirectional fa fa-hand-o-left" data-icon="fa-hand-o-left"></i>
                                            <i class="iconDirectional fa fa-hand-o-right" data-icon="fa-hand-o-right"></i>
                                            <i class="iconDirectional fa fa-hand-o-up" data-icon="fa-hand-o-up"></i>
                                            <i class="iconDirectional fa fa-long-arrow-down" data-icon="fa-long-arrow-down"></i>
                                            <i class="iconDirectional fa fa-long-arrow-left" data-icon="fa-long-arrow-left"></i>
                                            <i class="iconDirectional fa fa-long-arrow-right" data-icon="fa-long-arrow-right"></i>
                                            <i class="iconDirectional fa fa-long-arrow-up" data-icon="fa-long-arrow-up"></i>
                                            <i class="iconBrand fa fa-android" data-icon="fa-android"></i>
                                            <i class="iconBrand fa fa-apple" data-icon="fa-apple"></i>
                                            <i class="iconBrand fa fa-cc-amex" data-icon="fa-cc-amex"></i>
                                            <i class="iconBrand fa fa-cc-mastercard" data-icon="fa-cc-mastercard"></i>
                                            <i class="iconBrand fa fa-cc-paypal" data-icon="fa-cc-paypal"></i>
                                            <i class="iconBrand fa fa-cc-visa" data-icon="fa-cc-visa"></i>
                                            <i class="iconBrand fa fa-codepen" data-icon="fa-codepen"></i>
                                            <i class="iconBrand fa fa-connectdevelop" data-icon="fa-connectdevelop"></i>
                                            <i class="iconBrand fa fa-css3" data-icon="fa-css3"></i>
                                            <i class="iconBrand fa fa-delicious" data-icon="fa-delicious"></i>
                                            <i class="iconBrand fa fa-digg" data-icon="fa-digg"></i>
                                            <i class="iconBrand fa fa-dropbox" data-icon="fa-dropbox"></i>
                                            <i class="iconBrand fa fa-facebook" data-icon="fa-facebook"></i>
                                            <i class="iconBrand fa fa-facebook-official" data-icon="fa-facebook-official"></i>
                                            <i class="iconBrand fa fa-facebook-square" data-icon="fa-facebook-square"></i>
                                            <i class="iconBrand fa fa-flickr" data-icon="fa-flickr"></i>
                                            <i class="iconBrand fa fa-git" data-icon="fa-git"></i>
                                            <i class="iconBrand fa fa-git-square" data-icon="fa-git-square"></i>
                                            <i class="iconBrand fa fa-github" data-icon="fa-github"></i>
                                            <i class="iconBrand fa fa-github-alt" data-icon="fa-github-alt"></i>
                                            <i class="iconBrand fa fa-github-square" data-icon="fa-github-square"></i>
                                            <i class="iconBrand fa fa-google" data-icon="fa-google"></i>
                                            <i class="iconBrand fa fa-google-plus" data-icon="fa-google-plus"></i>
                                            <i class="iconBrand fa fa-google-plus-square" data-icon="fa-google-plus-square"></i>
                                            <i class="iconBrand fa fa-hacker-news" data-icon="fa-hacker-news"></i>
                                            <i class="iconBrand fa fa-html5" data-icon="fa-html5"></i>
                                            <i class="iconBrand fa fa-instagram" data-icon="fa-instagram"></i>
                                            <i class="iconBrand fa fa-jsfiddle" data-icon="fa-jsfiddle"></i>
                                            <i class="iconBrand fa fa-linkedin" data-icon="fa-linkedin"></i>
                                            <i class="iconBrand fa fa-linkedin-square" data-icon="fa-linkedin-square"></i>
                                            <i class="iconBrand fa fa-linux" data-icon="fa-linux"></i>
                                            <i class="iconBrand fa fa-openid" data-icon="fa-openid"></i>
                                            <i class="iconBrand fa fa-pagelines" data-icon="fa-pagelines"></i>
                                            <i class="iconBrand fa fa-paypal" data-icon="fa-paypal"></i>
                                            <i class="iconBrand fa fa-pinterest" data-icon="fa-pinterest"></i>
                                            <i class="iconBrand fa fa-pinterest-p" data-icon="fa-pinterest-p"></i>
                                            <i class="iconBrand fa fa-pinterest-square" data-icon="fa-pinterest-square"></i>
                                            <i class="iconBrand fa fa-skype" data-icon="fa-skype"></i>
                                            <i class="iconBrand fa fa-slideshare" data-icon="fa-slideshare"></i>
                                            <i class="iconBrand fa fa-soundcloud" data-icon="fa-soundcloud"></i>
                                            <i class="iconBrand fa fa-spotify" data-icon="fa-spotify"></i>
                                            <i class="iconBrand fa fa-tumblr" data-icon="fa-tumblr"></i>
                                            <i class="iconBrand fa fa-tumblr-square" data-icon="fa-tumblr-square"></i>
                                            <i class="iconBrand fa fa-twitter" data-icon="fa-twitter"></i>
                                            <i class="iconBrand fa fa-twitter-square" data-icon="fa-twitter-square"></i>
                                            <i class="iconBrand fa fa-vimeo-square" data-icon="fa-vimeo-square"></i>
                                            <i class="iconBrand fa fa-vine" data-icon="fa-vine"></i>
                                            <i class="iconBrand fa fa-windows" data-icon="fa-windows"></i>
                                            <i class="iconBrand fa fa-wordpress" data-icon="fa-wordpress"></i>
                                            <i class="iconBrand fa fa-yahoo" data-icon="fa-yahoo"></i>
                                            <i class="iconBrand fa fa-youtube" data-icon="fa-youtube"></i>
                                            <i class="iconBrand fa fa-youtube-play" data-icon="fa-youtube-play"></i>
                                            <i class="iconBrand fa fa-youtube-square" data-icon="fa-youtube-square"></i>
                                            <i class="iconOther fa fa-h-square" data-icon="fa-h-square"></i>
                                            <i class="iconOther fa fa-hospital-o" data-icon="fa-hospital-o"></i>
                                            <i class="iconOther fa fa-medkit" data-icon="fa-medkit"></i>
                                            <i class="iconOther fa fa-stethoscope" data-icon="fa-stethoscope"></i>
                                            <i class="iconOther fa fa-user-md" data-icon="fa-user-md"></i>
                                            <?php //version 4.4 ?>
                                            <i class="iconApp fa fa-balance-scale" data-icon="fa-balance-scale"></i>
                                            <i class="iconBrand fa fa-amazon" data-icon="fa-amazon"></i>
                                            <i class="iconApp fa fa-battery-empty" data-icon="fa-battery-empty"></i>
                                            <i class="iconApp fa fa-battery-full" data-icon="fa-battery-full"></i>
                                            <i class="iconApp fa fa-battery-half" data-icon="fa-battery-half"></i>
                                            <i class="iconApp fa fa-battery-quarter" data-icon="fa-battery-quarter"></i>
                                            <i class="iconApp fa fa-battery-three-quarters" data-icon="fa-battery-three-quarters"></i>
                                            <i class="iconBrand fa fa-black-tie" data-icon="fa-black-tie"></i>
                                            <i class="iconApp fa fa-calendar-check-o" data-icon="fa-calendar-check-o"></i>
                                            <i class="iconApp fa fa-calendar-minus-o" data-icon="fa-calendar-minus-o"></i>
                                            <i class="iconApp fa fa-calendar-plus-o" data-icon="fa-calendar-plus-o"></i>
                                            <i class="iconApp fa fa-calendar-times-o" data-icon="fa-calendar-times-o"></i>
                                            <i class="iconBrand fa fa-cc-diners-club" data-icon="fa-cc-diners-club"></i>
                                            <i class="iconBrand fa fa-cc-jcb" data-icon="fa-cc-jcb"></i>
                                            <i class="iconBrand fa fa-chrome" data-icon="fa-chrome"></i>
                                            <i class="iconApp fa fa-clone" data-icon="fa-clone"></i>
                                            <i class="iconApp fa fa-commenting" data-icon="fa-commenting"></i>
                                            <i class="iconApp fa fa-commenting-o" data-icon="fa-commenting-o"></i>
                                            <i class="iconBrand fa fa-contao" data-icon="fa-contao"></i>
                                            <i class="iconApp fa fa-creative-commons" data-icon="fa-creative-commons"></i>
                                            <i class="iconBrand fa fa-expeditedssl" data-icon="fa-expeditedssl"></i>
                                            <i class="iconBrand fa fa-firefox" data-icon="fa-firefox"></i>
                                            <i class="iconBrand fa fa-fonticons" data-icon="fa-fonticons"></i>
                                            <i class="iconBrand fa fa-get-pocket" data-icon="fa-get-pocket"></i>
                                            <i class="iconCurrency fa fa-gg" data-icon="fa-gg"></i>
                                            <i class="iconCurrency fa fa-gg-circle" data-icon="fa-gg-circle"></i>
                                            <i class="iconApp fa fa-hand-lizard-o" data-icon="fa-hand-lizard-o"></i>
                                            <i class="iconApp fa fa-hand-paper-o" data-icon="fa-hand-paper-o"></i>
                                            <i class="iconApp fa fa-hand-peace-o" data-icon="fa-hand-peace-o"></i>
                                            <i class="iconApp fa fa-hand-pointer-o" data-icon="fa-hand-pointer-o"></i>
                                            <i class="iconApp fa fa-hand-rock-o" data-icon="fa-hand-rock-o"></i>
                                            <i class="iconApp fa fa-hand-scissors-o" data-icon="fa-hand-scissors-o"></i>
                                            <i class="iconApp fa fa-hand-spock-o" data-icon="fa-hand-spock-o"></i>
                                            <i class="iconApp fa fa-hourglass" data-icon="fa-hourglass"></i>
                                            <i class="iconApp fa fa-hourglass-end" data-icon="fa-hourglass-end"></i>
                                            <i class="iconApp fa fa-hourglass-half" data-icon="fa-hourglass-half"></i>
                                            <i class="iconApp fa fa-hourglass-o" data-icon="fa-hourglass-o"></i>
                                            <i class="iconApp fa fa-hourglass-start" data-icon="fa-hourglass-start"></i>
                                            <i class="iconBrand fa fa-houzz" data-icon="fa-houzz"></i>
                                            <i class="iconApp fa fa-i-cursor" data-icon="fa-i-cursor"></i>
                                            <i class="iconApp fa fa-industry" data-icon="fa-industry"></i>
                                            <i class="iconBrand fa fa-internet-explorer" data-icon="fa-internet-explorer"></i>
                                            <i class="iconApp fa fa-map" data-icon="fa-map"></i>
                                            <i class="iconApp fa fa-map-o" data-icon="fa-map-o"></i>
                                            <i class="iconApp fa fa-map-pin" data-icon="fa-map-pin"></i>
                                            <i class="iconApp fa fa-map-signs" data-icon="fa-map-signs"></i>
                                            <i class="iconApp fa fa-mouse-pointer" data-icon="fa-mouse-pointer"></i>
                                            <i class="iconApp fa fa-object-group" data-icon="fa-object-group"></i>
                                            <i class="iconApp fa fa-object-ungroup" data-icon="fa-object-ungroup"></i>
                                            <i class="iconBrand fa fa-odnoklassniki" data-icon="fa-odnoklassniki"></i>
                                            <i class="iconBrand fa fa-odnoklassniki-square" data-icon="fa-odnoklassniki-square"></i>
                                            <i class="iconBrand fa fa-opencart" data-icon="fa-opencart"></i>
                                            <i class="iconBrand fa fa-opera" data-icon="fa-opera"></i>
                                            <i class="iconBrand fa fa-optin-monster" data-icon="fa-optin-monster"></i>
                                            <i class="iconApp fa fa-registered" data-icon="fa-registered"></i>
                                            <i class="iconBrand fa fa-safari" data-icon="fa-safari"></i>
                                            <i class="iconApp fa fa-sticky-note" data-icon="fa-sticky-note"></i>
                                            <i class="iconApp fa fa-sticky-note-o" data-icon="fa-sticky-note-o"></i>
                                            <i class="iconApp fa fa-television" data-icon="fa-television"></i>
                                            <i class="iconApp fa fa-trademark" data-icon="fa-trademark"></i>
                                            <i class="iconBrand fa fa-tripadvisor" data-icon="fa-tripadvisor"></i>
                                            <i class="iconBrand fa fa-vimeo" data-icon="fa-vimeo"></i>
                                            <i class="iconBrand fa fa-wikipedia-w" data-icon="fa-wikipedia-w"></i>
                                            <i class="iconBrand fa fa-y-combinator" data-icon="fa-y-combinator"></i>
                                            <?php //4.5.0 ?>
                                            <i class="iconApp fa fa-bluetooth" data-icon="fa-bluetooth"></i>
                                            <i class="iconApp fa fa-bluetooth-b" data-icon="fa-bluetooth-b"></i>
                                            <i class="iconBrand fa fa-codiepie" data-icon="fa-codiepie"></i>
                                            <i class="iconApp fa fa-credit-card-alt" data-icon="fa-credit-card-alt"></i>
                                            <i class="iconBrand fa fa-edge" data-icon="fa-edge"></i>
                                            <i class="iconBrand fa fa-fort-awesome" data-icon="fa-fort-awesome"></i>
                                            <i class="iconApp fa fa-hashtag" data-icon="fa-hashtag"></i>
                                            <i class="iconBrand fa fa-mixcloud" data-icon="fa-mixcloud"></i>
                                            <i class="iconBrand fa fa-modx" data-icon="fa-modx"></i>
                                            <i class="iconApp fa fa-pause-circle" data-icon="fa-pause-circle"></i>
                                            <i class="iconApp fa fa-pause-circle-o" data-icon="fa-pause-circle-o"></i>
                                            <i class="iconApp fa fa-percent" data-icon="fa-percent"></i>
                                            <i class="iconBrand fa fa-product-hunt" data-icon="fa-product-hunt"></i>
                                            <i class="iconBrand fa fa-reddit-alien" data-icon="fa-reddit-alien"></i>
                                            <i class="iconBrand fa fa-scribd" data-icon="fa-scribd"></i>
                                            <i class="iconApp fa fa-shopping-bag" data-icon="fa-shopping-bag"></i>
                                            <i class="iconApp fa fa-shopping-basket" data-icon="fa-shopping-basket"></i>
                                            <i class="iconApp fa fa-stop-circle" data-icon="fa-stop-circle"></i>
                                            <i class="iconApp fa fa-stop-circle-o" data-icon="fa-stop-circle-o"></i>
                                            <i class="iconBrand fa fa-usb" data-icon="fa-usb"></i>
                                            <?php //4.6.3 ?>
                                            <i class="iconApp fa fa-american-sign-language-interpreting" data-icon="fa-american-sign-language-interpreting"></i>
                                            <i class="iconApp fa fa-assistive-listening-systems" data-icon="fa-assistive-listening-systems"></i>
                                            <i class="iconApp fa fa-audio-description" data-icon="fa-audio-description"></i>
                                            <i class="iconApp fa fa-blind" data-icon="fa-blind"></i>
                                            <i class="iconApp fa fa-braille" data-icon="fa-braille"></i>
                                            <i class="iconApp fa fa-deaf" data-icon="fa-deaf"></i>
                                            <i class="iconBrand fa fa-envira" data-icon="fa-envira"></i>
                                            <i class="iconBrand fa fa-first-order" data-icon="fa-first-order"></i>
                                            <i class="iconBrand fa fa-font-awesome" data-icon="fa-font-awesome"></i>
                                            <i class="iconBrand fa fa-gitlab" data-icon="fa-gitlab"></i>
                                            <i class="iconBrand fa fa-glide" data-icon="fa-glide"></i>
                                            <i class="iconBrand fa fa-glide-g" data-icon="fa-glide-g"></i>
                                            <i class="iconBrand fa fa-google-plus-official" data-icon="fa-google-plus-official"></i>
                                            <i class="iconBrand fa fa-instagram" data-icon="fa-instagram"></i>
                                            <i class="iconApp fa fa-low-vision" data-icon="fa-low-vision"></i>
                                            <i class="iconBrand fa fa-pied-piper" data-icon="fa-pied-piper"></i>
                                            <i class="iconApp fa fa-question-circle-o" data-icon="fa-question-circle-o"></i>
                                            <i class="iconApp fa fa-sign-language" data-icon="fa-sign-language"></i>
                                            <i class="iconBrand fa fa-snapchat" data-icon="fa-snapchat"></i>
                                            <i class="iconBrand fa fa-snapchat-ghost" data-icon="fa-snapchat-ghost"></i>
                                            <i class="iconBrand fa fa-snapchat-square" data-icon="fa-snapchat-square"></i>
                                            <i class="iconBrand fa fa-themeisle" data-icon="fa-themeisle"></i>
                                            <i class="iconApp fa fa-universal-access" data-icon="fa-universal-access"></i>
                                            <i class="iconBrand fa fa-viadeo" data-icon="fa-viadeo"></i>
                                            <i class="iconBrand fa fa-viadeo-square" data-icon="fa-viadeo-square"></i>
                                            <i class="iconApp fa fa-volume-control-phone" data-icon="fa-volume-control-phone"></i>
                                            <i class="iconApp fa fa-wheelchair-alt" data-icon="fa-wheelchair-alt"></i>
                                            <i class="iconBrand fa fa-wpbeginner" data-icon="fa-wpbeginner"></i>
                                            <i class="iconBrand fa fa-wpforms" data-icon="fa-wpforms"></i>
                                            <i class="iconBrand fa fa-yoast" data-icon="fa-yoast"></i>
                                            <?php //4.7.0 ?>
                                            <i class="iconApp fa fa-address-book" data-icon="fa-address-book"></i>
                                            <i class="iconApp fa fa-address-book-o" data-icon="fa-address-book-o"></i>
                                            <i class="iconApp fa fa-address-card" data-icon="fa-address-card"></i>
                                            <i class="iconApp fa fa-address-card-o" data-icon="fa-address-card-o"></i>
                                            <i class="iconBrand fa fa-bandcamp" data-icon="fa-bandcamp"></i>
                                            <i class="iconApp fa fa-bath" data-icon="fa-bath"></i>
                                            <i class="iconBrand fa fa-eercast" data-icon="fa-eercast"></i>
                                            <i class="iconApp fa fa-envelope-open" data-icon="fa-envelope-open"></i>
                                            <i class="iconApp fa fa-envelope-open-o" data-icon="fa-envelope-open-o"></i>
                                            <i class="iconBrand fa fa-etsy" data-icon="fa-etsy"></i>
                                            <i class="iconBrand fa fa-free-code-camp" data-icon="fa-free-code-camp"></i>
                                            <i class="iconBrand fa fa-grav" data-icon="fa-grav"></i>
                                            <i class="iconApp fa fa-handshake-o" data-icon="fa-handshake-o"></i>
                                            <i class="iconApp fa fa-id-badge" data-icon="fa-id-badge"></i>
                                            <i class="iconApp fa fa-id-card" data-icon="fa-id-card"></i>
                                            <i class="iconApp fa fa-id-card-o" data-icon="fa-id-card-o"></i>
                                            <i class="iconBrand fa fa-imdb" data-icon="fa-imdb"></i>
                                            <i class="iconBrand fa fa-linode" data-icon="fa-linode"></i>
                                            <i class="iconBrand fa fa-meetup" data-icon="fa-meetup"></i>
                                            <i class="iconApp fa fa-microchip" data-icon="fa-microchip"></i>
                                            <i class="iconApp fa fa-podcast" data-icon="fa-podcast"></i>
                                            <i class="iconBrand fa fa-quora" data-icon="fa-quora"></i>
                                            <i class="iconBrand fa fa-ravelry" data-icon="fa-ravelry"></i>
                                            <i class="iconApp fa fa-shower" data-icon="fa-shower"></i>
                                            <i class="iconApp fa fa-snowflake-o" data-icon="fa-snowflake-o"></i>
                                            <i class="iconBrand fa fa-superpowers" data-icon="fa-superpowers"></i>
                                            <i class="iconBrand fa fa-telegram" data-icon="fa-telegram"></i>
                                            <i class="iconApp fa fa-thermometer-empty" data-icon="fa-thermometer-empty"></i>
                                            <i class="iconApp fa fa-thermometer-full" data-icon="fa-thermometer-full"></i>
                                            <i class="iconApp fa fa-thermometer-half" data-icon="fa-thermometer-half"></i>
                                            <i class="iconApp fa fa-thermometer-quarter" data-icon="fa-thermometer-quarter"></i>
                                            <i class="iconApp fa fa-thermometer-three-quarters" data-icon="fa-thermometer-three-quarters"></i>
                                            <i class="iconApp fa fa-user-circle" data-icon="fa-user-circle"></i>
                                            <i class="iconApp fa fa-user-circle-o" data-icon="fa-user-circle-o"></i>
                                            <i class="iconApp fa fa-user-o" data-icon="fa-user-o"></i>
                                            <i class="iconApp fa fa-window-close" data-icon="fa-window-close"></i>
                                            <i class="iconApp fa fa-window-close-o" data-icon="fa-window-close-o"></i>
                                            <i class="iconApp fa fa-window-maximize" data-icon="fa-window-maximize"></i>
                                            <i class="iconApp fa fa-window-minimize" data-icon="fa-window-minimize"></i>
                                            <i class="iconApp fa fa-window-restore" data-icon="fa-window-restore"></i>
                                            <i class="iconApp fa fa-wpexplorer" data-icon="fa-wpexplorer"></i>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-icon-setting-panel-general -->
                    			<div id="weluka-icon-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php //$ret = WelukaBuilder::get_instance()->weluka_display_style_setting('Icon', array('border')); echo $ret; ?>
                                    <?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
											<label><?php _e('Text Shadow Style', Weluka::$settings['plugin_name']); ?></label>
											<select id="welukaIconSettingShadowStyle" name="welukaIconSettingShadowStyle" class="form-control">
        										<option value=""></option>
        										<option value="basic"><?php _e('Basic', Weluka::$settings['plugin_name']); ?></option>
        										<option value="hard"><?php _e('Hard', Weluka::$settings['plugin_name']); ?></option>
        										<option value="vintage"><?php _e('Vintage', Weluka::$settings['plugin_name']); ?></option>
           									</select>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaIconSettingShadowColorWrap"></div>
                                        </div>
									</div>
                                    <?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Icon'); ?>
									<?php $_builder->weluka_display_margin_setting('Icon'); ?>
									<?php $_builder->weluka_display_css_setting('Icon'); ?>
                        		</div><!-- /#weluka-icon-setting-panel-advanced -->

                                <?php //v1.0.4 add ?>
                    			<div id="weluka-icon-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaIconSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
<?php /* v1.1.2 modify and add
										<h5><?php _e('Icon Size (px)', Weluka::$settings['plugin_name']); ?></h5>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-12">
	                                        	<input id="welukaIconMdSettingIconSize" name="welukaIconMdSettingIconSize" type="text" class="form-control weluka-normal-text" />
                                            	<div class="help-block"><?php _e('Please continue to enter the icon font size.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
*/ ?>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-5">
                                                <label for="welukaIconMdSettingIconSize"><?php _e('Icon Size (px)', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaIconMdSettingIconSize" name="welukaIconMdSettingIconSize" type="text" class="form-control weluka-normal-text" />
                                            	<div class="help-block"><?php _e('Please continue to enter the icon font size.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        	<div class="weluka-col-md-3">
                                                <label for="welukaIconMdSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                                <?php $_builder->weluka_display_align_settings('welukaIconMdSettingAlign', '', false, true, '', true, 'md'); ?>
                                        	</div>
                                    	</div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('IconMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
<?php /* v1.1.2 modify and add
										<h5><?php _e('Icon Size (px)', Weluka::$settings['plugin_name']); ?></h5>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-12">
	                                        	<input id="welukaIconSmSettingIconSize" name="welukaIconSmSettingIconSize" type="text" class="form-control weluka-normal-text" />
                                            	<div class="help-block"><?php _e('Please continue to enter the icon font size.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
*/ ?>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-5">
                                                <label for="welukaIconSmSettingIconSize"><?php _e('Icon Size (px)', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaIconSmSettingIconSize" name="welukaIconSmSettingIconSize" type="text" class="form-control weluka-normal-text" />
                                            	<div class="help-block"><?php _e('Please continue to enter the icon font size.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        	<div class="weluka-col-md-3">
                                                <label for="welukaIconSmSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                                <?php $_builder->weluka_display_align_settings('welukaIconSmSettingAlign', '', false, true, '', true, 'sm'); ?>
                                        	</div>
                                    	</div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('IconSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
<?php /* v1.1.2 modify and add
										<h5><?php _e('Icon Size (px)', Weluka::$settings['plugin_name']); ?></h5>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-12">
	                                        	<input id="welukaIconXsSettingIconSize" name="welukaIconXsSettingIconSize" type="text" class="form-control weluka-normal-text" />
                                            	<div class="help-block"><?php _e('Please continue to enter the icon font size.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
*/ ?>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-5">
                                                <label for="welukaIconXsSettingIconSize"><?php _e('Icon Size (px)', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaIconXsSettingIconSize" name="welukaIconXsSettingIconSize" type="text" class="form-control weluka-normal-text" />
                                            	<div class="help-block"><?php _e('Please continue to enter the icon font size.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        	<div class="weluka-col-md-3">
                                                <label for="welukaIconXsSettingAlign"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                                <?php $_builder->weluka_display_align_settings('welukaIconXsSettingAlign', '', false, true, '', true, 'xs'); ?>
                                        	</div>
                                    	</div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('IconXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-icon-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>

                                <input type="hidden" id="welukaIconSettingInvoker" name="welukaIconSettingInvoker" value="" />
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-icon-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end icon setting modal ?>

<?php
/**
 * slide dialog setting
 * @since 1.0
 * @update
 * ver1.0.1
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 * ver1.2.4
 */
?>
<div id="weluka-slide-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="slideSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="slideSettingModalLabel" class="modal-title"><?php _e('Slide Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-slide-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-slide-setting-panel-setting" class="weluka-a"><?php _e('Slide Setting', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-slide-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-slide-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-slide-setting-form" name="weluka-slide-setting-form" role="form">
                    			<div id="weluka-slide-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="help-block">
                                    	<?php _e('After saving of this setting, if the change on the builder is not reflected, make the builder [Save], please reload the page.', Weluka::$settings['plugin_name']); ?>
                                    </div>
									<div class="form-group">
	                                    <div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label for="welukaSlideSettingImageSize"><?php _e('Image Size', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-xs-8">
                                            	<select id="welukaSlideSettingImageSize" name="welukaSlideSettingImageSize" class="form-control">
													<option value="full"><?php _e('Full Size', Weluka::$settings['plugin_name']); ?></option> 
													<option value="thumbnail"><?php _e('Thumbnail Size', Weluka::$settings['plugin_name']); ?></option>
													<option value="medium"><?php _e('Medium Size', Weluka::$settings['plugin_name']); ?></option> 
													<option value="large"><?php _e('Large Size', Weluka::$settings['plugin_name']); ?></option> 
												</select>
                                       		</div>
                                        </div>
                                    </div>
		                            <div class="form-group">
                                    	<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Slide Setting', Weluka::$settings['plugin_name']); ?></label></div>
	                                        <div class="weluka-col-md-8">
                                            	<?php //v1.2.4 add ?>
                                                <label for="welukaSlideSettingType"><?php _e('Slide Type', Weluka::$settings['plugin_name']); ?></label>
	                                            <select id="welukaSlideSettingType" name="welukaSlideSettingType" class="form-control">
    	                                        	<option value="basic" selected="selected"><?php _e('Basic Slide', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="thumb"><?php _e('Slide with Thumbnail', Weluka::$settings['plugin_name']); ?></option>
    	                                        	<option value="carousel"><?php _e('Carousel', Weluka::$settings['plugin_name']); ?></option>
            	                                </select>
												<?php //v1.2.4 addend ?>

                                                <div class="weluka-mgtop-s">
                                                <label for="welukaSlideSettingEffect"><?php _e('Slide Effect', Weluka::$settings['plugin_name']); ?></label>
		                                            <select id="welukaSlideSettingEffect" name="welukaSlideSettingEffect" class="form-control">
    		                                        	<option value="<?php echo $_builder->slide_effects['fade']; ?>" selected="selected"><?php _e('fade', Weluka::$settings['plugin_name']); ?></option>
    		                                        	<option value="<?php echo $_builder->slide_effects['slideh']; ?>"><?php _e('slide horizontal', Weluka::$settings['plugin_name']); ?></option>
            		                                </select>
                                        	        <div class="weluka-mgtop-xs help-block"><?php _e('Carousel slide, see slide horizontal.', Weluka::$settings['plugin_name']); ?></div>
                                                </div>
                                                
                                            	<?php //v1.2.4 add ?>
                                                <div class="weluka-mgtop-s">
	                                               	<div class="form-group">
    	                                        		<label><?php _e('Number of thumbnails (Carousel)', Weluka::$settings['plugin_name']); ?></label>
	    	                                    		<input id="welukaSlideSettingThumbDispNum" name="welukaSlideSettingThumbDispNum" type="text" class="form-control" />
														<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                	            							<p style="font-weight:bold;padding-bottom:10px;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
															<label><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></label>
	                    	                    			<input id="welukaSlideSettingThumbDispNumSm" name="welukaSlideSettingThumbDispNumSm" type="text" class="form-control" />
															<label><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></label>
	                            	            			<input id="welukaSlideSettingThumbDispNumXs" name="welukaSlideSettingThumbDispNumXs" type="text" class="form-control" />
														</div>
                                        	        	<div class="weluka-mgtop-xs help-block"><?php _e('"Slide with Thumbnail", "Carousel", the specified number of plane 1.', Weluka::$settings['plugin_name']); ?></div>
                                            		</div>
                                                </div>
                                                <div class="weluka-mgtop-s">
	                                            	<div class="form-group">
    	                                        		<label><?php _e('Space between thumbnails(px)', Weluka::$settings['plugin_name']); ?></label>
	    	                                    		<input id="welukaSlideSettingThumbMargin" name="welukaSlideSettingThumbMargin" type="text" class="form-control" />
                                        	        	<div class="weluka-mgtop-xs help-block"><?php _e('To set the space between the thumbnail (Carousel). Enter "0" If you want to eliminate the margin.', Weluka::$settings['plugin_name']); ?></div>
                                                    </div>
                                                </div>
                                                <div class="weluka-mgtop-s">
	                                            	<div class="form-group">
    	                                        		<label><?php _e('Thumbnail margin top(px)', Weluka::$settings['plugin_name']); ?></label>
	    	                                    		<input id="welukaSlideSettingThumbMarginTop" name="welukaSlideSettingThumbMarginTop" type="text" class="form-control" />
                                        	        	<div class="weluka-mgtop-xs help-block"><?php _e('To set the margin between thumbnails and main slide "Slide with Thumbnail" you. Enter "0" If you want to eliminate the margin.', Weluka::$settings['plugin_name']); ?></div>
                                                    </div>
                                                </div>
                                            	<?php //v1.2.4 addend ?>
                                                
                                                <div class="weluka-mgtop-s">
													<input id="welukaSlideSettingAuto" name="welukaSlideSettingAuto" type="checkbox" value="1" />
    	                                        	<label for="welukaSlideSettingAuto"><?php _e('Slideshow auto Start.', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                                <div class="weluka-mgtop-s">
													<input id="welukaSlideSettingLoop" name="welukaSlideSettingLoop" type="checkbox" value="1" />
	                                            	<label for="welukaSlideSettingLoop"><?php _e('Slideshow loop.', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
												<div class="weluka-mgtop-s">
	                                            	<label for="welukaSlideSettingMsec"><?php _e('Slideshow Speed (msec).', Weluka::$settings['plugin_name']); ?></label>
													<input id="welukaSlideSettingMsec" name="welukaSlideSettingMsec" type="text" class="form-control weluka-normal-text" value="" />
                                                </div>
												<div class="weluka-mgtop-s">
	                                            	<label for="welukaSlideSettingAnimetionMsec"><?php _e('Animation Speed (msec).', Weluka::$settings['plugin_name']); ?></label>
													<input id="welukaSlideSettingAnimationMsec" name="welukaSlideSettingAnimationMsec" type="text" class="form-control weluka-normal-text" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
		                            <div class="form-group">
                                    	<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Slide Navigation', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaSlideSettingDnav" name="welukaSlideSettingDnav" type="checkbox" value="1" />
                                            	<label for="welukaSlideSettingDnav"><?php _e('Show control navi.', Weluka::$settings['plugin_name']); ?></label>
                                                <?php //TODO navi style template select ?>
		                               			<div class="weluka-mgtop-xs">
													<input id="welukaSlideSettingPnav" name="welukaSlideSettingPnav" type="checkbox" value="1" />
    	                                        	<label for="welukaSlideSettingPnav"><?php _e('Show pagination navi.', Weluka::$settings['plugin_name']); ?></label>
                                        	        <div class="weluka-mgtop-xs help-block"><?php _e('"Slide with Thumbnail" If the paging navigation is displayed.', Weluka::$settings['plugin_name']); ?></div>
                                        		</div>
                                            </div>
                                        </div>
                                    </div>
									<?php //ver1.0.1 add ?>
		                            <div class="form-group">
                                    	<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Control Navi Color', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<div id="welukaSlideSettingDnavColorWrap"></div>
                                            </div>
                                        </div>
                                    </div>
		                            <div class="form-group">
                                    	<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Pagination Navi Color', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<div id="welukaSlideSettingPnavColorWrap"></div>
                                            </div>
                                        </div>
                                    </div>
									<?php //ver1.0.1 addend ?>
                        		</div><!-- /#weluka-slide-setting-panel-general -->
                                <div id="weluka-slide-setting-panel-setting" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-7">
            								<div id="weluka-slide-setting-preview" class="img-thumb-wrap-wide weluka-mgbottom-s" style="background-size:cover;">
                                            	<input type="hidden" id="welukaSlideSettingSelectId" name="welukaSlideSettingSelectId" value="" />
                                            </div>
                                        	<div id="weluka-slide-setting-meta">
                                				<div class="form-group">
													<h5 class="weluka-mgtop-m"><?php _e('Slide Link Url', Weluka::$settings['plugin_name']); ?></h5>
	                                        		<input id="welukaSlideSettingLinkUrl" name="welukaSlideSettingLinkUrl" type="text" class="form-control" />
                                                    <?php /* v1.2 modify
                                                	<input id="welukaSlideSettingLinkTarget" name="welukaSlideSettingLinkTarget" type="checkbox" value="_blank" />
                                                	<label for="welukaSlideSettingLinkTarget"><?php _e('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']); ?></label>
													*/ ?>
                                                	<div class="weluka-mgtop-s">
                                    					<button type="button" data-link-target="widgetslidemodal" data-link-textarea="#welukaSlideSettingLinkUrl" class="weluka-wplink-button weluka-btn weluka-btn-org weluka-btn-info btn-xs"><?php _e('Select Link', Weluka::$settings['plugin_name']); ?></button>
 		                                    		</div>
                                                    <div class="weluka-mgtop-s"><label><input type="radio" id="welukaSlideSettingLinkTarget_0" name="welukaSlideSettingLinkTarget" value="" />&nbsp;<?php _e('Open link in the same window', Weluka::$settings['plugin_name']); ?></label></div>
                                                    <div><label><input type="radio" id="welukaSlideSettingLinkTarget_1" name="welukaSlideSettingLinkTarget" value="_blank" />&nbsp;<?php _e('Open links in a new window or new tab', Weluka::$settings['plugin_name']); ?></label></div>
                                                    <div><label><input type="radio" id="welukaSlideSettingLinkTarget_2" name="welukaSlideSettingLinkTarget" value="iframe" />&nbsp;<?php _e('Open the link in a Popup iframe', Weluka::$settings['plugin_name']); ?></label></div>
                                                    <div><label><input type="radio" id="welukaSlideSettingLinkTarget_3" name="welukaSlideSettingLinkTarget" value="zoom" />&nbsp;<?php _e('To view the slide image Popup (zoom)', Weluka::$settings['plugin_name']); ?></label></div>
	                                                <div class="weluka-mgtop-s help-block"><?php _e('Cannot the Popup iframe external site links.', Weluka::$settings['plugin_name']); ?></div>
													<?php //v1.2 modify end ?>
    		                            		</div>

                                            	<div class="form-group">
                                                	<h5 class="weluka-mgtop-m"><?php _e('Description', Weluka::$settings['plugin_name']); ?></h5>
                                                	<input id="welukaSlideSettingFlgDescription" name="welukaSlideSettingFlgDescription" type="checkbox" value="1" />
                                                	<label for="welukaSlideSettingFlgDescription"><?php _e('Display a description on a slide.', Weluka::$settings['plugin_name']); ?></label>
                                           		<?php
													wp_editor('', 'welukaslidecodeeditorcontent', array(
														'media_buttons' => false,
														'textarea_rows' => 3
													));
												?>
                                            	</div>

                                                <div class="form-group">
                                                	<h5 class="weluka-mgtop-m"><?php _e('Description Position', Weluka::$settings['plugin_name']); ?></h5>
                                            		<select id="welukaSlideSettingDescriptionPos" name="welukaSlideSettingImageSizePos" class="form-control">
														<option value=""><?php _e('none', Weluka::$settings['plugin_name']); ?></option> 
														<option value="top"><?php _e('Top', Weluka::$settings['plugin_name']); ?></option> 
														<option value="bottom"><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></option> 
														<option value="left"><?php _e('Left', Weluka::$settings['plugin_name']); ?></option> 
														<option value="right"><?php _e('Right', Weluka::$settings['plugin_name']); ?></option> 
													</select>
                                       			</div>
                                                
                                                <div class="form-group">
                                                	<h5 class="weluka-mgtop-m"><?php _e('Description Background Color', Weluka::$settings['plugin_name']); ?></h5>
                                                    <div id="welukaSlideSettingDescriptionBgColorWrap">
 													<!--input type="text" id="welukaSlideSettingDescriptionBgColor" name="welukaSlideSettingDescriptionBgColor" class="weluka-color-picker form-control" value="" /-->
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                	<h5 class="weluka-mgtop-m"><?php _e('Description Text Color', Weluka::$settings['plugin_name']); ?></h5>
                                                    <div id="welukaSlideSettingDescriptionTextColorWrap">
 													<!--input type="text" id="welukaSlideSettingDescriptionTextColor" name="welukaSlideSettingDescriptionTextColor" class="weluka-color-picker form-control" value="" /-->
                                                    </div>
                                                </div>
                                                
                                                <?php //ver1.0.1 add ?>
                                                <div class="form-group">
													<h5 class="weluka-mgtop-m"><?php _e('Description Container Padding (px)', Weluka::$settings['plugin_name']); ?></h5>
                                					<div class="weluka-row clearfix">
                                    					<div class="weluka-col-md-3">
															<label><?php _e('Top', Weluka::$settings['plugin_name']); ?></label>
    	    												<input id="welukaSlideSettingDescriptionPdTop" name="welukaSlideSettingDescriptionPdTop" type="text" class="form-control" />
                                                       	</div>
                                    					<div class="weluka-col-md-3">
															<label><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></label>
    	    												<input id="welukaSlideSettingDescriptionPdBottom" name="welukaSlideSettingDescriptionPdBottom" type="text" class="form-control" />
        												</div>
                                    					<div class="weluka-col-md-3">
															<label><?php _e('Left', Weluka::$settings['plugin_name']); ?></label>
	        												<input id="welukaSlideSettingDescriptionPdLeft" name="welukaSlideSettingDescriptionPdLeft" type="text" class="form-control" />
        												</div>
                                    					<div class="weluka-col-md-3">
															<label><?php _e('Right', Weluka::$settings['plugin_name']); ?></label>
	        												<input id="welukaSlideSettingDescriptionPdRight" name="welukaSlideSettingDescriptionPdRight" type="text" class="form-control" />
	        											</div>
                                                    </div>
 												</div>
                                                <div class="form-group">
													<h5 class="weluka-mgtop-m"><?php _e('Description Container width', Weluka::$settings['plugin_name']); ?></h5>
    	    										<input id="welukaSlideSettingDescriptionWidth" name="welukaSlideSettingDescriptionWidth" type="text" class="form-control" style="width:80px;display:inline-block;" />&nbsp;&nbsp;
                                                    <label><input type="radio" id="welukaSlideSettingDescriptionWidthUnit_0" name="welukaSlideSettingDescriptionWidthUnit" value="par" />&nbsp;<?php _e('%', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                                                    <label><input type="radio" id="welukaSlideSettingDescriptionWidthUnit_1" name="welukaSlideSettingDescriptionWidthUnit" value="px" />&nbsp;<?php _e('px', Weluka::$settings['plugin_name']); ?></label>
 												</div>
                                                <div class="form-group">
													<h5 class="weluka-mgtop-m"><?php _e('Description Text Shadow', Weluka::$settings['plugin_name']); ?></h5>
                                					<div class="weluka-row clearfix">
														<div class="weluka-col-md-6">
                                        					<label><?php _e('Text Shadow Style', Weluka::$settings['plugin_name']); ?></label>
															<select id="welukaSlideSettingDescriptionTextShadowStyle" name="welukaSlideSettingDescriptionTextShadowStyle" class="form-control">
        														<option value=""></option>
        														<option value="basic"><?php _e('Basic', Weluka::$settings['plugin_name']); ?></option>
        														<option value="hard"><?php _e('Hard', Weluka::$settings['plugin_name']); ?></option>
        														<option value="vintage"><?php _e('Vintage', Weluka::$settings['plugin_name']); ?></option>
           													</select>
                                        				</div>
                                        				<div class="weluka-col-md-4">
															<label><?php _e('Shadow Color', Weluka::$settings['plugin_name']); ?></label>
															<div id="welukaSlideSettingDescriptionTextShadowColorWrap"></div>
                                        				</div>
													</div>
                                                </div>
                                                <?php //ver1.0.1 addend ?>

                                                <div class="form-group">
                                                    <div id="welukaSlideSettingMsgArea" class="welukaMsgArea"></div>
													<button type="button" class="welukaSlideSettingMetaRegBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('Reg', Weluka::$settings['plugin_name']); ?></button>
                                                </div>
                                            </div><!-- /#weluka-slide-setting-meta -->
                                        </div>
                                        <div class="weluka-col-md-5">
                                        	<div id="weluka-slide-setting-list" class="weluka-gallery-list-container"></div>
                                        </div>
                                    </div>
                                </div><!-- /#weluka-slide-setting-panel-setting -->
                    			<div id="weluka-slide-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('Slide'); ?>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaSlideSettingBoxShadowStyle', true, false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaSlideSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Slide'); ?>
									<?php $_builder->weluka_display_margin_setting('Slide'); ?>
									<?php $_builder->weluka_display_css_setting('Slide'); ?>
                        		</div><!-- /#weluka-slide-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-slide-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaSlideSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SlideMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SlideSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SlideXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-slide-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
                            </form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-slide-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end slide setting modal ?>

<?php
/**
 * sns button dialog setting
 * @update
 * ver1.0.4
 * ver1.0.5
 * ver1.2
 */
?>
<div id="weluka-snsbtn-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="snsbtnSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="snsbtnSettingModalLabel" class="modal-title"><?php _e('Social Button Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-snsbtn-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-snsbtn-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-snsbtn-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-snsbtn-setting-form" name="weluka-snsbtn-setting-form" role="form">
                    			<div id="weluka-snsbtn-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                <?php foreach($_builder->sns_buttons as $key => $sns) : ?>
                                    <div class="form-group" style="border-bottom:2px dashed #ddd;">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4">
                                                <input id="welukaSnsbtnSetting_<?php echo $key; ?>" data-type="<?php echo $_builder::WIDGET_SNS_BUTTON; ?>" data-snstype="<?php echo $key; ?>" name="welukaSnsbtnSetting_<?php echo $key; ?>" type="checkbox" value="on" class="welukaSnsbtnSetting_chk" />
                                            	<label for="welukaSnsbtnSetting_<?php echo $key; ?>"><?php echo $sns['label']; ?></label>
                                            </div>
                                        	<div class="weluka-col-md-8 welukaSnsbtnSettingInputArea_<?php echo $key; ?>">
<?php /* v1.3 modify
                                            	<label for="welukaSnsbtnSettingUrl_<?php echo $key; ?>"><?php _e($key . ' URL', Weluka::$settings['plugin_name']); ?></label>
*/ ?>
                                            	<label for="welukaSnsbtnSettingUrl_<?php echo $key; ?>"><?php _e($sns['label'] . ' URL', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaSnsbtnSettingUrl_<?php echo $key; ?>" name="welukaSnsbtnSettingUrl_<?php echo $key; ?>" type="text" class="form-control weluka-normal-text" />
                                                <div class="weluka-mgtop-xs">
 		                                           	<label for="welukaSnsbtnSettingUrl_<?php echo $key; ?>"><?php _e('Button Text', Weluka::$settings['plugin_name']); ?></label>
	    	                                    	<input id="welukaSnsbtnSettingText_<?php echo $key; ?>" name="welukaSnsbtnSettingText_<?php echo $key; ?>" type="text" class="form-control" />
												</div>
												<?php if($key === 'google'){  // add v1.2.8
													echo '<div class="weluka-mgtop-xs help-block">';
													_e('Google+ is obsoleted.', Weluka::$settings['plugin_name']);
													echo '</div>';
												}
												?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                    <div class="form-group weluka-mgtop-s">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-12">
                                                <?php $_builder->weluka_display_align_settings('welukaSnsbtnSettingAlign'); ?>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-snsbtn-setting-panel-general -->
                    			<div id="weluka-snsbtn-setting-panel-advanced" class="weluka-builder-settings-panel">
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Snsbtn'); ?>
									<?php $_builder->weluka_display_margin_setting('Snsbtn'); ?>
									<?php $_builder->weluka_display_css_setting('Snsbtn'); ?>
                        		</div><!-- /#weluka-snsbtn-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-snsbtn-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaSnsbtnSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
                                    	<?php $_builder->weluka_display_align_settings('welukaSnsbtnMdSettingAlign', 'Alignment', true, true, '', true, 'md'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SnsbtnMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
                                    	<?php $_builder->weluka_display_align_settings('welukaSnsbtnSmSettingAlign', 'Alignment', true, true, '', true, 'sm'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SnsbtnSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
                                    	<?php $_builder->weluka_display_align_settings('welukaSnsbtnXsSettingAlign', 'Alignment', true, true, '', true, 'xs'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SnsbtnXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-snsbtn-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-snsbtn-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end sns button setting modal ?>

<?php
/**
 * sns share button dialog setting
 * @update
 * ver1.0.4
 * ver1.0.5
 * ver1.2
 */
?>
<div id="weluka-snsshare-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="snsshareSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="snsshareSettingModalLabel" class="modal-title"><?php _e('Social Share Button Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-snsshare-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-snsshare-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-snsshare-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-snsshare-setting-form" name="weluka-snsshare-setting-form" role="form">
                    			<div id="weluka-snsshare-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                <?php foreach($_builder->sns_share_buttons as $key => $sns) : ?>
                                    <div class="form-group" style="border-bottom:2px dashed #ddd;">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4">
                                            	<label for="welukaSnsshareSetting_<?php echo $key; ?>"><?php echo $sns['label']; ?></label>
                                            </div>
											<?php //add class v1.2.6 ?>
											<div class="weluka-col-md-8 welukaSnsshareSettingInputAreas welukaSnsshareSettingInputArea_<?php echo $key; ?> " data-snstype="<?php echo $key; ?>">
<?php /* v1.3 modify
                                            	<label for="welukaSnsshareSettingUrl_<?php echo $key; ?>"><?php _e($key . ' share URL', Weluka::$settings['plugin_name']); ?></label>
*/ ?>
                                            	<label for="welukaSnsshareSettingUrl_<?php echo $key; ?>"><?php _e($sns['label'] . ' share URL', Weluka::$settings['plugin_name']); ?></label>
												<input id="welukaSnsshareSettingUrl_<?php echo $key; ?>" name="welukaSnsshareSettingUrl_<?php echo $key; ?>" type="text" class="form-control weluka-normal-text" style="margin-bottom:3px !important;"/>
												<?php //v1.2.6 add ?>
												<label style="margin:0;">
													<input id="welukaSnsshareSettingUrl_<?php echo $key."_chk"; ?>" type="checkbox" name="welukaSnsshareSettingUrl_<?php echo $key; ?>" value="<?php echo WelukaBuilder::SNS_AUTO_SETTING; ?>"><?php _e('Auto setting by url of display pages', Weluka::$settings['plugin_name']); ?></label>
												<div class="weluka-mgtop-xs help-block"><?php _e('It will be outside the display object in the SNS URL or checkbox not entered.', Weluka::$settings['plugin_name']); ?></div>
												<?php //v1.2.6 addend ?>
												<?php //v1.2.8 add 
													if($key === 'google'){
														echo '<div class="weluka-mgtop-xs help-block" style="margin-top:-8px;">';
														_e('Google+ is obsoleted.', Weluka::$settings['plugin_name']);
														echo '</div>'; 
													}
												?>
												<?php if($key === 'twitter' || $key === 'line') : ?>
                                                <div class="weluka-mgtop-xs">
                                            		<label for="welukaSnsshareSettingText_<?php echo $key; ?>"><?php _e('Text', Weluka::$settings['plugin_name']); ?></label>
													<input id="welukaSnsshareSettingText_<?php echo $key; ?>" name="welukaSnsshareSettingText_<?php echo $key; ?>" type="text" class="form-control" style="margin-bottom:3px !important;" />
													<?php //v1.2.6 add ?>
													<label><input id="welukaSnsshareSettingText_<?php echo $key; ?>_chk" type="checkbox" name="welukaSnsshareSettingText_<?php echo $key; ?>" value="<?php echo  WelukaBuilder::SNS_AUTO_SETTING; ?>"><?php _e('Auto setting by title of display pages', Weluka::$settings['plugin_name']); ?></label>
													<?php //v1.2.6 addend ?>
                                                </div>
												<?php endif; ?>
												<?php if($key === 'twitter' ) : ?>
													<div class="weluka-mgtop-xs">
														<label for="welukaSnsshareSettingAccount_<?php echo $key; ?>"><?php _e('Account', Weluka::$settings['plugin_name']); ?></label>
														<input id="welukaSnsshareSettingAccount_<?php echo $key; ?>" name="welukaSnsshareSettingAccount_<?php echo $key; ?>" type="text" class="form-control" />
														<div class="weluka-mgtop-xs help-block"><?php _e('Please do not enter the beginning of the @ mark.', Weluka::$settings['plugin_name']); ?></div>
													</div>
                                                <?php endif; ?>

                                                <?php //v1.0.5 add ?>
												<?php if($key === 'facebook' || $key === 'twitter' ||  $key === 'hatebu' ) : ?>
                                                <div class="weluka-mgtop-xs">
													<input id="welukaSnsshareSettingCounter_<?php echo $key; ?>" name="welukaSnsshareSettingCounter_<?php echo $key; ?>" type="checkbox" value="hide" />
	                                            	<label for="welukaSnsshareSettingCounter_<?php echo $key; ?>"><?php _e('Hide the number of shares.', Weluka::$settings['plugin_name']); ?></label>
                                                    <?php if($key === 'twitter') : ?>
                                                    <div class="weluka-mgtop-xs help-block">
														<?php _e('Please register your site with Twitter shares acquisition service (<a href="//jsoon.digitiminimi.com/" target="_blank" class="weluka-a">count.jsoon</a>) If you want to display.', Weluka::$settings['plugin_name']); ?>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
												<?php endif; ?>
                                                <?php //v1.0.5 addend ?>

                                                <?php /* TODO pro version
                                                <div class="weluka-mgtop-xs">
                                            		<label for="welukaSnsshareSettingBtnShape_<?php echo $key; ?>"><?php _e('Button Shape', Weluka::$settings['plugin_name']); ?></label>
	                                        		<select id="welukaSnsshareSettingBtnShape_<?php echo $key; ?>" name="welukaSnsshareSettingBtnShape_<?php echo $key; ?>" class="form-control">
    	                                        		<option value="round"><?php _e('Round', Weluka::$settings['plugin_name']); ?></option>
    	                                        		<option value="square"><?php _e('Square', Weluka::$settings['plugin_name']); ?></option>
        	                                    		<option value="simple"><?php _e('simple', Weluka::$settings['plugin_name']); ?></option>
	            	                                </select>
                                                </div>
                                                <div class="weluka-mgtop-xs">
                                            		<label for="welukaSnsshareSettingBtnSize_<?php echo $key; ?>"><?php _e($key . ' Button Size (px)', Weluka::$settings['plugin_name']); ?></label>
	                                        		<input id="welukaSnsshareSettingBtnSize_<?php echo $key; ?>" name="welukaSnsshareSettingBtnSize_<?php echo $key; ?>" type="text" class="form-control weluka-normal-text" />
                                            		<div class="weluka-mgtop-xs help-block"><?php _e('Default size 32 x 32.', Weluka::$settings['plugin_name']); ?></div>
                                                </div>
                                                <div class="weluka-mgtop-xs">
                                            		<label for="welukaSnsshareSettingText_<?php echo $key; ?>"><?php _e('Message text', Weluka::$settings['plugin_name']); ?></label>
	                                        		<input id="welukaSnsshareSettingText_<?php echo $key; ?>" name="welukaSnsshareSettingText_<?php echo $key; ?>" type="text" class="form-control weluka-normal-text" />
                                                </div>
												*/ ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                    <div class="form-group weluka-mgtop-s">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-12">
                                                <?php $_builder->weluka_display_align_settings('welukaSnsshareSettingAlign'); ?>
                                            </div>
                                            <?php /* TODO pro version
                                        	<div class="weluka-col-md-4">
                                            	<label for="welukaSnsshareSettingCounter_<?php echo $key; ?>"><?php _e('Display counter', Weluka::$settings['plugin_name']); ?></label>
	                                        	<input id="welukaSnsshareSettingCounter_<?php echo $key; ?>" name="welukaSnsshareSettingCounter_<?php echo $key; ?>" type="text" class="form-control weluka-normal-text" />
                                            </div>
											*/ ?>
                                            <?php /* TODO pro version
                                        	<div class="weluka-col-md-4">
												<label for="welukaSnsbtnSettingDirection"><?php _e('Display direction', Weluka::$settings['plugin_name']); ?></label>
	                                        	<select id="welukaSnsbtnSettingDirection" name="welukaSnsbtnSettingDirection" class="form-control">
    	                                        	<option value="h"><?php _e('Horizontal', Weluka::$settings['plugin_name']); ?></option>
        	                                    	<option value="v"><?php _e('Vertical', Weluka::$settings['plugin_name']); ?></option>
            	                                </select>
                                            </div>
											*/ ?>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-snsshare-setting-panel-general -->
                    			<div id="weluka-snsshare-setting-panel-advanced" class="weluka-builder-settings-panel">
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Snsshare'); ?>
									<?php $_builder->weluka_display_margin_setting('Snsshare'); ?>
									<?php $_builder->weluka_display_css_setting('Snsshare'); ?>
                        		</div><!-- /#weluka-snsbtn-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-snsshare-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaSnsshareSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
                                    	<?php $_builder->weluka_display_align_settings('welukaSnsshareMdSettingAlign', 'Alignment', true, true, '', true, 'md'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SnsshareMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
                                    	<?php $_builder->weluka_display_align_settings('welukaSnsshareSmSettingAlign', 'Alignment', true, true, '', true, 'sm'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SnsshareSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
                                    	<?php $_builder->weluka_display_align_settings('welukaSnsshareXsSettingAlign', 'Alignment', true, true, '', true, 'xs'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SnsshareXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-snsshare-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-snsshare-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end sns share button setting modal ?>

<?php
/**
 * sns appembed dialog setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-appembed-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="appembedSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="appembedSettingModalLabel" class="modal-title"><?php _e('Embed Code Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-appembed-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-appembed-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-appembed-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-appembed-setting-form" name="weluka-appembed-setting-form" role="form">
                    			<div id="weluka-appembed-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="help-block"><?php _e('After saving of this setting, if the change on the builder is not reflected, make the builder [Save], please reload the page.', Weluka::$settings['plugin_name']); ?></div>

                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-12">
                                            	<label for="welukaAppembedSettingCode"><?php _e('Embed Code', Weluka::$settings['plugin_name']); ?></label>
	                                        	<textarea id="welukaAppembedSettingCode" name="welukaAppembedSettingCode" class="form-control" rows="8"></textarea>
												<div class="weluka-mgtop-xs help-block">
													<?php _e('Please copy and paste the embed tag, such as an external API.', Weluka::$settings['plugin_name']); ?><br>
													<?php _e('If you paste google adsense responsive codes etc., please save or publish.', Weluka::$settings['plugin_name']); ?>
												</div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-appembed-setting-panel-general -->
                    			<div id="weluka-appembed-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('Appembed', array('border')); ?>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaAppembedSettingBoxShadowStyle', true, false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaAppembedSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Appembed'); ?>
                                    <?php $_builder->weluka_display_margin_setting('Appembed'); ?>
									<?php $_builder->weluka_display_css_setting('Appembed'); ?>
                        		</div><!-- /#weluka-snsbtn-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-appembed-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaAppembedSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppembedMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppembedSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppembedXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-appembed-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-appembed-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end appembed setting modal ?>

<?php
/**
 * app accordion panel dialog setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-appaccordion-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="appaccordionSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="appaccordionSettingModalLabel" class="modal-title"><?php _e('Accordion Panel Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-appaccordion-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-appaccordion-setting-panel-setting" class="weluka-a"><?php _e('Panel Setting', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-appaccordion-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-appaccordion-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-appaccordion-setting-form" name="weluka-appaccordion-setting-form" role="form">
                    			<div id="weluka-appaccordion-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="form-group">
											<div class="weluka-col-md-6">
												<label for="welukaAppAccordionSettingAllPanelStyle"><?php _e('Panel Style', Weluka::$settings['plugin_name']); ?></label>
	        									<select id="welukaAppAccordionSettingAllPanelStyle" name="welukaAppAccordionSettingAllPanelStyle" class="form-control">
    		    		                            <option value="panel-default"><?php _e('Default', Weluka::$settings['plugin_name']); ?></option>
                        		                    <option value="panel-primary"><?php _e('Primary', Weluka::$settings['plugin_name']); ?></option>
        	    	            		            <option value="panel-success"><?php _e('Success', Weluka::$settings['plugin_name']); ?></option>
        	    	                    		    <option value="panel-info"><?php _e('Info', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="panel-warning"><?php _e('Warning', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="panel-danger"><?php _e('Danger', Weluka::$settings['plugin_name']); ?></option>
           										</select>
                                            </div>
											<div class="weluka-col-md-6">
                                                <?php $_builder->weluka_display_buttonshape_settings('welukaAppAccordionSettingAllPanelShape'); ?>
                                            </div>
                                        </div>
									</div>
                        		</div><!-- /#weluka-appaccordion-setting-panel-general -->
                    			<div id="weluka-appaccordion-setting-panel-setting" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-3">
		                               		<div class="form-group">
                                            	<label><?php _e('Panels', Weluka::$settings['plugin_name']); ?></label>
                                                <div id="welukaAppAccordionSettingPanelList" class="weluka-panel-list-container weluka-mgtop-s"></div>
                                        	</div>
                                        </div>
                                        <div class="weluka-col-md-9">
                                        	<div class="weluka-mgbottom-s weluka-text-right">
												<button type="button" class="welukaAppAccordionSettingNewBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('New', Weluka::$settings['plugin_name']); ?></button>
												<button type="button" class="welukaAppAccordionSettingRegBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('Reg', Weluka::$settings['plugin_name']); ?></button>
                                                <input type="hidden" id="welukaAppAccordionSettingEditIdx" name="welukaAppAccordionSettingEditIdx" value="" /> 
                                            </div>

		                               		<div class="form-group">
                                            	<label><?php _e('Panel Title', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaAppAccordionSettingHeaderText" name="welukaAppAccordionSettingHeaderText" class="form-control" value="" />
                                        	</div>
                                            <div class="form-group">
                                           		<?php
													wp_editor('', 'welukapanelcodeeditorcontent', array(
														'media_buttons' => true,
														'textarea_rows' => 10
													));
												?>
                                            </div>
                                            <div class="form-group">
                                            	<div class="weluka-row clearfix">
                                                	<div class="weluka-col-md-6">
														<label for="welukaAppAccordionSettingPanelStyle"><?php _e('Panel Style', Weluka::$settings['plugin_name']); ?></label>
	    		                                    	<select id="welukaAppAccordionSettingPanelStyle" name="welukaAppAccordionSettingPanelStyle" class="form-control">
    		    		                            		<option value="" selected="selected"><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
    		    		                            		<option value="panel-default"><?php _e('Default', Weluka::$settings['plugin_name']); ?></option>
                        		                        	<option value="panel-primary"><?php _e('Primary', Weluka::$settings['plugin_name']); ?></option>
        	    	            		                	<option value="panel-success"><?php _e('Success', Weluka::$settings['plugin_name']); ?></option>
        	    	                    		        	<option value="panel-info"><?php _e('Info', Weluka::$settings['plugin_name']); ?></option>
        	    	                            			<option value="panel-warning"><?php _e('Warning', Weluka::$settings['plugin_name']); ?></option>
        	    	                            			<option value="panel-danger"><?php _e('Danger', Weluka::$settings['plugin_name']); ?></option>
		            	                                </select>
                                                	</div>
                                                    <div class="weluka-col-md-6">
														<input id="welukaAppAccordionSettingOpen" name="welukaAppAccordionSettingOpen" type="checkbox" value="on" />
	                                            		<label for="welukaAppAccordionSettingOpen"><?php _e('Open panel initial.', Weluka::$settings['plugin_name']); ?></label>
                                                        <div class="weluka-mgtop-xs help-block"><?php _e('Display at the panel will be displayed in a state of being open page.', Weluka::$settings['plugin_name']); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="weluka-mgbottom-s weluka-text-right">
												<button type="button" class="welukaAppAccordionSettingNewBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('New', Weluka::$settings['plugin_name']); ?></button>
												<button type="button" class="welukaAppAccordionSettingRegBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('Reg', Weluka::$settings['plugin_name']); ?></button>
                                            </div>

                                        </div>
                                    </div>
								</div><!-- /#weluka-appaccordion-setting-panel-setting -->
                    			<div id="weluka-appaccordion-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaAppAccordionSettingBoxShadowStyle', true, false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaAppAccordionSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>

                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('AppAccordion'); ?>
									<?php $_builder->weluka_display_margin_setting('AppAccordion'); ?>
									<?php $_builder->weluka_display_css_setting('AppAccordion'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-appaccordion-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaAppAccordionSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppAccordionMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppAccordionSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppAccordionXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-appaccordion-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-appaccordion-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end app accordion panel setting modal ?>

<?php
/**
 * app tabs panel dialog setting
 * @update
 * ver1.0.4
 * var1.1.4
 * ver1.2
 */
?>
<div id="weluka-apptabs-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="apptabsSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="apptabsSettingModalLabel" class="modal-title"><?php _e('Tab Panel Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-apptabs-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-apptabs-setting-panel-setting" class="weluka-a"><?php _e('Panel Setting', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-apptabs-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-apptabs-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-apptabs-setting-form" name="weluka-apptabs-setting-form" role="form">
                    			<div id="weluka-apptabs-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="form-group">
											<div class="weluka-col-md-6">
												<label for="welukaAppTabsSettingType"><?php _e('Navi Type', Weluka::$settings['plugin_name']); ?></label>
	        									<select id="welukaAppTabsSettingType" name="welukaAppTabsSettingType" class="form-control">
    		    		                            <option value="tab"><?php _e('Tab', Weluka::$settings['plugin_name']); ?></option>
                        		                    <option value="pill"><?php _e('Button', Weluka::$settings['plugin_name']); ?></option>
           										</select>
                                            </div>
											<div class="weluka-col-md-6">
												<label for="welukaAppTabsSettingShape"><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label>
	        									<select id="welukaAppTabsSettingShape" name="welukaAppTabsSettingShape" class="form-control">
        											<option value="weluka-tabs-square"><?php _e('Square', Weluka::$settings['plugin_name']); ?></option>
        											<option value=""><?php _e('Round', Weluka::$settings['plugin_name']); ?></option>
           										</select>
                                            </div>
                                            <?php /* comment out 20150908
											<div class="weluka-col-md-4">
												<label for="welukaAppTabsSettingTabBgColor"><?php _e('Tab Bgcolor', Weluka::$settings['plugin_name']); ?></label>
		                                		<select id="welukaAppTabsSettingTabBgColor" name="welukaAppTabsSettingTabBgColor" class="form-control">
                                                	<option value=""><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
                                                	<option value="weluka-bg-grey"><?php _e('Grey', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="weluka-bg-success"><?php _e('Green', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="weluka-bg-info"><?php _e('Aqua', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="weluka-bg-warning"><?php _e('Orange', Weluka::$settings['plugin_name']); ?></option>
        	    	                            	<option value="weluka-bg-danger"><?php _e('Red', Weluka::$settings['plugin_name']); ?></option>
            	    	                    	</select>
                                            </div> */ ?>
                                        </div>
                                    	<div class="form-group">
											<div class="weluka-col-md-6">
												<input id="welukaAppTabsSettingJustified" name="welukaAppTabsSettingJustified" type="checkbox" value="on" />
	                                            <label for="welukaAppTabsSettingJustified"><?php _e('Navi Evenly.', Weluka::$settings['plugin_name']); ?></label>
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Navigation I evenly display.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
											<div class="weluka-col-md-6">
												<input id="welukaAppTabsSettingPanelBorder" name="welukaAppTabsSettingPanelBorder" type="checkbox" value="on" />
	                                            <label for="welukaAppTabsSettingPanelBorder"><?php _e('Panel Border.', Weluka::$settings['plugin_name']); ?></label>
                                                <div class="weluka-mgtop-xs help-block"><?php _e('It encloses the panel border.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
									</div>
                        		</div><!-- /#weluka-apptabs-setting-panel-general -->
                    			<div id="weluka-apptabs-setting-panel-setting" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-3">
		                               		<div class="form-group">
                                            	<label><?php _e('Panels', Weluka::$settings['plugin_name']); ?></label>
                                                <div id="welukaAppTabsSettingPanelList" class="weluka-panel-list-container weluka-mgtop-s"></div>
                                        	</div>
                                        </div>
                                        <div class="weluka-col-md-9">
                                        	<div class="weluka-mgbottom-s weluka-text-right">
												<button type="button" class="welukaAppTabsSettingNewBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('New', Weluka::$settings['plugin_name']); ?></button>
												<button type="button" class="welukaAppTabsSettingRegBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('Reg', Weluka::$settings['plugin_name']); ?></button>
                                                <input type="hidden" id="welukaAppTabsSettingEditIdx" name="welukaAppTabsSettingEditIdx" value="" /> 
                                            </div>

		                               		<div class="form-group">
                                            	<label><?php _e('Tab Title', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaAppTabsSettingTabText" name="welukaAppTabsSettingTabText" class="form-control" value="" />
                                        	</div>
                                            <div class="form-group">
                                           		<?php
													wp_editor('', 'welukatabpanelcodeeditorcontent', array(
														'media_buttons' => true,
														'textarea_rows' => 10
													));
												?>
                                            </div>
                                        	<div class="weluka-mgbottom-s weluka-text-right">
												<button type="button" class="welukaAppTabsSettingNewBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('New', Weluka::$settings['plugin_name']); ?></button>
												<button type="button" class="welukaAppTabsSettingRegBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('Reg', Weluka::$settings['plugin_name']); ?></button>
                                            </div>
                                        </div>
                                    </div>
								</div><!-- /#weluka-apptabs-setting-panel-setting -->
                    			<div id="weluka-apptabs-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaAppTabsSettingBoxShadowStyle', true, false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaAppTabsSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('AppTabs'); ?>
									<?php $_builder->weluka_display_margin_setting('AppTabs'); ?>
									<?php $_builder->weluka_display_css_setting('AppTabs'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-apptabs-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaAppTabsSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppTabsMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppTabsSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppTabsXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-apptabs-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-apptabs-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end app accordion panel setting modal ?>

<?php
/** 
 * applist dialog setting
 * @update
 * ver1.0.4
 * ver1.0.6
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-applist-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="applistSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="applistSettingModalLabel" class="modal-title"><?php _e('List Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-applist-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-applist-setting-panel-item" class="weluka-a"><?php _e('List Item', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-applist-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-applist-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-applist-setting-form" name="weluka-applist-setting-form" role="form">
                    			<div id="weluka-applist-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-4">
                                            <?php $_builder->weluka_display_csutomdesgin_settings('welukaAppListCustomDesign'); ?>
											<div class="form-group weluka-mgtop-m">
												<?php $_builder->weluka_display_listlayout_settings('welukaAppListSettingLayout'); ?>
                                                <?php //v1.0.6 add ?>
												<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                            						<p style="font-weight:bold;padding-bottom:10px;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
													<label><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></label>
        	                    					<?php $_builder->weluka_display_listlayout_settings( 'welukaAppListSettingLayoutSm', '', false, true); ?>
													<label><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></label>
        	                    					<?php $_builder->weluka_display_listlayout_settings( 'welukaAppListSettingLayoutXs', '', false, true); ?>
												</div>
												<?php //v1.0.6 addend ?>
											</div>
                                            
<?php /* v1.0.6
                                            <div id="weluka-applist-setting-layout-rowcolum" class="weluka-panel-deactive">
*/ ?>
                                            <div id="weluka-applist-setting-layout-rowcolum">
                                                <div class="form-group">
                                                	<?php $_builder->weluka_display_listlayout_rowcolumn_settings('welukaAppListSettingRowColumn', 'Row Column', true, true, '', false, true); ?>
                                                    <?php //v1.0.6 add ?>
													<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                            							<p style="font-weight:bold;padding-bottom:10px;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
														<label><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></label>
                            							<?php $_builder->weluka_display_listlayout_rowcolumn_settings( 'welukaAppListSettingRowColumnSm', '', false, true, '', false, true); ?>
														<label><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></label>
                            							<?php $_builder->weluka_display_listlayout_rowcolumn_settings( 'welukaAppListSettingRowColumnXs', '', false, true, '', false, true); ?>
													</div>
                                                    <div class="weluka-mgtop-xs help-block"><?php _e('Please select the number of columns the case of a vertical list format.', Weluka::$settings['plugin_name']); ?></div>
													<?php //v1.0.6 addend ?>
                                                </div>
                                            </div>

                                            <?php //v1.2 add ?>
                                            <div class="form-group">
                                            	<h5><?php _e('Thumbnail height(px)', Weluka::$settings['plugin_name']); ?></h5>
	                                        	<input id="welukaAppListSettingThumbHeight" name="welukaAppListSettingThumbHeight" type="text" class="form-control" />
												<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                            						<p style="font-weight:bold;padding-bottom:10px;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
													<label><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></label>
	                                        		<input id="welukaAppListSettingThumbHeightSm" name="welukaAppListSettingThumbHeightSm" type="text" class="form-control" />
													<label><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></label>
	                                        		<input id="welukaAppListSettingThumbHeightXs" name="welukaAppListSettingThumbHeightXs" type="text" class="form-control" />
												</div>
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter a height (px) If you want to align the height of the thumbnail. Set the height of responsive (or clear the height) responsive List Layout if you want to set. This feature is "media type: image" only applies.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                            <div class="form-group">
                                            	<h5><?php _e('Post block', Weluka::$settings['plugin_name']); ?></h5>
                                                <input id="welukaAppListSettingEqh" name="welukaAppListSettingEqh" type="checkbox" value="1" checked="checked" />
	                                            <label for="welukaAppListSettingEqh"><?php _e('Align the same line block height', Weluka::$settings['plugin_name']); ?></label>
                                                <div class="help-block weluka-mgtop-xs"><?php _e('If you align the post block height and line set "Layout List" and "Row Column" responsive.', Weluka::$settings['plugin_name']); ?></div>
											</div>
											<?php //v1.2 addend ?>

                                            <div class="form-group">
                                            	<h5><?php _e('List Items', Weluka::$settings['plugin_name']); ?></h5>
                                                <div>
                                                    <input id="welukaAppListSettingMediaDisplay" name="welukaAppListSettingMediaDisplay" data-item="media" class="welukaAppListSettingDisplay" type="checkbox" value="1" />&nbsp;
                                                	<label for="welukaAppListSettingMediaDisplay"><?php _e('Media', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                                <div>
                                                    <input id="welukaAppListSettingTitleDisplay" name="welukaAppListSettingTitleDisplay" data-item="title" class="welukaAppListSettingDisplay" type="checkbox" value="1" />&nbsp;
                                                	<label for="welukaAppListSettingTitleDisplay"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                                <div>
                                                    <input id="welukaAppListSettingMeta1Display" name="welukaAppListSettingMeta1Display" data-item="meta1" class="welukaAppListSettingDisplay" type="checkbox" value="1" />&nbsp;
                                                	<label for="welukaAppListSettingMeta1Display"><?php _e('Meta1', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                                <div>
                                                    <input id="welukaAppListSettingMeta2Display" name="welukaAppListSettingMeta2Display" data-item="meta2" class="welukaAppListSettingDisplay" type="checkbox" value="1" />&nbsp;
                                                	<label for="welukaAppListSettingMeta2Display"><?php _e('Meta2', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                                <div>
                                                    <input id="welukaAppListSettingContentDisplay" name="welukaAppListSettingContentDisplay" data-item="content" class="welukaAppListSettingDisplay" type="checkbox" value="1" />&nbsp;
                                                	<label for="welukaAppListSettingContentDisplay"><?php _e('Content', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                                <div>
                                                    <input id="welukaAppListSettingButtonDisplay" name="welukaAppListSettingButtonDisplay" data-item="button" class="welukaAppListSettingDisplay" type="checkbox" value="1" />&nbsp;
                                                	<label for="welukaAppListSettingButtonDisplay"><?php _e('Button', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                                <div class="weluka-mgtop-s help-block"><?php _e('Please remove the check next to the item name if you want to hide the item.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                            <div class="form-group">
                                            	<h5><?php _e('Row spacing (px)', Weluka::$settings['plugin_name']); ?></h5>
	                                        	<input id="welukaAppListSettingRowSpacing" name="welukaAppListSettingRowSpacing" type="text" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                            	<h5><?php _e('Odd Background Color', Weluka::$settings['plugin_name']); ?></h5>
                                                <div id="welukaAppListSettingOddBgColorWrap">
        										<!--input type="text" id="welukaAppListSettingOddBgColor" name="welukaAppListSettingOddBgColor" class="weluka-color-picker form-control" value="" /-->
                                                </div>
											</div>
                                            <div class="form-group">
                                            	<h5><?php _e('Even Background Color', Weluka::$settings['plugin_name']); ?></h5>
                                                <div id="welukaAppListSettingEvenBgColorWrap">
        										<!--input type="text" id="welukaAppListSettingEvenBgColor" name="welukaAppListSettingEvenBgColor" class="weluka-color-picker form-control" value="" /-->
                                                </div>
											</div>
                                            <?php //TODO row style ?>
                                        </div><!-- /weluka-col-md-4 -->
                                        <div class="weluka-col-md-8">
                                        	<!--div id="welukaAppListSettingLayoutPreview"></div-->
                                            <div id="weluka-applist-setting-media-design">
                                            	<h5><?php _e('Media Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <h6><?php _e('[Common Setting]', Weluka::$settings['plugin_name']); ?></h6>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-6">
                                                    	<?php $_builder->weluka_display_listmedia_column_settings('welukaAppListSettingMediaColWidth'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-6">
                                                    	<?php $_builder->weluka_display_align_settings('welukaAppListSettingMediaAlign'); ?>
                                                    </div>
                                                </div>

                                                <h6><?php _e('[Image Setting]', Weluka::$settings['plugin_name']); ?></h6>
                                                <div class="weluka-mgbottom-s help-block"><?php _e('Setting items If the media is image.', Weluka::$settings['plugin_name']); ?></div>
                                                <?php //v1.2.3 radius add and modify ?>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
		                                                <?php $_builder->weluka_display_imgshape_settings('welukaAppListSettingMediaShape'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
														<label><?php _e('Radius size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaAppListSettingMediaRadiusSize" name="welukaAppListSettingMediaRadiusSize" class="form-control weluka-normal-text" value="" />
                                                        <div class="weluka-mgtop-s help-block"><?php _e('Border-radius values for rounded corners.', Weluka::$settings['plugin_name']); ?></div>
													</div>
                                                	<div class="weluka-col-md-4">
														<label><?php _e('Border Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaAppListSettingMediaBorderSize" name="welukaAppListSettingMediaBorderSize" class="form-control weluka-normal-text" value="" />
													</div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_borderstyle_settings('welukaAppListSettingMediaBorderStyle'); ?>
                                                   	</div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Border Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaAppListSettingMediaBorderColorWrap">
        												<!--input type="text" id="welukaAppListSettingMediaBorderColor" name="welukaAppListSettingMediaBorderColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
                                                </div>
												<?php //v1.2.7 add ?>
													<div class="weluka-row clearfix form-group">
														<div class="weluka-col-md-12">
															<label for="welukaAppListSettingMediaLazyLoad"><?php _e('Lazy load', Weluka::$settings['plugin_name']); ?></label>
															<div>
																<input id="welukaAppListSettingMediaLazyLoad" name="welukaAppListSettingMediaLazyLoad" type="checkbox" value="1" />
																<label for="welukaAppListSettingMediaLazyLoad"><?php _e('I will lazy load the image to speed up the site.', Weluka::$settings['plugin_name']); ?></label>
																<div class="weluka-mgtop-xs help-block"><?php _e('If you set the thumbnail height, lazy loading will not be applied.', Weluka::$settings['plugin_name']); ?></div>
															</div>
														</div>
													</div>
												<?php //v1.2.7 addend ?>
                                                <?php //v1.2.3 radius add and modify ?>
                                                <h6><?php _e('[Icon Setting]', Weluka::$settings['plugin_name']); ?></h6>
                                                <div class="weluka-mgbottom-s help-block"><?php _e('Setting items If the media is icon.', Weluka::$settings['plugin_name']); ?></div>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-6">
														<label><?php _e('Icon Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaAppListSettingIconFontSize" name="welukaAppListSettingIconFontSize" class="form-control weluka-normal-text" value="" />
                                                        <div class="weluka-mgtop-s help-block"><?php _e('This icon size settings take precedence over the individual icon size settings.', Weluka::$settings['plugin_name']); ?></div>
                                                    </div>
                                                    <div class="weluka-col-md-6">
														<label><?php _e('Icon Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaAppListSettingIconColorWrap">
        												<!--input type="text" id="welukaAppListSettingIconColor" name="welukaAppListSettingIconColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                        <div class="weluka-mgtop-s help-block"><?php _e('This icon color settings take precedence over the individual icon color settings.', Weluka::$settings['plugin_name']); ?></div>
                                                    </div>
												</div>
                                                <?php //v1.2 add ?>
                                                <h6><?php _e('Padding (px)', Weluka::$settings['plugin_name']); ?></h6>
												<div class="weluka-row form-group clearfix">
													<div class="weluka-col-md-3">
														<label><?php _e('Top', Weluka::$settings['plugin_name']); ?></label>
        												<input id="welukaAppListSettingIconPdTop" name="welukaAppListSettingIconPdTop" type="text" class="form-control" />
        											</div>
													<div class="weluka-col-md-3">
														<label><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></label>
        												<input id="welukaAppListSettingIconPdBottom" name="welukaAppListSettingIconPdBottom" type="text" class="form-control" />
        											</div>
													<div class="weluka-col-md-3">
														<label><?php _e('Left', Weluka::$settings['plugin_name']); ?></label>
        												<input id="welukaAppListSettingIconPdLeft" name="welukaAppListSettingIconPdLeft" type="text" class="form-control" />
        											</div>
													<div class="weluka-col-md-3">
														<label><?php _e('Right', Weluka::$settings['plugin_name']); ?></label>
        												<input id="welukaAppListSettingIconPdRight" name="welukaAppListSettingIconPdRight" type="text" class="form-control" />
        											</div>
  												</div>
                                                <?php //v1.2 addend ?>
                                            </div><!-- /media design -->
                                            <div id="weluka-applist-setting-title-design">
                                            	<h5><?php _e('Title Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_listtitle_htmltag_settings('welukaAppListSettingTitleTag'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaAppListSettingTitleStyle', 'Title Style'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaAppListSettingTitleAlign'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaAppListSettingTitleFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaAppListSettingTitleFontSize" name="welukaAppListSettingTitleFontSize" class="form-control weluka-normal-text" value="" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Title Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaAppListSettingTitleColorWrap">
        												<!--input type="text" id="welukaAppListSettingTitleColor" name="welukaAppListSettingTitleColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
												</div>
                                            </div><!-- /title design -->

                                            <div id="weluka-applist-setting-meta1-design">
                                            	<h5><?php _e('Meta1 Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaAppListSettingMeta1Style', 'Meta1 Style'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaAppListSettingMeta1Align'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaAppListSettingMeta1Font'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaAppListSettingMeta1FontSize" name="welukaAppListSettingMeta1FontSize" class="form-control weluka-normal-text" value="" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Meta1 Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaAppListSettingMeta1ColorWrap">
        												<!--input type="text" id="welukaAppListSettingMeta1Color" name="welukaAppListSettingMeta1Color" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
												</div>                                                
											</div><!-- /meta1 design -->

                                            <div id="weluka-applist-setting-meta2-design">
                                            	<h5><?php _e('Meta2 Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaAppListSettingMeta2Style', 'Meta2 Style'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaAppListSettingMeta2Align'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaAppListSettingMeta2Font'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaAppListSettingMeta2FontSize" name="welukaAppListSettingMeta2FontSize" class="form-control weluka-normal-text" value="" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Meta2 Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaAppListSettingMeta2ColorWrap">
        												<!--input type="text" id="welukaAppListSettingMeta2Color" name="welukaAppListSettingMeta2Color" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
												</div>
											</div><!-- /meta2 design -->

                                            <div id="weluka-applist-setting-content-design">
                                            	<h5><?php _e('Content Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaAppListSettingContentAlign'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaAppListSettingContentFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaAppListSettingContentFontSize" name="welukaAppListSettingContentFontSize" class="form-control weluka-normal-text" value="" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Content Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaAppListSettingContentColorWrap">
        												<!--input type="text" id="welukaAppListSettingContentColor" name="welukaAppListSettingContentColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
												</div>
											</div><!-- /content design -->

                                            <div id="weluka-applist-setting-button-design">
                                            	<h5><?php _e('Button Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
														<label for="welukaAppListSettingButtonText"><?php _e('Button Text', Weluka::$settings['plugin_name']); ?></label>
														<input id="welukaAppListSettingButtonText" name="welukaAppListSettingButtonText" type="text" class="form-control" placeholder="Read More" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaAppListSettingButtonAlign'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaAppListSettingButtonFont'); ?>
                                                    </div>
												</div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                  		<?php $_builder->weluka_display_buttoncolor_settings('welukaAppListSettingButtonColor'); ?>
													</div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_buttonshape_settings('welukaAppListSettingButtonShape'); ?>
													</div>
                                                    <div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_buttonsize_settings('welukaAppListSettingButtonSize'); ?>
                                                		<input id="welukaAppListSettingButtonBlock" name="welukaAppListSettingButtonBlock" type="checkbox" value="1" />
                                                		<label for="welukaAppListSettingButtonBlock"><?php _e('A button block size.', Weluka::$settings['plugin_name']); ?></label>
                                                    </div>
												</div>
											</div><!-- /button design -->

											<?php //v1.2 add ?>
                                            <div id="weluka-applist-setting-block-design">
                                            	<h5><?php _e('Box Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
														<?php $_builder->weluka_display_blockstyle_settings('welukaAppListSettingBoxStyle'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Bg Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaAppListSettingBoxStyleBgColorWrap"></div>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label>
	        											<select id="welukaAppListSettingBoxShape" name="welukaAppListSettingBoxShape" class="form-control">
        													<option value=""><?php _e('Square', Weluka::$settings['plugin_name']); ?></option>
        													<option value="img-rounded"><?php _e('Round', Weluka::$settings['plugin_name']); ?></option>
           												</select>
													</div> 
												</div>
                                                <div class="weluka-row clearfix">
                                                    <div class="weluka-col-md-6">
                                                		<input id="welukaAppListSettingBoxStyleShadow" name="welukaAppListSettingBoxStyleShadow" type="checkbox" value="1" />
                                                		<label for="welukaAppListSettingBoxStyleShadow"><?php _e('Box Shadow?', Weluka::$settings['plugin_name']); ?></label>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix">
                                                    <div class="weluka-col-md-12">
                                                    	<div class="help-block"><?php _e('If you want to Box Style, responsive List Layout is set.', Weluka::$settings['plugin_name']); ?></div>
                                                    </div>
                                                </div>
											</div><!-- /block design -->
											<?php //v1.2 addend ?>                                            
                                            
                                        </div><!-- weluka-col-md-8 -->
									</div><!-- /weluka-row -->
                        		</div><!-- /#weluka-applist-setting-panel-general -->
                                <div id="weluka-applist-setting-panel-item" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-4">
                                        	<div class="weluka-border-box" style="padding: 15px 15px 0 15px;">
	                                        	<div class="form-group">
    	                                        	<label><?php _e('List Select', Weluka::$settings['plugin_name']); ?></label>
    		                                        <select id="welukaAppListRegList" name="welukaAppListRegList" class="form-control">
        		                                    	<option value=""></option>
            		   	                            </select>
                    	                        </div>
                        	                	<div class="form-group">
                            	                	<label><?php _e('List Name', Weluka::$settings['plugin_name']); ?></label>
                                	                <input id="welukaAppListRegListName" name="welukaAppListRegListName" type="text" value="" class="form-control" />
                                    	            <button type="button" class="welukaAppListSettingListRegBtn weluka-btn weluka-btn-org weluka-btn-warning btn-xs"><?php _e('Reg', Weluka::$settings['plugin_name']); ?></button>
                                    	            <button type="button" class="welukaAppListSettingListRemoveBtn weluka-btn weluka-btn-org weluka-btn-warning btn-xs"><?php _e('Remove', Weluka::$settings['plugin_name']); ?></button>
	                                            </div>
                                            </div>
		                               		<div class="form-group weluka-mgtop-m">
                                            	<h5><?php _e('List Items', Weluka::$settings['plugin_name']); ?></h5>
                                                <div id="welukaAppAppListSettingTitleList" class="weluka-panel-list-container"></div>
                                        	</div>
                                        </div>
                                        <div class="weluka-col-md-8">
                                        	<div class="weluka-mgbottom-s weluka-text-right">
												<button type="button" class="welukaAppListSettingNewBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('New', Weluka::$settings['plugin_name']); ?></button>
												<button type="button" class="welukaAppListSettingRegBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('Reg', Weluka::$settings['plugin_name']); ?></button>
                                                <input type="hidden" id="welukaAppListSettingEditIdx" name="welukaAppListSettingEditIdx" value="" />
                                            </div>

											<div class="welukaMsgArea"></div>
                                            
											<h5><?php _e('Link Url', Weluka::$settings['plugin_name']); ?></h5>
                                			<div class="form-group">
	                                        	<input id="welukaAppListSettingLinkUrl" name="welukaAppListSettingLinkUrl" type="text" class="form-control" />
                                                <?php /* v1.2 modify
                                                <input id="welukaAppListSettingLinkTarget" name="welukaAppListSettingLinkTarget" type="checkbox" value="_blank" />
                                                <label for="welukaAppListSettingLinkTarget"><?php _e('A link is held by a new window or a tab.', Weluka::$settings['plugin_name']); ?></label>
												*/ ?>
                                                <div class="weluka-mgtop-s">
                                    				<button type="button" data-link-target="widgetapplistmodal" data-link-textarea="#welukaAppListSettingLinkUrl" class="weluka-wplink-button weluka-btn weluka-btn-org weluka-btn-info btn-xs"><?php _e('Select Link', Weluka::$settings['plugin_name']); ?></button>
 		                                    	</div>
                                                <div class="weluka-mgtop-s help-block">
                                                	<?php _e('Title, [except video] media, please enter or select the link URL that is set to the button. Link selected in the image selection screen will be priority in the case of image.', Weluka::$settings['plugin_name']); ?>
                                                </div>

                                                <div class="weluka-mgtop-s"><label><input type="radio" id="welukaAppListSettingLinkTarget_0" name="welukaAppListSettingLinkTarget" value="" />&nbsp;<?php _e('Open link in the same window', Weluka::$settings['plugin_name']); ?></label></div>
                                                <div><label><input type="radio" id="welukaAppListSettingLinkTarget_1" name="welukaAppListSettingLinkTarget" value="_blank" />&nbsp;<?php _e('Open links in a new window or new tab', Weluka::$settings['plugin_name']); ?></label></div>
                                                <div><label><input type="radio" id="welukaAppListSettingLinkTarget_2" name="welukaAppListSettingLinkTarget" value="iframe" />&nbsp;<?php _e('Open the link in a Popup iframe', Weluka::$settings['plugin_name']); ?></label></div>
	                                            <div class="weluka-mgtop-s help-block"><?php _e('Cannot the Popup iframe external site links.', Weluka::$settings['plugin_name']); ?></div>
												<?php //v1.2 modify end ?>
    		                            	</div>
                                            
                                            <h5 class="weluka-mgtop-m"><?php _e('Media', Weluka::$settings['plugin_name']); ?></h5>
                                            <div class="weluka-row clearfix form-group">
                                            	<div class="weluka-col-md-8">
		        									<select id="welukaAppListSettingMediaType" name="welukaAppListSettingMediaType" class="form-control">
    	                                            	<option value="<?php echo WelukaBuilder::WIDGET_IMG; ?>"><?php _e('Image', Weluka::$settings['plugin_name']); ?></option>
        		                                       	<option value="<?php echo WelukaBuilder::WIDGET_ICON; ?>"><?php _e('Icon', Weluka::$settings['plugin_name']); ?></option>
                	                                	<option value="<?php echo WelukaBuilder::WIDGET_MOVIE; ?>"><?php _e('Movie', Weluka::$settings['plugin_name']); ?></option>
                   	                             	</select>
                    	                        </div>
                                                <div class="weluka-col-md-4">
													<button type="button" id="welukaAppListSettingMediaSelectBtn" class="weluka-btn weluka-btn-org weluka-btn-info" data-type="" data-target="applistmodal" style="margin:0.5em 0;"><?php _e('Select Media', Weluka::$settings['plugin_name']); ?></button>
                                                </div>
                                            </div>

                                            <div id="weluka-applist-input-area-<?php echo WelukaBuilder::WIDGET_IMG; ?>" class="weluka-row clearfix form-group weluka-applist-media-input-area">
                                           		<div class="weluka-col-md-4">
                                                	<div class="weluka-applist-input-area-preview img-thumb-wrap-wide" style="background-size:cover;"></div>
                                                </div>
												<div class="weluka-col-md-8">
                                                	<label>[<?php _e('Selected Image', Weluka::$settings['plugin_name']); ?>]</label>
                                                	<div class="weluka-applist-input-area-info weluka-mgtop-s"></div>
                                                </div>
                                                <?php //hidden ?>
                                                <input type="hidden" id="welukaAppListSettingMediaImg_alt" name="welukaAppListSettingMediaImg_alt" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_attachment_id" name="welukaAppListSettingMediaImg_attachment_id" value="" />
                                                <!--input type="hidden" id="welukaAppListSettingMediaImg_class" name="welukaAppListSettingMediaImg_class" value="" /-->
                                                <input type="hidden" id="welukaAppListSettingMediaImg_external" name="welukaAppListSettingMediaImg_external" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_fitwidth" name="welukaAppListSettingMediaImg_fitwidth" value="" />
                                                <?php //add v1.2.7 ?>
												<input type="hidden" id="welukaAppListSettingMediaImg_lazyload" name="welukaAppListSettingMediaImg_lazyload" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_full_height" name="welukaAppListSettingMediaImg_full_height" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_full_url" name="welukaAppListSettingMediaImg_full_url" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_full_width" name="welukaAppListSettingMediaImg_full_width" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_large_height" name="welukaAppListSettingMediaImg_large_height" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_large_url" name="welukaAppListSettingMediaImg_large_url" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_large_width" name="welukaAppListSettingMediaImg_large_width" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_medium_height" name="welukaAppListSettingMediaImg_medium_height" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_medium_url" name="welukaAppListSettingMediaImg_medium_url" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_medium_width" name="welukaAppListSettingMediaImg_medium_width" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_thumbnail_height" name="welukaAppListSettingMediaImg_thumbnail_height" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_thumbnail_url" name="welukaAppListSettingMediaImg_thumbnail_url" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_thumbnail_width" name="welukaAppListSettingMediaImg_thumbnail_width" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_link_action" name="welukaAppListSettingMediaImg_link_action" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_link_href" name="welukaAppListSettingMediaImg_link_href" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_link_target" name="welukaAppListSettingMediaImg_link_target" value="" />
                                                <!--input type="hidden" id="welukaAppListSettingMediaImg_shape" name="welukaAppListSettingMediaImg_shape" value="" /-->
                                                <input type="hidden" id="welukaAppListSettingMediaImg_source_type" name="welukaAppListSettingMediaImg_source_type" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_title" name="welukaAppListSettingMediaImg_title" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaImg_url" name="welukaAppListSettingMediaImg_url" value="" />
                                            </div>

                                            <div id="weluka-applist-input-area-<?php echo WelukaBuilder::WIDGET_ICON; ?>" class="weluka-row clearfix form-group weluka-applist-media-input-area weluka-panel-deactive">
												<div class="weluka-col-md-12">
                                                	<label>[<?php _e('Selected Icon', Weluka::$settings['plugin_name']); ?>]</label>
	                                                <div class="weluka-applist-input-area-preview weluka-mgtop-s weluka-text-center"></div>
												</div>
                                                <?php //hidden ?>
                                                <input type="hidden" id="welukaAppListSettingMediaIcon_icon_class" name="welukaAppListSettingMediaIcon_icon_class" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaIcon_icon_color" name="welukaAppListSettingMediaIcon_icon_color" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaIcon_icon_size" name="welukaAppListSettingMediaIcon_icon_size" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaIcon_link_action" name="welukaAppListSettingMediaIcon_link_action" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaIcon_link_href" name="welukaAppListSettingMediaIcon_link_href" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaIcon_link_target" name="welukaAppListSettingMediaIcon_link_target" value="" />
                                            </div>

                                            <div id="weluka-applist-input-area-<?php echo WelukaBuilder::WIDGET_MOVIE; ?>" class="weluka-row clearfix form-group weluka-applist-media-input-area weluka-panel-deactive">
												<div class="weluka-col-md-12">
                                                	<label>[<?php _e('Selected Movie', Weluka::$settings['plugin_name']); ?>]</label>
                                                	<div class="weluka-applist-input-area-info weluka-mgtop-s"></div>
                                                </div>
                                                <?php //hidden ?>
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_attachment_id" name="welukaAppListSettingMediaMovie_attachment_id" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_autoplay" name="welukaAppListSettingMediaMovie_autoplay" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_description" name="welukaAppListSettingMediaMovie_description" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_display_noauthor" name="welukaAppListSettingMediaMovie_display_noauthor" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_display_nocontrol" name="welukaAppListSettingMediaMovie_display_nocontrol" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_display_nologo" name="welukaAppListSettingMediaMovie_display_nologo" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_display_norelated" name="welukaAppListSettingMediaMovie_display_norelated" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_display_notitle" name="welukaAppListSettingMediaMovie_display_notitle" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_loop" name="welukaAppListSettingMediaMovie_loop" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_media_height" name="welukaAppListSettingMediaMovie_media_height" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_media_time" name="welukaAppListSettingMediaMovie_media_time" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_media_width" name="welukaAppListSettingMediaMovie_media_width" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_mime" name="welukaAppListSettingMediaMovie_mime" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_source_type" name="welukaAppListSettingMediaMovie_source_type" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_title" name="welukaAppListSettingMediaMovie_title" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_url" name="welukaAppListSettingMediaMovie_url" value="" />
												<?php //v1.1.1 add ?>
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_poster_attachment_id" name="welukaAppListSettingMediaMovie_poster_attachment_id" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_poster_full_url" name="welukaAppListSettingMediaMovie_poster_full_url" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_poster_full_width" name="welukaAppListSettingMediaMovie_poster_full_width" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_poster_full_height" name="welukaAppListSettingMediaMovie_poster_full_height" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_wpautoplay" name="welukaAppListSettingMediaMovie_wpautoplay" value="" />
                                                <input type="hidden" id="welukaAppListSettingMediaMovie_wploop" name="welukaAppListSettingMediaMovie_wploop" value="" />
												<?php //v1.1.1 addend ?>
                                            </div>
                                            
                                            <h5 class="weluka-mgtop-m"><?php _e('Title', Weluka::$settings['plugin_name']); ?></h5>
		                               		<div class="form-group">
                                                <input type="text" id="welukaAppListSettingTitle" name="welukaAppListSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please also enter the case of a non-display.', Weluka::$settings['plugin_name']); ?></div>
                                        	</div>

                                            <h5 class="weluka-mgtop-m"><?php _e('Meta1', Weluka::$settings['plugin_name']); ?></h5>
		                               		<div class="form-group">
                                                <input type="text" id="welukaAppListSettingMeta1" name="welukaAppListSettingMeta1" class="form-control" value="" />
                                        	</div>

                                            <h5 class="weluka-mgtop-m"><?php _e('Meta2', Weluka::$settings['plugin_name']); ?></h5>
		                               		<div class="form-group">
                                                <input type="text" id="welukaAppListSettingMeta2" name="welukaAppListSettingMeta2" class="form-control" value="" />
                                        	</div>

                                            <h5 class="weluka-mgtop-m"><?php _e('Content', Weluka::$settings['plugin_name']); ?></h5>
                                            <div class="form-group">
                                           		<?php
													wp_editor('', 'welukaapplistcontentcodeeditorcontent', array(
														'media_buttons' => true,
														'textarea_rows' => 10
													));
												?>
                                            </div>
											<div class="welukaMsgArea"></div>
                                        	<div class="weluka-mgbottom-s weluka-text-right">
												<button type="button" class="welukaAppListSettingNewBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('New', Weluka::$settings['plugin_name']); ?></button>
												<button type="button" class="welukaAppListSettingRegBtn weluka-btn weluka-btn-org weluka-btn-info btn-s"><?php _e('Reg', Weluka::$settings['plugin_name']); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /#weluka-applist-setting-panel-item -->
                    			<div id="weluka-applist-setting-panel-advanced" class="weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('AppList', array('border')); ?>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaAppListSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaAppListSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('AppList'); ?>
                                    <?php $_builder->weluka_display_margin_setting('AppList'); ?>
									<?php $_builder->weluka_display_css_setting('AppList'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-applist-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaAppListSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppListMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppListSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('AppListXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-applist-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-applist-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end applist setting modal ?>

<?php
/**
 * wp custom menu dialog setting
 * @update
 * ver1.0.1
 * ver1.0.4
 * ver1.1.2
 * ver1.2
 */
?>
<div id="weluka-wpmenu-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpmenuSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpmenuSettingModalLabel" class="modal-title"><?php _e('Wordpress Custom Menu Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wpmenu-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpmenu-setting-panel-style" class="weluka-a"><?php _e('Menu Style', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpmenu-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpmenu-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpmenu-setting-form" name="weluka-wpmenu-setting-form" role="form">
                    			<div id="weluka-wpmenu-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Menu Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpMenuSettingTitle" name="welukaWpMenuSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpMenuSettingMenu"><?php _e('Select Menu', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
		                                		<select id="welukaWpMenuSettingMenu" name="welukaWpMenuSettingMenu" class="form-control">
												<?php
													$_wpCustomMenus = get_terms('nav_menu');
													if ($_wpCustomMenus){
            											foreach($_wpCustomMenus as $_menu){
                                               				echo '<option value="' . $_menu->term_id. '">' . esc_attr($_menu->name) . '</option>';
														}
        											}else{
                                                		echo '<option value="">' . __('None', Weluka::$settings['plugin_name']) . '</option>';
        											}
												?>
                                                </select>
                                                <div class="weluka-mgtop-xs help-block"><?php _e('After the custom menu registration Please reload the page builder.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>

                        		</div><!-- /#weluka-wpmenu-setting-panel-general -->
                    			<div id="weluka-wpmenu-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-4">
                                            <?php $_builder->weluka_display_csutomdesgin_settings('welukaWpmenuCustomDesign'); ?>

                                        	<div class="form-group weluka-mgtop-m">
                                            	<h5><?php _e('Menu Layout', Weluka::$settings['plugin_name']); ?></h5>
		                                		<select id="welukaWpmenuSettingLayout" name="welukaWpmenuSettingLayout" class="form-control">
													<option value=""></option>
                                                <?php foreach($_builder->wpmenu_layouts as $_layout) : ?>
													<option value="<?php echo $_layout['layout_class']; ?>"><?php echo $_layout['label']; ?></option>
												<?php endforeach; ?>
                                                </select>
                                            </div>

                                    		<div class="weluka-row clearfix form-group">
                                    			<div class="weluka-col-md-12">
													<input id="welukaWpMenuSettingContentWidthFixed" name="welukaWpMenuSettingContentWidthFixed" type="checkbox" value="1" />
	                                        		<label for="welukaWpMenuSettingContentWidthFixed"><?php _e('Menu Content Fixed Width', Weluka::$settings['plugin_name']); ?></label>
													<div class="weluka-mgtop-xs help-block">
                                            			<?php _e('Please be content menu to select if you want to display a fixed-width in the case where the content container width in the section if you have selected a horizontal menu layout is set to full width. If the content container width is set in the theme, it will according to the theme.', Weluka::$settings['plugin_name']); ?>
                                            		</div>
                                       			</div>
											</div>

                                        </div>
                                        <div class="weluka-col-md-8">
                                        	<div id="welukaWpmenuSettingLayoutPreview"></div>
                                            <div id="weluka-wpmenu-setting-horizontal" class="weluka-wpmenu-setting-style-input weluka-mgtop-m">
                                            	<h5><?php _e('Horizontal Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
														<?php $_builder->weluka_display_menucolor_settings('welukaWpmenuSettingColor_horizontal'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
                                                    	<label><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                                        <select id="welukaWpmenuSettingAlign_horizontal" name="welukaWpmenuSettingAlign_horizontal" class="form-control">
        													<option value=""><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
        													<option value="navbar-center"><?php _e('Center', Weluka::$settings['plugin_name']); ?></option> <?php //ver1.0.1 ?>
  															<option value="navbar-right"><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
                                                        </select>
                                                    </div>
                                                	<div class="weluka-col-md-4">
														<?php $_builder->weluka_display_buttonshape_settings('welukaWpmenuSettingShape_horizontal'); ?>
                                                    </div>
                                                </div>

                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpmenuSettingStyle_horizontal'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpmenuSettingFont_horizontal'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpmenuSettingFontSize_horizontal" name="welukaWpmenuSettingFontSize_horizontal" class="form-control weluka-normal-text" value="" />
                                                    </div>
												</div>
                                            </div><!-- /#weluka-wpmenu-setting-horizontal -->
                                            <div id="weluka-wpmenu-setting-vertical" class="weluka-wpmenu-setting-style-input weluka-mgtop-m">
                                            	<h5><?php _e('Vertical Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
														<?php $_builder->weluka_display_menucolor_settings('welukaWpmenuSettingColor_vertical'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
														<?php $_builder->weluka_display_align_settings('welukaWpmenuSettingAlign_vertical'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
														<?php $_builder->weluka_display_buttonshape_settings('welukaWpmenuSettingShape_vertical'); ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpmenuSettingStyle_vertical'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpmenuSettingFont_vertical'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpmenuSettingFontSize_vertical" name="welukaWpmenuSettingFontSize_vertical" class="form-control weluka-normal-text" value="" />
                                                    </div>
												</div>
                                            </div><!-- /#weluka-wpmenu-setting-vertical -->
                                            <div id="weluka-wpmenu-setting-hamburger" class="weluka-wpmenu-setting-style-input weluka-mgtop-m">
                                            	<h5><?php _e('Humburger Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-3">
														<?php $_builder->weluka_display_menucolor_settings('welukaWpmenuSettingColor_hamburger'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-3">
                                                    	<label><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                                        <select id="welukaWpmenuSettingAlign_hamburger" name="welukaWpmenuSettingAlign_hamburger" class="form-control">
        													<option value=""><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
  															<option value="navbar-right"><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
                                                        </select>                                                    	
                                                    </div>
                                                	<div class="weluka-col-md-3">
														<?php $_builder->weluka_display_buttonshape_settings('welukaWpmenuSettingShape_hamburger'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-3">
														<label><?php _e('Humburger Size', Weluka::$settings['plugin_name']); ?></label>
                                                    	<select id="welukaWpmenuSettingSize_hamburger" name="welukaWpmenuSettingSize_hamburger" class="form-control">
                                                        	<option value=""><?php _e('Default', Weluka::$settings['plugin_name']); ?></option>
                                                        	<option value="weluka-medium"><?php _e('Medium', Weluka::$settings['plugin_name']); ?></option>
                                                        	<option value="weluka-large"><?php _e('Large', Weluka::$settings['plugin_name']); ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpmenuSettingStyle_hamburger'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpmenuSettingFont_hamburger'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpmenuSettingFontSize_hamburger" name="welukaWpmenuSettingFontSize_hamburger" class="form-control weluka-normal-text" value="" />
                                                    </div>
												</div>
                                                <?php //v1.1.2 add ?>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-7">
														<input id="welukaWpmenuSettingDrower_hamburger" name="welukaWpmenuSettingDrower_hamburger" type="checkbox" value="on" />
            											<label for="welukaWpmenuSettingDrower_hamburger">&nbsp;<?php _e('To make the menu drawer.', Weluka::$settings['plugin_name']); ?></label>
                                                    </div>
													<div class="weluka-col-md-5">
														<label><?php _e('Drower Width (px)', Weluka::$settings['plugin_name']); ?></label>
                                                        <input id="welukaWpmenuSettingDrower_hamburger_width" name="welukaWpmenuSettingDrower_hamburger_width" type="text" class="form-control" />
                                                    </div>
												</div>
                                                <?php //v1.1.2 addend ?>

                                            </div><!-- /#weluka-wpmenu-setting-hamburger -->
                                            <?php //ver1.0.1 ?>
                                            <div id="weluka-wpmenu-setting-common-style" class="weluka-mgtop-m">
                                            	<h5><?php _e('Custom Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-3">
 	                                                	<h6><?php _e('Base Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                            	<div id="welukaWpmenuSettingBaseColorWrap"></div>
													</div>
                                                    <div class="weluka-col-md-3">
 	                                                	<h6><?php _e('Border Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                            	<div id="welukaWpmenuSettingBorderColorWrap"></div>
													</div>
                                                    <div class="weluka-col-md-3">
 	                                                	<h6><?php _e('Text Color', Weluka::$settings['plugin_name']); ?></h6>
    	                                            	<div id="welukaWpmenuSettingTextColorWrap"></div>
													</div>
                                                	<div class="weluka-col-md-3">
                                                		<input id="welukaWpmenuSettingHideBorder" name="welukaWpmenuSettingHideBorder" type="checkbox" value="1" />
	                                           	 		<label for="welukaWpmenuSettingHideBorder"><?php _e('Hide Border?', Weluka::$settings['plugin_name']); ?></label>
													</div>
                                                </div>
                                                <div class="weluka-row clearfix">
                                                	<div class="weluka-col-md-12">
                                                   		<div class="help-block"><?php _e("When you'd like to establish the color besides the color theme, please establish it more than [Custom Setting].", Weluka::$settings['plugin_name']); ?></div>
													</div>
                                                </div>
                                            </div><!-- /#weluka-wpmenu-setting-common-style -->
                                            <?php // v1.1.2 add ?>
                                            <div id="weluka-wpmenu-setting-description" class="weluka-mgtop-m">
                                            	<h5><?php _e('Description', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-7">
														<input id="welukaWpmenuSettingDesc" name="welukaWpmenuSettingDesc" type="checkbox" value="on" />
            											<label for="welukaWpmenuSettingDesc">&nbsp;<?php _e('Display the menu described?', Weluka::$settings['plugin_name']); ?></label>
                                                    </div>
                                                	<div class="weluka-col-md-5">
                                                    	<label><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                                                        <select id="welukaWpmenuSettingDescAlign" name="welukaWpmenuSettingDescAlign" class="form-control">
        													<option value="weluka-navdesc-top"><?php _e('Menu Text Top', Weluka::$settings['plugin_name']); ?></option>
        													<option value="weluka-navdesc-bottom"><?php _e('Menu Text Bottom', Weluka::$settings['plugin_name']); ?></option> <?php //ver1.0.1 ?>
  															<option value="weluka-navdesc-right"><?php _e('Menu Text Right', Weluka::$settings['plugin_name']); ?></option>
                                                        </select>
                                                    </div>
												</div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-3">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpmenuSettingDescStyle'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-3">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpmenuSettingDescFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-3">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpmenuSettingDescFontSize" name="welukaWpmenuSettingDescFontSize" class="form-control weluka-normal-text" value="" />
													</div>
                                                    <div class="weluka-col-md-3">
 	                                                	<label><?php _e('Text Color', Weluka::$settings['plugin_name']); ?></label>
    	                                            	<div id="welukaWpmenuSettingDescTextColorWrap"></div>
													</div>
												</div>
                                                <div class="weluka-row clearfix">
                                                	<div class="weluka-col-md-12">
                                                   		<div class="help-block"><?php _e("To display each item description of the WordPress menu settings.", Weluka::$settings['plugin_name']); ?></div>
													</div>
                                                </div>
                                            </div><!-- /#weluka-wpmenu-setting-description -->
                                        	<?php // v1.1.2 addend ?>

                                        </div><!-- /weluka-col-md-8 -->
                                    </div>
                                </div><!-- /#weluka-wpmenu-setting-panel-style -->
                    			<div id="weluka-wpmenu-setting-panel-advanced" class="weluka-builder-settings-panel">
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpMenu'); ?>
									<?php $_builder->weluka_display_margin_setting('WpMenu'); ?>
									<?php $_builder->weluka_display_css_setting('WpMenu'); ?>
                        		</div><!-- /#weluka-wpmenu-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wpmenu-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpMenuSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpMenuMd'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpMenuSm'); ?>
                                    </div>
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpMenuXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wpmenu-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpmenu-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpmenu setting modal ?>

<?php
/**
 * wp archives dialog setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-wparchives-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wparchivesSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wparchivesSettingModalLabel" class="modal-title"><?php _e('Wordpress Archives Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wparchives-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* TODO <li><a href="#weluka-wparchives-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li>*/ ?>
    					<li><a href="#weluka-wparchives-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wparchives-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wparchives-setting-form" name="weluka-wparchives-setting-form" role="form">
                    			<div id="weluka-wparchives-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpArchivesSettingTitle" name="welukaWpArchivesSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpArchivesSettingShowType"><?php _e('Archive Type', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
		                                		<select id="welukaWpArchivesSettingShowType" name="welukaWpArchivesSettingShowType" class="form-control">
													<option value="yearly"><?php _e('Yearly', Weluka::$settings['plugin_name']); ?></option>
													<option value="monthly"><?php _e('Monthly', Weluka::$settings['plugin_name']); ?></option>
													<option value="weekly"><?php _e('Weekly', Weluka::$settings['plugin_name']); ?></option>
													<option value="daily"><?php _e('Daily', Weluka::$settings['plugin_name']); ?></option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpArchivesSettingShowLimit"><?php _e('Show Limit', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpArchivesSettingShowLimit" name="welukaWpArchivesSettingShowLimit" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter the number you want to display list.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Other.', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaWpArchivesSettingShowFormat" name="welukaWpArchivesSettingShowFormat" type="checkbox" value="option" />
	                                            <label for="welukaWpArchivesSettingShowFormat"><?php _e('Show Dropdown.', Weluka::$settings['plugin_name']); ?></label>
												<div class="weluka-mgtop-xs">
													<input id="welukaWpArchivesSettingShowCount" name="welukaWpArchivesSettingShowCount" type="checkbox" value="on" />
	                                            	<label for="welukaWpArchivesSettingShowCount"><?php _e('Show Post Count.', Weluka::$settings['plugin_name']); ?></label>
                                            	</div>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wparchives-setting-panel-general -->
                                <?php /*STYLE TODO
                    			<div id="weluka-wparchives-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-4">
                                        	<label><?php _e('Registory Style', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                    	<div class="weluka-col-md-8">
		                                	<div class="form-group">
                                            </div>
    									</div>
                                    </div>
                                </div><!-- /#weluka-wparchives-setting-panel-style -->
								*/ ?>
                    			<div id="weluka-wparchives-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaWpArchivesSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaWpArchivesSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpArchives'); ?>
									<?php $_builder->weluka_display_margin_setting('WpArchives'); ?>
									<?php $_builder->weluka_display_css_setting('WpArchives'); ?>
                        		</div><!-- /#weluka-wparchives-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wparchives-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpArchivesSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpArchivesMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpArchivesSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpArchivesXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wparchives-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wparchives-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wparchives setting modal ?>

<?php
/**
 * wp calendar dialog setting
 * @update
 * ver 1.0.4
 * ver 1.1.4
 * ver 1.2
 */
?>
<div id="weluka-wpcalendar-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpcalendarSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpcalendarSettingModalLabel" class="modal-title"><?php _e('Wordpress Calendar Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wpcalendar-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* TODO <li><a href="#weluka-wpcalendar-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li> */ ?>
    					<li><a href="#weluka-wpcalendar-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpcalendar-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpcalendar-setting-form" name="weluka-wpcalendar-setting-form" role="form">
                    			<div id="weluka-wpcalendar-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpCalendarSettingTitle" name="welukaWpCalendarSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-wpcalendar-setting-panel-general -->
                                <?php /* TODO
                    			<div id="weluka-wpcalendar-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-4">
                                        	<label><?php _e('Registory Style', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                    	<div class="weluka-col-md-8">
		                                	<div class="form-group">
                                            </div>
    									</div>
                                    </div>
                                </div><!-- /#weluka-wpcalendar-setting-panel-style -->
								*/ ?>
                    			<div id="weluka-wpcalendar-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaWpCalendarSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaWpCalendarSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpCalendar'); ?>
									<?php $_builder->weluka_display_margin_setting('WpCalendar'); ?>
									<?php $_builder->weluka_display_css_setting('WpCalendar'); ?>
                        		</div><!-- /#weluka-wpcalendar-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wpcalendar-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpCalendarSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpCalendarMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpCalendarSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpCalendarXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wpcalendar-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpcalendar-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpcalendar setting modal ?>

<?php
/**
 * wp categories dialog setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-wpcategories-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpcategoriesSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpcategoriesSettingModalLabel" class="modal-title"><?php _e('Wordpress Categories Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wpcategories-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* TOOD <li><a href="#weluka-wpcategories-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li> */ ?>
    					<li><a href="#weluka-wpcategories-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpcategories-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpcategories-setting-form" name="weluka-wpcategories-setting-form" role="form">
                    			<div id="weluka-wpcategories-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpCategoriesSettingTitle" name="welukaWpCategoriesSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4">
												<input id="welukaWpCategoriesSettingShowDropdown" name="welukaWpCategoriesSettingShowDropdown" type="checkbox" value="on" />
	                                            <label for="welukaWpCategoriesSettingShowDropdown"><?php _e('Show Dropdown.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
											<div class="weluka-col-md-4">
												<input id="welukaWpCategoriesSettingShowCount" name="welukaWpCategoriesSettingShowCount" type="checkbox" value="on" />
	                                            <label for="welukaWpCategoriesSettingShowCount"><?php _e('Show Post Count.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
											<div class="weluka-col-md-4">
												<input id="welukaWpCategoriesSettingHierarchical" name="welukaWpCategoriesSettingHierarchical" type="checkbox" value="on" />
	                                            <label for="welukaWpCategoriesSettingHierarchical"><?php _e('Show Hierarchical.', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wpcategories-setting-panel-general -->
                                <?php /*
                    			<div id="weluka-wpcategories-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-4">
                                        	<label><?php _e('Registory Style', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                    	<div class="weluka-col-md-8">
		                                	<div class="form-group">
                                            </div>
    									</div>
                                    </div>
                                </div><!-- /#weluka-wpcategories-setting-panel-style -->
								*/ ?>
                    			<div id="weluka-wpcategories-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaWpCategoriesSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaWpCategoriesSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpCategories'); ?>
									<?php $_builder->weluka_display_margin_setting('WpCategories'); ?>
									<?php $_builder->weluka_display_css_setting('WpCategories'); ?>
                        		</div><!-- /#weluka-wpcategories-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wpcategories-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpCategoriesSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpCategoriesMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpCategoriesSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpCategoriesXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wpcategories-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpcategories-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpcategories setting modal ?>

<?php
/**
 * wp meta dialog setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-wpmeta-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpmetaSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpmetaSettingModalLabel" class="modal-title"><?php _e('Wordpress Meta Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wpmeta-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* TODO <li><a href="#weluka-wpmeta-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li> */ ?>
    					<li><a href="#weluka-wpmeta-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpmeta-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpmeta-setting-form" name="weluka-wpmeta-setting-form" role="form">
                    			<div id="weluka-wpmeta-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpMetaSettingTitle" name="welukaWpMetaSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-wpmeta-setting-panel-general -->
                                <?php /* TODO
                    			<div id="weluka-wpmeta-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-4">
                                        	<label><?php _e('Registory Style', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                    	<div class="weluka-col-md-8">
		                                	<div class="form-group">
                                            </div>
    									</div>
                                    </div>
                                </div><!-- /#weluka-wpmeta-setting-panel-style -->
								*/ ?>
                    			<div id="weluka-wpmeta-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaWpMetaSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaWpMetaSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpMeta'); ?>
									<?php $_builder->weluka_display_margin_setting('WpMeta'); ?>
									<?php $_builder->weluka_display_css_setting('WpMeta'); ?>
                        		</div><!-- /#weluka-wpmeta-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wpmeta-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpMetaSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpMetaMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpMetaSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpMetaXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wpmeta-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpmeta-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpmeta setting modal ?>

<?php
/**
 * wp pages dialog setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-wppages-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wppagesSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wppagesSettingModalLabel" class="modal-title"><?php _e('Wordpress Pages Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wppages-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* TODO <li><a href="#weluka-wppages-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li> */ ?>
    					<li><a href="#weluka-wppages-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wppages-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wppages-setting-form" name="weluka-wppages-setting-form" role="form">
                    			<div id="weluka-wppages-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpPagesSettingTitle"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                        	<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPagesSettingTitle" name="welukaWpPagesSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpPagesSettingSortby"><?php _e('Sort by', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
		                                		<select id="welukaWpPagesSettingSortby" name="welukaWpPagesSettingSortby" class="form-control">
													<option value="menu_order"><?php _e('Menu Order', Weluka::$settings['plugin_name']); ?></option>
													<option value="ID"><?php _e('Page Id', Weluka::$settings['plugin_name']); ?></option>
													<option value="post_title"><?php _e('Page Title', Weluka::$settings['plugin_name']); ?></option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpPagesSettingExcludes"><?php _e('Exclude Page Id', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPagesSettingExcludes" name="welukaWpPagesSettingExcludes" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter the page ID that you do not want to display a comma-separated.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wppages-setting-panel-general -->
                                <?php /* TODO
                    			<div id="weluka-wppages-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-4">
                                        	<label><?php _e('Registory Style', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                    	<div class="weluka-col-md-8">
		                                	<div class="form-group">
                                            </div>
    									</div>
                                    </div>
                                </div><!-- /#weluka-wppages-setting-panel-style -->
								*/ ?>
                    			<div id="weluka-wppages-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaWpPagesSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaWpPagesSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpPages'); ?>
									<?php $_builder->weluka_display_margin_setting('WpPages'); ?>
									<?php $_builder->weluka_display_css_setting('WpPages'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wppages-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpPagesSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpPagesMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpPagesSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpPagesXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wppages-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wppages-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wppages setting modal ?>

<?php
/**
 * wp commentss dialog setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-wpcomments-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpcommentsSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpcommentsSettingModalLabel" class="modal-title"><?php _e('Wordpress Recent Comments Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wpcomments-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* TODO <li><a href="#weluka-wpcomments-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li> */ ?>
    					<li><a href="#weluka-wpcomments-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpcomments-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpcomments-setting-form" name="weluka-wpcomments-setting-form" role="form">
                    			<div id="weluka-wpcomments-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpCommentsSettingTitle"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                        	<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpCommentsSettingTitle" name="welukaWpCommentsSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpCommentsSettingLimit"><?php _e('Show Comment Count', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpCommentsSettingLimit" name="welukaWpCommentsSettingLimit" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Default 5 comments.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wpcomments-setting-panel-general -->
                                <?php /* TODO
                    			<div id="weluka-wpcomments-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-4">
                                        	<label><?php _e('Registory Style', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                    	<div class="weluka-col-md-8">
		                                	<div class="form-group">
                                            </div>
    									</div>
                                    </div>
                                </div><!-- /#weluka-wpcomments-setting-panel-style -->
								*/ ?>
                    			<div id="weluka-wpcomments-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaWpCommentsSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaWpCommentsSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpComments'); ?>
									<?php $_builder->weluka_display_margin_setting('WpComments'); ?>
									<?php $_builder->weluka_display_css_setting('WpComments'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wpcomments-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpCommentsSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpCommentsMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpCommentsSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpCommentsXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wpcomments-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpcomments-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpcomments setting modal ?>

<?php
/**
 * wp posts dialog setting
 * @update
 * ver1.0.1
 * ver1.0.4
 * ver1.0.6
 * ver1.1
 * ver1.1.4
 * ver1.2
 * ver1.2.3
 * v1.2.7.1
 */
?>
<div id="weluka-wpposts-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wppostsSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wppostsSettingModalLabel" class="modal-title"><?php _e('Wordpress Recent Posts Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wpposts-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpposts-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpposts-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpposts-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpposts-setting-form" name="weluka-wpposts-setting-form" role="form">
                    			<div id="weluka-wpposts-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpPostsSettingTitle"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingTitle" name="welukaWpPostsSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
									<?php //v1.1.4 add and modify ?>
                                	<div class="weluka-row form-group clearfix">
                                        <div class="weluka-col-md-4"><label for="welukaWpPostsSettingTargetType"><?php _e('Target Type', Weluka::$settings['plugin_name']); ?></label></div>
                                        <div class="weluka-col-md-8">
                                        	<?php $_builder->weluka_display_taxonomytype_settings('welukaWpPostsSettingTargetType', '', false); ?>
                                        </div>
                                    </div>
                                	<div class="weluka-row form-group clearfix">
                                        <div class="weluka-col-md-4"><label for="welukaWpPostsSettingPostType"><?php _e('Post Type', Weluka::$settings['plugin_name']); ?></label></div>
                                        <div class="weluka-col-md-8">
                                        <?php
                                    		//custom posttype checkbox
											$_ptypes = get_post_types( array( 'public' => true, '_builtin' => false ) );
											$_exclude = array( Weluka::$settings['cpt_hd'] => Weluka::$settings['cpt_hd'], Weluka::$settings['cpt_ft'] => Weluka::$settings['cpt_ft'], Weluka::$settings['cpt_sd'] => Weluka::$settings['cpt_sd'] );
    										$_ptypes = array_diff_assoc($_ptypes, $_exclude);
											echo '<input id="welukaWpPostsSettingPostType_post" name="welukaWpPostsSettingPostType_post" class="welukaWpPostsSettingPostTypes" type="checkbox" value="post" />';
	                                        echo '&nbsp;<label for="welukaWpPostsSettingPostType_post">' . __('post', Weluka::$settings['plugin_name']) . '</label>&nbsp;&nbsp;';
											if( !empty( $_ptypes ) ){
												foreach ($_ptypes as $_key => $_val) :
													echo '<input id="welukaWpPostsSettingPostType_' . $_key . '" name="welukaWpPostsSettingPostType_' . $_key . '" class="welukaWpPostsSettingPostTypes" type="checkbox" value="' . $_key . '" />';
	                                            	echo '&nbsp;<label for="welukaWpPostsSettingPostType_' . $_key . '">' . esc_html( get_post_type_object( $_key )->label ) . '</label>&nbsp;&nbsp;';
												endforeach;
											}
										?>
	                                    	<div class="weluka-mgtop-xs help-block"><?php _e('Do not check if the post will qualify.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<div class="weluka-row form-group clearfix">
										<div class="weluka-col-md-4">
                                            <div class="weluka-wpposts-setting-targettype-category">
	                                            <label><?php _e('Include Category', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                            <div class="weluka-wpposts-setting-targettype-tagcloud weluka-panel-deactive">
	                                            <label><?php _e('Include Tagloud', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                            <div class="weluka-wpposts-setting-targettype-csttax weluka-panel-deactive">
	                                        	<label><?php _e('Include Custom Taxonomy', Weluka::$settings['plugin_name']); ?></label>
                                            </div>
                                        </div>
                                        <div class="weluka-col-md-8">
                                            <div class="weluka-wpposts-setting-targettype-category">
                                            <?php
												$_cats = get_categories('get=all');
            									foreach($_cats as $cat) :
													echo '<input id="welukaWpPostsSettingCat_' . $cat->cat_ID . '" name="welukaWpPostsSettingCat_' . $cat->cat_ID . '" class="welukaWpPostsSettingCat" type="checkbox" value="' . $cat->cat_ID . '" />';
	                                            	echo '&nbsp;<label for="welukaWpPostsSettingCat_' . $cat->cat_ID . '">' . esc_attr($cat->cat_name) . '</label>&nbsp;&nbsp;';
												endforeach;
											?>
	                                            <div class="weluka-mgtop-xs help-block"><?php _e('If the check is not, all categories are eligible.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                            <div class="weluka-wpposts-setting-targettype-tagcloud">
                                            <?php
												$_tags = get_tags();
												if( !empty( $_tags ) ) {
            										foreach($_tags as $_tag) :
														echo '<input id="welukaWpPostsSettingTag_' . $_tag->term_id . '" name="welukaWpPostsSettingTag_' . $_tag->term_id . '" class="welukaWpPostsSettingCat" type="checkbox" value="' . $_tag->term_id . '" />';
		                                            	echo '&nbsp;<label for="welukaWpPostsSettingTag_' . $_tag->term_id . '">' . esc_attr($_tag->name) . '</label>&nbsp;&nbsp;';
													endforeach;
													echo '<div class="weluka-mgtop-xs help-block">' . __('If the check is not every post will qualify.', Weluka::$settings['plugin_name']) . '</div>';
												} else {
													echo '<div class="weluka-mgtop-xs help-block">' . __('Associated with the posted tag cloud is not.', Weluka::$settings['plugin_name']) . '</div>';
												}
											?>
                                            </div>
                                            <div class="weluka-wpposts-setting-targettype-csttax">
                                            <?php
                                                $_taxs =  get_taxonomies( array('public' => true, '_builtin' => false ) );
												if( !empty( $_taxs ) ){ ?>
													<select id="welukaWpPostsSettingCsttax" name="welukaWpPostsSettingCsttax" class="form-control">
            										<?php  $_termstr = ''; foreach($_taxs as $_tax) : ?>
                                                    	<option value="<?php echo $_tax; ?>"><?php echo $_tax; ?></option>
													<?php
														$_terms = get_terms( $_tax, array( 'hide_empty' => 0 ) ); //登録数0件の分類も表示
														if( !empty( $_terms ) ) {
															$_termstr .= '<div id="weluka-wpposts-setting-targettype-csttax-' . $_tax . '" class="weluka-panel-deactive">'; 
															foreach($_terms as $_term) :
																$_termstr .= '<input id="welukaWpPostsSettingCsttax_' . $_tax . '_' . $_term->term_id . '" name="welukaWpPostsSettingCsttax_' . $_tax . '_' . $_term->term_id . '" class="welukaWpPostsSettingCat" type="checkbox" value="' . $_term->term_id . '" />';
	                                            				$_termstr .= '&nbsp;<label for="welukaWpPostsSettingCsttax_' . $_tax . '_' . $_term->term_id . '">' . esc_attr($_term->name) . '</label>&nbsp;&nbsp;';
															endforeach;
															$_termstr .= '</div>';
														}
                                                    endforeach; ?>
													</select>
                                                    <?php echo $_termstr; ?>
	                                            	<div class="weluka-mgtop-xs help-block"><?php _e('Please select a category, select the custom taxonomy names. If the check is not every post will qualify.', Weluka::$settings['plugin_name']); ?></div>
											<?php } else { ?>
	                                            <div class="weluka-mgtop-xs help-block"><?php _e('Custom taxonomy has been registered.', Weluka::$settings['plugin_name']); ?></div>
                                            <?php } ?>
                                            </div>
                                    	</div>
                                    </div>

                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Show Post Item', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaWpPostsSettingFlgTitle" name="welukaWpPostsSettingFlgTitle" type="checkbox" value="1" checked="checked" />
	                                            <label for="welukaWpPostsSettingFlgTitle"><?php _e('Title', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgDate" name="welukaWpPostsSettingFlgDate" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgDate"><?php _e('Date', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgAuthor" name="welukaWpPostsSettingFlgAuthor" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgAuthor"><?php _e('Author', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgCategory" name="welukaWpPostsSettingFlgCategory" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgCategory"><?php _e('Category', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgComment" name="welukaWpPostsSettingFlgComment" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgComment"><?php _e('Comment Count', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgThumb" name="welukaWpPostsSettingFlgThumb" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgThumb"><?php _e('Thumbnail', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgExcerpt" name="welukaWpPostsSettingFlgExcerpt" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgExcerpt"><?php _e('Excerpt', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
												<input id="welukaWpPostsSettingFlgTagcloud" name="welukaWpPostsSettingFlgTagcloud" type="checkbox" value="1" />
	                                            <label for="welukaWpPostsSettingFlgTagcloud"><?php _e('Tagcloud', Weluka::$settings['plugin_name']); ?></label>
                                                <?php /*<div class="weluka-mgtop-s">
													<input id="welukaWpPostsSettingFlgContent" name="welukaWpPostsSettingFlgContent" type="checkbox" value="1" />
	                                            	<label for="welukaWpPostsSettingFlgContent"><?php _e('You want to display all the contents rather than the excerpt.', Weluka::$settings['plugin_name']); ?></label>
                                                </div>*/ ?>
                                                <?php //v1.0.4 add v1.2.8 modify?>
                                                <div class="weluka-mgtop-s">
												<label><?php _e('View order ', Weluka::$settings['plugin_name'])?></label>
												<select id="welukaWpPostsSettingModifyDate" name="welukaWpPostsSettingModifyDate" class="form-control">
												<?php $orderWay = array('Registered'=> 0, 'Updated'=> 1, 'Random'=> 2); 
								  					  foreach ($orderWay as $k => $v) {
														echo '<option value="' . $v . '">' . __($k, Weluka::$settings['plugin_name']) . '</option>';
								  					  }
												?></select>
												<div class="weluka-mgtop-xs help-block"><?php _e('If you set the random, registered times will be shown in the list and the list order will be changed every hour at random.', Weluka::$settings['plugin_name'] ); ?></div>
                                                	<?php /*<input id="welukaWpPostsSettingModifyDate" name="welukaWpPostsSettingModifyDate" type="checkbox" value="1" />&nbsp;&nbsp;<label for="welukaWpPostsSettingModifyDate"><?php _e('View the updated date and time rather than posting date and time.', Weluka::$settings['plugin_name']); ?></label> */?>
                                                </div>
                                                <?php //v1.2.7.1 add ?>
                                                <div class="weluka-mgtop-s">
                                                	<input id="welukaWpPostsSettingOnExcerpt" name="welukaWpPostsSettingOnExcerpt" type="checkbox" value="1" />&nbsp;&nbsp;<label for="welukaWpPostsSettingOnExcerpt"><?php _e('That set excerpts from articles still show excerpts.', Weluka::$settings['plugin_name']); ?></label>
                                                </div>
                                            </div>
                                    	</div>
                                    </div>
									<div class="weluka-row clearfix">
										<div class="weluka-col-md-4"><label><?php _e('Tagcloud position', Weluka::$settings['plugin_name']); ?></label></div>
                                        <div class="weluka-col-md-8">
                       						<?php  $_builder->weluka_display_tagcloud_pos_settings('welukaWpPostsSettingTagcloudPos', '', false); ?>
                                        </div>
                                    </div>
                                    <?php //v1.1 add ?>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Title String Number', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingTitleStrNum" name="welukaWpPostsSettingTitleStrNum" class="form-control weluka-normal-text" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <?php //v1.1 addend ?>

                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Excerpt String Number', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingExcerptStrNum" name="welukaWpPostsSettingExcerptStrNum" class="form-control weluka-normal-text" value="" />
												<div class="weluka-mgtop-xs help-block" style="margin-bottom:0;"><?php _e('All images and characters decorated by HTML will be shown if you set -1,', Weluka::$settings['plugin_name'] ); ?></div>
												<div class="help-block"><?php _e('If you set -1, The excerpt is not shown at buidler.Please check the preview.', Weluka::$settings['plugin_name'] ); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('More Link Text', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingMoreStr" name="welukaWpPostsSettingMoreStr" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter if you want to display a link to see more for each article.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('All Link', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                            	<label><?php _e('Url', Weluka::$settings['plugin_name']); ?></label>
                                                <input type="text" id="welukaWpPostsSettingAllLinkUrl" name="welukaWpPostsSettingAllLinkUrl" class="form-control" value="" />
                                            	<div class="weluka-mgtop-xs">
                                                	<label><?php _e('All Link Text', Weluka::$settings['plugin_name']); ?></label>
                                                	<input type="text" id="welukaWpPostsSettingAllMoreStr" name="welukaWpPostsSettingAllMoreStr" class="form-control" value="" />
                                                </div>
                                            </div>
                                    	</div>
                                    </div>
                                    <?php /* v1.1 modify
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Number of posts', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingLimit" name="welukaWpPostsSettingLimit" class="form-control weluka-normal-text" value="" />
                                            </div>
                                        </div>
                                    </div> */ ?>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Number of posts', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
                                            	<div>
                                                	<label><?php _e('Pageing', Weluka::$settings['plugin_name']); ?></label><br />
                        							<label style="margin-right:8px;"><input type="radio" id="welukaWpPostsSettingPaging_0" name="welukaWpPostsSettingPaging" value="0" />&nbsp;<?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>
                        							<label style="margin-right:8px;"><input type="radio" id="welukaWpPostsSettingPaging_1" name="welukaWpPostsSettingPaging" value="1" />&nbsp;<?php _e('Paging links', Weluka::$settings['plugin_name']); ?></label>
                        							<label><input type="radio" id="welukaWpPostsSettingPaging_2" name="welukaWpPostsSettingPaging" value="2" />&nbsp;<?php _e('Infinite scroll', Weluka::$settings['plugin_name']); ?></label>
													<div id="both-excerpt-scl" class="help-block" style="margin-top:0;"><?php _e('It is unavailable to set both infinite scroll and "-1" value at excerpt string number.', Weluka::$settings['plugin_name']);  //v1.2.8 add ?></div>
												</div>
                                                <div class="weluka-mgtop-s">
													<label><?php _e('Number of results per page in', Weluka::$settings['plugin_name']); ?></label>
    	                                            <input type="text" id="welukaWpPostsSettingLimit" name="welukaWpPostsSettingLimit" class="form-control weluka-normal-text" value="" />
                                                	<div class="weluka-mgtop-xs help-block"><?php _e('If you enable paging paging enabled, results on one page and the total number of.', Weluka::$settings['plugin_name']); ?></div>
												</div>
                                                <div class="weluka-mgtop-s">
													<label><?php _e('The maximum paging', Weluka::$settings['plugin_name']); ?></label>
    	                                            <input type="text" id="welukaWpPostsSettingPageNum" name="welukaWpPostsSettingPageNum" class="form-control weluka-normal-text" value="" />
                                                	<div class="weluka-mgtop-xs help-block"><?php _e('Please enter the maximum paging paging enabled for.', Weluka::$settings['plugin_name']); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php //v1.1 modify end ?>                                    
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Height (px)', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpPostsSettingHeight" name="welukaWpPostsSettingHeight" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Scroll displayed if it exceeds the specified height.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>
                        		</div><!-- /#weluka-wpposts-setting-panel-general -->
                    			<div id="weluka-wpposts-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                    	<div class="weluka-col-md-4">
                                        	<?php $_builder->weluka_display_csutomdesgin_settings('welukaWpPostsCustomDesign'); ?>

											<div class="form-group weluka-mgtop-m">
												<?php $_builder->weluka_display_listlayout_settings('welukaWpPostsSettingLayout'); ?>
                                                <?php //v1.0.6 add ?>
												<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                            						<p style="font-weight:bold;padding-bottom:10px;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
													<label><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></label>
        	                    					<?php $_builder->weluka_display_listlayout_settings( 'welukaWpPostsSettingLayoutSm', '', false, true); ?>
													<label><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></label>
        	                    					<?php $_builder->weluka_display_listlayout_settings( 'welukaWpPostsSettingLayoutXs', '', false, true); ?>
												</div>
												<?php //v1.0.6 addend ?>
											</div>
<?php /* v1.0.6                                            
                                            <div id="weluka-wpposts-setting-layout-rowcolum" class="weluka-panel-deactive">
*/ ?>
                                            <div id="weluka-wpposts-setting-layout-rowcolum">
                                                <div class="form-group">
                                                	<?php $_builder->weluka_display_listlayout_rowcolumn_settings('welukaWpPostsSettingRowColumn', 'Row Column', true, true, '', false, true ); ?>
                                                    <?php //v1.0.6 add ?>
													<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                            							<p style="font-weight:bold;padding-bottom:10px;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
														<label><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></label>
                            							<?php $_builder->weluka_display_listlayout_rowcolumn_settings( 'welukaWpPostsSettingRowColumnSm', '', false, true, '', false, true); ?>
														<label><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></label>
                            							<?php $_builder->weluka_display_listlayout_rowcolumn_settings( 'welukaWpPostsSettingRowColumnXs', '', false, true, '', false, true); ?>
													</div>
                                                    <div class="weluka-mgtop-xs help-block"><?php _e('Please select the number of columns the case of a vertical list format.', Weluka::$settings['plugin_name']); ?></div>
													<?php //v1.0.6 addend ?>
                                                </div>
                                            </div>
                                            
                                            <?php //v1.2 add ?>
                                            <div class="form-group">
                                            	<h5><?php _e('Thumbnail height(px)', Weluka::$settings['plugin_name']); ?></h5>
	                                        	<input id="welukaWpPostsSettingThumbHeight" name="welukaWpPostsSettingThumbHeight" type="text" class="form-control" />
												<div style="margin-top:10px;border:1px solid #ccc; padding:10px;">
                            						<p style="font-weight:bold;padding-bottom:10px;"><?php _e( 'Responsive', Weluka::$settings['plugin_name'] ); ?></p>
													<label><?php _e('Small View(768px - 991px)', Weluka::$settings['plugin_name']); ?></label>
	                                        		<input id="welukaWpPostsSettingThumbHeightSm" name="welukaWpPostsSettingThumbHeightSm" type="text" class="form-control" />
													<label><?php _e('XSmall View(Less than 768px)', Weluka::$settings['plugin_name']); ?></label>
	                                        		<input id="welukaWpPostsSettingThumbHeightXs" name="welukaWpPostsSettingThumbHeightXs" type="text" class="form-control" />
												</div>
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter a height (px) If you want to align the height of the thumbnail. Set the height of responsive (or clear the height) responsive List Layout if you want to set.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                            <div class="form-group">
                                            	<h5><?php _e('Post block', Weluka::$settings['plugin_name']); ?></h5>
                                                <input id="welukaWpPostsSettingEqh" name="welukaWpPostsSettingEqh" type="checkbox" value="1" checked="checked" />
	                                            <label for="welukaWpPostsSettingEqh"><?php _e('Align the same line block height', Weluka::$settings['plugin_name']); ?></label>
                                                <div class="help-block weluka-mgtop-xs"><?php _e('If you align the post block height and line set "Layout List" and "Row Column" responsive.', Weluka::$settings['plugin_name']); ?></div>
											</div>
											<?php //v1.2 addend ?>
                                            
                                            <div class="form-group">
                                            	<h5><?php _e('Row spacing (px)', Weluka::$settings['plugin_name']); ?></h5>
	                                        	<input id="welukaWpPostsSettingRowSpacing" name="welukaWpPostsSettingRowSpacing" type="text" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                            	<h5><?php _e('Odd Background Color', Weluka::$settings['plugin_name']); ?></h5>
                                                <div id="welukaWpPostsSettingOddBgColorWrap">
        										<!--input type="text" id="welukaWpPostsSettingOddBgColor" name="welukaWpPostsSettingOddBgColor" class="weluka-color-picker form-control" value="" /-->
                                                </div>
											</div>
                                            <div class="form-group">
                                            	<h5><?php _e('Even Background Color', Weluka::$settings['plugin_name']); ?></h5>
                                                <div id="welukaWpPostsSettingEvenBgColorWrap">
        										<!--input type="text" id="welukaWpPostsSettingEvenBgColor" name="welukaWpPostsSettingEvenBgColor" class="weluka-color-picker form-control" value="" /-->
                                                </div>
											</div>
                                        </div><!-- /.weluka-col-md-4 -->

                                    	<div class="weluka-col-md-8">
                                            <div id="weluka-wpposts-setting-media-design">
                                            	<h5><?php _e('Image Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_listmedia_column_settings('welukaWpPostsSettingMediaColWidth'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_align_settings('welukaWpPostsSettingMediaAlign'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
		                                                <?php $_builder->weluka_display_imgshape_settings('welukaWpPostsSettingMediaShape'); ?>
                                                    </div>
                                                </div>
                                                
                                                <?php //v1.2.3 modify and add ?>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-3">
                                                		<label><?php _e('Radius size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingMediaRadiusSize" name="welukaWpPostsSettingMediaRadiusSize" class="form-control weluka-normal-text" value="" />
                                                        <div class="weluka-mgtop-s help-block"><?php _e('Border-radius values for rounded corners.', Weluka::$settings['plugin_name']); ?></div>
													</div>
                                                	<div class="weluka-col-md-3">
														<label><?php _e('Border Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingMediaBorderSize" name="welukaWpPostsSettingMediaBorderSize" class="form-control weluka-normal-text" value="" />
													</div>
                                                    <div class="weluka-col-md-3">
                                                    	<?php $_builder->weluka_display_borderstyle_settings('welukaWpPostsSettingMediaBorderStyle'); ?>
                                                   	</div>
                                                    <div class="weluka-col-md-3">
														<label><?php _e('Border Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingMediaBorderColorWrap">
        												<!--input type="text" id="welukaWpPostsSettingMediaBorderColor" name="welukaWpPostsSettingMediaBorderColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php //v1.2.3 modify and add ?>
												<div class="weluka-row clearfix form-group">
													<div class="weluka-col-md-12">
														<label for="welukaImageSettingMediaLazyLoad"><?php _e('Lazy load', Weluka::$settings['plugin_name']); ?></label>
													</div>
													<div class="weluka-col-md-12">
														<input id="welukaWpPostsSettingMediaLazyLoad" name="welukaWpPostsSettingMediaLazyLoad" type="checkbox" value="1" /><label for="welukaWpPostsSettingMediaLazyLoad">&nbsp;&nbsp;<?php _e('I will lazy load the image to speed up the site.', Weluka::$settings['plugin_name']); ?>
														</label>
													</div>
												</div>
                                        	</div><!-- /#weluka-wpposts-setting-media-design -->

                                            <div id="weluka-wpposts-setting-title-design">
                                            	<h5><?php _e('Post Title Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_listtitle_htmltag_settings('welukaWpPostsSettingTitleTag'); ?>
                                                    </div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpPostsSettingTitleStyle', 'Title Style'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaWpPostsSettingTitleAlign'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingTitleFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingTitleFontSize" name="welukaWpPostsSettingTitleFontSize" class="form-control weluka-normal-text" value="" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Title Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingTitleColorWrap">
        												<!--input type="text" id="welukaWpPostsSettingTitleColor" name="welukaWpPostsSettingTitleColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
												</div>
                                            </div><!-- /title design -->

                                            <div id="weluka-wpposts-setting-meta-design">
                                            	<h5><?php _e('Meta Common Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaWpPostsSettingMetaAlign'); ?>
                                                    </div>
                                                </div>
 											</div><!-- /meta design -->

                                            <div id="weluka-wpposts-setting-date-design">
                                            	<h5><?php _e('Date Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpPostsSettingDateStyle', 'Date Style'); ?>
                                                    </div>
													<div class="weluka-col-md-8">
                                                    	<label><?php _e('date format (Ex Y-m-d h:i)', Weluka::$settings['plugin_name']); ?></label>
                                                		<input type="text" id="welukaWpPostsSettingDateFormat" name="welukaWpPostsSettingDateFormat" class="form-control weluka-normal-text" value="" />
                                                		<div class="weluka-mgtop-xs help-block"><?php _e('Please refer to the PHP date function for date format.', Weluka::$settings['plugin_name']); ?></div>
                                            		</div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingDateFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingDateFontSize" name="welukaWpPostsSettingDateFontSize" class="form-control weluka-normal-text" value="" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingDateColorWrap">
        												<!--input type="text" id="welukaWpPostsSettingDateColor" name="welukaWpPostsSettingDateColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
												</div>
											</div><!-- /date design -->

                                            <div id="weluka-wpposts-setting-category-design">
                                            	<h5><?php _e('Category Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpPostsSettingCategoryStyle', 'Category Style'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingCategoryFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingCategoryFontSize" name="welukaWpPostsSettingCategoryFontSize" class="form-control weluka-normal-text" value="" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingCategoryColorWrap">
        												<!--input type="text" id="welukaWpPostsSettingCategoryColor" name="welukaWpPostsSettingCategoryColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
												</div>
											</div><!-- /category design -->

                                            <div id="weluka-wpposts-setting-author-design">
                                            	<h5><?php _e('Author Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_wysiwig_button_settings('welukaWpPostsSettingAuthorStyle', 'Author Style'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingAuthorFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingAuthorFontSize" name="welukaWpPostsSettingAuthorFontSize" class="form-control weluka-normal-text" value="" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingAuthorColorWrap">
        												<!--input type="text" id="welukaWpPostsSettingAuthorColor" name="welukaWpPostsSettingAuthorColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
												</div>
											</div><!-- /author design -->

                                            <div id="weluka-wpposts-setting-content-design">
                                            	<h5><?php _e('Excerpt Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaWpPostsSettingContentAlign'); ?>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingContentFont'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Font Size (px)', Weluka::$settings['plugin_name']); ?></label>
        												<input type="text" id="welukaWpPostsSettingContentFontSize" name="welukaWpPostsSettingContentFontSize" class="form-control weluka-normal-text" value="" />
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Content Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingContentColorWrap">
        												<!--input type="text" id="welukaWpPostsSettingContentColor" name="welukaWpPostsSettingContentColor" class="weluka-color-picker form-control" value="" /-->
                                                        </div>
                                                    </div>
												</div>
											</div><!-- /content design -->

                                            <div id="weluka-wpposts-setting-morebutton-design">
                                            	<h5><?php _e('More Button Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaWpPostsSettingMoreButtonAlign'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingMoreButtonFont'); ?>
                                                    </div>
												</div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                  		<?php $_builder->weluka_display_buttoncolor_settings('welukaWpPostsSettingMoreButtonColor'); ?>
													</div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_buttonshape_settings('welukaWpPostsSettingMoreButtonShape'); ?>
													</div>
                                                    <div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_buttonsize_settings('welukaWpPostsSettingMoreButtonSize'); ?>
                                                		<input id="welukaWpPostsSettingMoreButtonBlock" name="welukaWpPostsSettingMoreButtonBlock" type="checkbox" value="1" />
                                                		<label for="welukaWpPostsSettingMoreButtonBlock"><?php _e('A button block size.', Weluka::$settings['plugin_name']); ?></label>
                                                    </div>
												</div>
											</div><!-- /more button design -->

                                            <div id="weluka-wpposts-setting-allbutton-design">
                                            	<h5><?php _e('All Button Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
                                                        <?php $_builder->weluka_display_align_settings('welukaWpPostsSettingAllButtonAlign'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_font_settings('welukaWpPostsSettingAllButtonFont'); ?>
                                                    </div>
												</div>
                                                <div class="weluka-row clearfix form-group">
                                                	<div class="weluka-col-md-4">
                                                  		<?php $_builder->weluka_display_buttoncolor_settings('welukaWpPostsSettingAllButtonColor'); ?>
													</div>
                                                	<div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_buttonshape_settings('welukaWpPostsSettingAllButtonShape'); ?>
													</div>
                                                    <div class="weluka-col-md-4">
                                                    	<?php $_builder->weluka_display_buttonsize_settings('welukaWpPostsSettingAllButtonSize'); ?>
                                                		<input id="welukaWpPostsSettingAllButtonBlock" name="welukaWpPostsSettingAllButtonBlock" type="checkbox" value="1" />
                                                		<label for="welukaWpPostsSettingAllButtonBlock"><?php _e('A button block size.', Weluka::$settings['plugin_name']); ?></label>
                                                    </div>
												</div>
											</div><!-- /all button design -->

											<?php //v1.2 add ?>
                                            <div id="weluka-wpposts-setting-block-design">
                                            	<h5><?php _e('Box Design Setting', Weluka::$settings['plugin_name']); ?></h5>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-4">
														<?php $_builder->weluka_display_blockstyle_settings('welukaWpPostsSettingBoxStyle'); ?>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Bg Color', Weluka::$settings['plugin_name']); ?></label>
                                                        <div id="welukaWpPostsSettingBoxStyleBgColorWrap"></div>
                                                    </div>
                                                    <div class="weluka-col-md-4">
														<label><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label>
	        											<select id="welukaWpPostsSettingBoxShape" name="welukaWpPostsSettingBoxShape" class="form-control">
        													<option value=""><?php _e('Square', Weluka::$settings['plugin_name']); ?></option>
        													<option value="img-rounded"><?php _e('Round', Weluka::$settings['plugin_name']); ?></option>
           												</select>
													</div> 
												</div>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-6">
                                                		<input id="welukaWpPostsSettingBoxStyleShadow" name="welukaWpPostsSettingBoxStyleShadow" type="checkbox" value="1" />
                                                		<label for="welukaWpPostsSettingBoxStyleShadow"><?php _e('Box Shadow?', Weluka::$settings['plugin_name']); ?></label>
                                                    </div>
                                                </div>
                                                <div class="weluka-row clearfix form-group">
                                                    <div class="weluka-col-md-12">
                                                    	<div class="help-block"><?php _e('If you want to Box Style, responsive List Layout is set.', Weluka::$settings['plugin_name']); ?></div>
                                                    </div>
                                                </div>
											</div><!-- /block design -->
											<?php //v1.2 addend ?>
    									</div><!-- /.weluka-col-md-8 -->
                                    </div>
                                </div><!-- /#weluka-wpposts-setting-panel-style -->
                    			<div id="weluka-wpposts-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaWpPostsSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaWpPostsSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpPosts'); ?>
                                    <?php $_builder->weluka_display_margin_setting('WpPosts'); ?>
									<?php $_builder->weluka_display_css_setting('WpPosts'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wpposts-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpPostsSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpPostsMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpPostsSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpPostsXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wpposts-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpposts-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpposts setting modal ?>

<?php
/**
 * wp rss dialog setting
 * @update
 * ver1.0.4
 * ver1.1.4
 * ver1.2
 */
?>
<div id="weluka-wprss-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wprssSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wprssSettingModalLabel" class="modal-title"><?php _e('Wordpress RSS Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wprss-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* TODO <li><a href="#weluka-wprss-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li> */ ?>
    					<li><a href="#weluka-wprss-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wprss-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wprss-setting-form" name="weluka-wprss-setting-form" role="form">
                    			<div id="weluka-wprss-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpRssSettingTitle" name="welukaWpRssSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpRssSettingUrl"><?php _e('RSS Feed Url', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpRssSettingUrl" name="welukaWpRssSettingUrl" class="form-control" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpRssSettingLimit"><?php _e('Show Limit', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpRssSettingLimit" name="welukaWpRssSettingLimit" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Please enter the number you want to display list.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Height (px)', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpRssSettingHeight" name="welukaWpRssSettingHeight" class="form-control weluka-normal-text" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('Scroll displayed if it exceeds the specified height.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                    	</div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Other.', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
												<input id="welukaWpRssSettingShowSummary" name="welukaWpRssSettingShowSummary" type="checkbox" value="1" />
	                                            <label for="welukaWpRssSettingShowSummary"><?php _e('Show Excerpt.', Weluka::$settings['plugin_name']); ?></label>
												<div class="weluka-mgtop-xs">
													<input id="welukaWpRssSettingShowAuthor" name="welukaWpRssSettingShowAuthor" type="checkbox" value="1" />
	                                            	<label for="welukaWpRssSettingShowAuthor"><?php _e('Show Author.', Weluka::$settings['plugin_name']); ?></label>
                                            	</div>
												<div class="weluka-mgtop-xs">
													<input id="welukaWpRssSettingShowDate" name="welukaWpRssSettingShowDate" type="checkbox" value="1" />
	                                            	<label for="welukaWpRssSettingShowDate"><?php _e('Show Date.', Weluka::$settings['plugin_name']); ?></label>
                                            	</div>
                                            </div>
                                    	</div>
                                    </div>

                        		</div><!-- /#weluka-wprss-setting-panel-general -->
                                <?php /* TODO
                    			<div id="weluka-wprss-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-4">
                                        	<label><?php _e('Registory Style', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                    	<div class="weluka-col-md-8">
		                                	<div class="form-group">
                                            </div>
    									</div>
                                    </div>
                                </div><!-- /#weluka-wprss-setting-panel-style -->
								*/ ?>
                    			<div id="weluka-wprss-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaWpRssSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaWpRssSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpRss'); ?>
									<?php $_builder->weluka_display_margin_setting('WpRss'); ?>
									<?php $_builder->weluka_display_css_setting('WpRss'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wprss-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpRssSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpRssMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpRssSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpRssXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wprss-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wprss-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wprss setting modal ?>

<?php
/**
 * wp search dialog setting
 * @update
 * ver1.0.4
 * ver1.2
 */
?>
<div id="weluka-wpsearch-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wpsearchSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wpsearchSettingModalLabel" class="modal-title"><?php _e('Wordpress Search Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wpsearch-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* TODO <li><a href="#weluka-wpsearch-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li> */ ?>
    					<li><a href="#weluka-wpsearch-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wpsearch-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wpsearch-setting-form" name="weluka-wpsearch-setting-form" role="form">
                    			<div id="weluka-wpsearch-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpSearchSettingTitle" name="welukaWpSearchSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-wpsearch-setting-panel-general -->
                                <?php /* TODO
                    			<div id="weluka-wpsearch-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-4">
                                        	<label><?php _e('Registory Style', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                    	<div class="weluka-col-md-8">
		                                	<div class="form-group">
                                            </div>
    									</div>
                                    </div>
                                </div><!-- /#weluka-wpsearch-setting-panel-style -->
								*/ ?>
                    			<div id="weluka-wpsearch-setting-panel-advanced" class="weluka-builder-settings-panel">
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpSearch'); ?>
									<?php $_builder->weluka_display_margin_setting('WpSearch'); ?>
									<?php $_builder->weluka_display_css_setting('WpSearch'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wpsearch-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpSearchSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpSearchMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpSearchSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpSearchXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wpsearch-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wpsearch-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wpsearch setting modal ?>

<?php
/**
 * wp tagcloud dialog setting
 * @update
 * ver1.0.4
 * ver1.2
 */
?>
<div id="weluka-wptags-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="wptagsSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="wptagsSettingModalLabel" class="modal-title"><?php _e('Wordpress Tag Cloud Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-wptags-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<?php /* TODO <li><a href="#weluka-wptags-setting-panel-style" class="weluka-a"><?php _e('List Style', Weluka::$settings['plugin_name']); ?></a></li> */ ?>
    					<li><a href="#weluka-wptags-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-wptags-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-wptags-setting-form" name="weluka-wptags-setting-form" role="form">
                    			<div id="weluka-wptags-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
                                	<div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-8">
                                                <input type="text" id="welukaWpTagsSettingTitle" name="welukaWpTagsSettingTitle" class="form-control" value="" />
                                                <div class="weluka-mgtop-xs help-block"><?php _e('If not input, the title does not appear.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                		<div class="weluka-row clearfix">
                                        	<div class="weluka-col-md-4"><label for="welukaWpTagsSettingTaxonomy"><?php _e('Taxonomy Type', Weluka::$settings['plugin_name']); ?></label></div>
											<div class="weluka-col-md-8">
		                                		<select id="welukaWpTagsSettingTaxonomy" name="welukaWpTagsSettingTaxonomy" class="form-control">
													<option value="post_tag"><?php _e('Tags', Weluka::$settings['plugin_name']); ?></option>
													<option value="category"><?php _e('Categories', Weluka::$settings['plugin_name']); ?></option>
												</select>
                                            </div>
                                        </div>
                                    </div>
                        		</div><!-- /#weluka-wptags-setting-panel-general -->
                                <?php /* TODO
                    			<div id="weluka-wptags-setting-panel-style" class="weluka-builder-settings-panel">
                                	<div class="weluka-row clearfix">
                                        <div class="weluka-col-md-4">
                                        	<label><?php _e('Registory Style', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                    	<div class="weluka-col-md-8">
		                                	<div class="form-group">
                                            </div>
    									</div>
                                    </div>
                                </div><!-- /#weluka-wptags-setting-panel-style -->
								*/ ?>
                    			<div id="weluka-wptags-setting-panel-advanced" class="weluka-builder-settings-panel">
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('WpTags'); ?>
									<?php $_builder->weluka_display_margin_setting('WpTags'); ?>
									<?php $_builder->weluka_display_css_setting('WpTags'); ?>
                        		</div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-wptags-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaWpTagsSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpTagsMd'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpTagsSm'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('WpTagsXs'); ?>
                                    </div>
                        		</div><!-- /#weluka-wptags-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-wptags-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end wptagcloud setting modal ?>

<?php
/**
 * modal dialog colum setting
 * @update
 * ver 1.0.4
 * ver 1.1.2
 * ver 1.1.4
 * ver 1.2
 */
?>
<div id="weluka-col-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="colSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="colSettingModalLabel" class="modal-title"><?php _e('Colum Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-col-setting-panel-advanced" class="active weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-col-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-col-setting-form" name="weluka-col-setting-form" role="form">
                    			<div id="weluka-col-setting-panel-advanced" class="weluka-panel-active weluka-builder-settings-panel">
                            		<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><strong><label for="welukaColSettingColumn"><?php _e('Column', Weluka::$settings['plugin_name']); ?></label></strong></div>
                                        	<div class="weluka-col-md-8">
		                                		<select id="welukaColSettingColumn" name="welukaColSettingColumn" class="form-control">
                                            		<?php for($c = 1 ; $c <= WelukaBuilder::MAX_COLUMN ; $c++) { ?>
	    		                                		<option value="<?php echo $c; ?>"><?php echo $c; ?></option>
 	                                               <?php } ?>
    	        	    	                    </select>
        	                                    <div class="weluka-mgtop-s"><?php _e('Please adjust so that it is up to 12 columns in a row.', Weluka::$settings['plugin_name']); ?></div>
            	                            </div>
                	                    </div>
  									</div>
									<?php $_builder->weluka_display_style_setting('Col'); ?>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaColSettingBoxShadowStyle' ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaColSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 add ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Col'); ?>
									<?php $_builder->weluka_display_margin_setting('Col', true, 'notmglr'); ?>
									<?php $_builder->weluka_display_css_setting('Col'); ?>
                                </div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-col-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaColSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('ColMd', true, 'notmglr'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<h5><?php _e('Column', Weluka::$settings['plugin_name']); ?></h5>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-12">
		                                		<select id="welukaColSmSettingColumn" name="welukaColSmSettingColumn" class="form-control">
	    		                                	<option value="none"></option>
                                            		<?php for($c = 1 ; $c <= WelukaBuilder::MAX_COLUMN ; $c++) { ?>
	    		                                		<option value="<?php echo $c; ?>"><?php echo $c; ?></option>
 	                                               <?php } ?>
    	        	    	                    </select>
        	                                    <div class="weluka-mgtop-s"><?php _e('Please adjust so that it is up to 12 columns in a row.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('ColSm', true, 'notmglr'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<h5><?php _e('Column', Weluka::$settings['plugin_name']); ?></h5>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-12">
		                                		<select id="welukaColXsSettingColumn" name="welukaColXsSettingColumn" class="form-control">
	    		                                	<option value="none"></option>
                                            		<?php for($c = 1 ; $c <= WelukaBuilder::MAX_COLUMN ; $c++) { ?>
	    		                                		<option value="<?php echo $c; ?>"><?php echo $c; ?></option>
 	                                               <?php } ?>
    	        	    	                    </select>
        	                                    <div class="weluka-mgtop-s"><?php _e('Please adjust so that it is up to 12 columns in a row.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('ColXs', true, 'notmglr'); ?>
                                    </div>
                        		</div><!-- /#weluka-col-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-col-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-col-setting-modal ?>

<?php
/**
 * modal dialog row setting
 * @update 1.0.4
 * ver 1.1.4
 * ver 1.2
 */
?>
<div id="weluka-row-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="rowSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="rowSettingModalLabel" class="modal-title"><?php _e('Row Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
                	<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-row-setting-panel-advanced" class="active weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-row-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>

        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-row-setting-form" name="weluka-row-setting-form" role="form">
                    			<div id="weluka-row-setting-panel-advanced" class="weluka-panel-active weluka-builder-settings-panel">
									<?php $_builder->weluka_display_style_setting('Row'); ?>
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaRowSettingBoxShadowStyle', false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaRowSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                    <?php //v1.2 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-4">
                                       		<input id="welukaRowSettingColhEq" name="welukaRowSettingColhEq" type="checkbox" value="1" /><label for="welukaRowSettingColhEq" style="margin-left:0.2em;"><?php _e('Distribute evenly in a row column', Weluka::$settings['plugin_name']); ?></label>
                                        </div>
                                        <div class="weluka-col-md-4">
											<label><?php _e('Content display position (vertical)', Weluka::$settings['plugin_name']); ?></label>
                                       		<select id="welukaRowSettingColValign" name="welukaRowSettingColValign" class="form-control">
    		            	    	        	<option value=""><?php _e('Top', Weluka::$settings['plugin_name']); ?></option>
    				                            <option value="center"><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
    				                            <option value="bottom"><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></option>
            	    	    	    	    </select>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Align the height and position (vertical) column responsive setting columns side by side with a does not apply.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                    <?php //v1.2 addend ?>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Row'); ?>
									<?php $_builder->weluka_display_margin_setting('Row', true, 'notmglr'); ?>
									<?php $_builder->weluka_display_css_setting('Row'); ?>
                                </div>
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-row-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaRowSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('RowMd', true, 'notmglr'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
 										<div class="form-group weluka-row clearfix">
                                        	<div class="weluka-col-md-4">
                                       			<input id="welukaRowSmSettingColhEq" name="welukaRowSmSettingColhEq" type="checkbox" value="1" /><label for="welukaRowSmSettingColhEq" style="margin-left:0.2em;"><?php _e('Distribute evenly in a row column', Weluka::$settings['plugin_name']); ?></label>
                                        	</div>
                                        	<div class="weluka-col-md-4">
												<label><?php _e('Content display position (vertical)', Weluka::$settings['plugin_name']); ?></label>
                                       			<select id="welukaRowSmSettingColValign" name="welukaRowSmSettingColValign" class="form-control">
    		            	    	        		<option value=""><?php _e('Top', Weluka::$settings['plugin_name']); ?></option>
    				                            	<option value="center"><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
    				                            	<option value="bottom"><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></option>
            	    	    	    	    	</select>
                                        	</div>
                                        </div>
                                    	<div class="weluka-row clearfix">
											<div class="weluka-col-md-12">
	                                       		<div class="help-block"><?php _e('Align the height and position (vertical) column responsive setting columns side by side with a does not apply.', Weluka::$settings['plugin_name']); ?></div>
                                        	</div>
                                    	</div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('RowSm', true, 'notmglr'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
 										<div class="form-group weluka-row clearfix">
                                        	<div class="weluka-col-md-4">
                                       			<input id="welukaRowXsSettingColhEq" name="welukaRowXsSettingColhEq" type="checkbox" value="1" /><label for="welukaRowXsSettingColhEq" style="margin-left:0.2em;"><?php _e('Distribute evenly in a row column', Weluka::$settings['plugin_name']); ?></label>
                                        	</div>
                                        	<div class="weluka-col-md-4">
												<label><?php _e('Content display position (vertical)', Weluka::$settings['plugin_name']); ?></label>
                                       			<select id="welukaRowXsSettingColValign" name="welukaRowXsSettingColValign" class="form-control">
    		            	    	        		<option value=""><?php _e('Top', Weluka::$settings['plugin_name']); ?></option>
    				                            	<option value="center"><?php _e('Center', Weluka::$settings['plugin_name']); ?></option>
    				                            	<option value="bottom"><?php _e('Bottom', Weluka::$settings['plugin_name']); ?></option>
            	    	    	    	    	</select>
                                        	</div>
                                        </div>
                                    	<div class="weluka-row clearfix">
											<div class="weluka-col-md-12">
	                                       		<div class="help-block"><?php _e('Align the height and position (vertical) column responsive setting columns side by side with a does not apply.', Weluka::$settings['plugin_name']); ?></div>
                                        	</div>
                                    	</div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('RowXs', true, 'notmglr'); ?>
                                    </div>
                        		</div><!-- /#weluka-row-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-row-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-row-setting-modal ?>

<?php
/*
 * section dialog img setting
 * @update
 * ver 1.0.4
 * ver 1.1
 * ver 1.1.4
 * ver 1.2
 */
?>
<div id="weluka-section-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="sectionSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="sectionSettingModalLabel" class="modal-title"><?php _e('Section Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
					<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-section-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-section-setting-panel-advanced" class="weluka-a"><?php _e('Advanced', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-section-setting-panel-responsive" class="weluka-a"><?php _e('Responsive', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-section-setting-form" name="weluka-section-setting-form" role="form">
                    			<div id="weluka-section-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">
									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label><?php _e('Container Width Type', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                            	<?php $_builder->weluka_display_containertype_settings('welukaSectionSettingContainerType', '', false); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php //v1.0.4 add ?>
									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label><?php _e('Container Height(vh)', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                       			<input type="text" id="welukaSectionSettingContainerHeight" name="welukaSectionSettingContainerHeight" value="" class="weluka-normal-text" style="display:inline-block;width:30%;" /> vh
                                                <div class="help-block"><?php _e('If you want to specify the container height, please enter from 1 to 100 (unit vh). 100vh is 100% with respect to the height of the Viewpoint.', Weluka::$settings['plugin_name']); ?></div>
                                                <div class="weluka-mgtop-m">
	                                                <input id="welukaSectionSettingFlexValign" name="welukaSectionSettingFlexValign" type="checkbox" value="on" /><label for="welukaSectionSettingFlexValign" style="margin-left:0.2em;"><?php _e('The central display of the container within the content to the container height.', Weluka::$settings['plugin_name']); ?></label>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php //v1.0.4 add ?>

                                    <!-- media input area -->
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label><?php _e('Background Type', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                       			<select id="welukaSectionSettingBgType" name="welukaSectionSettingBgType" class="form-control">
    		            	    	                <option value="none"><?php _e('None', Weluka::$settings['plugin_name']); ?></option>
    				                                <option value="image"><?php _e('Image', Weluka::$settings['plugin_name']); ?></option>
    				                                <option value="movie"><?php _e('Movie', Weluka::$settings['plugin_name']); ?></option>
            	    	    	    	        </select>
                                                
                                                <div class="weluka-settings-media-input-panel weluka-section-setting-image-item"><!-- background image area -->
                                                	<h5 class="weluka-mgtop-m"><?php _e('Background image', Weluka::$settings['plugin_name']); ?></h5>
 	                                           		<div id="weluka-section-setting-media-input-content"></div>

													<div class="form-group weluka-mgtop-m">
														<div class="weluka-row clearfix">
                                                    		<div class="weluka-col-md-3"><label><?php _e('Size', Weluka::$settings['plugin_name']); ?></label></div>
                        									<div class="weluka-col-md-9">
                                                        		<label><input type="radio" id="welukaSectionSettingBgSizeType_0" name="welukaSectionSettingBgSizeType" value="num" />&nbsp;<?php _e('Size Input', Weluka::$settings['plugin_name']); ?></label>&nbsp;
	                        									<label><input type="radio" id="welukaSectionSettingBgSizeType_1" name="welukaSectionSettingBgSizeType" value="cover" />&nbsp;<?php _e('Cover', Weluka::$settings['plugin_name']); ?></label>&nbsp;
    	                    									<label><input type="radio" id="welukaSectionSettingBgSizeType_2" name="welukaSectionSettingBgSizeType" value="contain" />&nbsp;<?php _e('Contain', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
        	                                            		<input type="text" id="welukaSectionSettingBgSize" name="welukaSectionSettingBgSize" style="width:100px;display:inline;" />
            	                                                <div class="weluka-mgtop-xs help-block">
                	                                            	<?php _e('If you specify the [Size Input], Please enter width and height. (Example) 50% 50%', Weluka::$settings['plugin_name']); ?>
                    	                                        </div>
                        	                                </div>
                                                    	</div>
                                                	</div>
													<div class="form-group">
														<div class="weluka-row clearfix">
                                                    		<div class="weluka-col-md-3"><label><?php _e('Position', Weluka::$settings['plugin_name']); ?></label></div>
                        									<div class="weluka-col-md-9">
                                                    			<input type="text" id="welukaSectionSettingBgPos" name="welukaSectionSettingBgPos" class="form-control" />
                                                            	<div class="weluka-mgtop-xs help-block">
                                                            		<?php _e('(Example) 50% 50%', Weluka::$settings['plugin_name']); ?>
                                                            	</div>
                                                        	</div>
                                                    	</div>
                                                	</div>
													<div class="form-group">
														<div class="weluka-row clearfix">
                                                    		<div class="weluka-col-md-3"><label><?php _e('Repeat', Weluka::$settings['plugin_name']); ?></label></div>
                        									<div class="weluka-col-md-9">
                                                        		<label><input type="radio" id="welukaSectionSettingBgRepeat_0" name="welukaSectionSettingBgRepeat" value="no-repeat" />&nbsp;<?php _e('No Repeat', Weluka::$settings['plugin_name']); ?></label>&nbsp;
	                        									<label><input type="radio" id="welukaSectionSettingBgRepeat_1" name="welukaSectionSettingBgRepeat" value="repeat" />&nbsp;<?php _e('Repeat', Weluka::$settings['plugin_name']); ?></label>&nbsp;
    	                    									<label><input type="radio" id="welukaSectionSettingBgRepeat_2" name="welukaSectionSettingBgRepeat" value="repeat-x" />&nbsp;<?php _e('Repeat X', Weluka::$settings['plugin_name']); ?></label>&nbsp;
        	                									<label><input type="radio" id="welukaSectionSettingBgRepeat_3" name="welukaSectionSettingBgRepeat" value="repeat-y" />&nbsp;<?php _e('Repeat Y', Weluka::$settings['plugin_name']); ?></label>
            	                                            </div>
                	                                    </div>
                    	                            </div>
													<div class="form-group">
														<div class="weluka-row clearfix">
                                    	                	<div class="weluka-col-md-3"><label><?php _e('Attachment', Weluka::$settings['plugin_name']); ?></label></div>
                        									<div class="weluka-col-md-9">
                                            	            	<label><input type="radio" id="welukaSectionSettingBgAttachment_0" name="welukaSectionSettingBgAttachment" value="scroll" />&nbsp;<?php _e('Scroll', Weluka::$settings['plugin_name']); ?></label>&nbsp;
                        										<label><input type="radio" id="welukaSectionSettingBgAttachment_1" name="welukaSectionSettingBgAttachment" value="fixed" />&nbsp;<?php _e('Fixed', Weluka::$settings['plugin_name']); ?></label>
                                                    	    </div>
                                                    	</div>
                                                	</div>
                                                </div><!-- /.weluka-section-setting-bgimage-item -->
                                                
                                                <div class="weluka-settings-media-input-panel weluka-section-setting-movie-item">
                                                	<h5 class="weluka-mgtop-m"><?php _e('Background movie', Weluka::$settings['plugin_name']); ?></h5>
                                                    <div class="weluka-row form-group clearfix">
                                                    	<div class="weluka-col-md-2"><label><?php _e('Mp4', Weluka::$settings['plugin_name']); ?></label></div>
                                                        <div class="weluka-col-md-10">
                                                        	<input type="text" id="welukaSectionSettingMovieMp4_url" name="welukaSectionSettingMovieMp4_url" value="" class="weluka-normal-text" />
	                                                    	<button type="button" data-type="section" data-media-target="section" data-target-prefix="Mp4" data-idfield="#welukaSectionSettingMovieMp4_attachment_id" class="single-movie-btn weluka-btn weluka-btn-org weluka-btn-info btn-xs"><?php _e('Select Movie', Weluka::$settings['plugin_name']); ?></button>
                                                            &nbsp;<button type="button" data-prefix="welukaSectionSettingMovieMp4" class="section-bgmovie-remove weluka-btn weluka-btn-org weluka-btn-warning btn-xs"><?php _e('Remove', Weluka::$settings['plugin_name']); ?></button>

                                                        	<input type="hidden" id="welukaSectionSettingMovieMp4_attachment_id" name="welukaSectionSettingMovieMp4_attachment_id" value="" />
                                                        	<input type="hidden" id="welukaSectionSettingMovieMp4_width" name="welukaSectionSettingMovieMp4_width" value="" />
                                                        	<input type="hidden" id="welukaSectionSettingMovieMp4_height" name="welukaSectionSettingMovieMp4_height" value="" />
                                                        	<input type="hidden" id="welukaSectionSettingMovieMp4_mime" name="welukaSectionSettingMovieMp4_mime" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="weluka-row form-group clearfix">
                                                    	<div class="weluka-col-md-2"><label><?php _e('Webm', Weluka::$settings['plugin_name']); ?></label></div>
                                                        <div class="weluka-col-md-10">
                                                        	<input type="text" id="welukaSectionSettingMovieWebm_url" name="welukaSectionSettingMovieWebm_url" value="" class="weluka-normal-text" />
	                                                    	<button type="button" data-type="section" data-media-target="section" data-target-prefix="Webm" data-idfield="#welukaSectionSettingMovieWebm_attachment_id" class="single-movie-btn weluka-btn weluka-btn-org weluka-btn-info btn-xs"><?php _e('Select Movie', Weluka::$settings['plugin_name']); ?></button>
                                                            &nbsp;<button type="button" data-prefix="welukaSectionSettingMovieWebm" class="section-bgmovie-remove weluka-btn weluka-btn-org weluka-btn-warning btn-xs"><?php _e('Remove', Weluka::$settings['plugin_name']); ?></button>
                                                        	<input type="hidden" id="welukaSectionSettingMovieWebm_attachment_id" name="welukaSectionSettingMovieWebm_attachment_id" value="" />
                                                        	<input type="hidden" id="welukaSectionSettingMovieWebm_width" name="welukaSectionSettingMovieWebm_width" value="" />
                                                        	<input type="hidden" id="welukaSectionSettingMovieWebm_height" name="welukaSectionSettingMovieWebm_height" value="" />
                                                        	<input type="hidden" id="welukaSectionSettingMovieWebm_mime" name="welukaSectionSettingMovieWebm_mime" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="weluka-row form-group clearfix">
                                                    	<div class="weluka-col-md-2"><label><?php _e('Poster', Weluka::$settings['plugin_name']); ?></label></div>
                                                        <div class="weluka-col-md-10">
															<div id="weluka-section-setting-poster-input-content"></div>
															<div id="weluka-section-setting-poster-input-content-att" style="display:none;" class="weluka-mgtop-xs"><?php _e('Nothing is displayed at the first view unless you set the poster.', Weluka::$settings['plugin_name']); ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="weluka-row form-group clearfix weluka-mgtop-s">
                                                        <div class="weluka-col-md-12">
															<div class="weluka-mgtop-s"><?php _e('Displays for Smartphone (less than 768px)', Weluka::$settings['plugin_name']); ?></div>
															<div class="weluka-mgtop-xs">
																<label><input id="welukaSectionSettingMovieSpHide_default" name="welukaSectionSettingMovieSpHide" type="radio" value="" />&nbsp;<?php _e('Non-select', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
																<label><input id="welukaSectionSettingMovieSpHide" name="welukaSectionSettingMovieSpHide" type="radio" value="on" />&nbsp;<?php _e('Only Poster image', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;
																<label><input id="welukaSectionSettingMovieSpHide_control" name="welukaSectionSettingMovieSpHide" type="radio" value="control" />&nbsp;<?php _e('Poster image & control button', Weluka::$settings['plugin_name']); ?></label>&nbsp;
															</div>
                                                        </div>
                                                    </div>
												</div><!-- /.weluka-section-setting-bgmovie-item -->
                                            </div>
                                        </div>
  									</div>

  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label><?php _e('Background Overlay', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                            	<div id="welukaSectionSettingBgOverlayColorWrap"></div>
                                            </div>
                                        </div>
  									</div>

  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label for="welukaSectionSettingBgColor"><?php _e('BG Color', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                            	<div id="welukaSectionSettingBgColorWrap">
                                            	<!--input type="text" id="welukaSectionSettingBgColor" name="welukaSectionSettingBgColor" class="weluka-color-picker form-control" value="" /-->
                                                </div>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label for="welukaSectionSettingColor"><?php _e('Font Color', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                            	<div id="welukaSectionSettingColorWrap">
                                            	<!--input type="text" id="welukaSectionSettingColor" name="welukaSectionSettingColor" class="weluka-color-picker form-control" value="" /-->
                                                </div>
                                            </div>
                                        </div>
  									</div>
  									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-3"><label for="welukaSectionSettingColor"><?php _e('Anchor', Weluka::$settings['plugin_name']); ?></label></div>
                                            <div class="weluka-col-md-9">
                                            	<input type="text" id="welukaSectionSettingAnchor" name="welukaSectionSettingAnchor" class="form-control" />
                                            </div>
                                        </div>
  									</div>
                        		</div><!-- /#weluka-section-setting-panel-general -->
                    			<div id="weluka-section-setting-panel-advanced" class="weluka-builder-settings-panel">
                                	<?php //v1.1.4 add ?>
									<div class="weluka-row clearfix form-group">
                                        <div class="weluka-col-md-3">
                                        	<?php $_builder->weluka_display_boxshadowstyle_settings( 'welukaSectionSettingBoxShadowStyle', false ); ?>
                                        </div>
                                        <div class="weluka-col-md-3">
											<label><?php _e('Box Shadow Color', Weluka::$settings['plugin_name']); ?></label>
											<div id="welukaSectionSettingBoxShadowColorWrap"></div>
                                        </div>
									</div>
                                    <div class="weluka-row clearfix weluka-mgbottom-m">
										<div class="weluka-col-md-12">
	                                       	<div class="help-block"><?php _e('Shadow box [Bottom Pattern2], [Bottom Pettern3], [Top Bottom],[Left Bottom] is not enabled if you like box shadow has been set, if the <strong>background color</strong> is set to the <strong>parent element (Section, Row and Colum, etc.)</strong> Please note. And some Padding top and bottom, setting up this box shadow height setting and appropriate.Sure to set the background color for the box.', Weluka::$settings['plugin_name']); ?></div>
                                        </div>
                                    </div>
                                	<?php //v1.1.4 addend ?>
                                    <?php //v1.2 add ?>
									<?php $_builder->weluka_display_animation_setting('Section'); ?>
									<?php $_builder->weluka_display_margin_setting('Section', true, 'notmglr'); ?>
									<?php $_builder->weluka_display_css_setting('Section'); ?>
									<?php //TODO responsive and animation ?>
                        		</div><!-- /#weluka-section-setting-panel-advanced -->
                                <?php //v1.0.4 add ?>
                    			<div id="weluka-section-setting-panel-responsive" class="weluka-builder-settings-panel">
                                    <?php $_builder->weluka_display_responsive_hide_settings('welukaSectionSettingDisplayHide'); ?>
                                    
                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Medium View(992px - 1199px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<h5><?php _e('Container Height(vh)', Weluka::$settings['plugin_name']); ?></h5>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-12">
                                       			<input type="text" id="welukaSectionMdSettingContainerHeight" name="welukaSectionMdSettingContainerHeight" value="" class="weluka-normal-text" style="display:inline-block;width:30%;" /> vh
                                                <div class="help-block"><?php _e('Specifies the container height and if you want a 1-fill in the 100 (vh unit). 100 vh whereas the height of Viewpoint, and 100%. Enter <strong>auto</strong> if you want to clear the height being taken over.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SectionMd', true, 'notmglr'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('Small View(768px - 991px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<h5><?php _e('Container Height(vh)', Weluka::$settings['plugin_name']); ?></h5>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-12">
                                       			<input type="text" id="welukaSectionSmSettingContainerHeight" name="welukaSectionSmSettingContainerHeight" value="" class="weluka-normal-text" style="display:inline-block;width:30%;" /> vh
                                                <div class="help-block"><?php _e('Specifies the container height and if you want a 1-fill in the 100 (vh unit). 100 vh whereas the height of Viewpoint, and 100%. Enter <strong>auto</strong> if you want to clear the height being taken over.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SectionSm', true, 'notmglr'); ?>
                                    </div>

                                    <div class="weluka-mgtop-l" style="font-weight:500; font-size:1.3em;color:#202020;"><?php _e('XSmall View(Less than 768px)' , Weluka::$settings['plugin_name']); ?></div>
                                    <div class="weluka-mgtop-l">
										<h5><?php _e('Container Height(vh)', Weluka::$settings['plugin_name']); ?></h5>
 										<div class="form-group weluka-row clearfix">
                                            <div class="weluka-col-md-12">
                                       			<input type="text" id="welukaSectionXsSettingContainerHeight" name="welukaSectionXsSettingContainerHeight" value="" class="weluka-normal-text" style="display:inline-block;width:30%;" /> vh
                                                <div class="help-block"><?php _e('Specifies the container height and if you want a 1-fill in the 100 (vh unit). 100 vh whereas the height of Viewpoint, and 100%. Enter <strong>auto</strong> if you want to clear the height being taken over.', Weluka::$settings['plugin_name']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="weluka-mgtop-l">
										<?php $_builder->weluka_display_margin_setting('SectionXs', true, 'notmglr'); ?>
                                    </div>
                        		</div><!-- /#weluka-section-setting-panel-responsive -->
                                <?php //v1.0.4 addend ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-section-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end section setting modal ?>

<?php
/**
 * page setting dialog img setting
 * @since 1.0
 * @update
 * ver1.0.1
 * ver1.0.3
 * ver1.1.4
 * ver1.2.3
 * tab nav add
 */
?>
<div id="weluka-page-setting-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="pageSettingModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="pageSettingModalLabel" class="modal-title"><?php _e('Page Setting', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
                	<?php //v1.2.3 nav add ?>
                	<ul class="weluka-modal-nav-tab nav nav-tabs clearfix">
    					<li><a href="#weluka-page-setting-panel-general" class="active weluka-a"><?php _e('General', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-page-setting-panel-css" class="weluka-a"><?php _e('Css', Weluka::$settings['plugin_name']); ?></a></li>
    					<li><a href="#weluka-page-setting-panel-js" class="weluka-a"><?php _e('JavaScript', Weluka::$settings['plugin_name']); ?></a></li>
    				</ul>
                	<?php //v1.2.3 nav add ?>

        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-page-setting-form" name="weluka-page-setting-form" role="form">

                    			<div id="weluka-page-setting-panel-general" class="weluka-panel-active weluka-builder-settings-panel">

									<?php $welukaTheme = class_exists( 'WelukaTheme', false );?>
                                	<h5><?php _e('Seo Setting', Weluka::$settings['plugin_name']); ?></h5>
									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Title', Weluka::$settings['plugin_name']); ?></label></div>
                                        	<div class="weluka-col-md-8">
                                            	<?php /* v1.0.3 <input type="text" id="welukaPageSettingSeoTitle" name="welukaPageSettingSeoTitle" class="form-control" value="<?php echo esc_attr( get_the_title() ); ?>" /> */ ?>
                                            	<input type="text" id="welukaPageSettingSeoTitle" name="welukaPageSettingSeoTitle" class="form-control" placeholder="<?php echo esc_attr( get_the_title() ); ?>" />
                                        	</div>
                                    	</div>
                                	</div>
									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('Keywords', Weluka::$settings['plugin_name']); ?></label></div>
                                        	<div class="weluka-col-md-8">
                                            	<input type="text" id="welukaPageSettingSeoKeywords" name="welukaPageSettingSeoKeywords" class="form-control" placeholder="<?php _e('Keyword1,keyword2, ...', Weluka::$settings['plugin_name']); ?>" />
	                                            <div class="weluka-mgtop-s help-block"><?php _e('Please enter a keyword in a comma-delimited.', Weluka::$settings['plugin_name']); ?></div>
    	                                    </div>
        	                            </div>
            	                    </div>
									<div class="form-group">
										<div class="weluka-row clearfix">
											<div class="weluka-col-md-4"><label><?php _e('description', Weluka::$settings['plugin_name']); ?></label></div>
                            	            <div class="weluka-col-md-8">
	                            	            <textarea id="welukaPageSettingSeoDescription" name="welukaPageSettingSeoDescription" class="form-control" rows="3"></textarea>
                                    	    </div>
	                                    </div>
    	                            </div>
									
									<?php if( $welukaTheme ) { ?>
                                	
                                    	<h5 class="weluka-mgtop-m"><?php _e('Page Layout', Weluka::$settings['plugin_name']); ?></h5>
										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('One page?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                                        			<input id="welukaPageSettingOnepage" name="welukaPageSettingOnepage" type="checkbox" value="1" />
                                            		<label for="welukaPageSettingOnepage"><?php _e('This page I want to one-page form.', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
                                		</div>
										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Hide Header?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                                        			<input id="welukaPageSettingHideHd" name="welukaPageSettingHideHd" type="checkbox" value="1" />
                                            		<label for="welukaPageSettingHideHd"><?php _e('Hide page header in this page.', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
                                		</div>
										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Hide Footer?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                                        			<input id="welukaPageSettingHideFt" name="welukaPageSettingHideFt" type="checkbox" value="1" />
                                            		<label for="welukaPageSettingHideFt"><?php _e('Hide page footer in this page.', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
                                		</div>
										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Hide Sidebar Main?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                                        			<input id="welukaPageSettingHideSideMain" name="welukaPageSettingHideSideMain" type="checkbox" value="1" />
                                            		<label for="welukaPageSettingHideSideMain"><?php _e('Hide sidebar main in this page.', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
                                		</div>
										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Hide Sidebar Sub?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                                        			<input id="welukaPageSettingHideSideSub" name="welukaPageSettingHideSideSub" type="checkbox" value="1" />
                                            		<label for="welukaPageSettingHideSideSub"><?php _e('Hide sidebar sub in this page.', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
                                		</div>

										<?php //ver1.0.1 ?>
                                        <div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Show Sidebar Main?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                                        			<input id="welukaPageSettingShowSideMain" name="welukaPageSettingShowSideMain" type="checkbox" value="1" />
                                            		<label for="welukaPageSettingShowSideMain"><?php _e('Show sidebar main in this page.', Weluka::$settings['plugin_name']); ?></label>

                                            		<div>
	                                                    <label for="welukaPageSettingShowSideMainPlace"><?php _e('Sidebar main place : ', Weluka::$settings['plugin_name']); ?></label>
    	                                    			<select id="welukaPageSettingShowSideMainPlace" name="welukaPageSettingShowSideMainPlace" style="display:inline-block;width:90px;">
        	                                            	<option value=""></option>
            	                                        	<option value="left"><?php _e('Left', Weluka::$settings['plugin_name']); ?></option>
                	                                    	<option value="right"><?php _e('Right', Weluka::$settings['plugin_name']); ?></option>
                    	                                </select>
                                                    </div>
			                                        <div class="help-block"><?php _e("When you'd like to show a side bar to a target page compulsorily when choosing a side bar pear layout by layout setting, please check this.", Weluka::$settings['plugin_name']); ?></div>
                                        		</div>
                                    		</div>
                                		</div>
										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Show Sidebar Sub?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                                        			<input id="welukaPageSettingShowSideSub" name="welukaPageSettingShowSideSub" type="checkbox" value="1" />
                                            		<label for="welukaPageSettingShowSideSub"><?php _e('Show sidebar sub in this page.', Weluka::$settings['plugin_name']); ?></label>
                                        			<div class="help-block"><?php _e("When you'd like to show a side bar to a target page compulsorily when choosing a side bar pear layout by layout setting, please check this.", Weluka::$settings['plugin_name']); ?></div>
                                        		</div>
                                    		</div>
                                		</div>
                                        <?php //ver1.0.1 addend ?>

										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Use Page Header', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                       								<?php  $_builder->weluka_display_cpt_settings('welukaPageSettingPageHd', Weluka::$settings['cpt_hd'], '', false); ?>
                                        			<div class="weluka-mgtop-m help-block">
                                        				<?php _e('Please select if you want to change the header to be used in this page.', Weluka::$settings['plugin_name']); ?>
                                        			</div>
                                        		</div>
                                    		</div>
                                		</div>

										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Use Page Footer', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                       								<?php  $_builder->weluka_display_cpt_settings('welukaPageSettingPageFt', Weluka::$settings['cpt_ft'], '', false); ?>
                                        			<div class="weluka-mgtop-m help-block">
                                        				<?php _e('Please select if you want to change the footer to be used in this page.', Weluka::$settings['plugin_name']); ?>
                                        			</div>
                                        		</div>
                                    		</div>
                                		</div>

										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Use Sidebar Main', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                       								<?php  $_builder->weluka_display_cpt_settings('welukaPageSettingSideMain', Weluka::$settings['cpt_sd'], '', false); ?>
                                        			<div class="weluka-mgtop-m help-block">
                                        				<?php _e('Please select if you want to change the main sidebar to be used in this page.', Weluka::$settings['plugin_name']); ?>
                                        			</div>
                                        		</div>
                                    		</div>
                                		</div>

										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Use Sidebar Sub', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                       								<?php  $_builder->weluka_display_cpt_settings('welukaPageSettingSideSub', Weluka::$settings['cpt_sd'], '', false); ?>
                                        			<div class="weluka-mgtop-m help-block">
                                        				<?php _e('Please select if you want to change the sub-side bar to be used in this page. (Right sidebar in the case of a 3 column)', Weluka::$settings['plugin_name']); ?>
                                        			</div>
                                        		</div>
                                    		</div>
                                		</div>                               			
                                		<h5 class="weluka-mgtop-m"><?php _e('Content Setting', Weluka::$settings['plugin_name']); ?></h5>
										<?php //v1.2.7 modifiy label hide -> show ?>
										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Show Post Title?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                        							<label><input type="radio" id="welukaPageSettingHideTitle_0" name="welukaPageSettingHideTitle" value="0" />&nbsp;<?php _e('Show', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        							<label><input type="radio" id="welukaPageSettingHideTitle_1" name="welukaPageSettingHideTitle" value="1" />&nbsp;<?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
                                		</div>
                                        <?php //v1.0.3 add ?>
										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Eye-catching image?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                        							<label><input type="radio" id="welukaPageSettingHideEyecatch_null" name="welukaPageSettingHideEyecatch" value="-1" />&nbsp;<?php _e('Non-select', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        							<label><input type="radio" id="welukaPageSettingHideEyecatch_1" name="welukaPageSettingHideEyecatch" value="1" />&nbsp;<?php _e('Show', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        							<label><input type="radio" id="welukaPageSettingHideEyecatch_0" name="welukaPageSettingHideEyecatch" value="0" />&nbsp;<?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                                                    <div class="weluka-mgtop-s">
                                                    	<label for="selectit"><?php _e('Alignment', Weluka::$settings['plugin_name']); ?></label>
                            							<span style="margin-left:1em;"><?php $_builder->weluka_display_align_settings('welukaPageSettingEyecatchAlign', '', false, true, '', true); ?></span>
													</div>
                                                    <div>
                            							<label for="selectit"><?php _e('Shape', Weluka::$settings['plugin_name']); ?></label>
                            							<span style="margin-left:1em;"><?php $_builder->weluka_display_imgshape_settings('welukaPageSettingEyecatchShape', '', false, true, '', true); ?></span>
                                                    </div>
                                                    <div>
                                                        <label><?php _e('I will full width display in the block.', Weluka::$settings['plugin_name']); ?></label>
                        								<label><input type="radio" id="welukaPageSettingEyecatchFitwidth_null" name="welukaPageSettingEyecatchFitwidth" value="-1" />&nbsp;<?php _e('Non-select', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        								<label><input type="radio" id="welukaPageSettingEyecatchFitwidth_on" name="welukaPageSettingEyecatchFitwidth" value="on" />&nbsp;<?php _e('Enabled', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        								<label><input type="radio" id="welukaPageSettingEyecatchFitwidth_off" name="welukaPageSettingEyecatchFitwidth" value="off" />&nbsp;<?php _e('Disabled', Weluka::$settings['plugin_name']); ?></label>                                                        
                                                    </div>
                                        		</div>
                                    		</div>
                                		</div>
										<?php //v1.0.3 addend ?>
										<div class="form-group">
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Show Post Meta?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                        							<label><input type="radio" id="welukaPageSettingHidePostMeta_0" name="welukaPageSettingHidePostMeta" value="0" />&nbsp;<?php _e('Show', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        							<label><input type="radio" id="welukaPageSettingHidePostMeta_1" name="welukaPageSettingHidePostMeta" value="1" />&nbsp;<?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
											<?php //v1.2.7 add ?>
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e( 'Title and meta align(vertical)', Weluka::$settings['plugin_name'] ); ?></label></div>
												<div class="weluka-col-md-8">
													<?php $_builder->weluka_display_align_settings('welukaPageSettingTitleAlign', '', false, true, '', true); ?>
												</div>
											</div>
                                            <?php //v1.2.7 addend ver1.0.1 add ?>
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Show Post Tagcloud?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                        							<label><input type="radio" id="welukaPageSettingHidePostTagcloud_null" name="welukaPageSettingHidePostTagcloud" value="-1" />&nbsp;<?php _e('Non-select', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        							<label><input type="radio" id="welukaPageSettingHidePostTagcloud_0" name="welukaPageSettingHidePostTagcloud" value="0" />&nbsp;<?php _e('Show', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        							<label><input type="radio" id="welukaPageSettingHidePostTagcloud_1" name="welukaPageSettingHidePostTagcloud" value="1" />&nbsp;<?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Tagcloud position', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                                        	     <div>
													<label><?php _e('Vertical', Weluka::$settings['plugin_name']); ?></label>
                       								<?php  $_builder->weluka_display_tagcloud_pos_settings('welukaPageSettingTagcloudPos', '', false); ?>
												  </div>
												  <div class="weluka-mgtop-s">
													<label><?php _e('Horizontal', Weluka::$settings['plugin_name']); ?></label>
													<?php $_builder->weluka_display_align_settings('welukaPageSettingTagcloudAlignPos', '', false, true, '', true); ?>
												 </div>
                                        		</div>
                                    		</div>
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Show Post Paging link?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                        							<label><input type="radio" id="welukaPageSettingHidePostPaging_null" name="welukaPageSettingHidePostPaging" value="-1" />&nbsp;<?php _e('Non-select', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        							<label><input type="radio" id="welukaPageSettingHidePostPaging_0" name="welukaPageSettingHidePostPaging" value="0" />&nbsp;<?php _e('Show', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        							<label><input type="radio" id="welukaPageSettingHidePostPaging_1" name="welukaPageSettingHidePostPaging" value="1" />&nbsp;<?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
											<?php
											// v1.2.9.6 modify
                                            //$yoast_option = get_option( 'wpseo_internallinks' );
                                            
                                            $yoast_breadcrumb_enable = is_callable( 'WPSEO_Options::get' ) ? WPSEO_Options::get( 'breadcrumbs-enable' ) : false;
											$yoast_option            = get_option( 'wpseo_internallinks' ) ? get_option( 'wpseo_internallinks' ) : $yoast_breadcrumb_enable;
											if ( ! is_array( $yoast_option ) ) {
												unset( $yoast_option );
												$yoast_option = array( 'breadcrumbs-enable' => $yoast_breadcrumb_enable );
											}
											// v1.2.9.6 modify end

											//v1.1.4 modify if ( function_exists('yoast_breadcrumb') && $yoast_option['breadcrumbs-enable'] ) {
											if ( ( function_exists('yoast_breadcrumb') && $yoast_option['breadcrumbs-enable'] ) || function_exists( 'bcn_display' ) ) { ?>
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Hide Breadcrumb?', Weluka::$settings['plugin_name']); ?></label></div>
                                        		<div class="weluka-col-md-8">
                        							<label><input type="radio" id="welukaPageSettingHideBreadcrumb_0" name="welukaPageSettingHideBreadcrumb" value="0" />&nbsp;<?php _e('Show', Weluka::$settings['plugin_name']); ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        							<label><input type="radio" id="welukaPageSettingHideBreadcrumb_1" name="welukaPageSettingHideBreadcrumb" value="1" />&nbsp;<?php _e('Hide', Weluka::$settings['plugin_name']); ?></label>
                                        		</div>
                                    		</div>
											<?php } ?>
                                            
											<div class="weluka-row clearfix">
												<div class="weluka-col-md-4"><label><?php _e('Outside the builder contents The container type', Weluka::$settings['plugin_name']); ?></label></div>
                                            	<div class="weluka-col-md-8">
                                            		<?php $_builder->weluka_display_containertype_settings('welukaPageSettingOutsideContainerType', '', false, true, false); ?>
                                                    <div class="weluka-mgtop-m help-block">
                                        				<?php _e("Builder outside of contents (the page title, comment and META, etc.)  Please establish the container type. I'd like to show this setting to the page title by a fixed width container by a full width container. Or it's used for its reverse occasion.", Weluka::$settings['plugin_name']); ?>
                                        			</div>
	                                            </div>
    	                                    </div>
                                            <?php //ver1.0.1 addend ?>
                                		</div>
                                        <div class="weluka-mgtop-m help-block">
                                        	<?php _e('If you change the [page layout] or [content] settings, please re-load it to save time.', Weluka::$settings['plugin_name']); ?>
                                        </div>
                                <?php } // endif( $welukaTheme ) ?>
                                </div><?php //end #weluka-page-setting-panel-general ?>
                                
                                <div id="weluka-page-setting-panel-css" class="weluka-builder-settings-panel">
 									<div class="form-group weluka-row clearfix">
                                        <div class="weluka-col-md-12">                                            
                                            <div class="help-block"><?php _e('Add the css you want to add to this page only.', Weluka::$settings['plugin_name']); ?></div>
	                            	        <textarea id="welukaPageSettingCssCode" name="welukaPageSettingCssCode" class="form-control" rows="15"></textarea>
                                        </div>
                                    </div>
								</div><?php //end #weluka-page-setting-panel-css ?>

                                <div id="weluka-page-setting-panel-js" class="weluka-builder-settings-panel">
 									<div class="form-group weluka-row clearfix">
                                        <div class="weluka-col-md-12">
                                            <div class="help-block weluka-mgbottom-m"><?php _e('Add a JavaScript to add on this page only. When editing a builder does not run.', Weluka::$settings['plugin_name']); ?></div>
                                            <h5><?php _e('head tag code', Weluka::$settings['plugin_name']); ?></h5>
	                            	        <textarea id="welukaPageSettingJsCodeHd" name="welukaPageSettingJsCodeHd" class="form-control" rows="10"></textarea>
                                            <h5 class="weluka-mgtop-s"><?php _e('close body tag before adding code', Weluka::$settings['plugin_name']); ?></h5>
	                            	        <textarea id="welukaPageSettingJsCodeFt" name="welukaPageSettingJsCodeFt" class="form-control" rows="10"></textarea>
                                        </div>
                                    </div>
								</div><?php //end #weluka-page-setting-panel-js ?>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-page-setting" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('Save', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Close', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end page setting modal ?>

<?php
/**
 * modal dialog copy
 * @since 1.0.7
 */
?>
<div id="weluka-copy-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="copyModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="copyModalLabel" class="modal-title"><?php _e('Copy', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-copy-form" name="weluka-copy-form" role="form">
                            	<div class="weluka-row form-group clearfix">
                                	<div class="weluka-col-md-12">
                                    	<h5><?php _e('Please select the copy mode.', Weluka::$settings['plugin_name']) ?></h5>
                                    	<label style="margin-right:8px;"><input type="radio" id="welukaCopyMode_0" name="welukaCopyMode" value="copy" checked="checked" />&nbsp;<?php _e('Copy only', Weluka::$settings['plugin_name']); ?></label>
                                        <label style="margin-right:8px;"><input type="radio" id="welukaCopyMode_1" name="welukaCopyMode" value="template" />&nbsp;<?php _e('Template registration', Weluka::$settings['plugin_name']); ?></label>
                                        <label><input type="radio" id="welukaCopyMode_2" name="welukaCopyMode" value="both" />&nbsp;<?php _e('Both', Weluka::$settings['plugin_name']); ?></label>
                                        <div class="weluka-mgtop-m">
    	    								<label><?php _e('Template name', Weluka::$settings['plugin_name']) ?></label><input id="welukaCopyTemplateName" name="welukaCopyTemplateName" type="text" class="form-control" />
                                            <div class="help-block"><?php _e('Please enter a template name template registration the "both" is selected. (In the template name at the end registration date is appended.)', Weluka::$settings['plugin_name']) ?></div>
                                        </div>
                                        <input type="hidden" id="welukaCopyTarget" name="welukaCopyTarget" value="" />
                                	</div>
 								</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-copy" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('OK', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Cancel', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-copy-modal ?>
<?php
/**
 * modal dialog copy template select
 * @since 1.0.7
 */
?>
<div id="weluka-copytpl-select-modal" class="modal hide fade weluka-modal" data-backdrop="static" role="dialog" aria-labelledby="copytplSelectModalLabel" aria-hidden="true" data-keyboard="false">
	<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
				<button class="close" data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
    			<h4 id="copytplSelectModalLabel" class="modal-title"><?php _e('Registration template selection', Weluka::$settings['plugin_name']) ?></h4>
            </div>
            <div class="modal-body">
            	<div class="weluka-modal-main">
        			<div class="weluka-setting-modal-wrapper">
    					<div class="weluka-container-fluid clearfix">
                        	<form id="weluka-copytpl-select-form" name="weluka-copytpl-select-form" role="form">
                            	<div class="weluka-row clearfix">
                                	<div class="weluka-col-md-12">
                                    	<h5><?php _e('Please select a template registered with template.', Weluka::$settings['plugin_name']) ?></h5>
	    								<div class="form-group">
    										<select id="welukaCopytplSelect" name="welukaCopytplSelect" class="form-control">
        										<option value=""></option>
        									</select>
        								</div>
        								<div class="form-group">
        									<button type="button" id="welukaCopytplRemoveBtn" class=" weluka-btn weluka-btn-org weluka-btn-warning btn-xs"><?php _e('Remove', Weluka::$settings['plugin_name']); ?></button>
	    								</div>
                                        <div class="help-block"><?php _e('The selected template is added to the Section in the bottom of the page.', Weluka::$settings['plugin_name']) ?></div>
                                	</div>
 								</div>
							</form>
                        </div>
        			</div>
            	</div>
            </div>
	        <div class="modal-footer">
    			<button id="weluka-save-copytpl-select" class="weluka-btn weluka-btn-org weluka-btn-primary"><?php _e('OK', Weluka::$settings['plugin_name']); ?></button>
        		<button class="weluka-btn weluka-btn-org weluka-btn-default" data-dismiss="modal"><?php _e('Cancel', Weluka::$settings['plugin_name']); ?></button>
            </div>
        </div>
    </div>
</div><?php //end weluka-copytpl-select-modal ?>
<?php //if(Weluka::$settings['debug']) : ?>
<?php //<pre id="debugArea"></pre> ?>
<?php //endif; ?>
</div><?php //end #weluka-builde-snippets ?>