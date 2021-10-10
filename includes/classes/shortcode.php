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
					), $atts ) );

			$post_id = $id;
			$data 	 = get_post_meta( $post_id, 'gc', true );
			$data = post_grid_and_carousel_ultimate::unserialize_and_decode24( $data );
			$value = is_array( $data ) ? $data : array();
			extract( $value );

			$rand = rand();

            $layout            = ! empty( $layout ) ? $layout : 'carousel';
			$theme             = ! empty( $theme ) ? $theme : 'theme-1';

			$post_type            = ! empty( $post_type ) ? $post_type : 'post';
			$term_from            = ! empty( $term_from ) ? $term_from : 'category';
			$display_term         = ! empty( $display_term ) ? $display_term : 'yes';
			$display_title        = ! empty( $display_title ) ? $display_title : 'yes';
			$display_header_title = ! empty( $display_header_title ) ? $display_header_title : 'no';
			$header_title 	 	  = ! empty( $header_title ) ? $header_title : '';
			$display_content      = ! empty( $display_content ) ? $display_content : 'yes';
			$content_word_limit   = ! empty( $content_word_limit ) ? $content_word_limit : '16';
			$display_read_more    = ! empty( $display_read_more ) ? $display_read_more : 'yes';
			$read_more_text       = ! empty( $read_more_text ) ? $read_more_text : 'Read More';
			$read_more_type       = ! empty( $read_more_type ) ? $read_more_type : 'link';
			$display_author       = ! empty( $display_author ) ? $display_author : 'yes';
			$display_date         = ! empty( $display_date   ) ? $display_date   : 'yes';

			$image_resize_crop = ! empty( $image_resize_crop ) ? $image_resize_crop : "yes";
			$image_width	   = ! empty( $image_width ) ? $image_width : 300;
			$image_height	   = ! empty( $image_height ) ? $image_height : 290;

			$navigation              		=   ! empty( $navigation  ) ? $navigation  : 'yes';
			$navigation_position     		=   ! empty( $navigation_position  ) ? $navigation_position  : 'middle';
			$navigation_arrow_color	 		=	! empty( $navigation_arrow_color ) ? $navigation_arrow_color : '#030517';
			$navigation_arrow_hover_color	=	! empty( $navigation_arrow_hover_color ) ? $navigation_arrow_hover_color : '#fff';
			$navigation_back_color			=	! empty( $navigation_back_color ) ? $navigation_back_color : '#f5f5f5';
			$navigation_back_hover_color	=	! empty( $navigation_back_hover_color ) ? $navigation_back_hover_color : '#F31C1C';
			$navigation_border_color		=	! empty( $navigation_border_color ) ? $navigation_border_color : '#f5f5f5';
			$navigation_border_hover_color	=	! empty( $navigation_border_hover_color ) ? $navigation_border_hover_color : '#F31C1C';

			$autoplay                =   ! empty( $autoplay ) ? $autoplay : 'yes';
			$pause_hover             =   ! empty( $pause_hover ) ? $pause_hover : 'no';
			$repeat_post             =   ! empty( $repeat_post ) ? $repeat_post : 'yes';
			$marquee                 =   ! empty( $marquee  ) ? $marquee  : 'no';
			$scrool_direction        = ! empty( $scrool_direction ) ? $scrool_direction : 'right_left';
			$c_autoplay_speed 		 =	 ! empty( $c_autoplay_speed ) ? $c_autoplay_speed : '2000';
			$c_autoplay_time 		 =	 ! empty( $c_autoplay_time ) ? $c_autoplay_time : '2000';

			$post_column             =   ! empty( $post_column ) ? $post_column : '3';
			$post_column_laptop      =   ! empty( $post_column_laptop ) ? $post_column_laptop : '3';
			$post_column_tablet      =   ! empty( $post_column_tablet ) ? $post_column_tablet : '2';
			$post_column_mobile      =   ! empty( $post_column_mobile ) ? $post_column_mobile : '1';

			//grid pagination settings
			$display_pagination         = ! empty( $display_pagination   ) ? $display_pagination   : 'yes';
			$pagination_type            = ! empty( $pagination_type   ) ? $pagination_type   : 'number';
			$pagi_color                 = ! empty( $pagi_color ) ? $pagi_color : '#333';
			$pagi_border_color          = ! empty( $pagi_border_color ) ? $pagi_border_color : '#e4e4e4';
			$pagi_back_color            = ! empty( $pagi_back_color ) ? $pagi_back_color : '#fff';

			$pagi_hover_color           = ! empty( $pagi_hover_color ) ? $pagi_hover_color : '#fff';
			$pagi_hover_border_color    = ! empty( $pagi_hover_border_color ) ? $pagi_hover_border_color : '#ff5500';
			$pagi_hover_back_color      = ! empty( $pagi_hover_back_color ) ? $pagi_hover_back_color : '#ff5500';
			$pagi_active_color          = ! empty( $pagi_active_color ) ? $pagi_active_color : '#fff';
			$pagi_active_border_color   = ! empty( $pagi_active_border_color ) ? $pagi_active_border_color : '#ff5500';
			$pagi_active_back_color     = ! empty( $pagi_active_back_color ) ? $pagi_active_back_color : '#ff5500';

			$sortable_menu_text_color		    = ! empty( $sortable_menu_text_color ) ? $sortable_menu_text_color : '#4F515A';
			$sortable_menu_active_back_color	= ! empty( $sortable_menu_active_back_color ) ? $sortable_menu_active_back_color : '#030213';
			$sortable_menu_active__text_color 	= ! empty( $sortable_menu_active__text_color ) ? $sortable_menu_active__text_color : '#ffffff';

			$header_title_color 		= ! empty( $header_title_color ) ? $header_title_color : '#030213';
			$post_title_color 				       = ! empty( $post_title_color ) ? $post_title_color : '#030213';
			$post_title_hover_color 		       = ! empty( $post_title_hover_color ) ? $post_title_hover_color : '#F31C1C';
			$post_content_color 	    	  	   = ! empty( $post_content_color ) ? $post_content_color : '#63666D';
			$read_more_color 	    		  	   = ! empty( $read_more_color ) ? $read_more_color : '#030213';
			$read_more_hover_color 	    	  	   = ! empty( $read_more_hover_color ) ? $read_more_hover_color : '#F31C1C';
			$read_more_button_color     	  	   = ! empty( $read_more_button_color ) ? $read_more_button_color : '#030213';
			$read_more_button_hover_color     	   = ! empty( $read_more_button_hover_color ) ? $read_more_button_hover_color : '#ffffff';
			$read_more_button_background_color     = ! empty( $read_more_button_background_color ) ? $read_more_button_background_color : '#EFEFEF';
			$read_more_button_background_hover_color     = ! empty( $read_more_button_background_hover_color ) ? $read_more_button_background_hover_color : '#030213';

			$post_from 		  = !empty($post_from) ? $post_from : 'latest';
			$paged 			  = pgcu_get_paged_num();

			$g_sort           = ! empty( $g_sort    ) ? $g_sort    : 'category';
			$terms			   = get_terms( array(
				'taxonomy' => $g_sort,
				'hide_empty' => false,
			) );


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

			wp_localize_script( 'pgcu-ajax', 'pgcu_ajax', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ), // WordPress AJAX
				'query'   => json_encode( $posts->query_vars ), // everything about your loop is here
				'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
            	'max_page' => $posts->max_num_pages
			) );

			if( $posts->have_posts() ) { ?>
				<?php if( 'yes' == $display_header_title ) { ?>
				<div class="pgcu-posts__header" style="
					--pgcu-headerFontSize: 24px;
    				--pgcu-headerFontColor: <?php echo $header_title_color; ?>;
				">
					<h2><?php echo $header_title; ?></h2>
				</div>
				<?php } ?>
				<div class="pgcu-posts  <?php echo  'yes' == $marquee ? 'pgcu-carousel--marquee' : ''; ?> pgcu-<?php echo $theme; ?> <?php echo ( 'carousel' == $layout ) ? 'pgcu-carousel' : ''; ?>"
				<?php if( 'carousel' == $layout ) { ?>
					data-pgcu-items="4"
					data-pgcu-margin="30"
					data-pgcu-loop="<?php echo ( 'yes' == $repeat_post ) ? 'true' : 'false'; ?>"
					data-pgcu-perslide="2"
					data-pgcu-speed="<?php echo $c_autoplay_speed; ?>"
					data-pgcu-autoplay='
					<?php if( 'yes' == $autoplay ) { ?>
					{
						"delay": "<?php echo $c_autoplay_time; ?>",
						"pauseOnMouseEnter": <?php echo ( 'yes' == $pause_hover ) ? "true" : "false"; ?>,
						"disableOnInteraction": false,
						"stopOnLastSlide": true,
						"reverseDirection": <?php echo 'right_left' == $scrool_direction ? 'false' : 'true';?>
					}
					<?php } else { ?>
						false
					<?php } ?>
				' data-pgcu-responsive='{
						"0": {"slidesPerView": "<?php echo $post_column_mobile; ?>", "spaceBetween": "20", "slidesPerGroup":"1"},
						"768": {"slidesPerView": "<?php echo $post_column_tablet; ?>", "spaceBetween": "30", "slidesPerGroup":"1"},
						"992": {"slidesPerView": "<?php echo $post_column_laptop; ?>", "spaceBetween": "30", "slidesPerGroup":"1"},
						"1200": {"slidesPerView": "<?php echo $post_column; ?>", "spaceBetween": "30", "slidesPerGroup":"1"}
					}'
				<?php } ?>
				>

					<?php
					if( 'isotope' == $layout ) {
						include PGCU_INC_DIR . 'templates/sortable/sortable.php';
					} elseif( 'carousel' == $layout && ( 'top-left' == $navigation_position || 'top-right' == $navigation_position ) ) {
						include PGCU_INC_DIR . 'templates/navigation/navigation.php';
					}

						?>


    				<div class="<?php echo ( 'carousel' == $layout) ? 'swiper-wrapper' : 'pgcu-row pgcu-grid-'. $post_id .' pgcu-column-3'; ?>" style="
					--pgcu-titleColor: <?php echo $post_title_color; ?>;
    				--pgcu-titleColorHover: <?php echo $post_title_hover_color; ?>;
					--pgcu-excerptColor: <?php echo $post_content_color; ?>;
					--pgcu-readMoreColor: <?php echo $read_more_color; ?>;
    				--pgcu-readMoreColorHover: <?php echo $read_more_hover_color; ?>;
					--pgcu-buttonFontSize: 14px;
					--pgcu-buttonColor: <?php echo $read_more_button_color; ?>;
					--pgcu-buttonColorHover: <?php echo $read_more_button_hover_color; ?>;
					--pgcu-buttonBg: <?php echo $read_more_button_background_color; ?>;
					--pgcu-buttonBgHover: <?php echo $read_more_button_background_hover_color; ?>;
				">

						<?php
						while( $posts->have_posts() ) : $posts->the_post();

						$thumb = get_post_thumbnail_id();
						// crop the image if the cropping is enabled.
						if( 'yes' === $image_resize_crop ){
							$pgcu_img = pgcu_image_cropping( $thumb, $image_width, $image_height, true, 100 )['url'];
						}else{
							$aazz_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'large' );
							$pgcu_img = $aazz_thumb['0'];
						}

						$get_terms  = get_the_terms( get_the_ID(), $term_from );
						$post_views = get_post_meta( get_the_id(), '_pgcu_post_views_count', true );
						
						include PGCU_INC_DIR . 'templates/' . $theme . '.php';

						endwhile;
						?>

					</div>

						<?php
						if( 'carousel' == $layout && ( 'middle' == $navigation_position || 'bottom-left' == $navigation_position || 'bottom-right' == $navigation_position ) ) {
							include PGCU_INC_DIR . 'templates/navigation/navigation.php';
						}elseif( 'grid' == $layout && 'yes' == $display_pagination ) {
							include PGCU_INC_DIR . 'templates/pagination/pagination.php';
						}
						?>

				</div>


			<?php

			}

			$true = ob_get_clean();
			return $true;
		}



	}//end class

