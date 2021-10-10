
<div class="pgcu-post <?php echo ( 'carousel' == $layout ) ? 'swiper-slide' : ''; ?>">
    <div class="pgcu-post__content">
        <div class="pgcu-post__details">
            <?php if( 'yes' == $display_title ) { ?>
                <h2 class="pgcu-post__title">
                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h2>
            <?php } ?>

            <?php if( 'yes' == $display_content ) { ?>
                <p class="pgcu-post__excerpt">
                <?php echo wp_trim_words( get_the_content(), $content_word_limit );?>
                </p>
            <?php } ?>

            <div class="pgcu-post__author pgcu-d-flex pgcu-flex-align-center">
                <div>
                    <a href=""><img src="https://via.placeholder.com/34x34" alt=""></a>
                </div>
                <div>
                    <?php if( 'yes' == $display_author ) { ?>
                        <div class="pgcu-post__meta__author">
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' )))?>">
                                <?php echo ucfirst( get_the_author() );?>
                            </a>
                        </div>
                    <?php } ?>
                    <ul class="pgcu-post__meta pgcu-post__meta--dots">
                        <?php if( 'yes' == $display_date ) { ?>
                            <li><a><?php echo get_the_date(); ?></a></li>
                        <?php } ?>
                        <li class="pgcu-post__meta__ert"> <!-- ert: Estimated reading time -->
                            <span>6 Min Read</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div><!-- ends: .pgcu-post__details -->
    </div><!-- ends: .pgcu-post__content -->
</div><!-- ends: .pgcu-post -->
