<?php
  $idusuario = $_GET['id'];
  include('conexao.php');

  session_start();
  session_destroy();
  $_SESSION["idusuario"] = $usuario['idusuario'];
  $ativo = 'nao';

  $comando = "update usuario set ativo = '$ativo'
              where idusuario = $idusuario";



  $sucesso = mysqli_query($link, $comando) or exit(mysqli_error($link));

  header('location: login.php')
 ?>
