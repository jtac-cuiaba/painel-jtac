<?php include('conexao.php');
  include('permissao.php');
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $nivel = $_POST['nivel'];

  $senha = md5($senha);
  $comando = "insert into usuario (nome, email, senha, nivel)
              values ('$nome', '$email', '$senha', '$nivel')";

  $sucesso = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if ($sucesso) {
    $mensagem = "Usuário Cadastrado com sucesso!";
  }else{
    $mensagem = "Falha ao Cadastrar Usuário!";
  }

  header("location: usuario.php?msg=$mensagem")
 ?>
