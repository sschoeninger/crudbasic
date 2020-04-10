<?php

// aqui preciso cfiar duas funções

// a função flash cria as mensagens e onde tenho a chave $key a mensagem $message e o tipo danger como default
function flash($key, $message, $type = 'danger') {

	if (!isset($_SESSION['flash'][$key])) {
		$_SESSION['flash'][$key] = '<span class="alert alert-'.$type.'">'.$message.':</span>';
	}


}


// e a função get resgata as mensagens
function get($key) {

	if (isset($_SESSION['flash'][$key])) {
		 $message = $_SESSION['flash'][$key];

		 unset($_SESSION['flash'][$key]);

		 return $message ?? ''; // aqui um tipo de verificação bem compactada se existe $mensage ela retorna senao 
		 						//retorna ela vazia
	}


}

?>
