<?php

if( !defined('ABSPATH')) { die('Direct access not allow');}


	class PGCU_Shortcode
	{

		public function __construct() {
			//add shortcode hoke
			add_shortcode( "PGCU", array( $this,"shortcode_for_post_grid_carousel") );

		}

		//method for shortcode
		public function shortcode_for_post_grid_carousel($atts, $content) {

			ob_start();
			extract(shortcode_atts(
				array(
					'id'=>'',
					),$atts));

			$post_id = $id;
			$data 	 = get_post_meta($post_id,'gc',true);

			$value = is_array($data) ? $data : array();
			extract($value);

			$rand = rand();

            $layout            = ! empty( $layout ) ? $layout : 'carousel';
			$theme             = ! empty( $theme ) ? $theme : 'theme_4';
			$image_resize_crop = !empty($image_resize_crop) ? $image_resize_crop : "yes";
			$image_ups		   = !empty($image_ups) ? $image_ups : "yes";
			$image_width	   = !empty($image_width) ? $image_width : 300;
			$image_hight	   = !empty($image_hight) ? $image_hight : 290;
			$post_title	       = !empty($post_title) ? $post_title : '';
			$post_category	   = !empty($post_category) ? $post_category : '';
			$post_date	       = !empty($post_date) ? $post_date : '';
			$post_content	   = !empty($post_content) ? $post_content : '';
			$post_author_name	   = !empty($post_author_name) ? $post_author_name : '';

			/* $theme = 'carousel_theme_1';
			if( 'carousel' == $layout ) {
				$theme = ! empty( $c_theme ) ? $c_theme : 'carousel_theme_1';
			} elseif( 'grid' == $layout ) {
				$theme = ! empty( $g_theme ) ? $g_theme : 'grid_theme_1';
			} */

			include PGCU_INC_DIR . 'templates/' . $theme . '.php';


			$true = ob_get_clean();
			return $true;
		}



	}//end class

