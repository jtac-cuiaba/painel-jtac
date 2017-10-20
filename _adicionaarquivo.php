<!-- Modal Adiciona Membro-->
<div class="modal fade" id="modalcadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Upload de Arquivo</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <form class="form-group col-sm-8 col-sm-offset-2" action="cadastraarquivo.php" method="post" enctype="multipart/form-data">
          <br>
          Nome do Arquivo:
          <input type="text" name="nome" class="form-control" required />
          <br>
          Formato:
          <select name="formato" class="form-control">
            <option value="pdf">PDF</option>
            <option value="word">WORD</option>
            <option value="excell">EXCELL</option>
          </select>
          <br>
          <input class="form-control" type="file" name="arquivo">
          <hr>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
