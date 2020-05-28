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
				<h2>Esqueceu a Senha</h2>
				<p>MyChat</p>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="alguém@site.com" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Nome do Melhor Amigo</label>
				<input type="text" class="form-control" name="bf" placeholder="Alguém..." autocomplete="off" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Enviar</button>
			</div>
		</form>
		<div class="text-center small" style="color: #fff;">Voltar ao login? <a href="signin.php">Clique aqui</a></div>
	</div>
	<?php  
	session_start();

	include("include/connection.php");

		if (isset($_POST['submit'])) {
			$email = htmlspecialchars(mysqli_real_escape_string($con, $_POST['email']));
			$recovery_account = htmlspecialchars(mysqli_real_escape_string($con, $_POST['bf']));

			$select = "SELECT * FROM users WHERE user_email = '$email' AND forgotten_answer = '$recovery_account'";

			$query = mysqli_query($con, $select);

			$check_user = mysqli_num_rows($query);

			if ($check_user == 1) {
				$_SESSION['user_email'] = $email;

				echo "<script>window.open('create_password.php', '_self')</script>";
			}else{
				echo "<script>alert('Seu email ou nome de melhor amigo está incorreto')</script>";
				echo "<script>window.open('forgot_pass.php', '_self')</script>";
			}
		}
	?>
</body>
</html>