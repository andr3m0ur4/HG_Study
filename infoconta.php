<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Informações da Conta";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Insere o banner da página
$title = "Informações da Conta";
$title2 = "Informações da Conta";
$link = "infoconta";
require_once './script/banner2.php';

// Garantir que o usuário está logado.
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Por favor, faça login para acessar esta página.');"
    . "window.location=\"login.php\";</script>";
}

//Conectar-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar ao banco de dados.');
mysqli_set_charset($dbc, 'utf8');

if ($_SESSION['usuario'] == 'estudante') {

    // Chama função para ativar ou desativar a conta do usuário
    if (isset($_GET['id'])) {
        $switch = isset($_GET['on']) ? 'Yes' : 'No';
        ativar_desativarConta($_SESSION['usuario'], $_SESSION['user_id'], $switch, $dbc);
    }

    // Obtém os dados do perfil do banco de dados
    $query = "SELECT nome, sobrenome, email, cidade, frase, foto, active "
            . "FROM estudante WHERE id_estudante = '" . $_SESSION['user_id'] . "'";
}
if ($_SESSION['usuario'] == 'orientador') {

    // Chama função para ativar ou desativar a conta do usuário
    if (isset($_GET['id'])) {
        $switch = isset($_GET['on']) ? 'Yes' : 'No';
        ativar_desativarConta($_SESSION['usuario'], $_SESSION['user_id'], $switch, $dbc);
    }

    // Obtém os dados do perfil do banco de dados
    $query = "SELECT nome, sobrenome, email, cidade, profissao_ori, frase, trabalho_atual, "
            . "descricao, twitter, youtube, github, foto, active "
            . "FROM orientador "
            . "WHERE id_orientador = '" . $_SESSION['user_id'] . "'";
}
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
                                . "WHERE cat_ori.id_orientador = '" . $_SESSION['user_id'] . "' "
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
                                <ul class="btns">
                                    <li><a href="tag-category.php">Editar</a></li>
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
                                <ul class="btns">
                                    <li><a href="tag-category.php">Editar</a></li>
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
                                    } else {
                                        echo '<br>';
                                    }
                                    ?>
                                </div>
                                <ul class="btns" style="position: absolute; left: 84%;">
                                    <li><a href="editar.php">Editar</a></li>
                                </ul>
                            </div>
                            <p>
                                <?php echo $row['frase']; ?>
                            </p>
                            <p class="address"><span class="lnr lnr-map"></span><?php echo $row['cidade']; ?>-SP</p>                            
                        </div>
                    </div>	
                    <?php
                    if ($_SESSION['usuario'] == 'orientador') {
                        $query2 = "SELECT experiencia, participacao_projeto, formacao_academica "
                                . "FROM biografia WHERE id_orientador = '" . $_SESSION['user_id'] . "'";
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
                            <ul class="btns">

                                <li><a href="editar-biografia.php?setor=experiencia">Editar</a></li>
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
                            <ul class="btns">

                                <li><a href="editar-biografia.php?setor=participacao_projeto">Editar</a></li>
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
                            <ul class="btns">
                                <li><a href="editar-biografia.php?setor=formacao_academica">Editar</a></li>
                            </ul>
                        </div>

                        <?php
                    }
                    ?>
                    <ul class="btns primary-btn">
                        <?php
                        if ($row['active'] == 1) {
                            echo '<li><a href="infoconta.php?id=' . $_SESSION['user_id'] . '&tipo=' . $_SESSION['usuario'] . '&off=">Desativar Conta</a></li>';
                        } else if ($row['active'] == 0) {
                            echo '<li><a href="infoconta.php?id=' . $_SESSION['user_id'] . '&tipo=' . $_SESSION['usuario'] . '&on=">Ativar Conta</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <?php
                if ($_SESSION['usuario'] == 'orientador') {
                    $query4 = "SELECT ps.id_perfil_seguidor, ps.id_perfil_estudante, ps.id_perfil_orientador, ps.id_orientador, ps.resposta, "
                            . "estudante.id_estudante, estudante.nome AS nome_estudante, estudante.sobrenome AS sobrenome_estudante, "
                            . "orientador.id_orientador, orientador.nome AS nome_orientador, orientador.sobrenome AS sobrenome_orientador "
                            . "FROM perfil_seguidor AS ps "
                            . "LEFT OUTER JOIN estudante ON estudante.id_estudante = ps.id_perfil_estudante "
                            . "LEFT OUTER JOIN orientador ON orientador.id_orientador = ps.id_perfil_orientador "
                            . "WHERE ps.id_orientador = " . $_SESSION['user_id'] . ' AND resposta = 1 '
                            . 'LIMIT 7';
                    $result4 = mysqli_query($dbc, $query4)
                            or die('Não foi possível consultar o banco.');
                    $follow = array();
                    while ($row4 = mysqli_fetch_array($result4)) {
                        array_push($follow, $row4);
                    }
                    $query4 = "SELECT ps.id_perfil_seguidor, ps.id_perfil_estudante, "
                            . "ps.id_perfil_orientador, ps.id_orientador, "
                            . "ps.resposta, orientador.id_orientador, orientador.nome AS nome_orientador, "
                            . "orientador.sobrenome AS sobrenome_orientador "
                            . "FROM perfil_seguidor AS ps "
                            . "LEFT OUTER JOIN orientador ON orientador.id_orientador = ps.id_orientador "
                            . "WHERE ps.id_perfil_orientador = " . $_SESSION['user_id'] . " AND resposta = 1 "
                            . 'LIMIT 7';
                    $result4 = mysqli_query($dbc, $query4)
                            or die('Não foi possível consultar o banco.');
                    $following = array();
                    while ($row4 = mysqli_fetch_array($result4)) {
                        array_push($following, $row4);
                    }
                } else if ($_SESSION['usuario'] == 'estudante') {
                    $query4 = "SELECT ps.id_perfil_seguidor, ps.id_perfil_estudante, ps.id_perfil_orientador, ps.id_orientador, "
                            . "ps.resposta, orientador.id_orientador, orientador.nome AS nome_orientador, "
                            . "orientador.sobrenome AS sobrenome_orientador "
                            . "FROM perfil_seguidor AS ps "
                            . "LEFT OUTER JOIN orientador ON orientador.id_orientador = ps.id_orientador "
                            . "WHERE ps.id_perfil_estudante = " . $_SESSION['user_id'] . " AND resposta = 1 "
                            . 'LIMIT 7';
                    $result4 = mysqli_query($dbc, $query4)
                            or die('Não foi possível consultar o banco.');
                    $following = array();
                    while ($row4 = mysqli_fetch_array($result4)) {
                        array_push($following, $row4);
                    }
                }
                ?>
                <div class="col-lg-4 sidebar">
                    <?php
                    if ($_SESSION['usuario'] == 'orientador') {
                        ?>
                        <div class="single-slidebar">
                            <h4><?php echo 'Seguidores'; ?></h4>
                            <ul class="cat-list">
                                <?php
                                foreach ($follow as $user) {
                                    if (empty($user['id_estudante'])) {
                                        echo '<li><a class="justify-content-between d-flex" href="single.php?user_id='
                                        . $user['id_orientador'] . '"><p>' . $user['nome_orientador'] . ' ' . $user['sobrenome_orientador'] . '</p></a></li>';
                                    } else {
                                        echo '<li><a class="justify-content-between d-flex"><p>' . $user['nome_estudante'] . ' ' . $user['sobrenome_estudante'] . '</p></a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="single-slidebar">
                        <h4><?php echo 'Quem eu sigo'; ?></h4>
                        <ul class="cat-list">
                            <?php
                            foreach ($following as $user) {
                                if (empty($user['id_estudante'])) {
                                    echo '<li><a class="justify-content-between d-flex" href="single.php?user_id='
                                    . $user['id_orientador'] . '"><p>' . $user['nome_orientador'] . ' ' . $user['sobrenome_orientador'] . '</p></a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>	
    </section>
    <!-- End post Area -->
    <?php
} else {
    echo "<script>alert('Ocorreu um problema acessando o seu perfil');"
    . "window.location=\"infoconta.php\";</script>";
}

mysqli_close($dbc);
?>

<?php
// Insere o rodapé da página
require_once './script/footer2.php';

function ativar_desativarConta($usuario, $id, $switch, $dbc) {
    if ($usuario == 'estudante') {
        if ($switch == 'Yes') {
            $query = "UPDATE estudante SET active = 1 WHERE id_estudante = $id";
            $result = mysqli_query($dbc, $query)
                    or die('Não foi possível acessar o banco de dados!');
            // Confirme o sucesso com o usuário
            echo "<script>alert('A sua conta foi ativada com sucesso!');"
            . "window.location=\"infoconta.php\";</script>";
        } else if ($switch == 'No') {
            $query = "UPDATE estudante SET active = 0 WHERE id_estudante = $id";
            $result = mysqli_query($dbc, $query)
                    or die('Não foi possível acessar o banco de dados!');
            // Confirme o sucesso com o usuário
            echo "<script>alert('A sua conta foi desativada com sucesso!');"
            . "window.location=\"script/logout.php\";</script>";
        }
    } else if ($usuario == 'orientador') {
        if ($switch == 'Yes') {
            $query = "UPDATE orientador SET active = 1 WHERE id_orientador = $id";
            $result = mysqli_query($dbc, $query)
                    or die('Não foi possível acessar o banco de dados!');
            // Confirme o sucesso com o usuário
            echo "<script>alert('A sua conta foi ativada com sucesso!');"
            . "window.location=\"infoconta.php\";</script>";
        } else if ($switch == 'No') {
            $query = "UPDATE orientador SET active = 0 WHERE id_orientador = $id";
            $result = mysqli_query($dbc, $query)
                    or die('Não foi possível acessar o banco de dados!');
            // Confirme o sucesso com o usuário
            echo "<script>alert('A sua conta foi desativada com sucesso!');"
            . "window.location=\"script/logout.php\";</script>";
        }
    }
}
