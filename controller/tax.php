<?php 

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
        if(isset($_POST['thu_nhap']) && isset($_POST['so_nguoi']) && $_POST['thu_nhap'] != "" && $_POST['so_nguoi'] != ""){
            $thu_nhap = $_POST['thu_nhap'];
            $so_nguoi = $_POST['so_nguoi'];

            $giam_ca_nhan = 11000000;
            $giam_nguoi_phu_thuoc = 4400000;

            $thu_nhap_thue = $thu_nhap - $giam_ca_nhan - $so_nguoi * $giam_nguoi_phu_thuoc;

            if ($thu_nhap_thue <= 0) {
                return 0;
            } else {
                if ($thu_nhap_thue <= 5 * 1000000) {
                    return $thu_nhap_thue * 5 / 100;
                } else if ($thu_nhap_thue <= 10 * 1000000) {
                    return $thu_nhap_thue * 10 / 100 - 0.25 * 1000000;
                } else if ($thu_nhap_thue <= 18 * 1000000) {
                    return $thu_nhap_thue * 15 / 100 - 0.75 * 1000000;
                } else if ($thu_nhap_thue <= 32 * 1000000) {
                    return $thu_nhap_thue * 20 / 100 - 1.65 * 1000000;
                } else if ($thu_nhap_thue <= 52 * 1000000) {
                    return $thu_nhap_thue * 25 / 100 - 3.25 * 1000000;
                } else if ($thu_nhap_thue <= 80 * 1000000) {
                    return $thu_nhap_thue * 30 / 100 - 5.85 * 1000000;
                } else {
                    return $thu_nhap_thue * 35 / 100 - 9.85 * 1000000;
                }
            }
        }        
    }
}
?>