<?php

header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");

// Obter qualquer dado de entrada
//$data = file_get_contents("php://input");
// Salvar os dados de entrada
//file_put_contents("debug.txt", $data);

$notificationCode = preg_replace('/[^[:alnum:]-]/', '', $_POST["notificationCode"]);

//$data['token'] = '0624f0d2-27d1-4c72-a61d-e2951d59c075db46422148d1bcf7c1761c4ae4780c12c193-caa5-4e79-844f-e6e54b7e1730';
$data['token'] = '92BE696531A542DE979EBF70D084CC21';
$data['email'] = 'andremoura2500@gmail.com';

//$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $notificationCode . '?' . $data;
var_dump($url);

$curl = curl_init();

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);


/*
  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
 */

$xml = curl_exec($curl);

if ($xml == 'Unauthorized') {
    $return = 'Não Autorizado';
    echo $return;
    exit;
}

curl_close($curl);

$xml = simplexml_load_string($xml);

if (count($xml->error) > 0) {
    $return = 'Dados Inválidos ' . $xml->error->message;
    echo $return;
    exit;
}

$reference = $xml->reference;
$status = $xml->status;

if ($reference && $status) {
    include_once './conecta.php';
    $conn = new conecta();

    $rs_pedido = $conn->consultarPedido($reference);

    if ($rs_pedido) {
        $conn->atualizaPedido($reference, $status);
    }

    if ($status > 2) {
        $rs_array = $conn->consultarUsuario($reference);
        
        $rs_usuario = $rs_array[0];
        $usuario = $rs_array[1];

        if ($rs_usuario) {
            $conn->atualizaVip($reference, $usuario);
        }
    }
}
?>