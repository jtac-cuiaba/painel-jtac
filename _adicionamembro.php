<!-- Modal Adiciona Membro-->
<div class="modal fade" id="modalcadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Membro</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <form class="form-group col-sm-8 col-sm-offset-2" action="cadastramembro.php" method="post" enctype="multipart/form-data">
          Numeral:
          <input type="text" name="numeral" class="form-control" required />
          <br>
          Nome:
          <input type="text" name="nome" class="form-control" required />
          <br>
          Função:
          <select name="funcao" class="form-control">
            <option value="Assalto">Assalto</option>
            <option value="Suporte">Suporte</option>
            <option value="Médico">Médico</option>
            <option value="DMR">DMR</option>
            <option value="Sniper">Sniper</option>
          </select>
          <br>
          Armamento:
          <input type="text" name="armamento" class="form-control" required/>
          <br>
          Descrição/Histórico do Membro:
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
