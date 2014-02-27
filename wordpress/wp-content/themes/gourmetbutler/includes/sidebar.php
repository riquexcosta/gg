<aside>
	<form action="<?php bloginfo('url') ?>" id="formBuscaBlog"> 
		<div class="busca">
			<input type="submit" value="">
			<input type="text" name="s">
			<div class="clear"></div>
		</div>
	</form>
	<div class="video">
		<a href="<?php bloginfo('url') ?>/quem-somos">
	        <div id="side-img">
	            <img src="<?php bloginfo('template_url') ?>/images/sideimg.png">
	            <div class="overlay"></div>
	        </div>
	    </a>
	</div>
	<div class="sobre">
		<h3>Sobre o Gourmet Butler</h3>
		<p>O Gourmet Butler é um clube de vinhos e benefícios. Receba em casa todos os meses uma seleção fantástica de vinhos e tenha acesso às vantagens exclusivas de um associado Gourmet Butler.</p>
	</div>
	<div class="news">
		<h3>Receba todas as novidades do Blog</h3>
		<form action="http://gourmetbutler.us6.list-manage.com/subscribe/post?u=ccb484c3868b713ecff2d35b6&amp;id=7a47eadeb2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<input type="email" name="EMAIL" placeholder="digite seu e-mail">
			<input type="submit" value="">
		</form>
	</div>
	<div class="rss">
		<h3>RSS</h3>
		<a href="#">
			<div id="iconRss"></div>
			<p>Acompanhe, em primeira mão, notícias sobre o mundo dos vinhos e da gastronomia.</p>
			<div class="clear"></div>
		</a>
	</div>
	<div class="maisLidos">
		<?
			query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&showposts=5');
		?>
		<h3>Posts mais lidos</h3>
		<ul>
			<?php $contador = 1; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<a href="<?php the_permalink(); ?>">
					<li>
						<div class="num"><?php echo $contador; ?></div>
						<p><?php the_title(); ?></p>
						<div class="clear"></div>
					</li>
				</a>
				<?php $contador++; ?>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</ul>
	</div>
	<div class="categorias">
		<h3>Categorias</h3>
		<ul>
			<?php $args = array(
			
				'title_li'           => ''
				
			); ?>
			<?php wp_list_categories($args); ?>
		</ul>
	</div>
	<div class="autores">
		<h3>Autores</h3>
		<ul>
			 <?php wp_list_authors(); ?> 
		</ul>
	</div>
	<div class="tags">
		<h3>Tags</h3>
		<div class="nuvemTags">
			<?php $args = array(
			    'smallest'                  => 15, 
			    'largest'                   => 22,
			    'unit'                      => 'pt', 
			    'number'                    => 45,  
			    'format'                    => 'flat',
			    'separator'                 => "\n",
			    'orderby'                   => 'name', 
			    'order'                     => 'ASC',
			    'exclude'                   => null, 
			    'include'                   => null, 
			    'topic_count_text_callback' => default_topic_count_text,
			    'link'                      => 'view', 
			    'taxonomy'                  => 'post_tag', 
			    'echo'                      => true
			); ?>
			<?php wp_tag_cloud( $args ); ?>
		</div>
	</div>
	
</aside>