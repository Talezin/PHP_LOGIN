<?php
	//Verifica a existencia de alguma sessão
	session_start();
	if(!isset($_SESSION['login'])){
		header('location: index.html');
	}

?>
