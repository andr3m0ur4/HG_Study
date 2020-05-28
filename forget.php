<?php
require_once './script/connectvars.php';

// Iniciar a sessão
session_start();

// Limpa a mensagem de erro
$error_msg = "";
$validation = false;

// Se o usuário não estiver logado, tenta recuperar sua conta
if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
        // Conecta-se ao banco de dados
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Não foi possível se conectar ao banco de dados.');
        mysqli_set_charset($dbc, 'utf8');

        // Redefinir a senha do usuario
        if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
            $password = mysqli_real_escape_string($dbc, trim($_POST['new_password']));
            $selecao = mysqli_real_escape_string($dbc, trim($_POST['selecao']));
            $id = mysqli_real_escape_string($dbc, trim($_POST['id_usuario']));

            // Verifica se é estudante ou orientador
            if ($selecao == 1) {
                $usuario = "estudante";
                $id_usuario = "id_estudante";
            } else if ($selecao == 2) {
                $usuario = "orientador";
                $id_usuario = "id_orientador";
            }

            $query = "UPDATE $usuario SET senha = SHA('$password') WHERE $id_usuario = $id";
            mysqli_query($dbc, $query)
                    or die('Não foi possível atualizar a senha no banco de dados');

            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .
                    '/login.php';
            header('Location: ' . $home_url);
        }

        // Obtém os dados de login digitados pelo usuário
        $user_email = mysqli_real_escape_string($dbc, trim($_POST['email']));
        $question = mysqli_real_escape_string($dbc, trim($_POST['question']));
        $selecao = mysqli_real_escape_string($dbc, trim($_POST['selecao']));

        if (!empty($user_email) && !empty($question)) {
            // Verifica se é estudante ou orientador
            if ($selecao == 1) {
                $usuario = "estudante";
                $id_usuario = "id_estudante";
            } else if ($selecao == 2) {
                $usuario = "orientador";
                $id_usuario = "id_orientador";
            }

            // Procura o email e a senha no banco de dados
            $query = "SELECT $id_usuario, email, question FROM $usuario "
                    . "WHERE email = '$user_email' AND question = '$question'";
            $result = mysqli_query($dbc, $query)
                    or die('Falha ao buscar usuário no banco de dados');

            if (mysqli_num_rows($result) == 1) {
                // O usuário foi encontrado, portanto, permitir que o mesmo possa redefinir sua senha
                $row = mysqli_fetch_array($result);
                $id = $row["$id_usuario"];
                $validation = true;
            } else {
                // O email/resposta estão incorretos, portanto, definir uma mensagem de erro
                $error_msg = 'Desculpe, você deve digitar um email e resposta válidos para redefinir senha.';
            }
        } else {
            // O email/resposta não foram digitados, portanto definir uma mensagem de erro
            $error_msg = 'Desculpe, você deve digitar seu email e resposta para fazer redefinir a senha.';
        }
    }
}

// Insere o cabeçalho da página
$page_title = "Login";
require_once './script/header.php';

// Insere o banner da página
$title = "Login";
$title2 = "Esqueci minha Senha";
$link = "login";
require_once './script/banner2.php';

// Se a variável de sessão estiver vazia, exibir mensagem de erro (se houver) e o formulário de login;
// caso contrário confirmar login
if (empty($_SESSION['user_id'])) {
    if ($validation == true) {
        ?>
        <!-- Start contact-page Area -->    
        <div class="section-top-border ">
            <div class=" container col-8">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="mt-10">
                                <h4>Nova Senha:</h4>
                                <input type="password" name="new_password" placeholder="Insira a senha" 
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira a Senha'" 
                                       required class="single-input-primary">
                            </div>
                            <input type="hidden" name="selecao" value="<?php echo $selecao; ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">
                            <div class="container col-3">
                                <p class="mt-50">                                    
                                    <button type="submit" class="genric-btn primary circle arrow" 
                                            name="submit">Salvar<span class="lnr lnr-arrow-right"></span></button>
                                </p>
                            </div>                      
                        </form>
                    </div>
                </div>                        
            </div>
        </div>
        <?php
    } else {
        if (!empty($error_msg)) {
            echo "<script>alert('" . $error_msg . "');</script>";
        }
        ?>

        <!-- Start contact-page Area -->    
        <div class="section-top-border ">
            <div class=" container col-8">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="mt-10">
                                <h4>Email:</h4>
                                <input type="email" name="email" placeholder="Email" 
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" 
                                       required class="single-input-primary">
                            </div>
                            <div class="mt-10">
                                <h4>Informe sua reposta para a seguinte pergunta:</h4>
                                <input type="text" name="question" placeholder="Qual o nome do seu primero amigo de infância?" 
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Qual o nome do seu primero amigo de infância?'" 
                                       required class="single-input-primary">
                            </div>

                            <div class="single-element-widget mt-5 ">
                                <h3 class="mb-30"> Você é :</h3>
                                <div class="default-select" id="default-select">
                                    <select name="selecao">
                                        <option value="1">Aluno</option>
                                        <option value="2">Orientador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="container col-3">
                                <p class="mt-50">                                    
                                    <button type="submit" class="genric-btn primary circle arrow" 
                                            name="submit">VALIDAR<span class="lnr lnr-arrow-right"></span></button>
                                </p>
                            </div>                      
                        </form>

                    </div>
                </div>                        
            </div>
        </div>

        <?php
    }
} else {
    // Confirma o login bem sucedido.
    $msg = 'Você está logado como ' . $_SESSION['email'];
    echo "<script>alert('" . $msg . "');window.location=\"index.php\";</script>";
}
?>

<?php
// Insere o rodapé da página
require_once './script/footer2.php';
