<?php
    // class BaseDados{
    //     private $hostname = '192.168.70.57';
    //     private $username = 'usuario';
    //     private $password = '12345678';
    //     private $database = 'SisInscricaoExtensao';
    //     private $conexao;

    //     public function conectar(){
    //         $this->conexao = null;
    //         try
    //         {                
    //             $this->conexao = new PDO('mysql:host=' . $this->hostname . ';dbname=' . $this->database . ';charset=utf8', 
    //             $this->username, $this->password);
    //         }
    //         catch(Exception $e)
    //         {
    //             die('Erro : '.$e->getMessage());
    //         }

    //         return $this->conexao;
    //     }
    // }
    $server = '192.168.70.57';
    $dbName = 'sisegresso';
    $uid = 'usuario';
    $pwd = '12345678';

      # ----------------------- CONEXÃO COM O BANCO DE DADOS ----------------------------------------------------- #

      try {
        $pdo = new PDO("sqlsrv:server=$server;
                               Database=$dbName",
                               $uid,
                               $pwd,
                               array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        die("linha 38");
    }
    catch(PDOException $e) {
        die("Error connecting to SQL Server: " . $e->getMessage());
    }
?>
