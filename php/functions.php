<?php

include 'connect.php';

class clsFunc
{


	public string $button;

	private $user;
	private $password;

	//=======================================================

	public function getuser()
	{
		return $this->user;
	}
	public function setuser($lUser)
	{
		$this->user = $lUser;
	}

	//=======================================================

	public function getpassword()
	{
		return $this->password;
	}
	public function setpassword($lPassword)
	{
		$this->password = $lPassword;
	}

	//=======================================================

	//--LOGIN--
	public function Login()
	{

		//Inicializa um sessão
		session_start();

		//Conexao com banco de dados
		$bd = new Conexao();
		$conexao = $bd->getConexao();

		//Verifica se o Usuario e Senha estão vazios
		if ($this->user == NULL || $this->password == NULL) {
			echo "<script> window.alert('Favor informas todos os dados!');
		window.location.href = '../index.html';
		</script>";
			exit;
		}

		//Pesquisa no banco de dados
		$sql = "SELECT user, password from usuarios where user = ? and password = ?";

		$stm = $conexao->prepare($sql);
		$stm->execute(array($this->user, $this->password));

		$row = $stm->rowCount();
		$fetch = $stm->fetch();

		//Verifica se a pesquisa obteve sucesso
		if ($row > 0) {

			//Cria uma sessão
			$_SESSION['login'] = $fetch['user'];
			echo "<script> window.alert('Login efetuado com sucesso!');
		window.location.href = '../tela.php';
		</script>";
			exit;
		} else {
			echo "<script> window.alert('Usuário ou senha incorreto!');
		window.location.href = '../index.html';
		</script>";
			exit;
		}
	}

	//=======================================================

	//--CADASTRO--
	public function Cadastro()
	{

		//Conexao com banco de dados
		$bd = new Conexao();
		$conexao = $bd->getConexao();

		//Verifica se o Usuario e Senha estão vazios
		if ($this->user == NULL || $this->password == NULL) {
			echo "<script> window.alert('Favor informas todos os dados!');
		window.location.href = '../index.html';
		</script>";
			exit;
		}

		//Inseri no banco de dados os valores recebidos
		$sql = "INSERT INTO usuarios (user, password) VALUES(?, ?)";

		$stm = $conexao->prepare($sql);
		$stm->bindValue(1, $this->user);
		$stm->bindValue(2, $this->password);

		$result = $stm->execute();

		if (!$result) {
			echo "<script> window.alert('Registro não inserido');
              window.location.href = '../index.html';
              </script>";
		} else {
			echo "<script> window.alert('Registro inserido com sucesso');
              window.location.href = '../index.html ';
              </script>";
		}
	}


	//=======================================================

	//--DESLOGAR--
	public function Logout()
	{

		//Finaliza a sessão existente
		session_start();
		session_destroy();
		header('location: ../index.html');
	}

	//=======================================================











}
