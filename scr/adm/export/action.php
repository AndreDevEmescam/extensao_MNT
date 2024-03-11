<?php
   // Include config.php file
   require_once('../../conexao/pdo.php');


die('----');

   $dbObj = new Database();

   // Export to excel
   if (isset($_GET['export']) && $_GET['export'] == 'excel') {

      header("Content-type: application/vnd.ms-excel; name='excel'");
      header("Content-Disposition: attachment; filename=projetos.xls");
      header("Pragma: no-cache");
      header("Expires: 0");

      $exportData = $dbObj->displayRecord();

      echo'<table border="1">
         <tr style="font-weight:bold">
             <td>Projeto</td>
             <td>Inicio</td>
             <td>Termino</td>
             <td>Inscritos</td>
         </tr>';
      foreach ($exportData as $export) {
      echo'<tr>
         <td>'.$export['nome'].'</td>
         <td>'.date('d-M-Y', strtotime($export['DataInicio'])).'</td>
         <td>'.date('d-M-Y', strtotime($export['DataLimite'])).'</td>
         <td>'.$export['Inscritos'].'</td>
        
           </tr>';
         }      
      echo '</table>';
   }

   public function displayRecord()
   {
      $sql = "select cur.nome, cur.DataInicio, cur.DataLimite, (select count(*) from candidato where idcurso = cur.idCurso ) as inscritos from curso cur";
      $query = $this->con->query($sql);
      $data = array();
      if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) {
            $data[] = $row;
         }
         return $data;
      }else{
         return false;
      }
   }

?>