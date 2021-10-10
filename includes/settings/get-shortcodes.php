<div id="tab-1" class="adl-tab-content" style="display: block">
    <div class="cmb2-wrap form-table">
        <div class="lcsp-withoutTab-content">
            <div class="cmb2-wrap form-table">
                <div id="cmb2-metabox">
                    <div class="cmb2-metabox-content">
                        <div class="cmb2-metabox-card cmb2-metabox-card2">
                            <h6><?php esc_html_e('Shortcode',PGCU_TEXTDOMAIN); ?></h6>
                            <p><?php esc_html_e('Copy this shortcode and paste on page or post where you want to display post grid,carousel and sortable grid.Use PHP code to your themes file to display post grid.',PGCU_TEXTDOMAIN); ?>
                            </p>
                            <div class="cmb2-metabox-card-textarea">
                                <textarea onClick="this.select();">[pgcu <?php echo 'id="'.$post->ID.'"';?>]</textarea>
                            </div>
                        </div>
                        <div class="cmb2-metabox-card cmb2-metabox-card3">
                            <h6><?php esc_html_e('PHP Code:',PGCU_TEXTDOMAIN); ?></h6>
                            <div class="cmb2-metabox-card-textarea">
                                <textarea
                                    onClick="this.select();"><?php echo '<?php echo do_shortcode("[pgcu id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div> <!-- end cmb2-metabox -->
            </div> <!-- end cmb2-wrap -->
        </div> <!-- end lcsp-tab-2 -->
    </div>
</div>