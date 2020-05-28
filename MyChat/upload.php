<!DOCTYPE html>
<?php  
session_start();
include("include/connection.php");
include("include/header.php");

if (!isset($_SESSION['user_email'])) {
	header("Location: signin.php");
}else{
?>
<html>
<head>
	<title>Alterar Foto de Perfil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devide-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style>
		.card{
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			max-width: 400px;
			margin: auto;
			text-align: center;
			font-family: arial;
		}
		.card img{
			height: 200px;
		}

		.title{
			color: grey;
			font-size: 18px;
		}
		button{
			border: none;
			outline: 0;
			display: inline-block;
			padding: 9px;
			color: white;
			background-color: #000;
			text-align: center;
			cursor: pointer;
			width: 100%;
			font-size: 18px;
		}
		#update_profile{
			position: absolute;
			cursor: pointer;
			padding: 10px;
			border-radius: 4px;
			color: white;
			background-color: #000;
		}
		label{
			padding: 7px;
			display: table;
			color: #fff;
		}
		input[type="file"]{
			display: none;
		}
	</style>
</head>
<body>
	<?php  
		$user = $_SESSION['user_email'];
		$get_user = "SELECT * FROM users WHERE user_email = '$user'";
		$run_user = mysqli_query($con, $get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
		$user_profile = $row['user_profile'];

		echo "
			<div class='card'>
				<img src='$user_profile' id='preview'>
				<h1>$user_name</h1>				
				<form method='POST' enctype='multipart/form-data'>
					<label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i> Escolher Foto
					<input type='file' id='imgChooser' name='u_image' size='60'>
					</label>
					<button id='button_profile' name='update'>&nbsp&nbsp&nbsp<i class='fa fa-heart' aria-hidden='true'></i> Atualizar Perfil</button>
				</form>
			</div><br><br>
		";

		if (isset($_POST['update'])) {
			$u_image = $_FILES['u_image']['name'];
			$image_tmp = $_FILES['u_image']['tmp_name'];
			$random_number = rand(1,100);

			if ($u_image == '') {
				echo "<script>alert('Por favor Escolha o Perfil')</script>";
				echo "<script>window.open('upload.php', '_self')</script>";
				exit();
			}else{
				move_uploaded_file($image_tmp, "images/$u_image.$random_number");

				$update = "UPDATE users SET user_profile = 'images/$u_image.$random_number' WHERE user_email = '$user'";

				$run = mysqli_query($con, $update);

				if ($run) {
					echo "<script>alert('Seu Perfil foi Atualizado!')</script>";
					echo "<script>window.open('upload.php', '_self')</script>";
				}
			}
		}
	?>
	<script type="text/javascript">
		function readImage() {
		    if (this.files && this.files[0]) {
		        var file = new FileReader();
		        file.onload = function(e) {
		            document.getElementById("preview").src = e.target.result;
		        };       
		        file.readAsDataURL(this.files[0]);
		    }
		}

		document.getElementById("imgChooser").addEventListener("change", readImage, false);
	</script>
</body>
</html>
<?php } ?>