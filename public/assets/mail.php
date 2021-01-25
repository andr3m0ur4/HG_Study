<div class="active-relatedjob-carusel">
                                <div class="single-rated">
                                    <img class="img-fluid" src="img/r1.jpg" alt="">
                                    <a href="single.html"><h4>Joao Pereira Arruda</h4></a>
                                    <h6>Analista de UX</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                                    </p>
                                    <h5>Trabalho Atual: Dell</h5>
                                    <p class="address"><span class="lnr lnr-map"></span> Sao Paulo - SP</p>
                                    25k
                                </div>
                                <div class="single-rated">
                                    <img class="img-fluid" src="img/r1.jpg" alt="">
                                    <a href="single.html"><h4>Amado Batista</h4></a>
                                    <h6>Chefe de TI</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                                    </p>
                                    <h5>Trabalho Atual: Microsoft</h5>
                                    <p class="address"><span class="lnr lnr-map"></span>Recife - PE</p>
                                    15k

                                </div>
                                <div class="single-rated">
                                    <img class="img-fluid" src="img/r1.jpg" alt="">
                                    <a href="single.html"><h4>Shimira Rumanof</h4></a>
                                    <h6>Analista de TI</h6>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
                                    </p>
                                    <h5>Trabalho Atual: Motorola</h5>
                                    <p class="address"><span class="lnr lnr-map"></span>Volskaia - AG</p>
                                    1k

                                </div>																		
                            </div>



<?php
    $to = 'demo@spondonit.com';
    $firstname = $_POST["fname"];
    $email= $_POST["email"];
    $text= $_POST["message"];
    $phone= $_POST["phone"];
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$firstname.'  '.$laststname.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>phone: '.$phone.'</td></tr>
        <tr><td>Text: '.$text.'</td></tr>
        
    </table>';

    if (@mail($to, $email, $message, $headers))
    {
        echo 'The message has been sent.';
    }else{
        echo 'failed';
    }

?>
