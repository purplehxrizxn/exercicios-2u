<?php

/*
 * Exemplo de autenticação na busca de um boleto utilizando o método HTTP GET.
 * Como o token de acesso fornecido não existe o um erro 401 (Não Autorizado) é retornado.
 *
 * cURL - http://php.net/manual/pt_BR/book.curl.php
**/

//URL do serviço /boleto + /token
$url = 'https://sandbox.boletocloud.com/api/v1/boletos/';

// curl - http://php.net/manual/pt_BR/book.curl.php
#Inicializa a sessão
$ch = curl_init($url); 

// //Opções relacionadas a requisição: http://php.net/manual/pt_BR/function.curl-setopt.php
// #Define a url
// curl_setopt($ch, CURLOPT_URL, $url);
// #Define o tipo de autenticação HTTP Basic 
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
// #Define o API Token para realizar o acesso ao serviço
curl_setopt($ch, CURLOPT_USERPWD, "api-key_wlbS8QS906waLhJkSig9fSFj62pd1pN-oJMpow3svt0=:token");
// #True para enviar o conteúdo do arquivo direto para o navegador
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// #Define que os headers estarão na resposta
// curl_setopt($ch, CURLOPT_HEADER, true);

// //Necessário para requisição HTTPS
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// #Executa a chamada
$response = json_decode(curl_exec($ch));

var_dump($response);

// #Principais meta-dados da resposta
// $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
// $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

// #Encerra a sessão
// curl_close($ch);

// #Separando header e body contidos na resposta
// $header = substr($response, 0, $header_size);
// $body = substr($response, $header_size);
// $header_array = explode("\r\n", $header);

// #Principais headers deste exemplo
// $boleto_cloud_version = '';

// foreach($header_array as $h) {
//     if(preg_match('/X-BoletoCloud-Version:/i', $h)) {
//         $boleto_cloud_version = $h;
//     }
// }


// #Visualizando erro no navegador
// echo '<p> Status Code: '.$http_code.'</p>';
// echo '<p>'.$boleto_cloud_version.'</p>'; #Header X-BoletoCloud-Version
// echo '<pre>'.$body.'</pre>'; #Erro JSON como resposta:

// /*
//  * Para saber mais sobre tratamento de erros veja a seção Status & Erros 
// **/