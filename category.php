<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Orientadores";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Insere o banner da página
$title = "Orientadores";
$title2 = "Orientadores";
$link = "category";
require_once './script/banner2.php';

// Garantir que o usuário está logado.
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Por favor, faça login para acessar esta página.');"
    . "window.location=\"login.php\";</script>";
}

// Calcula as informações de paginação.
$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
$results_per_page = 10;  // número de resultados por página
$skip = (($cur_page - 1) * $results_per_page);

// Conecta-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar com o banco de dados.');
mysqli_set_charset($dbc, 'utf8');

// Chama função responsável para seguir determinado usuário
if (isset($_GET['user_id'])) {
    seguirUsuario($dbc, $_SESSION['id_usuario'], $_GET['user_id'], $cur_page);
}

// Consulta para obter o total de resultados
$query = "SELECT DISTINCT ori.id_orientador, ori.nome, ori.sobrenome, ori.profissao_ori, ori.frase, "
        . "ori.trabalho_atual, ori.cidade, ori.foto, CEILING(AVG(co.classificacao)) AS classificacao "
        . "FROM orientador AS ori LEFT OUTER JOIN classificacao_orientador AS co "
        . "on ori.id_orientador = co.id_ori_rating "
        . "WHERE ori.nome IS NOT NULL AND ori.active = 1 "
        . "GROUP BY ori.id_orientador "
        . "ORDER BY CEILING(AVG(co.classificacao)) DESC, ori.nome ASC";
$result = mysqli_query($dbc, $query)
        or die('Erro ao se conectar com o banco de dados.');

$total = mysqli_num_rows($result);
$num_pages = ceil($total / $results_per_page);

// Consulta novamente, para obter somente o subconjunto dos resultados
$query .= " LIMIT $skip, $results_per_page";
$result = mysqli_query($dbc, $query)
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
                        $query3 = "SELECT cat.descricao FROM categoria_orientador AS cat_ori "
                                . "INNER JOIN categoria AS cat "
                                . "USING (id_categoria) "
                                . "WHERE cat_ori.id_orientador = '" . $row['id_orientador'] . "' "
                                . "AND cat_ori.resposta = '1' "
                                . "LIMIT 3";
                        $result3 = mysqli_query($dbc, $query3)
                                or die('Ocorreu um erro ao acessar o banco de dados.');
                        $category = array();
                        while ($row3 = mysqli_fetch_array($result3)) {
                            array_push($category, $row3);
                        }
                        if (is_file(MM_UPLOADPATH . $row['foto']) && filesize(MM_UPLOADPATH . $row['foto']) > 0) {
                            ?>
                            <div class="thumb col-md-3" style="margin: auto;">
                                <?php echo '<img src="' . MM_UPLOADPATH . $row['foto'] . '" alt="" class="img-fluid" style="width: 80%;">'; ?>
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
                            <div class="thumb col-md-3">
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
                                $id_perfil_usuario = ($_SESSION['id_usuario'] == 'id_estudante') ? 'id_perfil_estudante' : 'id_perfil_orientador';
                                $query2 = "SELECT resposta FROM perfil_seguidor "
                                        . "WHERE $id_perfil_usuario = " . $_SESSION['user_id']
                                        . " AND id_orientador = " . $row['id_orientador']
                                        . " AND resposta = 1";
                                $result2 = mysqli_query($dbc, $query2)
                                        or die('Encontrou um erro buscando dados no banco.');
                                if ($_SESSION['usuario'] == 'orientador' && $_SESSION['user_id'] == $row['id_orientador']) {
                                    echo '<ul class="btns" style="position: absolute; left: 84%;">';
                                    echo '<li><a href="editar.php">Editar</a></li>';
                                    echo '</ul>';
                                } else {
                                    if (mysqli_num_rows($result2) == 0) {
                                        echo '<ul class = "btns" style="position: absolute; left: 84%;" id="' . $row['id_orientador'] . '">';
                                        echo '<li><a href="category.php?user_id=' . $row['id_orientador'] . '&page=' . $cur_page . '">Seguir</a></li>';
                                        echo '</ul>';
                                    } else {
                                        echo '<ul class = "btns" style="position: absolute; left: 75%;" id="' . $row['id_orientador'] . '">';
                                        echo '<li><a href="category.php?user_id=' . $row['id_orientador'] . '&page=' . $cur_page . '">Deixar de Seguir</a></li>';
                                        echo '</ul>';
                                    }
                                }
                                ?>
                            </div>
                            <p>
                                <?php echo $row['frase']; ?>
                            </p>
                            <?php echo'<h5>Trabalho Atual: ' . $row['trabalho_atual'] . '</h5>'; ?>
                            <p class="address"><span class="lnr lnr-map"></span><?php echo $row['cidade']; ?>-SP</p>
                            <?php
                            switch ($row['classificacao']) {
                                case 1:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                                case 2:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                                case 3:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                                case 4:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                                case 5:
                                    echo '<h5>Classificação: <span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span><span class="lnr lnr-star text-warning"></span></h5>';
                                    break;
                            }
                            ?>
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
                $query2 = "SELECT * FROM categoria";
                $result2 = mysqli_query($dbc, $query2)
                        or die('Não foi possível acessar a tabela de categorias');
                ?>
                <div class="single-slidebar">
                    <h4>Orientador por Categoria</h4>
                    <ul class="cat-list">
                        <?php
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $query3 = "SELECT * FROM categoria_orientador WHERE id_categoria = "
                                    . $row2['id_categoria'] . " AND resposta = 1";
                            $result3 = mysqli_query($dbc, $query3)
                                    or die('Não foi possível buscar total de categorias.');
                            $total_category = mysqli_num_rows($result3);
                            echo '<li><a class="justify-content-between d-flex" href="search.php?category=' . $row2['id_categoria'] . '&submit="><p>' . $row2['descricao'] . '</p><span>' . $total_category . '</span></a></li>';
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
                echo generate_page_links($cur_page, $num_pages);
            }
            ?>
        </center>
    </div>
</section>
<!-- End post Area -->		

<?php
// Insere o rodapé da página
require_once './script/footer2.php';

// Esta função cria links de navegação, com base na página atual e no número de páginas
function generate_page_links($cur_page, $num_pages) {
    $page_links = '';

    // Se esta página não for a primeira, gera o link "previous"
    if ($cur_page > 1) {
        $page_links .= '<a href="' . $_SERVER['PHP_SELF']
                . '?page=' . ($cur_page - 1) . '" '
                . 'class="genric-btn primary circle arrow small">'
                . '<span class="lnr lnr-arrow-left pr-2"></span>  Anterior</a> ';
    } else {
        $page_links .= '<span class="lnr lnr-arrow-left"></span> ';
    }

    // Faz um loop através das páginas, gerando os links com os números das páginas
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($cur_page == $i) {
            $page_links .= ' ' . $i;
        } else {
            $page_links .= ' | <a href = "' . $_SERVER['PHP_SELF']
                    . '?page=' . $i . '">' . $i . '</a> | ';
        }
    }

    // Se esta página não for a última, gera o link "next"
    if ($cur_page < $num_pages) {
        $page_links .= ' <a href = "' . $_SERVER['PHP_SELF']
                . '?page=' . ($cur_page + 1) . '" '
                . 'class="genric-btn primary circle arrow small">Próxima '
                . '<span class="lnr lnr-arrow-right"></span></a>';
    } else {
        $page_links .= ' <span class="lnr lnr-arrow-right"></span>';
    }

    return $page_links;
}

function seguirUsuario($dbc, $id_usuario, $id_orientador, $cur_page) {
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
            '/category.php?page=' . $cur_page . '#' . $id_orientador;
    header('Location: ' . $page_url);
}
