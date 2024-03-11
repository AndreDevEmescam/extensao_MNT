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
        <label id="cpf" name="cpf" style="text-align: center;"><h2>Ficha de Inscrição</h2></label>
      
        
            <label id="cpf" name="cpf" style="text-align: center;"><h2><?php echo $curso ?></h2></label>
            
            <br>
            <form name="formIscri" class="form-signin" method="post" autocomplete="off" action="scr/candidato/addinscricao.php">

                <div class="container-fluid col-md-12">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" placeholder="Nome Completo" autofocus="autofocus" name="nome" value="" maxlength="150" maxlength="10" required />
                        </div>

                        <div class="form-group col-md-3">
                            <label for="matricula">Matricula</label>
                            <input type="text" class="form-control" id="Matricula" name="Matricula" maxlength="10" value="" maxlength="10" required />
                        </div>

                        <div class="form-group col-md-2">
                            <label for="periodo">Periodo</label>
                            <input type="text" class="form-control" id="Periodo" name="Periodo" maxlength="2" value="" maxlength="2" required />
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label for="Celular">Celular com DD</label>
                            <input type="text" placeholder="Celular" class="form-control" id="Celular" name="Celular" value="" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" required />
                        </div>

                        <div class="form-group col-md-7">
                            <label for="curso">Curso</label>
                            <input type="text" class="form-control" id="Curso" name="Curso" value="" placeholder="Curso" maxlength="200" />
                        </div>

                        <div class="form-group col-md-11">
                            <label for="email">E-Mail</label>
                            <input type="email" placeholder="E-mail" class="form-control" id="Email" name="Email" value="" required />
                        </div>


                    </div>

               

                    <label id="cpf" name="cpf" style="text-align: center; color: red"><h5> OS ESTUDANTES DEVERÃO ESTAR CURSANDO OS PERÍODOS REFERENTES AO SEMESTRE DE 2024/1.</h5></label>

                    <br><br>
                    <div class="projeto-container">       
                            <div class="cancelar">
                                <a href="../extensao/inicio.php?page=home.php" style="cursor:pointer; background-color: #2E8B57; color: #ffffff; width: 70%;" class="btn btn-lg btn-primary btn-block" id="motivo">&nbsp;Cancelar&nbsp;</a>
                            </div>

                            <div class="enviar">
                                <button type="submit" style="cursor:pointer; background-color: #2E8B57; color: #ffffff; width: 70%;" class="btn btn-lg btn-primary btn-block" id="motivo">&nbsp;&nbsp;&nbsp;&nbsp;Enviar&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>

                        </div>
                    </div>

            </form>
        </div>
    </div>

</body>

</html>