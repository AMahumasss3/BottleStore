
<?php 

	include_once './db.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}

	$sql = $connect->prepare("DELETE FROM produto WHERE id = '$id'");
	$sql->execute();

	header("location: dash.php");
	
 ?>




<?php require_once './foot.php' ?>