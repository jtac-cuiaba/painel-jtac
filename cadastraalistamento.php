<?php
  include('conexao.php');
  include('permissao.php');

  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email= $_POST['email'];
  $p1 = $_POST['p1'];
  $p2 = $_POST['p2'];
  $p3 = $_POST['p3'];
  $p4 = $_POST['p4'];
  $p5 = $_POST['p5'];
  $p6 = $_POST['p6'];
  $p7 = $_POST['p7'];
  $p8 = $_POST['p8'];
  $p9 = $_POST['p9'];
  $p10 = $_POST['p10'];
  $p11 = $_POST['p11'];
  $p12 = $_POST['p12'];
  $p13 = $_POST['p13'];
  $p14 = $_POST['p14'];
  $p15 = $_POST['p15'];
  $p16 = $_POST['p16'];
  $p17 = $_POST['p17'];
  $p18 = $_POST['p18'];
  $p19 = $_POST['p19'];
  $p20 = $_POST['p20'];
  $p21 = $_POST['p21'];
  $p22 = $_POST['p22'];

  $comando = "insert into alistamento (nome,  telefone, email, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17, p18, p19, p20, p21, p22)
              values ('$nome', '$telefone', '$email', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p8', '$p9', '$p10', '$p11', '$p12', '$p13', '$p14', '$p15', '$p16', '$p17', '$p18', '$p19', '$p20', '$p21', '$p22')";

  $ok = mysqli_query($link, $comando) or exit(mysqli_error($link));

  if ($ok) {
    $mensagem = "Alistamento Cadastrado com Sucesso!";
  }else{
    $mensagem = "Alistamento não Cadastrado!";
  }

  header("location: alistamento.php?msg=$mensagem");
 ?>
