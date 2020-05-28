<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Editar Informações";
require_once './script/header.php';

require_once './script/appvars.php';
require_once './script/connectvars.php';

// Insere o banner da página
$title = "Editar Informações";
$title2 = "Editar";
$link = "editar";
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
    if (!empty($_POST['password']) && !empty($_POST['new_password'])) {
        // Validar a senha do usuário
        $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        if ($_SESSION['usuario'] == 'estudante') {
            $query = "SELECT senha FROM estudante WHERE id_estudante = '" . $_SESSION['user_id'] . "' "
                    . "AND senha = SHA('$user_password')";
        }
        if ($_SESSION['usuario'] == 'orientador') {
            $query = "SELECT senha FROM orientador WHERE id_orientador = '" . $_SESSION['user_id'] . "' "
                    . "AND senha = SHA('$user_password')";
        }
        $result = mysqli_query($dbc, $query)
                or die('Falha ao buscar usuário no banco de dados');

        if (mysqli_num_rows($result) == 1) {
            $password = mysqli_real_escape_string($dbc, trim($_POST['new_password']));
            if ($_SESSION['usuario'] == 'estudante') {
                $query = "UPDATE estudante SET senha = SHA('$password') "
                        . "WHERE id_estudante = '" . $_SESSION['user_id'] . "'";
            }
            if ($_SESSION['usuario'] == 'orientador') {
                $query = "UPDATE orientador SET senha = SHA('$password') "
                        . "WHERE id_orientador = '" . $_SESSION['user_id'] . "'";
            }
            mysqli_query($dbc, $query)
                    or die('Erro ao atualizar dados no banco de dados');
        } else {
            echo "<script>alert('Senha inválida!');"
            . "window.location=\"editar.php\";</script>";
        }
    }

    // Obtém os dados do perfil do POST
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    $city = mysqli_real_escape_string($dbc, trim($_POST['region']));
    $phrase = mysqli_real_escape_string($dbc, trim($_POST['phrase']));
    if ($_SESSION['usuario'] == 'orientador') {
        $profissao = mysqli_real_escape_string($dbc, trim($_POST['profissao']));
        $work_now = mysqli_real_escape_string($dbc, trim($_POST['work_now']));
        $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
        $linkedln = mysqli_real_escape_string($dbc, trim($_POST['linkedln']));
        $twitter = mysqli_real_escape_string($dbc, trim($_POST['twitter']));
        $youtube = mysqli_real_escape_string($dbc, trim($_POST['youtube']));
        $github = mysqli_real_escape_string($dbc, trim($_POST['github']));
    }
    $old_picture = mysqli_real_escape_string($dbc, trim($_POST['old_picture']));
    if (!empty($_FILES['new_picture']['name'])) {
        $new_picture = mysqli_real_escape_string($dbc, trim($_FILES['new_picture']['name']));
        $new_picture_type = $_FILES['new_picture']['type'];
        $new_picture_size = $_FILES['new_picture']['size'];
        list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']);
    }

    $error = false;

    //Validar e mover o arquivo de foto do upload, se necessário
    if (!empty($new_picture)) {
        if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') ||
                ($new_picture_type == 'image/pjpeg') || ($new_picture_type == 'image/png')) &&
                ($new_picture_size > 0) && ($new_picture_size <= MM_MAXFILESIZE) &&
                ($new_picture_width <= MM_MAXIMGWIDTH) && ($new_picture_height <= MM_MAXIMGHEIGHT)) {
            if ($_FILES['new_picture']['error'] == 0) {
                // Mover o arquivo para a pasta de destino no servidor
                $target = MM_UPLOADPATH . basename($new_picture);
                if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $target)) {
                    // O novo arquivo de foto foi movido com sucesso, agora certifique-se de que 
                    // qualquer foto antiga seja deletada
                    if (!empty($old_picture) && ($old_picture != $new_picture)) {
                        @unlink(MM_UPLOADPATH . $old_picture);
                    }
                } else {
                    // O novo arquivo de foto falhou ao ser movido, então delete o arquivo temporário 
                    // e defina o flag de error
                    @unlink($_FILES['new_picture']['tmp_name']);
                    $error = true;

                    // Mensagem de erro
                    echo "<script>alert('Desculpe, ocorreu um problema no upload de sua foto.');"
                    . "window.location=\"editar.php\";</script>";
                }
            }
        } else {
            // O novo arquivo de foto não é válido, então delete o arquivo temporário e 
            //defina o flag error
            @unlink($_FILES['new_picture']['tmp_name']);
            $error = true;
            echo "<script>alert('Sua foto deve ser um arquivo de imagem GIF, JPEG, ou PNG " .
            "não maior que " . (MM_MAXFILESIZE / 1024) . " KB e " . MM_MAXIMGWIDTH . "x"
            . MM_MAXIMGHEIGHT . " pixels no tamanho.');</script>";
        }
    }

    // Atualizar os dados do perfil no banco de dados
    if (!$error) {
        if (!empty($first_name) && !empty($last_name) && !empty($city)) {
            // Somente definir a coluna foto se existir uma nova foto
            if (!empty($new_picture)) {
                if ($_SESSION['usuario'] == 'estudante') {
                    $query = "UPDATE estudante SET nome = '$first_name', "
                            . "sobrenome = '$last_name', cidade = '$city', frase = '$phrase', "
                            . "foto = '$new_picture' "
                            . "WHERE id_estudante = '" . $_SESSION['user_id'] . "'";
                }
                if ($_SESSION['usuario'] == 'orientador') {
                    $query = "UPDATE orientador SET nome = '$first_name', sobrenome = '$last_name', "
                            . "cidade = '$city', frase = '$phrase', profissao_ori = '$profissao', "
                            . "trabalho_atual = '$work_now', descricao = '$description', "
                            . "linkedln = '$linkedln', youtube = '$youtube', "
                            . "twitter = '$twitter', github = '$github', "
                            . "foto = '$new_picture' "
                            . "WHERE id_orientador = '" . $_SESSION['user_id'] . "'";
                }
            } else {
                if ($_SESSION['usuario'] == 'estudante') {
                    $query = "UPDATE estudante SET nome = '$first_name', "
                            . "sobrenome = '$last_name', cidade = '$city', frase = '$phrase' "
                            . "WHERE id_estudante = '" . $_SESSION['user_id'] . "'";
                }
                if ($_SESSION['usuario'] == 'orientador') {
                    $query = "UPDATE orientador SET nome = '$first_name', sobrenome = '$last_name', "
                            . "cidade = '$city', frase = '$phrase', profissao_ori = '$profissao', "
                            . "trabalho_atual = '$work_now', descricao = '$description', "
                            . "linkedln = '$linkedln', youtube = '$youtube', "
                            . "twitter = '$twitter', github = '$github' "
                            . "WHERE id_orientador = '" . $_SESSION['user_id'] . "'";
                }
            }
            mysqli_query($dbc, $query)
                    or die('Erro ao atualizar dados no banco de dados');

            // Confirmar successo com o usuário
            echo "<script>alert('Seu perfil foi atualizado com sucesso!');"
            . "window.location=\"infoconta.php\";</script>";

            mysqli_close($dbc);
            exit();
        } else {
            echo "<script>alert('Você deve inserir todos os dados do perfil " .
            "(a foto é opcional).');</scrip>";
        }
    }
} else {
    if ($_SESSION['usuario'] == 'estudante') {
        // Obtém os dados do perfil do banco de dados
        $query = "SELECT nome, sobrenome, cidade, frase, foto FROM estudante "
                . "WHERE id_estudante = '" . $_SESSION['user_id'] . "'";
        $result = mysqli_query($dbc, $query)
                or die('Não foi possível recuperar dados do banco de dados');
        $row = mysqli_fetch_array($result);
        if ($row != NULL) {
            $first_name = $row['nome'];
            $last_name = $row['sobrenome'];
            $city = $row['cidade'];
            $phrase = $row['frase'];
            $old_picture = $row['foto'];
        } else {
            // Mensagem de erro
            echo "<script>alert('Ocorreu um problema acessando o seu peril!');"
            . "window.location=\"editar.php\";</script>";
        }
    }
    if ($_SESSION['usuario'] == 'orientador') {
        // Obtém os dados do perfil do banco de dados
        $query = "SELECT nome, sobrenome, cidade, profissao_ori, descricao, frase, trabalho_atual, "
                . "linkedln, twitter, youtube, github, "
                . "foto FROM orientador "
                . "WHERE id_orientador = '" . $_SESSION['user_id'] . "'";
        $result = mysqli_query($dbc, $query)
                or die('Não foi possível recuperar dados do banco de dados');
        $row = mysqli_fetch_array($result);
        if ($row != NULL) {
            $first_name = $row['nome'];
            $last_name = $row['sobrenome'];
            $city = $row['cidade'];
            $profissao = $row['profissao_ori'];
            $phrase = $row['frase'];
            $work_now = $row['trabalho_atual'];
            $description = $row['descricao'];
            $linkedln = $row['linkedln'];
            $twitter = $row['twitter'];
            $youtube = $row['youtube'];
            $github = $row['github'];
            $old_picture = $row['foto'];
        } else {
            // Mensagem de erro
            echo "<script>alert('Ocorreu um problema acessando o seu perfil!');"
            . "window.location=\"editar.php\";</script>";
        }
    }
}

mysqli_close($dbc);
?>
<!-- Start contact-page Area -->
<div class="container">
    <div class="section-top-border">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
                    <div class="mt-10">
                        <h4>Nome:</h4>
                        <input type="text" name="first_name" <?php echo!empty($first_name) ? 'value="' . $first_name . '" ' : ''; ?>
                               onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Insira seu nome'" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <h4>Sobrenome:</h4>
                        <input type="text" name="last_name" <?php echo!empty($last_name) ? 'value="' . $last_name . '" ' : ''; ?>
                               onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Insira seu sobrenome'" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <h4>Senha Antiga:</h4>
                        <input type="password" name="password" placeholder="Senha" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Senha'" class="single-input-primary">                        
                    </div>
                    <div class="mt-10">
                        <h4>Nova Senha:</h4>
                        <input type="password" name="new_password" placeholder="Nova Senha" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Nova Senha'" class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <h4>Frase:</h4>
                        <input type="text" name="phrase" <?php echo!empty($phrase) ? 'value="' . $phrase . '" ' : ''; ?>
                               placeholder = 'Insira um texto breve sobre você' 
                               onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Insira um texto breve sobre você'" 
                               class="single-input-primary">
                    </div>
                    <h4 class="mt-10">Cidade:</h4>
                    <div class="input-group-icon">
                        <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select"">
                            <select name="region">
                                <?php
                                $selected1 = "";
                                $selected2 = "";
                                $selected3 = "";
                                $selected4 = "";
                                $selected5 = "";
                                $selected6 = "";
                                if (!empty($city)) {
                                    if ($city == 'Guaratinguetá') {
                                        $selected1 = 'selected="selected"';
                                    }
                                    if ($city == 'Aparecida') {
                                        $selected2 = 'selected="selected"';
                                    }
                                    if ($city == 'Taubaté') {
                                        $selected3 = 'selected="selected"';
                                    }
                                    if ($city == 'Lorena') {
                                        $selected4 = 'selected="selected"';
                                    }
                                    if ($city == 'São José dos Campos') {
                                        $selected5 = 'selected="selected"';
                                    }
                                    if ($city == 'São Paulo') {
                                        $selected6 = 'selected="selected"';
                                    }
                                }
                                echo '<option value="Guaratinguetá" ' . $selected1 . '>Guaratinguetá</option>';
                                echo '<option value="Aparecida" ' . $selected2 . '>Aparecida</option>';
                                echo '<option value="Taubaté" ' . $selected3 . '>Taubaté</option>';
                                echo '<option value="Lorena" ' . $selected4 . '>Lorena</option>';
                                echo '<option value="São José dos Campos" ' . $selected5 . '>São José dos Campos</option>';
                                echo '<option value="São Paulo" ' . $selected6 . '>São Paulo</option>';
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                    if ($_SESSION['usuario'] == 'orientador') {
                        ?>
                        <div class="mt-10">
                            <h4>Profissão:</h4>
                            <input type="text" name="profissao" <?php echo!empty($profissao) ? 'value="' . $profissao . '" ' : ''; ?>
                                   placeholder = 'Insira sua profissão' onFocus="this.placeholder = 'Insira sua profissão'" onBlur="this.placeholder = 'Insira sua profissão'" class="single-input-primary">
                        </div>
                        <div class="mt-10">
                            <h4>Trabalho Atual:</h4>
                            <input type="text" name="work_now" <?php echo!empty($work_now) ? 'value="' . $work_now . '" ' : ''; ?>
                                   placeholder = 'Trabalho Atual' onFocus="this.placeholder = ''" 
                                   onBlur="this.placeholder = 'Trabalho Atual'" class="single-input-primary">
                        </div>
                        <div class="mt-10">
                            <h4>Descrição:</h4>
                            <textarea type="text" name="description" onFocus="this.placeholder = 'Insira sua descrição'" 
                                      placeholder = 'Insira sua descrição' id="descricao"
                                      class="single-input-primary"><?php echo $description; ?></textarea>
                        </div>
                        <div class="mt-10">
                            <h4>Linkedln:</h4>
                            <input type="url" name="linkedln" <?php echo!empty($linkedln) ? 'value="' . $linkedln . '" ' : ''; ?>
                                   placeholder = 'Linkedln' onFocus="this.placeholder = ''" 
                                   onBlur="this.placeholder = 'Linkedln'" class="single-input-primary">
                        </div>
                        <div class="mt-10">
                            <h4>Twitter:</h4>
                            <input type="url" name="twitter" <?php echo!empty($twitter) ? 'value="' . $twitter . '" ' : ''; ?>
                                   placeholder = 'Twitter' onFocus="this.placeholder = ''" 
                                   onBlur="this.placeholder = 'Twitter'" class="single-input-primary">
                        </div>
                        <div class="mt-10">
                            <h4>Youtube:</h4>
                            <input type="url" name="youtube" <?php echo!empty($youtube) ? 'value="' . $youtube . '" ' : ''; ?>
                                   placeholder = 'Youtube' onFocus="this.placeholder = ''" 
                                   onBlur="this.placeholder = 'Youtube'" class="single-input-primary">
                        </div>
                        <div class="mt-10">
                            <h4>GitHub:</h4>
                            <input type="url" name="github" <?php echo!empty($github) ? 'value="' . $github . '" ' : ''; ?>
                                   placeholder = 'GitHub' onFocus="this.placeholder = ''" 
                                   onBlur="this.placeholder = 'GitHub'" class="single-input-primary">
                        </div>
                        <?php
                    }
                    ?>
                    <div class="thumb mt-10">
                        <h4>Escolher Foto:</h4>
                        <input type="hidden" name="old_picture" 
                               value="<?php echo!empty($old_picture) ? $old_picture : ''; ?>">
                        <input type="file" id="imgChooser" name="new_picture" class="single-input-primary btn-block mb-3">
                        <label><strong>A foto é de inteira responsabilidade do usuário!</strong></label>
                        <figure class="position-absolute container col-md-2">
                            <img class="img-fluid ml-5" id="preview" src="<?php echo!empty($old_picture) ? MM_UPLOADPATH . $row['foto'] : MM_UPLOADPATH . 'post.png'; ?>" 
                                 alt="Foto de Perfil">
                        </figure>
                    </div>
                    <center class="mt-100">                        
                        <input type="submit" name="submit" class="genric-btn primary circle arrow" value="Confirmar    ->">
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End contact-page Area -->

<script src="js/readImage.js" type="text/javascript"></script>

<?php
// Insere o rodapé da página
require_once './script/footer2.php';
