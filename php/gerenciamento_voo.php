<?php
session_start();
include_once("conexao.php");
// Este código possui a inserção dos dados de voo, colocando o local de partida e chegada, até o horário de ida e chegada ao aeroporto destino.
// -----------------------------------//
// INICIO DAS INSERÇÕES DE DADOS NO BANCO
$saida_enviar = $_POST['saida_enviar'];//Recebimento dos dados de data e horário do voo ao sair.
$chegada_enviar = $_POST['chegada_enviar'];//Recebimento dos dados de data e horário do voo ao sair.
date_default_timezone_set('America/Sao_Paulo');
$decolagem = filter_input(INPUT_POST, 'decolagem_enviar', FILTER_SANITIZE_STRING);
$pouso = filter_input(INPUT_POST, 'pouso_enviar', FILTER_SANITIZE_STRING);
$saida = date('Y-m-d H:i:s', strtotime($saida_enviar));
$chegada = date('Y-m-d H:i:s', strtotime($chegada_enviar)); 
// Verifica se a data de saída é anterior ou igual à data de chegada
if ($saida > $chegada) {
    echo "A data de saída deve ser anterior ou igual à data de chegada";
    echo "<button><a href='gerenciamento_voo.html'>Voltar</a></button>";
  }
  else if(strtotime($saida) < time()) {
    echo "A data de saída deve ser a partir de hoje.";
    echo "<button><a href='gerenciamento_voo.html'>Voltar</a></button>";
  }
  else {
    // Insere os dados no banco de dados
    // ...
    $sql = "INSERT INTO gestao_voo (`local_voo`, `local_pouso`, `hora_partida`, `hora_chegada`) VALUES ('$decolagem', '$pouso', '$saida', '$chegada')";
$insert_cli = mysqli_query($conn, $sql);

if(mysqli_insert_id($conn)){
    echo "Concluído. <br>";
    echo "<button><a href='gerenciamento_voo.html'>Voltar</a></button>";
} else {
    $_SESSION['msg'] = "<p style='color:red;'>ERROR</p>";
    header("location: contato.html");
}
  }

// FIM DA INSERÇÃO DE DADOS
// -----------------------------------//

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
