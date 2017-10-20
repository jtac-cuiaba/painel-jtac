<?php
  include('permissao.php');
 ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>JTAC - Novo Alistamento </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/docs.css">
    <link rel="shortcut icon" href="favicon.ico">

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
      <?php include('_menui.php') ?>
    </nav>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-xs-6">
            <h3>Novo Alistamento</h3>
            <form class="form-group" method="post" action="cadastraalistamento.php">
              <br>
              Nome:
              <input type="text" class="form-control" name="nome" required>
              <br>
              Telefone:
              <input type="text" class="form-control" name="telefone" required>
              <br>
              E-mail:
              <input type="email" class="form-control" name="email" required>
              <br>
              <h3>Perguntas</h3>
              <br>
              <strong>1. </strong>Já conhecia o Airsoft?
              <input type="text" class="form-control" name="p1" required>
              <br>
              <strong>1.1. </strong>Se não, como conheceu?
              <input type="text" class="form-control" name="p2" required>
              <br>
              <strong>1.2. </strong>Se sim, já jogou em outra equipe? Qual Equipe? E cite 3 regras do Airsoft.
              <input type="text" class="form-control" name="p3" required>
              <br>
              <strong>2. </strong>Como conheceu a Equipe JTAC?(facebook, google, indicação de um membro (qual membro), indicação de outra equipe (qual equipe).
              <input type="text" class="form-control" name="p4" required>
              <br>
              <strong>3. </strong>Qual o seu interesse em participar da equipe JTAC?
              <input type="text" class="form-control" name="p5" required>
              <br>
              <strong>4. </strong>Em um jogo de Airsoft qual o seu foco, cumprir as missões ou fazer números (contar quantos inimigos abatidos)?
              <input type="text" class="form-control" name="p6" required>
              <br>
              <strong>5. </strong>Você já possui equipamentos? Se ‘sim’, quais?
              <input type="text" class="form-control" name="p7" required>
              <br>
              <strong>6. </strong>A equipe JTAC adota o MULTICAM como cor padrão do fardamento, em quanto tempo conseguiria se padronizar?(após efetivado temos um prazo para essa padronização).
              <input type="text" class="form-control" name="p8" required>
              <br>
              <strong>7. </strong>Cite algumas qualidades e defeitos seus.
              <input type="text" class="form-control" name="p9" required>
              <br>
              <strong>8. </strong>Em qual posição você gosta de jogar?(linha de frente, retaguarda, assalto, suporte, sniper, especialista, médico).
              <input type="text" class="form-control" name="p10" required>
              <br>
              <strong>9. </strong>Qual a sua opinião sobre equipamentos sem nota fiscal e sem a ponta laranja.
              <input type="text" class="form-control" name="p11" required>
              <br>
              <strong>10. </strong>Qual a sua opinião sobre jogar sozinho e jogar em grupo?
              <input type="text" class="form-control" name="p12" required>
              <br>
              <strong>11. </strong>Qual o principal pilar do Airsoft?
              <input type="text" class="form-control" name="p13" required>
              <br>
              <strong>12. </strong>Qual decisão tomaria caso algum companheiro estivesse em perigo? (dentro e fora de campo).
              <input type="text" class="form-control" name="p14" required>
              <br>
              <strong>13. </strong>Gostaria de receber treinamentos? Quais e como?
              <input type="text" class="form-control" name="p15" required>
              <br>
              <strong>14. </strong>Tem costume de participar de reuniões?
              <input type="text" class="form-control" name="p16" required>
              <br>
              <strong>15. </strong>Qual sua disponibilidade semanal para jogos?
              <input type="text" class="form-control" name="p17" required>
              <br>
              <strong>16. </strong>Tem disponibilidade de locomoção? Se sim, qual?
              <input type="text" class="form-control" name="p18" required>
              <br>
              <strong>17. </strong>Você tem costume de compartilhar seus equipamentos?
              <input type="text" class="form-control" name="p19" required>
              <br>
              <strong>18. </strong>Uma briga começou em campo, qual atitude você tomaria?
              <input type="text" class="form-control" name="p20" required>
              <br>
              <strong>19. </strong>Convidaria alguém para participar da equipe? Se sim, quais as características apresentaria para o convidado?
              <input type="text" class="form-control" name="p21" required>
              <br>
              <strong>20. </strong>Fale um pouco mais sobre você: (Idade, onde você mora, trabalha/estuda, pratica outros esportes, interesse em confraternização extra campo).
              <textarea maxlength="5192" class="form-control" name="p22" rows="8" cols="100" required></textarea>
              <br>
              <a href="alistamento.php" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
              <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar Alterações</button>
            </form>
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
    <script>
      $(document).ready(function(){
        $('#Modal').modal('show');
      });
    </script>
  </body>
</html>
