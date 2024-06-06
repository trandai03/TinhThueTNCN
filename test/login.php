<?php
use PHPUnit\Framework\TestCase;

class AuthenticationTest extends TestCase
{
public function testLogin()
{
// Sử dụng thư viện Guzzle để thực hiện request POST đến URL đăng nhập
$client = new GuzzleHttp\Client();
$response = $client->post('http://localhost/index.php/tax/signin', [
'form_params' => [
'login_username' => 'username',
'login_password' => 'password'
]
]);

// Kiểm tra rằng request đã trả về mã status 200 (OK)
$this->assertEquals(200, $response->getStatusCode());

// Kiểm tra rằng trang đăng nhập đã trả về dữ liệu đúng sau khi đăng nhập
$this->assertContains('Welcome', $response->getBody()->getContents());
}

public function testRegistration()
{
// Sử dụng thư viện Guzzle để thực hiện request POST đến URL đăng ký
$client = new GuzzleHttp\Client();
$response = $client->post('http://localhost/index.php/tax/signup', [
'form_params' => [
'reg_username' => 'new_username',
'reg_fullname' => 'New User',
'reg_password' => 'new_password',
'reg_phone' => '123456789',
'reg_email' => 'new_user@example.com'
]
]);

// Kiểm tra rằng request đã trả về mã status 200 (OK)
$this->assertEquals(200, $response->getStatusCode());

// Kiểm tra rằng trang đăng ký đã trả về dữ liệu đúng sau khi đăng ký
$this->assertContains('Account created successfully', $response->getBody()->getContents());
}
}

?>
