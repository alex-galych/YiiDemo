<?php
/**
 * Created by JetBrains PhpStorm.
 * User: galych
 * Date: 7/30/13
 * Time: 4:34 PM
 * To change this template use File | Settings | File Templates.
 */

require_once('../bootstrap.php');

class ServicesTest extends PHPUnit_Framework_TestCase {
    protected $services;

    protected function setUp()
    {
        parent::setUp();
        $this->services = new Services();
    }

    public function testNameIsRequired()
    {
        $this->services->name = '';
        $this->assertFalse($this->services->validate(array('name')));
    }

    public function testNameMaxLengthIs30()
    {
        $this->services->name = $this->generateString(31);
        $this->assertFalse($this->services->validate(array('name')));

        $this->services->name = $this->generateString(30);
        $this->assertFalse($this->services->validate(array('name')));
    }

    function generateString($length)
    {
        $random= "";
        srand((double)microtime()*1000000);
        $char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $char_list .= "abcdefghijklmnopqrstuvwxyz";
        $char_list .= "1234567890";
        // Add the special characters to $char_list if needed

        for($i = 0; $i < $length; $i++)
        {
            $random .= substr($char_list,(rand()%(strlen($char_list))), 1);
        }
        return $random;
    }

    public function testPushAndPop()
    {
        $stack = array();
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }

    public function testEmpty() {
        $stack = array();
        $this->assertEmpty($stack);
        return $stack;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $stack) {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $stack) {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }

    public function theProvider() {
        return array(
            array(true, false)
        );
    }

    /**
     * @dataProvider theProvider
     */
    public function testTheProvider($var1, $var2) {
        //$var1 = true;
        //$var2 = false;

        $this->assertNotEquals($var1, $var2);
    }
}
