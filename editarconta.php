<?php
  $idusuario = $_GET['id'];
  include('conexao.php');

  $comando = "select * from usuario where idusuario = $idusuario";
  $resultado = mysqli_query($link, $comando);

  $usuario = mysqli_fetch_array($resultado);
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
    <title>JTAC - Editar Usuário </title>

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
          <div class="col-xs-6">
            <h3>Editar Usuário</h3>
            <?php if($_SESSION['nivel'] == 'Administrador'|| $_SESSION['idusuario'] == $usuario['idusuario']){ ?>
            <form class="form-group" method="post" action="atualizausuario1.php">
              <br>
              Código:
              <input type="text" class="form-control" name="codigo" readonly value="<?php print $usuario['idusuario']; ?>">
              <br>
              Nome:
              <input type="text" class="form-control" name="nome" value="<?php print $usuario['nome']; ?>">
              <br>
              E-mail:
              <input type="email" class="form-control" name="email" value="<?php print $usuario['email']; ?>">
              <br>
              Senha:
              <input type="password" class="form-control" placeholder="inalterada" name="senha" value="">
              <br>
              <?php if($_SESSION['nivel'] == 'Administrador'){ ?>
              <a href="usuario.php" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
              <?php } ?>
              <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações</button>
            </form>
            <?php } ?>
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
