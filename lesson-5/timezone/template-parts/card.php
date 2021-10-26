<article class="blog_item">
    <div class="blog_item_img">
        <img class="card-img rounded-0" src='<?php the_post_thumbnail_url('post_image'); ?>' alt='<?php the_title(); ?>'>
        <a href="#" class="blog_item_date">
            <h3><?php echo get_the_date('n'); ?></h3>
            <p><?php echo get_the_date('M'); ?></p>
        </a>
    </div>

    <div class="blog_details">
        <a class="d-inline-block" href='<?php the_permalink(); ?>'>
            <h2><?php the_title(); ?></h2>
        </a>
        <p><?php the_excerpt(); ?></p>
        <ul class="blog-info-link">

            <li><a href="<?php the_author_meta('user_url'); ?>">
                    <i class="fa fa-user"></i>
                    <?php the_author(); ?>
                </a></li>
            <li>
                <a href="#">
                    <i class="fa fa-comments"></i>
                    <?php comments_number(__('пока нет комментариев'), __('1 комментарий'), __('% комментариев')); ?>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-eye"></i>
                    <?php
                        the_field('views');
                    ?>
                </a>
            </li>

        </ul>
    </div>
</article>