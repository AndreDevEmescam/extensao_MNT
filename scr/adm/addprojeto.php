<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('conexao/pdo.php');

$cpf = $_SESSION['cpf'];
$curso = $_SESSION['curso'];
$enviarArquivo = $_SESSION['enviarArquivo'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/cards.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/consulta.css">
    <link rel="stylesheet" href="assets/swal2/sweetalert2.min.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">

    <script type="text/javascript" src="assets/js/formulario.JS"></script>
    
    <style>
        .projeto-container {

            margin-left: 15%;
        }

        .cancelar {
            float: left;
            width: 50%;
            margin-top: 10px;

        }

        .enviar {
            float: left;
            width: 50%;
            margin-top: 10px;
        }

        body {
                color: #566787;
                background: #E0F8E0;
                font-family: 'Varela Round', sans-serif;
                font-size: 13px;
            }
    </style>

</head>

<body>
    <div class="row">
        <div class="card green">
        <label id="cpf" name="cpf" style="text-align: center;"><h2>Ficha do Projeto</h2></label>
      
        <div class="form">
            <label id="cpf" name="cpf" style="text-align: center;"><h2><?php echo $curso ?></h2></label>
            
            <br>
            <form method= "POST" action="scr/adm/admadd.php">

                <div class="container-fluid col-md-12">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nome">Nome Projeto</label>
                            <input type="text" class="form-control" id="nome" placeholder="Descrição do projeto" autofocus="autofocus" name="nome" value="" maxlength="150" required />
                        </div>

                        <div class="form-group col-md-4">
                            <label for="datainicio">Data Inicio</label>
                            <input type="datetime-local" class="form-control" id="datainicio" name="datainicio"  value="" maxlength="10" required />
                        </div>

                        <div class="form-group col-md-4">
                            <label for="datalimite">Data Termino</label>
                            <input type="datetime-local" class="form-control" id="datalimite" name="datalimite"  value="" maxlength="10" required />
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label for="vaga">Vagas</label>
                            <input type="text" class="form-control" id="vaga" name="vaga" value="999" placeholder="vagas" maxlength="5" />
                        </div>

                        <div class="form-group col-md-8">
                            <br>
                            <label for="enviarArquivo">Enviar arquivo ?</label>
                            <br>
                            <input type="radio" id="sim" name="enviarArquivo" value="S">
                            <label for="sim">SIM</label><br>
                            <input type="radio" id="nao" name="enviarArquivo" value="N" checked>
                            <label for="nao">NÃO</label><br>
                        </div>
<!--
                        <div class="form-group col-md-4">
                            <br>
                            <label for="enviarArquivo">Enviar arquivo ?</label>
                            <br>
                            <input type="radio" id="sim" name="enviarArquivo" value="S">
                            <label for="sim">SIM</label><br>
                            <input type="radio" id="nao" name="enviarArquivo" value="N" checked>
                            <label for="nao">NÃO</label><br>
                        </div>
-->

                    </div>

                    <br><br>
                    <div class="projeto-container">       

                            <div class="enviar">
                                  <a  type="submit" style="cursor:pointer; background-color: #2E8B57; color: #ffffff; width: 70%;" class="btn btn-lg btn-primary btn-block" id="submitButton">&nbsp;&nbsp;&nbsp;&nbsp;OK&nbsp;&nbsp;&nbsp;&nbsp;</a> 
                              
                            </div>

                            <div class="cancelar">
                              <a href="../extensao_MNT/inicio.php?page=scr/adm/admprojetos.php" style="cursor:pointer; background-color: #2E8B57; color: #ffffff; width: 70%;" class="btn btn-lg btn-primary btn-block" id="motivo">&nbsp;Cancelar&nbsp;</a> 
                            </div>


                        </div>
                    </div>

            </form>
        </div>   
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
 
           $prof("#submitButton").click(function(ev) {
                var nome = $("#nome").val();
                var datainicio = $("#datainicio").val();
                var datalimite = $("#datalimite").val();
                var vaga = $("#vaga").val();
                //var enviarArquivo = $("#enviarArquivo").val();               
                var enviarArquivo = $("input[name='enviarArquivo']:checked").val();            
                swal({
                    title: 'Confirma inclusão projeto',
                    text: '',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Salvar',
                    showLoaderOnConfirm: true,                   

                    preConfirm: function() {                      
                        $.ajax({
                            type: 'POST',
                            url: readConsulta(nome, datainicio, datalimite, vaga, enviarArquivo),                            
                            async: false,
                            cache: false,
                            data: {'nome': nome, 'datainicio': datainicio, 'datalimite': datalimite, 'vaga': vaga, 'enviarArquivo': enviarArquivo}
                            
                        })

                        .done(function(response) {
                            swal("Incluído!", response.message, response.status);
                            readConsulta2();
                        })

                        .fail(function(data){
                            swal('Ops...', 'Item não incluído, problema na inclusão!', 'error');
                        });
                    },

                    allowOutsideClick: false			  
                });	

            });      
            
            function readConsulta(nome, datainicio, datalimite, vaga, enviarArquivo) {               

                var redirectURL = "../extensao_MNT/inicio.php?page=scr/adm/admadd.php&nome=" + encodeURIComponent(nome) +
                                "&datainicio=" + encodeURIComponent(datainicio) +
                                "&datalimite=" + encodeURIComponent(datalimite) +
                                "&vaga=" + encodeURIComponent(vaga) +
                                "&enviarArquivo=" + encodeURIComponent(enviarArquivo);
                window.location.href = redirectURL;
            }


        function readConsulta2(){            
            $(location).attr('href', '../extensao_MNT/inicio.php?page=scr/adm/admprojetos.php');	
        }

    </script>

</body>

</html>