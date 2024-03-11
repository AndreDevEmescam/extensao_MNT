<?php
/*
Script Name: 
Author: Luciano Moreira
Description: autenticação ldap em PHP
*/

if (!isset($_SESSION)) {
    session_start();
}

include 'conexao/pdo.php';

$ldapDomain = "@ccsv.br";             // defina aqui seu domínio ldap
$ldapHost = "ldap://192.168.70.8";    // defina aqui seu host ldapt
$ldapPort = "389";                    // ldap Port (default 389)
$ldapUser  = "Moodle";                // ldap User (rdn or dn)
$ldapPassword = "2emesead1";          // Senha associada ao ldap

$successMessage = "";
$errorMessage = "";
$usuario = trim($_POST["login"]);

$ldapConnection = ldap_connect($ldapHost, $ldapPort)
    or die("Não foi possível conectar ao servidor LDAP.");

if (isset($_POST["ldapLogin"])) {

    $sql = "SELECT * FROM usuarios where usuario = :musuario";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':musuario', $usuario, PDO::PARAM_STR);
    $statement->execute();
    $publisher = $statement->fetch(PDO::FETCH_ASSOC);

    if ($publisher) {

        $statement = null;

        if ($ldapConnection) {

            if (isset($_POST["login"]) && $_POST["login"] != "")
                $ldapUser = addslashes(trim($_POST["login"]));
            else
                $errorMessage = "Invalid User value!!";

            if (isset($_POST["senha"]) && $_POST["senha"] != "")
                $ldapPassword = addslashes(trim($_POST["senha"]));
            else
                $errorMessage = "Invalid Password value!!";

            if ($errorMessage == "") {
                // binding to ldap server
                ldap_set_option($ldapConnection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
                ldap_set_option($ldapConnection, LDAP_OPT_REFERRALS, 0);
                $ldapbind = @ldap_bind($ldapConnection, $ldapUser . $ldapDomain, $ldapPassword);

                // verify binding
                if ($ldapbind) {
                    ldap_close($ldapConnection);    // close ldap connection
                    $_SESSION['login'] = $_POST["login"];
                    header('Location: ../extensao/inicio.php?page=scr/adm/admmenu.php');
                } else
                    $errorMessage = "Credenciais inválidas!";
            }
        }
    } else {
        die('usuario não autorizado');
    }
}
?>




<!DOCTYPE html>
<html lang="">

<body>
    <div class="container-fluid col-md-6">
        <br><br><br>
        <h2 style="text-align: center">LOGIN</h2>

        <form name="formLogin" class="form-signin" method="post">
            <br>
            <div class="form-label-group">

                <input type="text" class="form-control" id="login" placeholder="Login" autofocus="autofocus" name="login" value="" />

            </div>
            <br>
            <div class="form-label-group">

                <input type="password" class="form-control" id="senha" placeholder="senha" autofocus="autofocus" name="senha" value="" />

            </div>
            <br><br>
            <div class="col-md-18 sm" style="text-align: center" ;>
                <a href="../extensao/inicio.php?page=home.php" style="cursor:pointer; background-color: #2E8B57; color: #ffffff;" class="btn btn-lg btn-primary btn-block" id="motivo">&nbsp;Cancelar&nbsp;</a>
                <button type="submit" style="cursor:pointer; background-color: #2E8B57; color: #ffffff;" class="btn btn-lg btn-primary btn-block" id="ldapLogin" name="ldapLogin">&nbsp;&nbsp;&nbsp;&nbsp;Enviar&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <span class="field-validation-valid text-danger" data-valmsg-for="ErrorLogin" data-valmsg-replace="true"></span>
            </div>

        </form>

    </div>
</body>

</html>