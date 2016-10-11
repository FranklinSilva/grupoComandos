<?php 
$servicos = new WP_query(array('post_type' => 'servicos', 'posts_per_page'	=> -1 ));
?>

<section class="bg-blue our-services">
			<h3>Nossos Serviços</h3>
			<hr/>
			<div class="row">
			<?php
						if( $servicos->have_posts() ){
							 while($servicos->have_posts()){
							 	$servicos->the_post();
			?>
				<div class="column small-6 medium-4 large-2 container-service">
					<?php the_post_thumbnail('full', array('class' => 'img-round')); ?>
					<h4><?php the_title(); ?></h4>
				</div>
			<?php 
							}
						}
				wp_reset_query();							 	
			?>
			</div>
</section>