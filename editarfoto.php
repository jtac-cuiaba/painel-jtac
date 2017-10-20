<?php
  $Idmembro = $_GET['id'];
  include('conexao.php');
  include('permissao.php');

  $comando = "select * from membro where Idmembro = $Idmembro";
  $resultado = mysqli_query($link, $comando);

  $membro = mysqli_fetch_array($resultado);
 ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>JTAC - Editar Foto</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/docs.css">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jcrop.min.css">
    <style>
    .jcrop-thumb {
      top: 15px;
      right: -20px;
      border: 1px black solid;
      }
    </style>

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include('_mensagem.php') ?>
    <header>

    </header>
    <nav>
      <?php include('_menu.php') ?>
    </nav>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-offset-3 col-sm-4 col-xs-12">
            <?php
              if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(isset($_POST['w'])){
                  $x = (int)$_POST['x'];
                  $y = (int)$_POST['y'];
                  $w = (int)$_POST['w'];
                  $h = (int)$_POST['h'];
                  $img = $_POST['img'];

                  include_once "funcao.php";
                  $crop = crop($img, $x, $y, $w, $h);
                  if($crop){
                    if($_SESSION['temp_img'] != ''){
                      $link->query("UPDATE `membro` SET `foto` = '".$crop."' WHERE `Idmembro` = ".$Idmembro);
                      //$upd_foto->bind_param('si', $crop, $Idmembro);
                      if($link->affected_rows > 0){
                        echo '<div class="alert alert-success">Imagem cortada e Salva com sucesso!</div>';
                      }
                      //$upd_foto->close();
                    }else{
                      $link->query("UPDATE `membro` SET `foto` = '".$crop."' WHERE `Idmembro` = ".$Idmembro);

                      if($link->affected_rows > 0){
                        echo '<div class="alert alert-success">Imagem cortada e Salva com sucesso!</div>';
                      }
                      //$upd_foto->close();
                    }
                    unlink("uploads/".$_SESSION['temp_img']);
                    unset($_SESSION['temp_img']);
                  }else{
                    echo '<div class="alert alert-danger">Não foi possível Cortar a Foto!</div>';
                    unlink('uploads/'.$_SESSION['temp_img']);
                    unset($_SESSION['temp_img']);
                  }
                }elseif(isset($_POST['upl_foto'])){
                  include_once "lib/WideImage.php";
                  $tamanhos = getimagesize($_FILES['foto']['tmp_name']);
                  if($tamanhos[0] < 500){
                    echo '<div class="alert alert-info">A imagem precisa ter no mínimo 500px de largura!</div>';
                  }else{
                    $wide = WideImage::load($_FILES['foto']['tmp_name']);
                    $resized = $wide->resize(500);
                    $temp_name_image = md5(uniqid(rand(), true));
                    $resize = $resized->saveToFile("uploads/".$temp_name_image.".jpg");
                    if(is_object($resized)){
                      $_SESSION['temp_img'] = $temp_name_image.'.jpg';
                    }
                  }
                }
              }
            ?>

            <?php if(isset($_SESSION['temp_img'])):?>
            <div class="img_crop jcrop-active">
              <img src="uploads/<?php echo $_SESSION['temp_img'] ?>"  id="target" />
            </div>

            <form class="form-group" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" id="x" name="x" value="0" class="coord"/>
              <input type="hidden" id="y" name="y" value="0" class="coord"/>
              <input type="hidden" id="w" name="w" value="160" class="coord" />
              <input type="hidden" id="h" name="h" value="160" class="coord"/>
              <input type="hidden" name="img" value="uploads/<?php echo $_SESSION['temp_img'];?>"/>
              <br>
              <input class="btn btn-success" type="submit" name="crop" value="Cortar Imagem" class="button" />
            </form>
            <?php else:?>
              <form class="form-group" action="" method="post" enctype="multipart/form-data">
                <input type="file" class="form-control" name="foto" />
                <br>
                <input type="submit" class="btn btn-primary" name="upl_foto" value="Enviar Foto do Membro" />
                <a href="editarmembro.php?id=<?php print $membro['Idmembro']; ?>" class="btn btn-warning">Voltar</a>
              </form>
            <?php endif;?>
          </div>
        </div>
      </div>
    </section>
    <?php include('_rodape.php'); ?>
    <?php include('_ajuda.php') ?>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="js/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jcrop.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#Modal').modal('show');
      });
    </script>
    <script>
    $('#target').Jcrop({
      aspectRatio: 1,
      minSize: [255,255],
      setSelect: [0,0,255,255],
      onChange: showCoords,
      onSelect: showCoords,
    });
    function showCoords(c){
      $('#x').val(c.x);
      $('#y').val(c.y);
      $('#w').val(c.w);
      $('#h').val(c.h);
    };
    </script>
    <script>
      setTimeout(function(){
        $('.alert').fadeOut();
      }, 2000);
    </script>
  </body>
</html>
