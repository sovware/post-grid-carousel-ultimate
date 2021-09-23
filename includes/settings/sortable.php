<div id="tab-5" class="tab-content">
                            <table class="form-table">
                                 
                                <tr>
                                        <th><label for="gc[g_sort]"><?php esc_html_e('Select Sortable Grid Type', PGCU_TEXTDOMAIN); ?></label></th>
                                        <td>
                                            <select id="gc[g_sort]" name="gc[g_sort]">
                                                    <option value="cat">Category</option>
                                                    <option value="tag" <?php if(!empty($g_sort) && $g_sort == "tag"){ echo "selected";}?>>Tag</option>
                                                    
                                            </select>
                                        </td>
                                </tr> 

                                <tr>
                                        <th><label for=""><?php esc_html_e('Select Theme', PGCU_TEXTDOMAIN); ?></label></th>
                                        <td>
                                            <select id="gc[c_theme]" name="gc[c_theme]">
                                                    <option disabled>Theme-1 (Pro)</option>
                                                    <option disabled>Theme-2 (Pro)</option>
                                                    
                                                    
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