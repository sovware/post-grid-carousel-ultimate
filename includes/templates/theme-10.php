
<div class="pgcu-post <?php echo ( 'carousel' == $layout ) ? 'swiper-slide' : ''; ?>">
    <div class="pgcu-post__content">

        <?php if( ! empty( $pgcu_img ) ) { ?>
            <div class="pgcu-post__img <?php echo 'yes' == $img_hover_effect ? $img_animation_class : ''; ?>">
                <a href="<?php echo get_the_permalink(); ?>">
                    <img src="<?php echo $pgcu_img; ?>" alt="<?php echo get_the_title(); ?>">
                </a>
            </div>
        <?php } ?>

        <div class="pgcu-post__details">
            <?php if( 'yes' == $display_title ) { ?>
                <h2 class="pgcu-post__title">
                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h2>
            <?php } ?>

            <div class="pgcu-post__author pgcu-d-flex pgcu-flex-align-center">

                <?php if( 'yes' == $display_author ) { ?>
                <div>
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><img src="<?php echo $author_img; ?>" alt=""></a>
                </div>
                <?php } ?>

                <div>
                    <ul class="pgcu-post__meta pgcu-post__meta--dots">
                        <?php if( 'yes' == $display_author ) { ?>
                            <li class="pgcu-post__meta__author">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' )))?>">
                                    <?php echo ucfirst( get_the_author() );?>
                                </a>
                        </li>
                        <?php } ?>
                        <?php if( 'yes' == $display_date ) { ?>
                            <li>
                                <a><?php echo get_the_date(); ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <?php if( 'yes' == $display_content ) { ?>
                <p class="pgcu-post__excerpt">
                <?php echo wp_trim_words( get_the_content(), $content_word_limit );?>
                </p>
            <?php } ?>

            <div class="pgcu-d-flex pgcu-d-flex-wrap pgcu-space-between">
                <?php if( 'yes' == $display_read_more ) { ?>
                    <a href="<?php echo get_the_permalink(); ?>"
                        class="pgcu-read-more <?php echo ( 'link' == $read_more_type ) ? 'pgcu-post__readmore' : 'pgcu-button pgcu-button--rounded'; ?>">
                        <?php echo $read_more_text; ?>
                        <?php if( 'link' == $read_more_type ) { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z" />
                            </svg>
                        <?php } ?>
                    </a>
                <?php } ?>
                <div class="pgcu-post__meta__ert"> <!-- ert: Estimated reading time -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
                    <span><?php echo pgcu_site_estimated_reading_time( get_the_content( )); ?> Min Read</span>
                </div>
            </div>

        </div><!-- ends: .pgcu-post__details -->
    </div><!-- ends: .pgcu-post__content -->
</div><!-- ends: .pgcu-post -->
