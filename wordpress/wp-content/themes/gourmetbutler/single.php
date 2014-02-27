<?php
/**
 * The Template for displaying all single posts
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

			<section class="single">
				<article>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php $idPost = get_the_ID(); ?>
						<?php setPostViews(get_the_ID()); ?>	
						<div class="image">
							<div class="data"><?php the_date('d/m/Y'); ?></div>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'single-post-thumbnail'); ?>
							<img src="<?php echo $image[0]; ?>" alt="">
						</div>
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
						<div class="clear"></div>
						<p><?php the_excerpt(); ?></p>	
					<?php endwhile;	?> 



					
					<div class="clear"></div>
					
					<div class="social">
						<div class="curtir"></div>
						<div class="tweetar"></div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<div class="comentarios">
						<h2>Comentários</h2>
						<div class="fbComments">
							<div class="fb-comments" data-href="http://www.gourmetbutler.com.br" data-width="660" data-numposts="5" data-colorscheme="light"></div>
						</div>
					</div>
					<div class="relacionados">
						
							<h2>Posts Relacionados</h2>
								<ul>
							<?php  
							    $orig_post = $post;  
							    global $post;  
							    $tags = wp_get_post_tags($post->ID);  
							      
							    if ($tags) {  
							    $tag_ids = array();  
							    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
							    $args=array(  
							    'tag__in' => $tag_ids,  
							    'post__not_in' => array($post->ID),  
							    'posts_per_page'=>3, // Number of related posts to display.  
							    'caller_get_posts'=>1  
							    );  
							      
							    $my_query = new wp_query( $args );  
							  
							    while( $my_query->have_posts() ) {  
							    $my_query->the_post();  
							    ?>  
							      
							

							    <a href="<? the_permalink()?>">
									<li> 
										<?php the_post_thumbnail(array(177,100)); ?>
										<h3><?php the_title(); ?></h3>
										<p><?php the_excerpt(); ?></p>
									</li>
								</a>
							      
							    <? }  
							    }  
							    $post = $orig_post;  
							    wp_reset_query();  
							    ?>  
							
								

						
						</ul>
					</div>
				</article>
				
			</section>
			<?php include 'includes/sidebar.php' ?>
			<div class="clear"></div>
		</div>

	</section>

	


<?php

get_footer();
