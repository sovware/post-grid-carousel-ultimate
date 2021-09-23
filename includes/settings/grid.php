<!-- all grid content -->
<div id="tab-4" class="tab-content">
    <table class="form-table">
        
        

        <tr>
            <th><label for="gc[g_column]"><?php esc_html_e('Select Columns', PGCU_TEXTDOMAIN); ?></label></th>
            <td>
                <select id="gc[g_column]" name="gc[g_column]">
                    <option value="3">Column-3</option>
                    <option value="1" <?php if(!empty($g_column) && $g_column == "1"){ echo "selected";}?>>Column-1</option>
                    <option value="2" <?php if(!empty($g_column) && $g_column == "2"){ echo "selected";}?>>Column-2</option>
                    <option value="4" <?php if(!empty($g_column) && $g_column == "4"){ echo "selected";}?>>Column-4</option>
                </select>
                
            </td>
        </tr>

        <tr>
            <th><label for="gc[g_tablet]"><?php esc_html_e('Select Columns for Tablet', PGCU_TEXTDOMAIN); ?></label></th>
            <td>
                <select id="gc[g_tablet]" name="gc[g_tablet]">
                    <option value="2">Column-2</option>
                    <option value="1" <?php if(!empty($g_tablet) && $g_tablet == "1"){ echo "selected";}?>>Column-1</option>
                    <option value="3" <?php if(!empty($g_tablet) && $g_tablet == "3"){ echo "selected";}?>>Column-3</option>
                    <option value="4" <?php if(!empty($g_tablet) && $g_tablet == "4"){ echo "selected";}?>>Column-4</option>
                </select>
                
            </td>
        </tr>

        <tr>
            <th><label for="gc[g_mobile]"><?php esc_html_e('Select Columns for Mobile', PGCU_TEXTDOMAIN); ?></label></th>
            <td>
                <select id="gc[g_mobile]" name="gc[g_mobile]">
                    <option value="1">Column-1</option>
                    <option value="2" <?php if(!empty($g_mobile) && $g_mobile == "2"){ echo "selected";}?>>Column-2</option>
                    <option value="3" <?php if(!empty($g_mobile) && $g_mobile == "3"){ echo "selected";}?>>Column-3</option>
                    <option value="4" <?php if(!empty($g_mobile) && $g_mobile == "4"){ echo "selected";}?>>Column-4</option>
                </select>
                
            </td>
        </tr>

        <tr>
            <th>
                <label for="gc[pagi_hide]"><?php esc_html_e('Pagination Hide', PGCU_TEXTDOMAIN); ?></label>
            </th>
            <td>
                <label class="switch"> 
                    <input type="checkbox" name="gc[pagi_hide]" id="gc[pagi_hide]" value="true" <?php if( !empty($pagi_hide)) { checked( 'true', $pagi_hide); } ?>>
                    <span class="slider round"></span>
                </label>
                    
            </td>
        </tr>

        <tr>
            <th>
                <label for="gc[pagi_text_color]"><?php esc_html_e('Pagination Text Color', PGCU_TEXTDOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="gc[pagi_text_color]" class="cpa-color-picker" value="<?php if(empty($pagi_text_color)) { echo "#000000";}else{ echo $pagi_text_color;}?>" />
                
            </td>
            
        </tr>   

        <tr>
            <th>
                <label for="gc[pagi_text_hover_color]"><?php esc_html_e('Pagination Text Hover Color', PGCU_TEXTDOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="gc[pagi_text_hover_color]" class="cpa-color-picker" value="<?php if(empty($pagi_text_hover_color)) { echo "#FF0000";}else{ echo $pagi_text_hover_color;}?>" />
                
            </td>
            
        </tr>  

        <tr>
            <th>
                <label for="gc[pagi_text_active_color]"><?php esc_html_e('Pagination Active Text Color', PGCU_TEXTDOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="gc[pagi_text_active_color]" class="cpa-color-picker" value="<?php if(empty($pagi_text_active_color)) { echo "#ffffff";}else{ echo $pagi_text_active_color;}?>" />
                
            </td>
            
        </tr> 

        <tr>
            <th>
                <label for="gc[pagi_active_back_color]"><?php esc_html_e('Pagination Active Background Color', PGCU_TEXTDOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="gc[pagi_active_back_color]" class="cpa-color-picker" value="<?php if(empty($pagi_active_back_color)) { echo "#dda146";}else{ echo $pagi_active_back_color;}?>" />
                
            </td>
            
        </tr> 
    </table>
</div>   