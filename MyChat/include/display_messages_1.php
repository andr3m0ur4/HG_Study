<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "hg_study")
        or die("Conexão não foi estabelecida");
mysqli_set_charset($con, 'utf8');

$user = $_SESSION['email'];
$usuario = $_SESSION['usuario'];
$get_user = "SELECT * FROM $usuario WHERE email = '$user'";
$run_user = mysqli_query($con, $get_user);
$row = mysqli_fetch_array($run_user);

$user_id = $row["id_$usuario"];
$user_name = $row['nome'] . ' ' . $row['sobrenome'];
$user_profile_image = $row['foto'];

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
    $user_profile_image = $row_user['foto'];
}


$update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status = 'read' WHERE sender_username = '$username' AND receiver_username = '$user_name'");

$sel_msg = "SELECT * FROM users_chat WHERE (sender_username = '$user_name' AND receiver_username = '$username') OR (receiver_username = '$user_name' AND sender_username = '$username') ORDER BY 1 ASC";
$run_msg = mysqli_query($con, $sel_msg);

$total_message = mysqli_num_rows($run_msg);
isset($_SESSION['total_message']) ? '' : $_SESSION['total_message'] = $total_message;

if ($total_message > $_SESSION['total_message']) {
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

    <?php
}
$_SESSION['total_message'] = $total_message;

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
    
