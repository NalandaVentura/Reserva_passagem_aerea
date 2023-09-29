<?php
    session_start();
    include_once("conexao.php");

    if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $data = date('Y-m-d H:i:s'); 


    $pk_aviao = filter_input(INPUT_POST, 'pk_aviao', FILTER_SANITIZE_NUMBER_INT);

    $validar = "SELECT hora_chegada FROM gestao_voo WHERE fk_aviao = '$pk_aviao'";

if ($data !=  $validar){
    $_SESSION['msg'] = "<p style='color:red;' > ESTÁ AERONAVE AINDA NÃO POUSOU</P>";
        header("Location: listar_aeronaves.php");

}
else{
   
    if (!empty($pk_aviao)){
        $result_usuario = "DELETE FROM gestao_voo WHERE fk_aviao = '$pk_aviao'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;' > AERONAVE LIBERADA</P>";
            header("Location: listar_aeronaves.php");
        }else{
    
            $_SESSION['msg'] = "<p style='color:red;'> ERRO: AERONAVE NÃO FOI LIBERADA OU NÃO EXISTE NENHUM VOO ESCALADO PARA ESTE AVIÃO</p>";
            header("Location: listar_aeronaves.php");
        }
    }
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