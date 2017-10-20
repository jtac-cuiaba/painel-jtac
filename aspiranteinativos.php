<?php
  include('conexao.php');

  $comando = ("SELECT * FROM aspirante WHERE ativo = 'nao'");

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
    <title>JTAC - Cadastro de Aspirantes</title>

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
      <?php include('_menua.php') ?>
    </nav>
    <section>
      <article class="container">
        <div class="page-header">
          <h1 class="text-left">Sistema de Cadastro dos Aspirantes <small class="text-right">Qualquer dúvida <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalajuda"><i class="fa fa-info-circle" aria-hidden="true"></i>
             Clique Aqui
          </button></small></h1>
        </div>
      </article>
      <article class="container">
        <div class="row">
            <button type="button" class="btn btn-primary col-md-offset-4" data-toggle="modal" data-target="#modalcadastroasp"><i class="fa fa-plus-circle" aria-hidden="true"></i>
              Adicionar Aspirante
            </button>
            <a href="relatorioaspiras.php" target="_blank" type="button" class="btn btn-primary col-md-offset-1"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
              Gerar Relatório
            </a><br>
        </div><br>
        <div class="">
          <ul class="nav nav-tabs">
            <li role="presentation"><a href="aspirantes.php"><i class="fa fa-check" aria-hidden="true"></i> Aspirantes Ativos</a></li>
            <li role="presentation" class="active"><a href="aspiranteinativos.php"><i class="fa fa-exclamation" aria-hidden="true"></i> Aspirantes Inativos</a></li>
          </ul><br>
        </div>
        <div class="row">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="col-md-1">Sequência</th>
                <th class="col-md-2">Nome</th>
                <th class="col-md-2">Armamento</th>
                <th class="col-md-2">Indicado por</th>
                <th class="col-md-1">Foto</th>
                <th class="col-md-4">Função</th>
              </tr>
            </thead>
            <?php while($aspirante = mysqli_fetch_array($resultado)) { ?>
            <tbody>
              <td class="col-md-1"><?php print $aspirante['sequencia'];?></th>
              <td class="col-md-2"><?php print $aspirante['nome'];?></th>
              <td class="col-md-2"><?php print $aspirante['armamento'];?></th>
              <td class="col-md-2"><?php print $aspirante['indicacao'];?></th>
              <td class="col-md-1"><?php
                          $foto = $aspirante['foto'];
                          if(file_exists('imagens/'.$foto)){
                          echo '<img src="imagens/' . $foto . '" class="img-responsive img-thumbnail img-rounded" width="100%">';
                          }
                          else {
                          echo '<img src="imagens/user.jpg" class="img-responsive img-thumbnail img-rounded">';
                          }
                          ?></th>
              <td class="col-md-4"><a class="btn btn-info btn-sm" href="atualizaaa.php?id=<?php print $aspirante['Idaspirante']; ?>"><i class="fa fa-check" aria-hidden="true"></i> Ativar</a> <a class="btn btn-warning btn-sm" href="editaraspira.php?id=<?php print $aspirante['Idaspirante']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a> <a onclick="return confirm('Tem Certeza que deseja Excluir esse Aspirante?');" class="btn btn-danger btn-sm" href="excluiraspira.php?id=<?php print $aspirante['Idaspirante']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</a></th>
            </tbody>
            <?php   }  ?>
          </table>
        </div>
      </article>
    </section>
    <?php include('_rodape.php'); ?>
    <?php include('_ajuda.php') ?>
    <?php include('_adicionaaspira.php') ?>
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
