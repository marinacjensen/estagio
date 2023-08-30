<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Máquinas</title>
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
    <h4>Registro de Máquinas</h4>
    <?php
    if(!empty($_POST['tag'])){
    $tag = $_POST['tag'];
    $equipamento  = $_POST['equipamento'];
    $ativo = $_POST['ativo'];
    $fabricante = $_POST['fabricante'];

    $conexao = mysqli_connect("localhost", "root", "", "estagio");

    $query = "INSERT INTO equipamentos (tag,equipamento,ativo,fabricante) VALUES ('$tag','$equipamento','$ativo','$fabricante')";
    mysqli_query($conexao, $query); 
    header("Location: /admin/administrador.php");
    }
?>
    <form action="cadastraMaquina.php" method="POST">
      <label>
        <input type="text" class="form-control" name="tag" id="tag"
          placeholder="TAG">
      </label>
      <label>
        <input type="text" class="form-control" name="equipamento" id="equipamento" 
        placeholder="Nome da Máquina">
      </label>
      <label>
        <input type="text" class="form-control" name="ativo" id="ativo" 
        placeholder="Ativo">
      </label>
      <label>
        <input type="text" class="form-control" name="fabricante" id="fabricante" 
        placeholder="Fabricante">
      </label>
      <button type="submit">Registrar</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js "></script>
</body>

</html>
