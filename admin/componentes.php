<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Componentes</title>
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
    ?>
  <div id="logout">
    <img src="../src/img/Logotipo_IF-white.svg" alt="Logo branca do IFRS" id="logo">
    <p id="user">
      <i class="fa fa-user" aria-hidden="true"></i>
        Usuário: <?php echo $_SESSION['nome'];?>
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
        <button><a href='administrador.php'>Menu Principal</a></button>
        <button href = "os_control.php">Controle de Planos</button>
    </div>
    <h3>Componentes - Máquina <?php echo $_GET['componentes']?></h3>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th></th>
        </tr>
      </thead>
  <tbody>
      <tr>
<?php
  $tag = $_GET['componentes'];
  $conexao = mysqli_connect("localhost","root","","estagio");
  $query = "SELECT * FROM componentes WHERE eq_tag = '$tag'";
  $resultado = mysqli_query($conexao, $query);
  while($linha = mysqli_fetch_array($resultado)){
    echo "<td>".$linha['id']."</td>
    <td>".$linha['nome']."</td>";
?>
  <td>
    <form action="manutencao.php" method="get">
      <input type = "hidden" id="inputHidden" name="manutencaocomp" value=<?php echo $linha['id']; ?>>  
      <button type = "submit" class="btn btn-info btn-xs">Visualizar Manutenções</button>
    </form>
    <form action="cadastraManutencao.php" method="get">
      <input type = "hidden" id="inputHidden" name="manutencao" value=<?php echo $linha['id']; ?>>  
      <button type = "submit" class="btn btn-info btn-xs">Adicionar Manutenção</button>
    </form>
    </td>
  </tbody>
  <?php
  }
  ?>
    </table>
    <form action ="cadastraComp.php" method="get">
      <input type = "hidden" id="inputHidden" name="componentes" value=<?php echo $_GET['componentes']; ?>>  
      <button type = "submit" class="btn btn-info btn-xs">Adicionar Componentes</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js "></script>
</body>

</html>
