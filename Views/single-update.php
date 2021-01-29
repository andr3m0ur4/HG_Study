<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Editar Informações
                </h1>
                <p class="text-white">
                    <a href="/">Home </a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/single/update">Editar</a>
                </p>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start contact-page Area -->
<section class="section-top-border container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8">

            <form method="POST" enctype="multipart/form-data">
                <div class="mt-10">
                    <input type="text" name="name" placeholder="Nome" value="<?= $user->name ?>" required class="single-input-primary">
                </div>
                <div class="mt-10">
                    <input type="text" name="last_name" placeholder="Sobrenome" value="<?= $user->last_name ?>" required class="single-input-primary">
                </div>
                <div class="mt-10">
                    <input type="email" name="email" placeholder="E-mail" value="<?= $user->email ?>" required class="single-input-primary">
                </div>
                <div class="mt-10">
                    <input type="email" name="new_email" placeholder="Novo E-mail" class="single-input-primary">
                </div>
                <div class="mt-10">
                    <a href="#" id="change-password" class="genric-btn default-border radius">Alterar Senha</a>
                </div>
                <div class="mt-10">
                    <input type="text" name="job" placeholder="Profissão" value="<?= $user->job ?>" class="single-input-primary">
                </div>

                <div class="mt-10">
                    <input type="text" name="description" placeholder="Fale algo sobre você" value="<?= $user->description ?>" class="single-input-primary">
                </div>

                <div class="mt-10">
                    <input type="text" name="current_job" placeholder="Trabalho Atual" value="<?= $user->current_job ?>" class="single-input-primary">
                </div>

                <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                    <div class="form-select" id="default-select">
                        <select name="city">
                            <option disabled>Cidade</option>
                            <option <?= $user->city == 'Guaratinguetá' ? 'selected' : '' ?>>Guaratinguetá</option>
                            <option <?= $user->city == 'Lorena' ? 'selected' : '' ?>>Lorena</option>
                            <option <?= $user->city == 'Pindamonhangaba' ? 'selected' : '' ?>>Pindamonhangaba</option>
                            <option <?= $user->city == 'Taubaté' ? 'selected' : '' ?>>Taubaté</option>
                            <option <?= $user->city == 'São José dos Campos' ? 'selected' : '' ?>>São José dos Campos</option>
                            <option <?= $user->city == 'São Paulo' ? 'selected' : '' ?>>São Paulo</option>
                        </select>
                    </div>
                </div>

                <div class="single-element-widget mt-10">
                    <h3 class="mb-10"> Estado:</h3>
                    <div class="default-select" id="default-select">
                        <select name="state">
                            <option value="SP" <?= $user->state == 'SP' ? 'selected' : '' ?>>São Paulo</option>
                            <option value="RJ" <?= $user->state == 'RJ' ? 'selected' : '' ?>>Rio de Janeiro</option>
                            <option value="MG" <?= $user->state == 'MG' ? 'selected' : '' ?>>Minas Gerais</option>
                            <option value="ES" <?= $user->state == 'ES' ? 'selected' : '' ?>>Espírito Santo</option>
                        </select>
                    </div>
                </div>

                <div class="mt-10">
                    <input type="url" name="facebook" placeholder="Facebook" value="<?= $user->facebook ?>" class="single-input-primary">
                </div>
                <div class="mt-10">
                    <input type="url" name="twitter" placeholder="Twitter" value="<?= $user->twitter ?>" class="single-input-primary">
                </div>
                <div class="mt-10">
                    <input type="url" name="linkedin" placeholder="LinkedIn" value="<?= $user->linkedin ?>" class="single-input-primary">
                </div>
                <div class="mt-10">
                    <input type="url" name="github" placeholder="GitHub" value="<?= $user->github ?>" class="single-input-primary">
                </div>

                <div class="thumb mt-10">
                    <label class="h3 mb-10" for="imgPicture">Escolher Foto:</label>
                    <input type="hidden" name="picture" value="<?= $user->picture ?>">
                    <input type="file" id="img-picture" name="new_picture" class="single-input-primary btn-block mb-3">
                    <figure class="container ml-0 w-25">
                        <?php if (!empty($user->picture)) : ?>
                            <img class="img-fluid" id="preview" src="/img/user/<?= $user->picture ?>" alt="Foto de Perfil">
                        <?php else : ?>
                            <img class="img-fluid" id="preview" src="/img/post.png" alt="Foto de Perfil">
                        <?php endif ?>
                    </figure>
                </div>

                <div class="text-center mt-10">
                    <button class="genric-btn primary circle arrow">
                        Salvar<span class="lnr lnr-arrow-right"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End contact-page Area -->

<?php if ($success) : ?>
    <span id="success"></span>
<?php endif ?>

<?php if ($error) : ?>
    <span id="error"></span>
<?php endif ?>

<?php if ($error_picture) : ?>
    <span id="error_picture"></span>
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
                <button type="button" id="btn-confirm" class="genric-btn primary radius d-none"></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>