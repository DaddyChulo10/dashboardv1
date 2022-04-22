<?php
require('pdf/fpdf.php');
//include_once('../conexion/conexion.php');


class PDF extends FPDF
{
    function Header()
    {
        $this->Image('../../assets/img/logo.png', 10, 8, 29);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(80);
        $this->Cell(30, 10, utf8_decode('INGENIERÍA, AUTOMATIZACIÓN Y CONTROL INDUSTRIAL S.A. DE C.V.'), 0, 0, 'C');
        $this->Ln(5);
        $this->Cell(80);
        $this->Cell(30, 10, utf8_decode(''), 0, 0, 'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, utf8_decode('44 Poniente #502 esq. blvd. 5 de Mayo Col. Santa María, C.P. 72080 Puebla, Puebla.'), 0, 0, 'C');
        $this->Ln(3);
        $this->Cell(0, 10, utf8_decode('Tel: (222) 2-20-54-44, (222) 5-14-75-56 coordinacion@iacsa-puebla.com.mx'), 0, 0, 'C');
    }

    

   
}

$pdf = new PDF();
$pdf->SetTitle(utf8_decode('Cotización'));
$pdf->SetAuthor('IACSA');
$pdf->SetCreator('Sistemas IACSA');
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);

$pdf->AddPage();



$pdf->Output();
