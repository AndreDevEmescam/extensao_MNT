<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('conexao/pdo.php');

$cpf = $_SESSION['cpf'];
$idcurso = $_SESSION['idCurso'];

$sql = " SELECT co.nome as nomeCurso, ca.Email, ca.Nome as nomeAluno, ca.Celular, ca.idCandidato, ca.cpf, ca.idcurso, ca.Curso, ";
$sql = $sql . " ca.matricula, ca.Periodo, co.enviarArquivo FROM candidato ca ";
$sql = $sql . " inner join curso co on ca.idCurso = co.idCurso ";
$sql = $sql . " WHERE ";
$sql = $sql . " ca.cpf= '" . $cpf . "'";
//$sql = $sql . " and ";
//$sql = $sql . " ca.idcurso= '" . $idcurso . "'";


$stmt = $pdo->query($sql);
$result = $stmt->fetch(PDO::FETCH_OBJ);

if ($result->nomeAluno) {

    $curso = $result->Curso;
    $email = $result->Email;
    $nomeAluno = $result->nomeAluno;
    $nomeCurso = $result->nomeCurso;
    $celular = $result->Celular;
    $idcurso = $result->idcurso;
    $matricula = $result->matricula;
    $periodo = $result->Periodo;
    $enviarArquivo = $result->enviarArquivo;
  

} else {

    header('Location: ../extensao/inicio.php?page=home.php');
    
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/cards.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap" rel="stylesheet" />

    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            $('#arquivo').on('input', function() {
                $('#motivo').prop('disabled', !this.value);
            });
        });


        function enviarEdi() {
            var i = 0;
            swal.fire({

                title: 'Enviar arquivo ?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Enviar',
                denyButtonText: 'Cancelar',


            }).then((result) => {

                if (result.isConfirmed) {

                    Swal.fire('Enviado!', '', 'success')

                    setInterval(function() {
                        document.getElementById("edit").click();
                    }, 1500);

                } else if (result.isDenied) {

                    Swal.fire('Cancelado', '', 'info')

                }

            });

            return false;
        }

        function enviarEdi2() {
            var i = 0;
            swal.fire({

                title: 'Enviar arquivo ?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Enviar',
                denyButtonText: 'Cancelar',


            }).then((result) => {

                if (result.isConfirmed) {

                    Swal.fire('Enviado!', '', 'success')

                    setInterval(function() {
                        document.getElementById("edit2").click();
                    }, 1500);

                } else if (result.isDenied) {

                    Swal.fire('Cancelado', '', 'info')

                }

            });

            return false;
        }
    </script>
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

        .invisivel {
            visibility: hidden;
        }

        body {
            color: #566787;
            /*   background: #f5f5f5; */
            background: #E0F8E0;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
    </style>

</head>

<body>
    <div class="row">
        <div class="card green">

        <label  style="text-align: center;"><h2>Ficha de Inscrição</h2></label>

        <label  style="text-align: center; "><h3><?php echo $nomeCurso?></h3></label>
      
        <br>
         
            <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome Completo:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $nomeAluno ?></span>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="matricula">Matricula:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $matricula ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="periodo">Periodo:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $periodo ?></span>
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label for="Celular">Celular com DD:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $celular ?></span> 
                        </div>

                        <div class="form-group col-md-7">
                            <label for="curso">Curso:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $curso ?></span>
                        </div>

                        <div class="form-group col-md-11">
                            <label for="email">E-Mail:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $email ?></span>
                        </div>

                        <label id="cpf" name="cpf" style="text-align: center; color: red"><h5> OS ESTUDANTES DEVERÃO ESTAR CURSANDO OS PERÍODOS REFERENTES AO SEMESTRE DE 2024/1.</h5></label>

             </div>

            <?php if($enviarArquivo=="S"){
           
                echo '
                        <form method="post" action="scr/adm/receber_upload.php" enctype="multipart/form-data">
                            <h4>Upload Documentos</h4>
                            <br>
                        
                            <div style="background-color: #DCDCDC;">
                                <br>
                                <!--  <p>O arquivo anexado só serão enviados se clicar na tecla "ENVIAR" em verde.</p> -->
                                <br>
                                <div style="margin-left: 30px;">
                                    <label>Selecione arquivo para Upload:</label>
                                    <input type="file" name="arquivo" id="arquivo" />
                                </div>
                                <br><br>
                            </div>
                            <br>


                            <div class="projeto-container">
                                <div class="enviar">
                                    <input type="hidden" id="idcandidato" name="idcandidato" value="<?php echo $idcandidato ?>">
                                    <input type="hidden" id="idcurso" name="idcurso" value="<?php echo $idcurso ?>">
                                    <button onclick="return enviarEdi()" type="button" style="cursor:pointer; background-color: #2E8B57; color: #ffffff; width: 150%;" class="btn btn-lg btn-primary btn-block" id="motivo">&nbsp;&nbsp;&nbsp;&nbsp;Enviar Arquivo&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    <button type="submit" id="edit" name="edit" class="invisivel"></button>
                                </div>

                            </div>
                        </form>
            ';
            }
            ?>

        </div>

    </div>


    <div class="cancelar">
        <a href="../extensao/inicio.php?page=home.php" style="cursor:pointer; background-color: #2E8B57; color: #ffffff; width: 150%; margin-left: 25%;" class="btn btn-lg btn-primary btn-block" id="motivo">&nbsp;Concluído&nbsp;</a>
    </div>



</body>

</html>