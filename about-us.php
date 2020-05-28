<?php

// Iniciar a sessão
require_once './script/startsession.php';

// Insere o cabeçalho da página
$page_title = "Sobre nós";
require_once './script/header.php';

// Insere o banner da página
$title = "Sobre nós";
$title2 = "Sobre nós";
$link = "about-us";
require_once './script/banner2.php';

?>        

        <!-- Start service Area -->
        <section class="service-area section-gap" id="service">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 pb-40 header-text">
                        <h1>Porque escolher-nos</h1>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <h4><span class="lnr lnr-bubble"></span>Ideia</h4>
                            <p>
                                Algos simples, porém eficiente, nascida de um meio acadêmico, mas destinado a todos que desejam algo maior para seu futuro estudantil e profissional.

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <h4><span class="lnr lnr-license"></span>Função</h4>
                            <p>
                                Aproximar pessoas, facilitar a disseminação de conhecimento, e contribuir para uma comunidade fortificada na área de tecnologia da informação.
                            </p>								
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <h4><span class="lnr lnr-smile"></span>Praticidade</h4>
                            <p>
                                Chega de burocracias, formulários extensos, taxas muito altas. O foca aqui é atender às necessidades.
                            </p>						
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <h4><span class="lnr lnr-diamond"></span>Público</h4>
                            <p>
                                Alunos, profissionais, professores, entusiastas, etc. Se o seu coração é metade máquina, seu lugar é aqui.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <h4><span class="lnr lnr-users"></span>Equipe</h4>
                            <ul>
                                <li><span class="lnr lnr-user"></span> André de Moura</li>
                                <li><span class="lnr lnr-user"></span> Eduardo Pereira</li>
                                <li><span class="lnr lnr-user"></span> Gabriel Zacaro</li>
                                <li><span class="lnr lnr-user"></span> Matheus Melo</li>
                                <li><span class="lnr lnr-user"></span> Pietra Carvalho</li>
                            </ul>								
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-service">
                            <h4><span class="lnr lnr-rocket"></span>Futuro</h4>
                            <p>
                                Ampliações, atualizações e inovações constantes. O objetivo aqui é não se acomodar e sempre buscar proporcionar o melhor para você em questão a conforto e funcionalidades.
                            </p>									
                        </div>
                    </div>						
                </div>
            </div>	
        </section>


<?php
// Insere o rodapé da página
require_once './script/footer2.php';