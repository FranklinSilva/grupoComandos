<?php get_header();?>
<?php 

$paginaServicos = get_post(30); 
$content = $paginaServicos->post_content;

$servicos = new WP_query(array('post_type' => 'servicos', 'posts_per_page'	=> -1 ));

?>
	<div class="row max-width">
		<section class="column small-12 medium-4 large-3">
			<ul>
				<li>Nossos Servicos</li>
			<?php
				if( $servicos->have_posts() ){
					 while($servicos->have_posts()){
					 	$servicos->the_post();
			?>
				<li> <?php the_title(); ?>
					<ul>
						<?php 
							$produtos = new WP_query(array(
							 		'post_type' => 'produtos', 
							 		'posts_per_page'	=> -1, 
									'meta_query' => array(
		                            'relation' => 'AND',
		                                array(
		                                    'key' => 'servicos',
		                                    'value' => get_the_id(),
		                                    'compare' => '='
		                                )
		                            )
							 		));
							if( $produtos->have_posts() ){
							 		while($produtos->have_posts()){
							 			$produtos->the_post();
					 		?>
							 			<li><?php the_title(); ?></li>
							 		<?php
								 	}
								 	wp_reset_query();
							}	
				 		?>
					</ul>
				</li>
			<?php 
					}
				}
				wp_reset_query();							 	
			?>
				
			</ul>
		</section>
		<section class="column small-12 medium-8 large-9 bg-white slider-div">
			<h2>Nossos Serviços</h2>
			<hr/>

			<p class="central-paragraph"><?php echo $content; ?></p>
			
			<div class="row service-box">
			<?php
				if( $servicos->have_posts() ){
					 while($servicos->have_posts()){
					 	$servicos->the_post();
			?>
				<a href="<?php echo the_permalink();?>">
					<div class="column small-12 medium-4 service-miniature-container bg-gray-column">
						<?php the_post_thumbnail('full', array('class' => 'img-round')); ?>
						<h4><?php the_title(); ?></h4>
					</div>
					<div class="column small-12 medium-8 bg-gray-column">
						<p><?php the_content();?></p>
					</div>
				</a>

			<?php 
					}
				}
				wp_reset_query();							 	
			?>
			</div>
		</section>
	</div>

<?php get_footer(); ?>