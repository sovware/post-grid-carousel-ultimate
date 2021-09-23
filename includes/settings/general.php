<!-- General settings -->
<div id="tab-2" class="tab-content">          

    <table class='form-table'>
        <tr>
            <th><label for="gc[post_type]"><?php esc_html_e('Post type', PGCU_TEXTDOMAIN); ?></label></th>
            <td>
                <select id="gc[post_type]" name="gc[post_type]">
                    <?php 
                    $custom_posts = get_post_types(array(
                        'public'=>true, 
                        ));
                    $exclude    = array( 'adl-shortcode','attachment', 'revision', 'nav_menu_item' );

                        foreach ( $exclude as $ex ) {
                            unset( $custom_posts[ $ex ] );
                        }

                    if(!empty($custom_posts)) {
                        foreach($custom_posts as $value){
                            ?>

                            <option value="<?php echo $value;?>" <?php if(!empty($post_type) && $post_type ==$value){ echo "selected";}?> ><?php echo $value;?></option>
                            <?php
                        }
                    }
                    ?>  
                </select>
                
            </td>

        </tr>

        <tr>
            <th><label for="sel5"><?php esc_html_e('Layout', PGCU_TEXTDOMAIN); ?></label></th>
            <td>
                <select  name="gc[layout]" id="sel5">
                    <option value="carousel">Carousel</option>
                    <option value="grid" <?php if(!empty($layout) && $layout == "grid"){ echo "selected";}?>>Grid</option>
                    <option value="isotope" <?php if(!empty($layout) && $layout == "isotope"){ echo "selected";}?>>Sortable Grid</option>
                    <option disabled>Masonry (Pro)</option>
                </select>
                
            </td>
        </tr>

        <tr>
            <th><label for="gc[theme]"><?php esc_html_e('Select Theme', PGCU_TEXTDOMAIN); ?></label></th>
            <td>
                <select id="gc[theme]" name="gc[theme]">
                    <option value="theme_1">Theme-1</option>
                    <option value="theme_2" <?php if(!empty($theme) && $theme == "theme_2"){ echo "selected"; } ?>>Theme-2</option>
                    <option value="theme_3" <?php if(!empty($theme) && $theme == "theme_3"){ echo "selected"; } ?>>Theme-3</option>
                    <option disabled>Theme-4(Pro)</option>
                    <option disabled>Theme-5(Pro)</option>
                    <option disabled>Theme-6(Pro)</option>
                    <option disabled>Theme-7(Pro)</option>
                    <option disabled>Theme-8(Pro)</option>
                    <option disabled>Theme-9(Pro)</option>
                    <option disabled>Theme-10(Pro)</option>
                    <option disabled>Theme-11(Pro)</option>
                    <option disabled>Theme-12(Pro)</option>
                    <option disabled>Theme-13(Pro)</option>
                    <option disabled>Theme-14(Pro)</option>
                    <option disabled>Theme-15(Pro)</option>
                    <option disabled>Theme-16(Pro)</option>
                    <option disabled>Theme-17(Pro)</option>
                    <option disabled>Theme-18(Pro)</option>
                    <option disabled>Theme-19(Pro)</option>
                    <option disabled>Theme-20(Pro)</option>
                    <option disabled>Theme-21(Pro)</option>
                </select>
            </td>
        </tr>

        <tr>
            <th><label for="gc[total_posts]"><?php esc_html_e('Total Posts', PGCU_TEXTDOMAIN); ?></label></th>
            <td>
                <input type='number' id="gc[total_posts]" name="gc[total_posts]" value="<?php if(empty($total_posts)) {echo '';
                }else{ echo $total_posts;}?>"/>
                
            </td>
        </tr>

        <tr>            
            <th><label for="gc[post_from]"><?php esc_html_e('Display Post From', PGCU_TEXTDOMAIN); ?></label>
            </th>
            <td>
                <select id="gc[post_from]" name="gc[post_from]">
                    <option value="latest" <?php if(!empty($post_from) && $post_from == "latest"){ echo "selected";}?>>Latest Posts</option>
                    <option value="older" <?php if(!empty($post_from) && $post_from == "older"){ echo "selected";}?>>Older Posts</option>
                    <option disabled>Feature Posts (Pro)</option>
                    <option disabled>Populer Posts (Pro)</option>
                    <option disabled>Random Posts (Pro)</option>
                    <option disabled>Posts by Category (Pro)</option>
                    <option disabled>Posts by Id (Pro)</option>
                    <option disabled>Posts by Tag (Pro)</option>
                    <option disabled>Posts by Year (Pro)</option>
                    <option disabled>Posts by Month (Pro)</option>
                </select>
                
            </td>
        </tr>

        <tr>
            <th><label for="gc[image_resize_crop]"><?php esc_html_e('Enable Image Resizing & Cropping', PGCU_TEXTDOMAIN); ?></label></th>
            <td><input type="radio" name="gc[image_resize_crop]" id="gc[image_resize_crop1]" value="yes" <?php if(empty($image_resize_crop) || 'no' !== $image_resize_crop) { echo 'checked'; } ?>> <label for="gc[image_resize_crop1]"><?php esc_html_e('Yes', PGCU_TEXTDOMAIN); ?></label> <br/>
                <input type="radio" name="gc[image_resize_crop]" id="gc[image_resize_crop2]" value="no" <?php if (!empty($image_resize_crop)) { checked('no', $image_resize_crop); } ?>> <label for="gc[image_resize_crop2]"><?php esc_html_e('No', PGCU_TEXTDOMAIN); ?></label>
                <p class="description">If the product images are not in the same size, this feature is helpful. It automatically resizes and crops. Note: your image must be higher than/equal to the cropping size set below. Otherwise, you may need to enable image upscaling feature from the settings below.</p>
            </td>
                    
        </tr>

        <tr>
            <th><label for="gc[image_ups]"><?php esc_html_e('Enable Image Upscaling', PGCU_TEXTDOMAIN); ?></label></th>
            <td><input type="radio" name="gc[image_ups]" id="gc[image_ups]" value="yes" <?php if(empty($image_ups) || 'no' !== $image_ups) { echo 'checked'; } ?>> <label for="gc[image_ups]"><?php esc_html_e('Yes', PGCU_TEXTDOMAIN); ?></label> <br/>
                <input type="radio" name="gc[image_ups]" id="gc[image_ups]" value="no" <?php if (!empty($image_ups)) { checked('no', $image_ups); } ?>> <label for="gc[image_ups]"><?php esc_html_e('No', PGCU_TEXTDOMAIN); ?></label>
                <p class="description"><?php esc_html_e('If the product image is less than the cropping size set above then by default, image will break. However, you can solve this problem by enabling upscaling.', PGCU_TEXTDOMAIN); ?></p>
            </td>
                    
        </tr>

        <tr>
            <th><label for="gc[image_width]"><?php esc_html_e('Image Width', PGCU_TEXTDOMAIN); ?></label></th>
            <td>
                <input type='number' id="gc[image_width]" name="gc[image_width]" value="<?php if(empty($image_width)) {echo '300';
                }else{ echo $image_width;}?>"/>
                <p class="description"><?php esc_html_e('Image cropping width.', PGCU_TEXTDOMAIN); ?></p>
            </td>
        </tr>

        <tr>
            <th><label for="gc[image_hight]"><?php esc_html_e('Image Height', PGCU_TEXTDOMAIN); ?></label></th>
            <td>
                <input type='number' id="gc[image_hight]" name="gc[image_hight]" value="<?php if(empty($image_hight)) {echo '200';
                }else{ echo $image_hight;}?>"/>
                <p class="description"><?php esc_html_e('Image cropping height.', PGCU_TEXTDOMAIN); ?></p>
            </td>
        </tr>

    </table>	

</div>