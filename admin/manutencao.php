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
        <button><a href='administrador.php'>Menu Principal</a></button>
        <button href = "os_control.php">Controle de Planos</button>
    </div>
    <?php
        $componenteid = $_GET['manutencaocomp'];
        $querycomp = "SELECT * FROM componentes WHERE id = '$componenteid'";
        $conexao = mysqli_connect("localhost","root","","estagio");
        $componente = mysqli_fetch_array(mysqli_query($conexao, $querycomp));
    ?>
    <h3>Manutenções - Componente <?php echo $componente['nome']?></h3>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>TAG</th>
          <th>Funcionário</th>
          <th>ID do Componente</th>
          <th>Descrição</th>
          <th>Frequência</th>
          <th>Data de realização</th>
        </tr>
      </thead>
  <tbody>
      <tr>
    <?php
      $conn = new mysqli("localhost", "root", "", "estagio");
      $sql = "SELECT * FROM manutencao WHERE componente ='$componente[id]'";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $data = $row["data"];
        $frequencia = $row["frequencia"];
        $dataAtual = date("Y-m-d");
        if ($dataAtual > $data) {
          switch ($frequencia) {
            case 'Diária':
              $data = $dataAtual;
              break;
            case 'Semanal':
              $data = date("Y-m-d", strtotime($data . "+1 week"));
              break;
            case 'Mensal':
              $data = date("Y-m-d", strtotime($data . "+1 month"));
              break;
            case 'Semestral':
              $data = date("Y-m-d", strtotime($data . "+6 months"));
              break;
            case 'Anual':
              $data = date("Y-m-d", strtotime($data . "+1 year"));
              break;
          }
            $updateSql = "UPDATE manutencao SET data='$data' WHERE data='$row[data]' AND frequencia = '$row[frequencia]'";
            $conn->query($updateSql);
        }
            echo "<td>".$row['id']."</td>
            <td>".$row['tag']."</td>
            <td>".$row['funcionario']."</td>
            <td>".$row['componente']."</td>
            <td>".$row['descricao']."</td>
            <td>".$row['frequencia']."</td>
            <td>".$row['data']."</td>";
    ?>
  </tr>
  </tbody>
  <?php
  }
  ?>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js "></script>
</body>

</html>
