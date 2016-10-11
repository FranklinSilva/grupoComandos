<?php get_header(); ?>
		
		<h2><?php the_title(); ?></h2>
		<hr/>
		
		<div class="cover-event">
			<?php the_post_thumbnail('full'); ?>
		</div>
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<p class="central-paragraph max-width"><?php the_content();?></p>
		<?php endwhile; endif; ?>
		

		<button class="button-blue max-width" href="">Voltar para a pagina principal</button>
<?php get_footer();?>