<div id="tab-3" class="adl-tab-content">

    <div class="cmb2-wrap form-table">
        <table class="cmb2-metabox">

            <tr>
                <th><label for="gc[post_column]"><?php esc_html_e('Post Column', PGCU_TEXTDOMAIN); ?></label></th>
                <td>
                    <input type='number' class="cmb2-text-medium" name="gc[post_column]" value="<?php if(empty($post_column)) { echo intval(3);}else{ echo $post_column;}?>"/>
                    
                </td>
            </tr>
            <tr>
                <th><label for="gc[post_column_tablet]"><?php esc_html_e('Post column on Tablet', PGCU_TEXTDOMAIN); ?></label></th>
                <td>
                    <input type='number' class="cmb2-text-medium" name="gc[post_column_tablet]" id="gc[post_column_tablet]" value="<?php if(empty($post_column_tablet)) { echo intval(2);}else{ echo $post_column_tablet;}?>" />
                    
                </td>
            </tr>

            <tr>
                <th><label for="gc[post_column_mobile]"><?php esc_html_e('Post column on Mobile', PGCU_TEXTDOMAIN); ?></label></th>
                <td>
                    <input type='number' class="cmb2-text-medium" name="gc[post_column_mobile]" id="gc[post_column_mobile]" value="<?php if(empty($post_column_mobile)) { echo intval(1);}else{ echo $post_column_mobile;}?>" />
                    
                </td>
            </tr>  
            <tr>
                <th><label for="gc[c_autoplay]"><?php esc_html_e('Autoplay Pause', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="checkbox" id="gc[c_autoplay]" name="gc[c_autoplay]" value="off" <?php if( !empty($c_autoplay)) { checked( 'off', $c_autoplay); } ?>/>
                    
                    
                </td>
                
            </tr>

            <tr>
                <th><label for="gc[c_autoplay_speed]"><?php esc_html_e('Autoplay Speed', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="number" class="cmb2-text-medium" id="gc[c_autoplay_speed]" name="gc[c_autoplay_speed]" value="<?php if(empty($c_autoplay_speed)) { echo intval(3000);}else{ echo $c_autoplay_speed;}?>"/><span class="description">(Millisecond)</span>
                    
                </td>
                
            </tr>

            <tr>
                <th><label for="gc[c_autoplay_time]"><?php esc_html_e('Autoplay Timeout', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="number" class="cmb2-text-medium" id="gc[c_autoplay_time]" name="gc[c_autoplay_time]" value="<?php if(empty($c_autoplay_time)) { echo intval(2000);}else{ echo $c_autoplay_time;}?>"/><span class="description">(Millisecond)</span>
                    
                </td>
                
            </tr>

            <tr>
                <th><label for="gc[c_pause_hover]"><?php esc_html_e('Pause on Hover', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="checkbox" id="gc[c_pause_hover]" name="gc[c_pause_hover]" value="on" <?php if( !empty($c_pause_hover)) { checked( 'on', $c_pause_hover); } ?> />
                    
                </td>
                
            </tr>                              

            
            <tr>
                <th><label for="gc[mouse_draggable]"><?php esc_html_e('Mouse Draggable', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="checkbox" name="gc[mouse_draggable]" id="gc[mouse_draggable]" value="off" <?php if( !empty($mouse_draggable)) { checked( 'off', $mouse_draggable); } ?>/>
                    
                </td>
                
            </tr>
        </table>
    </div>
    
</div>