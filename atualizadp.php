<?php
  include('conexao.php');
  include('permissao.php');

  $iddep = $_POST['iddep'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $depoimento = $_POST['depoimento'];

  $comando = "update depoimento set nome='$nome', email='$email', depoimento='$depoimento'
              where iddep = $iddep";


  //Executa o comando SQL
  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if($ok){
    $mensagem = "Depoimento Alterado!";
  }else{
    $mensagem = "Uma Falha ocorreu, tente novamente!";
  }

  header("location: depoimentor.php?msg=$mensagem");
 ?>
