<?php
// Insere o cabeçaçho da página
$studant = 'class="active"';
$title = "Exclusão de Dados";
require_once 'script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Conecta-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar com o banco de dados.');
mysqli_set_charset($dbc, 'utf8');
echo '<div class="col-md-12">';
if (isset($_GET['id_estudante'])) {
    $query = "SELECT * FROM estudante WHERE id_estudante = " . $_GET['id_estudante'];
    $result = mysqli_query($dbc, $query)
            or die('Ocorreu um erro acessando o banco de dados.');
    $row = mysqli_fetch_array($result);
    echo '<h3>Tem certeza de que deseja excluir o estudante abaixo?</h3>';
    echo '<p><strong>Nome: </strong>' . $row['nome'] . ' ' . $row['sobrenome'];

    echo '<form method="post" action="remove.php">';
    echo '<input type="radio" name="confirm" value="Yes">Sim ';
    echo '<input type="radio" name="confirm" value="No" checked="checked">Não<br><br>';
    echo '<div class="col-md-2">';
    echo '<input type="submit" value="Confirmar" name="submit" class="btn btn-default btn-block">';
    echo '</div>';

    echo '<input type="hidden" name="id" value="' . $row['id_estudante'] . '">';
    echo '<input type="hidden" name="tipo" value="estudante">';
    echo '<input type="hidden" name="screenshot" value="' . $row['foto'] . '">';

    echo '</form>';
} else if (isset($_GET['id_orientador'])) {
    $query = "SELECT * FROM orientador WHERE id_orientador = " . $_GET['id_orientador'];
    $result = mysqli_query($dbc, $query)
            or die('Ocorreu um erro acessando o banco de dados.');
    $row = mysqli_fetch_array($result);
    echo '<h3>Tem certeza de que deseja excluir o orientador abaixo?</h3>';
    echo '<p><strong>Nome: </strong>' . $row['nome'] . ' ' . $row['sobrenome'];

    echo '<form method="post" action="remove.php">';
    echo '<input type="radio" name="confirm" value="Yes">Sim ';
    echo '<input type="radio" name="confirm" value="No" checked="checked">Não<br><br>';
    echo '<div class="col-md-2">';
    echo '<input type="submit" value="Confirmar" name="submit" class="btn btn-default btn-block">';
    echo '</div>';

    echo '<input type="hidden" name="id" value="' . $row['id_orientador'] . '">';
    echo '<input type="hidden" name="tipo" value="orientador">';
    echo '<input type="hidden" name="screenshot" value="' . $row['foto'] . '">';

    echo '</form>';
} else if (isset($_GET['id_artigo'])) {
    $query = "SELECT * FROM artigo WHERE id_artigo = " . $_GET['id_artigo'];
    $result = mysqli_query($dbc, $query)
            or die('Ocorreu um erro acessando o banco de dados.');
    $row = mysqli_fetch_array($result);
    echo '<h3>Tem certeza de que deseja excluir o artigo abaixo?</h3>';
    echo '<p><strong>Título: </strong>' . $row['title'] . '<br><br><strong>Conteúdo:</strong> ' . nl2br($row['content1'])
    . '<br><br><strong>Citação: </strong>' . nl2br($row['citacao']) . '<br><br><strong>Conteúdo: </strong>'
    . nl2br($row['content2']) . '<br></p>';

    echo '<form method="post" action="remove.php">';
    echo '<div class="form-check form-check-radio">';
    echo '<label>Deseja Remover?</label><br>';
    echo '<input type="radio" name="confirm" value="Yes" class="form-check-input">Sim ';
    echo '<input type="radio" name="confirm" value="No" class="form-check-input" checked="checked">Não<br><br>';
    echo '</div>';
    echo '<div class="col-md-2">';
    echo '<input type="submit" value="Confirmar" name="submit" class="btn btn-default btn-block">';
    echo '</div>';

    echo '<input type="hidden" name="id" value="' . $row['id_artigo'] . '">';
    echo '<input type="hidden" name="tipo" value="artigo">';
    echo '<input type="hidden" name="screenshot" value="' . $row['screenshot'] . '">';

    echo '</form><br><br><br><br>';
} else if (isset($_GET['id_comentario'])) {
    $query = "SELECT * FROM comentario WHERE id_comentario = " . $_GET['id_comentario'];
    $result = mysqli_query($dbc, $query)
            or die('Ocorreu um erro acessando o banco de dados.');
    $row = mysqli_fetch_array($result);
    echo '<h3>Tem certeza de que deseja excluir o comentário abaixo?</h3>';
    echo '<p><strong>Mensagem: </strong>' . $row['mensagem'] . '</p>';

    echo '<form method="post" action="remove.php">';
    echo '<input type="radio" name="confirm" value="Yes">Sim ';
    echo '<input type="radio" name="confirm" value="No" checked="checked">Não<br><br>';
    echo '<div class="col-md-2">';
    echo '<input type="submit" value="Confirmar" name="submit" class="btn btn-default btn-block">';
    echo '</div>';

    echo '<input type="hidden" name="id" value="' . $row['id_comentario'] . '">';
    echo '<input type="hidden" name="tipo" value="comentario">';

    echo '</form>';
} else if (isset($_GET['id_categoria'])) {
    $query = "SELECT * FROM categoria WHERE id_categoria = " . $_GET['id_categoria'];
    $result = mysqli_query($dbc, $query)
            or die('Ocorreu um erro acessando o banco de dados.');
    $row = mysqli_fetch_array($result);
    echo '<h3>Tem certeza de que deseja excluir o categoria abaixo?</h3>';
    echo '<p><strong>Descrição: </strong>' . $row['descricao'] . '</p>';

    echo '<form method="post" action="remove.php">';
    echo '<input type="radio" name="confirm" value="Yes">Sim ';
    echo '<input type="radio" name="confirm" value="No" checked="checked">Não<br><br>';
    echo '<div class="col-md-2">';
    echo '<input type="submit" value="Confirmar" name="submit" class="btn btn-default btn-block">';
    echo '</div>';

    echo '<input type="hidden" name="id" value="' . $row['id_categoria'] . '">';
    echo '<input type="hidden" name="tipo" value="categoria">';

    echo '</form>';
}

if (isset($_POST['submit'])) {
    if ($_POST['tipo'] == 'estudante' && $_POST['confirm'] == 'Yes') {
        $id = $_POST['id'];
        
        $screenshot = $_POST['screenshot'];

        //Exclui o arquivo gráfico do servidor
        @unlink(MM_UPLOADPATH . $screenshot);
        
        //Exclui os dados do banco de dados
        $query = "DELETE FROM estudante WHERE id_estudante = '$id' LIMIT 1";

        mysqli_query($dbc, $query)
                or die('Erro ao consultar banco de dados');
        mysqli_close($dbc);

        //Confirma êxito com o usuário
        echo "<script>alert('O cadastro foi excluído com sucesso!');"
        . "window.location=\"index.php\";</script>";
    } else if ($_POST['tipo'] == 'estudante') {
        echo "<script>alert('O cadastro nao foi excluído!');"
        . "window.location=\"index.php\";</script>";
    }
    if ($_POST['tipo'] == 'orientador' && $_POST['confirm'] == 'Yes') {
        $id = $_POST['id'];
        $screenshot = $_POST['screenshot'];

        //Exclui o arquivo gráfico do servidor
        @unlink(MM_UPLOADPATH . $screenshot);
        
        //Exclui os dados do banco de dados
        $query = "DELETE FROM orientador WHERE id_orientador = '$id' LIMIT 1";

        mysqli_query($dbc, $query)
                or die('Erro ao consultar banco de dados');
        mysqli_close($dbc);

        //Confirma êxito com o usuário
        echo "<script>alert('O cadastro foi excluído com sucesso!');"
        . "window.location=\"table.php\";</script>";
    } else if ($_POST['tipo'] == 'orientador') {
        echo "<script>alert('O cadastro nao foi excluído!');"
        . "window.location=\"table.php\";</script>";
    }
    if ($_POST['tipo'] == 'artigo' && $_POST['confirm'] == 'Yes') {
        $id = $_POST['id'];
        $screenshot = $_POST['screenshot'];

        //Exclui o arquivo gráfico do servidor
        @unlink(MM_UPLOADPATH2 . $screenshot);
        
        //Exclui os dados do banco de dados
        $query = "DELETE FROM artigo WHERE id_artigo = '$id' LIMIT 1";

        mysqli_query($dbc, $query)
                or die('Erro ao consultar banco de dados');
        mysqli_close($dbc);

        //Confirma êxito com o usuário
        echo "<script>alert('O artigo foi excluído com sucesso!');"
        . "window.location=\"user.php\";</script>";
    } else if ($_POST['tipo'] == 'artigo') {
        echo "<script>alert('O artigo nao foi excluído!');"
        . "window.location=\"user.php\";</script>";
    }
    if ($_POST['tipo'] == 'comentario' && $_POST['confirm'] == 'Yes') {
        $id = $_POST['id'];
        //Exclui os dados do banco de dados
        $query = "DELETE FROM comentario WHERE id_comentario = '$id' LIMIT 1";

        mysqli_query($dbc, $query)
                or die('Erro ao consultar banco de dados');
        mysqli_close($dbc);

        //Confirma êxito com o usuário
        echo "<script>alert('O comentário foi excluído com sucesso!');"
        . "window.location=\"icons.php\";</script>";
    } else if ($_POST['tipo'] == 'comentario') {
        echo "<script>alert('O comentário nao foi excluído!');"
        . "window.location=\"icons.php\";</script>";
    }
    if ($_POST['tipo'] == 'categoria' && $_POST['confirm'] == 'Yes') {
        $id = $_POST['id'];
        //Exclui os dados do banco de dados
        $query = "DELETE FROM categoria WHERE id_categoria = '$id' LIMIT 1";

        mysqli_query($dbc, $query)
                or die('Erro ao consultar banco de dados');
        mysqli_close($dbc);

        //Confirma êxito com o usuário
        echo "<script>alert('A categoria foi excluída com sucesso!');"
        . "window.location=\"typography.php\";</script>";
    } else if ($_POST['tipo'] == 'categoria') {
        echo "<script>alert('A categoria nao foi excluída!');"
        . "window.location=\"typography.php\";</script>";
    }
}
?>
</div>

<?php
// Insere o rodapé da página
require_once './script/footer.php';
