<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controller/tax.php';
require_once (dirname(__DIR__) . '/model/tax.php');
use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{
    public function testCalcWithValidCredentials()
    {

        $thu_nhap = 17000000;
        $so_nguoi = 1;
        $thang = 7;
        $user_id = 1;


        $controller = new taxController();

        // Gọi phương thức kiểm thử
        $result = $controller->calc($thu_nhap, $so_nguoi, $thang, $user_id);


        // Kiểm tra kết quả

        //$this->assertTrue($result);
        if (is_array($result)) {
            // $data is an array
            // Perform actions for array data
            $this->assertArrayHasKey('id', $result);
        } else {
            $this->assertTrue($result);
        }
    }

    public function testCalcWithInvalidCredentials()
    {

        $thu_nhap = 17000000;
        $so_nguoi = 1;
        $thang = -7;
        $user_id = 1;
        // Tạo mô phỏng cho model User

        $controller = new taxController();

        // Gọi phương thức kiểm thử
        $result = $controller->calc($thu_nhap, $so_nguoi, $thang, $user_id);

        // Kiểm tra kết quả



        if (is_array($result)) {
            // $data is an array
            // Perform actions for array data
            $this->assertArrayHasKey('id', $result);
        } else {
            $this->assertTrue($result);
        }
    }
}

