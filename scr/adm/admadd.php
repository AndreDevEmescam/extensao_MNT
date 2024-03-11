<?php    

    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
   
    $response = array();

    /*
    $curso = $_POST['nome'];
    $datainicio = $_POST['datainicio'];
    $datafim = $_POST['datalimite'];
    $dataprova = $_POST['datalimite'];
    $vaga = $_POST['vaga'];
    $enviarArquivo = $_POST['enviarArquivo'];  
    */

    $curso = isset($_GET['nome']) ? $_GET['nome'] : null;
    $datainicio = isset($_GET['datainicio']) ? $_GET['datainicio'] : null;
    $datafim = isset($_GET['datalimite']) ? $_GET['datalimite'] : null ;
    $dataprova = isset($_GET['datalimite']) ? $_GET['datalimite'] : null ;
    $vaga = isset($_GET['vaga']) ? $_GET['vaga'] : null ;
    $enviarArquivo = isset($_GET['enviarArquivo']) ? $_GET['enviarArquivo'] : null ;

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

    // inclui projeto   
    $sql = " INSERT INTO curso(idCurso,Nome, DataLimite, DataInicio, DataProva, Vaga, enviarArquivo) ";
    $sql = $sql." VALUES (ISNULL((SELECT MAX(idCurso) + 1 FROM curso), 1),";
    $sql = $sql."'".$curso."',";
    $sql = $sql."'".$datafim."',";
    $sql = $sql."'".$datainicio."',";
    $sql = $sql."'".$dataprova."',";
    $sql = $sql."'".$vaga."',";
    $sql = $sql."'".$enviarArquivo."')";    

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
   
    if ($stmt !== false) {
        
        $response['status']  = 'sucesso';
        $response['message'] = 'Projeto incluido corretamente...';

    } else {
        die("linha 70");        
        $response['status']  = 'error';
        $response['message'] = 'Projeto não incluido  ...';
    }

    //echo json_encode($response); 

?>