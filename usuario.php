<?php include('conexao.php');

  $comando = "select * from usuario";
  $resultado = mysqli_query($link, $comando);
?>
<?php

  $comando2 = ("SELECT * FROM usuario WHERE ativo = 'sim'");

  $resultado2 = mysqli_query($link, $comando2);
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
    <title>JTAC - Gerenciamento de Usuários</title>

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
          <div class="col-xs-12">
            <h3 class="text-center">Usuários Cadastrados</h3>
            <div class="col-xs-offset-4 col-xs-4 well">
              <!-- Button trigger modal -->
              <?php if($_SESSION['nivel'] == 'Administrador'){ ?>
                  <button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                     Novo Usuário
                  </button>
              <?php } ?>
            </div>
            <h3> </h3>
            <table class="table table-bordered table-hover">
              <tr>
                <td class="text-center">Código</td>
                <td class="text-center">Nome</td>
                <td class="text-center">Email</td>
                <td class="text-center">IP</td>
                <td class="text-center">On-Line</td>
                <td class="text-center">Pefil</td>
                <td class="text-center"></td>
              </tr>
              <?php while($usuario = mysqli_fetch_array($resultado)){ ?>
                  <tr>
                    <td><?php print $usuario['idusuario']; ?></td>
                    <td><?php print $usuario['nome']; ?></td>
                    <td><?php print $usuario['email']; ?></td>
                    <td><?php print $usuario['ip']; ?></td>
                    <td><?php print $usuario['ativo']; ?></td>
                    <td><?php print $usuario['nivel']; ?></td>
                    <td>
                      <?php if($_SESSION['nivel'] == 'Administrador' || $_SESSION['idusuario'] == $usuario['idusuario']){ ?>
                      <a class="btn btn-warning btn-sm" href="editarusuario.php?id=<?php print $usuario['idusuario']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                      <?php } ?>
                      <?php if($_SESSION['nivel'] == 'Administrador'){ ?>
                      <a onclick="return confirm('Tem Certeza que deseja Excluir esse Usuário?');" class="btn btn-danger btn-sm" href="excluirusuario.php?id=<?php print $usuario['idusuario']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</a>
                      <?php } ?>
                    </td>
                  </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Usuário</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <form class="form-group col-sm-8 col-sm-offset-2" action="cadastrarusuario.php" method="post">
              Nome:
              <input type="text" name="nome" class="form-control" required />
              <br>
              E-mail:
              <input type="email" name="email" class="form-control" required />
              <br>
              Senha:
              <input type="password" name="senha" class="form-control" required />
              <br>
              Perfil:
              <select name="nivel" class="form-control">
                <option value="Supervisor">Supervisor</option>
                <option value="Administrador">Administrador</option>
              </select>
              <hr>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
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
