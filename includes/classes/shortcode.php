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
			$theme             = ! empty( $theme ) ? $theme : 'theme-1';

			$post_type            = ! empty( $post_type ) ? $post_type : 'post';
			$term_from            = ! empty( $term_from ) ? $term_from : 'category';
			$display_term         = ! empty( $display_term ) ? $display_term : 'yes';
			$display_title        = ! empty( $display_title ) ? $display_title : 'yes';
			$display_content      = ! empty( $display_content ) ? $display_content : 'yes';
			$display_read_more    = ! empty( $display_read_more ) ? $display_read_more : 'yes';
			$display_author       = ! empty( $display_author ) ? $display_author : 'yes';
			$display_date         = ! empty( $display_date   ) ? $display_date   : 'yes';

			$image_resize_crop = ! empty( $image_resize_crop ) ? $image_resize_crop : "yes";
			$image_width	   = ! empty( $image_width ) ? $image_width : 300;
			$image_hight	   = ! empty( $image_hight ) ? $image_hight : 290;
			
			$layout_second_div_class = 'pgcu-row pgcu-column-3';
			$layout_third_div_class  = '';
			if( 'carousel' == $layout ) {
				$layout_second_div_class = 'swiper-wrapper';
				$layout_third_div_class  = 'swiper-slide';
			} elseif( 'sortable' == $layout_second_div_class ) {
				$layout_second_div_class = 'pgcu-post-sortable';
				$layout_third_div_class  = '';
			}

			$post_from 		  = !empty($post_from) ? $post_from : 'latest';
			$paged 			    = pgcu_get_paged_num();

			$args = array();
		    $common_args = [
		        'post_type'      => $post_type,
		        'posts_per_page' => (!empty($total_posts) ? $total_posts : -1),
		        'status' 		 => 'published',
		        'paged'			 => $paged

		    ];
		    if ( 'latest' == $post_from ) { $args = $common_args; }
		    elseif ('older' == $post_from) {
		        $older_args = [
		            'orderby'   => 'date',
		            'order'     => 'ASC',
		        ];
		        $args = array_merge($common_args, $older_args);
		    }else {
		        $args = $common_args;
		    }

		    $posts = new WP_Query( $args );

			if( $posts->have_posts() ) { 
				
				?>

				<div class="pgcu-header-title">
					<h2>Header Title</h2>
				</div>

				<div class="pgcu-posts pgcu-theme-1 <?php echo ( 'carousel' == $layout ) ? 'pgcu-carousel' : ''; ?>"
				<?php if( 'carousel' == $layout ) { ?>
					data-pgcu-items="4" 
					data-pgcu-margin="30" 
					data-pgcu-loop="true" 
					data-pgcu-perslide="2" 
					data-pgcu-speed="3000" 
					data-pgcu-autoplay='
					{
						"delay": "2000",
						"pauseOnMouseEnter": true,
						"disableOnInteraction": false,
						"stopOnLastSlide": true,
						"reverseDirection": false
					}
				' data-pgcu-responsive='{
						"0": {"slidesPerView": "1", "spaceBetween": "20", "slidesPerGroup":"1"},
						"768": {"slidesPerView": "2", "spaceBetween": "30", "slidesPerGroup":"1"},
						"992": {"slidesPerView": "3", "spaceBetween": "30", "slidesPerGroup":"1"},
						"1200": {"slidesPerView": "4", "spaceBetween": "30", "slidesPerGroup":"1"}
					}'
				<?php } ?>	
				>

					<?php if( 'isotope' == $layout ) {
						include PGCU_INC_DIR . 'templates/sortable/sortable.php';
						} ?>

    				<div class="<?php echo ( 'carousel' == $layout) ? 'swiper-wrapper' : 'pgcu-row pgcu-column-3'; ?>">
						<?php include PGCU_INC_DIR . 'templates/' . $theme . '.php'; ?>
					</div>

						<?php 
						if( 'carousel' == $layout ) {
							include PGCU_INC_DIR . 'templates/navigation/navigation.php'; 
						}
						?>

				</div>


			<?php
				
			}	

			$true = ob_get_clean();
			return $true;
		}



	}//end class

