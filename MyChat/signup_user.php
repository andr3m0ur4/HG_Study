<?php 
ini_set('default_charset', 'UTF-8');
include("include/connection.php");

	if (isset($_POST['sign_up'])){
		$name = htmlspecialchars(mysqli_real_escape_string($con, $_POST['user_name']));
		$pass = htmlspecialchars(mysqli_real_escape_string($con, $_POST['user_password']));
		$email = htmlspecialchars(mysqli_real_escape_string($con, $_POST['user_email']));
		$city = htmlspecialchars(mysqli_real_escape_string($con, $_POST['user_city']));
		$gender = htmlspecialchars(mysqli_real_escape_string($con, $_POST['user_gender']));
		$rand = rand(1, 2);

		if ($name == ''){
			echo "<script>alert('Não podemos verificar seu nome')</script>";
		}
		if (strlen($pass) < 8){
			echo "<script>alert('Senha deve ter no mínimo 8 caracteres')</script>";
			exit();
		}

		$check_email = "SELECT * FROM users WHERE user_email = '$email'";
		$run_email = mysqli_query($con, $check_email);
		$check = mysqli_num_rows($run_email);
		if ($check == 1) {
			echo "<script>alert('Email já existe, por favor tente novamente!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		if ($rand == 1) {
			$profile_pic = "images/codingcafe1.png";
		}else if ($rand == 2) {
			$profile_pic = "images/codingcafe2.png";
		}

		$insert = "INSERT INTO users (user_name, user_pass, user_email, user_profile, user_city, user_gender) VALUES ('$name', '$pass', '$email', '$profile_pic', '$city', '$gender')";
		$query = mysqli_query($con, $insert);

		if ($query) {
			echo "<script>alert('Parabéns $name, sua conta foi criada com sucesso')</script>";
			echo "<script>window.open('signin.php', '_self')</script>";
		}else{
			echo "<script>alert('Registro falhou, tente novamente!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
		}
	}
 ?>