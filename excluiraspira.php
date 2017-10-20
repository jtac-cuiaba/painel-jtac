<?php
  $Idaspirante = $_GET['id'];

  include('conexao.php');
  include('permissao.php');
  $comando = "delete from aspirante where Idaspirante = $Idaspirante"; //Mostra o comando a ser executado
  $ok = mysqli_query($link, $comando); //query sempre manda comando para o MySql, pega a conexão e executa o comando

  if ($ok) {
    $mensagem = "Aspirante Excluido!";
  }else{
    $mensagem = "Falha ao excluir o Aspirante!";
  }

  header("location: aspirantes.php?msg=$mensagem"); //Volta pra página com a mensagem de sucesso ou falha
 ?>
