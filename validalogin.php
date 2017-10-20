<?php
  include('conexao.php');

  $email = addslashes($_POST['login']);
  $senha = addslashes($_POST['senha']);

  $codificacao = hash( 'sha256', $senha );

  $comando = "select * from usuario where email = '$email' and senha = '$codificacao'";

  $resultado = mysqli_query($link, $comando);
  $qtd = mysqli_num_rows($resultado);

  if($qtd == 1){
    //Usuário foi encontrado
    $usuario = mysqli_fetch_array($resultado);

    session_start();
    $_SESSION["nome"] = $usuario['nome'];
    $_SESSION["nivel"] = $usuario['nivel'];
    $_SESSION["idusuario"] = $usuario['idusuario'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $idusuario = $usuario['idusuario'];
    $ativo = 'sim';

    $comando = "update usuario set ip = '$ip', ativo = '$ativo'
                where idusuario = $idusuario";



    $sucesso = mysqli_query($link, $comando) or exit(mysqli_error($link));

    header('location: index.php');
  }else{
    //Não foi encontrado
    $mensagem = "Usuário ou senha inválidos!";
    header("location: index.php?msg=$mensagem");
  }
 ?>
