<?php

include("connection.php");

function search_user() {
    global $con;

    if (isset($_GET['search_btn'])) {
        $search_query = htmlentities($_GET['search_query']);
        $get_user = "SELECT id_estudante AS user_id, CONCAT(nome, ' ', sobrenome) AS user_name, foto AS user_profile, "
                . "cidade AS user_city, email AS user_email FROM estudante "
                . "WHERE CONCAT(nome, ' ', sobrenome) LIKE '%$search_query%' OR cidade LIKE '%$search_query%' "
                . "UNION "
                . "SELECT id_orientador, CONCAT(nome, ' ', sobrenome) AS user_name, foto AS user_profile, "
                . "cidade AS user_city, email AS user_email FROM orientador "
                . "WHERE CONCAT(nome, ' ', sobrenome) LIKE '%$search_query%' OR cidade LIKE '%$search_query%'";
    } else {
        $get_user = "SELECT id_estudante AS user_id, CONCAT(nome, ' ', sobrenome) AS user_name, foto AS user_profile, "
        . "cidade AS user_city, email AS user_email FROM estudante "
        . "UNION "
        . "SELECT id_orientador, CONCAT(nome, ' ', sobrenome) AS user_name, foto AS user_profile, "
        . "cidade AS user_city, email AS user_email FROM orientador LIMIT 10";
    }

    $run_user = mysqli_query($con, $get_user);

    while ($row_user = mysqli_fetch_array($run_user)) {
        $user_name = $row_user['user_name'];
        $city = $row_user['user_city'];
        //$gender = $row_user['user_gender'];
        $email = $row_user['user_email'];
        $user_profile = empty($row_user['user_profile']) ? 'post2.png' : $row_user['user_profile'];

        // Agora exibindo tudo de uma vez

        echo "
                <div class='card'>
                        <img src='../../img/perfil/$user_profile'>
                        <h1>$user_name</h1>
                        <p class='title'>$city</p>
                        <p>$email</p>
                        <form method='POST'>
                                <p><button name='add'>Conversar com $user_name</button></p>
                                <input type='hidden' name='username' value='$user_name'>
                        </form>
                </div><br><br>
        ";

        if (isset($_POST['add'])) {
            $user_name = $_POST['username'];
            echo "<script>window.open('../home.php?user_name=$user_name', '_self')</script>";
        }
    }
}

?>