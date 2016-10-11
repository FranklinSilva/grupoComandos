<?php
// Variáveis Globais.
$_image_menu_pages = get_bloginfo('template_url').'/cpts/page.png';
$_image_menu_registers = get_bloginfo('template_url').'/cpts/registers.png';


//Remover Menus
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

}

//CUSTOM POSTS
add_action( 'init', 'create_post_cidade' );
function create_post_cidade() {
  register_post_type( 'cidades',
    array(
      'labels' => array(
        'name' => __( 'Cidades' ),
        'singular_name' => __( 'Cidade' )
      ),
      'public' => true,
    )
  );
}

add_action( 'init', 'create_post_unidade' );
function create_post_unidade() {
  register_post_type( 'unidades',
    array(
      'labels' => array(
        'name' => __( 'Unidades' ),
        'singular_name' => __('Unidade'),
      ),
      'public' => true,
    )
  );
}



add_action( 'init', 'create_post_tipos' );
function create_post_tipos() {
  register_post_type( 'tipos',
    array(
      'labels' => array(
        'name' => __( 'Áreas' ),
        'singular_name' => __( 'Área' )
      ),
      'public' => true,
    )
  );
}

add_action( 'init', 'create_post_tipos_cursos' );
function create_post_tipos_cursos() {
  register_post_type( 'tipos_cursos',
    array(
      'labels' => array(
        'name' => __( 'Tipos' ),
        'singular_name' => __( 'Tipo' )
      ),
      'public' => true,
    )
  );
}


add_action( 'init', 'create_post_cursos' );
function create_post_cursos () {
  register_post_type( 'cursos',
    array(
      'labels' => array(
        'name' => __( 'Cursos' ),
        'singular_name' => __('Cursos')
      ),
      'public' => true,
      'taxonomies' => array('post_tag')
    )
  );
}


add_action( 'init', 'create_post_cursos_unidades' );
function create_post_cursos_unidades() {
  register_post_type( 'cursos_unidades',
    array(
      'labels' => array(
        'name' => __( 'Cursos Unidades' ),
        'singular_name' => __( 'Curso Unidade' ),
      ),
      'public' => true,
      'hierarchical' => false 
    )
  );
}


add_action( 'init', 'create_post_relatorio' );
function create_post_relatorio() {
  register_post_type( 'relatorio',
    array(
      'labels' => array(
        'name' => __( 'Relatórios' ),
        'singular_name' => __( 'Relatório' ),
      ),
      'public' => true,
      'hierarchical' => false 
    )
  );
}



function my_script_enqueuer() {
     //wp_deregister_script('jquery');
     if(!is_admin()){
       wp_enqueue_script('jqueryScript','https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',array('jquery'),NULL,false);
      // wp_enqueue_script('isotope_script', get_template_directory_uri().'/js/isotope.js',array('jquery'),NULL, false);

       wp_enqueue_script('unitsScript', get_template_directory_uri().'/js/script-units.js',array('jquery'),NULL, false);

       wp_register_script('cidade_script',get_template_directory_uri().'/js/script.js',array('jquery'),NULL,false);
       wp_localize_script( 'cidade_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ))); 
       wp_enqueue_script( 'cidade_script' );
     }

     
}



add_action( 'init', 'my_script_enqueuer', 1 );

add_action( 'wp_ajax_nopriv_ajax_unidades', 'ajax_unidades');
add_action( 'wp_ajax_ajax_unidades', 'ajax_unidades' );

function ajax_unidades() {

    $cidade=$_POST["cidadebusca"];
    $objUn = new WP_query(array(
                  'post_type' => 'unidades', 
                  'numberposts' => -1,
                  'orderby' => 'title',
                  'order' => 'ASC',
                  'meta_query' => array(
                                'relation' => 'AND',
                                    array(
                                        'key' => 'cidade',
                                        'value' => $cidade,
                                        'compare' => '='
                                    )
                                )
                  ));

      if( $objUn->have_posts() ){
         echo "<option value=0>Unidade</option>";           
         while($objUn->have_posts()){
          $objUn->the_post();
          $titulo = get_the_title();
          $id = get_the_id();
          echo "<option value=$id>$titulo</option>";
         }  
         wp_reset_postdata();
      }
      //header( "Content-Type: application/json" );
    exit;
  
}

add_action('admin_footer', 'wpse_mask_script');
function wpse_mask_script(){
  wp_enqueue_script('maskScript', get_template_directory_uri().'/js/jquery.maskedinput.min.js',array('jquery'),NULL, false);
?>
<script type="text/javascript">
  jQuery(document).ready(function(){   
  jQuery('#acf-field-telefone').mask('(99) 9999-9999');
  jQuery('#acf-field-telefone').blur(function(event) {
     var last = jQuery(this).val().substr( jQuery(this).val().indexOf("-") + 1 );

            if( last.length == 3 ) {
                var move = jQuery(this).val().substr(jQuery(this).val().indexOf("-") - 1, 1 );
                var lastfour = move + last;
                var first = jQuery(this).val().substr( 0, 9 );

                jQuery(this).val( first + '-' + lastfour );
            }

  });
});

</script>
<?php
}

add_action('login_enqueue_scripts', 'my_login_logo');
function my_login_logo(){
?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo('template_url');?>/img/logo-senac-.png);
            width: 83px !important;
   height: 83px !important;
            background-size: 79px !important;
   background-position: 5px 4px !important;
        }
    </style>
<?php
}


add_action('wp_dashboard_setup', 'add_custom_dashboard_widgetHOTSITE');

function custom_dashboard_widgetHOTSITE(){
echo '<script type="text/javascript">
        jQuery(function(){
            jQuery("#postbox-container-1").removeClass("postbox-container").addClass("welcome-panel").removeAttr("id");
        });
    </script>
    <p>Ao lado segue o menu com as principais funcionalidades do seu site.</p>
      <p>Dúvidas? Envie um e-mail para <a href="mailto:contato@taointerativa.com.br">contato@taointerativa.com.br</a>.</p>
      <p>WordPress Original 4.3 com o tema Hotsite.</p>';

}

function add_custom_dashboard_widgetHOTSITE(){
    wp_add_dashboard_widget('custom_dashboard_widgetHOTSITE', 'Bem vindo ao <strong>Gerenciador de conteúdo do Hotsite Cursos</strong>', 'custom_dashboard_widgetHOTSITE');
}

add_filter('show_admin_bar', '__return_false');

function prof_remove_post_type_support() {
    remove_post_type_support( 'cidade', 'editor' );
    remove_post_type_support( 'tipos_cursos', 'editor' );
    remove_post_type_support( 'tipos', 'editor' ); 
    remove_post_type_support( 'unidades', 'editor' ); 
    remove_post_type_support( 'cidades', 'editor' ); 
    remove_post_type_support( 'cursos_unidades', 'editor' ); 
    remove_post_type_support( 'cursos_unidades', 'title' );
    remove_post_type_support( 'relatorio', 'editor' ); 
}
add_action( 'init', 'prof_remove_post_type_support' );


add_filter('manage_cursos_unidades_posts_columns' , 'add_cursos_unidades_columns');
 
function add_cursos_unidades_columns($columns) {
    unset($columns['author']);
    unset($columns['title']);
    return array_merge($columns,
          array(
            'titulo' =>'Título',
            'unidade' => 'Unidade',
            'curso' => 'Curso'
            ));
}
 
add_action('manage_posts_custom_column' , 'cursos_unidades_custom_columns', 10, 2);
  
function cursos_unidades_custom_columns( $column, $post_id ) {
     
    switch ( $column ) {
    case 'unidade' :
      
        $unidade  = get_field("unidade", $post_id);
        echo $unidade->post_title;
      
        break;
    case 'curso' :
       
        $curso  = get_field("curso", $post_id);
        echo $curso->post_title;
      
        break;
    case 'titulo' :
         $unidade  = get_field("unidade", $post_id);
         $curso = get_field("curso", $post_id);
         echo '<strong><a class="row-title" href="'.get_site_url().'/wp-admin/post.php?post='.$post_id.'&amp;action=edit" title="Editar “Rascunho automático”">'.$curso->post_title.' - '.$unidade->post_title.'</a></strong>';
        break;
    }
}

function ni_search_by_title_only( $search, &$wp_query )
{
    global $wpdb;
    if ( empty( $search ) )
        return $search; // skip processing - no search term in query
    $q = $wp_query->query_vars;
    $n = ! empty( $q['exact'] ) ? '' : '%';
    $search =
    $searchand = '';
    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( like_escape( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter( 'posts_search', 'ni_search_by_title_only', 500, 2 );
remove_action('wp_head', 'wp_generator');

function save_cursos_unidades_meta( $post_id, $post, $update ) {

    $slug = 'cursos_unidades';
    if ( $slug != $post->post_type ) {
        return;
    }

    $curso = get_post_meta( $post->ID, 'curso', true ); 

    $objTurma = new WP_query(array(
                  'post_type' => 'cursos_unidades', 
                  'posts_per_page'  => -1, 
                  'meta_query' => array(
                                'relation' => 'AND',
                                    array(
                                        'key' => 'curso',
                                        'value' => $curso,
                                        'compare' => '='
                                    )
                                )
                  ));

    $quantidadeTotal = $objTurma->post_count;
    $quantidadeDesativada = 0;

    if( $objTurma->have_posts() ){
          while($objTurma->have_posts()){
            $objTurma->the_post();

            if(get_field('turma_cancelada') == true || get_field('turma_preenchida') == true){
              $quantidadeDesativada++;
            }
          }
          wp_reset_query();
    }

    if($quantidadeTotal == $quantidadeDesativada){

      update_post_meta($curso, 'matricula_encerrada', true);

    }else{

      update_post_meta($curso, 'matricula_encerrada', false);

    }

}

add_action( 'save_post', 'save_cursos_unidades_meta', 10, 3 );



function save_relatorio( $post_id, $post, $update ) {

  $arquivo = 'relatorio.xls';
  $html = '';
  
  $slug = 'relatorio';
    if ( $slug != $post->post_type ) {
        return;
    }
    
    $dataIni = $post->data_inicio;
    $dataIni = substr_replace($dataIni, '-', 4, 0);
    $dataIni = substr_replace($dataIni, '-', 7, 0);
   
    $dataFim = $post->data_fim;
    $dataFim = substr_replace($dataFim, '-', 4, 0);
    $dataFim = substr_replace($dataFim, '-', 7, 0);

    $unidade = $post->unidade;
    $curso = $post->curso;
    $turma_cancelada = $post->turma_cancelada;
    $turma_preenchida = $post->turma_preenchida;


    $dbHost = "mysql.taotv.com.br";
    $dbUser = "taotv09";
    $dbPwd = "hotsitetao123";
    $dbName = "taotv09";

    if($turma_cancelada && !$turma_preenchida){
      $condicao = 'AND tipo = 1';
    }else if(!$turma_cancelada && $turma_preenchida){
       $condicao = 'AND tipo = 2';
    }else{
       $condicao = 'AND tipo = 1 OR tipo = 2';
    }

    mysql_connect("$dbHost", "$dbUser", "$dbPwd") or die("Erro ao tentar se conectar ao banco de dados."); 
    mysql_select_db($dbName);

    //SELECIONA DE ACORDO COM AS DASTAS 
    $query = "SELECT Max(id), MetaId , PostId FROM wp_custom_relatorio WHERE DataAlteracao BETWEEN '".$dataIni."' AND '".$dataFim."' AND status = 1 ".$condicao." GROUP BY MetaId, PostId;";   
    $result = mysql_query($query) or die("Error: ". mysql_error());
    $arrayIds = [];
    $i = 0;


    while($row = mysql_fetch_assoc($result)) {
      if(!in_array($row['PostId'], $arrayIds)){
        $arrayIds[$i] = $row['PostId'];
      }
      $i++;
    }
    if(count($arrayIds) == 0){
      $arrayIds[0] = 0;
    }


    $objTurmaAntes = new WP_query(array(
                  'post_type' => 'cursos_unidades',
                  'posts_per_page'  => -1,
                  'post__in' => $arrayIds,
    ));

    if($objTurmaAntes->have_posts() ){
      $x = 0;
      $arrayIdCursosTurmas = [];
      while($objTurmaAntes->have_posts()){
        $objTurmaAntes->the_post();
        $cursoVal = get_field('curso')->ID;
        
        if(!in_array($cursoVal, $arrayIdCursosTurmas)){
          $arrayIdCursosTurmas[$x] = $cursoVal;
        }
        $x++;
      }
      wp_reset_postdata();
    }   
    if(count($arrayIdCursosTurmas) == 0){
      $arrayIdCursosTurmas[0] = 0;
    }
    

    if($curso != 'null'){
      $objCurso = new WP_query(array(
                  'post_type' => 'cursos',
                  'posts_per_page'  => 1,
                  'p' => $curso,
      ));
    }else{
      $objCurso = new WP_query(array(
                  'post_type' => 'cursos', 
                  'posts_per_page'  => -1,
                  'post__in' => $arrayIdCursosTurmas
      ));
    }

  //ITERA O CURSO ESCOLHIDO
    if($objCurso->have_posts() ){
      while($objCurso->have_posts()){
        $objCurso->the_post();
        $tipo = get_field('tipo_curso')->post_title;
        $area = get_field('tipo')->post_title;

        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td><b>Curso</b></td>';
        $html .= '<td><b>Tipo</b></td>';
        $html .= '<td><b>Área</b></td>';
        $html .= '</tr>';
       
        $html .= '<tr>';
        $html .= '<td>'.get_the_title().'</td>';
        $html .= '<td>'.$area.'</td>';
        $html .= '<td>'.$tipo.'</td>';
        $html .= '</tr>';
        //SELECIONA TODAS AS TURMAS DE CADA CURSO, DE ACORDO COM OS PARAMETROS
          $objTurma = new WP_query(array(
                    'post_type' => 'cursos_unidades',
                    'posts_per_page'  => -1,
                    'post__in' => $arrayIds,
                    'meta_query' => array(
                        'relation' => 'AND',
                            array(
                                'key' => 'unidade',
                                'value' => $unidade,
                                'compare' => '='
                            ),
                            array(
                                'key' => 'curso',
                                'compare' => '=',
                                'value'   => get_the_id(),
                            )
                    )
          ));
        //
        //ITERA AS TURMAS DE CADA CURSO
          if($objTurma->have_posts() ){
            $html .= '<tr>';
            $html .= '<td><b>Valor</b></td>';
            $html .= '<td><b>Data Inicio</b></td>';
            $html .= '<td><b>Data Fim</b></td>';
            $html .= '<td><b>Turma Cancelada</b></td>';
            $html .= '<td><b>Turma Preenchida</b></td>';
            $html .= '</tr>';
            while($objTurma->have_posts()){
              $objTurma->the_post();
              $valor = get_field('valor');
              $dataInicio = get_field('data_inicio');
              $dataInicio = substr_replace($dataInicio, '-', 4, 0);
              $dataInicio = substr_replace($dataInicio, '-', 7, 0);
              $dataInicio = date('d-m-Y', strtotime($dataInicio));

              $dataFinal = get_field('data_fim');
              $dataFinal = substr_replace($dataFinal, '-', 4, 0);
              $dataFinal = substr_replace($dataFinal, '-', 7, 0);
              $dataFinal = date('d-m-Y', strtotime($dataFinal));


              $html .= '<tr>';
              $html .= '<td>'.$valor.'</td>';
              $html .= '<td>'.$dataInicio.'</td>';
              $html .= '<td>'.$dataFinal.'</td>';
              if(get_field('turma_cancelada')){
               $html .= '<td>Sim</td>';
              }else{
                $html .= '<td>Não</td>';
              }
              if(get_field('turma_preenchida')){
                $html .= '<td>Sim</td>';
              }else{
                $html .= '<td>Não</td>';
              }
              $html .= '</tr>';



            }
             wp_reset_postdata();
          }
        //
        
      }

      wp_reset_postdata();
      $html .= '</table>';
      // Configurações header para forçar o download
      header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
      header ("Cache-Control: no-cache, must-revalidate");
      header ("Pragma: no-cache");
      header ("Content-type: application/x-msexcel; charset=utf-8");
      header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
      header ("Content-Description: PHP Generated Data" );
      // Envia o conteúdo do arquivo
      echo "\xEF\xBB\xBF";
      echo $html;

      exit();

   }
  //
  
}

add_action( 'save_post', 'save_relatorio', 10, 3 );

?>