<?php
require_once '../libs/fpdf/fpdf.php';
require_once '../models/Rol.php';

$id = $_GET["id"];
if(!$id) die("El ID no existe o consulte al administrador");
$rolModel = new Rol();
$data = $rolModel->obtenerPorId($id);

if(!$data) die("Datos no encontrados - consulte al administrador");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, margin: 20);

// Encabezado
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode("Rol de pago"), 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 8, "Empleado : " . utf8_decode($data['nombre'] . ' ' . $data['apellido']), 0, 1, 'C');
$pdf->Cell(0, 8, "CI : " . $data['ci_empleado'], 0, 1);
$pdf->Cell(100, 8, "MES : " . $data['mes'], 0, 1);
$pdf->Ln(5);

// Título de columnas
$pdf->SetFont('Arial', '', 11);
$pdf->SetFillColor(220, 230, 240);
$pdf->Cell(95, 10, "INGRESOS", 1, 0, 'C', true);
$pdf->Cell(95, 10, "EGRESO", 1, 1, 'C', true);

// Datos
$pdf->SetFont('Arial', '', 10);

$ingresos = [
    'Sueldo' => $data['sueldo'],
    'Horas 25%' => $data['hora25'],
    'Horas 50%' => $data['hora50'],
    'hora 100%' => $data['hora100'],
    'Bono' => $data['bono'],
    'Total Ingreso' => $data['totalIngreso'],   
];

$egresos = [
    'Iess' => $data['iess'],
    'Multas' => $data['multas'],
    'Atrasos' => $data['atrasos'],
    'Alimentación' => $data['alimentacion'],
    'Anticipo' => $data['anticipo'],
    'Otros' => $data['otros'],
    'Total Egreso' => $data['totalEgreso'],
];

$maxFilas = max(count($ingresos), count($egresos));
$ingVal = array_values($ingresos);
$ingKey = array_keys($ingresos);
$egrVal = array_values($egresos);
$egrKey = array_keys($egresos);

// Mostrar ingreso y egreso lado a lado
for ($i = 0; $i < $maxFilas; $i++) {
    if (isset($ingKey[$i])) {
        $pdf->Cell(47, 8, utf8_decode($ingKey[$i]), 1);
        $pdf->Cell(48, 8, number_format($ingVal[$i], 2), 1);
    } else {
        $pdf->Cell(47, 8, '', 1);
        $pdf->Cell(48, 8, '', 0);
    }

    if (isset($egrKey[$i])) {
        $pdf->Cell(47, 8, utf8_decode($egrKey[$i]), 1);
        $pdf->Cell(48, 8, number_format($egrVal[$i], 2), 1);
    } else {
        $pdf->Cell(47, 8, '', 0);
        $pdf->Cell(48, 8, '', 0);
    }

    $pdf->Ln();
}

$pdf->Ln(5);

// Total a pagar
$pdf->SetFont('Arial', 'B', 13);
$pdf->SetFillColor(220,230,240);
$pdf->Cell(0,10,"TOTAL A PAGAR: ".number_format($data['totalPagar'],2),1,1,'C',true);

// Pie de página
$pdf->Ln(10);
$pdf->SetFont('Arial', 'i', 10);
$pdf->Cell(0,10,'Generado el '.date('d/m/Y'),0,1,'L');


$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0,10,'Firma de RRHH',0,1,'C');
$pdf->Ln(15);
$pdf->Cell(0, 10, 'Firma ' . utf8_decode($data['nombre'] . ' ' . $data['apellido']), 0, 1, 'C');

$pdf->Output();
?>
