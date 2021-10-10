<div class="pgcu-post <?php echo ( 'carousel' == $layout ) ? 'swiper-slide' : ''; ?>">
    <div class="pgcu-post__content pgcu-post__content--center">
        <?php if( ! empty( $pgcu_img ) ) { ?>
            <div class="pgcu-post__img">
                <a href="<?php echo get_the_permalink(); ?>">
                    <img src="<?php echo $pgcu_img; ?>" alt="<?php echo get_the_title(); ?>">
                </a>

                <div class="pgcu-post__img__upper-content pgcu-post__img__upper-content--bottom">
                    <div class="pgcu-post__meta__categories pgcu-post__meta__categories--badge">
                        <a href="" class="pgcu-post__badge">Business</a>
                        <a href="" class="pgcu-post__badge">Technology</a>
                        <div class="pgcu-post__meta__categories-more">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg></span>
                            <div>
                                <a href="">Food</a>
                                <a href="">Travel</a>
                                <a href="">Hotel</a>
                                <a href="">Restaurants</a>
                            </div>
                        </div>
                    </div>
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
