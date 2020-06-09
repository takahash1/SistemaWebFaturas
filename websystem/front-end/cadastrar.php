<?php
	require_once '../back-end/classes/usuarios.php';
	$u = new Usuario;
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<title>Controle de faturas</title>
	<link rel="stylesheet" href="../front-end/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../front-end/img/favicon.svg" type="image/x-icon"/>
</head>
<body id="index">

	<div id="formulariologin1">
	<h1>Insira seus dados</h1>	
	<h2>e realize seu cadastro</h2>
	<form method="POST">
		<input id="inpLogin" type="text" name="nome"  maxlength="30" placeholder="Digite seu nome completo"> 
		<input id="inpLogin" type="tel" name="telefone" maxlength="30" name="phone" title="Número de telefone precisa ser no formato (99) 9999-9999" placeholder="Digite seu telefone" />
		<input id="inpLogin" type="email" name="email" placeholder="Digite seu e-mail" maxlength="40">
		<input id="inpLogin" type="email" name="confEmail" placeholder="Confirme seu e-mail" maxlength="40">
		<input id="inpLogin" type="password" name="senha" placeholder="Digite sua senha" maxlength="15">
		<input id="inpLogin" type="password" name="confSenha" placeholder="Confirme sua senha" maxlength="15">
		<input id="inpLogin" type="submit" value="Cadastrar">	
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

	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($confirmarEmail) && !empty($senha) && !empty($confirmarSenha))
	{
		$u->conectar("faturas", "localhost", "root", "");
		if($u->msgErro == "")
		{
			if($senha == $confirmarSenha)
			{
				if($u->cadastrar($nome, $telefone, $email, $senha))
				{
					?>
					<div id="msg-sucesso">
					Cadastrado com sucesso. <a id="indexLink" href="index.php"> Acesse para entrar!</a>
					</div>
					<?php
				}
				else
				{
					?>
					<div class="msg-erro">
						 Email ja cadastrado!
					</div>
					<?php
				}
			}
			else
			{
				?>
				<div class="msg-erro"> 
					Senhas não conferem!
				</div>
				<?php
			}
		}
		else
		{
			?>
			<div>
				<?php echo "Erro: ".$u->msgErro?>
			</div>
			<?php
		}
	}
	else
	{
		?>
		<div class="msg-erro">
		Preencha todos os campos!
		</div>
		<?php
	}	
}

?>
</body>
</html>