<?php

if (!isset($_SESSION)) {
    session_start();
}



$cpf = $_SESSION['cpf'];
$idcurso = $_SESSION['idcurso'];





// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'c:/WebSiteEmescam/CongressoCapixaba/upload/Extensao/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 10; // 10Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'pdf');


$_UP['renomeia'] = false;

$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';


if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; 
}

$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));

if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou pdf";
} else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "O arquivo enviado é muito grande, envie arquivos de até 10Mb.";
} else {

    // Primeiro verifica se deve trocar o nome do arquivo
    if ($_UP['renomeia'] == true) {
        // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
        $nome_final = time() . '.jpg';
    } else {
        // Mantém o nome original do arquivo
       $nome_final = removeCaracter($_FILES['arquivo']['name']); 
       $nome_final = $cpf.$tipo.substr($nome_final,-4);
       $nome_final  = $nome_final;
       
    }
  
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
       atualiza($nome_final,$cpf,$tipo,$idcurso,$idcandidato);
    } else {  
        echo "Não foi possível enviar o arquivo, tente novamente";
    }
    
}


function atualiza($arquivo, $cpf, $tipo,$idcurso,$idcandidato){

   
    require_once('../../conexao/pdo.php');
  
    $sql = "UPDATE candidato SET ";
    $sql = $sql." arquivo= :mArquivo ";
    $sql = $sql." where cpf = :mcpf ";
    $sql = $sql." and ";
    $sql = $sql." idcurso = :midcurso ";


	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':mArquivo', $arquivo);
    $stmt->bindParam(':midcurso', $idcurso);
    $stmt->bindParam(':mcpf ', $cpf);
	$result = $stmt->execute();

    header('Location: ../../../extensao/inicio.php?page=scr/candidato/upload.php');

}

function removeCaracter($string){
    $string =  preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
    $char = array(' & ', 'ª ', '  (', ') ', '(', ')', ' - ', ' / ', ' /', '/ ', '/', ' | ', ' |', '| ', ' | ', '|', '_', ' ');
    return strtolower(str_replace($char, '-', $string));
}
