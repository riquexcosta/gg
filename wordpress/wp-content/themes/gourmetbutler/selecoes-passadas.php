<?php
/*
Template Name: Seleções Passadas
*/

get_header(); ?>
<section id="page-selecoesPassadas">
	<div class="container">
		<h1>Seleções Passadas</h1>
		<h2>Rótulos que já passaram pelo Gourmet Butler</h2>
	</div>
	<section class="selecoes">
		<div class="container">
			<ul class="selecoesSelection">
				<li id="tabRoyal" data-tipo="royal" class="active">
					<div class="icone"></div>
					Seleção Royal
				</li>
				<li id="tabPremium" data-tipo="premium">
					<div class="icone"></div>
					Seleção Premium
				</li>
				<li id="tabPocket" data-tipo="pocket">
					<div class="icone"></div>
					Seleção Pocket
				</li>
				<div class="clear"></div>
			</ul>	
				
		</div>
	</section>
	<section class="anos">
		<div class="container">
			<div class="center">
				<ul>
					<?php $anos = get_terms( 'anos', 'orderby=slug&order=ASC' ); ?>
					<?php 					
						 $count = count($anos);
						 if ( $count > 0 ){
						    $cont = 1;	$size = sizeof($anos);
						     foreach ( $anos as $term ) {
						       if($cont == $size){
						       		echo "<li class='active'>" . $term->name . "</li>";
						       		$anoInicial = $term->slug;
						       }

						    	else{
						       		echo "<li>" . $term->name . "</li>";

						    	}
						       
						        $cont++;
						     }						   
						 }
					?>
					<li></li>
					
					<div class="clear"></div>
				</ul>
			</div>
		</div>
	</section>
	<section class="garrafas">
		<div class="container">



			
<?php query_posts(array( 
					'post_type' => 'selecao',
					'showposts' => '-1',
					'anos' => $anoInicial,
					'meta_key' => 'mes',
					'orderby' => 'meta_value_num',
					'order' => 'ASC',
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'tipo',
							'value' => 'royal',
							'compare' => '='
						)

					)
					
                    
                ));   
?>

<?php if(have_posts()): ?>
		<?php $contador = 0; ?>
		<?php while (have_posts()) : the_post(); ?>

			<?php 
				$mes = get_field('mes', get_the_ID());
				$mesEscrito = mesEscrito($mes);

				?>


				<div class="selecao">
					<h3><?php echo $mesEscrito ?></h3>
					<ul>
					<?php while(has_sub_field('vinhos')): ?>
	 						<?php $vinho = get_sub_field('vinho'); ?>
							<a href="<?php echo get_permalink() ?>?vinho=<?php echo $vinho[0]->ID; ?>">
		 						<li>
									<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_field('garrafa', $vinho[0]->ID); ?>&w=124&h=213&zc=1" alt="">
									<p><?php echo $vinho[0]->post_title; ?></p>
								</li>
							</a>
						
					<?php endwhile; ?>	
					<div class="clear"></div>
					</ul>
				</div>
		<?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>





				

		</div>
	</section>
	<section class="associe">
		<div class="container">
			<div class="conheca">Conheça nossos planos e associe-se</div>
			<a href="#" class="desejo">Desejo me tornar associado</a>
			<div class="clear"></div>
		</div>
	</section>
</section>

<?php

get_footer();

?>