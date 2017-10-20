<?php
  $Idaspirante = $_GET['id'];
  include('conexao.php');
  include('permissao.php');

  $comando = "select * from aspirante where Idaspirante = $Idaspirante";
  $resultado = mysqli_query($link, $comando);

  $aspirante = mysqli_fetch_array($resultado);
 ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>JTAC - Promoção de Aspirante para Membro</title>

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
      <div class="container">
        <div class="row">
          <div class="col-sm-offset-3 col-sm-6 col-xs-12">
            <h3><i class="fa fa-user-o" aria-hidden="true"></i> Promover Aspirante para Membro</h3>
            <form class="form-group" action="promoveaspira.php" method="post" enctype="multipart/form-data">
              <label for="codigo">Código: </label>
              <input class="form-control" id=codigo type="text" name="Idaspirante" readonly value="<?php print $aspirante['Idaspirante']; ?>">
              <label for="numeral">Numeral: </label>
              <input class="form-control" id=numeral type="text" name="numeral" value="<?php print $aspirante['sequencia']; ?>">
              <label for="nome">Nome: </label>
              <input class="form-control" id=nome type="text" name="nome" value="<?php print $aspirante['nome']; ?>" required>
              <label for="nome">Telefone: </label>
              <input class="form-control" id=telefone type="text" name="telefone" value="<?php print $aspirante['telefone']; ?>" required>
              <label for="categoria">Função: </label>
              <select class="form-control" id=funcao name="funcao">
                <option  value="Assalto" <?php if ($aspirante['funcao']== 'Assalto') print 'selected'; ?>>Assalto</option>
                <option value="Suporte" <?php if ($aspirante['funcao']== 'Suporte') print 'selected'; ?>>Suporte</option>
                <option value="Médico" <?php if ($aspirante['funcao']== 'Médico') print 'selected'; ?>>Médico</option>
                <option value="DMR" <?php if ($aspirante['funcao']== 'DMR') print 'selected'; ?>>DMR</option>
                <option value="Sniper" <?php if ($aspirante['funcao']== 'Sniper') print 'selected'; ?>>Sniper</option>
              </select>
              <label for="armamento">Armamento:</label>
              <input class="form-control" id=armamento type="text" name="armamento" value="<?php print $aspirante['armamento']; ?>" required>
              <label for="descricao">Descrição:</label>
              <textarea maxlength="5192" class="form-control" id=descricao name="descricao" rows="8" cols="80" required><?php print $aspirante['descricao']; ?></textarea>
              <input type="hidden" class="form-control" type="text" name="foto" value="<?php print $aspirante['foto']; ?>" required>
              <label for="email">E-mail:</label>
              <input class="form-control" id=email type="email" name="email" required>
              <label for="senha">Senha:</label>
              <input class="form-control" id=senha type="password" name="senha" placeholder="Senha" required>
              <br>
              <button type="submit" class="btn btn-success btn-block" name="button"><i class="fa fa-external-link-square" aria-hidden="true"></i> Promover a Membro!</button>
              <br>
              <a href="aspirantes.php" class="btn btn-warning btn-block"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</a>
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
