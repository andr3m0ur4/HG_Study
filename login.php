<?php
require_once './script/connectvars.php';

// Iniciar a sessÃ£o
session_start();

// Insere o cabeÃ§alho da pÃ¡gina
$page_title = "Login";
require_once './script/header.php';

// Limpa a mensagem de erro
$error_msg = "";

// Se o usuÃ¡rio nÃ£o estiver logado, tenta fazer login
if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
        // Conecta-se ao banco de dados
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Não foi possível se conectar ao banco de dados.');
        mysqli_set_charset($dbc, 'utf8');

        // ObtÃ©m os dados de login digitados pelo usuÃ¡rio
        $user_email = mysqli_real_escape_string($dbc, trim($_POST['email']));
        $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        $selecao = mysqli_real_escape_string($dbc, trim($_POST['selecao']));

        if (!empty($user_email) && !empty($user_password)) {
            // Verifica se Ã© estudante ou orientador
            if ($selecao == 1) {
                $usuario = "estudante";
                $id_usuario = "id_estudante";
            } else if ($selecao == 2) {
                $usuario = "orientador";
                $id_usuario = "id_orientador";
            }

            // Procura o email e a senha no banco de dados
            $query = "SELECT $id_usuario, email, nome, active FROM $usuario WHERE email = '$user_email' AND "
                    . "senha = SHA('$user_password')";
            $result = mysqli_query($dbc, $query)
                    or die('Falha ao buscar usuÃ¡rio no banco de dados');

            if (mysqli_num_rows($result) == 1) {
                // Caso a conta do usuario estava desativada pedir permissao para ativa-la
                $row = mysqli_fetch_array($result);
                if ($row['active'] == 0) {
                    ?>
                    <script language="javascript" type="text/javascript">
                        function myFunction() {
                            if (confirm("A sua conta está desativada!\nPara acessar seu perfil você precisa ativá-la.\nDeseja ativar sua conta agora?")) {
                                alert('A sua conta foi ativada com sucesso!');
                                window.location.href = "script/active.php?user_id=<?php echo $row["$id_usuario"] . '&user=' . $usuario; ?>";
                            } else {
                                alert('A sua conta permanece desativada!');
                                window.location.href = "login.php";
                            }
                        }
                        myFunction();
                    </script>
                    <?php
                } else {
                    // O login foi bem sucedido, portanto, defina a variÃ¡vel de sessÃ£o ID e nome do usuÃ¡rio,
                    // e depois redirecionar para a home page
                    $_SESSION['user_id'] = $row[$id_usuario];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['nome'];
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['id_usuario'] = $id_usuario;
                    setcookie('user_id', $row[$id_usuario], time() + (60 * 60 * 24 * 30));    // Expira em 30 dias
                    setcookie('email', $row['email'], time() + (60 * 60 * 24 * 30));
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .
                            '/index.php';
                    header('Location: ' . $home_url);
                }
            } else {
                // O nome/senha estÃ£o incorretos, portanto, definir uma mensagem de erro
                $error_msg = 'Desculpe, você deve digitar um nome e senha válidos para fazer login.';
            }
        } else {
            // O nome/senha nÃ£o foram digitados, portanto definir uma mensagem de erro
            $error_msg = 'Desculpe, você deve digitar seu nome e senha para fazer login.';
        }
    }
}

// Insere o banner da página
$title = "Login";
$title2 = "Login";
$link = "login";
require_once './script/banner2.php';

// Se a variável de sessão estiver vazia, exibir mensagem de erro (se houver) e o formulÃ¡rio de login;
// caso contrÃ¡rio confirmar login
if (empty($_SESSION['user_id'])) {
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
                            <h4>Senha:</h4>
                            <input type="password" name="password" placeholder="Senha" 
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'" 
                                   required class="single-input-primary">
                        </div>
                        <a href="forget.php">Esqueci minha senha</a>
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
                                <input type="submit" class="genric-btn primary circle arrow" 
                                       value="ENTRAR     ->" name="submit">
                            </p>
                        </div>                      
                    </form>

                </div>
            </div>                        
        </div>
    </div>

    <?php
} else {
    // Confirma o login bem sucedido.
    $msg = 'Você esta logado como ' . $_SESSION['email'];
    echo "<script>alert('" . $msg . "');window.location=\"index.php\";</script>";
}
?>

<?php
// Insere o rodapÃ© da pÃ¡gina
require_once './script/footer2.php';
?>