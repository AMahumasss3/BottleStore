<?php require './head.php'; ?>


<?php 

	include_once './db.php';

	if (isset($_POST['guardar'])) {
		

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

		$sql = $connect->prepare("INSERT INTO produto (nome, preco, categoria) VALUES ('$produto', '$preco', '$categoria')");
		$sql->execute();

		$sql = $connect->query("SELECT MAX(id) as id FROM produto");
		$sql->execute();
		$id = $sql->fetch(PDO::FETCH_OBJ);

		$id = $id->id;

		$sql = $connect->prepare("INSERT INTO fornecedor(nome, endereco, telefone, email) VALUES ('$nome', '$endereco', '$tel', '$email')");
		$sql->execute();

		$sql = $connect->query("SELECT MAX(id) as id FROM fornecedor");
		$sql->execute();
		$id2 = $sql->fetch(PDO::FETCH_OBJ);

		$id2 = $id2->id;

		$sql = $connect->prepare("INSERT INTO fornecimento(quantidade, data_entrada, produto, fornecedor) VALUES ('$qtd', '$data', '$id', '$id2')");

		$sql->execute();
		

		header('location: dash.php');

	}


 ?>

<style type="text/css">
	label{
		font-size: 19px;
	}
</style>


<div class="container my-3">
       
	<h1 class="text-center">Registar Novo Produto</h1>

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		
		<h3 class="my-3">Produto</h3>
		<div>
			<label class="form-label">Nome do Produto:</label>
			<input type="text" name="produto" class="form-control">
		</div>

		<div>
			<label class="form-label">Categoria:</label>
	 		<select name="categoria" class="form-select">
	 			<option></option>
	 			<option value="CERVEJA">CERVEJA</option>
	 			<option value="VINHO">VINHO</option>
	 			<option value="GIN">GIN</option>
	 			<option value="LIQUOR">LIQUOR</option>
	 			<option value="VODKA">VODKA</option>
	 			<option value="REFRIGERANTE">REFRIGERANTE</option>
	 		</select>
		</div>

		<div>
			<label class="form-label">Quantidade:</label>
			<input type="number" name="qtd" class="form-control">
		</div>

		<div>
			<label class="form-label">Preco por Unidade:</label>
			<input type="number" name="preco" class="form-control">
		</div>

		<div>
			<label class="form-label">Data de Entrada:</label>
			<input type="date" name="data" class="form-control">
		</div>
		<hr>

		<h3 class="my-3">Fornecedor</h3>

		<div>
			<label class="form-label">Nome do Fornecedor:</label>
			<input type="text" name="fornecedor" class="form-control">
		</div>

		<div>
			<label class="form-label">Email:</label>
			<input type="email" name="email" class="form-control">
		</div>

		<div>
			<label class="form-label">Numero de Telefone:</label>
			<input type="number" name="tel" class="form-control">
		</div>

		<div>
			<label class="form-label">Endereco:</label>
			<textarea class="form-control" name="endereco"></textarea>
		</div>

		<button class="btn btn-success my-3" type="submit" name="guardar">Guardar</button>
	</form>
	
</div>





<?php require './foot.php'; ?>