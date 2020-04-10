<?php

// entendendo o input abaixo:
//pegando um input do tipo get, segundo item é a variavel que aparece na url, id=numero, filtro do tipo inteiro
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$deletado = delete('users', 'id', $id);

if ($deletado) {
	return redirectToHome();
}

flash('message', 'Erro ao deletar');
redirectToHome();