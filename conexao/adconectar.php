<?php
  
    $ldap_server = "192.168.70.8";
    $auth_user = "Moodle";
    $auth_pass = "2emesead1";
    $port = 389;
    $base_dn = "dc=ccsv,dc=br";

    // connect to ldap server
    $ldapconn = ldap_connect($ldap_server)  or die("Não foi possível conectar ao servidor LDAP.");

    if ($ldapconn) {

        $ldapbind = ldap_bind($ldapconn, $auth_user, $auth_pass);

    }

 
?>