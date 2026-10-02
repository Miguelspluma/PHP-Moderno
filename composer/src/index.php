<?php
require_once __DIR__.'/../vendor/autoload.php';
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet=new Spreadsheet();

$sheet=$spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Nombre');
$sheet->setCellValue('A2', 'Nombre');

$writer=new Xlsx($spreadsheet);
$filename="exceles\myExxcel.xlsx";
$writer->save($filename);

echo "Archivo Generado";
