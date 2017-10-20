<?php
  $Idrelato = $_GET['id'];

  include('conexao.php');
  include('permissao.php');
  $comando = "delete from relato where Idrelato = $Idrelato"; //Mostra o comando a ser executado
  $ok = mysqli_query($link, $comando); //query sempre manda comando para o MySql, pega a conexão e executa o comando

  if ($ok) {
    $mensagem = "Relato Excluido!";
  }else{
    $mensagem = "Falha ao excluir o Relato!";
  }

  header("location: reclamacao.php?msg=$mensagem"); //Volta pra página com a mensagem de sucesso ou falha
 ?>
