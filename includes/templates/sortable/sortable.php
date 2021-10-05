<?php if( $terms ) { ?>
<div class="pgcu-post-sortable__nav" style="
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
    <a href="" class="pgcu-post-sortable__btn pgcu-post-sortable__btn--active" data-sortable-nav="all">All (<?php echo $posts->found_posts; ?>)</a>

    <?php foreach( $terms as $term ) { ?>

        <a class="pgcu-post-sortable__btn" data-query="<?php echo json_encode( $posts->query_vars ); ?>" data-id="<?php echo ! empty( $post_id ) ? $post_id : ''; ?>" data-sortable-nav="<?php echo $term->term_id; ?>"><?php echo $term->name; ?> (<?php echo $term->count; ?>)</a>

    <?php } ?>
    
</div>
<?php } ?>
