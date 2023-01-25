<?php require_once './head.php'; ?>


<?php 

	include_once './db.php';

	$categoria = 'CERVEJA';
	
	if (isset($_POST['ver'])) {
		
		$categoria = $_POST['categoria'];
	}


	$sql = $connect->query("SELECT fornecimento.id as fro_id, quantidade, data_entrada, fornecedor.id as fr_id, fornecedor.nome as forneced, email, telefone,endereco, produto.nome as produt, produto.id as pr_id, preco, categoria FROM fornecimento JOIN fornecedor ON fornecimento.fornecedor = fornecedor.id JOIN Produto ON fornecimento.produto = produto.id WHERE categoria LIKE '$categoria'");

	$sql->execute();

	$dados = $sql->fetchAll(PDO::FETCH_OBJ);


	
 ?>

<style type="text/css">
	body{
		font-size: 19px;
	}
</style>

<div class="container my-3 w-50">

 	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
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

 		<button class="btn btn-success my-3" type="submit" name="ver" >Pesquisar</button>
 	</form>
 	
 </div>


 	
	<div class="container-fluid p-3 my-3">

		<h2 class="my-3 text-center"><?php echo $categoria ?></h2>

		<table class="table table table-bordered table-responsive-sm table-striped">
		<thead class="text-primary">
			<th>Nome do Produto</th>
			<th>Categoria</th>
			<th>Quantidade</th>
			<th>Preco por Unidade</th>
			<th>Data de Entrada</th>
			<th>Dados do Fornecedor</th>
			
		</thead>

		<tbody>
			<?php foreach ($dados as $key): ?>

				<tr>
					<td><?php echo $key->produt ?></td>
					<td><?php echo $key->categoria ?></td>
					<td><?php echo $key->quantidade ?></td>
					<td><?php echo $key->preco ?></td>
					<td><?php echo $key->data_entrada ?></td>
					<td><?php echo "Nome: ".$key->forneced."<br> Email: ".$key->email."<br> Telefone: ".$key->telefone ?></td>
					
					<td>
						<a href="update.php?id=<?php echo $key->pr_id ?>&id2=<?php echo $key->fr_id ?>&id3=<?php echo $key->fro_id ?>" class="btn btn-success">Actualizar</a>

						<a href="delete.php?id=<?php echo $key->pr_id ?>" class="btn btn-danger my-2">Remover</a>
					</td>
					
				</tr>
				

			<?php endforeach ?>
		</tbody>

		
	</table>
	
	</div>



<?php require_once './foot.php' ?>