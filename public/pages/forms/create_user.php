<!-- /forms/create_user.php -->

<?php  

require '../../../bootstrap.php';

//aqui estou chamando a função dd para debugar e expor o array que fez a leitura do pages/contato.php que é o formulario 

//dd($_POST);

//dd($_SERVER['REQUEST_METHOD']); EXIBE O METODO UTILIZADO = VER VARIAVEIS GLOBAIS
// ISSO FOI NECESSARIO PARA CRIAR UMA FUNÇÃO NO custom.php chamada request


//note que isEmpty é uma função criada no arquivo validate.php e flash são funçoes criadas 


if (isEmpty()) {

	// lembre que a função flash colocamos com 3 paramentros mas o ultimo type vem com default danger 
	// que é o typo patrao do framework boostrap que esta sendo usado no index 
	// entao eu posso alterar se usar desta forma abaixo:
	//flash('message','Preencha todos os campos','success');

	// ou deixar no padrao conforme abaixo:
	flash('message','Preencha todos os campos');


//	 dd('Preencha todos os campos');// aqui apenas para testar se estava funcionando ate entao 
//	return redirect('?page=contato');
	//header('location:/devclass/public/?page=contato');
	//para evitar a linha acima para cada pagina crio uma function no custom.php chamada redirect()

	return redirect("create_user"); //mensagem de erro ou sucesso

}

//desta forma estou validando os dados para que não seja inketado nenhum codigo malicioso nos campos

// como por exemplo

//<script>Sandro luis </script> quando tiver preenchendo o cadastro

//o s e de string  e o e de email olhar o validate no custom.php

$validate = validate([
	'name' => 's',
	'sobrenome' => 's',
	'email' => 'e',
	'password' => 's',
]);

//quando uso validate converto em objeto

$cadastrado = create('users', $validate);

if ($cadastrado) {
	flash('message', 'Cadatrado com sucesso', 'success');

	return redirect('create_user');
}

flash('message', 'Erro ao cadastrar');
redirect('create_user');

