<?php query_posts(array( 
                    'showposts' => '3'
                ));   
?>
<?php if(have_posts()): ?>
	<div class="ultimos-posts">
		<h2>Últimas do Blog</h2>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h3><?php the_title(); ?></h3>
				<?php the_post_thumbnail( array(180,140) ); ?>
				<p><?php the_excerpt(); ?></p>
				<div class="clear"></div>
				<a class="continuar" href="<?php the_permalink(); ?>">CONTINUAR LENDO</a>
				<div class="clear"></div>
			</div>
		<?php endwhile; ?>

		
	</div>
    
<?php endif; ?>
<?php wp_reset_query(); ?>


