<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controller/tax.php';
require_once (dirname(__DIR__) . '/model/tax.php');
use PHPUnit\Framework\TestCase;

class KhaiBaoTest extends TestCase
{
    public function testKhaiBaoWithValidCredentials()
    {
        $tax_code = "1234567890";
        $dc = "Nghe An";
        $ns = "29-06-2003";
        $cccd = "1234567890";
        $id = "1";

        $controller = new taxController();
        $result = $controller->khaibao($tax_code, $dc, $ns, $cccd, $id);

        if (is_array($result)) {

            $this->assertArrayHasKey('check', $result);
        } else {
            $this->assertTrue($result);
        }
    }

    public function testKhaiBaoWithInvalidCredentials()
    {

        $tax_code = "12345";
        $dc = "Nghe An";
        $ns = "29-06-2003";
        $cccd = "12345";
        $id = "1";

        $controller = new taxController();
        $result = $controller->khaibao($tax_code, $dc, $ns, $cccd, $id);

        if (is_array($result)) {
            $this->assertArrayHasKey('check', $result);
        } else {
            $this->assertTrue($result);
        }
    }
}

