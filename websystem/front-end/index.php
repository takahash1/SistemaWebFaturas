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
	<div id="formulariologin">
	<h1>Entrar</h1>	
	<form method="POST">
		<input id="inpLogin" type="email" name="email" placeholder="Digite seu e-mail">
		<input id="inpLogin" type="password" name="senha" placeholder="Digite sua senha">
		<input id="inpLogin" type="submit" value="Entrar">
		<a id="indexLink" href="../front-end/cadastrar.php">Não possui conta? Cadastre-se</a>	
	</form>
	</div>

	<?php
	if(isset($_POST['email']))
{	
	$email = addslashes($_POST['email']);	
	$senha = addslashes($_POST['senha']);
	
	if(!empty($email) && !empty($senha))
	{	
		$u->conectar("faturas", "localhost", "root", "");
		if($u->msgErro == "")
		{
			if($u->logar($email, $senha))
			{
				header("location: home.php");
			}
			else
			{
				?>
				<div class="msg-erro">
					Email e/ou senha inválidos!
				</div>
				<?php
			}
		}
		else
		{
				?>
				<div class="msg-erro">
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