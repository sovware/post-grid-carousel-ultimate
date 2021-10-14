
<div class="pgcu-post <?php echo ( 'carousel' == $layout ) ? 'swiper-slide' : ''; ?>">
    <div class="pgcu-post__content">

        <?php if( ! empty( $pgcu_img ) ) { ?>
            <div class="pgcu-post__img">
                <a href="<?php echo get_the_permalink(); ?>">
                    <img src="<?php echo $pgcu_img; ?>" alt="<?php echo get_the_title(); ?>">
                </a>
            </div>
        <?php } ?>


        <div class="pgcu-post__details">

            <?php if( 'yes' == $display_term && ! empty( $get_terms ) ) { ?>
                <div class="pgcu-post__meta__categories pgcu-post__meta__categories--badge">
                    <a class="pgcu-post__badge"><?php echo $get_terms[0]->name; ?></a>

                    <?php if( 1 < count( $get_terms ) ) { ?>
                    <a class="pgcu-post__badge"><?php echo $get_terms[1]->name; ?></a>
                    <?php } ?>

                    <?php if( 2 < count( $get_terms ) ) { ?>
                        <div class="pgcu-post__meta__categories-more">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg></span>
                            <div>
                            <?php foreach( array_slice( $get_terms, 2 ) as $term ) { ?>
                                    <a><?php echo $term->name; ?></a>
                            <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

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

            <?php if( 'yes' == $display_read_more ) { ?>
                <a href="<?php echo get_the_permalink(); ?>"
                    class="<?php echo ( 'link' == $read_more_type ) ? 'pgcu-post__readmore pgcu-mb-15' : 'pgcu-button pgcu-button--rounded pgcu-mb-20'; ?>">
                    <?php echo $read_more_text; ?>
                    <?php if( 'link' == $read_more_type ) { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z" />
                        </svg>
                    <?php } ?>
                </a>
            <?php } ?>

            <div class="pgcu-post__author pgcu-d-flex pgcu-flex-align-center">
                <?php if( 'yes' == $display_author ) { ?>
                    <div>
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><img src="<?php echo $author_img; ?>" alt=""></a>
                    </div>
                <?php } ?>
                <div>
                    <ul class="pgcu-post__meta pgcu-post__meta--divider">
                        <?php if( 'yes' == $display_author ) { ?>
                            <li class="pgcu-post__meta__author">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' )))?>">
                                    <?php echo ucfirst( get_the_author() );?>
                                </a>
                        </li>
                        <?php } ?>
                        <?php if( 'yes' == $display_date ) { ?>
                            <li>
                                <a href=""><?php echo get_the_date(); ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div><!-- ends: .pgcu-post__details -->
    </div><!-- ends: .pgcu-post__content -->
</div><!-- ends: .pgcu-post -->
