<?php
//include config
require('../func/config.php');

require('../fpdf/fpdf.php');


class PDF extends FPDF {

  function Header() {}
  function Footer() {
    // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
       // $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

//$orderID = ;
$DateAdded = $_GET['date'];

$originalDate = $DateAdded;
$newDate = date("d-m-Y", strtotime($originalDate));


$destination = "FINANCE, IFMIS";
//insert these results to an array
$tt = 0;
$k = 1;


//********************************IMPORTANT*********************************
//$pdf = new FPDF();
//$pdf->AddPage(); //output in potrait format
//OR with settings : FPDF('orientation','unit','size');
//Orientation -- P or Portrait & L or Landscape
//Unit --pt: point, mm: millimeter, cm: centimeter, in: inch
//Size -- A3, A4, A5, Letter, Legal
$pdf = new PDF('P','mm','A4'); //with page settings
$pdf->AddPage();//output's this page in landscape

//********************************IMPORTANT*********************************


//***********Image Stuff*******************

//$pdf->Image('path/to/image',padding-->,paddingTop,zoomInOut);
$pdf->Image('../assets/images/county/final.png',5,5,200);
// $pdf->Image('../assets/images/county/logo_big.png',5,5,200); looks ngud af

$pdf->SetFont('Times','B',13);
$pdf->Cell(0,190,"FROM: ICT DIRECTORATE",0,0, "L");

$pdf->Ln( 14 );
$pdf->Cell(0,180, "TO: OFFICE OF /DEPARTMENT/SECTION OF $destination" ,0,0, "L");

$pdf->Ln( 14 );
$pdf->Cell(0,170, "RE: COMPUTER ALLOCATION" ,0,0, "L");

$pdf->Ln( 95 );
$pdf->SetFont('Times','',12);
$pdf->Write( 8, "Please recieve the desktop computer CPU S/n 6CB3380SL1 and TFT S/n 6CB3380SL1 for your department/section. It is our humble request that the computer(s) will be used and shared by you and the staff members of the department/section.");

$pdf->SetFont('Times','B',12);
$pdf->Ln( 12 );
$pdf->Cell(0,20, "Name of the user: Abucheri Witness Derrick  Sign:_____________________ Date: 29th December 2017" ,0,0, "L");

$pdf->Ln( 12 );
$pdf->Cell(0,20, "PF Number: 878787887878787  Section:________________________" ,0,0, "L");

$pdf->Ln( 12 );
$pdf->Cell(0,20, "Head of Department:________________________  Sign:___________________ Date:___________________" ,0,0, "L");

$pdf->Ln( 12 );
$pdf->Cell(0,20, "Directorate ICT:________________________  Sign:___________________ Date:___________________" ,0,0, "L");

$pdf->Ln( 16 );
$pdf->Cell(0,20, "NB:" ,0,0, "L");
$pdf->Ln( 12 );

$pdf->SetFont('Times','',12);
$pdf->Write( 8, "Please ensure you keep all computers free from dust and any food stuff. DO NOT place the computers on the ground. Take care of them. They are assets and tools of trade.");

$pdf->SetFont('Times','B',12);
$pdf->Ln( 10 );
$pdf->Cell(0,8, "ICT Directorate" ,0,0, "L");


$pdf->AliasNbPages();

//********************************IMPORTANT*********************************
$pdf->Output();//display this pdf

// $pdf->Output('computer-issuing-form.pdf', 'D');//////force download
//PDF output settings
//I: to the browser.
//D: force a file download
//F: save to a local file
//S: return the document as a string. name is ignored.
//$pdf->Output('sara.pdf', 'D'); //force download file

?>
