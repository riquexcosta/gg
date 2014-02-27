<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<footer>
	<div class="container">
		<div class="colunaEsq">
			<img class="logoFooter" src="http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/images/logo-footer.png">
			<a href="" class="icon" id="chat">
				<img src="http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/images/chat.png" alt="">
			</a>
			<a target="_blank" href="http://instagram.com/gourmetbutler" class="icon" id="instagram">
				<img src="http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/images/instagram.png" alt="">
			</a>
			<a target="_blank" href="https://www.facebook.com/gourmetbutlerbr" class="icon" id="facebook">
				<img src="http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler/images/face.png" alt="">
			</a>
		</div>
		<div class="colunaMeio">
			<ul>
				<li><a href="<?php echo bloginfo('url') ?>">Home</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/quem-somos">Quem Somos</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/como-funciona">Como Funciona</a></li>
				<li><a href="">Seleção do Mês</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/eventos">Eventos</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/blog">Blog</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/contato">Contato</a></li>
			</ul>
			<ul>
				<li><a href="<?php echo bloginfo('url') ?>/como-funciona#faq">FAQ</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/frete-e-entrega">Frete e entrega</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/cancelamentos">Cancelamentos</a></li>
				<li><a href="<?php echo bloginfo('url') ?>/politica-de-qualidade">Política de Qualidade</a></li>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="colunaDir">
			<h4>Certificados de Segurança</h4>
			<div class="certificados">
				<img src="#" alt="">
				<img src="#" alt="">
				<img src="#" alt="">
				<img src="#" alt="">
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<a href="http://www.agencialooknfeel.com.br" class="agencia" target="_blank">Criação: Agência Digital Look'n Feel</a>
	</div>
</footer>


<script>
	var Url = "http://localhost/gourmet/wordpress"
	var temaUrl = "http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler";
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jcarousel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/midiaCarrousel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/main.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/404.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/masked.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/fileUpload.js"></script>

<?php if(is_singular('selecao')): ?>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/selecao.js"></script>
<?php endif; ?>

<?php if(is_page('selecoes-passadas')): ?>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/selecoes-passadas.js"></script>
<?php endif; ?>

<?php if(is_page('cadastro')): ?>

	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/busca_cep/js/Ajax.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/busca_cep/js/Index.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/cadastro.js"></script>

<?php endif; ?>



	<?php wp_footer(); ?>
</body>
</html>