<?php
  include('conexao.php');
  include('permissao.php');
  //Capturar os dados SQL
  $Idaspirante = $_GET['id'];
  $ativo = "nao";

    $comando = "update aspirante set ativo ='$ativo' where Idaspirante = $Idaspirante";


  //Executa o comando SQL
  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if($ok){
    $mensagem = "Aspirante Inativo!";
  }else{
    $mensagem = "Uma Falha ocorreu, tente novamente!";
  }

  header("location: aspirantes.php?id=$Idaspirante&msg=$mensagem");
 ?>
