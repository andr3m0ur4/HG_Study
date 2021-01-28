<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Detalhes do Usuário
                </h1>
                <p class="text-white link-nav">
                    <a href="/">Home</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/single/<?= $user->id ?>">Detalhes do Usuário</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start post Area -->
<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-lg-8 post-list">
                <div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="/img/post.png" alt="">
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
                                <a href="#">
                                    <h4><?= "{$user->name} {$user->last_name}"?></h4>
                                </a>
                                <h6><?= $user->job ?></h6>
                            </div>
                            <ul class="btns">
                                <?php if ($id == $user->id) : ?>
                                    <li><a href="/single/update">Editar</a></li>
                                <?php else : ?>
                                    <li><a href="#">Seguir</a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                        <p>
                            <?=$user->description ?>
                        </p>
                        <p class="address"><span class="lnr lnr-map"></span> <?= "{$user->city}-{$user->state}" ?></p>
                    </div>
                </div>

                <div class="single-post job-details">

                    <h4 class="single-title">Descrição</h4>

                    <p>
                        <?= nl2br($user->biography) ?>
                    </p>
                    <?php if ($id == $user->id) : ?>
                        <ul class="btns">
                            <li><a href="#">Editar</a></li>
                        </ul>
                    <?php endif ?>
                </div>

                <div class="single-post job-experience">
                    <h4 class="single-title">Experiências</h4>
                    <ul>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>	
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>																											
                    </ul>
                    <?php if ($id == $user->id) : ?>
                        <ul class="btns">
                            <li><a href="#">Editar</a></li>
                        </ul>
                    <?php endif ?>
                </div>

                <div class="single-post job-experience">
                    <h4 class="single-title">Participações em projetos</h4>
                    <ul>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>	
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>													
                    </ul>
                    <?php if ($id == $user->id) : ?>
                        <ul class="btns">
                            <li><a href="#">Editar</a></li>
                        </ul>
                    <?php endif ?>
                </div>

                <div class="single-post job-experience">
                    <h4 class="single-title">Formações Acadêmicas & Cursos</h4>
                    <ul>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>
                        <li>
                            <img src="/img/pages/list.jpg" alt="">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.</span>
                        </li>																										
                    </ul>
                    <?php if ($id == $user->id) : ?>
                        <ul class="btns">
                            <li><a href="#">Editar</a></li>
                        </ul>
                    <?php endif ?>
                </div>
            </div>

            <div class="col-lg-4 sidebar">
                <div class="single-slidebar">
                    <h4>Seguidores</h4>
                    <ul class="cat-list">
                        <li><a class="justify-content-between d-flex" href="/users"><p>Ricardo J.</p><span>37</span></a></li>
                        <li><a class="justify-content-between d-flex" href="/users"><p>Pamela R.</p><span>57</span></a></li>
                        <li><a class="justify-content-between d-flex" href="/users"><p>Amanda S.</p><span>33</span></a></li>
                        <li><a class="justify-content-between d-flex" href="/users"><p>Allison D.</p><span>36</span></a></li>
                        <li><a class="justify-content-between d-flex" href="/users"><p>Giovane L.</p><span>47</span></a></li>
                        <li><a class="justify-content-between d-flex" href="/users"><p>Roberto F.</p><span>27</span></a></li>
                        <li><a class="justify-content-between d-flex" href="/users"><p>Carlos L.</p><span>17</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End post Area -->

<?php if (!isset($_SESSION['id'])) : ?>
    <!-- Start callto-action Area -->
    <section class="callto-action-area section-gap" id="callto-action">
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
<?php endif ?>