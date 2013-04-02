<?php

// register settings
function str_settings_init(){
	// css
	wp_register_style('simple-text-replace-css', plugins_url('css/simple-text-replace.css', __FILE__));
    wp_enqueue_style('simple-text-replace-css');
	//	i18n
	load_plugin_textdomain('simple-text-replace', false, dirname(plugin_basename(__FILE__ )) . '/lang');
}

// add settings page to menu
function add_settings_page() {
	//TODO non funziona traduzione?
	add_options_page(__('Simple Text Replace Settings', 'simple-text-replace'), 'Text replace', 'manage_options', 'simple-text-replace-settings', 'str_settings_page');
}

// add actions
add_action( 'admin_init', 'str_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

// Declare options
$str_options = array (

	// Title replace
	array(
		'name' => 'Post/page title replacement',
		'type' => 'section'
	),
		array(
			'name' => 'Enabled',
			'desc' => 'Enable search and replace for post/page title',
			'id' => 'str_title_enabled',
			'type' => 'checkbox',
			'std' => ''
		),
		array(
			'name' => 'Regular expressions',
			'type' => 'regex_section'
		),
			array('id' => 'str_title_find_01', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_01', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_title_find_02', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_02', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_title_find_03', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_03', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_title_find_04', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_04', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_title_find_05', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_05', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_title_find_06', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_06', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_title_find_07', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_07', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_title_find_08', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_08', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_title_find_09', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_09', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_title_find_10', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_title_replace_10', 'type' => 'replace_text', 'std' => ''),
			
		array(
			'type' => 'regex_section_close'
		),
	array(
		'type' => 'section_close'
	),


	// Text replace
	array(
		'name' => 'Post/page text replacement',
		'type' => 'section'
	),
		array(
			'name' => 'Enabled',
			'desc' => 'Enable search and replace for post/page text',
			'id' => 'str_content_enabled',
			'type' => 'checkbox',
			'std' => ''
		),
		array(
			'name' => 'Regular expressions',
			'type' => 'regex_section'
		),
			array('id' => 'str_content_find_01', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_01', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_content_find_02', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_02', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_content_find_03', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_03', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_content_find_04', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_04', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_content_find_05', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_05', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_content_find_06', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_06', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_content_find_07', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_07', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_content_find_08', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_08', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_content_find_09', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_09', 'type' => 'replace_text', 'std' => ''),

			array('id' => 'str_content_find_10', 'type' => 'regex_text', 'std' => ''),
			array('id' => 'str_content_replace_10', 'type' => 'replace_text', 'std' => ''),
			
		array(
			'type' => 'regex_section_close'
		),
	array(
		'type' => 'section_close'
	)
);

// Panel Output
function str_settings_page() {

	global $str_options;

	$i=0;
	$message=''; 

	if ( 'save' == $_REQUEST['action'] ) {

		foreach ($str_options as $value) {
			update_option( $value['id'], $_REQUEST[ $value['id'] ] );
		}

		foreach ($str_options as $value) {
			if( isset( $_REQUEST[ $value['id'] ] ) ) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
			} else {
				delete_option( $value['id'] );
			}
		}
		
		$message='saved';
		
	}
	

	?>
	<div class="wrap options_wrap">
		<div id="icon-options-general" class="icon32"><br></div>
		<h2><?php _e('Simple Text Replace Settings', 'simple-text-replace') ?></h2>
		<p><b>Simple Text Replace</b> applies regular expressions to text and/or title of posts and pages to dinamically replace text before saving to DB (regular expressions are evaluated before saving the post, existing posts and pages will NOT be modified unless you edit and save them).</p>

		<?php if ( $message=='saved' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"><p>Simple Text Replace settings saved.</p></div>'; ?>
		
		<?php
			check_regex('title', '01');
			check_regex('title', '02');
			check_regex('title', '03');
			check_regex('title', '04');
			check_regex('title', '05');
			check_regex('title', '06');
			check_regex('title', '07');
			check_regex('title', '08');
			check_regex('title', '09');
			check_regex('title', '10');

			check_regex('content', '01');
			check_regex('content', '02');
			check_regex('content', '03');
			check_regex('content', '04');
			check_regex('content', '05');
			check_regex('content', '06');
			check_regex('content', '07');
			check_regex('content', '08');
			check_regex('content', '09');
			check_regex('content', '10');
		?>

		<div class="content_options">
			<form method="post">

				<?php
				foreach ($str_options as $value) {

					switch ( $value['type'] ) {

						case 'section': 
							$i++;
?>							<div class="input_section">
								<div class="input_title">
									<h3><?php echo $value['name']; ?></h3>
									<div class="clearfix"></div>
								</div>
								<div class="all_options"><?php
							break;
							
						case 'section_close':

?>								<div class="option_input">
									<div class="submitButton"><input name="save<?php echo $i; ?>" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /></div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>

							</div></div><?php
							break;
							
						case 'regex_section': 
							?><div class="option_input">
								<p class="header"><?php echo $value['name']; ?></p>
								<div class="subsection">

									<div class="option_regex_header">Text to be replaced (regex)</div>
									<div class="arrows"></div>
									<div class="option_replace_header">Replacement</div>
								<?php
							break;
							
						case 'regex_section_close':
							?></div>
							<div class="clearfix"></div>
							</div><?php
							break;

						case 'regex_text':

							if (is_regex(fixPattern('/'.get_settings($value['id']).'/')))
								$css_class = '';
							else
								$css_class = ' class="error"';
						
							?><div class="option_text">
								<input <?php echo $css_class ?> id="" type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != '') { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
							</div>
							<div class="arrows">&raquo;</div><?php
							break;

						case 'replace_text':
							?><div class="option_text">
								<input id="" type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != '') { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
							</div><?php
							break;

						case 'checkbox': ?>
							<div class="option_input">
								<p class="header"><?php echo $value['name']; ?></p>
								<?php if(get_option($value['id'])){ $checked = 'checked="checked"'; }else{ $checked = '';} ?>
								<input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> 
								<small><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label></small>
								<div class="clearfix"></div>
							</div>
							<?php break;

					}
				}?>
				<input type="hidden" name="action" value="save" />
			</form>



			<div class="input_section">
				<div class="all_options">

					<div class="option_input">
						<p class="header">Info</p>
						<p class="content">Simple Text Replace applies regular expressions to text and/or title of posts and pages to dinamically replace text before saving to DB (regular expressions are evaluated before saving the post, existing posts and pages will NOT be modified unless you edit and save them).</p>
						<p class="content">Slashes ("/") will be automatically added to the expressions before evauating (i.e. <b>he?llo</b> will become <b>/he?llo/</b>).</p>
						<div class="clearfix"></div>
					</div>

					<div class="option_input">
						<p class="header">Online resources</p>
						<p class="content">&bull; php.net &gt; Regular Expressions documentation [<a href="http://www.php.net/manual/en/book.pcre.php" target="_blank">http://www.php.net/manual/en/book.pcre.php</a>]</p>
						<p class="content">&bull; Regular Expression Test Tool [<a href="http://www.solmetra.com/scripts/regex/" target="_blank">http://www.solmetra.com/scripts/regex/</a>]</p>
						<div class="clearfix"></div>
					</div>

					

					<div class="option_input">
						<p class="header">Regex examples</p>
						<p class="content">
							<b>hello</b> (It will match the word <em>hello</em>)<br/>
							<b>^hello</b> (It will match <em>hello</em> at the start of a string. Possible matches are <em>hello</em> or <em>helloworld</em>, but not <em>worldhello</em>)<br/>
							<b>hello$</b> (It will match <em>hello</em> at the end of a string.)<br/>
							<b>he.o</b> (It will match any character between <em>he</em> and <em>o</em>. Possible matches are <em>helo</em> or <em>heyo</em>, but not <em>hello</em>)<br/>
							<b>he?llo</b> (It will match either <em>llo</em> or <em>hello</em>)<br/>
							<b>hello+</b> (It will match <em>hello</em> on or more time. E.g. <em>hello</em> or <em>hellohello</em>)<br/>
							<b>he*llo</b> (Matches <em>llo</em>, <em>hello</em> or <em>hehello</em>, but not <em>hellooo</em>)<br/>
							<b>hello|world</b> (It will either match the word <em>hello</em> or <em>world</em>)<br/>
							<b>(A-Z)</b> (Using it with the hyphen character, this pattern will match every uppercase character from A to Z. E.g. A, B, C&#8230;)<br/>
							<b>[abc]</b> (It will match any single character <em>a</em>, <em>b</em> or <em>c</em>)<br/>
							<b>abc{1}</b> (Matches precisely one <em>c</em> character after the characters <em>ab</em>. E.g. matches <em>abc</em>, but not <em>abcc</em>)<br/>
							<b>abc{1,}</b> (Matches one or more <em>c</em> character after the characters <em>ab</em>. E.g. matches <em>abc</em> or <em>abcc</em>)<br/>
							<b>abc{2,4}</b> (Matches between two and four <em>c</em> character after the characters <em>ab</em>. E.g. matches <em>abcc</em>, <em>abccc</em> or <em>abcccc</em>, but not <em>abc</em>)
						</p>
						<div class="clearfix"></div>
					</div>


					<div class="option_input">
						<p class="header">Credits</p>
						<p class="content">This plugin was develped by dBen. For info, suggestions and bugs please email me at <a href="mailto:dben@gmx.com">dben@gmx.com</a>.</p>
						<div class="clearfix"></div>
					</div>

					<div class="option_input">
						<p class="header">Donate</p>
						<p class="content">
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="66Z76G4RVSRCC">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
							</form>
						</p>
						<div class="clearfix"></div>
					</div>
					

	
				</div>
			</div>
		</div>
	</div>
<?php }



	function check_regex($option_type, $option_index){
	
		$val = get_settings('str_'.$option_type.'_find_'.$option_index);
		$pattern = fixPattern('/'.$val.'/');

		if (!is_regex($pattern))
			if($option_type == 'title')
				echo '<div class="error"><p><b>Warning:</b> Title regex '.$option_index.' ('.$val.') is not valid and will not be evaluated.</p></div>';
			else
				echo '<div class="error"><p><b>Warning:</b> Text regex '.$option_index.' ('.$val.') is not valid and will not be evaluated.</p></div>';
	}



?>