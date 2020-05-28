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
	<title>Configurações da Conta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devide-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>	
</head>
<body>
	<div class="row">
		<div class="col-sm-2">
			
		</div>
		<?php  
			$user = $_SESSION['user_email'];
			$get_user = "SELECT * FROM users WHERE user_email = '$user'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);

			$user_name = $row['user_name'];
			$user_pass = $row['user_pass'];
			$user_email = $row['user_email'];
			$user_profile = $row['user_profile'];
			$user_city = $row['user_city'];
			$user_gender = $row['user_gender'];
		?>

		<div class="col-sm-8">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="table table-bordered table-hover">
					<tr align="center">
						<td colspan="6" class="active"><h2>Alterar Configurações da Conta</h2></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Alterar Seu Nome de Usuário</td>
						<td>
							<input type="text" name="u_name" class="form-control" required value="<?php echo $user_name; ?>">
						</td>
					</tr>

					<tr><td></td><td><a class="btn btn-default" style="text-decoration: none; font-size: 15px;" href="upload.php"><i class="fa fa-user" aria-hidden="true"></i> Alterar Foto de Perfil</a></td></tr>

					<tr>
						<td style="font-weight: bold;">Alterar Seu Email</td>
						<td>
							<input type="email" name="u_email" class="form-control" required value="<?php echo $user_email; ?>">
						</td>
					</tr>

					<tr>
						<td style="font-weight: bold;">Cidade</td>
						<td>
							<select class="form-control" name="u_city">
								<option><?php echo $user_city; ?></option>
								<option>Guaratinguetá</option>
								<option>Caçapava</option>
								<option>Cruzeiro</option>
								<option>Cachoeira Paulista</option>
								<option>Jacareí</option>
							</select>
						</td>
					</tr>

					<tr>
						<td style="font-weight: bold;">Gênero</td>
						<td>
							<select class="form-control" name="u_gender">
								<option><?php echo $user_gender; ?></option>
								<option>Masculino</option>
								<option>Feminino</option>
								<option>outros</option>								
							</select>
						</td>
					</tr>

					<tr>
						<td style="font-weight: bold;">Esqueceu a Senha</td>
						<td>
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Esqueceu a Senha</button>

							<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<form action="recovery.php?id=<?php echo $user_id; ?>" method="POST" id="f">
												<strong>Qual é o Nome do seu Melhor Amigo da Escola?</strong>
												<textarea class="form-control" cols="83" rows="4" name="content" placeholder="Alguém"></textarea><br>
												<input class="btn btn-default" type="submit" name="sub" value="Enviar" style="width: 100px;"><br><br>
												<pre>Responda a pergunta acima, nós iremos fazer esta pergunta a você se você esquecer sua <br>Senha.</pre><br><br>
											</form>
											<?php  
											if (isset($_POST['sub'])) {
												$bfn = htmlspecialchars($_POST['content']);

												if ($bfn == '') {
													echo "<script>alert('Por favor Digite Algo')</script>";
													echo "<script>window.open('account_settings.php', '_self')</script>";
													exit();
												}else{
													$update = "UPDATE users SET forgotten_answer = '$bfn' WHERE user_email = '$user'";

													$run = mysqli_query($con, $update);

													if ($run){
														echo "<script>alert('Funcionando...')</script>";
														echo "<script>window.open('account_settings.php', '_self')</script>";
													}else{
														echo "<script>alert('Erro enquanto Atualizando Informação.')</script>";
														echo "<script>window.open('account_settings.php', '_self')</script>";
													}
												}
											}
											?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
										</div>
									</div>
								</div>
							</div>
						<!-- </td> -->
					</tr>
					<tr><td></td><td><a class="btn btn-default" style="text-decoration: none; font-size: 15px;" href="change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Trocar Senha</a></td></tr>

					<tr align="center">
						<td colspan="6">
							<input type="submit" value="Atualizar" name="update" class="btn btn-info">
						</td>
					</tr>
				</table>
			</form>
			<?php  
				if (isset($_POST['update'])) {
					$user_name = htmlspecialchars($_POST['u_name']);
					$email = htmlspecialchars($_POST['u_email']);
					$u_gender = htmlspecialchars($_POST['u_gender']);
					$u_city = htmlspecialchars($_POST['u_city']);

					$update = "UPDATE users SET user_name = '$user_name', user_email = '$email', user_city = '$u_city', user_gender = '$u_gender' WHERE user_email = '$user'";
					$run = mysqli_query($con, $update);

					if ($run) {						
						echo "<script>window.open('account_settings.php', '_self')</script>";
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