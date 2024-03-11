<?php

        $dataIn = $row['DataInicio'];
        $dataFim = $row['DataLimite'];

?>


<!-- Edit Modal HTML -->
<div id="edit_<?php echo $row['idcurso']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <br><br>
                <form name="formIscri" class="form-signin" method="POST" autocomplete="off" action="../extensao_MNT/inicio.php?page=scr/adm/admedit.php"> 

                    <div class="form-row">  
                       <div class="form-group col-md-12">
                            <label for="nome">Nome Projeto</label>
                            <input type="text" class="form-control" id="nome" placeholder="Descrição do projeto" autofocus="autofocus" name="nome" value="<?php echo $row['nome']; ?>" maxlength="150" required />
                        </div>

                        <div class="form-group col-md-12">
                            <label for="datainicio">Data Inicio:</label>
                            <input type="datetime-local" class="form-control" id="datainicio" name="datainicio"  value="<?php echo $dataIn ; ?>" maxlength="15" required />
                        </div>
      
                        <div class="form-group col-md-12">
                            <label for="datalimite">Data Termino</label>
                            <input type="datetime-local" class="form-control" id="datalimite" name="datalimite"  value="<?php echo $dataFim ; ?>" maxlength="15" required />
                        </div>
          
                        <div class="form-group col-md-4">
                            <label for="vaga">Vagas </label>
                            <input type="text" class="form-control" id="vaga" name="vaga" value="<?php echo $row['vaga']; ?>" placeholder="vagas" maxlength="5" />
                        </div>

                        <div class="form-group col-md-8">
                            <br><label for="enviarArquivo">Enviar arquivo ?</label><br>
                            <input type="radio" id="sim" name="enviarArquivo" value="S">
                            <label for="sim">SIM</label><br>
                            <input type="radio" id="nao" name="enviarArquivo" value="N" checked>
                            <label for="nao">NÃO</label><br>
                        </div>
                    </div>
                       
                    <div class="modal-footer">
                        <input type="hidden" id="curso" name="curso" value="<?php echo $row['nome']; ?>">
                        <input type="hidden" id="idcurso" name="idcurso" value="<?php echo $row['idcurso']; ?>">
                        <input type="submit" class="btn btn-default" value="Salvar">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    </div>

                </form>
            </div>
    </div>
</div>


<!----------------------------------------------------- Cadastro Modal HTML ----------------------------------------------------------------------->
<div id="consulta_<?php echo $row['idcurso']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="formIscri" class="form-signin" method="POST" autocomplete="off" action="../extensao_MNT/inicio.php?page=scr/adm/export/inscritos.php">      
                  <div class="modal-header">
                        <h4 class="modal-title">Projeto Cadastrado</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class='form-group' style='margin-left: 5%;'>

                        <h4 style="text-align: center;"> <?php echo $row['nome']; ?> </h4>
                    
                        <li><label>Data Inicio..:&nbsp;&nbsp;&nbsp;<?php echo date('d/m/Y H:i', strtotime($row['DataInicio'])); ?></label></li>
                        <li><label>Data Termino.:&nbsp;&nbsp;&nbsp;<?php echo date('d/m/Y H:i', strtotime($row['DataLimite'])); ?></label></li>                   
                        <li><label>Inscritos....:&nbsp;&nbsp;&nbsp;<?php echo $row['inscritos']; ?></label></li>
                    
                  </div>
                  <div class="modal-footer">
                        <input type="hidden" id="curso" name="curso" value="<?php echo $row['nome']; ?>">
                        <input type="hidden" id="idcurso" name="idcurso" value="<?php echo $row['idcurso']; ?>">
                        <input type="submit" class="btn btn-default" value="Exportar Excel">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  </div>
            </form>
        </div>
    </div>
</div>
