<?php 
		include_once './db.php';
		session_start();

		$id = $_SESSION['id'];
		$id2 = $_SESSION['id2'];
		$id3 = $_SESSION['id3'];

		$forn = $_POST['fornecedor'];

		$produto = $_POST['produto'];
		$qtd = $_POST['qtd'];
		$preco = $_POST['preco'];
		$data = $_POST['data'];
		$categoria = $_POST['categoria'];

		$nome = $_POST['fornecedor'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$endereco = $_POST['endereco'];


		$sql = $connect->prepare("UPDATE produto SET nome = '$produto', preco = '$preco', categoria = '$categoria' WHERE id = '$id'");
		$sql->execute();


		$sql = $connect->prepare("UPDATE fornecedor SET nome = '$nome', email = '$email', telefone = '$tel', endereco = '$endereco' WHERE id = '$id2' ");
		$sql->execute();


		$sql = $connect->prepare("UPDATE fornecimento SET quantidade = '$qtd', data_entrada = '$data' WHERE id = '$id3'");

		$sql -> execute();


		header("location: dash.php");


 ?>