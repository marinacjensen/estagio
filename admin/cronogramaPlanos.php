<?php
session_start();
$id = $_SESSION['id'];
$cargo = $_SESSION['cargo'];

if ($cargo !== 'Administrador') {
    session_destroy();
    header('Location:/index.php');
}

$dataAtual = date('Y-m-d');
$conexao = new mysqli("localhost", "root", "", "estagio");
$query = "SELECT * FROM manutencao WHERE data = '$dataAtual'";
$resultado = $conexao->query($query); 
include('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P','mm', 'A4');

$pdf->setTitle('Cronograma - Administrador');
$pdf->AddPage();

$html = "<h3>Plano de Manutenção - dia $dataAtual</h3>
    <table>
    <tr style=\"font-weight: bold\">
    <th>ID</th>
    <th>TAG</th>
    <th>Funcionário</th>
    <th>ID Componente</th>
    <th>Descrição</th>
    </tr>";

while ($linha = $resultado->fetch_assoc()){
    $html .= "<tr>
    <td>$linha[id]</td>
    <td>$linha[tag]</td>
    <td>$linha[funcionario]</td>
    <td>$linha[componente]</td>
    <td>$linha[descricao]</td>
    </tr>";
}

$pdf->writeHTML($html);
$pdf->Output();
?>