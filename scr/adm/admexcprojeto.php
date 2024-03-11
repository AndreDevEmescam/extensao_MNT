<?php
 header('Content-type: application/json; charset=UTF-8');
 $response = array();

if ($_POST['delete']) {

       require_once('../../conexao/pdo.php');

       $idcurso = $_POST['delete'];

       // Eclui curso 
       $sql = " DELETE  FROM curso ";
       $sql = $sql . " WHERE ";
       $sql = $sql . " idcurso = '" . $idcurso . "'";
       $stmt = $pdo->query($sql);

       // exclui todos os candidatos do curso 
       $sql = " DELETE FROM candidato ";
       $sql = $sql . " WHERE ";
       $sql = $sql . " idcurso = '" . $idcurso . "'";
       $stmt = $pdo->query($sql);

        if ($stmt) {
            $response['status']  = 'sucesso';
            $response['message'] = 'Projeto excluido corretamente...';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'Projeto não excluido  ...';
        }
        echo json_encode($response); 
}      


?>