<?php
  include('conexao.php');
  include('permissao.php');
  //Capturar os dados SQL
  $Idaspirante = $_POST['Idaspirante'];
  $ativoaspira = "nao";
  $ativomembro = "sim";
  $numeral = $_POST['numeral'];
  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $funcao = $_POST['funcao'];
  $armamento = $_POST['armamento'];
  $descricao = $_POST['descricao'];
  $foto = $_POST['foto'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $senha = md5($senha);

    $comando1 = "update aspirante set ativo ='$ativoaspira' where Idaspirante = $Idaspirante";

  //Executa o comando SQL
  $ok = mysqli_query($link, $comando1) or exit(mysqli_error($link));

  $comando2 = "insert into membro (numeral, nome, telefone, ativo, funcao, armamento, descricao, foto, email, senha)
              values ('$numeral', '$nome', '$telefone', '$ativomembro', '$funcao', '$armamento', '$descricao', '$foto', '$email', '$senha')";

$ok = mysqli_query($link, $comando2) or exit(mysqli_error($link));

  if($ok){
    $mensagem = "Aspirante Promovido!";
  }else{
    $mensagem = "Uma Falha ocorreu, tente novamente!";
  }

  header("location: index.php?msg=$mensagem");
 ?>
