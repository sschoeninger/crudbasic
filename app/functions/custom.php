<?php

//usando uma função geral para debugar o codigo ....
//precisa incluir ela no codigo
// 

function dd($dump) {

	var_dump($dump);
	die();

}

// AQUI FAZ A VALIDAÇÃO DE QUAL É O METODO UTILIZADO NO FORMULARIO 
//ASSIM FICA UMA FUNÇÃO GERAL PARA AVALIAÇÃO 

function request() {

	$request = $_SERVER['REQUEST_METHOD'];

	if ( $request == 'POST') {
		return $_POST;
	}

	return $_GET;

}

// abaicxo as funcoes redirect

function redirect($target) {

	return header('location:/devclass/public/?page='.$target);
}

//esta função é especifica para redirecionar para a home

function redirectToHome() {
	return header('location:/devclass/public/');

}

?>