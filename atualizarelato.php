<?php
  include('conexao.php');
  include('permissao.php');

  $Idrelato = $_POST['Idrelato'];
  $nreclamante = $_POST['nreclamante'];
  $nreclamado = $_POST['nreclamado'];
  $descricao = $_POST['descricao'];


  $comando = "update relato set nreclamante='$nreclamante', nreclamado='$nreclamado', descricao='$descricao'
              where Idrelato = $Idrelato";


  //Executa o comando SQL
  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if($ok){
    $mensagem = "Relato Alterado!";
  }else{
    $mensagem = "Uma Falha ocorreu, tente novamente!";
  }

  header("location: reclamacao.php?msg=$mensagem");
 ?>
