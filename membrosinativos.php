<?php
  include('conexao.php');

  $comando = ("SELECT * FROM membro WHERE ativo = 'nao'");

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
    <title>JTAC - Cadastro de Membros</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/docs.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
    </header>
    <nav>
      <?php include('_menu.php') ?>
    </nav>
    <section>
      <article class="container">
        <div class="page-header">
          <h1 class="text-left">Sistema de Cadastro dos Membros <small class="text-right">Qualquer dúvida <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalajuda"><i class="fa fa-info-circle" aria-hidden="true"></i>
             Clique Aqui
          </button></small></h1>
        </div>
      </article>
      <article class="container">
        <div class="row">
            <button type="button" class="btn btn-primary col-md-offset-4" data-toggle="modal" data-target="#modalcadastro"><i class="fa fa-plus-circle" aria-hidden="true"></i>
              Adicionar Membro
            </button>
            <a href="relatoriomembros.php" target="_blank" type="button" class="btn btn-primary col-md-offset-1"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
              Gerar Relatório
            </a><br>
        </div><br>
        <div class="">
          <ul class="nav nav-tabs">
            <li role="presentation"><a href="index.php"><i class="fa fa-check" aria-hidden="true"></i> Membros Ativos</a></li>
            <li role="presentation" class="active"><a href="membrosinativos.php"><i class="fa fa-exclamation" aria-hidden="true"></i> Membros Inativos</a></li>
          </ul><br>
        </div>
        <div class="row">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="col-md-1">Numeral</th>
                <th class="col-md-2">Nome</th>
                <th class="col-md-2">Função</th>
                <th class="col-md-2">Armamento</th>
                <th class="col-md-1">Foto</th>
                <th class="col-md-2">Funções</th>
              </tr>
            </thead>
            <?php while($membro = mysqli_fetch_array($resultado)) { ?>
            <tbody>
              <td class="col-md-1"><?php print $membro['numeral'];?></th>
              <td class="col-md-2"><?php print $membro['nome'];?></th>
              <td class="col-md-2"><?php print $membro['funcao'];?></th>
              <td class="col-md-2"><?php print $membro['armamento'];?></th>
              <td class="col-md-1"><?php
                          $foto = $membro['foto'];
                          if(file_exists('imagens/'.$foto)){
                          echo '<img src="imagens/' . $foto . '" class="img-responsive img-thumbnail img-rounded" width="100%">';
                          }
                          else {
                          echo '<img src="imagens/user.jpg" class="img-responsive img-thumbnail img-rounded">';
                          }
                          ?></th>
              <td class="col-md-4"><a class="btn btn-info btn-sm" href="atualizama.php?id=<?php print $membro['Idmembro']; ?>"><i class="fa fa-check" aria-hidden="true"></i> Ativar</a> <a class="btn btn-warning btn-sm" href="editarmembro.php?id=<?php print $membro['Idmembro']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a> <a onclick="excluir(<?php print $membro['Idmembro']; ?>)" class="btn btn-danger btn-sm" id="<?php print $membro['Idmembro']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</a></th>
            </tbody>
            <?php   }  ?>
          </table>
        </div>
      </article>
    </section>
    <?php include('_rodape.php'); ?>
    <?php include('_ajuda.php') ?>
    <?php include('_adicionamembro.php') ?>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
        <?php include('_msg.php') ?>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    function excluir(excluirid){
      if(confirm("Deseja excluir o membro?")){
        window.location.href='excluirmembro.php?id=' +excluirid+'';
        return true;
      }
    }
    </script>
  </body>
</html>
