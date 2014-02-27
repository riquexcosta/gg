<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link type="text/css" href="<?php bloginfo('template_url')?>/css/screen.css" rel="stylesheet" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=690513777635642";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<?php if(is_page('blog') || is_singular('post') || is_author() || is_category() || is_tag() ): ?>
		<?php include_once("includes/analyticsBlog.php") ?>	
	<?php else: ?>
		<?php include_once("includes/analyticsGeral.php") ?>	
	<?php endif; ?>
<header>
	<div class="container">
		<a href="<?php echo bloginfo('url') ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.png"></a>
		<nav>
			<ul>
				<li><a href="<?php echo bloginfo('url') ?> ">HOME</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/quem-somos">QUEM SOMOS</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/como-funciona">COMO FUNCIONA</a></li>
				<li>
					<a href="#">SELEÇÃO DO MÊS</a>
					<ul>
						<div class="relative">
							<div class="triangle"></div>
						<?php query_posts(array( 
							'post_type' => 'selecao',
							'showposts' => 1,
							'meta_query' => array(
								'relation' => 'AND',
								array(
									'key' => 'tipo',
									'value' => 'pocket',
									'compare' => '='
								),
								array(
									'key' => 'sele_do_mes',
									'value' => true,
									'compare' => '='
								)
							)));   ?>

						<?php if(have_posts()): ?>
								
							<?php while (have_posts()) : the_post(); ?>
								<li><a href="<?php the_permalink(); ?>">SELEÇÃO POCKET</a></li>	
							<?php endwhile; ?>
						<?php endif; ?>

						<?php wp_reset_query(); ?>

						<?php query_posts(array( 
							'post_type' => 'selecao',
							'showposts' => 1,
							'meta_query' => array(
								'relation' => 'AND',
								array(
									'key' => 'tipo',
									'value' => 'premium',
									'compare' => '='
								),
								array(
									'key' => 'sele_do_mes',
									'value' => true,
									'compare' => '='
								)
							)));   ?>

						<?php if(have_posts()): ?>
								
							<?php while (have_posts()) : the_post(); ?>
								<li><a href="<?php the_permalink(); ?>">SELEÇÃO PREMIUM</a></li>	
							<?php endwhile; ?>
						<?php endif; ?>

						<?php wp_reset_query(); ?>

						<?php query_posts(array( 
							'post_type' => 'selecao',
							'showposts' => 1,
							'meta_query' => array(
								'relation' => 'AND',
								array(
									'key' => 'tipo',
									'value' => 'royal',
									'compare' => '='
								),
								array(
									'key' => 'sele_do_mes',
									'value' => true,
									'compare' => '='
								)
							)));   ?>

						<?php if(have_posts()): ?>
								
							<?php while (have_posts()) : the_post(); ?>
								<li><a href="<?php the_permalink(); ?>">SELEÇÃO ROYAL</a></li>	
							<?php endwhile; ?>
						<?php endif; ?>

						<?php wp_reset_query(); ?>
						
				
						<li><a href="<?php bloginfo('url') ?>/selecoes-passadas">SELEÇÕES ANTERIORES</a></li>
						</div>
					</ul>
				</li>
				<li><a href="<?php bloginfo('url') ?>/eventos">EVENTOS</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/blog">BLOG</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/contato">CONTATO</a></li>
			</ul>
		</nav>
		<div class="clear"></div>
	</div>
</header>
<section class="subHeader">
	<div class="container">
		<a href="<?php bloginfo('url') ?>/cadastro" class="associar">Quero me associar</a>
		<a href="#" class="entrar">
			<div>Já sou cadastrado</div>
			<div class="bold">Quero entrar na minha conta</div>
		</a>
		<div id="login">
			<div class="relative">
				<div class="close-login"></div>
				<form>
					<input type="text" name="user" placeholder="Login">
					<input type="password" name="password" placeholder="Senha">
					<input type="submit" value="Entrar">
					<a href="#" class="esqueci">Esqueci minha senha</a>
				</form>
			</div>
		</div>
		<div class="right">
			<a href="#" class="chat"></a>
			<a href="#" class="chat-texto">Chat</a>
			<a target="_blank" href="http://instagram.com/gourmetbutler" class="instagram"></a>
			<a target="_blank" href="https://www.facebook.com/gourmetbutlerbr" class="face"></a>	
		</div>
		<div class="clear"></div>
	</div>
</section>
