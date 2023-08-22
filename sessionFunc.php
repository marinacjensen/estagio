<?php


$nome = $_POST['funcionario'];
$cpf  = md5($_POST['cpf']);

$conexao = mysqli_connect("localhost","root","","estagio");

$query = "SELECT * FROM funcionarios WHERE nome='$nome' and cpf= '$cpf'";

if ($result=mysqli_query($conexao, $query)) {
  session_start();
  $linha = mysqli_fetch_array($result);
  if(!empty($linha)){
    $_SESSION['nome'] = $linha['nome'];
    $_SESSION['cargo'] = $linha['cargo'];
    $_SESSION['id'] = $linha['id'];
    if($_SESSION['cargo'] === 'Administrador'){
      header("Location: admin/administrador.php");
    } else {
      header("Location: tecnico.php");
    }

  }else{
    unset($_SESSION['nome']);
    unset($_SESSION['cargo']);
    unset($_SESSION['id']);
    header("Location: index.php?msg=ERRO_LOGIN");
  }
}
?>