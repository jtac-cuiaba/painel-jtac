<?php
  include('conexao.php');

  $comando = "select * from relato";

  $resultado = mysqli_query($link, $comando);
 ?>
<?php
  include('permissao.php');
 ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>JTAC - Cadastro de Reclamações</title>

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
      <?php include('_menur.php') ?>
    </nav>
    <section>
      <article class="container">
        <div class="page-header">
          <h1 class="text-left">Sistema de Cadastro de Reclamações <small class="text-right">Qualquer dúvida <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalajuda"><i class="fa fa-info-circle" aria-hidden="true"></i>
             Clique Aqui
          </button></small></h1>
        </div>
      </article>
      <article class="container">
        <div class="row">
            <button type="button" class="btn btn-primary col-md-offset-4" data-toggle="modal" data-target="#modalcadastroasp"><i class="fa fa-plus-circle" aria-hidden="true"></i>
              Adicionar Reclamação
            </button>
            <a href="relatoriorelato.php" target="_blank" type="button" class="btn btn-primary col-md-offset-1"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
              Gerar Relatório
            </a><br>
        </div><br>
        <div class="row">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="col-md-3">Nome do Reclamante</th>
                <th class="col-md-3">Nome do Reclamado</th>
                <th class="col-md-3">Data</th>
                <th class="col-md-1">Editar</th>
                <th class="col-md-1">Excluir</th>
              </tr>
            </thead>
            <?php while($relato = mysqli_fetch_array($resultado)) { ?>
            <tbody>
              <td class="col-md-3"><?php print $relato['nreclamante'];?></th>
              <td class="col-md-3"><?php print $relato['nreclamado'];?></th>
              <td class="col-md-3"><?php print $relato['data'];?></th>
              <td class="col-md-1"><a class="btn btn-warning btn-sm" href="editarrelato.php?id=<?php print $relato['Idrelato']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a></th>
              <td class="col-md-1"><a onclick="return confirm('Tem Certeza que deseja Excluir essa reclamação?');" class="btn btn-danger btn-sm" href="excluirrelato.php?id=<?php print $relato['Idrelato']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</a></th>
            </tbody>
            <?php   }  ?>
          </table>
        </div>
      </article>
    </section>
    <?php include('_rodape.php'); ?>
    <?php include('_ajuda.php') ?>
    <?php include('_adicionarelato.php') ?>
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
