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
				<h2>Sign In</h2>
				<p>Login para MyChat</p>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="alguém@site.com" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Senha</label>
				<input type="password" class="form-control" name="password" placeholder="Senha" autocomplete="off" required>
			</div>
			<div class="small">Esqueceu a Senha? <a href="forgot_pass.php">Clique aqui</a></div><br>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">Entrar</button>
			</div>
			<?php include("signin_user.php"); ?>
		</form>
		<div class="text-center small" style="color: #fff;">Não possui uma conta? <a href="signup.php">Crie uma</a></div>
	</div>
</body>
</html>