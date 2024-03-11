<?php
    include 'conexao/pdo.php';

    $hoje = date('d/m/Y H:i');
    $nome_arquivo = 'Inscritos'.$hoje;
    $codigo = $_POST['idcurso'];
    $curso = $_POST['curso'];
    header("Content-type: application/vnd.ms-excel");
    header("Content-type: application/force-download");
    header("Content-Disposition: attachment; filename=$nome_arquivo.xls");
    header("Pragma: no-cache");

?>
<table>
         <tr style="font-weight:bold">
             <td>Nome</td>
             <td>Celular</td>
             <td>Email</td>
             <td>Matricula</td>
             <td>Período</td>
         </tr>
<?php
    
    $sql = " SELECT ca.idCandidato, co.nome as nomeCurso, ca.Email, ca.Nome as nomeAluno, ca.Celular, ca.idCandidato, ca.cpf, ca.idcurso, ca.Curso, ";
    $sql = $sql . " ca.matricula, ca.Periodo, co.enviarArquivo, ca.arquivo ";
    $sql = $sql . " FROM candidato ca ";
    $sql = $sql . " inner join curso co on ca.idCurso = co.idCurso ";
    $sql = $sql . " where ";
    $sql = $sql . " ca.idCurso = '".$codigo."'";
    $sql = $sql . " order by ca.Nome ";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();
        if ($result) {
            echo "<h2><tr style='font-weight:bold'>".$curso."</tr></h2>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                   
                   echo "
                            <tr>
                                <td>".$row['nomeAluno']."</td>
                                <td style ='text-align: center;'>".$row['Celular']."</td>
                                <td>".$row['Email']."</td>
                                <td style ='text-align: center;'>".$row['matricula']."</td>
                                <td style ='text-align: center;'>".$row['Periodo']."</td>
                            </tr>
                        
                        ";
            }
        }    
?>
</table>


                   