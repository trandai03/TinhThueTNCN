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
        $password = 'testpassword';
        $phone = '123456789';
        $email = 'test@example.com';

        // Tạo mô phỏng cho model User

        $signupController = new taxController();

        // Gọi phương thức kiểm thử
        $result = $signupController->check_signup($username, $fullname, $password, $phone, $email);

        // Kiểm tra kết quả

        //$this->assertTrue($result);
        $this->assertArrayHasKey('max_id', $result);
    }
}

