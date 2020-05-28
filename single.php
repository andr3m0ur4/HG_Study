<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Detalhes do Tutor";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Insere o banner da página
$title = "Detalhes do Tutor";
$title2 = "Detalhes do Tutor";
$link = "single";
require_once './script/banner2.php';

// Garantir que o usuário está logado.
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Por favor, faça login para acessar esta página.');"
    . "window.location=\"login.php\";</script>";
}

if ($_SESSION['usuario'] == 'orientador' && $_SESSION['user_id'] == $_GET['user_id']) {
    echo "<script>window.location=\"infoconta.php\";</script>";
}

//Conectar-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar ao banco de dados.');
mysqli_set_charset($dbc, 'utf8');

// Chama função responsável para seguir determinado usuário
if (isset($_GET['user_id2'])) {
    seguirUsuario($dbc, $_SESSION['id_usuario'], $_GET['user_id2']);
}

$query = "SELECT id_orientador, nome, sobrenome, email, cidade, profissao_ori, frase, trabalho_atual, "
        . "descricao, twitter, youtube, github, foto "
        . "FROM orientador "
        . "WHERE id_orientador = '" . $_GET['user_id'] . "' AND active = 1";
$result = mysqli_query($dbc, $query)
        or die('Erro ao realizar a consulta no banco de dados');

if (mysqli_num_rows($result) == 1) {
    //A linha do usuário foi encontrada, então mostrar os dados do usuário
    $row = mysqli_fetch_array($result);
    ?>

    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    <div class="single-post d-flex flex-row">
                        <?php
                        // Obtém as categorias do orientador no banco de dados
                        $query3 = "SELECT cat.descricao FROM categoria_orientador AS cat_ori "
                                . "INNER JOIN categoria AS cat "
                                . "USING (id_categoria) "
                                . "WHERE cat_ori.id_orientador = '" . $_GET['user_id'] . "' "
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
                            <div class="thumb col-lg-4" style="margin: auto;">
                                <?php echo '<img src="' . MM_UPLOADPATH . $row['foto'] . '" alt="" style="width: 60%;">'; ?>
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
                                    <a href="#">
                                        <?php echo '<h4>' . $row['nome'] . ' ' . $row['sobrenome'] . '</h4>'; ?></a>
                                    <?php
                                    if (!empty($row['profissao_ori'])) {
                                        echo '<h6>' . $row['profissao_ori'] . '</h6>';
                                    }
                                    ?>
                                </div>
                                <?php
                                $id_perfil_usuario = ($_SESSION['id_usuario'] == 'id_estudante') ? 'id_perfil_estudante' : 'id_perfil_orientador';
                                $query4 = "SELECT resposta FROM perfil_seguidor "
                                        . "WHERE $id_perfil_usuario = " . $_SESSION['user_id']
                                        . " AND id_orientador = " . $row['id_orientador']
                                        . " AND resposta = 1";
                                $result4 = mysqli_query($dbc, $query4)
                                        or die('Encontrou um erro buscando dados no banco.');

                                if (mysqli_num_rows($result4) == 0) {
                                    echo '<ul class = "btns" style="position: absolute; left: 84%;" id="' . $row['id_orientador'] . '">';
                                    echo '<li><a href="single.php?user_id2=' . $row['id_orientador'] . '">Seguir</a></li>';
                                    echo '</ul>';
                                } else {
                                    echo '<ul class = "btns" style="position: absolute; left: 75%;" id="' . $row['id_orientador'] . '">';
                                    echo '<li><a href="single.php?user_id2=' . $row['id_orientador'] . '">Deixar de Seguir</a></li>';
                                    echo '</ul>';
                                }
                                ?>
                            </div>
                            <p>
                                <?php echo $row['frase']; ?>
                            </p>
                            <p class="address"><span class="lnr lnr-map"></span><?php echo $row['cidade']; ?>-SP</p>
                        </div>
                    </div>
                    <?php
                    $query2 = "SELECT experiencia, participacao_projeto, formacao_academica "
                            . "FROM biografia WHERE id_orientador = '" . $_GET['user_id'] . "'";
                    $result2 = mysqli_query($dbc, $query2)
                            or die('Ocorreu um erro no banco de dados');
                    $topics = array();
                    while ($row2 = mysqli_fetch_array($result2)) {
                        array_push($topics, $row2);
                    }
                    ?>
                    <div class="single-post job-details">
                        <h4 class="single-title">Descrição</h4>
                        <p>
                            <?php
                            echo nl2br($row['descricao']);
                            ?>
                        </p>
                    </div>
                    <div class="single-post job-experience">
                        <h4 class="single-title">Experiências</h4>
                        <ul>
                            <?php
                            foreach ($topics as $topic) {
                                if (!empty($topic['experiencia'])) {
                                    ?>
                                    <li>
                                        <img src="img/pages/list.jpg" alt="">
                                        <?php echo '<span>' . $topic['experiencia'] . '</span>'; ?>
                                    </li> 
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="single-post job-experience">
                        <h4 class="single-title">Participações em projetos</h4>
                        <ul>
                            <?php
                            foreach ($topics as $topic) {
                                if (!empty($topic['participacao_projeto'])) {
                                    ?>
                                    <li>
                                        <img src="img/pages/list.jpg" alt="">
                                        <?php echo '<span>' . $topic['participacao_projeto'] . '</span>'; ?>
                                    </li> 
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>	
                    <div class="single-post job-experience">
                        <h4 class="single-title">Formações Acadêmicas & Cursos</h4>
                        <ul>
                            <?php
                            foreach ($topics as $topic) {
                                if (!empty($topic['formacao_academica'])) {
                                    ?>
                                    <li>
                                        <img src="img/pages/list.jpg" alt="">
                                        <?php echo '<span>' . $topic['formacao_academica'] . '</span>'; ?>
                                    </li> 
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>														
                </div>
                <?php
                $query2 = "SELECT ps.id_perfil_seguidor, ps.id_perfil_estudante, ps.id_perfil_orientador, ps.id_orientador, ps.resposta, "
                        . "estudante.id_estudante, estudante.nome AS nome_estudante, estudante.sobrenome AS sobrenome_estudante, "
                        . "orientador.id_orientador, orientador.nome AS nome_orientador, orientador.sobrenome AS sobrenome_orientador "
                        . "FROM perfil_seguidor AS ps "
                        . "LEFT OUTER JOIN estudante ON estudante.id_estudante = ps.id_perfil_estudante "
                        . "LEFT OUTER JOIN orientador ON orientador.id_orientador = ps.id_perfil_orientador "
                        . "WHERE ps.id_orientador = " . $row['id_orientador'] . ' AND resposta = 1 '
                        . 'LIMIT 7';
                $result2 = mysqli_query($dbc, $query2)
                        or die('Não foi possível consultar o banco.');
                ?>
                <div class="col-lg-4 sidebar">
                    <div class="single-slidebar">
                        <h4>Seguidores</h4>
                        <ul class="cat-list">
                            <?php
                            while ($row2 = mysqli_fetch_array($result2)) {
                                if (empty($row2['id_estudante'])) {
                                    echo '<li><a class="justify-content-between d-flex" href="single.php?user_id=' . $row2['id_orientador'] . '"><p>' . $row2['nome_orientador'] . ' ' . $row2['sobrenome_orientador'] . '</p></a></li>';
                                } else {
                                    echo '<li><a class="justify-content-between d-flex"><p>' . $row2['nome_estudante'] . ' ' . $row2['sobrenome_estudante'] . '</p></a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $usuario = $_SESSION['usuario'];
                    $user_rating = $_GET['user_id'];

                    $select_rating = "SELECT classificacao FROM classificacao_orientador "
                            . "WHERE id_$usuario = $user_id AND id_ori_rating = $user_rating "
                            . "AND count >= 3";
                    $run_rating = mysqli_query($dbc, $select_rating)
                            or die('não foi posível realizar a consulta no banco');
                    if (mysqli_num_rows($run_rating) == 1) {
                        $row_rate = mysqli_fetch_array($run_rating);
                        ?>
                        <div class="single-slidebar">
                            <h4 mb-30>Classificar Orientador</h4>
                            <div class="default-select mb-10" id="default-select">
                                <form method="POST">
                                    <select name="rate">
                                        <option value="1" <?php echo $row_rate['classificacao'] == 1 ? 'selected' : ''; ?>>1</option>
                                        <option value="2" <?php echo $row_rate['classificacao'] == 2 ? 'selected' : ''; ?>>2</option>
                                        <option value="3" <?php echo $row_rate['classificacao'] == 3 ? 'selected' : ''; ?>>3</option>
                                        <option value="4" <?php echo $row_rate['classificacao'] == 4 ? 'selected' : ''; ?>>4</option>
                                        <option value="5" <?php echo $row_rate['classificacao'] == 5 ? 'selected' : ''; ?>>5</option>
                                    </select>
                                    <button type="submit" name="rating" class="genric-btn primary radius ml-30">Classificar</button>
                                </form>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['rating'])) {
                            $rate = $_POST['rate'];

                            $select_rating = "SELECT * FROM classificacao_orientador "
                                    . "WHERE id_$usuario = $user_id AND id_ori_rating = $user_rating";
                            $run_rating = mysqli_query($dbc, $select_rating)
                                    or die('não foi posível realizar a consultano banco');
                            if (mysqli_num_rows($run_rating) == 1) {
                                $update_rating = "UPDATE classificacao_orientador SET classificacao = $rate "
                                        . "WHERE id_$usuario = $user_id AND id_ori_rating = $user_rating";
                                $run_rating = mysqli_query($dbc, $update_rating)
                                        or die('Não foi possível atualizar os dados.');
                                echo "<script>window.open('single.php?user_id=$user_rating', '_self')</script>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>	
    </section>
    <!-- End post Area -->
    <?php
} else {
    // Exibir mensagem de perfil desativado
    echo "<script>alert('Perfil de usuário não encontrado!');"
    . "window.location=\"index.php\";</script>";
}

mysqli_close($dbc);
?>

<?php
// Insere o rodapé da página
require_once './script/footer2.php';

function seguirUsuario($dbc, $id_usuario, $id_orientador) {
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
            '/single.php?user_id=' . $id_orientador . '#' . $id_orientador;
    header('Location: ' . $page_url);
}
