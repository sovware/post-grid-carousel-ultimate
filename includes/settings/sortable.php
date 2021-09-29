<?php  
$post_type            = ! empty( $post_type ) ? $post_type : 'post';
$g_sort               = ! empty( $g_sort    ) ? $g_sort    : 'category';
$terms                = get_object_taxonomies( (object) array( 'post_type' => $post_type, 'hide_empty' => false ) );
?>
<div id="tab-5" class="adl-tab-content">
    <div class="cmb2-wrap form-table">

        <table class="cmb2-metabox">
                
            <tr>
                <th><label for="gc[g_sort]"><?php esc_html_e('Select Sortable Grid Type', PGCU_TEXTDOMAIN); ?></label></th>
                <td>
                    <select id="gc[g_sort]" name="gc[g_sort]" class='pgcu_post_type_depend'>
                        <?php 
                        if( $terms ) {
                            foreach( $terms as $term ) {
                        ?>
                        <option value="<?php echo $term; ?>" <?php selected( $g_sort, $term ); ?>><?php echo $term; ?></option>
                        <?php } } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <th><label for="gc[grid_menu_back]"><?php esc_html_e('Sortable Menu Background Hover Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[grid_menu_back]" class="cpa-color-picker" value="<?php if(empty($grid_menu_back)) { echo "#ee5253";}else{ echo $grid_menu_back;}?>" />
                    
                </td>
                
            </tr>   

            <tr>
                <th><label for="gc[grid_menu_text]"><?php esc_html_e('Sortable Menu Text Hover Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[grid_menu_text]" class="cpa-color-picker" value="<?php if(empty($grid_menu_text)) { echo "#fff";}else{ echo $grid_menu_text;}?>" />
                    
                </td>
                
            </tr>  

            <tr>
                <th><label for="gc[grid_active_back]"><?php esc_html_e('Sortable Menu Background Active Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[grid_active_back]" class="cpa-color-picker" value="<?php if(empty($grid_active_back)) { echo "#ee5253";}else{ echo $grid_active_back;}?>" />
                    
                </td>
                
            </tr>   

            <tr>
                <th><label for="gc[grid_active_text]"><?php esc_html_e('Sortable Menu Text Active Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[grid_active_text]" class="cpa-color-picker" value="<?php if(empty($grid_active_text)) { echo "#fff";}else{ echo $grid_active_text;}?>" />
                    
                </td>
                
            </tr> 
        </table>
    </div>
</div>