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
include_once("conexao.php");

$_SESSION['senha_cliente'];


$senha = (filter_input(INPUT_POST, 'senha_cliente', FILTER_SANITIZE_STRING));

$senha2 = (filter_input(INPUT_POST, 'senha_cliente2', FILTER_SANITIZE_STRING));

if ($senha === $senha2) {
    $senha = sha1($senha2);

    $id = $_SESSION['verifica_cliente'];

    $sql = "UPDATE cadastro SET senha='$senha', modificado=NOW() WHERE fk_cliente='$id'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<h4 style='color: white; text-align: center; '>SENHA EDITADA COM SUCESSO</h4>";
        header("Location: ../perfil.php");
    } else {
        $_SESSION['msg'] = "<h4 style='color: red; text-align: center;'>SENHA NÃO FOI EDITADA</h4>";
        header("Location: ../perfil.php");
    }
}else{
    $_SESSION['msg'] = "<h4 style='color: red; text-align: center;'>AS SENHAS NÃO SE COINCIDEM</h4>";
        header("Location: ../perfil.php");
}


?>