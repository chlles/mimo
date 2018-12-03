<?php
/**
 * Created by PhpStorm.
 * User: michelle
 * Date: 02/12/2018
 * Time: 16:36
 */
require 'vendor/autoload.php';

// Dados obtidos pelo formulário
$nomeremetente = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$emailremetente = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emaildestinatario = 'chllesfernandes@gmail.com'; //e-mail deve estar em seu servidor web
$assunto = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);


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
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    echo "<script> alert('Mensagem enviada com sucesso.') </script>";
} catch (Exception $e) {
    echo "<script> alert('Sua mensagem não pode ser enviada.') </script>";
}