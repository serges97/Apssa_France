<?php

require_once ('connect.php');

	$id = $_GET['id'];
	$selSql = "SELECT * FROM `etudiant` WHERE id=$id";
	$res = mysqli_query($con, $selSql);
	$r = mysqli_fetch_assoc($res);

	if (isset($_POST) & !empty($_POST)) {
		$nom = ($_POST['nom']);
		$prenom = ($_POST['prenom']);
		$email = ($_POST['email']);
		$gender = $_POST['gender'];
		$age = $_POST['age'];

		$UpdateSql = "UPDATE `etudiant` SET first_name='$nom',	last_name='$prenom', email='$email', gender='$gender', age='$age'  WHERE id=$id ";

		$res = mysqli_query($con, $UpdateSql);
		if ($res) {
			header("location: view.php");
		}else{
			$erreur = "la mise à jour a échoué.";
		}
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>E-learnig App</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css" >

</head>
<body>
	<?php
		include 'navbar.php';
	 ?>

	<div class="container">
		<div class="row pt-4">
				<?php if (isset($erreur)) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $erreur; ?>
				</div> <?php } ?>

			<form action="" method="POST" class="form-horizontal col-md-6 pt-4">
				<h2> Formulaire de modification </h2>

				<div class="form-group">
					<label for="input1" class="col-sm-2 control-label">Nom</label>
					<div class="col-sm-10">
						<input type="text" name="nom" placeholder="Nom"
						class="form-control" id="input1"
						value="<?php echo $r['first_name'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input1" class="col-sm-2 control-label">prenom</label>
					<div class="col-sm-10">
						<input type="text" name="prenom" placeholder="prenom" class="form-control" id="input1"
						value="<?php echo $r['last_name'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input1" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" placeholder="e-mail" class="form-control" id="input1"
						value="<?php echo $r['email'] ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="input1" class="col-sm-2 control-label">Genre</label>
					<div class="col-sm-10">
						<label>
							<input type="radio" name="gender" id="optionsRadios"
							value="h" <?php if($r['gender'] == 'h'){ echo "checked";} ?>>
							H
						</label>
						<label>
							<input type="radio" name="gender" id="optionsRadios" value="f" <?php if($r['gender'] == 'f'){ echo "checked";} ?>>
							F
						</label>

					</div>
				</div>

				<div class="form-group">
					<label for="input1" class="col-sm-2 control-label">Age</label>
					<div class="col-sm-10">
					<input type="text" name="age" placeholder="age" class="form-control">
					</div>
				</div>

				<div class="pt-4">
					<input type="submit" value="submit" class="btn btn-primary m-3">

				</div>
			</form>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>