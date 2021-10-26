<?php

get_header(); ?>

    <!--? slider Area Start -->
    <div class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
			<?php if ( have_rows( 'slider_home' ) ): ?>
				<?php while ( have_rows( 'slider_home' ) ): the_row();
					$image   = get_sub_field( 'photo' );
					$title   = get_sub_field( 'title' );
					$content = get_sub_field( 'content' );
					$link    = get_sub_field( 'link' );
					?>
                    <div class="single-slider slider-height d-flex align-items-center slide-bg">
                        <div class="container">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                    <div class="hero__caption">
                                        <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms"><?php echo $title ?></h1>
                                        <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms"><?php echo $content ?></p>
                                        <!-- Hero-btn -->
                                        <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                            <a href="<?php echo $link ?>" class="btn hero-btn"><?php _e( 'Shop Now' ) ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                                    <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                        <img src="<?php echo $image ?>" alt="<?php echo $title ?>" class="heartbeat">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- ? New Product Start -->
    <section class="new-product-area section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle mb-70">
                        <h2><?php the_field( 'worker_title' ) ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
				<?php if ( have_rows( 'home_worker' ) ): ?>
					<?php while ( have_rows( 'home_worker' ) ): the_row();
						$image    = get_sub_field( 'photo' );
						$name     = get_sub_field( 'name' );
						$position = get_sub_field( 'content' );
						?>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-new-pro mb-30 text-center">
                                <div class="product-img">
                                    <img src="<?php echo $image ?>" alt="<?php echo $name ?>">
                                </div>
                                <div class="product-caption">
                                    <h3><?php echo $name ?></h3>
                                    <span><?php echo $position ?></span>
                                </div>
                            </div>
                        </div>
					<?php endwhile; ?>
				<?php endif; ?>
            </div>
        </div>
    </section>
    <!--  New Product End -->


    <!--? Gallery Area Start -->
    <div class="gallery-area">
        <div class="container-fluid p-0 fix">
            <div class="row">
				<?php
				$images = get_field( 'home_photos' );

				if ( $images ): ?>
					<?php foreach ( $images as $index => $image ): ?>
						<?php if ( $index == 0 ): ?>
                            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <div class="gallery-img big-img" style='background-image:url(<?php echo esc_url( $image['sizes']['large'] ); ?>) '></div>
                                </div>
                            </div>
						<?php elseif ( $index == 1 ): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-gallery mb-30">
                                    <div class="gallery-img big-img" style='background-image:url(<?php echo esc_url( $image['sizes']['large'] ); ?>) '></div>
                                </div>
                            </div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="row">
						<?php
						if ( $images ): ?>
							<?php foreach ( $images as $index => $image ): ?>
								<?php if ( $index > 1 ): ?>
                                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                                        <div class="single-gallery mb-30">
                                            <div class="gallery-img small-img" style='background-image:url(<?php echo esc_url( $image['sizes']['large'] ); ?>)'></div>
                                        </div>
                                    </div>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->

    <!--? Popular Items Start -->
    <div class="popular-items section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2><?php _e('Popular Items')?></h2>
                        <p><?php _e('Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.')?></p>
                    </div>
                </div>
            </div>
            <div class="row">
				<?php

				$posts_news = new WP_Query( array(
					'posts_per_page' => 3,
					'post_type'      => 'blog',
				));

				if ( $posts_news->have_posts() ) {
					while ( $posts_news->have_posts() ) {
						$posts_news->the_post();
						get_template_part( 'template-parts/card-post', '', ['color' => 'card-red'] );
					}
				}
				wp_reset_postdata();
				?>
            </div>
            <!-- Button -->
            <div class="row justify-content-center mb-100">
                <div class="room-btn pt-70">
                    <a href="<?php echo get_post_type_archive_link( 'blog' ); ?> ?>" class="genric-btn danger"><?php _e( 'Блог' ) ?></a>
                </div>
            </div>

            <div class="row">
                <?php
                $posts_blog = new WP_Query( array(
                    'posts_per_page' => 3,
                    'post_type'      => 'news',
                ));

                if ( $posts_blog->have_posts() ) {
                    while ( $posts_blog->have_posts() ) {
                        $posts_blog->the_post();
                        get_template_part( 'template-parts/card-post', '', ['color' => 'card-blue'] );
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <!-- Button -->
            <div class="row justify-content-center">
                <div class="room-btn pt-70">
                    <a href="<?php echo get_post_type_archive_link( 'news' ); ?> ?>" class="genric-btn success"><?php _e( 'Новости' ) ?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Items End -->


    <!--? Shop Method Start-->
    <div class="shop-method-area">
        <div class="container">
            <div class="method-wrapper">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6><?php _e('Free Shipping Method')?></h6>
                            <p><?php _e('aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.')?></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6><?php _e('Secure Payment System')?></h6>
                            <p><?php _e('aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.')?></p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6><?php _e('Secure Payment System')?></h6>
                            <p><?php _e('aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.')?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->


<?php get_footer();

