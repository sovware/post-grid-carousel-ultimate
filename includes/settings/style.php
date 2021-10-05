<div id="tab-6" class="adl-tab-content">
    <div class="cmb2-wrap form-table">

        <table class="cmb2-metabox">

            <tr>
                <th><label for="gc[post_title_color]"><?php esc_html_e('Post Title Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[post_title_color]" id="gc[post_title_color]" class="cpa-color-picker" value="<?php echo ! empty( $post_title_color ) ? $post_title_color : '#030213'; ?>" />

                </td>

            </tr>

            <tr>
                <th><label for="gc[post_title_hover_color]"><?php esc_html_e('Post Title Hover Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[post_title_hover_color]" id="gc[post_title_hover_color]" class="cpa-color-picker" value="<?php echo ! empty( $post_title_hover_color ) ? $post_title_hover_color : '#F31C1C'; ?>" >

                </td>
            </tr>

            <tr>
                <th><label for="gc[post_content_color]"><?php esc_html_e('Post Content Color', PGCU_TEXTDOMAIN); ?></label></th>
                <td><input type="text" name="gc[post_content_color]" id="gc[post_content_color]" class="cpa-color-picker" value="<?php echo ! empty( $post_content_color ) ? $post_content_color : '#63666D'; ?>" />

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