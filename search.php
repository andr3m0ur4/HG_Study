<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Busca";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Calcula as informações de paginação.
$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
$results_per_page = 10;  // número de resultados por página
$skip = (($cur_page - 1) * $results_per_page);

// Conecta-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar com o banco de dados.');
mysqli_set_charset($dbc, 'utf8');

if (isset($_GET['submit'])) {

    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $categoria = $_GET['category'];

    // Chama função responsável para seguir determinado usuário
    if (isset($_GET['user_id']) && isset($_SESSION['id_usuario'])) {
        seguirUsuario($dbc, $_SESSION['id_usuario'], $_GET['user_id'], $search, $categoria, $cur_page);
    } else if (isset($_GET['user_id'])) {
        echo "<script>alert('Por favor, faça login para seguir este orientador.');"
        . "window.location=\"login.php\";</script>";
    }

    // Consultar para obter os resultados
    $search_query = "SELECT * FROM orientador LEFT OUTER JOIN categoria_orientador USING(id_orientador) ";

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

    // Gera uma cláusula WHERE usando todas as palavras-chaves de busca
    $where_list = array();
    if (count($final_search_words) > 0) {
        foreach ($final_search_words as $word) {
            $where_list[] = "trabalho_atual LIKE '%$word%'";
        }
    }
    $where_clause = implode(' OR ', $where_list);

    // Adiciona a cláusula WHERE a consulta de busca.
    if (!empty($where_clause)) {
        $search_query .= "WHERE ($where_clause";
    }
    if ($categoria != 0) {
        if (!empty($where_clause)) {
            $search_query .= " OR id_categoria = $categoria AND resposta = 1) AND active = 1";
        } else {
            $search_query .= " WHERE (id_categoria = $categoria AND resposta = 1) AND active = 1";
        }
    } else {
        if (!empty($where_clause)) {
            $search_query .= ") AND active = 1";
        } else {
            $search_query .= " WHERE active = 1";
        }
    }
    $search_query .= " GROUP BY id_orientador";

    // Consulta para obter o total de resultados
    $result = mysqli_query($dbc, $search_query)
            or die('Ocorreu um erro ao buscar dados no banco de dados');
    $total = mysqli_num_rows($result);
    $num_pages = ceil($total / $results_per_page);

    // Insere o banner da página
    $results = '"<p class="text-white">' . $total . ' Resultado(s) encontrado(s)</span></p>"';
    $titulo = "Resultados da Busca";
    require_once './script/banner.php';

    // Consulta novamente, para obter somente o subconjunto dos resultados
    $search_query .= " LIMIT $skip, $results_per_page";
    $result = mysqli_query($dbc, $search_query)
            or die('Erro ao se conectar com o banco de dados.');
    ?>


    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="single-post d-flex flex-row">
                            <?php
                            $query2 = "SELECT cat.descricao FROM categoria_orientador AS cat_ori "
                                    . "INNER JOIN categoria AS cat "
                                    . "USING (id_categoria) "
                                    . "WHERE cat_ori.id_orientador = '" . $row['id_orientador'] . "' "
                                    . "AND cat_ori.resposta = '1' "
                                    . "LIMIT 3";
                            $result2 = mysqli_query($dbc, $query2)
                                    or die('Ocorreu um erro ao acessar o banco de dados.');
                            $category = array();
                            while ($row2 = mysqli_fetch_array($result2)) {
                                array_push($category, $row2);
                            }
                            if (is_file(MM_UPLOADPATH . $row['foto']) && filesize(MM_UPLOADPATH . $row['foto']) > 0) {
                                ?>
                                <div class="thumb col-lg-4">
                                    <?php echo '<img src="' . MM_UPLOADPATH . $row['foto'] . '" alt="">'; ?>
                                    <ul class="tags">
                                        <?php
                                        echo!empty($category[0]['descricao']) ? '<li>' . $category[0]['descricao'] . '</li> ' : '';
                                        if (!empty($category[1]['descricao'])) {
                                            echo '<li>';
                                            echo '<a href="#">' . $category[1]['descricao'] . '</a>';
                                            echo '</li> ';
                                        }
                                        if (!empty($category[2]['descricao'])) {
                                            echo '<li>';
                                            echo '<a href="#">' . $category[2]['descricao'] . '</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="thumb col-lg-4">
                                    <?php echo '<img src="' . MM_UPLOADPATH . 'post.png" alt="">'; ?>
                                    <ul class="tags">
                                        <?php
                                        echo!empty($category[0]['descricao']) ? '<li>' . $category[0]['descricao'] . '</li> ' : '';
                                        if (!empty($category[1]['descricao'])) {
                                            echo '<li>';
                                            echo '<a href="#">' . $category[1]['descricao'] . '</a>';
                                            echo '</li> ';
                                        }
                                        if (!empty($category[2]['descricao'])) {
                                            echo '<li>';
                                            echo '<a href="#">' . $category[2]['descricao'] . '</a>';
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="details">
                                <div class="title d-flex flex-row justify-content-between">
                                    <div class="titles">
                                        <a href="single.php?user_id=<?php echo $row['id_orientador']; ?>">
                                            <?php echo "<h4>" . $row['nome'] . " " . $row['sobrenome'] . "</h4>"; ?></a>
                                        <?php echo '<h6>' . $row['profissao_ori'] . '</h6>'; ?>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['user_id'])) {
                                        $id_perfil_usuario = ($_SESSION['id_usuario'] == 'id_estudante') ? 'id_perfil_estudante' : 'id_perfil_orientador';
                                        $query4 = "SELECT resposta FROM perfil_seguidor "
                                                . "WHERE $id_perfil_usuario = " . $_SESSION['user_id']
                                                . " AND id_orientador = " . $row['id_orientador']
                                                . " AND resposta = 1";
                                        $result4 = mysqli_query($dbc, $query4)
                                                or die('Encontrou um erro buscando dados no banco.');
                                        if ($_SESSION['usuario'] == 'orientador' && $_SESSION['user_id'] == $row['id_orientador']) {
                                            echo '<ul class="btns" style="position: absolute; left: 84%;">';
                                            echo '<li><a href="editar.php">Editar</a></li>';
                                            echo '</ul>';
                                        } else {
                                            if (mysqli_num_rows($result4) == 0) {
                                                echo '<ul class = "btns" style="position: absolute; left: 84%;" id="' . $row['id_orientador'] . '">';
                                                echo '<li><a href="search.php?user_id=' . $row['id_orientador'] . '&search=' . $search
                                                . '&category=' . $categoria . '&page=' . $cur_page . '&submit=">Seguir</a></li>';
                                                echo '</ul>';
                                            } else {
                                                echo '<ul class = "btns" style="position: absolute; left: 75%;" id="' . $row['id_orientador'] . '">';
                                                echo '<li><a href="search.php?user_id=' . $row['id_orientador'] . '&search=' . $search
                                                . '&category=' . $categoria . '&page=' . $cur_page . '&submit=">Deixar de Seguir</a></li>';
                                                echo '</ul>';
                                            }
                                        }
                                    } else {
                                        echo '<ul class = "btns" style="position: absolute; left: 84%;" id="' . $row['id_orientador'] . '">';
                                        echo '<li><a href="search.php?user_id=' . $row['id_orientador'] . '&search=' . $search
                                        . '&category=' . $categoria . '&page=' . $cur_page . '&submit=">Seguir</a></li>';
                                        echo '</ul>';
                                    }
                                    ?>
                                </div>
                                <p>
                                    <?php echo $row['frase']; ?>
                                </p>
                                <?php echo'<h5>Trabalho Atual: ' . $row['trabalho_atual'] . '</h5>'; ?>
                                <p class="address"><span class="lnr lnr-map"></span> <?php echo $row['cidade']; ?>-SP</p>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="single-slidebar">
                        <img src="img/Mulheres-linkedIn.jpg" alt="" class="img-fluid"/>
                    </div>

                    <div class="single-slidebar">
                        <img src="img/Gif_animado_anunciosemanacultural.gif" alt="" class="img-fluid"/>
                    </div>							

                    <?php
                    $query3 = "SELECT * FROM categoria";
                    $result3 = mysqli_query($dbc, $query3)
                            or die('Não foi possível acessar a tabela de categorias');
                    ?>
                    <div class="single-slidebar">
                        <h4>Orientador por Categoria</h4>
                        <ul class="cat-list">
                            <?php
                            while ($row3 = mysqli_fetch_array($result3)) {
                                $query5 = "SELECT * FROM categoria_orientador WHERE id_categoria = "
                                        . $row3['id_categoria'] . " AND resposta = 1";
                                $result5 = mysqli_query($dbc, $query5)
                                        or die('Não foi possível buscar total de categorias.');
                                $total_category = mysqli_num_rows($result5);
                                echo '<li><a class="justify-content-between d-flex" href="search.php?category=' . $row3['id_categoria'] . '&submit="><p>' . $row3['descricao'] . '</p><span>' . $total_category . '</span></a></li>';
                            }
                            ?>
                        </ul>
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
    <!-- End post Area -->


    <?php
}
// Insere o rodapé da página
require_once './script/footer.php';

// Esta função cria links de navegação, com base na página atual e no número de páginas
function generate_page_links($search, $categoria, $cur_page, $num_pages) {
    $page_links = '';

    // Se esta página não for a primeira, gera o link "previous"
    if ($cur_page > 1) {
        $page_links .= '<a href="' . $_SERVER['PHP_SELF']
                . '?search=' . $search . '&category=' . $categoria
                . '$page=' . ($cur_page - 1) . '&submit=" '
                . 'class="genric-btn primary circle arrow small">'
                . '<span class="lnr lnr-arrow-left mr-2"></span>  Anterior</a> ';
    } else {
        $page_links .= '<span class="lnr lnr-arrow-left"></span> ';
    }

    // Faz um loop através das páginas, gerando os links com os números das páginas
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($cur_page == $i) {
            $page_links .= ' ' . $i;
        } else {
            $page_links .= ' | <a href = "' . $_SERVER['PHP_SELF']
                    . '?search=' . $search . '&category=' . $categoria
                    . '&page=' . $i . '&submit=">' . $i . '</a> | ';
        }
    }

    // Se esta página não for a última, gera o link "next"
    if ($cur_page < $num_pages) {
        $page_links .= ' <a href = "' . $_SERVER['PHP_SELF']
                . '?search=' . $search . '&category=' . $categoria
                . '&page=' . ($cur_page + 1) . '&submit=" '
                . 'class="genric-btn primary circle arrow small"> Próxima '
                . '<span class="lnr lnr-arrow-right"></span></a>';
    } else {
        $page_links .= ' <span class="lnr lnr-arrow-right"></span>';
    }

    return $page_links;
}

function seguirUsuario($dbc, $id_usuario, $id_orientador, $search, $categoria, $cur_page) {
    $id_perfil_usuario = ($id_usuario == 'id_estudante') ? 'id_perfil_estudante' : 'id_perfil_orientador';
    $query = "SELECT * FROM perfil_seguidor WHERE $id_perfil_usuario = " . $_SESSION['user_id']
            . " AND id_orientador = $id_orientador";
    $result = mysqli_query($dbc, $query)
            or die('Ocorreu um erro ao buscar dados no banco de dados.');
    // Insere dados no banco caso nao contenha nenhum dado para o especifico usuario
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO perfil_seguidor ($id_perfil_usuario, id_orientador) "
                . "VALUES (" . $_SESSION['user_id'] . ", $id_orientador)";
        mysqli_query($dbc, $query)
                or die('Nao foi possivel inserir os dados no banco.');
    } else {

        $query = "SELECT resposta FROM perfil_seguidor "
                . "WHERE $id_perfil_usuario = " . $_SESSION['user_id'] . " AND "
                . "id_orientador = $id_orientador AND resposta = 0";
        $result = mysqli_query($dbc, $query)
                or die('Ocorreu um erro acendo o banco de dados');
        if (mysqli_num_rows($result) == 1) {
            $query = "UPDATE perfil_seguidor SET resposta = 1 WHERE $id_perfil_usuario = " . $_SESSION['user_id']
                    . " AND id_orientador = $id_orientador";
            mysqli_query($dbc, $query)
                    or die('Nao foi possivel atualizar o banco de dados');
        } else {
            $query = "UPDATE perfil_seguidor SET resposta = 0 WHERE $id_perfil_usuario = " . $_SESSION['user_id']
                    . " AND id_orientador = $id_orientador";
            mysqli_query($dbc, $query)
                    or die('Nao foi possivel atualizar o banco de dados');
        }
    }
    $page_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .
            '/search.php?search=' . $search . '&category=' . $categoria . '&page=' . $cur_page
            . '&submit=#' . $id_orientador;
    header('Location: ' . $page_url);
}
