<!DOCTYPE html>
<html lang="pt-BR" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="codepixer">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->        
        <?php
        echo '<title>HG Study - ' . $page_title . '</title>';
        ?>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="css/linearicons.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/nice-select.css">					
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="../js/jquery.min.js" type="text/javascript"></script>

    </head>
    <body>

        <header id="header" id="home">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="index.php"><img src= "img/logo.png"  height="100" alt="" class="img-responsive"/></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="index.php">Home</a></li>
                            <li><a href="price.php">Chat</a></li>
                            <li><a href="category.php">Orientadores</a></li>
                            <li><a href="blog-home.php">Blog</a></li>
                            <li><a href="contact.php">Contato</a></li>
                            <li><a href="copyright.php">Direitos Autorais</a></li>
                            <?php
                            if (isset($_SESSION['email'])) {
                                if ($_SESSION['usuario'] == 'estudante') {
                                    ?>
                                    <li><a class="ticker-btn" href="infoconta.php">Informações da Conta</a></li>
                                    <li><a class="ticker-btn" href="script/logout.php">Logout (<?php echo $_SESSION['name']; ?>)</a></li>
                                    <?php
                                }
                                if ($_SESSION['usuario'] == 'orientador'){
                                    ?>
                                    <li><a class="ticker-btn" href="infoconta.php">Informações da Conta</a></li>
                                    <li><a class="ticker-btn" href="script/logout.php">Logout (<?php echo $_SESSION['name']; ?>)</a></li>
                                    <?php
                                }
                            } else {
                                ?>
                                <li><a class="ticker-btn" href="cadastro.php">Cadastre-se</a></li>
                                <li><a class="ticker-btn" href="login.php">Login</a></li>
                                    <?php
                                }
                                ?>
                        </ul>
                    </nav>
                    <!-- #nav-menu-container -->		    		
                </div>
            </div>
        </header>
        <!-- #header -->

