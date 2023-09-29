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

if (!isset($_SESSION['verifica_cliente'])) {
    // Se não estiver autenticado, redireciona para a página de login
    header("Location: ../login.php");
    exit;
}

$cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM cliente INNER JOIN rg ON cliente.pk_cliente = rg.fk_cliente INNER JOIN contato_cliente ON cliente.pk_cliente = contato_cliente.fk_cliente INNER JOIN endereco ON cliente.pk_cliente = endereco.fk_cliente INNER JOIN cadastro ON cliente.pk_cliente = cadastro.fk_cliente WHERE cliente.cpf = '$cpf'";

$resultado = mysqli_query($conn, $sql);

// Condicional para saber se o usuário existe e resgatar os dados dele, verificar se ele é cliente ou mantenedor do sistema
if (mysqli_affected_rows($conn)) {
    while ($linha = mysqli_fetch_assoc($resultado)) {

        //Tabela Clientes
        $_SESSION['verifica_cliente'] = $linha['pk_cliente'];
        $_SESSION['nome_cliente'] = $linha['nome'];
        $_SESSION['sobrenome_cliente'] = $linha['sobrenome'];
        $_SESSION['cpf_cliente'] = $linha['cpf'];
        $_SESSION['datanasci_cliente'] = $linha['data_nasci'];
        //Tabela cadastro
        $_SESSION['email_cliente'] = $linha['email'];
        $_SESSION['senha_cliente'] = $linha['senha'];
        $_SESSION['funcionamento_cliente'] = $linha['funcionamento'];
        //Tabela rg
        $_SESSION['rg_cliente'] = $linha['rg'];
        //Tabela endereco
        $_SESSION['cep_cliente'] = $linha['cep'];
        $_SESSION['rua_cliente'] = $linha['rua'];
        $_SESSION['bairro_cliente'] = $linha['bairro'];
        $_SESSION['cidade_cliente'] = $linha['cidade'];
        $_SESSION['uf_cliente'] = $linha['uf'];
        //Tabela contato_cliente
        $_SESSION['numero_cliente'] = $linha['numero'];
        $_SESSION['telefone_cliente'] = $linha['telefone'];
        $_SESSION['celular_cliente'] = $linha['celular'];

        header('Location: ../perfil.php');
        exit;


    }
}else{
    $_SESSION['msg'] = "<p style='color: red; font-weight: bold;'>NENHUM USUÁRIO ENCONTRADO.</p>";
header('Location: ../login.php');
exit;
}

?>