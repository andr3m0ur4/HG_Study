<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");

if (!isset($_SESSION['user_id']) || !isset($_SESSION['vip'])) {
    header("Location: signin.php");
} else {
    ?>
    <html>
        <head>
            <title>My Chat - Home</title>
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="css/home.css">
        </head>
        <body>
            <div class="container main-section">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-5 left-sidebar">
                        <div class="input-group searchbox">
                            <div class="input-group-btn">
                                <center><a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Adicionar novo usuário</button></a></center>
                            </div>
                        </div>
                        <div class="left-chat">
                            <ul>
                                <?php include("include/get_users_data.php"); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-7 right-sidebar">
                        <div class="row">
                            <!-- Obtendo a informaçãodo usuário que está logado -->
                            <?php
                            $user = $_SESSION['email'];
                            $usuario = $_SESSION['usuario'];
                            $get_user = "SELECT * FROM $usuario WHERE email = '$user'";
                            $run_user = mysqli_query($con, $get_user);
                            $row = mysqli_fetch_array($run_user);

                            $user_id = $row["id_$usuario"];
                            $user_name = $row['nome'] . ' ' . $row['sobrenome'];
                            $user_profile_image = empty($row['foto']) ? 'post2.png' : $row['foto'];
                            ?>

                            <!-- Obtendo os dados do usuário em qual o usuário clica -->
                            <?php
                            if (isset($_GET['user_name'])) {
                                global $con;

                                $get_username = $_GET['user_name'];
                                $get_user = "SELECT * FROM estudante WHERE CONCAT(nome, ' ', sobrenome) = '$get_username'";
                                $run_user = mysqli_query($con, $get_user);
                                if (mysqli_num_rows($run_user) == 0) {
                                    $get_user = "SELECT * FROM orientador WHERE CONCAT(nome, ' ', sobrenome) = '$get_username'";
                                    $run_user = mysqli_query($con, $get_user);
                                }
                                $row_user = mysqli_fetch_array($run_user);

                                $username = $row_user['nome'] . ' ' . $row_user['sobrenome'];
                                $profile_image = empty($row_user['foto']) ? 'post2.png' : $row_user['foto'];
                                $email = $row_user['email'];
                            }

                            $username = isset($username) ? $username : $user_name;
                            $profile_image = isset($profile_image) ? $profile_image : $user_profile_image;
                            submit_msg($con, $user_name, $username);

                            $total_messages = "SELECT * FROM users_chat WHERE (sender_username = '$user_name' AND receiver_username = '$username') OR (receiver_username = '$user_name'AND sender_username = '$username')";
                            $run_messages = mysqli_query($con, $total_messages);
                            $total = mysqli_num_rows($run_messages);
                            ?>

                            <div class="col-md-8 right-header">
                                <div class="right-header-img">
                                    <img src="../img/perfil/<?php echo "$profile_image"; ?>">
                                </div>
                                <div class="right-header-detail">
                                    <p><?php echo "$username"; ?></p>
                                    <span><?php echo $total; ?> mensagens</span>&nbsp; &nbsp;
                                </div>
                            </div>
                            <div class="col-md-4 right-header">
                                <div class="right-header-img">
                                    <img src="../img/perfil/<?php echo "$user_profile_image"; ?>">
                                </div>
                                <div class="right-header-detail">
                                    <form method="POST">
                                        <p><?php echo "$user_name"; ?></p>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i> Online</span>&nbsp; &nbsp; 
                                        <button name="logout" class="btn btn-danger" style="margin-left: 60px;">Sair do Chat</button>
                                    </form>
                                    <?php
                                    if (isset($_POST['logout'])) {
                                        $update_msg = mysqli_query($con, "UPDATE $usuario SET log_in = 'Offline' WHERE CONCAT(nome, ' ', sobrenome) = '$user_name'");
                                        //header("Location:logout.php");
                                        echo "<script>window.open('../index.php', '_self')</script>";
                                        exit();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="ChatMessages" id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                                <?php
                                $update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status = 'read' WHERE sender_username = '$username' AND receiver_username = '$user_name'");

                                $sel_msg = "SELECT * FROM users_chat WHERE (sender_username = '$user_name' AND receiver_username = '$username') OR (receiver_username = '$user_name' AND sender_username = '$username') ORDER BY 1 ASC";
                                $run_msg = mysqli_query($con, $sel_msg);

                                while ($row = mysqli_fetch_array($run_msg)) {
                                    $sender_username = $row['sender_username'];
                                    $receiver_username = $row['receiver_username'];
                                    $msg_content = $row['msg_content'];
                                    $msg_date = $row['msg_date'];
                                    ?>
                                    <ul>
                                        <?php
                                        if ($user_name == $sender_username AND $username == $receiver_username) {
                                            echo "
                                                    <li>
                                                        <div class='rightside-right-chat'>
                                                            <span> $user_name <small>$msg_date</small></span><br><br>
                                                            <p>$msg_content</p>
                                                        </div>
                                                    </li>
                                            ";
                                        } else if ($user_name == $receiver_username AND $username == $sender_username) {
                                            echo "
                                                    <li>
                                                        <div class='rightside-left-chat'>
                                                            <span> $username <small>$msg_date</small></span><br><br>
                                                            <p>$msg_content</p>
                                                        </div>
                                                    </li>
                                            ";
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 right-chat-textbox">
                                <form method="POST">
                                    <input type="text" name="msg_content" autocomplete="off" placeholder="Digite sua mensagem.......">
                                    <button name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            ?>

            <script>
                $('#ChatMessages').animate({
                    scrollTop: $('#ChatMessages').get(0).scrollHeight
                }, 1000);
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    var height = $(window).height();
                    $('.left-chat').css('height', (height - 92) + 'px');
                    $('.right-header-contentChat').css('height', (height - 163) + 'px');
                })
            </script>

            <script type="text/javascript">
		$(document).ready(function(){
			
			setInterval(function(){
				// Atualiza após 1500ms
				$("#ChatMessages").load("include/display_messages.php?user_email='<?php echo $email; ?>'");
			},1500);

			$("#ChatMessages").load("include/display_messages.php?user_email='<?php echo $email; ?>'");
		});
			
            </script>

        </body>
    </html>
    <?php
}

function submit_msg($con, $user_name, $username) {
    if (isset($_POST['submit'])) {
        $msg = htmlspecialchars($_POST['msg_content']);

        if ($msg == "") {
            echo "
                    <div class='alert alert-danger'>
                            <strong><center>A mensagem foi incapaz de ser enviada</center></strong>
                    </div>
            ";
        } else if (strlen($msg) > 254) {
            echo "
                    <div class='alert alert-danger'>
                            <strong><center>A mensagem é muito longa. Utilize somente 100 caracteres</center></strong>
                    </div>
            ";
        } else {
            $insert = "INSERT INTO users_chat (sender_username, receiver_username, msg_content, msg_status, msg_date) VALUES ('$user_name', '$username', '$msg', 'unread', NOW())";
            $run_insert = mysqli_query($con, $insert);
        }
    }
}
?>