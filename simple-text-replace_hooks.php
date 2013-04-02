<?php

	function str_insert_post($post){
	
		if(get_option('str_title_enabled')){
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '01');
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '02');
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '03');
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '04');
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '05');
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '06');
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '07');
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '08');
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '09');
			$post['post_title'] = apply_regex_option($post['post_title'], 'title', '10');

	        $post['post_name'] = sanitize_title($post['post_title']);
		}
		
		if(get_option('str_content_enabled')){
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '01');
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '02');
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '03');
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '04');
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '05');
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '06');
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '07');
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '08');
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '09');
			$post['post_content'] = apply_regex_option($post['post_content'], 'content', '10');
		}	
		
		return $post;
	}

	add_action('wp_insert_post_data', 'str_insert_post', 1, 2); 

	function apply_regex_option($content, $option_type, $option_index){
	
		$pattern = get_settings('str_'.$option_type.'_find_'.$option_index);
		$pattern = fixPattern($pattern);
		
		if($pattern != ''){
			$pattern = '/'.$pattern.'/';
			$replacement = get_settings('str_'.$option_type.'_replace_'.$option_index);
			
			if (is_regex($pattern))
				$content = preg_replace($pattern, $replacement, $content);
		}

		return $content;
	}
	
?>