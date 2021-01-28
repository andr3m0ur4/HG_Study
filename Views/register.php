<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Cadastro
                </h1>	
                <p class="text-white">
                    <a href="/">Home</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/register">Cadastre-se</a>
                </p>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->	

<!-- Start contact-page Area -->
<div class=" section-top-border">
    <div class="container col-8">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form method="POST">
                    <div class="mt-10">
                        <input type="text" name="name" placeholder="Nome" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <input type="text" name="last_name" placeholder="Sobrenome" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <input type="email" name="email" placeholder="Email" required class="single-input-primary">
                    </div>
                    <div class="mt-10">
                        <input type="password" name="password" placeholder="Senha" required class="single-input-primary">
                    </div>

                    <div class="input-group-icon mt-10">
                        <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                        <div class="form-select" id="default-select">
                            <select name="city">
                                <option disabled>Cidade</option>
                                <option>Guaratinguetá</option>
                                <option>Lorena</option>
                                <option>Pindamonhangaba</option>
                                <option>Taubaté</option>
                                <option>São José dos Campos</option>
                                <option>São Paulo</option>
                            </select>
                        </div>
                    </div>

                    <div class="single-element-widget mt-10">
                        <h3 class="mb-10"> Estado:</h3>
                        <div class="default-select" id="default-select">
                            <select name="state">
                                <option value="SP">São Paulo</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="ES">Espírito Santo</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-center mt-10">
                        <button class="genric-btn primary circle arrow">
                            CADASTRAR<span class="lnr lnr-arrow-right"></span>
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

<?php if (!is_null($success)) : ?>
    <?php if ($success) : ?>
        <span id="success">true</span>
    <?php else : ?>
        <span id="success">false</span>
    <?php endif ?>
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