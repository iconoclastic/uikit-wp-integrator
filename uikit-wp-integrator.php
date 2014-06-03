<?php
/*
Plugin Name: UIKIT WP Integrator
Plugin URI: https://github.com/iconoclastic/uikit-wordpress-integrator
Description: This plugin integrates UIKIT front-end framework of Yootheme.com into Wordpress
Version: 1.0.0
Author: Christopher Amirian
Author URI: https://github.com/iconoclastic
License: GPL2
*/

// Hooks for adding settings menu page
add_action('admin_menu', 'uk_wp_integrator_menu');
add_action( 'admin_init', 'uk_wp_integrator_init');

// Registering the menu item under settings
function uk_wp_integrator_menu() {
	add_options_page('UIKIT WP Integrator Settings', 'UIKIT Integrator', 'manage_options', 'uk-wp-integrator', 'uk_wp_integrator_options');
}

// Generating code for the plugin settings page
function uk_wp_integrator_options() {
	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}	
?>

	<div class="wrap">
		<h2><div class="dashicons dashicons-admin-settings" style="position: relative; top: 3px; color: #1e8cbe; font-size: 25px;"></div> UIKIT WP Integrator</h2>
			<form method="post" action="options.php">
			    <?php settings_fields('uk-wp-integrator-group'); ?>
			    <?php @do_settings_fields('uk-wp-integrator-group'); ?>
			    <?php
			    	$style_chooser = get_option('style-chooser');
			    	if (empty($style_chooser)) {
			    		$style_chooser = '0';
			    	}
			    	$the_gui = get_option('the-gui');
			    	if (empty($the_gui)) {
			    		$the_gui = '11';
			    	}
			    ?>
			    <table class="form-table">
			        <tr valign="top">
			        	<th scope="row">Please select the style of UIKIT you want to integrate</th>
			        	<td width="150">
			        		<fieldset>
			        			<legend class="screen-reader-text"><span>Please select the style of UIKIT you want to integrate</span></legend>
			        			<label title="0">
			        				<input id="gradient" name="style-chooser" type="radio" value="0" <?php checked('0', $style_chooser); ?> />
			        				<span>Gradient</span>
			        			</label><br>
			        			<label title="1">
			        				<input id="almost-flat" name="style-chooser" type="radio" value="1" <?php checked('1', $style_chooser); ?> />
			        				<span>Almost Flat</span>
			        			</label><br>
			        			<label title="2">
			        				<input id="flat" name="style-chooser" type="radio" value="2" <?php checked('2', $style_chooser); ?> />
			        				<span>Flat</span>
			        			</label>			        					        			
			        		</fieldset>
			        	</td>
			        	<td>
			        		<small><strong>UIKIT can be added in 3 styles:</strong></small>
							<ul>
								<li><small><strong>Gradient:</strong> Using CSS3 gradients and new state of the art codes to keep with modern standards</small></li>
								<li><small><strong>Almost Flat:</strong> Using mixture of flat and CSS3 stuff</small></li>
								<li><small><strong>Flat:</strong> No use of new CSS3 features, good for websites that want to support old browsers</small></li>
							</ul>
							<small>Please choose one of the styles to embed into websute.</small>
			        	</td>
			        </tr>
			         
			        <tr valign="top">
			        	<th scope="row">Please select the desired addon you want to enable</th>
			        	<td>
				        	<fieldset class="the-addons">
				        		<legend class="screen-reader-text"><span>Please select the desired addon you want to enable</span></legend>
			        			<label for="autocomplete">
			        				<input id="addons-autocomplete" name="autocomplete" type="checkbox" value="10" <?php checked('10', get_option('autocomplete')); ?> />
			        				<span>Autocomplete</span>
			        			</label><br>			        		
			        			<label for="datepicker">
			        				<input id="addons-datepicker" name="datepicker" type="checkbox" value="1" <?php checked('1', get_option('datepicker')); ?> />
			        				<span>Datepicker</span>
			        			</label><br>
			        			<label for="form-password">
			        				<input id="addons-form-password" name="form-password" type="checkbox" value="2" <?php checked('2', get_option('form-password')); ?> />
			        				<span>Form Password</span>
			        			</label><br>
			        			<label for="markdownarea">
			        				<input id="addons-markdownarea" name="markdownarea" type="checkbox" value="3" <?php checked('3', get_option('markdownarea')); ?> />
			        				<span>Markdown Area</span>
			        			</label><br>
			        			<label for="notify">
			        				<input id="addons-notify" name="notify" type="checkbox" value="4" <?php checked('4', get_option('notify')); ?> />
			        				<span>Notify</span>
			        			</label><br>
			        			<label for="search">
			        				<input id="addons-search" name="search" type="checkbox" value="5" <?php checked('5', get_option('search')); ?> />
			        				<span>Search</span>
			        			</label><br>
			        			<label for="sortable">
			        				<input id="addons-sortable" name="sortable" type="checkbox" value="6" <?php checked('6', get_option('sortable')); ?> />
			        				<span>Sortable</span>
			        			</label><br>
			        			<label for="sticky">
			        				<input id="addons-sticky" name="sticky" type="checkbox" value="7" <?php checked('7', get_option('sticky')); ?> />
			        				<span>Sticky</span>
			        			</label><br>
			        			<label for="timepicker">
			        				<input id="addons-timepicker" name="timepicker" type="checkbox" value="8" <?php checked('8', get_option('timepicker')); ?> />
			        				<span>Timepicker</span>
			        			</label><br>
			        			<label for="upload">
			        				<input id="addons-upload" name="upload" type="checkbox" value="9" <?php checked('9', get_option('upload')); ?> />
			        				<span>Upload</span>
			        			</label>	        						        						        					
				        	</fieldset>	
				        	<div class="select-btn">SELECT <span class="all">ALL</span> | <span class="none">NONE</span></div>		        					        		
			        	</td>
			        	<td>
			        		<small>For more information about Addons please visit: <a href="http://www.getuikit.com/docs/addons.html" target="_blank">UIKIT ADDONS</a></small><br>
			        		<small>Please use links below for more information about each addon:</small>
			        		<ul>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_autocomplete.html" target="_blank">Autocomplete</a></small></li>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_datepicker.html" target="_blank">Datepicker</a></small></li>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_form-password.html" target="_blank">Form Password</a></small></li>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_markdownarea.html" target="_blank">Markdown Area</a></small></li>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_notify.html" target="_blank">Notify</a></small></li>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_search.html" target="_blank">Search</a></small></li>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_sortable.html" target="_blank">Sortable</a></small></li>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_sticky.html" target="_blank">Sticky</a></small></li>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_timepicker.html" target="_blank">Timepicker</a></small></li>
			        			<li><small><a href="http://www.getuikit.com/docs/addons_upload.html" target="_blank">Upload</a></small></li>
			        		</ul>

			        	</td>
			        </tr>
			    </table>
			    <?php @submit_button(); ?>
			</form>
	</div>

<?php
}

// Registering Settings 
function uk_wp_integrator_init() {
	register_setting('uk-wp-integrator-group', 'style-chooser');
	register_setting('uk-wp-integrator-group', 'autocomplete');
	register_setting('uk-wp-integrator-group', 'datepicker');
	register_setting('uk-wp-integrator-group', 'form-password');
	register_setting('uk-wp-integrator-group', 'markdownarea');
	register_setting('uk-wp-integrator-group', 'notify');
	register_setting('uk-wp-integrator-group', 'search');
	register_setting('uk-wp-integrator-group', 'sortable');
	register_setting('uk-wp-integrator-group', 'sticky');
	register_setting('uk-wp-integrator-group', 'timepicker');
	register_setting('uk-wp-integrator-group', 'upload');
}

// Adding Scripts and Styles
add_action('wp_enqueue_scripts', 'uk_wp_integrator_script');
add_action('admin_enqueue_scripts', 'uk_wp_integrator_script_admin');

function uk_wp_integrator_script() {

	if (get_option('the-gui') != 13) {
		$uikit_version = '2.6.0';
		$style_chooser = get_option('style-chooser');
		$autocomplete = get_option('autocomplete');
		$datepicker = get_option('datepicker');
		$form_password = get_option('form-password');
		$markdownarea = get_option('markdownarea');
		$notify = get_option('notify');
		$search = get_option('search');
		$sortable = get_option('sortable');
		$sticky = get_option('sticky');
		$timepicker = get_option('timepicker');
		$upload = get_option('upload');
		switch ($style_chooser) {
			case '2':
				$the_style_chooser = 'uikit.min.css';
				break;
			case '1':
				$the_style_chooser = 'uikit.almost-flat.min.css';
				break;		
			default:
				$the_style_chooser = 'uikit.gradient.min.css';
				break;
		}

		wp_register_style('uk-wp-css', plugins_url('uikit/css/'.$the_style_chooser, __FILE__), '', $uikit_version ,'all');
		wp_enqueue_style('uk-wp-css');

		wp_register_script('uk-wp-main', plugins_url('uikit/js/uikit.min.js', __FILE__), array('jquery'), $uikit_version ,false);
		wp_enqueue_script('uk-wp-main');

		if (
				!empty($autocomplete) ||
				!empty($datepicker) ||
				!empty($form_password) ||
				!empty($markdownarea) ||
				!empty($notify) ||
				!empty($search) ||
				!empty($sortable) ||
				!empty($sticky) ||
				!empty($timepicker) ||
				!empty($upload)
		   ) {
				switch ($style_chooser) {
					case '2':
						$the_style_addon = 'uikit.addons.min.css';
						break;
					case '1':
						$the_style_addon = 'uikit.almost-flat.addons.min.css';
						break;		
					default:
						$the_style_addon = 'uikit.gradient.addons.min.css';
						break;
				}	   	
				wp_register_style('uk-wp-addons', plugins_url('uikit/css/addons/'.$the_style_addon, __FILE__), '', $uikit_version ,'all');
				wp_enqueue_style('uk-wp-addons');		
		}

		if (!empty($autocomplete)) {
			wp_register_script('uk-wp-autocomplete', plugins_url('uikit/js/addons/autocomplete.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-autocomplete');
		}
		if (!empty($datepicker)) {
			wp_register_script('uk-wp-datepicker', plugins_url('uikit/js/addons/datepicker.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-datepicker');
		}
		if (!empty($form_password)) {
			wp_register_script('uk-wp-form-password', plugins_url('uikit/js/addons/form-password.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-form-password');
		}
		if (!empty($markdownarea)) {
			wp_register_script('uk-wp-markdownarea', plugins_url('uikit/js/addons/markdownarea.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-markdownarea');
		}
		if (!empty($notify)) {
			wp_register_script('uk-wp-notify', plugins_url('uikit/js/addons/notify.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-notify');
		}	
		if (!empty($search)) {
			wp_register_script('uk-wp-search', plugins_url('uikit/js/addons/search.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-search');
		}	
		if (!empty($sortable)) {
			wp_register_script('uk-wp-sortable', plugins_url('uikit/js/addons/sortable.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-sortable');
		}	
		if (!empty($sticky)) {
			wp_register_script('uk-wp-sticky', plugins_url('uikit/js/addons/sticky.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-sticky');
		}
		if (!empty($timepicker)) {
			wp_register_script('uk-wp-timepicker', plugins_url('uikit/js/addons/timepicker.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-timepicker');
		}	
		if (!empty($upload)) {
			wp_register_script('uk-wp-upload', plugins_url('uikit/js/addons/upload.min.js', __FILE__), array('jquery'), $uikit_version ,false);
			wp_enqueue_script('uk-wp-upload');
		}
	}
					
}

function uk_wp_integrator_script_admin() {
	wp_register_style('uk-wp-admin-css', plugins_url('assets/uk-wp-integrator.css', __FILE__), '', $uikit_version ,'all');
	wp_enqueue_style('uk-wp-admin-css');	
	wp_register_script('uk-wp-custom', plugins_url('assets/uk-wp-integrator.js', __FILE__), array('jquery'), $uikit_version ,false);
	wp_enqueue_script('uk-wp-custom');	
}






























?>