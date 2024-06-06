<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controller/tax.php';
use PHPUnit\Framework\TestCase;

class SignupTest extends TestCase
{
    public function testSignupWithValidCredentials()
    {


        $username = 'testuser';
        $fullname = 'Test User';
        $password = 'StrongP@55';
        $phone = '0987654321';
        $email = 'test@example.com';
        // Tạo mô phỏng cho model User

        $signupController = new taxController();

        // Gọi phương thức kiểm thử
        $result = $signupController->check_signup($username, $fullname, $password, $phone, $email);
        if (is_array($result)) {
            // $data is an array
            // Perform actions for array data
            $this->assertArrayHasKey('max_id', $result);
        } else {
            $this->assertTrue($result);
        }
    }

    public function testSignupWithInvalidCredentials()
    {

        $username = 'testuser';
        $fullname = 'Test User';
        $password = 'testpassword';
        $phone = '123456789';
        $email = 'test@example.com';
        // Tạo mô phỏng cho model User

        $signupController = new taxController();

        // Gọi phương thức kiểm thử
        $result = $signupController->check_signup($username, $fullname, $password, $phone, $email);

        // Kiểm tra kết quả



        if (is_array($result)) {
            // $data is an array
            // Perform actions for array data
            $this->assertArrayHasKey('max_id', $result);
        } else {
            $this->assertTrue($result);
        }
    }
}

