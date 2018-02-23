<title>Edit</title>
<?php 
require_once 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM people WHERE id=:id";
$stmt = $connection->prepare($sql);
$stmt->execute([":id"=>$id]);
$person = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST['name']) && isset($_POST['email'])) {
	
	$name 	= $_POST['name'];
	$email 	= $_POST['email'];

	$sql = "UPDATE people SET name = :name , email = :email WHERE id = :id";
	$stmt = $connection->prepare($sql);
	if ($stmt->execute([':name' => $name , ':email' => $email , ':id' => $id])) {
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
				<h2>Update</h2>
			</div>
			<div class="card-body">
				<?php if(!empty($message)): ?>
					<div class="alert alert-sucess">
						<?= $message ?>
					</div>
				<?php endif; ?>
				<form method="post">
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" name="name" id="name" value="<?=$person->name?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="nome">Email</label>
						<input type="email" name="email" id="email" value="<?=$person->email?>" class="form-control">	
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php require_once 'footer.php'; ?>