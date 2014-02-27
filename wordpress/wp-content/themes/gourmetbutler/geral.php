<?php
/*
Template Name: Página Geral
*/

get_header(); ?>


<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();
?>

<section id="pag-geral">
	<div class="container">
		
		<h1><?php the_title(); ?></h1>
		<div class="clear"></div>

		<p><?php the_content() ?></p>
		<div class="clear"></div>
	</div>

</section>


<?php
	endwhile;
?>
		
<?php

get_footer();

?>