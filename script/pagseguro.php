<?php

//$email = preg_replace('/[^[:alnum:]-]/', '', $_POST["user_email"]);
$email = htmlentities($_POST["user_email"]);

//$data['token'] = '0624f0d2-27d1-4c72-a61d-e2951d59c075db46422148d1bcf7c1761c4ae4780c12c193-caa5-4e79-844f-e6e54b7e1730';
$data['token'] = '92BE696531A542DE979EBF70D084CC21';
$data['email'] = 'andremoura2500@gmail.com';
$data['currency'] = 'BRL';
$data['itemId1'] = '1';
$data['itemQuantity1'] = '1';
$data['itemDescription1'] = 'MyChat ' . $email;
$data['itemAmount1'] = '69.00';
$data['reference'] = $email;

//$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';

$curl = curl_init();

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);


/*
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
 */ 

$xml = curl_exec($curl);

if($xml == 'Unauthorized'){
$return = 'Não Autorizado';
echo $return;
exit;
}

curl_close($curl);

$xml = simplexml_load_string($xml);

if(count($xml -> error) > 0){
$return = 'Dados Inválidos '.$xml ->error-> message;
echo $return;
exit;
}

class codigo { function code(){ $this->code; }}
$var = new codigo;

echo $xml -> code;

?>