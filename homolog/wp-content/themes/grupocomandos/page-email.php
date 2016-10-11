<?php 
if(isset($_POST['name'])){
$html = '';

$html .= 'Nome: '.$_POST['name'].'<br/>';
$html .= 'Cidade: '.$_POST['name'].'<br/>';
$html .= 'Email: '.$_POST['name'].'<br/>';
$html .= 'Telefone: '.$_POST['name'].'<br/>';
$html .= 'Data Inicial: '.$_POST['name'].'<br/>';
$html .= 'Data Final: '.$_POST['name'].'<br/>';
$html .= 'Observações: '.$_POST['name'].'<br/>';

foreach ($_POST as $key => $value) {
	foreach ($value as $chave => $val) {
		$html .= 'Produto: '.$val['nome'].'<br/>';
		$html .= 'Quantidade: '.$val['quantidade'].'<br/>';
	}
}

echo $html;

exit();
}
?>