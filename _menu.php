<?php
$comando = "SELECT COUNT(Idmembro) qtd FROM membro where ativo='sim'";
$result = mysqli_query($link, $comando);
$quantidade = mysqli_fetch_assoc($result);

 ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="favicon.ico" width="32" height="32" alt="">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><i class="fa fa-user" aria-hidden="true"></i> Membros <span class="sr-only">(current)</span><span class="badge"><?php print $quantidade['qtd'];?></span></a></li>
        <li><a href="aspirantes.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Aspirantes <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Ferramentas <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="alistamento.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> Alistamento <span class="sr-only">(current)</span></a></li>
          <li role="separator" class="divider"></li>
          <li><a href="reclamacao.php"><i class="fa fa-user-times" aria-hidden="true"></i> Relatos/Reclamações <span class="sr-only">(current)</span></a></li>
          <li role="separator" class="divider"></li>
          <li><a href="depoimentor.php"><i class="fa fa-comments" aria-hidden="true"></i> Depoimentos <span class="sr-only">(current)</span></a></li>
          <li role="separator" class="divider"></li>
          <li><a href="arquivo.php"><i class="fa fa-archive" aria-hidden="true"></i> Arquivos <span class="sr-only">(current)</span></a></li>
        </ul>
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if($_SESSION['nivel'] == 'Administrador'){ ?>
        <li><a href="usuario.php"><i class="fa fa-users" aria-hidden="true"></i> Usuários do Sistema </a></li>
        <?php } ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php print $_SESSION['nome'] ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="editarconta.php?id=<?php print $_SESSION['idusuario']; ?>"><i class="fa fa-cog" aria-hidden="true"></i> Configuração</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="sair.php?id=<?php print $_SESSION['idusuario']; ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
