<!DOCTYPE html>
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
	<form method="POST" action="process.php">
		<input type="text" minlength="3" placeholder="Digite seu nome" required="">
		<input type="text" minlength="3" placeholder="Digite seu sobrenome" required="">
		<input type="tel" required="required" maxlength="15" name="phone" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" title="Número de telefone precisa ser no formato (99) 9999-9999" placeholder="Digite seu telefone" />
		<input type="email" placeholder="Digite seu e-mail">
		<input type="email" placeholder="Confirme seu e-mail">
		<input type="password" placeholder="Digite sua senha">
		<input type="password" placeholder="Confirme sua senha">
		<input type="submit" value="Cadastrar">	
	</form>
	</div>
</body>
</html>