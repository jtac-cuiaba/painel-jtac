<?php
  include('conexao.php');
  include('permissao.php');

  $sequencia = $_POST['sequencia'];
  $nome = $_POST['nome'];
  $funcao = $_POST['funcao'];
  $armamento = $_POST['armamento'];
  $indicacao = $_POST['indicacao'];
  $descricao = $_POST['descricao'];
  $ativoaspira = "sim";
  $foto = "user.jpg";

  $comando = "insert into aspirante (sequencia, nome,  funcao, armamento, indicacao, descricao, ativo, foto)
              values ('$sequencia', '$nome', '$funcao', '$armamento', '$indicacao', '$descricao', '$ativoaspira', '$foto')";

  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if ($ok) {
    $mensagem = "Aspirante Cadastrado com Sucesso!";
  }else{
    $mensagem = "Aspirante não Cadastrado!";
  }

  header("location: aspirantes.php?msg=$mensagem");
 ?>
