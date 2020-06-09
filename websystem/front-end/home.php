<?php
	session_start();
	if(!isset($_SESSION['id_usuario']))
	{
		header("location: ../front-end/index.php");
		exit;
	}
?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<title>Controle de faturas</title>
	<link rel="stylesheet" type="text/css" href="../front-end/css/style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rhl="stylesheet"/>
	<script type="text/javascript" src="../back-end/js/script.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../front-end/img/favicon.svg" type="image/x-icon"/>
</head>
<header>
	<div id="menu">
		<div id="menuList">
			<ul id="menulist">
				<li>
					<a id="fpLink" class="btnNavbar" href="../front-end/home.php">Home</a>
				</li>
				<li>
					<a id="fpLink" class="btnNavbar" href="../front-end/addboleto.php">Adicionar fatura</a>
				</li>
				<li>
					<a id="fpLink" class="btnNavbar" href="../front-end/removeboleto.php">Remover Fatura</a>
				</li>
				<li>
					<a id="fpLink" class="btnNavbar" href="../front-end/editboleto.php">Editar fatura</a>
				</li>
				<li>
					<a id="fpLink" class="sair" href="../front-end/exit.php">Sair</a>
				</li>
			</ul>
		</div>	
	</div>	
</header>
<body>
	<div id="botoes">
		<div class="btn-group">
		  <button type="button" id="pago" class="btn btn-success btn-xs">Pagos</button>
		  <button type="button" id="a_vencer" class="btn btn-warning btn-xs">A vencer</button>
		  <button type="button" id="vencido" class="btn btn-danger btn-xs">Vencidos</button>
		  <button type="button" class="btn btn-secondary">Todos</button>
		</div>
	</div>
	<div id="tabelaHome">
		<table class="table">				
			<thead>		
			<tr>
				<th>Código</th>
				<th>Descrição</th>
				<th>Valor</th>
				<th>Vencimento</th>
				<th>Status</th> 
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>1</td>
				<td>Nubank</td>				
				<td>R$15,00</td>
				<td>15/01/2020</td>		
				<td data-estado="pago">Pago</td>		
			</tr>
			<tr>
				<td>2</td>
				<td>Terra</td>				
				<td>R$25,00</td>
				<td>10/06/2020</td>	
				<td data-estado="a_vencer">A vencer</td>			
			</tr>
			<tr>
				<td>3</td>
				<td>Oi</td>			
				<td>R$50,00</td>
				<td>23/11/1995</td>	
				<td data-estado="vencido">Vencido</td>			
			</tr>
			</tbody>
		</table>
	</div>
</body>
</html>


<!---
<html>
		<div id="rdBtn">
				<form method="GET">
					<input type="radio" name="filtrarDataMaior">Filtrar por data (mais recente para mais antiga)</input>
					<input type="radio" name="filtrarDataMenor">Filtrar por data (mais antiga para mais recente)</input>
					<input type="radio" name="filtrarValorMaior">Filtrar por valor (do maior para o menor)</input>
					<input type="radio" name="filtrarValorMenor">Filtrar por valor (do menor para o maior)</input>
					<input type="text" name="filtrarPalavra" placeholder="ou digite uma palavra-chave">
				</form>
		</div>
</html>

	<!---	<th id="codigo">Código</th>
				<th id="descricao">Descrição</th>
				<th id="valor">Valor</th>
				<th id="dataVenc">Vencimento</th>
				<th id="dataVenc">Status</th> 
				--->