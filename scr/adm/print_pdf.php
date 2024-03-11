<?php
	function generateRow(){
		$contents = '';
		include_once('../../conexao/conexao.php');
		$database = new BaseDados();
		$db = $database->conectar();

		$sql = "SELECT * FROM candidato";

		$req = $db->prepare($sql);
		$req->execute();
		$linhas = $req->rowCount();

		while ($dados = $req->fetch(PDO::FETCH_ASSOC)) {

			$contents .= "
			<tr>
				<td>".$dados['idcandidato']."</td>
				<td>".$dados['nome']."</td>
			</tr>
			";
		}
		
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated PDF using TCPDF");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h4>Profissionais</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="15%">ID</th>
				<th width="85%">Nome</th>	
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('members.pdf', 'I');
	
?>