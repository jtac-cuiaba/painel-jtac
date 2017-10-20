<?php
  $Idrelato = $_GET['id'];
  include('conexao.php');
  include('permissao.php');

  $comando = "select * from relato where Idrelato = $Idrelato";
  $resultado = mysqli_query($link, $comando);

  $relato = mysqli_fetch_array($resultado);
 ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>JTAC - Editar Relato</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/docs.css">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include('_mensagem.php') ?>
    <header>

    </header>
    <nav>
      <?php include('_menu.php') ?>
    </nav>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-offset-3 col-sm-4 col-xs-12">
            <h3><i class="fa fa-eye" aria-hidden="true"></i> Editar Relato</h3>
            <form class="form-group" action="atualizarelato.php" method="post" enctype="multipart/form-data">
              <label for="Idrelato">Código: </label>
              <input class="form-control" id=Idrelato type="text" name="Idrelato" readonly value="<?php print $relato['Idrelato']; ?>">
              <label for="nreclamante">Nome do Reclamante: </label>
              <input class="form-control" id=nreclamante type="text" name="nreclamante" value="<?php print $relato['nreclamante']; ?>" required>
              <label for="nreclamado">Nome do Reclamado: </label>
              <input class="form-control" id=nreclamado type="text" name="nreclamado" value="<?php print $relato['nreclamado']; ?>" required>
              <label for="descricao">Descrição:</label>
              <textarea maxlength="5192" class="form-control" id=descricao name="descricao" rows="8" cols="80" required><?php print $relato['descricao']; ?></textarea>
              <br>
              <button type="submit" class="btn btn-success btn-block" name="button"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
              <br>
              <a href="reclamacao.php" class="btn btn-warning btn-block"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</a>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php include('_rodape.php'); ?>
    <?php include('_ajuda.php') ?>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="js/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#Modal').modal('show');
      });
    </script>
  </body>
</html>
