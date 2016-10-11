<?php get_header();?>
<?php 

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
		<div class="columns small-12 medium-8 large-9 bg-white slider-div">
			<h2><?php the_title(); ?></h2>
			<hr/>
			<?php the_post_thumbnail('full', array('class' => 'cover-img')); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<p class="central-paragraph"><?php the_content();?></p>
				<?php endwhile; endif; ?>
			<div class="row">
				<h3>Nossa cartilha de produtos</h3>
				<hr/>
				<?php 
				$produtos = new WP_query(array('post_type' => 'produtos', 'posts_per_page'	=> -1, 'meta_query' => array('relation' => 'AND',array('key' => 'servicos','value' => get_the_id(),'compare' => '='))));
				if( $produtos->have_posts() ){
				 		while($produtos->have_posts()){
				 			$produtos->the_post();
		 		?>
		 			<div class="class product column small-12 medium-612 medium-4">
							<div class="container-img">
								<?php the_post_thumbnail('full'); ?>
							</div>
							<div class="container-text">
								<h3><?php the_title();?></h3>
								<h4><?php the_content();?></h4>
								<h5>Tem preco?</h5>
							</div>
							<div class="container-see">
								<a href="<?php echo the_permalink();?>">veja mais</a>
							</div>
					</div>
		 		<?php
				 		}
				 	wp_reset_query();
				}	
		 		?>
			
			</div>
		</div>
	</div>
<?php get_footer();?>