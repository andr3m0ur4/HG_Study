<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Blog Posts
                </h1>
                <p class="text-white link-nav">
                    <a href="/">Home</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/blog-home">Blog Posts</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start content main -->
<main id="content">
    <!-- Start blog-posts Area -->
    <section class="blog-posts-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 post-list blog-post-list">
                    <?php foreach ($posts as $post) : ?>
                        <div class="single-post">
                            <img class="img-fluid" src="/img/blog/<?= $post->picture ?>" alt="">
                            <ul class="tags">
                                <li><a href="#">Art, </a></li>
                                <li><a href="#">Technology, </a></li>
                                <li><a href="#">Fashion</a></li>
                            </ul>
                            <a href="/blog-single/<?= $post->id ?>">
                                <h1>
                                    <?= $post->title ?>
                                </h1>
                            </a>
                            <p>
                                <?= $post->content ?>
                            </p>
                            <div class="bottom-meta">
                                <div class="user-details row align-items-center">
                                    <div class="comment-wrap col-lg-6">
                                        <ul>
                                            <li>
                                                <a href="#"><span class="lnr lnr-heart"></span>	4 likes</a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="container col-lg-6">
                                        <p><?= "{$post->name} {$post->last_name}" ?></p>
                                    </div>
                                </div>
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
                    <div class="single-widget search-widget border border-secondary">
                        <form class="example m-auto mw-100" action="#">
                            <input type="text" class="" placeholder="Pesquisar" name="search2">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="single-widget category-widget border border-secondary">
                        <h4 class="title">Postagem por Categoria</h4>
                        <ul>
                            <li><a class="justify-content-between d-flex" href="#"><p>Desenvolvimento</p><span>37</span></a></li>
                            <li><a class="justify-content-between d-flex" href="#"><p>Redes</p><span>57</span></a></li>
                            <li><a class="justify-content-between d-flex" href="#"><p>Segurança</p><span>33</span></a></li>
                            <li><a class="justify-content-between d-flex" href="#"><p>Banco de Dados</p><span>36</span></a></li>
                            <li><a class="justify-content-between d-flex" href="#"><p>Inteligência Artificial</p><span>47</span></a></li>
                            <li><a class="justify-content-between d-flex" href="#"><p>Big Data</p><span>27</span></a></li>
                        </ul>
                    </div>

                    <div class="single-widget recent-posts-widget border border-secondary">
                        <h4 class="title">Postagens Recentes</h4>
                        <div class="blog-list ">
                            <div class="single-recent-post d-flex flex-row">
                                <div class="recent-thumb">
                                    <img class="img-fluid" src="/img/blog/r1.jpg" alt="">
                                </div>
                                <div class="recent-details">
                                    <a href="/blog-single">
                                        <h4>
                                            Home Audio Recording
                                            For Everyone
                                        </h4>
                                    </a>
                                    <p>
                                        02 hours ago
                                    </p>
                                </div>
                            </div>	
                            <div class="single-recent-post d-flex flex-row">
                                <div class="recent-thumb">
                                    <img class="img-fluid" src="/img/blog/r2.jpg" alt="">
                                </div>
                                <div class="recent-details">
                                    <a href="/blog-single">
                                        <h4>
                                            Home Audio Recording
                                            For Everyone
                                        </h4>
                                    </a>
                                    <p>
                                        02 hours ago
                                    </p>
                                </div>
                            </div>	
                            <div class="single-recent-post d-flex flex-row">
                                <div class="recent-thumb">
                                    <img class="img-fluid" src="/img/blog/r3.jpg" alt="">
                                </div>
                                <div class="recent-details">
                                    <a href="/blog-single">
                                        <h4>
                                            Home Audio Recording
                                            For Everyone
                                        </h4>
                                    </a>
                                    <p>
                                        02 hours ago
                                    </p>
                                </div>
                            </div>	
                            <div class="single-recent-post d-flex flex-row">
                                <div class="recent-thumb">
                                    <img class="img-fluid" src="/img/blog/r4.jpg" alt="">
                                </div>
                                <div class="recent-details">
                                    <a href="/blog-single">
                                        <h4>
                                            Home Audio Recording
                                            For Everyone
                                        </h4>
                                    </a>
                                    <p>
                                        02 hours ago
                                    </p>
                                </div>
                            </div>																																					
                        </div>								
                    </div>

                    <div class="single-widget category-widget border border-secondary">
                        <h4 class="title">Arquivo</h4>
                        <ul>
                            <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Dec '17</h6> <span>37</span></a></li>
                            <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Nov '17</h6> <span>24</span></a></li>
                            <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Out '17</h6> <span>59</span></a></li>
                            <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Set '17</h6> <span>29</span></a></li>
                            <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Aug '17</h6> <span>15</span></a></li>
                            <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Jul '17</h6> <span>09</span></a></li>
                            <li><a href="#" class="justify-content-between align-items-center d-flex"><h6>Jun '17</h6> <span>44</span></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End blog-posts Area -->
</main>
<!-- End content main -->