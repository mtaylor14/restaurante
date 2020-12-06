<?php

	session_start();
	if(isset($_SESSION['id_registro']))
	{
		include "Mysql.php";
		include "config.php";
		include 'pdf_clase.php';

		$id = $_SESSION['id_registro'];
		//$id = 1;
		//Conexión de la base de datos
		$mysql = new MYSQL();
		$mysql = $mysql->connect();
		$result = $mysql->query("SELECT * FROM facturas WHERE id=$id");

		//Crear el objeto pdf para inicializar la creación del documento


		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(2);

		///DATE DIA y HORA DE ELABORACION

		$pdf->setTextColor(165, 85, 0);

$pdf->Cell(190, 3,'Factura Hecha El: '.date('d') . ' de '. date('F'). ' de '. date('Y').' a las '.date('h').':'.date('m').':'.date('s').'  ', 0,1,'C');
	

		$pdf->setTextColor(0, 0, 0);
		$pdf->Ln(18);
		$pdf->SetFont('Arial','B', 12);
		$pdf->Cell(20);
		$pdf->Ln(2);
		$pdf->Cell(20);
		$pdf->Ln(2);
		$pdf->Cell(20);
		$pdf->Ln(2);

		while($row = $result->fetch_assoc())
		{
			//Hace referencia para mostar el id del alumno
			$pdf->SetFont('Arial','B', 12);
			$pdf->Cell(20);
			$pdf->Cell(150, 7, 'FOLIO: '.$row['id'], 0, 1, 'C');
			$pdf->Ln(5);
			
			//Mostrar la información del alumno
			$pdf->SetFillColor(226,123,2);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(5);

			$pdf->Cell(60,6,'RFC',1,0,'C',1);
			$pdf->Cell(60,6,'Razon social',1,0,'C',1);
			$pdf->Cell(60,6,'Direccion',1,1,'C',1);
								

			$pdf->SetFont('Arial','',12);
			$pdf->Cell(5);
			
			$pdf->Cell(60,6,utf8_decode($row['rfc']),1,0,'C');
			$pdf->Cell(60,6,utf8_decode($row['razon_social']),1,0,'C');
			$pdf->Cell(60,6,utf8_decode($row['direccion']),1,1,'C');


            $pdf->SetFillColor(226,123,2);
			$pdf->SetFont('Arial','B',12);
			$pdf->Ln(10);
			$pdf->Cell(5);

			$pdf->Cell(60,6,'Cp',1,0,'C',1);
			$pdf->Cell(60,6,'CDFI',1,0,'C',1);
			$pdf->Cell(60,6,'Concepto',1,1,'C',1);
			

			$pdf->Cell(5);

			$pdf->SetFont('Arial','',12);

			$pdf->Cell(60,6,utf8_decode($row['cp']),1,0,'C');
			$pdf->Cell(60,6,utf8_decode($row['cdfi']),1,0,'C');
			$pdf->Cell(60,6,utf8_decode($row['concepto']),1,1,'C');

			
		}
		//Mostrar el aviso
		$pdf->SetFont('Arial','B',16);
		$pdf->Ln(21);
		$pdf->Cell(5);
		$pdf->setTextColor(165, 85, 0);
		$pdf->Cell(183,7, utf8_decode('Factura expedida por el restaurante Naruto Ramen'),0,0,'C');
		$pdf->Ln(5);
		$pdf->Cell(5);

		$pdf->Cell(183,7, utf8_decode('Gracias y vuelva pronto.'),0,0,'C');

		$pdf->setTextColor(0, 0, 0);
		$pdf->Ln(7);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(5);
		//$pdf->Cell(183,7, utf8_decode('..............................'),0,0,'L');

		//Mostrar el documento
		$pdf->Output("ejemplo_generar.pdf", "I");
		$result->free();
		$mysql->close();

		/*header('Pragma: public');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Content-Type: application-download');
		header('Content-Length: ' . filesize("Registro2020_CBTIS230.pdf"));
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename="' . basename("Registro2020_CBTIS230.pdf") . '"');*/
	}    	
	else{
		echo json_encode(array('error' => -1));
    }
?>
