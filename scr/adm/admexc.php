<?php

require_once('../../conexao/pdo.php');

$cpf = $_SESSION['cpf'];
$idCandidato = $_POST['idCandidato'];
  
    $sql = " SELECT *  FROM candidato ";
    $sql = $sql . " WHERE ";
    $sql = $sql . " idcandidato = '" . $idCandidato . "'";


    $stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
 
    if ($result->idCandidato) {

  
    
        $arquivo = $result->arquivo;

      
        unlink("c:/WebSiteEmescam/CongressoCapixaba/upload/Extensao/" . $arquivo);
       
       
        $sql = " DELETE FROM candidato ";
        $sql = $sql . " WHERE ";
        $sql = $sql . " idcandidato = '" . $idCandidato . "'";


        $stmt = $pdo->query($sql);
        

        header('Location: ../../inicio.php?page=scr/adm/admconsulta.php');



    }else{

        header('Location: ../../inicio.php?page=scr/adm/admconsulta.php');

    }
?>