<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'gourmet');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'backend');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'looknfeel');

/** nome do host do MySQL */
define('DB_HOST', '192.168.0.108');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '90hz;Cjn{]^-:SBn,Lzj+>v:?uKS%s$MxgG(m9C<r*L20.U?xM6cVIM}?ju8{qX|');
define('SECURE_AUTH_KEY',  '_aDPrcv)d]F)s%62(iNVN#k@n}B$^dA!ia2`cG+n:~|qh]Tg~B>c!ZB6{4Tkkz+g');
define('LOGGED_IN_KEY',    ')u#Nja$NS(Uc1]L_2nOi@^59ZmPS;C99YqW69[IgqR[3-zd@0LO+,j&*T!er?[|I');
define('NONCE_KEY',        '%P#UbGhL9`~+te%h;?K$DJ>>(1U[R*lG;0qV2|x;wtHm0s*}9Q-S)FyYBiskrw+f');
define('AUTH_SALT',        '{ZY|e,yUxv=%#N++Kw| &Z&IIPq#?we?8->2s#hXE}ukZMa`_x!lsh |y__XBof~');
define('SECURE_AUTH_SALT', 'C->-:&)Z[2IZ|TNt1jS05%LNB^-h{@Py+d/5|ktsZ<!rT-?=+isr5j]xJ.siu-d]');
define('LOGGED_IN_SALT',   ',3J{D_7Gp|2I1-i,K#wu;mb8ARfl+HyH|#A6;7]cMF`ev{iHyCC61xtF-eCa-D{`');
define('NONCE_SALT',       'LX:.++6v:@RUCbp8z*8,<fwYY1|m+~W$fZsuE yhDRmSo.i2xX=80]rLDNv*Q,qs');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_gourmet_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
