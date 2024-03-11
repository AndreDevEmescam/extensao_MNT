<?php

      $server = '192.168.70.57';
      $dbName = 'SisInscricaoExtensao';
      $uid = 'usuario';
      $pwd = '12345678';

        # ----------------------- CONEXÃO COM O BANCO DE DADOS ----------------------------------------------------- #

        try {
          $pdo = new PDO("sqlsrv:server=$server;Database=$dbName",
              $uid,
              $pwd,
              array(
                  //PDO::ATTR_PERSISTENT => true,
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              )
          );
      }
      catch(PDOException $e) {
          die("Error connecting to SQL Server: " . $e->getMessage());
      }
     
     
     
  
      // Free statement and connection resources.
    //  $stmt = null;
    //  $pdo = null; 
  ?>