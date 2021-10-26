<div class="blog_right_sidebar">
    <aside class="single_sidebar_widget search_widget">
        <?php get_search_form(); ?>
    </aside>


    <?php if (is_post_type_archive('blog') || is_singular('blog')): ?>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title"><?php _e('Категории блога') ?></h4>
            <?php
            $terms = get_terms([
                'taxonomy' => 'taxonomy',
                'orderby' => 'count',
                'order' => 'DESC',
            ]);
            ?>
            <ul class="list cat-list">
                <?php foreach ($terms as $term): ?>
                    <li>
                        <a href="<?php echo $term->slug ?>" class="d-flex">
                            <p><?php echo $term->name ?> &nbsp</p>
                            <p>(<?php echo $term->count ?>)</p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </aside>
    <?php endif; ?>

    <?php
    // query

    $the_query = new WP_Query(array(
        'post_type' => get_post_type(),
        'posts_per_page' => 4,
        'meta_key' => 'views',
        'orderby' => 'views',
        'order' => 'DESC'
    ));

    ?>
    <?php if ($the_query->query['post_type']) : ?>
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title"><?php _e('Популярные') ?></h3>
            <?php if ($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="media post_item">
                        <img width="80" height="80" src="<?php echo the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>">
                        <div class="media-body">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                            <p><?php the_date(); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>

            <?php endif; ?>
            <?php wp_reset_query(); ?>

        </aside>

    <?php endif; ?>

    <?php
    if (function_exists('dynamic_sidebar'))
        dynamic_sidebar('homepage-sidebar');
    ?>

    <?php
    $terms_teg = get_terms([
        'taxonomy' => get_post_type() . '_teg',
        'hide_empty' => false
    ]);
    ?>
    <?php if (!is_search()): ?>
        <aside class="single_sidebar_widget tag_cloud_widget">
            <h4 class="widget_title"><?php _e('Tag Clouds') ?></h4>
            <ul class="list">
                <?php foreach ($terms_teg as $teg): ?>
                    <?php $link = get_site_url() . '/' . $teg->taxonomy . '/' . $teg->slug;
                    ?>
                    <li>
                        <a href="<?php echo $link ?>">
                            <?php echo $teg->name ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </aside>
    <?php endif; ?>
</div>
