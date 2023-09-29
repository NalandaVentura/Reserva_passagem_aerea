<?php

//código abaixo pega o hórario e data do atual da maquina

date_default_timezone_set('America/Sao_paulo');
session_start();
include_once('conexao.php');

//recebe o id que vem com a URL
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$desativado = date('Y-m-d H:i:s');

//verifica se a variavel $id está e se sim, atualiza a tabela 'cadastro' e os campos selecionados.

if(!empty($id)){
    $sqlDesativar = "UPDATE cadastro SET funcionamento = '0', desativado = '$desativado'   WHERE fk_cliente='$id'";
    $resultDesativar = mysqli_query($conn, $sqlDesativar);

}
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style = 'color: green;'> USUÁRIO DESATIVADO COM SUCESSO</p>";
        header("Location: gerenc_usuario2.php");
    }else{
    
        
        $_SESSION['msg'] = "<P style = 'color: red;'> ERRO: O USUÁRIO NÃO FOI DESATIVADO</P>";
        header("Location: gerenc_usuario2.php");

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
