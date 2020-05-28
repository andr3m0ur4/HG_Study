<?php
//$to = 'augusto.pereira@protonmail.com';
$to = $_POST["email"];
$firstname = 'HG Study';
$email = 'andre.benedicto@etec.sp.gov.br';
$subject = 'Seu Artigo foi Recusado!';
$text = "\n" . $_POST["message"];
$name = $_POST['name'];
//$phone = $_POST["phone"];



$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= "From: $firstname<" . $email . ">\r\n"; // Sender's E-mail


$message = '<table style="width:100%">
        <tr>
            <td>' . $firstname . '</td>
        </tr>
        <tr><td>Email: ' . $email . '</td></tr>
        
        <tr><td>Text: ' . $name . '. ' . $text . '</td></tr>
        
    </table>';

if (mail($to, $subject, $message, $headers)) {
    echo 'A menssagem foi enviada com sucesso.';
    echo "<script>alert('O artigo não foi aprovado!');"
          . "window.location=\"user.php\";</script>";
} else {
    echo 'falhou';
}
?>
