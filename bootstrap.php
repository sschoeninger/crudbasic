<?php 

//session_start() cria uma sessão ou resume a sessão atual baseado em um id de sessão passado via GET ou POST, ou passado via cookie.
if(!isset($_SESSION)) {
	session_start();
}

require 'vendor/autoload.php';

//$host = $_SERVER['HTTP_HOST']; //pegando o endereço pra nao precisar ficar alterando
//define('INCLUDE_PATH','http://'.$host.'/schoninger/sandro/simplecrud/public');
?>