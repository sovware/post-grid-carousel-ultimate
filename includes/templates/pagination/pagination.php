<?php if( 'number' == $pagination_type ) { ?>
    <!-- .pgcu-pagination--left/.pgcu-pagination--right -->
    <div class="pgcu-pagination" style="
        --pgcu-pagColor: <?php echo $pagi_color; ?>;
        --pgcu-pagColorHover: <?php echo $pagi_hover_color; ?>;
        --pgcu-pagBorderColor: <?php echo $pagi_border_color; ?>;
        --pgcu-pagBorderColorHover: <?php echo $pagi_hover_border_color; ?>;
        --pgcu-pagBgColor: <?php echo $pagi_back_color; ?>;
        --pgcu-pagBgColorHover: <?php echo $pagi_hover_back_color; ?>;
        --pgcu-pagActiveColor: <?php echo $pagi_active_color; ?>;
        --pgcu-pagActiveBorderColor: <?php echo $pagi_active_border_color; ?>;
        --pgcu-pagActiveBgColor: <?php echo $pagi_active_back_color; ?>;
    ">
        <?php
        echo pgcu_pagination( $posts, $paged );
        ?>
    </div>
<?php } elseif( 'ajax' == $pagination_type ) { ?>
    <div class="pgcu-loadmore-btn">
        <div class='pgcu_load_more' data-id='<?php echo $post_id; ?>'>Load More</div>
    </div>
<?php } ?>    