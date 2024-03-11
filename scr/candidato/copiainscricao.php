<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('conexao/pdo.php');

$cpf = $_SESSION['cpf'];


$cpf = preg_replace("/[^0-9]/", "", $cpf);
$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

$sql = " SELECT *  FROM candidato";
$sql = $sql . " left join candidatoCurso on candidato.idCandidato = candidatoCurso.idCandidato ";
$sql = $sql . " WHERE ";
$sql = $sql . " candidato.cpf= '" . $cpf . "'";


$stmt = $pdo->query($sql);
$result = $stmt->fetch(PDO::FETCH_OBJ);

if ($result->Nome) {
    $Nome = $result->Nome;
    $Sexo = $result->Sexo;
    $Documento = $result->Documento;
    $EmissorDocumento = $result->EmissorDocumento;
    $DataNascimento = $result->DataNascimento;
    $Pai = $result->Pai;
    $Mae = $result->Mae;
    $Logradouro = $result->Logradouro;
    $NumeroLogradouro = $result->NumeroLogradouro;
    $Complemento = $result->ComplementoLogradouro;
    $Bairro = $result->Bairro;
    $Cidade = $result->Cidade;
    $Cep = $result->Cep;
    $Celular = $result->Celular;
    $Email = $result->Email;
    $Graduado = $result->Graduado;
    $GraduadoInstituicao = $result->GraduadoInstituicao;
    $GraduadoCidade = $result->GraduadoCidade;
    $GraduadoConclusao = $result->GraduadoConclusao;
    $Comp_residencia  = $result->Comp_residencia;
    $Cert_nascimento  = $result->Cert_nascimento;
    $Tit_eleitor  = $result->Tit_eleitor;
    $Tit_cpf  = $result->Tit_cpf;
    $Cert_reservista  = $result->Cert_reservista;
    $Ident_frete  = $result->Ident_frete;
    $Ident_verso  = $result->Ident_verso;
    $Diploma_verso  = $result->Diploma_verso;
    $Diploma_frente  = $result->Diploma_frente;
    $Preprojeto  = $result->Preprojeto;
    $Lattes  = $result->Lattes;
    $Comprolattes  = $result->Comprolattes;
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

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
    </style>

</head>

<body>

    <div style="text-align: center; margin-top: -25px;">
        <h2> Inscrição </h2>

        <label placeholder="CPF" class="form-control" id="cpf" name="cpf">CPF: <?php echo $cpf ?></label>

        <br>
    </div>


    <form name="formIscri" class="form-signin" method="post" autocomplete="off" action="#">

        <div class="container-fluid col-md-12">

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="nome">Nome Completo: <?php echo $Nome ?></label>

                </div>

                <div class="form-group col-md-2">
                    <label for="dataNascimento">Data nascimento:</label>

                </div>

                <div class="form-group col-md-2">
                    <label for="sexo">Sexo: <?php echo $Sexo ?></label>

                </div>

                <div class="form-group col-md-2">
                    <label for="Celular">Celular com DD: <?php echo $Celular ?></label>

                </div>

                <div class="form-group col-md-6">
                    <label for="cep">Nome Pai: <?php echo $Pai ?></label>


                </div>

                <div class="form-group col-md-6">
                    <label for="complemento">Nome Mãe: <?php echo $Mae ?></label>

                </div>

                <div class="form-group col-md-6">
                    <label for="email">E-Mail</label>

                </div>

                <div class="form-group col-md-2">
                    <label for="identidade">Identidade</label>

                </div>

                <div class="form-group col-md-2">
                    <label for="orgaoemissor">Orgão Emissor</label>

                </div>

            </div>


            <div class="form-row">

                <div class="form-group col-md-8">
                    <label for="endereco">Endereço</label>

                </div>
                <div class="form-group col-md-2">
                    <label for="nro">Numero</label>

                </div>
                <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="cidade">Cidade</label>

                </div>

                <div class="form-group col-md-2">
                    <label for="cep">CEP</label>

                </div>


                <div class="form-group col-md-3">
                    <label for="complemento">Complemento</label>
                </div>

                <div class="form-group col-md-6">
                    <label for="cep">Graduação</label>
                </div>

                <div class="form-group col-md-6">
                    <label for="complemento">Graduação Instituição</label>
                </div>

                <div class="form-group col-md-6">
                    <label for="cidade">Graduação Cidade</label>
                </div>


                <div class="form-group col-md-3">
                    <label for="cidade">Graduação Ano Conclusão</label>
                </div>

                <div style="margin-left: 30px;">
                    <h1 style="text-align: center;">
                        <p>Documento entregue </p>
                    </h1>
                    <input type="checkbox" id="age1" name="age" value="cr">
                    <label for="age1">Comprovante de Residência</label><br>

                    <input type="checkbox" id="age2" name="age" value="cn">
                    <label for="age2">Certidão de Nascimento/Casamento</label><br>

                    <input type="checkbox" id="age3" name="age" value="te">
                    <label for="age3">Titulo de Eleitor</label><br>

                    <input type="checkbox" id="age4" name="age" value="cp">
                    <label for="age4">CPF</label><br>

                    <input type="checkbox" id="age5" name="age" value="cv">
                    <label for="age5">Certificado de Reservista</label><br>

                    <input type="checkbox" id="age6" name="age" value="if">
                    <label for="age6">Careira de Identidade - Frente</label><br>

                    <input type="checkbox" id="age7" name="age" value="iv">
                    <label for="age7">Careira de Identidade - Verso</label><br>

                    <input type="checkbox" id="age8" name="age" value="df">
                    <label for="age8">Diploma de Graduação - Frente</label><br>

                    <input type="checkbox" id="age9" name="age" value="dv">
                    <label for="age9">Diploma de Graduação - Verso</label><br><br>
                </div>

                <div class="docs-overview py-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-4 py-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">
                                        <span class="theme-icon-holder card-icon-holder me-2">
                                            <i class="fas fa-laptop-code"></i>
                                        </span>
                                        <!--//card-icon-holder-->
                                        <span class="card-title-text">Quero me Inscrever</span>
                                    </h5>

                                    <a class="card-link-mask" href="inicio.php?page=scr/candidato/inslogin.php"></a>
                                </div>
                                <!--//card-body-->
                            </div>
                            <!--//card-->
                        </div>
                        <!--//col-->
                        <div class="col-12 col-lg-4 py-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">
                                        <span class="theme-icon-holder card-icon-holder me-2">
                                            <i class="fas fa-user-graduate"></i>
                                        </span>
                                        <!--//card-icon-holder-->
                                        <span class="card-title-text">Minha Inscrição</span>
                                    </h5>

                                    <a class="card-link-mask" href="inicio.php?page=scr/candidato/insloginm.php"></a>

                                </div>
                                <!--//card-body-->
                            </div>
                            <!--//card-->
                        </div>
                        <!--//col-->
                        <!--//col-->
                        <div class="col-12 col-lg-4 py-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">
                                        <span class="theme-icon-holder card-icon-holder me-2">
                                            <i class="fas fa-tools"></i>
                                        </span>
                                        <!--//card-icon-holder-->
                                        <span class="card-title-text">Administração</span>
                                    </h5>

                                    <a class="card-link-mask" href="inicio.php?page=scr/adm/admlogin.php"></a>

                                </div>
                                <!--//card-body-->
                            </div>
                            <!--//card-->
                        </div>
                        <!--//col-->

                    </div>
                    <!--//row-->
                </div>


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

</body>

</html>