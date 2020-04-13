<?=get('message')?>
<?php

$user = find('users', 'id', $_GET['id']); // aqui estou pegando o metodo find de database.php para selecionar o registro exato que foi selecionado na lista para me retornar e permitir que que possa alterar este registro
?>
<form action="pages/forms/update_user.php" method="POST" role="form">

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Input field" value="<?=$user->name?>">
    </div>
<!-- o campo abaixo hidden para nao aparecer o valor do id -->
    <input type="hidden" name="id" value="<?=$user->id?>">

    <div class="form-group">
        <label for="">Sobrenome</label>
        <input type="text" class="form-control" name="sobrenome" placeholder="Input field" value="<?=$user->sobrenome?>">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Input field" value="<?=$user->email?>">
    </div>


    <button type="submit" class="btn btn-primary">atualizar</button>
</form>