
<?php query_posts(array( 
					'post_type' => 'midia',
                    'showposts' => '1'
                ));   
?>

<?php if(have_posts()): ?>

<section id="midia">
	<div class="container">
		<h2><div id="iconMidia"></div>Saiu na mídia</h2>
		<div class="jcarousel-wrapper">
			<div class="jcarousel">
					<?php while (have_posts()) : the_post(); ?>

						<?php if(get_field('midia')): ?>
 
							<ul>

							<?php while(has_sub_field('midia')): ?>

								<li>
									<a href="<?php the_sub_field('url'); ?>">
										<img src="<?php the_sub_field('logo'); ?>">								
									</a>
								</li>

							<?php endwhile; ?>

							</ul>

						<?php endif; ?>

						
					<?php endwhile; ?>
			</div>
			<a href="#" class="jcarousel-control-prev"></a>
            <a href="#" class="jcarousel-control-next"></a>
		</div>
	</div>
</section>
		

    
<?php endif; ?>

<?php wp_reset_query(); ?>



