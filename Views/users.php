<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Orientadores
                </h1>
                <p class="text-white link-nav">
                    <a href="/">Home</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/users">Orientadores</a>
                </p>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start content main -->
<main id="content">
    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    <?php foreach ($users as $user) : ?>
                        <div class="single-post d-flex flex-row">
                            <div class="thumb col-lg-3">
                                <?php if (empty($user->picture)) : ?>
                                    <img src="/img/post.png" alt="Foto de Perfil">
                                <?php else : ?>
                                    <img src="/img/user/<?= $user->picture ?>" alt="Foto de Perfil" class="img-fluid">
                                <?php endif ?>
                                <ul class="tags">
                                    <li>
                                        <a href="#">SQL</a>
                                    </li>
                                    <li>
                                        <a href="#">PHP</a>
                                    </li>
                                    <li>
                                        <a href="#">JAVASCRIPT</a>					
                                    </li>
                                </ul>
                            </div>
                            <div class="details col-lg-9">
                                <div class="title d-flex flex-row justify-content-between">
                                    <div class="titles">
                                        <a href="/single/<?= $user->id ?>">
                                            <h4><?= "{$user->name} {$user->last_name}" ?></h4></a>
                                        <div>
                                            <h6><?= $user->job ?></h6>
                                        </div>
                                    </div>
                                    <ul class="btns">
                                        <li><a href="#">Seguir</a></li>
                                    </ul>
                                </div>
                                <p>
                                    <?= $user->description ?>
                                </p>
                                <h5>Trabalho Atual: <?= $user->current_job ?></h5>
                                <p class="address"><span class="lnr lnr-map"></span> <?= $user->city ?>-<?= $user->state ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <nav aria-label="Navegação de página">
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?= $current_page == 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="/users?p=<?= $current_page - 1 ?>" tabindex="-1">Anterior</a>
                            </li>
                            <?php for ($i = 0; $i < $pages; $i++) : ?>
                                <li class="page-item <?= $current_page == $i + 1 ? 'active' : '' ?>">
                                    <a class="page-link" href="/users?p=<?= $i + 1 ?>"><?= $i + 1 ?></a>
                                </li>
                            <?php endfor ?>
                            <li class="page-item <?= $current_page == $pages ? 'disabled' : '' ?>">
                                <a class="page-link" href="/users?p=<?= $current_page + 1 ?>">Próximo</a>
                            </li>
                        </ul>
                    </nav>

                </div>

                <div class="col-lg-4 sidebar">
                    <div class="single-slidebar">
                        <h4>Orientador por Região</h4>
                        <ul class="cat-list">
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Sudeste</p><span>37</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Sul</p><span>57</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Centro-Oeste</p><span>33</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Norte</p><span>36</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Nordeste</p><span>47</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="single-slidebar">
                        <img src="/img/Gif_animado_anunciosemanacultural.gif" alt="" class="img-fluid"/>
                    </div>

                    <div class="single-slidebar">
                        <h4>Orientador por Categoria</h4>
                        <ul class="cat-list">
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Desenvolvimento</p><span>37</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Redes</p><span>57</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Segurança</p><span>33</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Banco de Dados</p><span>36</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Inteligência Artificial</p><span>47</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="/users">
                                    <p>Big Data</p><span>27</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End post Area -->
</main>
<!-- End content main -->

<!-- Start callto-action Area -->
<section class="callto-action-area section-gap" id="join">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-9">
                <div class="title text-center">
                    <h1 class="mb-10 text-white">Deseja ver mais?</h1>
                    <p class="text-white">Cadastre-se agora como tutor ou aluno e veja as vantagens de se tornar um.</p>

                    <a class="primary-btn" href="/register">Cadastrar</a>
                </div>
            </div>
        </div>	
    </div>	
</section>
<!-- End calto-action Area -->