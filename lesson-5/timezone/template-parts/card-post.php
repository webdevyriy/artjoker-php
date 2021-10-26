<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 <?php echo $args['color']?>">
    <div class="single-popular-items mb-50 text-center">
        <div class="popular-img">
            <img height="360" src="<?php the_post_thumbnail_url('post_image'); ?>" alt="<?php the_title()?>">
            <div class="img-cap">
                <span><?php _e('Перейти')?></span>
            </div>
        </div>
        <div class="popular-caption">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
        </div>
    </div>
</div>