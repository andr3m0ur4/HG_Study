<?php
// Insere o cabeçaçho da página
$article = 'class="active"';
$title = "Aprovação de Artigos";
require_once 'script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Conecta-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar com o banco de dados.');
mysqli_set_charset($dbc, 'utf8');

echo '<div class="col-md-12">';
if (isset($_GET['id_artigo'])) {
    $query = "SELECT * FROM artigo INNER JOIN orientador USING(id_orientador) "
            . "WHERE id_artigo = " . $_GET['id_artigo'];
    $result = mysqli_query($dbc, $query)
            or die('Ocorreu um erro acessando o banco de dados.');
    $row = mysqli_fetch_array($result);
    echo '<h3>Tem certeza de que deseja aprovar o artigo abaixo?</h3>';
    if (!empty($row['screenshot'])) {
        echo '<figure>';
        echo '<img src="' . MM_UPLOADPATH2 . $row['screenshot'] . '" style="width:60%;height:40%;padding:5px;">';
        echo '</figure><br>';
    }
    echo '<p><strong>Título: </strong>' . $row['title'] . '<br><br><strong>Conteúdo:</strong> ' . nl2br($row['content1'])
    . '<br><br><strong>Citação: </strong>' . nl2br($row['citacao']) . '<br><br><strong>Conteúdo: </strong>'
    . nl2br($row['content2']) . '</p><br>';

    echo '<form method="post" action="approve.php">';
    echo '<label>Deseja Aprovar?</label><br>';
    echo '<input type="radio" name="confirm" value="Yes">Sim ';
    echo '<input type="radio" name="confirm" value="No" checked="checked">Não<br><br>';
    echo '<div class="col-md-2">';
    echo '<input type="submit" value="Confirmar" name="submit" class="btn btn-default btn-block">';
    echo '</div>';

    echo '<input type="hidden" name="id" value="' . $row['id_artigo'] . '">';
    echo '<input type="hidden" name="tipo" value="artigo">';
    echo '<input type="hidden" name="email" value="' . $row['email'] . '">';
    echo '<input type="hidden" name="nome" value="' . $row['nome'] . '">';

    echo '</form><br><br><br><br>';
}
if (isset($_POST['submit'])) {
    if ($_POST['tipo'] == 'artigo' && $_POST['confirm'] == 'Yes') {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $name = $_POST['nome'];

        // Atualiza os dados do banco de dados
        $query = "UPDATE artigo SET approved = 1 WHERE id_artigo = $id";

        mysqli_query($dbc, $query)
                or die('Erro ao atualizar o banco de dados');
        mysqli_close($dbc);

        enviarEmail($email, $name);
        
        //Confirma êxito com o usuário
        echo "<script>alert('O artigo foi aprovado com sucesso!');"
        . "window.location=\"user.php\";</script>";
    } else if ($_POST['tipo'] == 'artigo') {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $name = $_POST['nome'];
        echo '<form action="mail.php" method="POST">';
        echo '<h3>Enviar mensagem notificando o orientador</h3>';
        echo '<textarea class="common-textarea mt-10 form-control" name="message" placeholder="Mensagem" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Mensagem\'" required></textarea>';
        echo '<div class="text-center" style="margin-top: 3%;">';
        echo '<button type="submit" name="submit" class="btn btn-default text-white" aria-haspopup="true" aria-expanded="false">Enviar a mensagem</button>';
        echo '</div>';
        echo '<input type="hidden" name="name" value="' . $name . '">';
        echo '<input type="hidden" name="email" value="' . $email . '">';
        echo '</form>';

        //enviarEmail($email, $name);
        /* echo "<script>alert('O artigo não foi aprovado!');"
          . "window.location=\"user.php\";</script>"; */
    }
}
?>
</div>

<?php

function enviarEmail($email, $name) {
    $to = $email;
    $firstname = 'HG _Study';
    
    $sender = 'augusto.pereira@protonmail.com';
    $subject = 'Artigo Aprovado';
    $text = "\nSeu artigo no site HG Study foi aprovado com sucesso!\nMuito obrigado por ter no escolhido.";
    //$phone = $_POST["phone"];


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= "From: $firstname<" . $sender . ">\r\n"; // Sender's E-mail


    $message = '<table style="width:100%">
        <tr>
            <td>' . $firstname . '</td>
        </tr>
        <tr><td>Email: ' . $sender . '</td></tr>
        
        <tr><td>Text: ' . $name . '. ' . $text . '</td></tr>
        
    </table>';

    if (mail($to, $subject, $message, $headers)) {
        echo 'A menssagem foi enviada com sucesso.';
    } else {
        echo 'falhou';
    }
}
