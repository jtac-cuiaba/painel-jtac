<?php
  include('conexao.php');
  include('permissao.php');
  //Capturar os dados SQL
  $Idmembro = $_GET['id'];
  $ativo = "nao";

    $comando = "update membro set ativo ='$ativo' where Idmembro = $Idmembro";


  //Executa o comando SQL
  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if($ok){
    $mensagem = "Membro Inativo!";
  }else{
    $mensagem = "Uma Falha ocorreu, tente novamente!";
  }

  header("location: index.php?id=$Idmembro&msg=$mensagem");
 ?>
