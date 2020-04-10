

<h2>pagina inicial</h2>
<br>

<?php get('message');?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
$users = all('users'); // aqui estou pegando o metodo all() do database.php da tabela users
foreach ($users as $user):
?>
        <tr>
            <td><?=$user->name;?></td>
            <td><?=$user->sobrenome;?></td>
            <td><?=$user->email;?></td>
            <td>
                <a href="?page=edit_user&id=<?=$user->id;?>" class="btn btn-success">Editar</a>
            </td>
            <td>
                <a href="?page=delete_user&id=<?=$user->id;?>" class="btn btn-danger">Deletar</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

