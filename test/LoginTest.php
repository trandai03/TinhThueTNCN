<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controller/tax.php';
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testLoginWithValidCredentials()
    {
        // Prepare the test data
        $username = 'trandai';
        $password = '1';

     
        // Create an instance of the LoginController
        $loginController = new taxController;

        // Call the signin_action method
        $result = $loginController->check_signin($username, $password);

        // Assert the expected behavior
        $this->assertArrayHasKey('id', $result);
        //$this->assertArrayHasKey('data', $result);

    }

    public function testLoginWithInvalidCredentials()
    {
        // Prepare the test data
        $username = 'testuser';
        $password = 'wrongpassword';

        

        // Create an instance of the LoginController
        $loginController = new taxController;

        // Call the signin_action method
        $result = $loginController->check_signin($username, $password);

        
        // Assert the expected behavior
        $this->assertNull($_SESSION['username']);
        $this->assertNull($_SESSION['user_id']);
        $this->assertArrayNotHasKey('views/tax/list.php', $result);
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


