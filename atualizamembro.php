<?php
  include('conexao.php');
  include('permissao.php');
  //Capturar os dados SQL
  $Idmembro = $_POST['Idmembro'];
  $numeral = $_POST['numeral'];
  $nome = $_POST['nome'];
  $entrada = $_POST['entrada'];
  $telefone = $_POST['telefone'];
  $funcao = $_POST['funcao'];
  $armamento = $_POST['armamento'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $diretoria = $_POST['diretoria'];
  $descricao = $_POST['descricao'];


  if(empty($senha)){
    $comando = "update membro set numeral ='$numeral', nome ='$nome', entrada ='$entrada', telefone ='$telefone', funcao ='$funcao', armamento ='$armamento', email ='$email', diretoria ='$diretoria', descricao ='$descricao'
                where Idmembro = $Idmembro";
  }else{
    $codificacao = hash( 'sha256', $senha );
    $comando = "update membro set numeral ='$numeral', nome ='$nome', entrada ='$entrada', telefone ='$telefone', funcao ='$funcao', armamento ='$armamento', email ='$email', senha ='$codificacao', diretoria ='$diretoria', descricao ='$descricao'
                where Idmembro = $Idmembro";
  }

  //Executa o comando SQL
  $ok = mysqli_query($link, $comando);

  if($ok){
    $mensagem = "Membro Alterado!";
  }else{
    $mensagem = "Uma Falha ocorreu, tente novamente!";
  }

  header("location: editarmembro.php?id=$Idmembro&msg=$mensagem");
 ?>
