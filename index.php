<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once 'x6f7689/MailgunCredentials.php';

require 'vendor/autoload.php';

if ($_POST) {

    $is_mail_sent = false;

    $nomeremetente = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $emailremetente = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $assunto = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $mensagem = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $mensagemHTML = '<strong>Formulário de Contato</strong>
                     <p><b>Nome:</b> ' . $nomeremetente . '
                     <p><b>E-Mail:</b> ' . $emailremetente . '
                     <p><b>Assunto:</b> ' . $assunto . '
                     <p><b>Mensagem:</b> ' . $mensagem . '</p>
                     <hr>';

    // validou tudo OK;
    $is_mail_sent = true;

    if ($is_mail_sent) {

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.mailgun.org';
            $mail->SMTPAuth = true;
            $mail->Username = $MailGunUsername;
            $mail->Password = $MailGunPassword;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('contato@esteticamimo.com.br', 'Estética MIMO');
            $mail->addAddress('contato@esteticamimo.com.br', 'Contato');
            $mail->addReplyTo('contato@esteticamimo.com.br', 'Estética MIMO');

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Formulário site - ' . $assunto;
            $mail->Body = $mensagemHTML;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

        } catch (Exception $e) {
            echo 'Sua mensagem não pode ser enviada. Erro: ', $mail->ErrorInfo;

            $is_mail_sent = false;
        }
    }
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Oferecendo o que há de melhor no mundo da Estética com preços acessíveis.
    Você merece esse mimo.">
    <meta name="author" content="Michelle Fernandes">

    <title>MIMO Estética</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,400i,700i" rel="stylesheet">
    <link href="Akrobat-Regular.woff" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="product.css" rel="stylesheet">

    <!-- Form -->
    <link rel="stylesheet" type="text/css" href="form/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="form/main.css">

    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body>

<nav class="navbar navbar-expand-sm fixed-top navbar-light">
    <div class="container">
        <a class="navbar-brand" href="http://esteticamimo.com.br"><img class="logonav" src="img/logobranco.png" alt="logo-mimo"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar2">
            <ul class="navbar-nav ml-auto  ">
                <li class="nav-item active">
                    <a class="nav-link" href="http://esteticamimo.com.br">HOME</a>
                </li>
                <li class="nav-item ml-md-2">
                    <a class="nav-link scroll" href="#about">SOBRE</a>
                </li>
                <li class="nav-item ml-md-2">
                    <a class="nav-link scroll" href="#services">SERVIÇOS</a>
                </li>
                <li class="nav-item ml-md-2">
                    <a class="nav-link scroll" href="#promo">PROMOÇÕES</a>
                </li>
                <li class="nav-item ml-md-2">
                    <a class="nav-link scroll" href="#contact">CONTATO</a>
                </li>
                <li class="nav-item ml-md-2">
                    <a class="nav-link" href="faq/">FAQ</a>
                </li>
                <li class="nav-item ml-md-3">
                    <a class="btn btn-rosa" data-toggle="modal" data-target="#exampleModalCenterNav" style="letter-spacing: 1.3px; color:white;">AGENDAR</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenterNav" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="agendaWidgetSalaoVipNav" width="100%" height="520px" style="border:none; border-radius: 10px;" src="https://agendamento.salaovip.com.br/?slug=mimoestetica"></iframe>
            </div>
        </div>
    </div>
</div>


<div class="position-relative overflow-hidden p-3 text-center bg-header">

</div>

<div class="row position-relative overflow-hidden pt-3 text-center backgroundGrey" id="about">
    <!--<div class=" container mt-3" >&nbsp;</div>-->
    <div class="container row mx-auto" style="display: flex; flex-wrap: wrap;">
        <div class="col-md-5 mx-auto mt-lg-5 overflow-hidden" id="florzinha">
            <img src="img/home_site_flor.png" class="img-fluid" style="max-height:250px;" alt="foto-flores">
        </div>
        <div class="col-md-7 mx-auto my-5 overflow-hidden">
            <h1 class="display-4 font-weight-normal text-align-right textPink text-uppercase comSerifa" style="font-size: 43px;">
                ESTÉTICA SEM PADRÃO</h1>
            <p class="lead font-weight-normal textDarkGrey Akrobat text-justify">
                Nós, da equipe da Mimo, gostaríamos de te convidar para conhecer nosso espaço e procedimentos. Somos uma empresa
                com uma proposta inovadora no mercado, onde o nosso maior objetivo é oferecer serviço e atendimento qualificado
                com preços baixos. Sabemos que hoje a auto estima está diretamente ligada a nossa saúde mental, e tentamos oferecer
                um equilíbrio, respeitando as características individuais de cada um entre, saúde, bem estar e estética.
            </p>
            <p class="lead font-weight-normal text-align-right textPink text-uppercase Akrobat ">Você merece esse mimo</p>
        </div>
    </div>
</div>

<div class="position-relative overflow-hidden p-3 text-center backgroundPink">
    <div class="col-md-12 mx-auto my-5">
        <p class="lead text-white font-weight-normal">TODAS AS ÁREAS DE BELEZA PARA VOCÊ SE SENTIR COMPLETA</p>
    </div>
</div>

<div id="services">
    <!-- Mobile -->
    <ul class="container nav nav-pills mt-5 mb-5   d-sm-none" id="pills-tab" role="tablist">
        <li class="nav-item" style="margin: auto">
            <a class="nav-link active" data-toggle="pill" role="tab" aria-controls="pills-alongamentos" aria-selected="true">
                CATEGORIAS</a>
        </li>
    </ul>
    <div class="d-block d-sm-none text-center my-3" style="font-weight: 600; font-size: 12px;">
        <div class="row col-xs-12" style="display: inline-flex; margin-top:30px">
            <a href="esteticafacial/">
                <div class="col-xs-6" style="margin-right: 50px;">
                    <img class="img-cat" src="img/categoria_facial.png" alt="ESTÉTICA FACIAL"/>
                    <p class="textPink" style="margin-top: 15px;">ESTÉTICA <br/> FACIAL</p>
                </div>
            </a>
            <a href="esteticacorporal/">
            <div class="col-xs-6">
                <img class="img-cat" src="img/menu_estetica_corporal.png" alt="ESTÉTICA CORPORAL"/>
                <p class="textPink" style="margin-top: 15px;">ESTÉTICA <br/>CORPORAL</p>
            </div>
            </a>
        </div>
        <div class="row col-xs-12" style="display: inline-flex; margin-top:30px">
            <a href="esmalteria/">
            <div class="col-xs-6" style="margin-right: 50px;">
                <img class="img-cat" src="img/MENU-ESMALTERIA.png" alt="ESMALTERIA"/>
                <p class="textPink" style="margin-top: 15px;">ESMALTERIA</p>
            </div>
            </a>
            <a href="salao/">
            <div class="col-xs-6">
                <img class="img-cat" src="img/menu_salao.png" alt="SALÃO"/>
                <p class="textPink" style="margin-top: 15px;">SALÃO</p>
            </div>
            </a>
        </div>
        <div class="row col-xs-12" style="display: inline-flex; margin-top:30px">
            <a href="micropigmentacao/">
            <div class="col-xs-6" style="margin-right: 50px;">
                <img class="img-cat" src="img/MICRO_categ.png" alt="MICROPIGMENTAÇÃO"/>
                <p class="textPink" style="margin-top: 15px; font-size:10px;">MICROPIGMENTAÇÃO</p>
            </div>
            </a>
            <a href="cilios/">
            <div class="col-xs-6">
                <img class="img-cat" src="img/categoria_cilios.png" alt="CÍLIOS E DESIGN"/>
                <p class="textPink" style="margin-top: 15px;">CÍLIOS E <br/>DESIGN</p>
            </div>
            </a>
        </div>
    </div>

    <!-- Desktop -->
    <div class="d-none d-sm-block">
        <div class="sessoes container" >
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="img/esmalteria.png" alt="ESMALTERIA" style="min-width: 500px;">
                <div class="content-details fadeIn-top">
                    <h3>ESMALTERIA</h3>
                    <a class="btn btnSeeMore" href="esmalteria/">SAIBA MAIS</a>
                </div>
            </div>
        </div>

        <div class="sessoes container">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="img/corporal.png" alt="ESTÉTICA CORPORAL" style="min-width: 500px;">
                <div class="content-details fadeIn-top">
                    <h3>ESTÉTICA CORPORAL</h3>
                    <a class="btn btnSeeMore" href="esteticacorporal/">SAIBA MAIS</a>
                </div>
            </div>
        </div>

        <div class="sessoes container">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="img/salao.png" style="min-width:600px;" alt="SALÃO">
                <div class="content-details fadeIn-top">
                    <h3>SALÃO</h3>
                    <a class="btn btnSeeMore" href="salao/">SAIBA MAIS</a>
                </div>
            </div>
        </div>

        <div class="sessoes container">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="img/facial.png" alt="ESTÉTICA FACIAL" style="min-width: 500px;">
                <div class="content-details fadeIn-top">
                    <h3>ESTÉTICA FACIAL</h3>
                    <a class="btn btnSeeMore" href="esteticafacial/">SAIBA MAIS</a>
                </div>
            </div>
        </div>

        <div class="sessoes container">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="img/cilios.png" alt="CÍLIOS E DESIGN" style="min-width: 500px;">
                <div class="content-details fadeIn-top">
                    <h3>CÍLIOS E DESIGN</h3>
                    <a class="btn btnSeeMore" href="cilios/">SAIBA MAIS</a>
                </div>
            </div>
        </div>

        <div class="sessoes container">
            <div class="content">
                <div class="content-overlay"></div>
                <img class="content-image" src="img/micro.png" style="min-width:600px;" alt="MICROPIGMENTAÇÃO">
                <div class="content-details fadeIn-top">
                    <h3>MICROPIGMENTAÇÃO </h3>
                    <a class="btn btnSeeMore" href="micropigmentacao/">SAIBA MAIS</a>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Depoimentos -->
<div class="position-relative overflow-hidden p-3 text-center backgroundGrey">
    <div class="col-md-12 p-lg-12 mx-auto my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-center m-auto">
                    <h4 class="textDarkGrey" style="margin-bottom: 0!important">MAIS SOBRE NÓS</h4>
                    <h3 class="textPink">DEPOIMENTOS</h3>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators ">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <div class="img-box"><img src="img/depo/showliana.jpeg" class="img-fluid" alt="foto-shwoliana"></div>
                                <h5 class="font-weight-bold textDarkGrey mt-4">@showliana</h5>
                                <h4 class="font-weight-light textDarkGrey text-uppercase">SUPER RECOMENDO!</h4>
                                <p class="testimonial">
                                    Sempre me considerei uma pessoa vaidosa mas nunca fui muito antenada nas novidades em tratamentos estéticos, até que conheci a Mimo.
                                    A proposta de trazer esses procedimentos a valores acessíveis é incrível, e toda vez que saio de lá, sinto como se tivesse renovado as energias, porque separar um tempinho pra cuidar de mim mesma é maravilhoso e os profissionais da Mimo são todos uns amores, dá vontade de ficar lá pra sempre.                                 </p>
                            </div>
                            <div class="item carousel-item">
                                <div class="img-box"><img src="img/depo/mamoderoso.jpeg" class="img-fluid" alt="foto-mamoderoso"></div>
                                <h5 class="font-weight-bold textDarkGrey mt-4">@mamoderoso</h5>
                                <h4 class="font-weight-light textDarkGrey text-uppercase">Assim que cheguei na Mimo, nunca mais saí!</h4>
                                <p class="testimonial">
                                    A mimo pra mim foi a descoberta de um lugar novo na minha vida. Era uma portinha com uma recepção e duas salas, com duas meninas que conquistaram meu coração. Assim que cheguei na Mimo, nunca mais saí. Fez parte de me sentir mais eu e mais feliz comigo mesma. E ver cada fase dessa portinha com duas salas, crescer tanto, num lugar incrível, com diversas opções pra fazer milhares de meninas como eu se sentirem mais felizes consigo mesmas. Todo mundo que trabalha lá me conquistou, além de fazerem um trabalho impecável e com todo carinho. Desejo só mais sucesso e amor pra esse lugar incrível, e pra essas duas meninas que eu amo! ❤                                </p>
                            </div>
                            <div class="item carousel-item">
                                <div class="img-box"><img src="img/depo/livcordeiro.jpeg" class="img-fluid" alt="foto-livcordeiro"></div>
                                <h5 class="font-weight-bold textDarkGrey mt-4">@livcordeiro</h5>
                                <h4 class="font-weight-light textDarkGrey text-uppercase">Saio de lá me sentindo bem comigo mesma e com as energias renovadas!</h4>
                                <p class="testimonial">
                                    Já vou na mimo a uma ano e com certeza é um dos meus lugares favoritos da vida! Sempre fui muito bem atendida e todos os procedimentos me agradaram muito, além da energia maravilhosa que o lugar tem! Saio de lá me sentindo bem comigo mesma e com as energias renovadas. Recomendo muito!                                </p>
                            </div>
                            <div class="item carousel-item">
                                <div class="img-box"><img src="img/depo/cathamendonca.jpeg" class="img-fluid" alt="foto-cathamendonca"></div>
                                <h5 class="font-weight-bold textDarkGrey mt-4">@cathamendonca</h5>
                                <h4 class="font-weight-light textDarkGrey text-uppercase">indico pra todo mundo ❤</h4>
                                <p class="testimonial">
                                    Pra quem vem de outro estado, é bem difícil encontrar lugares onde a gente se sinta em casa. Com a Mimo foi assim, eu comecei indo fazer uma coisinha aqui e outra ali e agora faço boa parte dos procedimentos disponíveis. E são as horas mais relaxantes da semana. Depois disso, eu mudei muito a forma como eu me vejo e as outras pessoas sempre comentam como notam essa diferença em mim. Me sinto parte, indico pra todo mundo e torço pra que a Mimo cresça muito mais.
                                </p>
                            </div>
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left carousel-control-prev d-none d-md-flex" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next d-none d-md-flex" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="promo">
<div id="carouselExampleIndicators3" class="carousel slide d-none d-sm-block" data-ride="carousel" style="height: 100%;
    overflow: hidden; margin: 0; padding: 0;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="d-block w-100">
                <img src="img/promocional/jan/ferias.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <img src="img/promocional/jan/promosdomes_cronogramacapilar.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <img src="img/promocional/jan/promosdomes_cilios.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <img src="img/promocional/jan/promosdomes_esmalteria.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <img src="img/promocional/jan/promosdomes_estetica.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Carousel Mobile -->
<div id="carouselExampleIndicators2" class="carousel slide d-block d-sm-none" data-ride="carousel" style="height: 100%;
    overflow: hidden; margin: 0; padding: 0;">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="d-block w-100">
                <img src="img/mobile_promocional/jan/promo_janeiro_ferias1.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <img src="img/mobile_promocional/jan/promo_janeiro_cronograma-capilar.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <img src="img/mobile_promocional/jan/promo_janeiro_cilios.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <img src="img/mobile_promocional/jan/promo_janeiro_esmalteria.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <img src="img/mobile_promocional/jan/promo_janeiro_estetica.png" style="width: 100%" alt="fotos-promoção-do-mês">
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>

<div class="layerCor" id="contact">
    <div class="backgroundLogo py-md-5">
        <div class="d-md-flex flex-md-equal row py-md-5" style="margin-right:0!important; overflow-x: hidden">
            <div class="infos-form text-white col-md-12">
                <ul class="float-right text-align-right mr-5" style="margin-top: 85px;" id="infos-gerais">
                    <li class="nav-item mt-md-3">
                        <h5 class="textPink font-weight-normal mb-md-1">Endereço</h5>
                        <p>Rua Oscar Freire 2604</p>
                        <p>SÃO PAULO - SP</p>
                    </li>
                    <li class="nav-item mt-md-3">
                        <h5 class="textPink font-weight-normal mb-md-1">Telefone</h5>
                        <p>(11) 99478-1012</p>
                    </li>
                    <li class="nav-item font-weight-light mt-md-3">
                        <h5 class="textPink font-weight-normal mb-md-1">Horário de <br/>funcionamento</h5>
                        <p>SEG À SEX</p>
                        <p>10h às 19:30h</p>
                        <p>SÁB</p>
                        <p>10h às 16h</p>
                    </li>
                </ul>
            </div>
            <div class="bg-form text-center text-white overflow-hidden">
                <div class="form">
                    <div class="container-contact100">

                        <div class="wrap-contact100">
                            <form class="contact100-form validate-form" id="form-mobile" enctype="multipart/form-data" action="index.php#contact" method="POST">
                                <h5 class="font-weight-light text-align-left">DÚVIDAS OU SUGESTÕES?</h5>
                                <h4 class="font-weight-bold text-align-left mb-4" style="letter-spacing: 2px;">ENTRE EM CONTATO</h4>

                                <?php if (isset($is_mail_sent) && $is_mail_sent) { ?>
                                    <div class="alert alert-success" role="alert">
                                        Sua mensagem foi enviada com sucesso!
                                    </div>
                                <?php } else if (isset($is_mail_sent)) { ?>
                                    <div class="alert alert-warning" role="alert">
                                        Desculpe, sua mensagem não pode ser enviada. <br>Tente novamente mais tarde.
                                    </div>
                                <?php } ?>

                                <div class="wrap-input100 validate-input" data-validate="Insira seu nome completo">
                                    <input class="input100" type="text" name="name" placeholder="Nome completo">
                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "Insira um e-mail válido, ex: nome@algo.com.br">
                                    <input class="input100" type="text" name="email" placeholder="E-mail">
                                </div>

                                <div class="" data-validate = "Selecione o assunto">
                                    <select class="wrap-input100 validate-input assunto-form" id="exampleFormControlSelect1" name="subject">
                                        <option disabled>Selecione o assunto</option>
                                        <option>Dúvidas</option>
                                        <option>Agradecimentos/Depoimentos</option>
                                        <option>Outro</option>
                                    </select>
                                </div>


                                <div class="wrap-input100 validate-input" data-validate = "Por favor, digite uma mensagem aqui.">
                                    <textarea class="input100" name="message" placeholder="Sua mensagem aqui"></textarea>
                                </div>

                                <div class="container-contact100-form-btn" style="justify-content: flex-end;">
                                    <button class="contact100-form-btn" type="submit" name="submit" id="submit">
                                        <span class="font-weight-bold textDarkGrey" style="letter-spacing: 2px;">ENVIAR</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="align-content-center text-center col-md-2">
                <div class="box-redes-sociais">
                    <h5 class="text-white text-redes">NOS ACOMPANHE <br/> NAS REDES SOCIAIS</h5>
                    <ul class="navbar-nav ml-auto" style="display: -webkit-inline-box;">
                        <li class="nav-item active">
                            <a class="nav-link" href="https://www.instagram.com/mimoestetica/" target="_blank"><i class="fab fa-instagram textPink"></i></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="https://www.facebook.com/mimocuidadoebeleza/" target="_blank"><i class="fab fa-facebook-square textPink pl-4 pr-4 "></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511994781012" target="_blank"><i class="fab fa-whatsapp textPink"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>


<footer class="container">
    <div class="row">
        <div class="col-12 col-md my-2 py-2">
            <small class="d-block text-muted text-center" style="line-height: 3;">&copy; MIMO Estética 2018 | Todos os direitos reservados</small>
        </div>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="bootstrap/jquery/dist/jquery.slim.min.js"><\/script>')</script>
<script src="bootstrap/popper.js/dist/popper.min.js"></script>
<script src="bootstrap/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="form/main.js"></script>
<script src="main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>

<script>
    if($('.carousel').length){
        $('.carousel').carousel({interval: 7000, pause: false });
        $(".carousel").swipe({
            swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
                if (direction == 'left') $(this).carousel('next');
                if (direction == 'right') $(this).carousel('prev');
            },
            allowPageScroll:"vertical"
        });
    }
</script>

<!-- Piwik -->
<script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="http://cluster-piwik.locaweb.com.br/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 28515]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<!-- End Piwik Code -->


</body>
</html>