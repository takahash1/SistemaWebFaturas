<?php
	require_once 'classes/usuarios.php';
	$u = new Usuario;
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<title>Controle de faturas</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div id="formulario">
	<h1>Insira seus dados</h1>	
	<h2>e realize seu cadastro</h2>
	<form method="POST">
		<input type="text" name="nome"  maxlength="30" placeholder="Digite seu nome completo"> 
		<input type="tel" name="telefone" maxlength="30" name="phone" title="Número de telefone precisa ser no formato (99) 9999-9999" placeholder="Digite seu telefone" />
		<input type="email" name="email" placeholder="Digite seu e-mail" maxlength="40">
		<input type="email" name="confEmail" placeholder="Confirme seu e-mail" maxlength="40">
		<input type="password" name="senha" placeholder="Digite sua senha" maxlength="15">
		<input type="password" name="confSenha" placeholder="Confirme sua senha" maxlength="15">
		<input type="submit" value="Cadastrar">	
	</form>
	</div>

<?php

if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$confirmarEmail = addslashes($_POST['confEmail']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes($_POST['confSenha']);

	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($confEmail) && !empty($senha) && !empty($confSenha))
	{
		$u->conectar("faturas", "localhost", "root", "");
		if($u->msgErro == "")
		{
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome, $telefone, $email, $senha))
				{
					echo "Cadastrado com sucesso";
				}
				else
				{
					echo "Email ja cadastrado";
				}
			}
			else
			{
				echo "Senha e confirmar senha não conferem!";
			}
		}
		else
		{
			echo "Erro: ".$u->msgErro;
		}
	}
	else
	{
		echo "Preencha todos os campos!"; 
	}	
}

?>
</body>
</html>