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

	return redirect("contato");

}

//desta forma estou validando os dados para que não seja inketado nenhum codigo malicioso nos campos

// como por exemplo

//<script>Sandro luis </script> quando tiver preenchendo o cadastro


$validate = validate([
	'name' => 's',
	'email' => 'e',
	'subject' => 's',
	'message' => 's',
]);

//quando uso validate converto em objeto

$data = [
	'quem' => $validate->email,
	'para' => 'sandro@schoninger.com.br',
	'mensagem' => $validate->message,
	'assunto' => $validate->subject,
];

//dd($validate->name);

if (send($data)) {
	flash('message', 'Email enviado com sucesso', 'success');

	return redirect("contato");
}



?>