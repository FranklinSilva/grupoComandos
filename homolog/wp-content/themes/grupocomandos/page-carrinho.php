<?php get_header();?>
<?php 
$arraySession = $_SESSION['carrinho'];
?>
		<h2>Carrinho</h2>
		<div class="max-width cart">
			<div class="row title-cart">
				<div class="column small-12 medium-6">
					Produto
				</div>
				<div class="column small-12 medium-2">
					<span>quantidade</span>
				</div>
			</div>
			<form action="<?php echo home_url('finalizar');?>" method="post">
				<?php
					$i = 0;
				foreach ($arraySession as $array) {
				$produto = get_post($array['id']);
				?>	
					<div class="row product-cart">
						<div class="column small-12 medium-2">
							<?php echo get_the_post_thumbnail( $produto->ID, 'full' ); ?>
						</div>
						<div class="column small-12 medium-4">
							<span><?php echo $produto->post_title;?></span>
						</div>
						<div class="column small-12 medium-2">
							<input type="hidden" value="<?php echo $produto->post_title;?>" name="produto[<?php echo $i;?>][nome]">
							<input type="text" value="<?php echo $array['quantidade'];?>" name="produto[<?php echo $i;?>][quantidade]">
						</div>
					</div>
				<?php
				$i++;
					}
				?>
				<button type="submit" class="button-green">Prosseguir</button>
			</form>
		</div>
<?php get_footer();?>