<?php
require __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class taxController{
    protected $message = "";
    protected $title = "Quản lý thuế";

    function view_action($id=0){
        if(isset($id) && $id!= "" && (int)$id){
            $id = (int)$id;
            $taxModel = new tax();
            $data = $taxModel->getTaxById($id);
        }
        if(!empty($data)){
            return ["views/tax/view.php",$data];
        }else{
            $taxModel = new tax();
            $data = $taxModel->getAllthue();
            
            $message ="Thuế của người bạn muốn xem không tồn tại";
            $data['message'] = $message;
            return ["views/tax/list.php", $data];
        }
    } 

    function index_action(){
        if(isset($_GET['q']) && $_GET['q']!=''){
            $q = $_GET['q'];
            $taxModel = new tax();
            // $table = $proModel->table;
            // $sql = "select * from $table where name like '%$q%' or description like '%$q%'";
            // // $data = exe_query($sql);
            // $data = $proModel->exe_query($sql);
        }else{
            $taxModel = new tax();
            $data = $taxModel->getAllthue();
        }		
        return ["views/tax/list.php", $data];
    }

    function calc_action(){
        return [ "views/tax/calc_tax.php", []];
    }

    function calcTax_action(){
        if(isset($_POST['thu_nhap']) && isset($_POST['so_nguoi']) && isset($_POST['thang']) && $_POST['thang'] != "" && $_POST['thu_nhap'] != "" && $_POST['so_nguoi'] != ""){
            $thu_nhap = $_POST['thu_nhap'];
            $so_nguoi = $_POST['so_nguoi'];
            $thang = $_POST['thang'];

            $giam_ca_nhan = 11000000;
            $giam_nguoi_phu_thuoc = 4400000;

            $thu_nhap_thue = $thu_nhap - $giam_ca_nhan - $so_nguoi * $giam_nguoi_phu_thuoc;
            $thue = 0;
            if ($thu_nhap_thue <= 0) {
                $thue = 0;
            } else {
                if ($thu_nhap_thue <= 5 * 1000000) {
                    $thue =  $thu_nhap_thue * 5 / 100;
                } else if ($thu_nhap_thue <= 10 * 1000000) {
                    $thue = $thu_nhap_thue * 10 / 100 - 0.25 * 1000000;
                } else if ($thu_nhap_thue <= 18 * 1000000) {
                    $thue = $thu_nhap_thue * 15 / 100 - 0.75 * 1000000;
                } else if ($thu_nhap_thue <= 32 * 1000000) {
                    $thue = $thu_nhap_thue * 20 / 100 - 1.65 * 1000000;
                } else if ($thu_nhap_thue <= 52 * 1000000) {
                    $thue = $thu_nhap_thue * 25 / 100 - 3.25 * 1000000;
                } else if ($thu_nhap_thue <= 80 * 1000000) {
                    $thue = $thu_nhap_thue * 30 / 100 - 5.85 * 1000000;
                } else {
                    $thue = $thu_nhap_thue * 35 / 100 - 9.85 * 1000000;
                }
            }

            $tax['tongThuNhap'] = $thu_nhap;
            $tax['soNguoiPhuThuoc'] = $so_nguoi;
            $tax['thang'] = $thang;
            $tax['thue'] = $thue;
            $tax['status'] = "NO";

            $taxModel = new tax();
            if($taxModel->addTax($tax)){
                // $message = "Thêm thue mới thành công";
            }else{
                // $message  = "Thêm thue mới không thành công";
            }
            $data = $taxModel->getTaxByUserID('1');
            return ["views/tax/pay_tax.php",$data];
        }        
    }

    function insert_action(){
        if(isset($_POST['name']) && $_POST['name']!=""){
            $product['name'] = $_POST['name'];
            $product['price'] = ($_POST['price'])??0;
            $product['description'] = ($_POST['description'])??'';
            $product['active'] = ($_POST['active'])??0;
            $uploadDir = './upload/';
            $product['image'] = "";
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];
                 $newname =  $file['name'].time();
                $uploadPath = $uploadDir . $newname;
                if (move_uploaded_file($file['tmp_name'], $uploadPath)){
                    $product['image']= $newname;
                }
            }
            $proModel = new Product();
            if($proModel->insert($product)){
                $message = "Thêm sản phẩm mới thành công";
            }else{
                $message  = "Thêm sản phẩm mới không thành công";
            }
            $data = $proModel->getAll();
            // $data = getAll('products');
            $data['message'] = $message;
            return ["views/products/list.php",$data];
        }else{
            return ["views/products/insertform.php",[]];
        }
    }
    function export_action()
    {
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

        ob_end_clean();

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="file_export.xlsx"');
        //header('Cache-Control: max-age=0');
        //$writer = IOFactory::createWriter($sheet, 'Xlsx');
//        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');


        
        return ["views/tax/list.php", []];
    }
}
?>