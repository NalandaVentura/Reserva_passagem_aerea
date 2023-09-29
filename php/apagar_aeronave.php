<?php
session_start();
include_once("conexao.php");
//receber o id que vem com a url
$id = filter_input(INPUT_GET, 'pk_aviao', FILTER_SANITIZE_NUMBER_INT);


// apaga as informações 

if (!empty($id)){
    $result_id = "DELETE FROM aviao WHERE pk_aviao = '$id'";
    $resultado_id = mysqli_query($conn, $result_id);
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;' >  AVIÃO DELETADO COM SUCESSO</P>";
        header("Location: listar_aeronaves.php");
    }else{

        $_SESSION['msg'] = "<p style='color:red;'> Erro: AVIÃO NÃO FOI APAGADO</p>";
        header("location: listar_aeronaves.php");
    }

}else{
    $_SESSION['msg'] = "<p style='color:red;'>   AVIÃO NÃO FOI CADASTRADO</p>";
    header("Location: listar_aeronaves.php");
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