<?php
  $idarquivo = $_GET['id'];

  include('conexao.php');
  include('permissao.php');
  $comando = "delete from arquivo where idarquivo = $idarquivo"; //Mostra o comando a ser executado
  $ok = mysqli_query($link, $comando); //query sempre manda comando para o MySql, pega a conexão e executa o comando

  if ($ok) {
    $mensagem = "Arquivo Excluido!";
  }else{
    $mensagem = "Falha ao excluir o Arquivo!";
  }

  header("location: arquivo.php?msg=$mensagem"); //Volta pra página com a mensagem de sucesso ou falha
 ?>
