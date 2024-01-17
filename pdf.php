<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("app/list_results.php");
require('utils/fpdf/fpdf.php');

$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'REPORTE DE RESPUESTAS', 0, 1, 'C');
$pdf->Ln(1);
$pdf->AliasNbPages();

if (count($results) > 0) {
    $pdf->SetFont('Arial', 'B', 7);
    $pdf->SetFillColor(187, 65, 100); 
    $pdf->Cell(6, 5, 'ID', 1, 0, 'C', 1);
    $pdf->Cell(30, 5, 'FECHA', 1, 0, 'C', 1);
    $pdf->Cell(25, 5, 'ESTADO', 1, 0, 'C', 1);
    $pdf->Cell(17, 5, 'INVITADOS', 1, 0, 'C', 1);
    $pdf->Cell(50, 5, 'NOMBRES', 1, 0, 'C', 1);
    $pdf->Cell(40, 5, 'PETICIONES', 1, 0, 'C', 1);
    $pdf->Cell(45, 5, 'NOMBRE CONTACTO', 1, 0, 'C', 1);
    $pdf->Cell(25, 5, 'TELEF CONTACTO', 1, 0, 'C', 1);
    $pdf->Cell(40, 5, 'EMAIL CONTACTO', 1, 1, 'C', 1);
    $pdf->SetFont('Arial', '', 7);
    foreach ($results as $result) {
        $pdf->Cell(6, 5, $result->id, 1);
        $pdf->Cell(30, 5, date('d/m/Y h:i:s A', strtotime($result->createdAt)), 1, 0, 'C');
        $pdf->Cell(25, 5, $result->accepted ? 'ACEPTADO' : 'RECHAZADO', 1);
        $pdf->Cell(17, 5, $result->guests, 1);
        $pdf->Cell(50, 5, $result->namesGuests, 1);
        $pdf->Cell(40, 5, $result->dietaryReq, 1);
        $pdf->Cell(45, 5, $result->contactName, 1);
        $pdf->Cell(25, 5, $result->contactPhone, 1);
        $pdf->Cell(40, 5, $result->contactEmail, 1);
        $pdf->Ln();
    }
} else {
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 10, 'No se encontraron resultados...', 0, 1, 'C');
}

$pdf->Output();
?>
