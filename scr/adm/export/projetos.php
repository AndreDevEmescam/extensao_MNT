<?php
    include 'conexao/pdo.php';
    $hoje = date('d/m/Y H:i');
    $nome_arquivo = 'Projetos'.$hoje;
    $codigo = $_POST['codigo'];
    header("Content-type: application/vnd.ms-excel");
    header("Content-type: application/force-download");
    header("Content-Disposition: attachment; filename=$nome_arquivo.xls");
    header("Pragma: no-cache");
?>
    <table>
         <tr style="font-weight:bold">
             <td>Projeto</td>
             <td>Inicio</td>
             <td>Termino</td>
             <td>Inscritos</td>
         </tr>
<?php
    $sql = " select cur.idcurso, cur.nome, cur.dataInicio, cur.DataLimite, (select count(*) from candidato where idcurso = cur.idCurso ) as inscritos from curso cur ";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();
        if ($result) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                   $dataInicio = date('d/m/Y H:i', strtotime($row['dataInicio']));
                   $dataFim = date('d/m/Y H:i', strtotime($row['DataLimite']));
                   echo "<tr>
                            <td>".$row['nome']."</td>
                            <td>".$dataInicio."</td>
                            <td>".$dataFim."</td>
                            <td>".$row['inscritos']."</td>
                        </tr>";
            }
        }    
?>
</table>


                   