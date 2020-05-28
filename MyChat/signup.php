<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Criar Nova Conta</title>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
	<!-- <meta http-equiv="X-UA-Compatible" content="IE-edge"> -->
	<meta name="viewport" content="width=devide-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
	<div class="signup-form">
		<form action="" method="post">
			<div class="form-header">
				<h2>Cadastro</h2>
				<p>Preencha este formulário e comece a conversar com seus amigos.</p>
			</div>
			<div class="form-group">
				<label>Nome de Usuário</label>
				<input type="text" class="form-control" name="user_name" placeholder="Exemplo: alister" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Senha</label>
				<input type="password" class="form-control" name="user_password" placeholder="Senha" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Endereço de Email</label>
				<input type="email" class="form-control" name="user_email" placeholder="alguém@site.com" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Cidade</label>
				<select class="form-control" name="user_city" required>
					<option disabled="">Escolha uma Cidade</option>
					<option>Guaratinguetá</option>
					<option>Aparecida</option>
					<option>Lorena</option>
					<option>Pindamonhangaba</option>
					<option>Taubaté</option>
					<option>São José dos Campos</option>
					<option>São Paulo</option>
				</select>
			</div>
			<div class="form-group">
				<label>Genero</label>
				<select class="form-control" name="user_gender" required>
					<option disabled="">Escolha seu Genero</option>
					<option>Masculino</option>
					<option>Feminino</option>
					<option>Outros</option>					
				</select>
			</div>
			<div class="form-group">
				<label class="checkbox-inline"><input type="checkbox" required>Eu aceito os <a href="#">Termos de Uso</a> &amp; <a href="#">Política de Privacidade</a></label>
			</div>			
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Cadastrar</button>
			</div>
			<?php include("signup_user.php"); ?>			
		</form>
		<div class="text-center small" style="color: #181750;">Já possui uma conta? <a href="signin.php">Faça login</a></div>
	</div>
</body>
</html>