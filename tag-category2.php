<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Editar Categorias";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Insere o banner da página
$title = "Editar Categorias";
$title2 = "Editar";
$link = "tag-category";
require_once './script/banner2.php';

// Garantir que o usuário está logado.
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Por favor, faça login para acessar esta página.');"
    . "window.location=\"login.php\";</script>";
}

//Conectar-se aobanco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar ao banco de dados.');
mysqli_set_charset($dbc, 'utf8');

if (isset($_GET['article_id'])) {
    // Se este usuário jamais selecionou as categorias, inserir respostas vazias no banco de dados
    $query = "SELECT * FROM categoria_artigo WHERE id_artigo = '" . $_GET['article_id'] . "'";
    $result = mysqli_query($dbc, $query)
            or die('Não foi possível realizar a consulta no banco de dados.');

    if (mysqli_num_rows($result) == 0) {
        // Primeiramente obtém a lista de IDs das categorias a partir da respectiva tabela
        $query = "SELECT id_categoria FROM categoria ORDER BY id_categoria";
        $result = mysqli_query($dbc, $query)
                or die('Ocorreu um erro ao consultar dados no banco de dados');
        $categoriaIDs = array();
        while ($row = mysqli_fetch_array($result)) {
            array_push($categoriaIDs, $row['id_categoria']);
        }

        // Insere linhas de respostas na tabela respectiva, uma para cada categoria
        foreach ($categoriaIDs as $categoria_id) {
            $query = "INSERT INTO categoria_artigo (id_artigo, id_categoria) "
                    . "VALUES ('" . $_GET['article_id'] . "', '$categoria_id')";
            mysqli_query($dbc, $query)
                    or die('Não foi possível inserir os dados no banco de dados');
        }
    } else {
        $query = "SELECT * FROM categoria_artigo WHERE id_artigo = '" . $_GET['article_id'] . "'";
        $result = mysqli_query($dbc, $query)
                or die('Não foi possível realizar a consulta no banco de dados');
        $countCatArt = mysqli_num_rows($result);

        $query2 = "SELECT * FROM categoria";
        $result2 = mysqli_query($dbc, $query2)
                or die('Não foi possível realizar a consulta no banco de dados');
        $countCategoria = mysqli_num_rows($result2);

        if ($countCatArt < $countCategoria) {
            $query = "SELECT id_categoria FROM categoria WHERE id_categoria > $countCatArt";
            $result = mysqli_query($dbc, $query)
                    or die('Ocorreu um erro ao consultar dados no banco de dados');
            $categoriaIDs = array();
            while ($row = mysqli_fetch_array($result)) {
                array_push($categoriaIDs, $row['id_categoria']);
            }

            // Insere linhas de respostas na tabela respectiva, uma para cada categoria
            foreach ($categoriaIDs as $categoria_id) {
                $query = "INSERT INTO categoria_artigo (id_artigo, id_categoria) "
                        . "VALUES ('" . $_GET['article_id'] . "', '$categoria_id')";
                mysqli_query($dbc, $query)
                        or die('Não foi possível inserir os dados no banco de dados');
            }
        }
    }
}

if (isset($_POST['submit'])) {
    // Recebe o último valor do ID da respectiva tabela
    $last = $_POST['last'];
    // Recebe a quantidade de valores do array
    $count = $_POST['count'];
    // Identifica o primeiro ID referente ao usuário na tabela categoria_artigo
    $resultado = $last + 1 - $count;
    $article_id = $_POST['article_id'];

    // Reseta as linhas do respectivo artigo
    for ($i = $resultado; $i <= $last; $i++) {
        $query = "UPDATE categoria_artigo SET resposta = 0 "
                . "WHERE id_artigo = '$article_id'";

        mysqli_query($dbc, $query)
                or die('Encontrou um erro tentando atualizar o banco com valor 0!');
    }

    foreach ($_POST as $resposta_id => $resposta) {
        $query = "UPDATE categoria_artigo SET resposta = '$resposta' "
                . "WHERE id_categoria_artigo = '$resposta_id'";
        mysqli_query($dbc, $query)
                or die('Não foi possível atualizar o banco de dados');
    }

    // Confirmar successo com o usuário
    echo "<script>alert('Suas categorias foram atualizadas com sucesso!');"
    . "window.location=\"blog-single.php?article_id=" . $article_id . "\";</script>";
} else {
    
}

// Obtém os dados de resposta do banco, para gerar o formulário
$query = "SELECT cat_art.id_categoria_artigo, cat_art.resposta, cat.descricao "
        . "FROM categoria_artigo AS cat_art "
        . "INNER JOIN artigo AS art "
        . "USING (id_artigo) "
        . "INNER JOIN categoria AS cat "
        . "USING (id_categoria) "
        . "WHERE cat_art.id_artigo = '" . $_GET['article_id'] . "'";
$result = mysqli_query($dbc, $query)
        or die('Não foi possível realizar a consulta no banco de dados.');
$responses = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($responses, $row);
}
// Armazeno a quantidade de elementos do array e divide por 3 somando por 1 no final
$div = ceil(count($responses) / 3);
$responses_div = array_chunk($responses, $div);
$responses1 = $responses_div[0];
$responses2 = $responses_div[1];
$responses3 = $responses_div[2];
// Armazenar a quantidade de elemntos do array
$count = count($responses);

mysqli_close($dbc);
?>

<center class="container">
    <div class="section-top-border">
        <h3 class="mb-30">Categorias</h3>
        <?php echo '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '" class="container">'; ?>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 mt-sm-30">
                <div class="single-element-widget">
                    <?php
                    foreach ($responses1 as $response) {
                        echo '<div class="switch-wrap d-flex justify-content-between">';
                        echo '<p>' . $response['descricao'] . '</p>';
                        echo '<div class="primary-switch">';
                        if ($response['resposta'] == NULL || $response['resposta'] == 0) {
                            echo '<input type="checkbox" id="default-switch' . $response['id_categoria_artigo'] . '" name="' . $response['id_categoria_artigo'] . '" value="1">';
                            echo '<label for="default-switch' . $response['id_categoria_artigo'] . '"></label>';
                        }
                        if ($response['resposta'] == 1) {
                            echo '<input type="checkbox" id="default-switch' . $response['id_categoria_artigo'] . '" name="' . $response['id_categoria_artigo'] . '" value="1" checked>';
                            echo '<label for="default-switch' . $response['id_categoria_artigo'] . '"></label>';
                        }
                        echo '</div>';
                        echo '</div>';

                        // Armazendo o ultimo valor do ID da respectiva tabela
                        $last = $response['id_categoria_artigo'];
                    }
                    echo '<input type="hidden" name="last" value="' . $last . '">';
                    echo '<input type="hidden" name="count" value="' . $count . '">';
                    ?>                    
                </div>                
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mt-sm-30">
                <div class="single-element-widget">
                    <?php
                    foreach ($responses2 as $response) {
                        echo '<div class="switch-wrap d-flex justify-content-between">';
                        echo '<p>' . $response['descricao'] . '</p>';
                        echo '<div class="primary-switch">';
                        if ($response['resposta'] == NULL || $response['resposta'] == 0) {
                            echo '<input type="checkbox" id="default-switch' . $response['id_categoria_artigo'] . '" name="' . $response['id_categoria_artigo'] . '" value="1">';
                            echo '<label for="default-switch' . $response['id_categoria_artigo'] . '"></label>';
                        }
                        if ($response['resposta'] == 1) {
                            echo '<input type="checkbox" id="default-switch' . $response['id_categoria_artigo'] . '" name="' . $response['id_categoria_artigo'] . '" value="1" checked>';
                            echo '<label for="default-switch' . $response['id_categoria_artigo'] . '"></label>';
                        }
                        echo '</div>';
                        echo '</div>';

                        // Armazendo o ultimo valor do ID da respectiva tabela
                        $last = $response['id_categoria_artigo'];
                    }
                    echo '<input type="hidden" name="last" value="' . $last . '">';
                    echo '<input type="hidden" name="count" value="' . $count . '">';
                    ?>                    
                </div>                
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 mt-sm-30">
                <div class="single-element-widget">

                    <?php
                    foreach ($responses3 as $response) {
                        echo '<div class="switch-wrap d-flex justify-content-between">';
                        echo '<p>' . $response['descricao'] . '</p>';
                        echo '<div class="primary-switch">';
                        if ($response['resposta'] == NULL || $response['resposta'] == 0) {
                            echo '<input type="checkbox" id="default-switch' . $response['id_categoria_artigo'] . '" name="' . $response['id_categoria_artigo'] . '" value="1">';
                            echo '<label for="default-switch' . $response['id_categoria_artigo'] . '"></label>';
                        }
                        if ($response['resposta'] == 1) {
                            echo '<input type="checkbox" id="default-switch' . $response['id_categoria_artigo'] . '" name="' . $response['id_categoria_artigo'] . '" value="1" checked>';
                            echo '<label for="default-switch' . $response['id_categoria_artigo'] . '"></label>';
                        }
                        echo '</div>';
                        echo '</div>';

                        // Armazendo o ultimo valor do ID da respectiva tabela
                        $last = $response['id_categoria_artigo'];
                    }
                    echo '<input type="hidden" name="last" value="' . $last . '">';
                    echo '<input type="hidden" name="count" value="' . $count . '">';
                    echo '<input type="hidden" name="article_id" value="' . $_GET['article_id'] . '">';
                    ?>                    
                </div>
            </div>
        </div>
        <input type="submit" class="genric-btn primary circle arrow mt-30" name="submit" value="Salvar">
        </form>
    </div>
</center>


<?php
// Insere o rodapé da página
require_once './script/footer2.php';
