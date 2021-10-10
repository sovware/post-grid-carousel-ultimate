<?php


add_action('admin_init', 'adl_gc_admin_init');
function adl_gc_admin_init( ){
    add_action('admin_head-edit.php', 'adl_gc_admin_head'); // add script to admin head
    add_filter('current_screen', 'adl_gc_current_screen');
    // add featured post colums
    add_filter('manage_post_posts_columns', 'adl_gc_manage_post_column');
    add_action('manage_post_posts_custom_column', 'adl_gc_manage_post_custom_column', 10, 2);
}

function adl_gc_manage_post_column( $columns ) {
    //add new column name 'featured'
    $columns['featured'] = __('Featured', PGCU_TEXTDOMAIN);
    return $columns;
    
}

function adl_gc_manage_post_custom_column($column_name, $post_id) {
    // display data for custom column named 'featured'.
    switch($column_name){
        case 'featured':
            $is_featured = get_post_meta($post_id, '_is_featured', true);
            $class = "dashicons ";
            $text = "";
            if ($is_featured == "yes") {
                $class.= " dashicons-star-filled";
                $text = "";
            } else {
                $class.= " dashicons-star-empty";
            }
            echo "<a href='#aps-featured-posts-toggle' class='aps-featured-post-toggle {$class}' data-post-id='{$post_id}'>$text</a>";

        break;


        default:
            break;

    }
}


// count total featured post
function gc_total_feature() {
    $result = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key' => '_is_featured',
                'value' => 'yes'
            )
        ) ,
        'posts_per_page' => 1
    ));
    wp_reset_postdata();
    wp_reset_query();
    $totalFeaturedPosts = $result->found_posts;
    unset($result);
    return $totalFeaturedPosts;
}

function adl_gc_current_screen($screen) {
    if (defined('DOING_AJAX') && DOING_AJAX) {
        return $screen;
    }
    add_filter('views_edit-post', 'adl_gc_feature_post_count_display');
    return $screen;
}

// show featured post counts on admin screen post screen
function adl_gc_feature_post_count_display($views) {
    $count = gc_total_feature();

    $views['featured_post'] = "<p id='aps-featured-post-filter' >".esc_html__('Published Featured Posts', PGCU_TEXTDOMAIN)." <span class='count'>({$count})</span></p>";
    return $views;
}





function adl_gc_admin_head() {
    $apsAjaxLoader = plugins_url('', __FILE__) .'assets/css/ajax-loader.gif';
?>
    <script type="text/javascript">
		jQuery(document).ready(function($){
			$('.aps-featured-post-toggle').on("click",function(e){
				e.preventDefault();
				var _el=$(this);
				var post_id=_el.data('post-id');
				var data={action:'gc_toggle_feature_post',post_id:post_id};
				var ajaxLoader = '<img src="<?php echo $apsAjaxLoader;?>" alt="ajax" width="20px" height="20px">';
				$.ajax({
				    url:ajaxurl,
				    data:data,
				    type:'post',
                    beforeSend: function()
                    {
                        _el.removeClass('dashicons-star-filled').removeClass('dashicons-star-empty');
                        _el.html(ajaxLoader);
                    },
					dataType:'json',
					success:function(data){
                        _el.html('');
                        $("#aps-featured-post-filter").find("span.count").text("("+data.gc_total_feature+")");
                        if(data.featured_status === "yes"){
                            _el.addClass('dashicons-star-filled');
                        }else{
                            _el.addClass('dashicons-star-empty');
                        }
					}

				});
			});
		});
		</script>
<?php
}

function gc_toggle_feature_post() {
    header('Content-Type: application/json');
    $post_id = $_POST['post_id'];
    $is_featured = get_post_meta($post_id, '_is_featured', true);
    $toggleStatus = ('yes' == $is_featured) ? 'no' : 'yes';
    delete_post_meta($post_id, '_is_featured');
    add_post_meta($post_id, '_is_featured', $toggleStatus);
    echo json_encode(array(
        'ID' => $post_id,
        'featured_status' => $toggleStatus,
        'gc_total_feature' => gc_total_feature()
    ));
    die();
}

add_action('wp_ajax_gc_toggle_feature_post', 'gc_toggle_feature_post');

