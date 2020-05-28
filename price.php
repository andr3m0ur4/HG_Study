<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Pagamento";
require_once './script/header.php';

require_once './script/connectvars.php';

// Insere o banner da página
$title = "Pagamento";
$title2 = "Página de Pagamento";
$link = "price";
require_once './script/banner2.php';

// Garantir que o usuário está logado.
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Por favor, faça login para acessar esta página.');"
    . "window.location=\"login.php\";</script>";
}

//Conectar-se ao banco de dados
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Não foi possível se conectar ao banco de dados.');
mysqli_set_charset($dbc, 'utf8');

$usuario = $_SESSION['usuario'];
// Obtém os dados do perfil do banco de dados
$query = "SELECT vip FROM $usuario WHERE id_$usuario = " . $_SESSION['user_id'];
$result = mysqli_query($dbc, $query)
        or die('Obteve um erro ao acessar obanco de dados.');
$row = mysqli_fetch_array($result);

if ($row['vip'] == 0) {
    
    $email = $_SESSION['email'];
    ?>
    <!--
        <script>
            function enviaPagseguro() {
                $.post("script/pagseguro.php", '', function (data) {
                    $('#code').val(data);
                    $('#comprar').submit();
                    //window.location.href = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' + data;
                })
            }
        </script> 
    -->

    <!-- Start price Area -->
    <section class="price-area section-gap" id="price">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Escolha o melhor plano para você</h1>
                        <p>Você tutor pode escolher o pacote que mais lhe agrada</p>
                    </div>
                </div>
            </div>						
            <div class="row">

                <div class="container col-lg-4">
                    <div class="single-price no-padding">
                        <div class="price-top">
                            <h4>Padrão</h4>
                        </div>
                        <ul class="lists">
                            <li>10 GB Space</li>
                            <li>Secure Online Transfer</li>
                            <li>Unlimited Styles</li>
                            <li>Customer Service</li>
                        </ul>
                        <div class="price-bottom">
                            <div class="price-wrap d-flex flex-row justify-content-center">
                                <span class="price">R$</span><h1> 69 </h1><span class="time">Por <br> Mês</span>
                            </div>
                            <button onclick="enviaPagseguro('<?php echo $email; ?>');" class="primary-btn header-btn">Iniciar</button><br>
                        </div>
                    </div>
                    <center><img src="img/loading.gif" id="loading" style="visibility: hidden; width: 40%;"></center>
                </div>

            </div>
        </div>	
    </section>
    <!-- End price Area -->

    <!-- INÍCIO FORMULARIO BOTAO PAGSEGURO -->
    <form id="comprar" action="https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
        <input type="hidden" name="code" id="code" value="" />
    </form>

    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->

    <script>
        function enviaPagseguro(email) {
            $.post('script/salvarPedido.php', {email: email}, function (user_email) {
                $('#loading').css("visibility", "visible");
                $.post('script/pagseguro.php', {user_email: user_email}, function (data) {
                    $('#code').val(data);
                    $('#comprar').submit();

                    $('#loading').css("visibility", "hidden");
                })
            })
        }
    </script>

    <?php
} else {
    $_SESSION['vip'] = $row['vip'];

    $update_msg = mysqli_query($dbc, "UPDATE $usuario SET log_in = 'Online' "
            . "WHERE id_$usuario = '" . $_SESSION['user_id'] . "'");

    echo "<script>window.open('MyChat/home.php', '_self')</script>";
}

mysqli_close($dbc);

// Insere o rodapé da página
require_once './script/footer2.php';
