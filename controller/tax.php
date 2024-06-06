<?php
require __DIR__ . '/../vendor/autoload.php';

require_once (dirname(__DIR__) . '/model/User.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class taxController
{
    protected $message = "";
    protected $title = "Quản lý thuế";

    function view_action($id = 0)
    {
        if (isset($id) && $id != "" && (int) $id) {
            $id = (int) $id;
            $taxModel = new tax();
            $data = $taxModel->getTaxById($id);
        }
        if (!empty($data)) {
            return ["views/tax/view.php", $data];
        } else {
            $taxModel = new tax();
            $data = $taxModel->getAllthue();

            $message = "Thuế của người bạn muốn xem không tồn tại";
            $data['message'] = $message;
            return ["views/tax/list.php", $data];
        }
    }

    function index_action()
    {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            if (isset($_GET['q']) && $_GET['q'] != '') {
                $q = $_GET['q'];
                $taxModel = new tax();
                $data = $taxModel->searchthue($q);
            } else {
                $taxModel = new tax();
                $table = $taxModel->table;
                $sql = "SELECT * FROM $table WHERE user_id = $id order by thang";
                $data = $taxModel->Query($sql);
            }
            return ["views/tax/list.php", $data];
        } else {
            return ["views/tax/login.php", []];
        }
    }

    function calc_action()
    {
        return ["views/tax/calc_tax.php", []];
    }

    // hàm test tính thuế 
    function calc($thu_nhap, $so_nguoi, $thang, $user_id){
        $giam_ca_nhan = 11000000;
        $giam_nguoi_phu_thuoc = 4400000;

        $thu_nhap_thue = $thu_nhap - $giam_ca_nhan - $so_nguoi * $giam_nguoi_phu_thuoc;
        $thue = 0;
        if ($thu_nhap_thue <= 0) {
            $thue = 0;
        } else {
            if ($thu_nhap_thue <= 5 * 1000000) {
                $thue = $thu_nhap_thue * 5 / 100;
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
        $tax['user_id'] = $user_id;
        $taxModel = new tax();
        $table = $taxModel->table;
        // $sql = "SELECT COUNT(*) AS so_luong_ban_ghi FROM $table";
        $sql = "SELECT MAX(id) as max_id FROM $table";
        $result = $taxModel->query($sql);
        $row = $result->fetch_assoc();
        $count = (int) $row['max_id'];
        $id = $count + 1;
        $tax['id'] = $id;
        return $tax;
    }

    function calcTax_action()
    {
        if (isset($_POST['thu_nhap']) && isset($_POST['so_nguoi']) && isset($_POST['thang']) && $_POST['thang'] != "" && $_POST['thu_nhap'] != "" && $_POST['so_nguoi'] != "") {
            $thu_nhap = $_POST['thu_nhap'];
            $so_nguoi = $_POST['so_nguoi'];
            $thang = $_POST['thang'];

            // $giam_ca_nhan = 11000000;
            // $giam_nguoi_phu_thuoc = 4400000;

            // $thu_nhap_thue = $thu_nhap - $giam_ca_nhan - $so_nguoi * $giam_nguoi_phu_thuoc;
            // $thue = 0;
            // if ($thu_nhap_thue <= 0) {
            //     $thue = 0;
            // } else {
            //     if ($thu_nhap_thue <= 5 * 1000000) {
            //         $thue = $thu_nhap_thue * 5 / 100;
            //     } else if ($thu_nhap_thue <= 10 * 1000000) {
            //         $thue = $thu_nhap_thue * 10 / 100 - 0.25 * 1000000;
            //     } else if ($thu_nhap_thue <= 18 * 1000000) {
            //         $thue = $thu_nhap_thue * 15 / 100 - 0.75 * 1000000;
            //     } else if ($thu_nhap_thue <= 32 * 1000000) {
            //         $thue = $thu_nhap_thue * 20 / 100 - 1.65 * 1000000;
            //     } else if ($thu_nhap_thue <= 52 * 1000000) {
            //         $thue = $thu_nhap_thue * 25 / 100 - 3.25 * 1000000;
            //     } else if ($thu_nhap_thue <= 80 * 1000000) {
            //         $thue = $thu_nhap_thue * 30 / 100 - 5.85 * 1000000;
            //     } else {
            //         $thue = $thu_nhap_thue * 35 / 100 - 9.85 * 1000000;
            //     }
            // }
            if (!isset($_SESSION['user_id'])) {
                return ["views/tax/login.php", []];
            }
            $user_id = $_SESSION['user_id'];
            // $tax['tongThuNhap'] = $thu_nhap;
            // $tax['soNguoiPhuThuoc'] = $so_nguoi;
            // $tax['thang'] = $thang;
            // $tax['thue'] = $thue;
            // $tax['status'] = "NO";
            // $tax['user_id'] = $user_id;
            // $status = "NO";

            $taxModel = new tax();
            $table = $taxModel->table;
            // // $sql = "SELECT COUNT(*) AS so_luong_ban_ghi FROM $table";
            // $sql = "SELECT MAX(id) as max_id FROM $table";
            // $result = $taxModel->query($sql);
            // $row = $result->fetch_assoc();
            $tax = $this->calc($thu_nhap, $so_nguoi, $thang, $user_id);


            if ($taxModel->addTax($tax)) {
                // echo "OK";
            } else {

                echo "Ko";
            }

            $sql = "SELECT * FROM $table WHERE user_id = $user_id and thang = $thang";
            $data = $taxModel->exeQuery($sql);


            return ["views/tax/pay_tax.php", $data];
        }
    }


    function payTax_action($thang)
    {
        if (isset($thang) && $thang != "" && (int) $thang) {
            $user_id = $_SESSION['user_id'];
            $thang = (int) $thang;
            $taxModel = new tax();
            $table = $taxModel->table;
            $sql = "SELECT * FROM $table WHERE thang = $thang and user_id = $user_id";
            $data = $taxModel->exeQuery($sql);
        }
        if (!empty($data)) {
            // print_r($data);
            return ["views/tax/payment.php", $data];
        } else {
            return ["views/tax/list.php", []];
        }
    }

    function pay($thang, $user_id){
        $tax['thang'] = $thang;
        $tax['user_id'] = $user_id;
        return $tax;
    }

    function payment_action()
    {
        if (isset($_POST['bank']) && isset($_POST['stk']) && $_POST['stk'] != "") {
            $thang = $_POST['thang'];
            $user_id = $_SESSION['user_id'];


            $tax = $this->pay($thang, $user_id);
            $taxModel = new tax();
            $table = $taxModel->table;
            // echo $user_id;
            $sql = "UPDATE $table SET status = 'YES' WHERE user_id = $user_id AND thang = $thang";
            if ($taxModel->query($sql)) {
                // echo "OK";
            } else {
                echo "KO";
            }
            $sql = "SELECT * FROM $table WHERE user_id = $user_id order by thang";
            $data = $taxModel->Query($sql);

            return ["views/tax/list.php", $data];
        } else {
            $user_id = $_SESSION['user_id'];
            $taxModel = new tax();
            $table = $taxModel->table;
            $sql = "SELECT * FROM $table WHERE user_id = $user_id";
            $data = $taxModel->query($sql);
            return ["views/tax/list.php", $data];
        }
    }

    function login_action()
    {
        return ["views/tax/login.php", []];
    }

    function check_signin($username, $password)
    {
        $userModel = new User();
        $table = $userModel->table;

        $sql = "SELECT * FROM $table WHERE username = '$username'";
        $result = $userModel->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // password_verify($password, $row['password'])
            if ($password == $row['password']) {
                return $row;
            } else {
                throw new Exception("Mật khẩu chưa đúng");
            }
        } else {
            throw new Exception("Không tồn tại user này");
        }
        return null;
    }

    function signin_action()
    {
        if (isset($_POST['login'])) {
            $username = $_POST['login_username'];
            $password = $_POST['login_password'];

            $taxModel = new tax();
            $table = $taxModel->table;

            if ($this->check_signin($username, $password) != null) {
                $id = $this->check_signin($username, $password)['id'];
                $_SESSION['user_id'] = $id;
                $sql = "SELECT * FROM $table WHERE user_id = $id order by thang";
                $data = $taxModel->query($sql);
                // print_r($data);
                return ["views/tax/list.php", $data];
            }
        }
    }


    function check_signup($username, $fullname, $password, $phone, $email)
    {
        // Regular expressions for validation
        $username_regex = '/^[a-zA-Z0-9_]{3,20}$/';
        $fullname_regex = '/^[a-zA-Z\s]+$/';
        $password_regex = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
        $phone_regex = '/^\d{10}$/'; // Assumes phone number is 10 digits
        $email_regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        // Validate input parameters
        if (!preg_match($username_regex, $username)) {
            echo "Invalid username format!";
            return null;
        }

        if (!preg_match($fullname_regex, $fullname)) {
            echo "Invalid fullname format!";
            return null;
        }

        if (!preg_match($password_regex, $password)) {
            echo "Invalid password format!";
            return null;
        }

        if (!preg_match($phone_regex, $phone)) {
            echo "Invalid phone number format!";
            return null;
        }

        if (!preg_match($email_regex, $email)) {
            echo "Invalid email format!";
            return null;
        }

        // Continue with the rest of the function if all inputs are valid
        $userModel = new User();
        $table = $userModel->table;
        $sql = "SELECT * FROM $table WHERE username = '$username'";
        $result = $userModel->query($sql);

        if ($result->num_rows > 0) {
            echo "Username already exists!";
            return null;
        } else {
            $sql = "SELECT MAX(id) as max_id FROM $table";
            $result = $userModel->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }
    }

    function signup_action()
    {
        if (isset($_POST['register'])) {
            $username = $_POST['reg_username'];
            $fullname = $_POST['reg_fullname'];
            $password = $_POST['reg_password'];
            $phone = $_POST['reg_phone'];
            // $address = $_POST['reg_address'];
            $email = $_POST['reg_email'];


            // Check if username already exists
            $userModel = new User();
            $table = $userModel->table;
            // $sql = "SELECT * FROM $table WHERE username = '$username'";
            // $result = $userModel->query($sql);

            // if ($result->num_rows > 0) {
            //     echo "Username already exists!";
            // } else {
            //     // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            //     $sql = "SELECT MAX(id) as max_id FROM $table";
            //     // $sql = "SELECT COUNT(*) AS so_luong_ban_ghi FROM $table";
            //     $result = $userModel->query($sql);
            //     $row = $result->fetch_assoc();
            //     $count = (int) $row['max_id'];
            //     $id = $count + 1;
            //     $sql = "INSERT INTO $table (id, username, fullname, password, phone, email) VALUES ('$id', '$username', '$fullname', '$password', '$phone', '$email')";

            //     if ($userModel->query($sql) === TRUE) {
            //         // echo "Registration successful!";
            //         return ["views/tax/login.php", []];
            //     } else {
            //         echo "Đăng kí thất bại";
            //     }
            // }


            if ($this->check_signup($username, $fullname, $password, $phone, $email) != null) {
                $row = $this->check_signup($username, $fullname, $password, $phone, $email);
                $count = (int) $row['max_id'];
                $id = $count + 1;

                $sql = "INSERT INTO $table (id, username, fullname, password, phone, email) VALUES ('$id', '$username', '$fullname', '$password', '$phone', '$email')";
                if ($userModel->query($sql) === TRUE) {
                    // echo "Registration successful!";
                    return ["views/tax/login.php", []];
                } else {
                    echo "Đăng kí thất bại";
                }
            }
        }

    }

    function khaibao_action()
    {
        return ["views/tax/khaibao_tax.php", []];
    }

    // hàm khai báo thuế test 
    function khaibao($tax_code, $dc, $ns, $cccd, $id){
        $userModel = new User();
        $table = $userModel->table;

        $sql = "UPDATE $table SET birth = '$ns', tax_code = '$tax_code', dia_chi = '$dc', cccd = '$cccd' WHERE id = $id";
        $result = $userModel->query($sql);
        if($result){
            $user['check'] = $result; 
            return $user;
        }
        else{
            echo "Khai báo không thành công";
            return null;
        }
    }

    function kbTax_action()
    {
        if (isset($_POST['khaibao'])) {
            $tax_code = $_POST['ms_thue'];
            $dc = $_POST['dia_chi'];
            $ns = $_POST['ngay_sinh'];
            $cccd = $_POST['cccd'];
            $id = $_SESSION['user_id'];

            // $userModel = new User();
            // $table = $userModel->table;

            // $sql = "UPDATE $table SET birth = '$ns', tax_code = '$tax_code', dia_chi = '$dc', cccd = '$cccd' WHERE id = $id";

            // if ($userModel->query($sql)) {
            //     // echo "OK";
            // } else {
            //     echo "KO";
            // }
            $result = $this->khaibao($tax_code, $dc, $ns, $cccd, $id);
            // print_r($result);

            $taxModel = new tax();
            $table = $taxModel->table;
            $sql = "SELECT * FROM $table WHERE user_id = $id order by thang";
            $data = $taxModel->Query($sql);
            return ["views/tax/list.php", $data];
        } else {
            return ["views/tax/khaibao_tax.php", []];
        }
    }

    function logout_action()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        return ["views/tax/login.php", []];
    }



    function export_action()
    {
        $taxModel = new tax();
        $taxList = $taxModel->getAllthue();
        print_r($taxList);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $header = ['Tháng', 'Tổng thu nhập', 'Số người phụ thuộc', 'Thuế phải trả', 'Trạng thái'];
        foreach ($header as $index => $value) {
            $sheet->setCellValue([$index + 1, 1], $value);
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
        foreach ($taxList as $tax) {
            $sheet->setCellValue([1, $numRow], $tax['thang']);
            $sheet->setCellValue([2, $numRow], $tax['tongThuNhap']);
            $sheet->setCellValue([3, $numRow], $tax['soNguoiPhuThuoc']);
            $sheet->setCellValue([4, $numRow], $tax['thue']);
            $sheet->setCellValue([5, $numRow], $tax['status']);
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