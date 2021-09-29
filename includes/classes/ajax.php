<?php 

 //Protect direct access
if ( ! defined( 'ABSPATH' ) ) die( 'Are you cheating??? Accessing this file directly is forbidden.' );

class PGCU_Ajax
{
	public function __construct() {

		add_action('wp_ajax_pgcu_post_type', array( $this, 'post_type_ajax_handler') ); // wp_ajax_{action}

    }

    function post_type_ajax_handler(){
        ob_start();

        $post_type = ! empty( $_POST['post_type'] ) ? $_POST['post_type'] : 'post'; ?>

        
            <?php 
            $terms = get_object_taxonomies( (object) array( 'post_type' => $post_type, 'hide_empty' => false ) );
            if( $terms ) {
                foreach( $terms as $term ) {
            ?>
            <option value="<?php echo $term;?>" ><?php echo $term; ?></option>
            <?php } } 
        $value = ob_get_clean();

        wp_send_json( $value ); 

        die; // here we exit the script and even no wp_reset_query() required!
    }

	

}//end class