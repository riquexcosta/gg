<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri(), array( 'genericons' ) );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}

	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20131209', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );

if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

remove_filter('the_content','wpautop');


function informacoesVinho() {

	$id = $_POST['id'];

	$result['nome'] = get_the_title($id);
	$result['garrafa'] = get_field('garrafa', $id);
	$result['notas_de_prova'] = get_field('notas_de_prova', $id);
	$result['por_que_amamos'] = get_field('por_que_amamos', $id);
	$result['teor_alcoolico'] = get_field('teor_alcoolico', $id);
	$result['origem'] = get_field('origem', $id);
	$result['composicao_de_uvas'] = get_field('composicao_de_uvas', $id);
	$result['envelhecimento'] = get_field('envelhecimento', $id);
	$result['tempo_de_conservacao'] = get_field('tempo_de_conservacao', $id);
	$result['decantacao'] = get_field('decantacao', $id);
	$result['temperatura'] = get_field('temperatura', $id);
	
	$result['tipo'] = get_field('tipo', $id);
	$result['safra'] = get_field('safra', $id);
	$result['volume'] = get_field('volume', $id);
	$result['foto_produtor'] = get_field('foto_produtor', $id);
	$result['nome_produtor'] = get_field('nome_produtor', $id);
	$result['descricao_produtor'] = get_field('descricao_produtor', $id);

	$nacionalidade = get_field('nacionalidade', $id);

	$result['nacionalidade']['nome'] = get_the_title($nacionalidade[0]->ID);
	$result['nacionalidade']['bandeira'] = get_field("bandeira",$nacionalidade[0]->ID);


	$harmonizacao = get_field('harmonizacao', $id);
	
	$contador = 0;
	
	if($harmonizacao){
		foreach ($harmonizacao as $icon) { 
			$result['harmonizacao'][$contador]['nome'] = get_the_title($icon["icones"]->ID);
			$result['harmonizacao'][$contador]['icone'] = get_field('icone', $icon["icones"]->ID);
			$contador++;
		}
	}
	

	echo json_encode($result);
	
	die();

}

add_action('wp_ajax_nopriv_informacoesVinho', 'informacoesVinho');    
add_action('wp_ajax_informacoesVinho', 'informacoesVinho');

function getPassadas(){

	$tipo = $_POST['tipo'];
	$ano = $_POST['ano'];


	query_posts(array( 
					'post_type' => 'selecao',
					'showposts' => '-1',
					'anos' => $ano,
					'meta_key' => 'mes',
					'orderby' => 'meta_value_num',
					'order' => 'ASC',
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'tipo',
							'value' => $tipo,
							'compare' => '='
						)

					)
					
                    
                ));   

	$result = '';

	if(have_posts()):

		while ( have_posts() ) : the_post();
			$mes = get_field('mes', get_the_ID());
			$mesEscrito = mesEscrito($mes);

		    $result .= '<div class="selecao">
					<h3>'.$mesEscrito.'</h3>
					<ul>';

				while(has_sub_field('vinhos')):
	 				$vinho = get_sub_field('vinho');
					$imagem = get_field('garrafa', $vinho[0]->ID);
					$url = 'http://localhost/gourmet/wordpress/wp-content/themes/gourmetbutler';
					$result .= '<a href="'.get_permalink().'?vinho='.$vinho[0]->ID.'">
		 						<li>
									<img src="'.$url.'/timthumb.php?src='.$imagem.'&w=124&h=213&zc=1" alt="">
									<p>'.$vinho[0]->post_title.'</p>
								</li>
							</a>';
						
					endwhile;
					$result .= '<div class="clear"></div>
					</ul>
				</div>';
		  
		endwhile;
	
	endif;

	echo json_encode($result);
	
	die();

}

add_action('wp_ajax_nopriv_getPassadas', 'getPassadas');    
add_action('wp_ajax_getPassadas', 'getPassadas');

function mesEscrito($mes){
	switch ($mes) {
		case '1':
			$mesEscrito = "Janeiro";
			break;

		case '2':
			$mesEscrito = "Fevereiro";
			break;

		case '3':
			$mesEscrito = "Março";
			break;

		case '4':
			$mesEscrito = "Abril";
			break;

		case '5':
			$mesEscrito = "Maio";
			break;

		case '6':
			$mesEscrito = "Junho";
			break;

		case '7':
			$mesEscrito = "Julho";
			break;

		case '8':
			$mesEscrito = "Agosto";
			break;

		case '9':
			$mesEscrito = "Setembro";
			break;

		case '10':
			$mesEscrito = "Outubro";
			break;

		case '11':
			$mesEscrito = "Novembro";
			break;

		case '12':
			$mesEscrito = "Dezembro";
			break;

	}
	return $mesEscrito;
}

/**
 * numeric pagination for custom queries
 * Much nicer than next and previous links :)
 *
 * @global type $wp_query
 * @param type $pageCount
 * @param type $query
 * @return type
 */

function bm_numeric_pagination( $page_count = 9, $query = null ) {

	if ( null == $query ) {
		global $wp_query;
		$query = $wp_query;
	}

	if ( 1 >= $query->max_num_pages ) {
		return;
	}

	$big = 9999999999; // need an unlikely integer

	echo '<div id="archive-pagination pagination">';
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total' => $query->max_num_pages,
		'end_size' => 0,
		'mid_size' => $page_count,
		'next_text' => __( 'Antigos', 'textdomain' ),
		'prev_text' => __( 'Novos', 'textdomain' )
	) );
	echo '</div>';

}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function contatoAction(){

	$assunto = '[GB] Contato';

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];

	$conteudo = '';
	$conteudo .= ($nome)? 'Nome: '.$nome."\r\n": '';
	$conteudo .= ($email)? 'E-mail: '.$email."\r\n": '';
	$conteudo .= ($mensagem)? 'Mensagem: '.$mensagem."\r\n": '';


	$cabecalho = "MIME-Version: 1.1\r\n";
	$cabecalho .= "Content-type: text/plain; charset=utf-8\r\n";
	$cabecalho .= "From: ".$email."\r\n";
	$cabecalho .= "Return-Path: ".$email."\r\n";

	$para = 'henrique@agencialooknfeel.com.br';
	
	$mail = mail($para, $assunto, $conteudo, $cabecalho, "-r". $para);

	echo ($mail)? 1 : 0;

	# Inserção no banco do wordpress
	$post = array(
		'post_author' => 1,
		'post_title' => $nome,
		'post_status' => 'pending',
		'post_type' => 'contato'
		);

	$post_id = wp_insert_post($post);

	update_post_meta($post_id, 'email', $email);
	update_post_meta($post_id, 'mensagem', $mensagem);	
	
	die();
	
}

add_action('wp_ajax_nopriv_contatoAction', 'contatoAction');    
add_action('wp_ajax_contatoAction', 'contatoAction');

function contatoOrcamentoAction(){

	$assunto = '[GB] Solicitação de Orçamento';

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];

	$mensagem = $_POST['mensagem'];

	$conteudo = '';
	$conteudo .= ($nome)? 'Nome: '.$nome."\r\n": '';
	$conteudo .= ($email)? 'E-mail: '.$email."\r\n": '';
	$conteudo .= ($telefone)? 'Telefone: '.$telefone."\r\n": '';
	$conteudo .= ($mensagem)? 'Mensagem: '.$mensagem."\r\n": '';


	$cabecalho = "MIME-Version: 1.1\r\n";
	$cabecalho .= "Content-type: text/plain; charset=utf-8\r\n";
	$cabecalho .= "From: ".$email."\r\n";
	$cabecalho .= "Return-Path: ".$email."\r\n";

	$para = 'henrique@agencialooknfeel.com.br';
	
	$mail = mail($para, $assunto, $conteudo, $cabecalho, "-r". $para);

	echo ($mail)? 1 : 0;

	# Inserção no banco do wordpress
	$post = array(
		'post_author' => 1,
		'post_title' => $nome,
		'post_status' => 'pending',
		'post_type' => 'contato'
		);

	$post_id = wp_insert_post($post);

	update_post_meta($post_id, 'email', $email);
	update_post_meta($post_id, 'mensagem', $mensagem);	
	
	die();
	
}

add_action('wp_ajax_nopriv_contatoOrcamentoAction', 'contatoOrcamentoAction');    
add_action('wp_ajax_contatoOrcamentoAction', 'contatoOrcamentoAction');

function indiqueAction(){

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$nomeDestinatario = $_POST['nomeAmigo'];
	$emailDestinatario = $_POST['emailAmigo'];
	$mensagem = $_POST['mensagem'];
	$link = 'http://www.gourmetbutler.com.br';


	$conteudo = '';
	$conteudo .= 'Olá '.$nomeDestinatario.', '.$nome.' te indicou o Gourmet Butler.'."\r\n".'Clique no link e confira a indicação:'.$link."\r\n\r\n";
	$conteudo .= 'Mensagem de '.$nome.": ".$mensagem."\r\n";


	# Configurações do email

	$cabecalho = "MIME-Version: 1.1\r\n";
	$cabecalho .= "Content-type: text/plain; charset=utf-8\r\n";
	$cabecalho .= "From: ".$email."\r\n";
	$cabecalho .= "Return-Path: ".$email."\r\n";

	$para = $emailDestinatario;
	$assunto = '[GB] Indicação do Gourmet Butler';

	$mail = mail($para, $assunto, $conteudo, $cabecalho, "-r". $para);

	echo ($mail)? 1 : 0;

	die();
}

add_action('wp_ajax_nopriv_indiqueAction', 'indiqueAction');    
add_action('wp_ajax_indiqueAction', 'indiqueAction');


function contatoTrabalheConosco(){

	$nome = $_POST['nome'];
	$email = $_POST['email'];


	$conteudo = '';
	$conteudo .= ($nome)? 'Nome: '.$nome."\r\n": '';
	$conteudo .= ($email)? 'E-mail: '.$email."\r\n": '';

	# Configurações do email
	$cabecalho = "MIME-Version: 1.1\r\n";
	$cabecalho .= "Content-type: text/plain; charset=utf-8\r\n";
	$cabecalho .= "From: ".$email."\r\n";
	$cabecalho .= "Return-Path: ".$email."\r\n";

	$para = 'henrique@agencialooknfeel.com.br';
	$assunto = '[GB] Trabalhe Conosco';



	if(count($_FILES) > 0){

		$id_att = media_handle_upload('curriculo', $post_id);

		$url = wp_get_attachment_url($id_att);

		update_post_meta($post_id, 'arquivo', $url);

		$conteudo .= 'Arquivo: '.$url."\r\n";

	}


	# Inserção no banco do wordpress
	
	$post = array(
		'post_author' => 1,
		'post_title' => $nome,
		'post_status' => 'pending',
		'post_type' => 'contato'
		);

	$post_id = wp_insert_post($post);

	update_post_meta($post_id, 'email', $email);
	update_post_meta($post_id, 'mensagem', $conteudo);


	$mail = mail($para, $assunto, $conteudo, $cabecalho, "-r". $para);

	echo ($mail)? 1 : 0;

	die();	
}

add_action('wp_ajax_nopriv_contatoTrabalheConosco', 'contatoTrabalheConosco');    
add_action('wp_ajax_contatoTrabalheConosco', 'contatoTrabalheConosco');

function cadastro(){


	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$cpf = $_POST['cpf'];
	$cupom = $_POST['cupom'];
	$titular = $_POST['titular'];
	$numeroCartao = $_POST['numeroCartao'];
	$codSeguranca = $_POST['codSeguranca'];
	$validade = $_POST['validade'];
	$bandeira = $_POST['bandeira'];
	$plano = $_POST['plano'];
	$dataNascimento = $_POST['dataNascimento'];
	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$sexo = $_POST['sexo'];
	$cep = $_POST['cep'];
	$endereco = $_POST['endereco'];
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$uf = $_POST['uf'];
	$cidade = $_POST['cidade'];
	$numero = $_POST['numero'];
	$referencia = $_POST['referencia'];

	
	$camposBase = array(
		'user_login' => $login,
		'first_name' => $nome,
		'last_name' => $sobrenome,
		'display_name' => $nome,
		'user_email' => $email,
		'role' => 'subscriber',
		'user_pass' => $senha
		);

	$id = wp_insert_user($camposBase);

	add_user_meta($id,'telefone',$telefone);
	add_user_meta($id,'cpf',$cpf);
	add_user_meta($id,'cupom_de_desconto',$cupom);
	add_user_meta($id,'titular_cartao',$titular);
	add_user_meta($id,'numero_cartao',$numeroCartao);
	add_user_meta($id,'codigo_de_seguranca',$codSeguranca);
	add_user_meta($id,'validade',$validade);
	add_user_meta($id,'bandeira',$bandeira);
	add_user_meta($id,'plano',$plano);
	add_user_meta($id,'data_de_nascimento',$dataNascimento);
	add_user_meta($id,'celular',$celular);
	add_user_meta($id,'sexo',$sexo);
	add_user_meta($id,'cep',$cep);
	add_user_meta($id,'endereco',$endereco);
	add_user_meta($id,'complemento',$complemento);
	add_user_meta($id,'bairro',$bairro);
	add_user_meta($id,'uf',$uf);
	add_user_meta($id,'cidade',$cidade);
	add_user_meta($id,'numero',$numero);
	add_user_meta($id,'referencia',$referencia);


	echo json_encode($id);

	die();
}

add_action('wp_ajax_nopriv_cadastro', 'cadastro');    
add_action('wp_ajax_cadastro', 'cadastro');

function pb_check_username() {
    $username = $_POST['usr'];

    if($username==''){
    	echo json_encode(2);
    }
    else{
    	if(username_exists($username))
	        echo json_encode(1);
	    else
	        echo json_encode(0);
    }
	    

    die();
}

add_action('wp_ajax_nopriv_pb_check_username', 'pb_check_username');
add_action('wp_ajax_pb_check_username', 'pb_check_username');

function check_email() {
    $email = $_POST['email'];

    if($email==''){
    	echo json_encode(2);
    }
    else{
    	if(email_exists($email))
	        echo json_encode(1);
	    else
	        echo json_encode(0);
    }
	    

    die();
}

add_action('wp_ajax_nopriv_check_email', 'check_email');
add_action('wp_ajax_check_email', 'check_email');


