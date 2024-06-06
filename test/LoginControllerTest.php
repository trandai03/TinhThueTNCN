<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controller/tax.php';
use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase
{
    public function testLoginWithValidCredentials()
    {
        // Prepare the test data
        $username = 'trandai';
        $password = '1';

        // Mock the User model
        // $userModel = $this->getMockBuilder('User')
        //     ->setMethods(array('query'))
        //     ->getMock();
        // $userModel->expects($this->once())
        //     ->method('query')
        //     ->with($this->stringContains("SELECT * FROM users WHERE username = '$username'"))
        //     ->will($this->returnValue(
        //         $this->getMockResult(array(
        //             'id' => 1,
        //             'username' => $username,
        //             'password' => $password
        //         ))
        //     ));

        // Create an instance of the LoginController
        $loginController = new taxController;

        // Call the signin_action method
        $result = $loginController->check_signin($username, $password);
        print_r($result);
        // Assert the expected behavior
        $this->assertArrayHasKey('id', $result);
        //$this->assertArrayHasKey('data', $result);

    }

    public function testLoginWithInvalidCredentials()
    {
        // Prepare the test data
        $username = 'testuser';
        $password = 'wrongpassword';

        // Mock the User model
        // $userModel = $this->getMockBuilder('User')
        //     ->setMethods(array('query'))
        //     ->getMock();
        // $userModel->expects($this->once())
        //     ->method('query')
        //     ->with($this->stringContains("SELECT * FROM users WHERE username = '$username'"))
        //     ->will($this->returnValue(
        //         $this->getMockResult(array(
        //             'id' => 1,
        //             'username' => $username,
        //             'password' => 'correctpassword'
        //         ))
        //     ));

        // Create an instance of the LoginController
        $loginController = new taxController;

        // Call the signin_action method
        $result = $loginController->check_signin($username, $password);
        print ("Result " . $result . "11111");
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
?>