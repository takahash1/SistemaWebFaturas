<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<title>Controle de faturas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
</script>
<body>
	<div id="menu">
		<ul id="menulist">
			<li>
				<a id="fpLink" class="btnNavbar" href="home.php">Home</a>
			</li>
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
		<div id="formularioMenu">
			<h3>Selecione o boleto</h3>
			<h3>que deseja remover:</h3>
		<form method="POST">
			<input id="inpHome" type="date" name="data" placeholder="DD/MM/AAAA">
			<input id="inpHome" type="text" name="descricao" placeholder="Descrição">
			<input id="inpHome" type="tel"  name="valor" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" placeholder="Digite o valor do boleto">
			<input id="inpHome" type="submit" name="buscar" value="Buscar">
		</form>
	</div>
	<table>
		<div id="tabela">
		<tr>
			<td id="cod">Código</td>
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
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</body>
</html>