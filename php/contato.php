<?php

session_start();
include_once("conexao.php");


?>

<?php
    
    date_default_timezone_set ('America/Sao_Paulo');
    $email = filter_input(INPUT_POST, 'email_enviar', FILTER_SANITIZE_EMAIL);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

    $result_usuario = "INSERT INTO msg_cliente (email, msg) VALUES ('$email', '$mensagem')";
    $insert_cli = mysqli_query($conn, $result_usuario);
    // mysqli_query realiza uma execução de algo e põe o que deve ser feito dentro dos ().
    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "<script>alert('Sua mensagem foi enviada com sucesso!')</script>";
        header("location: ../contato.php");
    }else{
        $_SESSION['msg'] = "<script>alert('Falha ao enviar a mensagem!')</script>";
        header("location: ../contato.php");
        }

    ?>

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