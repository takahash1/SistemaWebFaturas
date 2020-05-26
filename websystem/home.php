<?php
	session_start();
	if(!isset($_SESSION['id_usuario']))
	{
		header("location: index.php");
		exit;
	}
?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<title>Controle de faturas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="menu">
		<ul id="menulist">
			<li>
				<a id="fpLink" class="btnNavbar" href="home.php">Home</a>php</li>
			<li>
				<a id="fpLink" class="btnNavbar" href="addboleto.php">Adicionar fatura</a>
			</li>
			<li>
				<a id="fpLink" class="btnNavbar" href="removeboleto.php">Remover Fatura</a>
			</li>
			<li>
				<a id="fpLink" class="btnNavbar" href="editboleto.php">Editar fatura</a>
			</li>
			<li>
				<a id="fpLink" class="sair" href="exit.php">Sair</a>
			</li>
		</ul>
		</div>
	<table>
		<div id="rdBtn">
		<form method="GET">
			<input type="radio" name="filtrarDataMaior">Filtrar por data (mais recente para mais antiga)</input>
			<input type="radio" name="filtrarDataMenor">Filtrar por data (mais antiga para mais recente)</input>
			<input type="radio" name="filtrarValorMaior">Filtrar por valor (do maior para o menor)</input>
			<input type="radio" name="filtrarValorMenor">Filtrar por valor (do menor para o maior)</input>
			<input type="text" name="filtrarPalavra" placeholder="ou digite uma palavra-chave">
		</form>
		<div id="tabela">
		</form>
			<td id="codigo">Código</td>
			<td id="descricao">Descrição</td>
			<td id="valor">Valor</td>
			<td id="dataVenc">Vencimento</td>
			<td id="dataVenc">Status</td>

		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>
</body>
</html>