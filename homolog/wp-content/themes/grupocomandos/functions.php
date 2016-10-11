<?php 
add_theme_support( 'post-thumbnails' ); 
add_action( 'admin_menu', 'my_remove_menu_pages', 999 );

function my_remove_menu_pages(){
remove_menu_page('upload.php');
remove_menu_page('edit-comments.php');
remove_menu_page('edit.php');
remove_menu_page('edit.php?post_type=page');
remove_menu_page('plugins.php');
remove_menu_page('themes.php');
remove_menu_page('tools.php');
remove_submenu_page('index.php', 'update-core.php');
remove_menu_page('edit.php?post_type=frase_destaque');
}


add_action( 'init', 'create_post_frase' );
function create_post_frase() {
  register_post_type( 'frase_destaque',
    array(
      'labels' => array(
        'name' => __( 'Frase de Destaque' ),
        'singular_name' => __( 'Frase de Destaque' )
      ),
      'public' => true,
      'supports' => array( 'title', 'thumbnail')
    )
  );
}


add_action( 'init', 'create_post_servicos' );
function create_post_servicos() {
  register_post_type( 'servicos',
    array(
      'labels' => array(
        'name' => __( 'Serviços' ),
        'singular_name' => __( 'Serviço' )
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail'),
      'has_archive' => true
    )
  );
}

add_action( 'init', 'create_post_produtos' );
function create_post_produtos() {
  register_post_type( 'produtos',
    array(
      'labels' => array(
        'name' => __( 'Produtos' ),
        'singular_name' => __( 'Produtos' )
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail'),
      'has_archive' => true
    )
  );
}

add_action( 'init', 'create_post_parceiros' );
function create_post_parceiros() {
  register_post_type( 'parceiros-list',
    array(
      'labels' => array(
        'name' => __( 'Lista de Parceiros' ),
        'singular_name' => __( 'Lista de Parceiros' )
      ),
      'public' => true,
      'supports' => array( 'title', 'thumbnail')
    )
  );
}

add_action( 'init', 'create_post_destaque' );
function create_post_destaque() {
  register_post_type( 'destaque_footer',
    array(
      'labels' => array(
        'name' => __( 'Destque Rodapé' ),
        'singular_name' => __( 'Destque Rodapé' )
      ),
      'public' => true,
      'supports' => array( 'title')
    )
  );
}

add_action( 'init', 'create_post_eventos' );
function create_post_eventos() {
  register_post_type( 'eventos',
    array(
      'labels' => array(
        'name' => __( 'Eventos' ),
        'singular_name' => __( 'Evento' )
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail'),
      'has_archive' => true
    )
  );
}

function add_menu_wp(){
	add_menu_page( 'Frase de Destque', 'Frase de Destaque', 'edit_posts', 'post.php?post=4&action=edit', '', '', 5 );
  add_menu_page( 'Parceiros', 'Parceiros', 'edit_posts', 'post.php?post=18&action=edit', '', '', 6 );
}
add_action( 'admin_menu', 'add_menu_wp' );

function add_featured_galleries_to_ctp( $post_types ) {
  return array( 'produtos' );
}
add_action( 'fg_post_types', 'add_featured_galleries_to_ctp' );

?>