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

            $get_value = get_post_meta($post->ID,'gc',true);
            

            $gc_value = is_array($get_value) ? $get_value : array();

            extract($gc_value);

            $layout = !empty($layout) ? $layout : 'carousel';
			?>
			<div id="tabs-container">        
				<ul class="tabs-menu">
                    <li class="current"><a href="#tab-1"> <?php esc_html_e('Shortcodes', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li><a href="#tab-2"> <?php esc_html_e('General Settings', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li style="display: <?php if($layout == "grid" || $layout == "isotope"){ echo "none";}else{ echo "block";}?>;" id="tab1"><a href="#tab-3"> <?php esc_html_e('Carousel Settings', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li style="display: <?php if($layout == "grid"){ echo "block";}else{ echo "none";}?>;" id="tab2"><a href="#tab-4"> <?php esc_html_e('Grid Settings', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li style="display: <?php if($layout == "isotope"){ echo "block";}else{ echo "none";}?>;" id="tab3"><a href="#tab-5"> <?php esc_html_e('Sortable Grid Settings', PGCU_TEXTDOMAIN); ?> </a></li>

	                <li><a href="#tab-6"> <?php esc_html_e('Style Settings', PGCU_TEXTDOMAIN); ?> </a></li>
            	</ul>

                <div id="tab-1" class="tab-content">
                   
                    <p><?php esc_html_e('Shortcode',PGCU_TEXTDOMAIN); ?></p>
                    <p><?php esc_html_e('Copy this shortcode and paste on page or post where you want to display post grid,carousel and sortable grid.Use PHP code to your themes file to display post grid.',PGCU_TEXTDOMAIN); ?></p>
                    <textarea cols="50" rows="1" style="background:#0074A8; color:#fff" onClick="this.select();" >[PGCU <?php echo 'id="'.$post->ID.'"';?>]</textarea>
                <br /><br />

                <p><?php esc_html_e('PHP Code:',PGCU_TEXTDOMAIN); ?></p>
                <textarea cols="60" rows="1" style="background:#0074A8; color:#fff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[PGCU id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
 

                
                </div>    

                <?php 
                require_once PGCU_INC_DIR . 'settings/general.php'; 
                require_once PGCU_INC_DIR . 'settings/grid.php'; 
                require_once PGCU_INC_DIR . 'settings/carousel.php';
                require_once PGCU_INC_DIR . 'settings/sortable.php';
                require_once PGCU_INC_DIR . 'settings/style.php';
               
		}

        //save  all posts
        public function gc_adl_save_meta_box( $post_id ) {

            // Perform checking for before saving
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST['gc_meta_save_nonce'] ) && wp_verify_nonce( $_POST['gc_meta_save_nonce'], 'aps_meta_save' ) ? 'true': 'false');

            if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;
            // Is the user allowed to edit the post or page?
            if ( ! current_user_can( 'edit_post', $post_id ) ) return;

            $val    = isset( $_POST['gc'] ) ? $_POST['gc'] : '';
            $value  = is_array( $val ) ? $val : array();

            update_post_meta( $post_id,'gc',$value );

        }

		

	} // end class
