<?php
  include('conexao.php');
  include('permissao.php');
  //Capturar os dados SQL
  $Idaspirante = $_POST['Idaspirante'];
  $sequencia = $_POST['sequencia'];
  $nome = $_POST['nome'];
  $entrada = $_POST['entrada'];
  $telefone = $_POST['telefone'];
  $funcao = $_POST['funcao'];
  $armamento = $_POST['armamento'];
  $indicacao = $_POST['indicacao'];
  $descricao = $_POST['descricao'];
  $observacao = $_POST['observacao'];


  $foto = $_FILES['foto']; //caputra a foto enviada

  if ($foto['size']> 0) {
    $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $caminho = 'imagens/'.date("Y-m-d-H-i-s").'-'.$sequencia.'-'.$nome.'.'.$ext; //salva a foto nesse caminho com esses parametros editando o nome da foto
    move_uploaded_file($foto['tmp_name'], $caminho);

    $comando = "update aspirante set sequencia ='$sequencia', nome ='$nome', entrada ='$entrada', telefone ='$telefone', funcao ='$funcao', armamento ='$armamento', indicacao ='$indicacao', descricao ='$descricao', observacao ='$observacao', foto ='$caminho'
                where Idaspirante = $Idaspirante";
  }else {
    $comando = "update aspirante set sequencia='$sequencia', nome='$nome', entrada ='$entrada', telefone ='$telefone', funcao='$funcao', armamento='$armamento', indicacao ='$indicacao', descricao='$descricao', observacao ='$observacao'
                where Idaspirante = $Idaspirante";
  }

  //Executa o comando SQL
  $ok = mysqli_query($link, $comando);

  if($ok){
    $mensagem = "Aspirante Alterado!";
  }else{
    $mensagem = "Uma Falha ocorreu, tente novamente!";
  }

  header("location: aspirantes.php?id=$Idaspirante&msg=$mensagem");
 ?>
