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
    $Comp_residencia  = $result->comp_residencia;
    $Cert_nascimento  = $result->cert_nascimento;
    $Tit_eleitor  = $result->tit_eleitor;
    $Tit_cpf  = $result->tit_cpf;
    $Cert_reservista  = $result->cert_reservista;
    $Ident_frente  = $result->ident_frente;
    $Ident_verso  = $result->ident_verso;
    $Diploma_verso  = $result->diploma_verso;
    $Diploma_frente  = $result->diploma_frente;
    $Preprojeto  = $result->preprojeto;
    $Lattes  = $result->lattes;
    $Comprolattes  = $result->comprolattes;

    $Status  = $result->status;

    $date = date_create($datanascimeto);
    $datanascimeto = date_format($date, 'd/m/Y');
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="footer.css" />

    <link rel="stylesheet" href="assets/css/cards.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap" rel="stylesheet" />

    <style>
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
            <h4>Cadastro</h4>
            <li><label for="nome">Nome Completo:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $Nome ?></span></label></li>
            <li>
                <label for="dataNascimento">Data nascimento:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $datanascimeto ?>&nbsp;&nbsp;&nbsp;</span></label>
                <label for="sexo">Sexo:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $Sexo ?></span></label>
            </li>
            <li>
                <label for="Celular">Celular:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $Celular ?></span></label>
            </li>
            <li><label for="cep">Nome Pai:&nbsp;&nbsp;<span style='color: #0c0c0e;'> <?php echo $Pai ?></span></label></li>
            <li><label for="complemento">Nome Mãe:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $Mae ?></span></label></li>
            <li><label for="email">E-Mail:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $Email ?></span></label></li>
            <li>
                <label for="identidade">Identidade:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $Documento ?>&nbsp;&nbsp;&nbsp;</span></label>
            </li>
            <li>
                <label for="orgaoemissor">Orgão Emissor:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $EmissorDocumento ?></span></label>
            </li>
            <li><label for="endereco">Endereço:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $Logradouro ?></span></label></li>
            <li>
                <label for="nro">Numero:&nbsp;&nbsp;<span style='color: #0c0c0e;'> <?php echo $NumeroLogradouro ?>&nbsp;&nbsp;&nbsp;</span></label>
                <label for="bairro">Bairro:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $Bairro ?>&nbsp;&nbsp;&nbsp;</span></label>
                <label for="cidade">Cidade:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $Cidade ?>&nbsp;&nbsp;&nbsp;</span></label>
                <label for="cep">CEP:&nbsp;&nbsp; <span style='color: #0c0c0e;'><?php echo $Cep ?></span></label>
            </li>
            <li>
                <label for="complemento">Complemento:&nbsp;&nbsp;<span style='color: #0c0c0e;'> <?php echo $ComplementoLogradouro ?></span></label>
            </li>
            <li>
                <label for="cep">Graduação:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $Graduado ?> &nbsp;&nbsp;&nbsp;</span></label>
                <label for="complemento">Graduação Instituição:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $GraduadoInstitucao ?></span></label>
            </li>
            <li>
                <label for="cidade">Graduação Cidade:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $GraduadoCidade ?>&nbsp;&nbsp;&nbsp;</span></label>
                <label for="cidade">Graduação Ano Conclusão:&nbsp;&nbsp;<span style='color: #0c0c0e;'><?php echo $GraduadoConclusao ?></span></label>
            </li>
            <br>
            <h5 style="text-align:center; color:chocolate">Situação Inscrição: <?php echo $Status ?><h5>
        </div>

    </div>
    <div class="row">
        <div class="card blue">
            <h4>Documentos</h4>
            <label for="age1">Comprovante de Residência&nbsp;&nbsp;&nbsp;
                <?php
                if ($Comp_residencia) {
                    echo '<i class="fas fa-check"style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>
            <label for="age2">Certidão de Nascimento/Casamento&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Cert_nascimento) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>
            <label for="age3">Titulo de Eleitor&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Tit_eleitor) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>
            <label for="age4">CPF&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Tit_cpf) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>
            <label for="age5">Certificado de Reservista&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Cert_reservista) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>
            <label for="age6">Careira de Identidade - Frente&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Ident_frente) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>

            <label for="age7">Careira de Identidade - Verso&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Ident_verso) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>
            <label for="age8">Diploma de Graduação - Frente&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Ident_verso) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>
            <label for="age9">Diploma de Graduação - Verso&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Diploma_verso) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>

        </div>
    </div>
    <div class="row">
        <div class="card red">
            <h4>Pré-projeto e Currículo Lattes</h4>
            <label for="age7">Pré-projeto&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Preprojeto) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>
            <label for="age8">Currículo Lattes&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Lattes) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>
            <label for="age9">Comprovantes do currículo Lattes&nbsp;&nbsp;&nbsp;
                <?php
                if (strlen($Comprolattes) > 0) {
                    echo '<i class="fas fa-check" style="color:#33cc33;"></i>';
                } else {
                    echo '<i class="fas fa-ban" style="color:red"></i>';
                }
                ?>
            </label>

        </div>
    </div>
    <br><br>
    <div class="cancelar">
        <a href="../extensao/inicio.php?page=home.php" style="cursor:pointer; background-color: #2E8B57; color: #ffffff; width: 50%;  margin-left: 25%;" class="btn btn-lg btn-primary btn-block" id="motivo">&nbsp;Sair&nbsp;</a>
    </div>
</body>

</html>