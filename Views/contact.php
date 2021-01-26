<!-- start banner Area -->
<section class="banner-area relative" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Entre em Contato
                </h1>
                <p class="text-white">
                    <a href="/">Home</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="/contact.html">Contato</a>
                </p>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container col-8">
        <div class="row">
            <div class="col-lg-12">

                <form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
                    <div class="row">	
                        <div class="col-lg-12 form-group">
                            <input name="name" placeholder="Insira seu Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu Nome'" class="common-input mb-20 form-control" required type="text">

                            <input name="email" placeholder="Insira seu E-mail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira seu E-mail'" class="common-input mb-20 form-control" required type="email">

                            <input name="subject" placeholder="Insira sua sugestão" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insira sua sugestão'" class="common-input mb-20 form-control" required type="text">

                            <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Mensagem" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mensagem'" required></textarea>

                            <div class="text-center mt-5">
                                <button class="primary-btn mt-20 text-white ">
                                    Enviar a mensagem
                                </button>
                            </div>
                            <div class="mt-20 alert-msg text-left"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->