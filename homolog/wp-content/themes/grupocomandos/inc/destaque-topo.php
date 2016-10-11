<?php 
	$destaque = get_post(4); 

	//echo get_the_post_thumbnail( $destaque->ID, 'thumbnail' );
?>
<section class="bg-white slider-div">
			<div class="bg-index max-width">
				<h2> <?php echo $destaque->post_title; ?></h2>
			</div>
			<div class="featured-section-index">
				<div class="row index-important-items">
					<div class="column small-12 medium-3">
						<a>
						<h3>Aluguel de Geradores</h3>
						</a>
					</div>
					<div class="column small-12 medium-3">
						<a>
						<h3>Aluguel de Luz</h3>
						</a>
					</div>
					<div class="column small-12 medium-3">
						<a>
						<h3>Aluguel de Máquinas</h3>
						</a>
					</div>
					<div class="column small-12 medium-3">
						<a>
						<h3>Aluguel de Máquinas</h3>
						</a>
					</div>									
				</div>
			</div>
</section>