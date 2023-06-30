<?php

include 'connect.php';

class clsFunc{

	private $user;
	private $login;

//=======================================================

public function setuser($lUser)
{
	$this->user = $lUser;
}

//=======================================================

public function setpassword($lPassword)
{
	$this->password = $lPassword;
}

//=======================================================

//--LOGAR--
public function Login(){

	//Inicia uma sessão 
	session_start();

	//Realiza a conexão com Banco de dados
	$bd = new Conexao();
	$conexao = $bd->getConexao();

	//Verifica se os dados estão vazios
	if ($this->user == NULL || $this->password == NULL) {
		echo "<script> window.alert('Favor informas todos os dados!');
		window.location.href = '../index.html';
		</script>";
		exit;
	}

	//Procura no banco de dados o "user" e "password" identicos
	$sql = "SELECT user, password from usuarios where user = ? and password = ?";

	$stm = $conexao->prepare($sql);
	$stm->execute([$this->user, $this->password]);

	$row = $stm->rowCount();
	$fetch = $stm->fetch();

	if ($row == 1) {
		//Atribui um valor para a sessão "login"
		$_SESSION['login'] = $fetch['user'];
		echo "<script> window.alert('Login efetuado com sucesso!');
		window.location.href = '../tela.php';
		</script>";
		exit;

	}
	else{
		echo "<script> window.alert('Usuário ou senha incorreto!');
		window.location.href = '../index.html';
		</script>";
		exit;
	}	

}

//=======================================================

//--CADASTRAR--
public function Cadastro(){

	//Realiza a conexão com Banco de dados
	$bd = new Conexao();
	$conexao = $bd->getConexao();

	//Verifica se os dados estão vazios
	if ($this->user == NULL || $this->password == NULL) {
		echo "<script> window.alert('Favor informas todos os dados!');
		window.location.href = '../index.html';
		</script>";
		exit;
	}

	//Inseri no banco de dados um novo "user" e "password"
	$sql = "INSERT INTO usuarios (user, password) VALUES(?, ?)";

	$stm = $conexao->prepare($sql);
	$stm->bindValue(1,$this->user);
	$stm->bindValue(2,$this->password);

	$result = $stm->execute();

	if (!$result) {
		echo "<script> window.alert('Registro não inserido');
              window.location.href = '../index.html';
              </script>";
	}
	else{
		echo "<script> window.alert('Registro inserido com sucesso');
              window.location.href = '../index.html ';
              </script>";
	}

}


//=======================================================

//--DESLOGAR--
public function Logout(){

	//Encerra a sessão
	session_start();
	session_destroy();
	header('location: ../index.html');

}

//=======================================================

}



