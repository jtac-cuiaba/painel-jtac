<?php
  $idusuario = $_GET['id'];

  include('conexao.php');
  include('permissao.php');
  $comando = "delete from usuario where idusuario = $idusuario"; //Mostra o comando a ser executado
  $ok = mysqli_query($link, $comando); //query sempre manda comando para o MySql, pega a conexão e executa o comando

  if ($ok) {
    $mensagem = "Usuário Excluido!";
  }else{
    $mensagem = "Falha ao excluir usuário!";
  }

  header("location: usuario.php?msg=$mensagem"); //Volta pra página com a mensagem de sucesso ou falha
 ?>
