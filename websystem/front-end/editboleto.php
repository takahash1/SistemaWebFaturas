<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<title>Controle de faturas</title>
	<link rel="stylesheet" type="text/css" href="../front-end/css/style.css">
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
	<div id="tabelahome">
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