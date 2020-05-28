<?php
// Realiza a autentificação
require_once './script/authorize.php';
?>

<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>HG_Master</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="/HG_Master/assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="/HG_Master/assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="/HG_Master/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="/HG_Master/assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->

        <link href="/HG_Master/assets/css/pe-icon-7-stroke.css" rel="stylesheet" /> 
        <link href="/HG_Master/assets/css/all.min.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

                <!--
            
                    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                    Tip 2: you can also add an image using data-image tag
            
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                            HG Study
                        </a>
                    </div>

                    <ul class="nav">
                        <li <?php echo isset($studant) ? $studant : ''; ?>>
                            <a href="/HG_Master/index.php">
                                <i class="pe-7s-user"></i>
                                <p>Usuários</p>
                            </a>
                        </li>
                        <li <?php echo isset($article) ? $article : ''; ?>>
                            <a href="/HG_Master/user.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Publicação </p>
                            </a>
                        </li>
                        <li <?php echo isset($senior) ? $senior : ''; ?>>
                            <a href="/HG_Master/table.php">
                                <i class="pe-7s-light"></i>
                                <p>Orientadores</p>
                            </a>
                        </li>
                        <li <?php echo isset($category) ? $category : ''; ?>>
                            <a href="/HG_Master/typography.php">
                                <i class="pe-7s-note2"></i>
                                <p>Categorias</p>
                            </a>
                        </li>
                        <li <?php echo isset($comment) ? $comment : ''; ?>>
                            <a href="/HG_Master/icons.php">
                                <i class="pe-7s-note"></i>
                                <p>Comentários</p>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="maps.php">
                                <i class="pe-7s-map-marker"></i>
                                <p>Maps</p>
                            </a>
                        </li>
                        <li>
                            <a href="notifications.php">
                                <i class="pe-7s-bell"></i>
                                <p>Notifications</p>
                            </a>
                        </li> -->
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"><?php echo $title; ?></a>
                        </div>
                        <div class="collapse navbar-collapse">


                            <ul class="nav navbar-nav navbar-right">

                                <li>
                                    <a href="/HG_Master/logout.php">
                                        <p>Sair</p>
                                    </a>
                                </li>
                                <li class="separator hidden-lg"></li>
                            </ul>
                        </div>
                    </div>
                </nav>