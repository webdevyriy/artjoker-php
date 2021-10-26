<?php get_header(); ?>

<?php get_template_part('template-parts/slider-area', '', ['title' => __('Результат поиска')]); ?>

<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php if (have_posts()) : ?>
                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();

                            get_template_part('template-parts/card');

                        endwhile;

                        echo new Numeric_Pagination();
                    else :
                        _e('Ничего не нашли');
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-lg-4">
                <?php
                    get_sidebar();
                ?>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->


<?php get_footer();

