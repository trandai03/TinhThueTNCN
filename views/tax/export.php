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

$header = ['Tháng','Tổng thu nhập','Số người phụ thuộc','Thuế phải trả','Trạng thái'];
foreach ($header as $index => $value) {
    $sheet->setCellValue([$index+1,1],$value);
}
//$count=1;
//for ($i = 0, $l = sizeof($taxList); $i < $l; $i++) { // row $i
//    $j = 0;
//    foreach ($taxList[$i] as $k => $v) { // column $j
//        $sheet->setCellValue([$j + 2, ($i + 1 + 1)], $v);
//        $j++;
//    }
//}
$numRow = 2;
foreach($taxList as $tax) {
    $sheet->setCellValue([1,$numRow],$tax['thang'] );
    $sheet->setCellValue([2,$numRow],$tax['tongThuNhap'] );
    $sheet->setCellValue([3,$numRow],$tax['soNguoiPhuThuoc'] );
    $sheet->setCellValue([4,$numRow],$tax['thue'] );
    $sheet->setCellValue([5,$numRow],$tax['status'] );
    $numRow++;
}
$writer = new Xlsx($spreadsheet);
ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="file_export.xlsx"');
$writer->save('php://output');
header("Location: list.php");
?>