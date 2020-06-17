<?php
require_once "global.php";
require_once "database.php";
Class Usuario
{
	public $pdo;
	public $msgErro = "";
	public $functions;

	public function __construct()
	{
		$this->functions = new GlobalFunctions();
		$this->pdo = new Database();
	}

	public function cadastrar($nome, $telefone, $email, $senha)
	{
		$sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios	WHERE email = :e");
		$sql->bindValue(":e",$email);
		$sql->execute();

		if($sql->rowCount() > 0)
		{
			return false;
		}
		else
		{
			$sql=$this->pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES(:n, :t, :e, :s)");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":t",$telefone);
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
			return true;
		}
	}

	public function logar($email, $senha)
	{
		$sql = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
		$sql->bindValue(":e",$email);
		$sql->bindValue(":s",md5($senha));
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			$dado = $sql->fetch();
			session_start();
			$_SESSION['id_usuario'] = $dado['id_usuario'];
			return true;
		}
		else
		{
			return false;
		}
	}
/*	public  function cadastrarFatura($descricao, $valor, $data)
	{
		global $pdo;

		$sql = $pdo->prepare("INSERT INTO faturas (descricao, valor, vencimento) VALUES ('$descricao', $valor, $data)";
	}*/

}

?>