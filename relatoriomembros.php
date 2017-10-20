<?php
  include('conexao.php');

	$html = '<table class="table table-bordered"';
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Numeral</th>';
	$html .= '<th>Nome do Membro</th>';
	$html .= '<th>Função</th>';
	$html .= '<th>Diretoria</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

	$comando = "select * from membro";
	$resultado = mysqli_query($link, $comando);
	while($row_membro = mysqli_fetch_assoc($resultado)){
		$html .= '<tr><td>'.$row_membro['numeral'] . "</td>";
		$html .= '<td>'.$row_membro['nome'] . "</td>";
		$html .= '<td>'.$row_membro['funcao'] . "</td>";
		$html .= '<td>'.$row_membro['diretoria'] . "</td></tr>";
	}

	$html .= '</tbody>';
	$html .= '</table';
 ?>
<?php
  include('permissao.php');
 ?>
<?php
//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();

// Carrega seu HTML
$dompdf->load_html('
		<html lang="pt-br">
			<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>JTAC - Relatório</title>

			<!-- Bootstrap -->
			<link href="css/bootstrap.min.css" rel="stylesheet">
      <style>
        @page { margin: 80px 15px; }
        header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: white; height: 50px; }
        footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: white; height: 50px; }
        p { page-break-after: always; }
        p:last-child { page-break-after: never; }
      </style>
			</head>
      <body>
			   <header class="panel panel-default">
          <div class="panel-body text-center">
	  	     <h3>Relatório de Membros</h3>
          </div>
         </header>
         </br>
           <div>
           '. $html .'
           </div>
         </br>
        <footer>
          <div class="panel-body">
          <h5>Relatório de Membros - Desenvolvido por Fernando Aranha</h5>
          </div>
        </footer>
      </body>
    </html>
	');

//Renderizar o html
$dompdf->render();

$font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
$dompdf->getCanvas()->page_text(520, 750, "Página: {PAGE_NUM} de {PAGE_COUNT}", $font, 10, array(0,0,0));


//Exibibir a página
$dompdf->stream(
	"relatorio_membro.pdf",
	array(
		"Attachment" => false //Para realizar o download somente alterar para true
	)
);
?>
