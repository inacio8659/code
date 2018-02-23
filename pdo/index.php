<?php  
require_once 'db.php';
$sql = "SELECT * FROM people";
$stmt = $connection->prepare($sql);
$stmt->execute();
$people = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<?php require_once 'header.php'; ?>
<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>All People</h2>
		</div>
		<div class="card-body">
			<table class="table table-border-bordered">
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
				<?php foreach($people as $person): ?>
					<tr>
						<td><?=$person->name?></td>
						<td><?=$person->email?></td>
						<td><a href="edit.php?id=<?=$person->id?>" class="btn btn-info">Editar</a></td>
						<td><a href="delete.php?id=<?=$person->id?>" class="btn btn-danger">Deletar</a></td>
					</tr>
				<?php endforeach; ?>	
			</table>
		</div>
	</div>
</div>
<?php require_once 'footer.php'; ?>