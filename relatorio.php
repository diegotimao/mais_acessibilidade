<?php	

	include_once("db/db_conect.php");

	
	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>ID</th>';
	$html .= '<th>Pergunta</th>';
	$html .= '<th>Data</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_enquete = "SELECT * FROM cad_enquete";
	$resultado_enquete = mysqli_query($conn, $result_enquete);
	while($row_cad_enquete = mysqli_fetch_assoc($resultado_enquete)){
		$html .= '<tr><td>'.$row_cad_enquete['id'] . "</td>";
		$html .= '<td>'.$row_cad_enquete['pergunta'] . "</td>";
		$html .= '<td>'.$row_cad_enquete['data'] . "</td>";
				
	}
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("pdf/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<center><img src="img/marvel.png" alt="" style=" width: 320px; height: 100px; "></center>
			<br>
			<h1 style="text-align: center;">Relatório</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Relatório Mais Acessibilidade", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>