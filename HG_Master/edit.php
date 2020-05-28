<?php
// Insere o cabeçaçho da página
$article = 'class="active"';
$title = "Edição de Artigos";
require_once 'script/header.php';

//require_once './script/appvars.php';
require_once './script/connectvars.php';

// Conecta-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar com o banco de dados.');
mysqli_set_charset($dbc, 'utf8');

echo '<div class="col-md-12">';
if (isset($_GET['id_categoria'])) {
    $query = "SELECT * FROM categoria WHERE id_categoria = " . $_GET['id_categoria'];
    $result = mysqli_query($dbc, $query)
            or die('Ocorreu um erro acessando o banco de dados.');
    $row = mysqli_fetch_array($result);
    echo '<h3>Tem certeza de que deseja editar a categoria abaixo abaixo?</h3><br>';

    echo '<form method="post" action="edit.php">';
    echo '<div class="col-md-12">';
    echo '<div class="form-group col-md-3" style="margin-right:60%">';
    echo '<label>Descrição: </label>';
    echo '<input type="text" name="confirm" value="' . $row['descricao'] . '" class="form-control">';
    echo '</div>';
    
    echo '<div class="col-md-2">';
    echo '<input type="submit" value="Confirmar" name="submit" class="btn btn-default btn-block">';
    echo '</div>';

    echo '<input type="hidden" name="id" value="' . $row['id_categoria'] . '">';
    echo '<input type="hidden" name="tipo" value="categoria">';

    echo '</form>';
}
if (isset($_POST['submit'])) {
    if (isset($_POST['tipo']) && $_POST['tipo'] == 'categoria') {
        $id = $_POST['id'];
        $description = $_POST['confirm'];
        // Atualiza os dados do banco de dados
        $query = "UPDATE categoria SET descricao = '$description' WHERE id_categoria = $id";

        mysqli_query($dbc, $query)
                or die('Erro ao atualizar o banco de dados');
        mysqli_close($dbc);

        //Confirma êxito com o usuário
        echo "<script>alert('A categoria foi atualizada com sucesso!');"
        . "window.location=\"typography.php\";</script>";
    } else if (isset($_POST['tipo']) && $_POST['tipo'] == 'categoria') {
        echo "<script>alert('A categoria não foi atualizada!');"
        . "window.location=\"typography.php\";</script>";
    }
    if (isset($_POST['descricao'])) {
        $description = $_POST['descricao'];

        // Insere os dados do banco de dados
        $query = "INSERT INTO categoria (descricao) VALUES ('$description')";

        mysqli_query($dbc, $query)
                or die('Erro ao inserir os dados no banco de dados');
        mysqli_close($dbc);

        //Confirma êxito com o usuário
        echo "<script>alert('A categoria foi inserida com sucesso!');"
        . "window.location=\"typography.php\";</script>";
    } else {
        echo "<script>alert('A categoria não foi inserida!');"
        . "window.location=\"typography.php\";</script>";
    }
}
?>
</div>