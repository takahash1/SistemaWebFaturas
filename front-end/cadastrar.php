<?php
require_once '../back-end/classes/usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<title>FaturasWeb</title>
	<link rel="stylesheet" type="text/css" href="../front-end/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../front-end/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="../front-end/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="../front-end/css/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="../front-end/css/borderless.css">
	<link rel="stylesheet" type="text/css" href="../front-end/css/css_only_fixed_button.css">
	<link rel="stylesheet" type="text/css" href="../front-end/css/style.css">

	<script type="text/javascript" src="../back-end/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../back-end/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../back-end/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../back-end/js/jquery.mask.js"></script>
	<script type="text/javascript" src="../back-end/js/FloatingButton.js"></script>

	<script type="text/javascript" src="../back-end/js/sweetalert2.js"></script>
	<script type="text/javascript" src="../back-end/js/datatables.min.js"></script>
	<script src="https://kit.fontawesome.com/242f9ce5bd.js" crossorigin="anonymous"></script>

	<script type="text/javascript" src="../back-end/js/script.js"></script>
	<script type="text/javascript" src="../back-end/js/home.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../front-end/img/favicon.svg" type="image/x-icon" />
</head>

<body id="index">
	<nav style="height: 80px;" class="navbar navbar-expand-lg navbar-dark bg-dark">
		<img width="30px" src="../front-end/img/favicon.svg" alt="icon"> <a id="indexLink" style="color: white;" href="../front-end/index.php">FaturasWeb</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<div id="formulariologin1">
		<h1>Insira seus dados</h1>
		<h2>e realize seu cadastro</h2>
		<form method="POST">
			<input id="inpLogin" type="text" name="nome" maxlength="30" placeholder="Digite seu nome completo">
			<input id="inpLogin" type="tel" name="telefone" maxlength="30" name="phone" title="Número de telefone precisa ser no formato (99) 9999-9999" placeholder="Digite seu telefone" />
			<input id="inpLogin" type="email" name="email" placeholder="Digite seu e-mail" maxlength="40">
			<input id="inpLogin" type="email" name="confEmail" placeholder="Confirme seu e-mail" maxlength="40">
			<input id="inpLogin" type="password" name="senha" placeholder="Digite sua senha" maxlength="15">
			<input id="inpLogin" type="password" name="confSenha" placeholder="Confirme sua senha" maxlength="15">
			<input id="inpLogin" type="submit" value="Cadastrar">
		</form>
		<a id="indexLink" href="../front-end/index.php">Já cadastrou? Logue agora.</a>
	</div>

	<?php

	if (isset($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$telefone = addslashes($_POST['telefone']);
		$email = addslashes($_POST['email']);
		$confirmarEmail = addslashes($_POST['confEmail']);
		$senha = addslashes($_POST['senha']);
		$confirmarSenha = addslashes($_POST['confSenha']);

		if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($confirmarEmail) && !empty($senha) && !empty($confirmarSenha)) {
			if ($u != false) {
				if ($senha == $confirmarSenha) {
					if ($email == $confirmarEmail) {
						if ($u->cadastrar($nome, $telefone, $email, $senha)) {
	?>
							<script>
								Swal.fire({
									title: "Beleza!",
									text: "Cadastrado com sucesso.",
									icon: "success",
									confirmButtonText: 'Ok!'
								});
							</script>
						<?php
						} else {
						?>
							<script>
								Swal.fire({
									title: "Opa!",
									text: "Email já cadastrado.",
									icon: "warning",
									confirmButtonText: 'Ok!'
								});
							</script>
						<?php
						}
					} else {
						?>
						<script>
							Swal.fire({
								title: "Opa!",
								text: "Emails não conferem.",
								icon: "warning",
								confirmButtonText: 'Ok!'
							});
						</script>
					<?php
					}
				} else {
					?>
					<script>
						Swal.fire({
							title: "Opa!",
							text: "Senhas não conferem.",
							icon: "warning",
							confirmButtonText: 'Ok!'
						});
					</script>
				<?php
				}
			} else {
				?>
				<div>
					<?php echo "Erro: " . $u->msgErro ?>
				</div>
			<?php
			}
		} else {
			?>
			<script>
				Swal.fire({
					title: "Opa!",
					text: "Preencha todos os campos.",
					icon: "warning",
					confirmButtonText: 'Ok!'
				});
			</script>
	<?php
		}
	}

	?>
</body>

</html>