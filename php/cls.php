<?php 


$button = $_POST['button'];

//Verifica qual botão foi selecionado

//=======================================================

//--Logar--
if($button == "Entrar"){

	//Atribui as variaveis recebidas do formulário 
	$user=$_POST['user'];
	$password=$_POST['password'];

	//Chama o arquivo com as funções
	include "functions.php";

	$login = new clsFunc();

	//Chamas as funções enviado um valor para ser atribuido
	$login->setuser($user);
	$login->setpassword($password);

	//Chama a função
	$login->Login();
}

//=======================================================

//--Cadastrar--
elseif ($button == "Cadastrar") {

	//Atribui as variaveis recebidas do formulário 
	$user=$_POST['user'];
	$password=$_POST['password'];

	//Chama o arquivo com as funções
	include 'functions.php';

	//Cria novo objeto na classe
	$cadastro = new clsFunc();

	//Chamas as funções enviado um valor para ser atribuido
	$cadastro->setuser($user);
	$cadastro->setpassword($password);

	//Chama a função
	$cadastro->Cadastro();
}

//=======================================================

//--Deslogar--
elseif ($button == "Deslogar") {
	
	//Chama o arquivo com as funções
	include 'functions.php';

	//Cria novo objeto na classe
	$logout = new clsFunc();

	//Chama a função
	$logout->Logout();

}

?>