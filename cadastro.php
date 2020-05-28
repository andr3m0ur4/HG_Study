<?php
// Insere o cabeçalho da página
$page_title = "Cadastro";
require_once './script/header.php';

// Insere o banner da página
$title = "Cadastro";
$title2 = "Cadastre-se";
$link = "cadastro";
require_once './script/banner2.php';

//require_once './appvars.php';
require_once './script/connectvars.php';

// Conecta-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar com o banco de dados');
mysqli_set_charset($dbc, 'utf8');

if (isset($_POST['submit'])) {
    // Obtém os dados de perfil a partir de POST
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    $question = mysqli_real_escape_string($dbc, trim($_POST['question']));
    $cidade = mysqli_real_escape_string($dbc, trim($_POST['cidade']));
    $selecao = mysqli_real_escape_string($dbc, trim($_POST['selecao']));

    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password1) &&
            !empty($password2) && ($password1 == $password2)) {

        // Verifica se é estudante ou orientador
        if ($selecao == 1) {
            $usuario = "estudante";
        } else if ($selecao == 2) {
            $usuario = "orientador";
        }

        // Certifica-se de que ninguém já tenha se registrado com o mesmo email
        $query = "SELECT * FROM $usuario WHERE email = '$email'";
        $result = mysqli_query($dbc, $query)
                or die('Ocorreu um erro ao consultar a tabela do banco de dados');
        if (mysqli_num_rows($result) == 0) {
            // O email é único, inserir os dados no banco
            $query = "INSERT INTO $usuario (nome, sobrenome, email, senha, question, cidade) "
                    . "VALUES ('$first_name', '$last_name', '$email', SHA('$password1'), '$question', '$cidade')";
            mysqli_query($dbc, $query)
                    or die('Não foi possível inserir os dados no banco de dados');


            mysqli_close($dbc);
            // Confirme o sucesso com o usuário
            echo "<script>alert('A sua conta foi cadastrada com sucesso! Agora você pode fazer login.');"
            . "window.location=\"index.php\";</script>";
            exit();
        } else {
            // Já existe uma conta com esse nome, exibir mensagem de erro.
            echo "<script>alert('Já existe um email igual cadastrado. Por favor escolha outro email');</script>";

            $email = "";
        }
    } else {
        echo "<script>alert('Você deve digitar todos os dados de login, incluindo a "
        . "senha desejada duas vezes.');</script>";
    }
}

mysqli_close($dbc);
?>

<style>
    #tim {
        border: 0;
        padding: 0;
        display: inline;
        background: none;
        color: #66afe9;
    }
    #tim:hover {
        cursor: pointer;
        text-decoration: underline;
        color: blue;
    }
</style>

<!-- Start contact-page Area -->
<div class=" section-top-border">
    <div class=" container col-8">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="mt-10">
                        <h4>Nome:</h4>
                        <input type="text" name="first_name" placeholder="Nome" 
                        <?php echo (!empty($first_name) ? 'value="' . $first_name . '" ' : '') ?>
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome'" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <h4>Sobrenome:</h4>
                        <input type="text" name="last_name" placeholder="Sobrenome" 
                        <?php echo (!empty($last_name) ? 'value="' . $last_name . '" ' : '') ?> 
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sobrenome'" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <h4>Email:</h4>
                        <input type="email" name="email" placeholder="Email"
                        <?php echo (!empty($email) ? 'value="' . $email . '" ' : '') ?> 
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <h4>Senha:</h4>
                        <input type="password" name="password" placeholder="Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <h4>Confirme a Senha:</h4>
                        <input type="password" name="password2" placeholder="Confirme sua Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirme sua Senha'" required class="single-input-primary">
                    </div>

                    <div class="mt-10">
                        <h4>Informe sua reposta para a seguinte pergunta:</h4>
                        <h5 class="text-danger">Qual o nome do seu primero amigo de infância?</h5>
                        <input type="text" name="question" placeholder="Qual o nome do seu primero amigo de infância? (IMPORTANTE)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Qual o nome do seu primero amigo de infância? (IMPORTANTE)'" required class="single-input-primary">
                    </div>

                    <h4 class="mt-10">Cidade:</h4>
                    <div class="input-group-icon">
                        <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select">

                            <select name="cidade">
                                <option value="Guaratinguetá">Guaratinguetá</option>
                                <option value="Aparecida">Aparecida</option>
                                <option value="Taubaté">Taubaté</option>
                                <option value="Lorena">Lorena</option>
                                <option value="São José dos Campos">São José dos Campos</option>
                                <option value="São Paulo">São Paulo</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-10">
                        <div class="form-group">
                            <label class="checkbox-inline"><input type="checkbox" required><strong>Eu aceito os <a id="tim" onclick="window.open('terms_of_use.php');" target="_blank">Termos de Uso</a> da Platarforma HG Study</a></strong></label>
                        </div>
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
                        <button type="submit" class="genric-btn primary circle" name="submit">CADASTRAR <span class="lnr lnr-arrow-right"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
// Insere o rodapé da página
require_once './script/footer2.php';
