<?php
//iniciando uma sessão no php
session_start();
include_once('conexao.php');

/*mapeando o caminho para fazer conexão com o arquivo.php, onde este também faz uma conexão, mas com o banco de dados.*/

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sqlSelect = "SELECT * FROM cliente INNER JOIN cadastro ON cliente.pk_cliente = cadastro.fk_cliente INNER JOIN rg ON cliente.pk_cliente = rg.fk_cliente INNER JOIN endereco ON cliente.pk_cliente = endereco.fk_cliente INNER JOIN contato_cliente ON cliente.pk_cliente = contato_cliente.fk_cliente WHERE pk_cliente='$id' ORDER BY pk_cliente DESC";
$result = mysqli_query($conn, $sqlSelect);
$user_data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title> Editar cadastro</title>
</head>

<body>

    <header>
        <!--INICIO BARRA DE NAVEGAÇÃO-->
        <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="../home_adm.php"><img id="logo_navbar_dumont" width="150"
                        src="../img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

                <div id="links_navbar">
                    <a style="color: white;" id="link_nav1" class="nav-link" href="relatorio.php">Relatorios</a>
                    <a style="color: white;" id="link_nav2" class="nav-link" href="../inserir_aeronave.php">Inserir
                        aviões</a>
                    <a style="color: white;" id="link_nav3" class="nav-link" href="listar_aeronaves.php">Lista de
                        aeronaves</a>
                    <!-- <a style="color: white;" id="link_nav4" class="nav-link" href="#">Reservas</a> -->
                    <!-- <a style="color: white;" id="link_nav4" class="nav-link" href="lista_feedback.php">Feedback</a> -->
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 style="color: #460AC6;" class="offcanvas-title" id="offcanvasNavbarLabel">DUMONT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">

                        <h4 style="color: #460AC6; ">
                            <?php
                            echo "Administrador: " . $_SESSION['nome_login'];
                            ?>
                        </h4>

                        <hr style="margin-top: 20px; margin-bottom: 20px;">

                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="../inserir_aeronave.php"> <img
                                        id="icon_aviao" src="../img/airplane-engines.svg" alt="Ícone de um avião">
                                    Inserir aviões</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_ticket"
                                        src="../img/ticket.svg" alt="Ícone de um ticket"> Reservas</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="listar_aeronaves.php"> <img
                                        id="icon_fogo" src="../img/wind.svg" alt="Ícone Fogo"> Lista de aeronaves</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="relatorio.php"> <img id="icon_fogo"
                                        src="../img/iconrelatorio.svg" alt="Ícone Fogo"> Relatórios</a>
                            </li>

                            <li class="nav-item">
                                <a style="color: #460AC6;" class="nav-link" href="#"> <img id="icon_fogo"
                                        src="../img/person-circle.svg" alt="Ícone Fogo"> Clientes</a>
                            </li>

                            <?php
                            if (isset($_SESSION['verifica_cliente']) or isset($_SESSION['verifica_login'])) {
                                echo "<li class='nav-item'>
                                        <a style='color: #460AC6;' class='nav-link' href='proc_sair_conta.php'> <img id='icon_tel' src='../img/iconsaida.svg'
                                        alt='Ícone Saída'> Sair</a>
                                        </li>
                                        ";
                            }

                            ?>


                    </div>
                </div>
            </div>
        </nav>
    </header>


    <!--FIM BARRA DE NAVEGAÇÃO-->



    <!-- FORMULÁRIO DE CADASTRO -->
    <main class="my-5">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div id="formulario" class="border border-3 rounded-3">
            <div class="row">
                <h1 class="text-uppercase text-center">Editar cadastro</h1>
            </div>

            <form action="proc_edit.php" method="post">
                <input type="hidden" name="pk_cliente" value="<?php echo $user_data['pk_cliente']; ?>">
                <!-- coletando o id de um registro no banco de dados-->
                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label" for="nome">Nome *</label>
                        <input class="form-control" type="text" name="nome" id="nome"
                            value="<?php echo $user_data['nome']; ?>" required autofocus>
                    </div>


                    <div class="col-sm-6">
                        <label class="form-label" for="sobrenome">Sobrenome *</label>
                        <input class="form-control" type="text" name="sobrenome" id="sobrenome"
                            value="<?php echo $user_data['sobrenome']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div id="documento" class="col-sm-3">
                        <label class="form-label" for="cpf">CPF *</label>
                        <input class="form-control" type="text" name="cpf" id="cpf" minlength="11" maxlength="11"
                            value="<?php echo $user_data['cpf']; ?>" required>

                        <?php
                        if (isset($_SESSION['msg_cpf'])) {
                            echo $_SESSION['msg_cpf'];
                            unset($_SESSION['msg_cpf']);
                        }
                        ?>
                    </div>

                    <div id="documento" class="col-sm-3">
                        <label class="form-label" for="rg">RG *</label>
                        <input class="form-control" type="text" name="rg" id="rg" minlength="9" maxlength="9"
                            value="<?php echo $user_data['rg']; ?>" required>

                        <?php
                        if (isset($_SESSION['msg_rg'])) {
                            echo $_SESSION['msg_rg'];
                            unset($_SESSION['msg_rg']);
                        }
                        ?>
                    </div>

                    <div id="data" class="col-sm-3">
                        <label class="form-label" for="emissao_rg">Emissão *</label>
                        <input class="form-control" type="date" name="emissao_rg" id="emissao_rg"
                            value="<?php echo $user_data['emissao_rg']; ?>"
                            min="<?php echo date('Y-m-d', strtotime('-10 year')) ?>" max="<?php echo date('Y-m-d'); ?>"
                            required>

                        <?php
                        if (isset($_SESSION['msg_emissao'])) {
                            echo $_SESSION['msg_emissao'];
                            unset($_SESSION['msg_emissao']);
                        }
                        ?>
                    </div>

                    <div id="data" class="col-sm-3">
                        <label class="form-label" for="data_nascimento">Nascimento *</label>
                        <input class="form-control" type="date" name="data_nascimento" id="data_nascimento"
                            value="<?php echo $user_data['data_nasci']; ?>"
                            min="<?php echo date('Y-m-d', strtotime('-120 year')); ?>"
                            max="<?php echo date('Y-m-d', strtotime('-18 year')); ?>" required>

                        <?php
                        if (isset($_SESSION['msg_nascimento'])) {
                            echo $_SESSION['msg_nascimento'];
                            unset($_SESSION['msg_nascimento']);
                        }
                        ?>
                    </div>
                </div>

                <div>
                    <label class="form-label" for="email">E-mail *</label>
                    <input class="form-control" type="email" name="email" id="email"
                        value="<?php echo $user_data['email']; ?>" required>

                    <?php
                    if (isset($_SESSION['msg_email'])) {
                        echo $_SESSION['msg_email'];
                        unset($_SESSION['msg_email']);
                    }
                    ?>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label" for="senha">Senha *</label>
                        <input class="form-control" type="password" name="senha" id="senha"
                            value="<?php echo $user_data['senha']; ?>" required>

                        <?php
                        if (isset($_SESSION['msg_senha'])) {
                            echo $_SESSION['msg_senha'];
                            unset($_SESSION['msg_senha']);
                        }
                        ?>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label" for="senha_confirm">Confirmar senha *</label>
                        <input class="form-control" type="password" name="senha_confirm" id="senha_confirm"
                            value="<?php echo $user_data['senha']; ?>" required>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <label class="form-label" for="cep">CEP *</label>
                        <input class="form-control" type="number" name="cep" id="cep" onblur="pesquisacep(this.value);"
                            value="<?php echo $user_data['cep']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9">
                        <label class="form-label" for="rua">Rua</label>
                        <input class="form-control" type="text" name="rua" id="rua"
                            value="<?php echo $user_data['rua']; ?>" required>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label" for="num_casa">Nº *</label>
                        <input class="form-control" type="number" name="num_casa" id="num_casa"
                            value="<?php echo $user_data['numero']; ?>" required>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-5">
                        <label class="form-label" for="bairro">Bairro</label>
                        <input class="form-control" type="text" name="bairro" id="bairro"
                            value="<?php echo $user_data['bairro']; ?>" required>
                    </div>
                    <div class="col-sm-5">
                        <label class="form-label" for="cidade">Cidade</label>
                        <input class="form-control" type="text" name="cidade" id="cidade"
                            value="<?php echo $user_data['cidade']; ?>">
                    </div>

                    <div class="col-sm-2">
                        <label class="form-label" for="uf">UF</label>
                        <input class="form-control" type="text" name="uf" id="uf"
                            value="<?php echo $user_data['uf']; ?>">
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-3">
                        <label class="form-label" for="telefone">Telefone</label>
                        <input class="form-control" type="number" name="telefone" id="telefone" min="1100000000"
                            max="1199999999" value="<?php echo $user_data['telefone']; ?>">
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label" for="celular">Celular *</label>
                        <input class="form-control" type="number" name="celular" id="celular" min="11900000000"
                            max="11999999999" value="<?php echo $user_data['celular']; ?>" required>
                    </div>
                </div>

                <button class="btn text-white m-auto d-block mt-5 text-uppercase fw-bold" href="proc_edit.php"
                    id="update" type="submit">editar</button>
            </form>
            <!-- //LEMBRAR DE MUDAR ESSE BOTÃO // -->
            <a href="gerenc_usuario2.php" class="btn btn-primary btn-sm active" role="button"
                aria-pressed="true">voltar</a>
        </div>

    </main>
    <!-- FIM - FORMULÁRIO DE CADASTRO -->

    <!--INICIO RODAPÉ-->
    <div id="rodape" class="container-fluid">
        <div class="row">

            <div id="lugares_viajar" class="col-sm">
                <p><strong>Lugares para viajar</strong></p>
                <a class="text-white text-decoration-none" href="../ofertas.php">Salvador</a>
                <br>
                <a class="text-white text-decoration-none" href="../ofertas.php">Rio de Janeiro</a>
                <br>

                <a class="text-white text-decoration-none" href="../ofertas.php">Porto de Galinhas</a>
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
                        src="../img/instagram.svg" alt="Ícone do Instagram">Instagram</a>
                <br>
                <a class="text-white text-decoration-none" href="https://pt-br.facebook.com/" target="_blank"><img
                        src="../img/facebook.svg" alt="Ícone do Facebook">
                    Facebook</a>
                <br>
                <a class="text-white text-decoration-none" href="https://twitter.com/" target="_blank"><img
                        src="../img/twitter.svg" alt="Ícone do Twitter">
                    Twitter</a>
            </div>

        </div>
    </div>
    <!--FIM RODAPÉ-->
    <script src="js/cadastro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>