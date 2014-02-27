<?php
/*
Template Name: Blog
*/

get_header(); ?>
	<?php $args = array( 
				    'post_type' => 'post',
				    'posts_per_page' => 4,
				    'paged' => get_query_var('paged') 
				    );

				$queryPosts = query_posts($args); ?>

	
	<section id="pag-blog">
		<div class="container">
			<div class="linha">
				<h1>Blog Gourmet Butler</h1>
			</div>
			<section class="roll">
				<?php if(have_posts()): ?>
		
						<?php while (have_posts()) : the_post(); ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'single-post-thumbnail'); ?>
							<article>
								<div class="image">
									<div class="data"><?php the_date('d/m/Y'); ?></div>
									<img src="<?php echo $image[0]; ?>" alt="">
								</div>
								<h2><?php the_title(); ?></h2>
								<div class="categorias">
									<?php 
										$post_categories = wp_get_post_categories(get_the_ID());
										
											
										foreach($post_categories as $c){
											$cat = get_category( $c ); ?>
											
										
										<a href="<?php bloginfo('url') ?>/category/<?php echo $cat->slug; ?>" class="categoria"><?php echo $cat->name; ?></a>

									<?php
											
										}
										
									?>
								

									<div class="clear"></div>
								</div>
								<div class="autor">por <?php the_author(); ?></div>
								<div class="clear"></div>
								<p><?php the_excerpt(); ?></p>
								<div class="clear"></div>
								<div class="tags">
									<p>
										<span>TAGS: </span>
										<?php 
											$tags = wp_get_post_tags(get_the_ID());
											$cont = 0;
												
											foreach($tags as $t){
												
											
											?>
											<?php if($cont==0): ?>
												<a href="<?php bloginfo('url') ?>/tag/<?php echo $t->slug; ?>" class="tag"><?php echo $t->name; ?></a>
											<?php else: ?>
												,<a href="<?php bloginfo('url') ?>/tag/<?php echo $t->slug; ?>" class="tag"><?php echo $t->name; ?></a>
											<?php endif; ?>

										<?php
											$cont++;
											}
										?>
									</p>
									
								</div>
								<a href="<?php the_permalink(); ?>" class="leiaMais">Leia mais</a>
								<div class="clear"></div>
								<div class="social">
									<div class="curtir"></div>
									<div class="tweetar"></div>
									<div class="clear"></div>
								</div>
							</article>
						<?php endwhile; ?>
				    
				<?php endif; ?>
				

				<div class="paginacao">
					
				<?php bm_numeric_pagination($query); ?>
					
				</div>
			</section>
			<?php wp_reset_query(); ?>
			<?php include 'includes/sidebar.php' ?>
			<div class="clear"></div>
		</div>

	</section>
\


<?php

get_footer();

?>