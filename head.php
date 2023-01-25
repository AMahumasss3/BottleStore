<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BOTTLE STORE</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
	<script type="text/javascript" src="./bootstrap.bundle.min.js"></script>
	<style type="text/css">
		a, .nav-link{
			color: white;
			font-weight: bold;
			font-size: 20px;
			margin-right: 10px;
		}
	</style>
</head>
<body>

	<nav class="navbar navbar-expand-sm bg-primary p-3">

		<div class="container-fluid">
			<a href="./dash.php" class="navbar-brand">BOTTLE STORE</a>
			<ul class="navbar-nav">

				<li class="nav-item">
					<a href="./entradaStock.php" class="nav-link">ENTRADA DE PRODUTOS</a>
				</li> 

				<li class="nav-item">
					
					<a href="./index.php" class="nav-link" id="lgo">LOGOUT</a>
				</li>
				
			</ul>
		</div>

	</nav>
