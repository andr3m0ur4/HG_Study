<?php
require_once './script/authorize.php';
?>
<html>
    <head></head>
    <body>

        <?php
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .
                '/logout.php?user=&password=&ok=1';
        header('Location: ' . $home_url);
        if (isset($_GET['ok']) && $_GET['ok'] == 1) {
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/HG_Study/';
            header('Location: ' . $home_url);
        }
        ?>
    </body>
</html>