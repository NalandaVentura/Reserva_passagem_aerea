<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar aeronaves</title>
    <link rel="stylesheet" href="../css/listar_aeronaves.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/buscar.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/favicon_logo_dumont_32x32.png" type="image/x-icon">
</head>

</html>

<?php
session_start();
include_once('conexao.php');
unset($_SESSION['verifica_login']);
unset($_SESSION['verifica_cliente']);
unset($_SESSION['nome_cliente'] );
unset($_SESSION['sobrenome_cliente']);
unset($_SESSION['cpf_cliente'] );
unset($_SESSION['datanasci_cliente']);
//Tabela cadastro
unset($_SESSION['email_cliente'] );
unset($_SESSION['senha_cliente'] );
unset($_SESSION['funcionamento_cliente'] );
//Tabela rg
unset($_SESSION['rg_cliente'] );
//Tabela endereco
unset($_SESSION['cep_cliente'] );
unset($_SESSION['rua_cliente'] );
unset($_SESSION['bairro_cliente']);
unset($_SESSION['cidade_cliente']);
unset($_SESSION['uf_cliente']);
//Tabela contato_cliente$_SESSION['numero_cliente']);
unset($_SESSION['telefone_cliente']);
unset($_SESSION['celular_cliente']);

header('Location: ../login.php');
?>