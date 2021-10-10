<div class="pgcu-post <?php echo ( 'carousel' == $layout ) ? 'swiper-slide' : ''; ?>">
    <div class="pgcu-post__content">
        <?php if( ! empty( $pgcu_img ) ) { ?>
            <div class="pgcu-post__img">
                <a href="<?php echo get_the_permalink(); ?>">
                    <img src="<?php echo $pgcu_img; ?>" alt="<?php echo get_the_title(); ?>">
                </a>

                <div class="pgcu-post__img__upper-content pgcu-post__img__upper-content--bottom">
                    <?php if( 'yes' == $display_title ) { ?>
                        <h2 class="pgcu-post__title">
                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </h2>
                    <?php } ?>
                    <ul class="pgcu-post__meta pgcu-post__meta--divider">
                        <?php if( 'yes' == $display_date ) { ?>
                            <li>
                                <div class="pgcu-post__meta__date">
                                    <a><?php echo get_the_date(); ?></a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div><!-- ends: .pgcu-post__img__upper-content -->
            </div>
        <?php } ?>
    </div><!-- ends: .pgcu-post__content -->
</div><!-- ends: .pgcu-post -->
