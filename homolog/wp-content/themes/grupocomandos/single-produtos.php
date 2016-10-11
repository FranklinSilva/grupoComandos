<?php get_header();?>
<?php 
$galleryarray = get_post_gallery_ids(get_the_id());
?>
	<div class="row max-width">
		<div class="columns small-12 medium-3 large-2">
			
		</div>
		<div class="columns small-12 medium-9 large-10 bg-white slider-div">
			<section  class="product os-animation">
				<div class="row">
					<div class="column small-12 large-7">
						<div class="fade">
							<?php foreach ($galleryarray as $id) {
								$imagesize = wp_get_attachment_image_src( $id, 'thumb' );
							?>
							    <div><img src="<?php echo wp_get_attachment_url( $id ); ?>"></div>
							<?php } ?>
						</div>
					</div>
					<div class="column small-12 large-5">
						<div  class="container-text">
							<h2><?php the_title();?></h2>
							<p><?php echo get_field('descricao_curta');?><p>
							<h3>Tem preco?</h3>
						</div>
						<div  class="container-buy">
							<a href="<?php echo home_url('calc')?>/?id=<?php echo get_the_id();?>">
							<button>Adicionar ao Orcamento</button>
							</a>
						</div>
					</div>
				</div>

				<div  class="product-info">
					<div class="tabContent" id="tab1">
						<div>
							<p class="central-paragraph">
								<?php if (have_posts()) : while (have_posts()) : the_post();?>
									<?php the_content();?>
								<?php endwhile; endif; ?>
							</p>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
<?php get_footer();?>