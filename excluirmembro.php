<?php
  $Idmembro = $_GET['id'];

  include('conexao.php');
  include('permissao.php');
  $comando = "delete from membro where Idmembro = $Idmembro"; //Mostra o comando a ser executado
  $ok = mysqli_query($link, $comando); //query sempre manda comando para o MySql, pega a conexão e executa o comando

  if ($ok) {
    $mensagem = "Membro Excluido!";
  }else{
    $mensagem = "Falha ao excluir o Membro!";
  }

  header("location: index.php?msg=$mensagem"); //Volta pra página com a mensagem de sucesso ou falha
 ?>
