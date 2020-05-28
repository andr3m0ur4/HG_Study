<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Publicação Particular";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Insere o banner da página
$title = "Publicação";
$title2 = "Publicação";
$link1 = "blog-home";
$link2 = "blog-add";
if (isset($_GET['article_id'])) {
    $title3 = "Editar Publicação";
} else {
    $title3 = "Adicionar Publicação";
}
require_once './script/banner3.php';

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
    $old_picture = mysqli_real_escape_string($dbc, trim($_POST['old_picture']));
    if (!empty($_FILES['new_picture']['name'])) {
        $new_picture = mysqli_real_escape_string($dbc, trim($_FILES['new_picture']['name']));
        $new_picture_type = $_FILES['new_picture']['type'];
        $new_picture_size = $_FILES['new_picture']['size'];
        list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']);
    }
    $title_article = mysqli_real_escape_string($dbc, trim($_POST['title']));
    $content1 = mysqli_real_escape_string($dbc, trim($_POST['content1']));
    $citacao = mysqli_real_escape_string($dbc, trim($_POST['citacao']));
    $content2 = mysqli_real_escape_string($dbc, trim($_POST['content2']));

    //Validar e mover o arquivo de foto do upload, se necessário
    if (!empty($new_picture)) {
        if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') ||
                ($new_picture_type == 'image/pjpeg') || ($new_picture_type == 'image/png')) &&
                ($new_picture_size > 0) && ($new_picture_size <= MM_MAXFILESIZE) &&
                ($new_picture_width <= MM_MAXIMGWIDTH2) && ($new_picture_height <= MM_MAXIMGHEIGHT2)) {
            if ($_FILES['new_picture']['error'] == 0) {
                // Mover o arquivo para a pasta de destino no servidor
                $target = MM_UPLOADPATH2 . basename($new_picture);
                if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $target)) {
                    // O novo arquivo de foto foi movido com sucesso, agora certifique-se de que 
                    // qualquer foto antiga seja deletada
                    if (!empty($old_picture) && ($old_picture != $new_picture)) {
                        @unlink(MM_UPLOADPATH2 . $old_picture);
                    }
                } else {
                    // O novo arquivo de foto falhou ao ser movido, então delete o arquivo temporário 
                    // e defina o flag de error
                    @unlink($_FILES['new_picture']['tmp_name']);
                    $error = true;

                    // Mensagem de erro
                    echo "<script>alert('Desculpe, ocorreu um problema no upload de sua foto.');"
                    . "window.location=\"blog-add.php\";</script>";
                }
            }
        } else {
            // O novo arquivo de foto não é válido, então delete o arquivo temporário e 
            //defina o flag error
            @unlink($_FILES['new_picture']['tmp_name']);
            $error = true;
            // Mensagem de erro
            $msg = 'Sua foto deve ser um arquivo de imagem GIF, JPEG, ou PNG '
                    . 'não maior que ' . (MM_MAXFILESIZE / 1024) . ' KB e ' . MM_MAXIMGWIDTH2 . 'x'
                    . MM_MAXIMGHEIGHT2 . ' pixels no tamanho.';
            echo "<script>alert('" . $msg . "');"
            . "window.location=\"blog-add.php\";</script>";
            exit();
        }
    }

    if (isset($_POST['article_id'])) {
        // Atualizar o artigo no banco de dados
        if (!empty($new_picture)) {
            $query = "UPDATE artigo SET screenshot = '$new_picture', title = '$title_article', "
                    . "content1 = '$content1', citacao = '$citacao', content2 = '$content2' "
                    . "WHERE id_artigo = " . $_POST['article_id'] . "";
        } else {
            $query = "UPDATE artigo SET title = '$title_article', "
                    . "content1 = '$content1', citacao = '$citacao', content2 = '$content2' "
                    . "WHERE id_artigo = " . $_POST['article_id'] . "";
        }
        mysqli_query($dbc, $query)
                or die('Erro ao atualizar os dados do artigo no banco de dados');

        // Confirmar successo com o usuário
        echo "<script>alert('Sua publicação foi atualizada com sucesso!');"
        . "window.location=\"blog-single.php?article_id=" . $_POST['article_id'] . "\";</script>";
    } else {
        // Inserir um novo artigo
        if (!empty($new_picture)) {
            $query = "INSERT INTO artigo (screenshot, date, title, content1, citacao, content2, id_orientador) "
                    . "VALUES ('$new_picture', NOW(), '$title_article', '$content1', '$citacao', '$content2', '" . $_SESSION['user_id'] . "')";
        } else {
            $query = "INSERT INTO artigo (date, title, content1, citacao, content2, id_orientador) "
                    . "VALUES (NOW(), '$title_article', '$content1', '$citacao', '$content2', '" . $_SESSION['user_id'] . "')";
        }
        mysqli_query($dbc, $query)
                or die('Erro ao inserir os dados no banco de dados');

        // Confirmar successo com o usuário
        echo "<script>alert('Sua publicação foi publicada com sucesso!');"
        . "window.location=\"blog-single.php\";</script>";
    }

    mysqli_close($dbc);
} else if (isset($_GET['article_id'])) {
    // Receber os dados do artigo específico do banco de dados
    $query = "SELECT id_artigo, screenshot, title, content1, citacao, content2 "
            . "FROM artigo WHERE id_artigo = " . $_GET['article_id'] . "";
    $result = mysqli_query($dbc, $query)
            or die('Não foi possível realizar a consulta no banco de dados');
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $article_id = $row['id_artigo'];
        $old_picture = $row['screenshot'];
        $title_article = $row['title'];
        $content1 = $row['content1'];
        $citacao = $row['citacao'];
        $content2 = $row['content2'];
    } else {
        // Mensagem de erro
        echo "<script>alert('Não encontrou nenhuma publicação correpondente.');"
        . "window.location=\"blog-home.php\";</script>";
    }
} else {
    $title_article = "";
    $content1 = "";
    $citacao = "";
    $content2 = "";
}

mysqli_close($dbc);
?>

<!-- Start blog-posts Area -->
<section class="commentform-area pt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 post-list blog-post-list">
                <div class="single-post">
                    <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />

                        <?php
                        if (isset($_GET['article_id'])) {
                            echo '<input type="hidden" name="article_id" value="' . $article_id . '">';
                        }
                        ?>

                        <div class="thumb mt-10">
                            <h3 class="pb-50">Adicione uma imagem para a publicação</h3>
                            <input type="hidden" name="old_picture" 
                                   value="<?php echo!empty($old_picture) ? $old_picture : ''; ?>">
                            <input type="file" id="imgChooser" name="new_picture" class="single-input-primary btn-block mb-3">
                            <figure class="text-left container">                                
                                <img class="img-fluid" id="preview" src="<?php echo!empty($old_picture) ? MM_UPLOADPATH2 . $old_picture : MM_UPLOADPATH2 . 'Article.png'; ?>" 
                                     alt="Foto do Artigo">
                            </figure>
                        </div>                        

                        &nbsp;
                        <h3>Adicione o Título:</h3>
                            <div class="mt-10">
                                <input type="text" name="title" 
                                       value="<?php echo!empty($title_article) ? $title_article : ''; ?>" 
                                       placeholder="Meu Título" onfocus="this.placeholder = 'Meu Título'" 
                                       onblur="this.placeholder = 'Meu Título'" required 
                                       class="common-input mb-20 form-control">
                            </div>
                                             
                        <div class="content-wrap">
                         <h3>Adicione o Conteúdo:</h3>
                            <div class="mt-10">
                                <textarea class="form-control mb-10" name="content1" 
                                          placeholder="Meu Conteúdo" 
                                          onfocus="this.placeholder = 'Meu Conteúdo'" 
                                          onblur="this.placeholder = 'Meu Conteúdo'" 
                                          required><?php echo!empty($content1) ? $content1 : ''; ?></textarea>
                            </div>                            
							<h3>Adicione uma Citação(Opcional):</h3>
                            <blockquote class="generic-blockquote mt-10">
                                <textarea class="form-control" name="citacao" 
                                          placeholder="Citação" 
                                          onfocus="this.placeholder = 'Citação'" 
                                          onblur="this.placeholder = 'Citação'"><?php echo!empty($citacao) ? $citacao : ''; ?></textarea>
                            </blockquote>
 							<h3>Adicione mais Conteúdo(Opcional):</h3>
                            <div class="mt-10">
                           
                                <textarea class="form-control" name="content2" 
                                          placeholder="Meu Conteúdo" 
                                          onfocus="this.placeholder = 'Meu Conteúdo'" 
                                          onblur="this.placeholder = 'Meu Conteúdo'"><?php echo!empty($content2) ? $content2 : ''; ?></textarea>
                            </div>

                            <input type="submit" class="primary-btn mt-20" name="submit" 
                                   value="<?php echo isset($_GET['article_id']) ? 'Salvar' : 'Publicar'; ?>">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="js/readImage.js" type="text/javascript"></script>

<?php
// Insere o rodapé da página
require_once './script/footer2.php';
