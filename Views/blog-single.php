<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Publicação
                </h1>	
                <p class="text-white link-nav">
                    <a href="/">Home</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/blog-home">Blog</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/blog-single/<?= $post->id ?>">Blog Single</a>
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
                    <div class="single-post">
                        <img class="img-fluid" src="/img/blog/<?= $post->picture ?>" alt="">
                        <ul class="tags">
                            <li><a href="#">Art</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Fashion</a></li>
                        </ul>
                        <a href="#">
                            <h1>
                                <?= $post->title ?>
                            </h1>
                        </a>
                        <div class="content-wrap">
                            <p>
                                <?= nl2br($post->content) ?>
                            </p>

                            <blockquote class="generic-blockquote">
                                “<?= $post->quote ?>” 
                            </blockquote>

                            <p>
                                <?= nl2br($post->content2) ?>
                            </p>

                        </div>
                        <div class="bottom-meta">
                            <div class="user-details row align-items-center">
                                <div class="comment-wrap col-lg-6 col-sm-6">
                                    <ul>
                                        <li><a href="#"><span class="lnr lnr-heart"></span>	4 likes</a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="social-wrap col-lg-6">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Start nav Area -->
                        <section class="nav-area pt-50 pb-100">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-sm-6 nav-left justify-content-start d-flex">
                                        <div class="thumb">
                                            <img src="/img/blog/prev.jpg" alt="Foto">
                                        </div>
                                        <div class="post-details">
                                            <p>Prev Post</p>
                                            <h4 class="text-uppercase"><a href="#">A Discount Toner</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 nav-right justify-content-end d-flex">
                                        <div class="post-details">
                                            <p>Prev Post</p>
                                            <h4 class="text-uppercase"><a href="#">A Discount Toner</a></h4>
                                        </div>             
                                        <div class="thumb">
                                            <img src="/img/blog/next.jpg" alt="Foto">
                                        </div>                         
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End nav Area -->

                        <!-- Start comment-sec Area -->
                        <section class="comment-sec-area pt-80 pb-80">
                            <div class="container">
                                <div class="row flex-column">
                                    <h5 class="text-uppercase pb-80">05 Comments</h5>
                                    <br>
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="/img/blog/c1.jpg" alt="">
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="#">Emilly Blunt</a></h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                    <p class="comment">
                                                        Never say goodbye till the end comes!
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase">Responder</a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-list left-padding">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="/img/blog/c2.jpg" alt="">
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="#">Carolina Macaci</a></h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                    <p class="comment">
                                                        Never say goodbye till the end comes!
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase">Responder</a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-list left-padding">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="/img/blog/c3.jpg" alt="">
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="#">Carmen Sandiego</a></h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                    <p class="comment">
                                                        Never say goodbye till the end comes!
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase">Responder</a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="/img/blog/c4.jpg" alt="">
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="#">Eliza Clark</a></h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                    <p class="comment">
                                                        Never say goodbye till the end comes!
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase">Responder</a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="/img/blog/c5.jpg" alt="">
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="#">Samara Ditch</a></h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                    <p class="comment">
                                                        Never say goodbye till the end comes!
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="#" class="btn-reply text-uppercase">Responder</a> 
                                            </div>
                                        </div>
                                    </div>                                                                                                                                                                
                                </div>
                            </div>    
                        </section>
                        <!-- End comment-sec Area -->

                        <!-- Start commentform Area -->
                        <section class="commentform-area pt-80">
                            <div class="container">
                                <h5 class="pb-50">Deixe um Comentário</h5>
                                <div class="row flex-row d-flex">
                                    <div class="col-lg-4 col-md-6">

                                        <input name="name" placeholder="Insira seu nome" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Insira seu nome'" class="common-input mb-20 form-control" required type="text">
                                        <input name="email" placeholder="Insira seu email" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Insira seu email'" class="common-input mb-20 form-control" required type="email">
                                        <input name="Subject" placeholder="Assunto" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Assunto'" class="common-input mb-20 form-control" required type="text">

                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <textarea class="form-control mb-10" name="message" placeholder="Mensagem" onFocus="this.placeholder = ''" onBlur="this.placeholder = 'Mensagem'" required></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="primary-btn mt-20" href="#">Comentar</a>
                                </div>
                            </div>
                        </section>
                        <!-- End commentform Area -->

                    </div>
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="single-widget search-widget border border-secondary">
                        <form class="example m-auto mw-100" action="#">
                            <input type="text" placeholder="Pesquisar" name="search2">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>								
                    </div>

                    <div class="single-widget protfolio-widget border border-secondary">
                        <?php if (empty($post->user_picture)) : ?>
                            <img src="/img/post.png" alt="Foto de Perfil">
                        <?php else : ?>
                            <img src="/img/user/<?= $post->user_picture ?>" alt="Foto de Perfil" class="img-fluid">
                        <?php endif ?>
                        <a href="/single/<?= $post->id_user ?>">
                            <h4><?= "{$post->name} {$post->last_name}"?></h4>
                        </a>
                        <p>
                            <?= $post->description ?>
                        </p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
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
                        <h4 class="title">Postagens recentes</h4>
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