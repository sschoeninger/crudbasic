<?php

function connect() {
	$pdo = new \PDO("mysql:host=localhost;dbname=blog;charset=utf8", 'root', '');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	// o atributo colocado acima fetch_obj retorna os dados do banco desta forma: $user->name
	// se eu não colocar retornará assim : $user=['name']; como um array

	return $pdo;
}

function create($table, $fields) { //lembrando que fields vem do validate e retorna um objeto

	//dd($fields);
	// esta primeira logica converte o objeto $fields em array

	if (!is_array($fields)) {
		$fields = (array) $fields;  //aqui converte fields em array onde o indice é o nome dos campos do formulario e 
	}								// que são os mesmos do banco de dados  

	$sql = "insert into {$table}"; //veja abaixo que concateno o sql
	$sql .= "(" . implode(',', array_keys($fields)) . ")"; //aqui eu faço um implode no $fields separando apenas as chaves por virgula, ficando assim como exemplo: name,sobrenome,email,password ou seja apenas os nomes dos campos
	$sql .= " values(" . ":" . implode(',:', array_keys($fields)) . ")"; 
	//acima faço o mesmo 

	//dd($sql);// para saber se esta pasando o insert corretamente


	$pdo = connect(); //connect é um metodo do pdo

	$insert = $pdo->prepare($sql); //prepare é um metodo do pdo

	return $insert->execute($fields); //execute é um metodo do pdo 

}

function all($table) { // aqui estou buscando a tabela toda e restornando a lista completa de dados da tabela

	$pdo = connect();

	$sql = "select * from {$table}";
	$list = $pdo->query($sql);

	$list->execute();

	return $list->fetchAll();

}


function update($table, $fields, $where) {

	if (!is_array($fields)) {
		$fields = (array) $fields;
	}
	//nesta opção abaixo é como se estivesses fazendo um forearch ($fields as $field)
	// esta organizando o array de forma que ele fique assim Nome => :Sandro ....

	// $fields = array_map(function ($field) {
	// 	return "{$field} = :{$field}";
	// }, $fields);


	// dd($fields);
	// neste dd retorna isso abaixo
	//array(3) { ["name"]=> string(16) "sandro = :sandro" ["sobrenome"]=> string(16) "sandro = :sandro" ["email"]=> string(46) "sandro@schoninger.com = :sandro@schoninger.com" }

	$data = array_map(function ($field) { // o array_map - mapeia um array e esta function aberta 
		return "{$field} = :{$field}"; //retorna o campo field = : $field igual o exemplo acima porém
	}, array_keys($fields)); // a grande diferença está aqui quando especifico a chave como array_keys($fields)
	// com o dd() retorna o array conforme abaixo
	 //dd($data);

	 //array(3) { [0]=> string(12) "name = :name" [1]=> string(22) "sobrenome = :sobrenome" [2]=> string(14) "email = :email" }
	 // note que a dfiferença é que não retorna o conteudo e sim o nome da chave

	$sql = "update {$table} set ";

	$sql .= implode(',', $data);

	//dd($sql); 
	//string(67) "update users set name = :name,sobrenome = :sobrenome,email = :email"

	 $sql .= " where {$where[0]} = :{$where[0]}";

	//dd($sql); 
	//string(82) "update users set name = :name,sobrenome = :sobrenome,email = :email where id = :id"

	 // agora veja preciso saber o que esta retornando do $where
	 //dd($where);
	 //array(2) { [0]=> string(2) "id" [1]=> string(1) "2" }
	 // portanto fpreciso retornar o indice 0 e o 1 por isso preciso fazer um array_merge para juntar

	 $data = array_merge($fields, [$where[0] => $where[1]]); // uso o $where[0] => chamando o $where[1]
	 //porque preciso do id = 2 e não id = id para fazer o update 
	 //para ver o erro basta trocar pela linha abaixo e usar o dd($data e ver o resultado
	 //$data = array_merge($fields, $where);

	// //dd($data);

	 // depois disso foi explicando porque no primeiro momneto foi tentado usar la no array_map o mesmo
	 //campo $fields para o resultado do map, foi trocado por $data para não haver confusao com o resultado
	 // ele pegava os indices numeros ao inves do indice nome exemplo 0 ao invés de name

	$pdo = connect();

	$update = $pdo->prepare($sql);

	$update->execute($data);

	return $update->rowCount();

}

function find($table, $field, $value) { //localiza um determinado registro clicado no formulario dentro de uma tabela com seu id e seu valor get //ver sendo usando no formulario edit_user.php
	$pdo = connect();

	$value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

	$sql = "select * from {$table} where {$field} = :{$field}";

	$find = $pdo->prepare($sql);
	$find->bindValue($field, $value);// bindValue sustitui um valor pelo outro neste caso substituo o $fields pelo $value
	$find->execute();
	
	return $find->fetch(); // lembre somente fetch pq é somente um registro
}

function delete($table, $field, $value) {
	$pdo = connect();

	$sql = "delete from {$table} where {$field} = :{$field}";
	$delete = $pdo->prepare($sql);
	$delete->bindValue($field, $value);

	return $delete->execute();
}