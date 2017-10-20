<?php
  include('conexao.php');
  include('permissao.php');

  $nreclamante = $_POST['nreclamante'];
  $nreclamado = $_POST['nreclamado'];
  $data = $_POST['data'];
  $descricao = $_POST['descricao'];

  $comando = "insert into relato (nreclamante, nreclamado, data, descricao)
              values ('$nreclamante', '$nreclamado', '$data', '$descricao')";

  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if ($ok) {
    $mensagem = "Relato Cadastrado com Sucesso!";
  }else{
    $mensagem = "Relato não Cadastrado!";
  }

  header("location: reclamacao.php?msg=$mensagem");
 ?>
