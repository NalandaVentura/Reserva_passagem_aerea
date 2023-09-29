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

    //vai verificar se existe esse update com o post, se existir vai atualizar o registro. caso o contrario e independente disso, ele irá voltar ao gerenc_usaurio2.php
   
        $id=filter_input(INPUT_POST, 'pk_cliente', FILTER_SANITIZE_NUMBER_INT);
        $nome_cliente = strtoupper(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
        $sobrenome_cliente = strtoupper(filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING));
        $cpf_cliente = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $rg_cliente = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
        $data_emissao_rg = filter_input(INPUT_POST, 'emissao_rg', FILTER_SANITIZE_STRING);
        $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
        $email_cliente = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha_cliente = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        $senha_confirm = filter_input(INPUT_POST, 'senha_confirm', FILTER_SANITIZE_STRING);
        $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
        $rua = strtoupper(filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING));
        $num_casa = strtoupper(filter_input(INPUT_POST, 'num_casa', FILTER_SANITIZE_STRING));
        $bairro = strtoupper(filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING));
        $cidade = strtoupper(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING));
        $uf = strtoupper(filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING));
        $telefone_cliente = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
        $celular_cliente = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
        
        //através da variavel $sqlInsert atualiza e linka as tabelas e seus respectivos campos passados
        $sqlInsert = "UPDATE cliente 
        INNER JOIN cadastro ON cliente.pk_cliente = cadastro.fk_cliente 
        INNER JOIN rg ON cliente.pk_cliente = rg.fk_cliente 
        INNER JOIN endereco ON cliente.pk_cliente = endereco.fk_cliente 
        INNER JOIN contato_cliente ON cliente.pk_cliente = contato_cliente.fk_cliente
        SET 
          cliente.nome = '$nome_cliente',             
          cliente.sobrenome = '$sobrenome_cliente', 
          cliente.cpf = '$cpf_cliente', 
          rg.rg = '$rg_cliente', 
          rg.emissao_rg = '$data_emissao_rg', 
          cliente.data_nasci = '$data_nascimento', 
          cadastro.email = '$email_cliente', 
          cadastro.senha = '$senha_cliente', 
          endereco.cep = '$cep', 
          endereco.rua = '$rua', 
          endereco.numero = '$num_casa', 
          endereco.bairro = '$bairro', 
          endereco.cidade = '$cidade', 
          endereco.uf = '$uf', 
          contato_cliente.telefone = '$telefone_cliente', 
          contato_cliente.celular = '$celular_cliente',
          cadastro.modificado = NOW()  WHERE pk_cliente = '$id'";
        $user_data = mysqli_query($conn, $sqlInsert);
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg']="<p style='display: block; color: limegreen'> USUÁRIO EDITADO COM SUCESSO</P>";
            header("Location: gerenc_usuario2.php");
        }else{
            $_SESSION['msg']="<p style= 'display: block; color: red'> USUÁRIO NÃO FOI EDITADO</p>";
            header("Location: edit_usuario2.php");
        }

?>



































    // // isset -> serve para saber se uma variável está definida
    // include_once('php/conexao.php');
    // //vai verificar se existe esse update com o post, se existir vai atualizar o registro. caso o contrario e independente disso, ele irá voltar ao gerenc_usaurio2.php
    // if(isset($_POST['update']))
    // {
    //     $id=  filter_input(INPUT_POST, 'pk_cliente', FILTER_SANITIZE_NUMBER_INT);
    //     $nome_cliente = strtoupper(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    //     $sobrenome_cliente = strtoupper(filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING));
    //     $cpf_cliente = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    //     $rg_cliente = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
    //     $data_emissao_rg = filter_input(INPUT_POST, 'emissao_rg', FILTER_SANITIZE_STRING);
    //     $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
    //     $email_cliente = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    //     $senha_cliente = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    //     $senha_confirm = filter_input(INPUT_POST, 'senha_confirm', FILTER_SANITIZE_STRING);
    //     $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
    //     $rua = strtoupper(filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING));
    //     $num_casa = strtoupper(filter_input(INPUT_POST, 'num_casa', FILTER_SANITIZE_STRING));
    //     $bairro = strtoupper(filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING));
    //     $cidade = strtoupper(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING));
    //     $uf = strtoupper(filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING));
    //     $telefone_cliente = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
    //     $celular_cliente = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
        
    //     $sqlInsert = "UPDATE cliente
    //     SET nome='$nome_cliente', sobrenome='$sobrenome_cliente' , cpf='$cpf_cliente' , rg='$rg_cliente' , emissao_rg='$data_emissao_rg' , data_nascimento='$data_nascimento' , email='$email_cliente' , senha='$senha_cliente', senha_confirm='$senha_confirm', cep='$cep' , rua='$rua' , num_casa='$num_casa' , bairro='$bairro' , cidade='$cidade' , uf='$uf' , telefone='$telefone_cliente' , celular='$celular_cliente';
    //     WHERE pk_cliente = $id";
    //      $result = mysqli_query($conn, $sqlinsert);
    //     $user_data = mysqli_fetch_assoc($result);
    // }
    // header('Location: gerenc_usuario2.php');

?>