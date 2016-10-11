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
define('DB_NAME', 'grupocomandos');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'grupocomandos');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'mysqlcomando123');

/** nome do host do MySQL */
define('DB_HOST', 'mysql.grupocomandos.com.br');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ']!fj>C$.hV-bozg5/d eB%Y8,z:UioJ2d[J*ZX8]t#_jK/z*L]<2$&su] -ozppo');
define('SECURE_AUTH_KEY',  'T=>UnN4gYJdi@&[yC3Lj!sD-QM11KG;sa,Xw@MM&DPb{Y8.hvJyW*(/U>jK/j~eH');
define('LOGGED_IN_KEY',    'THAi@~;#&F0Gc4i$RLAnICX5NtzE:NAzV8a.fX-94mch?HoPpRoZ8]DtT09y]l}s');
define('NONCE_KEY',        'Hgvq*)K8ADm0jsJ]E`!Z!>^~pdWD[41BM{c+aU9Er<$7XFpprD{M<ZzROX9]=Cgl');
define('AUTH_SALT',        'n}bL-zre>1,b#)iW@?Dm#+V>]e BRi+Q_EwH@tfjj{jJYlU2;j]*yiw))1~h@H0,');
define('SECURE_AUTH_SALT', 'GRs5P}{3)<m/2;+fPu~D_RIf7lmN9Yu{Wt zFv)t/=UX]Qp9x W4U9y]8PvM&|Hx');
define('LOGGED_IN_SALT',   '/!H1X}JJlCLD$GW?W|v1%BXmB.dk_jp,8#URySJc<u Dbg!U|&<U ?`pRbnVpE&&');
define('NONCE_SALT',       'CPpte+z$!6UFDxT9;E}QVx6?~OZuM!,Ht+cJ+)raS]8#KjE/%^MgLe.D^{<,~1dv');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'gc_';


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
