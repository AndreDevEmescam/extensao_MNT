<?php


    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
  
 
   

    $curso = $_POST['nome'];
    $datainicio = $_POST['datainicio'];
    $datafim = $_POST['datalimite'];
    $dataprova = $_POST['datalimite'];
    $vaga = $_POST['vaga'];
    $enviarArquivo = $_POST['enviarArquivo'];

    $idCurso = $_POST['idcurso'];

    if(!empty($datainicio)){
        $datainicio = new DateTime($datainicio);
        $datainicio = $datainicio->format('Y-m-d H:i:s');
    }else{
        $datainicio = Null;
    }

    if(!empty($datafim)){
        $datafim = new DateTime($datafim);
        $datafim = $datafim->format('Y-m-d H:i:s');
    }else{
        $datafim = Null;
    }

    if(!empty($dataprova)){
        $dataprova = new DateTime($dataprova);
        $dataprova = $dataprova->format('Y-m-d H:i:s');
    }else{
        $dataprova = Null;
    }


    require_once('conexao/pdo.php');

    // Altera projeto
    $sql = " UPDATE curso ";
    $sql = $sql." SET ";
    $sql = $sql." nome ='".$curso."',";
    $sql = $sql." DataLimite='".$datafim."',";
    $sql = $sql." DataInicio='".$datainicio."',";
    $sql = $sql." DataProva='".$dataprova."',";
    $sql = $sql." Vaga='".$vaga."',";
    $sql = $sql." enviarArquivo='".$enviarArquivo."'";
    $sql = $sql." WHERE ";
    $sql = $sql." idcurso = '".$idCurso."'";


    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    header('Location: ../extensao_MNT/inicio.php?page=scr/adm/admprojetos.php');
   
   

?>