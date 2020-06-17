<!DOCTYPE html>
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

<body style="color: #fff; background-color: #212529;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<img width="30px" src="../front-end/img/favicon.svg" alt=""> FaturasWeb
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<a class="nav-link" href="exit.php">Sair <span class="sr-only">(current)</span></a>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card bg-dark text-white" style="margin-top: 20vh;">
					<div class="card-body">
						<h3 class="card-title">Digite os dados do boleto que deseja adicionar:</p>
							<form action="usuarios.php" method="POST">
								<div class="form-group">
									<input type="text" name="descricao" class="form-control" placeholder="Descrição" />
								</div>
								<div class="form-group">
									<input type="text" class="form-control money" name="valor" placeholder="Digite o valor do boleto" />
								</div>
								<div class="form-group">
									<input type="date" name="data" class="form-control" placeholder="Vencimento: DD/MM/AAAA" />
								</div>
								<div class="form-group">
									<select name="status" class="form-control">
										<option value="3">Pago</option>
										<option value="2">Vencido</option>
										<option value="1">A vencer</option>
									</select>
								</div>
								<div class="form-group">
									<input class="btn btn-primary btn-block" type="button" onclick="btnAdicionar()" name="buscar" value="Adicionar">
								</div>
							</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12" align="left" style="margin-bottom: 30px;">

						<!-- <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-cog"></i>
					</button> -->

					</div>
					<div class="col-md-12">
						<table class="table table-light table-striped" style="color: #212529;" id='tabelaAddBoleto'>
							<thead class="thead-dark">
								<tr>
									<th></th>
									<th>Código</th>
									<th>Descrição</th>
									<th>Valor</th>
									<th>Vencimento</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody style="color: #212529;">
							</tbody>
						</table>
					</div>
					<div class="btn-group">
						<div class="col-xs-12 col-lg-6">
							<div class="form-group">
								<input class="btn btn-warning btn-block" id="btn_edit" type="button" value="Editar">
							</div>
						</div>
						<div class="col-xs-12 col-lg-6">
							<div class="form-group">
								<input class="btn btn-danger btn-block" id="btn_remove" type="button" value="Remover">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="fixed-action-btn">
			<a class="btn-floating btn-large red">
				<i class="large material-icons"><i class="fas fa-cog"></i></i>
			</a>
			<ul>
				<li style="margin-right: -20%; float: right;"><a class="btn-floating btn btn-success" title="Pagos" id="pago">Pagos</a></li>
				<li style="margin-right: -20%; float: right;"><a class="btn-floating btn btn-primary" title="A vencer" id="a_vencer">A vencer</a></li>
				<li style="margin-right: -20%; float: right;"><a class="btn-floating btn btn-danger" title="Vencidos" id="vencido">Vencidos</a></li>
				<li style="margin-right: -20%; float: right;"><a class="btn-floating btn btn-secondary" title="Todos" id="todos">Todos</a></li>
			</ul>
		</div>
</body>

</html>