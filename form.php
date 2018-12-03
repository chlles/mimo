<?php
/**
 * Created by PhpStorm.
 * User: michelle
 * Date: 02/12/2018
 * Time: 16:36
 */


// Dados obtidos pelo formulário
$nomeremetente     = $_POST['name'];
$nomeremetente = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$emailremetente    = trim($_POST['email']);
$emaildestinatario = 'chllesfernandes@gmail.com'; //e-mail deve estar em seu servidor web
$assunto          = $_POST['subject'];
$mensagem          = $_POST['message'];


/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<strong>Formulário de Contato</strong>
<p><b>Nome:</b> '.$nomeremetente.'
<p><b>E-Mail:</b> '.$emailremetente.'
<p><b>Assunto:</b> '.$assunto.'
<p><b>Mensagem:</b> '.$mensagem.'</p>
<hr>';


// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n"; // remetente
$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers);

 if($envio)
     echo "<script> alert('Mensagem enviada!'); </script>"; // Página que será redirecionada
