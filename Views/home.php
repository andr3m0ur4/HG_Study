<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-12">
                <h1 class="text-white">
                    HG Study
                </h1>
                <form action="/search" class="search-form-area">
                    <div class="row justify-content-center form-wrap">
                        <div class="col-lg-4 form-cols">
                            <input type="text" class="form-control" name="search" placeholder="Qual empresa você está interessado?">
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects">
                                <select>
                                    <option value="1">Selecione a região</option>
                                    <option value="2">Sudeste</option>
                                    <option value="3">Sul</option>
                                    <option value="4">Centro-Oeste</option>
                                    <option value="5">Norte</option>
                                    <option value="6">Nordeste</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 form-cols">
                            <div class="default-select" id="default-selects2">
                                <select>
                                    <option value="1">Categorias</option>
                                    <option value="2">Desenvolvimento</option>
                                    <option value="3">Redes</option>
                                    <option value="4">Segurança</option>
                                    <option value="5">Banco de Dados</option>
                                    <option value="6">Inteligência Artificial</option>
                                    <option value="7">Big Data</option>
                                </select>
                            </div>										
                        </div>
                        <div class="col-lg-2 form-cols">
                            <button class="btn btn-info">
                                <span class="lnr lnr-magnifier"></span> Pesquisar
                            </button>
                        </div>
                    </div>
                </form>

            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->


<!-- Start features Area -->
<section class="testimonial-area section-gap" id="review">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Categorias</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-review-carusel">
                <div class="single-review">
                    <img src="/img/o6.png" alt="">
                    <div class="title d-flex flex-row">
                        <h4>Big Data</h4>
                    </div>
                    <p>
                        Big Data refere-se a um grande conjunto de dados gerados e armazenados, e que os aplicativos de processamento de dados tradicionais ainda não conseguem lidar em um tempo toleráve
                    </p>
                </div>	
                <div class="single-review">
                    <img src="/img/o2.png" alt="">
                    <div class="title d-flex flex-row">
                        <h4>Redes</h4>
                    </div>
                    <p>
                        Redes de computadores são estruturas físicas (equipamentos) e lógicas (programas, protocolos) que permitem que dois ou mais computadores possam compartilhar suas informações entre si.
                    </p>
                </div>	
                <div class="single-review">
                    <img src="/img/o3.png" alt="">
                    <div class="title d-flex flex-row">
                        <h4>Segurança</h4>
                    </div>
                    <p>
                        A segurança da informação está diretamente relacionada com proteção de um conjunto de informações, no sentido de preservar o valor que possuem para um indivíduo ou uma organização.
                    </p>
                </div>	
                <div class="single-review">
                    <img src="/img/o4.png" alt="">
                    <div class="title d-flex flex-row">
                        <h4>Banco de Dados</h4>
                    </div>
                    <p>
                        Bancos de dados são coleções organizadas de dados que se relacionam de forma a criar algum sentido e dar mais eficiência durante uma pesquisa ou estudo.
                    </p>
                </div>	
                <div class="single-review">
                    <img src="/img/o1.png" alt="">
                    <div class="title d-flex flex-row">
                        <h4>Desenvolvimento</h4>
                    </div>
                    <p>
                        Desenvolvimento de Sistemas desenvolve programas para computadores e outros dispositivos computacionais como, por exemplo, aparelhos celulares e tablets, visando a automação de todos os processos relativos às Tecnologias de Informação e Comunicação (TIC).
                    </p>
                </div>
                <div class="single-review">
                    <img src="/img/o5.png" alt="">
                    <div class="title d-flex flex-row">
                        <h4>Inteligencia Artificial</h4>
                    </div>
                    <p>
                        A inteligência artificial (IA) possibilita que máquinas aprendam com experiências, se ajustem a novas entradas de dados e performem tarefas como seres humanos.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End features Area -->


<!-- Start content main -->
<main id="content">
    <!-- Start post Area -->
    <section class="post-area section-gap">
        <div class="container">
            <div class="row justify-content-center d-flex">
                <div class="col-lg-8 post-list">
                    <?php foreach ($users as $user) : ?>
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
                            <div class="details">
                                <div class="title d-flex flex-row justify-content-between">
                                    <div class="titles">
                                        <a href="/single">
                                            <h4><?= "{$user->name} {$user->last_name}"?></h4>
                                        </a>
                                        <div>
                                            <h6><?= $user->job ?></h6>
                                        </div>
                                    </div>

                                </div>
                                <p>
                                    <?= $user->description ?>
                                </p>
                                <h5>Trabalho Atual: <?= $user->current_job ?></h5>
                                <p class="address"><span class="lnr lnr-map"></span> <?= $user->city ?>-<?= $user->state ?></p>
                                
                            </div>
                        </div>
                    <?php endforeach ?>

                    <a class="text-uppercase loadmore-btn mx-auto d-block" href="/users">
                        Carregar mais Tutores
                    </a>

                    <!--  
                    AD
                    -->

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
                        <img src="/img/Gif_animado_anunciosemanacultural.gif" alt="" class="img-fluid" />
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