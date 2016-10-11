<?php 
$paginaParceiros = get_post(18); 
$content = $paginaParceiros->post_content;

$parceiros = new WP_query(array('post_type' => 'parceiros-list', 'posts_per_page'	=> -1 ));
?>

<section class="bg-white our-partners max-width">
			<h3>Parceiros</h3>
			<hr/>
			<p class="central-paragraph">
				<?php echo $content; ?>
			</p>
	 		
			<div class="partners">
			<?php
				if( $parceiros->have_posts() ){
					 while($parceiros->have_posts()){
					 	$parceiros->the_post();
			?>
				<div><?php the_post_thumbnail('full', array('class' => 'img-round')); ?></div>
			<?php 
					}
				}
			wp_reset_query();							 	
			?>
			</div>
</section>