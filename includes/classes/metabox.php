<?php

if( !defined('ABSPATH')) { die('Direct access does not allow');}

	class PGCU_Metabox
	{
		public function __construct() {
			//add metabox
			add_action('add_meta_boxes', array( $this,'gc_adl_add_meta_box') );

            //save post
            add_action('save_post', array( $this,'gc_adl_save_meta_box') );


		}

		//method for add meta box
		public function gc_adl_add_meta_box() {
			add_meta_box(
				'short_metabox',
				__( 'Settings & Shortcode Generator', PGCU_TEXTDOMAIN ),
				array( $this,'outpost_shortcode_metabox_markup' ),
				PGCU_POST_TYPE,
				'normal'
				);
		}

        //Function that will check if value is a valid HEX color.
        public function check_color( $value ) {

            if ( preg_match( '/^#[a-f0-9]{6}$/i', $value ) ) { // if user insert a HEX color with #
                return true;
            }

            return false;
        }

		//output of shortcode metabox
		public function outpost_shortcode_metabox_markup( $post ){

            // Add a nonce field so we can check for it later.
            wp_nonce_field( 'aps_meta_save', 'gc_meta_save_nonce' );

            $get_value = get_post_meta( $post->ID,'gc',true );
            $get_value = post_grid_and_carousel_ultimate::unserialize_and_decode24( $get_value );

            $gc_value = is_array($get_value) ? $get_value : array();

            extract($gc_value);

            $layout = ! empty( $layout ) ? $layout : 'carousel';
			?>
            <div class="lcsp-withoutTab-content">
                <div class="cmb2-wrap form-table">
                    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
                        <div class="cmb2-metabox-header">
                            <div class="div">
                                <h4><span class="fas fa-cog"></span>Settings & Shortcode Generator</h4>
                            </div>
                            <div class="div">
                                <a href="#">
                                    <p><span class="fas fa-question-circle"></span>Support</p>
                                </a>
                            </div>
                        </div>
                        <div class="cmb2-metabox-content">
                            <div class="cmb2-metabox-card cmb2-metabox-card2">
                                <h6><?php esc_html_e('Shortcode',PGCU_TEXTDOMAIN); ?></h6>
                                <p><?php esc_html_e('Copy this shortcode and paste on page or post where you want to display post grid,carousel and sortable grid.Use PHP code to your themes file to display post grid.',PGCU_TEXTDOMAIN); ?>
                                </p>
                                <div class="cmb2-metabox-card-textarea">
                                    <textarea onClick="this.select();">[PGCU <?php echo 'id="'.$post->ID.'"';?>]</textarea>
                                </div>
                            </div>
                            <div class="cmb2-metabox-card cmb2-metabox-card3">
                                <h6><?php esc_html_e('PHP Code:',PGCU_TEXTDOMAIN); ?></h6>
                                <div class="cmb2-metabox-card-textarea">
                                    <textarea
                                        onClick="this.select();"><?php echo '<?php echo do_shortcode("[PGCU id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end cmb2-metabox -->
                </div> <!-- end cmb2-wrap -->
            </div> <!-- end lcsp-tab-2 -->
			<div id="tabs-container">
				<ul class="tabs-menu">
                    <li ><a href="#tab-0"> <?php esc_html_e('Shortcodes', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li><a href="#tab-2"> <?php esc_html_e('General Settings', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li style="display: <?php if( $layout == "grid" || $layout == "isotope" || $layout == "masonry" ){ echo "none";}else{ echo "block";}?>;" id="tab1"><a href="#tab-3"> <?php esc_html_e('Carousel Settings', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li style="display: <?php if( $layout == "grid" || $layout == "masonry" ){ echo "block";}else{ echo "none";}?>;" id="tab2"><a href="#tab-4"> <?php esc_html_e('Grid / Masonry Settings', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li style="display: <?php if( $layout == "isotope" ){ echo "block";}else{ echo "none";}?>;" id="tab3"><a href="#tab-5"> <?php esc_html_e('Sortable Grid Settings', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li><a href="#tab-6"> <?php esc_html_e('Style Settings', PGCU_TEXTDOMAIN); ?> </a></li>
            	</ul>

                <?php
                require_once PGCU_INC_DIR . 'settings/general.php';
                require_once PGCU_INC_DIR . 'settings/grid.php';
                require_once PGCU_INC_DIR . 'settings/carousel.php';
                require_once PGCU_INC_DIR . 'settings/sortable.php';
                require_once PGCU_INC_DIR . 'settings/style.php';

		}

        //save  all posts
        public function gc_adl_save_meta_box ($post_id)
        {
            // vail if the security check fails
            if ( ! $this->wcpscu_security_check('gc_meta_save_nonce', 'aps_meta_save', $post_id))
                return;


            // save the meta data if it is our post type lcg_mainpost post type
            if ( ! empty( $_POST['post_type'] ) && ( PGCU_POST_TYPE == $_POST['post_type'] ) ) {

                $gc = ! empty( $_POST['gc'] ) ? post_grid_and_carousel_ultimate::serialize_and_encode24( $_POST['gc'] ) : post_grid_and_carousel_ultimate::serialize_and_encode24(array());

                //save the meta value
                update_post_meta($post_id, "gc", $gc);

            }
        }

        //security check
        private function wcpscu_security_check($nonce_name, $action, $post_id){
            // checks are divided into 3 parts for readability.
            if ( !empty( $_POST[$nonce_name] ) && wp_verify_nonce( $_POST[$nonce_name], $action ) ) {
                return true;
            }
            // If this is an autosave, our form has not been submitted, so we don't want to do anything. returns false
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return false;
            }
            // Check the user's permissions.
            if ( current_user_can( 'edit_post', $post_id ) ) {
                return true;
            }
            return false;
        }



	} // end class
