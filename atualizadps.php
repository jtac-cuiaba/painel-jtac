<?php
  include('conexao.php');
  include('permissao.php');
  //Capturar os dados SQL
  $iddep = $_GET['id'];
  $moderacao = "sim";

    $comando = "update depoimento set moderacao ='$moderacao' where iddep = $iddep";


  //Executa o comando SQL
  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if($ok){
    $mensagem = "Depoimento Alterado para: Aprovado!";
  }else{
    $mensagem = "Uma Falha ocorreu, tente novamente!";
  }

  header("location: depoimentoa.php?id=$iddep&msg=$mensagem");
 ?>
