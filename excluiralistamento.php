<?php
  $idalistamento = $_GET['id'];

  include('conexao.php');
  include('permissao.php');
  $comando = "delete from alistamento where idalistamento = $idalistamento"; //Mostra o comando a ser executado
  $ok = mysqli_query($link, $comando); //query sempre manda comando para o MySql, pega a conexão e executa o comando

  if ($ok) {
    $mensagem = "Alistamento Excluido!";
  }else{
    $mensagem = "Falha ao excluir o Alistamento!";
  }

  header("location: alistamento.php?msg=$mensagem"); //Volta pra página com a mensagem de sucesso ou falha
 ?>
