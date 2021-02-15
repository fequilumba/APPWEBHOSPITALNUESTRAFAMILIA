<?php
require ('../fpdf/fpdf.php');

/*class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../files/img/LOGO.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'HOSPITAL NUESTRA FAMILIA',0,0,'C');
    // Salto de línea
    $this->Ln(10);
    $this->Cell(190,10,utf8_decode('Pedido de Exámenes'),0,0,'C');
    $this->Ln(30);
    //Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
    $this->SetFillColor(232,232,232); 
    $this->SetFont('Arial','B',10);
    $this->Cell(50,6,'Especialidad',1,0,'C',1); 
    $this->Cell(50,6,utf8_decode('Médco'),1,0,'C',1);
    $this->Cell(25,6,utf8_decode('Fecha'),1,0,'C',1);
    $this->Cell(65,6,utf8_decode('Exámenes'),1,0,'C',1);
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//datos del paciente
require "../modelos/Verexamen.php";
$examen = new Verexamen();
//$rspta = $examen->imprimir();


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Output();


//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(58,6,'Nombre',1,0,'C',1); 
$pdf->Cell(50,6,utf8_decode('Categoría'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('Código'),1,0,'C',1);
$pdf->Cell(12,6,'Stock',1,0,'C',1);
$pdf->Cell(35,6,utf8_decode('Descripción'),1,0,'C',1);*/


$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
//traer datos del examen
require "../modelos/Verexamen.php";
$examen = new Verexamen();
$rspta = $examen->examencabecera($_GET["id"]);
$reg=$rspta->fetch_object();

//$pdf->Cell(5,$textypos,"Nombre del Medico/Doctor \n");
//$pdf->Cell(50,6,utf8_decode($reg->nombre),1,0,'C',1);
//$pdf->Cell(58,6,$reg->especialidad,1,0,'C',1);
//$pdf->Cell(5,$textypos,utf8_decode("Especialidad: ".$reg->especialidad."\n"));


// Agregamos los datos del consultorio medico
$pdf->Image('../files/img/LOGO.png',160,8,33);
$pdf->Cell(5,$textypos,"EXAMEN MEDICO");
$pdf->SetFont('Arial','B',8);    
$pdf->setY(21);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Direccion: Malimpia 445, Quito 170131");
$pdf->setY(24);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Telefono: (+593) 979589877");

$pdf->SetFont('Arial','',10);    
$pdf->setY(40);$pdf->setX(10);
$pdf->Cell(5,$textypos,utf8_decode("Medico/Doctor: ".$reg->medico."\n"));
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(5,$textypos,utf8_decode("Especialidad: ".$reg->especialidad."\n"));
$pdf->setY(45);$pdf->setX(10);
$pdf->Cell(5,$textypos,utf8_decode("Paciente: ".$reg->paciente."\n"));
$pdf->setY(50);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Fecha: ".$reg->fecha_cita."\n");
$pdf->Ln(10);

//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,6,utf8_decode('Exámenes'),1,1,'C',1);
$pdf->Cell(100,6,utf8_decode($reg->examen),1,0,'C',0);


/// Apartir de aqui empezamos con la tabla de medicamentos
/*$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("No.", "Medicamento","Dosis","Duracion","Total");
//// Arrar de Productos
$products = array(
	array("1", "Medicamento 1","1","1 mes","Ninguna"),
	array("2", "Medicamento 2","2","2 meses","Ninguna"),
	array("3", "Medicamento 3","2","1 mes","Ninguna"),
	array("4", "Medicamento 4","2","1 mes","Ninguna"),
	array("5", "Medicamento 5","3","1 mes","Ninguna"),
	array("6", "Medicamento 6","1","12 meses","Ninguna"),
);
    // Column widths
    $w = array(20, 95, 20, 25, 25);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    $total = 0;
    foreach($products as $row)
    {
        $pdf->Cell($w[0],6,$row[0],1);
        $pdf->Cell($w[1],6,$row[1],1);
        $pdf->Cell($w[2],6,$row[2],'1',0,'R');
        $pdf->Cell($w[3],6,$row[3],'1',0,'R');
        $pdf->Cell($w[4],6,$row[3],'1',0,'R');

        $pdf->Ln();

    }
$yposdinamic = 60 + (count($products)*10);*/

$pdf->SetFont('Arial','B',10);    

//$pdf->setY($yposdinamic);
$pdf->Ln(180);
$pdf->setX(90);
$pdf->Cell(5,$textypos,"FIRMA Y SELLO");
$pdf->SetFont('Arial','',10);    

//$pdf->setY($yposdinamic+20);
$pdf->Ln(15);
$pdf->setX(65);
$pdf->Cell(5,$textypos,"_________________________________________");
//$pdf->setY($yposdinamic+25);
$pdf->Ln(5);
$pdf->setX(85);
$pdf->Cell(5,$textypos,utf8_decode("Medico: ".$reg->medico."\n"));
//$pdf->setY($yposdinamic+55);
$pdf->setX(80);

$pdf->output();
?>