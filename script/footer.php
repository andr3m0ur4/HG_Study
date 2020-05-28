<?php
// Exibir somente caso o usuario nao esteja logado.
if (!isset($_SESSION['user_id'])) {
    ?>
    <!-- Start callto-action Area -->
    <section class="back-footer" id="join">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10 text-white">Deseja ver mais?</h1>
                        <p class="text-white">Cadastre-se agora como orientador ou aluno e veja as vantagens de se tornar um.</p>

                        <a class="ticker-btn "  href="cadastro.php">Cadastrar</a>
                    </div>
                </div>
            </div>	
        </div>	
    </section>
    <!-- End calto-action Area -->
    <?php
}
?>

<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>			
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="js/easing.min.js"></script>			
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.min.js"></script>	
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>	
<script src="js/owl.carousel.min.js"></script>			
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.nice-select.min.js"></script>			
<script src="js/parallax.min.js"></script>		
<script src="js/mail-script.js"></script>	
<script src="js/main.js"></script>	
</body>
</html>
