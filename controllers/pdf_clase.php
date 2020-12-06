<?php
	require 'fpdf/fpdf.php';
	class PDF extends FPDF
	{
		function Header()
		{ 

			$this->Image('images/55.png', 6, 15, 30);
          




			$this->SetFont('Arial','B',14);
			$this->Cell(55);
			$this->Ln(6);

		
		$this->Cell(55);
		$this->SetFont('Times','I',20);

		$this->Cell(78, 7,utf8_decode('Factura Restaurante Naruto Ramen'),0,1,'C');
	
					$this->Ln(6);

		$this->Cell(55);
		$this->SetFont('Arial','B',10);
		$this->Ln(3);
		$this->Cell(55);
		$this->SetFont('Arial','B',14);
		$this->Ln(4);
		
		}
		
		function Footer()
		{





			$this->SetY(-15);
			$this->SetFont('Arial','I', 10);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}
?>