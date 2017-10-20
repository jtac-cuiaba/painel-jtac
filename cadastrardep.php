<?php
  include('conexao.php');
  include('permissao.php');

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $depoimento = $_POST['depoimento'];
  $moderacao = "nao";

  $comando = "insert into depoimento (nome, email, depoimento, moderacao)
              values ('$nome', '$email', '$depoimento', '$moderacao')";

  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if ($ok) {
    $mensagem = "Depoimento Cadastrado com Sucesso!";
  }else{
    $mensagem = "Depoimento não Cadastrado!";
  }

  header("location: depoimentor.php?msg=$mensagem");
 ?>
