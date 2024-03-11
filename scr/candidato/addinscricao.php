<?php


if (!isset($_SESSION)) {
    session_start();
}

require_once('../../conexao/pdo.php');


if (isset($_POST) && (!empty($_POST))) {

    $cpf = $_SESSION['cpf'];
    $idcurso = $_SESSION['idCurso'];
    $curso = $_SESSION['curso'];
    $enviarArquivo = $_SESSION['enviarArquivo'];

    $nome  = $_POST['nome'];
    $matricula = $_POST['Matricula'];
    $periodo = $_POST['Periodo'];
   
    $celular = $_POST['Celular'];
    $email = $_POST['Email'];
    $telefone = $celular;

    $dataInscricao = date('Y-m-d h:i:s a', time());
    $telefone = $celular;

    $idCadastro = 1;
    $CodBanco = 104;
    $idUf = 9;
    $idformapagamento = 2;
    $cidade = 'Vitoria';
    $idcamisa = 4;
    $idAnoSemestre = 21;
 //   $idCadastro = 1;



if($enviarArquivo=='N'){


    echo '
    
            <html>
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script type="text/javascript">
                function redirectTime(){
                    var i = 0;
                    swal.fire({

                        title: "Salvar inscrição",
                        showDenyButton: false,
                        showCancelButton: true,
                        confirmButtonText: "Enviar",
                        denyButtonText: "Cancelar",


                    }).then((result) => {

                       
                        if (result.isConfirmed) {

                        
                            

                                ';


                                $sql = "INSERT INTO candidato(idAnoSemestre, CodBanco, idUf, idFormaPagamento, Cpf,
                                Nome, Cidade, Telefone, Celular, Email, idCamisa, Curso, Periodo, Matricula, DataInscricao, idCurso)
                                VALUES (:midAnoSemestre, :mCodBanco, :midUf, :midFormaPagamento, :mcpf, :mNome, :mCidade, :mTelefone, :mCelular, :mEmail, :midCamisa,
                                :mCurso, :mPeriodo, :mMatricula, :mdataInscricao, :mIdcurso)";
                        
                                $stmt = $pdo->prepare($sql);
                        
                           
                           
                                $stmt->bindParam(':midAnoSemestre', $idAnoSemestre);
                                $stmt->bindParam(':mCodBanco', $CodBanco);
                                $stmt->bindParam(':midUf', $idUf);
                                $stmt->bindParam(':midFormaPagamento', $idformapagamento);
                                $stmt->bindParam(':mcpf', $cpf, PDO::PARAM_STR);
                                $stmt->bindParam(':mNome', $nome, PDO::PARAM_STR);
                                $stmt->bindParam(':mCidade', $cidade, PDO::PARAM_STR);
                                $stmt->bindParam(':mTelefone', $celular, PDO::PARAM_STR);
                                $stmt->bindParam(':mCelular', $celular, PDO::PARAM_STR);
                                $stmt->bindParam(':mEmail', $email, PDO::PARAM_STR);
                                $stmt->bindParam(':midCamisa', $idcamisa);
                                $stmt->bindParam(':mCurso', $curso, PDO::PARAM_STR);
                                $stmt->bindParam(':mPeriodo', $periodo, PDO::PARAM_STR);
                                $stmt->bindParam(':mMatricula', $matricula, PDO::PARAM_STR);
                                $stmt->bindParam(':mdataInscricao', $dataInscricao);
                                $stmt->bindParam(':mIdcurso', $idcurso);
                            
                                
                                $stmt->execute();
                               
                                echo '
                                Swal.fire("Enviado!", "", "success")
                                window.location = "../../inicio.php?page=home.php"
                       

                        }else{

                            Swal.fire("Cancelado!", "", "success")
                            window.location = "../../inicio.php?page=home.php"

                        }   

                    });

                    return false;

                    
                }
            </script>
            </head>
            <body onLoad="redirectTime()">
        
            </body>
            </html>
    
    
    ';

     
    }else{



        echo '
    
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script type="text/javascript">
            function redirectTime(){
                var i = 0;
                swal.fire({

                    title: "Salvar inscrição",
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: "Enviar",
                    denyButtonText: "Cancelar",


                }).then((result) => {

                   
                    if (result.isConfirmed) {

                    
                        

                            ';


                            $sql = "INSERT INTO candidato(idAnoSemestre, CodBanco, idUf, idFormaPagamento, Cpf,
                            Nome, Cidade, Telefone, Celular, Email, idCamisa, Curso, Periodo, Matricula, DataInscricao, idCurso)
                            VALUES (:midAnoSemestre, :mCodBanco, :midUf, :midFormaPagamento, :mcpf, :mNome, :mCidade, :mTelefone, :mCelular, :mEmail, :midCamisa,
                            :mCurso, :mPeriodo, :mMatricula, :mdataInscricao, :mIdcurso)";
                    
                            $stmt = $pdo->prepare($sql);
                    
                       
                       
                            $stmt->bindParam(':midAnoSemestre', $idAnoSemestre);
                            $stmt->bindParam(':mCodBanco', $CodBanco);
                            $stmt->bindParam(':midUf', $idUf);
                            $stmt->bindParam(':midFormaPagamento', $idformapagamento);
                            $stmt->bindParam(':mcpf', $cpf, PDO::PARAM_STR);
                            $stmt->bindParam(':mNome', $nome, PDO::PARAM_STR);
                            $stmt->bindParam(':mCidade', $cidade, PDO::PARAM_STR);
                            $stmt->bindParam(':mTelefone', $celular, PDO::PARAM_STR);
                            $stmt->bindParam(':mCelular', $celular, PDO::PARAM_STR);
                            $stmt->bindParam(':mEmail', $email, PDO::PARAM_STR);
                            $stmt->bindParam(':midCamisa', $idcamisa);
                            $stmt->bindParam(':mCurso', $curso, PDO::PARAM_STR);
                            $stmt->bindParam(':mPeriodo', $periodo, PDO::PARAM_STR);
                            $stmt->bindParam(':mMatricula', $matricula, PDO::PARAM_STR);
                            $stmt->bindParam(':mdataInscricao', $dataInscricao);
                            $stmt->bindParam(':mIdcurso', $idcurso);
                        
                            
                            $stmt->execute();
                           
                            echo '
                            Swal.fire("Enviado!", "", "success")
                            window.location = " ../../inicio.php?page=scr/candidato/upload.php"
                   

                    }

                });

                return false;

                
            }
        </script>
        </head>
        <body onLoad="redirectTime()">
    
        </body>
        </html>


';



    }   
        
    } else {

        header('Location: ../extensao/inicio.php?page=home.php');
    } 

?>

