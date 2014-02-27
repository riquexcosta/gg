
<?php query_posts(array( 
					'post_type' => 'depoimentos',
                    'showposts' => '2'
                ));   
?>

<?php if(have_posts()): ?>
		<?php $contador = 0; ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php if($contador==0) { ?>
				<div class="depoimento">
					<div class="foto">
						<div class="tacaIcon"></div>
						<div class="estrelas"></div>
						<div class="nome"><?php the_title(); ?></div>
						<img src="<?php the_field('foto', get_the_ID()); ?>">
					</div>
					<div class="texto">
						<p><?php the_content(); ?></p>
						<?php 
							$date = DateTime::createFromFormat('Ymd', get_field('data', get_the_ID()));

						?>
						<span class="data"><?php echo $date->format('d/m/Y'); ?></span>
					</div>	
					<div class="clear"></div>
				</div>
			<?php } else{ ?>
				<div class="divisao"></div>
				<div class="depoimento depoimento-right">
					<div class="texto">
						<p><?php the_content(); ?></p>
						<?php 
							$date = DateTime::createFromFormat('Ymd', get_field('data', get_the_ID()));

						?>
						<span class="data"><?php echo $date->format('d/m/Y'); ?></span>
					</div>	
					<div class="foto">
						<div class="tacaIcon"></div>
						<div class="estrelas"></div>
						<div class="nome"><?php the_title(); ?></div>
						<img src="<?php the_field('foto', get_the_ID()); ?>">
					</div>
					<div class="clear"></div>
				</div>
			<?php } ?>
			<?php $contador++; ?>
		<?php endwhile; ?>

    
<?php endif; ?>

<?php wp_reset_query(); ?>




