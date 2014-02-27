<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


get_header(); ?>
	<section id="pag-blog">
		<div class="container">
			<div class="linha">
				<h1>Blog Gourmet Butler</h1>
			</div>
			<section class="search">
				<h3><?php printf( __( 'Posts da Tag: %s', 'twentyfourteen' ), single_tag_title( '', false ) ); ?></h3>
				
				<?php
					

					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>

						<article>
							<h2><?php the_title(); ?></h2>
							<div class="categorias">
								<?php 
									$post_categories = wp_get_post_categories(get_the_ID());
									
									$catString = '';
									$contador = 0;
									foreach($post_categories as $c){
										
										$cat = get_category( $c ); 
										if($contador == 0){
											$catString .= ''.$cat->term_id.'';
										}
										else{
											$catString .= ', '.$cat->term_id.'';
										}

										$contador++;

										?>
									
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

					<?php endwhile;	?>
				
				<div class="paginacao">
					<?php bm_numeric_pagination($query); ?>
					
				</div>
			</section>
			<?php include 'includes/sidebar.php' ?>
			<div class="clear"></div>
		</div>

	</section>

<?php

get_footer();
