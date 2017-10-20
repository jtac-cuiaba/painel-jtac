<?php
  include('conexao.php');
  include('permissao.php');
  //Capturar os dados SQL
  $idusuario = $_POST['codigo'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $nivel = $_POST['nivel'];

  if(empty($senha)){
    $comando = "update usuario set nome = '$nome', email = '$email'
                where idusuario = $idusuario";
  }else{
    $codificacao = hash( 'sha256', $senha );
    $comando = "update usuario set nome = '$nome', email = '$email', senha = '$codificacao'
                where idusuario = $idusuario";
  }
  //monta o comando SQL


  //Executa o comando SQL
  $ok = mysqli_query($link, $comando);

  if($ok){
    $mensagem = "Usuario Alterado!";
  }else{
    $mensagem = "Uma Falha ocorreu, tente novamente!";
  }

  header("location:index.php?msg=$mensagem");
 ?>
