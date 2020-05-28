<!DOCTYPE html>
<html>
<head>
	<title>Login em sua conta</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=devide-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
	<div class="signin-form">
		<form action="" method="post">
			<div class="form-header">
				<h2>Criar Nova Senha</h2>
				<p>MyChat</p>
			</div>
			<div class="form-group">
				<label>Digite a Senha</label>
				<input type="password" class="form-control" name="pass1" placeholder="Senha" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Confirme a Senha</label>
				<input type="password" class="form-control" name="pass2" placeholder="Confirme a Senha" autocomplete="off" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Alterar</button>
			</div>
		</form>
	</div>

	<?php  
	session_start();

	include("include/connection.php");

	if (isset($_POST['change'])) {
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$user = $_SESSION['user_email'];

		if ($pass1 != $pass2) {
			echo "<script>alert('Sua Nova senha é diferente da senha de confirmação')</script>";
			exit();
		}
		if (strlen($pass1) < 9 AND strlen($pass2) < 9){
			echo "<script>alert('Use 9 ou mais caracteres')</script>";
			exit();
		}

		if ($pass1 == $pass2) {
			$update_pass = mysqli_query($con, "UPDATE users SET user_pass = '$pass1' WHERE user_email = '$user'");
			session_destroy();
			echo "<script>alert('Vá adiante e faça login')</script>";
			echo "<script>window.open('signin.php', '_self')</script>";
		}
	}
	?>
</body>
</html>