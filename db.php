<?php 
	$servername = 'localhost';
	$dbname = 'bottle';
	$username = 'root';

	

	try{
		$connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");	
	}catch(PDOException $e){

		echo "Erro de conexão: ".$e->getMessage();
	}



 