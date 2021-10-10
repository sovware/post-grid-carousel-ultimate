<?php  
$display_pagination         = ! empty( $display_pagination   ) ? $display_pagination   : 'yes';
$pagination_type            = ! empty( $pagination_type   ) ? $pagination_type   : 'number';
?>
<div id="tab-4" class="adl-tab-content">
    <div class="cmb2-wrap form-table">

        <table class="cmb2-metabox">
            
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
                <th><label for="gc[display_pagination]"><?php esc_html_e('Display Pagination', PGCU_TEXTDOMAIN); ?></label></th>
                <td>
                    <ul class="cmb2-radio-list cmb2-list cmb2-radio-switch">
                        <li>
                            <input type="radio" class="cmb2-option cmb2-radio-switch1" name="gc[display_pagination]" id="gc[display_pagination1]" value="yes" <?php checked( 'yes', $display_pagination, true ); ?>>
                            <label for="gc[display_pagination1]"><?php esc_html_e('Yes', PGCU_TEXTDOMAIN); ?></label>
                        </li>
                        <li>
                            <input type="radio" class="cmb2-option cmb2-radio-switch2" name="gc[display_pagination]" id="gc[display_pagination2]" value="no" <?php checked( 'no', $display_pagination, true ); ?>>
                            <label for="gc[display_pagination2]"><?php esc_html_e('No', PGCU_TEXTDOMAIN); ?></label>
                        </li>
                    </ul>
                </td>
            </tr>

            <tr>
                <th><label for="sel5"><?php esc_html_e('Pagination Type', PGCU_TEXTDOMAIN); ?></label></th>
                <td>
                    <select  name="gc[pagination_type]">
                        <option value="number" <?php selected( $pagination_type, 'number' ); ?>>Number Pagination</option>
                        <option value="ajax" <?php selected( $pagination_type, 'ajax' ); ?> >Ajax Pagination</option>
                    </select>

                </td>
            </tr>

            <tr>
                <th>
                    <label for="gc[pagi_color]"><?php esc_html_e('Pagination Color', PGCU_TEXTDOMAIN); ?></label>
                </th>
                <td>
                    <input type="text" name="gc[pagi_color]" class="cpa-color-picker" value="<?php echo ! empty( $pagi_color ) ? $pagi_color : '#333'; ?>" />
                </td>
            </tr>   

            <tr>
                <th>
                    <label for="gc[pagi_border_color]"><?php esc_html_e( 'Pagination Border Color', PGCU_TEXTDOMAIN ); ?></label>
                </th>
                <td>
                    <input type="text" name="gc[pagi_border_color]" class="cpa-color-picker" value="<?php echo ! empty( $pagi_border_color ) ? $pagi_border_color : '#e4e4e4'; ?>" />
                </td>
            </tr>

            <tr>
                <th>
                    <label for="gc[pagi_back_color]"><?php esc_html_e('Pagination Background Color', PGCU_TEXTDOMAIN); ?></label>
                </th>
                <td>
                    <input type="text" name="gc[pagi_back_color]" class="cpa-color-picker" value="<?php echo ! empty( $pagi_back_color ) ? $pagi_back_color : '#fff'; ?>" />
                </td>
                
            </tr> 

            <tr>
                <th>
                    <label for="gc[pagi_hover_color]"><?php esc_html_e( 'Pagination Hover Color', PGCU_TEXTDOMAIN ); ?></label>
                </th>
                <td>
                    <input type="text" name="gc[pagi_hover_color]" class="cpa-color-picker" value="<?php echo ! empty( $pagi_hover_color ) ? $pagi_hover_color : '#fff'; ?>" />
                    
                </td>
                
            </tr> 

            <tr>
                <th>
                    <label for="gc[pagi_hover_border_color]"><?php esc_html_e( 'Pagination Hover Border Color', PGCU_TEXTDOMAIN ); ?></label>
                </th>
                <td>
                    <input type="text" name="gc[pagi_hover_border_color]" class="cpa-color-picker" value="<?php echo ! empty( $pagi_hover_border_color ) ? $pagi_hover_border_color : '#ff5500'; ?>" />
                    
                </td>
                
            </tr>

            <tr>
                <th>
                    <label for="gc[pagi_hover_back_color]"><?php esc_html_e( 'Pagination Hover Background Color', PGCU_TEXTDOMAIN ); ?></label>
                </th>
                <td>
                    <input type="text" name="gc[pagi_hover_back_color]" class="cpa-color-picker" value="<?php echo ! empty( $pagi_hover_back_color ) ? $pagi_hover_back_color : '#ff5500'; ?>" />
                    
                </td>
            </tr>

            <tr>
                <th>
                    <label for="gc[pagi_active_color]"><?php esc_html_e( 'Pagination Active Color', PGCU_TEXTDOMAIN ); ?></label>
                </th>
                <td>
                    <input type="text" name="gc[pagi_active_color]" class="cpa-color-picker" value="<?php echo ! empty( $pagi_active_color ) ? $pagi_active_color : '#fff'; ?>" />
                    
                </td>
            </tr>

            <tr>
                <th>
                    <label for="gc[pagi_active_border_color]"><?php esc_html_e( 'Pagination Active Border Color', PGCU_TEXTDOMAIN ); ?></label>
                </th>
                <td>
                    <input type="text" name="gc[pagi_active_border_color]" class="cpa-color-picker" value="<?php echo ! empty( $pagi_active_border_color ) ? $pagi_active_border_color : '#ff5500'; ?>" />
                    
                </td>
            </tr>

            <tr>
                <th>
                    <label for="gc[pagi_active_back_color]"><?php esc_html_e( 'Pagination Active Background Color', PGCU_TEXTDOMAIN ); ?></label>
                </th>
                <td>
                    <input type="text" name="gc[pagi_active_back_color]" class="cpa-color-picker" value="<?php echo ! empty( $pagi_active_back_color ) ? $pagi_active_back_color : '#ff5500'; ?>" />
                    
                </td>
            </tr>

        </table>
    </div>
</div>   