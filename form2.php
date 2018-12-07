<?php
/**
 * Created by PhpStorm.
 * User: michelle
 * Date: 02/12/2018
 * Time: 16:36
 */


function error_handler($e) {
    var_dump($e);

    die;
}

set_error_handler('error_handler');
set_exception_handler('error_handler');

require 'vendor/autoload.php';


// Dados obtidos pelo formulário
$nomeremetente = 'chlles';
$emailremetente = 'chllesfernandes@gmail.com';
$emaildestinatario = 'contato@esteticamimo.com.br'; //e-mail deve estar em seu servidor web
$assunto = 'assunto';
$mensagem = 'mensagem';


/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<strong>Formulário de Contato</strong>
<p><b>Nome:</b> '.$nomeremetente.'
<p><b>E-Mail:</b> '.$emailremetente.'
<p><b>Assunto:</b> '.$assunto.'
<p><b>Mensagem:</b> '.$mensagem.'</p>
<hr>';


$email = new \SendGrid\Mail\Mail();
$email->setFrom($emaildestinatario, "Mimo Estética");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo($emailremetente, $nomeremetente);
$email->addContent(
    "text/html", $mensagemHTML
);
$sendgrid = new \SendGrid('');

echo '<pre>';
//try {
//    $response = $sendgrid->send($email);
//    var_dump($response);
//} catch (Exception $e) {
//    var_dump($e->getMessage());die;
//}
//
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}