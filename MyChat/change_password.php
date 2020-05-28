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
		body{
			overflow-x: hidden;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-sm-2">
			
		</div>
		<div class="col-sm-8">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="table table-bordered table-hover">
					<tr align="center">
						<td colspan="6" class="active"><h2>Alterar Senha</h2></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Senha Atual</td>
						<td>
							<input type="password" name="current_pass" id="mypass" class="form-control" required placeholder="Senha Atual">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Nova Senha</td>
						<td>
							<input type="password" name="u_pass1" id="mypass" class="form-control" required placeholder="Nova Senha">
						</td>
					<tr>
						<td style="font-weight: bold;">Confirmar Senha</td>
						<td>
							<input type="password" name="u_pass2" id="mypass" class="form-control" required placeholder="Confirmar Senha">
						</td>
					</tr>
					<tr align="center">
						<td colspan="6">
							<input type="submit" name="change" value="Alterar" class="btn btn-info">
						</td>
					</tr>
				</table>
			</form>
			<?php  
				if (isset($_POST['change'])) {
					$c_pass = $_POST['current_pass'];
					$pass1 = $_POST['u_pass1'];
					$pass2 = $_POST['u_pass2'];

					$user = $_SESSION['user_email'];
					$get_user = "SELECT * FROM users WHERE user_email = '$user'";
					$run_user = mysqli_query($con, $get_user);
					$row = mysqli_fetch_array($run_user);

					$user_password = $row['user_pass'];

					if ($c_pass != $user_password) {
						echo"
							<div class='alert alert-danger'>
								<strong>Sua Antiga senha está incorreta</strong>
							</div>
						";
						exit();
					}
					if ($pass1 != $pass2) {
						echo"
							<div class='alert alert-danger'>
								<strong>Sua Nova senha é diferente da senha de confirmação</strong>
							</div>
						";
						exit();
					}
					if (strlen($pass1) < 9 AND strlen($pass2) < 9){
						echo"
							<div class='alert alert-danger'>
								<strong>Use 9 ou mais caracteres</strong>
							</div>
						";
						exit();
					}
					if ($pass1 == $pass2 AND $c_pass == $user_password) {
						$update_pass = mysqli_query($con, "UPDATE users SET user_pass = '$pass1' WHERE user_email = '$user'");
						echo"
							<div class='alert alert-success'>
								<strong>Sua Senha foi Alterada</strong>
							</div>
						";
					}
				}
			?>
		</div>
		<div class="col-sm-2">
			
		</div>
	</div>
</body>
</html>
<?php } ?>