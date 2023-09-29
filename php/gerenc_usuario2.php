<?php
session_start();
include_once("conexao.php");

//verifica se as variaveis de sessão 'email' e 'senha' estão definidas, 
//Se ambas não estiverem definidas, o código remove as variáveis de sessão 'email' e 'senha' e redireciona o usuário para a página de login.
//Caso ambas as variáveis estejam definidas, o código define a variável $logado como o valor da variável de sessão 'email'. 
//Essa variável $logado será usada para identificar o usuário logado no sistema.

// if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
// {
//     unset($_SESSION['email']);
//     unset($_SESSION['senha']);
//     header('Location: login.php');
// }
// $logado = $_SESSION['email'];

// código abaixo verifica se o parametro search está vazio e através da variavel $data pesquisa pelos valores da variavel $sql e pelos campos da tabela trás a pesquisa na url pelo parametro 'search'
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM cliente INNER JOIN cadastro ON cliente.pk_cliente = cadastro.fk_cliente INNER JOIN rg ON cliente.pk_cliente = rg.fk_cliente INNER JOIN endereco ON cliente.pk_cliente = endereco.fk_cliente INNER JOIN contato_cliente ON cliente.pk_cliente = contato_cliente.fk_cliente WHERE pk_cliente LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY pk_cliente DESC";
} else {



  $sql = "SELECT * FROM cliente INNER JOIN cadastro ON cliente.pk_cliente = cadastro.fk_cliente INNER JOIN rg ON cliente.pk_cliente = rg.fk_cliente INNER JOIN endereco ON cliente.pk_cliente = endereco.fk_cliente INNER JOIN contato_cliente ON cliente.pk_cliente = contato_cliente.fk_cliente ORDER BY pk_cliente DESC";
}
$result = mysqli_query($conn, $sql);
// $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../img/favicon_logo_dumont_32x32.png" type="image/x-icon">
  <title>Gerenciamento de contas dos usuários</title>
</head>


<body>
  <!--INICIO BARRA DE NAVEGAÇÃO-->
  <nav style="background-color: #460AC6;" class="navbar navbar-dark sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../home_adm.php"><img id="logo_navbar_dumont" width="150"
          src="../img/dumont_logo_nav_765x625.png" alt="Logo da Empresa DUMONT"></a>

      <div id="links_navbar">
        <a style="color: white;" id="link_nav1" class="nav-link" href="relatorio.php">Relatorios</a>
        <a style="color: white;" id="link_nav2" class="nav-link" href="../inserir_aeronave.php">Inserir
          aviões</a>
        <a style="color: white;" id="link_nav3" class="nav-link" href="listar_aeronaves.php">Lista de
          aeronaves</a>
        <!-- <a style="color: white;" id="link_nav4" class="nav-link" href="#">Reservas</a> -->
        <!-- <a style="color: white;" id="link_nav4" class="nav-link" href="lista_feedback.php">Feedback</a> -->
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h3 style="color: #460AC6;" class="offcanvas-title" id="offcanvasNavbarLabel">DUMONT</h3>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

          <h4 style="color: #460AC6; margin-left: 20px;  ">
            <?php
            echo "ADM: " . $_SESSION['nome_login'];
            ?>
          </h4>

          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="../inserir_aeronave.php"> <img id="icon_aviao"
                  src="../img/airplane-engines.svg" alt="Ícone de um avião">
                Inserir aviões</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="lista_voos.php"> <img id="icon_ticket"
                  src="../img/ticket.svg" alt="Ícone de um ticket"> Vôos</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="listar_aeronaves.php"> <img id="icon_fogo"
                  src="../img/wind.svg" alt="Ícone Fogo"> Lista de aeronaves</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="relatorio.php"> <img id="icon_fogo"
                  src="../img/iconrelatorio.svg" alt="Ícone Fogo"> Relatórios</a>
            </li>

            <li class="nav-item">
              <a style="color: #460AC6;" class="nav-link" href="gerenc_usuario2.php"> <img id="icon_fogo"
                  src="../img/person-circle.svg" alt="Ícone Fogo"> Clientes</a>
            </li>

            <?php
            if (isset($_SESSION['verifica_cliente']) or isset($_SESSION['verifica_login'])) {
              echo "<li class='nav-item'>
                                        <a style='color: #460AC6;' class='nav-link' href='proc_sair_conta.php'> <img id='icon_tel' src='../img/iconsaida.svg'
                                        alt='Ícone Saída'> Sair</a>
                                        </li>
                                        ";
            }

            ?>


        </div>
      </div>
    </div>
  </nav>
  <!--FIM BARRA DE NAVEGAÇÃO-->

  <!--CONTEÚDO PRINCIPAL DA PÁGINA-->




  <main class="container mt-4">

    <h1 class="text-center">Gerenciamento de contas</h1>

    <div class="input-group mb-4">
      <input type="search" class="form-control" aria-label="pesquisar" id="pesquisar" aria-describedby="button-addon2">
      <button onclick="searchData()" class="btn btn-primary" type="button">Buscar</button>
    </div>
    <hr>
    <?php
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>


    <!-- Código abaixo cria uma tabela com bootstrap -->
    <div id=tabela class=mt-2>
      <table class="table table-bg">
        <thead>
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Nome</th>
            <th scope="col">email</th>
            <th scope="col">CPF</th>
            <th scope="col">RG</th>
            <th scope="col">Endereço</th>
            <th scope="col">contato</th>
            <th scope="col">Desativado</th>
            <th scope="col">Editar</th>
            <th scope="col">Desativar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //laço de repetição (loop) para executar os dados armazenados na vairavel $result
          //Cada linha de dados lida do conjunto de resultados é armazenada em um array associativo "$user_data" usando as colunas como chaves e os valores como valores.
          // Esse processo é realizado pela função "mysqli_fetch_assoc()" que retorna um array associativo de uma linha de resultados do conjunto de dados.
          
          while ($user_data = mysqli_fetch_assoc($result)) { // A variavel $user_data pega os campos das tabelas do banco de dados e imprime na coluna da tabela do bootstrap  
            echo "<tr>";
            echo "<td>" . $user_data['pk_cliente'] . "</td>";
            echo "<td>" . $user_data['sobrenome'] . "</td>";
            echo "<td>" . $user_data['nome'] . "</td>";
            echo "<td>" . $user_data['email'] . "</td>";
            echo "<td>" . $user_data['cpf'] . "</td>";
            echo "<td>" . $user_data['rg'] . "</td>";
            echo "<td>" . $user_data['rua'] . ", " . $user_data['numero'] . " - " . $user_data['bairro'] . ", " . $user_data['cidade'] . "(" . $user_data['uf'] . ")" . "</td>";
            echo "<td>" . "Telefone:" . $user_data['telefone'] . " " . " celular:" . $user_data['celular'] . "</td>";
            echo "<td>" . $user_data['desativado'] . "</td>";

            echo "<td>
                <a class = 'btn btn-sm btn-primary' href='edit_usuario2.php?id=$user_data[pk_cliente]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
              </svg> 
              </a>     
          </td>";
            echo "<td>
          <a class ='btn btn-sm btn-danger' href='delete.php?id=$user_data[pk_cliente]'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
          <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
          </svg>
          </a>
          </td>";

          }
          ?>
        </tbody>
      </table>
    </div>


  </main>

  <!-- código em javascript para fazer as buscar no campo de pesquisa 'buscar' -->
  <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function (event) {
      if (event.key === "Enter") {
        searchData();
      }
    });

    function searchData() {
      if (search.value.trim() !== "") {
        var encodedSearch = encodeURIComponent(search.value);
        window.location = 'gerenc_usuario2.php?search=' + encodedSearch;
      }
    }

  </script>

  <!--FIM CONTEÚDO-->


  <!--INICIO RODAPÉ-->
  <div id="rodape" class="container-fluid">
    <div class="row">

      <div id="lugares_viajar" class="col-sm">
        <p><strong>Lugares para viajar</strong></p>
        <a class="text-white text-decoration-none" href="../ofertas.php">Salvador</a>
        <br>
        <a class="text-white text-decoration-none" href="../ofertas.php">Rio de Janeiro</a>
        <br>

        <a class="text-white text-decoration-none" href="../ofertas.php">Porto de Galinhas</a>
      </div>

      <div class="col-sm">
        <p><strong>Companhías Aéreas</strong></p>
        <a class="text-white text-decoration-none" href="https://www.latamairlines.com/" target="_blank">Latam</a>
        <br>
        <a class="text-white text-decoration-none" href="https://www.voegol.com.br/" target="_blank">Gol</a>
        <br>
        <a class="text-white text-decoration-none" href="https://www.voeazul.com.br/" target="_blank">Azul</a>
      </div>

      <div class="col-sm">
        <p><strong>Redes Socias</strong></p>

        <a class="text-white text-decoration-none" href="https://www.instagram.com/"><img src="../img/instagram.svg"
            alt="Ícone do Instagram">Instagram</a>
        <br>
        <a class="text-white text-decoration-none" href="https://pt-br.facebook.com/" target="_blank"><img
            src="../img/facebook.svg" alt="Ícone do Facebook">
          Facebook</a>
        <br>
        <a class="text-white text-decoration-none" href="https://twitter.com/" target="_blank"><img
            src="../img/twitter.svg" alt="Ícone do Twitter">
          Twitter</a>
      </div>

    </div>
  </div>
  <!--FIM RODAPÉ-->
  <script src="js/reserva.js"></script>


</body>


</html>