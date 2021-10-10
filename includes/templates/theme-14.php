
<div class="pgcu-post pgcu-post--rounded-border <?php echo ( 'carousel' == $layout ) ? 'swiper-slide' : ''; ?>">
    <div class="pgcu-post__content pgcu-post__content--center">

        <?php if( ! empty( $pgcu_img ) ) { ?>
            <div class="pgcu-post__img">
                <a href="<?php echo get_the_permalink(); ?>">
                    <img src="<?php echo $pgcu_img; ?>" alt="<?php echo get_the_title(); ?>">
                </a>
            </div>
        <?php } ?>

        <div class="pgcu-post__details">
            <div class="pgcu-post__meta__categories pgcu-post__meta__categories--box-white">
                <a href="">Business</a>
                <a href="">Technology</a>
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
                <?php if( 'yes' == $display_author ) { ?>
                    <li>
                        <div class="pgcu-post__meta__author">
                            <span>By</span>
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' )))?>">
                                <?php echo ucfirst( get_the_author() );?>
                            </a>
                        </div>
                    </li>
                <?php } ?>

                <?php if( 'yes' == $display_date ) { ?>
                    <li>
                        <div class="pgcu-post__meta__date">
                            <a><?php echo get_the_date(); ?></a>
                        </div>
                    </li>
                <?php } ?>
            </ul>

            <div class="pgcu-post__meta-boxed pgcu-d-flex pgcu-flex-center">
                <ul class="pgcu-post__meta pgcu-post__meta--has-icon">
                    <li>
                        <div class="pgcu-post__meta__views">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"/></svg>
                            <span><?php echo ! empty( $post_views ) ? $post_views : 0; ?></span>
                        </div>
                    </li>
                    <li>
                        <div class="pgcu-post__meta__comments">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"/></svg>
                            <span><?php echo get_comments_number(); ?></span>
                        </div>
                    </li>
                    <li>
                        <div class="pgcu-post__meta__favorite">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"/></svg>
                            <span>98</span>
                        </div>
                    </li>
                </ul>
            </div>

        </div><!-- ends: .pgcu-post__details -->
    </div><!-- ends: .pgcu-post__content -->
</div><!-- ends: .pgcu-post -->
