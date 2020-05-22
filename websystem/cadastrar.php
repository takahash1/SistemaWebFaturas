<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<title>Controle de faturas</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v7.0&appId=249156916192097&autoLogAppEvents=1"></script>
	<script>
	  	window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '{249156916192097}',
	      cookie     : true,
	      xfbml      : true,
	      version    : '{v7.0}'
	    });
	      
	    FB.AppEvents.logPageView();   
	 	 };
	</script>

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
		<div class="fb-login-button" id="fb" data-size="large" data-button-type="continue_with" data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
		<input type="submit" value="Cadastrar">	
	</form>
	</div>
</body>
</html>