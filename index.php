<?php 

	require_once 'db.php';
	
	
	if (isset($_POST['entrar'])) {
		
		$user = $_POST['user'];
		$psw = $_POST['psw'];

		$sql = $connect->query("SELECT * FROM gestor WHERE username = '$user' AND senha = '$psw'");
		$sql->execute();

		$dados = $sql->fetch(PDO::FETCH_OBJ);

		if (!empty($dados)) {
			
			$_SESSION['nome'] = $dados->nome;

			header('location: dash.php');
		}else{ ?>

			<div class="alert alert-danger">
				Username ou Password Incorrectos! 
			</div>
		<?php }

	}



 ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
</head>
<body>

	
	<div class="container-fluid bg-primary p-3">
		<h1 class="text-white"> AGFM Bottle Store</h1>
	</div>



	<div class="container my-4 w-50">

		<h3>Login</h3>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			
			<div class="my-3">
				<label class="form-label">Username:</label>
				<input type="text" name="user" class="form-control" required>
			</div>

			

			<div class="my-3">
				<label class="form-label">Password:</label>
				<input type="password" name="psw" class="form-control" required>
			</div>

			<button class="btn btn-success my-3" type="submit" name="entrar">Entrar</button>
		</form>
		
	</div>


</body>
</html>