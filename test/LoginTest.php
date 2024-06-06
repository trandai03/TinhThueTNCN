<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controller/tax.php';
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testLoginWithValidCredentials()
    {
        $username = 'trandai';
        $password = '1';

        $loginController = new taxController;
        $result = $loginController->check_signin($username, $password);
        $this->assertArrayHasKey('id', $result);
    }

    public function testLoginWithInvalidCredentials()
    {
        $username = 'testuser';
        $password = 'wrongpassword';
        $loginController = new taxController;
        $result = $loginController->check_signin($username, $password);

        $this->assertNull($_SESSION['username']);
        $this->assertNull($_SESSION['user_id']);
        $this->assertArrayNotHasKey('id', $result);
    }


    private function getMockResult($data)
    {
        $result = $this->getMockBuilder('stdClass')
            ->setMethods(array('fetch_assoc'))
            ->getMock();
        $result->expects($this->any())
            ->method('fetch_assoc')
            ->will($this->returnValue($data));
        $result->num_rows = 1;
        return $result;
    }
}


