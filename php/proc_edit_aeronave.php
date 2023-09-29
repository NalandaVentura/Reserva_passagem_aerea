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

//Aqui serão trazidos as informações do formulario da pagina editar_aeronaves 

$idaviao = filter_input(INPUT_POST,  'pk_aviao', FILTER_SANITIZE_NUMBER_INT);
$num_serie = filter_input(INPUT_POST, 'num_serie', FILTER_SANITIZE_STRING);
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
$operacao = filter_input(INPUT_POST, 'operacao', FILTER_SANITIZE_STRING);

// nessa linha ele verifica se esta aeronave possu um voo, caso sim ele não permite que ele mude a operação do avião.
$validar = "SELECT fk_aviao FROM gestao_voo WHERE fk_aviao = '$idaviao'";
$valido= mysqli_query($conn, $validar);

    if(mysqli_num_rows($valido)> 0){
        $_SESSION['msg'] = "<p style='color:red;' > A AERONAVE AINDA NÃO POUSOU</P>";
        header("Location: listar_aeronaves.php");

    }else{
        //nesse if ele faz atualização entre 'operando' e 'desativado'
        $result_aviao = "UPDATE aviao SET num_serie='$num_serie', modelo='$modelo', operacao = '$operacao' WHERE pk_aviao ='$idaviao'";
        $resultado_aviao = mysqli_query($conn, $result_aviao);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'> AVIÃO EDITADO COM SUCESSO </p>";
        header("Location: listar_aeronaves.php");

    }else{
        $_SESSION['msg'] = "<p style='color:red;'> AVIÃO NÃO FOI EDITADO </p>";
        header("Location: edit_aeronaves.php? pk_aviao = $idaviao");
    }
    }


?>