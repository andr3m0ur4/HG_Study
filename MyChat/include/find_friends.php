<!DOCTYPE html>
<?php
session_start();
include("find_friends_function.php");

if (!isset($_SESSION['user_id']) || !isset($_SESSION['vip'])) {
    header("Location: price.php");
} else {
    ?>
    <html>
        <head>
            <title>Busca Por Amigos</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=devide-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="../css/find_people.css">
        </head>
        <body>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark" href="#">
                <a href="#" class="navbar-brand">
                    <?php
                    $user = $_SESSION['email'];
                    $usuario = $_SESSION['usuario'];
                    $get_user = "SELECT * FROM $usuario WHERE email = '$user'";
                    $run_user = mysqli_query($con, $get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_name = $row['nome'] . ' ' . $row['sobrenome'];
                    echo "<a class='navbar-brand' href='../home.php?user_name=$user_name'>MyChat</a>";
                    ?>			
                </a>
                <ul class="navbar-nav">
                    <li><a style="color: white; text-decoration: none; font-size: 20px;"></a></li>
                </ul>
            </nav><br>
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">
                    <form class="search_form" action="">
                        <input type="text" name="search_query" placeholder="Procurar Amigos" autocomplete="off" required>
                        <button class="btn" type="submit" name="search_btn">Procurar</button>
                    </form>
                </div>
                <div class="col-sm-4">

                </div>
            </div><br><br>
            <?php search_user(); ?>
        </body>
    </html>
<?php } ?>