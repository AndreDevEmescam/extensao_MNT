<?php
if (!isset($_SESSION)) {
    session_start();
}



 require_once('conexao/pdo.php');

$cpf = '0';

$vaga = 0;
$inscritos = 0;



if (isset($_POST) && (!empty($_POST))) {
   
    $cpf = $_POST['cpf'];
    $idcurso = $_POST['idCurso'];
    $projeto = $_POST['projeto'];

  if(!empty($idcurso)){

 //   $sql = " SELECT *  FROM curso";   
 //   $sql = $sql . " WHERE ";
 //   $sql = $sql . " curso.idcurso= '" . $idcurso . "'";

    $sql = " select idcurso, nome, enviarArquivo, vaga, (select count(*) from candidato where ";
    $sql = $sql . " candidato.idcurso = '". $idcurso . "') ";
    $sql = $sql . " as inscritos from curso where curso.idcurso ='" . $idcurso . "'";


    $stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    if ($result->nome) {
   
        $_SESSION['idCurso'] = $result->idcurso;
        $_SESSION['projeto'] =$result->nome;
        $_SESSION['enviarArquivo'] =$result->enviarArquivo;

        $vaga =  $result->vaga;
        $inscritos =  $result->inscritos;

    }


  }
                if (validaCPF($cpf)) {

                    $cpf = preg_replace("/[^0-9]/", "", $cpf);
                    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
                
                    $sql = " SELECT *  FROM candidato";   
                    $sql = $sql . " WHERE ";
                    $sql = $sql . " candidato.cpf = '" . $cpf . "'";
               //     $sql = $sql . " and ";
                //    $sql = $sql . " candidato.idcurso = '" . $idcurso . "'";

                    $stmt = $pdo->query($sql);
                    $result = $stmt->fetch(PDO::FETCH_OBJ);

                    if ($result->Nome) {

                        $_SESSION['cpf'] = $cpf;
                    
                        header('Location: ../extensao_MNT/inicio.php?page=scr/candidato/upload.php');


                    } else {

                    $_SESSION['cpf'] = $cpf;
                    
                        if($inscritos < $vaga){

                            header('Location: ../extensao_MNT/inicio.php?page=scr/candidato/inscadastro.php');

                        } else {

                            echo '<script>alert("Inscrições encerradas");</script>';

                        }

                    }
                } else {

                    echo '<script>alert("CPF invalido");</script>';
                }
}


function validaCPF($cpf)
{


    // Verifica se um número foi informado
    if (empty($cpf)) {
        return false;
    }

    // Elimina possivel mascara
    $cpf = preg_replace("/[^0-9]/", "", $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    // Verifica se o numero de digitos informados é igual a 11 
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    else if (
        $cpf == '00000000000' ||
        $cpf == '11111111111' ||
        $cpf == '22222222222' ||
        $cpf == '33333333333' ||
        $cpf == '44444444444' ||
        $cpf == '55555555555' ||
        $cpf == '66666666666' ||
        $cpf == '77777777777' ||
        $cpf == '88888888888' ||
        $cpf == '99999999999'
    ) {


        return false;
        // Calcula os digitos verificadores para verificar se o
        // CPF é válido
    } else {

        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{
                    $c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{
                $c} != $d) {
                return false;
            }
        }

        return true;
    }
}

?>


<!DOCTYPE html>
<html lang="">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script language="javascript" type="text/javascript">
        function cadastrado() {

            var i = 0;
            swal.fire({

                title: 'Gravando inscrição',
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
    </script>


</head>

<body>

    <form name="formCpf" class="form-signin" method="post">
        <div class="container-fluid col-md-6">
            <br><br><br>
            <h2 style="text-align: center">Quero me Inscrever</h2>
            <br>
            <div class="form-label-group">      
                <input name="cpf" id="cpf" class="form-control" placeholder="CPF" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );" required />
            </div>
            <br>
            <div class="">
                <select name="idCurso" id="idCurso" class="form-control" style="height: 50px;" required>
                    <option value="">Selecione</option>

                    <?php

                            $sql = "select * from curso where  GETDATE() BETWEEN DataInicio AND DataLimite ";

                            $stmt = $pdo->prepare($sql);
                            $result = $stmt->execute();

                            if ($result) {

                                while ($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $idCurso = $dados['idCurso'];
                                    $projeto = $dados['Nome'];

                                    echo '<option value=' . $idCurso . '>' . $projeto . '</option>';
                                }
                            }


                    ?>
                </select>

            </div>

            <br><br>
            <div class="col-md-18 sm" style="text-align: center" ;>
                <a href="../extensao_MNT/inicio.php?page=home.php" style="cursor:pointer; background-color: #2E8B57; color: #ffffff;" class="btn btn-lg btn-primary btn-block" id="motivo">&nbsp;Cancelar&nbsp;</a>
                <button type="submit" style="cursor:pointer; background-color: #2E8B57; color: #ffffff;" class="btn btn-lg btn-primary btn-block" id="motivo">&nbsp;&nbsp;&nbsp;&nbsp;Enviar&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <span class="field-validation-valid text-danger" data-valmsg-for="ErrorLogin" data-valmsg-replace="true"></span>
            </div>

        </div>
        <br><br><br><br><br><br>
    </form>

</body>

<script type="text/javascript">
    function fMasc(objeto, mascara) {
        obj = objeto
        masc = mascara
        setTimeout("fMascEx()", 1)
    }

    function fMascEx() {
        obj.value = masc(obj.value)
    }

    function mTel(tel) {
        tel = tel.replace(/\D/g, "")
        tel = tel.replace(/^(\d)/, "($1")
        tel = tel.replace(/(.{3})(\d)/, "$1)$2")
        if (tel.length == 9) {
            tel = tel.replace(/(.{1})$/, "-$1")
        } else if (tel.length == 10) {
            tel = tel.replace(/(.{2})$/, "-$1")
        } else if (tel.length == 11) {
            tel = tel.replace(/(.{3})$/, "-$1")
        } else if (tel.length == 12) {
            tel = tel.replace(/(.{4})$/, "-$1")
        } else if (tel.length > 12) {
            tel = tel.replace(/(.{4})$/, "-$1")
        }
        return tel;
    }

    function mCNPJ(cnpj) {
        cnpj = cnpj.replace(/\D/g, "")
        cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2")
        cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
        cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2")
        cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2")
        return cnpj
    }

    function mCPF(cpf) {
        cpf = cpf.replace(/\D/g, "")
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
        return cpf
    }

    function mCEP(cep) {
        cep = cep.replace(/\D/g, "")
        cep = cep.replace(/^(\d{2})(\d)/, "$1.$2")
        cep = cep.replace(/\.(\d{3})(\d)/, ".$1-$2")
        return cep
    }

    function mNum(num) {
        num = num.replace(/\D/g, "")
        return num
    }
</script>

</html>