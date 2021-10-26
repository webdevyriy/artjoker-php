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
								<?php _e('Lily and 4 people like this')?>
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
									?>
								</p>
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
