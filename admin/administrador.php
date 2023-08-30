<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador</title>
  <link rel="shortcut icon" href="../src/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../src/fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="../src/milligram-1.4.1/dist/milligram.css">
  <link rel="stylesheet" type="text/css" href="../src/css/geral.css">
</head>

<body>
    <?php
    session_start();
    $nome = $_SESSION['nome'];
    ?>
  <div id="logout">
    <img src="../src/img/Logotipo_IF-white.svg" alt="Logo branca do IFRS" id="logo">
    <p id="user">
      <i class="fa fa-user" aria-hidden="true"></i>
        Usuário: <?php echo $nome;?>
    </p>
    <p id="perfil">
      <i class="fas fa-pencil-alt"></i>
      Perfil de usuário: Administrador
    </p>
    <a href="../logout.php">
        <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
        Sair do sistema
    </a>
  </div>
  <div id="wrapper">
    <h3>Sistema de Planos de Manutenção - IFRS Mecânica</h3>
    <h3 id="pageTitle">Página Inicial</h3>
    <div id="buttons">
        <button><a href='administrador.php#funcionarios'>Visualizar funcionários</a></button>
        <button><a href = "cronogramaPlanos.php">Controle de Planos</a></button>
    </div>
    <h3>Máquinas</h3>
    <button><a href = "cadastraMaquina.php">Cadastrar Máquinas</a></button>
    <table>
      <thead>
        <tr>
          <th>TAG</th>
          <th>Nome</th>
          <th>Ativo</th>
          <th>Fabricante</th>
          <th></th>
        </tr>
      </thead>
  <tbody>
      <tr>
<?php
  $conexao = mysqli_connect("localhost","root","","estagio");
  $query = "SELECT * FROM equipamentos";
  $resultado = mysqli_query($conexao, $query);
  while($linha = mysqli_fetch_array($resultado)){
    echo "<td>".$linha['tag']."</td>
    <td>".$linha['equipamento']."</td>
    <td>".$linha['ativo']."</td>
    <td>".$linha['fabricante']."</td>";
?>
  <td>
    <form method = "get" action="componentes.php">
    <input type = "hidden" id="inputHidden" name="componentes" value=<?php echo $linha['tag']; ?>>  
      <button type = "submit" class="btn btn-info btn-xs">Visualizar componentes</button> 
    </td>
    </form>
  </tr>
  </tbody>
  <?php
  }
  ?>
    </table>
        <h3 id="funcionarios">Funcionários</h3>
        <button><a href = "cadastrafunc.php">Cadastrar Funcionário</a></button>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Cargo</th>
        </tr>
      </thead>
  <tbody>
      <tr>
<?php
  $queryfunc = "SELECT * FROM funcionarios";
  $resultadofunc = mysqli_query($conexao, $queryfunc);
  while($linhafunc = mysqli_fetch_array($resultadofunc)){
    if ($linhafunc['cargo'] == "Administrador") {
      continue;
    }
    echo "<td>".$linhafunc['id']."</td>
    <td>".$linhafunc['nome']."</td>
    <td>".$linhafunc['cargo']."</td>
    </tr></tbody>";
  }
  ?>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js "></script>
</body>

</html>
