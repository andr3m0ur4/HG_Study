<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="André Moura">
    <!-- Meta Description -->
    <meta name="description" content="Aplicação web com conteúdo educacional">
    <!-- Meta Keyword -->
    <meta name="keywords" content="HG Study Tecnologia Estudar TI">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>HG Study</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="/assets/css/linearicons.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">					
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/assets/css/main.css">

</head>
<body>

    <header id="header" class="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="/">
                        <img src= "/img/logo.png"  height="100" alt="Logo" class="img-responsive"/>
                    </a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="/">Home</a></li>
                        <li><a href="/about-us">Sobre nós</a></li>
                        <li><a href="/users">Orientadores</a></li>
                        <li><a href="/blog-home">Blog</a></li>
                        <li><a href="/contact">Contato</a></li>
                        <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
                            <li><a class="ticker-btn" href="/single/<?= $_SESSION['id'] ?>">
                                Bem vindo, <?= $_SESSION['name']?>
                            </a></li>
                            <li><a class="ticker-btn" href="/logout">Sair</a></li>
                        <?php else : ?>
                            <li><a class="ticker-btn" href="/register">Cadastre-se</a></li>
                            <li><a class="ticker-btn" href="/login">Login</a></li>
                        <?php endif ?>
                    </ul>
                </nav><!-- #nav-menu-container -->		    		
            </div>
        </div>
    </header><!-- #header -->

    <?= $this->loadViewInTemplate($viewName, $viewData) ?>

    <!-- start footer Area -->		
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-12">
                    <div class="single-footer-widget">
                        <img src="/img/logo.png" width="200" height="200" alt="Logo"/>
                    </div>
                </div>
                <div class="col-lg-6  col-md-12">
                    <div class="single-footer-widget newsletter">
                        <h6>Boletim informativo</h6>
                        <p>Você pode confiar em nós. Nós só mandaremos novidades,sem nenhum spam.</p>
                        <div id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

                                <div class="form-group row" style="width: 100%">
                                    <div class="col-lg-8 col-md-12">
                                        <input name="email" placeholder="Insira o Email" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Insira o Email'" required type="email">
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="button" tabindex="-1" value="" type="text">
                                        </div>
                                    </div> 
                                
                                    <div class="col-lg-4 col-md-12">
                                        <button class="nw-btn primary-btn">
                                            Enviar<span class="lnr lnr-arrow-right"></span>
                                        </button>
                                    </div> 
                                </div>		
                                <div class="info"></div>
                            </form>
                        </div>		
                    </div>
                </div>
                <div class="col-lg-3  col-md-12">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instragram Feed</h6>
                        <ul>
                            <li><a href="#">HGStudy@Email.com</a></li>
                            <li>(916) 375-2525</li>
                            <li>
                                HG Study HQ.<br>
                                5240 Vanish Island. 105
                                <br>
                                Unknow
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <!--
    JS
    ============================================= -->
    <script src="/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="/assets/js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="/assets/js/easing.min.js"></script>
    <script src="/assets/js/hoverIntent.js"></script>
    <script src="/assets/js/superfish.min.js"></script>
    <script src="/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.sticky.js"></script>
    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="/assets/js/parallax.min.js"></script>
    <script src="/assets/js/mail-script.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/script.js"></script>
    
</body>
</html>