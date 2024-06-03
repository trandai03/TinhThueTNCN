<?php

require_once("../../model/tax.php");

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$taxModel = new tax();
$taxList = $taxModel->getAllthue();
print_r($taxList);
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$header = ['Thang','Tong thu nhap','So nguoi phu thuoc','Thue'];
foreach ($header as $index => $value) {
    $sheet->setCellValue([$index+1,1],$value);
}
$count=1;
for ($i = 0, $l = sizeof($taxList); $i < $l; $i++) { // row $i
    $j = 0;
    foreach ($taxList[$i] as $k => $v) { // column $j
        $sheet->setCellValue([$j + 1, ($i + 1 + 1)], $v);
        $j++;
    }
}
$writer = new Xlsx($spreadsheet);
ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="file_export.xlsx"');
$writer->save('php://output');
header("Location: list.php");
?>