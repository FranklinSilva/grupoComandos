<?php 
$destaque_rodape = get_post(22); 
$content = $destaque_rodape->post_title;
?>

<section class="energy-generated">
			<h4><?php echo $content; ?></h4>
</section>