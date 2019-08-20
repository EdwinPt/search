<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Listado de Repositorios</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
	<nav>
		<h3>Listado de Repositorios</h3>
	</nav>
	<div class="divider"></div>
	<div class="container">
		<form class="form-inline" id="form-send" action="#" method="get">
			<input type="text" class="form-control" id="repo" placeholder="Nombre de repositorio">
			<button type="submit" class="btn btn-primary">Search</button>
		</form>
	</div>

	<div class="container">
		<h2 class="not-found"></h2>
		<div class="result">
			<h2>Resultado</h2>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Cantidad</th>
						<th>Autor</th>
						<th>Nombre de repositorio</th>
					</tr>
				</thead>
				<tbody class="items"></tbody>
			</table>
		</div>
	<div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/js/search.js');?>"></script>
</body>
</html>