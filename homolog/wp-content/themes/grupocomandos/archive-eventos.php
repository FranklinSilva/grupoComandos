<?php get_header(); ?>
<?php 

$paginaEventos = get_post(27); 
$content = $paginaEventos->post_content;

$eventos = new WP_query(array('post_type' => 'eventos', 'posts_per_page'	=> -1 ));

?>
		<h2>Eventos</h2>
		<hr/>
		<p class="central-paragraph max-width"><?php echo $content; ?></p>
		<div class="row">
			<?php
				if( $eventos->have_posts() ){
					 while($eventos->have_posts()){
					 	$eventos->the_post();
			?>
				<div class="column small-12 medium-6 large-3">
					<a href="<?php echo the_permalink(); ?>">
						<div class="card-event">
							<?php the_post_thumbnail('full'); ?>
							<button class="button-card-event"><?php the_title(); ?></button>
						</div>
					</a>
				</div>
			<?php 
					}
				}
		wp_reset_query();							 	
			?>
		</div>
<?php get_footer();?>