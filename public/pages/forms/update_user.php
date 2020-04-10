<?php

require "../../../bootstrap.php";

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT); //aqui pega o id que esta sendo passado pelo post e filtra para tornar seguro, la do campo oculto do formulario edit_user.php

if (isEmpty()) {
	flash('message', 'Preencha todos os campos');

	return redirect("edit_user&id=".$id);
}

$validate = validate([
	'name' => 's',
	'sobrenome' => 's',
	'email' => 'e',
]);

$atualizado = update('users', $validate, ['id', $id]);

if ($atualizado) {
	flash('message', 'Atualizado com sucesso', 'success');

	return redirect("edit_user&id=".$id);
}

flash('message', 'Erro ao atualizar');
redirect("edit_user&id=" . $id);