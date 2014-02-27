<?php
/*
Template Name: Detalhe Seleção Passada
*/

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div id="selecaoMes">
		
		<?php 
			$vinhoSelecionado = $_GET['vinho'];
		?>

		<?php $selecaoMes = get_field('sele_do_mes'); ?>
		<?php 
			if($selecaoMes){
		?>
			<div class="container">
				<?php $tipoSelecao = get_field('tipo', get_the_ID()); ?>
				<?php switch ($tipoSelecao) {
					case 'royal':
						echo("<h1>Seleção do Mês<div class='icon iconRoyal'></div>Royal</h1>");
						break;

					case 'pocket':
						echo("<h1>Seleção do Mês<div class='icon iconPocket'></div>Pocket</h1>");
						break;

					case 'premium':
						echo("<h1>Seleção do Mês<div class='icon iconPremium'></div>Premium</h1>");
						break;
				}

				?>
				
				<h2>Todos os meses a equipe de especialistas do Gourmet Butler seleciona os melhores rótulos ao redor do mundo para compor sua seleção. Desfrute dos vinhos escolhidos especialmente para você.</h2>
				<div class="paises">
					<h3>PAÍSES DA SELEÇÃO:</h3>
					<ul>
						<?php $paises = get_field('paises', get_the_ID()); ?>

						<?php foreach ($paises as $pais) { ?>
									
							<li>
								<img src="<?php echo get_field('bandeira', $pais->ID); ?>" alt="">
							</li>
							
						<?php }	?>
					
					</ul>
					<div class="clear"></div>
				</div>
			</div>
		<?php } else { ?>
		<?php 
			$ano = wp_get_post_terms(get_the_ID(), 'anos');
			$ano = $ano[0]->slug;
			$anoAtual = $ano;
			$anoProximo = $ano;
			$anoAnterior = $ano;


			$mes = get_field('mes', get_the_ID());
			$mesAnterior = intval($mes);
			$mesProximo = intval($mes);
			$mesAnterior--;
			$mesProximo++;

			if($mesAnterior==0){
				$mesAnterior = 12;
				$anoAnterior = intval($ano);
				$anoAnterior--;
				$anoAnterior = strval($anoAnterior);
			}

			if($mesProximo==13){
				$mesProximo = 1;
				$anoProximo = intval($ano);
				$anoProximo++;
				$anoProximo = strval($anoProximo);
			}

			$tipoSelecao = get_field('tipo', get_the_ID());


			
			$query = query_posts(array( 
					'post_type' => 'selecao',
					'showposts' => '-1',
					'anos' => $anoAnterior,
					
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'tipo',
							'value' => $tipoSelecao,
							'compare' => '='
						),
						array(
							'key' => 'mes',
							'value' => $mesAnterior,
							'compare' => '='
						)

					)
					
                    
                ));  

            $mesAnteriorUrl = get_permalink($query[0]->ID); 

            wp_reset_query();

            $query2 = query_posts(array( 
					'post_type' => 'selecao',
					'showposts' => '-1',
					'anos' => $anoProximo,
					
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'tipo',
							'value' => $tipoSelecao,
							'compare' => '='
						),
						array(
							'key' => 'mes',
							'value' => $mesProximo,
							'compare' => '='
						)

					)
					
                    
                ));  

            $mesProximoUrl = get_permalink($query2[0]->ID); 

             wp_reset_query();

		?>
	<div class="container">
		<h1>Seleções Passadas</h1>
		<div class="navigation">
			<?php if($query): ?>
				<a href="<?php echo $mesAnteriorUrl ?>" class="back"> Seleção do mês anterior</a>
			<?php else: ?>
				<div style="float: left; width: 210px; height: 2px"></div>
			<?php endif; ?>
			<div class="center"><h2>SELEÇÃO DE <?php echo mesEscrito($mes); ?> <?php echo $anoAtual ?></h2></div>
			<?php if($query2): ?>
				<a href="<?php echo $mesProximoUrl ?>" class="next"> Seleção do próximo mês</a>
			<?php else: ?>
				<div style="float: left; width: 210px; height: 2px"></div>
			<?php endif; ?>

			
			<div class="clear"></div>
			
		</div>
	</div>
	<?php } ?>

	<div class="vinhos">
		<div class="container">
			<ul>
				<?php $contador = 0; ?>
				<?php while(has_sub_field('vinhos')): ?>
 					
 					<?php $vinho = get_sub_field('vinho'); ?>
 					
 					<?php if($vinhoSelecionado): ?>
						
						<?php if($vinho[0]->ID == $vinhoSelecionado): ?>
						
							<?php $primeiroVinho = get_sub_field('vinho'); ?>
 							<li class="active">
 					 	
 					 	<?php else: ?>

							<li>

 					 	<?php endif; ?>

					<?php else: ?>
						
						<?php if($contador==0): ?>
						
							<?php $primeiroVinho = get_sub_field('vinho'); ?>
		 					<li class="active">
	 					
	 					<?php else: ?>
	 					
	 						<li>
	 					
	 					<?php endif; ?>
 					
 					<?php endif; ?>

						<a class="vinhoSelect" href="#" data-id="<?php echo $vinho[0]->ID; ?>">
							<div class="unidade">
								<?php $quantidade = get_sub_field('quantidade'); ?>
								<?php if($quantidade > 1): ?>
									<?php echo $quantidade; ?> unidades
								<?php else: ?>
									<?php echo $quantidade; ?> unidade
								<?php endif; ?>
								
							
							</div>
							<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_field('garrafa', $vinho[0]->ID); ?>&w=124&h=213&zc=1" alt="">
							<div class="nome-ficha">
								<p><?php echo $vinho[0]->post_title; ?></p>
								
							</div>
						</a>
					</li>
				<?php $contador++; ?>
				<?php endwhile; ?>
				
				<li class="clear"></li>
			
			</ul>
		</div>
	</div>
	<section id="content-vinho">
		<div class="detalhe-vinho">
			<div class="container">
				<h1 class="nomeVinho"><?php echo $primeiroVinho[0]->post_title; ?></h1>
				<div class="imagem">
					<img class="img-vinho" src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo get_field('garrafa', $vinho[0]->ID); ?>&w=228&h=496&zc=1" alt="">

				</div>
				<div class="contents">
					<?php if(get_field('notas_de_prova', $primeiroVinho[0]->ID)): ?>
						<h2 class="nota">Notas de Prova</h2>
						<p class="nota nota-content"><?php echo get_field('notas_de_prova', $primeiroVinho[0]->ID) ?></p>
					<?php else: ?>
						<h2 class="nota" style="display: none">Notas de Prova</h2>
						<p class="nota-content nota" style="display: none"><?php echo get_field('notas_de_prova', $primeiroVinho[0]->ID) ?></p>
					<?php endif; ?>
					<?php if(get_field('por_que_amamos', $primeiroVinho[0]->ID)): ?>
						<h2 class="porque">Porque Amamos</h2>
						<p class="porque porque-content"><?php echo get_field('por_que_amamos', $primeiroVinho[0]->ID) ?></p>
					<?php else: ?>
						<h2 class="porque" style="display: none">Porque Amamos</h2>
						<p class="porque porque-content" style="display: none"><?php echo get_field('por_que_amamos', $primeiroVinho[0]->ID) ?></p>
					<?php endif; ?>
					

					<?php if(get_field('harmonizacao', $primeiroVinho[0]->ID)): ?>
						<h2 class="harmo">Harmonizacao</h2>
						<?php $harmo = get_field('harmonizacao', $primeiroVinho[0]->ID); ?>
							<ul class="harmonizacao harmo">
								<?php foreach ($harmo as $icon) { ?>
										
									<li>
										<div id="harmoCarne">
											<img src="<?php echo get_field('icone', $icon["icones"]->ID);  ?>">
										</div>
										<p><?php echo get_the_title($icon["icones"]->ID); ?></p>
									</li>
									
									<?php }	?>
								
							</ul>
					<?php else: ?>
						<h2 class="harmo" style="display: none">Harmonizacao</h2>
						<?php $harmo = get_field('harmonizacao', $primeiroVinho[0]->ID); ?>
							<ul class="harmonizacao harmo" style="display: none">
								<?php foreach ($harmo as $icon) { ?>
										
									<li>
										<div id="harmoCarne">
											<img src="<?php echo get_field('icone', $icon["icones"]->ID);  ?>">
										</div>
										<p><?php echo get_the_title($icon["icones"]->ID); ?></p>
									</li>
									
									<?php }	?>
								
							</ul>
					<?php endif; ?>
					
				</div>
				<div class="ficha-tecnica">
					<ul>
						<li class="teorAlcolico">
							<div class="icon" id="teorAlcolico"></div> <p><?php echo get_field('teor_alcoolico', $primeiroVinho[0]->ID); ?></p>
							<div class="explicacao">
								Teor Alcoólico
							</div>
						</li>
						<li class="origem">
							<div class="icon" id="origem"></div> <p><?php echo get_field('origem', $primeiroVinho[0]->ID); ?></p>
							<div class="explicacao">
								Origem
							</div>
						</li>
						<li class="composicaoUvas">
							<div class="icon" id="composicaoUvas"></div> <p><?php echo get_field('composicao_de_uvas', $primeiroVinho[0]->ID); ?></p>
							<div class="explicacao">
								Composição das uvas
							</div>
						</li>
						<li class="envelhecimento">
							<div class="icon" id="envelhecimento"></div> <p><?php echo get_field('envelhecimento', $primeiroVinho[0]->ID); ?></p>
							<div class="explicacao">
								Envelhecimento
							</div>
						</li>
						<li class="tempoConservacao">
							<div class="icon" id="tempoConservacao"></div> <p><?php echo get_field('tempo_de_conservacao', $primeiroVinho[0]->ID); ?></p>
							<div class="explicacao">
								Tempo de conservação
							</div>
						</li>
						<li class="decantacao">
							<div class="icon" id="decantacao"></div> <p><?php echo get_field('decantacao', $primeiroVinho[0]->ID); ?></p>
							<div class="explicacao">
								Decantação
							</div>
						</li>
						<li class="temperatura">
							<div class="icon" id="temperatura"></div> <p><?php echo get_field('temperatura', $primeiroVinho[0]->ID); ?></p>
							<div class="explicacao">
								Temperatura
							</div>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
				<ul class="detalhes">
					<li class="nacionalidade">
						<?php $nacionalidade = get_field('nacionalidade', $primeiroVinho[0]->ID); ?>
						<img src="<?php echo get_field('bandeira', $nacionalidade[0]->ID) ?>" alt="">
						<span><?php echo $nacionalidade[0]->post_title; ?></span>
					</li>
					<li class="tipoVinhos">
						<div id="tipoVinho"></div>
						<span><?php echo get_field('tipo', $primeiroVinho[0]->ID); ?></span>
					</li>
					<li class="safra">
						<div id="iconData"></div>
						<span><?php echo get_field('safra', $primeiroVinho[0]->ID); ?></span>
					</li>
					<li class="volumeVinho">
						<div id="volumeVinho"></div>
						<span><?php echo get_field('volume', $primeiroVinho[0]->ID); ?></span> ml
					</li>
				</ul>
				<div class="clear"></div>
				
			</div>
		</div>
		<div class="sobre">
			<div class="container">
				<h2>Sobre o Produtor</h2>
				<img class="fotoProdutor" src="<?php echo get_field('foto_produtor', $primeiroVinho[0]->ID); ?>" alt="">
				<div class="content">
					<div class="nome nomeProdutor"><?php echo get_field('nome_produtor', $primeiroVinho[0]->ID); ?></div>
					<p class="descricaoProdutor"><?php echo get_field('descricao_produtor', $primeiroVinho[0]->ID); ?></p>
				</div>
				<div class="clear"></div>
				<div id="outrosRotulos">
					<div class="outros"><div class="seta"></div> Ver outros rótulos <div class="seta"></div></div>
				</div>

				<a href="<?php bloginfo('url') ?>/cadastro" class="botaoAssociar">Quero ser um associado Gourmet Butler</a>
				<?php 
					if(!$selecaoMes){
				?>
				<div class="navigation">
					<?php if($query): ?>
						<a href="<?php echo $mesAnteriorUrl ?>" class="back"> Seleção do mês anterior</a>
					<?php else: ?>
						<div style="float: left; width: 210px; height: 2px"></div>
					<?php endif; ?>
					<div class="center"><a href="<?php bloginfo('url') ?>/selecoes-passadas">VOLTAR PARA SELEÇÕES ANTIGAS</a></div>
					<?php if($query2): ?>
						<a href="<?php echo $mesProximoUrl ?>" class="next"> Seleção do próximo mês</a>
					<?php else: ?>
						<div style="float: left; width: 210px; height: 2px"></div>
					<?php endif; ?>
			
					<div class="clear"></div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	

</div>

<?php endwhile; ?>

<?php wp_reset_query(); ?>

<?php

get_footer();

?>