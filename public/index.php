<?php require "../bootstrap.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Crud</title>
    <!-- aqui embaixo estou inserindo o framework bootstrap ver o resultado nas configurações de css -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br>
<div class="navbar-static-top">
<a href="?page=home" class="btn btn-primary">Home</a>
<a href="?page=contato" class="btn btn-primary">Contact</a>
<a href="?page=create_user" class="btn btn-primary">New User</a>
</div>

<br><br>
<?php

//o codigo abaixo está ocultando a linha de erro  quando acontecer 

	try {
		require load(); // chamada de paginas função que estou criando dentro de app/pages.php
	} catch (Exception $e) {
		echo $e->getMessage();
	}

?>

    </div>
</body>
</html>