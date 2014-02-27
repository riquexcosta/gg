
<?php query_posts(array( 
					'post_type' => 'faq',
                    'showposts' => '-1'
                ));   
?>

<?php if(have_posts()): ?>
	<div id="accordion">	
		<?php while (have_posts()) : the_post(); ?>
			<h3><?php the_title(); ?><span class="seta"></span></h3>
			<div>
			<p><?php the_content(); ?></p>
			</div>
		<?php endwhile; ?>
	</div>

    
<?php endif; ?>

<?php wp_reset_query(); ?>

