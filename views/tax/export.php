<?php

require_once("../../model/tax.php");


$taxModel = new tax();
$taxList = $taxModel->getAllthue();
print_r($taxList);
$excel =new \PHPExcel();
$excel->setActiveSheet -> setTitle("Danh sach thue");
$excel -> setActiveSheetIndex(0);

$excel -> getActiveSheet() -> setCellValue('A1' , 'Thang');
$excel -> getActiveSheet() -> setCellValue('B1' , 'Tong thu nhap');
$excel -> getActiveSheet() -> setCellValue('C1' , 'So nguoi phu thuoc');
$excel -> getActiveSheet() -> setCellValue('D1' , 'Thue');

$numRow =2 ;
foreach($taxList as $tax){
    $excel -> getActiveSheet() -> setCellValue('A' , $numRow , $tax['thang']);
    $excel -> getActiveSheet() -> setCellValue('B' , $numRow , $tax['tongThuNhap']);
    $excel -> getActiveSheet() -> setCellValue('C' , $numRow , $tax['soNguoiPhuThuoc']);
    $excel -> getActiveSheet() -> setCellValue('D' , $numRow , $tax['thue']);
}


?>