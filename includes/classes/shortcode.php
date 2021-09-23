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

			$this->gc_adl_all_css_files();

			$post_id = $id;
			$data 	 = get_post_meta($post_id,'gc',true);

			$value = is_array($data) ? $data : array();
			extract($value);

			$rand = rand();

            $layout            = ! empty( $layout ) ? $layout : 'carousel';
			$image_resize_crop = !empty($image_resize_crop) ? $image_resize_crop : "yes";
			$image_ups		   = !empty($image_ups) ? $image_ups : "yes";
			$image_width	   = !empty($image_width) ? $image_width : 300;
			$image_hight	   = !empty($image_hight) ? $image_hight : 290;
			$post_title	       = !empty($post_title) ? $post_title : '';
			$post_category	   = !empty($post_category) ? $post_category : '';
			$post_date	       = !empty($post_date) ? $post_date : '';
			$post_content	   = !empty($post_content) ? $post_content : '';
			$post_author_name	   = !empty($post_author_name) ? $post_author_name : '';
            
			$theme = 'carousel_theme_1';
			if( 'carousel' == $layout ) {
				$theme = ! empty( $c_theme ) ? $c_theme : 'carousel_theme_1';
			} elseif( 'grid' == $layout ) {
				$theme = ! empty( $g_theme ) ? $g_theme : 'grid_theme_1';
			}

			include PGCU_INC_DIR . 'templates/' . $layout .'/' . $theme . '.php';
		
				
			$true = ob_get_clean();
			return $true;
		}

		//method for css & js files
		public function gc_adl_all_css_files() {
			

			wp_enqueue_script('filterizr');


			wp_enqueue_style('simple');
			wp_enqueue_style('style');
			wp_enqueue_style('reset');
			


		}


		public function all_footer() {
			?>





			<script type="text/javascript">
			(function($){
	            jQuery(document).ready(function() {

	            	'use strict';
				    // custom nav trigger function for owl casousel
				    function customTrigger(slideNext, slidePrev, targetSlider) {
				        $(slideNext).on('click', function () {
				            targetSlider.trigger('next.owl.carousel');
				        });
				        $(slidePrev).on('click', function () {
				            targetSlider.trigger('prev.owl.carousel');
				        });
				    }

				    


				    $('.pgcu_filterable_container').filterizr({
				        layout: 'sameWidth',
				        animationDuration: 0.3
				    });

				    $('.pgcu_filter_area ul li').on('click', function () {
				        var $this = $(this);
				        $this.siblings('li').removeClass('active');
				        $this.addClass('active');
				    });
	            });	
	           })(jQuery) 
	            </script>	

	            

			<?php
		}
		


	}//end class

