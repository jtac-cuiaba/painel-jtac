<?php
  include('permissao.php');
  include('conexao.php');
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
      <?php include('_menur.php') ?>
    </nav>
    <section>
      <article class="container">
        <div class="page-header">
          <h1 class="text-left">Sistema de Gerenciamento de Arquivos <small class="text-right">Qualquer dúvida <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalajuda"><i class="fa fa-info-circle" aria-hidden="true"></i>
             Clique Aqui
          </button></small></h1>
        </div>
      </article>
      <article class="container">
        <div class="row">
          <button type="button" class="btn btn-primary col-md-offset-4" data-toggle="modal" data-target="#modalcadastro"><i class="fa fa-upload" aria-hidden="true"></i>
            Subir Arquivo
          </button><br>
        </div><br>
        <div class="">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="arquivo.php"><i class="fa fa-archive" aria-hidden="true"></i> Arquivo</a></li>
            <li role="presentation"><a href="arquivopdf.php"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a></li>
            <li role="presentation"><a href="arquivoword.php"><i class="fa fa-file-word-o" aria-hidden="true"></i> WORD</a></li>
            <li role="presentation"><a href="arquivoexcell.php"><i class="fa fa-file-excel-o" aria-hidden="true"></i> EXCELL</a></li>
          </ul><br>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <p>Selecione as abas acima para gerenciar os arquivos pelo formato escolhido.</p>
          </div>
        </div>
      </article>
    </section>
    <?php include('_rodape.php'); ?>
    <?php include('_ajuda.php') ?>
    <?php include('_adicionaarquivo.php') ?>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
        <?php include('_msg.php') ?>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
