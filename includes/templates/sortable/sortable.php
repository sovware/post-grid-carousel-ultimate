<?php if( $terms ) { ?>
<div class="pgcu-post-sortable__nav" style="
    --pgcu-sortMenuTextColor: <?php echo $sortable_menu_text_color; ?>;
    --pgcu-sortMenuActiveBackColor: <?php echo $sortable_menu_active_back_color; ?>;
    --pgcu-sortMenuActiveTextColor: <?php echo $sortable_menu_active__text_color; ?>;
">
    <a href="" class="pgcu-post-sortable__btn pgcu-post-sortable__btn--active" data-sortable-nav="all">All (<?php echo $posts->found_posts; ?>)</a>

    <?php foreach( $terms as $term ) { ?>

        <a class="pgcu-post-sortable__btn" data-query="<?php echo json_encode( $posts->query_vars ); ?>" data-id="<?php echo ! empty( $post_id ) ? $post_id : ''; ?>" data-sortable-nav="<?php echo $term->term_id; ?>"><?php echo $term->name; ?> (<?php echo $term->count; ?>)</a>

    <?php } ?>
    
</div>
<?php } ?>
