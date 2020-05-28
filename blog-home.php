<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Publicações";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Insere o banner da página
$title = "Publicações";
$title2 = "Postagens de Publicações";
$link = "blog-home";
require_once './script/banner2.php';

// Calcula as informações de paginação.
$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
$results_per_page = 5;  // número de resultados por página
$skip = (($cur_page - 1) * $results_per_page);

//Conectar-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar ao banco de dados.');
mysqli_set_charset($dbc, 'utf8');

$categoria = '';
$search = '';
if (isset($_GET['submit'])) {
    if (isset($_GET['search2']) && !empty($_GET['search2'])) {
        $search = isset($_GET['search2']) ? $_GET['search2'] : '';

// Consultar para obter os resultados
        $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
                . "o.nome, o.sobrenome "
                . "FROM artigo AS a "
                . "INNER JOIN orientador AS o "
                . "USING (id_orientador) ";

        $query = filtrar_busca($search, $query);

        $query .= " AND approved = '1' ORDER BY a.date DESC";
    } else if (isset($_GET['category']) && !empty($_GET['category'])) {
        $categoria = $_GET['category'];
        $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
                . "o.nome, o.sobrenome "
                . "FROM artigo AS a "
                . "INNER JOIN orientador AS o "
                . "USING (id_orientador) "
                . "LEFT OUTER JOIN categoria_artigo AS ca "
                . "USING(id_artigo) "
                . "WHERE ca.id_categoria = $categoria AND ca.resposta = 1 AND approved = 1 "
                . "ORDER BY a.date DESC";
    } else if (isset($_GET['my_articles'])) {
        $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
                . "o.nome, o.sobrenome "
                . "FROM artigo AS a "
                . "INNER JOIN orientador AS o "
                . "USING (id_orientador) "
                . "WHERE approved = 1 AND a.id_orientador = " . $_SESSION['user_id']
                . " ORDER BY a.date DESC";
    } else if (isset($_GET['year']) && isset($_GET['month'])) {
        $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
                . "o.nome, o.sobrenome "
                . "FROM artigo AS a "
                . "INNER JOIN orientador AS o "
                . "USING (id_orientador) "
                . "WHERE year(a.date) = " . $_GET['year'] . " AND month(a.date) = " . $_GET['month'] . " AND approved = 1 "
                . "ORDER BY a.date DESC";
    } else {
        $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
                . "o.nome, o.sobrenome "
                . "FROM artigo AS a "
                . "INNER JOIN orientador AS o "
                . "USING (id_orientador) "
                . "WHERE approved = 1 "
                . "ORDER BY a.date DESC";
    }
} else {
    $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
            . "o.nome, o.sobrenome "
            . "FROM artigo AS a "
            . "INNER JOIN orientador AS o "
            . "USING (id_orientador) "
            . "WHERE approved = 1 "
            . "ORDER BY a.date DESC";
}
if (isset($_GET['follow'])) {
    // Garantir que o usuário está logado.
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Por favor, faça login para acessar esta página.');"
        . "window.location=\"login.php\";</script>";
    } else {
        $query = articles_following();
    }
}
// Consulta para obter o total de resultados
$result = mysqli_query($dbc, $query)
        or die('Erro ao se conectar com o banco de dados.');

$total = mysqli_num_rows($result);
$num_pages = ceil($total / $results_per_page);

// Consulta novamente, para obter somente o subconjunto dos resultados
$query .= " LIMIT $skip, $results_per_page";
$result = mysqli_query($dbc, $query)
        or die('Erro ao se conectar com o banco de dados.');
?>       

<!-- Start blog-posts Area -->
<section class="blog-posts-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
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
                        <ul class="tags">
                            <li><a href="#"><?php echo!empty($category[0]['descricao']) ? $category[0]['descricao'] : ''; ?></a></li>
                            <li><a href="#"><?php echo!empty($category[1]['descricao']) ? ', ' . $category[1]['descricao'] : ''; ?></a></li>
                            <li><a href="#"><?php echo!empty($category[2]['descricao']) ? ', ' . $category[2]['descricao'] : ''; ?></a></li>
                        </ul>
                        <a href="blog-single.php?article_id=<?php echo $row['id_artigo']; ?>">
                            <h1>
                                <?php
                                echo $row['title'];
                                ?>
                            </h1>
                        </a>
                        <p>
                            <?php
                            echo nl2br(substr($row['content1'], 0, 300)) . '...';
                            ?>
                        </p>
                        <div class="bottom-meta">
                            <div class="user-details row align-items-center">
                                <div class="comment-wrap col-lg-6">
                                    <?php
                                    $query4 = "SELECT * FROM comentario WHERE id_artigo = " . $row['id_artigo'];
                                    $result4 = mysqli_query($dbc, $query4)
                                            or die('Não foi possível localizar os comentário no banco de dados.');
                                    $total_comment = mysqli_num_rows($result4);
                                    ?>
                                    <ul>
                                        <li><span class="lnr lnr-calendar-full"></span> <?php echo date('d/m/Y', strtotime($row['date'])); ?></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span> <?php echo $total_comment; ?> Comentários</a></li>
                                    </ul>
                                </div>
                                <div class="container col-lg-6">
                                    <p class="text-right"><?php echo $row['nome'] . ' ' . $row['sobrenome']; ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-lg-4 sidebar">
                <?php
                if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "orientador") {
                    // Permitir que orientador possa inserir um novo artigo
                    echo '<div class="text-center mb-25 h2">';
                    echo '<a href="blog-add.php" class="genric-btn primary circle">Inserir uma nova Publicação</a>';
                    echo '</div>';

                    // Permitir que orientador possa visualizar seus artigos
                    echo '<div class="text-center mb-25 h2">';
                    echo '<a href="blog-home.php?my_articles=&submit=" class="genric-btn primary circle e-large">Minhas Publicações</a>';
                    echo '</div>';
                }
                ?>
                <div class="single-widget search-widget">
                    <form method="GET" class="example" action="blog-home.php" style="margin:auto;max-width:300px">
                        <input type="text" placeholder="Pesquisar" name="search2">
                        <button type="submit" name="<?php echo isset($_GET['follow']) ? 'follow' : 'submit'; ?>"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="button-group-area mt-10">
                        <?php
                        if (!isset($_GET['follow'])) {
                            echo '<a href="blog-home.php?follow=" class="genric-btn primary-border circle" style="width:100%;height:10%">PUBLICAÇÕES DOS MEUS ORIENTADORES</a>';
                        } else {
                            echo '<a href="blog-home.php" class="genric-btn info-border circle" style="width:100%;height:10%">VER TODOS AS PUBLICAÇÕES</a>';
                        }
                        ?>
                    </div>
                </div>

                <?php
                $query4 = "SELECT * FROM categoria";
                $result4 = mysqli_query($dbc, $query4)
                        or die('Não foi possível acessar a tabela de categorias');
                ?>
                <div class="single-widget category-widget">
                    <h4 class="title">Postagem por Categoria</h4>
                    <ul>
                        <?php
                        while ($row4 = mysqli_fetch_array($result4)) {
                            $query3 = "SELECT * FROM categoria_artigo WHERE id_categoria = "
                                    . $row4['id_categoria'] . " AND resposta = 1";
                            $result3 = mysqli_query($dbc, $query3)
                                    or die('Não foi possível buscar total de categorias.');
                            $total_category = mysqli_num_rows($result3);
                            echo '<li><a class = "justify-content-between d-flex" href = "blog-home.php?category=' . $row4['id_categoria'] . '&search2=&' . (isset($_GET['follow']) ? 'follow' : 'submit') . '="><p>' . $row4['descricao'] . '</p><span>' . $total_category . '</span></a></li>';
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
    <center>
        <?php
        // Gera links de navegação, se tivermos mais de uma página
        if ($num_pages > 1) {
            echo generate_page_links($search, $categoria, $cur_page, $num_pages);
        }
        ?>
    </center>
</div>
</section>
<!-- End blog-posts Area -->

<?php
// Insere o rodapé da página
require_once './script/footer2.php';

// Esta função cria links de navegação, com base na página atual e no número de páginas
function generate_page_links($search, $categoria, $cur_page, $num_pages) {
    $page_links = '';

// Se esta página não for a primeira, gera o link "previous"
    if ($cur_page > 1) {
        $page_links .= '<a href="' . $_SERVER['PHP_SELF']
                . '?page=' . ($cur_page - 1) . '&search2=' . $search . '&category=' . $categoria
                . (isset($_GET['my_articles']) ? '&my_articles=' : '') . '&'
                . (isset($_GET['year']) ? 'year=' . $_GET['year'] : '') . '&'
                . (isset($_GET['month']) ? 'month=' . $_GET['month'] : '') . '&'
                . (isset($_GET['follow']) ? 'follow' : 'submit') . '=" '
                . 'class="genric-btn primary circle arrow small">'
                . '<span class="lnr lnr-arrow-left mr-2"></span>Anterior</a> ';
    } else {
        $page_links .= '<span class="lnr lnr-arrow-left"></span> ';
    }

// Faz um loop através das páginas, gerando os links com os números das páginas
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($cur_page == $i) {
            $page_links .= ' | ' . $i;
        } else {
            $page_links .= ' | <a href = "' . $_SERVER['PHP_SELF']
                    . '?page=' . $i . '&search2=' . $search . '&category=' . $categoria
                    . (isset($_GET['my_articles']) ? '&my_articles=' : '') . '&'
                    . (isset($_GET['year']) ? 'year=' . $_GET['year'] : '') . '&'
                    . (isset($_GET['month']) ? 'month=' . $_GET['month'] : '') . '&'
                    . (isset($_GET['follow']) ? 'follow' : 'submit') . '=">' . $i . '</a>';
        }
    }

// Se esta página não for a última, gera o link "next"
    if ($cur_page < $num_pages) {
        $page_links .= ' <a href = "' . $_SERVER['PHP_SELF']
                . '?page=' . ($cur_page + 1) . '&search2=' . $search . '&category=' . $categoria
                . (isset($_GET['my_articles']) ? '&my_articles=' : '') . '&'
                . (isset($_GET['year']) ? 'year=' . $_GET['year'] : '') . '&'
                . (isset($_GET['month']) ? 'month=' . $_GET['month'] : '') . '&'
                . (isset($_GET['follow']) ? 'follow' : 'submit') . '=" '
                . 'class="genric-btn primary circle arrow small">Próxima '
                . '<span class="lnr lnr-arrow-right"></span></a>';
    } else {
        $page_links .= ' <span class="lnr lnr-arrow-right"></span>';
    }
    return $page_links;
}

function articles_following() {
    $id_perfil_seguidor = $_SESSION['usuario'] == 'estudante' ? 'id_perfil_estudante' : 'id_perfil_orientador';

    if (isset($_GET['search2']) && !empty($_GET['search2'])) {
        $search = isset($_GET['search2']) ? $_GET['search2'] : '';

// Consultar para obter os resultados
        $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
                . "o.nome, o.sobrenome "
                . "FROM artigo AS a "
                . "INNER JOIN orientador AS o "
                . "USING (id_orientador) "
                . "LEFT OUTER JOIN perfil_seguidor AS ps "
                . "ON o.id_orientador = ps.id_orientador "
                . "LEFT OUTER JOIN estudante AS es "
                . "ON ps.id_perfil_estudante = es.id_estudante ";

        $query = filtrar_busca($search, $query);

        $query .= " AND ps.$id_perfil_seguidor = " . $_SESSION['user_id'] . " AND ps.resposta = 1 AND a.approved = 1 "
                . "AND approved = '1' ORDER BY a.date DESC";
    } else if (isset($_GET['category']) && !empty($_GET['category'])) {
        $categoria = $_GET['category'];
        $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
                . "o.nome, o.sobrenome "
                . "FROM artigo AS a "
                . "INNER JOIN orientador AS o "
                . "USING (id_orientador) "
                . "LEFT OUTER JOIN categoria_artigo AS ca "
                . "USING(id_artigo) "
                . "LEFT OUTER JOIN perfil_seguidor AS ps "
                . "ON o.id_orientador = ps.id_orientador "
                . "LEFT OUTER JOIN estudante AS es "
                . "ON ps.id_perfil_estudante = es.id_estudante "
                . "WHERE ps.$id_perfil_seguidor = " . $_SESSION['user_id'] . " AND ps.resposta = 1 AND "
                . "ca.id_categoria = $categoria AND ca.resposta = 1 AND approved = 1 "
                . "ORDER BY a.date DESC";
    } else {
        $query = "SELECT a.id_artigo, a.screenshot, a.date, a.title, a.content1, a.citacao, a.content2, "
                . "o.nome, o.sobrenome "
                . "FROM artigo AS a "
                . "INNER JOIN orientador AS o "
                . "USING (id_orientador) "
                . "LEFT OUTER JOIN perfil_seguidor AS ps "
                . "ON o.id_orientador = ps.id_orientador "
                . "LEFT OUTER JOIN estudante AS es "
                . "ON ps.id_perfil_estudante = es.id_estudante "
                . "WHERE ps.$id_perfil_seguidor = " . $_SESSION['user_id'] . " AND ps.resposta = 1 AND a.approved = 1 "
                . "ORDER BY a.date DESC";
    }
    return $query;
}

function filtrar_busca($search, $query) {
// Extrai as palavras-chaves de busca e as coloca em um array
    $clean_search = str_replace(',', ' ', $search);
    $search_words = explode(' ', $clean_search);
    $final_search_words = array();
    if (count($search_words) > 0) {
        foreach ($search_words as $word) {
            if (!empty($word)) {
                $final_search_words[] = $word;
            }
        }
    }

// Gera uma cl�usula WHERE usando todas as palavras-chaves de busca
    $where_list = array();
    if (count($final_search_words) > 0) {
        foreach ($final_search_words as $word) {
            $where_list[] = "a.title LIKE '%$word%' OR a.content1 LIKE '%$word%' OR o.nome LIKE '%$word%' OR o.sobrenome LIKE '%$word%'";
        }
    }
    $where_clause = implode(' OR ', $where_list);

// Adiciona a cl�usula WHERE a consulta de busca.
    if (!empty($where_clause)) {
        $query .= "WHERE ($where_clause)";
    }
    return $query;
}
