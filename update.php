<?php require './head.php'; ?>


<?php 
	
	include_once './db.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$id2 = $_GET['id2'];
		$id3 = $_GET['id3'];

		$_SESSION['id'] = $id;
		$_SESSION['id2'] = $id2;
		$_SESSION['id3'] = $id3;
	}

	$sql = $connect->query("SELECT quantidade, data_entrada, fornecedor.nome as forneced, email, telefone,endereco, produto.nome as produt, produto.id as pr_id, preco, categoria FROM fornecimento JOIN fornecedor ON fornecimento.fornecedor = fornecedor.id JOIN Produto ON fornecimento.produto = produto.id WHERE produto.id = '$id'");

	$sql->execute();

	$produto = $sql->fetch(PDO::FETCH_OBJ);

	
 ?>

<style type="text/css">
	label{
		font-size: 19px;
	}
</style>



<div class="container my-3">

	<h1 class="text-center">Actualizar Dados</h1>

	<form method="POST" action="update2.php">
		
		<h3 class="my-3">Produto</h3>
		<div>
			<label class="form-label">Nome do Produto:</label>
			<input type="text" name="produto" class="form-control" value="<?php echo $produto->produt ?>">
		</div>

		<div>
			<label class="form-label">Categoria:</label>
	 		<select name="categoria" class="form-select">
	 			<option value="<?php echo $produto->categoria  ?>"><?php echo $produto->categoria  ?></option>
	 			<option value="VINHO">VINHO</option>
	 			<option value="GIN">GIN</option>
	 			<option value="LIQUOR">LIQUOR</option>
	 			<option value="VODKA">VODKA</option>
	 			<option value="CERVEJA">CERVEJA</option>
	 			<option value="REFRIGERANTE">REFRIGERANTE</option>
	 		</select>
		</div>

		<div>
			<label class="form-label">Quantidade:</label>
			<input type="number" name="qtd" class="form-control" value="<?php echo $produto->quantidade ?>">
		</div>

		<div>
			<label class="form-label">Preco por Unidade:</label>
			<input type="number" name="preco" class="form-control" value="<?php echo $produto->preco ?>">
		</div>

		<div>
			<label class="form-label">Data de Entrada:</label>
			<input type="date" name="data" class="form-control" value="<?php echo $produto->data_entrada ?>">
		</div>
		<hr>

		<h3 class="my-3">Fornecedor</h3>

		<div>
			<label class="form-label">Nome do Fornecedor:</label>
			<input type="text" name="fornecedor" class="form-control" value="<?php echo $produto->forneced ?>">
		</div>

		<div>
			<label class="form-label">Email:</label>
			<input type="email" name="email" class="form-control" value="<?php echo $produto->email ?>">
		</div>

		<div>
			<label class="form-label">Numero de Telefone:</label>
			<input type="number" name="tel" class="form-control" value="<?php echo $produto->telefone ?>">
		</div>

		<div>
			<label class="form-label">Endereco:</label>
			<textarea class="form-control" name="endereco"><?php echo $produto->endereco ?></textarea>
		</div>

		<button class="btn btn-success my-3" type="submit" name="enviar">Actualizar</button>
	</form>
	
</div>





<?php require './foot.php'; ?>