<?php get_header();?>
<?php 
 if(isset($_POST['produto'])){
?>
<div class="row">    
    <section class="vertical-banner os-animation column medium-6">
		<img src="img/1.png" class="cover-img">
  	</section>
  	<section id="checkout" class="column medium-6">
    <h3>Adicionar Dados</h3>
    <form action="<?php echo home_url('email');?>" method="post">
		<div class="row form-checkout">
		    <div class="column medium-6">
		    	<label for="name">Nome Completo</label>
		    	<input type="text" name="name" placeholder="Ex: José Ramos">
		    </div>
		    <div class="column medium-6">
		    	<label for="city">Cidade</label>
		    	<input type="text" name="city" placeholder="Ex: Feira de Santana">
		    </div>
		    <div class="column medium-6">
		    	<label for="email">E-mail</label>
		    	<input type="text" name="email" placeholder="Ex: jose_ramos@ymail.com">
		    </div>
		    <div class="column medium-6">
		    	<label for="telefone">Telefone Para Contato</label>
		    	<input type="tel" name="telefone" placeholder="Ex: (xx)xxxx-xxxx">
		    </div>
		    <div class="column medium-6">
		    	<label for="initialDate">Data Inicial: (opcional)</label>
		    	<input type="date" name="initialDate" placeholder="Data Inicial">
		    </div>
		    <div class="column medium-6">
		    	<label for="dueDate">Data Final: (opcional)</label>
		    	<input type="date" name="dueDate" placeholder="Data Final">
		    </div>
		    <div class="column">
		    	<label for="aditionalInformation">Observações</label>
		    	<textarea name="aditionalInformation"></textarea>
		    </div>
		    <?php 
		     $i=0;
		        foreach ($_POST as $key => $value) {
		        	foreach ($value as $chave => $val) {
			?>
					<input type="hidden" value="<?php echo $val['nome']; ?>" name="produto[<?php echo $i;?>][nome]">
					<input type="hidden" value="<?php echo $val['quantidade']; ?>" name="produto[<?php echo $i;?>][quantidade]">
			<?php
					$i++;
		        	}

				}
		    ?>
		    <button type="submit" class="button-green">Finalizar Orçamento</button>
		</div>
	 </form>
</div>
<?php
}
?>
		
<?php get_footer();?>