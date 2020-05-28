<?php
// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Contato";
require_once './script/header.php';

// Insere o banner da página
$title = "Entre em Contato";
$title2 = "Contato";
$link = "contact";
require_once './script/banner2.php';
?>

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container col-8">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right">
                    <div class="row">	
                        <div class="col-lg-12 form-group">
                            <?php
                            if (isset($_SESSION['name'])) {
                                echo '<input type="hidden" name="name" value="' . $_SESSION['name'] . '">';
                            } else {
                                ?>                        
                                <input name="name" placeholder="Insira seu Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu Nome'" class="common-input mb-20 form-control" required type="text">
                                <?php
                            }
                            if (isset($_SESSION['email'])) {
                                echo '<input type="hidden" name="email" value="' . $_SESSION['email'] . '">';
                            } else {
                                ?>
                                <input name="email" placeholder="Insira seu E-mail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu E-mail'" class="common-input mb-20 form-control" required type="email">
                                <?php
                            }
                            ?>
                            <input name="subject" placeholder="Insira sua sugestão" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira sua sugestão'" class="common-input mb-20 form-control" required type="text">
                            <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Mensagem" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required></textarea>
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="primary-btn mt-20 text-white ">Enviar a mensagem</button>
                            </div>
                            <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                    </div>
                </form>	
            </div>
        </div>
    </div>	
</section>
<!-- End contact-page Area -->


<?php
// Insere o rodapé da página
require_once './script/footer2.php';
