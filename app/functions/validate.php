<?php

function validate(array $fields) {

// aqui é o retorno da função request() que esta em app/custom.php sendo aplicada a variavel para uso no switch
	// que me retorna se o formulario é get ou post
	$request = request();


//cria um array validate

	$validate = [];

	//faz um forearch em todos campos do formulario usando a chave($key) $field e a cada loop pega o tipo do campo na variavel $type

	foreach ($fields as $field => $type) {
		switch ($type) {
		case 's':
			$validate[$field] = filter_var($request[$field], FILTER_SANITIZE_STRING);
			break;
		case 'i':
			$validate[$field] = filter_var($request[$field], FILTER_SANITIZE_NUMBER_INT);
			break;
		case 'e':
			$validate[$field] = filter_var($request[$field], FILTER_SANITIZE_EMAIL);
			break;
		}
	}
// abaixo estou convertendo o array em objeto para que eu possa utilizar no /forms/contato.php desta forma: $validate->name, com isso consigo chamar o objeto de onde eu estiver

//	lembrando que o foreach funciona com objetos também


	return (object) $validate; //retorna um objeto dos campos do formulario

}


function isEmpty() {

	// me retorna se a solicitação é get ou post
	$request = request();
	//aqui cria-se uma variavel $empty e a define como false
	$empty = false;


	// depois carregamos o $request com forearch para correr todos os campos do formulario

	foreach ($request as $key => $value) {
		# code...

		//	verifica se existe algum campo no request que esteja vazio
		//conforme o if abaixo 

		if (empty($request[$key])) { // nao confunda o comando empty com a variavel.... é apenas para saber empty é vazio
			// na instrução do if esta perguntando se $request[$key] está vazio
			//se existir um campo vazio então muda a variavel $empty para true
			$empty = true;
		}
	}

	return $empty;
}



?>