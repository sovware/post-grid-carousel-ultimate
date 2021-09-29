<div id="tab-6" class="adl-tab-content">
    <div class="cmb2-wrap form-table">

        <table class="cmb2-metabox">
            <tr>
                <th><label for="gc[post_title]"><?php esc_html_e('Post Title Hide', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="checkbox" name="gc[post_title]" id="gc[post_title]" value="off" <?php if( !empty($post_title)) { checked( 'off', $post_title); } ?> />
                    
                </td>
            </tr>

            <tr>
                <th><label for="gc[post_title_color]"><?php esc_html_e('Post Title Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[post_title_color]" id="gc[post_title_color]" class="cpa-color-picker" value="<?php if(empty($post_title_color)) { echo "#33330E";}else{ echo $post_title_color;}?>" />
                    
                </td>
                
            </tr>

            <tr>
                <th><label for="gc[post_title_hover_color]"><?php esc_html_e('Post Title Hover Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[post_title_hover_color]" id="gc[post_title_hover_color]" class="cpa-color-picker" value="<?php if(empty($post_title_hover_color)) { echo "#1289A7";}else{ echo $post_title_hover_color;}?>" >
                    
                </td>
            </tr>

            <tr>
                <th><label for="gc[post_title_alignment]"><?php esc_html_e('Post Title Alignment', PGCU_TEXTDOMAIN); ?></label>
                </th>

                <td>    
                    
                    <select id="gc[post_title_alignment]" name="gc[post_title_alignment]">
                                <option>Default</option>
                                <option disabled>Left (Pro)</option>
                                <option disabled>Right (Pro)</option>
                                <option disabled>Center (Pro)</option>
                                <option disabled>Justify (Pro)</option>   
                    </select>
                        
                </td>
            </tr>

            <tr>
                <th><label for="gc[post_content]"><?php esc_html_e('Post Content Hide', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="checkbox" name="gc[post_content]" id="gc[post_content]" value="off" <?php if( !empty($post_content)) { checked( 'off', $post_content); } ?> />
                    
                </td>
            </tr>

            <tr>
                <th><label for="gc[post_content_color]"><?php esc_html_e('Post Content Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[post_content_color]" id="gc[post_content_color]" class="cpa-color-picker" value="<?php if(empty($post_content_color)) { echo "#6e7387";}else{ echo $post_content_color;}?>" />
                    
                </td> 
            </tr>

            <tr>
                <th><label for="gc[post_content_alignment]"><?php esc_html_e('Post Content Alignment', PGCU_TEXTDOMAIN); ?></label>
                </th>

                <td>    
                    
                    <select id="gc[post_content_alignment]" name="gc[post_content_alignment]">
                                <option value="">Default</option>
                                <option disabled>Left (Pro)</option>
                                <option disabled>Right (Pro)</option>
                                <option disabled>Center (Pro)</option>
                                <option disabled>Justify (Pro)</option>   </select>
                    
                </td>

            </tr>

            <tr>
                <th><label for="gc[post_author_name]"><?php esc_html_e('Post Author Name Hide', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="checkbox" name="gc[post_author_name]" id="gc[post_author_name]" value="off" <?php if( !empty($post_author_name)) { checked( 'off', $post_author_name); } ?> />
                    
                </td>
            </tr>

            <tr>
                <th><label for="gc[post_date]"><?php esc_html_e('Post Date Hide', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="checkbox" name="gc[post_date]" id="gc[post_date]" value="off" <?php if( !empty($post_date)) { checked( 'off', $post_date); } ?> />
                    
                </td>
            </tr>

            <tr>
                <th><label for="gc[read_more]"><?php esc_html_e('Read More Hide', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="checkbox" name="gc[read_more]" id="gc[read_more]" value="off" <?php if( !empty($read_more)) { checked( 'off', $read_more); } ?> />

                </td>
            </tr>

            <tr>
                <th><label for="gc[read_more_color]"><?php esc_html_e('Read More Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[read_more_color]" id="gc[read_more_color]" class="cpa-color-picker" value="<?php if(empty($read_more_color)) { echo "#33330E";}else{ echo $read_more_color;}?>" />
                    
                </td> 
            </tr>

            <tr>
                <th><label for="gc[read_more_back_color]"><?php esc_html_e('Read More Background Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[read_more_back_color]" id="gc[read_more_back_color]" class="cpa-color-picker" value="<?php if(empty($read_more_back_color)) { echo "#fff";}else{ echo $read_more_back_color;}?>" />

                </td>
            </tr>

            <tr>
                <th><label for="gc[read_more_border_color]"><?php esc_html_e('Read More Border Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[read_more_border_color]" id="gc[read_more_border_color]" class="cpa-color-picker" value="<?php if(empty($read_more_border_color)) { echo "#e4e4ed";}else{ echo $read_more_border_color;}?>" />

                </td>
            </tr>

            <tr>
                <th><label for="gc[read_more_hover_color]"><?php esc_html_e('Read More Hover  Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[read_more_hover_color]" id="gc[read_more_hover_color]" class="cpa-color-picker" value="<?php if(empty($read_more_hover_color)) { echo "#dd3333";}else{ echo $read_more_hover_color;}?>" />
                    
                </td> 
            </tr>

            <tr>
                <th><label for="gc[read_more_hover_back_color]"><?php esc_html_e('Read More Hover Background Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[read_more_hover_back_color]" id="gc[read_more_hover_back_color]" class="cpa-color-picker" value="<?php if(empty($read_more_hover_back_color)) { echo "#1289A7";}else{ echo $read_more_hover_back_color;}?>" />
                    
                </td> 
            </tr>
        </table>

    </div>
    
</div>