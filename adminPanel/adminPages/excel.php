<?php
namespace PhpOffice;
include ".\PhpOffice\autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;

$htmlString = $_GET['html'];
$fileName = $_GET['file'];
$CntDisposition = "Content-Disposition: attachment;filename=";
$CntDisposition = $CntDisposition . $fileName . ".xls";
header($CntDisposition);
header('Cache-Control: max-age=0');
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
$spreadsheet = $reader->loadFromString($htmlString);
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');
?>