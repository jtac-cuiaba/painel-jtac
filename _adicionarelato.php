<!-- Modal Adiciona Relato-->
<div class="modal fade" id="modalcadastroasp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Reclamação/Relato</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <form class="form-group col-sm-8 col-sm-offset-2" action="cadastrarelato.php" method="post" enctype="multipart/form-data">
          <br>
          Nome do Reclamante:
          <input type="text" name="nreclamante" class="form-control" required />
          <br>
          Nome do Reclamado:
          <input type="text" name="nreclamado" class="form-control" required />
          <br>
          Data da Ocorrência:
          <input type="datetime-local" name="data" class="form-control" required />
          <br>
          Descrição do Ocorrido:
          <textarea maxlength="5192" class="form-control" name="descricao" rows="8" cols="60" required></textarea>
          <br>
          <hr>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
