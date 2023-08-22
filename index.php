<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="shortcut icon" href="./src/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./src/fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="./src/milligram-1.4.1/dist/milligram.css">
  <link rel="stylesheet" type="text/css" href="./src/css/geral.css">
  <link rel="stylesheet" type="text/css" href="./src/css/individual/index.css">
</head>

<body class = "index">
  <div id="logout">
    <img src="./src/img/Logotipo_IF-white.svg" alt="Logo branca do IFRS" id="logo">
  </div>
  <div id="wrapper">
    <h3 class="title">Sistema de Planos de Manutenção - IFRS Mecânica</h3>
    <?php
      if(!empty($_GET['msg'])) {
        echo "<h4>Usuário ou senha incorretos. Tente novamente.</h4>";
      }
    ?>
    <form action='sessionFunc.php' method='post'>
      <label>
        <i class="fa fa-user" aria-hidden="true"></i>
        <input type="text" class="form-control" name="funcionario" id="funcionario" aria-describedby="username"
          placeholder="Nome de Usuário">
      </label>
      <label>
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" class="form-control" name="cpf" id="cpf" aria-describedby="cpf"
          placeholder="CPF">
      </label>
      <input type="submit" value="Entrar" name="entrar" class="btn btn-padrao" aria-describedby="entrar">
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js "></script>
</body>

</html>
