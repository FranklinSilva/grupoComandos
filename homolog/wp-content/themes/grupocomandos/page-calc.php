<?php 
session_start();

if(isset($_SESSION['carrinho'])){

	$arraySession = $_SESSION['carrinho'];
	$flag = false;

	foreach ($arraySession as &$array) {
		if($array['id'] == $_GET['id']){
			$flag = true;
			$array['quantidade'] = $array['quantidade'] + 1;
			break;
		}	
	}

	if(!$flag){
		$arraynew = array(
			'id' => $_GET['id'],
	    	'quantidade' => 1
		);
		array_push($arraySession, $arraynew);
	}

	$_SESSION['carrinho'] = $arraySession;
}else{
 
	$arraySession = array(); 
	$array = array(
		'id' => $_GET['id'],
	    'quantidade' => 1
	);
	array_push($arraySession, $array);

	$_SESSION['carrinho'] = $arraySession;
}

header("Location:http://" . $_SERVER['SERVER_NAME'] ."/grupocomandos/carrinho/");

//echo $_SERVER['SERVER_NAME'];
?>