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
    <?php

    if(!empty($_GET['tag'])){
      $tag = $_GET['tag'];
      $funcionario = $_GET['funcionario'];
      $componente  = $_GET['componente'];
      $descricao = $_GET['descricao'];
      $frequencia = $_GET['frequencia'];
      $conexao = mysqli_connect("localhost", "root", "", "estagio");
      $query = "INSERT INTO manutencao (tag, funcionario, componente, descricao, frequencia) VALUES ('$tag','$funcionario', '$componente', '$descricao', '$frequencia')";
      mysqli_query($conexao, $query);
      header("Location: /admin/manutencao.php?manutencaocomp=" . urlencode($componente));
    }
    ?>
    <?php
        $id = $_GET['manutencao'];
        $query = "SELECT * FROM componentes WHERE id = '$id'";
        $conexao = mysqli_connect("localhost","root","","estagio");
        $componente = mysqli_fetch_array(mysqli_query($conexao, $query));
    ?>
    <h3>Sistema de Planos de Manutenção - IFRS Mecânica</h3>
    <h4>Registro de Manutenção - Componente <?php echo $componente['nome']?></h4>
    <form action="cadastraManutencao.php" method="get">
      <label>TAG da Máquina</label>
        <input type="text" class="form-control" name="tag" id="tag" value=<?php echo $componente['eq_tag']?>>
      <label>Funcionário Responsável:</label>
        <select name="funcionario" id="funcionario" class="form">
            <?php
                $conexaoFunc = mysqli_connect("localhost", "root", "", "estagio");
                $queryFunc = "SELECT nome, cargo FROM funcionarios";
                $resultado = mysqli_query($conexaoFunc, $queryFunc);
                while($linhaFunc = mysqli_fetch_array($resultado)){
                    echo "<option value='".$linhaFunc['nome']."'>".$linhaFunc['nome']."</option>";
                }
            ?>
        </select>
      <label>Código do Componente</label>
        <input type="text" class="form-control" name="componente" id="componente" value=<?php echo $componente['id']?>>
      <label>Descrição</label>
        <input type="text" class="form-control" name="descricao" id="descricao">
      <label>Frequência</label>
      <select name="frequencia" id="frequencia">
       <option value='Diária'>Diária</option>
       <option value='Semanal'>Semanal</option>
       <option value='Mensal'>Mensal</option>
       <option value='Semestral'>Semestral</option>
       <option value='Anual'>Anual</option>
      </select>
      <button type="submit">Registrar</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js "></script>
</body>

</html>
