<?php
session_start();
include_once('php/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/ofertas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon_logo_dumont_32x32.png" type="image/x-icon">
    <title>DUMONT - Ofertas</title>
</head>

<body>
    <header>

        <!--INICIO BARRA DE NAVEGAÇÃO-->
        <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img id="logo_navbar_dumont" width="150"
                        src="img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

                <div id="links_navbar">
                    <a style="color: white;" id="link_nav1" class="nav-link" href="index.php">Home</a>
                    <a style="color: white;" id="link_nav2" class="nav-link" href="reserva.php">Passagens</a>
                    <a style="color: white;" id="link_nav3" class="nav-link" href="ofertas.php">Ofertas</a>

                    <?php
                    if (!isset($_SESSION['verifica_cliente'])) {
                        echo "<a style='color: white; !important' id='link_nav4' class='nav-link' href='login.php'>Entrar</a>";

                    } else if (!isset($_SESSION['verifica_login'])) {
                        echo "<a style='color: white; !important' id='link_nav4' class='nav-link' href='login.php'>Entrar</a>";

                    } else {
                        echo "<a style='color: white; !important' id='link_nav4' class='nav-link' href='php/proc_sair_conta.php'>Sair</a>";
                    }
                    ?>

                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h2 style="color: #460AC6;" class="offcanvas-title" id="offcanvasNavbarLabel">DUMONT</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                            <?php

                            if (isset($_SESSION['verifica_cliente'])) {

                                echo "<h3 style='color: #460AC6; padding-left: 16px; !important'>$_SESSION[nome_cliente]</h3>";


                            } else if (isset($_SESSION['verifica_login'])) {

                                echo "<h3 style='color: #460AC6; padding-left: 16px; !important'>$_SESSION[verifica_login]</h3>";

                            } else {

                                echo " <button id='btn-burguer'><a style='color: white; text-decoration: none;' href='login.php'> Entre ou
              cadastre-se</a></button>
              <hr style='margin-top: 20px; margin-bottom: 20px;'>";

                            }

                            ?>



                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="perfil.php"> <img id="icon_aviao"
                                        src="img/person-circle.svg" alt="Ícone de login"> Minha conta</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="php/minhas_viagens.php"> <img
                                        id="icon_aviao" src="img/airplane-engines.svg" alt="Ícone de um avião"> Minhas
                                    viagens</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="reserva.php"> <img id="icon_ticket"
                                        src="img/ticket.svg" alt="Ícone de um ticket"> Passagens aéreas</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="ofertas.php"> <img id="icon_fogo"
                                        src="img/fire.svg" alt="Ícone Fogo"> Ofertas</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="contato.php"> <img id="icon_tel"
                                        src="img/telephone.svg" alt="Ícone Telefone"> Contato</a>
                            </li>

                            <?php
                            if (isset($_SESSION['verifica_cliente']) or isset($_SESSION['verifica_login'])) {
                                echo "<li class='nav-item'>
                                        <a style='color: #460AC6;' class='nav-link' href='php/proc_sair_conta.php'> <img id='icon_tel' src='img/iconsaida.svg'
                                        alt='Ícone Saída'> Sair</a>
                                        </li>
                                        ";
                            }

                            ?>


                    </div>
                </div>
            </div>
        </nav>
        <!--FIM BARRA DE NAVEGAÇÃO-->

        <img src="img/familia_feliz_aeroporto.jpg" class="img-fluid" alt="imagem de uma família feliz em um aeroporto">
    </header>

    <main class=" mt-5">
        <div class="container">
            <div class="row">
                <h1 class="text-uppercase">confira nossas ofertas</h1>
            </div>

            <!-- primeira parte do main de ofertas -->
            <!-- oferta fortaleza -->
            <div class="row container my-5 mx-0">
                <div id="card_oferta" class="col-lg-3 card mx-auto d-block p-0 rounded text-white border-0">
                    <img src="img/fortaleza.jpg" id="img_oferta" class="card-img-top rounded-top"
                        alt="imagem da praia de fortaleza, no ceará">

                    <div class="card-body">
                        <p id="oferta_imperdivel" class="card-text text-uppercase text-white bg-danger p-1">oferta
                            imperdível</p>
                        <h5 id="titulo_oferta" class="card-title text-uppercase mt-2">vôo á fortaleza</h5>
                        <p id="txt_oferta" class="card-text text-uppercase">ida e volta</p>
                        <h2 id="preco_oferta" class="text-uppercase m-0">r$547,00</h2>
                        <form action="reserva.php" method="post">
                            <input type="hidden" name="oferta_viagem"
                                value="Aeroporto Internacional De Fortaleza - Pinto Martins (FOR)">
                            <button id="botao_card_oferta"
                                class="btn text-uppercase text-white m-auto d-block fw-bold w-75 mt-3"
                                type="submit">comprar</button>
                        </form>
                    </div>
                </div>

                <!-- oferta salvador -->
                <div id="card_oferta" class="col-lg-3 card mx-auto d-block p-0 rounded text-white border-0">
                    <img src="img/salvador.jpg" id="img_oferta" class="card-img-top rounded-top"
                        alt="imagem da praia de salvador, na bahia">

                    <div class="card-body">
                        <p id="oferta_imperdivel" class="card-text text-uppercase text-white bg-danger p-1">oferta
                            imperdível</p>
                        <h5 id="titulo_oferta" class="card-title text-uppercase mt-2">vôo á salvador</h5>
                        <p id="txt_oferta" class="card-text text-uppercase">ida e volta</p>
                        <h2 id="preco_oferta" class="text-uppercase m-0">r$600,00</h2>
                        <form action="reserva.php" method="post">
                            <input type="hidden" name="oferta_viagem"
                                value="Aeroporto Internacional De Salvador - Dep. Luís Eduardo Magalhães (SSA)">
                            <button id="botao_card_oferta"
                                class="btn text-uppercase text-white m-auto d-block fw-bold w-75 mt-3"
                                type="submit">comprar</button>
                        </form>
                    </div>
                </div>

                <!-- oferta recife -->
                <div id="card_oferta" class="col-lg-3 card mx-auto d-block p-0 rounded text-white border-0">
                    <img src="img/recife.jpg" id="img_oferta" class="card-img-top rounded-top"
                        alt="imagem de uma ponte, em uma floresta de recife, em pernambuco">

                    <div class="card-body">
                        <p id="oferta_imperdivel" class="card-text text-uppercase text-white bg-danger p-1">oferta
                            imperdível</p>
                        <h5 id="titulo_oferta" class="card-title text-uppercase mt-2">vôo para recife</h5>
                        <p id="txt_oferta" class="card-text text-uppercase">ida e volta</p>
                        <h2 id="preco_oferta" class="text-uppercase m-0">r$650,00</h2>
                        <form action="reserva.php" method="post">
                            <input type="hidden" name="oferta_viagem"
                                value="Aeroporto Internacional de Recife/Guararapes-Gilberto Freyre (REC)">
                            <button id="botao_card_oferta"
                                class="btn text-uppercase text-white m-auto d-block fw-bold w-75 mt-3"
                                type="submit">comprar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Segunda parte do main de ofertas - carousel -->
        <div id="oferta_carousel" class="container-fluid">
            <div class="container">
                <h2 class="text-uppercase text-white py-3">mais ofertas</h2>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>

                <div class="carousel-inner container">
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- oferta são paulo -->
                            <div id="card_oferta_semana" class="col-lg-3 card mx-auto d-block p-0 rounded border-0">
                                <img src="img/sao_paulo.jpg" id="img_carousel" class="card-img-top rounded-top"
                                    alt="imagem da cidade de são paulo">

                                <div class="card-body">
                                    <h5 class="card-title text-uppercase mt-2">vôo para são paulo</h5>
                                    <p class="card-text text-uppercase">ida e volta</p>
                                    <h2 class="text-center text-uppercase">r$500,00</h2>
                                    <form action="reserva.php" method="post">
                                        <input type="hidden" name="oferta_viagem"
                                            value="Aeroporto de São Paulo/Congonhas (CGH)">
                                        <button id="botao_oferta_semana"
                                            class="btn text-uppercase text-white fw-bold mx-auto d-block mt-4 w-75">comprar</button>
                                    </form>
                                </div>
                            </div>

                            <!-- oferta rio de janeiro -->
                            <div id="card_oferta_semana" class="col-lg-3 card mx-auto d-block p-0 rounded border-0">
                                <img src="img/rio_de_janeiro.jpg" id="img_carousel" class="card-img-top rounded-top"
                                    alt="imagem da cidade e da praia no rio de janeiro">

                                <div class="card-body">
                                    <h5 class="card-title text-uppercase mt-2">vôo á rio de janeiro</h5>
                                    <p class="card-text text-uppercase">ida e volta</p>
                                    <h2 class="text-center text-uppercase">r$871,00</h2>
                                    <form action="reserva.php" method="post">
                                        <input type="hidden" name="oferta_viagem"
                                            value="Aeroporto Internacional Tom Jobim/Galeão (GIG)">
                                        <button id="botao_oferta_semana"
                                            class="btn text-uppercase text-white fw-bold mx-auto d-block mt-4 w-75">comprar</button>
                                    </form>
                                </div>
                            </div>

                            <!-- oferta rio branco -->
                            <div id="card_oferta_semana" class="col-lg-3 card mx-auto d-block p-0 rounded border-0">
                                <img src="img/rio_branco.jpg" id="img_carousel" class="card-img-top rounded-top"
                                    alt="imagem de uma ponte na cidade de rio branco, no acre">

                                <div class="card-body">
                                    <h5 class="card-title text-uppercase mt-2">vôo para rio branco</h5>
                                    <p class="card-text text-uppercase">ida e volta</p>
                                    <h2 class="text-center text-uppercase">r$900,00</h2>
                                    <form action="reserva.php" method="post">
                                        <input type="hidden" name="oferta_viagem"
                                            value="Aeroporto Internacional de Rio Branco - Plácido De Castro(RBR)">
                                        <button id="botao_oferta_semana"
                                            class="btn text-uppercase text-white fw-bold mx-auto d-block mt-4 w-75">comprar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row my-">
                            <!-- oferta manaus -->
                            <div id="card_oferta_semana" class="col-lg-3 card mx-auto d-block p-0 rounded border-0">
                                <img src="img/manaus.jpg" id="img_carousel" class="card-img-top rounded-top"
                                    alt="imagem da floresta de manaus, no amazonas">

                                <div class="card-body">
                                    <h5 class="card-title text-uppercase mt-2">vôo para manaus</h5>
                                    <p class="card-text text-uppercase">ida e volta</p>
                                    <h2 class="text-center text-uppercase">r$890,00</h2>
                                    <form action="reserva.php" method="post">
                                        <input type="hidden" name="oferta_viagem"
                                            value="Aeroporto internacional de Manaus - Eduardo Gomes (MAO)">
                                        <button id="botao_oferta_semana"
                                            class="btn text-uppercase text-white fw-bold mx-auto d-block mt-4 w-75">comprar</button>
                                    </form>
                                </div>
                            </div>

                            <!-- oferta cuiabá -->
                            <div id="card_oferta_semana" class="col-lg-3 card mx-auto d-block p-0 rounded border-0">
                                <img src="img/cuiaba.jpg" id="img_carousel" class="card-img-top rounded-top"
                                    alt="imagem da cidade de cuiabá, no mato grosso">

                                <div class="card-body">
                                    <h5 class="card-title text-uppercase mt-2">vôo para cuiabá</h5>
                                    <p class="card-text text-uppercase">ida e volta</p>
                                    <h2 class="text-center text-uppercase">r$750,00</h2>
                                    <form action="reserva.php" method="post">
                                        <input type="hidden" name="oferta_viagem"
                                            value="Aeroporto Internacional de Cuiabá - Marechal Rondon (CGB)">
                                        <button id="botao_oferta_semana"
                                            class="btn text-uppercase text-white fw-bold mx-auto d-block mt-4 w-75">comprar</button>
                                    </form>
                                </div>
                            </div>


                            <!-- oferta teresina -->
                            <div id="card_oferta_semana" class="col-lg-3 card mx-auto d-block p-0 rounded border-0">
                                <img src="img/teresina.jpg" id="img_carousel" class="card-img-top rounded-top"
                                    alt="imagem de um pôr do sol em uma floresta de teresina, no piauí">

                                <div class="card-body">
                                    <h5 class="card-title text-uppercase mt-2">vôo para teresina</h5>
                                    <p class="card-text text-uppercase">ida e volta</p>
                                    <h2 class="text-center text-uppercase">r$825,00</h2>
                                    <form action="reserva.php" method="post">
                                        <input type="hidden" name="oferta_viagem"
                                            value="Aeroporto de Teresina - Senador Petrônio Portela (SBTE)">
                                        <button id="botao_oferta_semana"
                                            class="btn text-uppercase text-white fw-bold mx-auto d-block mt-4 w-75">comprar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                <button class="carousel-control-prev pe-5" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next ps-5" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </main>

    <!--INICIO RODAPÉ-->
    <div id="rodape" class="container-fluid">
        <div class="row">

            <div id="lugares_viajar" class="col-sm">
                <p><strong>Lugares para viajar</strong></p>
                <a class="text-white text-decoration-none" href="ofertas.php">Salvador</a>
                <br>
                <a class="text-white text-decoration-none" href="ofertas.php">Rio de Janeiro</a>
                <br>

                <a class="text-white text-decoration-none" href="ofertas.php">Porto de Galinhas</a>
            </div>

            <div class="col-sm">
                <p><strong>Companhías Aéreas</strong></p>
                <a class="text-white text-decoration-none" href="https://www.latamairlines.com/"
                    target="_blank">Latam</a>
                <br>
                <a class="text-white text-decoration-none" href="https://www.voegol.com.br/" target="_blank">Gol</a>
                <br>
                <a class="text-white text-decoration-none" href="https://www.voeazul.com.br/" target="_blank">Azul</a>
            </div>

            <div class="col-sm">
                <p><strong>Redes Socias</strong></p>

                <a class="text-white text-decoration-none" href="https://www.instagram.com/"><img
                        src="img/instagram.svg" alt="Ícone do Instagram">Instagram</a>
                <br>
                <a class="text-white text-decoration-none" href="https://pt-br.facebook.com/" target="_blank"><img
                        src="img/facebook.svg" alt="Ícone do Facebook">
                    Facebook</a>
                <br>
                <a class="text-white text-decoration-none" href="https://twitter.com/" target="_blank"><img
                        src="img/twitter.svg" alt="Ícone do Twitter">
                    Twitter</a>
            </div>

        </div>
    </div>
    <!--FIM RODAPÉ-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>