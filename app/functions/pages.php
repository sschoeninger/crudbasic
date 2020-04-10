<?php

function load() {

	// filter_input captura uma variavel externa e definida como page e filtra como string

	$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

//aqui tem uma forma diferente para fazer o if
//(condition ? action_if_true: action_if_false;)
	$page = (!$page) ? 'pages/home.php' : "pages/{$page}.php";

// throw new exception cria uma Exceção 
	// ver exemplos na pagina abaixo
	// https://www.w3schools.com/php/php_exception.asp
	
	if (!file_exists($page)) {
		throw new \Exception("Opa, alguma coisa errada aconteceu");
	}

	return $page;
//-----------------------------------------------------------------------------------------------------------



}