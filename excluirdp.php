<?php
  $iddep = $_GET['id'];

  include('conexao.php');
  include('permissao.php');
  $comando = "delete from depoimento where iddep = $iddep"; //Mostra o comando a ser executado
  $ok = mysqli_query($link, $comando); //query sempre manda comando para o MySql, pega a conexão e executa o comando

  if ($ok) {
    $mensagem = "Depoimento Excluido!";
  }else{
    $mensagem = "Falha ao excluir o Aspirante!";
  }

  header("location: depoimentor.php?msg=$mensagem"); //Volta pra página com a mensagem de sucesso ou falha
 ?>
