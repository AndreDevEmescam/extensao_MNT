<?php

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

$response = array();

$curso = isset($_GET['nome']) ? $_GET['nome'] : null;
$datainicio = isset($_GET['datainicio']) ? $_GET['datainicio'] : null;
$datafim = isset($_GET['datalimite']) ? $_GET['datalimite'] : null;
$dataprova = isset($_GET['datalimite']) ? $_GET['datalimite'] : null;
$vaga = isset($_GET['vaga']) ? $_GET['vaga'] : null;
$enviarArquivo = isset($_GET['enviarArquivo']) ? $_GET['enviarArquivo'] : null;

if (!empty($datainicio)) {
    $datainicio = new DateTime($datainicio);
    $datainicio = $datainicio->format('Y-m-d H:i:s');
} else {
    $datainicio = null;
}

if (!empty($datafim)) {
    $datafim = new DateTime($datafim);
    $datafim = $datafim->format('Y-m-d H:i:s');
} else {
    $datafim = null;
}

if (!empty($dataprova)) {
    $dataprova = new DateTime($dataprova);
    $dataprova = $dataprova->format('Y-m-d H:i:s');
} else {
    $dataprova = null;
}


require_once('conexao/pdo.php');
//require_once('Z:\img\extensao\conexao\conexao.php');
//include('../../conexao/pdo.php');
//include 'conexao/pdo.php';

//die("LINHA 40xxx");

// inclui projeto
try {
    $pdo->beginTransaction();

    $sql = "INSERT INTO curso (idCurso, Nome, DataLimite, DataInicio, DataProva, Vaga, enviarArquivo) ";
    $sql .= "VALUES (ISNULL((SELECT MAX(idCurso) + 1 FROM curso), 1), ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($curso, $datafim, $datainicio, $dataprova, $vaga, $enviarArquivo));

    $pdo->commit();

    $response['status'] = 'sucesso';
    $response['message'] = 'Projeto incluído corretamente...';
} catch (Exception $e) {
    $pdo->rollBack();

    $response['status'] = 'error';
    $response['message'] = 'Erro: ' . $e->getMessage();
}

//echo json_encode($response);

?>
