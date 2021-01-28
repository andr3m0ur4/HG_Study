<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Login
                </h1>	
                <p class="text-white">
                    <a href="/">Home </a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/login">Login</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start contact-page Area -->
<div class="section-top-border ">
    <div class=" container col-8">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <form method="POST">
                    <div class="mt-10">
                        <input type="email" name="email" placeholder="Email" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <input type="password" name="password" placeholder="Senha" required class="single-input-primary">
                    </div>

                    <div class="text-center mt-10">
                        <button class="genric-btn primary circle arrow">
                            ENTRAR<span class="lnr lnr-arrow-right"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End contact-page Area -->

<?php if ($error) : ?>
    <span id="error"></span>
<?php endif ?>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-weight-bold modal-text"></p>
                <a class="modal-link" href="#"></a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>