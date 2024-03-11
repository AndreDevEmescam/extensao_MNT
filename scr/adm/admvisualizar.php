<!-- Edit Modal HTML -->
<div id="edit_<?php echo $row['idCandidato']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="admadd" class="form-signin" method="post" autocomplete="off" action="scr/adm/admadd.php">
                <div class='modal-header'>
                    <h3 class='modal-title'> Documentos</h3>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                </div>
                <div class='modal-body'>
                    <div class='form-group'>
                        <h4 style="text-align: center;"> <?php echo $row['nomeAluno']; ?> </h4>
                    </div>

                    <div class='form-group'>
                        <?php
                        if ($row['arquivo']) {
                            echo '<a class="card-link-mask" href="../../CongressoCapixaba/upload/Extensao/' . $row["arquivo"] . '" target="_blank">Arquvio Anexo</a>';
                        } else {
                            echo "<label  style='color:chocolate;'>Arquvio Anexo</label>";
                        }
                        ?>
                    </div>

                  

                </div>
                <div class='modal-footer'>
                    <input type='button' class='btn btn-default' data-dismiss='modal' value='Cancel'>

                </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete Modal HTML -->
<div id="delete_<?php echo $row['idCandidato']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="admadd" class="form-signin" method="POST" autocomplete="off" action="scr/adm/admexc.php">
                <div class="modal-header">
                    <h4 class="modal-title">Excluir candidato</h4>
                   
                </div>
                <div class='form-group'>
                    <div class="form-group col-md-10">
                        <label>Nome: <h2><?php echo $row['nomeAluno'] ?></h2></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="cpf" name="cpf" value="<?php echo $row['cpf']; ?>">
                    <input type="hidden" id="idCandidato" name="idCandidato" value="<?php echo $row['idCandidato']; ?>">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Cadastro Modal HTML -->
<div id="consulta_<?php echo $row['idCandidato']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="admadd" class="form-signin" method="post" autocomplete="off" action="#">
                <div class="modal-header">
                    <h4 class="modal-title">Ficha do candidato</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class='form-group' style='margin-left: 5%;'>


                    <h4 style="text-align: center;"> <?php echo $row['nomeAluno']; ?> </h4>

                    <li>
                        <label>CPF.........:&nbsp;&nbsp;&nbsp;<?php echo $row['cpf']; ?></label>
                    </li>
                    <li>
                        <label>Email.......:&nbsp;&nbsp;&nbsp;<?php echo $row['Email']; ?></label>
                    </li>
                   
                    <li>
                        <label>Celular.....:&nbsp;&nbsp;&nbsp;<?php echo $row['Celular']; ?></label>
                    </li>
                    <li>
                        <label>Matricula...:&nbsp;&nbsp;&nbsp;<?php echo $row['matricula']; ?>&nbsp;&nbsp;&nbsp;</label>
                    </li>
                    <li>
                        <label>Periodo.....:&nbsp;&nbsp;&nbsp;<?php echo $row['Periodo']; ?></label>
                    </li>
                    <li>
                        <label>Projeto.....:&nbsp;&nbsp;&nbsp;<?php echo $row['nomeCurso']; ?>&nbsp;&nbsp;&nbsp;</label>
                    </li>
                 
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="idcandidato" name="idcandidato" value="<?php echo $row['idCandidato']; ?>">
                    <input type="hidden" id="idcurso" name="idcurso" value="<?php echo $row['idCurso']; ?>">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                </div>
            </form>
        </div>
    </div>
</div>