<title>Create</title>
<?php 
require_once 'db.php';

$message = "";

if (isset($_POST['name']) && isset($_POST['email'])) {
	
	$name 	= $_POST['name'];
	$email 	= $_POST['email'];

	$sql = "INSERT INTO people(name,email) VALUES(:name,:email)";
	$stmt = $connection->prepare($sql);
	if ($stmt->execute([':name' => $name , ':email' => $email])) {
		$message = "Cadastro Feito!";
		header('location:index.php');
	}else{
		echo "Erro";
	}
}
?>
<?php require_once 'header.php'; ?>
<div class="container">
	<div class="card mt-5">
		<div class="card-header">
			<h2>Who</h2>
		</div>
		<div class="card-body">
			<form method="post">
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="nome">Email</label>
					<input type="email" name="email" id="email" class="form-control">		
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">Create</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php require_once 'footer.php'; ?>