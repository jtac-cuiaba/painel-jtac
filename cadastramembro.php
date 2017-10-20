<?php
  include('conexao.php');
  include('permissao.php');

  $numeral = $_POST['numeral'];
  $nome = $_POST['nome'];
  $funcao = $_POST['funcao'];
  $armamento = $_POST['armamento'];
  $descricao = $_POST['descricao'];
  $ativomembro = "sim";

  $comando = "insert into membro (numeral, nome,  funcao, armamento, descricao, ativo)
              values ('$numeral', '$nome', '$funcao', '$armamento', '$descricao', '$ativomembro')";

  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if ($ok) {
    $mensagem = "Membro Cadastrado com Sucesso!";
  }else{
    $mensagem = "Membro não Cadastrado!";
  }

  header("location: index.php?msg=$mensagem");
 ?>
