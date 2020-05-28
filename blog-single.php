<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Publicação Particular";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Insere o banner da página
$title = "Publicação";
$title2 = "Publicação";
$link1 = "blog-home";
$link2 = "blog-single";
$title3 = "Publicação Particular";
require_once './script/banner3.php';

// Garantir que o usuário está logado.
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Por favor, faça login para acessar esta página.');"
    . "window.location=\"login.php\";</script>";
}

//Conectar-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar ao banco de dados.');
mysqli_set_charset($dbc, 'utf8');

if (isset($_POST['submit'])) {
    $message = mysqli_real_escape_string($dbc, trim($_POST['message']));
    $article_id = $_POST['article_id'];

    if ($_SESSION['usuario'] == 'estudante') {
        $query4 = "INSERT INTO comentario (id_artigo, mensagem, id_estudante) "
                . "VALUES ('$article_id', '$message', '" . $_SESSION['user_id'] . "')";
    } else if ($_SESSION['usuario'] == 'orientador') {
        $query4 = "INSERT INTO comentario (id_artigo, mensagem, id_orientador) "
                . "VALUES ('$article_id', '$message', '" . $_SESSION['user_id'] . "')";
    }
    mysqli_query($dbc, $query4)
            or die('Não foi possível inserir os dados no banco de dados');


    // Confirme o sucesso com o usuário
    echo "<script>alert('O seu comentário foi realizado com sucesso!');"
    . "window.location=\"blog-single.php?article_id=" . $article_id . "\";</script>";
}

// Obtem os dados do artigo do banco de dados
if (isset($_GET['article_id'])) {
    $query = "SELECT * FROM artigo WHERE id_artigo = " . $_GET['article_id'] . " AND approved = 1";
} else {
    $query = "SELECT * FROM artigo WHERE id_orientador = " . $_SESSION['user_id'] . " AND approved = 1"
            . " GROUP BY id_artigo DESC limit 1";
}
$result = mysqli_query($dbc, $query)
        or die('Nao foi possivel acessar o banco de dados');

if (mysqli_num_rows($result) == 1) {
    //A linha do artigo foi encontrada, então mostrar os dados do artigo
    $row = mysqli_fetch_array($result);
    $article_id = $row['id_artigo'];
    ?>

    <!-- Start blog-posts Area -->
    <section class="blog-posts-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 post-list blog-post-list">
                    <div class="single-post">
                        <?php
                        if (is_file(MM_UPLOADPATH2 . $row['screenshot']) && filesize(MM_UPLOADPATH2 . $row['screenshot']) > 0) {
                            echo '<img class="img-fluid" src="' . MM_UPLOADPATH2 . $row['screenshot'] . '" alt="">';
                        } else {
                            echo '<img class="img-fluid" src="' . MM_UPLOADPATH2 . 'Article.png" alt="">';
                        }
                        // Obtém as categorias do artigo no banco de dados
                        $query3 = "SELECT cat.descricao FROM categoria_artigo AS cat_art "
                                . "INNER JOIN categoria AS cat "
                                . "USING (id_categoria) "
                                . "WHERE cat_art.id_artigo = '" . $row['id_artigo'] . "' "
                                . "AND cat_art.resposta = '1' "
                                . "LIMIT 3";
                        $result3 = mysqli_query($dbc, $query3)
                                or die('Ocorreu um erro ao acessar o banco de dados.');
                        $category = array();
                        while ($row3 = mysqli_fetch_array($result3)) {
                            array_push($category, $row3);
                        }
                        ?>
                        <div class="row container">
                            <ul class="tags">
                                <li><a href="#"><?php echo!empty($category[0]['descricao']) ? $category[0]['descricao'] : ''; ?></a></li>
                                <li><a href="#"><?php echo!empty($category[1]['descricao']) ? ', ' . $category[1]['descricao'] : ''; ?></a></li>
                                <li><a href="#"><?php echo!empty($category[2]['descricao']) ? ', ' . $category[2]['descricao'] : ''; ?></a></li>
                            </ul>
                            <?php
                            // Permitir que orientador possa editar as categorias do seu artigo
                            if ($_SESSION['usuario'] == "orientador" && $_SESSION['user_id'] == $row['id_orientador']) {
                                echo '<ul class="btns ml-30 mt-30">';
                                echo '<li><a href="tag-category2.php?article_id=' . $row['id_artigo'] . '">Editar</a></li>';
                                echo '</ul>';
                            }
                            ?>
                        </div>
                        <a href="#">
                            <h1>
                                <?php
                                echo $row['title'];
                                ?>
                            </h1>
                        </a>
                        <div class="content-wrap">
                            <p>
                                <?php
                                echo nl2br($row['content1']);
                                ?>
                            </p>

                            <?php
                            if (!empty($row['citacao'])) {
                                echo '<blockquote class="generic-blockquote">';
                                echo nl2br($row['citacao']);
                                echo '</blockquote>';
                            }
                            ?>

                            <?php
                            if (!empty($row['content2'])) {
                                echo '<p>';
                                echo nl2br($row['content2']);
                                echo '</p>';
                            }
                            ?>

                        </div>
                        <?php
                        $query4 = "SELECT * FROM comentario WHERE id_artigo = $article_id";
                        $result4 = mysqli_query($dbc, $query4)
                                or die('Não foi possível localizar os comentário no banco de dados.');
                        $total_comment = mysqli_num_rows($result4);
                        ?>
                        <div class="bottom-meta">
                            <div class="user-details row align-items-center">
                                <div class="comment-wrap col-lg-6 col-sm-6">
                                    <ul>
                                        <li><span class="lnr lnr-calendar-full"></span> <?php echo date('d/m/Y', strtotime($row['date'])); ?></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span> 0<?php echo $total_comment; ?> Comentários</a></li>
                                    </ul>
                                </div>
                                <div class="social-wrap col-lg-6">
                                    <?php
                                    $query2 = "SELECT id_orientador, nome, sobrenome, frase, foto, linkedln, "
                                            . "twitter, youtube, github FROM orientador "
                                            . "WHERE id_orientador = " . $row['id_orientador'] . "";
                                    $result2 = mysqli_query($dbc, $query2)
                                            or die('Erro ao buscar dados no banco de dados.');
                                    $row2 = mysqli_fetch_array($result2);
                                    echo '<p class="text-right">' . $row2['nome'] . ' ' . $row2['sobrenome'] . '</p>';
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Start nav Area -->
                        <section class="nav-area pt-50 pb-100">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-sm-6 nav-left justify-content-start d-flex">
                                        <div class="thumb">
                                            <img src="img/blog/prev.jpg" alt="">
                                        </div>
                                        <div class="post-details">
                                            <p>Prev Post</p>
                                            <h4 class="text-uppercase"><a href="#">A Discount Toner</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 nav-right justify-content-end d-flex">
                                        <div class="post-details">
                                            <p>Prev Post</p>
                                            <h4 class="text-uppercase"><a href="#">A Discount Toner</a></h4>
                                        </div>             
                                        <div class="thumb">
                                            <img src="img/blog/next.jpg" alt="">
                                        </div>                         
                                    </div>
                                </div>
                            </div>    
                        </section>
                        <!-- End nav Area -->


                        <!-- Start comment-sec Area -->
                        <section class="comment-sec-area pt-80 pb-80">
                            <div class="container">
                                <div class="row flex-column">
                                    <h5 class="text-uppercase pb-80">0<?php echo $total_comment; ?> Comentários</h5>
                                    <br>
                                    <?php
                                    $query4 = "SELECT com.id_comentario, com.data, com.mensagem, "
                                            . "est.nome AS nome_est, est.sobrenome AS sobrenome_est, "
                                            . "est.foto AS foto_est, ori.nome AS nome_ori, "
                                            . "ori.sobrenome AS sobrenome_ori, ori.foto AS foto_ori "
                                            . "FROM comentario AS com "
                                            . "LEFT OUTER JOIN estudante AS est "
                                            . "USING(id_estudante) "
                                            . "LEFT OUTER JOIN orientador AS ori "
                                            . "USING(id_orientador) "
                                            . "WHERE id_artigo = $article_id";
                                    $result4 = mysqli_query($dbc, $query4)
                                            or die('Não foi possível localizar os comentário no banco de dados.');
                                    while ($row4 = mysqli_fetch_array($result4)) {
                                        ?>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <?php
                                                        if ((is_file(MM_UPLOADPATH . $row4['foto_est']) || (is_file(MM_UPLOADPATH . $row4['foto_ori']))) &&
                                                                (filesize(MM_UPLOADPATH . $row4['foto_est']) > 0) && (filesize(MM_UPLOADPATH . $row4['foto_ori']) > 0)) {
                                                            echo '<img src="' . MM_UPLOADPATH . $row4['foto_est'] . $row4['foto_ori'] . '" alt="">';
                                                        } else {
                                                            echo '<img src="' . MM_UPLOADPATH . 'post.png" alt="">';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="desc">
                                                        <?php
                                                        echo '<h5><a href="#">' . $row4['nome_est'] . $row4['nome_ori'] . ' '
                                                        . $row4['sobrenome_est'] . $row4['sobrenome_ori'] . '</a></h5>';
                                                        ?>
                                                        <?php echo '<p class="date">' . date('d-m-Y H:i', strtotime($row4['data'])) . ' </p>'; ?>
                                                        <p class="comment">
                                                            <?php echo $row4['mensagem']; ?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>    
                        </section>
                        <!-- End comment-sec Area -->


                        <!--Start commentform Area -->
                        <section class = "commentform-area pt-80">
                            <div class = "container">
                                <h5 class = "pb-25">Deixe um Comentário</h5>
                                <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                                    <div class = "row flex-row d-flex">
                                        <div class = "col-lg-12 col-md-6">
                                            <input type="hidden" name="article_id" value="<?php echo isset($_GET['article_id']) ? $_GET['article_id'] : "$article_id"; ?>">
                                            <textarea class = "form-control mb-10" name = "message" placeholder = "Digite seu comentário" onFocus = "this.placeholder = ''" onBlur = "this.placeholder = 'Digite seu comentário'" required></textarea>
                                        </div>
                                        <div class = "col-lg-12 col-md-6 text-center mt-50">
                                            <input type = "submit" name = "submit" class = "primary-btn mt-20" value = "Comentar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                        <!--End commentform Area -->


                    </div>
                </div>
                <div class = "col-lg-4 sidebar">
                    <?php
                    // Permitir que orientador possa editar seu artigo
                    if ($_SESSION['usuario'] == "orientador" && $_SESSION['user_id'] == $row['id_orientador']) {
                        echo '<div class="text-center mb-25 h2">';
                        echo '<a href="blog-add.php?article_id=' . $row['id_artigo'] . '" class="genric-btn primary circle e-large">Editar Publicação</a>';
                        echo '</div>';
                        // Permitir que orientador possa excluir seu artigo
                        echo '<div class="text-center mb-25 h2">';
                        echo '<button class="genric-btn danger circle e-large" onclick="myFunction()">Excluir Publicação</button>';
                        echo '</div>';
                    }
                    ?>
                    <script>
                        function myFunction() {
                            if (confirm("Tem certeza que deseja excluir esta publicação?")) {
                                alert('A sua publicação foi excluída com sucesso!');
                                window.location.href = "script/blog-del.php?article_id=<?php echo $row['id_artigo']; ?>";
                            } else {
                            }
                        }
                    </script>
                    <div class="single-widget search-widget">
                        <form method="GET" class="example" action="blog-home.php" style="margin:auto;max-width:300px">
                            <input type="text" placeholder="Pesquisar" name="search2">
                            <button type="submit" name="submit"><i class="fa fa-search"></i></button>
                        </form>	
                        <div class="button-group-area mt-10" >
                            <a href="blog-home.php?follow=" class="genric-btn primary-border circle" style="width:100%;height:10%">PUBLICAÇÕES DOS MEUS ORIENTADORES</a>
                        </div>
                    </div>

                    <div class="single-widget protfolio-widget">
                        <?php
                        if (is_file(MM_UPLOADPATH . $row2['foto']) && filesize(MM_UPLOADPATH . $row2['foto']) > 0) {
                            echo '<img src="' . MM_UPLOADPATH . $row2['foto'] . '" alt="" style="width: 40%;">';
                        } else {
                            echo '<img src="' . MM_UPLOADPATH . 'post.png" alt="">';
                        }
                        ?>
                        <?php echo '<a href="single.php?user_id=' . $row2['id_orientador'] . '"><h4>' . $row2['nome'] . ' ' . $row2['sobrenome'] . '</h4></a>'; ?>
                        <p>
                            <?php echo $row2['frase']; ?>
                        </p>
                        <ul>
                            <?php
                            echo!empty($row2['linkedln']) ? '<li><a href="' . $row2['linkedln'] . '"><i class="fa fa-linkedin"></i></a></li>' : '';
                            echo!empty($row2['twitter']) ? '<li><a href="' . $row2['twitter'] . '"><i class="fa fa-twitter"></i></a></li>' : '';
                            echo!empty($row2['youtube']) ? '<li><a href="' . $row2['youtube'] . '"><i class="fa fa-youtube"></i></a></li>' : '';
                            echo!empty($row2['github']) ? '<li><a href="' . $row2['github'] . '"><i class="fa fa-github"></i></a></li>' : '';
                            ?>
                        </ul>								
                    </div>

                    <?php
                    $query3 = "SELECT * FROM categoria";
                    $result3 = mysqli_query($dbc, $query3)
                            or die('Não foi possível acessar a tabela de categorias');
                    ?>
                    <div class="single-widget category-widget">
                        <h4 class="title">Postagem por Categoria</h4>
                        <ul>
                            <?php
                            while ($row3 = mysqli_fetch_array($result3)) {
                                $query5 = "SELECT * FROM categoria_artigo WHERE id_categoria = "
                                        . $row3['id_categoria'] . " AND resposta = 1";
                                $result5 = mysqli_query($dbc, $query5)
                                        or die('Não foi possível buscar total de categorias.');
                                $total_category = mysqli_num_rows($result5);
                                echo '<li><a class = "justify-content-between d-flex" href = "blog-home.php?category=' . $row3['id_categoria'] . '&search2=&submit="><p>' . $row3['descricao'] . '</p><span>' . $total_category . '</span></a></li>';
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="single-widget recent-posts-widget">

                        <img src="img/Gif_animado_anunciosemanacultural.gif" alt="" class="img-fluid"/>
                    </div>				

                    <form action="blog-home.php" method="GET">
                        <div class="single-element-widget mt-30 container col-12 single-widget">
                            <h3 class="mb-30">Arquivo</h3>
                            <div class="row">
                                <div class="container col-6">

                                    <h5>Ano</h5>
                                    &nbsp;
                                    <div class="default-select" id="default-select">

                                        <select name="year">
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <h5>Mês</h5>
                                    &nbsp;

                                    <div class="default-select" id="default-select">
                                        <select name="month">
                                            <option value="1">Janeiro</option>
                                            <option value="2">Fevereiro</option>
                                            <option value="3">Março</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Maio</option>
                                            <option value="6">Junho</option>
                                            <option value="7">Julho</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Setembro</option>
                                            <option value="10">Outubro</option>
                                            <option value="11">Novembro</option>
                                            <option value="12">Dezembro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="genric-btn primary-border circle mt-20" style="width:100%;height:10%">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog-posts Area -->

    <?php
    $usuario = $_SESSION['usuario'];
    $user_id = $_SESSION['user_id'];
    $user_rating = $row2['id_orientador'];

    $select_rating = "SELECT * FROM classificacao_orientador WHERE id_$usuario = $user_id "
            . "AND id_ori_rating = $user_rating";
    $run_rating = mysqli_query($dbc, $select_rating)
            or die('Ocorreu um erro acessando o banco de dados da classificação');
    if (mysqli_num_rows($run_rating) == 0) {
        $insert_rating = "INSERT INTO classificacao_orientador (id_$usuario, id_ori_rating, "
                . "id_artigo, count) VALUES ($user_id, $user_rating, '$article_id - ', 1)";
        mysqli_query($dbc, $insert_rating)
                or die('Não foi possível inserir a informação no banco de dados');
    } else {
        $update_rating = "UPDATE classificacao_orientador SET id_artigo = CONCAT(id_artigo, '$article_id - '), "
                . "count = (count + 1) WHERE id_$usuario = $user_id AND id_ori_rating = $user_rating "
                . "AND id_artigo NOT LIKE '%$article_id%'";
        mysqli_query($dbc, $update_rating)
                or die('Não foi possível atualizar as informações');
    }

    mysqli_close($dbc);
}


// Insere o rodapé da página
require_once './script/footer2.php';
