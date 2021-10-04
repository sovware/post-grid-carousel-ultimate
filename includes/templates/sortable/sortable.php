<?php if( $terms ) { ?>
<div class="pgcu-post-sortable__nav">
    <a href="" class="pgcu-post-sortable__btn pgcu-post-sortable__btn--active" data-sortable-nav="all">All (<?php echo $posts->found_posts; ?>)</a>

    <?php foreach( $terms as $term ) { ?>
        <a href="" class="pgcu-post-sortable__btn" data-sortable-nav="<?php echo $term->term_id; ?>"><?php echo $term->name; ?> (<?php echo $term->count; ?>)</a>
    <?php } ?>
    
</div>
<?php } ?>