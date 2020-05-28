<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Editar Biografia";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Insere o banner da página
$title = "Editar Biografia";
$title2 = "Editar";
$link = "editar-biografia";
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

if (isset($_POST['submit'])) {
    // Insere os dados no banco de dados
    $setor = mysqli_real_escape_string($dbc, trim($_POST['setor']));
    foreach ($_POST as $id_biografia => $topic){
        $query = "UPDATE biografia SET $setor = '$topic' WHERE id_biografia = '$id_biografia'";
        mysqli_query($dbc, $query)
                or die('Não foi possível atualizar o banco de dados.');
    }
    if (!empty($_POST['new_topic'])){
        $new_topic = mysqli_real_escape_string($dbc, trim($_POST['new_topic']));
        $query = "INSERT INTO biografia ($setor, id_orientador) "
                . "VALUES ('$new_topic', '" . $_SESSION['user_id'] . "')";
        mysqli_query($dbc, $query)
                or die('Não foi possível adicionar novo tópico');
    }
    echo "<script>alert('Os tópicos foram atualizados com sucesso!');"
    . "window.location=\"infoconta.php\";</script>";
} else {
    // Obtém os tópicos do banco de dados
    if (isset($_GET['setor'])) {
        $setor = mysqli_real_escape_string($dbc, trim($_GET['setor']));
        $query = "SELECT id_biografia, $setor FROM biografia "
                . "WHERE id_orientador = '" . $_SESSION['user_id'] . "'";
        $result = mysqli_query($dbc, $query)
                or die('Não foi possível realizar a consulta no banco de dados');
        $topics = array();
        while ($row = mysqli_fetch_array($result)) {
            array_push($topics, $row);
        }
    }else{
        echo "<script>window.location=\"infoconta.php\";</script>";
    }
}

mysqli_close($dbc);
?>
<!-- Start contact-page Area -->
<center class="container">
    <div class="section-top-border">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <?php
                    foreach ($topics as $topic) {
                        if (!empty($topic["$setor"])) {
                            ?>
                            <div class="mt-10">
                                <textarea name="<?php echo $topic['id_biografia']; ?>" 
                                          class="single-textarea" placeholder="Message" 
                                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" 
                                          ><?php echo $topic["$setor"]; ?></textarea>
                            </div>
                            <?php
                        }
                    }
                    ?>
 					<div class=" container col-8">                    
 					<h4 class="text-left mt-5">Adicionar novo tópico</h4>
                    <div class="mt-10">
                        <textarea name="new_topic" class="single-input-primary" placeholder="Adicionar conteúdo" 
                                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adicionar conteúdo'"></textarea>
                    </div>
                    <input type="hidden" name="setor" value="<?php echo $setor; ?>">
                    <center class="mt-10">                        
                        <input type="submit" class="genric-btn primary circle arrow" name="submit" value="Salvar">
                    </center>
                </form>
            </div>
        </div>
    </div>
</center>




<?php
// Insere o rodapé da página
require_once './script/footer2.php';
