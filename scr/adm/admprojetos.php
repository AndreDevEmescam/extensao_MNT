<?php

/*
Script Name: 
Author: Luciano Moreira
Description: autenticação ldap em PHP
*/


if (!isset($_SESSION)) {
    session_start();
}


if (!isset($_SESSION['login'])) {

    header('Location: ../extensao_MNT/inicio.php?page=home.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/consulta.css">
    <link rel="stylesheet" href="assets/swal2/sweetalert2.min.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">

</head>

<body>

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">

                </div>

            </div>
        </div>

        <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6" style="width: 93%;">
                        <a href="../extensao_MNT/inicio.php?page=scr/adm/addprojeto.php"  style="float:right" class="btn btn-primary m-1 float-right" ><i class="fa fa-plus"></i> Adicionar Projeto</a>
                        <a href="../extensao_MNT/inicio.php?page=scr/adm/export/projetos.php" style="float:right" class="btn btn-success m-1 float-right"> <i class="fa fa-download"></i>Exportar para Excel</a>
                    </div>
                </div>
                <br>
        </div>

        <div class="height10">
        </div>
        <div class="row">

            <table id="myTable" class="table table-bordered table-striped" style="margin-left: 15px; width: 97%; margin-right: 15px;">
                <thead>
                    <th style='width:30%'>Projeto</th>
                    <th style='width:20%'>Inicio</th>
                    <th style='width:20%'>Termino</th>
                    <th style='width:10%'>Inscritos</th>
                    <th style='width:20%'>Ação</th>
                </thead>
                <tbody>
                    <?php
                    
                    include 'conexao/pdo.php';
                    $sql = " select cur.idcurso, cur.nome, cur.DataInicio, cur.DataLimite, vaga, (select count(*) from candidato where idcurso = cur.idCurso ) as inscritos from curso cur ";
                    $stmt = $pdo->prepare($sql);
                    $result = $stmt->execute();
                    if ($result) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $dataInicio = date('d/m/Y H:i', strtotime($row['DataInicio']));
                            $dataFim = date('d/m/Y H:i', strtotime($row['DataLimite']));
                            echo
                            "<tr>
                                    <td>" . $row['nome'] . "</td>	
                                    <td>" . $dataInicio . "</td>	
                                    <td>" . $dataFim . "</td>
                                    <td>" . $row['inscritos'] . "</td>
                                    <td style ='text-align: center;'>";
                                        echo "	<a class='btn btn-default btn-sm' href='#edit_". $row['idcurso'] . "'  data-toggle='modal'   target='_blank'><span class='fa fa-file-alt'></span></a>";
                                        echo "	<a class='btn btn-default btn-sm' href='#consulta_". $row['idcurso'] . "'  data-toggle='modal'   target='_blank'><span class='fa fa-file-excel'></span></a>";
                                        echo "  <a class='btn btn-default btn-sm' href='javascript:void(0)' id='delete_s' data-id='". $row['idcurso'] . "' ><i class='fa fa-ban'></i></a> 
                                    </td>

                            </tr>";

                            include('admverprojeto.php');

                        }

                    } else {

                        die('dados não encontrado');

                    }

                    ?>
                </tbody>
            </table>

        </div>

        <br><br>
        <div class="modal-footer" text-align: right;>
            <a href="../extensao_MNT/inicio.php?page=scr/adm/admmenu.php" type="button" class="btn btn-primary" data-dismiss="modal">
                Fechar</a>
        </div>

    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTable.bootstrap.min.js"></script>
   <script src="assets/swal2/sweetalert2.min.js"></script> 
   
    <!-- generate datatable on our table -->
    <script>
        var $prof = jQuery.noConflict();

        $prof(document).ready(function() {
            //inialize datatable
            $prof('#myTable').DataTable({
                "bLengthChange": false,
                "pageLength": 6,
                "processing": true,
                "serverSide": false,
                "dom": "<'row'<'col-lg-10 col-md-10 col-xs-12'f><'col-lg-2 col-md-2 col-xs-12'l>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
                }
            });
  
            // deletar projeto 
                $prof(document).on('click', '#delete_s', function(e){ 
                    var tr = $(this).closest('tr');
                    var productId = $(this).data('id');   
     
                    SwalDelete(productId);
                    e.preventDefault();
                });
        });


        function SwalDelete(productId){

                swal({
                    title: 'Confirma exclusão',
                    text: '',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Excluir',
                    showLoaderOnConfirm: true,
                    
                    preConfirm: function() {
                    
                            return new Promise(function(resolve) {
                
                                $.ajax({
                                    type: 'POST',
                                    url: 'scr/adm/admexcprojeto.php',
                                    async: false,
                                    data: {'delete': productId}
                                          
                                })

                               .done(function(response){
                                    swal('Excluido!');
                                    readConsulta();
                                })

                                .fail(function(){
                                    swal('Ops...', 'Item não excluido, problema na exclusão!', 'error');
                                });   

                            }); 
                                                      
                    },
                    allowOutsideClick: false			  
                });	
	    }
   
        function readConsulta(){
             $(location).attr('href', '../extensao_MNT/inicio.php?page=scr/adm/admprojetos.php');	
        }

    </script>

</body>

</html>