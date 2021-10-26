<?php
get_header();
?>
    <!-- Hero Area Start-->
    <?php get_template_part('template-parts/slider-area', '', ['title' => get_the_title()]); ?>
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid w-100" src="<?php the_post_thumbnail_url(''); ?>" alt="<?php the_title() ?>">
                        </div>
                        <div class="blog_details">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info">
                                <span class="align-middle"><i class="fa fa-heart"></i></span>
                                Lily and 4 people like this
                            </p>
                            <p class="like-info">
                                <i class="fa fa-eye"></i>
                                <?php
                                    $count = get_field('views');
                                    $count++;
                                    update_field('views', number_format($count, 0, ",", "."));
                                    echo $count;
                                ?>
                            </p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>

                        <div class="navigation-area">
                            <div class="row">
                                <?php $prev_post = get_previous_post();
                                $next_post = get_next_post();
                                ?>

                                <?php if ($prev_post): ?>
                                    <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center" style="position: relative">
                                        <div class="thumb">
                                            <a href="<?php get_permalink($prev_post) ?>">
                                                <img width="60" height="60"
                                                     class="img-fluid"
                                                     src='<?php echo get_the_post_thumbnail_url($prev_post->ID, 'thumbnail'), false ?>'
                                                     alt='<?php esc_html($prev_post->post_title) ?>'>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="<?php get_permalink($prev_post) ?>">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p><?php _e('Previous Post') ?></p>
                                            <?php
                                                echo '<a href="' . get_permalink($prev_post) . '">' . '<h4>' . esc_html($prev_post->post_title) . '</h4>' . '</a>';
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($next_post): ?>
                                    <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p><?php _e('Previous Post') ?></p>
                                            <?php
                                            echo '<a href="' . get_permalink($next_post) . '">' . '<h4>' . esc_html($next_post->post_title) . '</h4>' . '</a>';
                                            ?>
                                        </div>
                                        <div class="arrow">
                                            <a href="<?php get_permalink($next_post) ?>">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="<?php get_permalink($next_post) ?>">
                                                <img width="60" height="60"
                                                     class="img-fluid"
                                                     src='<?php echo get_the_post_thumbnail_url($next_post->ID, 'thumbnail'), false ?>'
                                                     alt='<?php esc_html($next_post->post_title) ?>'>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src="<?php print get_avatar_url(get_current_user_id()); ?>" alt=""/>
                            <div class="media-body">
                                <a href="#">
                                    <h4><?php the_author(); ?></h4>
                                </a>
                                <p><?php
                                    echo get_the_author_meta('user_description', $post->post_author);
                                    ?></p>
                            </div>
                        </div>
                    </div>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
                <div class="col-lg-4">
                    <?php   get_sidebar();?>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->

<?php
get_footer();
