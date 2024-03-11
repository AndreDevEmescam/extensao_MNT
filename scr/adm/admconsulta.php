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

    header('Location: ../extensao/inicio.php?page=home.php');
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
    <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
  
    <script type="text/javascript">
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();
            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
</head>

<body>

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">

                </div>

            </div>
        </div>

        <div class="height10">
        </div>
        <div class="row">

            <table id="myTable" class="table table-bordered table-striped" style="margin-left: 15px; width: 97%; margin-right: 15px;">
                <thead>
                    <th style='width:25%'>Nome</th>
                    <th style='width:25%'>Projeto</th>
                    <th style='width:14%'>Celular</th>
                    <th style='width:12%'>Matricula</th>
                    <th style='width:6%'>Periodo</th>
                    <th style='width:18%'>Ação</th>
                </thead>
                <tbody>
                    <?php
                    // include 'conexao/conectar.php';
                    include 'conexao/pdo.php';
                    $sql = " SELECT ca.idCandidato, co.nome as nomeCurso, ca.Email, ca.Nome as nomeAluno, ca.Celular, ca.idCandidato, ca.cpf, ca.idcurso, ca.Curso, ";
                    $sql = $sql . " ca.matricula, ca.Periodo, co.enviarArquivo, ca.arquivo FROM candidato ca ";
                    $sql = $sql . " inner join curso co on ca.idCurso = co.idCurso ";
                  //  $sql = $sql . " order by candidato.idCandidato DESC ";
                    $stmt = $pdo->prepare($sql);
                    $result = $stmt->execute();
                    if ($result) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $dataDia = date('d/m/Y H:i', strtotime($row['DataInscricao']));
                            echo
                            "<tr>
                                    <td>" . $row['nomeAluno'] . "</td>	
                                    <td>" . $row['nomeCurso'] . "</td>	
                                    <td>" . $row['Celular'] . "</td>
                                    <td>" . $row['matricula'] . "</td>
                                    <td style ='text-align: center;'>" . $row['Periodo'] . "</td>
                                    <td style ='text-align: center;'>";
                                        echo "	<a href='#consulta_" . $row['idCandidato'] . "'  data-toggle='modal' class='btn btn-default btn-sm'  target='_blank'><span class='fa fa-file-alt'></span></a>";
                                        echo "	<a href='#edit_" . $row['idCandidato'] . "'  data-toggle='modal' class='btn btn-default btn-sm'><span class='fa fa-eye'></span></a>";
                                        echo "	<a href='#delete_" . $row['idCandidato'] . "'  data-toggle='modal' class='btn btn-default btn-sm'><span class='fa fa-ban'></span></a>                  
                                    </td>

                            </tr>";

                            include('admvisualizar.php');
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
            <a href="../extensao/inicio.php?page=scr/adm/admmenu.php" type="button" class="btn btn-primary" data-dismiss="modal">
                Fechar</a>
        </div>

    </div>






    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTable.bootstrap.min.js"></script>
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

            //hide alert
            $prof(document).on('click', '.close', function() {
                $prof('.alert').hide();
            })
        });

        $(document).ready(function() {
            $('#example').on('click', 'tr', function() {
                $("#inbox_modal").modal('show');
            });
        });
    </script>

</body>

</html>