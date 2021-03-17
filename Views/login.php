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