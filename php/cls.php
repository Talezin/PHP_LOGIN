<?php


$button = $_POST['button'];


//=======================================================

if ($button == "Entrar") {

	$user = $_POST['user'];
	$password = $_POST['password'];

	include "functions.php";

	$login = new clsFunc();

	$login->setuser($user);
	$login->setpassword($password);

	$login->Login();
}

//=======================================================

elseif ($button == "Cadastrar") {

	$user = $_POST['user'];
	$password = $_POST['password'];

	include 'functions.php';

	$cadastro = new clsFunc();

	$cadastro->setuser($user);
	$cadastro->setpassword($password);

	$cadastro->Cadastro();
}

//=======================================================

elseif ($button == "Deslogar") {

	include 'functions.php';

	$logout = new clsFunc();

	$logout->Logout();
}
