<?php
  $Idmembro = $_GET['id'];
  include('conexao.php');
  include('permissao.php');

  $comando = "select * from membro where Idmembro = $Idmembro";
  $resultado = mysqli_query($link, $comando);

  $membro = mysqli_fetch_array($resultado);
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
            <h3><i class="fa fa-user-o" aria-hidden="true"></i> Editar Membro</h3>
            <form class="form-group" action="atualizamembro.php" method="post" enctype="multipart/form-data">
              <label for="codigo">Código: </label>
              <input class="form-control" id=codigo type="text" name="Idmembro" readonly value="<?php print $membro['Idmembro']; ?>">
              <label for="numeral">Numeral: </label>
              <input class="form-control" id=numeral type="text" name="numeral" value="<?php print $membro['numeral']; ?>">
              <label for="nome">Nome: </label>
              <input class="form-control" id=nome type="text" name="nome" value="<?php print $membro['nome']; ?>" required>
              <label for="entrada">Data da entrada na Equipe: </label>
              <input class="form-control" id=entrada type="date" name="entrada" value="<?php print $membro['entrada']; ?>" required>
              <label for="nome">Telefone: </label>
              <input class="form-control" id=telefone type="tel" name="telefone" value="<?php print $membro['telefone']; ?>" required>
              <label for="categoria">Função: </label>
              <select class="form-control" id=funcao name="funcao">
                <option  value="Assalto" <?php if ($membro['funcao']== 'Assalto') print 'selected'; ?>>Assalto</option>
                <option value="Suporte" <?php if ($membro['funcao']== 'Suporte') print 'selected'; ?>>Suporte</option>
                <option value="Médico" <?php if ($membro['funcao']== 'Médico') print 'selected'; ?>>Médico</option>
                <option value="DMR" <?php if ($membro['funcao']== 'DMR') print 'selected'; ?>>DMR</option>
                <option value="Sniper" <?php if ($membro['funcao']== 'Sniper') print 'selected'; ?>>Sniper</option>
              </select>
              <label for="armamento">Armamento:</label>
              <input class="form-control" id=armamento type="text" name="armamento" value="<?php print $membro['armamento']; ?>" required>
              <label for="email">E-mail:</label>
              <input class="form-control" id=email type="email" name="email" value="<?php print $membro['email']; ?>" required>
              <label for="senha">Senha:</label>
              <input class="form-control" id=senha type="password" name="senha" placeholder="Senha">
              <label for="diretoria">Diretoria:</label>
              <input class="form-control" id=diretoria type="text" name="diretoria" value="<?php print $membro['diretoria']; ?>">
              <label for="descricao">Descrição:</label>
              <textarea maxlength="5192" class="form-control" id=descricao name="descricao" rows="8" cols="80" required><?php print $membro['descricao']; ?></textarea>
              <br>
              <button type="submit" class="btn btn-success btn-block" name="button"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
              <br>
              <a href="index.php" class="btn btn-warning btn-block"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</a>
            </form>
          </div>
          <div class="col-sm-4">
            <h2><i class="fa fa-picture-o" aria-hidden="true"></i> Foto:</h2>
            <?php
                        $foto = $membro['foto'];
                        if(file_exists('imagens/'.$foto)){
                        echo '<img src="imagens/' . $foto . '" class="img-responsive img-thumbnail img-rounded" width="100%">';
                        }
                        else {
                        echo '<img src="imagens/user.jpg" class="img-responsive img-thumbnail img-rounded">';
                        }
                        ?>
            <a href="editarfoto.php?id=<?php print $membro['Idmembro']; ?>" class="btn btn-primary btn-block">Editar Foto</a>
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
